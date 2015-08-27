<?php
include_once(dirname(__DIR__) ."/Item.php");
class Murksphere extends Item {
	function __construct() {
		parent::__construct(3844, "Murksphere", array("flatcooldownreduction" => 5, "percentbasemanaregen" => 0.25), "3844.png", "+5% Cooldown Reduction<mana><br>+25% Base Mana Regen </mana><br><br><unique>UNIQUE Active - Swindler's Shield:</unique> Shield ally for 60 Health and generate gold equal to 25% of the damage absorbed (15 second cooldown). Self cast shields will not generate gold from Monster damage.<br><br><i><font color='#FDD017'>''Profit makes fast friends.''</font></i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>