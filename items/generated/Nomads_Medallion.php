<?php
include_once(dirname(__DIR__) ."/Item.php");
class Nomads_Medallion extends Item {
	function __construct() {
		parent::__construct(3096, "Nomad's Medallion", array("percentbasehealthregen" => 0.25, "percentbasemanaregen" => 0.5, "flatmovementspeed" => 10), "3096.png", "+25% Base Health Regen <br><mana>+50% Base Mana Regen <br></mana>+10 Movement Speed<br>+2 Gold per 10 seconds<br><br><unique>UNIQUE Passive - Favor:</unique> Being near a minion death without dealing the killing blow grants 4 Gold and 10 Health.<br><br><groupLimit>Limited to 1 Gold Income item</groupLimit><br><br><i><font color='#447777'>''The medallion shines with the glory of a thousand voices when exposed to the sun.'' - Historian Shurelya, 22 June, 24 CLE</font></i><br><br>");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>