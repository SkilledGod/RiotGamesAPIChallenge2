<?php
class Enchantment_Sated_Devourer extends Item {
	function __construct() {
		parent::__construct(3933, "Enchantment: Sated Devourer", array(), "3933.png", "+50% Attack Speed<br>+60 Magic Damage on Hit<br><br><passive>Passive - Phantom Hit:</passive> Every other basic attack will trigger on Hit effects an additional time.");
	}

	function applySpecial($champion, $enemy) {}
}
?>