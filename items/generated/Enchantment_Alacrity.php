<?php
include_once(dirname(__DIR__) ."/Item.php");
class Enchantment_Alacrity extends Item {
	function __construct() {
		parent::__construct(3241, "Enchantment: Alacrity", array(), "3241.png", "<groupLimit>Limited to 1 of each enchantment type.</groupLimit><br>Enchants boots to have Alacrity bonus. <br><br><unique>UNIQUE Passive - Alacrity:</unique> +20 Movement Speed<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("alacrity", "flatmovementspeed", 20, true);
        }
	function applyEffectEnemy($enemy) {}
}
?>