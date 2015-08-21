<?php
class The_Lightbringer extends Item {
	function __construct() {
		parent::__construct(3185, "The Lightbringer", array("FlatPhysicalDamageMod"=> 30,"FlatCritChanceMod"=> 0.3,), "3185.png", "+30 Attack Damage<br>+30% Critical Strike Chance<br><br><unique>UNIQUE Passive:</unique> Critical Strikes cause enemies to bleed for an additional 90% of bonus Attack Damage as magic damage over 3 seconds and reveal them for the duration.<br><unique>UNIQUE Passive - Trap Detection:</unique> Nearby stealthed enemy traps are revealed.<br><active>UNIQUE Active - Hunter's Sight:</active> A stealth-detecting mist grants vision in the target area for 5 seconds, revealing enemy champions that enter for 3 seconds (60 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>