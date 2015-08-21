<?php
class Boots_of_Swiftness extends Item {
	function __construct() {
		parent::__construct(3009, "Boots of Swiftness", array("FlatMovementSpeedMod"=> 60,), "3009.png", "<unique>UNIQUE Passive - Enhanced Movement:</unique> +60 Movement Speed<br><unique>UNIQUE Passive - Slow Resist:</unique> Movement slowing effects are reduced by 25%.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>