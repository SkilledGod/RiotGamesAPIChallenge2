<?php
include_once(dirname(__DIR__) ."/Item.php");
class Warding_Totem_Trinket extends Item {
	function __construct() {
		parent::__construct(3340, "Warding Totem (Trinket)", array(), "3340.png", "<groupLimit>Limited to 1 Trinket.</groupLimit><br><br><unique>Active:</unique> Places a <font color='#BBFFFF'>Stealth Ward</font> that lasts 60 seconds (120 second cooldown).<br><br>At level 9, this ward's duration increases to 120 seconds.<br><br>Limit 3 <font color='#BBFFFF'>Stealth Wards</font> on the map per player.<br><br><i>(Trinkets cannot be used in the first 30 seconds of a game. Selling a Trinket will disable Trinket use for 120 seconds).</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>