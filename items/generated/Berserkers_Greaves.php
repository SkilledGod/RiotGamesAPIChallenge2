<?php
include_once(dirname(__DIR__) ."/Item.php");
class Berserkers_Greaves extends Item {
	function __construct() {
		parent::__construct(3006, "Berserker's Greaves", array("PercentAttackSpeedMod"=> 0.25,), "3006.png", " +25% Attack Speed<br><br><unique>UNIQUE Passive - Enhanced Movement:</unique> +45 Movement Speed<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("enhanced movement", "flatmovementspeed", 45, true);
        }
	function applyEffectEnemy($enemy) {}
}
?>