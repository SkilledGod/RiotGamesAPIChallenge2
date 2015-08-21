<?php
class Phantom_Dancer extends Item {
	function __construct() {
		parent::__construct(3046, "Phantom Dancer", array("PercentMovementSpeedMod"=> 0.05,"PercentAttackSpeedMod"=> 0.5,"FlatCritChanceMod"=> 0.35,), "3046.png", "+50% Attack Speed<br>+35% Critical Strike Chance<br>+5% Movement Speed<br><br><unique>UNIQUE Passive:</unique> Champion can move through units.");
	}

	function applySpecial($champion, $enemy) {}
}
?>