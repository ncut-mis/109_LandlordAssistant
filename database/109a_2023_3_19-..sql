-- Adminer 4.8.1 MySQL 5.7.11 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_user_id_foreign` (`user_id`),
  CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `contracts`;
CREATE TABLE `contracts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `renter_id` bigint(20) unsigned NOT NULL,
  `house_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contracts_renter_id_foreign` (`renter_id`),
  KEY `contracts_house_id_foreign` (`house_id`),
  CONSTRAINT `contracts_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `contracts_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `house_id` bigint(20) unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `interval` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_house_id_foreign` (`house_id`),
  CONSTRAINT `expenses_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `expenses` (`id`, `house_id`, `type`, `amount`, `interval`, `created_at`, `updated_at`) VALUES
(1,	1,	'租金',	4000,	12,	'2023-03-19 06:32:16',	'2023-03-19 06:32:16'),
(2,	3,	'租金',	5000,	12,	'2023-03-19 11:07:02',	'2023-03-19 11:21:01');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `features`;
CREATE TABLE `features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `house_id` bigint(20) unsigned NOT NULL,
  `feature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `features_house_id_foreign` (`house_id`),
  CONSTRAINT `features_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `features` (`id`, `house_id`, `feature`, `created_at`, `updated_at`) VALUES
(5,	1,	'可養寵物',	'2023-03-19 10:42:00',	'2023-03-19 10:42:00'),
(6,	1,	'有陽台',	'2023-03-19 10:51:08',	'2023-03-19 10:51:08'),
(8,	3,	'有陽台',	'2023-03-19 11:16:02',	'2023-03-19 11:16:02'),
(9,	3,	'有電梯',	'2023-03-19 11:24:01',	'2023-03-19 11:24:01');

DROP TABLE IF EXISTS `furnishings`;
CREATE TABLE `furnishings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `house_id` bigint(20) unsigned NOT NULL,
  `furnish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `furnishings_house_id_foreign` (`house_id`),
  CONSTRAINT `furnishings_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `furnishings` (`id`, `house_id`, `furnish`, `created_at`, `updated_at`) VALUES
(14,	1,	'電風扇',	'2023-03-19 10:34:03',	'2023-03-19 10:34:03'),
(16,	1,	'冷氣',	'2023-03-19 10:51:08',	'2023-03-19 10:51:08'),
(17,	3,	'電風扇',	'2023-03-19 11:07:02',	'2023-03-19 11:07:02'),
(18,	3,	'冷氣',	'2023-03-19 11:07:02',	'2023-03-19 11:07:02'),
(19,	3,	'電視',	'2023-03-19 11:16:02',	'2023-03-19 11:16:02');

DROP TABLE IF EXISTS `houses`;
CREATE TABLE `houses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lease_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_renter` int(11) DEFAULT NULL,
  `min_period` int(11) DEFAULT NULL,
  `pattern` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  `owner_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `houses_location_id_foreign` (`location_id`),
  KEY `houses_owner_id_foreign` (`owner_id`),
  CONSTRAINT `houses_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `houses_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `houses` (`id`, `address`, `name`, `introduce`, `lease_status`, `num_renter`, `min_period`, `pattern`, `size`, `type`, `floor`, `location_id`, `owner_id`, `created_at`, `updated_at`) VALUES
(1,	'台中市太平區',	'111',	'歡迎參觀入住',	'閒置',	2,	12,	1,	8,	'分租套房',	1,	1,	1,	'2023-03-19 06:32:11',	'2023-03-19 06:32:11'),
(3,	'台中市太平區',	'112',	'歡迎參觀入住',	'閒置',	2,	12,	1,	8,	'獨立套房',	1,	1,	1,	'2023-03-19 11:07:02',	'2023-03-19 11:24:01');

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `house_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `images_house_id_foreign` (`house_id`),
  CONSTRAINT `images_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `images` (`id`, `house_id`, `image`, `created_at`, `updated_at`) VALUES
(1,	1,	'_1679207531.jpg',	'2023-03-19 06:32:16',	'2023-03-19 06:32:16'),
(3,	3,	'_1679224022.jpg',	'2023-03-19 11:07:02',	'2023-03-19 11:07:02');

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_owner_id_foreign` (`owner_id`),
  CONSTRAINT `locations_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `locations` (`id`, `owner_id`, `name`, `created_at`, `updated_at`) VALUES
(1,	1,	'台中市勤益科大中山路一段',	NULL,	NULL),
(2,	1,	'台中市勤益科大東側門',	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2023_02_23_072518_create_sessions_table',	1),
(7,	'2023_02_25_120030_create_admins_table',	1),
(8,	'2023_02_25_120045_create_owners_table',	1),
(9,	'2023_02_25_121527_create_renters_table',	1),
(10,	'2023_02_25_121529_create_system_posts_table',	1),
(11,	'2023_02_25_121705_create_locations_table',	1),
(12,	'2023_02_25_122148_create_posts_table',	1),
(13,	'2023_02_25_122955_create_houses_table',	1),
(14,	'2023_02_25_122960_create_signatories_table',	1),
(15,	'2023_02_25_122963_create_contracts_table',	1),
(16,	'2023_02_25_123144_create_images_table',	1),
(17,	'2023_02_25_123306_create_features_table',	1),
(18,	'2023_02_25_123310_create_furnishings_table',	1),
(19,	'2023_02_25_123503_create_repairs_table',	1),
(20,	'2023_02_25_123510_create_repair_replies_table',	1),
(21,	'2023_02_25_123900_create_expenses_table',	1),
(22,	'2023_02_25_123950_create_payments_table',	1);

DROP TABLE IF EXISTS `owners`;
CREATE TABLE `owners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owners_user_id_foreign` (`user_id`),
  CONSTRAINT `owners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `owners` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `renter_id` bigint(20) unsigned NOT NULL,
  `expense_id` bigint(20) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_renter_id_foreign` (`renter_id`),
  KEY `payments_expense_id_foreign` (`expense_id`),
  CONSTRAINT `payments_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `payments_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint(20) unsigned NOT NULL,
  `owner_id` bigint(20) unsigned NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_location_id_foreign` (`location_id`),
  KEY `posts_owner_id_foreign` (`owner_id`),
  CONSTRAINT `posts_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `renters`;
CREATE TABLE `renters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `renters_user_id_foreign` (`user_id`),
  CONSTRAINT `renters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `repairs`;
CREATE TABLE `repairs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `renter_id` bigint(20) unsigned NOT NULL,
  `house_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `repairs_renter_id_foreign` (`renter_id`),
  KEY `repairs_house_id_foreign` (`house_id`),
  CONSTRAINT `repairs_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `repairs_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `repair_replies`;
CREATE TABLE `repair_replies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `repair_id` bigint(20) unsigned NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `repair_replies_repair_id_foreign` (`repair_id`),
  CONSTRAINT `repair_replies_repair_id_foreign` FOREIGN KEY (`repair_id`) REFERENCES `repairs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DCYk538IL06cKaDaa1GscyxHjVGVjiw20ynx5D2N',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXMyYUpIemRFYzRJbnN0RWFTTk5KNmRSc29OUE03THVCUEloaDFDRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2Vycy9vd25lcnMvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1679225106);

DROP TABLE IF EXISTS `signatories`;
CREATE TABLE `signatories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `renter_id` bigint(20) unsigned NOT NULL,
  `house_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `signatories_renter_id_foreign` (`renter_id`),
  KEY `signatories_house_id_foreign` (`house_id`),
  CONSTRAINT `signatories_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `signatories_renter_id_foreign` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `system_posts`;
CREATE TABLE `system_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `system_posts_admin_id_foreign` (`admin_id`),
  CONSTRAINT `system_posts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `name`, `sex`, `phone`, `email`, `email_verified_at`, `account`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1,	'12345678',	NULL,	NULL,	NULL,	'test000',	'女性',	'0912345678',	'test000@gmail.com',	NULL,	'001',	NULL,	NULL,	NULL,	NULL,	NULL);

-- 2023-03-19 11:26:45
