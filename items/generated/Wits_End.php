<?php
class Wits_End extends Item {
	function __construct() {
		parent::__construct(3091, "Wit's End", array("PercentAttackSpeedMod"=> 0.5,"FlatSpellBlockMod"=> 30,), "3091.png", "+50% Attack Speed<br>+30 Magic Resist<br><br><unique>UNIQUE Passive:</unique> Basic attacks deal 42 bonus magic damage on hit.<br><unique>UNIQUE Passive:</unique> Basic attacks steal 5 Magic Resist from the target on hit (stacks up to 5 times.)");
	}

	function applySpecial($champion, $enemy) {}
}
?>