<?php
include_once(dirname(__DIR__) ."/Item.php");
class Zhonyas_Hourglass extends Item {
	function __construct() {
		parent::__construct(3157, "Zhonya's Hourglass", array("FlatArmorMod"=> 50,"FlatMagicDamageMod"=> 100,), "3157.png", "+100 Ability Power<br>+50 Armor  <br><br><active>UNIQUE Active - Stasis:</active> Champion becomes invulnerable and untargetable for 2.5 seconds, but is unable to move, attack, cast spells, or use items during this time (90 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>