<?php
class Catalyst_the_Protector extends Item {
	function __construct() {
		parent::__construct(3010, "Catalyst the Protector", array("FlatHPPoolMod"=> 200,"FlatMPPoolMod"=> 300,), "3010.png", "+200 Health<br><mana>+300 Mana</mana><br><br><unique>UNIQUE Passive - Valor's Reward:</unique> Upon leveling up, restores 150 Health and 200 Mana over 8 seconds.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>