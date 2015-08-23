<?php
abstract class Item {
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

	final function apply($champion, $enemy) {
		foreach ($this->stats as $statName => $statValue) {
			$champion->increaseStat(strtolower(str_replace("Mod", "", $statName)), $statValue);
		}
		$this->applySpecial($champion, $enemy);
	}

	public function getPicture() {
		return $this->picture;
	}
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	// Implemented by child class (see below. depends on the api implementation)
	abstract function applySpecial($champion, $enemy); // e. g. set apModifier to 1.35 (rabadons)
}
?>
