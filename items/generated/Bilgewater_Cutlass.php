<?php
class Bilgewater_Cutlass extends Item {
	function __construct() {
		parent::__construct(3144, "Bilgewater Cutlass", array("FlatPhysicalDamageMod"=> 25,"PercentLifeStealMod"=> 0.08,), "3144.png", "+25 Attack Damage<br>+8% Life Steal<br><br><active>UNIQUE Active:</active> Deals 100 magic damage and slows the target champion's Movement Speed by 25% for 2 seconds (90 second cooldown).");
	}

	function applySpecial($champion, $enemy) {}
}
?>