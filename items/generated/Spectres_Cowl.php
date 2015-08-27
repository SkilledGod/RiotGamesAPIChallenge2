<?php
include_once(dirname(__DIR__) ."/Item.php");
class Spectres_Cowl extends Item {
	function __construct() {
		parent::__construct(3211, "Spectre's Cowl", array("FlatHPPoolMod"=> 200,"FlatSpellBlockMod"=> 35,), "3211.png", "+200 Health<br>+35 Magic Resist<br><br><unique>UNIQUE Passive:</unique> Grants 150% Base Health Regen for up to 10 seconds after taking damage from an enemy champion.<br><br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>