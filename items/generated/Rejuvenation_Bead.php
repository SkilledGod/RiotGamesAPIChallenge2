<?php
include_once(dirname(__DIR__) ."/Item.php");
class Rejuvenation_Bead extends Item {
	function __construct() {
		parent::__construct(1006, "Rejuvenation Bead", array("percentbasehealthregen" => 0.5), "1006.png", "+50% Base Health Regen ");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>