<?php
class Long_Sword extends Item {
	function __construct() {
		parent::__construct(1036, "Long Sword", array("FlatPhysicalDamageMod"=> 10,), "1036.png", "+10 Attack Damage");
	}

	function applySpecial($champion, $enemy) {}
}
?>