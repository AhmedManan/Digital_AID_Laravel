-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 11:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_aid`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `receiver` varchar(40) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `sender`, `receiver`, `description`, `date`, `username`) VALUES
(4, '', 'omer', 'for raf 2', '2020-10-14', 'unseen'),
(5, 'mnn', 'distributor', 'dddss', '2020-10-28', 'none'),
(6, 'mnn', 'consumer', 'cons', '2020-10-28', 'none,raf,safrin'),
(7, 'mnn', 'consumer', 'cons two', '2020-10-28', 'none,raf,safrin');

-- --------------------------------------------------------

--
-- Table structure for table `distributed_aids`
--

CREATE TABLE `distributed_aids` (
  `id` int(11) NOT NULL,
  `d_username` varchar(30) NOT NULL,
  `c_username` varchar(30) DEFAULT NULL,
  `i_item` varchar(30) NOT NULL,
  `i_quantity` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributed_aids`
--

INSERT INTO `distributed_aids` (`id`, `d_username`, `c_username`, `i_item`, `i_quantity`, `date`) VALUES
(1, 'omer', 'raf', 'rice', '90', '2020-10-12'),
(2, 'omer', 'raf', 'oil', '12', '2020-10-12'),
(3, 'omer', 'raf', 'potato', '123', '2020-10-14'),
(4, 'omer', 'raf', 'onion', '50', '2020-10-14'),
(5, 'omer', 'mnn', 'rice', '4', '2020-10-20'),
(6, 'omer', 'safrin', 'rice', '7', '2020-10-20'),
(10, 'omer', 'mnn', 'rice', '2', '2020-10-20'),
(11, 'omer', 'mnn', 'oil', '3', '2020-10-20'),
(12, 'omer', 'mnn', 'onion', '4', '2020-10-20'),
(13, 'omer', 'mnn', 'rice', '10', '2020-10-20'),
(14, 'omer', 'mnn', 'oil', '5', '2020-10-20'),
(15, 'omer', 'mnn', 'lentils', '9', '2020-10-20'),
(16, 'omer', 'safrin', 'rice', '5', '2020-10-20'),
(17, 'omer', 'safrin', 'lentils', '5', '2020-10-20'),
(18, 'omer', 'safrin', 'oil', '5', '2020-10-20'),
(19, 'omer', 'safrin', 'potato', '5', '2020-10-20'),
(20, 'omer', 'safrin', 'rice', '5', '2020-10-20'),
(21, 'omer', 'safrin', 'lentils', '5', '2020-10-20'),
(22, 'omer', 'safrin', 'onion', '5', '2020-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `distributed_inventories`
--

CREATE TABLE `distributed_inventories` (
  `id` int(10) NOT NULL,
  `d_username` varchar(30) NOT NULL,
  `i_name` varchar(30) NOT NULL,
  `i_quantity` varchar(20) NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributed_inventories`
--

INSERT INTO `distributed_inventories` (`id`, `d_username`, `i_name`, `i_quantity`, `assign_date`) VALUES
(1, 'omer', 'rice', '990', '2020-10-13'),
(2, 'omer', 'lentils', '990', '2020-10-22'),
(3, 'omer', 'oil', '995', '2020-10-14'),
(4, 'safrin', 'rice', '10', '2020-10-17'),
(5, 'omer', 'onion', '995', '2020-10-14'),
(6, 'omer', 'potato', '995', '2020-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `quantity`) VALUES
(1, 'rice', 999790),
(2, 'oil', 299964),
(3, 'onion', 989990),
(4, 'potato', 599999),
(5, 'lentils', 799981);

-- --------------------------------------------------------

--
-- Table structure for table `login_creds`
--

CREATE TABLE `login_creds` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_creds`
--

INSERT INTO `login_creds` (`id`, `email`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'ahmed.mnn@outlook.com', 'mnn', '1234', 'admin', 'valid'),
(2, 'safrin@gmail.com', 'safrin', '12345', 'consumer', 'valid'),
(3, 'omerfahim@gmail.com', 'omer', '12345', 'distributor', 'valid'),
(4, 'raf@gmail.com', 'raf', '12345', 'consumer', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `text` varchar(2000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `text`, `date`, `status`) VALUES
(1, 'safrin', 'mnn', 'msg 1 sent from saf', '2020-10-13', 'seen'),
(2, 'mnn', 'safrin', 'msg 2 sent from mnn', '2020-10-02', 'seen'),
(3, 'safrin', 'mnn', 'msg 1 sent from safrin', '2020-10-02', 'seen'),
(4, 'mnn', 'safrin', 'last 2', '2020-10-02', 'seen'),
(5, 'safrin', 'mnn', 'msg 3 sent from safrin', '2020-10-02', 'seen'),
(6, 'mnn', 'safrin', 'last', '2020-10-02', 'seen'),
(7, 'mnn', 'omer', 'omer 1', '2020-10-27', 'seen'),
(8, 'omer', 'mnn', 'omer 2', '2020-10-27', 'seen'),
(9, 'mnn', 'omer', 'sent from mnn', '2020-10-18', 'seen'),
(10, 'mnn', 'safrin', 'sent from mnn to safrin', '2020-10-18', 'seen'),
(11, 'mnn', 'safrin', 'jjll', '2020-10-19', 'seen'),
(12, 'mnn', 'safrin', 'jjll 2', '2020-10-19', 'seen'),
(13, 'mnn', 'safrin', 'saf 3', '2020-10-19', 'seen'),
(14, 'mnn', 'safrin', 'saf4', '2020-10-19', 'seen'),
(15, 'mnn', 'omer', 'wat up nigga', '2020-10-19', 'seen'),
(16, 'mnn', 'raf', 'klkl', '2020-10-19', 'seen'),
(17, 'mnn', 'safrin', 'hhh', '2020-10-28', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `sender_email` varchar(30) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `actioned_by` varchar(30) DEFAULT NULL,
  `reply` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `sender_email`, `subject`, `description`, `date`, `status`, `actioned_by`, `reply`) VALUES
(1, 'raf@gmail.com', 'test', 'test', '2020-10-08', 'solved', 'mnn', 'ok'),
(2, 'abced@gmail.com', 'test', 'test', '2020-10-08', 'solved', 'mnn', NULL),
(3, 'raf@gmail.com', 'report1', 'desc', '2020-10-14', 'solved', 'mnn', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `nid_no` varchar(20) DEFAULT NULL,
  `nid_photo` varchar(20) DEFAULT NULL,
  `person_photo` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `joindate` date DEFAULT NULL,
  `qr_code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `username`, `first_name`, `last_name`, `email`, `phone`, `nid_no`, `nid_photo`, `person_photo`, `gender`, `birthdate`, `joindate`, `qr_code`) VALUES
(1, 'mnn', 'Ahmed', 'Manan', 'ahmed.mnn@outlook.com', '2020-08-03', '8865965420', '8865965477', 'mnn', 'male', '1996-06-30', '2020-08-03', '97hf8769jfri4nmm3kitnh4ngfj7hg'),
(2, 'safrin', 'saf', 'rin', 'safrin@gmail.com', '01236547', '00123654', '00123654', 'safrin', 'female', '2020-08-02', '2020-08-04', '97hf8769jfri4nhg3kitnh4ngfj7hg'),
(3, 'omer', 'Omer', 'Fahim', 'fahim@gmail.com', '01746696593', '8869376486', '8873649765', '6576407768', 'male', '2020-09-15', '2020-09-14', '97hf8769jfri4nhg3kitgh4ngfj7hg'),
(4, 'raf', 'Al', 'Arraf', 'raf@gmail.com', '2020-09-14', '8869376486', '8873649765', 'raf', 'male', '2020-09-15', '2020-09-14', '97hf8769jfri4nhg3kitgh4ngfj5ng'),
(11, 'mnn9', 'Manan', 'Ahmed', 'abcd@gmail.com', '0174886806', '999', '999', 'mnn9', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributed_aids`
--
ALTER TABLE `distributed_aids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributed_inventories`
--
ALTER TABLE `distributed_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_creds`
--
ALTER TABLE `login_creds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `distributed_aids`
--
ALTER TABLE `distributed_aids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `distributed_inventories`
--
ALTER TABLE `distributed_inventories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_creds`
--
ALTER TABLE `login_creds`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
