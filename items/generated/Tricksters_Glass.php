<?php
include_once(dirname(__DIR__) ."/Item.php");
class Tricksters_Glass extends Item {
	function __construct() {
		parent::__construct(3829, "Trickster's Glass", array("FlatHPPoolMod"=> 400,"FlatMagicDamageMod"=> 60,), "3829.png", "+60 Ability Power<br>+400 Health<br><br><unique>UNIQUE Passive - Eyes of Pain:</unique> +15 Magic Penetration<br><unique>UNIQUE Active - Disguise:</unique> Teleport to target ally and take on their appearance for 30 seconds. Casting a spell or attacking breaks the deception (90 second cooldown).<br><br><i><font color='#FDD017'>''Faces can not but lie.''</font></i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("eyes of pain", "flatspellblockpenetration", 15, true);
        }
	function applyEffectEnemy($enemy) {}
}
?>