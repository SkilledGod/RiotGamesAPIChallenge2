<?php
class Ruby_Sightstone extends Item {
	function __construct() {
		parent::__construct(2045, "Ruby Sightstone", array("FlatHPPoolMod"=> 400,), "2045.png", "+400 Health<br><br><unique>UNIQUE Passive - Ward Refresh:</unique> Holds 5 charges and refills upon visiting the shop.<br><active>UNIQUE Active - Ghost Ward:</active> Consumes a charge to place a <font color='#BBFFFF'>Stealth Ward</font> that reveals the surrounding area for 3 minutes. A player may only have 3 <font color='#BBFFFF'>Stealth Wards</font> on the map at one time.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>