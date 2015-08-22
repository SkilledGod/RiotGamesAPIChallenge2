<?php
class Banner_of_Command extends Item {
	function __construct() {
		parent::__construct(3060, "Banner of Command", array("FlatHPPoolMod"=> 200,"FlatMagicDamageMod"=> 60,"FlatSpellBlockMod"=> 20, "FlatCooldownReduction" => 10,), "3060.png", "+200 Health<br>+60 Ability Power<br>+20 Magic Resist<br>+10% Cooldown Reduction<br><br><aura>UNIQUE Aura - Legion:</aura> Grants nearby allies +20 Magic Resist and +75% Base Health Regen.<br><active>UNIQUE Active - Promote:</active> Greatly increases the power of a lane minion and grants it immunity to magic damage (120 second cooldown).<br><br><i>(Unique Auras with the same name do not stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
