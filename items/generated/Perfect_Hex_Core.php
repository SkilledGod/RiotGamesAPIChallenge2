<?php
include_once(dirname(__DIR__) ."/Item.php");
class Perfect_Hex_Core extends Item {
	function __construct() {
		parent::__construct(3198, "Perfect Hex Core", array("FlatMPPoolMod"=> 500,"FlatMagicDamageMod"=> 60, "flatmagicdamageperlevel" => 6), "3198.png", "+6 Ability Power per level<br>+60 Ability Power<br>+500 Mana<br><br><passive>UNIQUE Passive - Glorious Evolution:</passive> Viktor has reached the pinnacle of his power, upgrading Chaos Storm in addition to his basic spells.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>