<?php
class Enchantment_Warrior extends Item {
	function __construct() {
		parent::__construct(3723, "Enchantment: Warrior", array("FlatCooldownReductionMod" => 10, "FlatArmorPenetrationMod" => 10), "3723.png", "+40 Attack Damage<br>+10% Cooldown Reduction<br>+10 Armor Penetration");
	}

	function applySpecial($champion, $enemy) {}
}
?>
