<?php
class B._F._Sword extends Item {
	function __construct() {
		parent::__construct(1038, "B. F. Sword", array("FlatPhysicalDamageMod"=> 50,), "1038.png", "+50 Attack Damage");
	}

	function applySpecial($champion, $enemy) {}
}
?>