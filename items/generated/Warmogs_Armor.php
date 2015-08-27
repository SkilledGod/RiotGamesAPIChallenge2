<?php
include_once(dirname(__DIR__) ."/Item.php");
class Warmogs_Armor extends Item {
	function __construct() {
		parent::__construct(3083, "Warmog's Armor", array("FlatHPPoolMod"=> 800,), "3083.png", "+800 Health<br><br><unique>UNIQUE Passive:</unique> Restores 1% of maximum Health every 5 seconds. Health restore increases to 3% of maximum Health if damage hasn't been taken within 8 seconds.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>