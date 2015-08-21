<?php
class Oracles_Extract extends Item {
	function __construct() {
		parent::__construct(2047, "Oracle's Extract", array(), "2047.png", "<consumable>Click to Consume:</consumable> Grants detection of nearby invisible units for up to 5 minutes or until death.");
	}

	function applySpecial($champion, $enemy) {}
}
?>