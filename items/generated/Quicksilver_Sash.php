<?php
include_once(dirname(__DIR__) ."/Item.php");
class Quicksilver_Sash extends Item {
	function __construct() {
		parent::__construct(3140, "Quicksilver Sash", array("FlatSpellBlockMod"=> 30,), "3140.png", "+30 Magic Resist<br><br><active>UNIQUE Active - Quicksilver:</active> Removes all debuffs (90 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>