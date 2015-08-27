<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Furor extends Item {
	function __construct() {
		parent::__construct(3240, "Enchantment: Furor", array(), "3240.png", "<groupLimit>Limited to 1 of each enchantment type.</groupLimit><br>Enchants boots to have Furor bonus.<br><br><unique>UNIQUE Passive - Furor:</unique> Upon dealing damage with a single target spell or attack (on hit), grants +12% Movement Speed that decays over 2 seconds.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>