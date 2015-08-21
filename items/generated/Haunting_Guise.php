<?php
class Haunting_Guise extends Item {
	function __construct() {
		parent::__construct(3136, "Haunting Guise", array("FlatHPPoolMod"=> 200,"FlatMagicDamageMod"=> 25,), "3136.png", "+25 Ability Power<br>+200 Health<br><br><unique>UNIQUE Passive - Eyes of Pain:</unique> +15 Magic Penetration<br><br><i>(Magic Penetration: Magic damage is increased by ignoring an amount of the target's Magic Resist equal to Magic Penetration.)</i><br><br><i>(Unique Passives with the same name do not stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>