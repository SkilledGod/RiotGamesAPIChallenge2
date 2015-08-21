<?php
class Entropy extends Item {
	function __construct() {
		parent::__construct(3184, "Entropy", array("FlatHPPoolMod"=> 275,"FlatPhysicalDamageMod"=> 55,), "3184.png", "+275 Health<br>+55 Attack Damage<br><br><unique>UNIQUE Passive - Rage:</unique> Basic attacks grant 20 Movement Speed for 2 seconds on hit. Kills grant 60 Movement Speed for 2 seconds. This Movement Speed bonus is halved for ranged champions.<br><active>UNIQUE Active:</active> For the next 5 seconds, basic attacks reduce the target's Movement Speed by 30% and deal 80 true damage over 2.5 seconds on hit (60 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>