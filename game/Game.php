<?php
include_once(dirname(__FILE__) ."/../items/Champion.php");
class Game {
	static $MATCHES_FOLDER;
	static $GAME_ID_KEY;
	
	private $gameInfo; // contains all info from the games db for a specified game

	private $isActive;
	private $proposedItems; // array of array(3)
	private $choosenItems; // array
	private $currentScore;
	private $matchArray;
	private $mysqli;
	private $champion;
	private $opponent;
	/**
	 *	Checks if the game inside this session is active and returns an array with status information.
	 * @param $gameId game id
	 * @return array with key "active" to denote if the given game is active and in the case that a game is active contains the gameId aswell
	 */
	public static function isGameActive($gameId, $mysqli) {
		$stateId = Game::getGameEndedStateId($mysqli);
		if ($gameId == NULL || !is_int($gameId) || $mysqli->query("select id from games where id = " .$gameId . " and state_id != " .$stateId)->num_rows == 0) {
			return array("code" => 200, "active" => false);
		} else {
			return array("code" => 200, "active" => true, "gameId" => $gameId);
		}	
	}

	/**
	 *	Starts a session for the game.
	 */
	public function __construct($mysqli) {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$this->mysqli = $mysqli;
		$this->isActive = false;
	}

	/**
	 *	Initializes this game with a game id from the session started in __construct.
	 * @return if the game is active
	 */
	public function openGame() {
		$this->gameInfo['id'] = isset($_SESSION[self::$GAME_ID_KEY]) ? $_SESSION[self::$GAME_ID_KEY] : NULL;
		$this->isActive = self::isGameActive($this->gameInfo['id'], $this->mysqli)['active'];
		if ($this->isActive) {
			// Load game data
			$this->gameInfo = $this->mysqli->query("select * from games where id = " .$this->gameInfo['id'])->fetch_assoc();
			// Load proposed Items
			$proposedItemsQuery = $this->mysqli->query("select proposedItems.item_id as id, proposedItems.turn, items.*, ap_items.* from proposedItems, items, ap_items where game_id = " .$this->gameInfo['id'] ." and items.id = proposedItems.item_id and ap_items.id = proposedItems.item_id order by turn asc");
			$this->proposedItems = array();
			while ($proposedItem = $proposedItemsQuery->fetch_assoc()) {
				$this->proposedItems[$proposedItem['turn']-1][] = $proposedItem;
			}
		
			// Load selected items
			$this->choosenItems = array();
			$choosenItemsQuery = $this->mysqli->query("select * from choosenItems, items where choosenItems.item_id = items.id and game_id = " .$this->gameInfo['id']);
			while ($choosenItem = $choosenItemsQuery->fetch_assoc()) {
				$this->choosenItems[$choosenItem['turn']] = $choosenItem;
			}
			// Cache the games json
			$this->matchArray = json_decode(file_get_contents(self::$MATCHES_FOLDER .$this->gameInfo['opponentGame']), true);

			// calculate stats one time
			$bothChampions = $this->getChampions();
			$opponent = $bothChampions['opponent'];
			$champion = $bothChampions['player'];
		}
		return array("code" => 200, "isActive" => $this->isActive);
	}
	
	/**
	 * 
	 *
	 */
	public function startGame($playerName, $champId) {
		if ($this->openGame()['isActive']) {
			return array("code" => 101, "message" => "A game was alredy started but not yet finished");
		} else {
			unset($_SESSION[self::$GAME_ID_KEY]);
		}
		
		if ($playerName == "") {
			return array("code" => 122, "message" => "Please select a valid name.");			
		}
		
		if ($this->mysqli->query("select id from champs where id = " .$champId)->num_rows == 0) {
			return array("code" => 102, "message" => "Please choose a valid champion.");
		}
		
		// Get random opponent
		$opponentData = $this->getRandomOpponent();
		if ($opponentData['choosenChamp'] == null) {
			return array("code" => 103, "message" => "No champion could be choosen as an opponent");
		}
		
		// Load own champ for the first time
		$own = 	$own = new Champion($champId, $opponentData['choosenChamp']['stats']['champLevel'], $this->mysqli);
		$numberOfItems = 0;
		for ($i = 0; $i <= 5; $i++) {
			if ($opponentData['choosenChamp']['stats']['item' .$i] != 0) {
				$numberOfItems += 1;
			}
		}
		// Insert the match into the database
		$dbVariables = array();
		$dbVariables['player_name'] = $playerName;
		$dbVariables['champId'] = $champId;
		$dbVariables['currentScore'] = $own->evaluateChampion($this->mysqli);
		$dbVariables['opponentGame'] = $opponentData['matchFile'];
		$dbVariables['opponentParticipantId'] = $opponentData['choosenChamp']['participantId'];
		$dbVariables['timestamp'] = $_SERVER['REQUEST_TIME'];
		$dbVariables['state_id'] = $this->mysqli->query("select id from state where chronology = 0")->fetch_assoc()['id'];
		$dbVariables['numberOfTurns'] = $numberOfItems;
		// Generate insert query
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

		// Check if mysql-query was successful
		if ($this->mysqli->query($query) == false) {
			return array("code" => 104, "message" => "Database failure.");
		} else {
			$_SESSION[self::$GAME_ID_KEY] = $this->mysqli->insert_id;
			return $this->openGame();// Open the game (aka load all stats)			
		}
	}
	
	public function getRandomItems() {
		if (!$this->isActive) {
			return array("code" => 105, "message" => "Game is not active");
		}
		
		if ($this->getGamePhase() != "requestItem") {
			return array("code" => 106, "message" => "Your last turn isn't over yet");
		}

		if ($this->getCurrentTurn()-1 == $this->gameInfo['numberOfTurns']) {
			return array("code" => 107, "message" => "Maximum number of turns already made");
		}
		
		// select possible items
		$possibleItemsQuery = $this->mysqli->query("select ap_items.*, items.* from ap_items, items where ap_items.id = items.id and ap_items.id not in (select item_id from proposedItems where game_id = " .$this->gameInfo['id'] .")");
		$possibleItems = array();
		while ($item = $possibleItemsQuery->fetch_assoc()) {
			$possibleItems[] = $item;
		}
		
		$randomItemKeys = array_rand($possibleItems, min(3, sizeof($possibleItems)));
		$randomItems = array();
		$this->proposedItems[$this->getCurrentTurn() -1] = array();
		foreach ($randomItemKeys as $index) {
			$randomItems[] = $possibleItems[$index];
			$this->proposedItems[$this->getCurrentTurn() -1][] = $possibleItems[$index];
		}

		// add proposed items to database
		$query = "insert into proposedItems (game_id, item_id, turn) values ";
		$count = 0;
		foreach ($randomItems as $item) {
			if ($count == (count($randomItems) -1)) {
				$query .= "(" .$this->gameInfo['id'] .", " .$item['id'] ."," .$this->getCurrentTurn() .")";
			} else {
				$query .= "(" .$this->gameInfo['id'] .", " .$item['id'] ."," .$this->getCurrentTurn() ."),";
			}
			$count++;
		}

		if (!$this->mysqli->query($query)) {
			return array("code" => 108, "message" => "Database failure.");
		}
		$response['turn'] = $this->getCurrentTurn();
		$response['items'] = $this->selectableItemsStats();
		$response['code'] = 200;
		return $response;
	}
	
	public function selectItem($choosenItemId) {
		if (!$this->isActive) {
			return array("code" => 109, "message" => "Database failure");
		}
		$phase = $this->getGamePhase();
		if ($phase == "requestItem") {
			return array("code" => 110, "message" => "You need to request new items first");
		} elseif ($phase == "ended") {
			return array("code" => 110, "message" => "Game has already ended");
		}

		$isInProposedItems = false;
		$choosenItem = null;
		for ($i = 0; $i < 3; $i++) {
			if ($this->proposedItems[$this->getCurrentTurn() -1][$i]['id'] == $choosenItemId) {
				$isInProposedItems = true;
				$choosenItem = $this->proposedItems[$this->getCurrentTurn() -1][$i];
			}
		}
		if (!$isInProposedItems) {
			return array("code" => 111, "message" => "You need to choose one of the proposed items");
		}
		// currentTurn
		$currentTurn =  $this->getCurrentTurn();
		
		// Add to choosen items
		$query = $this->mysqli->query("insert into choosenItems (game_id, item_id, turn) values (" .$this->gameInfo['id'] .", " .$choosenItemId .", " .$this->getCurrentTurn() .")");
		
		if (!$query) {
			return array("code" => 112, "message" => "Database failure");
		}
		
		// Add item to current champ
		$this->choosenItems[] = $this->mysqli->query("select * from items, choosenItems where items.id = " .$choosenItemId ." and items.id = choosenItems.item_id and choosenItems.game_id = " .$this->gameInfo['id'] ." and turn = " .$this->getCurrentTurn())->fetch_assoc();
		$bothChampions = $this->getChampions();
		$opponent = $bothChampions['opponent'];
		$champion = $bothChampions['player'];
		
		// update current score
		$updateScore = $this->mysqli->query("update games set currentScore = " .$champion->evaluateChampion($this->mysqli) ." where id = " .$this->gameInfo['id']);
		
		if ($updateScore) {
			$response['code'] = 200;
		} else {
			$response['code'] = 200; // score is not important and actually the correct score gets delivered
			$response['message'] = "Coudn't update score";
		}
		$response['player'] = $this->generateChampResponse($champion);
		$response['opponent'] = $this->generateChampResponse($opponent);
		$response['lastSelectionMade'] = $currentTurn ==  $this->gameInfo['numberOfTurns'];
		return $response;
	}
	
	
	/**
	 *	Returns all stats for the game
	 *
	 */
	public function getStats() {
		if (!$this->isActive) {
			return array("code" => 121, "message" => "Game is not active");
		}
		
		$bothChampions = $this->getChampions();
		$opponent = $bothChampions['opponent'];
		$champion = $bothChampions['player'];

		$response = array();
		$response['version'] = $this->matchArray['matchVersion'];
		$response['name'] = $this->gameInfo['player_name'];
		$response['opponent'] = $this->generateChampResponse($opponent);
		$response['player'] = $this->generateChampResponse($champion);
		$response['numberOfTurns'] = $this->gameInfo['numberOfTurns'];
		$response['currentTurn'] = $this->getCurrentTurn();
		$response['topScore'] = $this->getTopScore();
		$response['currentPhase'] = $this->getGamePhase();
		
		if ($response['currentPhase'] === "selectItem") {
			// send proposedItems Data
			$response['selectableItems'] = $this->selectableItemsStats();
		}
		$response['code'] = 200;
		return $response;
	}
	
	public function endGame() {
		if (!$this->isActive) {
			return array("code" => 114, "message" => "Game is not active");
		}
		
		if ($this->getCurrentTurn() <= $this->gameInfo['numberOfTurns']) {
			return array("code" => 115, "message" => "Last turn not yet made");
		}
		
		// determine winner
		$bothChampions = $this->getChampions();
		$opponent = $bothChampions['opponent'];
		$champion = $bothChampions['player'];
		
		$champion->recalculateStats($opponent);
		$opponent->recalculateStats($champion);
		
		$response = array();
		$response['player'] = $this->generateChampResponse($champion);
		$response['opponent'] = $this->generateChampResponse($opponent);
		$response['opponentScore'] = $opponent->evaluateChampion($this->mysqli);
		$response['playerScore'] = $champion->evaluateChampion($this->mysqli);
		$playerWon = $response['playerScore'] > $response['opponentScore'];
		$response['playerWon'] = $playerWon;
		
		$stateId = self::getGameEndedStateId($this->mysqli);
		$query = $this->mysqli->query("update games set state_id = " .$stateId .", won = " .($playerWon ? "true" : "false") .", currentScore = " .$response['playerScore'] ." where id = " .$this->gameInfo['id']);
		if (!$query) {
			return array("code" => 116, "message" => "Database failure");
		}
		
		$_SESSION['lastGameId'] = $_SESSION[self::$GAME_ID_KEY];
		unset($_SESSION[self::$GAME_ID_KEY]);
		
		$rank = $this->mysqli->query("select player_name, currentScore, won from games where currentScore >= " .$response['playerScore'] ." and timestamp < " .$this->gameInfo['timestamp'] ." and state_id = " .$stateId ." order by currentScore desc")->num_rows + 1;

		$response['code'] = 200;
		$response['rank'] = $rank;
		$response['numberOfPlayers'] = $this->mysqli->query("select id from games where state_id = " .$stateId ." order by currentScore desc")->num_rows;
		return $response;
	}
	
	public function abortGame() {
		if (!$this->isActive) {
			return array("code" => 119, "message" => "Game already finished or no game found");
		}
		
		$deleteGame = $this->mysqli->query("delete from games where id = " .$this->gameInfo["id"]);
		if ($deleteGame) {
			// Delete from the other tables
			$this->mysqli->query("delete from choosenItems where game_id = " .$this->gameInfo["id"]);
			$this->mysqli->query("delete from proposedItems where game_id = " .$this->gameInfo['id']);
			unset($_SESSION[self::$GAME_ID_KEY]);
			return array("code" => 200);
		} else {
			return array("code" => 120, "message" => "Database failure");
		}
	}
	
	/**
	 *
	 *
	 */
	public static function getHighscore($mysqli, $top, $page) {
		if ($top && $page <= 0) {
			return array("code" => 117, "message" => "Page has to be greater than 0");
		}
		
		$entriesPerPage = 25;
		$stateId = self::getGameEndedStateId($mysqli);
		if (!$top) {
			$rowsInFront = $mysqli->query("select player_name, currentScore, won from games where currentScore >= (select currentScore from games where id = " .$_SESSION['lastGameId'] .") and state_id = " .$stateId ." order by currentScore desc")->num_rows;
			$page = floor(($rowsInFront + 1) / 25) + 1;
		}
		
			// Show top 25 max
		$topGames = $mysqli->query("select games.id, champId, champs.name as champName, player_name, currentScore, won from games join champs on games.champId = champs.id where state_id = " .$stateId ." order by currentScore desc limit " .$entriesPerPage * ($page-1) .", " .$entriesPerPage);

		$response = array();
		$response['page'] = (int) $page;
		$response['numberOfPages'] = ceil($mysqli->query("select id from games where state_id = " .$stateId ." order by currentScore desc")->num_rows / 25);
		
		if ($response['page'] > $response['numberOfPages']) {
			return array("code" => 118, "message" => "Page number has to be lower than " .$response['numberOfPages']);
		}

		// Add the games in the list
		$response['games'] = array();
		$currentRank = 25 * ($page-1) + 1;
		while ($game = $topGames->fetch_assoc()) {
			$game['mark'] = $game['id'] == $_SESSION['lastGameId'];
			$game['rank'] = $currentRank;
			$currentRank++;
			$response['games'][] = $game;
		}

		$response['code'] = 200;
		return $response;
	}
	
	public function getTopScore() {
		return $this->mysqli->query("select currentScore from games where state_id = " .self::getGameEndedStateId($this->mysqli) ." order by currentScore desc limit 1")->fetch_assoc()['currentScore'];
	}
	
	private function getChampion($level) {
		$champId = $this->gameInfo['champId'];
	
		$champion = new Champion($champId,$level, $this->mysqli);
		// Fetch the items
		$itemQuery = $this->mysqli->query("select items.name as name from choosenItems, items WHERE items.id = choosenItems.item_id and game_id = " .$this->gameInfo['id']);

	foreach($this->choosenItems as $item) {
		// TODO bring into one regex
		$className = str_replace(" ", "_", $item['name']);
		$className = str_replace("(", "", $className);
		$className = str_replace(")", "", $className);
		$className = str_replace("'", "", $className);
		$className = str_replace(":", "", $className);
		$className = str_replace("-", "_", $className);
		$className = str_replace(".", "", $className);
		
		include_once(dirname(__FILE__) ."/../items/generated/" .$className .".php");
		$item = new $className();
		$champion->addItem($item);
	}

		return $champion;		
	}
	
	private function getOpponent() {
		$participant = NULL;	
		foreach ($this->matchArray['participants'] as $currentParticipant) {
			if ($currentParticipant['participantId'] == $this->gameInfo['opponentParticipantId']) {
				$participant = $currentParticipant;
				break;
			}
		}

		$champion = new Champion($participant['championId'], $participant['stats']['champLevel'], $this->mysqli);
	
		$counter = 0;
		for ($i = 0; $i <= 6; $i++) {
			$itemId = $participant['stats']['item' .$i];
			// Get the name.
			if ($itemId == 0 || $counter == 6) {
				$counter++;
				continue;
			}
			$itemName = $this->mysqli->query("select * from items where id = " .$itemId)->fetch_assoc()['name'];
                        if ($itemName == "") {
                            continue;
                        }
                        // TODO bring into one regex
			$className = str_replace(" ", "_", $itemName);
			$className = str_replace("(", "", $className);
			$className = str_replace(")", "", $className);
			$className = str_replace("'", "", $className);
			$className = str_replace(":", "", $className);
			$className = str_replace("-", "_", $className);
			$className = str_replace(".", "", $className);
			include_once("../items/generated/" .$className .".php");
			$item = new $className();
			$champion->addItem($item);
			$counter++;	
		}
		return $champion;
	}
	
	private function generateChampResponse($champion) {
		$response = array();
		$response['champId'] = $champion->getId();
		$response['level'] = $champion->getLevel();
		$response['items'] = array();
		foreach($champion->getItems() as $item) {
			$query = $this->mysqli->query("select id, name, description from items where id = " .$item->getId())->fetch_assoc();
			$response['items'][] = $query;
		}
		$response['name'] = $champion->getName();

		$response['score'] = $champion->evaluateChampion($this->mysqli);
	
		$stats = $this->mysqli->query("select name from statToPointMap");
		while($stat = $stats->fetch_assoc()) {
			$response['stats'][$stat['name']] = $champion->getStatByName($stat['name']);	
		}
		return $response; // stats, level, items, champId, name
	}
	
	/**
	 *	Selects a random mid laner from a random match from the matches in self::$MATCHES_FOLDER.
	 * @return array containing the matchFile name, matchArray and the choosenChamp. If no champ was choosen choosenChamp is null.
	 */
	private function getRandomOpponent() {
		$entries = scandir(self::$MATCHES_FOLDER);

		$files = array();
		foreach ($entries as $entry) {
			if (!is_dir($entry)) {
				$files[] = $entry;		
			}
		}

		$numberOfEntries = sizeof($files);

		$choosenChamp = NULL;	
		$matchArray = NULL;	
		$match = NULL;
		$threshold = 0;
		while ($choosenChamp == NULL && $threshold < 10 && $numberOfEntries > 0) {
			// macth file
			$match = $files[rand(0, $numberOfEntries-1)];
			$matchArray = json_decode(file_get_contents(self::$MATCHES_FOLDER .$match), true);

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

		return array("matchFile" => $match, "choosenChamp" => $choosenChamp);
	}
	
	/**
	 *	Returns the state_id for ended games.
	 */
	private static function getGameEndedStateId($mysqli) {
		return $mysqli->query("Select id from state order by chronology desc limit 1")->fetch_assoc()['id'];
	}
	
	private function getGamePhase() {
		if (count($this->proposedItems) == count($this->choosenItems)) {
			return "requestItem";
		} else if (count($this->choosenItems) < $this->gameInfo['numberOfTurns']) {
			return "selectItem";
		} else {
			return "ended";
		}
	}
	
	private function selectableItemsStats() {
		$items = $this->proposedItems[$this->getCurrentTurn()-1];
		
		// Calculate the number of Games for each patch
        $numberOfGames = $this->mysqli->query("select * from matches");
        $patchMatches = array();
        $patchMatches['511'] = 0;
        $patchMatches['514'] = 0;
        while ($patch = $numberOfGames->fetch_assoc()) {
			if ($patch['patch'] == "patch511" || $patch['patch'] == "patch511ranked") {
				$patchMatches['511'] = $patchMatches['511'] + $patch['numberOfGames'];
			}
            if ($patch['patch'] == "patch514" || $patch['patch'] == "patch514ranked") {
				$patchMatches['514'] = $patchMatches['514'] + $patch['numberOfGames'];
			}
		}

		// Calculate the item stats
		// TODO hope it works
		foreach ($items as &$item) {
			$item['winrate511'] = ($item['winrate511'] + $item['winraten511']) / max($item['pickrate511'] + $item['pickraten511'], 1);
			$item['pickrate511'] = ($item['pickrate511']+$item['pickraten511']) / max(10, (10*$patchMatches['511']));
			$item['winrate514'] = ($item['winrate514'] + $item['winraten514'])/ max(1, $item['pickrate514'] + $item['pickraten514']);
			$item['pickrate514'] = ($item['pickrate514']+$item['pickraten514']) / max(10, (10*$patchMatches	['514']));
			// unset the normal rates
			unset($item['pickraten511']);
			unset($item['pickraten514']);
			unset($item['winraten511']);
			unset($item['winraten514']);
		}
		
		return $items;
	}
	
	private function getChampions() {
		$opponent = $this->getOpponent();
		$champion = $this->getChampion($opponent->getLevel());
		$opponent->recalculateStats($champion);
		$champion->recalculateStats($opponent);
		return array("player" => $champion, "opponent" => $opponent);
	}
	
	private function getCurrentTurn() {
		$phase = $this->getGamePhase();
		if ($phase === "requestItem") {
			return count($this->proposedItems)+1;
		} else if ($phase === "selectItem") {
			return count($this->proposedItems);
		}
	}
}
Game::$GAME_ID_KEY = "gameId";
Game::$MATCHES_FOLDER = dirname(__FILE__) ."/../matches/";
?>