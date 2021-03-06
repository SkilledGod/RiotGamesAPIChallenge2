<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Homeguard extends Item {
	function __construct() {
		parent::__construct(3244, "Enchantment: Homeguard", array(), "3244.png", "<groupLimit>Limited to 1 of each enchantment type.</groupLimit><br>Enchants boots to have Homeguard bonus.<br><br><unique>UNIQUE Passive - Homeguard:</unique> Visiting the shop vastly increases Health and Mana Regeneration and grants 200% bonus Movement Speed that decays over 8 seconds. Bonus Movement Speed and regeneration are disabled for 6 seconds upon dealing or taking damage.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>