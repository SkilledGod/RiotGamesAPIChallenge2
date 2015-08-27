<?php
include_once(dirname(__DIR__) ."/Item.php");
class The_Bloodthirster extends Item {
	function __construct() {
		parent::__construct(3072, "The Bloodthirster", array("FlatPhysicalDamageMod"=> 80, "percentlifesteal" => 0.20), "3072.png", "+80 Attack Damage<br><br><passive>UNIQUE Passive:</passive> +20% Life Steal<br><passive>UNIQUE Passive:</passive> Your basic attacks can now overheal you. Excess life is stored as a shield that can block 50-350 damage, based on champion level.<br><br>This shield decays slowly if you haven't dealt or taken damage in the last 25 seconds.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>