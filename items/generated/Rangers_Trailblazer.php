<?php
class Rangers_Trailblazer extends Item {
	function __construct() {
		parent::__construct(3713, "Ranger's Trailblazer", array(), "3713.png", "+30 Bonus Gold per Large Monster Kill<br><passive>Passive - Blasting Smite:</passive> Smite deals damage in an area, dealing half damage to all monsters and enemy minions near the target and stuns them for 1.5 seconds. Casting Smite on a monster restores 15% of missing Health and Mana. <br><br><passive>Passive - Jungler:</passive> Deal 45 additional magic damage to monsters over 2 seconds and gain 10 Health Regen and 5 Mana Regen per second while under attack from neutral monsters.<br><br><groupLimit>Limited to 1 Jungle item</groupLimit>");
	}

	function applySpecial($champion, $enemy) {}
}
?>