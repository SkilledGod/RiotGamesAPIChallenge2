<?php
class Chalice_of_Harmony extends Item {
	function __construct() {
		parent::__construct(3028, "Chalice of Harmony", array("FlatSpellBlockMod"=> 25,"PercentBaseManaRegen" => 0.5), "3028.png", "+25 Magic Resist<br><mana>+50% Base Mana Regen </mana><br><br><unique>UNIQUE Passive - Mana Font:</unique> Restores 2% of missing Mana every 5 seconds.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {
	}
}
?>
