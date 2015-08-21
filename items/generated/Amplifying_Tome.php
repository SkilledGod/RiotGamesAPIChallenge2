<?php
class Amplifying_Tome extends Item {
	function __construct() {
		parent::__construct(1052, "Amplifying Tome", array("FlatMagicDamageMod"=> 20,), "1052.png", "+20 Ability Power");
	}

	function applySpecial($champion, $enemy) {}
}
?>