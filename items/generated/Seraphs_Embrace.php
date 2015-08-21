<?php
class Seraphs_Embrace extends Item {
	function __construct() {
		parent::__construct(3048, "Seraph's Embrace", array("FlatMPPoolMod"=> 1000,"FlatMagicDamageMod"=> 80,), "3048.png", "+80 Ability Power<br><mana>+1000 Mana<br>+50% Base Mana Regen </mana><br><br><mana><unique>UNIQUE Passive - Insight:</unique> Grants Ability Power equal to 3% of maximum Mana.</mana><br><active>UNIQUE Active - Mana Shield:</active> Consumes 20% of current Mana to grant a shield for 3 seconds that absorbs damage equal to 150 plus the amount of Mana consumed (120 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>