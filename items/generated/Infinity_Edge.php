<?php
include_once(dirname(__DIR__) ."/Item.php");
class Infinity_Edge extends Item {
	function __construct() {
		parent::__construct(3031, "Infinity Edge", array("FlatPhysicalDamageMod"=> 80,"FlatCritChanceMod"=> 0.2,), "3031.png", "+80 Attack Damage<br>+20% Critical Strike Chance<br><br><unique>UNIQUE Passive:</unique> Critical strikes deal 250% damage instead of 200%.");
	}

	function applyEffect($champion) {
            $champion->applyEffect("infinity edge", "flatcritdamage", 0.5, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>