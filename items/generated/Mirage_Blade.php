<?php
class Mirage_Blade extends Item {
	function __construct() {
		parent::__construct(3150, "Mirage Blade", array("FlatPhysicalDamageMod"=> 60,"FlatCritChanceMod"=> 0.15,"PercentLifeStealMod"=> 0.12,), "3150.png", "+60 Attack Damage<br>+15% Critical Strike<br>+12% Life Steal<br><br><unique>UNIQUE Passive - Mark of the Sands:</unique> Basic Attacks apply a Sand Mark on the target revealing them for 3 seconds. Only one enemy can be Marked at any time.<br><unique>UNIQUE Active - Mirage Step:</unique> Teleport 350 units directly away from the Sand Marked target (60 second cooldown.)<br><br><i><font color='#FDD017'>''Shurimans exploit every aspect of the desert.''</font></i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>