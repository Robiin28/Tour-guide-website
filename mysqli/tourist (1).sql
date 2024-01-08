-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 03:19 PM
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
-- Database: `tourist`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `destination_name` varchar(255) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `guests` int(10) NOT NULL,
  `options` varchar(255) NOT NULL,
  `guide` varchar(255) NOT NULL,
  `arrival` varchar(255) NOT NULL,
  `leaving` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `email`, `phone_no`, `tour_name`, `destination_name`, `hotel_name`, `guests`, `options`, `guide`, `arrival`, `leaving`, `status`) VALUES
(10, 'saaayuuu', 'ronhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Axum', 'Quara Hotel', 34, 'by car', 'NO', '2023-05-28', '2023-06-30', 'contacted'),
(11, 'saaayuuu', 'ronhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Axum', 'Quara Hotel', 34, 'by car', 'NO', '2023-05-28', '2023-06-30', 'failed'),
(12, 'robel', 'robhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Axum', 'Quara Hotel', 12, 'by plane', 'NO', '2023-06-04', '2023-06-29', 'booked'),
(13, 'robel', 'ronhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Axum', 'Quara Hotel', 12, 'by car', 'NO', '2023-06-04', '2023-06-28', 'booked'),
(14, 'robel', 'robhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Axum', 'Quara Hotel', 76, 'by plane', 'NO', '2023-05-28', '2023-07-01', 'booked'),
(15, 'saaayuuu', 'ronhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Lalibela', 'Lalibela Hotel', 32, 'by car', 'NO', '2023-06-11', '2023-06-29', 'booked'),
(16, 'saaayuuu', 'ronhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Lalibela', 'Lalibela Hotel', 12, 'by car', 'NO', '2023-06-04', '2023-06-30', 'booked'),
(17, 'hayat', 'ronhailu09@gmail.com', '+271 987144687', 'Northern Historical Site', 'Lalibela', 'Lalibela Hotel', 12, 'by car', 'NO', '2023-06-04', '2023-06-15', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` int(10) UNSIGNED NOT NULL,
  `destination_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `tours_id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `image2_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `destination_name`, `image_name`, `tours_id`, `location`, `description`, `featured`, `active`, `image2_name`) VALUES
(23, 'Lalibela', 'destination_1197.jpg', 42, 'Northern Ethiopia', '', 'YES', 'YES', 'destination_930.jpg'),
(24, 'Axum', 'destination_8594.jpg', 42, 'Northern Ethiopia Tigray', '    ', 'YES', 'YES', 'destination_8960.jpg'),
(25, 'Gondar Fasiledes', 'destination_8693.jpg', 42, ' Northern Amhara region ', '', 'YES', 'YES', 'destination_6529.jpg'),
(26, 'TisAbbay', 'destination_5033.jpg', 42, 'Northern Ethiopia Amhara region', '  ', 'YES', 'YES', 'destination_5784.jpg'),
(28, 'Lake Tana', 'destination_7342.jpg', 42, 'Northern Ethiopia Amhara region , Bahrdar', '', 'YES', 'YES', 'destination_3158.jpg'),
(30, 'Konso Villag', 'destination_7319.png', 43, 'SNNP', '', 'NO', 'YES', 'destination_993.png'),
(31, 'Omo Valley', 'destination_1048.webp', 43, 'SNNP', '', 'NO', 'YES', 'destination_794.webp'),
(32, 'Hawassa', '', 42, 'SNNP', '', 'NO', 'YES', ''),
(33, 'ErtaAle', '', 48, 'Afar', '', 'NO', 'YES', ''),
(34, 'Awash', 'destination_643.jpg', 48, 'Oromia region', '', 'NO', 'YES', 'destination_497.jpg'),
(35, 'Wenchi Creater lake', 'destination_3784.jpg', 48, 'Oromia bale region', ' Wonchi is located at equal distance between the towns of Ambo and Woliso', 'YES', 'YES', 'destination_366.jpg'),
(36, 'AddisAbaba', '', 48, 'central capital city', '', 'NO', 'YES', ''),
(37, 'Arabminch', 'destination_1963.jpg', 43, 'SNNP', '40 minch', 'YES', 'YES', 'destination_694.jpg'),
(38, 'Jegol Ginb', 'destination_1263.jpg', 47, 'Eastern Ethiopia', 'Harar', 'YES', 'YES', 'destination_629.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'robel', 'admin', '202cb962ac59075b964b07152d234b70'),
(25, 'RHOtour', 'RHO@123', '920603af9fc90d63c5673c6426fd4195'),
(43, 'robel', 'trial123', 'f4aa38a0e4d3298ab63ef07149fa67f1'),
(45, 'listed', 'list123', '0834e5af62da57eadd0d94b2032c7f76');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `id` int(10) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_desc` varchar(1000) NOT NULL,
  `destination_id` int(10) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `price_range` varchar(255) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`id`, `hotel_name`, `hotel_desc`, `destination_id`, `image_name`, `price_range`, `rating`, `featured`, `active`) VALUES
(14, 'Lalibela Hotel', '', 23, 'hotel_1766.jpg', '$200-$400', '4-star', 'YES', 'YES'),
(16, 'Quara Hotel', 'Axum', 24, 'hotel_9624.jpg', '$500-$600', '4-star', 'YES', 'YES'),
(17, 'Janktel Hotel', ' Bahrdar ', 28, 'hotel_4309.jpg', '$350-$670', '5-star', 'YES', 'YES'),
(18, 'Paradise hotel', 'Arbaminch', 37, 'hotel_2361.jpg', '$700-$900', '5-star', 'YES', 'YES'),
(19, 'Sheraton Hotel', 'bahrdar', 28, 'hotel_4547.jpg', '$200-$400', '3-star', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `types` varchar(255) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `phone` int(30) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `fname`, `lname`, `email`, `choice`, `types`, `message`, `phone`, `status`) VALUES
(1, 'abebe', 'alemu', 'robiiihailuu@gmail.com', 'Friends', 'business related', 'nice feedback', 913133882, 'positive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `email`, `phone_no`, `address`, `password`, `reset_token`) VALUES
(1, 'robel', 'robel123', 'robiiihailuu@gmail.com', '251', 'adiss abeba', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', NULL),
(57, 'trial', 'trial1234', 'ronhailu09@gmail.com', '+271 987144687', 'adissa', 'f4aa38a0e4d3298ab63ef07149fa67f1', NULL),
(58, 'hayat', 'hayat456', 'ronhailu09@gmail.com', '+271 987144687', 'adissa', '32c5d42d60d8605e86341a114dea7ff7', NULL),
(59, 'olinad', 'oli1234', 'ronhailu09@gmail.com', '+271 987144687', 'adiss', '795bb5105c45c862a33cac05d6b77666', NULL),
(60, 'landa', 'lana1234', 'robhailu09@gmail.com', '+271 987144687', 'adiss', 'f8cabc3b92a15e1a5e08965ef25cb5ae', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_description` varchar(3500) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `image2_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `tour_name`, `tour_description`, `image_name`, `featured`, `active`, `image2_name`) VALUES
(42, 'Northern Historical Site', '   visit the historic sites ', 'tour_7992.jpg', 'YES', 'YES', 'tour_6450.jpg'),
(43, 'Southern cultural Site', '  Travel and enjoy the diversity of the nation  ', 'tour_5207.jpg', 'YES', 'YES', 'tour_3708.webp'),
(47, 'Eastern Route', ' come and visit the lowest point ', 'tour_209.webp', 'YES', 'YES', 'tour_961.jpg'),
(48, 'Central Route', 'A tour around the capital ', 'tour_479.jpg', 'YES', 'YES', 'tour_809.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
