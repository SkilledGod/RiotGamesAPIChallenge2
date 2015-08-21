<?php
class Ocklepod extends Item {
	function __construct() {
		parent::__construct(3614, "Ocklepod", array(), "3614.png", "Ranged: Support utility.<br><br>Ocklepods grant magic shields to allied minions and gain Magic Resistance as they're upgraded. They can also provide vision into nearby Jungles with a moving Clairvoyance. All Ocklepods cast a magic shield on allied minions every 10 seconds, blocking 100 + (2 x Ocklepod's AD).<br><br><font color='#EE0055'>Upgrade your Ocklepod's abilities after hiring, by spending Krakens below.</font>");
	}

	function applySpecial($champion, $enemy) {}
}
?>