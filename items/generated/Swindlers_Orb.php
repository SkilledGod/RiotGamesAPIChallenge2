<?php
include_once(dirname(__DIR__) ."/Item.php");
class Swindlers_Orb extends Item {
	function __construct() {
		parent::__construct(3841, "Swindler's Orb", array("flatcooldownreduction" => 10, "percentbasemanaregen" => 0.5), "3841.png", "+10% Cooldown Reduction<mana><br>+50% Base Mana Regen </mana><br><br><unique>UNIQUE Active - Swindler's Shield:</unique> Shield ally for 100 Health and generate gold equal to 25% of the damage absorbed (15 second cooldown). Self cast shields will not generate gold from Monster damage.<br><br><i><font color='#FDD017'>''Partners in crime.''</font></i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>