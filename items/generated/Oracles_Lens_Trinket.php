<?php
class Oracles_Lens_Trinket extends Item {
	function __construct() {
		parent::__construct(3364, "Oracle's Lens (Trinket)", array(), "3364.png", "<groupLimit>Limited to 1 Trinket.</groupLimit><levelLimit> *Level 9+ required to upgrade.</levelLimit><br><br><unique>UNIQUE Active:</unique> Reveals and disables nearby invisible traps and invisible wards for 6 seconds in a medium radius and grants detection of nearby invisible units for 10 seconds (75 second cooldown).<br><br><i>(Trinkets cannot be used in the first 30 seconds of a game. Selling a Trinket will disable Trinket use for 120 seconds).</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>