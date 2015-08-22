<?php
class Zekes_Harbinger extends Item {
	function __construct() {
		parent::__construct(3050, "Zeke's Harbinger", array("FlatHPPoolMod"=> 250,"FlatMPPoolMod"=> 250,"FlatArmorMod"=> 35,"FlatMagicDamageMod"=> 50, "FlatCooldownReductionMod" => 10), "3050.png", "<mana>+250 Mana</mana><br>+35 Armor<br>+50 Ability Power<br>+10% Cooldown Reduction<br><br><active>UNIQUE Active - Conduit:</active> Bind to target ally (60 second cooldown).<br><unique>UNIQUE Passive:</unique> When within 1000 units of each other, you and your ally generate Charges. Attacking or casting spells generates extra Charges. At 100 Charges, causing damage consumes them, increasing you and your ally's Ability Power by 20% and Critical Strike Chance by 50% for 6 seconds. ");
	}

	function applySpecial($champion, $enemy) {}
}
?>
