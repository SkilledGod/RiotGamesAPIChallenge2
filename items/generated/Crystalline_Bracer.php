<?php
class Crystalline_Bracer extends Item {
	function __construct() {
		parent::__construct(3801, "Crystalline Bracer", array("FlatHPPoolMod"=> 200,"PercentBaseHealthRegen" => 0.5), "3801.png", "+200 Health<br>+50% Base Health Regen ");
	}

	function applySpecial($champion, $enemy) {
	}
}
?>
