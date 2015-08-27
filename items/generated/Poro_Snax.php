<?php
include_once(dirname(__DIR__) ."/Item.php");
class Poro_Snax extends Item {
	function __construct() {
		parent::__construct(2052, "Poro-Snax", array(), "2052.png", "This savory blend of free-range, grass-fed Avarosan game hens and organic, non-ZMO Freljordian herbs contains the essential nutrients necessary to keep your Poro purring with pleasure.<br><br><i>All proceeds will be donated towards fighting Noxian animal cruelty.</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>