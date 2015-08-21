<?php
class Wicked_Hatchet extends Item {
	function __construct() {
		parent::__construct(3122, "Wicked Hatchet", array("FlatPhysicalDamageMod"=> 20,"FlatCritChanceMod"=> 0.1,), "3122.png", "+20 Attack Damage<br>+10% Critical Strike Chance<br><br><unique>UNIQUE Passive:</unique> Critical Strikes cause your target to bleed for an additional 60% of your bonus Attack Damage as magic damage over 3 seconds.</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>