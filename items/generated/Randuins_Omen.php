<?php
include_once(dirname(__DIR__) ."/Item.php");
class Randuins_Omen extends Item {
	function __construct() {
		parent::__construct(3143, "Randuin's Omen", array("FlatHPPoolMod"=> 500,"FlatArmorMod"=> 70,), "3143.png", "+500 Health<br>+70 Armor<br><br><unique>UNIQUE Passive - Cold Steel:</unique> When hit by basic attacks, reduces the attacker's Attack Speed by 15%.<br><active>UNIQUE Active:</active> Slows the Movement Speed of nearby enemy units by 35% for 2 seconds (+1 second per 200 Armor and +1 second per 200 Magic Resist) (60 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>