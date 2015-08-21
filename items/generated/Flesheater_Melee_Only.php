<?php
class Flesheater_Melee_Only extends Item {
	function __construct() {
		parent::__construct(3924, "Flesheater (Melee Only)", array("FlatPhysicalDamageMod"=> 20,"PercentLifeStealMod"=> 0.1,), "3924.png", "+20 Attack Damage<br>+10% Life Steal<br><br><font color='#FF9900'><unique>UNIQUE Passive:</unique></font> Basic attacks build Flesh charges. After 5 basic attacks, the Flesheater active will be ready.<br><br><font color='#FF9900'><active>UNIQUE Active - Flesheater:</active></font> Rip the flesh from target enemy minion dealing 200 (+75% AD) true damage to the target, healing the user for 50 (+75% AD) health and adding 1 Flesh stack to the item. <br><br><font color='#FF9900'><unique>UNIQUE Passive:</unique></font> Each stack on Flesheater adds 1 AD to the wielder.<br><br><i><font color='#FDD017'>''No need to sharpen after use.''</font></i>");
	}

	function applySpecial($champion, $enemy) {}
}
?>