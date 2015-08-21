<?php
class Vision_Ward extends Item {
	function __construct() {
		parent::__construct(2043, "Vision Ward", array(), "2043.png", "<groupLimit>Can only carry 2 Vision Wards in inventory.</groupLimit><br><br><consumable>Click to Consume:</consumable> Places a visible ward that reveals the surrounding area and invisible units in the area until killed. Limit 1 <font color='#BBFFFF'>Vision Ward</font> on the map per player.<br><br><i>(Revealing a ward in this manner grants a portion of the gold reward when that unit is killed.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>