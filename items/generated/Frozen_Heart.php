<?php
include_once(dirname(__DIR__) ."/Item.php");
class Frozen_Heart extends Item {
	function __construct() {
		parent::__construct(3110, "Frozen Heart", array("FlatMPPoolMod"=> 400,"FlatArmorMod"=> 100, "flatcooldownreduction" => 20), "3110.png", "+100 Armor<br>+20% Cooldown Reduction<br><mana>+400 Mana</mana><br><br><aura>UNIQUE Aura:</aura> Reduces the Attack Speed of nearby enemies by 15%.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {
            $enemy->applyEffect("frozen heart", "asSlow", 0.15, true);
        }
}
?>