<?php
include_once(dirname(__DIR__) ."/Item.php");
class Diet_Poro_Snax extends Item {
	function __construct() {
		parent::__construct(2054, "Diet Poro-Snax", array(), "2054.png", "All the flavor of regular Poro-Snax, without the calories! Keeps your Poro happy AND healthy.<br><br><consumable>Click to Consume:</consumable> Gives your Poros a delicious healthy treat.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>