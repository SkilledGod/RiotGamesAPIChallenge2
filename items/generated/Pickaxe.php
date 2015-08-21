<?php
class Pickaxe extends Item {
	function __construct() {
		parent::__construct(1037, "Pickaxe", array("FlatPhysicalDamageMod"=> 25,), "1037.png", "+25 Attack Damage");
	}

	function applySpecial($champion, $enemy) {}
}
?>