<?php
include('db.php');

$items = json_decode(file_get_contents('item.json'), true);
echo 'items:' .count($items['data']) ."<br>";
foreach ($items['data'] as $id => $item) {
	if ($id == 3003) {
		echo "Hallo Welt";	
	}
	$mysqli->query('insert into items (id, name) values (' .$id .", '" .$mysqli->real_escape_string($item['name']) ."')");
}
?>
