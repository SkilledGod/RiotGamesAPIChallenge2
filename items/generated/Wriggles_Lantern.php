<?php
include_once(dirname(__DIR__) ."/Item.php");
class Wriggles_Lantern extends Item {
	function __construct() {
		parent::__construct(3154, "Wriggle's Lantern", array("FlatPhysicalDamageMod"=> 12,"PercentAttackSpeedMod"=> 0.3,), "3154.png", "+12 Attack Damage<br>+30% Attack Speed<br><br><unique>UNIQUE Passive - Maim:</unique> Basic attacks against monsters deal 75 bonus magic damage and heal 10 Health on hit.<br><unique>UNIQUE Passive:</unique> Gain 30% increased Gold from monsters.<br><active>UNIQUE Active:</active> Places a <font color='#BBFFFF'>Stealth Ward</font> that reveals the surrounding area for 180 seconds (180 second cooldown).<br><br>Transforms into Feral Flare at 30 kills, assists and large monster kills.<br><i>(Champions and monsters killed with Hunter's Machete and Madred's Razors count toward this transformation)</i><br><br><groupLimit>Limited to 1 Gold Income item</groupLimit>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>