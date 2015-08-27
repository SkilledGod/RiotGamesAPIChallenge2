<?php
include_once(dirname(__DIR__) ."/Item.php");
class Frozen_Mallet extends Item {
	function __construct() {
		parent::__construct(3022, "Frozen Mallet", array("FlatHPPoolMod"=> 700,"FlatPhysicalDamageMod"=> 30,), "3022.png", "+700 Health<br>+30 Attack Damage<br><br><unique>UNIQUE Passive - Icy:</unique> Basic attacks slow the target's Movement Speed for 1.5 seconds on hit (40% slow for melee attacks, 30% slow for ranged attacks).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>