-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2020 at 05:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harvestgrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 4, 'hi', '2020-10-28 09:34:06', 0),
(2, 4, 1, 'hi bokka', '2020-10-28 09:35:45', 0),
(3, 0, 4, 'hii<div><br></div>', '2020-10-28 09:40:54', 0),
(4, 0, 1, 'hiii<div><br></div>', '2020-10-28 09:41:06', 0),
(5, 0, 1, '<p><img src=\"upload/20201003_210501.jpg\" class=\"img-thumbnail\" width=\"200\" height=\"160\"></p><br>', '2020-10-28 09:41:13', 2),
(6, 2, 0, 'hiii', '2020-10-31 16:56:32', 1),
(7, 2, 0, 'oii', '2020-10-31 16:57:41', 1),
(8, 2, 0, 'hii', '2020-11-01 06:57:53', 1),
(9, 2, 0, 'hii', '2020-11-01 06:58:36', 1),
(10, 10, 0, 'hii', '2020-11-01 06:58:43', 1),
(11, 2, 0, 'hi', '2020-11-01 06:59:00', 1),
(12, 10, 2, 'sanjanaaaa', '2020-11-01 07:10:40', 0),
(13, 2, 10, 'hiiiii', '2020-11-01 07:11:02', 0),
(14, 10, 2, 'hii', '2020-11-01 07:13:32', 0),
(15, 2, 10, 'hii modya', '2020-11-01 07:13:49', 0),
(16, 1, 10, 'hi web', '2020-11-01 13:36:10', 0),
(17, 10, 1, 'hii', '2020-11-01 13:36:24', 0),
(18, 1, 2, 'hiiii web_m', '2020-11-05 12:45:05', 0),
(19, 2, 1, '😜😜😜😜😜', '2020-11-05 12:45:32', 0),
(20, 2, 1, 'hii', '2020-11-06 09:01:15', 0),
(21, 1, 2, '🤣🤣🤣]', '2020-11-06 09:02:09', 0),
(22, 2, 1, 'hii', '2020-11-06 09:02:17', 0),
(23, 2, 1, 'hii', '2020-11-06 09:02:18', 0),
(24, 2, 1, 'hii', '2020-11-06 09:02:22', 0),
(25, 10, 1, 'hiii', '2020-11-06 09:39:28', 0),
(26, 10, 1, 'hi kavindya', '2020-11-06 09:39:49', 2),
(27, 1, 10, 'hiii\n web master', '2020-11-06 09:40:13', 2),
(28, 1, 10, 'hii', '2020-11-06 09:42:26', 0),
(29, 1, 10, 'Need Explanation', '2020-11-06 09:44:47', 0),
(30, 10, 1, 'Sorry I dont', '2020-11-06 09:45:38', 0),
(31, 10, 1, '🤣🤣🤣', '2020-11-06 09:51:05', 0),
(32, 1, 10, 'hiiii', '2020-11-06 09:51:23', 0),
(33, 10, 1, 'bla vbla blaaaa', '2020-11-06 13:51:52', 0),
(34, 1, 10, 'hiii\njl', '2020-11-06 13:53:30', 0),
(35, 1, 2, 'hiiii', '2020-11-06 19:20:46', 0),
(36, 1, 2, '😍😍😍😍😍', '2020-11-06 19:21:14', 0),
(37, 12, 1, 'hii', '2020-11-07 03:59:04', 1),
(38, 1, 16, 'hiiii\nweb master', '2020-11-07 08:14:41', 0),
(39, 16, 1, 'hi ballo', '2020-11-07 08:14:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmerrqst`
--

CREATE TABLE `farmerrqst` (
  `rqst_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `weight` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `status` char(1) NOT NULL,
  `rdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmerrqst`
--

INSERT INTO `farmerrqst` (`rqst_id`, `user_id`, `weight`, `date`, `image1`, `image2`, `image3`, `status`, `rdate`) VALUES
(1, 2, '12000', '2020-11-06', 'test1.jpg', 'test2.jpg', 'NA.jpg', 'N', '2020-11-06'),
(2, 10, '100000', '2020-11-05', '20190414152806Facebook-Whatsapp-Instagram-hack-down-800x400.png', 'Cake Paradise Cover.jpg', 'NA.jpg', 'C', '2020-11-06'),
(3, 2, '150000', '2020-11-10', 'rBVaSVvXsQyAAq3JAAEJq_KcGco158.jpg', 'WhatsApp Image 2020-10-02 at 21.18.25.jpeg', 'NA.jpg', 'A', '2020-11-06'),
(4, 16, '160000', '2020-11-02', 'WhatsApp Image 2020-10-05 at 16.24.59.jpeg', 'WhatsApp Image 2020-10-02 at 21.18.25.jpeg', 'NA.jpg', 'R', '2020-11-06'),
(5, 12, '18000', '2020-11-04', '20190414152806Facebook-Whatsapp-Instagram-hack-down-800x400.png', '92244287_3197023640308526_6724805178099313527_n.jpg', 'NA.jpg', 'C', '2020-11-06'),
(6, 11, '20000', '2020-11-03', 'test1.jpg', 'test2.jpg', 'NA.jpg', 'A', '2020-11-06'),
(7, 16, '100000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'C', '2020-11-07'),
(8, 12, '10500', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'A', '2020-11-07'),
(9, 12, '105000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'N', '2020-11-07'),
(10, 11, '10500', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'C', '2020-11-07'),
(11, 11, '105000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'N', '2020-11-07'),
(12, 12, '105000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'R', '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(67, 1, '2020-11-07 04:13:20', 'no'),
(68, 2, '2020-11-07 04:31:49', 'no'),
(69, 2, '2020-11-07 04:56:56', 'no'),
(70, 1, '2020-11-07 06:12:55', 'no'),
(71, 1, '2020-11-07 07:25:18', 'no'),
(72, 2, '2020-11-07 06:39:24', 'no'),
(73, 1, '2020-11-07 08:14:55', 'no'),
(74, 16, '2020-11-07 08:14:56', 'no'),
(75, 1, '2020-11-07 09:39:27', 'no'),
(76, 2, '2020-11-07 09:19:27', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_nic` varchar(12) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_tp` varchar(10) NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_age` int(2) NOT NULL,
  `user_crop` varchar(50) NOT NULL,
  `user_lat` float(10,6) NOT NULL,
  `user_lng` float(10,6) NOT NULL,
  `user_role` char(1) NOT NULL DEFAULT 'F',
  `status` char(1) DEFAULT 'N',
  `user_regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_nic`, `user_password`, `user_email`, `user_tp`, `user_gender`, `user_age`, `user_crop`, `user_lat`, `user_lng`, `user_role`, `status`, `user_regdate`) VALUES
(1, 'Web_Master ', '', '$2y$10$lMnqMI6syd90UNhkChjFTOUwD2IXvwtFCFWGrXbW0M6RDiZ6Z.STy', 'webmaster', '', '', 0, '', 0.000000, 0.000000, 'A', 'A', '2020-11-01 10:10:41'),
(2, 'Sanjana Sulakshana', '993581089v', '$2y$10$zilwuCjgm/PuQuHhpnM2AOy13NsxxgLLyrpx0kmkoNk4vjqM468sK', 'sanjanasulakshanawitharanage@gmail.com', '0771994147', 'M', 21, 'Rice', 7.271012, 80.659065, 'F', 'A', '2020-11-07 04:56:48'),
(3, 'Raveesha Weerabandara', '983581089v', '$2y$10$lMnqMI6syd90UNhkChjFTOUwD2IXvwtFCFWGrXbW0M6RDiZ6Z.STy', 'raveesha@gmail.com', '1111119992', 'M', 22, 'Tea', 5.802474, 80.734863, 'F', 'A', '2020-11-07 03:42:02'),
(10, 'Kavindya  Sandeepanie', '199980712150', '$2y$10$QX4flnsAAlNzU6PdnChFXua3idqER2f2Jn3EbFkUDgQlqxcLJGFk2', 'kavindyasandepani99@gmail.com', '0123456789', 'F', 21, 'Rice', 6.802474, 80.334862, 'F', 'N', '2020-11-07 04:24:45'),
(11, 'Sandeepani  Kavindya', '199980712150', '$2y$10$QX4flnsAAlNzU6PdnChFXua3idqER2f2Jn3EbFkUDgQlqxcLJGFk2', 'kavindyasandepania1999@gmail.com', '0771994147', 'F', 21, 'Fruits_and_vegetable', 6.833376, 80.277245, 'F', 'N', '2020-11-05 14:19:12'),
(12, 'Sarani Tissera ', '199880712150', 'SanjanaA122', 'saranit@gmail.com', '0777123123', 'F', 22, 'Tea', 6.633376, 80.277245, 'F', 'A', '2020-11-07 09:27:49'),
(13, 'Manuja Mallikarachchi ', '983581089v', '$2y$10$FVasYwBgrN4mwQ/RU1xB3u1wHAK2QJpV0X5Twa28wAqTkA1AdsgfS', 'manuja@gmail.com', '0777833833', 'M', 22, '', 0.000000, 0.000000, 'S', 'A', '2020-11-01 10:11:38'),
(16, 'Geshan Manuja ', '992481089v', '$2y$10$Vd2BrXe1kloytTu/naebyejh42ibmJMemi/xwWGKmnX/89x2W/xwm', 'sanjanasulakshana@outlook.com', '0771994444', 'M', 21, 'Coconut', 7.495398, 80.398521, 'F', 'A', '2020-11-07 08:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `email` varchar(150) NOT NULL,
  `skey` text NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`email`, `skey`, `expDate`) VALUES
('kavindyasandepani99@gmail.com', '6035400f6f3068dac24b3e225fc91cc46832091c08', '2020-10-26 23:18:53'),
('kavindyasandepania1999@gmail.com', 'f3d1f8b014622656202a18b2978314cd88069fd665', '2020-10-26 23:22:58'),
('kasun12@gmail.com', '8750f67a2f822866b0e1cf48cf32bc88f4faf9230b', '2020-11-02 15:30:53'),
('manuja@gmail.com', '6369dfeeb876d5f2c236961f10047ac710a241591f', '2020-11-08 15:58:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `farmerrqst`
--
ALTER TABLE `farmerrqst`
  ADD PRIMARY KEY (`rqst_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `farmerrqst`
--
ALTER TABLE `farmerrqst`
  MODIFY `rqst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmerrqst`
--
ALTER TABLE `farmerrqst`
  ADD CONSTRAINT `farmerrqst_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
