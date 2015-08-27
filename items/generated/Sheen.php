<?php
include_once(dirname(__DIR__) ."/Item.php");
class Sheen extends Item {
	function __construct() {
		parent::__construct(3057, "Sheen", array("FlatMPPoolMod"=> 200,"FlatMagicDamageMod"=> 25,), "3057.png", "+25 Ability Power<br><mana>+200 Mana</mana><br><br><unique>UNIQUE Passive - Spellblade:</unique> After using an ability, the next basic attack deals bonus physical damage equal to 100% base Attack Damage on hit (1.5 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>