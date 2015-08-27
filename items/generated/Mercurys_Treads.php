<?php
include_once(dirname(__DIR__) ."/Item.php");
class Mercurys_Treads extends Item {
	function __construct() {
		parent::__construct(3111, "Mercury's Treads", array("FlatSpellBlockMod"=> 25,), "3111.png", "+25 Magic Resist<br><br><unique>UNIQUE Passive - Enhanced Movement:</unique> +45 Movement Speed<br><unique>UNIQUE Passive - Tenacity:</unique> Reduces the duration of stuns, slows, taunts, fears, silences, blinds, polymorphs, and immobilizes by 35%.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("enhanced movement", "flatmovementspeed", 45, true);
            $champion->applyEffect("tenacity", "flattenacity", 0.35, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>