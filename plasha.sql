-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 04:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plasha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `black_friend`
--

CREATE TABLE `black_friend` (
  `user_block` int(10) NOT NULL,
  `user_was_block` int(10) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `category_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
('drink', 'Drink'),
('eating', 'Eating'),
('movie', 'Movie'),
('sport', 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `created_at`, `updated_at`) VALUES
(1, '2017-05-25 06:04:00', '0000-00-00 00:00:00'),
(2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conversation_member`
--

CREATE TABLE `conversation_member` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conversation_member`
--

INSERT INTO `conversation_member` (`id`, `conversation_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nick_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `location_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(205, 1, 3, 'a', '2017-05-25 04:23:40', '2017-05-25 04:23:40'),
(206, 2, 3, 'b', '2017-05-25 04:23:48', '2017-05-25 04:23:48'),
(207, 1, 4, 'd', '2017-05-25 04:26:03', '2017-05-25 04:26:03'),
(208, 1, 3, 'e', '2017-05-25 04:26:06', '2017-05-25 04:26:06'),
(209, 1, 3, 'f', '2017-05-25 04:26:12', '2017-05-25 04:26:12'),
(210, 1, 4, 'd', '2017-05-25 04:54:15', '2017-05-25 04:54:15'),
(211, 1, 3, 'h', '2017-05-25 04:54:20', '2017-05-25 04:54:20'),
(212, NULL, 3, 'q', '2017-05-25 08:10:26', '2017-05-25 08:10:26'),
(213, NULL, 3, '1', '2017-05-25 08:10:41', '2017-05-25 08:10:41'),
(214, NULL, 4, '2', '2017-05-25 08:10:45', '2017-05-25 08:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_17_072529_create_admins_table', 2),
(4, '2017_05_21_170420_create_messages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ngoccuonggl249@gmail.com', '$2y$10$U5cyGilgT33WMtxef.aFVOwvqZKOm8qOkC55azUnBF8VwfxzxwB9e', '2017-05-09 10:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `time_open` time DEFAULT NULL,
  `time_close` time DEFAULT NULL,
  `time_stay` time DEFAULT NULL,
  `cost` int(10) DEFAULT NULL,
  `star` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `address`, `description`, `time_open`, `time_close`, `time_stay`, `cost`, `star`, `created_at`, `updated_at`) VALUES
(1, 'Lotte Cinema - Parkson Cantavil', 'Tầng 7 Parkson Cantavil, 1 Song Hành, P. An Phú,  Quận 2, TP. HCM', NULL, '09:00:00', '23:00:00', '02:00:00', 200000, 5, '2017-05-28 07:00:00', '2017-05-28 07:00:00'),
(2, 'CGV Thủ Đức', 'Tầng 5, TTTM Vincom Thủ Đức, 216 Võ Văn Ngân, P. Bình Thọ, Q. Thủ Đức, Tp. Hồ Chí Minh', 'Tiên phong trong việc mang đến dịch vụ giải trí tại khu vực Thủ Đức, CGV Thủ Đức đã trở thành rạp chiếu phim nhộn nhịp nhất khi có làng đại học bao quanh. CGV Thủ Đức còn đem đến loại ghế Sweetbox phục vụ cho nhiều đôi bạn trẻ.', '08:30:00', '23:00:00', '02:00:00', 250000, 5, '2017-05-27 17:00:00', '2017-05-27 17:00:00'),
(3, 'BHD - LÊ VĂN VIỆT', 'Tầng 4, toà nhà Vincom Plaza Lê Văn Việt, số 50 Lê Văn Việt, Quận 9, TP.HCM', NULL, '08:30:00', '00:00:00', '02:00:00', 150000, 5, '2017-05-27 17:00:00', '2017-05-27 17:00:00'),
(4, 'Trà Sữa It\'s Time', 'Đối Diện Đại Học Quốc Tế, Làng Đại Học,  Quận Thủ Đức, TP. HCM', NULL, '08:00:00', '22:00:00', '02:00:00', 25000, 3, '2017-05-27 17:00:00', '2017-05-27 17:00:00'),
(5, 'Kem Xôi - Làng Đại Học', 'Làng Đại Học, P. Linh Trung,  Quận Thủ Đức, TP. HCM', NULL, '09:00:00', '21:00:00', '01:00:00', 20000, 2, '2017-05-27 17:00:00', '2017-05-27 17:00:00'),
(6, 'Trà Sữa Yo Yo', 'Đối Diện Cổng Sau Trường Đại Học Thể Dục Thể Thao TP Hồ Chí Minh,  Quận Thủ Đức, TP. HCM', NULL, '07:00:00', '22:00:00', '01:00:00', 30000, 3, '2017-05-27 17:00:00', '2017-05-27 17:00:00'),
(7, 'Trà Sữa Sahara', 'Đối Diện Cổng Sau Trường Đại Học Khoa Học Tự Nhiên,  Quận Thủ Đức, TP. HCM', NULL, '07:00:00', '22:00:00', '01:00:00', 15000, 2, '2017-05-27 17:00:00', '2017-05-27 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `transportation` varchar(20) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `total_cost` int(10) DEFAULT NULL,
  `start_place` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `user_id`, `name`, `description`, `category`, `transportation`, `start_time`, `end_time`, `total_cost`, `start_place`, `created_at`, `updated_at`) VALUES
(47, 3, 'A common form of lorem ipsum reads 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-13 08:19:20', '2017-05-13 08:19:20'),
(48, 4, 'A common form of lorem ipsum reads 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-13 08:20:25', '2017-05-13 08:20:25'),
(49, 3, 'A common form of lorem ipsum reads 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-14 06:09:11', '2017-05-14 06:09:11'),
(50, 3, 'A common form of lorem ipsum reads 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-14 06:09:25', '2017-05-14 06:09:25'),
(51, 3, 'A common form of lorem ipsum reads 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-14 06:09:34', '2017-05-14 06:09:34'),
(52, 3, 'A common form of lorem ipsum reads 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-14 06:09:46', '2017-05-14 06:09:46'),
(53, 3, 'A common form of lorem ipsum reads 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(54, 3, 'A common form of lorem ipsum reads 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(55, 3, 'A common form of lorem ipsum reads 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'eating', '', NULL, NULL, 0, '', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(56, 3, 'A common form of lorem ipsum reads 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sport', '', NULL, NULL, 0, '', '2017-05-15 16:52:40', '2017-05-15 16:52:40'),
(57, 3, 'A common form of lorem ipsum reads 11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'movie', '', NULL, NULL, 0, '', '2017-05-15 16:55:58', '2017-05-15 16:55:58'),
(67, 3, 'A common form of lorem ipsum reads 12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sport', '', NULL, NULL, 0, '', '2017-05-15 17:37:59', '2017-05-15 17:37:59'),
(71, 3, 'A common form of lorem ipsum reads 13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'movie', '', NULL, NULL, 0, '', '2017-05-16 03:06:35', '2017-05-16 03:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `plan_access`
--

CREATE TABLE `plan_access` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `access` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_comment`
--

CREATE TABLE `plan_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan_comment`
--

INSERT INTO `plan_comment` (`id`, `user_id`, `plan_id`, `comment`, `created_at`, `updated_at`) VALUES
(24, 4, 47, 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.', '2017-05-13 08:20:54', '2017-05-13 08:20:54'),
(25, 3, 47, 'At vero eos et accusamus et iusto odio dignissimos ducimus', '2017-05-13 08:21:13', '2017-05-13 08:21:13'),
(27, 3, 48, 'At vero eos et accusamus et iusto odio dignissimos ducimus', '2017-05-13 08:21:35', '2017-05-13 08:21:35'),
(28, 3, 48, 'Lorem ipsum dolor sit amet', '2017-05-13 08:21:59', '2017-05-13 08:21:59'),
(29, 4, 48, 'Excepteur sint occaecat cupidatat non proident', '2017-05-13 08:22:07', '2017-05-13 08:22:07'),
(30, 3, 53, 'a', '2017-05-14 08:57:04', '2017-05-14 08:57:04'),
(31, 3, 53, '1 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2017-05-14 09:02:06', '2017-05-14 09:02:06'),
(32, 3, 53, '2 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2017-05-14 09:29:07', '2017-05-14 09:29:07'),
(33, 3, 53, '3 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2017-05-14 09:29:20', '2017-05-14 09:29:20'),
(34, 3, 53, '4 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2017-05-14 09:29:23', '2017-05-14 09:29:23'),
(35, 3, 47, 'aaa', '2017-05-14 13:32:00', '2017-05-14 13:32:00'),
(36, 3, 53, 'a', '2017-05-14 15:13:51', '2017-05-14 15:13:51'),
(37, 3, 53, 'b', '2017-05-14 15:13:56', '2017-05-14 15:13:56'),
(38, 3, 53, 'c', '2017-05-14 15:14:01', '2017-05-14 15:14:01'),
(39, 3, 53, 'd', '2017-05-14 15:14:05', '2017-05-14 15:14:05'),
(40, 3, 47, 'a1', '2017-05-14 15:38:30', '2017-05-14 15:38:30'),
(41, 3, 53, 'a10', '2017-05-14 16:50:39', '2017-05-14 16:50:39'),
(42, 3, 53, 'AAA', '2017-05-15 13:16:49', '2017-05-15 13:16:49'),
(43, 3, 57, 'Ut enim ad minim veniam', '2017-05-15 16:56:11', '2017-05-15 16:56:11'),
(44, 3, 71, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2017-05-16 03:07:40', '2017-05-16 03:07:40'),
(45, 3, 71, '1', '2017-05-19 06:46:27', '2017-05-19 06:46:27'),
(46, 3, 71, '2', '2017-05-19 06:46:31', '2017-05-19 06:46:31'),
(47, 3, 71, '3', '2017-05-19 06:46:35', '2017-05-19 06:46:35'),
(48, 3, 71, '4', '2017-05-19 06:46:39', '2017-05-19 06:46:39'),
(49, 3, 71, '5', '2017-05-19 06:46:43', '2017-05-19 06:46:43'),
(50, 3, 71, '6', '2017-05-19 06:46:47', '2017-05-19 06:46:47'),
(51, 3, 71, '7', '2017-05-19 06:46:53', '2017-05-19 06:46:53'),
(52, 3, 67, '1', '2017-05-19 16:40:15', '2017-05-19 16:40:15'),
(53, 3, 67, '2', '2017-05-19 16:40:21', '2017-05-19 16:40:21'),
(54, 3, 67, '3', '2017-05-19 16:40:28', '2017-05-19 16:40:28'),
(55, 3, 67, '4', '2017-05-19 16:40:34', '2017-05-19 16:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `plan_like`
--

CREATE TABLE `plan_like` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan_like`
--

INSERT INTO `plan_like` (`id`, `plan_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(25, 53, 3, 'like', '2017-05-15 08:25:56', '2017-05-15 13:13:37'),
(26, 54, 3, 'dislike', '2017-05-15 08:25:59', '2017-05-15 13:13:56'),
(27, 55, 3, 'like', '2017-05-15 08:47:43', '2017-05-15 10:14:31'),
(28, 48, 3, 'dislike', '2017-05-15 12:26:15', '2017-05-15 12:27:23'),
(29, 47, 3, 'like', '2017-05-15 12:26:46', '2017-05-15 12:26:46'),
(30, 51, 3, 'like', '2017-05-15 12:27:16', '2017-05-15 12:27:16'),
(31, 49, 3, 'like', '2017-05-15 12:27:21', '2017-05-15 12:27:21'),
(32, 53, 4, 'like', '2017-05-15 12:42:40', '2017-05-15 13:14:12'),
(33, 57, 3, 'like', '2017-05-15 16:56:03', '2017-05-15 16:56:03'),
(34, 71, 3, 'like', '2017-05-16 03:07:10', '2017-05-16 03:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `plan_place`
--

CREATE TABLE `plan_place` (
  `plan_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_report`
--

CREATE TABLE `plan_report` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `handler` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_share`
--

CREATE TABLE `plan_share` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_thumbnail`
--

CREATE TABLE `plan_thumbnail` (
  `id` int(20) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `thumbnail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan_thumbnail`
--

INSERT INTO `plan_thumbnail` (`id`, `plan_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(4, 47, 'cat.jpg', '2017-05-13 08:19:20', '2017-05-13 08:19:20'),
(5, 47, 'images.jpg', '2017-05-13 08:19:20', '2017-05-13 08:19:20'),
(6, 48, 'kitchen.jpg', '2017-05-13 08:20:25', '2017-05-13 08:20:25'),
(7, 49, 'cat.jpg', '2017-05-14 06:09:11', '2017-05-14 06:09:11'),
(8, 50, 'images.jpg', '2017-05-14 06:09:25', '2017-05-14 06:09:25'),
(9, 51, 'kitchen.jpg', '2017-05-14 06:09:34', '2017-05-14 06:09:34'),
(10, 52, 'cover-is-loading.jpg', '2017-05-14 06:09:46', '2017-05-14 06:09:46'),
(11, 53, 'cover-is-loading.jpg', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(12, 54, 'cover-is-loading.jpg', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(13, 55, 'kitchen.jpg', '2017-05-14 06:09:34', '2017-05-14 06:09:34'),
(14, 56, 'kitchen.jpg', '2017-05-15 16:52:40', '2017-05-15 16:52:40'),
(15, 57, 'cat.jpg', '2017-05-15 16:55:58', '2017-05-15 16:55:58'),
(21, 67, 'cat.jpg', '2017-05-15 17:37:59', '2017-05-15 17:37:59'),
(22, 67, 'cover-is-loading.jpg', '2017-05-15 17:37:59', '2017-05-15 17:37:59'),
(23, 71, 'CinepolisOrlando-0010.jpg', '2017-05-16 03:06:35', '2017-05-16 03:06:35'),
(24, 71, 'polk-county-5.jpg', '2017-05-16 03:06:35', '2017-05-16 03:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `user_id_1` int(10) UNSIGNED NOT NULL,
  `user_id_2` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `action_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`user_id_1`, `user_id_2`, `status`, `action_user_id`, `created_at`, `updated_at`) VALUES
(3, 1, 'friend', 3, '2017-05-19 05:59:29', '2017-05-25 04:34:12'),
(3, 2, 'friend', 3, '2017-05-18 11:10:05', '2017-05-25 04:34:30'),
(3, 4, 'friend', 3, '2017-05-18 11:06:25', '2017-05-25 04:33:50'),
(3, 5, 'waiting', 5, '2017-05-19 05:59:28', '2017-05-25 04:31:02'),
(3, 6, 'friend', 3, '2017-05-18 11:10:21', '2017-05-25 04:34:32'),
(3, 7, 'waiting', 7, '2017-05-19 05:59:29', '2017-05-25 04:31:14'),
(3, 8, 'friend', 3, '2017-05-18 11:25:39', '2017-05-25 04:34:36'),
(3, 9, 'friend', 3, '2017-05-20 16:05:53', '2017-05-25 04:34:37'),
(4, 1, 'friend', 4, '2017-05-19 16:02:52', '2017-05-19 16:02:52'),
(4, 2, 'friend', 4, '2017-05-19 16:02:51', '2017-05-19 16:02:51'),
(4, 5, 'friend', 4, '2017-05-19 16:02:52', '2017-05-19 16:02:52'),
(4, 6, 'friend', 4, '2017-05-19 16:02:53', '2017-05-19 16:02:53'),
(4, 7, 'waiting', 7, '2017-05-19 16:02:58', '2017-05-19 16:02:58'),
(4, 8, 'friend', 4, '2017-05-19 16:02:56', '2017-05-19 16:02:56'),
(4, 9, 'friend', 9, '2017-05-19 16:02:55', '2017-05-19 16:02:55'),
(9, 7, 'none', 9, '2017-05-19 06:26:03', '2017-05-19 06:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `DOB`, `Gender`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, '', 'admin', 'trangbtm31@gmail.com', '$2y$10$exjS2x6zLKw92V80e8gbJ./W247ZS4.gJtfyxR416GWGZZq7V.KoC', '1995-05-31', 'female', 'h3qJ78RUg1sJgf2fzuB65BwLq2sS3spkRt4zV2eaumAwT6G1tqcQE92NizAx', '2017-04-16 20:47:05', '2017-04-16 20:47:05', 0),
(2, '', 'admin_1', 'annie.btmt@gmail.com', '$2y$10$zDRwXYHcor/9p8CqkNaYvetIGDb77Yz/w289nzORnWECh6Tey9r4C', '1995-05-31', 'female', 'Vo9REjShiaopKjPWrJdml96OhSUkbNsIEm9fgjn3znzMEDWs6dKVOgQkoyut', '2017-04-17 19:48:55', '2017-04-30 22:29:56', 0),
(3, 'Cương', 'Admin', 'ngoccuonggl249@gmail.com', '$2a$06$0va9K1U6M6Bf/iflyByWy.PBMGh8zgThK7GzRxtvM0YPvIeRDrTVq', '1995-09-24', 'male', 'RfDXjSIk9OfgzuODZErkPuoXjYdEA9sAY98r16pz2UDSKQ6qHiV1hp7G21eu', NULL, NULL, 1),
(4, 'Ngọc', 'Cương', '13520091@gm.uit.edu.vn', '$2a$06$0va9K1U6M6Bf/iflyByWy.PBMGh8zgThK7GzRxtvM0YPvIeRDrTVq', '1993-05-31', 'male', '53TOwTEH5HIubzLRajovBKUcL7FbJhsN2rItOwtfuWclTVUT7NyQdvhhwBFk', NULL, NULL, 1),
(5, 'Bùi Trương', 'Trang', 'ssd@hdgd.xghfig', '$2y$10$81tEj3d8ssQvlv6HLhLXYu1JphfSNy6Sge03sZyqYMSb2PKDXoJL2', '1970-01-01', 'female', '6tENs1ueK8v3L77YHSnZAiMVqS4z2sTeRY5JJvQokyVrTecGDZHIalMu91P4', '2017-05-10 09:21:14', '2017-05-10 09:21:14', 0),
(6, 'Bùi Trương', 'Trang', '13520911@gm.uit.edu.vn', '$2y$10$Ul2WX9x4Bso3KT47Gl24CeUFSGl6R90kSZarCXKBVoC1C.pT4Boa2', '1995-05-31', 'female', NULL, '2017-05-10 03:57:13', '2017-05-10 03:57:13', 0),
(7, 'Example', 'User', 'example@gmail.com', '$2y$10$9khzJFVwpnBciyPBZ7DaY.hnr00Aw/FqH4nBRrtwPSXg1WTkt66xW', '1998-03-18', 'male', NULL, '2017-05-17 05:37:34', '2017-05-17 05:37:34', 0),
(8, 'Liz', 'Lemon', 'lizlemon@example.com', '$2y$10$KQByq.ExT5JXxfuCh6m7e.8/QTWP5TwdTxf9f4AgWHSEH1yBN2f4a', '1989-05-18', 'female', 'YzG2UabLqdCosqfukkqZn7Jc1WncM1YWG38V40mR2PzMmeRTL0lfhJPZO02v', '2017-05-17 05:39:34', '2017-05-17 05:39:34', 0),
(9, 'Cuong', 'Cuong', 'cuongcuong@example.com', '$2y$10$NtgMffDCXdULwMhOZ8bccuvyvmfu5XMrKKTVgHPcwI0AGFJ9qZ7J.', '1998-02-17', 'male', 'qSXywKMkT5LTftk7QbXdNubuAYXkOoVMtKFiPyU1AC9FLlbwzzPB3iWuZ0Zb', '2017-05-19 05:57:43', '2017-05-19 05:57:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `address`, `job`, `company`, `avatar`, `cover_photo`) VALUES
(1, 'Đà Nẵng', 'Student', 'University of Social Siences and Humanities', 'user-1.jpg', 'sunset_winter.png'),
(2, 'Hồ Chí Minh', 'Student', 'University of Information Technology', 'user-1.jpg', 'sunset_winter.png'),
(3, 'Hồ Chí Minh', 'Student', 'University of Information Technology', 'cuong.jpg', 'cover-is-loading.jpg'),
(4, 'Vũng Tàu', 'Fresher', 'Solazu', 'users_default.png', 'sunset_winter.png'),
(5, 'Hà Nội', 'Student', 'University of Information Technology', 'user-10.jpg', 'sunset_winter.png'),
(6, 'Bình Dương', 'Development', 'ABC Company', 'user-1.jpg', 'sunset_winter.png'),
(7, NULL, 'Development', NULL, 'users_default.png', 'sunset_winter.png'),
(8, NULL, NULL, 'Solazu Company', 'users_default.png', 'sunset_winter.png'),
(9, NULL, NULL, NULL, 'users_default.png', 'sunset_winter.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_report`
--

CREATE TABLE `user_report` (
  `id` int(11) NOT NULL,
  `user_report` int(10) NOT NULL,
  `user_was_report` int(10) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `handler` int(10) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `id` int(10) NOT NULL,
  `location` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `wind` float NOT NULL,
  `rain` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation_member`
--
ALTER TABLE `conversation_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_id` (`conversation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `conversation_id` (`conversation_id`);

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
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `plan_access`
--
ALTER TABLE `plan_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `plan_comment`
--
ALTER TABLE `plan_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `plan_like`
--
ALTER TABLE `plan_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `plan_place`
--
ALTER TABLE `plan_place`
  ADD PRIMARY KEY (`plan_id`,`place_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `plan_report`
--
ALTER TABLE `plan_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `handler` (`handler`);

--
-- Indexes for table `plan_share`
--
ALTER TABLE `plan_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_thumbnail`
--
ALTER TABLE `plan_thumbnail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`user_id_1`,`user_id_2`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location` (`location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conversation_member`
--
ALTER TABLE `conversation_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_member`
--
ALTER TABLE `group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `plan_access`
--
ALTER TABLE `plan_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_comment`
--
ALTER TABLE `plan_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `plan_like`
--
ALTER TABLE `plan_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `plan_report`
--
ALTER TABLE `plan_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_share`
--
ALTER TABLE `plan_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_thumbnail`
--
ALTER TABLE `plan_thumbnail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_report`
--
ALTER TABLE `user_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation_member`
--
ALTER TABLE `conversation_member`
  ADD CONSTRAINT `conversation_member_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`),
  ADD CONSTRAINT `conversation_member_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `group_member`
--
ALTER TABLE `group_member`
  ADD CONSTRAINT `group_member_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `group_member_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `plan_access`
--
ALTER TABLE `plan_access`
  ADD CONSTRAINT `plan_access_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`);

--
-- Constraints for table `plan_comment`
--
ALTER TABLE `plan_comment`
  ADD CONSTRAINT `plan_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `plan_comment_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`);

--
-- Constraints for table `plan_like`
--
ALTER TABLE `plan_like`
  ADD CONSTRAINT `plan_like_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`),
  ADD CONSTRAINT `plan_like_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `plan_place`
--
ALTER TABLE `plan_place`
  ADD CONSTRAINT `plan_place_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`),
  ADD CONSTRAINT `plan_place_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Constraints for table `plan_report`
--
ALTER TABLE `plan_report`
  ADD CONSTRAINT `plan_report_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`),
  ADD CONSTRAINT `plan_report_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `plan_report_ibfk_3` FOREIGN KEY (`handler`) REFERENCES `users` (`id`);

--
-- Constraints for table `weather`
--
ALTER TABLE `weather`
  ADD CONSTRAINT `weather_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
