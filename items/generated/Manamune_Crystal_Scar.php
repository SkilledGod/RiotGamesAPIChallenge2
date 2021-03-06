<?php
include_once(dirname(__DIR__) ."/Item.php");
class Manamune_Crystal_Scar extends Item {
	function __construct() {
		parent::__construct(3008, "Manamune (Crystal Scar)", array("FlatMPPoolMod"=> 250,"FlatPhysicalDamageMod"=> 25, "percentbasemanaregen" => 0.25), "3008.png", "+25 Attack Damage<br><mana>+250 Mana<br>+25% Base Mana Regen </mana><br><br><mana><unique>UNIQUE Passive - Awe:</unique> Grants bonus Attack Damage equal to 2% of maximum Mana.<br><unique>UNIQUE Passive - Mana Charge:</unique> Grants +8 maximum Mana (max +750 Mana) for each basic attack, spell cast, and Mana expenditure (occurs up to 2 times every 6 seconds).<br><br>Transforms into Muramana at +750 Mana.<br></mana><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("awe", "adperpercentmaxmana", 0.02, true);
        }
	function applyEffectEnemy($enemy) {}
}
?>