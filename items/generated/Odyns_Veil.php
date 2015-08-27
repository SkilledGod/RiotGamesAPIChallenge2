<?php
include_once(dirname(__DIR__) ."/Item.php");
class Odyns_Veil extends Item {
	function __construct() {
		parent::__construct(3180, "Odyn's Veil", array("FlatHPPoolMod"=> 350,"FlatMPPoolMod"=> 350,"FlatSpellBlockMod"=> 50,), "3180.png", "+350 Health<br>+350 Mana<br>+50 Magic Resist<br><br><unique>UNIQUE Passive:</unique> Reduces and stores 10% of magic damage received. <br><active>UNIQUE Active:</active> Deals 200 + (stored magic) (max 400) magic damage to nearby enemy units (90 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>