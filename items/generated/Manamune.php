<?php
class Manamune extends Item {
	function __construct() {
		parent::__construct(3004, "Manamune", array("FlatMPPoolMod"=> 250,"FlatPhysicalDamageMod"=> 25,), "3004.png", "+25 Attack Damage<br><mana>+250 Mana<br>+25% Base Mana Regen </mana><br><br><mana><unique>UNIQUE Passive - Awe:</unique> Grants bonus Attack Damage equal to 2% of maximum Mana.<br><unique>UNIQUE Passive - Mana Charge:</unique> Grants +4 maximum Mana (max +750 Mana) for each basic attack, spell cast, and Mana expenditure (occurs up to 2 times every 8 seconds).<br><br>Transforms into Muramana at +750 Mana.</mana><br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>