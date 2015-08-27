<?php
include_once(dirname(__DIR__) ."/Item.php");
class Mercurial_Scimitar extends Item {
	function __construct() {
		parent::__construct(3139, "Mercurial Scimitar", array("FlatPhysicalDamageMod"=> 80,"FlatSpellBlockMod"=> 35,), "3139.png", "+80 Attack Damage<br>+35 Magic Resist<br><br><active>UNIQUE Active - Quicksilver:</active> Removes all debuffs and also grants +50% bonus Movement Speed for 1 second (90 second cooldown).");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>