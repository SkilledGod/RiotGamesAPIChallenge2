<?php
class Enchantment_Devourer extends Item {
	function __construct() {
		parent::__construct(3726, "Enchantment: Devourer", array("PercentAttackSpeedMod" => 0.5), "3726.png", "+50% Attack Speed<br>+30 Magic Damage on Hit<br><br><passive>Passive - Devouring Spirit:</passive> Takedowns on large monsters and Champions increase the magic damage of this item by +1. Takedowns on Rift Scuttlers increase the magic damage of this item by +2. Takedowns on epic monsters increase the magic damage of this item by +5. At 30 Stacks, your Devourer becomes Sated, granting extra on Hit effects.");
	}

	function applySpecial($champion, $enemy) {}
}
?>
