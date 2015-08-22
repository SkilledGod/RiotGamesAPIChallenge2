<?php
class Raptor_Cloak extends Item {
	function __construct() {
		parent::__construct(2053, "Raptor Cloak", array("FlatArmorMod"=> 40,"PercentBaseHealthRegenMod" => 1), "2053.png", "+40 Armor<br>+100% Base Health Regen <br><br><unique>UNIQUE Passive - Point Runner:</unique> Builds up to +30% Movement Speed over 2 seconds while near turrets (including fallen turrets).");
	}

	function applySpecial($champion, $enemy) {}
}
?>
