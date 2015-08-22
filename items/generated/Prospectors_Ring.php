<?php
class Prospectors_Ring extends Item {
	function __construct() {
		parent::__construct(1063, "Prospector's Ring", array("FlatMPRegenMod"=> 1.2,"FlatMagicDamageMod"=> 35, "FlatHPoolMod" => 150), "1063.png", "+35 Ability Power<br><br><unique>Passive :</unique> <mana>+6 Mana Regen per 5 seconds</mana><br><unique>UNIQUE Passive - Prospector:</unique> +150 Health<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
