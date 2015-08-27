<?php
include_once(dirname(__DIR__) ."/Item.php");
class Dorans_Blade extends Item {
	function __construct() {
		parent::__construct(1055, "Doran's Blade", array("FlatHPPoolMod"=> 70,"FlatPhysicalDamageMod"=> 7,"PercentLifeStealMod"=> 0.03,), "1055.png", "+70 Health<br>+7 Attack Damage<br>+3% Life Steal");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>