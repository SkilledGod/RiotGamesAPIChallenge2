<?php
include_once(dirname(__DIR__) ."/Item.php");
class Hextech_Gunblade extends Item {
	function __construct() {
		parent::__construct(3146, "Hextech Gunblade", array("FlatPhysicalDamageMod"=> 40,"FlatMagicDamageMod"=> 80,"PercentLifeStealMod"=> 0.1,), "3146.png", "+40 Attack Damage<br>+80 Ability Power<br>+10% Life Steal<br><br><unique>UNIQUE Passive:</unique> +20% Spell Vamp<br><unique>UNIQUE Passive:</unique> Basic attacks (on hit) and single-target spells against champions reduce the cooldown of this item by 3 seconds.<br><active>UNIQUE Active:</active> Deals 150 (+40% of Ability Power) magic damage and slows the target champion's Movement Speed by 40% for 2 seconds (60 second cooldown).<br><br><i>(Spell Vamp: Abilities heal for a percentage of the damage they deal. Area of Effect spells only grant one-third of the healing from Spell Vamp.)</i>");
	}

	function applyEffect($champion) {
            $champion->applyEffect("hextech gunblade", "percentspellvamp", 0.2, true);
	}
	function applyEffectEnemy($enemy) {}
}
?>