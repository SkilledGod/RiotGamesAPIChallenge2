<?php
class Hunters_Machete extends Item {
	function __construct() {
		parent::__construct(1039, "Hunter's Machete", array(), "1039.png", "+15 Bonus Gold per Large Monster Kill<br><passive>Passive - Jungler:</passive> Deal 30 magic damage on hit to monsters over 2 seconds and gain 7 Health and 4 Mana per second while under attack from neutral monsters.<br><br><groupLimit>Limited to 1 Jungle item</groupLimit>");
	}

	function applySpecial($champion, $enemy) {}
}
?>