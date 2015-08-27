<?php
include_once(dirname(__DIR__) ."/Item.php");
class Soul_Anchor_Trinket extends Item {
	function __construct() {
		parent::__construct(3345, "Soul Anchor (Trinket)", array(), "3345.png", "<groupLimit>Limited to 1 Trinket.</groupLimit><br><br><unique>Active:</unique> Consumes a charge to instantly revive at your Summoner Platform and grants 125% Movement Speed that decays over 12 seconds.<br><br><i>Additional charges are gained at levels 9 and 14.</i><br><br><font color='#BBFFFF'>(Max: 2 charges)</font></i><br><br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>