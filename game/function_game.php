<?php
include_once("../items/Champion.php");
function getChampionByMatch($matchFile, $participantId, $mysqli) {
	$matchArray = json_decode(file_get_contents($matchFile), true);
	$participant = NULL;	
	foreach ($matchArray['participants'] as $currentParticipant) {
		if ($currentParticipant['participantId'] == $participantId) {
			$participant = $currentParticipant;
			break;
		}
	}

	$champion = new Champion($participant['championId'], $participant['stats']['champLevel'], $mysqli);
	
	$counter = 0;
	for ($i = 0; $i <= 6; $i++) {
		$itemId = $participant['stats']['item' .$i];
		// Get the name.
		if ($itemId == 0 || $counter == 6) {
			$counter++;
			continue;
		}
		$itemName = $mysqli->query("select * from items where id = " .$itemId)->fetch_assoc()['name'];
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

function getChampionByDB($matchId, $mysqli, $level) {
	$champId = $mysqli->query("select champId from games where id = " .$matchId)->fetch_assoc()['champId'];

	$champion = new Champion($champId, $level, $mysqli);
	// Fetch the items
	$itemQuery = $mysqli->query("select items.name as name from choosenItems, items WHERE items.id = choosenItems.item_id and game_id = " .$matchId);

	while ($item = $itemQuery->fetch_assoc()) {
		// TODO bring into one regex
		$className = str_replace(" ", "_", $item['name']);
		$className = str_replace("(", "", $className);
		$className = str_replace(")", "", $className);
		$className = str_replace("'", "", $className);
		$className = str_replace(":", "", $className);
		$className = str_replace("-", "_", $className);
		$className = str_replace(".", "", $className);
		
		include_once("../items/generated/" .$className .".php");
		$item = new $className();
		$champion->addItem($item);
	}

	return $champion;
}

function generateChampResponse($champion, $enemy, $mysqli) {
	$response = array();
	$response['champId'] = $champion->getId();
	$response['level'] = $champion->getLevel();
	$response['items'] = array();
	foreach($champion->getItems() as $item) {
		$query = $mysqli->query("select id, name, description from items where id = " .$item->getId())->fetch_assoc();
		$response['items'][] = $query;
	}
	$response['name'] = $champion->getName();
	$champion->recalculateStats($enemy);
	$response['score'] = $champion->evaluateChampion($mysqli);

	$stats = $mysqli->query("select name from statToPointMap");
	while($stat = $stats->fetch_assoc()) {
		$response['stats'][$stat['name']] = $champion->getStatByName($stat['name']);	
	}
	return $response; // stats, level, items, champId, name
}
?>
