<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Cinderhulk extends Item {
	function __construct() {
		parent::__construct(3725, "Enchantment: Cinderhulk", array("flathpool" => 300, "percentbonushealth" => 0.25), "3725.png", "+300 Health<br>+25% Bonus Health<br><br><unique>UNIQUE Passive - Immolate:</unique> Deals 15 (+0.6 per champion level) magic damage a second to nearby enemies. Deals 100% bonus damage to monsters. ");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>