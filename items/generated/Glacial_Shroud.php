<?php
class Glacial_Shroud extends Item {
	function __construct() {
		parent::__construct(3024, "Glacial Shroud", array("FlatMPPoolMod"=> 250,"FlatArmorMod"=> 20, "FlatCooldownReduction" => 10), "3024.png", "+20 Armor<br><mana>+250 Mana</mana><br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applySpecial($champion, $enemy) {}
}
?>
