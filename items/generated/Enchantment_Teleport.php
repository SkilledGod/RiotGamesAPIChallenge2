<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Teleport extends Item {
	function __construct() {
		parent::__construct(3245, "Enchantment: Teleport", array(), "3245.png", "<groupLimit>Limited to 1 of each enchantment type.</groupLimit><br>Enchants boots to have Teleport Active.<br><br><unique>UNIQUE Active - Teleport:</unique> Teleport to target allied object (240s CD) (60s CD on purchase)");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>