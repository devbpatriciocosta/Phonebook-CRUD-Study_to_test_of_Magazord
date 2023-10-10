-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 06:50 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-address-book-db`
--
CREATE DATABASE IF NOT EXISTS `php-address-book-db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php-address-book-db`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'test test', 'test@test.com', '$2y$10$3vgoXSQKfqblKw.M6fXokuc2lFoA/n3OEU3jFMSsRmRkeVbu5D.b6'),
(2, 'name', 'email@email.com', '$2y$10$LFilZEyTqnzmZhdnIgSfdO6OmDAIP3qIlXwvigeImXVfuGjetOybO'),
(3, 'fullname123', 'fullname123@mail.com', '$2y$10$3DKpA6.uNjyNnBUCT8xFqOb4ujNE68ZIuhyAQxAl67ipgrwZg/IhC'),
(4, 'fullname-abcd', 'fullname-abcd@mail.com', '$2y$10$J94KSOwY/TMet3EieW3H6ewjNUGcb6.TTDURw4g3UlG.78wIQrC2u'),
(5, 'fullname-abcd123', 'fullname-abcd123@mail.com', '$2y$10$FjLN46r7E3xincY9kae/IuWEde0POxe/vcKEdPGb758RckHWbOgli'),
(6, 'newuser', 'newuser_test@mail.com', '$2y$10$ha8yZpN3l/aWzjltfADzDu5fMafMFR73ZoOZTniGUMZCvU/2eCUmi'),
(7, 'fname', 'fname@mail.com', '$2y$10$rRpb/KnBUEWe373cK.0K5OMQfYSmW0e4EAgg6oZ20I9JjLyGpFh.S'),
(8, 'abcd', 'abcd@mail.com', '$2y$10$LRAbWO4cjTLeG14QtP2Gc.xqG.lb7uN7d65jFkXckaHRfFVdU7BI.'),
(9, 'abcd123', 'abcd123@mail.com', '$2y$10$U4BMXZ.iCDYGBxfOyZLh1OiudTei36IXYz4k8W345.zlGe2CZDLJa'),
(10, 'fname123', 'fname123@mail.com', '$2y$10$xV6YGn8aT3fbu9FGEMiJA.yBp4x5zMNkDj2JXCXS1vfA8fPuAMtmu'),
(11, '1bestcsharp blog', '1bestcsharpblog@mail.com', '$2y$10$3.xhRcf7LKgiWYCuRfhaTeGqORqm0F.QTeA/d1p4Yun51H6npF/jO'),
(12, 'tttttest', 'ttttest@tttets.com', '$2y$10$t03S0DOPlKG5DWG7xMulP.pJtEaFgspG5sILJfGBPw34f/CfToj9G'),
(13, 'new6user', 'new6user@mail.com', '$2y$10$Wr495U8opvO90bbV1ZYhn.lIISArtG00TRVlEnDKk1SpMWMNfobNC'),
(14, 'abcduser', 'abcduser@mail.com', '$2y$10$IeeWykyAIqiATPNbj3dgAOHfyvdMwwQoif04epjyUyO.vYWDVl9Zu'),
(15, '1bestcsharp-blog-123', '1bestcsharp-blog-123@mail.com', '$2y$10$dd7CvYIQ1GL.F6eQM.AfxO/xEzeIJ0XaCW.0.KTf7tJcoodGA.GKC'),
(16, 'test fullname', 'test_email@mail.com', '$2y$10$7C5Jx1Tl8CO/B4kW6vobv.Mu3ogF0TDLRvInwecSmzOvbKvX5S4Jy');

-- --------------------------------------------------------

--
-- Table structure for table `_contact_`
--

CREATE TABLE `_contact_` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_contact_`
--

INSERT INTO `_contact_` (`id`, `name`, `email`, `phone`, `address`, `group_id`, `user_id`) VALUES
(3, 'test-name', 'test@mail.com', '33585288212335', 'someplace', 7, 2),
(4, 'John Smith', 'john.smith@example.com', '+1 (555) 123456', '123 Main St, Anytown, USA', 3, 2),
(5, 'Jane Doe', 'jane.doe@example.com', '+1 (555) 234567', '456 Maple Ave, Anycity, USA', 2, 2),
(6, 'Bob Johnson', 'bob.johnson@example.com', '+1 (555) 345678', '789 Oak St, Anystate, USA', 5, 2),
(7, 'Emily Brown', 'emily.brown@example.com', '+1 (555) 456789', '1010 Elm St, Anytown, USA', 7, 2),
(8, 'Michael Davis', 'michael.davis@example.com', '+1 (555) 567890', '1212 Pine St, Anycity, USA', 6, 2),
(9, 'Sarah Wilson', 'sarah.wilson@example.com', '+1 (555) 678901', '1414 Cedar St, Anystate, USA', 2, 2),
(16, 'David Taylor', 'david.taylor@example.com', '+1 (555) 789012', '1616 Birch St, Anytown, USA', 18, 11),
(17, 'Rachel Clark', 'rachel.clark@example.com', '+1 (555) 890123', '1818 Spruce St, Anycity, USA', 17, 11),
(18, 'Christopher Lee', 'christopher.lee@example.com', '+1 (555) 901234	2020', 'Walnut St, Anystate, USA', 17, 11),
(19, 'Rebecca Green', 'rebecca.green@example.com', '+1 (555) 012345	2222 ', 'Ash St, Anytown, USA', 17, 11),
(20, 'William Turner', 'william.turner@example.com', '+1 (555) 123456	2424', 'Oak St, Anycity, USA', 16, 11),
(21, 'Daniel Baker', 'daniel.baker@example.com', '+1 (555) 345678 2828', 'Cedar St, Anytown, USA', 15, 11),
(22, 'name', 'emaoil@mail.ciomn', '78633963322996', 'earth 1233', 14, 6),
(24, 'abcd-efg', 'abcfdfd-123-efg@mail.com', '44444455555777777', 'not mars', 19, 15);

-- --------------------------------------------------------

--
-- Table structure for table `_group_`
--

CREATE TABLE `_group_` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_group_`
--

INSERT INTO `_group_` (`id`, `name`, `user_id`) VALUES
(1, 'friends', 2),
(2, 'family', 2),
(3, 'work', 2),
(4, 'winners', 2),
(5, 'lossers', 2),
(6, 'black-list', 2),
(7, 'potato', 2),
(8, 'humans', 2),
(12, 'test', 6),
(14, 'abcd', 6),
(15, 'friends', 11),
(16, 'familly', 11),
(17, 'work', 11),
(18, 'sport-team', 11),
(19, 'work', 15),
(20, 'friends', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_contact_`
--
ALTER TABLE `_contact_`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `_group_`
--
ALTER TABLE `_group_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `_contact_`
--
ALTER TABLE `_contact_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `_group_`
--
ALTER TABLE `_group_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_contact_`
--
ALTER TABLE `_contact_`
  ADD CONSTRAINT `_contact__ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `_group_` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
