<?php
class Statikk_Shiv extends Item {
	function __construct() {
		parent::__construct(3087, "Statikk Shiv", array("PercentMovementSpeedMod"=> 0.06,"PercentAttackSpeedMod"=> 0.4,"FlatCritChanceMod"=> 0.2,), "3087.png", "+40% Attack Speed<br>+20% Critical Strike Chance<br>+6% Movement Speed<br><br><unique>UNIQUE Passive:</unique> Grants Static Charges upon moving or attacking. At 100 Charges, basic attacking expends all Charges to deal 100 bonus magic damage to up to 4 targets on hit (this damage can critically strike).");
	}

	function applySpecial($champion, $enemy) {}
}
?>