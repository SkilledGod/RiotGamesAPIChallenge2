<?php
include_once(dirname(__DIR__) ."/Item.php");
class Hextech_Sweeper extends Item {
	function __construct() {
		parent::__construct(3348, "Hextech Sweeper", array(), "3348.png", "<active>UNIQUE Active - Hunter's Sight:</active> A stealth-detecting mist grants vision in the target area for 5 seconds, revealing traps and enemy champions that enter for 3 seconds (90 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>