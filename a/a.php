<?php

include 'db.php';

$items = file_get_contents("item511.json");
$getItem = json_decode($items, true);
    foreach ($getItem['data'] as $key => $val) {
    if ($mysqli->query("select id from items where id = " .$key)->num_rows == 0){
//        echo "insert into items (id,name, description) values ( " .$key .", '" .$mysqli->real_escape_string($val['name']) ."', '" . $mysqli->real_escape_string($val['description']) ."'";
    $mysqli->query("insert into items (id,name, description) values ({$key}, '{$mysqli->real_escape_string($val['name'])}', '{$mysqli->real_escape_string($val['description'])})");
        echo $mysqli->error ."<br>";
        }
  }
  