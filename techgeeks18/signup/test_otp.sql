-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 09:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_otp`
--

-- --------------------------------------------------------

--
-- Table structure for table `otp_record`
--

CREATE TABLE `otp_record` (
  `otp` varchar(6) NOT NULL,
  `otp_number` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_record`
--

INSERT INTO `otp_record` (`otp`, `otp_number`) VALUES
('091831', '9965656488'),
('1lRoB7', '4564812'),
('276835', '9965656455'),
('5dWiR2', '736'),
('7jZSxC', '456'),
('875WhZ', '369852147'),
('DQZsUJ', '74512456'),
('iebvR0', '9833316725'),
('j6D1Vf', '123456'),
('jIWTCi', '7899944444'),
('kCmVdc', '5555555555'),
('lcYLPe', '8888888888'),
('qAwcMs', '753'),
('sl5CL8', '951'),
('U5qFRr', '98'),
('ujK9RV', '1023654789'),
('v9JiyV', '3241235345'),
('X9YwRT', '666666666'),
('ZdMSsi', '9965656454'),
('ZlBvYq', '741');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otp_record`
--
ALTER TABLE `otp_record`
  ADD PRIMARY KEY (`otp_number`),
  ADD UNIQUE KEY `otp` (`otp`,`otp_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
