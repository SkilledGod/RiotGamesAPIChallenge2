<?php
include_once(dirname(__DIR__) ."/Item.php");
class Dorans_Shield_Showdown extends Item {
	function __construct() {
		parent::__construct(1074, "Doran's Shield (Showdown)", array("FlatHPPoolMod"=> 100,"FlatHPRegenMod"=> 2,), "1074.png", "+100 Health<br>+10 Health Regen per 5 seconds<br><br><unique>UNIQUE Passive:</unique> Blocks 8 damage from champion basic attacks.<br><br><groupLimit>Limited to 2 Doran's items on Showdown</groupLimit><br><br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>