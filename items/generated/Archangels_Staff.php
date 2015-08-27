<?php
include_once(dirname(__DIR__) ."/Item.php");
class Archangels_Staff extends Item {
	function __construct() {
		parent::__construct(3003, "Archangel's Staff", array("FlatMPPoolMod"=> 250,"FlatMagicDamageMod"=> 80, "percentbasemanaregen" => 0.5), "3003.png", "+80 Ability Power<br><mana>+250 Mana<br>+50% Base Mana Regen </mana><br><br><mana><unique>UNIQUE Passive - Insight:</unique> Grants Ability Power equal to 3% of maximum Mana.<br><unique>UNIQUE Passive - Mana Charge:</unique> Grants +8 maximum Mana (max +750 Mana) for each spell cast and Mana expenditure (occurs up to 2 times every 8 seconds). Transforms into Seraph's Embrace at +750 Mana.</mana><br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
		$champion->applyEffect("insight", "flatmagicdamagepercentmanapool", 0.03, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>
