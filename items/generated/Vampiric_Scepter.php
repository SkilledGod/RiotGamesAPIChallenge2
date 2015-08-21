<?php
class Vampiric_Scepter extends Item {
	function __construct() {
		parent::__construct(1053, "Vampiric Scepter", array("FlatPhysicalDamageMod"=> 10,"PercentLifeStealMod"=> 0.08,), "1053.png", "+10 Attack Damage<br>+8% Life Steal");
	}

	function applySpecial($champion, $enemy) {}
}
?>