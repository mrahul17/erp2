-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2014 at 05:03 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp`
--
CREATE DATABASE IF NOT EXISTS `erp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `erp`;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(28) DEFAULT NULL,
  `Hall` varchar(200) DEFAULT NULL,
  `AlumSince` int(4) DEFAULT NULL,
  `assigned` int(11) NOT NULL COMMENT 'can be either 0 or 1',
  `registered` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=377 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `Name`, `Hall`, `AlumSince`, `assigned`, `registered`) VALUES
(330, 'ALUM SINCE', 'HALL\r', NULL, 0, ''),
(331, '1964', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(332, '1964', '\r', NULL, 0, ''),
(333, '1964', '\r', NULL, 0, ''),
(334, '1964', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(335, '1964', '\r', NULL, 0, ''),
(336, '1964', 'Azad Hall\r', NULL, 0, ''),
(337, '1964', 'Nehru Hall\r', NULL, 0, ''),
(338, '1964', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(339, '1974', 'Lala Lajpat Rai Hall\r', NULL, 0, ''),
(340, '1974', 'Lala Lajpat Rai Hall\r', NULL, 0, ''),
(341, '1974', '\r', NULL, 0, ''),
(342, '1974', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(343, '1974', 'Vidya Sagar Hall\r', NULL, 0, ''),
(344, '1974', 'Vidya Sagar Hall\r', NULL, 0, ''),
(345, '1974', 'Nehru Hall\r', NULL, 0, ''),
(346, '1974', 'Patel Hall\r', NULL, 0, ''),
(347, '1974', 'Patel Hall\r', NULL, 0, ''),
(348, '1974', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(349, '1974', '\r', NULL, 0, ''),
(350, '1989', 'Azad Hall\r', NULL, 0, ''),
(351, '1989', 'Azad Hall\r', NULL, 0, ''),
(352, '1989', 'Patel Hall\r', NULL, 0, ''),
(353, '1989', 'Radhakrishnan Hall\r', NULL, 0, ''),
(354, '1989', '\r', NULL, 0, ''),
(355, '1989', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(356, '1989', 'Lala Lajpat Rai Hall\r', NULL, 0, ''),
(357, '1989', 'Nehru Hall\r', NULL, 0, ''),
(358, '1989', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(359, '1989', 'Azad Hall\r', NULL, 0, ''),
(360, '1989', 'Vidya Sagar Hall\r', NULL, 0, ''),
(361, '1989', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(362, '1989', 'Lala Lajpat Rai Hall\r', NULL, 0, ''),
(363, '1989', 'Rajendra Prasad Hall\r', NULL, 0, ''),
(364, '1989', '\r', NULL, 0, ''),
(365, '1989', 'Vidya Sagar Hall\r', NULL, 0, ''),
(366, '1989', 'Nehru Hall\r', NULL, 0, ''),
(367, '1989', 'Lala Lajpat Rai Hall\r', NULL, 0, ''),
(368, '1989', 'Radhakrishnan Hall\r', NULL, 0, ''),
(369, '1989', 'Azad Hall\r', NULL, 0, ''),
(370, '1975', 'Patel Hall\r', NULL, 0, ''),
(371, '1976', 'Patel Hall\r', NULL, 0, ''),
(372, '1976', 'Patel Hall\r', NULL, 0, ''),
(373, '1976', '\r', NULL, 0, ''),
(374, '1977', 'Patel Hall\r', NULL, 0, ''),
(375, '1977', 'Patel Hall\r', NULL, 0, ''),
(376, '1978', 'Patel Hall\r', NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privilege` int(11) NOT NULL COMMENT 'can have 4 values',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `privilege`, `email`) VALUES
('', '', '', 0, ''),
('Admin', 'admin', 'peace', 3, 'mishra.rahul1712@gmail.com'),
('Arpit', 'arpit', 'peace', 1, 'arpit366@gmail.com'),
('Naman', 'root', 'rmmr', 1, 'namannishesh@gmail.com'),
('testuser', 'test', 'peace', 2, 'user@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `toname` varchar(30) NOT NULL,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `table`, `description`, `toname`, `fromid`, `toid`) VALUES
(1, 'alumni', '', 'rahul', 1, 30),
(2, 'alumni', '', 'Rahul', 1, 1),
(3, 'alumni', '', 'Rahul', 3, 1),
(4, 'alumni', '', 'Rahul', 3, 1),
(5, 'alumni', '', 'Rahul', 3, 4),
(6, 'alumni', '', 'Rahul', 3, 4),
(7, 'alumni', '', 'Rahul', 3, 4),
(8, 'alumni', '', 'Rahul', 3, 4),
(9, 'alumni', 'PUT description ', 'Rahul', 1, 1),
(10, 'alumni', 'PUT description ', 'Rahul', 7, 13),
(11, 'alumni', 'PUT description here', 'Arpit', 27, 27),
(12, 'alumni', 'PUT description here', 'Rahul', 1, 55),
(13, 'alumni', 'PUT description here', 'Rahul', 1, 55),
(14, 'alumni', 'PUT description here', 'Rahul', 61, 67),
(15, 'alumni', 'PUT description here', 'Rahul', 60, 70),
(16, 'alumni', 'PUT description here', 'Rahul', 70, 74),
(17, 'alumni', 'PUT description here', 'Rahul', 83, 85),
(18, 'alumni', 'PUT description here', 'Rahul', 83, 85),
(19, 'alumni', 'PUT description here', 'Rahul', 80, 81),
(20, 'alumni', 'PUT description here', 'Rahul', 56, 56),
(21, 'alumni', 'PUT description here', 'Rahul', 75, 86),
(22, 'alumni', 'PUT description here', 'Rahul', 60, 93),
(23, 'alumni', 'PUT description here', 'Rahul', 56, 56),
(24, 'alumni', 'PUT description here', 'Rahul', 57, 57),
(25, 'alumni', 'PUT description here', 'Rahul', 58, 58),
(26, 'alumni', 'PUT description here', 'Rahul', 59, 59);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
