-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2015 at 01:32 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `riotchallenger2`
--

-- --------------------------------------------------------

--
-- Table structure for table `511`
--

CREATE TABLE IF NOT EXISTS `511` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cost` int(100) NOT NULL,
  `pickrate` int(100) NOT NULL,
  `winrate` int(100) NOT NULL,
  `ap` int(100) NOT NULL,
  `mr` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `511`
--

INSERT INTO `511` (`id`, `name`, `cost`, `pickrate`, `winrate`, `ap`, `mr`) VALUES
('3001', 'Abyssal Scepter', 2440, 0, 0, 70, 50),
('3113', 'Aether Wisp', 850, 0, 0, 30, 0),
('1052', 'Amplifying Tome', 435, 0, 0, 20, 0),
('3003', 'Archangel''s Staff', 2700, 0, 0, 60, 0),
('3504', 'Ardent Censer', 2100, 0, 0, 40, 0),
('3174', 'Athene''s Unholy Grail', 2700, 0, 0, 60, 25),
('3060', 'Banner of Command', 3000, 0, 0, 60, 20),
('1026', 'Blasting Wand', 860, 0, 0, 40, 0),
('1056', 'Doran''s Ring', 400, 0, 0, 15, 0),
('3108', 'Fiendish Codex', 820, 0, 0, 30, 0),
('3092', 'Frost Queen''s Claim', 2200, 0, 0, 50, 0),
('3098', 'Frostfang', 865, 0, 0, 10, 0),
('3124', 'Guinsoo''s Rageblade', 2600, 0, 0, 40, 0),
('3136', 'Haunting Guise', 1485, 0, 0, 25, 0),
('3146', 'Hextech Gunblade', 3400, 0, 0, 80, 0),
('3145', 'Hextech Revolver', 1200, 0, 0, 40, 0),
('3025', 'Iceborn Gauntlet', 2900, 0, 0, 30, 0),
('3151', 'Liandry''s Torment', 2900, 0, 0, 50, 0),
('3100', 'Lich Bane', 3000, 0, 0, 80, 0),
('3433', 'Lost Chapter', 1800, 0, 0, 50, 0),
('3285', 'Luden''s Echo', 3100, 0, 0, 120, 0),
('3041', 'Mejai''s Soulstealer', 1400, 0, 0, 20, 0),
('3170', 'Moonflair Spellblade', 2620, 0, 0, 50, 50),
('3165', 'Morellonomicon', 2300, 0, 0, 80, 0),
('3115', 'Nashor''s Tooth', 2920, 0, 0, 60, 0),
('1058', 'Needlessly Large Rod', 1600, 0, 0, 80, 0),
('3431', 'Netherstride Grimoire', 3000, 0, 0, 100, 0),
('3198', 'Perfect Hex Core', 3000, 0, 0, 60, 0),
('3434', 'Pox Arcana', 3000, 0, 0, 100, 0),
('1063', 'Prospector''s Ring', 950, 0, 0, 35, 0),
('3089', 'Rabadon''s Deathcap', 3300, 0, 0, 120, 0),
('3430', 'Rite of Ruin', 3000, 0, 0, 100, 0),
('3027', 'Rod of Ages', 2800, 0, 0, 60, 0),
('3116', 'Rylai''s Crystal Scepter', 2900, 0, 0, 100, 0),
('3191', 'Seeker''s Armguard', 1200, 0, 0, 25, 0),
('3048', 'Seraph''s Embrace', 2700, 0, 0, 60, 0),
('3057', 'Sheen', 1200, 0, 0, 25, 0),
('3303', 'Spellthief''s Edge', 365, 0, 0, 5, 0),
('3744', 'Staff of Flowing Water', 1635, 0, 0, 40, 0),
('3196', 'The Hex Core mk-1', 1000, 0, 0, 20, 0),
('3197', 'The Hex Core mk-2', 2000, 0, 0, 40, 0),
('3829', 'Trickster''s Glass', 2115, 0, 0, 60, 0),
('3078', 'Trinity Force', 3703, 0, 0, 30, 0),
('3023', 'Twin Shadows', 2400, 0, 0, 80, 0),
('3135', 'Void Staff', 2295, 0, 0, 70, 0),
('3152', 'Will of the Ancients', 2500, 0, 0, 80, 0),
('3090', 'Wooglet''s Witchcap', 3540, 0, 0, 100, 0),
('3050', 'Zeke''s Harbinger', 2300, 0, 0, 50, 0),
('3157', 'Zhonya''s Hourglass', 3300, 0, 0, 120, 0);

-- --------------------------------------------------------

--
-- Table structure for table `514`
--

CREATE TABLE IF NOT EXISTS `514` (
  `name` varchar(100) NOT NULL,
  `cost` int(100) NOT NULL,
  `pickrate` int(100) NOT NULL,
  `winrate` int(100) NOT NULL,
  `ap` int(100) NOT NULL,
  `mr` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `514`
--

INSERT INTO `514` (`name`, `cost`, `pickrate`, `winrate`, `ap`, `mr`) VALUES
('Abyssal Scepter', 2430, 0, 0, 70, 50),
('Aether Wisp', 850, 0, 0, 30, 0),
('Amplifying Tome', 435, 0, 0, 20, 0),
('Archangel''s Staff', 3000, 0, 0, 80, 0),
('Ardent Censer', 2100, 0, 0, 40, 0),
('Athene''s Unholy Grail', 2700, 0, 0, 60, 25),
('Banner of Command', 3000, 0, 0, 60, 20),
('Blasting Wand', 850, 0, 0, 40, 0),
('Doran''s Ring', 400, 0, 0, 15, 0),
('Fiendish Codex', 820, 0, 0, 30, 0),
('Frost Queen''s Claim', 2200, 0, 0, 50, 0),
('Frostfang', 865, 0, 0, 10, 0),
('Guinsoo''s Rageblade', 2590, 0, 0, 40, 0),
('Haunting Guise', 1500, 0, 0, 25, 0),
('Hextech Gunblade', 3400, 0, 0, 80, 0),
('Hextech Revolver', 1200, 0, 0, 40, 0),
('Iceborn Gauntlet', 2900, 0, 0, 30, 0),
('Liandry''s Torment', 3000, 0, 0, 80, 0),
('Lich Bane', 3000, 0, 0, 80, 0),
('Lost Chapter', 1800, 0, 0, 50, 0),
('Luden''s Echo', 3000, 0, 0, 100, 0),
('Mejai''s Soulstealer', 1400, 0, 0, 20, 0),
('Moonflair Spellblade', 2620, 0, 0, 50, 50),
('Morellonomicon', 2300, 0, 0, 80, 0),
('Nashor''s Tooth', 3000, 0, 0, 80, 0),
('Needlessly Large Rod', 1250, 0, 0, 60, 0),
('Netherstride Grimoire', 3000, 0, 0, 100, 0),
('Perfect Hex Core', 3000, 0, 0, 60, 0),
('Pox Arcana', 3000, 0, 0, 100, 0),
('Prospector''s Ring', 950, 0, 0, 35, 0),
('Rabadon''s Deathcap', 3500, 0, 0, 120, 0),
('Rite of Ruin', 3000, 0, 0, 100, 0),
('Rod of Ages', 2700, 0, 0, 60, 0),
('Rylai''s Crystal Scepter', 3000, 0, 0, 100, 0),
('Seeker''s Armguard', 1200, 0, 0, 25, 0),
('Seraph''s Embrace', 3000, 0, 0, 80, 0),
('Sheen', 1200, 0, 0, 25, 0),
('Spellthief''s Edge', 365, 0, 0, 5, 0),
('Staff of Flowing Water', 1635, 0, 0, 40, 0),
('The Hex Core mk-1', 1000, 0, 0, 20, 0),
('The Hex Core mk-2', 2000, 0, 0, 40, 0),
('Trickster''s Glass', 2115, 0, 0, 60, 0),
('Trinity Force', 3703, 0, 0, 30, 0),
('Twin Shadows', 2400, 0, 0, 80, 0),
('Void Staff', 2500, 0, 0, 80, 0),
('Will of the Ancients', 2500, 0, 0, 80, 0),
('Wooglet''s Witchcap', 3500, 0, 0, 100, 0),
('Zeke''s Harbinger', 2300, 0, 0, 50, 0),
('Zhonya''s Hourglass', 3000, 0, 0, 100, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `511`
--
ALTER TABLE `511`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `514`
--
ALTER TABLE `514`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
