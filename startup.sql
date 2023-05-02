-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2023 at 07:28 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mle38`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameColor` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `nameColor`) VALUES
(1, 'Red'),
(2, 'Green'),
(3, 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameProduct` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sizeID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colorID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typesID` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typesID` (`typesID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nameProduct`, `descriptions`, `price`, `image`, `sizeID`, `colorID`, `typesID`) VALUES
(3, 'Pink skirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 24.99, 'uploads/card2.jpg', '3,1', '3,2', 2),
(4, 'Pink skirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 24.99, 'uploads/card.jpg', '3,1', '3,2', 2),
(5, 'Black Shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 34.99, 'uploads/card3.jpg', '3,1', '3,2', 1),
(6, 'Kid Dress', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 39.99, 'uploads/card4.jpg', '3,1', '3,2', 3),
(7, 'Pink skirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 24.99, 'uploads/card2.jpg', '3,1', '3,2', 2),
(8, 'Pink skirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 24.99, 'uploads/card.jpg', '3,1', '3,2', 2),
(9, 'Black Shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 34.99, 'uploads/card3.jpg', '3,1', '3,2', 1),
(10, 'Kid Dress', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 39.99, 'uploads/card4.jpg', '3,1', '3,2', 3),
(11, 'Dress Sets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 17.99, 'uploads/1.jpg', '3,1', '3,2', 2),
(12, 'Skirt 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 59.99, 'uploads/2.jpg', '3,1', '3,2', 2),
(13, 'Skirt 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 59.99, 'uploads/3.jpg', '3,1', '3,2', 2),
(14, 'Sweater Sets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 9.99, 'uploads/4.jpg', '3,1', '3,2', 1),
(15, 'Pant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 29.99, 'uploads/5.jpg', '3,1', '3,2', 1),
(16, 'Korean Dress', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 44.99, 'uploads/7.jpg', '3,1', '3,2', 3),
(17, 'Korean Dess 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 30, 'uploads/8.jpg', '3,1', '3,2', 3),
(18, 'Boy Korean', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 25.99, 'uploads/9.jpg', '3,1', '3,2', 3),
(19, 'Black Shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 20, 'uploads/10.jpg', '3,1', '3,2', 2),
(20, 'Hoodie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 29.99, 'uploads/11.jpg', '3,1', '3,2', 1),
(21, 'Shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 19.99, 'uploads/12.jpg', '3,1', '3,2', 1),
(22, 'shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac ipsum a sapien vulputate tristique. Aenean pellentesque gravida neque a eleifend. Duis nec lacus vitae elit interdum euismod.', 33.33, 'uploads/6.jpg', '3,1', '3,2', 1);


-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameSize` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `nameSize`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nameType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `nameType`) VALUES
(1, 'Men'),
(2, 'Lady'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'abc@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'd@gmail.com', '416f8f6e105370e7b9d0fd983141f00b613477f8'),
(3, 'e@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
