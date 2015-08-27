<?php
include_once(dirname(__DIR__) ."/Item.php");
class Boots_of_Mobility extends Item {
	function __construct() {
		parent::__construct(3117, "Boots of Mobility", array(), "3117.png", "<unique>UNIQUE Passive - Enhanced Movement:</unique> +25 Movement Speed. Increases to +105 Movement Speed when out of combat for 5 seconds.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("enhanced movement", "flatmovementspeed", 25, true);
        }
	function applyEffectEnemy($enemy) {}
}
?>