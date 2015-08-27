<?php
include_once(dirname(__DIR__) ."/Item.php");
class Crystalline_Bracer extends Item {
	function __construct() {
		parent::__construct(3801, "Crystalline Bracer", array("FlatHPPoolMod"=> 200, "percentbasehealthregen" => 0.5), "3801.png", "+200 Health<br>+50% Base Health Regen ");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>