<?php
class The_Brutalizer extends Item {
	function __construct() {
		parent::__construct(3134, "The Brutalizer", array("FlatPhysicalDamageMod"=> 25,), "3134.png", "+25 Attack Damage<br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction<br><unique>UNIQUE Passive:</unique> +10 Armor Penetration<br><br><i>(Armor Penetration: Physical damage is increased by ignoring an amount of the target's Armor equal to Armor Penetration.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>