<?php
class Dorans_Blade_Showdown extends Item {
	function __construct() {
		parent::__construct(1075, "Doran's Blade (Showdown)", array("FlatHPPoolMod"=> 70,"FlatPhysicalDamageMod"=> 7,"PercentLifeStealMod"=> 0.03,), "1075.png", "+70 Health<br>+7 Attack Damage<br>+3% Life Steal<br><br><groupLimit>Limited to 2 Doran's items on Showdown</groupLimit><br><br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>