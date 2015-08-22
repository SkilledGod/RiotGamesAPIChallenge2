<?php
class Mikaels_Crucible extends Item {
	function __construct() {
		parent::__construct(3222, "Mikael's Crucible", array("FlatSpellBlockMod"=> 40, "FlatCooldownReduction" => 10, "PercentBaseManaRegenMod" => 1), "3222.png", "+40 Magic Resist<br>+10% Cooldown Reduction<br><mana>+100% Base Mana Regen </mana><br><br><mana><unique>UNIQUE Passive - Mana Font:</unique> Restores 2% of missing Mana every 5 seconds.</mana><br><active>UNIQUE Active:</active> Removes all stuns, roots, taunts, fears, silences, and slows on an allied champion and heals that champion for 150 (+10% of maximum Health) (180 second cooldown).<br><br><i>(Unique Passives with the same name do not stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
