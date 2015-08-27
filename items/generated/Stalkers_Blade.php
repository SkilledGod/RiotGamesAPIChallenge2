<?php
include_once(dirname(__DIR__) ."/Item.php");
class Stalkers_Blade extends Item {
	function __construct() {
		parent::__construct(3706, "Stalker's Blade", array(), "3706.png", "+30 Bonus Gold per Large Monster Kill<br><passive>Passive - Chilling Smite:</passive> Smite can be cast on enemy champions, dealing reduced true damage and stealing 20% movement speed for 2 seconds. <br><br><passive>Passive - Jungler:</passive> Deal 45 additional magic damage to monsters over 2 seconds and gain 10 Health Regen and 5 Mana Regen per second while under attack from neutral monsters.<br><br><groupLimit>Limited to 1 Jungle item</groupLimit>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>