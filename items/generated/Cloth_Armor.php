<?php
class Cloth_Armor extends Item {
	function __construct() {
		parent::__construct(1029, "Cloth Armor", array("FlatArmorMod"=> 15,), "1029.png", "+15 Armor");
	}

	function applySpecial($champion, $enemy) {}
}
?>