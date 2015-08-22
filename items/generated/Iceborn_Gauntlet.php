<?php
class Iceborn_Gauntlet extends Item {
	function __construct() {
		parent::__construct(3025, "Iceborn Gauntlet", array("FlatMPPoolMod"=> 500,"FlatArmorMod"=> 60,"FlatMagicDamageMod"=> 30, "FlatCooldownReductionMod" => 10), "3025.png", "+60 Armor<br>+30 Ability Power<br>+10% Cooldown Reduction<br><mana>+500 Mana</mana><br><br><unique>UNIQUE Passive - Spellblade:</unique> After using an ability, the next basic attack (on hit) deals bonus physical damage equal to 125% of base Attack Damage to enemies near the target, and creates a field around the target for 2 seconds that slows enemy Movement Speed by 30% (1.5 second cooldown, half-sized field if ranged).<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
