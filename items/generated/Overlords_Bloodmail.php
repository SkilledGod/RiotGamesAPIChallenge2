<?php
include_once(dirname(__DIR__) ."/Item.php");
class Overlords_Bloodmail extends Item {
	function __construct() {
		parent::__construct(3084, "Overlord's Bloodmail", array("FlatHPPoolMod"=> 800, "percentbasehealthregen" => 1), "3084.png", "+800 Health<br>+100% Base Health Regen <br><br><unique>UNIQUE Passive:</unique> Upon champion kill or assist, restores 300 Health over 5 seconds.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>