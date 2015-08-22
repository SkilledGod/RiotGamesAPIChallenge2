<?php
class Nashors_Tooth extends Item {
	function __construct() {
		parent::__construct(3115, "Nashor's Tooth", array("FlatMagicDamageMod"=> 80,"PercentAttackSpeedMod"=> 0.4, "FlatCooldownReductionMod" => 20), "3115.png", "+40% Attack Speed<br>+80 Ability Power<br><br><unique>UNIQUE Passive:</unique> +20% Cooldown Reduction<br><unique>UNIQUE Passive:</unique> Basic attacks deal 15 (+15% of Ability Power) bonus magic damage on hit.<br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
