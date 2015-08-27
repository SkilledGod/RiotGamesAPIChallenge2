<?php
include_once(dirname(__DIR__) ."/Item.php");
class Forbidden_Idol extends Item {
	function __construct() {
		parent::__construct(3114, "Forbidden Idol", array("percentbasemanaregen" => 0.5), "3114.png", "<mana>+50% Base Mana Regen </mana><br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applyEffect($champion) {
            $champion->applyEffect("forbidden idol", "flatcooldownreduction", 10, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>