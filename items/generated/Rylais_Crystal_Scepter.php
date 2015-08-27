<?php
include_once(dirname(__DIR__) ."/Item.php");
class Rylais_Crystal_Scepter extends Item {
	function __construct() {
		parent::__construct(3116, "Rylai's Crystal Scepter", array("FlatHPPoolMod"=> 400,"FlatMagicDamageMod"=> 100,), "3116.png", "+400 Health<br>+100 Ability Power<br><br><unique>UNIQUE Passive:</unique> Damaging spells and abilities apply a Movement Speed reduction to enemies based on the spell type:<br><br><active>Single Target:</active> 40% reduction for 1.5 seconds. <br><active>Area of Effect:</active> 40% reduction for 1 seconds<br><active>Damage over Time or Multi-hit:</active> 20% reduction for 1 seconds.<br><active>Summoned Minions:</active> 20% reduction for 1 seconds.<br><br><i>(If a spell fits in more than one category, it uses the weakest slow value.)</i>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>