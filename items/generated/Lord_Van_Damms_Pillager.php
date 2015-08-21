<?php
class Lord_Van_Damms_Pillager extends Item {
	function __construct() {
		parent::__construct(3104, "Lord Van Damm's Pillager", array("FlatPhysicalDamageMod"=> 80,"FlatCritChanceMod"=> 0.25,), "3104.png", "+80 Attack Damage<br>+25% Critical Strike Chance<br><br><unique>UNIQUE Passive:</unique> Critical Strikes cause enemies to bleed for an additional 150% of bonus Attack Damage as magic damage over 3 seconds and reveal them for the duration.");
	}

	function applySpecial($champion, $enemy) {}
}
?>