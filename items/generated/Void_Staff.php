<?php
include_once(dirname(__DIR__) ."/Item.php");
class Void_Staff extends Item {
	function __construct() {
		parent::__construct(3135, "Void Staff", array("FlatMagicDamageMod"=> 80,), "3135.png", "+80 Ability Power<br><br><unique>UNIQUE Passive:</unique> Magic damage ignores 35% of the target's Magic Resist (applies before Magic Penetration).");
	}

	function applyEffect($champion) {
            $champion->applyEffect("void staff", "percentspellblockpenetration", 0.35, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>