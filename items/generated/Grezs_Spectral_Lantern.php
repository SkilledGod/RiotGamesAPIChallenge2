<?php
class Grezs_Spectral_Lantern extends Item {
	function __construct() {
		parent::__construct(3159, "Grez's Spectral Lantern", array("FlatPhysicalDamageMod"=> 15,"PercentAttackSpeedMod"=> 0.3,), "3159.png", "+15 Attack Damage<br>+30% Attack Speed<br><br><unique>UNIQUE Passive - Maim:</unique> Basic attacks against monsters deal 75 bonus magic damage and heal 10 Health on hit.<br><unique>UNIQUE Passive:</unique> Gain 30% increased Gold from monsters.<br><unique>UNIQUE Passive - Trap Detection:</unique> Nearby stealthed enemy traps are revealed.<br><active>UNIQUE Active - Hunter's Sight:</active> A stealth-detecting mist grants vision in the target area for 5 seconds, revealing enemy champions that enter for 3 seconds (60 second cooldown).");
	}

	function applySpecial($champion, $enemy) {}
}
?>