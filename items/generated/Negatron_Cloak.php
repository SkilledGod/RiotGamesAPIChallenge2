<?php
class Negatron_Cloak extends Item {
	function __construct() {
		parent::__construct(1057, "Negatron Cloak", array("FlatSpellBlockMod"=> 45,), "1057.png", "+45 Magic Resist");
	}

	function applySpecial($champion, $enemy) {}
}
?>