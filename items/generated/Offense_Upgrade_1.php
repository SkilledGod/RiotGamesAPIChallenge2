<?php
class Offense_Upgrade_1 extends Item {
	function __construct() {
		parent::__construct(3621, "Offense Upgrade 1", array(), "3621.png", "Your mercenary permanently gains +10 Attack Damage (+10 total).");
	}

	function applySpecial($champion, $enemy) {}
}
?>