<?php
class Prospectors_Blade extends Item {
	function __construct() {
		parent::__construct(1062, "Prospector's Blade", array("FlatPhysicalDamageMod"=> 16,"PercentAttackSpeedMod"=> 0.15, "FlatHPoolMod" => 150), "1062.png", "+16 Attack Damage<br>+15% Attack Speed <br><br><unique>UNIQUE Passive - Prospector:</unique> +150 Health<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
