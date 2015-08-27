<?php
include_once(dirname(__DIR__) ."/Item.php");
class The_Brutalizer extends Item {
	function __construct() {
		parent::__construct(3134, "The Brutalizer", array("FlatPhysicalDamageMod"=> 25,), "3134.png", "+25 Attack Damage<br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction<br><unique>UNIQUE Passive:</unique> +10 Armor Penetration<br><br><i>(Armor Penetration: Physical damage is increased by ignoring an amount of the target's Armor equal to Armor Penetration.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("brutalizer", "flatcooldownreduction", 10, true);
            $champion->applyEffect("brutalizer", "flatarmorpenetration", 10, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>