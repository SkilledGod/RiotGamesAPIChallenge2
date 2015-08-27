<?php
include_once(dirname(__DIR__) ."/Item.php");
class Plundercrab extends Item {
	function __construct() {
		parent::__construct(3613, "Plundercrab", array(), "3613.png", "Ranged: Champion harass.<br><br>Plundercrabs shoot additional cannonballs at nearby enemy champions and gain extra range as they are upgraded. They can also shoot faster when locking onto enemy champions and deal bonus damage. All Plundercrabs have a splitshot at +150 attack range but 50% less damage.<br><br><font color='#EE0055'>Upgrade your Plundercrab's abilities after hiring, by spending Krakens below.</font>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>