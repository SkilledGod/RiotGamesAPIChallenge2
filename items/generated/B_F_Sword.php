<?php
include_once(dirname(__DIR__) ."/Item.php");
class B_F_Sword extends Item {
	function __construct() {
		parent::__construct(1038, "B. F. Sword", array("FlatPhysicalDamageMod"=> 50,), "1038.png", "+50 Attack Damage");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>