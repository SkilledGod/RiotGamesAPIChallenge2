<?php
class Talisman_of_Ascension extends Item {
	function __construct() {
		parent::__construct(3069, "Talisman of Ascension", array("PercentBaseHealthRegenMod" => 1, "PercentBaseManaRegenMod" => 1, "FlatMovementSpeedMod" => 20, "FlatCooldownReductionMod" => 10), "3069.png", "+100% Base Health Regen <br><mana>+100% Base Mana Regen <br></mana>+20 Movement Speed<br>+10% Cooldown Reduction<br>+2 Gold per 10 seconds<br><br><unique>UNIQUE Passive - Favor:</unique> Being near a minion death without dealing the killing blow grants 4 Gold and 10 Health.<br><active>UNIQUE Active:</active> Grants nearby allies +40% Movement Speed for 3 seconds (40 second cooldown).<br><br><groupLimit>Limited to 1 Gold Income item</groupLimit><br><br><i><font color='#447777'>''Praise the sun.'' - Historian Shurelya, 22 September, 25 CLE</font></i><br><br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
