<?php
include_once(dirname(__DIR__) ."/Item.php");
class Frostfang extends Item {
	function __construct() {
		parent::__construct(3098, "Frostfang", array("FlatMagicDamageMod"=> 10, "percentbasemanaregen" => 0.5), "3098.png", "+10 Ability Power<br>+2 Gold per 10 seconds<br><mana>+50% Base Mana Regen </mana><br><br><unique>UNIQUE Passive - Tribute:</unique> Spells and basic attacks against champions or buildings deal 15 additional damage and grant 10 Gold. This can occur up to 3 times every 30 seconds. Killing a minion disables this passive for 12 seconds.<br><br><groupLimit>Limited to 1 Gold Income item</groupLimit>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>