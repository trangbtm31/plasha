-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2017 at 03:18 PM
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
('sport', 'Sport'),
('swimming', 'Swimming');

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
(214, NULL, 4, '2', '2017-05-25 08:10:45', '2017-05-25 08:10:45'),
(215, NULL, 3, 'Hello Everybody', '2017-06-23 09:36:33', '2017-06-23 09:36:33'),
(216, NULL, 4, 'a', '2017-06-23 09:36:41', '2017-06-23 09:36:41');

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
('ngoccuonggl249@gmail.com', '$2y$10$U5cyGilgT33WMtxef.aFVOwvqZKOm8qOkC55azUnBF8VwfxzxwB9e', '2017-05-09 10:24:01'),
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
  `category_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `address`, `description`, `time_open`, `time_close`, `time_stay`, `cost`, `star`, `category_id`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'Lotte Cinema - Parkson Cantavil', 'Tầng 7 Parkson Cantavil, 1 Song Hành, P. An Phú,  Quận 2, TP. HCM', 'Nice', '08:00:00', '23:00:00', '02:30:00', 200000, 5, 'movie', '10.8015333', '106.7472678', '2017-05-28 07:00:00', '2017-06-24 11:27:37'),
(2, 'CGV Thủ Đức', 'Tầng 5, TTTM Vincom Thủ Đức, 216 Võ Văn Ngân, P. Bình Thọ, Q. Thủ Đức, Tp. Hồ Chí Minh', 'Tiên phong trong việc mang đến dịch vụ giải trí tại khu vực Thủ Đức, CGV Thủ Đức đã trở thành rạp chiếu phim nhộn nhịp nhất khi có làng đại học bao quanh. CGV Thủ Đức còn đem đến loại ghế Sweetbox phục vụ cho nhiều đôi bạn trẻ.', '08:30:00', '23:00:00', '02:30:00', 250000, 5, 'movie', '10.8505662', '106.7653083', '2017-05-27 17:00:00', '2017-06-24 11:33:15'),
(3, 'BHD - LÊ VĂN VIỆT', 'Tầng 4, toà nhà Vincom Plaza Lê Văn Việt, số 50 Lê Văn Việt, Quận 9, TP.HCM', '', '08:30:00', '00:00:00', '02:30:00', 150000, 4, 'movie', '10.8456724', '106.7791289', '2017-05-27 17:00:00', '2017-06-24 12:08:41'),
(8, 'Vỹ Dạ Quán - Quán Nhậu Bình Dân', '146 Võ Văn Tần, P. 6,  Quận 3, TP. HCM', NULL, '16:00:00', '23:30:00', '03:00:00', 120000, 3, 'eating', '10.7749453', '106.6887059', NULL, '2017-06-24 11:32:05'),
(9, 'Kaffir - Thai Foods', '29 Đỗ Quang Đẩu,  Quận 1, TP. HCM', NULL, '13:00:00', '23:50:00', '02:00:00', 120000, 4, 'eating', '10.8011648', '106.6838346', NULL, '2017-06-24 12:16:43'),
(10, 'San San - Mì Gà Quay - Hoa Lan', '147 Hoa Lan, P. 2,  Quận Phú Nhuận, TP. HCM', NULL, '09:00:00', '21:00:00', '02:00:00', 35000, 3, 'eating', '10.7977835', '106.6882224', NULL, '2017-06-24 11:27:38'),
(11, 'Phở Dậu - Phở Bắc Gia Truyền', 'Cư Xá 288, Hẻm 288 M1 Nam Kì Khởi Nghĩa, P. 8,  Quận 3, TP. HCM', NULL, '05:00:00', '11:00:00', '02:00:00', 65000, 4, 'eating', '10.7898615', '106.6850652', NULL, '2017-06-24 12:16:44'),
(12, 'Phở Bò Phú Gia', '146E Lý Chính Thắng, P. 7,  Quận 3, TP. HCM', NULL, '06:00:00', '11:00:00', '02:00:00', 35000, 3, 'eating', '10.786473', '106.6845282', NULL, '2017-06-24 11:28:39'),
(14, 'Hima Coffee Rooftop', 'Tầng 12, Tòa Nhà ATHENA, 146 - 148 Cộng Hòa, P. 4,  Quận Tân Bình, TP. HCM', 'Mới lượn thử quán về! Không gian quả đúng như miêu tả, mát, thoáng, thư giãn như ở lounge. Máy bay lên xuống lấp lánh xanh xanh đỏ đỏ! Món nước lạ và hấp dẫn! Soda Wild Rose. Cảm giác thiệt đã và sang chảnh mà giá quá ư bình dân!', '13:00:00', '19:00:00', '02:00:00', 50000, 5, 'drink', '10.8016493', '106.6520333', '2017-06-23 05:43:45', '2017-06-24 12:11:10'),
(15, 'Rooftop Coffee', 'Tầng 13, Tòa Nhà ATHENA, 146 - 148 Cộng Hòa, P. 4,  Quận Tân Bình, TP. HCM', 'Perfect!!!', '08:00:00', '22:00:00', '02:00:00', 80000, 4, 'drink', '10.8016493', '106.6520333', '2017-06-23 05:45:57', '2017-06-24 12:12:18'),
(16, 'Chú Tèo Buffet Nướng', '955 Hậu Giang, Phường 11,  Quận 6, TP. HCM', NULL, '16:00:00', '22:00:00', '02:00:00', 120000, 3, 'eating', '10.7456219', '106.626644', '2017-06-23 16:17:32', '2017-06-24 12:12:19'),
(17, 'Food House Restaurant - Phan Xích Long', '133 - 135 Phan Xích Long, P. 7,  Quận Phú Nhuận, TP. HCM', NULL, '08:00:00', '23:00:00', '02:00:00', 200000, 5, 'eating', '10.7985186', '106.6881288', '2017-06-23 16:23:16', '2017-06-24 12:12:19'),
(18, 'Phố Nhật - Noodle & Sushi', '39 Nguyễn Thái Học , P. Cầu Ông Lãnh,  Quận 1, TP. HCM', NULL, '10:00:00', '23:00:00', '02:00:00', 250000, 5, 'eating', '10.766991', '106.6957761', '2017-06-23 16:27:57', '2017-06-24 11:32:28'),
(20, 'La Bettola Saigon - Italian Cuisine', '82 Xuân Thủy, P. Thảo Điền,  Quận 2, TP. HCM', NULL, '11:00:00', '22:00:00', '02:00:00', 300000, 5, 'eating', '10.8035602', '106.7340611', '2017-06-23 16:37:47', '2017-06-24 12:12:20'),
(21, 'Mộc - Riêu & Nướng - Lam Sơn', '9A Lam Sơn, P. 2,  Quận Tân Bình, TP. HCM', NULL, '06:00:00', '22:00:00', '02:00:00', 180000, 4, 'eating', '10.8079471', '106.6664663', '2017-06-23 16:40:27', '2017-06-24 11:28:22'),
(22, 'Galaxy Cinema - Nguyễn Du', '116 Nguyễn Du,  Quận 1, TP. HCM', NULL, '09:00:00', '23:30:00', '02:30:00', 150000, 5, 'movie', '10.772937', '106.693387', '2017-06-23 16:42:51', '2017-06-24 12:08:44'),
(23, 'Hồ Bơi Văn Thánh - Điện Biên Phủ', '48/10 Điện Biên Phủ, P. 22,  Quận Bình Thạnh, TP. HCM', NULL, '09:00:00', '21:00:00', '01:30:00', 60000, 4, 'swimming', '10.7995679', '106.7174578', '2017-06-23 16:45:20', '2017-06-24 11:29:07'),
(24, 'Hồ Bơi Lan Anh', '291 Cách Mạng Tháng 8, P. 12,  Quận 10, TP. HCM', NULL, '06:00:00', '21:00:00', '01:30:00', 50000, 3, 'swimming', '10.7793278', '106.6786446', '2017-06-23 16:46:31', '2017-06-24 11:33:51'),
(25, 'Bowling Dream Game - AEON Mall', 'Tầng 3 AEON Mall, 30 Bờ Bao Tân Thắng, P. Sơn Kỳ,  Quận Tân Phú, TP. HCM', NULL, '09:00:00', '21:00:00', '02:00:00', 165000, 4, 'sport', '10.8017161', '106.6179324', '2017-06-23 16:48:24', '2017-06-24 12:12:21'),
(26, 'Massé SaiGon Pool Club', '150/9 Nguyễn Trãi,  Quận 1, TP. HCM', 'Karaoke, Beer club, Thăm quan & chụp ảnh, Billiards, Sân khấu, Khu chơi Game, Giao cơm văn phòng, Khu Ẩm Thực', '11:00:00', '02:00:00', '03:00:00', 500000, 5, 'sport', '10.7699769', '106.6902502', '2017-06-23 16:52:58', '2017-06-24 12:12:22'),
(27, 'Escape Room Việt Nam - Trò chơi thoát hiểm', 'Lầu 5, TTTM Crescent Mall, 101 Tôn Dật Tiên, P. Tân Phú,  Quận 7, TP. HCM', NULL, '10:00:00', '22:00:00', '01:00:00', 285000, 5, 'sport', '10.7287097', '106.7188056', '2017-06-23 16:55:59', '2017-06-24 12:08:46'),
(28, 'Nhà hàng The Deck Saigon', '38 Nguyễn Ư Dĩ, P. Thảo Điền,  Quận 2, TP. HCM', NULL, '08:30:00', '23:30:00', '02:00:00', 385000, 5, 'eating', '10.806938', '106.7445592', '2017-06-23 16:57:11', '2017-06-24 11:34:10'),
(29, 'Morico - Modern Japanese Restaurant Cafe', '30 Lê Lợi, P. Bến Nghé,  Quận 1, TP. HCM', NULL, '09:00:00', '23:00:00', '03:00:00', 150000, 5, 'drink', '10.7743308', '106.7007185', '2017-06-23 17:01:14', '2017-06-24 11:32:46'),
(30, 'Monkey In Black Cafe', '263 Trần Quang Khải, P. Tân Định,  Quận 1, TP. HCM', NULL, '08:00:00', '22:00:00', '02:00:00', 70000, 5, 'drink', '10.7912789', '106.6881478', '2017-06-23 17:02:25', '2017-06-24 11:32:47'),
(31, 'Starbucks Coffee - Phạm Hồng Thái', 'Phạm Hồng Thái,  Quận 1, TP. HCM', NULL, '07:00:00', '00:00:00', '03:00:00', 120000, 5, 'drink', '10.7712356', '106.6945839', '2017-06-23 17:04:20', '2017-06-24 12:11:12'),
(32, 'Trà Sữa Gong Cha', '79 Hồ Tùng Mậu,  Quận 1, TP. HCM', NULL, '08:30:00', '21:30:00', '02:00:00', 60000, 3, 'drink', '10.772025', '106.703671', '2017-06-23 17:17:07', '2017-06-24 11:32:08'),
(33, 'Koi Thé Café', '76 Ngô Đức Kế, P. Bến Nghé,  Quận 1, TP. HCM', NULL, '09:00:00', '22:00:00', '03:00:00', 50000, 3, 'drink', '10.772304', '106.704156', '2017-06-23 17:18:52', '2017-06-24 11:28:42'),
(34, 'Hot & Cold - Trà Sữa & Xiên Que - Sư Vạn Hạnh', '824/2 Sư Vạn Hạnh, P. 12,  Quận 10, TP. HCM', NULL, '08:30:00', '22:00:00', '02:00:00', 45000, 3, 'drink', '10.7755974', '106.6677152', '2017-06-23 17:20:44', '2017-06-24 12:12:23'),
(35, 'Hồ bơi Lâm Viên', '155 Linh Trung,  Quận Thủ Đức, TP. HCM', NULL, '05:30:00', '21:00:00', '01:30:00', 20000, 3, 'swimming', '10.8600134', '106.7808991', '2017-06-24 14:28:11', '2017-06-24 14:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `place_thumbnail`
--

CREATE TABLE `place_thumbnail` (
  `id` int(20) NOT NULL,
  `place_id` int(11) NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `place_thumbnail`
--

INSERT INTO `place_thumbnail` (`id`, `place_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(25, 15, 'foody-hima-coffee.jpg', '2017-06-23 05:45:57', '2017-06-23 05:45:57'),
(26, 15, 'hmbbd-jpg-265-636244923970677852.jpg', '2017-06-23 05:45:57', '2017-06-23 05:45:57'),
(27, 1, 'lotte-cantavil.jpg', '2017-06-23 06:04:27', '2017-06-23 06:04:27'),
(28, 10, 'sansan.jpg', '2017-06-23 06:05:28', '2017-06-23 06:05:28'),
(29, 16, 'chuteo-avatar1.jpg', '2017-06-23 16:17:32', '2017-06-23 16:17:32'),
(30, 16, 'chu-teo-buffet.jpg', '2017-06-23 16:17:32', '2017-06-23 16:17:32'),
(31, 17, 'foody-album12-jpg-299-636323690511199801.jpg', '2017-06-23 16:23:16', '2017-06-23 16:23:16'),
(32, 18, 'kake-udon_s-jpg-250-636334771544767466.jpg', '2017-06-23 16:27:57', '2017-06-23 16:27:57'),
(34, 20, 'foody-album4-jpg-950-636336543950480504.jpg', '2017-06-23 16:37:47', '2017-06-23 16:37:47'),
(35, 21, 'dsc04219-001-jpg-571-636087534085372032.jpg', '2017-06-23 16:40:27', '2017-06-23 16:40:27'),
(36, 22, 'foody-mobile-galaxy-cinema-tp-hcm.jpg', '2017-06-23 16:42:51', '2017-06-23 16:42:51'),
(37, 23, 'foody-mobile-hmb-van-jpg-357-635725679543868039.jpg', '2017-06-23 16:45:20', '2017-06-23 16:45:20'),
(38, 24, 'foody-mobile-ho-boi-lan-anh-mb-jp-343-635684223054336078.jpg', '2017-06-23 16:46:31', '2017-06-23 16:46:31'),
(39, 25, 'foody-mobile-bowling-dream-game-aeon-mall-tp-hcm-140204125138.jpg', '2017-06-23 16:48:24', '2017-06-23 16:48:24'),
(40, 26, 'foody-mobile-fghfgh-jpg-709-636232058331400632.jpg', '2017-06-23 16:52:58', '2017-06-23 16:52:58'),
(41, 27, 'foody-escape-room-viet-nam-829-635894828269523043.jpg', '2017-06-23 16:55:59', '2017-06-23 16:55:59'),
(42, 28, 'foody-mobile-mobile-jpg-580-635768870501612945.jpg', '2017-06-23 16:57:11', '2017-06-23 16:57:11'),
(43, 29, 'foody-mobile-12-jpg-121-636216258751627621.jpg', '2017-06-23 17:01:14', '2017-06-23 17:01:14'),
(44, 30, 'foody-mobile-zas-jpg-258-636086627918162406.jpg', '2017-06-23 17:02:25', '2017-06-23 17:02:25'),
(45, 31, 'foody-mobile-mobile-jpg-409-635744522405981690.jpg', '2017-06-23 17:04:20', '2017-06-23 17:04:20'),
(46, 32, 'foody-tra-sua-gong-cha-635483579496024394.jpg', '2017-06-23 17:17:07', '2017-06-23 17:17:07'),
(47, 33, 'foody-mobile-t0bo2c08-jpg-574-635912293727197879.jpg', '2017-06-23 17:18:52', '2017-06-23 17:18:52'),
(48, 34, 'foody-mobile-w6-jpg-709-635768916498605734.jpg', '2017-06-23 17:20:44', '2017-06-23 17:20:44'),
(49, 35, 'foody-mobile-hmb-lv-jpg-461-635727399027248152.jpg', '2017-06-24 14:28:11', '2017-06-24 14:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `transportation` varchar(20) DEFAULT NULL,
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

INSERT INTO `plan` (`id`, `user_id`, `name`, `description`, `transportation`, `start_time`, `end_time`, `total_cost`, `start_place`, `created_at`, `updated_at`) VALUES
(47, 3, 'A common form of lorem ipsum reads 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-13 08:19:20', '2017-05-13 08:19:20'),
(48, 4, 'A common form of lorem ipsum reads 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-13 08:20:25', '2017-05-13 08:20:25'),
(49, 3, 'A common form of lorem ipsum reads 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-14 06:09:11', '2017-05-14 06:09:11'),
(50, 3, 'A common form of lorem ipsum reads 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-14 06:09:25', '2017-05-14 06:09:25'),
(51, 3, 'A common form of lorem ipsum reads 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-14 06:09:34', '2017-05-14 06:09:34'),
(52, 3, 'A common form of lorem ipsum reads 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-14 06:09:46', '2017-05-14 06:09:46'),
(53, 3, 'A common form of lorem ipsum reads 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(54, 3, 'A common form of lorem ipsum reads 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(55, 3, 'A common form of lorem ipsum reads 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-14 06:09:47', '2017-05-14 06:09:47'),
(56, 3, 'A common form of lorem ipsum reads 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-15 16:52:40', '2017-05-15 16:52:40'),
(57, 3, 'A common form of lorem ipsum reads 11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-15 16:55:58', '2017-05-15 16:55:58'),
(67, 3, 'A common form of lorem ipsum reads 12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-15 17:37:59', '2017-05-15 17:37:59'),
(71, 3, 'A common form of lorem ipsum reads 13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', NULL, NULL, 0, '', '2017-05-16 03:06:35', '2017-05-16 03:06:35'),
(72, 3, 'A common form of lorem ipsum reads 14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 10:00:00', '2017-06-23 22:00:00', 485000, NULL, '2017-06-23 02:40:22', '2017-06-23 02:40:22'),
(73, 3, 'A common form of lorem ipsum reads 14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 08:00:00', '2017-06-23 15:00:00', 450000, NULL, '2017-06-23 04:48:00', '2017-06-23 04:48:00'),
(74, 3, 'A common form of lorem ipsum reads 14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 08:00:00', '2017-06-23 15:00:00', 450000, NULL, '2017-06-23 04:50:11', '2017-06-23 04:50:11'),
(75, 3, 'A common form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 08:00:00', '2017-06-23 15:00:00', NULL, NULL, '2017-06-23 04:50:52', '2017-06-23 04:50:52'),
(76, 3, 'A common form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 12:00:00', '2017-06-23 17:00:00', 450000, NULL, '2017-06-23 04:51:44', '2017-06-23 04:51:44'),
(77, 3, 'A common form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 12:00:00', '2017-06-23 17:00:00', 450000, NULL, '2017-06-23 04:52:09', '2017-06-23 04:52:09'),
(78, 3, 'A common form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 13:00:00', '2017-06-23 16:00:00', 250000, NULL, '2017-06-23 04:52:52', '2017-06-23 04:52:52'),
(79, 3, 'A common form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, '2017-06-23 13:00:00', '2017-06-23 16:00:00', 250000, NULL, '2017-06-23 04:53:24', '2017-06-23 04:53:24'),
(80, 3, '1', '1', NULL, NULL, NULL, NULL, NULL, '2017-06-23 05:38:26', '2017-06-23 05:38:26'),
(81, 3, 'Hima Coffee Rooftop', 'Coffe đi bà con', NULL, NULL, NULL, NULL, NULL, '2017-06-23 05:43:45', '2017-06-23 05:43:45'),
(82, 3, 'Hima Coffee Rooftop', 'Coffe đi bà con', NULL, NULL, NULL, NULL, NULL, '2017-06-23 05:45:57', '2017-06-23 05:45:57'),
(83, 3, 'A', 'A', NULL, '2017-06-24 07:00:00', '2017-06-24 21:00:00', 855000, NULL, '2017-06-24 12:51:05', '2017-06-24 12:51:05');

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
(55, 3, 67, '4', '2017-05-19 16:40:34', '2017-05-19 16:40:34'),
(58, 3, 79, '1', '2017-06-23 05:11:51', '2017-06-23 05:11:51'),
(59, 3, 79, '2', '2017-06-23 05:11:54', '2017-06-23 05:11:54'),
(60, 3, 82, 'Wow! Great!!!', '2017-06-23 09:19:03', '2017-06-23 09:19:03'),
(61, 4, 82, 'I\'ll come with you', '2017-06-23 09:20:13', '2017-06-23 09:20:13'),
(62, 3, 82, 'really?', '2017-06-23 09:20:27', '2017-06-23 09:20:27');

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
(33, 57, 3, 'like', '2017-05-15 16:56:03', '2017-05-15 16:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `plan_place`
--

CREATE TABLE `plan_place` (
  `plan_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan_place`
--

INSERT INTO `plan_place` (`plan_id`, `place_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(72, 1, '2017-06-23 04:00:00', '2017-06-23 07:00:00', '2017-06-23 02:40:22', '2017-06-23 02:40:22'),
(72, 2, '2017-06-23 07:00:00', '2017-06-23 09:00:00', '2017-06-23 02:40:22', '2017-06-23 02:40:22'),
(72, 10, '2017-06-23 03:00:00', '2017-06-23 04:00:00', '2017-06-23 02:40:22', '2017-06-23 02:40:22'),
(79, 2, '2017-06-23 06:00:00', '2017-06-23 08:00:00', '2017-06-23 04:53:24', '2017-06-23 04:53:24'),
(81, 14, '2017-06-23 07:00:00', '2017-06-23 09:00:00', '2017-06-23 05:43:45', '2017-06-23 05:43:45'),
(82, 15, '2017-06-23 06:00:00', '2017-06-23 09:00:00', '2017-06-23 05:45:57', '2017-06-23 05:45:57'),
(83, 1, '2017-06-24 01:00:00', '2017-06-24 03:30:00', '2017-06-24 12:51:05', '2017-06-24 12:51:05'),
(83, 11, '2017-06-24 00:00:00', '2017-06-24 01:00:00', '2017-06-24 12:51:05', '2017-06-24 12:51:05'),
(83, 17, '2017-06-24 05:30:00', '2017-06-24 06:30:00', '2017-06-24 12:51:05', '2017-06-24 12:51:05'),
(83, 22, '2017-06-24 06:30:00', '2017-06-24 09:00:00', '2017-06-24 12:51:05', '2017-06-24 12:51:05'),
(83, 23, '2017-06-24 03:30:00', '2017-06-24 04:30:00', '2017-06-24 12:51:05', '2017-06-24 12:51:05'),
(83, 25, '2017-06-24 04:30:00', '2017-06-24 05:30:00', '2017-06-24 12:51:05', '2017-06-24 12:51:05');

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
(3, 1, 'none', 3, '2017-05-19 05:59:29', '2017-05-25 04:34:12'),
(3, 2, 'none', 3, '2017-05-18 11:10:05', '2017-05-25 04:34:30'),
(3, 4, 'friend', 3, '2017-05-18 11:06:25', '2017-05-25 04:33:50'),
(3, 5, 'waiting', 5, '2017-05-19 05:59:28', '2017-05-25 04:31:02'),
(3, 6, 'none', 3, '2017-05-18 11:10:21', '2017-05-25 04:34:32'),
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
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `tip_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '', 'admin', 'trangbtm31@gmail.com', '$2y$10$exjS2x6zLKw92V80e8gbJ./W247ZS4.gJtfyxR416GWGZZq7V.KoC', '1995-05-31', 'female', 'h3qJ78RUg1sJgf2fzuB65BwLq2sS3spkRt4zV2eaumAwT6G1tqcQE92NizAx', '2017-04-16 20:47:05', '2017-06-18 13:53:54', 0),
(2, '', 'admin_1', 'annie.btmt@gmail.com', '$2y$10$zDRwXYHcor/9p8CqkNaYvetIGDb77Yz/w289nzORnWECh6Tey9r4C', '1995-05-31', 'female', 'Vo9REjShiaopKjPWrJdml96OhSUkbNsIEm9fgjn3znzMEDWs6dKVOgQkoyut', '2017-04-17 19:48:55', '2017-06-18 13:53:54', 0),
(3, 'Cương', 'Admin', 'ngoccuonggl249@gmail.com', '$2a$06$0va9K1U6M6Bf/iflyByWy.PBMGh8zgThK7GzRxtvM0YPvIeRDrTVq', '1995-09-24', 'male', 'Goh1qsEcAwPyppg9zxe52lGv1HZFdjrESpz7j8zkAlfamIQd1seokxmswK9r', NULL, NULL, 1),
(4, 'Ngọc', 'Cương', '13520091@gm.uit.edu.vn', '$2a$06$0va9K1U6M6Bf/iflyByWy.PBMGh8zgThK7GzRxtvM0YPvIeRDrTVq', '1993-05-31', 'male', '53TOwTEH5HIubzLRajovBKUcL7FbJhsN2rItOwtfuWclTVUT7NyQdvhhwBFk', NULL, '2017-06-21 14:37:34', 1),
(5, 'Bùi Trương', 'Trang', 'ssd@hdgd.xghfig', '$2y$10$81tEj3d8ssQvlv6HLhLXYu1JphfSNy6Sge03sZyqYMSb2PKDXoJL2', '1970-01-01', 'female', '6tENs1ueK8v3L77YHSnZAiMVqS4z2sTeRY5JJvQokyVrTecGDZHIalMu91P4', '2017-05-10 09:21:14', '2017-05-10 09:21:14', 0),
(6, 'Bùi Trương', 'Trang', '13520911@gm.uit.edu.vn', '$2y$10$Ul2WX9x4Bso3KT47Gl24CeUFSGl6R90kSZarCXKBVoC1C.pT4Boa2', '1995-05-31', 'female', NULL, '2017-05-10 03:57:13', '2017-05-10 03:57:13', 0),
(7, 'Example', 'User', 'example@gmail.com', '$2y$10$9khzJFVwpnBciyPBZ7DaY.hnr00Aw/FqH4nBRrtwPSXg1WTkt66xW', '1998-03-18', 'male', NULL, '2017-05-17 05:37:34', '2017-05-17 05:37:34', 0),
(8, 'Liz', 'Lemon', 'lizlemon@example.com', '$2y$10$KQByq.ExT5JXxfuCh6m7e.8/QTWP5TwdTxf9f4AgWHSEH1yBN2f4a', '1989-05-18', 'female', 'YzG2UabLqdCosqfukkqZn7Jc1WncM1YWG38V40mR2PzMmeRTL0lfhJPZO02v', '2017-05-17 05:39:34', '2017-05-17 05:39:34', 0),
(9, 'Cuong', 'Cuong', 'cuongcuong@example.com', '$2y$10$NtgMffDCXdULwMhOZ8bccuvyvmfu5XMrKKTVgHPcwI0AGFJ9qZ7J.', '1998-02-17', 'male', 'qSXywKMkT5LTftk7QbXdNubuAYXkOoVMtKFiPyU1AC9FLlbwzzPB3iWuZ0Zb', '2017-05-19 05:57:43', '2017-05-19 05:57:43', 0),
(10, 'Cuong', 'Cuong', 'cuong1@example.com', '$2y$10$NtgMffDCXdULwMhOZ8bccuvyvmfu5XMrKKTVgHPcwI0AGFJ9qZ7J.', '1998-02-17', 'male', 'qSXywKMkT5LTftk7QbXdNubuAYXkOoVMtKFiPyU1AC9FLlbwzzPB3iWuZ0Zb', '2017-05-19 05:57:43', '2017-05-19 05:57:43', 0);

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
(1, 'Đà Nẵng', 'Student', 'University of Social Siences and Humanities', 'user-5.jpg', 'sunset_winter.png'),
(2, 'Hồ Chí Minh', 'Student', 'University of Information Technology', 'user-1.jpg', 'sunset_winter.png'),
(3, 'Hồ Chí Minh', 'Student', 'University of Information Technology', 'cuong.jpg', 'cover-is-loading.jpg'),
(4, 'Vũng Tàu', 'Fresher', 'Solazu', 'users_default.png', 'sunset_winter.png'),
(5, 'Hà Nội', 'Student', 'University of Information Technology', 'user-10.jpg', 'sunset_winter.png'),
(6, 'Bình Dương', 'Development', 'ABC Company', 'user-3.jpg', 'sunset_winter.png'),
(7, NULL, 'Development', NULL, 'user-2.jpg', 'sunset_winter.png'),
(8, NULL, NULL, 'Solazu Company', 'user-10.jpg', 'sunset_winter.png'),
(9, NULL, NULL, NULL, 'user-8.jpg', 'sunset_winter.png');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `place_thumbnail`
--
ALTER TABLE `place_thumbnail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `place_thumbnail`
--
ALTER TABLE `place_thumbnail`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `plan_access`
--
ALTER TABLE `plan_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_comment`
--
ALTER TABLE `plan_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `plan_like`
--
ALTER TABLE `plan_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `place_thumbnail`
--
ALTER TABLE `place_thumbnail`
  ADD CONSTRAINT `place_thumbnail_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
