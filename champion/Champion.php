<?php
class Champion {
	private $name; // Champion name
	private $stats = array();	// additional stats (items etc)
	private $baseStats = array(); // baseStats of this champion
	private itemInventory = array();
	private $picture;

	function __construct($champName) {
		$this->name = $champName;
		// get champData out of api by name (can't look up api definition atm but will when i'm back) and safe it in $baseStats
		$this->baseStats["cdr"] = 0;
	}	

	function increaseStat($statName, $statValue) {
		if ($statName == "percentmovementspeed") {
			if (!is_array($this->stats[$statName])) { // movespeed bonuses are multiplicative...
				$this->stats[$statName] = array();
			}
			$this->stats[$statName][] = $statValue;
		} else {
			if (!isset($this->stats[$statName])) {
				$this->stats[$statName] = 0;
			}
			$this->stats[$statName] = $this->stats[$statName] + $statValue;
		}
	}

	private function getAttackSpeed() {
		return 0.625 / (1-$this->baseStats["attackspeedoffset"]) * (1 + $this->stats["percentattackspeed"]);
	}
	
	function addItem($item) {
		if (is_a($item, "Item") {
			$this->itemInventory[] = $item; // addItem at the end
			return true;	
		} else {
			return false;
		}
	}
	
	function recalculateStats() {
		$stats = $baseStats;
		usort($itemInventory, array('Item', 'compareTo'));
		foreach($itemInventory as $item) {
			$item->apply($this);
		}
		// TODO recalculate all stats (--> movespeed etc from the values supplied. then delete those shittie things from stats. --> getStats function
	}

	function evaluateChampion() {
		// do some fancy formular to determine "the worth" of a champion.
	}
}
?>
