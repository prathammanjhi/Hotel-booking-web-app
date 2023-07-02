-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 02:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'pratham', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `booking details`
--

CREATE TABLE `booking details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `user_name` varchar(150) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(200) NOT NULL,
  `trans_id` int(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `datentime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `trans_resp_msg`, `datentime`) VALUES
(1, 5, 12, '2023-07-03', '2023-07-05', 0, NULL, 'pending', 'ORD_535138', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(2, 5, 12, '2023-07-03', '2023-07-05', 0, NULL, 'pending', 'ORD_529213', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(3, 5, 12, '2023-07-03', '2023-07-04', 0, NULL, 'pending', 'ORD_543687', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(4, 5, 12, '2023-07-03', '2023-07-04', 0, NULL, 'pending', 'ORD_574072', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(5, 5, 12, '2023-07-04', '2023-07-06', 0, NULL, 'pending', 'ORD_572578', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(6, 5, 12, '2023-07-03', '2023-07-04', 0, NULL, 'pending', 'ORD_598275', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(7, 5, 12, '2023-07-03', '2023-07-05', 0, NULL, 'pending', 'ORD_595343', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(8, 5, 12, '2023-07-03', '2023-07-05', 0, NULL, 'pending', 'ORD_546447', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(9, 5, 12, '2023-07-03', '2023-07-13', 0, NULL, 'pending', 'ORD_529190', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(10, 8, 23, '2023-07-03', '2023-07-06', 0, NULL, 'pending', 'ORD_896172', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(11, 8, 23, '2023-07-03', '2023-07-06', 0, NULL, 'pending', 'ORD_818656', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(12, 8, 23, '2023-07-03', '2023-07-06', 0, NULL, 'pending', 'ORD_893519', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00'),
(13, 8, 23, '2023-07-04', '2023-07-13', 0, NULL, 'pending', 'ORD_825571', NULL, 0, 'pending', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(10, 'IMG_40233.jpg'),
(11, 'IMG_23621.jpg'),
(12, 'IMG_20031.jpg'),
(13, 'IMG_49504.jpg'),
(14, 'IMG_94340.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(150) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tw` varchar(150) NOT NULL,
  `insta` varchar(150) NOT NULL,
  `fb` varchar(150) NOT NULL,
  `iframe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `tw`, `insta`, `fb`, `iframe`) VALUES
(1, 'Island no.4 Albasta Grand Line near Red Line', 'https://goo.gl/maps/TRG23SkVK8dEiCZ77?coh=178573', 919630124680, 919630124680, 'prathammanjhi2@gmail.com', 'https://twitter.com/pratham_manjhi', 'https://www.instagram.com/pratham_manjhi_/', 'https://www.facebook.com/pratham.manjhi.108', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d235476.66228575993!2d77.731223!3d22.753397!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397dcfb9c99dc1ef:0x46fc29c3c4b1b05c!2sNarmadapuram, Madhya Pradesh!5e0!3m2!1sen!2sin!4v1683814756513!5m2!1sen!2sin');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(4, 'IMG_46392.svg', 'Wifi', 'High speed wifi available.'),
(5, 'IMG_79166.svg', 'Air Conditioner', 'Air Conditioner to make you feel cozy and comfertable.'),
(6, 'IMG_29649.svg', 'Heater', 'Heat your room on ice-cold days.'),
(7, 'IMG_67423.svg', 'SPA', 'In house Spa for ocational massages and self care.'),
(8, 'IMG_99755.svg', 'Television', 'Oled display for Netflix and Chill'),
(10, 'IMG_95012.svg', 'water heater', 'Perfect water heater for a soothing bath.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(7, 'Bedroom'),
(8, 'Balcony'),
(9, 'Kitchen'),
(10, 'Lawn');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(12, 'small rooms', 600, 7000, 4, 5, 5, 'this room is for family', 1, 0),
(13, 'large room', 43, 45, 54, 45, 45, 'something', 1, 1),
(22, '1 bhk', 1200, 12000, 6, 3, 4, 'This room is best suited for a flock of students or a well versed family.', 1, 0),
(23, 'Seperate Flat', 3000, 20000, 5, 6, 6, 'This is a seperate flat with all the facilities which a family would need.', 0, 0),
(24, '2 bhk room', 2500, 15000, 6, 4, 6, 'this is best suited for students in group', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(34, 12, 4),
(35, 12, 5),
(36, 12, 8),
(37, 12, 10),
(49, 22, 4),
(50, 22, 5),
(51, 22, 8),
(52, 22, 10),
(53, 23, 4),
(54, 23, 5),
(55, 23, 6),
(56, 23, 8),
(57, 23, 10),
(58, 24, 4),
(59, 24, 5),
(60, 24, 6),
(61, 24, 8),
(62, 24, 10);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(9, 12, 7),
(10, 12, 8),
(11, 12, 9),
(18, 22, 7),
(19, 22, 8),
(20, 22, 9),
(21, 23, 7),
(22, 23, 8),
(23, 23, 9),
(24, 23, 10),
(25, 24, 7),
(26, 24, 8),
(27, 24, 9);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(29, 12, 'IMG_13882.jpg', 1),
(30, 12, 'IMG_19475.jpg', 0),
(31, 22, 'IMG_88977.jpg', 0),
(32, 23, 'IMG_63902.jpg', 1),
(33, 22, 'IMG_37926.jpg', 1),
(34, 23, 'IMG_62962.jpg', 0),
(35, 24, 'IMG_78842.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'PSH HOTEL\'S', 'Allow our intelligent search algorithms to effortlessly guide you through a seamless booking process, ensuring that you find the perfect oasis for your upcoming adventure. Unveil a world of incredible offers and exclusive deals, granting you the free', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(6, 'Prahtam', 'IMG_11305.jpg'),
(7, 'Shikhar', 'IMG_81377.jpg'),
(8, 'Hemant', 'IMG_18682.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(5, 'Pratham manjhi', 'prathammanjhi2@gmail.com', 'aa', '9630124680', 452007, '2002-05-05', 'IMG_52025.jpeg', '$2y$10$OxsbAmqAt.QfBnGLSxV4AO7hv4hVBXPqOHyIol.9639cnqhB8QHH6', 1, NULL, NULL, 1, '2023-06-30 22:35:07'),
(7, 'shikhar dhote', 'shikhar@gmail.com', 'somewhere', '1234567890', 452007, '2002-04-04', 'IMG_78359.jpeg', '$2y$10$hqiTNISR9S8jUbj5GV5Gw./PiaRvOYYT01zeDYfINWeSQJr6ydtMW', 1, '11e238abaa70794109959d3a4e5287a8', NULL, 1, '2023-07-02 02:57:08'),
(8, 'Hemant', 'hemant@gmail.com', 'dsfaadf', '9876543210', 452007, '2002-03-03', 'IMG_68061.jpeg', '$2y$10$8sLWhG.Z.lnNjuWnRRPXjuxCMHPnyQrrbzlF6xZSaU7J.bENqSPN6', 1, 'bf2ba00fa067eda962159cb1a926567b', NULL, 1, '2023-07-02 02:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(24, 'waedrgfth', 'sodif23678@appxapi.com', 'qwsecftrg', 'qwexdrftghj', '2023-05-15', 0),
(25, 'erdftgyhu', 'sodif23678@appxapi.com', 'asdfhh', 'erftygh', '2023-05-15', 0),
(26, '4erty', 'sodif23678@appxapi.com', 'fg', 'sd', '2023-05-15', 0),
(27, 'fd', 'sodif23678@appxapi.com', 'fd', 'fd', '2023-05-15', 0),
(29, '2', 'sodif23678@appxapi.com', '2', '2', '2023-05-15', 0),
(30, 'e', 'sodif23678@appxapi.com', 'e', 'e', '2023-05-15', 0),
(31, 'eds', 'sodif23678@appxapi.com', 'sd', 'sd', '2023-05-15', 0),
(32, 'sd', 'sodif23678@appxapi.com', 'sd', 'sd', '2023-05-15', 0),
(33, 'fg', 'sodif23678@appxapi.com', 'gf', 'fg', '2023-05-15', 0),
(36, 'Pratham manjhi', 'prathammanjhi2@gmail.com', 'something', 'asdfasfasdfsdg', '2023-05-20', 1),
(37, 'pappu', 'pappu@gmail.com', 'maja aa gya', 'is website me to maja hi aa gya', '2023-07-02', 0),
(38, 'pappu', 'pappu@gmail.com', 'maja aa gya', 'is website me to maja hi aa gya', '2023-07-02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking details`
--
ALTER TABLE `booking details`
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking details`
--
ALTER TABLE `booking details`
  ADD CONSTRAINT `booking details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
