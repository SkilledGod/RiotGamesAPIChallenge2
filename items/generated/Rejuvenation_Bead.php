<?php
class Rejuvenation_Bead extends Item {
	function __construct() {
		parent::__construct(1006, "Rejuvenation Bead", array("PercentBaseHealtRegenMod" => 0.5), "1006.png", "+50% Base Health Regen ");
	}

	function applySpecial($champion, $enemy) {}
}
?>
