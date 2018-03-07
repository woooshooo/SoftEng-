-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2018 at 08:14 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE IF NOT EXISTS `borrow` (
  `borrow_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateborrowed` date NOT NULL,
  `returndate` date DEFAULT NULL,
  `profile_id` int(11) NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`borrow_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `dateborrowed`, `returndate`, `profile_id`, `purpose`, `created_at`, `updated_at`) VALUES
(1, '2018-02-26', '2018-02-26', 1, 'Tessssst Borrow', NULL, NULL),
(2, '2018-02-26', '2018-02-26', 1, 'Tessssst Borrow', NULL, NULL),
(3, '2018-02-26', '2018-02-26', 25, 'test', NULL, NULL),
(4, '2018-02-26', '2018-02-26', 13, 'test', NULL, NULL),
(5, '2018-02-26', '2018-02-26', 1, 'ty', NULL, NULL),
(6, '2018-02-26', '2018-02-26', 1, 'test', NULL, NULL),
(7, '2018-03-05', NULL, 25, 'Sound trip in Recording Studio', NULL, NULL),
(8, '2018-03-07', '2018-03-07', 25, 'Test Purpose', NULL, NULL),
(9, '2018-03-07', NULL, 25, 'For Sound System', NULL, NULL),
(10, '2018-03-07', '2018-03-07', 25, 'validation test', NULL, NULL),
(11, '2018-03-07', NULL, 25, 'single validation test', NULL, NULL),
(12, '2018-03-07', '2018-03-07', 25, 'multiple validation test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

DROP TABLE IF EXISTS `borrow_details`;
CREATE TABLE IF NOT EXISTS `borrow_details` (
  `borrow_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `equipment_details_id` int(10) UNSIGNED NOT NULL,
  `numberofdays` double NOT NULL,
  `quantity_borrowed` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`borrow_details_id`),
  KEY `borrow_id` (`borrow_id`),
  KEY `equipment_details_id` (`equipment_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`borrow_details_id`, `borrow_id`, `equipment_details_id`, `numberofdays`, `quantity_borrowed`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 1, '2018-02-26 00:11:03', '2018-02-26 00:11:03'),
(2, 2, 8, 1, 2, '2018-02-26 00:11:03', '2018-02-26 00:11:03'),
(3, 3, 8, 2, 2, '2018-02-26 01:04:54', '2018-02-26 01:04:54'),
(4, 4, 5, 3, 1, '2018-02-26 03:33:26', '2018-02-26 03:33:26'),
(5, 5, 1, 1, 2, '2018-02-26 03:34:09', '2018-02-26 03:34:09'),
(6, 6, 1, 2, 2, '2018-02-26 08:18:08', '2018-02-26 08:18:08'),
(7, 6, 8, 2, 4, '2018-02-26 08:18:08', '2018-02-26 08:18:08'),
(8, 7, 6, 1, 1, '2018-03-05 08:38:58', '2018-03-05 08:38:58'),
(9, 8, 9, 1, 1, '2018-03-06 21:56:15', '2018-03-06 21:56:15'),
(10, 8, 5, 1, 1, '2018-03-06 21:56:16', '2018-03-06 21:56:16'),
(11, 8, 1, 1, 3, '2018-03-06 21:56:16', '2018-03-06 21:56:16'),
(12, 8, 7, 1, 1, '2018-03-06 21:56:16', '2018-03-06 21:56:16'),
(13, 9, 8, 1, 2, '2018-03-06 21:56:53', '2018-03-06 21:56:53'),
(14, 10, 8, 1, 8, '2018-03-07 10:05:57', '2018-03-07 10:05:57'),
(15, 10, 9, 1, 1, '2018-03-07 10:05:57', '2018-03-07 10:05:57'),
(16, 11, 1, 1, 5, '2018-03-07 10:07:40', '2018-03-07 10:07:40'),
(17, 12, 8, 1, 8, '2018-03-07 10:08:41', '2018-03-07 10:08:41'),
(18, 12, 5, 1, 1, '2018-03-07 10:08:41', '2018-03-07 10:08:41'),
(19, 12, 8, 1, 2, '2018-03-07 10:08:42', '2018-03-07 10:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_profile`
--

DROP TABLE IF EXISTS `borrow_profile`;
CREATE TABLE IF NOT EXISTS `borrow_profile` (
  `borrow_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) NOT NULL,
  PRIMARY KEY (`borrow_profile_id`),
  KEY `borrow_id` (`borrow_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_profile`
--

INSERT INTO `borrow_profile` (`borrow_profile_id`, `borrow_id`, `profile_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 25),
(4, 4, 13),
(5, 5, 1),
(6, 6, 1),
(7, 7, 25),
(8, 8, 25),
(9, 9, 25),
(10, 10, 25),
(11, 11, 25),
(12, 12, 25);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE IF NOT EXISTS `equipments` (
  `equipment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateordered` date NOT NULL,
  `datedelivered` date NOT NULL,
  `receivedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encodedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `dateordered`, `datedelivered`, `receivedby`, `encodedby`, `created_at`, `updated_at`) VALUES
(1, '2018-02-26', '2018-02-26', 'Aivy Rose Villarba', 'Bernie Jereza', NULL, NULL),
(2, '2018-02-19', '2018-02-26', 'Aivy Rose Villarba', 'Bernie Jereza', NULL, NULL),
(3, '2018-02-19', '2018-02-26', 'Aivy Rose Villarba', 'Bernie Jereza', NULL, NULL),
(4, '2018-03-01', '2018-03-01', 'Webster Kyle Genise', 'Bernie Jereza', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_details`
--

DROP TABLE IF EXISTS `equipment_details`;
CREATE TABLE IF NOT EXISTS `equipment_details` (
  `equipment_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `equipment_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  `item_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equipment_details_id`),
  KEY `equipment_id` (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_details`
--

INSERT INTO `equipment_details` (`equipment_details_id`, `equipment_id`, `item_name`, `item_type`, `item_code`, `item_quantity`, `item_warranty`, `item_status`, `item_desc`, `created_at`, `updated_at`) VALUES
(1, 1, '16gb MicroSD', 'SD Card', 'code5', 5, NULL, 'AVAILABLE', 'Good Condition', NULL, NULL),
(2, 1, 'Flashlight', 'Misc.', 'code4', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(3, 1, 'FlyCamHD', 'Camera', 'code3', 1, NULL, 'DAMAGED', NULL, NULL, NULL),
(4, 1, 'NIKON900', 'Camera', 'code2', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(5, 1, 'DSLR 700D', 'Camera', 'code1', 1, NULL, 'AVAILABLE', 'Good', NULL, NULL),
(6, 2, 'Speaker9000', 'Speaker', 'code7', 1, NULL, 'BORROWED', NULL, NULL, NULL),
(7, 2, 'Macbook', 'Laptop', 'code6', 1, NULL, 'AVAILABLE', 'Lost the lens cap', NULL, NULL),
(8, 3, 'AUX Cable 15m', 'Cable', 'code8', 10, NULL, 'AVAILABLE', 'Good', NULL, NULL),
(9, 4, 'Telephoto Lens', 'Lens', 'code9', 2, NULL, 'AVAILABLE', 'Good Condition', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `events_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `events_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `events_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `events_startdate` date NOT NULL,
  `events_deadline` date NOT NULL,
  `events_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`events_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`events_id`, `events_name`, `events_details`, `events_startdate`, `events_deadline`, `events_status`, `created_at`, `updated_at`) VALUES
(1, 'Awitenista Coverage', 'Awitenista Coverage Details', '2018-03-03', '2018-03-04', 'Finished', '2018-03-02 08:54:47', '2018-03-05 02:31:31'),
(2, 'Baccalaureate Mass(BM)', 'Baccalaureate Mass for BM', '2018-04-06', '2018-04-06', 'Ongoing', '2018-03-05 02:46:16', '2018-03-05 02:46:16'),
(3, '5AM Mass', '5am mass', '2018-03-05', '2018-03-05', 'Finished', '2018-03-05 04:09:25', '2018-03-05 04:11:07'),
(4, 'Biology Coverage', 'Biology Coverage', '2018-03-08', '2018-03-09', 'Ongoing', '2018-03-07 10:56:36', '2018-03-07 10:56:36');

-- --------------------------------------------------------

--
-- Stand-in structure for view `event_rank`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `event_rank`;
CREATE TABLE IF NOT EXISTS `event_rank` (
`profile_id` int(10)
,`worked` bigint(21)
,`assigned` bigint(21)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `items_event`
--

DROP TABLE IF EXISTS `items_event`;
CREATE TABLE IF NOT EXISTS `items_event` (
  `items_event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `events_id` int(10) UNSIGNED NOT NULL,
  `equipment_details_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`items_event_id`),
  KEY `events_id` (`events_id`),
  KEY `equipment_details_id` (`equipment_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_event`
--

INSERT INTO `items_event` (`items_event_id`, `events_id`, `equipment_details_id`) VALUES
(1, 1, 4),
(2, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `items_project`
--

DROP TABLE IF EXISTS `items_project`;
CREATE TABLE IF NOT EXISTS `items_project` (
  `items_project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `equipment_details_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`items_project_id`),
  KEY `projects_id` (`projects_id`),
  KEY `equipment_details_id` (`equipment_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items_project`
--

INSERT INTO `items_project` (`items_project_id`, `projects_id`, `equipment_details_id`) VALUES
(1, 2, 2),
(2, 2, 8),
(3, 2, 9),
(4, 5, 4),
(5, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_15_053731_create_vols_table', 1),
(4, '2017_12_15_055142_create_profiles_table', 1),
(5, '2017_12_28_152037_staff', 1),
(6, '2017_12_30_053605_createusers', 1),
(7, '2017_12_30_074542_add_item', 1),
(8, '2017_12_30_162911_create_borrow_table', 1),
(10, '2018_01_14_070945_create_projects', 1),
(11, '2018_01_14_072323_create_events', 1),
(12, '2018_01_14_073110_profile_projects', 1),
(13, '2018_01_14_073131_profile_events', 1),
(14, '2018_01_26_060648_milestone_projects', 1),
(15, '2018_01_30_074807_item__code', 2),
(16, '2018_01_31_031917_equipment_details', 3),
(17, '2018_01_31_155208_borrow_details', 3),
(18, '2018_02_28_050313_project_items', 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `milestonesevents_finished`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `milestonesevents_finished`;
CREATE TABLE IF NOT EXISTS `milestonesevents_finished` (
`milestone_events_id` int(10) unsigned
,`events_id` int(10) unsigned
,`milestone_name` varchar(191)
,`milestone_status` varchar(191)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `milestones_finished`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `milestones_finished`;
CREATE TABLE IF NOT EXISTS `milestones_finished` (
`milestone_projects_id` int(10) unsigned
,`projects_id` int(10) unsigned
,`milestone_name` varchar(191)
,`milestone_status` varchar(191)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `milestone_events`
--

DROP TABLE IF EXISTS `milestone_events`;
CREATE TABLE IF NOT EXISTS `milestone_events` (
  `milestone_events_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `events_id` int(10) UNSIGNED NOT NULL,
  `milestone_name` varchar(191) NOT NULL,
  `milestone_status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`milestone_events_id`),
  KEY `events_id` (`events_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milestone_events`
--

INSERT INTO `milestone_events` (`milestone_events_id`, `events_id`, `milestone_name`, `milestone_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Milestone 1 for Awitenista', 'Finished', '2018-03-02 10:55:02', '2018-03-02 11:07:34'),
(2, 1, 'Milestone 2 for Awitenista', 'Finished', '2018-03-02 10:55:02', '2018-03-05 02:32:46'),
(3, 3, 'Setup', 'Finished', '2018-03-05 04:10:33', '2018-03-05 04:10:40'),
(4, 3, 'Stream', 'Finished', '2018-03-05 04:10:33', '2018-03-05 04:10:46'),
(5, 3, 'Pack Up', 'Finished', '2018-03-05 04:10:34', '2018-03-05 04:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `milestone_projects`
--

DROP TABLE IF EXISTS `milestone_projects`;
CREATE TABLE IF NOT EXISTS `milestone_projects` (
  `milestone_projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `milestone_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `milestone_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`milestone_projects_id`),
  KEY `projects_id` (`projects_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `milestone_projects`
--

INSERT INTO `milestone_projects` (`milestone_projects_id`, `projects_id`, `milestone_name`, `milestone_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Milestone One', 'Finished', '2018-03-01 20:55:25', '2018-03-05 02:00:17'),
(2, 1, 'Milestone Two', 'Finished', '2018-03-01 20:55:25', '2018-03-05 02:12:51'),
(3, 2, 'Milestone 1 Two', 'Finished', '2018-03-01 22:01:10', '2018-03-02 08:14:52'),
(4, 2, 'Milestone 2 Two', 'Finished', '2018-03-01 22:01:10', '2018-03-02 08:08:42'),
(5, 2, 'Milestone 3 Two', 'Finished', '2018-03-01 22:01:11', '2018-03-02 08:08:35'),
(6, 2, 'Milestone 4 Two', 'Finished', '2018-03-01 22:01:11', '2018-03-02 08:13:57'),
(7, 5, 'Milestone 1', 'Finished', '2018-03-01 22:29:49', '2018-03-01 22:30:03'),
(8, 5, 'Milestone 2', 'Finished', '2018-03-01 22:29:49', '2018-03-01 22:30:14'),
(9, 5, 'Milestone 3', 'Finished', '2018-03-01 22:29:50', '2018-03-01 23:03:12'),
(10, 6, 'Milestone 1', 'Finished', '2018-03-01 23:09:56', '2018-03-01 23:10:17'),
(11, 6, 'Milestone 2', 'Finished', '2018-03-01 23:10:08', '2018-03-02 06:40:59'),
(12, 2, 'Milestone 5 Two', 'Finished', '2018-03-02 08:03:56', '2018-03-02 08:16:51'),
(13, 2, 'Milestone 6 Two', 'Finished', '2018-03-02 08:03:56', '2018-03-02 08:40:19'),
(14, 2, 'Milestone 7 Two', 'Finished', '2018-03-02 08:03:56', '2018-03-05 02:24:41'),
(15, 2, 'Milestone 8 Two', 'Ongoing', '2018-03-02 08:03:56', '2018-03-02 08:03:56'),
(16, 4, 'Milestone 1', 'Finished', '2018-03-05 00:32:19', '2018-03-05 08:07:47'),
(17, 4, 'Milestone 2', 'Finished', '2018-03-05 00:32:19', '2018-03-05 08:07:55'),
(18, 4, 'Milestone 3', 'Ongoing', '2018-03-05 00:32:19', '2018-03-05 00:32:19'),
(19, 4, 'Milestone 4', 'Ongoing', '2018-03-05 00:32:19', '2018-03-05 00:32:19'),
(20, 3, 'Finish Project', 'Finished', '2018-03-05 07:00:54', '2018-03-05 07:00:59'),
(21, 8, 'Worked perfectly fine', 'Finished', '2018-03-07 11:14:37', '2018-03-07 11:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactdetails` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`profile_id`),
  UNIQUE KEY `profiles_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `firstname`, `middlename`, `lastname`, `email`, `contactdetails`, `created_at`, `updated_at`) VALUES
(1, 'Bernie', 'Manuel', 'Jereza', 'bmjereza@addu.edu.ph', '09055652213', NULL, '2018-01-25 21:53:16'),
(2, 'Aivy Rose', 'N.', 'Villarba', 'arnvillarba@addu.edu.ph', '09999999999', '2018-01-25 21:45:59', '2018-01-25 21:45:59'),
(11, 'Darlene Marie', 'M.', 'Abarcar', 'abarcardarlene@gmail.com', '09338767400', '2018-01-21 22:10:36', '2018-01-21 22:10:36'),
(12, 'Giannedale', 'M.', 'Arroyo', 'geedoreo@gmail.com', '09325370913', '2018-01-21 22:11:46', '2018-01-21 22:11:46'),
(13, 'Larissa Marie', NULL, 'Baarde', 'larissamarie25@gmail.com', '09393392063', '2018-01-21 22:13:05', '2018-01-21 22:13:05'),
(14, 'Alfonso', 'S.', 'Balao', 'abalao0816@gmail.com', '09228749980', '2018-01-21 22:13:54', '2018-01-21 22:13:54'),
(15, 'Gabrielle', 'H.', 'Balinas', 'gabebalinas@gmail.com', '09333183883', '2018-01-21 22:15:08', '2018-01-21 22:15:08'),
(16, 'Jimuel', NULL, 'Banawan', 'jwpbanawan@addu.edu.ph', '09430151214', '2018-01-21 22:16:15', '2018-01-21 22:16:15'),
(17, 'Kristen', 'T.', 'Cascaño', '10podc@gmail.com', '09999999999', '2018-01-21 22:17:59', '2018-01-21 22:17:59'),
(18, 'Kimberly Rose', 'L.', 'Chan', 'janzelle18@gmail.com', '09980620929', '2018-01-21 22:19:20', '2018-01-21 22:19:20'),
(19, 'Gauttier', 'T.', 'Concepcion', 'gauttier48@gmail.com', '09959660381', '2018-01-21 22:22:10', '2018-01-21 22:22:10'),
(20, 'Marco', NULL, 'Dabon', 'rmdabs@gmail.com', '09434699196', '2018-01-21 22:23:18', '2018-01-21 22:23:18'),
(21, 'Camille Monica', 'R.', 'Damaso', 'damasocamille@gmail.com', '09566932378', '2018-01-21 22:24:11', '2018-01-21 22:24:11'),
(22, 'David Patrick', 'F.', 'Daryanani', 'davedar724@gmail.com', '09193255347', '2018-01-21 22:25:30', '2018-01-21 22:25:30'),
(23, 'Mikhaela Angela', NULL, 'Doce', 'mikhaeladoce@gmail.com', '09778260120', '2018-01-21 22:26:34', '2018-01-21 22:26:34'),
(24, 'Elaine Angelica', 'P.', 'Ferrer', 'elaineaferrer@gmail.com', '09228259593', '2018-01-21 22:27:36', '2018-01-21 22:27:36'),
(25, 'Webster Kyle', 'Boctoto', 'Genise', 'kaykaygenise@gmail.com', '09287274683', '2018-01-21 22:28:42', '2018-01-21 22:28:42'),
(26, 'Christopher', NULL, 'Gutib', 'cjigutib@gmail.com', '09193124192', '2018-01-21 22:29:34', '2018-01-21 22:29:34'),
(27, 'Kyna Martine', 'O.', 'Heje', 'kymartine00@gmail.com', '09435129533', '2018-01-21 22:30:19', '2018-01-21 22:30:19'),
(28, 'John Ralph', 'M.', 'Lavapie', 'ralph.eipaval@gmail.com', '09179323624', '2018-01-21 22:31:13', '2018-01-21 22:31:13'),
(29, 'Richard', 'Odjinar', 'Leosala', 'chardeefaye@gmail.com', '09989523221', '2018-01-21 22:32:34', '2018-01-21 22:32:34'),
(30, 'Maria Annika', 'A.', 'Lopez', 'maalopez@addu.edu.ph', '09177097746', '2018-01-21 22:34:02', '2018-01-21 22:34:02'),
(31, 'Patria Marie', 'B.', 'Mallari', 'patria.p.mallari@gmail.com', '09323605386', '2018-01-21 22:35:02', '2018-01-21 22:35:02'),
(32, 'Jose Miguel', 'T.', 'Manulid', 'averageasian1337@gmail.com', '09238574239', '2018-01-21 22:36:18', '2018-01-21 22:36:18'),
(33, 'Jaemelli Frances', 'B.', 'Naguiat', 'jaemelli@yahoo.com', '09206781112', '2018-01-21 22:37:07', '2018-01-21 22:37:07'),
(34, 'John Micco', 'M.', 'Pitlo', 'meekhofeetlow@gmail.com', 'O9436041004', '2018-01-21 22:37:50', '2018-01-21 22:37:50'),
(35, 'Hannah Jayne', 'C.', 'Regencia', 'hregencia@gmail.com', '09234068636', '2018-01-21 22:38:51', '2018-01-21 22:38:51'),
(36, 'Adrian Kim', 'D.', 'Requillo', 'akdrequillo@gmail.com', '09774144764', '2018-01-21 22:40:12', '2018-01-21 22:40:12'),
(37, 'Chynna', NULL, 'Sevilleno', 'null@null.com', '09999999999', '2018-01-21 22:41:36', '2018-01-21 22:41:36'),
(38, 'Patricia Marie', 'A.', 'Suarez', 'patriciamasuarez13@gmail.com', '09257000606', '2018-01-21 22:43:46', '2018-01-21 22:43:46'),
(39, 'Justin', NULL, 'Tabora', 'justintabora@gmail.com', '09164235826', '2018-01-21 22:45:22', '2018-01-21 22:45:22'),
(40, 'Princess', NULL, 'Taroza', 'notinputted@yahoo.com', '09483181141', '2018-01-21 22:46:24', '2018-01-21 22:46:24'),
(41, 'Bianca', NULL, 'Valenzona', 'bmcvalenzona18@yahoo.com', 'O9338741537', '2018-01-21 22:47:35', '2018-01-21 22:47:35'),
(42, 'Lyen Krenz', NULL, 'Yap', 'OfficialEzra.C@gmail.com', '09231560814', '2018-01-21 22:48:55', '2018-01-21 22:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `profile_events`
--

DROP TABLE IF EXISTS `profile_events`;
CREATE TABLE IF NOT EXISTS `profile_events` (
  `profile_events_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) NOT NULL,
  `events_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`profile_events_id`),
  KEY `profile_id` (`profile_id`),
  KEY `events_id` (`events_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_events`
--

INSERT INTO `profile_events` (`profile_events_id`, `profile_id`, `events_id`, `status`) VALUES
(1, 14, 1, 'Assigned'),
(2, 15, 1, 'Worked'),
(3, 18, 1, 'Worked'),
(4, 12, 1, 'Worked'),
(5, 11, 1, 'Worked'),
(6, 19, 1, 'Worked'),
(7, 17, 1, 'Worked'),
(8, 24, 1, 'Worked'),
(9, 22, 1, 'Worked'),
(10, 25, 1, 'Worked'),
(11, 38, 1, 'Worked'),
(12, 36, 1, 'Worked'),
(13, 22, 3, 'Worked'),
(14, 25, 3, 'Worked'),
(15, 13, 3, 'Worked'),
(16, 12, 3, 'Worked');

-- --------------------------------------------------------

--
-- Table structure for table `profile_projects`
--

DROP TABLE IF EXISTS `profile_projects`;
CREATE TABLE IF NOT EXISTS `profile_projects` (
  `profile_projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`profile_projects_id`),
  KEY `projects_id` (`projects_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_projects`
--

INSERT INTO `profile_projects` (`profile_projects_id`, `profile_id`, `projects_id`, `status`) VALUES
(1, 20, 1, 'Worked'),
(2, 17, 1, 'Worked'),
(3, 41, 1, 'Assigned'),
(4, 12, 1, 'Assigned'),
(5, 15, 6, 'Worked'),
(6, 12, 6, 'Worked'),
(7, 22, 6, 'Worked'),
(8, 23, 6, 'Worked'),
(9, 20, 2, 'Assigned'),
(10, 21, 2, 'Assigned'),
(11, 24, 2, 'Assigned'),
(12, 15, 2, 'Assigned'),
(13, 14, 2, 'Assigned'),
(14, 13, 2, 'Assigned'),
(15, 23, 2, 'Assigned'),
(16, 34, 2, 'Assigned'),
(17, 25, 4, 'Assigned'),
(18, 34, 4, 'Assigned'),
(19, 25, 5, 'Worked'),
(20, 25, 6, 'Worked'),
(21, 39, 3, 'Worked'),
(22, 35, 3, 'Worked'),
(23, 27, 3, 'Worked'),
(24, 25, 8, 'Worked');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projects_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_startdate` date NOT NULL,
  `projects_deadline` date NOT NULL,
  `projects_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`projects_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projects_id`, `projects_name`, `projects_client`, `projects_details`, `projects_startdate`, `projects_deadline`, `projects_status`, `created_at`, `updated_at`) VALUES
(1, 'Project One', 'Client One', 'Project One Details', '2018-02-28', '2018-03-07', 'Finished', '2018-03-01 20:51:50', '2018-03-05 00:30:44'),
(2, 'Project Two', 'Client Two', 'Project Two Details', '2018-02-25', '2018-03-03', 'Ongoing', '2018-03-01 20:53:14', '2018-03-01 22:34:45'),
(3, 'Project Three', 'Client Three', 'Project Details Three', '2018-03-01', '2018-03-02', 'Finished', '2018-03-01 20:55:06', '2018-03-05 07:01:43'),
(4, 'Project Four', 'Client Four', 'Project Details Four', '2018-03-26', '2018-03-31', 'Ongoing', '2018-03-01 22:11:48', '2018-03-05 00:31:59'),
(5, 'Webster Self Project', 'Webster', 'details 5', '2018-02-27', '2018-03-02', 'Finished', '2018-03-01 22:28:08', '2018-03-05 02:48:27'),
(6, 'Project New', 'Client New', 'Details New', '2018-02-28', '2018-03-02', 'Finished', '2018-03-01 23:05:59', '2018-03-05 03:50:14'),
(7, 'Photoshoot for Yearbook', 'AdDU JHS', 'Photoshoot for Yearbook', '2018-03-06', '2018-03-16', 'Ongoing', '2018-03-05 08:21:55', '2018-03-05 08:21:55'),
(8, 'Date Validation Project', 'Date Validation Client', 'Date Validation Details', '2018-03-06', '2018-03-08', 'Finished', '2018-03-07 10:36:09', '2018-03-07 11:15:04');

-- --------------------------------------------------------

--
-- Stand-in structure for view `project_rank`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `project_rank`;
CREATE TABLE IF NOT EXISTS `project_rank` (
`profile_id` int(10)
,`worked` bigint(21)
,`assigned` bigint(21)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `cluster` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `staffs_ibfk_1` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `profile_id`, `cluster`, `staff_pos`, `staff_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'Director', 'ACTIVE', NULL, '2018-03-01 21:08:09'),
(2, 2, 'Editorial & Social Media Cluster', 'Technical Staff', 'ACTIVE', '2018-01-25 21:45:59', '2018-01-26 22:28:25');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumofborrowed`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `sumofborrowed`;
CREATE TABLE IF NOT EXISTS `sumofborrowed` (
`equipment_details_id` int(10) unsigned
,`item_name` varchar(191)
,`quantity_borrowed` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `user_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `staff_id`, `user_status`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'ACTIVE', 'admin', '$2y$10$A2BhT8qjn4cU2HPKP40ppOKBJZ84lz3nvZQ6umw/.4kTfSaJAf0ry', 'dFyofnE8ketjSDlBnl8SXEnbAiXlqpcj0zQzW3Wu84XV0lLYubZDxyjPZgjJ', '2018-01-12 10:01:39', '2018-03-01 21:08:09'),
(2, 2, 'ACTIVE', 'avillarba', '$2y$10$udxTbm/0R4M5MjGP7fIJTO3UmTuifv/Y43DJ5zFSzgUpp1YycVlJy', NULL, '2018-01-25 21:45:59', '2018-01-26 22:28:25');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_damaged`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_damaged`;
CREATE TABLE IF NOT EXISTS `view_damaged` (
`equipment_details_id` int(10) unsigned
,`equipment_id` int(10) unsigned
,`item_name` varchar(191)
,`item_type` varchar(191)
,`item_code` varchar(191)
,`item_warranty` varchar(191)
,`item_status` varchar(191)
,`item_desc` varchar(191)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_itemtype`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_itemtype`;
CREATE TABLE IF NOT EXISTS `view_itemtype` (
`item_type` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `vols`
--

DROP TABLE IF EXISTS `vols`;
CREATE TABLE IF NOT EXISTS `vols` (
  `vol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) DEFAULT NULL,
  `cluster` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearlvl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol_status` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vol_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vols`
--

INSERT INTO `vols` (`vol_id`, `profile_id`, `cluster`, `yearlvl`, `course`, `section`, `vol_status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Creative Cluster', '4th Year', 'AB-Psychology', '4-AB Psych', 'ACTIVE', '2018-01-21 22:10:36', '2018-01-26 19:57:36'),
(2, 12, 'Broadcast & Productions Cluster', '4th Year', 'AB Psychology', '4-AB Psychology', 'ACTIVE', '2018-01-21 22:11:46', '2018-03-01 21:07:57'),
(3, 13, 'Creative Cluster', '4th Year', 'AB IS Major in Asian Studies', '4-AB IS Major in Asian Studies', 'ACTIVE', '2018-01-21 22:13:05', '2018-01-21 22:13:05'),
(4, 14, 'Broadcast & Productions Cluster', '3rd Year', 'BS Information Technology', 'IT 3-A', 'ACTIVE', '2018-01-21 22:13:54', '2018-02-01 00:46:13'),
(5, 15, 'Creative Cluster', '4th Year', 'BSEd English', '4-BSEd English', 'ACTIVE', '2018-01-21 22:15:08', '2018-01-21 22:15:08'),
(6, 16, 'Broadcast & Productions Cluster', '3rd Year', 'BS Information Systems', 'InSys 3-A', 'ACTIVE', '2018-01-21 22:16:15', '2018-01-21 22:16:15'),
(7, 17, 'Broadcast & Productions Cluster', '3rd Year', 'AB Psychology', '3-AB Psychology', 'ACTIVE', '2018-01-21 22:17:59', '2018-01-21 22:17:59'),
(8, 18, 'Broadcast & Productions Cluster', '4th Year', 'AB Mass Communication', '4-AB Mass Communication', 'ACTIVE', '2018-01-21 22:19:20', '2018-01-21 22:19:20'),
(9, 19, 'Creative Cluster', '4th Year', 'BSEd English', '4-BSEd English', 'ACTIVE', '2018-01-21 22:22:10', '2018-01-21 22:22:10'),
(10, 20, 'Creative Cluster', 'Grade 12', 'STEM- Computer Studies', '12 STEM- Computer Studies', 'ACTIVE', '2018-01-21 22:23:18', '2018-01-21 22:23:18'),
(11, 21, 'Broadcast & Productions Cluster', '3rd Year', 'AB Psychology', '3-AB Psychology', 'ACTIVE', '2018-01-21 22:24:11', '2018-01-21 22:24:11'),
(12, 22, 'Broadcast & Productions Cluster', '4th Year', 'AB IS Major in American Studies', '4-AB IS Major in American Studies', 'ACTIVE', '2018-01-21 22:25:30', '2018-01-21 22:25:30'),
(13, 23, 'Editorial & Social Media Cluster', 'Grade 11', 'STEM- Pre Science', '11 STEM- Pre Science', 'ACTIVE', '2018-01-21 22:26:34', '2018-01-21 22:26:34'),
(14, 24, 'Editorial & Social Media Cluster', '4th Year', 'BS Biology', '4-BS Biology', 'ACTIVE', '2018-01-21 22:27:36', '2018-01-21 22:27:36'),
(15, 25, 'Creative Cluster', '3rd Year', 'BS Information Technology', 'InTech 3-A', 'ACTIVE', '2018-01-21 22:28:42', '2018-01-21 22:28:42'),
(16, 26, 'Broadcast & Productions Cluster', '3rd Year', 'AB IDS minor in Media and Tech', '3-AB IDS minor in Media and Tech', 'ACTIVE', '2018-01-21 22:29:34', '2018-01-21 22:29:34'),
(17, 27, 'Creative Cluster', '4th Year', 'AB Psychology', '4-AB Psychology', 'ACTIVE', '2018-01-21 22:30:19', '2018-01-21 22:30:19'),
(18, 28, 'Creative Cluster', 'Grade 11', 'ABM', '11-ABM', 'ACTIVE', '2018-01-21 22:31:14', '2018-01-21 22:31:14'),
(19, 29, 'Broadcast & Productions Cluster', '3rd Year', 'BS Information Technology', 'InTec 3-B', 'ACTIVE', '2018-01-21 22:32:35', '2018-01-21 22:32:35'),
(20, 30, 'Creative Cluster', '3rd Year', 'AB IDS minor in Media and Tech', '3-AB IDS minor in Media and Tech', 'ACTIVE', '2018-01-21 22:34:02', '2018-01-21 22:34:02'),
(21, 31, 'Creative Cluster', '4th Year', 'AB Political Science', '4-AB Political Science', 'ACTIVE', '2018-01-21 22:35:02', '2018-01-21 22:35:02'),
(22, 32, 'Creative Cluster', '3rd Year', 'AB IS Major in Asian Studies', '3-AB IS Major in Asian Studies', 'ACTIVE', '2018-01-21 22:36:18', '2018-01-21 22:36:18'),
(23, 33, 'Editorial & Social Media Cluster', '3rd Year', 'BS Accounting Technology', '3-BS Accounting Technology', 'ACTIVE', '2018-01-21 22:37:07', '2018-01-21 22:37:07'),
(24, 34, 'Creative Cluster', '4th Year', 'AB IDS minor in Media and Tech', '4-AB IDS minor in Media and Tech', 'ACTIVE', '2018-01-21 22:37:50', '2018-01-21 22:37:50'),
(25, 35, 'Broadcast & Productions Cluster', '4th Year', 'BSEd English', '4-BSEd English', 'ACTIVE', '2018-01-21 22:38:52', '2018-01-21 22:38:52'),
(26, 36, 'Broadcast & Productions Cluster', '3rd Year', 'BS Information Technology', 'InTec 3-B', 'ACTIVE', '2018-01-21 22:40:12', '2018-01-21 22:40:12'),
(27, 37, 'Broadcast & Productions Cluster', '3rd Year', 'BS Information Technology', 'InTec 3-B', 'ACTIVE', '2018-01-21 22:41:36', '2018-01-21 22:41:36'),
(28, 38, 'Editorial & Social Media Cluster', '4th Year', 'AB English', '4-AB English', 'ACTIVE', '2018-01-21 22:43:47', '2018-01-21 22:43:47'),
(29, 39, 'Broadcast & Productions Cluster', 'Grade 12', 'HUMMS', '12 - HUMMS', 'ACTIVE', '2018-01-21 22:45:22', '2018-01-21 22:45:22'),
(30, 40, 'Creative Cluster', '3rd Year', 'AB Mass Communication', '3-AB Mass Communication', 'ACTIVE', '2018-01-21 22:46:24', '2018-01-21 22:46:24'),
(31, 41, 'Creative Cluster', '4th Year', 'AB IDS minor in Language and Literature', '4-AB IDS minor in Language and Literature', 'ACTIVE', '2018-01-21 22:47:35', '2018-01-21 22:47:35'),
(32, 42, 'Editorial & Social Media Cluster', '3rd Year', 'AB Psychology', '3-AB Psychology', 'ACTIVE', '2018-01-21 22:48:55', '2018-01-21 22:48:55');

-- --------------------------------------------------------

--
-- Structure for view `event_rank`
--
DROP TABLE IF EXISTS `event_rank`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `event_rank`  AS  select `profile_events`.`profile_id` AS `profile_id`,count((case when (`profile_events`.`status` = 'Worked') then 1 else NULL end)) AS `worked`,count((case when (`profile_events`.`status` = 'Assigned') then 1 else NULL end)) AS `assigned`,count(`profile_events`.`status`) AS `total` from `profile_events` group by `profile_events`.`profile_id` order by `worked` desc ;

-- --------------------------------------------------------

--
-- Structure for view `milestonesevents_finished`
--
DROP TABLE IF EXISTS `milestonesevents_finished`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `milestonesevents_finished`  AS  select `milestone_events`.`milestone_events_id` AS `milestone_events_id`,`milestone_events`.`events_id` AS `events_id`,`milestone_events`.`milestone_name` AS `milestone_name`,`milestone_events`.`milestone_status` AS `milestone_status`,`milestone_events`.`created_at` AS `created_at`,`milestone_events`.`updated_at` AS `updated_at` from (select `milestone_events`.`milestone_events_id` AS `milestone_events_id`,`milestone_events`.`events_id` AS `events_id`,`milestone_events`.`milestone_name` AS `milestone_name`,`milestone_events`.`milestone_status` AS `milestone_status`,`milestone_events`.`created_at` AS `created_at`,`milestone_events`.`updated_at` AS `updated_at` from `milestone_events` where (`milestone_events`.`milestone_status` = 'Finished')) `milestone_events` ;

-- --------------------------------------------------------

--
-- Structure for view `milestones_finished`
--
DROP TABLE IF EXISTS `milestones_finished`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `milestones_finished`  AS  select `milestone_projects`.`milestone_projects_id` AS `milestone_projects_id`,`milestone_projects`.`projects_id` AS `projects_id`,`milestone_projects`.`milestone_name` AS `milestone_name`,`milestone_projects`.`milestone_status` AS `milestone_status`,`milestone_projects`.`created_at` AS `created_at`,`milestone_projects`.`updated_at` AS `updated_at` from (((select `milestone_projects`.`milestone_projects_id` AS `milestone_projects_id`,`milestone_projects`.`projects_id` AS `projects_id`,`milestone_projects`.`milestone_name` AS `milestone_name`,`milestone_projects`.`milestone_status` AS `milestone_status`,`milestone_projects`.`created_at` AS `created_at`,`milestone_projects`.`updated_at` AS `updated_at` from `milestone_projects` where (`milestone_projects`.`milestone_status` = 'Finished'))) `milestone_projects` join `projects` on((`milestone_projects`.`projects_id` = `projects`.`projects_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `project_rank`
--
DROP TABLE IF EXISTS `project_rank`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `project_rank`  AS  select `profile_projects`.`profile_id` AS `profile_id`,count((case when (`profile_projects`.`status` = 'Worked') then 1 else NULL end)) AS `worked`,count((case when (`profile_projects`.`status` = 'Assigned') then 1 else NULL end)) AS `assigned`,count(`profile_projects`.`status`) AS `total` from `profile_projects` group by `profile_projects`.`profile_id` order by `worked` desc ;

-- --------------------------------------------------------

--
-- Structure for view `sumofborrowed`
--
DROP TABLE IF EXISTS `sumofborrowed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sumofborrowed`  AS  select `equipment_details`.`equipment_details_id` AS `equipment_details_id`,`equipment_details`.`item_name` AS `item_name`,`borrow_details`.`quantity_borrowed` AS `quantity_borrowed` from (`equipment_details` left join (select `borrow_details`.`quantity_borrowed` AS `quantity_borrowed`,`borrow_details`.`equipment_details_id` AS `equipment_details_id` from (`borrow_details` join `borrow`) where (isnull(`borrow`.`returndate`) and (`borrow`.`borrow_id` = `borrow_details`.`borrow_id`))) `borrow_details` on((`equipment_details`.`equipment_details_id` = `borrow_details`.`equipment_details_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_damaged`
--
DROP TABLE IF EXISTS `view_damaged`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_damaged`  AS  select `equipment_details`.`equipment_details_id` AS `equipment_details_id`,`equipment_details`.`equipment_id` AS `equipment_id`,`equipment_details`.`item_name` AS `item_name`,`equipment_details`.`item_type` AS `item_type`,`equipment_details`.`item_code` AS `item_code`,`equipment_details`.`item_warranty` AS `item_warranty`,`equipment_details`.`item_status` AS `item_status`,`equipment_details`.`item_desc` AS `item_desc`,`equipment_details`.`created_at` AS `created_at`,`equipment_details`.`updated_at` AS `updated_at` from `equipment_details` where (`equipment_details`.`item_status` = 'DAMAGED') ;

-- --------------------------------------------------------

--
-- Structure for view `view_itemtype`
--
DROP TABLE IF EXISTS `view_itemtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_itemtype`  AS  select distinct `equipment_details`.`item_type` AS `item_type` from `equipment_details` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`);

--
-- Constraints for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD CONSTRAINT `borrow_details_ibfk_1` FOREIGN KEY (`borrow_id`) REFERENCES `borrow` (`borrow_id`),
  ADD CONSTRAINT `borrow_details_ibfk_2` FOREIGN KEY (`equipment_details_id`) REFERENCES `equipment_details` (`equipment_details_id`);

--
-- Constraints for table `borrow_profile`
--
ALTER TABLE `borrow_profile`
  ADD CONSTRAINT `borrow_profile_ibfk_1` FOREIGN KEY (`borrow_id`) REFERENCES `borrow` (`borrow_id`),
  ADD CONSTRAINT `borrow_profile_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`);

--
-- Constraints for table `equipment_details`
--
ALTER TABLE `equipment_details`
  ADD CONSTRAINT `equipment_details_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`equipment_id`);

--
-- Constraints for table `items_event`
--
ALTER TABLE `items_event`
  ADD CONSTRAINT `items_event_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`),
  ADD CONSTRAINT `items_event_ibfk_2` FOREIGN KEY (`equipment_details_id`) REFERENCES `equipment_details` (`equipment_details_id`);

--
-- Constraints for table `items_project`
--
ALTER TABLE `items_project`
  ADD CONSTRAINT `items_project_ibfk_1` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`projects_id`),
  ADD CONSTRAINT `items_project_ibfk_2` FOREIGN KEY (`equipment_details_id`) REFERENCES `equipment_details` (`equipment_details_id`);

--
-- Constraints for table `milestone_events`
--
ALTER TABLE `milestone_events`
  ADD CONSTRAINT `milestone_events_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`);

--
-- Constraints for table `milestone_projects`
--
ALTER TABLE `milestone_projects`
  ADD CONSTRAINT `milestone_projects_ibfk_1` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`projects_id`);

--
-- Constraints for table `profile_events`
--
ALTER TABLE `profile_events`
  ADD CONSTRAINT `profile_events_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`),
  ADD CONSTRAINT `profile_events_ibfk_2` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`);

--
-- Constraints for table `profile_projects`
--
ALTER TABLE `profile_projects`
  ADD CONSTRAINT `profile_projects_ibfk_1` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`projects_id`),
  ADD CONSTRAINT `profile_projects_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`);

--
-- Constraints for table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
