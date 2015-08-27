<?php
include_once(dirname(__DIR__) ."/Item.php");
class Guardian_Angel extends Item {
	function __construct() {
		parent::__construct(3026, "Guardian Angel", array("FlatArmorMod"=> 50,"FlatSpellBlockMod"=> 50,), "3026.png", "+50 Armor<br>+50 Magic Resist<br><br><unique>UNIQUE Passive:</unique> Upon taking lethal damage, restores 30% of maximum Health and Mana after 4 seconds of stasis (300 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>