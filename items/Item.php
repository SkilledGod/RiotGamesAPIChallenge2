<?php

abstract class Item {
	private $effect = array();
	private $stats = array();
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


	final function applyChampion($champion) {
		foreach ($this->stats as $statName => $statValue) {
                    $champion->increaseStat(strtolower(str_replace("Mod", "", $statName)), $statValue);
		}
		$this->applyEffect($champion);
	}

	final function applyEnemy($enemy) {
		$this->applyEffectEnemy($enemy);
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
	
	abstract protected function applyEffect($champion);
	abstract protected function applyEffectEnemy($enemy);
}
?>
