<?php
abstract class Item {
	private $priority = 0; // least priority --> first item
	private $stats;
	private $name;
	private $picture;
	private $description;
	private $id;

	function __construct($id, $itemName, $stats, $picture, $description) {
		$this->id = $id;
		$this->name = $itemName;
		$this->stats = $stats;
		$this->picture = $picture;		
		$this->description = $description;
	}

	static function compareTo($itemA, $itemB) {
		return $itemA->getPriority() < $itemB->getPriority();
	}

	function getPriority() {
		return $this->priority();
	}

	final function apply($champion, $enemy) {
		foreach ($this->stats as $statName => $statValue) {
			$champion->apply(strtolower(str_replace("Mod", "", $statName)), $statValue);
		}
		$this->applySpecial($champion, $enemy);
	}
	
	// Implemented by child class (see below. depends on the api implementation)
	abstract function applySpecial($champion, $enemy); // e. g. set apModifier to 1.35 (rabadons)
}
?>