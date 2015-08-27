<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Distortion extends Item {
	function __construct() {
		parent::__construct(3243, "Enchantment: Distortion", array(), "3243.png", "<groupLimit>Limited to 1 of each enchantment type.</groupLimit><br>Enchants boots to have Distortion bonus.<br><br><unique>UNIQUE Passive - Distortion:</unique> Teleport, Flash, and Ghost summoner spell cooldowns are reduced by 20% and are granted additional mobility: <br><br><font color='#FFDD00'>Ghost:</font> Grants 40% Movement Speed from 27%.<br><font color='#FFDD00'>Flash:</font> 20% Movement Speed bonus for 1 second after cast.<br><font color='#FFDD00'>Teleport:</font> 30% Movement Speed bonus for 3 seconds after use.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>