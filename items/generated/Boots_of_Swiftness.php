<?php
include_once(dirname(__DIR__) ."/Item.php");
class Boots_of_Swiftness extends Item {
	function __construct() {
		parent::__construct(3009, "Boots of Swiftness", array(), "3009.png", "<unique>UNIQUE Passive - Enhanced Movement:</unique> +60 Movement Speed<br><unique>UNIQUE Passive - Slow Resist:</unique> Movement slowing effects are reduced by 25%.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
	            $champion->applyEffect("enhanced movement", "flatmovementspeed", 60, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>