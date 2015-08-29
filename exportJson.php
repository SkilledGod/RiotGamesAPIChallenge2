<?php
include('db.php');

// load 514
$f514 = json_decode(file_get_contents("patch514.json"), true);

foreach ($f514 as $key => $item) {
	// get pick/winrate
	$f514Normal = $mysqli->query("select * from ap_items, matches where id = " .$item['id'] ." and patch = 'patch514'");
	$f514Ranked = $mysqli->query("select * from ap_items, matches where id = " .$item['id'] ." and patch = 'patch514ranked'");
	$f514Normal = $f514Normal->fetch_assoc();
	$f514Ranked = $f514Ranked->fetch_assoc();
	//
	$f514[$key]['pickrate']['normal'] = $f514Normal['pickraten514'] / (10 * max(1, $f514Normal['numberOfGames']));
	$f514[$key]['pickrate']['ranked'] = $f514Ranked['pickrate514'] / (10 * max(1, $f514Ranked['numberOfGames'])); 
	$f514[$key]['winrate']['normal'] = $f514Normal['winraten514'] / max(1, $f514Normal['pickraten514']);
	$f514[$key]['winrate']['ranked'] = $f514Ranked['winrate514'] / max(1, $f514Ranked['pickrate514']);
}

file_put_contents("patch514.json", json_encode($f514));
?>