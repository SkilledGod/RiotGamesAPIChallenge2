<?php
class Relic_Shield extends Item {
	function __construct() {
		parent::__construct(3302, "Relic Shield", array("FlatHPPoolMod"=> 75,), "3302.png", "+75 Health<br><br><unique>UNIQUE Passive - Spoils of War:</unique> Melee basic attacks execute minions below 200 Health. Killing a minion heals the owner and the nearest allied champion for 40 Health and grants them kill Gold.<br><br>These effects require a nearby allied champion. Recharges every 60 seconds. Max 2 charges. <br><br><groupLimit>Limited to 1 Gold Income item</groupLimit>");
	}

	function applySpecial($champion, $enemy) {}
}
?>