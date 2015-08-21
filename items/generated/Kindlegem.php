<?php
class Kindlegem extends Item {
	function __construct() {
		parent::__construct(3067, "Kindlegem", array("FlatHPPoolMod"=> 200,), "3067.png", "+200 Health  <br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applySpecial($champion, $enemy) {}
}
?>