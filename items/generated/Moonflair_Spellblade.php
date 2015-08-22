<?php
class Moonflair_Spellblade extends Item {
	function __construct() {
		parent::__construct(3170, "Moonflair Spellblade", array("FlatArmorMod"=> 50,"FlatMagicDamageMod"=> 50,"FlatSpellBlockMod"=> 50, "FlatTenacityMod" => 0.35), "3170.png", "+50 Ability Power<br>+50 Armor<br>+50 Magic Resist<br><br><unique>UNIQUE Passive - Tenacity:</unique> Reduces the duration of stuns, slows, taunts, fears, silences, blinds, polymorphs, and immobilizes by 35%.<br><br><i>(Unique Passives with the same name do not stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>
