<?php
class Elixir_of_Wrath extends Item {
	function __construct() {
		parent::__construct(2140, "Elixir of Wrath", array(), "2140.png", "<levelLimit>Level 9 required to purchase.</levelLimit><br><br><consumable>Click to Consume:</consumable> Grants +25 Attack Damage and <font color='#FF8811'><u>Bloodlust</u></font> for 3 minutes.<br><br><font color='#FF8811'><u>Bloodlust:</u></font> Dealing physical damage to champions heals for 10% of the damage dealt. Scoring a Kill or Assist extends the duration of this Flask by 30 seconds.<br><br><i>(Only one Flask effect may be active at a time.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>