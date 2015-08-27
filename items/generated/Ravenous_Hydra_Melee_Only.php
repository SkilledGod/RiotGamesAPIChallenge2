<?php
include_once(dirname(__DIR__) ."/Item.php");
class Ravenous_Hydra_Melee_Only extends Item {
	function __construct() {
		parent::__construct(3074, "Ravenous Hydra (Melee Only)", array("FlatPhysicalDamageMod"=> 75,"PercentLifeStealMod"=> 0.12, "percentbasehealthregen" => 1), "3074.png", "+75 Attack Damage<br>+100% Base Health Regen <br>+12% Life Steal<br><br><passive>Passive:</passive> Life Steal applies to damage dealt by this item.<br><unique>UNIQUE Passive - Cleave:</unique> Basic attacks deal 20% to 60% of total Attack Damage as bonus physical damage to enemies near the target on hit (enemies closest to the target take the most damage).<br><active>UNIQUE Active - Crescent:</active> Deals 60% to 100% of total Attack Damage as physical damage to nearby enemy units (closest enemies take the most damage) (10 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>