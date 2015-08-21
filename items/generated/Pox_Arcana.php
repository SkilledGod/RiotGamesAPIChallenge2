<?php
class Pox_Arcana extends Item {
	function __construct() {
		parent::__construct(3434, "Pox Arcana", array("FlatMagicDamageMod"=> 100,), "3434.png", "+100 Ability Power<br><mana>+100% Base Mana Regen </mana><br>+20% Cooldown Reduction<br><br><unique>UNIQUE Passive - Pox:</unique> Damaging spells apply a stack of Pox (max of 5) to enemy champions hit for 10 seconds. <br><br><unique>UNIQUE Active - Disease Harvest:</unique> Deals 100 magic damage plus 20 (+5% of Ability Power) per stack of Pox to all nearby enemies affected by Pox, and restores 5% of maximum mana to the caster per stack of Pox on enemies hit (60 second cooldown).<br><br><i><font color='#FDD017'>''Wealth, land, secrets, love; how little they cherish when their bodies betray them.''</font></i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>