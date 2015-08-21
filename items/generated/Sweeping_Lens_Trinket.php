<?php
class Sweeping_Lens_Trinket extends Item {
	function __construct() {
		parent::__construct(3341, "Sweeping Lens (Trinket)", array(), "3341.png", "<groupLimit>Limited to 1 Trinket.</groupLimit><br><br><unique>Active:</unique> Reveals and disables nearby invisible traps and invisible wards for 6 seconds in a small radius (120 second cooldown).<br><br>At level 9, cast range and sweep radius increase by 50% each and the cooldown is reduced to 75 seconds.<br><br><i>(Trinkets cannot be used in the first 30 seconds of a game. Selling a Trinket will disable Trinket use for 120 seconds).</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>