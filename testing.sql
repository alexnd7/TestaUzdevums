-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 10:11 PM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) NOT NULL,
  `parent_question` int(10) unsigned NOT NULL,
  `correct_answer` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `parent_question`, `correct_answer`) VALUES
(1, 'Answer1', 1, '0'),
(2, 'Answer2', 1, '1'),
(3, 'Answer3', 1, '0'),
(4, 'Answer1', 2, '1'),
(5, 'Answer2', 2, '0'),
(6, 'Answer3', 2, '0'),
(7, 'Answer1', 3, '0'),
(8, 'Answer2', 3, '0'),
(9, 'Answer3', 3, '1'),
(10, 'Answer1', 4, '1'),
(11, 'Answer2', 4, '0'),
(12, 'Answer3', 4, '0'),
(13, 'Answer1', 5, '1'),
(14, 'Answer2', 5, '0'),
(15, 'Answer3', 5, '0'),
(16, 'Answer1', 6, '0'),
(17, 'Answer2', 6, '1'),
(18, 'Answer3', 6, '0');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `questions` varchar(255) NOT NULL,
  `parent_test` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questions`, `parent_test`) VALUES
(1, 'Question1_1?', 1),
(2, 'Question2_1?', 1),
(3, 'Question3_1?', 1),
(4, 'Question1_2?', 2),
(5, 'Question2_2?', 2),
(6, 'Question3_2?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`) VALUES
(1, 'Test1'),
(2, 'Test2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
