<?php
class Recurve_Bow extends Item {
	function __construct() {
		parent::__construct(1043, "Recurve Bow", array("PercentAttackSpeedMod"=> 0.3,), "1043.png", "+30% Attack Speed<br><br><unique>UNIQUE Passive:</unique> Basic attacks deal an additional 10 physical damage on hit.");
	}

	function applySpecial($champion, $enemy) {}
}
?>