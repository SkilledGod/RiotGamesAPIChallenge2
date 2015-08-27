<?php
include_once(dirname(__DIR__) ."/Item.php");
class Razorfin extends Item {
	function __construct() {
		parent::__construct(3611, "Razorfin", array(), "3611.png", "Melee: Champion pursuer.<br><br>Razorfins can chase down enemy champions relentlessly as they're upgraded and deal bonus damage. They can even grow in number. All Razorfins have +100% Attack Speed.<br><br><font color='#EE0055'>Upgrade your Razorfin's abilities after hiring, by spending Krakens below.</font>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>