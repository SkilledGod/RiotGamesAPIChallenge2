<?php
class Netherstride_Grimoire extends Item {
	function __construct() {
		parent::__construct(3431, "Netherstride Grimoire", array("FlatMagicDamageMod"=> 100, "PercentBaseManaRegenMod" => 1, "FlatCooldownReductionMod" => 20), "3431.png", "+100 Ability Power<br><mana>+100% Base Mana Regen </mana><br>+20% Cooldown Reduction<br><br><unique>UNIQUE Passive - Malice:</unique> Gain 20% movement speed for 2 seconds when hitting an enemy with a damaging spell.<br><br><i><font color='#FDD017'>''Walking our path, you make fast progress.''</font></i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
