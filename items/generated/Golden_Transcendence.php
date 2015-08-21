<?php
class Golden_Transcendence extends Item {
	function __construct() {
		parent::__construct(3460, "Golden Transcendence", array(), "3460.png", "<unique>Active:</unique> Use this trinket to teleport to one of the battle platforms. Can only be used from the summoning platform.<br><br><i><font color='#FDD017'>''It is at this magical precipice where a champion is dismantled, reforged, and empowered.''</font></i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>