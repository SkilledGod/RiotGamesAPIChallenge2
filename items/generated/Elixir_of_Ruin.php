<?php
class Elixir_of_Ruin extends Item {
	function __construct() {
		parent::__construct(2137, "Elixir of Ruin", array(), "2137.png", "<levelLimit>Level 9 required to purchase.</levelLimit><br><br><consumable>Click to Consume:</consumable> Grants +250 Health, 15% Bonus Damage to Towers and <font color='#FF8811'><u>Siege Commander</u></font> for 3 minutes.<br><br><font color='#FF8811'><u>Siege Commander:</u></font> Nearby minions gain 15% Bonus Damage to Towers and gain Movement Speed based on champion's Movement Speed.<br><br><i>(Only one Flask effect may be active at a time.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>