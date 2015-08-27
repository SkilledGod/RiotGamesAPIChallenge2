<?php
include_once(dirname(__DIR__) ."/Item.php");
class Scrying_Orb_Trinket extends Item {
	function __construct() {
		parent::__construct(3342, "Scrying Orb (Trinket)", array(), "3342.png", "<groupLimit>Limited to 1 Trinket.</groupLimit><br><br><unique>Active:</unique> Reveals a small location within 2500 range for 2 seconds. Enemy champions found will be revealed for 5 seconds (120 second cooldown).<br><br>At level 9, cast range increases to 3500.<br><br><i>(Trinkets cannot be used in the first 30 seconds of a game. Selling a Trinket will disable Trinket use for 120 seconds).</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>