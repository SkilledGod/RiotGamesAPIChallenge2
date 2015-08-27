<?php
include_once(dirname(__DIR__) ."/Item.php");
class Defense_Upgrade_3 extends Item {
	function __construct() {
		parent::__construct(3626, "Defense Upgrade 3", array(), "3626.png", "Your mercenary permanently gains +300 HP (+600 total).<br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>