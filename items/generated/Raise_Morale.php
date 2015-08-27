<?php
include_once(dirname(__DIR__) ."/Item.php");
class Raise_Morale extends Item {
	function __construct() {
		parent::__construct(3903, "Raise Morale", array(), "3903.png", "Requires 500 Silver Serpents.<br><br><unique>UNIQUE Passive:</unique> Allies in the Cannon Barrage gain 30% Movement Speed for 2 seconds.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>