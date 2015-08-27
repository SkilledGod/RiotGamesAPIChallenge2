<?php
include_once(dirname(__DIR__) ."/Item.php");
class Total_Biscuit_of_Rejuvenation extends Item {
	function __construct() {
		parent::__construct(2010, "Total Biscuit of Rejuvenation", array(), "2010.png", "<consumable>Click to Consume:</consumable> Restores 20 health and 10 mana immediately and then 150 Health over 15 seconds.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>