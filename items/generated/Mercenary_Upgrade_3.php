<?php
class Mercenary_Upgrade_3 extends Item {
	function __construct() {
		parent::__construct(3617, "Mercenary Upgrade 3", array(), "3617.png", "Gives your mercenary the third level upgrade.<br><br><font color='#FF9900'>Razorfin</font> - Two Razorfins will spawn for you in each wave.<br><br><font color='#FF9900'>Ironback</font> - Your Ironback deals 325% damage to enemy structures. The shield cooldown is further reduced to 3 seconds, and while active, your Ironback takes 60% reduced damage from minions.<br><br><font color='#FF9900'>Plundercrab</font> - Your Plundercrab has +150 attack range. Your Plundercrab's on-hit bonus now also applies when hitting enemy minions, and it will now shoot an additional cannonball at all nearby enemy champions.<br><br><font color='#FF9900'>Ocklepod</font> - Your Ocklepods have 30 Magic Resistance, and their base shield strength is increased to 300. Your Ocklepods' Clairvoyance are now cast every 10 seconds.");
	}

	function applySpecial($champion, $enemy) {}
}
?>