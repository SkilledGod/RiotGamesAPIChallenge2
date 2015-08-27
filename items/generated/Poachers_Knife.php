<?php
include_once(dirname(__DIR__) ."/Item.php");
class Poachers_Knife extends Item {
	function __construct() {
		parent::__construct(3711, "Poacher's Knife", array(), "3711.png", "+30 Bonus Gold per Large Monster Kill<br><passive>Passive - Scavenging Smite:</passive> When you Smite a large monster in the enemy jungle, you gain half a charge of Smite. If you kill that monster, you gain +20 bonus Gold, and you gain 175% increased Movement Speed decaying over 2 seconds.<br><br><passive>Passive - Jungler:</passive> Deal 45 additional magic damage to monsters over 2 seconds and gain 10 Health Regen and 5 Mana Regen per second while under attack from neutral monsters.<br><br><groupLimit>Limited to 1 Jungle item</groupLimit>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>