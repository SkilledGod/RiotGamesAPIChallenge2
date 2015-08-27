<?php
include_once(dirname(__DIR__) ."/Item.php");
class Boots_of_Speed extends Item {
	function __construct() {
		parent::__construct(1001, "Boots of Speed", array(), "1001.png", "<groupLimit>Limited to 1.</groupLimit><br><br><unique>UNIQUE Passive - Enhanced Movement:</unique> +25 Movement Speed<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applyEffect($champion) {
	            $champion->applyEffect("enhanced movement", "flatmovementspeed", 25, true);
        }
	function applyEffectEnemy($enemy) {}
}
?>