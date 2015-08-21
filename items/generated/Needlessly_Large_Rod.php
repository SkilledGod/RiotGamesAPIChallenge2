<?php
class Needlessly_Large_Rod extends Item {
	function __construct() {
		parent::__construct(1058, "Needlessly Large Rod", array("FlatMagicDamageMod"=> 60,), "1058.png", "+60 Ability Power");
	}

	function applySpecial($champion, $enemy) {}
}
?>