<?php
class Champion {
	private $id;
	private $name; // Champion name
	private $stats = array();	// additional stats (items etc)
	private $baseStats = array(); // baseStats of this champion
	private $itemInventory = array();
	private $picture;
	private $level;

	function __construct($champId, $level, $mysqli) {
		$stats = $mysqli->query("select champs.name as champName, stats.name as stat_name, champ_stats.value as value from champs, champ_stats, stats where champs.id = champ_stats.champ_id AND champ_stats.stat_id = stats.id and champs.id = " .$champId);
		while ($stat = $stats->fetch_assoc()) {
			$this->name = $stat['champName'];
			$this->baseStats[$stat['stat_name']] = $stat['value'];
		}
		$this->id = $champId;
		$this->level = $level;
		$this->stats['percentmovementspeed'] = array();
	}	

	function getId() {
		return $this->id;
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
	
	function getItems() {
		return $this->itemInventory;
	}

	function getLevel() {
		return $this->level;
	}

	function getPicture() {
		return $this->picture;	
	}

	function getName() {
		return $this->name;
	}
	// does not recalculate stats
	function addItem($item) {
		if (is_a($item, "Item")) {
			$this->itemInventory[] = $item; // addItem at the end
			return true;	
		} else {
			return false;
		}
	}
	
	function evaluateChampion($mysqli) {
		$object = $mysqli->query("SELECT * FROM statToPointMap");
		$score = 0;
		while ($row = $object->fetch_assoc()) {
			$score += $this->getStatByName($row['name']) * $row['value'];
		}		

		return $score;
	}

	function recalculateStats($enemy) {
		$this->stats = array();
		$this->stats['percentmovementspeed'] = array();
		foreach($this->itemInventory as $item) {
			$item->apply($this, $enemy);
		}
	}

	function getStatByName($name) {
		$value = 0;
		switch ($name) {
			case "AttackSpeed":
				$value =  $this->getAttackSpeed();
			break;
			case "MagicDamage":
				$value =  $this->getMagicDamage();
			break;
			case "AttackDamage":
				$value =  $this->getAttackDamage();
			break;
			case "SpellblockPenetration":
				$value =  $this->getSpellblockPenetration();
			break;
			case "ArmorPenetration":
				$value =  $this->getArmorPenetration();
			break;
			case "CooldownReduction":
				$value =  $this->getCooldownReduction();
			break;
			case "Armor":
				$value =  $this->getArmor();
			break;
			case "Spellblock":
				$value =  $this->getSpellblock();
			break;
			case "PercentSpellblockPenetration":
				$value =  $this->getPercentSpellblockPenetration();
			break;
			case "PercentArmorPenetration":
				$value =  $this->getPercentArmorPenetration();
			break;
			case "MovementSpeed":
				$value =  $this->getMovementSpeed();
			break;
			case "CritChance":
				$value =  $this->getCritChance();
			break;
			case "CritDamage":
				$value =  $this->getCritDamage();
			break;
			case "HealthPool":
				$value =  $this->getHealthPool();
			break;
			case "ManaPool":
				$value =  $this->getManaPool();
			break;
			case "ManaPoolRegen":
				$value =  $this->getManaPoolRegen();
			break;
			case "HealthPoolRegen":
				$value =  $this->getHealthPoolRegen();
			break;
			case "LifeSteal":
				$value =  $this->getLifeSteal();
			break;
			case "Spellvamp":
				$value =  $this->getSpellvamp();
			break;
			case "Tenacity":
				$value =  $this->getTenacity();
			break;

		}
		return $value == NULL ? 0.0 : $value;
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
	
	function getCooldownReduction() {
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
