<?php
include_once(dirname(__DIR__) ."/Item.php");
class Greater_Stealth_Totem_Trinket extends Item {
	function __construct() {
		parent::__construct(3361, "Greater Stealth Totem (Trinket)", array(), "3361.png", "<groupLimit>Limited to 1 Trinket.</groupLimit><levelLimit> *Level 9+ required to upgrade.</levelLimit><br><br><unique>UNIQUE Active:</unique> Consume a charge to place an invisible ward that reveals the surrounding area for 180 seconds.  Stores a charge every 60 seconds, up to 2 total. Limit 3 <font color='#BBFFFF'>Stealth Wards</font> on the map per player.<br><br><i>(Trinkets cannot be used in the first 30 seconds of a game. Selling a Trinket will disable Trinket use for 120 seconds).</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>