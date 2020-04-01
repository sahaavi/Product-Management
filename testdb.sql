-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 09:24 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `email`, `userName`, `password`, `gender`, `dob`, `picture`) VALUES
('Avishek ', 'avishek123@gmail.co', 'saha', '123', 'male', '10/01/1999', 'uploads/IMG_0082 (3) edit pro-min.jpg'),
('Riki Saha', 'r@gmail.com', 'rs', '1234', 'male', '10/01/1999', 'uploads/user-male-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` bigint(100) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pquantity` mediumint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `description`, `pquantity`) VALUES
(1, '7up', '600ml', 80),
(2, '7up', '600ml', 5),
(1, '7up', '600ml', 80),
(0, '7up', '600ml', 23),
(0, '7up', '600ml', 78);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
