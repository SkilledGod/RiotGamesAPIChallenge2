<?php
class Health_Potion extends Item {
	function __construct() {
		parent::__construct(2003, "Health Potion", array(), "2003.png", "<groupLimit>Limited to 5 at one time.</groupLimit><br><br><consumable>Click to Consume:</consumable> Restores 150 Health over 15 seconds.");
	}

	function applySpecial($champion, $enemy) {}
}
?>