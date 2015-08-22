<?php
class Tiamat_Melee_Only extends Item {
	function __construct() {
		parent::__construct(3077, "Tiamat (Melee Only)", array("FlatPhysicalDamageMod"=> 40, "PercentBaseHealthRegenMod" => 1), "3077.png", "+40 Attack Damage<br>+100% Base Health Regen <br><br><unique>UNIQUE Passive - Cleave:</unique> Basic attacks deal 20% to 60% of total Attack Damage as bonus physical damage to enemies near the target on hit (enemies closest to the target take the most damage).<br><active>UNIQUE Active - Crescent:</active> Deals 60% to 100% of total Attack Damage as physical damage to nearby enemy units (enemies closest to the target take the most damage) (10 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
