<?php
class Ruby_Crystal extends Item {
	function __construct() {
		parent::__construct(1028, "Ruby Crystal", array("FlatHPPoolMod"=> 150,), "1028.png", "+150 Health");
	}

	function applySpecial($champion, $enemy) {}
}
?>