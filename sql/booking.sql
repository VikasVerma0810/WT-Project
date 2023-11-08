-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 05:39 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resort`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `rid` int NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `count` int NOT NULL,
  `checkIn` date DEFAULT NULL,
  `checkOut` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `rid`, `name`, `mobile`, `count`, `checkIn`, `checkOut`) VALUES
(7, 1, 'Prathamesh Sunil Yadav', '8767370132', 3, '2023-11-01', '2023-11-08'),
(7, 1, 'Prathamesh Sunil Yadav', '8767370132', 2, '2023-11-01', '2023-11-08'),
(7, 1, 'Prathamesh Sunil Yadav', '8767370132', 2, '2023-11-01', '2023-11-08'),
(7, 1, 'Prathamesh Sunil Yadav', '8767370132', 2, '2023-11-01', '2023-11-08'),
(7, 1, 'Prathamesh Sunil Yadav', '8767370132', 4, '2023-11-01', '2023-11-08'),
(7, 16, 'Pranav', '000012', 2, '2023-11-01', '2023-11-08'),
(7, 1, 'Prathamesh', '8767370132', 3, '2023-11-01', '2023-11-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
