<?php
class Ohmwrecker extends Item {
	function __construct() {
		parent::__construct(3056, "Ohmwrecker", array("FlatHPPoolMod"=> 300,"FlatArmorMod"=> 50, "PercentBaseHealthRegenMod" => 1, "FlatCooldownReductionMod" => 10), "3056.png", "+300 Health<br>+50 Armor<br>+100% Base Health Regen <br>+10% Cooldown Reduction<br><br><active>UNIQUE Active:</active> Prevents nearby enemy turrets from attacking for 3 seconds (120 second cooldown). This effect cannot be used against the same turret more than once every 8 seconds.<br><br><unique>UNIQUE Passive - Point Runner:</unique> Builds up to +30% Movement Speed over 2 seconds while near turrets (including fallen turrets).<br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
