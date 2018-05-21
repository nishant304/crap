-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 08:44 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`id`, `name`, `mobile`) VALUES
(1, 'sachin', '23465456'),
(2, 'demo9', '443'),
(3, 'demo8', '123'),
(4, 'demo9', '4430'),
(11, 'gvfdgdg', '1234546456'),
(41, 'demo2', '12345'),
(111, 'demo4', '34567'),
(118, 'demo8', '79011'),
(11911, 'defdgdfmo9', '90122'),
(2011, 'dfg', '101233'),
(211, 'demo11', '112344'),
(221, 'rahdfgul', '123455'),
(231, 'fdg', '134566'),
(241, 'dfggfdg', '145677'),
(251, 'dfgdfgdf', '45554'),
(261, '45dfgdf', '76'),
(1751, 'fdftghfd', '7654');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
