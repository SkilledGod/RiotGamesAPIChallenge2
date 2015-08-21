<?php
class Blasting_Wand extends Item {
	function __construct() {
		parent::__construct(1026, "Blasting Wand", array("FlatMagicDamageMod"=> 40,), "1026.png", "+40 Ability Power");
	}

	function applySpecial($champion, $enemy) {}
}
?>