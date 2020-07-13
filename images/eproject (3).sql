-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 07:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(12) UNSIGNED NOT NULL,
  `category` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created`, `deleted`) VALUES
(1, 'Nature', '2020-07-09 16:26:02', NULL),
(2, 'Travel', '2020-07-09 16:28:24', NULL),
(3, 'Business', '2020-07-09 16:49:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(12) UNSIGNED NOT NULL,
  `question` varchar(500) NOT NULL,
  `answere` varchar(500) NOT NULL,
  `status` enum('1','0') DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answere`, `status`, `reg_date`) VALUES
(3, 'How to view the image files?', 'If you know the image ID number, you can enter it into the search bar to navigate right to that image. it has built technology that can “see” image pixels and find similar images.', '0', '2020-07-10 16:26:36'),
(4, 'How can i use it ?', 'This is a Oren contributor tutorial for beginners, I start at the  contributor login, review how to signup as a Oren contributor then walks through how to upload photos to Oren and include tips for sharing your photos.', '0', '2020-07-09 18:02:47'),
(5, 'Is there any limitation in uploading files?', 'Each registered user should only be able to upload up to a maximum of 35 images. If this limit is crossed that the user should delete one of the files to upload a new one.', '0', '2020-07-09 18:03:41'),
(6, 'How to upload the picture file?', 'What can I upload? You can upload JPG and PNG images up to 25MB each. A total of 35files can be uploaded into one Oren account', '0', '2020-07-09 18:04:31'),
(7, 'How to download the picture file?', 'Before create login session then you can access to download the images.', '0', '2020-07-09 18:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(12) UNSIGNED NOT NULL,
  `users_id` int(12) UNSIGNED DEFAULT NULL,
  `feedback` varchar(1000) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(12) UNSIGNED NOT NULL,
  `users_id` int(12) UNSIGNED DEFAULT NULL,
  `category_id` int(12) UNSIGNED DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `users_id`, `category_id`, `title`, `images`, `descriptions`, `views`, `post_date`) VALUES
(1, 1, 1, 'Bokeh green Background Female hand', 'images/photo-1466298356323-f84bed7b3475.jpg', 'Environment Earth Day In the hands of trees growing seedlings. Bokeh green Background Female hand holding tree on nature field grass Forest conservation concept', 900, '2020-07-09 17:09:59'),
(2, 1, 1, 'Conserve the environment by planting trees.', 'images/photo-1589605711269-3363979a9ca2.jpg', 'Conserve the environment by planting trees. hand protect with plant growing. concept finance environment Earth Day In the hands of trees growing seedlings', 1001, '2020-07-09 19:51:17'),
(3, 2, 1, 'Woman hand holding soil, planting ', 'images/photo-1542601906990-b4d3fb778b09.jpg', 'Woman hand holding soil, planting and caring for seedlings The concept of World Environment Day, take care of seedlings to grow, . Baby, dirt.', 4000, '2020-07-09 17:21:44'),
(4, 1, 3, 'value investment thoughts bussiness', 'images/photo-1553729459-efe14ef6055d.jpg', 'Value investing is an investment strategy that involves picking stocks that appear to be trading for less than their intrinsic or book value.', 602, '2020-07-10 17:16:46'),
(5, 1, 3, 'Euro money bag ', 'images/photo-1521828847175-b6d80fc5a7fd.jpg', 'Euro money bag  with the word Fair. Balance. Fair value pricing, money debt. Investment analysis. Fair deal. Reasonable price. Justified risk. Honest loan. Secured loans\r\n', 801, '2020-07-10 17:29:44'),
(6, 1, 3, 'Hot business growth.', 'images/photo-1558588942-930faae5a389.jpg', 'Hot business growth. Businessman using tablet analyzing sales data and economic growth graph chart. Business strategy, financial.', 19999, '2020-07-09 17:10:22'),
(7, 2, 2, 'Travel With Car', 'images/photo-1469854523086-cc02fe5d8800.jpg', 'Car with Travel inscription on the deserts', 100, '2020-07-09 17:35:15'),
(8, 1, 2, 'Travel Airplane on Sky', 'images/photo-1500835556837-99ac94a94552.jpg', 'This is taken after passing through a severe storm in a plane. This being one of my first flights, I felt lucky to make it out safely and even luckier to capture such a beautiful sunset.', 2001, '2020-07-10 17:29:40'),
(9, 1, 3, 'Business men', 'images/photo-1575473970760-b50a70461e1a.jpg', 'Business men with darkblue suit, vest and red tie', 1001, '2020-07-09 20:02:28'),
(10, 1, 2, 'Flying around the world ', 'images/photo-1516738901171-8eb4fc13bd20.jpg', 'Flying around the world with aircraft wing overshadowing the earth map with pins marking future destinations', 89000, '2020-07-09 17:10:38'),
(11, 1, 2, 'Travel Hold map during drive', 'images/photo-1580750174234-f1b4c065669a.jpg', 'Drive car around the world with overshadowing the earth map with pins marking future destinations', 879, '2020-07-09 17:10:34'),
(12, 1, 3, 'Business on Home', 'images/photo-1523939158338-1708c2391359.jpg', 'FlexJobs. This site offers full-time, part-time, and even some jobs that are perfect for testing your way into starting a freelance business', 7778, '2020-07-10 17:29:50'),
(13, 1, 3, 'Laptop computer glass on table', 'images/photo-1460925895917-afdab827c52f.jpg', 'Business Statistics on a laptop with glass Screen', 2201, '2020-07-10 17:29:53'),
(14, 1, 2, 'Wooden boat', 'images/photo-1476514525535-07fb3b4ae5f1.jpg', 'Travel with Wooden boat  to a mountain ', 76, '2020-07-09 17:10:25'),
(15, 1, 3, 'Business Teamwork concep', 'images/photo-1552664730-d307ca884978.jpg', 'Teamwork concept.Project team making conversation at meeting room at office.Horizontal.Blurred background.Flares', 100, '2020-07-09 17:10:50'),
(16, 1, 2, 'Eye glass with map', 'images/photo-1516546453174-5e1098a4b4af.jpg', 'my work space. I’m the founder of the company Arttravelling ( travel for artist)', 202, '2020-07-10 17:15:41'),
(18, 1, 1, 'Travel weekend', 'images/photo-1488646953014-85cb44e25828.jpg', 'Planning for the weekend for travelling', 60000, '2020-07-10 16:38:41'),
(19, 2, 2, 'Travel planes', 'images/photo-1496950866446-3253e1470e8e.jpg', 'The Plan before the Adventure', 10, '2020-07-09 17:35:22'),
(20, 2, 2, 'Hamilton Island travel', 'images/photo-1530843119212-2f6e1d57c93a.jpg', 'Taken from the balcony of my hotel in Hamilton Island', 401, '2020-07-10 17:16:11'),
(21, 2, 1, 'woodland path', 'images/photo-1441974231531-c6227db76b6e.jpg', 'Beautiful woodland path in the world', 302, '2020-07-09 19:49:33'),
(22, 2, 1, 'nature leave', 'images/photo-1504198266287-1659872e6590.jpg', 'The beauty of nature in the world', 6, '2020-07-10 16:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `aboutus` varchar(500) DEFAULT NULL,
  `usertype` enum('admin','user') NOT NULL,
  `status` enum('1','0') DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `image`, `country`, `city`, `state`, `address`, `contact_no`, `aboutus`, `usertype`, `status`, `reg_date`) VALUES
(1, 'MuhammadTabraiz', 'Tabraiz', 'bukhari', 'm.tabraizbukhari@gmail.com', '1234567890', 'images/photo-1530843119212-2f6e1d57c93a.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'user', '1', '2020-07-10 17:16:37'),
(2, 'Elsa_jhon', 'Elsa', 'jhon', 'elsa@gmail.com', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', '1', '2020-07-09 17:13:38'),
(4, NULL, 'admin', 'admin', 'admin@example.com', '1234567890', 'images/photo-1488646953014-85cb44e25828.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '1', '2020-07-10 17:15:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
