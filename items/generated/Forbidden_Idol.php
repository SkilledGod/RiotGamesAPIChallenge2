<?php
class Forbidden_Idol extends Item {
	function __construct() {
		parent::__construct(3114, "Forbidden Idol", array("PercentBaseManaRegenMod" => 0.5, "FlatCooldownReduction" => 10), "3114.png", "<mana>+50% Base Mana Regen </mana><br><br><unique>UNIQUE Passive:</unique> +10% Cooldown Reduction");
	}

	function applySpecial($champion, $enemy) {}
}
?>