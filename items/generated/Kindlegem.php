<?php
include_once(dirname(__DIR__) ."/Item.php");
class Kindlegem extends Item {
	function __construct() {
		parent::__construct(3067, "Kindlegem", array("FlatHPPoolMod"=> 200,), "3067.png", "+200 Health  <br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applyEffect($champion) {
            $champion->applyEffect("kindlegem", "flatcooldownreduction", 10, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>