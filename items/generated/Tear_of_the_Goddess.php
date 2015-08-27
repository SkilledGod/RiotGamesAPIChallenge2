<?php
include_once(dirname(__DIR__) ."/Item.php");
class Tear_of_the_Goddess extends Item {
	function __construct() {
		parent::__construct(3070, "Tear of the Goddess", array("FlatMPPoolMod"=> 250, "percentbasemanaregen" => 0.25), "3070.png", "<mana>+250 Mana<br>+25% Base Mana Regen </mana><br><br><mana><unique>UNIQUE Passive - Mana Charge:</unique> Grants 4 maximum Mana on spell cast or Mana expenditure (up to 2 times per 8 seconds). Grants 1 maximum Mana every 8 seconds.<br><br>Caps at +750 Mana.</mana><br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>