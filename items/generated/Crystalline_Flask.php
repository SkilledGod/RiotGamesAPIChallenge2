<?php
include_once(dirname(__DIR__) ."/Item.php");
class Crystalline_Flask extends Item {
	function __construct() {
		parent::__construct(2041, "Crystalline Flask", array(), "2041.png", "<unique>UNIQUE Passive:</unique> Holds 3 charges and refills upon visiting the shop.<br><active>UNIQUE Active:</active> Consumes a charge to restore 120 Health and 60 Mana over 12 seconds.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>