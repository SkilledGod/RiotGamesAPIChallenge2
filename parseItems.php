<?php
include('db.php');

$items = json_decode(file_get_contents('item.json'), true);
echo 'items:' .count($items['data']) ."<br>";
foreach ($items['data'] as $id => $item) {
	$description = $item['description'];
	if (!$mysqli->query('update items set description = \'' .$mysqli->real_escape_string($description) .'\' where id = ' .$id)) {
		echo "Update failed for id " .$id .":" .$mysqli->error ."<br>";
	}
}
?>
