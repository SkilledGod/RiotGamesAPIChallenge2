<?php
include('db.php');
// Open file
$champs = json_decode(file_get_contents("champions.json"), true, 1024);
$data = array();
$counter = 1;
$stats = array();	
foreach ($champs['data'] as $id => $champ) {
	$data['' .$id] = array();
	$data[$id]['name'] = $champ['key'];
	$data[$id]['pic']  = $champ['image']['full'];
	$data[$id]['stats'] = array();
	foreach ($champ['stats'] as $statName => $statValue) {
		$data[$id]['stats'][$statName] = array();
		if (!isset($stats[$statName])) {
			$stats[$statName] = $counter;
			$counter++;
		}
		$data[$id]['stats'][$statName]['id'] = $stats[$statName];
		$data[$id]['stats'][$statName]['value'] = $statValue;
	}
}

// add stats
foreach ($stats as $statName => $statId) {
	echo "Added stat: " .$statName ."<br>";
	$mysqli->query("insert into stats (id, name) values (" .$statId .",'" .$statName ."')");
}
echo "Added stats";
echo mysql_error();
foreach ($data as $id => $champ) {
	$mysqli->query("insert into champs (id, name, pic) values (" .$id .",'" .$champ['name'] ."','" .$champ['pic'] ."')");
	echo "Added champ: " .$champ['name'] ."<br>";
	foreach ($champ['stats'] as $stats) {
		$mysqli->query("INSERT into champ_stats (champ_id, stat_id, value) values (" .$id ."," .$stats['id'] .", " .$stats['value'] .")");
	}
}
echo mysql_error();
?>
