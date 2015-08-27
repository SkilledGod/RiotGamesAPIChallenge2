<?php
include_once(dirname(__DIR__) ."/Item.php");
class Aether_Wisp extends Item {
	function __construct() {
		parent::__construct(3113, "Aether Wisp", array("FlatMagicDamageMod"=> 30,), "3113.png", "+30 Ability Power<br><br><unique>UNIQUE Passive:</unique> +5% Movement Speed");
	}

	function applyEffect($champion) {
		$champion->applyEffect("aether wisp", "percentmovementspeed", 0.05, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>
