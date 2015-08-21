<?php
class Orb_of_Winter extends Item {
	function __construct() {
		parent::__construct(3112, "Orb of Winter", array("FlatSpellBlockMod"=> 70,), "3112.png", "+70 Magic Resist<br>+100% Base Health Regeneration <br><br><unique>UNIQUE Passive:</unique> Grants a shield that absorbs up to 30 (+10 per level) damage. The shield will refresh after 9 seconds without receiving damage.");
	}

	function applySpecial($champion, $enemy) {}
}
?>