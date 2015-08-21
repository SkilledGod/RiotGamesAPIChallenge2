<?php
class Enchantment_Captain extends Item {
	function __construct() {
		parent::__construct(3242, "Enchantment: Captain", array(), "3242.png", "<groupLimit>Limited to 1 of each enchantment type.</groupLimit><br>Enchants boots to have Captain bonus.<br><br><unique>UNIQUE Passive - Captain:</unique> Grants +10% Movement Speed to nearby approaching allied champions.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>