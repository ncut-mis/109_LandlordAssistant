-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023-06-22 15:20:14
-- 伺服器版本： 8.0.33
-- PHP 版本： 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `109a`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-05-24 07:10:32', '2023-05-24 07:10:32');

-- --------------------------------------------------------

--
-- 資料表結構 `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint UNSIGNED NOT NULL,
  `renter_id` bigint UNSIGNED NOT NULL,
  `house_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `house_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renter_status` tinyint(1) NOT NULL DEFAULT '0',
  `owner_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `expenses`
--

INSERT INTO `expenses` (`id`, `house_id`, `type`, `interval`, `amount`, `start_date`, `end_date`, `remark`, `renter_status`, `owner_status`, `created_at`, `updated_at`) VALUES
(19, 24, '租金', '1', 5700, '2023-06-07', '2023-07-07', '123', 1, 1, '2023-06-07 03:12:02', '2023-06-07 03:26:35'),
(20, 37, '租金', '12', 12000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-07 05:43:07', '2023-06-07 05:45:01'),
(21, 37, '租金', '12', 14400, '2023-06-14', '2024-06-14', NULL, 1, 1, '2023-06-14 02:26:18', '2023-06-14 02:27:38'),
(22, 37, '租金', '12', 12000, '2023-06-14', '2024-06-14', NULL, 1, 1, '2023-06-14 03:50:47', '2023-06-14 03:51:41'),
(24, 32, '租金', '12', 400000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-14 04:18:11', '2023-06-14 04:21:19'),
(25, 32, '租金', '12', 42000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-14 04:52:16', '2023-06-14 04:52:58'),
(26, 37, '租金', '12', 14400, '2023-06-14', '2024-06-14', NULL, 1, 1, '2023-06-14 05:24:49', '2023-06-14 05:25:26'),
(27, 37, '租金', '12', 14000, '2023-06-14', '2024-06-14', NULL, 1, 1, '2023-06-14 05:33:48', '2023-06-14 05:34:36'),
(28, 37, '租金', '12', 14400, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-14 05:39:36', '2023-06-14 05:40:46'),
(29, 32, '租金', '12', 42000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-14 06:09:53', '2023-06-14 06:11:01'),
(30, 32, '租金', '1', 3500, '2023-06-01', '2023-07-01', NULL, 0, 1, '2023-06-14 06:15:46', '2023-06-14 06:15:53'),
(31, 37, '租金', '12', 14400, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-14 06:43:10', '2023-06-14 06:44:00'),
(37, 37, '電費', NULL, 123, '2023-06-01', '2023-06-16', NULL, 0, 0, '2023-06-14 06:47:59', '2023-06-14 06:47:59'),
(38, 37, '車位', NULL, 6666, '2023-06-02', '2023-06-15', NULL, 0, 0, '2023-06-14 06:48:07', '2023-06-14 06:48:07'),
(39, 35, '租金', '24', 12000, '2023-06-01', '2025-06-01', NULL, 1, 1, '2023-06-14 07:10:35', '2023-06-14 07:11:41'),
(40, 35, '電費', NULL, 300, NULL, '2023-06-09', NULL, 0, 0, '2023-06-14 07:11:01', '2023-06-14 07:11:01'),
(41, 32, '租金', '12', 42000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-14 07:16:43', '2023-06-15 04:40:52'),
(42, 32, '租金', '12', 42000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-14 07:29:29', '2023-06-14 07:30:23'),
(43, 39, '租金', '24', 220000, '2023-06-01', '2025-06-01', NULL, 1, 1, '2023-06-14 08:34:56', '2023-06-14 08:35:40'),
(44, 32, '租金', '12', 42000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-15 02:34:00', '2023-06-15 02:34:37'),
(45, 32, '租金', '12', 42000, '2023-06-01', '2024-06-01', NULL, 0, 1, '2023-06-15 04:40:18', '2023-06-15 04:40:30'),
(46, 32, '租金', '12', 42000, '2023-06-01', '2024-06-01', NULL, 1, 1, '2023-06-15 04:53:03', '2023-06-15 04:53:43'),
(47, 32, '租金', '24', 84000, '2023-06-01', '2025-06-01', NULL, 1, 1, '2023-06-15 07:47:48', '2023-06-15 07:48:44');

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `features`
--

CREATE TABLE `features` (
  `id` bigint UNSIGNED NOT NULL,
  `house_id` bigint UNSIGNED NOT NULL,
  `feature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `features`
--

INSERT INTO `features` (`id`, `house_id`, `feature`, `created_at`, `updated_at`) VALUES
(73, 24, '垃圾代收', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(74, 24, '有車位', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(75, 25, '垃圾代收', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(76, 25, '有電梯', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(77, 26, '可開伙', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(78, 26, '垃圾代收', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(79, 26, '有車位', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(80, 26, '有電梯', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(81, 26, '有陽台', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(82, 27, '有管理員', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(83, 27, '垃圾代收', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(84, 28, '可開伙', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(85, 28, '有管理員', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(86, 28, '垃圾代收', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(87, 28, '有車位', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(88, 29, '垃圾代收', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(89, 29, '有陽台', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(90, 30, '可養寵物', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(91, 30, '可開伙', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(92, 30, '垃圾代收', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(93, 30, '有車位', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(94, 30, '有陽台', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(99, 32, '有管理員', '2023-06-02 05:10:39', '2023-06-02 05:10:39'),
(100, 33, '可報稅', '2023-06-02 08:30:16', '2023-06-02 08:30:16'),
(101, 33, '有車位', '2023-06-02 08:30:16', '2023-06-02 08:30:16'),
(102, 33, '有陽台', '2023-06-02 08:30:16', '2023-06-02 08:30:16'),
(109, 35, '可報稅', '2023-06-06 10:35:07', '2023-06-06 10:35:07'),
(110, 35, '有車位', '2023-06-06 10:35:08', '2023-06-06 10:35:08'),
(117, 37, '垃圾代收', '2023-06-07 05:37:12', '2023-06-07 05:37:12'),
(118, 37, '可報稅', '2023-06-07 05:37:13', '2023-06-07 05:37:13'),
(119, 37, '可入籍', '2023-06-07 05:37:13', '2023-06-07 05:37:13'),
(120, 37, '有車位', '2023-06-07 05:37:13', '2023-06-07 05:37:13'),
(121, 38, '可報稅', '2023-06-14 07:31:42', '2023-06-14 07:31:42'),
(122, 38, '有車位', '2023-06-14 07:31:42', '2023-06-14 07:31:42'),
(123, 39, '有管理員', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(124, 39, '垃圾代收', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(125, 39, '可報稅', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(126, 39, '可入籍', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(127, 40, '有管理員', '2023-06-14 09:14:03', '2023-06-14 09:14:03');

-- --------------------------------------------------------

--
-- 資料表結構 `furnishings`
--

CREATE TABLE `furnishings` (
  `id` bigint UNSIGNED NOT NULL,
  `house_id` bigint UNSIGNED NOT NULL,
  `furnish` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `furnishings`
--

INSERT INTO `furnishings` (`id`, `house_id`, `furnish`, `created_at`, `updated_at`) VALUES
(91, 24, '冷氣', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(92, 24, '熱水器', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(93, 24, '洗衣機', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(94, 24, '冰箱', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(95, 24, '網路', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(96, 25, '冷氣', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(97, 25, '熱水器', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(98, 25, '洗衣機', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(99, 25, '冰箱', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(100, 25, '網路', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(101, 26, '冷氣', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(102, 26, '電風扇', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(103, 26, '熱水器', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(104, 26, '洗衣機', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(105, 26, '冰箱', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(106, 27, '冷氣', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(107, 27, '熱水器', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(108, 27, '洗衣機', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(109, 27, '冰箱', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(110, 27, '網路', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(111, 28, '冷氣', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(112, 28, '洗衣機', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(113, 28, '冰箱', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(114, 28, '網路', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(115, 29, '冷氣', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(116, 29, '熱水器', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(117, 29, '洗衣機', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(118, 29, '冰箱', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(119, 29, '網路', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(120, 30, '冷氣', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(121, 30, '電風扇', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(122, 30, '熱水器', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(123, 30, '洗衣機', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(124, 30, '冰箱', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(125, 30, '網路', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(127, 32, '冷氣', '2023-06-02 04:58:07', '2023-06-02 04:58:07'),
(128, 32, '熱水器', '2023-06-02 04:58:07', '2023-06-02 04:58:07'),
(129, 32, '洗衣機', '2023-06-02 04:58:07', '2023-06-02 04:58:07'),
(130, 32, '網路', '2023-06-02 04:58:07', '2023-06-02 04:58:07'),
(131, 32, '天然瓦斯', '2023-06-02 04:58:07', '2023-06-02 04:58:07'),
(132, 33, '冷氣', '2023-06-02 08:30:15', '2023-06-02 08:30:15'),
(133, 33, '熱水器', '2023-06-02 08:30:16', '2023-06-02 08:30:16'),
(134, 33, '冰箱', '2023-06-02 08:30:16', '2023-06-02 08:30:16'),
(140, 35, '熱水器', '2023-06-06 10:35:07', '2023-06-06 10:35:07'),
(141, 35, '洗衣機', '2023-06-06 10:35:07', '2023-06-06 10:35:07'),
(142, 35, '冰箱', '2023-06-06 10:35:07', '2023-06-06 10:35:07'),
(148, 37, '冷氣', '2023-06-07 05:37:12', '2023-06-07 05:37:12'),
(149, 37, '熱水器', '2023-06-07 05:37:12', '2023-06-07 05:37:12'),
(150, 37, '網路', '2023-06-07 05:37:12', '2023-06-07 05:37:12'),
(151, 38, '冷氣', '2023-06-14 07:31:42', '2023-06-14 07:31:42'),
(152, 38, '洗衣機', '2023-06-14 07:31:42', '2023-06-14 07:31:42'),
(153, 38, '網路', '2023-06-14 07:31:42', '2023-06-14 07:31:42'),
(154, 39, '熱水器', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(155, 39, '洗衣機', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(156, 39, '冰箱', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(157, 39, '網路', '2023-06-14 08:30:54', '2023-06-14 08:30:54'),
(158, 40, '熱水器', '2023-06-14 09:14:03', '2023-06-14 09:14:03');

-- --------------------------------------------------------

--
-- 資料表結構 `houses`
--

CREATE TABLE `houses` (
  `id` bigint UNSIGNED NOT NULL,
  `county` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rentals` int DEFAULT NULL,
  `interval` int DEFAULT NULL,
  `lease_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_renter` int DEFAULT NULL,
  `min_period` int DEFAULT NULL,
  `pattern` int DEFAULT NULL,
  `size` int DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` int DEFAULT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `owner_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invitation_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `houses`
--

INSERT INTO `houses` (`id`, `county`, `area`, `address`, `name`, `introduce`, `rentals`, `interval`, `lease_status`, `num_renter`, `min_period`, `pattern`, `size`, `type`, `floor`, `location_id`, `owner_id`, `created_at`, `updated_at`, `invitation_code`) VALUES
(24, '台南市', '東區', '東區中華路', '東區隔壁永康中華路近夢時代*可租金補貼*', '東區隔壁 中華路小東路口 永康中華路麥當勞旁 ~單人床優質套房*^_^*\r\n\r\n期繳半年：月租5700元/月月繳：月租6200元/月\r\n(合約最短一年、押金一個月)\r\n\r\n租金包含：網路(獨立IP.不互相干擾)、第四台  *電費：全年一度5.5/元\r\n\r\n*誠實納稅，租金均開立發票，可以報稅，可以申請租金補貼。 \r\n  \r\n(期繳半年者，如中途解約，租金依月繳計算，多的有退還) \r\n\r\n**沒有管理費.沒有公共電費.沒有電梯費沒有機車停車費 或其他收費\r\n\r\n**每月僅需支付房租及水.電費。\r\n\r\n不限男女、不用與房東同住', 5700, 1, '閒置', 1, 12, 1, 5, '獨立套房', 7, 17, 9, '2023-06-01 07:32:36', '2023-06-07 03:27:03', '3277'),
(25, '台南市', '東區', '東區裕豐街242巷', '近成大.南紡商圈/交通便利_優質學生套房', '★套房特色★\r\n\r\n◎室內專屬機車停車位。\r\n◎垃圾分類集中處理。\r\n◎衛浴皆開窗。\r\n◎自然採光、通風涼爽。\r\n◎生活、休閒、醫療、學區環繞。\r\n\r\n★公共設備★\r\n\r\n頂樓曬被區、洗衣機、脫水機、烘衣機、飲水機。\r\n\r\n\r\n★套房設備★\r\n\r\n附獨立筒床墊、書桌、椅子、衣櫃、窗簾、冷氣機、冰箱。\r\n有WIFI；每間套房網路獨立，不共線。\r\n\r\n＊電視可議\r\n\r\n△ 水費100元/月；電費依錶計費。\r\n\r\n★周邊機能★\r\n\r\n交通：台南火車站\r\n市場：崇誨市場\r\n超商：7-11、全家、萊爾富、全聯、寶雅、屈臣氏\r\n商圈：成大商圈、夢時代商圈\r\n公園：東寧運動公園\r\n醫療設施：成大醫院、新樓醫院\r\n\r\n✨歡迎來電預約看房✨\r\n\r\n📳連絡電話：0922-522163\r\n📳LINE ID：0922532163\r\n請直撥手機詢問或加LINE都可以！\r\n附近有便利商店、傳統市場、百貨公司、公園綠地、學校、醫療機構、夜市。\r\n本房屋近台南火車站。', 4800, 12, '已刊登', 1, 12, 1, 5, '獨立套房', 5, 17, 9, '2023-06-01 07:35:43', '2023-06-01 07:35:43', '4894'),
(26, '台南市', '安定區', '安定區新吉', '鄰近南科台積電/安定區新吉透天車庫別墅', '🔝房屋出租資訊🏠ℹ️\r\n🕴🏻強鐿代租代管公司🕴🏻\r\n\r\n「地址」：安定區 新吉\r\n「房型」 :  車庫透天/4房2廳3衛4陽台\r\n「坪數」：50坪\r\n「租金」：26500/月\r\n「押金」：兩個月\r\n「水電」：台水台電\r\n「寵物」：不可🙅‍♂️\r\n「車位」：車庫🉑️停\r\n\r\n🌟一卡皮箱即可入住🌟\r\n🌟傢俱家電全具備🌟\r\n🌟鄰近南科，新婚夫妻、情侶、小家庭都合適🌟\r\n\r\n🚭全棟禁菸🚭全棟禁菸\r\n‼️全棟禁寵‼️全棟禁寵‼️全棟禁寵‼️\r\n\r\n✨房東保有最後出租決定權✨\r\n\r\n-\r\n是不是都找不到喜歡的房子🏠\r\n然後好不容易看到喜歡的房子\r\n總是思考一下，隔天就被租走了😭\r\n🔥燒燙燙的物件總是咻咻咻的🔥\r\n-\r\n所以趕快加賴約👀房了@083fpnmy\r\n還在等什麼❗️\r\n有關於物件任何問題都可以詢問哦❗️\r\n附近有便利商店、傳統市場、百貨公司、公園綠地、學校、醫療機構、夜市。', 26500, 1, '已刊登', 4, 12, 4, 50, '獨立套房', 3, 18, 9, '2023-06-01 07:39:34', '2023-06-01 07:39:34', '2221'),
(27, '台南市', '安定區', '安定區許中營', '🏡❤️近南科工業區大套房❤️🏡', '🏡❤️近南科工業區大套房❤️🏡\r\n.\r\n✨地址：台南市安定區\r\n\r\n✨格局：1房1廳1衛1陽台\r\n\r\n.\r\n💓💓💓💓物件特色💓💓💓💓\r\n\r\n📌 近南科工業區，食衣住行都方便！\r\n\r\n📌 年繳租金另有優惠呦！\r\n\r\n📌 24小時保全管理！\r\n\r\n📌 垃圾集中處理，免追垃圾車！\r\n\r\n .\r\n☎️歡迎來電預約看屋，請勿臨時約看☎️\r\n.\r\n☀️☁️【國成物業管理股份有限公司】☁️☀️\r\n🌱來電洽詢：06-2603987\r\n🌱LINE ID：@439wnuuh\r\n🌱歡迎委託房屋土地買賣租賃💕💕💕\r\n.\r\n＊以上資訊如有記載錯誤，一律以謄本為準。', 7800, 1, '已刊登', 1, 12, 1, 9, '獨立套房', 2, 18, 9, '2023-06-01 07:51:23', '2023-06-01 07:51:23', '8763'),
(28, '屏東縣', '麟洛鄉', '麟洛鄉中山路675號', '麟洛中山採光一樓套近屏大國3📞愛窩', '無仲介費！無仲介費！無仲介費！\r\n\r\n●●●●●●●特色描述●●●●●●●\r\n\r\n一樓套房 免爬樓梯 超方便\r\n\r\n每房均配有一個儲熱式熱水器\r\n\r\n近省道1 國道3 交通方便 四通八達\r\n\r\n走路散步上學 屏東大學屏商校區 / 民生家商 / 麟洛國小 只要12分鐘 (1公里內)\r\n\r\n租金含水費 Wi-Fi 很划算\r\n\r\n近民生路生活圈 麥當勞 迷克夏 7-11 全家... 商家林立 生活很chill～\r\n\r\n💴💴水費：租金包含\r\n\r\n🔌🔌電費：獨立電表，夏季一度5.5元 ，非夏季5元\r\n\r\n車位租500元/月  \r\n\r\n公電費100元/月  \r\n\r\n清潔費100元/月\r\n\r\n\r\n🚬抽菸：不可以🈲\r\n\r\n🛏房內傢俱：雙人床、衣櫃、桌、椅\r\n\r\n⚙房內設備：冷氣、儲熱型熱水器\r\n\r\n🈴共用設備：wi-fi、洗衣機、飲水機\r\n\r\n🚗機車位：可停放在一樓空地\r\n\r\n🚯垃圾：集中處理\r\n\r\n🔥開伙：不可以🈲', 4800, 6, '已刊登', 1, 12, 1, 6, '獨立套房', 1, 19, 8, '2023-06-01 07:57:38', '2023-06-01 07:57:38', '3260'),
(29, '屏東縣', '長治鄉', '長治鄉德和路78號', '豪華雙人精緻大套房，大仁國際會館', '南臺灣租賃第一品牌 臺邦租賃 \r\n即日起開放112年7月起預約訂房！\r\n數量有限！敬請把握！\r\n\r\n大仁科技大學附近 大仁國際會館\r\n大同分離式冷氣．32吋液晶平面電視\r\n豪華雙人精致大套房7.2坪\r\n獨享大坪數，租金超便宜\r\n消防設備齊全!! 居住安全第一 !!\r\n\r\n1. 租金已包含水費、光纖網路及第四台有線電視費用 !\r\n2. 房內採用 32吋液晶平面電視、冰箱及大同分離式冷氣 !\r\n3. 木製系統家具(書桌、書櫃、衣櫥、床頭櫃及床板) !\r\n4. 採用儲熱型電熱水器，安全又省電 !\r\n5. 防煙隔音房門設有貓眼、防盜鍊及水平鎖 !個人獨立大陽台(附曬衣鍊) !\r\n6. 不收取公用電費 ! 租金及電費皆合法開立發票可供報稅 !\r\n7. 消防設備完善 ! (停電照明、消防水帶、滅火器、逃生方向指示、受信總機) !\r\n8. 免費室內機車停車位 ! 另有付費汽車停車位 !\r\n9. 提供免費脫水機、飲水機及付費洗衣機、烘乾機 !\r\n10. 全區錄影監控設備，進出磁卡管制! 安全有保障 !\r\n11. 專業維修服務團隊!修繕免煩惱 ! 歡迎參觀 ^^\r\n12. 事務專員服務代收發信件包裹服務 !\r\n13. 大廳提供無線網路 !\r\n14. 住戶回饋活動 !\r\n15. 垃圾由專業環保公司清運，不需等垃圾車 !\r\n16. 定期環境及水塔消毒!冷氣保養清洗 !\r\n\r\n17. 雙人套房學生優惠價為5,434元/月(半年繳價) ! \r\n      即日起開放112年7月起預約訂房！\r\n      數量有限！敬請把握！\r\n      即時問答可能無法立即回覆！請盡量直接來電預約看房時間或使用留言問答！謝謝！\r\n      深夜11點後請暫勿來電洽詢！謝謝！\r\n\r\n18. 教職員可同享學生優惠價 ! 歡迎參觀 ^^\r\n19. 房間設有獨立分表。\r\n\r\n~ 學生租屋最夯選擇!\r\n附近有便利商店、公園綠地、學校。', 5434, 12, '已刊登', 2, 12, 1, 7, '獨立套房', 5, 20, 8, '2023-06-01 08:00:54', '2023-06-01 08:00:54', '2175'),
(30, '金門縣', '金寧鄉', '金寧鄉湖南', '萬翠苑全新別墅型花園廣場套房出租', '1.一樓獨立交誼廳(15坪)附設廚房餐廳。\r\n\r\n2.專屬廣場內設汽機車遮雨棚車位。\r\n\r\n3.四週種植草皮樹木（請參閱圖片）。\r\n\r\n4.四週圍牆設有監視器，安全無虞。\r\n\r\n5.開心農場約80坪，可種植疏菜、水果、花木。\r\n\r\n6.四週視野空曠，空氣新鮮，獨棟建築。\r\n\r\n7.全新建築。   歡迎包棟承租\r\n\r\n8.近金門大學與金門鄉公所\r\n\r\n9.活動空地約150坪可使用。\r\n\r\n10.獨立電錶、水錶。\r\n附近有便利商店、傳統市場、百貨公司、公園綠地、學校、醫療機構。\r\n本房屋近湖南公車站。', 6000, 12, '已刊登', 4, 12, 4, 7, '獨立套房', 2, 21, 8, '2023-06-01 08:10:46', '2023-06-01 08:10:46', '5332'),
(32, '台中市', '太平區', '中山路一段313巷24號', '勤益科技大學親民學生套房等您預約看屋', '限學生 限學生\r\n我們是非常純樸的大家庭\r\n單純簡單平凡是我一直追求的\r\n如果學生們不想花太多在房租上\r\n3000-3500滿足你的需求\r\n\r\n既可以存到錢 也有個遮風避雨的好地方\r\n\r\n重點來了 是以房間計算哦  不是以人頭計算 就是給您這麼高的CP值\r\n\r\n離勤益科大只需10分鐘\r\n離三番街只需要5分鐘\r\n附近便利商店 超市都距離很近\r\n非常方便\r\n附近有便利商店、傳統市場、公園綠地、學校、醫療機構、夜市。', 3500, 1, '出租中', 2, 12, 1, 5, '獨立套房', 2, 16, 5, '2023-06-02 04:58:07', '2023-06-14 05:00:11', '1829'),
(33, '新竹縣', '竹東鎮', '中山路二段154巷20號', '新竹竹東小套房', '歡迎學生、上班族來租房\r\n房東人很好~~~\r\n有意請打電話', 1001, 12, '已刊登', 1, 12, 1, 10, '獨立套房', 2, 24, 13, '2023-06-02 08:30:15', '2023-06-02 08:34:58', '2557'),
(35, '新竹縣', '新埔鎮', '忠明六街29號', '中北區♥近中華夜市♥超大系統櫃♥電梯♥', '０', 6000, 12, '已刊登', 2, 3, 2, 100, '分租套房', 3, 26, 5, '2023-06-06 10:35:07', '2023-06-15 05:05:16', '7127'),
(37, '台中市', '太平區', '中山路一段', '學生宿舍', '歡迎租', 1200, 12, '閒置', 1, 12, 3, 10, '整層住家', 1, 28, 5, '2023-06-07 05:37:12', '2023-06-14 08:14:43', '6001'),
(38, '台中市', '太平區', '忠明六街29號', '勤益屋主直租全新精緻套房', 'XD', 10000, 12, '出租中', 6, 3, 2, 7, '分租套房', 7, 16, 5, '2023-06-14 07:31:42', '2023-06-15 04:55:30', '3919'),
(39, '台北市', '北投區', '忠明六街29號', '宿舍', '快來看房', 10000, 12, '已刊登', 1, 3, 3, 100, '雅房', 4, 29, 5, '2023-06-14 08:30:54', '2023-06-15 05:04:56', '5557'),
(40, '高雄市', '鼓山區', '忠明六街29號', '中北區♥近中華夜市♥超大系統櫃♥電梯♥', '歡迎學生', 1000, 6, '閒置', 1, 12, 1, 8, '雅房', 7, 30, 5, '2023-06-14 09:14:03', '2023-06-14 09:14:03', '9283');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `house_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `house_id`, `image`, `created_at`, `updated_at`) VALUES
(115, 24, '647849949fe3c.jpg', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(116, 24, '64784994aa696.jpg', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(117, 24, '64784994adc7a.jpg', '2023-06-01 07:32:36', '2023-06-01 07:32:36'),
(118, 25, '64784a4f85590.jpg', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(119, 25, '64784a4f8a86c.jpg', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(120, 25, '64784a4f92e04.jpg', '2023-06-01 07:35:43', '2023-06-01 07:35:43'),
(121, 26, '64784b362aabd.jpg', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(122, 26, '64784b362eb77.jpg', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(123, 26, '64784b3631c69.jpg', '2023-06-01 07:39:34', '2023-06-01 07:39:34'),
(124, 27, '64784dfb363f9.jpg', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(125, 27, '64784dfb44bbb.jpg', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(126, 27, '64784dfb51bbc.jpg', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(127, 27, '64784dfb5b156.jpg', '2023-06-01 07:51:23', '2023-06-01 07:51:23'),
(128, 28, '64784f7248f66.jpg', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(129, 28, '64784f724de9d.jpg', '2023-06-01 07:57:38', '2023-06-01 07:57:38'),
(130, 29, '647850362ebc5.jpg', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(131, 29, '6478503633142.jpg', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(132, 29, '64785036386ef.jpg', '2023-06-01 08:00:54', '2023-06-01 08:00:54'),
(133, 30, '64785286ee751.jpg', '2023-06-01 08:10:46', '2023-06-01 08:10:46'),
(134, 30, '64785286f1a3e.jpg', '2023-06-01 08:10:46', '2023-06-01 08:10:46'),
(135, 30, '64785287006e0.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(136, 30, '6478528703a9c.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(137, 30, '64785287067bd.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(138, 30, '6478528709b07.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(139, 30, '647852870c9cd.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(140, 30, '647852870fe77.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(141, 30, '6478528714dde.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(142, 30, '6478528717fcb.jpg', '2023-06-01 08:10:47', '2023-06-01 08:10:47'),
(149, 32, '647995e0b98b7.webp', '2023-06-02 07:10:24', '2023-06-02 07:10:24'),
(150, 32, '647995e0c587b.webp', '2023-06-02 07:10:24', '2023-06-02 07:10:24'),
(151, 32, '647995e0cd867.webp', '2023-06-02 07:10:24', '2023-06-02 07:10:24'),
(152, 33, '6479a897da53c.jpg', '2023-06-02 08:30:15', '2023-06-02 08:30:15'),
(153, 33, '6479a897de72c.jpg', '2023-06-02 08:30:15', '2023-06-02 08:30:15'),
(154, 33, '6479a897e4987.jpg', '2023-06-02 08:30:15', '2023-06-02 08:30:15'),
(155, 33, '6479a897ecb99.jpg', '2023-06-02 08:30:15', '2023-06-02 08:30:15'),
(158, 35, '647f0bdbd09ce.jpg', '2023-06-06 10:35:07', '2023-06-06 10:35:07'),
(159, 35, '647f0bdbdacb9.jpg', '2023-06-06 10:35:07', '2023-06-06 10:35:07'),
(162, 37, '64801788c13d2.jpg', '2023-06-07 05:37:12', '2023-06-07 05:37:12'),
(163, 38, '64896cde1db8c.jpg', '2023-06-14 07:31:42', '2023-06-14 07:31:42'),
(164, 39, '64897abe3dba6.jpg', '2023-06-14 08:30:54', '2023-06-14 08:30:54');

-- --------------------------------------------------------

--
-- 資料表結構 `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `owner_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `locations`
--

INSERT INTO `locations` (`id`, `owner_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '台中市', '2023-05-24 07:50:06', '2023-05-24 07:50:06'),
(16, 5, '台中', '2023-05-26 08:15:01', '2023-05-26 08:15:01'),
(17, 9, '台南市東區', '2023-06-01 07:29:45', '2023-06-01 07:29:45'),
(18, 9, '台南市安定區', '2023-06-01 07:30:01', '2023-06-01 07:30:01'),
(19, 8, '屏東縣麟洛鄉', '2023-06-01 07:55:19', '2023-06-01 07:55:19'),
(20, 8, '屏東縣長治鄉', '2023-06-01 07:57:59', '2023-06-01 07:57:59'),
(21, 8, '金門縣金寧鄉', '2023-06-01 08:06:32', '2023-06-01 08:06:32'),
(23, 12, '苗栗竹南鎮', '2023-06-02 08:10:00', '2023-06-02 08:10:00'),
(24, 13, '新竹竹東', '2023-06-02 08:26:41', '2023-06-02 08:26:41'),
(26, 5, '新竹', '2023-06-06 10:10:33', '2023-06-14 05:03:06'),
(28, 5, '台中太平', '2023-06-07 05:35:43', '2023-06-07 05:35:43'),
(29, 5, '台北', '2023-06-14 08:30:02', '2023-06-14 08:30:02'),
(30, 5, '高雄', '2023-06-14 09:11:50', '2023-06-14 09:11:50');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_23_072518_create_sessions_table', 1),
(7, '2023_02_25_120030_create_admins_table', 1),
(8, '2023_02_25_120045_create_owners_table', 1),
(9, '2023_02_25_121527_create_renters_table', 1),
(10, '2023_02_25_121529_create_system_posts_table', 1),
(11, '2023_02_25_121705_create_locations_table', 1),
(12, '2023_02_25_122148_create_posts_table', 1),
(13, '2023_02_25_122955_create_houses_table', 1),
(14, '2023_02_25_122960_create_signatories_table', 1),
(15, '2023_02_25_122963_create_contracts_table', 1),
(16, '2023_02_25_123144_create_images_table', 1),
(17, '2023_02_25_123306_create_features_table', 1),
(18, '2023_02_25_123310_create_furnishings_table', 1),
(19, '2023_02_25_123503_create_repairs_table', 1),
(20, '2023_02_25_123510_create_repair_replies_table', 1),
(21, '2023_02_25_123900_create_expenses_table', 1),
(22, '2023_02_25_123950_create_payments_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `owners`
--

CREATE TABLE `owners` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `owners`
--

INSERT INTO `owners` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-24 06:58:01', '2023-05-24 06:58:01'),
(2, 2, '2023-05-24 07:02:43', '2023-05-24 07:02:43'),
(5, 5, '2023-05-25 07:42:28', '2023-05-25 07:42:28'),
(6, 6, '2023-05-26 05:34:29', '2023-05-26 05:34:29'),
(8, 8, '2023-05-26 08:10:12', '2023-05-26 08:10:12'),
(9, 9, '2023-05-31 07:11:13', '2023-05-31 07:11:13'),
(10, 10, '2023-05-31 08:09:53', '2023-05-31 08:09:53'),
(11, 11, '2023-06-02 02:19:57', '2023-06-02 02:19:57'),
(12, 12, '2023-06-02 08:09:29', '2023-06-02 08:09:29'),
(13, 13, '2023-06-02 08:26:17', '2023-06-02 08:26:17'),
(14, 14, '2023-06-03 12:23:07', '2023-06-03 12:23:07');

-- --------------------------------------------------------

--
-- 資料表結構 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `renter_id` bigint UNSIGNED NOT NULL,
  `expense_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `owner_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posts`
--

INSERT INTO `posts` (`id`, `location_id`, `owner_id`, `title`, `content`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '❤️貼心小提醒❤️', '對於套房的任何疑問，建議撥打電話或加Line詢問，我會在第一時間回覆您\r\n\r\n＊手機：0958251147\r\n＊Line：q0958251147\r\n成交時需收您租金50%作為服務費用', '2023-05-24', '2023-05-24 08:47:02', '2023-05-24 08:47:40'),
(5, 16, 5, '停水通知', '2023/5/26 10:00~21:00暫時停水', '2023-05-26', '2023-05-26 08:42:44', '2023-05-26 08:42:44'),
(6, 16, 5, '道路維修', '附近道路在維修', '2023-06-02', '2023-06-02 02:38:33', '2023-06-02 02:38:33'),
(7, 16, 5, '停電通知', '3號下午要停電4小時', '2023-06-02', '2023-06-02 06:54:38', '2023-06-02 06:54:38'),
(11, 28, 5, '停水', '停水', '2023-06-14', '2023-06-14 03:52:23', '2023-06-14 03:52:23'),
(12, 29, 5, '停水通知', '12:00', '2023-06-14', '2023-06-14 08:36:19', '2023-06-14 08:36:19');

-- --------------------------------------------------------

--
-- 資料表結構 `renters`
--

CREATE TABLE `renters` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `renters`
--

INSERT INTO `renters` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-24 06:58:01', '2023-05-24 06:58:01'),
(2, 2, '2023-05-24 07:02:43', '2023-05-24 07:02:43'),
(5, 5, '2023-05-25 07:42:28', '2023-05-25 07:42:28'),
(6, 6, '2023-05-26 05:34:29', '2023-05-26 05:34:29'),
(8, 8, '2023-05-26 08:10:12', '2023-05-26 08:10:12'),
(9, 9, '2023-05-31 07:11:14', '2023-05-31 07:11:14'),
(10, 10, '2023-05-31 08:09:53', '2023-05-31 08:09:53'),
(11, 11, '2023-06-02 02:19:57', '2023-06-02 02:19:57'),
(12, 12, '2023-06-02 08:09:29', '2023-06-02 08:09:29'),
(13, 13, '2023-06-02 08:26:17', '2023-06-02 08:26:17'),
(14, 14, '2023-06-03 12:23:07', '2023-06-03 12:23:07');

-- --------------------------------------------------------

--
-- 資料表結構 `repairs`
--

CREATE TABLE `repairs` (
  `id` bigint UNSIGNED NOT NULL,
  `renter_id` bigint UNSIGNED NOT NULL,
  `house_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `repairs`
--

INSERT INTO `repairs` (`id`, `renter_id`, `house_id`, `title`, `status`, `content`, `date`, `created_at`, `updated_at`) VALUES
(23, 8, 37, '熱水器', '已維修', '熱水器無法調節水溫', NULL, '2023-06-07 05:46:45', '2023-06-07 05:47:57'),
(24, 9, 37, '電燈故障', '已維修', '電燈故障不會亮', NULL, '2023-06-14 02:28:31', '2023-06-14 02:32:00'),
(25, 9, 37, '電燈故障', '已維修', '電燈不亮', NULL, '2023-06-14 03:48:27', '2023-06-14 03:50:10'),
(26, 9, 32, '電燈故障', '未維修', '不會亮', NULL, '2023-06-14 04:53:17', '2023-06-14 04:53:17'),
(27, 9, 37, '電燈故障', '已維修', '電燈故障', NULL, '2023-06-14 05:25:52', '2023-06-14 05:26:30'),
(28, 9, 37, '電燈故障', '未維修', '電燈變暗', NULL, '2023-06-14 05:41:35', '2023-06-14 05:41:35'),
(29, 9, 32, '熱水器不熱', '未維修', '好冷喔', NULL, '2023-06-14 06:11:24', '2023-06-14 06:11:24'),
(30, 9, 37, '天花板破掉', '未維修', '我好害怕', NULL, '2023-06-14 06:41:05', '2023-06-14 06:41:05'),
(31, 9, 35, '電燈故障', '未維修', '一閃一閃亮晶晶', NULL, '2023-06-14 07:08:36', '2023-06-14 07:08:36'),
(33, 9, 32, '熱水器不熱', '未維修', '好冷', NULL, '2023-06-14 07:27:56', '2023-06-14 07:27:56'),
(34, 9, 39, '電燈故障', '維修中', '不會亮', NULL, '2023-06-14 08:33:03', '2023-06-14 08:33:59'),
(35, 9, 32, '電腦沒網路', '未維修', '幫我查看網路是否有問題', NULL, '2023-06-15 02:32:18', '2023-06-15 02:32:18'),
(36, 9, 32, '熱水器不熱', '未維修', '12123', NULL, '2023-06-15 04:39:29', '2023-06-15 04:39:29'),
(37, 9, 32, '電燈故障', '未維修', '邀修', NULL, '2023-06-15 04:51:57', '2023-06-15 04:51:57'),
(38, 9, 32, '電燈故障', '未維修', 'c8 8c', NULL, '2023-06-15 07:46:34', '2023-06-15 07:46:34');

-- --------------------------------------------------------

--
-- 資料表結構 `repair_replies`
--

CREATE TABLE `repair_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `repair_id` bigint UNSIGNED NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `repair_replies`
--

INSERT INTO `repair_replies` (`id`, `repair_id`, `content`, `created_at`, `updated_at`) VALUES
(6, 23, '襖晚點案', '2023-06-07 05:47:39', '2023-06-07 05:47:39'),
(7, 24, '好', '2023-06-14 02:29:02', '2023-06-14 02:29:02'),
(8, 25, '下午維修', '2023-06-14 03:49:31', '2023-06-14 03:49:31'),
(9, 26, '喔喔好', '2023-06-14 04:53:43', '2023-06-14 04:53:43'),
(10, 31, '你在公三', '2023-06-14 07:09:23', '2023-06-14 07:09:23'),
(11, 29, '好好襖', '2023-06-14 07:16:05', '2023-06-14 07:16:05'),
(12, 33, '好 馬上去', '2023-06-14 07:28:26', '2023-06-14 07:28:26'),
(13, 34, '明天下午會去修', '2023-06-14 08:33:50', '2023-06-14 08:33:50'),
(14, 35, '好', '2023-06-15 02:33:07', '2023-06-15 02:33:07'),
(15, 36, 'cl3', '2023-06-15 04:39:52', '2023-06-15 04:39:52'),
(16, 37, '好', '2023-06-15 04:52:27', '2023-06-15 04:52:27'),
(17, 38, '晚點修', '2023-06-15 07:47:03', '2023-06-15 07:47:03');

-- --------------------------------------------------------

--
-- 資料表結構 `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6D1Dg9Vupu35QLNxmmZvivrGRjAkIZnVhGWd1hR8', 5, '140.128.80.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMVUydEhGMVpkajVkYW9UVENobFF1N2dGZHpBbU5GcHpHTHFsazh6dyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xNDAuMTI4LjgwLjE5OTo4MDgwL3VzZXJzL293bmVycy81PzE2PSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7czoxMzoic2VhcmNoX3Jlc3VsdCI7TzozOToiSWxsdW1pbmF0ZVxEYXRhYmFzZVxFbG9xdWVudFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjk6e2k6MDtPOjE2OiJBcHBcTW9kZWxzXEhvdXNlIjoyOTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo2OiJob3VzZXMiO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YToyMDp7czoyOiJpZCI7aToyNDtzOjY6ImNvdW50eSI7czo5OiLlj7DljZfluIIiO3M6NDoiYXJlYSI7czo2OiLmnbHljYAiO3M6NzoiYWRkcmVzcyI7czoxNToi5p2x5Y2A5Lit6I+v6LevIjtzOjQ6Im5hbWUiO3M6NTY6IuadseWNgOmalOWjgeawuOW6t+S4reiPr+i3r+i/keWkouaZguS7oyrlj6/np5/ph5Hoo5zosrwqIjtzOjk6ImludHJvZHVjZSI7czo2MzY6IuadseWNgOmalOWjgSDkuK3oj6/ot6/lsI/mnbHot6/lj6Mg5rC45bq35Lit6I+v6Lev6bql55W25Yue5peBIH7llq7kurrluorlhKros6rlpZfmiL8qXl9eKg0KDQrmnJ/nubPljYrlubTvvJrmnIjnp581NzAw5YWDL+aciOaciOe5s++8muaciOennzYyMDDlhYMv5pyIDQoo5ZCI57SE5pyA55+t5LiA5bm044CB5oq86YeR5LiA5YCL5pyIKQ0KDQrnp5/ph5HljIXlkKvvvJrntrLot68o542o56uLSVAu5LiN5LqS55u45bmy5pO+KeOAgeesrOWbm+WPsCAgKumbu+iyu++8muWFqOW5tOS4gOW6pjUuNS/lhYMNCg0KKuiqoOWvpue0jeeohe+8jOenn+mHkeWdh+mWi+eri+eZvOelqO+8jOWPr+S7peWgseeohe+8jOWPr+S7peeUs+iri+enn+mHkeijnOiyvOOAgiANCiAgDQoo5pyf57mz5Y2K5bm06ICF77yM5aaC5Lit6YCU6Kej57SE77yM56ef6YeR5L6d5pyI57mz6KiI566X77yM5aSa55qE5pyJ6YCA6YKEKSANCg0KKirmspLmnInnrqHnkIbosrsu5rKS5pyJ5YWs5YWx6Zu76LK7Luaykuaciembu+air+iyu+aykuacieapn+i7iuWBnOi7iuiyuyDmiJblhbbku5bmlLbosrsNCg0KKirmr4/mnIjlg4XpnIDmlK/ku5jmiL/np5/lj4rmsLQu6Zu76LK744CCDQoNCuS4jemZkOeUt+Wls+OAgeS4jeeUqOiIh+aIv+adseWQjOS9jyI7czo3OiJyZW50YWxzIjtpOjU3MDA7czo4OiJpbnRlcnZhbCI7aToxO3M6MTI6ImxlYXNlX3N0YXR1cyI7czo2OiLplpLnva4iO3M6MTA6Im51bV9yZW50ZXIiO2k6MTtzOjEwOiJtaW5fcGVyaW9kIjtpOjEyO3M6NzoicGF0dGVybiI7aToxO3M6NDoic2l6ZSI7aTo1O3M6NDoidHlwZSI7czoxMjoi542o56uL5aWX5oi/IjtzOjU6ImZsb29yIjtpOjc7czoxMToibG9jYXRpb25faWQiO2k6MTc7czo4OiJvd25lcl9pZCI7aTo5O3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjMtMDYtMDEgMTU6MzI6MzYiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjMtMDYtMDcgMTE6Mjc6MDMiO3M6MTU6Imludml0YXRpb25fY29kZSI7czo0OiIzMjc3Ijt9czoxMToiACoAb3JpZ2luYWwiO2E6MjA6e3M6MjoiaWQiO2k6MjQ7czo2OiJjb3VudHkiO3M6OToi5Y+w5Y2X5biCIjtzOjQ6ImFyZWEiO3M6Njoi5p2x5Y2AIjtzOjc6ImFkZHJlc3MiO3M6MTU6IuadseWNgOS4reiPr+i3ryI7czo0OiJuYW1lIjtzOjU2OiLmnbHljYDpmpTlo4HmsLjlurfkuK3oj6/ot6/ov5HlpKLmmYLku6Mq5Y+v56ef6YeR6KOc6LK8KiI7czo5OiJpbnRyb2R1Y2UiO3M6NjM2OiLmnbHljYDpmpTlo4Eg5Lit6I+v6Lev5bCP5p2x6Lev5Y+jIOawuOW6t+S4reiPr+i3r+m6peeVtuWLnuaXgSB+5Zau5Lq65bqK5YSq6LOq5aWX5oi/Kl5fXioNCg0K5pyf57mz5Y2K5bm077ya5pyI56efNTcwMOWFgy/mnIjmnIjnubPvvJrmnIjnp582MjAw5YWDL+aciA0KKOWQiOe0hOacgOefreS4gOW5tOOAgeaKvOmHkeS4gOWAi+aciCkNCg0K56ef6YeR5YyF5ZCr77ya57ay6LevKOeNqOeri0lQLuS4jeS6kuebuOW5suaTvinjgIHnrKzlm5vlj7AgICrpm7vosrvvvJrlhajlubTkuIDluqY1LjUv5YWDDQoNCiroqqDlr6bntI3nqIXvvIznp5/ph5HlnYfplovnq4vnmbznpajvvIzlj6/ku6XloLHnqIXvvIzlj6/ku6XnlLPoq4vnp5/ph5Hoo5zosrzjgIIgDQogIA0KKOacn+e5s+WNiuW5tOiAhe+8jOWmguS4remAlOino+e0hO+8jOenn+mHkeS+neaciOe5s+ioiOeul++8jOWkmueahOaciemAgOmChCkgDQoNCioq5rKS5pyJ566h55CG6LK7LuaykuacieWFrOWFsembu+iyuy7mspLmnInpm7vmoq/osrvmspLmnInmqZ/o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5Y+w5Y2X5biCIjtzOjQ6ImFyZWEiO3M6Njoi5p2x5Y2AIjtzOjc6ImFkZHJlc3MiO3M6MjE6IuadseWNgOijleixkOihlzI0MuW3tyI7czo0OiJuYW1lIjtzOjU0OiLov5HmiJDlpKcu5Y2X57Sh5ZWG5ZyIL+S6pOmAmuS+v+WIqV/lhKros6rlrbjnlJ/lpZfmiL8iO3M6OToiaW50cm9kdWNlIjtzOjEwMzY6IuKYheWll+aIv+eJueiJsuKYhQ0KDQril47lrqTlhaflsIjlsazmqZ/ou4rlgZzou4rkvY3jgIINCuKXjuWeg+WcvuWIhumhnumbhuS4reiZleeQhuOAgg0K4peO6KGb5rW055qG6ZaL56qX44CCDQril47oh6rnhLbmjqHlhYnjgIHpgJrpoqjmtrzniL3jgIINCuKXjueUn+a0u+OAgeS8kemWkuOAgemGq+eZguOAgeWtuOWNgOeSsOe5nuOAgg0KDQrimIXlhazlhbHoqK3lgpnimIUNCg0K6aCC5qiT5pus6KKr5Y2A44CB5rSX6KGj5qmf44CB6ISr5rC05qmf44CB54OY6KGj5qmf44CB6aOy5rC05qmf44CCDQoNCg0K4piF5aWX5oi/6Kit5YKZ4piFDQoNCumZhOeNqOeri+etkuW6iuWiiuOAgeabuOahjOOAgeakheWtkOOAgeiho+arg+OAgeeql+ewvuOAgeWGt+awo+apn+OAgeWGsOeuseOAgg0K5pyJV0lGSe+8m+avj+mWk+Wll+aIv+e2sui3r+eNqOeri++8jOS4jeWFsee3muOAgg0KDQrvvIrpm7voppblj6/orbANCg0K4pazIOawtOiyuzEwMOWFgy/mnIjvvJvpm7vosrvkvp3pjLboqIjosrvjgIINCg0K4piF5ZGo6YKK5qmf6IO94piFDQoNCuS6pOmAmu+8muWPsOWNl+eBq+i7iuermQ0K5biC5aC077ya5bSH6Kqo5biC5aC0DQrotoXllYbvvJo3LTEx44CB5YWo5a6244CB6JCK54i+5a+M44CB5YWo6IGv44CB5a+26ZuF44CB5bGI6Iej5rCPDQrllYblnIjvvJrmiJDlpKfllYblnIjjgIHlpKLmmYLku6PllYblnIgNCuWFrOWcku+8muadseWvp+mBi+WLleWFrOWckg0K6Yar55mC6Kit5pa977ya5oiQ5aSn6Yar6Zmi44CB5paw5qiT6Yar6ZmiDQoNCuKcqOatoei/juS+humbu+mgkOe0hOeci+aIv+KcqA0KDQrwn5Oz6YCj57Wh6Zu76Kmx77yaMDkyMi01MjIxNjMNCvCfk7NMSU5FIElE77yaMDkyMjUzMjE2Mw0K6KuL55u05pKl5omL5qmf6Kmi5ZWP5oiW5YqgTElORemDveWPr+S7pe+8gQ0K6ZmE6L+R5pyJ5L6/5Yip5ZWG5bqX44CB5YKz57Wx5biC5aC044CB55m+6LKo5YWs5Y+444CB5YWs5ZyS57ag5Zyw44CB5a245qCh44CB6Yar55mC5qmf5qeL44CB5aSc5biC44CCDQrmnKzmiL/lsYvov5Hlj7DljZfngavou4rnq5njgIIiO3M6NzoicmVudGFscyI7aTo0ODAwO3M6ODoiaW50ZXJ2YWwiO2k6MTI7czoxMjoibGVhc2Vfc3RhdHVzIjtzOjk6IuW3suWIiueZuyI7czoxMDoibnVtX3JlbnRlciI7aToxO3M6MTA6Im1pbl9wZXJpb2QiO2k6MTI7czo3OiJwYXR0ZXJuIjtpOjE7czo0OiJzaXplIjtpOjU7czo0OiJ0eXBlIjtzOjEyOiLnjajnq4vlpZfmiL8iO3M6NToiZmxvb3IiO2k6NTtzOjExOiJsb2NhdGlvbl9pZCI7aToxNztzOjg6Im93bmVyX2lkIjtpOjk7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMy0wNi0wMSAxNTozNTo0MyI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMy0wNi0wMSAxNTozNTo0MyI7czoxNToiaW52aXRhdGlvbl9jb2RlIjtzOjQ6IjQ4OTQiO31zOjExOiIAKgBvcmlnaW5hbCI7YToyMDp7czoyOiJpZCI7aToyNTtzOjY6ImNvdW50eSI7czo5OiLlj7DljZfluIIiO3M6NDoiYXJlYSI7czo2OiLmnbHljYAiO3M6NzoiYWRkcmVzcyI7czoyMToi5p2x5Y2A6KOV6LGQ6KGXMjQy5be3IjtzOjQ6Im5hbWUiO3M6NTQ6Iui/keaIkOWkpy7ljZfntKHllYblnIgv5Lqk6YCa5L6/5YipX+WEquizquWtuOeUn+Wll+aIvyI7czo5OiJpbnRyb2R1Y2UiO3M6MTAzNjoi4piF5aWX5oi/54m56Imy4piFDQoNCuKXjuWupOWFp+WwiOWxrOapn+i7iuWBnOi7iuS9jeOAgg0K4peO5Z6D5Zy+5YiG6aGe6ZuG5Lit6JmV55CG44CCDQril47ooZvmtbTnmobplovnqpfjgIINCuKXjuiHqueEtuaOoeWFieOAgemAmumiqOa2vOeIveOAgg0K4peO55Sf5rS744CB5LyR6ZaS44CB6Yar55mC44CB5a245Y2A55Kw57me44CCDQoNCuKYheWFrOWFseioreWCmeKYhQ0KDQrpoILmqJPmm6zooqvljYDjgIHmtJfooaPmqZ/jgIHohKvmsLTmqZ/jgIHng5jooaPmqZ/jgIHpo7LmsLTmqZ/jgIINCg0KDQrimIXlpZfmiL/oqK3lgpnimIUNCg0K6ZmE542o56uL562S5bqK5aKK44CB5pu45qGM44CB5qSF5a2Q44CB6KGj5quD44CB56qX57C+44CB5Ya35rCj5qmf44CB5Yaw566x44CCDQrmnIlXSUZJ77yb5q+P6ZaT5aWX5oi/57ay6Lev542o56uL77yM5LiN5YWx57ea44CCDQoNCu+8iumbu+imluWPr+itsA0KDQrilrMg5rC06LK7MTAw5YWDL+aciO+8m+mbu+iyu+S+nemMtuioiOiyu+OAgg0KDQrimIXlkajpgormqZ/og73imIUNCg0K5Lqk6YCa77ya5Y+w5Y2X54Gr6LuK56uZDQrluILloLTvvJrltIfoqqjluILloLQNCui2heWVhu+8mjctMTHjgIHlhajlrrbjgIHokIrniL7lr4zjgIHlhajoga/jgIHlr7bpm4XjgIHlsYjoh6PmsI8NCuWVhuWciO+8muaIkOWkp+WVhuWciOOAgeWkouaZguS7o+WVhuWciA0K5YWs5ZyS77ya5p2x5a+n6YGL5YuV5YWs5ZySDQrphqvnmYLoqK3mlr3vvJrmiJDlpKfphqvpmaLjgIHmlrDmqJPphqvpmaINCg0K4pyo5q2h6L+O5L6G6Zu76aCQ57SE55yL5oi/4pyoDQoNCvCfk7PpgKPntaHpm7voqbHvvJowOTIyLTUyMjE2Mw0K8J+Ts0xJTkUgSUTvvJowOTIyNTMyMTYzDQroq4vnm7TmkqXmiYvmqZ/oqaLllY/miJbliqBM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ZXMiO2E6MjA6e3M6MjoiaWQiO2k6MjY7czo2OiJjb3VudHkiO3M6OToi5Y+w5Y2X5biCIjtzOjQ6ImFyZWEiO3M6OToi5a6J5a6a5Y2AIjtzOjc6ImFkZHJlc3MiO3M6MTU6IuWuieWumuWNgOaWsOWQiSI7czo0OiJuYW1lIjtzOjU1OiLphLDov5HljZfnp5Hlj7DnqY3pm7sv5a6J5a6a5Y2A5paw5ZCJ6YCP5aSp6LuK5bqr5Yil5aKFIjtzOjk6ImludHJvZHVjZSI7czoxMDEzOiLwn5Sd5oi/5bGL5Ye656ef6LOH6KiK8J+PoOKEue+4jw0K8J+VtPCfj7vlvLfpkL/ku6Pnp5/ku6PnrqHlhazlj7jwn5W08J+Puw0KDQrjgIzlnLDlnYDjgI3vvJrlronlrprljYAg5paw5ZCJDQrjgIzmiL/lnovjgI0gOiAg6LuK5bqr6YCP5aSpLzTmiL8y5buzM+ihmzTpmb3lj7ANCuOAjOWdquaVuOOAje+8mjUw5Z2qDQrjgIznp5/ph5HjgI3vvJoyNjUwMC/mnIgNCuOAjOaKvOmHkeOAje+8muWFqeWAi+aciA0K44CM5rC06Zu744CN77ya5Y+w5rC05Y+w6Zu7DQrjgIzlr7XnianjgI3vvJrkuI3lj6/wn5mF4oCN4pmC77iPDQrjgIzou4rkvY3jgI3vvJrou4rluqvwn4mR77iP5YGcDQoNCvCfjJ/kuIDljaHnmq7nrrHljbPlj6/lhaXkvY/wn4yfDQrwn4yf5YKi5L+x5a626Zu75YWo5YW35YKZ8J+Mnw0K8J+Mn+mEsOi/keWNl+enke+8jOaWsOWpmuWkq+Wmu+OAgeaDheS+tuOAgeWwj+WutuW6remDveWQiOmBqfCfjJ8NCg0K8J+areWFqOajn+emgeiPuPCfmq3lhajmo5/npoHoj7gNCuKAvO+4j+WFqOajn+emgeWvteKAvO+4j+WFqOajn+emgeWvteKAvO+4j+WFqOajn+emgeWvteKAvO+4jw0KDQrinKjmiL/mnbHkv53mnInmnIDlvozlh7rnp5/msbrlrprmrIrinKgNCg0KLQ0K5piv5LiN5piv6YO95om+5LiN5Yiw5Zac5q2h55qE5oi/5a2Q8J+PoA0K54S25b6M5aW95LiN5a655piT55yL5Yiw5Zac5q2h55qE5oi/5a2QDQrnuL3mmK/mgJ3ogIPkuIDkuIvvvIzpmpTlpKnlsLHooqvnp5/otbDkuobwn5itDQrwn5Sl54eS54eZ54eZ55qE54mp5Lu257i95piv5ZK75ZK75ZK755qE8J+UpQ0KLQ0K5omA5Lul6LaV5b+r5Yqg6LO057SE8J+RgOaIv+S6hkAwODNmcG5teQ0K6YKE5Zyo562J5LuA6bq84p2X77iPDQrmnInpl5zmlrznianku7bku7vkvZXllY/poYzpg73lj6/ku6XoqaLllY/lk6binZfvuI8NCumZhOi/keacieS+v+WIqeWVhuW6l+OAgeWCs+e1seW4guWgtOOAgeeZvuiyqOWFrOWPuOOAgeWFrOWckue2oOWcsOOAgeWtuOagoeOAgemGq+eZguapn+ani+OAgeWknOW4guOAgiI7czo3OiJyZW50YWxzIjtpOjI2NTAwO3M6ODoiaW50ZXJ2YWwiO2k6MTtzOjEyOiJsZWFzZV9zdGF0dXMiO3M6OToi5bey5YiK55m7IjtzOjEwOiJudW1fcmVudGVyIjtpOjQ7czoxMDoibWluX3BlcmlvZCI7aToxMjtzOjc6InBhdHRlcm4iO2k6NDtzOjQ6InNpemUiO2k6NTA7czo0OiJ0eXBlIjtzOjEyOiLnjajnq4vlpZfmiL8iO3M6NToiZmxvb3IiO2k6MztzOjExOiJsb2NhdGlvbl9pZCI7aToxODtzOjg6Im93bmVyX2lkIjtpOjk7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMy0wNi0wMSAxNTozOTozNCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMy0wNi0wMSAxNTozOTozNCI7czoxNToiaW52aXRhdGlvbl9jb2RlIjtzOjQ6IjIyMjEiO31zOjExOiIAKgBvcmlnaW5hbCI7YToyMDp7czoyOiJpZCI7aToyNjtzOjY6ImNvdW50eSI7czo5OiLlj7DljZfluIIiO3M6NDoiYXJlYSI7czo5OiLlronlrprljYAiO3M6NzoiYWRkcmVzcyI7czoxNToi5a6J5a6a5Y2A5paw5ZCJIjtzOjQ6Im5hbWUiO3M6NTU6IumEsOi/keWNl+enkeWPsOepjembuy/lronlrprljYDmlrDlkInpgI/lpKnou4rluqvliKXlooUiO3M6OToiaW50cm9kdWNlIjtzOjEwMTM6IvCflJ3miL/lsYvlh7rnp5/os4foqIrwn4+g4oS577iPDQrwn5W08J+Pu+W8t+mQv+S7o+enn+S7o+euoeWFrOWPuPCflbTwn4+7DQoNCuOAjOWcsOWdgOOAje+8muWuieWumuWNgCDmlrDlkIkNCuOAjOaIv+Wei+OAjSA6ICDou4rluqvpgI/lpKkvNOaIvzLlu7Mz6KGbNOmZveWPsA0K44CM5Z2q5pW444CN77yaNTDlnaoNCuOAjOenn+mHkeOAje+8mjI2NTAwL+aciA0K44CM5oq86YeR44CN77ya5YWp5YCL5pyIDQrjgIzmsLTpm7vjgI3vvJrlj7DmsLTlj7Dpm7sNCuOAjOWvteeJqeOAje+8muS4jeWPr/CfmYXigI3imYLvuI8NCuOAjOi7iuS9jeOAje+8mui7iuW6q/CfiZHvuI/lgZwNCg0K8J+Mn+S4gOWNoeearueuseWNs+WPr+WFpeS9j/CfjJ8NCvCfjJ/lgqLkv7Hlrrbpm7vlhajlhbflgpnwn4yfDQrwn4yf6YSw6L+R5Y2X56eR77yM5paw5ama5aSr5aa744CB5oOF5L6244CB5bCP5a625bqt6YO95ZCI6YGp8J+Mnw0KDQrwn5qt5YWo5qOf56aB6I+48J+areWFqOajn+emgeiPuA0K4oC877iP5YWo5qOf56aB5a+14oC877iP5YWo5qOf56aB5a+14oC877iP5YWo5qOf56aB5a+14oC877iPDQoNCuKcqOaIv+adseS/neacieacgOW+jOWHuuenn+axuuWumuasiuKcqA0KDQotDQrmmK/kuI3mmK/pg73mib7kuI3liLDllpzmraHnmoTmiL/lrZDwn4+gDQrnhLblvozlpb3kuI3lrrnmmJPnnIvliLDllpzmraHnmoTmiL/lrZANCue4veaYr+aAneiAg+S4gOS4i++8jOmalOWkqeWwseiiq+enn+i1sOS6hvCfmK0NCvCflKXnh5Lnh5nnh5nnmoTnianku7bnuL3mmK/lkrvlkrvlkrvnmoTwn5SlDQotDQrmiYDku6XotpXlv6vliqDos7TntITwn5GA5oi/5LqGQDA4M2Zwbm15DQrpgoTlnKjnrYnku4DpurzinZfvuI8NCuaciemXnOaWvOeJ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MjA6e3M6MjoiaWQiO2k6Mjg7czo2OiJjb3VudHkiO3M6OToi5bGP5p2x57ijIjtzOjQ6ImFyZWEiO3M6OToi6bqf5rSb6YSJIjtzOjc6ImFkZHJlc3MiO3M6MjQ6Ium6n+a0m+mEieS4reWxsei3rzY3NeiZnyI7czo0OiJuYW1lIjtzOjUwOiLpup/mtJvkuK3lsbHmjqHlhYnkuIDmqJPlpZfov5HlsY/lpKflnIsz8J+TnuaEm+eqqSI7czo5OiJpbnRyb2R1Y2UiO3M6OTMwOiLnhKHku7Lku4vosrvvvIHnhKHku7Lku4vosrvvvIHnhKHku7Lku4vosrvvvIENCg0K4peP4peP4peP4peP4peP4peP4peP54m56Imy5o+P6L+w4peP4peP4peP4peP4peP4peP4pePDQoNCuS4gOaok+Wll+aIvyDlhY3niKzmqJPmoq8g6LaF5pa55L6/DQoNCuavj+aIv+Wdh+mFjeacieS4gOWAi+WEsueGseW8j+eGseawtOWZqA0KDQrov5HnnIHpgZMxIOWci+mBkzMg5Lqk6YCa5pa55L6/IOWbm+mAmuWFq+mBlA0KDQrotbDot6/mlaPmraXkuIrlrbgg5bGP5p2x5aSn5a245bGP5ZWG5qCh5Y2AIC8g5rCR55Sf5a625ZWGIC8g6bqf5rSb5ZyL5bCPIOWPquimgTEy5YiG6ZCYICgx5YWs6YeM5YWnKQ0KDQrnp5/ph5HlkKvmsLTosrsgV2ktRmkg5b6I5YiS566XDQoNCui/keawkeeUn+i3r+eUn+a0u+WciCDpuqXnlbbli54g6L+35YWL5aSPIDctMTEg5YWo5a62Li4uIOWVhuWutuael+eriyDnlJ/mtLvlvohjaGlsbO+9ng0KDQrwn5K08J+StOawtOiyu++8muenn+mHkeWMheWQqw0KDQrwn5SM8J+UjOmbu+iyu++8mueNqOeri+mbu+ihqO+8jOWkj+Wto+S4gOW6pjUuNeWFgyDvvIzpnZ7lpI/lraM15YWDDQoNCui7iuS9jeennzUwMOWFgy/mnIggIA0KDQrlhazpm7vosrsxMDDlhYMv5pyIICANCg0K5riF5r2U6LK7MTAw5YWDL+aciA0KDQoNCvCfmqzmir3oj7jvvJrkuI3lj6/ku6Xwn4iyDQoNCvCfm4/miL/lhaflgqLkv7HvvJrpm5nkurrluorjgIHooaPmq4PjgIHmoYzjgIHmpIUNCg0K4pqZ5oi/5YWn6Kit5YKZ77ya5Ya35rCj44CB5YSy54ax5Z6L54ax5rC05ZmoDQoNCvCfiLTlhbHnlKjoqK3lgpnvvJp3aS1maeOAgea0l+iho+apn+OAgemjsuawtOapnw0KDQrwn5qX5qmf6LuK5L2N77ya5Y+v5YGc5pS+5Zyo5LiA5qiT56m65ZywDQoNCvCfmq/lnoPlnL7vvJrpm4bkuK3omZXnkIYNCg0K8J+UpemWi+S8me+8muS4jeWPr+S7pfCfiLIiO3M6NzoicmVudGFscyI7aTo0ODAwO3M6ODoiaW50ZXJ2YWwiO2k6NjtzOjEyOiJsZWFzZV9zdGF0dXMiO3M6OToi5bey5YiK55m7IjtzOjEwOiJudW1fcmVudGVyIjtpOjE7czoxMDoibWluX3BlcmlvZCI7aToxMjtzOjc6InBhdHRlcm4iO2k6MTtzOjQ6InNpemUiO2k6NjtzOjQ6InR5cGUiO3M6MTI6IueNqOeri+Wll+aIvyI7czo1OiJmbG9vciI7aToxO3M6MTE6ImxvY2F0aW9uX2lkIjtpOjE5O3M6ODoib3duZXJfaWQiO2k6ODtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIzLTA2LTAxIDE1OjU3OjM4IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIzLTA2LTAxIDE1OjU3OjM4IjtzOjE1OiJpbnZpdGF0aW9uX2NvZGUiO3M6NDoiMzI2MCI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjIwOntzOjI6ImlkIjtpOjI4O3M6NjoiY291bnR5IjtzOjk6IuWxj+adsee4oyI7czo0OiJhcmVhIjtzOjk6Ium6n+a0m+mEiSI7czo3OiJhZGRyZXNzIjtzOjI0OiLpup/mtJvphInkuK3lsbHot682NzXomZ8iO3M6NDoibmFtZSI7czo1MDoi6bqf5rSb5Lit5bGx5o6h5YWJ5LiA5qiT5aWX6L+R5bGP5aSn5ZyLM/Cfk57mhJvnqqkiO3M6OToiaW50cm9kdWNlIjtzOjkzMDoi54Sh5Luy5LuL6LK777yB54Sh5Luy5LuL6LK777yB54Sh5Luy5LuL6LK777yBDQoNCuKXj+KXj+KXj+KXj+KXj+KXj+KXj+eJueiJsuaPj+i/sOKXj+KXj+KXj+KXj+KXj+KXj+KXjw0KDQrkuIDmqJPlpZfmiL8g5YWN54is5qiT5qKvIOi2heaWueS+vw0KDQrmr4/miL/lnYfphY3mnInkuIDlgIvlhLLnhrHlvI/nhrHmsLTlmagNCg0K6L+R55yB6YGTMSDlnIvpgZMzIOS6pOmAmuaWueS+vyDlm5vpgJrlhavpgZQNCg0K6LWw6Lev5pWj5q2l5LiK5a24IOWxj+adseWkp+WtuOWxj+WVhuagoeWNgCAvIOawkeeUn+WutuWVhiAvIOm6n+a0m+Wci+WwjyDlj6ropoExMuWIhumQmCAoMeWFrOmHjOWFpykNCg0K56ef6YeR5ZCr5rC06LK7IFdpLUZpIOW+iOWIkueulw0KDQrov5HmsJHnlJ/ot6/nlJ/mtLvlnIgg6bql55W25YueIOi/t+WFi+WkjyA3LTExIOWFqOWuti4uLiDllYblrrbmnpfnq4sg55Sf5rS75b6IY2hpbGzvvZ4NCg0K8J+StPCfkrTmsLTosrvvvJrnp5/ph5HljIXlkKsNCg0K8J+UjPCflIzpm7vosrvvvJrnjajnq4vpm7vooajvvIzlpI/lraPkuIDluqY1LjXlhYMg77yM6Z2e5aSP5a2jNeWFgw0KDQrou4rkvY3np581MDDlhYMv5pyIICANCg0K5YWs6Zu76LK7MTAw5YWDL+aciCAgDQoNCua4hea9lOiyuzEwMOWFgy/mnIgNCg0KDQrwn5qs5oq96I+477ya5LiN5Y+v5Lul8J+Isg0KDQrwn5uP5oi/5YWn5YKi5L+x77ya6ZuZ5Lq65bqK44CB6KGj5quD44CB5qGM44CB5qSFDQoNCuKameaIv+WFp+ioreWCme+8muWGt+awo+OAgeWEsueGseWei+eGseawtOWZqA0KDQrwn4i05YWx55So6Kit5YKZ77yad2ktZmnjgIHmtJfooaPmqZ/jgIHpo7LmsLTmqZ8NCg0K8J+al+apn+i7iuS9je+8muWPr+WBnOaUvuWcqOS4gOaok+epuuWcsA0KDQrwn5qv5Z6D5Zy+77ya6ZuG5Lit6JmV55CGDQoNCvCflKXplovkvJnvvJrkuI3lj6/ku6Xwn4iyIjtzOjc6InJlbnRhbHMiO2k6NDgwMDtz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5rC05p6c44CB6Iqx5pyo44CCDQoNCjYu5Zub6YCx6KaW6YeO56m65pug77yM56m65rCj5paw6a6u77yM542o5qOf5bu656+J44CCDQoNCjcu5YWo5paw5bu656+J44CCICAg5q2h6L+O5YyF5qOf5om/56efDQoNCjgu6L+R6YeR6ZaA5aSn5a246IiH6YeR6ZaA6YSJ5YWs5omADQoNCjku5rS75YuV56m65Zyw57SEMTUw5Z2q5Y+v5L2/55So44CCDQoNCjEwLueNqOeri+mbu+mMtuOAgeawtOmMtuOAgg0K6ZmE6L+R5pyJ5L6/5Yip5ZWG5bqX44CB5YKz57Wx5biC5aC044CB55m+6LKo5YWs5Y+444CB5YWs5ZyS57ag5Zyw44CB5a245qCh44CB6Yar55mC5qmf5qeL44CCDQrmnKzmiL/lsYvov5HmuZbljZflhazou4rnq5njgIIiO3M6NzoicmVudGFscyI7aTo2MDAwO3M6ODoiaW50ZXJ2YWwiO2k6MTI7czoxMjoibGVhc2Vfc3RhdHVzIjtzOjk6IuW3suWIiueZuyI7czoxMDoibnVtX3JlbnRlciI7aTo0O3M6MTA6Im1pbl9wZXJpb2QiO2k6MTI7czo3OiJwYXR0ZXJuIjtpOjQ7czo0OiJzaXplIjtpOjc7czo0OiJ0eXBlIjtzOjEyOiLnjajnq4vlpZfmiL8iO3M6NToiZmxvb3IiO2k6MjtzOjExOiJsb2NhdGlvbl9pZCI7aToyMTtzOjg6Im93bmVyX2lkIjtpOjg7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMy0wNi0wMSAxNjoxMDo0NiI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMy0wNi0wMSAxNjoxMDo0NiI7czoxNToiaW52aXRhdGlvbl9jb2RlIjtzOjQ6IjUzMzIiO31zOjExOiIAKgBvcmlnaW5hbCI7YToyMDp7czoyOiJpZCI7aTozMDtzOjY6ImNvdW50eSI7czo5OiLph5HploDnuKMiO3M6NDoiYXJlYSI7czo5OiLph5Hlr6fphIkiO3M6NzoiYWRkcmVzcyI7czoxNToi6YeR5a+n6YSJ5rmW5Y2XIjtzOjQ6Im5hbWUiO3M6NDg6IuiQrOe/oOiLkeWFqOaWsOWIpeWiheWei+iKseWckuW7o+WgtOWll+aIv+WHuuennyI7czo5OiJpbnRyb2R1Y2UiO3M6NjA3OiIxLuS4gOaok+eNqOeri+S6pOiqvOW7sygxNeWdqinpmYToqK3lu5rmiL/ppJDlu7PjgIINCg0KMi7lsIjlsazlu6PloLTlhafoqK3msb3mqZ/ou4rpga7pm6jmo5rou4rkvY3jgIINCg0KMy7lm5vpgLHnqK7mpI3ojYnnmq7mqLnmnKjvvIjoq4vlj4PplrHlnJbniYfvvInjgIINCg0KNC7lm5vpgLHlnI3niYboqK3mnInnm6PoppblmajvvIzlronlhajnhKHomZ7jgIINCg0KNS7plovlv4PovrLloLTntIQ4MOWdqu+8jOWPr+eoruakjeeWj+iPnOOAgeawtOaenOOAgeiKseacqOOAgg0KDQo2LuWbm+mAseimlumHjuepuuaboO+8jOepuuawo+aWsOmuru+8jOeNqOajn+W7uuevieOAgg0KDQo3LuWFqOaWsOW7uuevieOAgiAgIOatoei/juWMheajn+aJv+ennw0KDQo4Lui/kemHkemWgOWkp+WtuOiIh+mHkemWgOmEieWFrOaJgA0KDQo5Lua0u+WLleepuuWcsOe0hDE1MOWdquWPr+S9v+eUqOOAgg0KDQoxMC7njajnq4vpm7vpjLbjgIHmsLTpjLbjgIINCumZhOi/keacieS+v+WIqeWVhuW6l+OAgeWCs+e1seW4guWgtOOAgeeZvuiyqOWFrOWPuOOAgeWFrOWckue2oOWcsOOAgeWtuOagoeOAgemGq+eZguapn+ani+OAgg0K5pys5oi/5bGL6L+R5rmW5Y2X5YWs6LuK56uZ44CCIjtzOjc6InJlbnRhbHMiO2k6NjAwMDtzOjg6ImludGVydmFsIjtpOjEyO3M6MTI6ImxlYXNlX3N0YXR1cyI7czo5OiLlt7LliIrnmbsiO3M6MTA6Im51bV9yZW50ZXIiO2k6NDtzOjEwOiJtaW5fcGVyaW9kIjtpOjEyO3M6NzoicGF0dGVybiI7aTo0O3M6NDoic2l6ZSI7aTo3O3M6NDoidHlwZSI7czoxMjoi542o56uL5aWX5oi/IjtzOjU6ImZsb29yIjtpOjI7czoxMToibG9jYXRpb25faWQiO2k6MjE7czo4OiJvd25lcl9pZCI7aTo4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n+OAgeS4iuePreaXj+S+huenn+aIvw0K5oi/5p2x5Lq65b6I5aW9fn5+DQrmnInmhI/oq4vmiZPpm7voqbEiO3M6NzoicmVudGFscyI7aToxMDAxO3M6ODoiaW50ZXJ2YWwiO2k6MTI7czoxMjoibGVhc2Vfc3RhdHVzIjtzOjk6IuW3suWIiueZuyI7czoxMDoibnVtX3JlbnRlciI7aToxO3M6MTA6Im1pbl9wZXJpb2QiO2k6MTI7czo3OiJwYXR0ZXJuIjtpOjE7czo0OiJzaXplIjtpOjEwO3M6NDoidHlwZSI7czoxMjoi542o56uL5aWX5oi/IjtzOjU6ImZsb29yIjtpOjI7czoxMToibG9jYXRpb25faWQiO2k6MjQ7czo4OiJvd25lcl9pZCI7aToxMztzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIzLTA2LTAyIDE2OjMwOjE1IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIzLTA2LTAyIDE2OjM0OjU4IjtzOjE1OiJpbnZpdGF0aW9uX2NvZGUiO3M6NDoiMjU1NyI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjIwOntzOjI6ImlkIjtpOjMzO3M6NjoiY291bnR5IjtzOjk6IuaWsOeruee4oyI7czo0OiJhcmVhIjtzOjk6IuerueadsemOriI7czo3OiJhZGRyZXNzIjtzOjI2OiLkuK3lsbHot6/kuozmrrUxNTTlt7cyMOiZnyI7czo0OiJuYW1lIjtzOjIxOiLmlrDnq7nnq7nmnbHlsI/lpZfmiL8iO3M6OToiaW50cm9kdWNlIjtzOjczOiLmraHov47lrbjnlJ/jgIHkuIrnj63ml4/kvobnp5/miL8NCuaIv+adseS6uuW+iOWlvX5+fg0K5pyJ5oSP6KuL5omT6Zu76KmxIjtzOjc6InJlbnRhbHMiO2k6MTAwMTtzOjg6ImludGVydmFsIjtpOjEyO3M6MTI6ImxlYXNlX3N0YXR1cyI7czo5OiLlt7LliIrnmbsiO3M6MTA6Im51bV9yZW50ZXIiO2k6MTtzOjEwOiJtaW5fcGVyaW9kIjtpOjEyO3M6NzoicGF0dGVybiI7aToxO3M6NDoic2l6ZSI7aToxMDtzOjQ6InR5cGUiO3M6MTI6IueNqOeri+Wll+aI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oyI7czo0OiJhcmVhIjtzOjk6IuaWsOWflOmOriI7czo3OiJhZGRyZXNzIjtzOjE3OiLlv6DmmI7lha3ooZcyOeiZnyI7czo0OiJuYW1lIjtzOjU3OiLkuK3ljJfljYDimaXov5HkuK3oj6/lpJzluILimaXotoXlpKfns7vntbHmq4PimaXpm7vmoq/imaUiO3M6OToiaW50cm9kdWNlIjtzOjM6Iu+8kCI7czo3OiJyZW50YWxzIjtpOjYwMDA7czo4OiJpbnRlcnZhbCI7aToxMjtzOjEyOiJsZWFzZV9zdGF0dXMiO3M6OToi5bey5YiK55m7IjtzOjEwOiJudW1fcmVudGVyIjtpOjI7czoxMDoibWluX3BlcmlvZCI7aTozO3M6NzoicGF0dGVybiI7aToyO3M6NDoic2l6ZSI7aToxMDA7czo0OiJ0eXBlIjtzOjEyOiLliIbnp5/lpZfmiL8iO3M6NToiZmxvb3IiO2k6MztzOjExOiJsb2NhdGlvbl9pZCI7aToyNjtzOjg6Im93bmVyX2lkIjtpOjU7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMy0wNi0wNiAxODozNTowNyI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMy0wNi0xNSAxMzowNToxNiI7czoxNToiaW52aXRhdGlvbl9jb2RlIjtzOjQ6IjcxMjciO31zOjExOiIAKgBvcmlnaW5hbCI7YToyMDp7czoyOiJpZCI7aTozNTtzOjY6ImNvdW50eSI7czo5OiLmlrDnq7nnuKMiO3M6NDoiYXJlYSI7czo5OiLmlrDln5Tpjq4iO3M6NzoiYWRkcmVzcyI7czoxNzoi5b+g5piO5YWt6KGXMjnomZ8iO3M6NDoibmFtZSI7czo1Nzoi5Lit5YyX5Y2A4pml6L+R5Lit6I+v5aSc5biC4pml6LaF5aSn57O757Wx5quD4pml6Zu75qKv4pmlIjtzOjk6ImludHJvZHVjZSI7czozOiLvvJAiO3M6NzoicmVudGFscyI7aTo2MDAwO3M6ODoiaW50ZXJ2YWwiO2k6MTI7czoxMjoibGVhc2Vfc3RhdHVzIjtzOjk6IuW3suWIiueZuyI7czoxMDoibnVtX3JlbnRlciI7aToyO3M6MTA6Im1pbl9wZXJpb2QiO2k6Mztz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', 1686815430);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6LuMDFKtHgQuN76Drt7BwBJ3ATnMSIem4mmmIEm7', 9, '140.128.80.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMTIyYlNqNzdzWDdoTWNMNEFPY3U1dTVPZVRpS25DZFk1aEl0Q1VaVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xNDAuMTI4LjgwLjE5OTo4MDgwL3JlbnRlcnMvaG91c2VzLzMyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjIxOiJzaG93bl9hbm5vdW5jZW1lbnRfMzIiO2I6MTtzOjIxOiJzaG93bl9hbm5vdW5jZW1lbnRfMzgiO2I6MTt9', 1687238798),
('ajCouv0hYDQpGp87pqL6kDg8GTQMp0eKHURMKyev', NULL, '140.128.80.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0pjeXpHbUdyelZiZldRWE5LZ2hPZXViV2dyUGdVRUs0TGtIbzBtWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xNDAuMTI4LjgwLjE5OTo4MDgwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1687243781),
('F4T5aJABaEei24U3Uy0vOmuU27kstz0cR2RyaiDd', 8, '140.128.80.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUFB1cEd6aUsxT1dMbThuVk45YjJwWVRzbEhGcmxMaGRDekhORWc2RyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xNDAuMTI4LjgwLjE5OTo4MDgwL3VzZXJzL3JlbnRlcnMvJTdCcmVudGVyJTdEIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1687226712),
('lrw7EVUFg7Vu1ocpmXK1NJErjncIieWYrOHz1PoM', NULL, '140.128.80.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGJaZjRGa21LWVF1NWpxV0lnc0pGa3Zqc2sxWlh1RUZDWXNMY3FtWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA1OiJodHRwOi8vMTQwLjEyOC44MC4xOTk6ODA4MC9yZW50ZXJzL2hvdXNlcy9yZXBhaXJzLzI2L2VkaXQ/X3Rva2VuPWxiUDZXMUZUT3FCRDlpcVhWNjlBbTV6cGJaZ3h1Tnd5WTVJdnpJejMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1687226756),
('SphnqFUf0TyTGFkA948l8NueO5boFdcBna9YyCVF', NULL, '140.128.80.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjBkWGNDcUVJUW8xYmMyaHpQUjVXdktvTmhZdFdza05MOWJLS3RrSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xNDAuMTI4LjgwLjE5OTo4MDgwL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1687326757),
('TMiyzjhluSygWbAnSgcw6Owgp95dNgQTrlkrUZNB', 9, '140.128.80.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.43', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibGJQNlcxRlRPcUJEOWlxWFY2OUFtNXpwYlpneHVOd3lZNUl2ekl6MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xNDAuMTI4LjgwLjE5OTo4MDgwL3JlbnRlcnMvaG91c2VzLzMyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjIxOiJzaG93bl9hbm5vdW5jZW1lbnRfMzIiO2I6MTtzOjIxOiJzaG93bl9hbm5vdW5jZW1lbnRfMzgiO2I6MTt9', 1686815324);

-- --------------------------------------------------------

--
-- 資料表結構 `signatories`
--

CREATE TABLE `signatories` (
  `id` bigint UNSIGNED NOT NULL,
  `renter_id` bigint UNSIGNED NOT NULL,
  `house_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `signatories`
--

INSERT INTO `signatories` (`id`, `renter_id`, `house_id`, `created_at`, `updated_at`) VALUES
(17, 9, 32, '2023-06-14 05:00:11', '2023-06-14 05:00:11'),
(25, 9, 38, '2023-06-15 04:55:30', '2023-06-15 04:55:30');

-- --------------------------------------------------------

--
-- 資料表結構 `system_posts`
--

CREATE TABLE `system_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `system_posts`
--

INSERT INTO `system_posts` (`id`, `admin_id`, `title`, `content`, `date`, `created_at`, `updated_at`) VALUES
(2, 1, '系統維護公告', '親愛的用戶您好：\r\n\r\n　　本公司於6/11(日)07:00~12:00實施『系統升級維護作業』維護期間本系統將暫停服務。\r\n　　請您於上述時間以外再進行相關作業，造成您的諸多不便，敬請見諒。', NULL, '2023-05-24 07:25:08', '2023-05-24 07:25:08');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `name`, `sex`, `phone`, `email`, `email_verified_at`, `account_name`, `account`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$lHnotCXQz7RBaZR07PY8lOg2Yxh.iFICX2ogCp6KM0Smv7Hw5lS2W', NULL, NULL, NULL, '房東吳阿姨', NULL, '0965583434', '3a9320@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-24 06:58:01', '2023-05-24 07:35:21'),
(2, '$2y$10$fl2R/eThuVvoEyIGTR/f0.xzN.bcdqyIiBWuN65l7y2autvYjQR/W', NULL, NULL, NULL, '黃淑娟', NULL, '0931354221', '3a932004@gm.student.ncut.edu.tw', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-24 07:02:43', '2023-05-25 13:02:49'),
(3, '$2y$10$UmQt.yJL5uToD5/S9jWRzu1ZhX1uoqa8.SZAoZgaf9piQGkEaHvSe', NULL, NULL, NULL, '系統管理員', NULL, '0905123154', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-24 07:06:42', '2023-05-24 07:06:42'),
(5, '$2y$10$Imz8xMCB7Gt4W.yMgXzHvOOTqXNWHkQYw92PYIZCSqrpv7.ak06xG', NULL, NULL, NULL, '黃佳怡', NULL, '0975481352', '3a932117@gm.student.ncut.edu.tw', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-25 07:42:28', '2023-05-31 06:41:54'),
(6, '$2y$10$05G0ckH5E4b.kSCqc7Pyu.LcU6xuhN9nsw7vhs4Eifhh6jrFfhmXS', NULL, NULL, NULL, '123', NULL, '0965589845', '123zheng@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-26 05:34:29', '2023-05-26 05:34:29'),
(8, '$2y$10$fwQ7jf8xBGILuWKlN9i3NOXHmVGwHsNC4X98i4Fp4c1gyFSSt8SU6', NULL, NULL, NULL, '曾翊晴', NULL, '0978654321', '3a932045@gm.student.ncut.edu.tw', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-26 08:10:12', '2023-05-26 08:10:12'),
(9, '$2y$10$g6HOtILYkolIQFXwX7HyHObrwAIhqxV/eBMceYRUkMsPkVbS5aR9.', NULL, NULL, NULL, '鄭羽庭', NULL, '0945648121', 'asdf.tw1231@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 07:11:13', '2023-06-07 03:09:54'),
(10, '$2y$10$bazhzLVvg4YwMLdqGguGSuulqZPMkLS/I8AE1XAeBKx7cszWmnay2', NULL, NULL, NULL, 'aaa', NULL, '111', 'aa@aa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 08:09:53', '2023-05-31 08:09:53'),
(11, '$2y$10$JDk0LCstT/Yyci2ACj1p0ennxwwNB2VYgAeVkbue1KeQZLAr50rqO', NULL, NULL, NULL, '鄭羽庭', NULL, '0965578411', 'asdf.tw9876@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-02 02:19:57', '2023-06-02 02:19:57'),
(12, '$2y$10$7fBuUsE44XMjpxqAO.mTm.GEtJfROuZyhZdYe2eA5xGPGbp.HJJkS', NULL, NULL, NULL, '株株', NULL, '0935124782', '123@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-02 08:09:29', '2023-06-02 08:09:29'),
(13, '$2y$10$NSpBkdqkTKwD9dlBokSM7e6iN2bZC6Q1cDgPnKLuUw8dMEDdibOmm', NULL, NULL, NULL, '八八', NULL, '0912345678', 'chichig8@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-02 08:26:17', '2023-06-02 08:26:17'),
(14, '$2y$10$neQSJ776M73Au.pnSxe5v.zZXnNGrDiAJlUZ5AE4SMwvNBfUA4ppi', NULL, NULL, NULL, 'aaa', NULL, '111', 'aaa@aaa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-03 12:23:07', '2023-06-03 12:23:07');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- 資料表索引 `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_renter_id_foreign` (`renter_id`),
  ADD KEY `contracts_house_id_foreign` (`house_id`);

--
-- 資料表索引 `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_house_id_foreign` (`house_id`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 資料表索引 `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_house_id_foreign` (`house_id`);

--
-- 資料表索引 `furnishings`
--
ALTER TABLE `furnishings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `furnishings_house_id_foreign` (`house_id`);

--
-- 資料表索引 `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houses_location_id_foreign` (`location_id`),
  ADD KEY `houses_owner_id_foreign` (`owner_id`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_house_id_foreign` (`house_id`);

--
-- 資料表索引 `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_owner_id_foreign` (`owner_id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owners_user_id_foreign` (`user_id`);

--
-- 資料表索引 `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- 資料表索引 `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_renter_id_foreign` (`renter_id`),
  ADD KEY `payments_expense_id_foreign` (`expense_id`);

--
-- 資料表索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_location_id_foreign` (`location_id`),
  ADD KEY `posts_owner_id_foreign` (`owner_id`);

--
-- 資料表索引 `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renters_user_id_foreign` (`user_id`);

--
-- 資料表索引 `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repairs_house_id_foreign` (`house_id`),
  ADD KEY `renter_id` (`renter_id`);

--
-- 資料表索引 `repair_replies`
--
ALTER TABLE `repair_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repair_replies_repair_id_foreign` (`repair_id`);

--
-- 資料表索引 `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- 資料表索引 `signatories`
--
ALTER TABLE `signatories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signatories_renter_id_foreign` (`renter_id`),
  ADD KEY `signatories_house_id_foreign` (`house_id`);

--
-- 資料表索引 `system_posts`
--
ALTER TABLE `system_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_posts_admin_id_foreign` (`admin_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `furnishings`
--
ALTER TABLE `furnishings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `renters`
--
ALTER TABLE `renters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `repair_replies`
--
ALTER TABLE `repair_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `signatories`
--
ALTER TABLE `signatories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `system_posts`
--
ALTER TABLE `system_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `furnishings`
--
ALTER TABLE `furnishings`
  ADD CONSTRAINT `furnishings_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `houses_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `renters`
--
ALTER TABLE `renters`
  ADD CONSTRAINT `renters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repairs_ibfk_1` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `repair_replies`
--
ALTER TABLE `repair_replies`
  ADD CONSTRAINT `repair_replies_repair_id_foreign` FOREIGN KEY (`repair_id`) REFERENCES `repairs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `signatories`
--
ALTER TABLE `signatories`
  ADD CONSTRAINT `signatories_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `signatories_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `system_posts`
--
ALTER TABLE `system_posts`
  ADD CONSTRAINT `system_posts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
