<?php
class Wardens_Mail extends Item {
	function __construct() {
		parent::__construct(3082, "Warden's Mail", array("FlatArmorMod"=> 45,), "3082.png", "+45 Armor<br><br><unique>UNIQUE Passive - Cold Steel:</unique> When hit by basic attacks, reduces the attacker's Attack Speed by 15% for 1 seconds.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>