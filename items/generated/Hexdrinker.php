<?php
include_once(dirname(__DIR__) ."/Item.php");
class Hexdrinker extends Item {
	function __construct() {
		parent::__construct(3155, "Hexdrinker", array("FlatPhysicalDamageMod"=> 25,"FlatSpellBlockMod"=> 30,), "3155.png", "+25 Attack Damage<br>+30 Magic Resist<br><br><unique>UNIQUE Passive - Lifeline:</unique> Upon taking magic damage that would reduce Health below 30%, grants a shield that absorbs 250 magic damage for 5 seconds (90 second cooldown).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>