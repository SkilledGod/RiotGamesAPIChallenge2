<?php
include_once(dirname(__DIR__) ."/Item.php");
class Defense_Upgrade_2 extends Item {
	function __construct() {
		parent::__construct(3625, "Defense Upgrade 2", array(), "3625.png", "Your mercenary permanently gains +200 HP (+300 total).<br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>