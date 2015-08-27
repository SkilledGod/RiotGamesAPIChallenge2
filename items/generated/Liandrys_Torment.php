<?php
include_once(dirname(__DIR__) ."/Item.php");
class Liandrys_Torment extends Item {
	function __construct() {
		parent::__construct(3151, "Liandry's Torment", array("FlatHPPoolMod"=> 300,"FlatMagicDamageMod"=> 80,), "3151.png", "+80 Ability Power<br>+300 Health<br><br><unique>UNIQUE Passive - Eyes of Pain:</unique> +15 Magic Penetration<br><unique>UNIQUE Passive:</unique> Dealing spell damage applies a damage-over-time effect for 3 seconds that deals bonus magic damage equal to 2% of the target's current Health per second. This bonus damage is doubled against movement-impaired units and capped at 100 damage per second vs. monsters.<br><br><i>(A unit is movement-impaired if it is slowed, stunned, taunted, feared, or immobilized.)</i><br><br><i>(Magic Penetration: Magic damage is increased by ignoring an amount of the target's Magic Resist equal to Magic Penetration.)</i><br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->apply("eyes of pain", "flatspellblockpenetration", 15, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>