<?php
include_once(dirname(__DIR__) ."/Item.php");
class Skirmishers_Sabre extends Item {
	function __construct() {
		parent::__construct(3715, "Skirmisher's Sabre", array(), "3715.png", "+30 Bonus Gold per Large Monster Kill<br><passive>Passive - Challenging Smite:</passive> Smite can be cast on enemy champions, marking them for 4 seconds. While marked, basic attacks deal true damage over 3 seconds, you have vision of them, and their damage to you is reduced by 20%.<br><br><passive>Passive - Jungler:</passive> Deal 45 additional magic damage to monsters over 2 seconds and gain 10 Health Regen and 5 Mana Regen per second while under attack from neutral monsters.<br><br><groupLimit>Limited to 1 Jungle item</groupLimit>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>