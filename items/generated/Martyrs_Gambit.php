<?php
class Martyrs_Gambit extends Item {
	function __construct() {
		parent::__construct(3911, "Martyr's Gambit", array("FlatHPPoolMod"=> 400, "PercentHealthRegenMod" => 1, "FlatCooldownReduction" => 10), "3911.png", "+400 Health<br>+100% Base Health Regen <br>+10% Cooldown Reduction<br><br><active>UNIQUE Active:</active> Binds yourself to target champion for the next 3 seconds, redirecting 60% of all damage dealt to them to  yourself. (30 second cooldown).<br><br><font color='#FDD017'><i>''Battle is not a test of strength. It is a test of will.''</i> - Buhru Proverb</font>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
