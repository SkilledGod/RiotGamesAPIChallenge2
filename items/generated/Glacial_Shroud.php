<?php
include_once(dirname(__DIR__) ."/Item.php");
class Glacial_Shroud extends Item {
	function __construct() {
		parent::__construct(3024, "Glacial Shroud", array("FlatMPPoolMod"=> 250,"FlatArmorMod"=> 20,), "3024.png", "+20 Armor<br><mana>+250 Mana</mana><br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applyEffect($champion) {
            $champion->applyEffect("glacial shroud", "flatcooldownreduction", 10, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>