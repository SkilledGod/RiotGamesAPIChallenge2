<?php
class Madreds_Razors extends Item {
	function __construct() {
		parent::__construct(3106, "Madred's Razors", array("PercentAttackSpeedMod"=> 0.15,), "3106.png", "+15% Attack Speed<br><br><unique>UNIQUE Passive - Maim:</unique> Basic attacks against monsters deal 50 bonus magic damage and heal 8 Health on hit.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>