<?php
class Zephyr extends Item {
	function __construct() {
		parent::__construct(3172, "Zephyr", array("FlatPhysicalDamageMod"=> 25,"PercentMovementSpeedMod"=> 0.1,"PercentAttackSpeedMod"=> 0.5,), "3172.png", "+25 Attack Damage<br>+50% Attack Speed<br>+10% Movement Speed<br>+10% Cooldown Reduction<br><br><unique>UNIQUE Passive - Tenacity:</unique> Reduces the duration of stuns, slows, taunts, fears, silences, blinds, polymorphs, and immobilizes by 35%.<br><br><i>(Unique Passives with the same name do not stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>