-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 10:11 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dropdown`
--

-- --------------------------------------------------------

--
-- Table structure for table `geography`
--

CREATE TABLE `geography` (
  `district` varchar(20) NOT NULL,
  `subdivision` varchar(20) NOT NULL,
  `block` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geography`
--

INSERT INTO `geography` (`district`, `subdivision`, `block`) VALUES
('north', 'Chungthang', 'block1'),
('north', 'Chungthang', 'block2'),
('north', 'Chungthang', 'block3'),
('north', 'Mangan', 'block4'),
('north', 'Mangan', 'block5'),
('north', 'Mangan', 'block6'),
('west', 'Gyalshing', 'block7'),
('west', 'Gyalshing', 'block8'),
('west', 'Gyalshing', 'block9'),
('west', 'Soreng', 'block10'),
('west', 'Soreng', 'block11'),
('west', 'Soreng', 'block12'),
('south', 'Namchi', 'block13'),
('south', 'Namchi', 'block14'),
('south', 'Namchi', 'block15'),
('south', 'Ravong', 'block16'),
('south', 'Ravong', 'block17'),
('south', 'Ravong', 'block18'),
('east', 'Gangtok', 'block19'),
('east', 'Gangtok', 'block20'),
('east', 'Gangtok', 'block21'),
('east', 'Gangtok', 'block22'),
('east', 'Gangtok', 'block23'),
('east', 'Gangtok', 'block24'),
('east', 'Gangtok', 'block25'),
('east', 'Gangtok', 'block26'),
('east', 'Pakyong', 'block27'),
('east', 'Pakyong', 'block28'),
('east', 'Pakyong', 'block29'),
('east', 'Rongli', 'block30'),
('east', 'Rongli', 'block31'),
('east', 'Rongli', 'block32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
