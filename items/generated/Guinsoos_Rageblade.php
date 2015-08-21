<?php
class Guinsoos_Rageblade extends Item {
	function __construct() {
		parent::__construct(3124, "Guinsoo's Rageblade", array("FlatPhysicalDamageMod"=> 30,"FlatMagicDamageMod"=> 40,), "3124.png", "+30 Attack Damage<br>+40 Ability Power<br><br><passive>Passive:</passive> Basic attacks (on attack) and spell casts grant +4% Attack Speed and +4 Ability Power for 8 seconds (stacks up to 8 times).<br><unique>UNIQUE Passive:</unique> Falling below 50% Health grants +20% Attack Speed, +10% Life Steal, and +10% Spell Vamp until out of combat (30 second cooldown).");
	}

	function applySpecial($champion, $enemy) {}
}
?>