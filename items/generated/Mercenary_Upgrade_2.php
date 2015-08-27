<?php
include_once(dirname(__DIR__) ."/Item.php");
class Mercenary_Upgrade_2 extends Item {
	function __construct() {
		parent::__construct(3616, "Mercenary Upgrade 2", array(), "3616.png", "Gives your mercenary the second level upgrade.<br><br><font color='#FF9900'>Razorfin</font> - Each time your Razorfin hits an enemy champion, it applies a mark. On the 3rd mark, Razorfins deal 300% damage to the target.<br><br><font color='#FF9900'>Ironback</font> - Your Ironback deals 250% damage to enemy structures. While your Ironbacks' shield is active, it takes 35% reduced damage from minions.<br><br><font color='#FF9900'>Plundercrab</font> - Your Plundercrab has +100 attack range. Your Plundercrab deals 150% damage on hitting enemy champions.<br><br><font color='#FF9900'>Ocklepod</font> - Your Ocklepod has 20 Magic Resistance. Your Ocklepods' shield now blocks 150 + (1 x Ocklepod's AD) damage<br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>