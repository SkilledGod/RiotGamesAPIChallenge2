<?php
include_once(dirname(__DIR__) ."/Item.php");
class Sapphire_Crystal extends Item {
	function __construct() {
		parent::__construct(1027, "Sapphire Crystal", array("FlatMPPoolMod"=> 200,), "1027.png", "<mana>+200 Mana</mana>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>