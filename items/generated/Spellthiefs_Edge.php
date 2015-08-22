<?php
class Spellthiefs_Edge extends Item {
	function __construct() {
		parent::__construct(3303, "Spellthief's Edge", array("FlatMagicDamageMod"=> 5, "PercentBasaManaRegenMod" => 0.25), "3303.png", "+5 Ability Power<br>+2 Gold per 10 seconds<br><mana>+25% Base Mana Regen </mana><br><br><unique>UNIQUE Passive - Tribute:</unique> Spells and basic attacks against champions or buildings deal 10 additional damage and grant 5 Gold. This can occur up to three times every 30 seconds. Killing a minion disables this passive for 12 seconds.<br><br><groupLimit>Limited to 1 Gold Income item</groupLimit>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
