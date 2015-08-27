<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Runeglaive extends Item {
	function __construct() {
		parent::__construct(3724, "Enchantment: Runeglaive", array("flatmagicdamage" => 200, "FlatMPPoolMod"=> 200, "flatcooldownreduction" => 10), "3724.png", "+50 Ability Power<br><mana>+200 Mana</mana><br>+10% Cooldown Reduction<br><br><unique>UNIQUE Passive - Spellblade:</unique> After using an ability, the next basic attack deals 100% Base Attack Damage (+30% of Ability Power) bonus magic damage on hit (1.5 second cooldown). When directly attacking a monster, the bonus damage is reapplied in an AoE around the target, and 8% of your missing Mana is restored.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>