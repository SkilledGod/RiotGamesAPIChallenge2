<?php
class Offense_Upgrade_3 extends Item {
	function __construct() {
		parent::__construct(3623, "Offense Upgrade 3", array(), "3623.png", "Your mercenary permanently gains +30 Attack Damage (+60 total).<br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>