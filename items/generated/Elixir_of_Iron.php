<?php
class Elixir_of_Iron extends Item {
	function __construct() {
		parent::__construct(2138, "Elixir of Iron", array(), "2138.png", "<levelLimit>Level 9 required to purchase.</levelLimit><br><br><consumable>Click to Consume:</consumable> Grants 25% increased Size, Slow Resistance, Tenacity and <font color='#FF8811'><u>Path of Iron</u></font> for 3 minutes.<br><br><font color='#FF8811'><u>Path of Iron:</u></font> Moving leaves a path behind that boosts allied champion's Movement Speed by 15%.<br><br><i>(Only one Flask effect may be active at a time.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>