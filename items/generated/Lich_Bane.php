<?php
include_once(dirname(__DIR__) ."/Item.php");
class Lich_Bane extends Item {
	function __construct() {
		parent::__construct(3100, "Lich Bane", array("FlatMPPoolMod"=> 250,"FlatMagicDamageMod"=> 80,), "3100.png", "+80 Ability Power<br>+5% Movement Speed<br><mana>+250 Mana</mana><br><br><unique>UNIQUE Passive - Spellblade:</unique> After using an ability, the next basic attack deals 75% Base Attack Damage (+50% of Ability Power) bonus magic damage on hit (1.5 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("lich bane", "percentmovementspeed", 0.05, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>