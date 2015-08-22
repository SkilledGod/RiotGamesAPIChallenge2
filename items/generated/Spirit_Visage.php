<?php
class Spirit_Visage extends Item {
	function __construct() {
		parent::__construct(3065, "Spirit Visage", array("FlatHPPoolMod"=> 400,"FlatSpellBlockMod"=> 55, "PercentBaseHealthRegenMod" => 1, "FlatCooldownReduction" => 10), "3065.png", "+400 Health<br>+55 Magic Resist<br>+100% Base Health Regen <br>+10% Cooldown Reduction<br><br><unique>UNIQUE Passive:</unique> Increases all healing received by 20%.");
	}

	function applySpecial($champion, $enemy) {}
}
?>
