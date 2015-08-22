-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2015 at 10:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mj_rel_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `_id` int(3) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(15) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`_id`, `tagname`) VALUES
(1, 'Father'),
(2, 'Brother');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `_id` int(3) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(80) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `fullname`) VALUES
(1, 'Shubham Arora'),
(2, 'Jatin'),
(3, 'Vaibhav'),
(4, 'hahaha'),
(5, 'yoyoyo'),
(6, 'hey');

-- --------------------------------------------------------

--
-- Table structure for table `user_relationship`
--

CREATE TABLE IF NOT EXISTS `user_relationship` (
  `current_user_id` int(3) NOT NULL,
  `tag` varchar(15) NOT NULL,
  `related_user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_relationship`
--

INSERT INTO `user_relationship` (`current_user_id`, `tag`, `related_user_id`) VALUES
(1, 'brother', 2),
(2, 'brother', 1),
(3, 'brother', 1),
(3, 'brother', 4),
(1, 'Brother', 4),
(1, 'Brother', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
