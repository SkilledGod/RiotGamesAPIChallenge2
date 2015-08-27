<?php
include_once(dirname(__DIR__) ."/Item.php");
class Dorans_Ring extends Item {
	function __construct() {
		parent::__construct(1056, "Doran's Ring", array("FlatHPPoolMod"=> 60,"FlatMPRegenMod"=> 0.6,"FlatMagicDamageMod"=> 15,), "1056.png", "+60 Health<br>+15 Ability Power<br><br><passive>Passive:</passive> <mana>+3 Mana Regen per 5 seconds.<br><passive>Passive:</passive> Restores 4 Mana upon killing a unit.</mana>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>