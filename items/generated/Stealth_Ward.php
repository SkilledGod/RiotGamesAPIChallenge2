<?php
class Stealth_Ward extends Item {
	function __construct() {
		parent::__construct(2044, "Stealth Ward", array(), "2044.png", "<groupLimit>Can only carry 3 Stealth Wards in inventory.</groupLimit><br><br><consumable>Click to Consume:</consumable> Places an invisible ward that reveals the surrounding area for 3 minutes. Limit 3 <font color='#BBFFFF'>Stealth Wards</font> on the map per player.");
	}

	function applySpecial($champion, $enemy) {}
}
?>