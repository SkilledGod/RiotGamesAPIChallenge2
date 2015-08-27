<?php
include_once(dirname(__DIR__) ."/Item.php");
class Frost_Queens_Claim extends Item {
	function __construct() {
		parent::__construct(3092, "Frost Queen's Claim", array("FlatMagicDamageMod"=> 50, "flatcooldownreduction" => 10, "percentbasemanaregen" => 0.5), "3092.png", "+50 Ability Power<br>+10% Cooldown Reduction<br>+2 Gold per 10 seconds<br><mana>+50% Base Mana Regen </mana><br><br><unique>UNIQUE Passive - Tribute:</unique> Spells and basic attacks against champions or buildings deal 15 additional damage and grant 10 Gold. This can occur up to three times every 30 seconds.<br><active>UNIQUE Active:</active> Fires an ice lance that explodes dealing 50 (+5 per champion level) magic damage to nearby enemies and slowing their Movement Speed by 80%, decaying over 2 seconds (60 second cooldown).<br><br><groupLimit>Limited to 1 Gold Income item</groupLimit>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>