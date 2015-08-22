<?php
class Targons_Brace extends Item {
	function __construct() {
		parent::__construct(3097, "Targon's Brace", array("FlatHPPoolMod"=> 175, "PercentBaseHealthRegenMod" => 0.5), "3097.png", "+175 Health<br>+50% Base Health Regen <br><br><unique>UNIQUE Passive - Spoils of War:</unique> Melee basic attacks execute minions below 240 Health. Killing a minion heals the owner and the nearest allied champion for 50 Health and grants them kill Gold.<br><br>These effects require a nearby allied champion. Recharges every 30 seconds. Max 3 charges.<br><br><groupLimit>Limited to 1 Gold Income item</groupLimit>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
