<?php
class Dorans_Ring_Showdown extends Item {
	function __construct() {
		parent::__construct(1076, "Doran's Ring (Showdown)", array("FlatHPPoolMod"=> 60,"FlatMPRegenMod"=> 0.6,"FlatMagicDamageMod"=> 15,), "1076.png", "+60 Health<br>+15 Ability Power<br>+3 Mana Regen per 5 seconds<br><br><passive>Passive:</passive> Restores 4 Mana upon killing a unit.<br><br><groupLimit>Limited to 2 Doran's items on Showdown</groupLimit><br><br>");
	}

	function applySpecial($champion, $enemy) {}
}
?>