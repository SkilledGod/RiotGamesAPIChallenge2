<?php
class Rod_of_Ages_Crystal_Scar extends Item {
	function __construct() {
		parent::__construct(3029, "Rod of Ages (Crystal Scar)", array("FlatHPPoolMod"=> 650,"FlatMPPoolMod"=> 650,"FlatMagicDamageMod"=> 80,), "3029.png", "+450 Health<br><mana>+450 Mana</mana><br>+60 Ability Power<br><br><passive>Passive:</passive> Grants +20 Health, +20 Mana, and +2 Ability Power per stack (max +200 Health, +200 Mana, and +20 Ability Power). Grants 1 stack per 40 seconds (max 10 stacks).<br><unique>UNIQUE Passive - Valor's Reward:</unique> Upon leveling up, restores 150 Health and 200 Mana over 8 seconds.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
