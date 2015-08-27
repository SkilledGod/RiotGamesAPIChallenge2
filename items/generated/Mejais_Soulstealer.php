<?php
include_once(dirname(__DIR__) ."/Item.php");
class Mejais_Soulstealer extends Item {
	function __construct() {
		parent::__construct(3041, "Mejai's Soulstealer", array("FlatMagicDamageMod"=> 20,), "3041.png", "+20 Ability Power  <br><br><unique>UNIQUE Passive:</unique> Grants +8 Ability Power per stack and 5 stacks upon first purchase. Grants 2 stacks for a kill or 1 stack for an assist (max 20 stacks). Half of the stacks are lost upon death. At 20 stacks, grants +15% Cooldown Reduction.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>