<?php
class Seekers_Armguard extends Item {
	function __construct() {
		parent::__construct(3191, "Seeker's Armguard", array("FlatArmorMod"=> 30,"FlatMagicDamageMod"=> 25,), "3191.png", "+30 Armor<br>+25 Ability Power<br><br><passive>UNIQUE Passive:</passive> Killing a unit grants 0.5 bonus Armor and Ability Power. This bonus stacks up to 30 times.");
	}

	function applySpecial($champion, $enemy) {}
}
?>