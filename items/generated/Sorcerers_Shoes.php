<?php
include_once(dirname(__DIR__) ."/Item.php");
class Sorcerers_Shoes extends Item {
	function __construct() {
		parent::__construct(3020, "Sorcerer's Shoes", array("flatspellblockpenetration" => 15), "3020.png", "+15 Magic Penetration<br><br><unique>UNIQUE Passive - Enhanced Movement:</unique> +45 Movement Speed<br><br><i>(Magic Penetration: Magic damage is increased by ignoring an amount of the target's Magic Resist equal to Magic Penetration.)</i><br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("enhanced movement", "flatmovementspeed", 45, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>