<?php
class Essence_Reaver extends Item {
	function __construct() {
		parent::__construct(3508, "Essence Reaver", array("FlatPhysicalDamageMod"=> 80,"PercentLifeStealMod"=> 0.1, "FlatCooldownReduction" => 10), "3508.png", "+80 Attack Damage<br>+10% Life Steal<br>+10% Cooldown Reduction<br><br><mana><passive>UNIQUE Passive:</passive> Restores 2% to 8% of the damage dealt by basic attacks as Mana. This effect increases based on missing Mana.</mana>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
