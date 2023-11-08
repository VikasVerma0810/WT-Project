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
-- Table structure for table `log_details`
--

CREATE TABLE `log_details` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_details`
--

INSERT INTO `log_details` (`id`, `email`, `password`, `name`, `phone`, `image`) VALUES
(2, 'prathamesh.yadav21@pccoepune.org', '$2y$10$1p7GxHhTHNyKnVg7yR7AJuu76.ROMDLgTCgKB.u2gWyZVW08JvlBe', 'Prathamesh Yadav', '9987939363', 'http://localhost/WT-Project/admin-panel/resorts/gallery/clgLogo.jpg'),
(7, 'prathameshsyadav1712@gmail.com', '$2y$10$DZad/bxiBS85uZlDidV.te0LzXd9aGrBMol9hdiFVvXNeHEaz1Eg2', 'Prathamesh', '8742622422', 'http://localhost/WT-Project/admin-panel/resorts/gallery/clgLogo.jpg'),
(8, 'admin@gmail.com', '$2y$10$LziBEUaaPcgpSXVc0eI52uG.zGpYhxHht61su81DZfQez8LsGDIWO', 'Prathamesh', '8767370132', 'http://localhost/WT-Project/admin-panel/resorts/gallery/clgLogo.jpg'),
(9, 'user@gmail.com', '$2y$10$bVMnUflJApRMsKjl/rcidu4aVXWN./1RSxpRpm6DQIV7xTGJWBo9y', 'User', '989565698', 'http://localhost/WT-Project/admin-panel/resorts/gallery/profile.png'),
(10, 'a@gmail.com', '$2y$10$3ayoKX/iywlPKjIwTme.u.INmW8SBqzYTSJogKbZxMyEm.s922mhW', 'abc', '867876998', 'http://localhost/WT-Project/admin-panel/resorts/gallery/profile.png'),
(11, 'vk@gmail.com', '$2y$10$hEPkYOJrXqpacLh68xHJGu/PN6eQC8LPi48bHDxLfHLQb2DbDoXby', 'vikas', 'Vikas@21', 'http://localhost/WT-Project/admin-panel/resorts/gallery/profile.png'),
(12, 'jaikoli2@gmail.com', '$2y$10$s9f7JGjE.15PBZAnrgF7n.kj9ABYkBaUqbnrB7Ki7O7Fem7N2lOWG', 'jai', '9321792558', 'http://localhost/WT-Project/admin-panel/resorts/gallery/profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_details`
--
ALTER TABLE `log_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_details`
--
ALTER TABLE `log_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
