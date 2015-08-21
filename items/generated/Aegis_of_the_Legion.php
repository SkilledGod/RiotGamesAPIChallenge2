<?php
class Aegis_of_the_Legion extends Item {
	function __construct() {
		parent::__construct(3105, "Aegis of the Legion", array("FlatHPPoolMod"=> 200,"FlatSpellBlockMod"=> 20,), "3105.png", "+200 Health<br>+20 Magic Resist<br><br><aura>UNIQUE Aura - Legion:</aura> Grants nearby allies +20 Magic Resist and +75% Base Health Regen.<br><br><i>(Unique Auras with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>