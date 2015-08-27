<?php
include_once(dirname(__DIR__) ."/Item.php");
class Avarice_Blade extends Item {
	function __construct() {
		parent::__construct(3093, "Avarice Blade", array("FlatCritChanceMod"=> 0.1,), "3093.png", "+10% Critical Strike Chance<br><br><unique>UNIQUE Passive - Avarice:</unique> +3 Gold per 10 seconds<br><unique>UNIQUE Passive - Greed:</unique> Grants 2 Gold upon killing a unit.<br><br><groupLimit>May be bought with another Gold Income item</groupLimit>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>