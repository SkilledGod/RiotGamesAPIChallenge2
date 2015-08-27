<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Warrior extends Item {
	function __construct() {
		parent::__construct(3723, "Enchantment: Warrior", array("flatphysicaldamage" => 40, "flatcooldownreduction" => 10), "3723.png", "+40 Attack Damage<br>+10% Cooldown Reduction<br>+10 Armor Penetration");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>