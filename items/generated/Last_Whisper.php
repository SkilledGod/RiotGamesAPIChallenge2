<?php
include_once(dirname(__DIR__) ."/Item.php");
class Last_Whisper extends Item {
	function __construct() {
		parent::__construct(3035, "Last Whisper", array("FlatPhysicalDamageMod"=> 40,), "3035.png", "+40 Attack Damage<br><br><unique>UNIQUE Passive:</unique> Physical damage ignores 35% of the target's Armor (applies before Armor Penetration).");
	}

	function applyEffect($champion) {
            $champion->applyEffect("last whisper", "percentarmorpenetration", 0.35, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>