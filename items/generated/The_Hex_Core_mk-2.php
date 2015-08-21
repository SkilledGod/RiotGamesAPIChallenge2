<?php
class The_Hex_Core_mk-2 extends Item {
	function __construct() {
		parent::__construct(3197, "The Hex Core mk-2", array("FlatMPPoolMod"=> 300,"FlatMagicDamageMod"=> 40,), "3197.png", "+5 Ability Power per level<br>+40 Ability Power<br>+300 Mana<br><br><passive>UNIQUE Passive - Progress:</passive> Viktor can upgrade one of his basic spells.");
	}

	function applySpecial($champion, $enemy) {}
}
?>