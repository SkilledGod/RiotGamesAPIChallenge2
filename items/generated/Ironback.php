<?php
include_once(dirname(__DIR__) ."/Item.php");
class Ironback extends Item {
	function __construct() {
		parent::__construct(3612, "Ironback", array(), "3612.png", "Melee: Tanky siege.<br><br>Ironbacks can take reduced damage from minions and gain a shield that blocks attacks as they're upgraded. They can also deal extra damage to structures. All Ironbacks take 25% reduced damage from enemy turrets.<br><br><font color='#EE0055'>Upgrade your Ironback's abilities after hiring, by spending Krakens below.</font>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>