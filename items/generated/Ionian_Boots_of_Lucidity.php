<?php
include_once(dirname(__DIR__) ."/Item.php");
class Ionian_Boots_of_Lucidity extends Item {
	function __construct() {
		parent::__construct(3158, "Ionian Boots of Lucidity", array(), "3158.png", "<unique>UNIQUE Passive:</unique> +15% Cooldown Reduction<br><unique>UNIQUE Passive - Enhanced Movement:</unique> +45 Movement Speed<br><br><i>(Unique Passives with the same name don't stack.)</i><br><br><i><font color='#FDD017'>''This item is dedicated in honor of Ionia's victory over Noxus in the Rematch for the Southern Provinces on 10 December, 20 CLE.''</font></i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("ionian boots of lucidity", "flatcooldownreduction", 15, true);
            $champion->applyEffect("enhanced movement", "flatmovementspeed", 45, true);
	}
	
	function applyEffectEnemy($enemy) {}
}
?>