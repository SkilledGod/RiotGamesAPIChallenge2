<?php
include_once(dirname(__DIR__) ."/Item.php");
class The_Black_Spear extends Item {
	function __construct() {
		parent::__construct(3599, "The Black Spear", array(), "3599.png", "<br><passive>Active:</passive> Offer to bind with an ally for the remainder of the game, becoming Oathsworn Allies. Oathsworn empowers you both while near one another.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>