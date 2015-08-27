<?php
include_once(dirname(__DIR__) ."/Item.php");
class Prototype_Hex_Core extends Item {
	function __construct() {
		parent::__construct(3200, "Prototype Hex Core", array("flatmagicdamageperlevel" => 3), "3200.png", "+3 Ability Power per level<br><br><passive>UNIQUE Passive - Progress:</passive> This item can be upgraded three times to enhance Viktor's basic abilities.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>