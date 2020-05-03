-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 08:56 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blue_shark`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sports` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `sports`, `address`, `telephone`, `responsible`, `created_at`, `updated_at`) VALUES
(4, 'second', '1,3', 'fgfgfgfgfg', '56467980', 'mohamed', '2020-01-27 06:58:04', '2020-01-27 07:33:34'),
(6, 'third', '1,2,4', 'fgfgfgfgfg', '56467980', 'mohamed', '2020-01-30 10:41:58', '2020-01-30 10:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leadSource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sports` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert_by` int(11) DEFAULT NULL,
  `convert_time` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branches` int(20) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `fees` double DEFAULT NULL,
  `subscriptionDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstName`, `lastName`, `mobile`, `email`, `age`, `birthdate`, `gender`, `address`, `city`, `leadSource`, `status`, `profileImage`, `sports`, `notes`, `level`, `rate`, `unions`, `convert_by`, `convert_time`, `user_id`, `branches`, `group_id`, `fees`, `subscriptionDate`, `created_at`, `updated_at`) VALUES
(13, 'eman', 'amr', '1234546', 'eman@gmail.com', 44, '02/20/2020', 'female', 'fgfgfgfgfg', 'egypt', 'facebook', 'no answer', NULL, '1', 'gbgbgb', 'one', '100p', 'union', 0, '0000-00-00 00:00:00', 1, 4, 5, 200, '02/18/2020', '2020-02-04 09:54:34', '2020-02-05 05:48:55'),
(14, 'emad', 'mohamed', '1234546', 'emad@gmail.com', 45, '02/20/2020', 'male', 'fgfgfgfgfg', 'egypt', 'call', 'cold-contact in future', NULL, '1,2', 'heryhyjhy', 'one', '2554', 'union', 0, '0000-00-00 00:00:00', 8, 4, 5, 300, '02/11/2020', '2020-02-04 10:55:24', '2020-02-05 06:40:14'),
(15, 'sama', 'ahmed', '1234546', 'sama@gmail.com', 23, '02/19/2020', 'female', 'fgfgfgfgfg', 'egypt', 'facebook', 'no answer', NULL, '1', '3r4rew', '', '', '', 1, '2020-02-04 13:12:20', 8, 6, NULL, NULL, NULL, '2020-02-04 11:12:20', '2020-02-04 11:12:20'),
(16, 'karm', 'amir', '1234546', 'karm@gmail.com', 25, '02/04/2020', 'male', 'fgfgfgfgfg', 'egypt', 'facebook', 'no answer', NULL, '1', ';pp;;pp;p', 'one', '100p', 'union', NULL, NULL, 1, 4, 6, 210, '02/11/2020', '2020-02-05 06:25:35', '2020-02-05 06:36:30'),
(17, 'omar', 'ahmed', '1234546', 'omar@gmail.com', 88, '02/05/2020', 'female', 'bhtfcnyg', 'egypt', 'call', 'no answer', NULL, '2,4', 'hkgjh', 'one', '2554', 'union', NULL, NULL, 1, 6, 6, 200, '02/12/2020', '2020-02-18 11:57:05', '2020-02-18 11:57:05'),
(18, 'ahmed', 'ahmed', '1234546', 'jj@gmail.com', 89, '03/18/2020', 'female', 'fgfgfgfgfg', 'egypty', 'facebook', 'no answer', NULL, '1,5', 'ljklkklk', NULL, NULL, NULL, 1, '2020-03-03 14:16:34', 1, 4, NULL, NULL, NULL, '2020-03-03 12:16:34', '2020-03-03 12:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `c_attendances`
--

CREATE TABLE `c_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` int(11) NOT NULL,
  `date` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_attendances`
--

INSERT INTO `c_attendances` (`id`, `contact_id`, `date`, `month`, `status`, `time`, `user_id`, `branch_id`, `sport_id`, `created_at`, `updated_at`) VALUES
(1, 13, '2020-02-19', 2, 0, '07:49:37', 1, 4, 1, '2020-02-19 05:49:39', '2020-02-19 08:03:16'),
(2, 15, '03/12/2020', 3, 1, '07:49:58', 1, 4, 2, '2020-02-19 05:49:59', '2020-03-01 12:37:30'),
(3, 1, '02/13/2020', 2, 0, '10:21:34', 1, 4, 2, '2020-02-19 08:21:42', '2020-02-19 08:21:42'),
(5, 13, '2020-02-19', 2, 1, '02:07:49', 1, 6, 1, '2020-02-19 12:08:34', '2020-02-19 12:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `statement`, `amount`, `date`, `month`, `user_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'block34', 66.4, '02/13/2020', 2, 1, 'rrrrrr', '2020-02-23 08:18:55', '2020-02-25 07:56:42'),
(2, 'expense 2', 10.1, '02/13/2020', 2, 1, 'cccccccccccccc', '2020-02-25 08:04:17', '2020-02-25 08:04:17'),
(3, 'block3', 66.4, '03/30/2020', 3, 1, '///////////////////////////', '2020-03-04 05:52:27', '2020-03-04 05:52:27');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `branches` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriptionDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `mobile`, `email`, `address`, `city`, `responsible_name`, `notes`, `branches`, `subscriptionDate`, `created_at`, `updated_at`) VALUES
(5, 'group 1', '1234546', 'info3@gmail.com', 'fgfgfgfgfg', 'egypt', 'mohamed', 'tghtght', '4', '02/06/2020', '2020-02-04 11:38:04', '2020-02-04 11:51:46'),
(6, 'group 2', '1234546', 'g2@gmail.com', 'fgfgfgfgfg', 'egypty', 'mohamed', 'jjjjjjjjjjjjjjjjjjjjj', '4,6', '01/02/2020', '2020-02-05 05:15:13', '2020-02-05 05:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `group_sports`
--

CREATE TABLE `group_sports` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `fees` double NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_sports`
--

INSERT INTO `group_sports` (`id`, `group_id`, `sport_id`, `fees`, `count`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 200, 50, '2020-02-05 05:15:14', '2020-02-05 05:15:14'),
(2, 7, 1, 300, 10, '2020-03-03 12:09:28', '2020-03-03 12:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leadSource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sports` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `firstName`, `lastName`, `mobile`, `email`, `age`, `birthdate`, `gender`, `address`, `city`, `leadSource`, `status`, `sports`, `notes`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 'noor', 'mostafa', '1234546', 'noor@gmail.com', 23, '02/29/2020', 'female', 'fgfgfgfgfg', 'egypt', 'facebook', 'contacted', '1', 'frfgrfgre', 1, '2020-02-04 11:05:09', '2020-02-04 11:05:09'),
(11, 'kkkk', 'mohamed', '1234546', 'hjh@gmail.com', 76, '03/05/2020', 'male', 'fgfgfgfgfg', 'egypt', 'facebook', 'contacted', '1', 'gjjhjgh', 1, '2020-03-03 12:21:17', '2020-03-03 12:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `manager_attendances`
--

CREATE TABLE `manager_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `over` double DEFAULT NULL,
  `penality` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager_attendances`
--

INSERT INTO `manager_attendances` (`id`, `date`, `month`, `over`, `penality`, `status`, `manager_id`, `user_id`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, '02/11/2020', 2, NULL, NULL, 0, 5, 1, 6, '2020-02-18 05:35:07', '2020-02-26 09:37:35'),
(2, '02/06/2020', 2, 34, NULL, 1, 8, 1, 4, '2020-02-18 05:38:50', '2020-02-18 05:54:05'),
(3, '03/14/2020', 3, 34, NULL, 0, 5, 1, 6, '2020-02-18 05:53:53', '2020-02-26 09:37:48'),
(4, '02/17/2020', 2, 55, NULL, 1, 5, 1, 4, '2020-02-20 06:58:53', '2020-02-26 09:37:57'),
(5, '02/20/2020', 2, 23, 1, 1, 9, 1, 4, '2020-02-26 09:42:58', '2020-02-26 09:42:58'),
(6, '02/04/2020', 2, 8989, NULL, 1, 9, 1, 4, '2020-02-26 10:11:24', '2020-03-04 05:53:36'),
(7, '2020-03-04', 3, 4545666565, 3434, 0, 9, 1, 4, '2020-03-04 05:53:23', '2020-03-04 05:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `marketer_attendances`
--

CREATE TABLE `marketer_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `over` double DEFAULT NULL,
  `penality` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `marketer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketer_attendances`
--

INSERT INTO `marketer_attendances` (`id`, `date`, `month`, `over`, `penality`, `status`, `marketer_id`, `user_id`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, '2020-02-20', 2, 233, NULL, 1, 8, 1, 4, '2020-02-20 07:48:13', '2020-02-20 07:51:26'),
(2, '2020-02-20', 2, 24, NULL, 1, 8, 1, 6, '2020-02-20 10:52:15', '2020-02-20 10:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `image`, `status`, `created_at`, `updated_at`) VALUES
(12, '3', '1', 'helloo', NULL, 'read', '2020-02-11 08:20:06', '2020-02-11 08:20:06'),
(13, '4', '1', 'hhgfhgfh', NULL, 'read', '2020-02-13 07:58:39', '2020-02-13 07:58:39'),
(14, '3', '1', 'ngnghnjnggggggggggggggggggjfn', '14_img.png', 'read', '2020-02-20 11:47:01', '2020-02-20 11:47:01'),
(15, '1', '3', 'test me', NULL, 'read', NULL, NULL),
(16, '3', '1', 'test2', NULL, 'unread', '2020-02-13 22:00:00', '2020-02-20 11:47:01'),
(17, '1', '3', 'test 3', NULL, 'unread', '2020-02-23 06:15:11', '2020-02-23 06:15:11');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_01_26_125343_create_sports_table', 1),
(10, '2020_01_26_133921_create_branches_table', 1),
(18, '2020_01_26_125343_create_contacts_table', 2),
(19, '2020_01_28_074013_create_leads_table', 2),
(20, '2020_01_28_074438_create_groups_table', 2),
(21, '2020_01_28_074454_create_trainers_table', 2),
(22, '2020_01_29_090702_create_messages_table', 3),
(23, '2020_01_30_110329_create_management_members_table', 4),
(24, '2020_02_02_130439_create_payments_table', 5),
(25, '2020_02_17_074343_create_t_attendaces_table', 6),
(26, '2020_02_17_141320_create_m_attendances_table', 7),
(27, '2020_02_18_075935_create_c_attendances_table', 8),
(28, '2020_02_20_082915_create_marketer_attendances_table', 9),
(29, '2020_02_23_085958_create_revenues_table', 10),
(30, '2020_02_23_090030_create_expenses_table', 10);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fees` double NOT NULL,
  `rest` double NOT NULL,
  `month` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `receipt_no`, `contact_id`, `fees`, `rest`, `month`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '34r', 13, 100, 100, 1, 1, '2020-02-25 10:04:06', '2020-02-25 10:04:06'),
(2, '8u87u8', 16, 10, 200, 2, 1, '2020-03-04 05:51:55', '2020-03-04 05:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenues`
--

INSERT INTO `revenues` (`id`, `statement`, `amount`, `date`, `month`, `user_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'block', 66.4, '02/10/2020', 2, 1, 'bbbb', '2020-02-23 07:51:48', '2020-02-25 07:54:45'),
(2, 'block2', 66.4, '02/05/2020', 2, 1, 'rrrr', '2020-02-23 08:16:40', '2020-02-23 08:16:40'),
(3, 'block34', 66.4, '03/24/2020', 3, 1, 'kmj/./.?.', '2020-03-04 05:52:13', '2020-03-04 05:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `time_from` varchar(255) NOT NULL,
  `time_to` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `branch_id`, `sport_id`, `trainer_id`, `count`, `time_from`, `time_to`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 8, 20, '12:00', '13:00', '2020-02-05 07:36:35', '2020-02-05 07:54:17'),
(2, 6, 2, 8, 12, '22:00', '12:00', '2020-03-04 05:34:33', '2020-03-04 05:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `name`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'handball', 'female', '2020-01-26 12:11:28', '2020-01-30 10:02:17'),
(2, 'football', 'male', '2020-01-26 12:58:54', '2020-01-26 12:58:54'),
(3, 'basketball', 'both', '2020-01-30 10:02:29', '2020-01-30 10:02:29'),
(4, 'swimming', 'both', '2020-01-30 10:02:29', '2020-01-30 10:02:29'),
(5, 'boxing', 'male', '2020-02-20 06:58:41', '2020-02-20 06:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sports` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_per_hour` double NOT NULL,
  `salary_per_month` double NOT NULL,
  `branches` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `firstName`, `lastName`, `mobile`, `email`, `address`, `city`, `profileImage`, `sports`, `notes`, `salary_per_hour`, `salary_per_month`, `branches`, `created_at`, `updated_at`) VALUES
(8, 'karim', 'mohamed', '1234546', 'mostafa@gmail.com', 'fgfgfgfgfg', 'egypt', '8_img.png', '1', 'gfhfghg', 100, 2000, '6', '2020-02-02 10:16:57', '2020-02-20 09:52:58'),
(9, 'kamal', 'mohamed', '1234546', 'info2@gmail.com', 'fgfgfgfgfg', 'egypty', '9_img.jfif', '1,2', 'bfbfb', 455, 566, '4', '2020-02-17 09:48:42', '2020-03-03 12:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `t_attendances`
--

CREATE TABLE `t_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `over` double DEFAULT NULL,
  `penality` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `trainer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_attendances`
--

INSERT INTO `t_attendances` (`id`, `date`, `month`, `over`, `penality`, `status`, `trainer_id`, `user_id`, `branch_id`, `sport_id`, `created_at`, `updated_at`) VALUES
(1, '2020-02-17', 2, 34, NULL, 0, 8, 1, 4, 2, '2020-02-17 09:38:59', '2020-02-17 11:59:26'),
(4, '2020-02-20', 2, 23, NULL, 1, 9, 1, 6, 1, '2020-02-20 10:07:05', '2020-02-20 10:07:05'),
(5, '2020-04-23', 2, 567, 789, 1, 9, 1, 4, 1, '2020-02-23 09:22:22', '2020-02-23 09:22:22'),
(6, '06/19/2020', 6, 4545, 343451, 1, 9, 1, 4, 5, '2020-02-23 10:37:15', '2020-02-23 10:38:44'),
(7, '2020-02-23', 2, 4545666565, 1, 1, 9, 1, 4, 1, '2020-02-23 11:52:42', '2020-02-23 11:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branches` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `city`, `profileImage`, `notes`, `branches`, `profession`, `permission`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shereen', 'mohamed', 'info@gmail.com', '1234546', 'fgfgfgfgfg', 'egypt', '1_img.jpg', 'gte', '6', 'admin', 'editor', '$2y$10$R.B.eb0FylCUzqHGcjm4UO73T3f.jJ55ZnaKlbueunUZWwi4WzhSS', NULL, '2020-02-04 06:03:58', '2020-02-26 11:52:11'),
(3, 'malak', 'mohamed', 'malak@gmail.com', '1234546', 'fgfgfgfgfg', 'egypt', '3_img.jpg', 'erer', '4', 'admin', 'author', '$2y$10$aSTc4numT9t34YalWTrUHu5zzWq.cYafv/5oaQv1cvtN3sf3COZe6', NULL, '2020-02-04 06:32:04', '2020-02-04 06:43:34'),
(4, 'omar', 'mohamed', 'omar@gmail.com', '1234546', 'fgfgfgfgfg', 'egypt', NULL, 'grteg', '4', 'admin', 'author', '$2y$10$7/ZIEMujQUClyrfUTmvWrerSB7iuEj9Kkt00mbVFQGdvreAo7z1tm', NULL, '2020-02-04 06:44:31', '2020-02-04 06:44:31'),
(5, 'amr', 'mohamed', 'amr@gmail.com', '1234546', 'fgfgfgfgfg', 'egypt', '5_img.jpg', 'rfefrg', '6,4', 'management', 'author', '$2y$10$JKjMg.JrY7UbEiBR9gA7EegV9rA5LfeeD8.VCbixuUnTf85XvG3/2', NULL, '2020-02-04 07:00:59', '2020-03-03 12:49:32'),
(8, 'saraa5', 'ahmed', 'sara@gmail.com', '1234546', 'fgfgfgfgfg', 'egypt', '8_img.png', 'fgegrg', '4,6', 'marketing', 'author', '$2y$10$L0aoqC0xQ2FczwA3wtWOLOJjOM5yCZqyV.xoJ9P2o6ejanluSV7Uq', NULL, '2020-02-04 07:53:07', '2020-03-04 05:31:52'),
(9, 'amir', 'mohamed', 'amir@test.com', '1344456', 'dgbgbgfb', 'dbgbg', NULL, 'bgfbgf', '4,6', 'management', 'admin', '123', NULL, NULL, '2020-03-03 12:42:50'),
(10, 'samy', 'mohamed', 'samy@gmail.com', '1234546', 'rf', 'egypt', '10_img.png', 'sgfgfg', '4', 'management', 'editor', '$2y$10$mqkveswgXcLyv6pfxKUqwePXrMIPXRTD5URM4Mg8ma31P6qsWSozm', NULL, '2020-03-03 12:41:57', '2020-03-03 12:41:57'),
(11, 'sama', 'mohamedd', 'sama@gmail.com', '4353463565', 'fgfgfgfgfg', 'egypt', '11_img.jpg', 'efvevfdsav', '4,6', 'marketing', 'author', '$2y$10$SH6A4nOt6vxgubBRNyNpxOWwIRdm4E/DDUNyxTiF7s5It1iSzog.K', NULL, '2020-03-04 05:29:03', '2020-03-04 05:29:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_attendances`
--
ALTER TABLE `c_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_sports`
--
ALTER TABLE `group_sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager_attendances`
--
ALTER TABLE `manager_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketer_attendances`
--
ALTER TABLE `marketer_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_attendances`
--
ALTER TABLE `t_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `c_attendances`
--
ALTER TABLE `c_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_sports`
--
ALTER TABLE `group_sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manager_attendances`
--
ALTER TABLE `manager_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `marketer_attendances`
--
ALTER TABLE `marketer_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_attendances`
--
ALTER TABLE `t_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
