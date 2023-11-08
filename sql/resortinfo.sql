-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 05:40 PM
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
  `highlights` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `amenities` text,
  `room_types` text,
  `price` int DEFAULT NULL,
  `poster` text NOT NULL,
  `discount` int NOT NULL,
  `rating` int NOT NULL,
  `overview` text NOT NULL,
  `more` text NOT NULL,
  `mid` int NOT NULL,
  `listing` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resortinfo`
--

INSERT INTO `resortinfo` (`id`, `Name`, `location`, `address`, `contact_info`, `highlights`, `amenities`, `room_types`, `price`, `poster`, `discount`, `rating`, `overview`, `more`, `mid`, `listing`) VALUES
(1, 'Serene Paradise Resort', 'Goa', '123 Beach Road, Goa 403001', '+91 9876543210', 'Comfortable rooms and villas with the elegant and refined furnishing, overlooking the views of the beautiful ocean and lawn<--->Experience a delightful stay at a resort that is amidst the picturesque beach and sparkling waters of Puducherry<--->Refresh yourself in the soothing water of the swimming pool with a view of the magnificent resort<--->Relish a breathtaking view of the starry night and wash away your stress with an open-to-sky plunge<--->The package is valued at 8,800 INR in the market', 'Swimming pool, Spa, Restaurant, Trekking', 'Deluxe, Ocean View', 300, 'http://localhost/WT-Project/admin-panel/resorts/gallery/SereneParadiseResort/resort1.jpg', 0, 4, 'Embrace the experience where you would be engulfed by luxury and nature at the same time. This Ocean Spray Beach resort stay experience lets you get a luxurious weekend getaway with your family and friends. Situated on a beachside, this resort is a legendary hideaway, back-to-nature, yet charming urban resort.<--->This luxurious stay in Ocean Spray Beach resort comes with the choice to stay in standard rooms and deluxe rooms. The bedrooms would be allocated on a double/triple sharing basis and contain the necessary equipment with comfortable furnishing. During your stay you would be assisted with facilities like parking, caretaker service and other luxurious amenities that are sure to make your stay memorable and worth the penny. <--->You can also order meals from the in-house kitchen by paying additional charges. The resort also has a grand swimming pool, clubhouse and garden area where you can relax and have a great time with your loved ones.', 'You must carry a valid id proof at all times during your stay.<--->Packages need to be paid in full to receive the confirmation voucher.<--->The package cannot be split.<--->Please adhere to the Check-In and Check-Out timings.<--->Menus are subject to change without notice.<--->The activity might be delayed or postponed due to weather conditions. In such a scenario, the next best possible time slot will be informed.<--->Participants are not allowed to carry any sharp object, lighter, luggage bag, alcohol, knife, etc.<--->Participants must pay attention to the guidelines given by the instructor before and after the activity.<--->Any breakage or damage of any items will be charged at actual.<--->Guidelines issued by the respective State-Government is to be followed. Social distancing to be maintained. Frequent hand sanitization and use of masks recommended.<--->ID proof is mandatory for each individual guest at the time of booking, and also upon arrival. PAN card will not be considered as a valid address proof.\r\n', 4, 1),
(2, 'Himalayan Retreat', 'Manali, Himachal', '456 Mountain View, Manali 175131', '+91 9871234567', 'Experience the beauty of the hills', 'Spa, Trekking, Scenic Views', 'Standard, Suite', 250, 'http://localhost/WT-Project/admin-panel/resorts/gallery/HimalayanRetreat/resort2.jpg', 0, 5, '', '', 5, 1),
(3, 'Royal Oasis Resort', 'Jaipur, Rajasthan', '789 Desert Road, Jaipur 302018', '+91 9823456789', 'A royal experience in the desert', '', 'Deluxe, Palace Suite', 350, 'http://localhost/WT-Project/admin-panel/resorts/gallery/RoyalOasisResort/resort3.jpg', 0, 3, '', '', 3, 1),
(4, 'Munnar Hills Retreat', 'Munnar, Kerala', '101 Tea Estate Road, Munnar 685612', '+91 9445678901', 'Nestled in the lush tea gardens', 'Spa, Tea Tasting, Nature Walks', 'Superior, Villa', 200, 'http://localhost/WT-Project/admin-panel/resorts/gallery/MunnarHillsRetreat/resrot4.jpg', 0, 4, '', '', 4, 1),
(5, 'Backwaters Serenity', 'Kerala Backwaters', '555 Backwater Lane, Alappuzha 688001', '+91 9898765432', 'Experience tranquility by water', '', 'Houseboat, Cottage', 400, 'http://localhost/WT-Project/admin-panel/resorts/gallery/BackwatersSerenity/resrot5.jpg', 0, 5, '', '', 5, 1),
(6, 'Golden Sands Resort', 'Puri, Odisha', '234 Beachside Road, Puri 752001', '+91 9832109876', 'Relax on the golden sandy beaches', 'Beach Access, Water Sports, Dining', 'Standard, Deluxe Room', 150, 'http://localhost/WT-Project/admin-panel/resorts/gallery/GoldenSandsResort/resrot6.jpg', 0, 3, '', '', 3, 1),
(7, 'Rustic Hillside Retreat', 'Shimla, Himachal', '789 Hillside Lane, Shimla 171001', '+91 9456789012', 'Cozy retreat in the Himalayas', 'Scenic Views, Bonfire, Hiking Trails', 'Cottage, Family Suite', 280, 'http://localhost/WT-Project/admin-panel/resorts/gallery/RusticHillsideRetreat/resrot4.jpg', 0, 4, '', '', 4, 1),
(8, 'Riverside Eco Lodge', 'Rishikesh, Uttarakhand', '345 Riverfront Road, Rishikesh 249201', '+91 9878901234', 'Eco-friendly retreat by the river', 'Yoga, Rafting, Meditation Sessions', 'River View, Tents', 180, './Partials/img/Resort/resort1.jpg', 0, 5, '', '', 5, 1),
(9, 'Island Paradise Resort', 'Andaman Islands', '789 Beachside Avenue, Port Blair 744101', '+91 9812345678', 'Escape to a tropical paradise', '', 'Bungalow, Overwater Suite', 500, 'http://localhost/WT-Project/admin-panel/resorts/gallery/IslandParadiseResort/resrot7.jpg', 0, 3, '', '', 3, 1),
(10, 'Desert Mirage Oasis', 'Jaisalmer, Rajasthan', '456 Dunes Road, Jaisalmer 345001', '+91 9890123456', 'Experience the magic of the desert', '', 'Tent, Luxury Villa', 400, 'http://localhost/WT-Project/admin-panel/resorts/gallery/DesertMirageOasis/resrot8.jpg', 0, 4, '', '', 4, 1),
(11, 'Lakeside Tranquility', 'Udaipur, Rajasthan', '101 Lakeview Lane, Udaipur 313001', '+91 9789012345', 'Serene retreat by the lake', '', 'Standard, Suite', 220, 'http://localhost/WT-Project/admin-panel/resorts/gallery/LakesideTranquility/resrot9.jpg', 0, 5, '', '', 4, 1),
(12, 'Tropical Beach Hideaway', 'Maldives', '234 Beachfront Road, Malé 20001', '+960 987654321', 'Luxurious beachfront escape', '', 'Beach Villa, Overwater Villa', 700, 'http://localhost/WT-Project/admin-panel/resorts/gallery/TropicalBeachHideaway/resrot10.jpg', 0, 3, '', '', 5, 1),
(13, 'Mountain Lodge Retreat', 'Manali, Himachal', '345 Forest Road, Manali 175131', '+91 9812345678', 'Get close to nature in the hills', '', 'Deluxe, Chalet', 260, 'http://localhost/WT-Project/admin-panel/resorts/gallery/MountainLodgeRetreat/resort1.jpg', 0, 4, '', '', 3, 1),
(14, 'Beachfront Paradise', 'Kerala', '', '+91 9845678901', 'Direct access to sandy beaches', 'Spa, Water Sports, Dining', 'Standard, Beach Villa', 320, 'http://localhost/WT-Project/admin-panel/resorts/gallery/BeachfrontParadise/resort2.jpg', 0, 5, '', '', 4, 1),
(15, 'Lakeside Serenity Resort', 'Nainital, Uttarakhand', '789 Lakeview Road, Nainital 263001', '+91 9870123456', 'Tranquil escape by the lake', '', 'Standard, Suite', 240, 'http://localhost/WT-Project/admin-panel/resorts/gallery/LakesideSerenityResort/resort3.jpg', 0, 3, '', '', 5, 1),
(16, 'Jungle Safari Retreat', 'Jim Corbett National Park', '101 Jungle Road, Ramnagar 244715', '+91 9456789012', 'Adventure in the wilderness', '', 'Tented Camp, Cottages', 200, 'http://localhost/WT-Project/admin-panel/resorts/gallery/JungleSafariRetreat/resrot4.jpg', 0, 4, '', '', 3, 1),
(17, 'Coastal Vista Resort', 'Goa', '234 Coastal Road, Goa 403001', '+91 9812345678', 'Breathtaking views of the coast', 'Beach Access, Water Sports, Dining', 'Standard, Deluxe Room', 180, 'http://localhost/WT-Project/admin-panel/resorts/gallery/CoastalVistaResort/resrot5.jpg', 0, 5, '', '', 4, 1),
(18, 'Tranquil Hills Resort', 'Ooty, Tamil Nadu', '567 Hillside Lane, Ooty 643001', '+91 9789012345', 'Peaceful retreat in the Nilgiris', 'Gardens', 'Standard, Villa', 220, 'http://localhost/WT-Project/admin-panel/resorts/gallery/TranquilHillsResort/resrot6.jpg', 0, 3, '', '', 5, 1),
(19, 'Paradise on the Backwaters', 'Kerala Backwaters', '101 Backwater Road, Alappuzha 688001', '+91 9890123456', 'Experience Kerala\'s backwaters', '', 'Backwater Suite, Houseboat', 350, 'http://localhost/WT-Project/admin-panel/resorts/gallery/ParadiseontheBackwaters/resrot7.jpg', 0, 4, '', '', 3, 1),
(32, 'Cricket', 'Pune', 'Dehugaon, tal. Haveli, Pune', '8767370132', 'h1<--->h2', 'Swimming pool, Fishing, Water Sports, Scuba Diving', 'Delux', 3000, 'http://localhost/WT-Project/admin-panel/resorts/gallery/Cricket/clgLogo.jpg', 2, 0, 'o1', 'm1', 4, 1);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
