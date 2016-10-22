-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2016 at 12:20 pm
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ALevelProjDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pickTable`
--

CREATE TABLE `pickTable` (
  `pickID` int(11) NOT NULL,
  `teamID` int(11) NOT NULL,
  `pickPoints` float NOT NULL,
  `pickName` text NOT NULL,
  `teamPlace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickTable`
--

INSERT INTO `pickTable` (`pickID`, `teamID`, `pickPoints`, `pickName`, `teamPlace`) VALUES
(25899863, 1, 6.37442, 'edwardbo123', 2),
(60813930, 1, 3.23488, 'kuurasov', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shoutBoxTable`
--

CREATE TABLE `shoutBoxTable` (
  `userName` text NOT NULL,
  `body` text NOT NULL,
  `shoutBoxID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoutBoxTable`
--

INSERT INTO `shoutBoxTable` (`userName`, `body`, `shoutBoxID`) VALUES
('Administrator', 'Yo waddup, this is the first message like. innit.\r\n', 1),
('Administrator', 'This is the second, you get me?', 2),
('Administrator', '', 2),
('Administrator', 'spam is encouraged, go ham fam', 2),
('Administrator', 'woohoo', 1),
('Administrator', 'this is a meme ya dip', 2),
('Administrator', 'testeroni', 3),
('Administrator', 'ttesteroni', 4),
('Administrator', 'tttesteroni', 5),
('Administrator', 'ttttesteroni', 6),
('Administrator', 'tttttesteroni', 7),
('Administrator', 'first actual test message that works after the testeronis', 8);

-- --------------------------------------------------------

--
-- Table structure for table `teamTable`
--

CREATE TABLE `teamTable` (
  `teamID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `teamName` text NOT NULL,
  `teamPoints` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teamTable`
--

INSERT INTO `teamTable` (`teamID`, `userID`, `teamName`, `teamPoints`) VALUES
(1, 1, 'HeimerdingersCollosi', 4.80465);

-- --------------------------------------------------------

--
-- Table structure for table `userTable`
--

CREATE TABLE `userTable` (
  `userID` int(11) NOT NULL,
  `userName` text NOT NULL,
  `userPassword` text NOT NULL,
  `userNotices` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userTable`
--

INSERT INTO `userTable` (`userID`, `userName`, `userPassword`, `userNotices`) VALUES
(1, 'Administrator', 'rootpassword', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pickTable`
--
ALTER TABLE `pickTable`
  ADD PRIMARY KEY (`pickID`),
  ADD UNIQUE KEY `pickID` (`pickID`);

--
-- Indexes for table `teamTable`
--
ALTER TABLE `teamTable`
  ADD PRIMARY KEY (`teamID`),
  ADD UNIQUE KEY `teamID` (`teamID`);

--
-- Indexes for table `userTable`
--
ALTER TABLE `userTable`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
