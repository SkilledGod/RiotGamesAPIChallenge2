<?php
class Rite_of_Ruin extends Item {
	function __construct() {
		parent::__construct(3430, "Rite of Ruin", array("FlatMagicDamageMod"=> 100, "PercentBaseManaRegenMod" => 1), "3430.png", "+100 Ability Power<br><mana>+100% Base Mana Regen </mana><br>+20% Cooldown Reduction<br><br><unique>UNIQUE Passive - Razing:</unique> Gain charges upon moving or killing enemies (200 charges max). Attacking a structure expends 50 charges to deal 100 (+15% AP) bonus true damage.<br><br><i><font color='#FDD017'>''When all their works have crumbled, their hearts will be laid bare.''</font></i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
