<?php
include_once(dirname(__DIR__) ."/Item.php");
class Brawlers_Gloves extends Item {
	function __construct() {
		parent::__construct(1051, "Brawler's Gloves", array("FlatCritChanceMod"=> 0.08,), "1051.png", "+8% Critical Strike Chance");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>