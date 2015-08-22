<?php
class Staff_of_Flowing_Water extends Item {
	function __construct() {
		parent::__construct(3744, "Staff of Flowing Water", array("FlatMagicDamageMod"=> 40,"FlatSpellBlockMod"=> 25, "PercentBaseManaRegenMod" => 0.5), "3744.png", "+40 Ability Power<br>+25 Magic Resist<br><mana>+50% Base Mana Regen </mana><br><br><mana><unique>UNIQUE Passive - Mana Font:</unique> Restores 2% of missing Mana every 5 seconds.</mana><br><unique>UNIQUE Passive:</unique> Gain 30% Movement Speed and 10 Mana Regen per 5 seconds while in the river.<br><i>(Unique Passives with the same name do not stack.)</i><br><br><i><font color='#FDD017'>''News travels fast along the Ionian riverside.''</font></i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
