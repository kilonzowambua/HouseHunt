-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2023 at 07:05 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `househunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` varchar(200) NOT NULL,
  `onwer_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `house_id` varchar(200) NOT NULL,
  `booking_date` varchar(200) NOT NULL,
  `booking_type` varchar(200) NOT NULL,
  `booking_link` varchar(200) DEFAULT NULL,
  `booking_status` varchar(200) NOT NULL,
  `booking_created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `house_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `house_title` varchar(200) NOT NULL,
  `house_description` longtext NOT NULL,
  `house_type` varchar(200) NOT NULL,
  `house_no` varchar(200) NOT NULL,
  `house_location` varchar(200) NOT NULL,
  `house_price` int(90) NOT NULL,
  `house_image` varchar(200) NOT NULL,
  `house_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `house_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `house_status` varchar(200) DEFAULT 'avaliable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` varchar(200) NOT NULL,
  `inquiry_user_id` varchar(200) NOT NULL,
  `inquiry_house_id` varchar(200) NOT NULL,
  `inquiry_message` longtext NOT NULL,
  `inquiry_created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `inquiry_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` varchar(200) NOT NULL,
  `rating_user_id` varchar(200) NOT NULL,
  `rating_house_id` varchar(200) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `rating_created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating_update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(200) NOT NULL,
  `User_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_phone_no` varchar(14) DEFAULT NULL,
  `user_location` varchar(200) DEFAULT NULL,
  `user_type` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `Usertobooking` (`user_id`),
  ADD KEY `Ownertobooking` (`onwer_id`),
  ADD KEY `housetobooking` (`house_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `ownertouser` (`user_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `Usertoinqury` (`inquiry_user_id`),
  ADD KEY `housetoinqury` (`inquiry_house_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `Usertorating` (`rating_user_id`),
  ADD KEY `housetorating` (`rating_house_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `Ownertobooking` FOREIGN KEY (`onwer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Usertobooking` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `housetobooking` FOREIGN KEY (`house_id`) REFERENCES `houses` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `ownertouser` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `Usertoinqury` FOREIGN KEY (`inquiry_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `housetoinqury` FOREIGN KEY (`inquiry_house_id`) REFERENCES `houses` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `Usertorating` FOREIGN KEY (`rating_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `housetorating` FOREIGN KEY (`rating_house_id`) REFERENCES `houses` (`house_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
