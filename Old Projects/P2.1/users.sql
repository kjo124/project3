-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2017 at 05:17 PM
-- Server version: 1.0.121
-- PHP Version: 5.6.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `blowfish_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `type`, `password`, `email`, `blowfish_hash`) VALUES
('ct310', 'admin', 'A835E0', 'ct310@cs.colostate.edu', '$2a$10$AoWRyJ/EvpnVfchrezeTKuzJBYBomjiG3AszuFw2mvWAvJf2APojO'),
('fred', 'customer', '3B23E6', 'ct310@cs.colostate.edu', '$2a$10$vxY3bcMBmLJWqPoaJuq2xeKxHzKVWf2q5DyLPMGU9am9tYh7Cb.vO');
