<?php
include_once(dirname(__DIR__) ."/Item.php");
class Spirit_Visage extends Item {
	function __construct() {
		parent::__construct(3065, "Spirit Visage", array("FlatHPPoolMod"=> 400,"FlatSpellBlockMod"=> 55, "percentbasehealthregen" => 1, "flatcooldownreduction" => 10), "3065.png", "+400 Health<br>+55 Magic Resist<br>+100% Base Health Regen <br>+10% Cooldown Reduction<br><br><unique>UNIQUE Passive:</unique> Increases all healing received by 20%.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>