<?php
include_once(dirname(__DIR__) ."/Item.php");
class Rod_of_Ages extends Item {
	function __construct() {
		parent::__construct(3027, "Rod of Ages", array("FlatHPPoolMod"=> 500,"FlatMPPoolMod"=> 800,"FlatMagicDamageMod"=> 100,), "3027.png", "+300 Health<br><mana>+400 Mana</mana><br>+60 Ability Power<br><br><passive>Passive:</passive> Grants +20 Health, +40 Mana, and +4 Ability Power per stack (max +200 Health, +400 Mana, and +40 Ability Power). Grants 1 stack per minute (max 10 stacks).<br><unique>UNIQUE Passive - Valor's Reward:</unique> Upon leveling up, restores 150 Health and 200 Mana over 8 seconds.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>