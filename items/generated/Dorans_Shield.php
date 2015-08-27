<?php
include_once(dirname(__DIR__) ."/Item.php");
class Dorans_Shield extends Item {
	function __construct() {
		parent::__construct(1054, "Doran's Shield", array("FlatHPPoolMod"=> 80,"FlatHPRegenMod"=> 1.2,), "1054.png", "+80 Health<br><br><unique>Passive: </unique> Restores 6 Health every 5 seconds.<br><unique>UNIQUE Passive:</unique> Blocks 8 damage from single target attacks and spells from champions.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>