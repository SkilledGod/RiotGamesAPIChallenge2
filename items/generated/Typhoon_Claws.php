<?php
include_once(dirname(__DIR__) ."/Item.php");
class Typhoon_Claws extends Item {
	function __construct() {
		parent::__construct(3652, "Typhoon Claws", array("FlatPhysicalDamageMod"=> 30,"PercentMovementSpeedMod"=> 0.04,"PercentAttackSpeedMod"=> 0.2,), "3652.png", "+30 Attack Damage<br>+20% Attack Speed<br>+4% Movement Speed<br><br><unique>UNIQUE Passive - Phantom Hit:</unique> Basic Attacks grant Malice Charges upon hitting an enemy.  After 3 stacks,  your next 3 attacks will be at maximum attack speed, but deal -50% damage. Charges expire after 3 seconds.<br><br><i><font color='#FDD017'>''That is not the pounding of the rain.''</font></i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>