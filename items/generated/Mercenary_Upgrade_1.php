<?php
include_once(dirname(__DIR__) ."/Item.php");
class Mercenary_Upgrade_1 extends Item {
	function __construct() {
		parent::__construct(3615, "Mercenary Upgrade 1", array(), "3615.png", "Gives your mercenary the first level upgrade.<br><br><font color='#FF9900'>Razorfin</font> - Upon aggroing an enemy champion, your Razorfin will pursue them endlessly.  While attacking enemy champions your Razorfin has 100% increased movement speed and ignores unit collision.<br><br><font color='#FF9900'>Ironback</font> - Your Ironback deals 175% damage to enemy structures. Your Ironback gains a shield that blocks the attack damage from the next basic attack from a champion or a turret (on-hit effects like Lich Bane are not blocked). The shield is renewed 10 seconds after it breaks.<br><br><font color='#FF9900'>Plundercrab</font> - Your Plundercrab has +50 attack range. Your Plundercrab now gains a stacking 20% attack speed buff (up to 150%) for 3 seconds every time they hit an enemy champion.<br><br><font color='#FF9900'>Ocklepod</font> - Your Ocklepod has 10 Magic Resistance. Your Ocklepod spawns a moving Clairvoyance every 30 seconds. After a 4 second delay, it grants vision to a nearby area for 4 seconds.");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>