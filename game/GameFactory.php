<?php

class GameFactory {
	
	public static function createNewGame($playerName, $playerChampId, $mysqli) {
		$g = new Game($mysqli);
		$ret = $g->startGame($playerName, $playerChampId);
		if ($ret['code'] == 200) {		
			return array("game" => $g, "returnValue" => $ret);
		} else {
			return array("game" => null, "returnValue" => $ret);
		}
	}
	
	public static function openGame($mysqli) {
		$g = new Game($mysqli);
		$ret = $g->openGame();
		if ($ret['isActive']) {
			return array("game" => $g, "returnValue" => $ret);
		} else {
			return array("game" => null, "returnValue" => $ret);
		}
	}
}
?>