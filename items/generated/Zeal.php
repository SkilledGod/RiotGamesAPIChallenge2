<?php
class Zeal extends Item {
	function __construct() {
		parent::__construct(3086, "Zeal", array("PercentMovementSpeedMod"=> 0.05,"PercentAttackSpeedMod"=> 0.2,"FlatCritChanceMod"=> 0.1,), "3086.png", "+20% Attack Speed<br>+10% Critical Strike Chance<br>+5% Movement Speed");
	}

	function applySpecial($champion, $enemy) {}
}
?>