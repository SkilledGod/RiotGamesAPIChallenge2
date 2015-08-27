<?php
include_once(dirname(__DIR__) ."/Item.php");
class Tear_of_the_Goddess_Crystal_Scar extends Item {
	function __construct() {
		parent::__construct(3073, "Tear of the Goddess (Crystal Scar)", array("FlatMPPoolMod"=> 250, "percentbasemanaregen" => 0.25), "3073.png", "<mana>+250 Mana<br>+25% Base Mana Regen <br><br><mana><unique>UNIQUE Passive - Mana Charge:</unique> Grants 5 maximum Mana on spell cast or Mana expenditure (up to 2 times per 6 seconds). Grants 1 maximum Mana every 6 seconds.<br><br>Caps at +750 Mana.</mana><br><br><i>(Unique Passives with the same name don't stack.)</i></mana>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>