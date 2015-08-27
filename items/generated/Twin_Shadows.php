<?php
include_once(dirname(__DIR__) ."/Item.php");
class Twin_Shadows extends Item {
	function __construct() {
		parent::__construct(3290, "Twin Shadows", array("FlatMagicDamageMod"=> 80,"PercentMovementSpeedMod"=> 0.06, "flatcooldownreduction" => 10), "3290.png", "+80 Ability Power<br>+10% Cooldown Reduction<br>+6% Movement Speed<br><br><unique>UNIQUE Passive - Trap Detection:</unique> Nearby stealthed enemy traps are revealed.<br><active>UNIQUE Active - Hunt:</active> Summons up to 2 invulnerable ghosts that seek out the 2 nearest enemy champions for 6 seconds. If a ghost reaches its target, it reveals the target and reduces their Movement Speed by 40% for 2.5 seconds.<br><br>If a ghost cannot find a target, it tries to return to the caster. Ghosts that successfully return in this way reduce the item's cooldown by 20 seconds (60 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>