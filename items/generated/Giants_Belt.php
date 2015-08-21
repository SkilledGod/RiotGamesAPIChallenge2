<?php
class Giants_Belt extends Item {
	function __construct() {
		parent::__construct(1011, "Giant's Belt", array("FlatHPPoolMod"=> 380,), "1011.png", "+380 Health");
	}

	function applySpecial($champion, $enemy) {}
}
?>