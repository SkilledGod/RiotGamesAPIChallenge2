-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2015 at 06:37 
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riotchallenger2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ap_items`
--

CREATE TABLE IF NOT EXISTS `ap_items` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pickrate511` int(255) NOT NULL DEFAULT '0',
  `winrate511` int(255) NOT NULL DEFAULT '0',
  `pickrate514` int(255) NOT NULL DEFAULT '0',
  `winrate514` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_items`
--

INSERT INTO `ap_items` (`id`, `name`, `pickrate511`, `winrate511`, `pickrate514`, `winrate514`) VALUES
(1026, 'Blasting Wand', 0, 0, 0, 0),
(1052, 'Amplifying Tome', 0, 0, 0, 0),
(1056, 'Doran''s Ring', 0, 0, 0, 0),
(1058, 'Needlessly Large Rod', 0, 0, 0, 0),
(1063, 'Prospector''s Ring', 0, 0, 0, 0),
(3001, 'Abyssal Scepter', 0, 0, 0, 0),
(3003, 'Archangel''s Staff', 0, 0, 0, 0),
(3023, 'Twin Shadows', 0, 0, 0, 0),
(3025, 'Iceborn Gauntlet', 0, 0, 0, 0),
(3027, 'Rod of Ages', 0, 0, 0, 0),
(3041, 'Mejai''s Soulstealer', 0, 0, 0, 0),
(3048, 'Seraph''s Embrace', 0, 0, 0, 0),
(3050, 'Zeke''s Harbinger', 0, 0, 0, 0),
(3057, 'Sheen', 0, 0, 0, 0),
(3060, 'Banner of Command', 0, 0, 0, 0),
(3078, 'Trinity Force', 0, 0, 0, 0),
(3089, 'Rabadon''s Deathcap', 0, 0, 0, 0),
(3090, 'Wooglet''s Witchcap', 0, 0, 0, 0),
(3092, 'Frost Queen''s Claim', 0, 0, 0, 0),
(3098, 'Frostfang', 0, 0, 0, 0),
(3100, 'Lich Bane', 0, 0, 0, 0),
(3108, 'Fiendish Codex', 0, 0, 0, 0),
(3113, 'Aether Wisp', 0, 0, 0, 0),
(3115, 'Nashor''s Tooth', 0, 0, 0, 0),
(3116, 'Rylai''s Crystal Scepter', 0, 0, 0, 0),
(3124, 'Guinsoo''s Rageblade', 0, 0, 0, 0),
(3135, 'Void Staff', 0, 0, 0, 0),
(3136, 'Haunting Guise', 0, 0, 0, 0),
(3145, 'Hextech Revolver', 0, 0, 0, 0),
(3146, 'Hextech Gunblade', 0, 0, 0, 0),
(3151, 'Liandry''s Torment', 0, 0, 0, 0),
(3152, 'Will of the Ancients', 0, 0, 0, 0),
(3157, 'Zhonya''s Hourglass', 0, 0, 0, 0),
(3165, 'Morellonomicon', 0, 0, 0, 0),
(3170, 'Moonflair Spellblade', 0, 0, 0, 0),
(3174, 'Athene''s Unholy Grail', 0, 0, 0, 0),
(3191, 'Seeker''s Armguard', 0, 0, 0, 0),
(3196, 'The Hex Core mk-1', 0, 0, 0, 0),
(3197, 'The Hex Core mk-2', 0, 0, 0, 0),
(3198, 'Perfect Hex Core', 0, 0, 0, 0),
(3285, 'Luden''s Echo', 0, 0, 0, 0),
(3303, 'Spellthief''s Edge', 0, 0, 0, 0),
(3430, 'Rite of Ruin', 0, 0, 0, 0),
(3431, 'Netherstride Grimoire', 0, 0, 0, 0),
(3433, 'Lost Chapter', 0, 0, 0, 0),
(3434, 'Pox Arcana', 0, 0, 0, 0),
(3504, 'Ardent Censer', 0, 0, 0, 0),
(3744, 'Staff of Flowing Water', 0, 0, 0, 0),
(3829, 'Trickster''s Glass', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `choosenItems`
--

CREATE TABLE IF NOT EXISTS `choosenItems` (
  `game_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `turn` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(255) NOT NULL,
  `player_id` int(255) NOT NULL,
  `state_id` int(255) NOT NULL,
  `champId` int(255) NOT NULL,
  `currentScore` decimal(65,10) NOT NULL,
  `opponentGame` int(255) NOT NULL,
  `opponentChampId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposedItems`
--

CREATE TABLE IF NOT EXISTS `proposedItems` (
  `game_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `turn` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `chronology` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ap_items`
--
ALTER TABLE `ap_items`
  ADD KEY `item_id` (`id`);

--
-- Indexes for table `choosenItems`
--
ALTER TABLE `choosenItems`
  ADD UNIQUE KEY `ind` (`game_id`,`item_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposedItems`
--
ALTER TABLE `proposedItems`
  ADD UNIQUE KEY `item` (`game_id`,`item_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
