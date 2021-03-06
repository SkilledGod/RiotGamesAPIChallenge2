<?php
include_once(dirname(__DIR__) ."/Item.php");
class Locket_of_the_Iron_Solari extends Item {
	function __construct() {
		parent::__construct(3190, "Locket of the Iron Solari", array("FlatHPPoolMod"=> 400,"FlatSpellBlockMod"=> 20, "flatcooldownreduction" => 10), "3190.png", "+400 Health<br>+20 Magic Resist<br>+10% Cooldown Reduction<br><br><active>UNIQUE Active:</active> Grants a shield to nearby allies for 5 seconds that absorbs up to 50 (+10 per level) damage (60 second cooldown).<br><aura>UNIQUE Aura - Legion:</aura> Grants nearby allies +20 Magic Resist and +75% Base Health Regen.<br><br><i>(Unique Auras with the same name don't stack.)");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>