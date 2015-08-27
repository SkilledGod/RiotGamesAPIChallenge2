<?php
include_once(dirname(__DIR__) ."/Item.php");
class Fiendish_Codex extends Item {
	function __construct() {
		parent::__construct(3108, "Fiendish Codex", array("FlatMagicDamageMod"=> 30,), "3108.png", "+30 Ability Power<br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applyEffect($champion) {
            $champion->applyEffect("fiendisch codex", "flatcooldownreduction", 10, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>