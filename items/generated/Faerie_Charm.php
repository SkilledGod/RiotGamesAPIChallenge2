<?php
class Faerie_Charm extends Item {
	function __construct() {
		parent::__construct(1004, "Faerie Charm", array("PercentBaseManaRegen" => 0.25), "1004.png", "<mana>+25% Base Mana Regen </mana>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
