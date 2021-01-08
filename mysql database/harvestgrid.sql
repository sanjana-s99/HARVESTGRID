-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2020 at 06:35 PM
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
(39, 16, 1, 'hi ballo', '2020-11-07 08:14:52', 0),
(40, 2, 1, 'sanjana', '2020-11-14 09:12:07', 0),
(41, 1, 2, 'dlk', '2020-11-14 09:12:28', 1);

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
  `quality` varchar(1) DEFAULT NULL,
  `rdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmerrqst`
--

INSERT INTO `farmerrqst` (`rqst_id`, `user_id`, `weight`, `date`, `image1`, `image2`, `image3`, `status`, `quality`, `rdate`) VALUES
(2, 10, '100000', '2020-11-05', '20190414152806Facebook-Whatsapp-Instagram-hack-down-800x400.png', 'Cake Paradise Cover.jpg', 'NA.jpg', 'C', 'P', '2020-11-06'),
(4, 16, '160000', '2020-11-02', 'WhatsApp Image 2020-10-05 at 16.24.59.jpeg', 'WhatsApp Image 2020-10-02 at 21.18.25.jpeg', 'NA.jpg', 'R', NULL, '2020-11-06'),
(5, 12, '18000', '2020-11-04', '20190414152806Facebook-Whatsapp-Instagram-hack-down-800x400.png', '92244287_3197023640308526_6724805178099313527_n.jpg', 'NA.jpg', 'C', 'G', '2020-11-06'),
(6, 11, '20000', '2020-11-03', 'test1.jpg', 'test2.jpg', 'NA.jpg', 'A', NULL, '2020-11-06'),
(7, 16, '100000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'C', 'G', '2020-11-07'),
(8, 12, '10500', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'A', NULL, '2020-11-07'),
(9, 12, '105000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'N', NULL, '2020-11-07'),
(10, 11, '10500', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'C', 'G', '2020-11-07'),
(11, 11, '105000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'N', NULL, '2020-11-07'),
(12, 12, '105000', '2020-11-04', 'test1.jpg', 'test1.jpg', 'NA.jpg', 'R', NULL, '2020-11-07'),
(13, 2, '10000', '2020-11-05', 'Cake Paradise Cover.jpg', 'Cake Paradise.jpg', 'NA.jpg', 'C', NULL, '2020-11-08'),
(14, 2, '100000', '2020-11-05', 'Cake Paradise Cover.jpg', 'Cake Paradise.jpg', 'NA.jpg', 'N', NULL, '2020-11-08'),
(15, 3, '100000', '2020-11-04', '20190414152806Facebook-Whatsapp-Instagram-hack-down-800x400.png', 'large_harvestgrid.png', 'NA.jpg', 'N', NULL, '2020-11-08'),
(16, 3, '100000', '2020-11-02', 'large_cropful.png', 'large_harvestgrid.png', 'NA.jpg', 'C', 'G', '2020-11-08'),
(17, 22, '190000', '2020-11-12', 'large_cropful.png', 'large_harvestgrid.png', 'NA.jpg', 'C', 'G', '2020-11-14'),
(18, 22, '125000', '2020-11-10', 'large_cropful.png', 'large_harvestgrid.png', 'NA.jpg', 'A', NULL, '2020-11-14'),
(19, 22, '10000', '2020-11-05', 'large_cropful.png', 'large_harvestgrid.png', 'NA.jpg', 'N', NULL, '2020-11-14'),
(20, 22, '120000', '2020-11-06', 'large_cropful.png', 'large_harvestgrid.png', 'NA.jpg', 'N', NULL, '2020-11-14'),
(21, 22, '150000', '2020-11-14', 'large_cropful.png', 'large_harvestgrid.png', 'NA.jpg', 'N', NULL, '2020-11-14'),
(22, 22, '140000', '2020-11-13', 'large_cropful.png', 'large_harvestgrid.png', 'NA.jpg', 'R', NULL, '2020-11-14');

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
(76, 2, '2020-11-07 09:19:27', 'no'),
(77, 2, '2020-11-08 05:14:57', 'no'),
(78, 3, '2020-11-08 05:26:21', 'no'),
(79, 1, '2020-11-08 05:38:08', 'no'),
(80, 2, '2020-11-08 10:26:37', 'no'),
(81, 1, '2020-11-08 14:24:41', 'no'),
(82, 13, '2020-11-08 17:14:26', 'no'),
(83, 1, '2020-11-08 17:22:59', 'no'),
(84, 1, '2020-11-08 17:25:34', 'no'),
(85, 1, '2020-11-08 17:26:17', 'no'),
(86, 2, '2020-11-08 17:27:31', 'no'),
(87, 1, '2020-11-11 15:57:49', 'no'),
(88, 1, '2020-11-11 16:01:58', 'no'),
(89, 1, '2020-11-12 04:33:50', 'no'),
(90, 1, '2020-11-12 17:57:45', 'no'),
(91, 18, '2020-11-12 17:57:47', 'no'),
(92, 1, '2020-11-13 05:03:15', 'no'),
(93, 1, '2020-11-13 05:37:32', 'no'),
(94, 17, '2020-11-13 09:03:34', 'no'),
(95, 1, '2020-11-13 12:12:55', 'no'),
(96, 18, '2020-11-13 12:11:55', 'no'),
(97, 13, '2020-11-13 12:13:12', 'no'),
(98, 1, '2020-11-13 17:55:59', 'no'),
(99, 18, '2020-11-13 15:35:46', 'no'),
(100, 2, '2020-11-14 02:30:54', 'no'),
(101, 1, '2020-11-14 03:58:29', 'no'),
(102, 2, '2020-11-14 04:41:21', 'no'),
(103, 18, '2020-11-14 04:46:28', 'no'),
(104, 2, '2020-11-14 05:07:31', 'no'),
(105, 2, '2020-11-14 05:08:34', 'no'),
(106, 1, '2020-11-14 09:12:35', 'no'),
(107, 2, '2020-11-14 09:07:28', 'no'),
(108, 2, '2020-11-14 09:07:45', 'no'),
(109, 2, '2020-11-14 09:12:46', 'no'),
(110, 1, '2020-11-14 09:52:04', 'no'),
(111, 2, '2020-11-14 10:07:46', 'no'),
(112, 1, '2020-11-14 10:19:01', 'no'),
(113, 2, '2020-11-14 10:45:33', 'no'),
(114, 1, '2020-11-14 11:52:51', 'no'),
(115, 13, '2020-11-14 14:44:03', 'no'),
(116, 18, '2020-11-14 16:03:25', 'no'),
(117, 13, '2020-11-14 15:12:32', 'no'),
(118, 1, '2020-11-14 15:03:54', 'no'),
(119, 1, '2020-11-14 16:11:39', 'no'),
(120, 22, '2020-11-14 16:41:43', 'no'),
(121, 22, '2020-11-14 16:49:12', 'no'),
(122, 1, '2020-11-14 18:34:49', 'no'),
(123, 22, '2020-11-14 18:37:40', 'no'),
(124, 22, '2020-11-18 06:46:07', 'no'),
(125, 1, '2020-11-18 06:52:00', 'no'),
(126, 10, '2020-11-18 06:52:36', 'no'),
(127, 22, '2020-11-18 06:54:50', 'no'),
(128, 10, '2020-11-18 06:55:27', 'no'),
(129, 1, '2020-11-18 08:47:33', 'no'),
(130, 22, '2020-11-18 11:10:28', 'no'),
(131, 22, '2020-11-19 07:10:56', 'no'),
(132, 1, '2020-11-24 16:33:33', 'no'),
(133, 1, '2020-11-24 16:42:51', 'no'),
(134, 1, '2020-11-24 16:49:03', 'no'),
(135, 1, '2020-11-24 17:00:08', 'no'),
(136, 22, '2020-11-24 17:05:09', 'no');

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
  `user_city` varchar(30) NOT NULL DEFAULT 'N/A',
  `user_role` char(1) NOT NULL DEFAULT 'F',
  `status` char(1) DEFAULT 'N',
  `user_rating` int(11) NOT NULL DEFAULT 10,
  `user_img` text NOT NULL DEFAULT 'nopropic.webp',
  `user_regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_nic`, `user_password`, `user_email`, `user_tp`, `user_gender`, `user_age`, `user_crop`, `user_lat`, `user_lng`, `user_city`, `user_role`, `status`, `user_rating`, `user_img`, `user_regdate`) VALUES
(1, 'Web_Master ', '', '$2y$10$lMnqMI6syd90UNhkChjFTOUwD2IXvwtFCFWGrXbW0M6RDiZ6Z.STy', 'webmaster', '', '', 0, '', 0.000000, 0.000000, 'N/A', 'A', 'A', 10, 'nopropic.webp', '2020-11-14 02:59:18'),
(2, 'Sulakshana Witharanage', '993581089v', '$2y$10$zilwuCjgm/PuQuHhpnM2AOy13NsxxgLLyrpx0kmkoNk4vjqM468sK', 'sanjanaasulakshanawitharanage@gmail.com', '0771994147', 'M', 21, 'Rice', 7.271012, 80.659065, 'Kandy', 'F', 'A', 10, 'download.jfif', '2020-11-14 17:06:02'),
(3, 'Raveesha Weerabandara', '983581089v', '$2y$10$lMnqMI6syd90UNhkChjFTOUwD2IXvwtFCFWGrXbW0M6RDiZ6Z.STy', 'raveesha@gmail.com', '1111119992', 'M', 22, 'Tea', 5.999474, 80.599861, 'Matara', 'F', 'A', 2, 'nopropic.webp', '2020-11-14 10:18:52'),
(10, 'Kavindya  Sandeepanie', '199980712150', '$2y$10$QX4flnsAAlNzU6PdnChFXua3idqER2f2Jn3EbFkUDgQlqxcLJGFk2', 'kavindyasandepani99@gmail.com', '0123456789', 'F', 21, 'Rice', 6.802474, 80.334862, 'Rathnapura', 'F', 'A', 10, 'nopropic.webp', '2020-11-14 17:07:02'),
(11, 'Sandeepani  Kavindya', '199980712150', '$2y$10$QX4flnsAAlNzU6PdnChFXua3idqER2f2Jn3EbFkUDgQlqxcLJGFk2', 'kavindyasandepania1999@gmail.com', '0771994147', 'F', 21, 'Fruits_and_vegetable', 6.833376, 80.277245, 'Rathnapura', 'F', 'N', 10, 'nopropic.webp', '2020-11-24 17:18:16'),
(12, 'Sarani Tissera ', '199880712150', 'SanjanaA122', 'saranit@gmail.com', '0777123123', 'F', 22, 'Tea', 6.633376, 80.277245, 'Rathnapura', 'F', 'A', 10, 'nopropic.webp', '2020-11-24 17:18:21'),
(13, 'Manuja Mallikarachchi ', '983581089v', '$2y$10$FVasYwBgrN4mwQ/RU1xB3u1wHAK2QJpV0X5Twa28wAqTkA1AdsgfS', 'manuja@gmail.com', '0777833833', 'M', 22, '', 0.000000, 0.000000, 'N/A', 'S', 'A', 10, 'nopropic.webp', '2020-11-14 03:00:26'),
(16, 'Geshan Manuja ', '992481089v', '$2y$10$Vd2BrXe1kloytTu/naebyejh42ibmJMemi/xwWGKmnX/89x2W/xwm', 'sanjanasulakshana@outlook.com', '0771994444', 'M', 21, 'Coconut', 7.495398, 80.398521, 'Kurunegala', 'F', 'A', 10, 'nopropic.webp', '2020-11-24 17:18:25'),
(17, 'layangi chmalsha ', '993981089v', '$2y$10$lMnqMI6syd90UNhkChjFTOUwD2IXvwtFCFWGrXbW0M6RDiZ6Z.STy', 'layangi@gmail.com', '0771991991', 'M', 21, '', 0.000000, 0.000000, 'N/A', 'S', 'A', 10, 'nopropic.webp', '2020-11-14 03:00:26'),
(18, 'kaveesha samaradivakara  ', '993681089v', '$2y$10$lMnqMI6syd90UNhkChjFTOUwD2IXvwtFCFWGrXbW0M6RDiZ6Z.STy', 'kaveeshasamare@gmail.com', '0771991991', 'M', 21, '', 0.000000, 0.000000, 'N/A', 'K', 'A', 10, 'nopropic.webp', '2020-11-14 04:50:25'),
(21, 'Dammika Palliyaguru ', '998581089v', '$2y$10$vp/FtfH58SeVmmMEVsK5/O9bqkMb1tBLCafVOdi4gJgL88JxbidIG', 'dammika@gmail.com', '0771991991', 'F', 21, 'Rice', 6.870900, 79.881927, 'Colombo', 'F', 'A', 10, 'nopropic.webp', '2020-11-14 03:45:41'),
(22, 'sanjana sulakshana  ', '993581089v', '$2y$10$IJdLaZqIwsNbJu0lLf0MWOImJrhn9uYIHfjLGRztHo6GEVjVvqB9m', 'sanjanasulakshanawitharanage@gmail.com', '0771994147', 'M', 21, 'Spices', 7.273008, 80.665573, 'Kandy', 'F', 'A', 10, 'download.jfif', '2020-11-24 17:18:27'),
(23, 'Patum Thathsara ', '954391089v', '$2y$10$7xfjVfo8U6aQ.fXfL01s5uCU8aKPpzTkznvpA1mM8xSmctjT3Wqyi', 'pathum@gmail.com', '0777956526', 'M', 25, '', 0.000000, 0.000000, 'N/A', 'K', 'C', 10, 'nopropic.webp', '2020-11-24 16:54:43');

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
('manuja@gmail.com', '6369dfeeb876d5f2c236961f10047ac710a241591f', '2020-11-08 15:58:55'),
('saanjanasulakshanawitharanage@gmail.com', '90675cd24825fdb3560321241ca8f0ecfe5ae6fe72', '2020-11-14 18:40:38'),
('dammika@gmail.com', '52eef0d148ef3c06d2e2282e2bbab1986466e3f57e', '2020-11-14 19:58:40'),
('dammika@gmail.com', '52eef0d148ef3c06d2e2282e2bbab1988a31cdf1fc', '2020-11-14 20:00:24'),
('kaveeshasamare@gmail.com', '15adcef5fb4d472e625a6e2dfd7d0898d95b6c20a1', '2020-11-15 10:19:46'),
('sanjanasulakshanawitharanage@gmail.com', '3671e0e0e4e59b3d69cacb93747ad701cd8538e0fb', '2020-11-15 22:14:56');

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
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `farmerrqst`
--
ALTER TABLE `farmerrqst`
  MODIFY `rqst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
