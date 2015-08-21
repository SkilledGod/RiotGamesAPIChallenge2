<?php
class Runaans_Hurricane_Ranged_Only extends Item {
	function __construct() {
		parent::__construct(3085, "Runaan's Hurricane (Ranged Only)", array("PercentAttackSpeedMod"=> 0.7,), "3085.png", "+70% Attack Speed<br><br><unique>UNIQUE Passive:</unique> When basic attacking, bolts are fired at up to 2 enemies near the target, each dealing (50% of Attack Damage) physical damage. These bolts apply on-hit effects.<br><unique>UNIQUE Passive:</unique> Basic attacks deal an additional 10 physical damage on hit.<br> ");
	}

	function applySpecial($champion, $enemy) {}
}
?>