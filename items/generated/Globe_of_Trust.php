<?php
include_once(dirname(__DIR__) ."/Item.php");
class Globe_of_Trust extends Item {
	function __construct() {
		parent::__construct(3840, "Globe of Trust", array("flatcooldownreduction" => 20, "percentbasemanaregen" => 1.5), "3840.png", "+20% Cooldown Reduction<br><mana>+150% Base Mana Regen </mana><br><br><unique>UNIQUE Active - Safe Harbor:</unique> Lobs a bubble that shields nearby allies for 150 Health and generates gold equal to 25% of the damage absorbed (maximum of 100 gold per cast) (15 second cooldown). Self cast shields will not generate gold from Monster damage.<br><br><i><font color='#FDD017'>''Theft is better with accomplices.''</font></i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>