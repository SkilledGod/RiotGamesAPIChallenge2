<?php
class Fire_at_Will extends Item {
	function __construct() {
		parent::__construct(3901, "Fire at Will", array(), "3901.png", "Requires 500 Silver Serpents.<br><br><unique>UNIQUE Passive</unique> Cannon Barrage fires at an increasing rate over time (additional 6 waves over the duration).");
	}

	function applySpecial($champion, $enemy) {}
}
?>