<?php
class Cloak_of_Agility extends Item {
	function __construct() {
		parent::__construct(1018, "Cloak of Agility", array("FlatCritChanceMod"=> 0.15,), "1018.png", "+15% Critical Strike Chance");
	}

	function applySpecial($champion, $enemy) {}
}
?>