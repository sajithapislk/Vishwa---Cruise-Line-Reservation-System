-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 05:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vishwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Angelica David', 'admin@admin.com', NULL, '$2y$10$uVAHbRQ//NLoC.iA0qGmdOpFkOYrtF7mc3UsXt3yqqCgW8.L4Nlhi', NULL, '2023-09-11 03:53:15', '2023-09-11 03:53:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `available_rooms`
--

CREATE TABLE `available_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ud_id` bigint(20) UNSIGNED NOT NULL,
  `is_booked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `available_rooms`
--

INSERT INTO `available_rooms` (`id`, `ud_id`, `is_booked`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2023-09-19 05:54:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_wallets`
--

CREATE TABLE `company_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` double(8,2) DEFAULT NULL,
  `credit` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_wallets`
--

INSERT INTO `company_wallets` (`id`, `ref`, `name`, `debit`, `credit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'cruise_deals', 34.00, NULL, '2023-10-12 08:55:50', '2023-10-12 08:55:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cruise_deals`
--

CREATE TABLE `cruise_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ud_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cruise_deals`
--

INSERT INTO `cruise_deals` (`id`, `ud_id`, `user_id`, `payment_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 1, 108, 'PAYMENT DONE', '2023-10-12 08:28:37', '2023-10-12 08:28:37', NULL),
(4, 1, 1, 110, 'PAYMENT DONE', '2023-10-12 08:55:50', '2023-10-12 08:55:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cruise_lines`
--

CREATE TABLE `cruise_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cruise_lines`
--

INSERT INTO `cruise_lines` (`id`, `name`, `description`, `img`, `tp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ABC Cruise Line', 'example', 'Carnival-Freedom-Cruise-Ship.jpg', '0772193832', '2023-09-10 22:46:30', NULL, NULL),
(5, 'testsad', '<p>testsad</p>', '', 'testasd', '2023-09-21 02:49:59', '2023-09-21 02:49:59', NULL),
(6, 'testsad', '<p>testsad</p>', '', 'testasd', '2023-09-21 02:51:28', '2023-09-21 02:51:28', NULL),
(7, 'test', 'test', '', 'test', '2023-09-21 02:52:31', '2023-09-21 02:52:31', NULL),
(8, 'testasd', '<p>testasdas</p>', '', 'testasdasd', '2023-09-21 02:57:39', '2023-09-21 02:57:39', NULL),
(9, 'testasd', '<p>testasdas</p>', '', 'testasdasd', '2023-09-21 02:58:19', '2023-09-21 02:58:19', NULL),
(10, 'testfdg', '<p>testfg</p>', '', 'testdfg', '2023-09-21 03:05:09', '2023-09-21 03:05:09', NULL),
(11, 'testasd', '<p>testsad</p>', '1695305219-l.jpg', 'testasd', '2023-09-21 03:06:59', '2023-09-21 03:06:59', NULL),
(12, 'Autem amet ipsum do', 'test', '', 'Quam et in consequat', '2023-09-22 00:20:44', '2023-09-22 00:20:44', NULL),
(13, 'Et amet quasi rem e', 'test', '', 'Ea est dolorem irure', '2023-09-22 02:53:42', '2023-09-22 02:53:42', NULL),
(14, 'Sunt rem voluptatem', 'test', '', 'Vel iure minima irur', '2023-09-23 00:00:22', '2023-09-23 00:00:22', NULL),
(15, 'Sunt rem voluptatem', 'test', '', 'Vel iure minima irur', '2023-09-23 00:01:40', '2023-09-23 00:01:40', NULL),
(16, 'Tenetur tenetur eaqu', 'test', '', 'Ea alias iure sunt q', '2023-09-23 00:53:31', '2023-09-23 00:53:31', NULL),
(17, 'Tenetur tenetur eaqu', 'test', '', 'Ea alias iure sunt q', '2023-09-23 00:53:48', '2023-09-23 00:53:48', NULL),
(18, 'Nemo iusto exercitat', 'test', '', 'Excepturi non volupt', '2023-09-23 00:54:10', '2023-09-23 00:54:10', NULL),
(19, 'Vitae repellendus R', 'test', '', 'Dolorem ipsam qui mo', '2023-09-23 00:54:51', '2023-09-23 00:54:51', NULL),
(20, 'Repellendus Quo lab', 'test', '', 'Quia aperiam aperiam', '2023-09-23 00:58:09', '2023-09-23 00:58:09', NULL),
(21, 'Aut quis do qui poss', 'test', '', 'Nostrum sed aut cum', '2023-09-23 01:05:03', '2023-09-23 01:05:03', NULL),
(22, 'Aut quis do qui poss', 'test', '', 'Nostrum sed aut cum', '2023-09-23 01:05:16', '2023-09-23 01:05:16', NULL),
(23, 'Fugit dicta dolore', 'test', '', 'Fuga Neque dolorem', '2023-09-23 01:05:35', '2023-09-23 01:05:35', NULL),
(24, 'Dolorem voluptatem', 'test', '', 'Quia dolorum assumen', '2023-09-23 01:09:23', '2023-09-23 01:09:23', NULL),
(25, 'Magnam et et ad illu', 'test', '', 'Natus quidem maxime', '2023-09-23 01:09:40', '2023-09-23 01:09:40', NULL),
(26, 'Quidem qui porro tem', 'test', '', 'Irure commodi ipsa', '2023-09-23 01:09:55', '2023-09-23 01:09:55', NULL),
(27, 'Voluptas do ad modi', 'test', '', 'Architecto quis aspe', '2023-09-23 01:10:22', '2023-09-23 01:10:22', NULL),
(28, 'Maxime sunt porro ar', 'test', '', 'Ipsam nesciunt qui', '2023-09-23 01:11:31', '2023-09-23 01:11:31', NULL),
(29, 'Maxime sunt porro ar', 'test', '', 'Ipsam nesciunt qui', '2023-09-23 01:12:04', '2023-09-23 01:12:04', NULL),
(30, 'test', 'test', '', 'test', '2023-09-23 01:12:11', '2023-09-23 01:12:11', NULL),
(31, 'test', 'test', '', 'test', '2023-09-23 01:12:13', '2023-09-23 01:12:13', NULL),
(32, 'Modi quod dolor quae', 'test', '', 'Sit adipisicing a re', '2023-09-23 02:47:40', '2023-09-23 02:47:40', NULL),
(33, 'Aperiam sunt praese', 'test', '', 'Consectetur reprehen', '2023-09-23 03:02:36', '2023-09-23 03:02:36', NULL),
(34, 'Aperiam sunt praese', 'test', '', 'Consectetur reprehen', '2023-09-23 03:02:44', '2023-09-23 03:02:44', NULL),
(35, 'test', 'test', '', 'test', '2023-09-23 03:04:43', '2023-09-23 03:04:43', NULL),
(36, 'Et proident vero iu', 'test', '', 'Est qui dolorem nos', '2023-09-23 03:06:42', '2023-09-23 03:06:42', NULL),
(37, 'Quo aut in eveniet', 'test', '', 'Est distinctio Cupi', '2023-09-23 03:07:50', '2023-09-23 03:07:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cruise_line_agents`
--

CREATE TABLE `cruise_line_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cl_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cruise_line_agents`
--

INSERT INTO `cruise_line_agents` (`id`, `cl_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Angelica David', 'cruise@cruise.com', NULL, '$2y$10$uVAHbRQ//NLoC.iA0qGmdOpFkOYrtF7mc3UsXt3yqqCgW8.L4Nlhi', NULL, '2023-09-11 03:53:15', '2023-09-11 03:53:15', NULL),
(2, 14, 'Animi ab pariatur', 'Facere rerum et est', NULL, '$2y$10$CqKxNr31BK4yUaBQ8sP98OpIPyZxS5BDS7SRqtu364xgEyPIsKyV.', NULL, '2023-09-23 00:01:41', '2023-09-23 00:01:41', NULL),
(3, 16, 'Quo qui aut fuga Ir', 'Odio voluptatum quis', NULL, '$2y$10$yKjv4IAIphhN857oxjtZO.3J/RxEWO6jPShVKDre.vL03TTL7tsRO', NULL, '2023-09-23 00:53:48', '2023-09-23 00:53:48', NULL),
(4, 21, 'Minus odit voluptatu', 'Voluptate dolore ali', NULL, '$2y$10$HuelzAkEZDvIWsAq/1HJFeonzvmjMzTKs1jR4T5DlM0svte/Ev4fy', NULL, '2023-09-23 01:05:16', '2023-09-23 01:05:16', NULL),
(5, 1, 'Tenetur omnis aut cu', 'Est consectetur mai', NULL, '$2y$10$orpmKq3ZUs3xnE6Bv0cLzOlBAN7LSpdmMwDNnAGfkoy2dXpnu.UgO', NULL, '2023-09-23 03:02:44', '2023-09-23 03:02:44', NULL),
(6, 37, 'Dolorum et nostrud v', 'Tenetur assumenda al', NULL, '$2y$10$PJ8zcCkjR1I6h6lQ.7Sotu3iNTwZiEvNj5/bEJz90QD19sCitKwf.', NULL, '2023-09-23 03:07:50', '2023-09-23 03:07:50', NULL),
(7, 1, 'abc', 'adm1in@admi1n.com', NULL, '$2y$10$xSvN/NcDvKpXJzcqOj.Hnu9GecQJWczmKgQKdbmvoaeZFUhhB2xuO', NULL, '2023-09-23 08:58:38', '2023-09-23 08:58:38', NULL),
(8, 6, '123456789', 'admin@admin.com', NULL, '$2y$10$Nl7V6D8IIK/615YyqLyv5uNa1ywaiqqXUzEzVkg3kJIkm.YXv4tNy', NULL, '2023-09-24 06:50:11', '2023-09-24 06:50:11', NULL),
(10, 17, 'Jeanette Hahn', 'qo1cy@mailinator.com', NULL, '$2y$10$/WksEWNHB3bR4ftg6Tphpe7nTszcj7B1N4pEQvfHlN.3C/1iAnZJu', NULL, '2023-09-24 06:51:47', '2023-09-24 06:51:47', NULL),
(11, 37, 'Quinn Wells', 'fulywefex@mailinator.com', NULL, '$2y$10$qlF0Z1l3LOTcvLwWNUkUW.4SR4t2vd5Ter1YZcq9PcMuOWTnQ/tC2', NULL, '2023-09-24 06:54:00', '2023-09-24 06:54:00', NULL),
(12, 36, 'Larissa Curtis', 'johoc@mailinator.com', NULL, '$2y$10$tEyng1gbTTDLdnO2vY1a8eRrsSdtyWpSNp5y.hby.fzupSOiCMj0u', NULL, '2023-09-24 06:55:07', '2023-09-24 06:55:07', NULL),
(13, 10, 'Raymond Lambert', 'revihym@mailinator.com', NULL, '$2y$10$/N17BHv/PW96WcBmNGmda.sYhVipHionrcrQJBKD45eIf95KaOJeC', NULL, '2023-09-24 07:37:49', '2023-09-24 07:37:49', NULL),
(14, 35, 'Silas Young', 'bajynet@mailinator.com', NULL, '$2y$10$4yHf.XHEzeicaHU0gYq2Lu5nRj.qk5RvDhy0Ht03zitHBYKh2/Ym6', NULL, '2023-09-24 07:39:48', '2023-09-24 07:39:48', NULL),
(15, 19, 'Ivan Mason', 'tudik@mailinator.com', NULL, '$2y$10$FlIH8NRfA/6zZ65N8kVgAuOmTRMK8qaa2.PtnXO3WwYsOnRhsoK6C', NULL, '2023-09-24 07:40:10', '2023-09-24 07:40:10', NULL),
(16, 25, 'Wanda Nielsen', 'gymezugo@mailinator.com', NULL, '$2y$10$fliDQwaa3GwxzOyBVpfmYue0/u1Sdm8KA8t0hCUrF.ul5f3KXMM3W', NULL, '2023-09-24 07:40:26', '2023-09-24 07:40:26', NULL),
(17, 30, 'Kylynn Hurley', 'zyfolyloce@mailinator.com', NULL, '$2y$10$FSO90WfLtRg3OJ8z72oYrOVJ2aYi8kEFtF0XsBdtermfaI7zSdzma', NULL, '2023-09-24 07:42:17', '2023-09-24 07:42:17', NULL),
(18, 7, 'Zelenia Barber', 'memyxufiq@mailinator.com', NULL, '$2y$10$TRXZN8qQqzLd5Qb/zGg2.Oma5Kf6iG4WQaO63u2ZTh.oQ30wYhJAa', NULL, '2023-09-24 08:20:40', '2023-09-24 08:20:40', NULL),
(20, 12, 'Shaeleigh Christensen', 'lemanota@mailinator.com', NULL, '$2y$10$nKj75.AEA.sOLQ6PrKjDQOSLll2yf9W6jplDvdIOSK/LgmWU..enS', NULL, '2023-09-24 08:20:47', '2023-09-24 08:20:47', NULL),
(21, 8, 'Fiona Carter', 'juno@mailinator.com', NULL, '$2y$10$.Gul5CCihBRJ5c3mumhZXeNbot4Tu4z0ZeZKsj3zdUpvRAA7OUICq', NULL, '2023-09-24 08:22:14', '2023-09-24 08:22:14', NULL),
(22, 22, 'Ayanna Stuart', 'notazixyk@mailinator.com', NULL, '$2y$10$OYhIIoqCeEO1UtheEgt3ZeWOIGltyYiFIKu1SA1xDGDldb1N0xVSq', NULL, '2023-09-24 08:22:30', '2023-09-24 08:22:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cruise_line_payments`
--

CREATE TABLE `cruise_line_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cruise_line_wallets`
--

CREATE TABLE `cruise_line_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` double(8,2) DEFAULT NULL,
  `credit` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cruise_line_wallets`
--

INSERT INTO `cruise_line_wallets` (`id`, `ref`, `name`, `debit`, `credit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'cruise_deals', NULL, 34.00, '2023-10-12 08:55:50', '2023-10-12 08:55:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cd_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_supporters`
--

CREATE TABLE `customer_supporters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_supporters`
--

INSERT INTO `customer_supporters` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Angelica David', 'supporter@supporter.com', NULL, '$2y$10$uVAHbRQ//NLoC.iA0qGmdOpFkOYrtF7mc3UsXt3yqqCgW8.L4Nlhi', NULL, '2023-09-11 03:53:15', '2023-09-11 03:53:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_chats`
--

CREATE TABLE `live_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `who_inserted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_chats`
--

INSERT INTO `live_chats` (`id`, `user_id`, `who_inserted`, `msg`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 'USER', 'asdsad1', 0, NULL, NULL),
(2, 2, 'CUSTOMER_SUPPORTER', 'asdsad2', 0, NULL, NULL),
(3, 1, 'CUSTOMER_SUPPORTER', 'asdsad', 0, '2023-10-09 05:04:36', '2023-10-09 05:04:36'),
(4, 1, 'CUSTOMER_SUPPORTER', 'asdasd', 0, '2023-10-09 05:44:07', '2023-10-09 05:44:07'),
(5, 1, 'CUSTOMER_SUPPORTER', 'asdasdasd', 0, '2023-10-09 05:44:18', '2023-10-09 05:44:18'),
(6, 1, 'CUSTOMER_SUPPORTER', 'a', 0, '2023-10-09 05:45:11', '2023-10-09 05:45:11'),
(7, 1, 'CUSTOMER_SUPPORTER', 'asdasdd', 0, '2023-10-09 05:46:00', '2023-10-09 05:46:00'),
(8, 1, 'CUSTOMER_SUPPORTER', 'asd', 0, '2023-10-09 05:46:06', '2023-10-09 05:46:06'),
(9, 1, 'CUSTOMER_SUPPORTER', 'asd', 0, '2023-10-09 05:46:13', '2023-10-09 05:46:13'),
(10, 1, 'CUSTOMER_SUPPORTER', 'asdasdas', 0, '2023-10-09 05:48:57', '2023-10-09 05:48:57'),
(11, 1, 'CUSTOMER_SUPPORTER', 'asdasdasasd', 0, '2023-10-09 05:50:56', '2023-10-09 05:50:56'),
(12, 1, 'CUSTOMER_SUPPORTER', 'sdfdsf', 0, '2023-10-09 05:53:43', '2023-10-09 05:53:43'),
(13, 1, 'CUSTOMER_SUPPORTER', 'sdfdsfasd', 0, '2023-10-09 05:55:01', '2023-10-09 05:55:01'),
(14, 1, 'CUSTOMER_SUPPORTER', '123', 0, '2023-10-09 05:55:52', '2023-10-09 05:55:52'),
(15, 1, 'CUSTOMER_SUPPORTER', 'asd', 0, '2023-10-09 06:40:22', '2023-10-09 06:40:22'),
(16, 1, 'CUSTOMER_SUPPORTER', 'asdxxf', 0, '2023-10-09 06:42:33', '2023-10-09 06:42:33'),
(17, 1, 'CUSTOMER_SUPPORTER', 'sdf', 0, '2023-10-09 07:33:28', '2023-10-09 07:33:28'),
(18, 1, 'CUSTOMER_SUPPORTER', 'sdfasd', 0, '2023-10-09 07:34:28', '2023-10-09 07:34:28'),
(19, 1, 'CUSTOMER_SUPPORTER', 'asd', 0, '2023-10-09 10:03:56', '2023-10-09 10:03:56'),
(20, 1, 'CUSTOMER_SUPPORTER', 'asdasd', 0, '2023-10-09 10:03:59', '2023-10-09 10:03:59'),
(21, 1, 'CUSTOMER_SUPPORTER', 'asda', 0, '2023-10-10 08:48:29', '2023-10-10 08:48:29'),
(22, 1, 'CUSTOMER_SUPPORTER', '12', 0, '2023-10-10 08:50:09', '2023-10-10 08:50:09'),
(23, 1, 'CUSTOMER_SUPPORTER', 'asd1', 0, '2023-10-10 08:53:55', '2023-10-10 08:53:55'),
(24, 1, 'CUSTOMER_SUPPORTER', '1', 0, '2023-10-10 08:55:00', '2023-10-10 08:55:00'),
(26, 1, 'CUSTOMER_SUPPORTER', '11', 0, '2023-10-10 08:55:58', '2023-10-10 08:55:58'),
(27, 1, 'CUSTOMER_SUPPORTER', '22', 0, '2023-10-10 08:57:28', '2023-10-10 08:57:28'),
(28, 1, 'CUSTOMER_SUPPORTER', '221', 0, '2023-10-10 09:01:16', '2023-10-10 09:01:16'),
(29, 1, 'CUSTOMER_SUPPORTER', '34', 0, '2023-10-10 09:01:35', '2023-10-10 09:01:35'),
(30, 1, 'CUSTOMER_SUPPORTER', 'a1', 0, '2023-10-10 09:05:55', '2023-10-10 09:05:55'),
(31, 1, 'CUSTOMER_SUPPORTER', '1', 0, '2023-10-14 11:13:36', '2023-10-14 11:13:36'),
(33, 1, 'CUSTOMER_SUPPORTER', '112', 0, '2023-10-14 11:14:11', '2023-10-14 11:14:11'),
(34, 1, 'CUSTOMER_SUPPORTER', 'asd', 0, '2023-10-15 01:06:00', '2023-10-15 01:06:00'),
(35, 1, 'CUSTOMER_SUPPORTER', 'asd', 0, '2023-10-15 01:06:06', '2023-10-15 01:06:06'),
(36, 1, 'USER', 'asd', 0, '2023-10-15 01:28:56', '2023-10-15 01:28:56'),
(37, 1, 'USER', 'asd', 0, '2023-10-15 01:29:08', '2023-10-15 01:29:08'),
(38, 1, 'USER', 'asd', 0, '2023-10-15 01:29:13', '2023-10-15 01:29:13');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_20_174719_create_admins_table', 1),
(6, '2023_08_20_174720_create_ship_types_table', 1),
(7, '2023_08_20_175560_create_customer_supporters_table', 1),
(8, '2023_08_20_175561_create_cruise_lines_table', 1),
(9, '2023_08_20_175562_create_cruise_line_agents_table', 1),
(10, '2023_08_20_181142_create_ships_table', 1),
(11, '2023_08_20_181144_create_packages_table', 1),
(12, '2023_08_20_181144_create_ship_rooms_table', 1),
(13, '2023_08_20_181213_create_ports_table', 1),
(14, '2023_08_20_181214_create_upcoming_deals_table', 1),
(15, '2023_08_20_181215_create_available_rooms_table', 1),
(16, '2023_08_20_181215_create_payments_table', 1),
(17, '2023_08_20_181217_create_cruise_deals_table', 1),
(18, '2023_08_20_183443_create_cruise_line_payments_table', 1),
(19, '2023_08_20_184047_create_live_chats_table', 1),
(20, '2023_08_20_184107_create_customer_feedback_table', 1),
(21, '2023_08_21_143749_create_refunds_table', 1),
(22, '2023_08_23_111000_create_cruise_line_wallets_table', 1),
(23, '2023_08_23_111210_create_company_wallets_table', 1),
(25, '2023_10_11_124114_create_temp_deals_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_d` tinyint(1) NOT NULL,
  `is_bl` tinyint(1) NOT NULL,
  `is_en` tinyint(1) NOT NULL,
  `is_c` tinyint(1) NOT NULL,
  `is_ona` tinyint(1) NOT NULL,
  `is_outa` tinyint(1) NOT NULL,
  `is_kt` tinyint(1) NOT NULL,
  `is_w` tinyint(1) NOT NULL,
  `is_s` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `s_id`, `name`, `is_d`, `is_bl`, `is_en`, `is_c`, `is_ona`, `is_outa`, `is_kt`, `is_w`, `is_s`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'a package', 1, 1, 1, 1, 1, 0, 1, 1, 1, '2023-09-11 02:55:16', NULL, NULL),
(2, 1, 'b package', 0, 1, 1, 0, 1, 0, 0, 1, 1, '2023-09-11 02:55:16', NULL, NULL),
(3, 2, 'cihoqyko@mailinator.com', 1, 1, 0, 1, 0, 0, 1, 1, 1, '2023-09-24 12:03:35', '2023-09-24 12:03:35', NULL),
(5, 3, 'lucyzamy@mailinator.com', 0, 1, 0, 1, 1, 1, 0, 0, 0, '2023-09-24 12:04:51', '2023-09-24 12:04:51', NULL),
(6, 2, 'lybuwudav@mailinator.com', 0, 1, 1, 0, 0, 1, 1, 0, 1, '2023-09-24 12:06:56', '2023-09-24 12:06:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `method`, `status`, `amount`, `token`, `response`, `created_at`, `updated_at`, `deleted_at`) VALUES
(92, 'paypal', 'SUCCESS', 68, 'A21AAJ_EkTGqPhlXMH4KqEAylTN1NvJehuomSBellwHTOHe1wk2o-LafCH3kLu6yZEVVo_xZh1VJ5aHz0iSAZYQAr9VjLDZ3A', '{\"id\":\"1WC02978N06759249\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"account_id\":\"FMTC9NVHDW72W\",\"account_status\":\"VERIFIED\",\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"A21AAJ_EkTGqPhlXMH4KqEAylTN1NvJehuomSBellwHTOHe1wk2o-LafCH3kLu6yZEVVo_xZh1VJ5aHz0iSAZYQAr9VjLDZ3A\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"4HJ53369HK788850K\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"1.68\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"32.32\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/4HJ53369HK788850K\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/4HJ53369HK788850K\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/1WC02978N06759249\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2023-10-11T11:07:25Z\",\"update_time\":\"2023-10-11T11:07:25Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"payer_id\":\"FMTC9NVHDW72W\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/1WC02978N06759249\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2023-10-11 05:30:17', '2023-10-11 05:37:26', NULL),
(94, 'paypal', 'PENDING', 34, 'A21AAJ_EkTGqPhlXMH4KqEAylTN1NvJehuomSBellwHTOHe1wk2o-LafCH3kLu6yZEVVo_xZh1VJ5aHz0iSAZYQAr9VjLDZ3A', NULL, '2023-10-11 05:31:04', '2023-10-11 05:31:04', NULL),
(95, 'paypal', 'PENDING', 34, 'A21AAJ_EkTGqPhlXMH4KqEAylTN1NvJehuomSBellwHTOHe1wk2o-LafCH3kLu6yZEVVo_xZh1VJ5aHz0iSAZYQAr9VjLDZ3A', NULL, '2023-10-11 05:31:07', '2023-10-11 05:31:07', NULL),
(96, 'paypal', 'PENDING', 34, 'A21AAJ_EkTGqPhlXMH4KqEAylTN1NvJehuomSBellwHTOHe1wk2o-LafCH3kLu6yZEVVo_xZh1VJ5aHz0iSAZYQAr9VjLDZ3A', NULL, '2023-10-11 05:31:09', '2023-10-11 05:31:09', NULL),
(97, 'paypal', 'PENDING', 34, 'A21AAJ_EkTGqPhlXMH4KqEAylTN1NvJehuomSBellwHTOHe1wk2o-LafCH3kLu6yZEVVo_xZh1VJ5aHz0iSAZYQAr9VjLDZ3A', NULL, '2023-10-11 05:31:11', '2023-10-11 05:31:11', NULL),
(98, 'paypal', 'SUCCESS', 34, 'ITFGTY8bhGVEcUczWUMe', '{\"id\":\"9JF786446H2178416\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"account_id\":\"FMTC9NVHDW72W\",\"account_status\":\"VERIFIED\",\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"ITFGTY8bhGVEcUczWUMe\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"2YV869488X938961K\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"1.68\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"32.32\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/2YV869488X938961K\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/2YV869488X938961K\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/9JF786446H2178416\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2023-10-11T11:08:02Z\",\"update_time\":\"2023-10-11T11:08:02Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"payer_id\":\"FMTC9NVHDW72W\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/9JF786446H2178416\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2023-10-11 05:37:52', '2023-10-11 05:38:02', NULL),
(99, 'paypal', 'PENDING', 34, 'dwJjzDLr8wNXCcmZMX6s', NULL, '2023-10-11 05:37:55', '2023-10-11 05:37:55', NULL),
(100, 'paypal', 'PENDING', 34, 'uNO57X9DXn8pKBJFtr84', NULL, '2023-10-11 10:28:22', '2023-10-11 10:28:22', NULL),
(101, 'paypal', 'PENDING', 34, 'E60WILiayxLdidllSfWM', NULL, '2023-10-11 10:29:35', '2023-10-11 10:29:35', NULL),
(102, 'paypal', 'PENDING', 34, 'rW9L0GMAmr8FZnEdh2Dh', NULL, '2023-10-11 10:29:37', '2023-10-11 10:29:37', NULL),
(103, 'paypal', 'SUCCESS', 34, 'ad521pnLr76unfLeCF62', '{\"id\":\"5FR65931YN286372L\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"account_id\":\"FMTC9NVHDW72W\",\"account_status\":\"VERIFIED\",\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"ad521pnLr76unfLeCF62\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"2HD15627DV263460W\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"1.68\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"32.32\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/2HD15627DV263460W\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/2HD15627DV263460W\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/5FR65931YN286372L\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2023-10-11T16:00:06Z\",\"update_time\":\"2023-10-11T16:00:06Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"payer_id\":\"FMTC9NVHDW72W\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/5FR65931YN286372L\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2023-10-11 10:29:50', '2023-10-11 10:30:06', NULL),
(104, 'paypal', 'PENDING', 34, 'nKuYDcV4ionzOvwYWrdh', NULL, '2023-10-11 10:29:52', '2023-10-11 10:29:52', NULL),
(105, 'paypal', 'PENDING', 34, 'T1cwthMtl0tykDAzEovf', NULL, '2023-10-12 08:09:22', '2023-10-12 08:09:22', NULL),
(106, 'paypal', 'SUCCESS', 34, 'JgfKwfg4I7hh0c4szIP6', '{\"id\":\"70B99126PY917421L\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"account_id\":\"FMTC9NVHDW72W\",\"account_status\":\"VERIFIED\",\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"JgfKwfg4I7hh0c4szIP6\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"5NA830947G2470941\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"1.68\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"32.32\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/5NA830947G2470941\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/5NA830947G2470941\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/70B99126PY917421L\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2023-10-12T13:42:07Z\",\"update_time\":\"2023-10-12T13:42:07Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"payer_id\":\"FMTC9NVHDW72W\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/70B99126PY917421L\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2023-10-12 08:11:52', '2023-10-12 08:12:08', NULL),
(107, 'paypal', 'PENDING', 34, 'tFKrfoMdv7vGINgpbVF1', NULL, '2023-10-12 08:11:55', '2023-10-12 08:11:55', NULL),
(108, 'paypal', 'SUCCESS', 34, '4KZWXxCMQc33j6k8j97B', '{\"id\":\"64C626160B2695903\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"account_id\":\"FMTC9NVHDW72W\",\"account_status\":\"VERIFIED\",\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"4KZWXxCMQc33j6k8j97B\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"4M9224393V476173N\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"1.68\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"32.32\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/4M9224393V476173N\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/4M9224393V476173N\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/64C626160B2695903\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2023-10-12T13:58:36Z\",\"update_time\":\"2023-10-12T13:58:36Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"payer_id\":\"FMTC9NVHDW72W\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/64C626160B2695903\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2023-10-12 08:28:22', '2023-10-12 08:28:37', NULL),
(109, 'paypal', 'PENDING', 34, 'prD4iNn2lWi6F5eHpcFt', NULL, '2023-10-12 08:28:24', '2023-10-12 08:28:24', NULL),
(110, 'paypal', 'SUCCESS', 34, 'gP95Q02SwApOMqyz6Dqj', '{\"id\":\"0LM504746N062545D\",\"status\":\"COMPLETED\",\"payment_source\":{\"paypal\":{\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"account_id\":\"FMTC9NVHDW72W\",\"account_status\":\"VERIFIED\",\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"address\":{\"country_code\":\"US\"}}},\"purchase_units\":[{\"reference_id\":\"gP95Q02SwApOMqyz6Dqj\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"1 Main St\",\"admin_area_2\":\"San Jose\",\"admin_area_1\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"payments\":{\"captures\":[{\"id\":\"47H07701HT464580D\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"seller_receivable_breakdown\":{\"gross_amount\":{\"currency_code\":\"USD\",\"value\":\"34.00\"},\"paypal_fee\":{\"currency_code\":\"USD\",\"value\":\"1.68\"},\"net_amount\":{\"currency_code\":\"USD\",\"value\":\"32.32\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/47H07701HT464580D\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/47H07701HT464580D\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/0LM504746N062545D\",\"rel\":\"up\",\"method\":\"GET\"}],\"create_time\":\"2023-10-12T14:25:49Z\",\"update_time\":\"2023-10-12T14:25:49Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-b47jqd21690968@personal.example.com\",\"payer_id\":\"FMTC9NVHDW72W\",\"address\":{\"country_code\":\"US\"}},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/0LM504746N062545D\",\"rel\":\"self\",\"method\":\"GET\"}]}', '2023-10-12 08:55:32', '2023-10-12 08:55:50', NULL),
(111, 'paypal', 'PENDING', 34, 'BksbIBVi0cjxTwV0yciA', NULL, '2023-10-12 08:55:35', '2023-10-12 08:55:35', NULL),
(112, 'paypal', 'PENDING', 123, 'NeccfHWWqbszkPqlHaDl', NULL, '2023-10-12 22:27:56', '2023-10-12 22:27:56', NULL),
(113, 'paypal', 'PENDING', 123, 'mQrmxBq6QedIJvjYDVqi', NULL, '2023-10-12 22:27:59', '2023-10-12 22:27:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE `ports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `name`, `description`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abc departure_ports', 'asdasas', 'sadsad', '2023-09-12 22:18:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cd_id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'REQUESTED',
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cl_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `launch_at` year(4) NOT NULL,
  `last_refit_at` year(4) NOT NULL,
  `gt` int(11) NOT NULL,
  `length` double NOT NULL,
  `width` double NOT NULL,
  `speed` int(11) NOT NULL,
  `decks` int(11) NOT NULL,
  `nop` int(11) NOT NULL,
  `no_crew` int(11) NOT NULL,
  `no_cabins` int(11) NOT NULL,
  `wa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `cl_id`, `type_id`, `name`, `description`, `img`, `style`, `size`, `type`, `launch_at`, `last_refit_at`, `gt`, `length`, `width`, `speed`, `decks`, `nop`, `no_crew`, `no_cabins`, `wa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'abc', 'asdasdsad', 'Carnival-Freedom-Cruise-Ship.jpg', '12', '12', '12', 2023, 0000, 11, 12, 12, 12, 12, 12, 12, 12, 12, '2023-09-10 22:50:48', NULL, NULL),
(2, 1, 1, 'abcd', 'asdsad', 'Carnival-Freedom-Cruise-Ship.jpg', '123', 'fgh', 'fgh', 2023, 0000, 11, 12, 12, 12, 12, 12, 12, 12, 12, '2023-09-10 22:50:48', NULL, NULL),
(3, 1, 1, 'abcde', 'asdsad', 'abc', 'fgh', 'gfh', 'fgh', 2023, 0000, 11, 12, 12, 12, 12, 12, 12, 12, 12, '2023-09-10 22:50:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_rooms`
--

CREATE TABLE `ship_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `room_view` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_rooms`
--

INSERT INTO `ship_rooms` (`id`, `s_id`, `room_view`, `img`, `room_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'asdasd', 'Carnival-Freedom-Cruise-Ship.jpg', 23, '2023-09-13 09:07:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_types`
--

CREATE TABLE `ship_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_types`
--

INSERT INTO `ship_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abc type', '2023-09-10 22:47:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_deals`
--

CREATE TABLE `temp_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ud_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_deals`
--

INSERT INTO `temp_deals` (`id`, `ud_id`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2023-10-11 10:28:22', '2023-10-11 10:28:22'),
(2, 1, 101, '2023-10-11 10:29:35', '2023-10-11 10:29:35'),
(3, 1, 102, '2023-10-11 10:29:37', '2023-10-11 10:29:37'),
(4, 1, 103, '2023-10-11 10:29:50', '2023-10-11 10:29:50'),
(5, 1, 104, '2023-10-11 10:29:52', '2023-10-11 10:29:52'),
(6, 1, 105, '2023-10-12 08:09:22', '2023-10-12 08:09:22'),
(7, 1, 106, '2023-10-12 08:11:52', '2023-10-12 08:11:52'),
(8, 1, 107, '2023-10-12 08:11:55', '2023-10-12 08:11:55'),
(9, 1, 108, '2023-10-12 08:28:22', '2023-10-12 08:28:22'),
(10, 1, 109, '2023-10-12 08:28:24', '2023-10-12 08:28:24'),
(11, 1, 110, '2023-10-12 08:55:32', '2023-10-12 08:55:32'),
(12, 1, 111, '2023-10-12 08:55:35', '2023-10-12 08:55:35'),
(13, 3, 112, '2023-10-12 22:27:56', '2023-10-12 22:27:56'),
(14, 3, 113, '2023-10-12 22:27:59', '2023-10-12 22:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_deals`
--

CREATE TABLE `upcoming_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `sr_id` bigint(20) UNSIGNED NOT NULL,
  `dp_id` bigint(20) UNSIGNED NOT NULL,
  `ap_id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `depart_at` datetime NOT NULL,
  `arrive_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upcoming_deals`
--

INSERT INTO `upcoming_deals` (`id`, `s_id`, `sr_id`, `dp_id`, `ap_id`, `p_id`, `name`, `description`, `img`, `tax`, `price`, `depart_at`, `arrive_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, 1, 'fdg', 'dfg', 'dfg', '34.00', 34.00, '2023-09-17 22:16:11', '2023-09-16 22:16:11', NULL, NULL, NULL),
(2, 2, 1, 1, 1, 1, 'fdg', 'dfg', 'dfg', '34.00', 34.00, '2023-09-16 22:16:11', '2023-09-16 22:16:11', NULL, NULL, NULL),
(3, 1, 1, 1, 1, 1, 'Aut et ex a repellen', '<p>asdsadasd</p>', '_', '123.00', 123.00, '2006-05-28 15:09:00', '1983-05-28 08:10:00', '2023-09-25 14:52:46', '2023-09-25 14:52:46', NULL),
(4, 3, 1, 1, 1, 1, 'Provident dolores d', '<p>232323</p>', '_', '23.00', 2323.00, '2007-08-21 15:04:00', '1992-05-25 19:03:00', '2023-09-25 15:39:17', '2023-09-25 15:39:17', NULL);

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Angelica David', 'test@test.com', NULL, '$2y$10$uVAHbRQ//NLoC.iA0qGmdOpFkOYrtF7mc3UsXt3yqqCgW8.L4Nlhi', NULL, '2023-09-11 03:53:15', '2023-09-11 03:53:15'),
(2, 'Angelica David', 'test1@test.com', NULL, '$2y$10$uVAHbRQ//NLoC.iA0qGmdOpFkOYrtF7mc3UsXt3yqqCgW8.L4Nlhi', NULL, '2023-09-11 03:53:15', '2023-09-11 03:53:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `available_rooms`
--
ALTER TABLE `available_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_wallets`
--
ALTER TABLE `company_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruise_deals`
--
ALTER TABLE `cruise_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cruise_deals_ud_id_foreign` (`ud_id`),
  ADD KEY `cruise_deals_user_id_foreign` (`user_id`);

--
-- Indexes for table `cruise_lines`
--
ALTER TABLE `cruise_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruise_line_agents`
--
ALTER TABLE `cruise_line_agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cruise_line_agents_email_unique` (`email`),
  ADD KEY `cruise_line_agents_cl_id_foreign` (`cl_id`);

--
-- Indexes for table `cruise_line_payments`
--
ALTER TABLE `cruise_line_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruise_line_wallets`
--
ALTER TABLE `cruise_line_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_feedback_cd_id_foreign` (`cd_id`),
  ADD KEY `customer_feedback_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_supporters`
--
ALTER TABLE `customer_supporters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_supporters_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `live_chats`
--
ALTER TABLE `live_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `live_chats_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_s_id_foreign` (`s_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refunds_cd_id_foreign` (`cd_id`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ships_cl_id_foreign` (`cl_id`),
  ADD KEY `ships_type_id_foreign` (`type_id`);

--
-- Indexes for table `ship_rooms`
--
ALTER TABLE `ship_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_rooms_s_id_foreign` (`s_id`);

--
-- Indexes for table `ship_types`
--
ALTER TABLE `ship_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_deals`
--
ALTER TABLE `temp_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temp_deals_ud_id_foreign` (`ud_id`),
  ADD KEY `temp_deals_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `upcoming_deals`
--
ALTER TABLE `upcoming_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upcoming_deals_s_id_foreign` (`s_id`),
  ADD KEY `upcoming_deals_sr_id_foreign` (`sr_id`),
  ADD KEY `upcoming_deals_dp_id_foreign` (`dp_id`),
  ADD KEY `upcoming_deals_ap_id_foreign` (`ap_id`),
  ADD KEY `upcoming_deals_p_id_foreign` (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_rooms`
--
ALTER TABLE `available_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_wallets`
--
ALTER TABLE `company_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cruise_deals`
--
ALTER TABLE `cruise_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cruise_lines`
--
ALTER TABLE `cruise_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cruise_line_agents`
--
ALTER TABLE `cruise_line_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cruise_line_payments`
--
ALTER TABLE `cruise_line_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cruise_line_wallets`
--
ALTER TABLE `cruise_line_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_supporters`
--
ALTER TABLE `customer_supporters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_chats`
--
ALTER TABLE `live_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ports`
--
ALTER TABLE `ports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ships`
--
ALTER TABLE `ships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship_rooms`
--
ALTER TABLE `ship_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ship_types`
--
ALTER TABLE `ship_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_deals`
--
ALTER TABLE `temp_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `upcoming_deals`
--
ALTER TABLE `upcoming_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_rooms`
--
ALTER TABLE `available_rooms`
  ADD CONSTRAINT `available_rooms_ud_id_foreign` FOREIGN KEY (`ud_id`) REFERENCES `upcoming_deals` (`id`);

--
-- Constraints for table `cruise_deals`
--
ALTER TABLE `cruise_deals`
  ADD CONSTRAINT `cruise_deals_ud_id_foreign` FOREIGN KEY (`ud_id`) REFERENCES `upcoming_deals` (`id`),
  ADD CONSTRAINT `cruise_deals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cruise_line_agents`
--
ALTER TABLE `cruise_line_agents`
  ADD CONSTRAINT `cruise_line_agents_cl_id_foreign` FOREIGN KEY (`cl_id`) REFERENCES `cruise_lines` (`id`);

--
-- Constraints for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD CONSTRAINT `customer_feedback_cd_id_foreign` FOREIGN KEY (`cd_id`) REFERENCES `cruise_deals` (`id`),
  ADD CONSTRAINT `customer_feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `live_chats`
--
ALTER TABLE `live_chats`
  ADD CONSTRAINT `live_chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `ships` (`id`);

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_cd_id_foreign` FOREIGN KEY (`cd_id`) REFERENCES `cruise_deals` (`id`);

--
-- Constraints for table `ships`
--
ALTER TABLE `ships`
  ADD CONSTRAINT `ships_cl_id_foreign` FOREIGN KEY (`cl_id`) REFERENCES `cruise_lines` (`id`),
  ADD CONSTRAINT `ships_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `ship_types` (`id`);

--
-- Constraints for table `ship_rooms`
--
ALTER TABLE `ship_rooms`
  ADD CONSTRAINT `ship_rooms_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `ships` (`id`);

--
-- Constraints for table `temp_deals`
--
ALTER TABLE `temp_deals`
  ADD CONSTRAINT `temp_deals_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `temp_deals_ud_id_foreign` FOREIGN KEY (`ud_id`) REFERENCES `upcoming_deals` (`id`);

--
-- Constraints for table `upcoming_deals`
--
ALTER TABLE `upcoming_deals`
  ADD CONSTRAINT `upcoming_deals_ap_id_foreign` FOREIGN KEY (`ap_id`) REFERENCES `ports` (`id`),
  ADD CONSTRAINT `upcoming_deals_dp_id_foreign` FOREIGN KEY (`dp_id`) REFERENCES `ports` (`id`),
  ADD CONSTRAINT `upcoming_deals_p_id_foreign` FOREIGN KEY (`p_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `upcoming_deals_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `ships` (`id`),
  ADD CONSTRAINT `upcoming_deals_sr_id_foreign` FOREIGN KEY (`sr_id`) REFERENCES `ship_rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
