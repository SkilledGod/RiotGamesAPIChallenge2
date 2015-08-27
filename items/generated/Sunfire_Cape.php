<?php
include_once(dirname(__DIR__) ."/Item.php");
class Sunfire_Cape extends Item {
	function __construct() {
		parent::__construct(3068, "Sunfire Cape", array("FlatHPPoolMod"=> 450,"FlatArmorMod"=> 45,), "3068.png", "+450 Health<br>+45 Armor  <br><br><unique>UNIQUE Passive - Immolate:</unique> Deals 25 (+1 per champion level) magic damage per second to nearby enemies.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>