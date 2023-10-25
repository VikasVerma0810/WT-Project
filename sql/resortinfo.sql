-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 05:46 AM
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
-- Table structure for table `resortinfo`
--

CREATE TABLE `resortinfo` (
  `id` int NOT NULL,
  `Name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `description` text,
  `amenities` text,
  `room_types` text,
  `price` int DEFAULT NULL,
  `poster` text NOT NULL,
  `discount` int NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resortinfo`
--

INSERT INTO `resortinfo` (`id`, `Name`, `location`, `address`, `contact_info`, `description`, `amenities`, `room_types`, `price`, `poster`, `discount`, `rating`) VALUES
(1, 'Serene Paradise Resort', 'Goa', '123 Beach Road, Goa 403001', '+91 9876543210', 'A luxurious beachfront resort', 'Swimming pool, Spa, Restaurant', 'Deluxe, Ocean View', 300, './Partials/img/Resort/resort1.jpg', 0, 4),
(2, 'Himalayan Retreat', 'Manali, Himachal', '456 Mountain View, Manali 175131', '+91 9871234567', 'Experience the beauty of the hills', 'Spa, Trekking, Scenic Views', 'Standard, Suite', 250, './Partials/img/Resort/resort1.jpg', 0, 5),
(3, 'Royal Oasis Resort', 'Jaipur, Rajasthan', '789 Desert Road, Jaipur 302018', '+91 9823456789', 'A royal experience in the desert', 'Pool, Dining, Camel Rides', 'Deluxe, Palace Suite', 350, './Partials/img/Resort/resort1.jpg', 0, 3),
(4, 'Munnar Hills Retreat', 'Munnar, Kerala', '101 Tea Estate Road, Munnar 685612', '+91 9445678901', 'Nestled in the lush tea gardens', 'Spa, Tea Tasting, Nature Walks', 'Superior, Villa', 200, './Partials/img/Resort/resort1.jpg', 0, 4),
(5, 'Backwaters Serenity', 'Kerala Backwaters', '555 Backwater Lane, Alappuzha 688001', '+91 9898765432', 'Experience tranquility by water', 'Houseboat, Kayaking, Fishing', 'Houseboat, Cottage', 400, './Partials/img/Resort/resort1.jpg', 0, 5),
(6, 'Golden Sands Resort', 'Puri, Odisha', '234 Beachside Road, Puri 752001', '+91 9832109876', 'Relax on the golden sandy beaches', 'Beach Access, Water Sports, Dining', 'Standard, Deluxe Room', 150, './Partials/img/Resort/resort1.jpg', 0, 3),
(7, 'Rustic Hillside Retreat', 'Shimla, Himachal', '789 Hillside Lane, Shimla 171001', '+91 9456789012', 'Cozy retreat in the Himalayas', 'Scenic Views, Bonfire, Hiking Trails', 'Cottage, Family Suite', 280, './Partials/img/Resort/resort1.jpg', 0, 4),
(8, 'Riverside Eco Lodge', 'Rishikesh, Uttarakhand', '345 Riverfront Road, Rishikesh 249201', '+91 9878901234', 'Eco-friendly retreat by the river', 'Yoga, Rafting, Meditation Sessions', 'River View, Tents', 180, './Partials/img/Resort/resort1.jpg', 0, 5),
(9, 'Island Paradise Resort', 'Andaman Islands', '789 Beachside Avenue, Port Blair 744101', '+91 9812345678', 'Escape to a tropical paradise', 'Beach, Water Sports, Scuba Diving', 'Bungalow, Overwater Suite', 500, './Partials/img/Resort/resort1.jpg', 0, 3),
(10, 'Desert Mirage Oasis', 'Jaisalmer, Rajasthan', '456 Dunes Road, Jaisalmer 345001', '+91 9890123456', 'Experience the magic of the desert', 'Camel Safari, Cultural Shows, Dining', 'Tent, Luxury Villa', 400, './Partials/img/Resort/resort1.jpg', 0, 4),
(11, 'Lakeside Tranquility', 'Udaipur, Rajasthan', '101 Lakeview Lane, Udaipur 313001', '+91 9789012345', 'Serene retreat by the lake', 'Boating, Garden, Lakeview Rooms', 'Standard, Suite', 220, './Partials/img/Resort/resort1.jpg', 0, 5),
(12, 'Tropical Beach Hideaway', 'Maldives', '234 Beachfront Road, Malé 20001', '+960 987654321', 'Luxurious beachfront escape', 'Water Villas, Diving, Private Beach', 'Beach Villa, Overwater Villa', 700, './Partials/img/Resort/resort1.jpg', 0, 3),
(13, 'Mountain Lodge Retreat', 'Manali, Himachal', '345 Forest Road, Manali 175131', '+91 9812345678', 'Get close to nature in the hills', 'Forest Trails, Bonfire, Cottage', 'Deluxe, Chalet', 260, './Partials/img/Resort/resort1.jpg', 0, 4),
(14, 'Beachfront Paradise', 'Kerala', '', '+91 9845678901', 'Direct access to sandy beaches', 'Water Sports, Dining, Spa', 'Standard, Beach Villa', 320, './Partials/img/Resort/resort1.jpg', 0, 5),
(15, 'Lakeside Serenity Resort', 'Nainital, Uttarakhand', '789 Lakeview Road, Nainital 263001', '+91 9870123456', 'Tranquil escape by the lake', 'Boating, Nature Walks, Lakeview Rooms', 'Standard, Suite', 240, './Partials/img/Resort/resort1.jpg', 0, 3),
(16, 'Jungle Safari Retreat', 'Jim Corbett National Park', '101 Jungle Road, Ramnagar 244715', '+91 9456789012', 'Adventure in the wilderness', 'Wildlife Safari, Nature Trails', 'Tented Camp, Cottages', 200, './Partials/img/Resort/resort1.jpg', 0, 4),
(17, 'Coastal Vista Resort', 'Goa', '234 Coastal Road, Goa 403001', '+91 9812345678', 'Breathtaking views of the coast', 'Beach Access, Dining, Water Sports', 'Standard, Deluxe Room', 180, './Partials/img/Resort/resort1.jpg', 0, 5),
(18, 'Tranquil Hills Resort', 'Ooty, Tamil Nadu', '567 Hillside Lane, Ooty 643001', '+91 9789012345', 'Peaceful retreat in the Nilgiris', 'Gardens, Hiking, Mountain View', 'Standard, Villa', 220, './Partials/img/Resort/resort1.jpg', 0, 3),
(19, 'Paradise on the Backwaters', 'Kerala Backwaters', '101 Backwater Road, Alappuzha 688001', '+91 9890123456', 'Experience Kerala\'s backwaters', 'Houseboat, Canoeing', 'Backwater Suite, Houseboat', 350, './Partials/img/Resort/resort1.jpg', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resortinfo`
--
ALTER TABLE `resortinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resortinfo`
--
ALTER TABLE `resortinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
