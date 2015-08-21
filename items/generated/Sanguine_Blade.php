<?php
class Sanguine_Blade extends Item {
	function __construct() {
		parent::__construct(3181, "Sanguine Blade", array("FlatPhysicalDamageMod"=> 45,"PercentLifeStealMod"=> 0.1,), "3181.png", "+45 Attack Damage<br>+10% Life Steal<br><br><unique>UNIQUE Passive:</unique> Basic attacks grant +6 Attack Damage and +1% Life Steal for 8 seconds on hit (effect stacks up to 5 times).");
	}

	function applySpecial($champion, $enemy) {}
}
?>