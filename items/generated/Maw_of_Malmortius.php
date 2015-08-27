<?php
include_once(dirname(__DIR__) ."/Item.php");
class Maw_of_Malmortius extends Item {
	function __construct() {
		parent::__construct(3156, "Maw of Malmortius", array("FlatPhysicalDamageMod"=> 60,"FlatSpellBlockMod"=> 40,), "3156.png", "+60 Attack Damage<br>+40 Magic Resist<br><br><unique>UNIQUE Passive:</unique> Grants +1 Attack Damage for every 2% of missing Health, up to a maximum of 35 Attack Damage.<br><unique>UNIQUE Passive - Lifeline:</unique> Upon taking magic damage that would reduce Health below 30%, grants a shield that absorbs 400 magic damage for 5 seconds (90 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>