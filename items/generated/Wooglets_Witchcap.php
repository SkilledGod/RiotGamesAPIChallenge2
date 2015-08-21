<?php
class Wooglets_Witchcap extends Item {
	function __construct() {
		parent::__construct(3090, "Wooglet's Witchcap", array("FlatArmorMod"=> 45,"FlatMagicDamageMod"=> 100,), "3090.png", "+100 Ability Power<br>+45 Armor  <br><br><unique>UNIQUE Passive:</unique> Increases Ability Power by 25%<br><active>UNIQUE Active:</active> Champion becomes invulnerable and untargetable for 2.5 seconds, but is unable to move, attack, cast spells, or use items during this time (90 second cooldown).");
	}

	function applySpecial($champion, $enemy) {}
}
?>