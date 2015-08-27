<?php
include_once(dirname(__DIR__) ."/Item.php");
class Thornmail extends Item {
	function __construct() {
		parent::__construct(3075, "Thornmail", array("FlatArmorMod"=> 100,), "3075.png", "+100 Armor  <br><br><unique>UNIQUE Passive:</unique> Upon being hit by a basic attack, returns 30% of the incoming damage (before being reduced by defenses) to the attacker as magic damage.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>