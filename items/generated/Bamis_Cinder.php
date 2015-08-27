<?php
include_once(dirname(__DIR__) ."/Item.php");
class Bamis_Cinder extends Item {
	function __construct() {
		parent::__construct(3751, "Bami's Cinder", array("FlatHPPoolMod"=> 300,), "3751.png", "+300 Health  <br><br><unique>UNIQUE Passive - Immolate:</unique> Deals 5 (+1 per champion level) magic damage per second to nearby enemies. Deals 50% bonus damage to minions and monsters.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>