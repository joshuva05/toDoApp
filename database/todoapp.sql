-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2025 at 01:39 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2025_06_13_171224_create_tasks_table', 5),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 3),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('joshuva@gmail.com', '$2y$12$bsjH76vn1QY2mhMuSodOaeZNLsSuNEb8XVVAquEbiDLV7GoA4Y.DG', '2025-06-14 00:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `due_date` date NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('pending','completed','overdue') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `due_date`, `is_completed`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Newtest', 'Testste', '2025-06-04', 1, 'completed', 2, '2025-06-14 04:00:08', '2025-06-14 06:35:10'),
(15, 'Construction', 'Build a Room', '2025-06-30', 1, 'completed', 4, '2025-06-14 07:53:54', '2025-06-14 07:54:47'),
(3, 'Newtwo sd', 'ererwerdsfsdf', '2025-06-03', 0, 'overdue', 2, '2025-06-14 06:08:36', '2025-06-14 07:59:56'),
(8, 'Dicta repellendus A', 'Temporibus facere al', '2026-06-01', 0, 'pending', 2, '2025-06-14 06:38:37', '2025-06-14 06:38:37'),
(9, 'Commodo adipisci aut', 'Dolor molestiae ab s', '2025-11-06', 0, 'pending', 2, '2025-06-14 06:38:44', '2025-06-14 06:38:44'),
(10, 'Quis aut molestias o', 'Beatae ad quia adipi', '2025-12-16', 0, 'pending', 2, '2025-06-14 06:38:51', '2025-06-14 06:38:51'),
(11, 'Alias ipsam a sequi', 'Adipisci qui est ess', '2026-01-22', 0, 'pending', 2, '2025-06-14 06:39:00', '2025-06-14 06:39:00'),
(12, 'Error qui culpa cons', 'Odit aut doloribus d', '2035-03-04', 0, 'pending', 2, '2025-06-14 06:39:09', '2025-06-14 06:39:09'),
(13, 'Taetsr', 'ertertert', '2025-06-20', 0, 'pending', 3, '2025-06-14 06:42:07', '2025-06-14 06:42:07'),
(14, 'Placeat repudiandae', 'Aut ut quo consectet', '2025-06-04', 0, 'overdue', 2, '2025-06-14 06:42:59', '2025-06-14 07:59:56'),
(16, 'Paint', 'Paint the room', '2025-06-10', 0, 'overdue', 4, '2025-06-14 07:54:29', '2025-06-14 07:59:56'),
(17, 'Maintenance', 'Maintenance for the room', '2025-06-11', 1, 'completed', 2, '2025-06-14 07:57:52', '2025-06-14 07:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joshuva', 'joshuva@gmail.com', NULL, '$2y$12$Pzly29ROQaCo7XIDEp08MeEPDnaSPGdyp2i2EFn14Pd1GPNWP1ocu', NULL, '2025-06-13 11:26:36', '2025-06-13 13:14:05'),
(2, 'James', 'james@test.com', NULL, '$2y$12$VW/rHDZAcQe.qDfT2bq1ieK5OuoGLeTenqf.CVz1hTdw09oAu1IF.', NULL, '2025-06-14 00:52:16', '2025-06-14 00:52:16'),
(3, 'Adam', 'adam@test.com', NULL, '$2y$12$x6rOe6HshffxoOhHImP5N.HZ6JHIuZG.qlG3v0oG1gbTtWmZu/tjq', NULL, '2025-06-14 06:41:06', '2025-06-14 06:41:06'),
(4, 'Daniel Craig', 'daniel@test.com', NULL, '$2y$12$mXXYSgwKC2HnMiDM1R2gm.3tJpgrbqJcvAKnnbMHu4V9X/ZacnEW6', NULL, '2025-06-14 07:53:16', '2025-06-14 07:56:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
