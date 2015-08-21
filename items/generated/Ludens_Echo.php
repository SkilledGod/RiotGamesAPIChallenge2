<?php
class Ludens_Echo extends Item {
	function __construct() {
		parent::__construct(3285, "Luden's Echo", array("FlatMagicDamageMod"=> 100,"PercentMovementSpeedMod"=> 0.1,), "3285.png", "+100 Ability Power<br>+10% Movement Speed<br><br><unique>UNIQUE Passive:</unique> Gain charges upon moving or casting. At 100 charges, the next spell hit expends all charges to deal 100 (+10% AP) bonus magic damage to up to 4 targets on hit.");
	}

	function applySpecial($champion, $enemy) {}
}
?>