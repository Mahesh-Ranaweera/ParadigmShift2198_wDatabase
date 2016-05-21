-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2016 at 01:16 AM
-- Server version: 10.0.20-MariaDB-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mi6softl_paradigm`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE IF NOT EXISTS `credentials` (
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `resetpassw` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`email`, `username`, `firstName`, `lastName`, `password`, `resetpassw`) VALUES
('asd@gmail.com', 'asd', 'asd', 'lastname', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70'),
('lol@gmail.com', 'mi6softlab', 'Mahesh', 'Ranaweera', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `first`
--

CREATE TABLE IF NOT EXISTS `first` (
  `year` int(20) NOT NULL,
  `val` int(20) DEFAULT NULL,
  `comp_name` varchar(100) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `comp_desc` text NOT NULL,
  `comp_rules` text NOT NULL,
  `robot_name` varchar(100) NOT NULL,
  `robot_desc` text NOT NULL,
  `first_logo` varchar(150) NOT NULL,
  `first_field` varchar(150) NOT NULL,
  `first_robot` varchar(150) NOT NULL,
  `first_other` varchar(150) NOT NULL,
  `post` mediumtext NOT NULL,
  PRIMARY KEY (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `first`
--

INSERT INTO `first` (`year`, `val`, `comp_name`, `video_url`, `comp_desc`, `comp_rules`, `robot_name`, `robot_desc`, `first_logo`, `first_field`, `first_robot`, `first_other`, `post`) VALUES
(2016, 1, 'Aerial Assist', '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/oxp4dkMQ1Vo" frameborder="0" webkitallowfullscreen allowfullscreen></iframe>', 'FIRST is an international high school robotics competition. FRC is a ever growing community with 2720 + teams and over 45,000 + students from Australia, Brazil, Canada,Chile, Turkey, the Netherlands, Israel, the United States, the United Kingdom, and Mexico. Each year exciting new game is released. Teams will have to build the robot to overcome the challenge. Under strict rules, limited resources, and time limit, teams have to raise funds, build and program the robot. Mentors ,sponsors and volunteers and professionals guide students to succeed.', 'FIRST is an international high school robotics competition. FRC is a ever growing community with 2720 + teams and over 45,000 + students from Australia, Brazil, Canada,Chile, Turkey, the Netherlands, Israel, the United States, the United Kingdom, and Mexico. Each year exciting new game is released. Teams will have to build the robot to overcome the challenge. Under strict rules, limited resources, and time limit, teams have to raise funds, build and program the robot. Mentors ,sponsors and volunteers and professionals guide students to succeed.', 'Paradigm Shift', 'FIRST is an international high school robotics competition. FRC is a ever growing community with 2720 + teams and over 45,000 + students from Australia, Brazil, Canada,Chile, Turkey, the Netherlands, Israel, the United States, the United Kingdom, and Mexico. Each year exciting new game is released. Teams will have to build the robot to overcome the challenge. Under strict rules, limited resources, and time limit, teams have to raise funds, build and program the robot. Mentors ,sponsors and volunteers and professionals guide students to succeed.', 'content/first/first_logo/first_logo_2016.jpg', 'content/first/first_field/first_field_2016.jpg', 'content/first/first_robot/first_robot_2016.jpg', 'content/first/first_other/first_other_2016.jpg', ''),
(2222, 1, 'Some Game', '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/jLQb4m2a5TQ" frameborder="0" webkitallowfullscreen allowfullscreen></iframe>', 'Some info ', 'some info', 'Excaliber', 'robot description', 'content/first/first_logo/first_logo_2222.jpg', 'content/first/first_field/first_field_2222.jpg', 'content/first/first_robot/first_robot_2222.jpg', 'content/first/first_other/first_other_2222.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `vex`
--

CREATE TABLE IF NOT EXISTS `vex` (
  `year` int(20) NOT NULL,
  `val` int(20) DEFAULT NULL,
  `comp_name` varchar(100) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `comp_desc` mediumtext NOT NULL,
  `comp_rules` mediumtext NOT NULL,
  `robot_name` varchar(100) NOT NULL,
  `robot_desc` mediumtext NOT NULL,
  `vex_logo` varchar(150) NOT NULL,
  `vex_field` varchar(150) NOT NULL,
  `vex_robot` varchar(150) NOT NULL,
  `vex_other` varchar(150) NOT NULL,
  PRIMARY KEY (`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
