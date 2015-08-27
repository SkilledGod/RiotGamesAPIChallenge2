<?php
include_once(dirname(__DIR__) ."/Item.php");
class Sword_of_the_Occult extends Item {
	function __construct() {
		parent::__construct(3141, "Sword of the Occult", array("FlatPhysicalDamageMod"=> 10,), "3141.png", "+10 Attack Damage <br><br><unique>UNIQUE Passive:</unique> Grants +5 Attack Damage per stack and 5 stacks upon first purchase. Grants 2 stacks for a kill or 1 stack for an assist (max 20 stacks). Half of the stacks are lost upon death. At 20 stacks, grants +20% bonus Attack Speed.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>