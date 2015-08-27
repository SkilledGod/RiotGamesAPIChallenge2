<?php
include_once(dirname(__DIR__) ."/Item.php");
class Rabadons_Deathcap extends Item {
	function __construct() {
		parent::__construct(3089, "Rabadon's Deathcap", array("FlatMagicDamageMod"=> 120,), "3089.png", "+120 Ability Power  <br><br><unique>UNIQUE Passive:</unique> Increases Ability Power by 35%.");
	}

	function applyEffect($champion) {
            $champion->applyEffect("rabadons", "percentmagicdamage", 0.35, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>