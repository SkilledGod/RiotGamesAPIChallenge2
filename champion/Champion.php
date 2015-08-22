<?php
class Champion {
	private $name; // Champion name
	private $stats = array();	// additional stats (items etc)
	private $baseStats = array(); // baseStats of this champion
	private itemInventory = array();
	private $picture;
	private $level;

	function __construct($champName, $level) {
		$this->name = $champName;
		// get champData out of api by name (can't look up api definition atm but will when i'm back) and safe it in $baseStats
		$this->baseStats["cdr"] = 0;
		$this->level = $level;
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
	
	// does not recalculate stats
	function addItem($item) {
		if (is_a($item, "Item") {
			$this->itemInventory[] = $item; // addItem at the end
			return true;	
		} else {
			return false;
		}
	}
	
	function evaluateChampion() {
		// do some fancy formular to determine "the worth" of a champion.
	}

	function recalculateStats() {
		$this->stats = array();
		usort($itemInventory, array('Item', 'compareTo'));
		foreach($itemInventory as $item) {
			$item->apply($this);
		}
	}

	function getAttackSpeed() {
		return min(2.5, 0.625 / (1-$this->baseStats["attackspeedoffset"]) * (1 + $this->stats["percentattackspeed"] + $this->baseStats['attackspeedperlevel'] * $this->level));
	}

	function getMagicDamage() {
		return ($this->stats['flatmagicdamage'] + $this->level * $this->stats['flatmagicdamageperlevel'] + $this->getManaPool() * $this->stats['flatmagicdamagepercentmanapool'])* (1+$this->stats['percentmagicdamage']);
	}

	function getAttackDamage() {
		return $this->baseStats['attackdamage'] + ($this->level - 1) * $this->baseStats['attackdamageperlevel'] + $this->stats['flatphysicaldamage'];
	}

	function getSpellblockPenetration() {
		return $this->stats['flatspellblockpenetration'];
	}

	function getArmorPenetration() {
		return $this->stats['flatarmorpenetration'];
	}
	
	function gerCooldownReduction() {
		return min(40, $this->stats['flatcooldownreduction']);
	}

	function getArmor() {
		return $this->baseStats['armor'] + $this->level * $this->baseStats['armorperlevel'] + $this->stats['flatarmor'];
	}

	function getSpellblock() {
		return $this->baseStats['spellblock'] + $this->level * $this->baseStats['spellblockperlevel'] + $this->stats['flatspellblock'];
	}

	function getPercentSpellblockPenetration() {
		return $this->stats['percentspellblock'];
	}

	function getPercentArmorPenetration() {
		return $this->stats['percentarmorpenetration'];
	}
	function getMovementSpeed() {
		// todo soft cap!!!!
		$movementspeed = $this->baseStats['movespeed'] + $this->stats['flatmovementspeed'];
		foreach ($this->stats['percentmovementspeed'] as $mult) {
			$movementspeed *= (1+$mult);
		}
		if ($movementspeed > 490) {
			$movementspeed = ($movementspeed - 490) * 0.5 + 0.8 * ($movementspeed - 415) + 415; 
		} else if ($movementspeed > 415) {
			$movementspeed = ($movementspeed - 415) * 0.8 + 415;
		}
		return $movementspeed;
	}
	
	function getCritChance() {
		return $this->baseStats['crit'] + $this->level * $this->baseStats['critperlevel'] + $this->stats['flatcritchance'];
	}

	function getCritDamage() {
		return 1 + $this->stats['flatcritdamage'];
	}

	function getHealthPool() {
		return ($this->baseStats['hp'] + $this->level * $this->baseStats['hpperlevel'] + $this->stats['flathpool']) * (1+$this->stats['percentbonushealth']);
	}

	function getManaPool() {
		return $this->baseStats['mp'] + $this->level * $this->baseStats['mpperlevel'] + $this->stats['flatmpool'];
	}

	function getManaPoolRegen() {
		return (1+$this->stats['percentbasemanaregen'])*$this->baseStats['mpregen'] + $this->level * $this->baseStats['mpregenperlevel'] + $this->stats['flatmpregen'];
	}

	function getHealthPoolRegen() {
		return (1+$this->stats['percentbasehealthregen']) * $this->baseStats['hpregen'] + $this->level * $this->baseStats['hpregenperlevel'] + $this->stats['flathpregen'];
	}

	function getLifeSteal() {
		return $this->stats['percentlifesteal'];
	}

	function getSpellvamp() {
		return $this->stats['percentspellvamp'];
	}

	function getTenacity() {
		return $this->stats['flattenacity'];
	}
}
	
?>
