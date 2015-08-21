<?php
class Phage extends Item {
	function __construct() {
		parent::__construct(3044, "Phage", array("FlatHPPoolMod"=> 200,"FlatPhysicalDamageMod"=> 20,), "3044.png", "+200 Health<br>+20 Attack Damage<br><br><unique>UNIQUE Passive - Rage:</unique> Basic attacks grant 20 Movement Speed for 2 seconds. Kills grant 60 Movement Speed instead. This Movement Speed bonus is halved for ranged champions.<br><br><i>(Unique Passives with the same name don't stack.)</i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>