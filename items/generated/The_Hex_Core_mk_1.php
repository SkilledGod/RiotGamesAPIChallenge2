<?php
include_once(dirname(__DIR__) ."/Item.php");
class The_Hex_Core_mk_1 extends Item {
	function __construct() {
		parent::__construct(3196, "The Hex Core mk-1", array("FlatMPPoolMod"=> 150,"FlatMagicDamageMod"=> 20,), "3196.png", "+4 Ability Power per level<br>+20 Ability Power<br>+150 Mana<br><br><passive>UNIQUE Passive - Progress:</passive> Viktor can upgrade one of his basic spells.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>