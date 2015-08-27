<?php
include_once(dirname(__DIR__) ."/Item.php");
class Deaths_Daughter extends Item {
	function __construct() {
		parent::__construct(3902, "Death's Daughter", array(), "3902.png", "Requires 500 Silver Serpents.<br><br><unique>UNIQUE Passive:</unique>  Cannon Barrage additionally fires a mega-cannonball at center of the Barrage, dealing 300% true damage and slowing them by 60% for 1.5 seconds. ");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>