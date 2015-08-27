<?php
include_once(dirname(__DIR__) ."/Item.php");
class Sightstone extends Item {
	function __construct() {
		parent::__construct(2049, "Sightstone", array("FlatHPPoolMod"=> 150,), "2049.png", "+150 Health<br><br><unique>UNIQUE Passive - Ward Refresh:</unique> Holds 4 charges and refills upon visiting the shop.<br><active>UNIQUE Active - Ghost Ward:</active> Consumes a charge to place a <font color='#BBFFFF'>Stealth Ward</font> that reveals the surrounding area for 3 minutes. A player may only have 3 <font color='#BBFFFF'>Stealth Wards</font> on the map at one time.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>