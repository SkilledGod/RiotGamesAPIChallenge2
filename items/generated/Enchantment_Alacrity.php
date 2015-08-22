<?php
class Enchantment_Alacrity extends Item {
	function __construct() {
		parent::__construct(3241, "Enchantment: Alacrity", array("FlatMovementSpeed" => 20), "3241.png", "<groupLimit>Limited to 1 of each enchantment type.</groupLimit><br>Enchants boots to have Alacrity bonus. <br><br><unique>UNIQUE Passive - Alacrity:</unique> +20 Movement Speed<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {
	}
}
?>