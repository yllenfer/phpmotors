-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Apr 03, 2022 at 04:28 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used'),
(40, 'Sweet');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientId` int UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(0, 'Ellen', 'Rodriguez', 'ellen.rodriguez@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL),
(47, 'Camila', 'Rodriguez', 'camila@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL),
(48, 'Test', 'User', 'testuser@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL),
(49, 'Andy', 'McGuffie', 'andy@example.test', 'SCRUBBED-PASSWORD-HASH', '3', NULL),
(50, 'Camila', 'Rodriguez', 'camila2@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL),
(51, 'hello', 'you', 'hello@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL),
(57, 'Yllen', 'Gonzalez', 'yllen@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL),
(61, 'Ryan', 'Gosling', 'ryan@example.test', 'SCRUBBED-PASSWORD-HASH', '3', NULL),
(63, 'Yllen', 'Fernandez', 'yllen.fernandez@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL),
(64, 'Robert', 'Stine', 'robert@example.test', 'SCRUBBED-PASSWORD-HASH', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int UNSIGNED NOT NULL,
  `invId` int UNSIGNED NOT NULL,
  `imgName` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgPrimary` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(43, 4, 'monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck.jpg', '2022-03-25 16:54:04', 1),
(44, 4, 'monster-truck-tn.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '2022-03-25 16:54:04', 1),
(45, 5, 'mechanic.jpg', '/phpmotors/images/vehicles/mechanic.jpg', '2022-03-25 16:54:24', 1),
(46, 5, 'mechanic-tn.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '2022-03-25 16:54:24', 1),
(47, 6, 'batmobile.jpg', '/phpmotors/images/vehicles/batmobile.jpg', '2022-03-25 16:54:35', 1),
(48, 6, 'batmobile-tn.jpg', '/phpmotors/images/vehicles/batmobile-tn.jpg', '2022-03-25 16:54:35', 1),
(49, 7, 'mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van.jpg', '2022-03-25 16:54:52', 1),
(50, 7, 'mystery-van-tn.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '2022-03-25 16:54:52', 1),
(51, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2022-03-25 16:55:06', 1),
(52, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2022-03-25 16:55:06', 1),
(53, 9, 'crwn-vic.jpg', '/phpmotors/images/vehicles/crwn-vic.jpg', '2022-03-25 16:55:25', 1),
(54, 9, 'crwn-vic-tn.jpg', '/phpmotors/images/vehicles/crwn-vic-tn.jpg', '2022-03-25 16:55:25', 1),
(55, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2022-03-25 16:55:40', 1),
(56, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2022-03-25 16:55:40', 1),
(57, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2022-03-25 16:55:56', 1),
(58, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2022-03-25 16:55:56', 1),
(59, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2022-03-25 16:56:31', 1),
(60, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2022-03-25 16:56:31', 1),
(61, 14, 'van.jpg', '/phpmotors/images/vehicles/van.jpg', '2022-03-25 16:56:44', 1),
(62, 14, 'van-tn.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '2022-03-25 16:56:44', 1),
(63, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2022-03-25 16:56:56', 1),
(64, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2022-03-25 16:56:56', 1),
(65, 30, 'model-t.jpg', '/phpmotors/images/vehicles/model-t.jpg', '2022-03-25 16:57:17', 1),
(66, 30, 'model-t-tn.jpg', '/phpmotors/images/vehicles/model-t-tn.jpg', '2022-03-25 16:57:17', 1),
(67, 43, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2022-03-25 16:58:05', 1),
(68, 43, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2022-03-25 16:58:05', 1),
(69, 5, 'pexels-mike-170811.jpg', '/phpmotors/images/vehicles/pexels-mike-170811.jpg', '2022-03-25 16:58:17', 0),
(70, 5, 'pexels-mike-170811-tn.jpg', '/phpmotors/images/vehicles/pexels-mike-170811-tn.jpg', '2022-03-25 16:58:17', 0),
(71, 10, 'pexels-alexgtacar-1592384.jpg', '/phpmotors/images/vehicles/pexels-alexgtacar-1592384.jpg', '2022-03-25 16:58:29', 0),
(72, 10, 'pexels-alexgtacar-1592384-tn.jpg', '/phpmotors/images/vehicles/pexels-alexgtacar-1592384-tn.jpg', '2022-03-25 16:58:29', 0),
(73, 9, 'pexels-mike-112460.jpg', '/phpmotors/images/vehicles/pexels-mike-112460.jpg', '2022-03-25 16:58:52', 0),
(74, 9, 'pexels-mike-112460-tn.jpg', '/phpmotors/images/vehicles/pexels-mike-112460-tn.jpg', '2022-03-25 16:58:52', 0),
(75, 31, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2022-03-25 22:44:39', 0),
(76, 31, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2022-03-25 22:44:39', 0),
(77, 32, 'pexels-pixabay-39855.jpg', '/phpmotors/images/vehicles/pexels-pixabay-39855.jpg', '2022-03-25 22:50:30', 0),
(78, 32, 'pexels-pixabay-39855-tn.jpg', '/phpmotors/images/vehicles/pexels-pixabay-39855-tn.jpg', '2022-03-25 22:50:30', 0),
(79, 5, 'pexels-pixabay-35967.jpg', '/phpmotors/images/vehicles/pexels-pixabay-35967.jpg', '2022-03-26 02:21:38', 0),
(80, 5, 'pexels-pixabay-35967-tn.jpg', '/phpmotors/images/vehicles/pexels-pixabay-35967-tn.jpg', '2022-03-26 02:21:38', 0),
(81, 9, 'pexels-kelson-downes-1149137.jpg', '/phpmotors/images/vehicles/pexels-kelson-downes-1149137.jpg', '2022-03-26 02:56:02', 0),
(82, 9, 'pexels-kelson-downes-1149137-tn.jpg', '/phpmotors/images/vehicles/pexels-kelson-downes-1149137-tn.jpg', '2022-03-26 02:56:02', 0),
(83, 4, 'pexels-mike-1335077.jpg', '/phpmotors/images/vehicles/pexels-mike-1335077.jpg', '2022-03-28 23:48:36', 0),
(84, 4, 'pexels-mike-1335077-tn.jpg', '/phpmotors/images/vehicles/pexels-mike-1335077-tn.jpg', '2022-03-28 23:48:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int UNSIGNED NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/phpmotors/images/vehicles/monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/phpmotors/images/vehicles/mechanic.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '100', 1, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/phpmotors/images/vehicles/batmobile.jpg', '/phpmotors/images/vehicles/batmobile-tn.jpg', '65000', 20, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/phpmotors/images/vehicles/camaro.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/phpmotors/images/vehicles/crwn-vic.jpg', '/phpmotors/images/vehicles/crwn-vic-tn.jpg', '50000', 2, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/phpmotors/images/vehicles/escalade.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/phpmotors/images/vehicles/camaro.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '75195', 10, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the spacious interior with an engine to get you out of any muddy or rocky situation.', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month. ', '/phpmotors/images/vehicles/van.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/phpmotors/images/vehicles/escalade.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '35000', 1, 'Brown', 2),
(30, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/phpmotors/images/vehicles/van.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '30000', 2, 'Black', 2),
(31, 'Mercedes Bumps', 'A Class', 'This is the best car anyone could ask for', '/phpmotors/images/vehicles/monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '200', 4, 'Black', 2),
(32, 'Mercedes Benz', 'A Class', 'This is the best car anyone could ask for', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '200', 4, 'Black', 2),
(38, 'Audi', 'A5', 'Can&#39;t complain', '/phpmotors/images/vehicles/van.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '300', 4, 'Blue', 3),
(43, 'Delorean', 'DMC', 'Great car, I love it!', '/phpmotors/images/vehicles/delorean.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2000', 12, 'Blue', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int UNSIGNED NOT NULL,
  `clientId` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(317, 'I love this car', '2022-03-31 04:23:28', 12, 61),
(318, 'Great car', '2022-04-01 04:38:35', 5, 61),
(319, 'I am testing', '2022-03-31 04:41:55', 14, 61),
(320, 'This is a new review', '2022-04-01 04:42:23', 9, 61),
(321, 'Just adding a new review :)', '2022-04-01 04:58:10', 9, 61),
(322, 'Adding another review here', '2022-04-01 16:38:30', 14, 61),
(354, 'Leaving review', '2022-04-02 17:02:07', 6, 63),
(355, 'Leaveing review', '2022-04-02 17:02:24', 9, 63),
(356, 'Leaving review... Again', '2022-04-02 17:02:50', 6, 63),
(357, 'I am testing', '2022-04-02 17:57:07', 4, 64),
(358, 'This is no longer a hellow', '2022-04-02 17:57:26', 12, 64),
(359, 'Hello, this is me trying', '2022-04-02 17:57:46', 4, 64),
(360, 'Hello, this is myself getting stuck', '2022-04-02 17:58:12', 4, 64),
(361, '', '2022-04-02 18:05:52', 9, 63);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_images` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_inv_id` (`invId`),
  ADD KEY `FK_client_id` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_client_id` FOREIGN KEY (`clientId`) REFERENCES `client` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_inv_id` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
