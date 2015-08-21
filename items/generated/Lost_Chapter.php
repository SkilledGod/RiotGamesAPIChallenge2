<?php
class Lost_Chapter extends Item {
	function __construct() {
		parent::__construct(3433, "Lost Chapter", array("FlatMagicDamageMod"=> 50,), "3433.png", "+50 Ability Power<br><mana>+100% Base Mana Regen </mana><br><br><unique>UNIQUE Passive:</unique> +20% Cooldown Reduction<br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>