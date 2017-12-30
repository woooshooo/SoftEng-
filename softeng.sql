-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2017 at 08:59 AM
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
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE IF NOT EXISTS `equipments` (
  `equipment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equipment_id`),
  UNIQUE KEY `item_name` (`item_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `item_name`, `item_type`, `item_quantity`, `item_notes`, `created_at`, `updated_at`) VALUES
(1, 'DSLR 700D', 'Camera', 3, 'EOS 700D. Step into DSLR photography and let your creativity grow.', NULL, '2017-12-30 00:55:06'),
(2, 'Flycam HD-3000 Handheld Video Stabilizer - Proaim', 'Camera Holder', 3, 'Flycam offers TRUE QUALITY with PRECISION DESIGN at a REASONABLE Price.', '2017-12-30 00:22:04', '2017-12-30 00:22:04'),
(4, 'SanDisk Ultra SDHC Memory Card 16gb Class 10', 'SD Card', 5, 'SanDisk Ultra SDHC Memory Card 16gb Class 10 Uhs-i Read up to 48mb S', '2017-12-30 00:25:10', '2017-12-30 00:25:10');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_15_053731_create_vols_table', 1),
(4, '2017_12_15_055142_create_profiles_table', 1),
(5, '2017_12_28_152037_staff', 2),
(6, '2017_12_30_053605_createusers', 3),
(7, '2017_12_30_074542_add_item', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `firstname`, `middlename`, `lastname`, `email`, `contactdetails`, `created_at`, `updated_at`) VALUES
(1, 'Bernie', NULL, 'Jereza', 'bmjereza@addu.edu.ph', '0999999999', NULL, NULL),
(12, 'Webster Kyle', 'Boctoto', 'Genise', 'wkgenise@yahoo.com', '09287274683', '2017-12-15 15:01:13', '2017-12-16 02:33:00'),
(13, 'Larissa Marie', NULL, 'Baarde', 'larissamarie25@gmail.com', '09393392063', '2017-12-15 15:13:27', '2017-12-15 15:13:27'),
(14, 'Jimuel', NULL, 'Banawan', 'jwpbanawan@addu.edu.ph', '09430151214', '2017-12-15 15:16:45', '2017-12-15 15:16:45'),
(15, 'Mikhaela Angela', NULL, 'Doce', 'mikhaeladoce@gmail.com', '09778260120', '2017-12-16 00:54:50', '2017-12-16 00:54:50'),
(18, 'Kimberly Rose', 'L.', 'Chan', 'janzelle18@gmail.com', '09980620929', '2017-12-16 01:12:18', '2017-12-16 01:12:18'),
(19, 'Gian Carlo', 'Whaaaaaaaaat', 'Tancontian', 'gctancontian@addu.edu.ph', '09123123123', '2017-12-28 08:39:15', '2017-12-28 09:32:25'),
(20, 'Aivy Rose', NULL, 'Villarba', 'arvillarba@addu.edu.ph', '1231231231', '2017-12-28 09:13:06', '2017-12-28 09:13:06');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `profile_id`, `cluster`, `staff_pos`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'Director', NULL, NULL),
(2, 19, 'Creative Cluster', 'Creatives and Studio Head', '2017-12-28 08:39:15', '2017-12-28 08:39:15'),
(3, 20, 'Editorial & Social Media Cluster', 'Editorial & Social Media Head', '2017-12-28 09:13:06', '2017-12-28 09:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vols`
--

INSERT INTO `vols` (`vol_id`, `profile_id`, `cluster`, `yearlvl`, `course`, `section`, `vol_status`, `created_at`, `updated_at`) VALUES
(5, 12, 'Creative Cluster', '3rd Year', 'BS Information Technology', 'InTech 3A', 'ACTIVE', '2017-12-15 15:01:13', '2017-12-30 00:27:45'),
(6, 13, 'Creative Cluster', '4th Year', 'AB IS Major in Asian Studies', 'ABIS4', 'ACTIVE', '2017-12-15 15:13:28', '2017-12-15 15:13:28'),
(7, 14, 'Broadcast & Productions Cluster', '3rd Year', 'BS Information Systems', 'InSys4A', 'ACTIVE', '2017-12-15 15:16:45', '2017-12-16 00:53:06'),
(8, 15, 'Editorial & Social Media Cluster', 'Grade 11', 'STEM- Pre Science', 'Idk', 'ACTIVE', '2017-12-16 00:54:50', '2017-12-16 00:54:50'),
(9, 18, 'Broadcast & Productions Cluster', '4th Year', 'AB Mass Communication', 'ABMC4', 'ACTIVE', '2017-12-16 01:12:18', '2017-12-16 01:12:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`);

--
-- Constraints for table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
