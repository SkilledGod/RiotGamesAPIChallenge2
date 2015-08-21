<?php
class Youmuus_Ghostblade extends Item {
	function __construct() {
		parent::__construct(3142, "Youmuu's Ghostblade", array("FlatPhysicalDamageMod"=> 30,"FlatCritChanceMod"=> 0.15,), "3142.png", "+30 Attack Damage<br>+15% Critical Strike Chance<br>+10% Cooldown Reduction<br><br><passive>UNIQUE Passive:</passive> +20 Armor Penetration</passive><br><active>UNIQUE Active:</active> Grants +20% Movement Speed and +40% Attack Speed for 6 seconds (45 second cooldown).<br><br><i>(Armor Penetration: Physical damage is increased by ignoring an amount of the target's Armor equal to Armor Penetration.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>