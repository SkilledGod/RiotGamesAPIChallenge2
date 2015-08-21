<?php
class Mana_Potion extends Item {
	function __construct() {
		parent::__construct(2004, "Mana Potion", array(), "2004.png", "<groupLimit>Limited to 5 at one time.</groupLimit><br><br><consumable>Click to Consume:</consumable> <mana>Restores 100 Mana over 15 seconds.</mana>");
	}

	function applySpecial($champion, $enemy) {}
}
?>