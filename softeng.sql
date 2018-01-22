-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2018 at 09:19 AM
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
  `equipment_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `qtyBorrowed` int(10) UNSIGNED DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrow_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'borrowed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`borrow_id`),
  KEY `profile_id` (`profile_id`),
  KEY `equipment_id` (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `equipment_id`, `profile_id`, `qtyBorrowed`, `purpose`, `borrow_status`, `created_at`, `updated_at`) VALUES
(20, 4, 25, 1, 'Use', 'borrowed', '2018-01-21 23:02:50', '2018-01-21 23:02:50'),
(21, 4, 14, 1, 'Use', 'returned', '2018-01-21 23:28:47', '2018-01-21 23:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE IF NOT EXISTS `equipments` (
  `equipment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_warranty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_dateofpurchase` date NOT NULL,
  `item_notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equipment_id`),
  UNIQUE KEY `item_name` (`item_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `item_name`, `item_type`, `item_quantity`, `item_warranty`, `item_dateofpurchase`, `item_notes`, `item_status`, `created_at`, `updated_at`) VALUES
(1, 'DSLR 700D', 'Camera', 3, '1 year warranty', '2017-11-01', 'EOS 700D. Step into DSLR photography and let your creativity grow.', 'AVAILABLE', '2017-12-30 00:50:06', '2017-12-30 00:55:06'),
(2, 'Flycam HD', 'Camera Holder', 3, '1 year warranty', '2017-11-01', 'Flycam offers TRUE QUALITY with PRECISION DESIGN at a REASONABLE Price.', 'AVAILABLE', '2017-12-30 00:22:04', '2017-12-30 00:22:04'),
(3, 'SanDisk 16gb Class 10', 'SD Card', 5, '1 year warranty', '2017-11-01', 'SanDisk Ultra SDHC Memory Card 16gb Class 10 Uhs-i Read up to 48mb S', 'AVAILABLE', '2017-12-30 00:25:10', '2018-01-14 23:21:17'),
(4, 'Macbook', 'Laptop', 1, '1 year warranty', '2017-11-01', 'Macbook ng Comms', 'AVAILABLE', '2018-01-14 00:17:16', '2018-01-21 21:11:33');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 2),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_15_053731_create_vols_table', 1),
(4, '2017_12_15_055142_create_profiles_table', 1),
(5, '2017_12_28_152037_staff', 1),
(6, '2017_12_30_053605_createusers', 1),
(7, '2017_12_30_074542_add_item', 1),
(8, '2017_12_30_162911_create_borrow_table', 1),
(10, '2018_01_14_070945_create_projects', 3),
(11, '2018_01_14_072323_create_events', 4),
(12, '2018_01_14_073110_profile_projects', 5),
(13, '2018_01_14_073131_profile_events', 5);

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
(1, 'Bernie', 'Manuel', 'Jereza', 'bmjereza@addu.edu.ph', '0999999999', NULL, '2018-01-02 00:36:03'),
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`profile_events_id`),
  KEY `profile_id` (`profile_id`),
  KEY `events_id` (`events_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_projects`
--

DROP TABLE IF EXISTS `profile_projects`;
CREATE TABLE IF NOT EXISTS `profile_projects` (
  `profile_projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`profile_projects_id`),
  KEY `projects_id` (`projects_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_projects`
--

INSERT INTO `profile_projects` (`profile_projects_id`, `profile_id`, `projects_id`, `created_at`, `updated_at`) VALUES
(1, 23, 1, '2018-01-22 01:15:51', '2018-01-22 01:15:51'),
(2, 24, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(3, 33, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(4, 38, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(5, 42, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(6, 11, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(7, 13, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(8, 15, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(9, 19, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(10, 20, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(11, 25, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(12, 27, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(13, 28, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(14, 30, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(15, 31, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(16, 32, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(17, 34, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(18, 40, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52'),
(19, 41, 1, '2018-01-22 01:15:52', '2018-01-22 01:15:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projects_id`, `projects_name`, `projects_client`, `projects_details`, `projects_startdate`, `projects_deadline`, `projects_status`, `created_at`, `updated_at`) VALUES
(1, 'Aw', 'Aweeee', 'Test', '2018-01-22', '2018-01-11', 'Ongoing', '2018-01-22 01:15:51', '2018-01-22 01:15:51');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `profile_id`, `cluster`, `staff_pos`, `staff_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'Director', 'ACTIVE', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `staff_id`, `user_status`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'ACTIVE', 'admin', '$2y$10$A2BhT8qjn4cU2HPKP40ppOKBJZ84lz3nvZQ6umw/.4kTfSaJAf0ry', '1Y53jvqMKVokG4XI7ppBxh66CM4U5QJiC5hdoixdrUbxuhGRbBQBQfFdFaSa', '2018-01-12 10:01:39', '2018-01-12 10:01:39');

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
(1, 11, 'Creative Cluster', '4th Year', 'AB-Psychology', '4-AB Psychology', 'ACTIVE', '2018-01-21 22:10:36', '2018-01-21 22:10:36'),
(2, 12, 'Broadcast & Productions Cluster', '4th Year', 'AB Psychology', '4-AB Psychology', 'ACTIVE', '2018-01-21 22:11:46', '2018-01-21 22:11:46'),
(3, 13, 'Creative Cluster', '4th Year', 'AB IS Major in Asian Studies', '4-AB IS Major in Asian Studies', 'ACTIVE', '2018-01-21 22:13:05', '2018-01-21 22:13:05'),
(4, 14, 'Broadcast & Productions Cluster', '3rd Year', 'BS Information Technology', 'IT 3-A', 'ACTIVE', '2018-01-21 22:13:54', '2018-01-21 22:13:54'),
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`equipment_id`);

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
