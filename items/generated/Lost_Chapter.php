<?php
include_once(dirname(__DIR__) ."/Item.php");
class Lost_Chapter extends Item {
	function __construct() {
		parent::__construct(3433, "Lost Chapter", array("FlatMagicDamageMod"=> 50, "percentbasemanaregen" => 1), "3433.png", "+50 Ability Power<br><mana>+100% Base Mana Regen </mana><br><br><unique>UNIQUE Passive:</unique> +20% Cooldown Reduction<br>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("lost chapter", "flatcooldownreduction", 20);
	}
	function applyEffectEnemy($enemy) {}
}
?>