<?php
include('db.php');
// var_dump($argv);
$contents = json_decode(file_get_contents($_GET['match']), true);
// var_dump($contents);
foreach($contents['participants'] as $participant) {
    $champId = $participant['championId'];
    for ($i = 0; $i <= 6; $i++) {
        $itemId = $participant['stats']['item' .$i];
        $mysqli->query("insert into commonItems (item_id, champ_id, count) values (" .$itemId .", " .$champId .", 1) on duplicate key update count = count + 1");
    }
}
?>