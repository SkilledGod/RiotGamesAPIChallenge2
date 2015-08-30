<?php

class Champion {
	private $id;
	private $name; // Champion name
	private $stats = array();	// additional stats (items etc)
	private $baseStats = array(); // baseStats of this champion
	private $effects = array();
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
		$this->initStats();
	}	

	private function initStats() {
		// init all stats
		$this->stats['percentmovementspeed'] = array();
		$this->stats['asSlow'] = array();
		$this->stats['percentattackspeed'] = 0;
		$this->stats['flatmagicdamage'] = 0;
		$this->stats['flatmagicdamageperlevel'] = 0;
		$this->stats['flatmagicdamagepercentmanapool'] = 0;
		$this->stats['percentmagicdamage'] = 0;
		$this->stats['flatphysicaldamage'] = 0;
		$this->stats['adperpercentmaxmana'] = 0;
		$this->stats['flatspellblockpenetration'] = 0;
		$this->stats['flatarmorpenetration'] = 0;
		$this->stats['flatcooldownreduction'] = 0;
		$this->stats['flatarmor'] = 0;
		$this->stats['flatspellblock'] = 0;
		$this->stats['percentspellblockpenetration'] = 0;
		$this->stats['percentarmorpenetration'] = 0;
		$this->stats['flatmovementspeed'] = 0;
		$this->stats['flatcritchance'] = 0;
		$this->stats['flatcritdamage'] = 0;
		$this->stats['flathpool'] = 0;
		$this->stats['percentbonushealth'] = 0;
		$this->stats['flatmpool'] = 0;
		$this->stats['flatmpregen'] = 0;
		$this->stats['percentbasemanaregen'] = 0;
		$this->stats['percentbasehealthregen'] = 0;
		$this->stats['flathpregen'] = 0;
		$this->stats['percentlifesteal'] = 0;
		$this->stats['percentspellvamp'] = 0;
		$this->stats['flattenacity'] = 0;

	}
	function increaseStat($statName, $statValue) {
		if ($statName == "percentmovementspeed" || $statName == "asSlow") {
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
	
	function addItem($item) {
		if (is_a($item, "Item")) {
			$this->itemInventory[] = $item; // addItem at the end
			return true;	
		} else {
			return false;
		}
	}	

	function applyEffect($effectName, $statNames, $statValue, $unique) {
		if (!isset($this->effects[$effectName])) {
			$this->effects[$effectName] = array();
		}
		
		// if non arrays are supplied
                if (!is_array($statNames)) {
                    $statNames = array($statNames);
                }
                
                if (!is_array($statValue)) {
                    $statValue = array($statValue);
                }
                
		foreach($statNames as $stat) {
			if (!isset($this->effects[$effectName][$stat])) {
				$this->effects[$effectName][$stat] = array();	
				$this->effects[$effectName][$stat][0] = $statValue[0];
			} else {
				if ($unique) { // array has only 1 value
					$this->effects[$effectName][$stat][0] = max($statValue[0], $this->effects[$effectName][$stat][0]);
				} else { // add at the end of the array
					$this->effects[$effectName][$stat][] = $statValue[0];
				}
			}
		}
	}
	
	function getId() {
		return $this->id;
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
	
	function evaluateChampion($mysqli) {
		$object = $mysqli->query("SELECT * FROM statToPointMap");
		$score = 0;
        	while ($row = $object->fetch_assoc()) {
        		$score += $this->getStatByName($row['name']) * $row['value'];
		}		
        	return $score;
	}

	function applyEffectsEnemy($enemy) {
		foreach($this->itemInventory as $item) {
			$item->applyEnemy($enemy);
		}
	}

	function recalculateStats($enemy) {
		$this->stats = array();
		$this->initStats();
		foreach($this->itemInventory as $item) {
			$item->applyChampion($this); // own stats & effects
		}
		// enemy effects (e. g. Abyssal)
		$enemy->applyEffectsEnemy($this);
		// calculate effects
		foreach($this->effects as $effect) {
			foreach($effect as $statName => $statValues) {
				foreach($statValues as $statValue) {
					$this->increaseStat($statName, $statValue);
				}
			}
		}	
	}

	// TODO $this->get$value()??
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
                $slowFactor = 1;
                if (isset($this->stats['asSlow'])) {
                    foreach ($this->stats["asSlow"] as $slow) {
                        $slowFactor *= (1 - $slow);
                    }
                }
		return min(2.5, 0.625 / (1+$this->baseStats["attackspeedoffset"]) * (1 + $this->stats["percentattackspeed"] + $this->baseStats['attackspeedperlevel'] * $this->level/100))*$slowFactor;
	}

	function getMagicDamage() {
		return ($this->stats['flatmagicdamage'] + $this->level * $this->stats['flatmagicdamageperlevel'] + $this->getManaPool() * $this->stats['flatmagicdamagepercentmanapool'])* (1+$this->stats['percentmagicdamage']);
	}

	function getAttackDamage() {
		return ($this->baseStats['attackdamage'] + ($this->level - 1) * $this->baseStats['attackdamageperlevel'] + $this->stats['flatphysicaldamage']) * (1 + $this->stats['adperpercentmaxmana'] * $this->getManaPool());
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
		return $this->stats['percentspellblockpenetration'];
	}

	function getPercentArmorPenetration() {
		return $this->stats['percentarmorpenetration'];
	}
	function getMovementSpeed() {
		// todo soft cap!!!!
		$movementspeed = $this->baseStats['movespeed'] + $this->stats['flatmovementspeed'];
                if (isset($this->stats['percentmovementspeed'])) {
                    foreach ($this->stats['percentmovementspeed'] as $mult) {
                            $movementspeed *= (1+$mult);
                    }
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
