<?php

include_once("../champion/Champion.php");
include_once("../items/Item.php"); // workarou
include_once("function_game.php");

function getHighestScore($mysqli) {
	$stateId = $mysqli->query("select id, chronology from state order by chronology desc limit 1")->fetch_assoc()['id'];

	$scoreQuery = $mysqli->query("select currentScore from games where state_id = " .$stateId . " order by currentScore desc limit 1");
	return $scoreQuery->fetch_assoc()['currentScore'];
}
function startGame($name, $champId, $mysqli) {
	// CHeck that no game was started yet
	if (isset($_SESSION['gameId']) && $mysqli->query("select id from games where id = " .$_SESSION['gameId'])->num_rows != 0) {
		return array("code" => 101, "message" => "A game was already started but is not yet finished");
	} else { // given game id is not valid
		unset($_SESSION['gameId']);
	}
	// check champ id
	if ($mysqli->query("select name from champs where id = " .$champId)->num_rows != 1) {
		return array("code" => 103, "message" => "Champ not found");
	}

	// choose a random match
	$matchDir = "../matches/";
	$entries = scandir($matchDir);

	$files = array();
	foreach ($entries as $entry) {
		if (!is_dir($entry)) {
			$files[] = $entry;		
		}
	}

	$numberOfEntries = sizeof($files);

	$choosenChamp = "nope";	
	$matchArray = NULL;	
	$match = NULL;
	$threshold = 0;
	while ($choosenChamp == "nope" && $threshold < 10) {
		// macth file
		$match = $files[rand(0, $numberOfEntries-1)];
	
		$matchArray = json_decode(file_get_contents($matchDir .$match), true);

		// Choose champion
		$possibleChamps = array();
		foreach($matchArray['participants'] as $participant) {
			if ($participant['timeline']['lane'] == "MIDDLE" || $participant['timeline']['lane'] == "MID") {
				$possibleChamps[] = $participant;	
			}
		}
		if (sizeof($possibleChamps) != 0) {
			$choosenChamp = $possibleChamps[rand(0,sizeof($possibleChamps)-1)];
		}
	$threshold++;
	}

	if ($choosenChamp == "nope") {
		return array("code" => 104, "message" => "No champion could be choosen as an opponent");
	}
	
	$response = array();
	$response['version'] = $matchArray['matchVersion'];

	$own = new Champion($champId, 1, $mysqli); // level is one at the start
	$opponent = getChampionByMatch($matchDir .$match, $choosenChamp['participantId'], $mysqli);

	$response['opponent'] = generateChampResponse($opponent, $own, $mysqli);
	$response['player'] = generateChampResponse($own, $opponent, $mysqli);
	$numberOfItems = count($opponent->getItems());
	$response['numberOfItems'] = $numberOfItems;
	$response['topScore'] = getHighestScore($mysqli);
	$dbVariables = array();
	$dbVariables['player_name'] = $name;
	$dbVariables['champId'] = $champId;
	$dbVariables['currentScore'] = $own->evaluateChampion($mysqli);
	$dbVariables['opponentGame'] = $match;
	$dbVariables['opponentParticipantId'] = $choosenChamp['participantId'];
	$dbVariables['timestamp'] = $_SERVER['REQUEST_TIME'];
	$dbVariables['state_id'] = $mysqli->query("select id from state where chronology = 0")->fetch_assoc()['id'];
	$dbVariables['numberOfTurns'] = $numberOfItems;

	$query = "insert into games (";		
	$values = "";
	$count = 0;
	foreach($dbVariables as $key => $value) {
		if ($count < sizeof($dbVariables) - 1) {
			$query .= $key .",";
			$values .= "'" .$value ."', ";
		} else {
			$values .= "'" .$value ."'";
			$query .= $key;
		}
		$count++;
	}

	$query .= ") values (" .$values .")";
	if ($mysqli->query($query) == false) {
		return array("code" => 102, "message" => "Database query failed");
	} else {
		$_SESSION['gameId'] = $mysqli->insert_id;
		$response['code'] = 200;
		return $response;
	}
}

function randomItem($gameId, $mysqli) {
	$query = $mysqli->query("select id from games where id = " .$gameId);
	if ($gameId == NULL || !is_int($gameId) || !$query || $query->num_rows == 0) {
		return array("code" => 104, "message" => "No valid gameId found");
	}

	// check if last turn was over
	$lastTurnMade = $mysqli->query("select max(turn) as lastTurn from choosenItems where game_id = " .$gameId)->fetch_assoc()['lastTurn'];
	if ($lastTurnMade == NULL) $lastTurnMade = 0;
	$lastProposed = $mysqli->query("select max(turn) as lastTurn from proposedItems where game_id = " .$gameId)->fetch_assoc()['lastTurn'];
	if ($lastTurnMade != $lastProposed) {
		return array("code" => 101, "message" => "Your last turn isn't over yet");
	}

	$currentTurn = $lastTurnMade+1;
	if ($mysqli->query("select id from games where id = " .$gameId ." and " .$currentTurn ." <= numberOfTurns")->num_rows == 0) { // too many turns
		return array("code" => 103, "message" => "Maximum number of turns already made");
	}

	// TODO choose boots on first turn! (iff the opponent has some (bootsTag in db?))
	$possibleItemsQuery = $mysqli->query("select id, name from ap_items where id not in (select item_id from choosenItems where game_id = " .$gameId ." union select item_id from proposedItems where game_id = " .$gameId .")");
	$possibleItems = array();
	while ($item = $possibleItemsQuery->fetch_assoc()) {
		$possibleItems[] = $item;
	}
	
	// Choose 3 distinct values
	$values = array_rand($possibleItems, min(3, sizeof($possibleItems)));

	$response = array();
	$response['code'] = 200;
	$response['items'] = array();
	for ($i = 0; $i < 3; $i++) {
		$response['items'][$i] = $possibleItems[$values[$i]];
	}

	// push items into db
	$query = "insert into proposedItems (game_id, item_id, turn) values ";
	$count = 0;
	foreach ($response['items'] as $item) {
		if ($count == (count($response['items']) -1)) {
			$query .= "(" .$gameId .", " .$item['id'] ."," .$currentTurn .")";
		} else {
			$query .= "(" .$gameId .", " .$item['id'] ."," .$currentTurn ."),";
		}
		$count++;
	}
	$response['turn'] = $currentTurn;
	if ($mysqli->query($query) == false) {
		return array("code" => 102, "message" => "Couldn't execute db query");
	}
	return $response;
}

function selectItem($gameId, $choosenItemId, $mysqli) {
	if ($gameId == NULL || !is_int($gameId) || $mysqli->query("select id from games where id = " .$gameId)->num_rows == 0) {
		return array("code" => 105, "message" => "Game Id not valid");
	}	
	$lastProposedTurn = $mysqli->query("select max(turn) as lastTurn from proposedItems where game_id = " .$gameId)->fetch_assoc()['lastTurn'];
	$lastPickedTurn = $mysqli->query("select max(turn) as lastTurn from choosenItems where game_id = " .$gameId)->fetch_assoc()['lastTurn']; 
	// turn isn't over yet (so we got items proposed)	
	if ($lastProposedTurn - 1 != $lastPickedTurn) {
		return array("code" => 101, "message" => "You need to request new items first");
	}
	
	$isItemValid = $mysqli->query("select item_id, turn from proposedItems where game_id = " .$gameId ." and item_id = " .$choosenItemId ." having turn = max(turn)")->num_rows == 1;
	
	if (!$isItemValid) {
		return array("code" => 102, "message" => "You need to choose one of the three proposed items");
	}

	// it's valid --> to the db
	$query = $mysqli->query("insert into choosenItems (game_id, item_id, turn) values (" .$gameId .", " .$choosenItemId .", " .$lastProposedTurn .")");
	if (!$query) {
		return array("code" => 103, "message" => "Couldn't enter item into db");
	}

	$game = $mysqli->query("select opponentGame, opponentParticipantId from games where id =" .$gameId)->fetch_assoc();

	$own = getChampionByDB($gameId, $mysqli); // level is one at the start
	$opponent = getChampionByMatch("../matches/" .$game['opponentGame'], $game['opponentParticipantId'], $mysqli);

	$response['opponent'] = generateChampResponse($opponent, $own, $mysqli);
	$response['player'] = generateChampResponse($own, $opponent, $mysqli);
	$response['code'] = 200;
	$response['lastSelectionMade'] = $lastProposedTurn == $mysqli->query("select numberOfTurns from games where id = " .$gameId)->fetch_assoc()['numberOfTurns'];
	
	if (!$mysqli->query("update games set currentScore = " .$response['player']['score'] ." where id = " .$gameId)) {
		return array("code" => 104, "message" => "Couldn't update scroe");
	}

	// get data to get the champions
	return $response;
}

function endGame($gameId, $mysqli) {
	// Check if gameId is valid
	$query = $mysqli->query("select id, state_id from games where id = " .$gameId);
	$stateId = $mysqli->query("select id from state order by chronology desc limit 1")->fetch_assoc()['id'];

	if ($gameId == NULL || !is_int($gameId) || !$query || $query->num_rows == 0 || $query->fetch_assoc()['state_id'] == $stateId) {
		return array("code" => 105, "message" => "Game Id not valid");
	}	
	// check for number of turns
	$query = $mysqli->query("select games.numberOfTurns, choosenItems.turn from games, choosenItems where games.id = " .$gameId ." and games.id = choosenItems.game_id and games.numberOfTurns = choosenItems.turn having choosenItems.turn = max(choosenItems.turn)");
	if (!$query || $query->num_rows != 1) {
		return array("code" => 101, "message" => "Last turn not yet made");
	}
	
	// okay we are finished. that means 1. you already got the updated scores. 2. we need to determine the winner. --> 
	$game = $mysqli->query("select opponentGame, opponentParticipantId from games where id =" .$gameId)->fetch_assoc();

	$own = getChampionByDB($gameId, $mysqli); // level is one at the start
	$opponent = getChampionByMatch("../matches/" .$game['opponentGame'], $game['opponentParticipantId'], $mysqli);

	$response['opponent'] = generateChampResponse($opponent, $own, $mysqli);
	$response['player'] = generateChampResponse($own, $opponent, $mysqli);
	
	$playerWon =  false;
	if ($response['player']['score'] > $response['opponent']['score']) {
		$playerWon = true;
	}

	$query = $mysqli->query("update games set state_id = " .$stateId .", won = " .($playerWon ? "true" : "false") ." where id = " .$gameId);

	if (!$query) {
		return array("code" => 102, "message" => "Couldn't update db");
	} 
	$_SESSION['lastGameId'] = $_SESSION['gameId'];
	unset($_SESSION['gameId']);
	// calculate player rank!
	$rank = $mysqli->query("select player_name, currentScore, won from games where currentScore >= (select currentScore from games where id = " .$gameId .") and state_id = " .$stateId ." order by currentScore desc")->num_rows + 1;
	$numberOfPlayers = $mysqli->query("select id from games where state_id = " .$stateId ." order by currentScore desc")->num_rows;
	return array("code" => 200, "won" => $playerWon, "playerScore" => $response['player']['score'], "opponentScore" => $response['opponent']['score'], "rank" => $rank, "numberOfPlayers" => $numberOfPlayers);
}

function highscore($mysqli, $top, $gameId, $page) {
	if ($page <= 0 ) {
		return array("code" => 101, "message" => "Page has to be greater 0");
	}
	$entriesPerPage = 25;
	$stateId = $mysqli->query("select id from state order by chronology desc limit 	1")->fetch_assoc()['id'];
	if (!$top) {
		$rowsInFront = $mysqli->query("select player_name, currentScore, won from games where currentScore >= (select currentScore from games where id = " .$gameId .") and state_id = " .$stateId ." order by currentScore desc")->num_rows;
		$page = floor(($rowsInFront + 1) / 25) + 1;
	}

	// Show top 25 max
	$topGames = $mysqli->query("select games.id, champId, champs.name as champName, player_name, currentScore, won from games join champs on games.champId = champs.id where state_id = " .$stateId ." order by currentScore desc limit " .$entriesPerPage * ($page-1) .", " .$entriesPerPage);
	$response = array();
	
	$response['code'] = 200;
	$response['games'] = array();
	$currentRank = 25 * ($page-1) + 1;
	while ($game = $topGames->fetch_assoc()) {
		$game['mark'] = $game['id'] == $gameId;
		$game['rank'] = $currentRank;
		$currentRank++;
		$response['games'][] = $game;
	}
	$response['page'] = (int) $page;
	$response['numberOfPages'] = ceil($mysqli->query("select id from games where state_id = " .$stateId ." order by currentScore desc")->num_rows / 25);
	if ($response['page'] > $response['numberOfPages']) {
		return array("code" => 102, "message" => "Page number has to be lower");
	}
	return $response;
}

function abortGame($gameId, $mysqli) {
	$stateId = $mysqli->query("select id from state order by chronology desc limit 	1")->fetch_assoc()['id'];
		if ($mysqli->query("select state_id from games where id = " .$gameId)->fetch_assoc()['state_id'] == $stateId) {
			return array("code" => 101, "message" => "Game already finished");
		}
	if ($mysqli->query("delete from games where id = " .$gameId) && $mysqli->query("delete from choosenItems where game_id = " .$gameId) && $mysqli->query("delete from proposedItems where game_id = " .$gameId)) {
		unset($_SESSION['gameId']);
		return array("code" => 200);
	} else {
		return array("code" => 102, "message" => "Couldn't remove game from db");
	}
	
}

function getStats($gameId, $mysqli) {
	$gameQuery = $mysqli->query("select * from games where id =" .$gameId);
		if ($gameQuery->num_rows == 0) {
			return array("code" => 101, "message" => "Game does not exist.");
		}

	$game = $gameQuery->fetch_assoc();

	$own = getChampionByDB($gameId, $mysqli); // level is one at the start
	$opponent = getChampionByMatch("../matches/" .$game['opponentGame'], $game['opponentParticipantId'], $mysqli);

	$response['name'] = $game['player_name'];
	$response['opponent'] = generateChampResponse($opponent, $own, $mysqli);
	$response['player'] = generateChampResponse($own, $opponent, $mysqli);

	// get info
	$matchArr = json_decode(file_get_contents("../matches/" .$game['opponentGame']), true);
	$response['version'] = $matchArr['matchVersion'];
	$numberOfItems = count($opponent->getItems());
	$response['numberOfItems'] = $numberOfItems;
	$response['currentTurn'] = $mysqli->query("select max(turn) as maxTurn from proposedItems where game_id = " .$gameId)->fetch_assoc()['maxTurn'];
	$response['topScore'] = getHighestScore($mysqli);
	$lastSelected = $mysqli->query("select max(turn) as maxTurn from choosenItems where game_id = " .$gameId)->fetch_assoc()['maxTurn'];	
	if ($lastSelected == $response['currentTurn'] - 1) {
		$response["currentPhase"] = "selectItem";
		// include selectable items
		$response["selectableItems"] = array();
		$itemsQuery = $mysqli->query("select item_id from proposedItems where game_id = " .$gameId ." and turn = " .$response['currentTurn']);
		while ($item = $itemsQuery->fetch_assoc()) {
			$response['selectableItems'][] = $item['item_id'];
		}
	} 
	if ($lastSelected == $response["currentTurn"]) {
		$response["currentPhase"] = "requestItem";
	}
	return $response;
}

function isGameActive($gameId, $mysqli) {
	if ($gameId == NULL || !is_int($gameId) || $mysqli->query("select id from games where id = " .$gameId)->num_rows == 0) {
		return array("code" => 200, "active" => false);
	} else {
		return array("code" => 200, "active" => true, "gameId" => $gameId);
	}
}
?>
