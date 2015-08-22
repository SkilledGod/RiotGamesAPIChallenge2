<?php
class Righteous_Glory extends Item {
	function __construct() {
		parent::__construct(3800, "Righteous Glory", array("FlatHPPoolMod"=> 500,"FlatMPPoolMod"=> 300, "PercentBaseHealthRegenMod" => 1), "3800.png", "+500 Health<br><mana>+300 Mana</mana><br>+100% Base Health Regen <br><br><unique>UNIQUE Passive - Valor's Reward:</unique> Upon leveling up, restores 150 Health and 200 Mana over 8 seconds.<br><unique>UNIQUE Active:</unique> Grants +60% Movement Speed to nearby allies when moving towards enemies or enemy turrets for 3 seconds. After 3 seconds, a shockwave is emitted, slowing nearby enemy champion Movement Speed by 80% for 1 second(s) (90 second cooldown).<br><br>This effect may be reactivated early to instantly release the shockwave.");
	}

	function applySpecial($champion, $enemy) {}
}
?>
