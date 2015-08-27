<?php
include_once(dirname(__DIR__) ."/Item.php");
class Dead_Mans_Plate extends Item {
	function __construct() {
		parent::__construct(3742, "Dead Man's Plate", array("FlatHPPoolMod"=> 600,"FlatArmorMod"=> 55,), "3742.png", "+600 Health<br>+55 Armor<br><br><unique>UNIQUE Passive - Dreadnought:</unique> While moving, build stacks of Momentum, increasing movement speed by up to 60 at 100 stacks. Momentum quickly decays while under the effects of a stun, taunt, fear, silence, blind, polymorph, or immobilize effect, and slowly decays while slowed.<br><unique>UNIQUE Passive - Crushing Blow:</unique> Basic attacks discharge all Momentum, dealing 1 physical damage per 2 stacks. If 100 stacks are discharged, damage is doubled and the target is slowed by 75% decaying over 1 second (melee only).<br><br><font color='#FDD017'><i>''There’s only one way you’ll get this armor from me...''</i> - forgotten namesake</font>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>