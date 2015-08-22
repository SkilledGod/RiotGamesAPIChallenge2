<?php
class Guardians_Horn extends Item {
	function __construct() {
		parent::__construct(2051, "Guardian's Horn", array("FlatHPPoolMod"=> 200, "PercentBaseHealthRegenMod" => 1.25), "2051.png", "+200 Health<br>+125% Base Health Regeneration <br><br><unique>UNIQUE Passive:</unique> Enemy spellcasts reduce the cooldown of Battle Cry by 1 second.<br><active>UNIQUE Active - Battle Cry:</active> Gain 30% Movement Speed, 20 Armor, and 20 Magic Resist for 3 seconds. 25 second cooldown.");
	}

	function applySpecial($champion, $enemy) {}
}
?>
