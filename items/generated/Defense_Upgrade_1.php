<?php
include_once(dirname(__DIR__) ."/Item.php");
class Defense_Upgrade_1 extends Item {
	function __construct() {
		parent::__construct(3624, "Defense Upgrade 1", array(), "3624.png", "Your mercenary permanently gains +100 HP (+100 total).<br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>