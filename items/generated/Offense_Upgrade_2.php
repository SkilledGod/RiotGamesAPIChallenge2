<?php
class Offense_Upgrade_2 extends Item {
	function __construct() {
		parent::__construct(3622, "Offense Upgrade 2", array(), "3622.png", "Your mercenary permanently gains +20 Attack Damage (+30 total).<br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>