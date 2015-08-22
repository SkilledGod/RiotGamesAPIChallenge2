<?php
class Abyssal_Scepter extends Item {
	function __construct() {
		parent::__construct(3001, "Abyssal Scepter", array("FlatMagicDamageMod"=> 70,"FlatSpellBlockMod"=> 50,), "3001.png", "+70 Ability Power<br>+50 Magic Resist<br><br><aura>UNIQUE Aura:</aura> Reduces the Magic Resist of nearby enemies by 20.");
	}

	function applySpecial($champion, $enemy) {
		// Passive
		$enemy->increaseStat("FlatSpellBlockMod", -20);
	}
}
?>
