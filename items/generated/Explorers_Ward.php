<?php
class Explorers_Ward extends Item {
	function __construct() {
		parent::__construct(2050, "Explorer's Ward", array(), "2050.png", "<consumable>Click to Consume:</consumable> Places an invisible ward that reveals the surrounding area for 60 seconds.");
	}

	function applySpecial($champion, $enemy) {}
}
?>