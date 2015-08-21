<?php
class Elixir_of_Sorcery extends Item {
	function __construct() {
		parent::__construct(2139, "Elixir of Sorcery", array(), "2139.png", "<levelLimit>Level 9 required to purchase.</levelLimit><br><br><consumable>Click to Consume:</consumable> Grants +40 Ability Power, 15 bonus Mana Regen per 5 seconds and <font color='#FF8811'><u>Sorcery</u></font> for 3 minutes. <br><br><font color='#FF8811'><u>Sorcery:</u></font> Damaging a champion or turret deals 25 bonus True Damage. This effect has a 5 second cooldown versus champions but no cooldown versus turrets.<br><br><i>(Only one Flask effect may be active at a time.)</i><br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>