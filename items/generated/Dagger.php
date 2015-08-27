<?php
include_once(dirname(__DIR__) ."/Item.php");
class Dagger extends Item {
	function __construct() {
		parent::__construct(1042, "Dagger", array("PercentAttackSpeedMod"=> 0.15,), "1042.png", "+15% Attack Speed");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>