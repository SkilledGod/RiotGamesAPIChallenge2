<?php
include_once(dirname(__DIR__) ."/Item.php");
class Farsight_Orb_Trinket extends Item {
	function __construct() {
		parent::__construct(3363, "Farsight Orb (Trinket)", array(), "3363.png", "<groupLimit>Limited to 1 Trinket.</groupLimit><levelLimit>  *Level 9+ required to upgrade.</levelLimit><br><br><unique>UNIQUE Active:</unique> Reveals an area up to 4000 units away for 2 seconds. Enemy champions found will be revealed for 5 seconds (90 second cooldown). <br><br>Also places a visible ward in the area that lasts 60 seconds. This ward is untargetable by allies.<br><br><i>(Trinkets cannot be used in the first 30 seconds of a game. Selling a Trinket will disable Trinket use for 120 seconds).</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>