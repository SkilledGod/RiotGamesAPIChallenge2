<?php
include_once(dirname(__DIR__) ."/Item.php");
class Stinger extends Item {
	function __construct() {
		parent::__construct(3101, "Stinger", array("PercentAttackSpeedMod"=> 0.4,), "3101.png", "+40% Attack Speed<br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applyEffect($champion) {
            $champion->applyEffect("stinger", "flatcooldownreduction", 10, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>