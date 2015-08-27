<?php
include_once(dirname(__DIR__) ."/Item.php");
class Null_Magic_Mantle extends Item {
	function __construct() {
		parent::__construct(1033, "Null-Magic Mantle", array("FlatSpellBlockMod"=> 25,), "1033.png", "+25 Magic Resist");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>