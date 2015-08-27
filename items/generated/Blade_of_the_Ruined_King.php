<?php
include_once(dirname(__DIR__) ."/Item.php");
class Blade_of_the_Ruined_King extends Item {
	function __construct() {
		parent::__construct(3153, "Blade of the Ruined King", array("FlatPhysicalDamageMod"=> 25,"PercentAttackSpeedMod"=> 0.4,"PercentLifeStealMod"=> 0.1,), "3153.png", "+25 Attack Damage<br>+40% Attack Speed<br>+10% Life Steal<br><br><unique>UNIQUE Passive:</unique> Basic attacks deal 8% of the target's current Health in bonus physical damage (max 60 vs. monsters and minions) on hit.<br><active>UNIQUE Active:</active> Deals 10% of target champion's maximum Health (min. 100) as physical damage, heals for the same amount, and steals 25% of the target's Movement Speed for 3 seconds (90 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>