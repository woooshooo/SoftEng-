-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2018 at 08:46 AM
-- Server version: 5.5.54
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wkgenise_`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `dateborrowed` date NOT NULL,
  `returndate` date DEFAULT NULL,
  `profile_id` int(11) NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `dateborrowed`, `returndate`, `profile_id`, `purpose`, `created_at`, `updated_at`) VALUES
(1, '2018-03-20', '2018-03-20', 14, 'Test Borrow', NULL, NULL),
(2, '2018-03-21', NULL, 1, '1235ysjg', NULL, NULL),
(3, '2018-03-21', '2018-03-21', 14, 'Purpose', NULL, NULL),
(4, '2018-03-21', NULL, 25, 'Borrow for Thesis', NULL, NULL),
(5, '2018-04-02', '2018-05-17', 43, 'Test lang', NULL, NULL),
(6, '2018-05-10', NULL, 11, 'ASDASD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE `borrow_details` (
  `borrow_details_id` int(10) UNSIGNED NOT NULL,
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `equipment_details_id` int(10) UNSIGNED NOT NULL,
  `numberofdays` double NOT NULL,
  `quantity_borrowed` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`borrow_details_id`, `borrow_id`, `equipment_details_id`, `numberofdays`, `quantity_borrowed`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 1, '2018-03-20 08:08:45', '2018-03-20 08:08:45'),
(2, 1, 2, 2, 2, '2018-03-20 08:08:45', '2018-03-20 08:08:45'),
(3, 2, 34, 14, 2, '2018-03-20 18:51:36', '2018-03-20 18:51:36'),
(4, 3, 34, 5, 2, '2018-03-20 18:52:31', '2018-03-20 18:52:31'),
(5, 4, 43, 2, 1, '2018-03-20 18:55:21', '2018-03-20 18:55:21'),
(6, 4, 42, 2, 1, '2018-03-20 18:55:21', '2018-03-20 18:55:21'),
(7, 4, 41, 2, 1, '2018-03-20 18:55:22', '2018-03-20 18:55:22'),
(8, 5, 15, 2, 1, '2018-04-02 01:54:03', '2018-04-02 01:54:03'),
(9, 5, 17, 1, 1, '2018-04-02 01:54:03', '2018-04-02 01:54:03'),
(10, 6, 7, 1, 1, '2018-05-09 22:59:04', '2018-05-09 22:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_profile`
--

CREATE TABLE `borrow_profile` (
  `borrow_profile_id` int(11) NOT NULL,
  `borrow_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_profile`
--

INSERT INTO `borrow_profile` (`borrow_profile_id`, `borrow_id`, `profile_id`) VALUES
(1, 1, 14),
(2, 2, 1),
(3, 3, 14),
(4, 4, 25),
(5, 5, 43),
(6, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equipment_id` int(10) UNSIGNED NOT NULL,
  `dateordered` date NOT NULL,
  `datedelivered` date NOT NULL,
  `receivedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encodedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `dateordered`, `datedelivered`, `receivedby`, `encodedby`, `created_at`, `updated_at`) VALUES
(1, '2018-01-01', '2018-01-01', 'Bernie Jereza', 'Bernie Jereza', NULL, NULL),
(2, '2018-01-02', '2018-01-02', 'Aivy Rose Villarba', 'Bernie Jereza', NULL, NULL),
(3, '2018-01-03', '2018-01-03', 'Bernie Jereza', 'Bernie Jereza', NULL, NULL),
(4, '2018-01-04', '2018-01-04', 'Bernie Jereza', 'Bernie Jereza', NULL, NULL),
(5, '2015-01-01', '2015-01-01', 'Aivy Rose Villarba', 'Bernie Jereza', NULL, NULL),
(6, '2018-03-05', '2018-03-21', 'Gian Carlo Tancontian', 'Bernie Jereza', NULL, NULL),
(7, '2018-03-05', '2018-03-21', 'Gian Carlo Tancontian', 'Bernie Jereza', NULL, NULL),
(8, '2018-05-08', '2018-05-17', 'Jimuel Banawan', 'Bernie Jereza', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_details`
--

CREATE TABLE `equipment_details` (
  `equipment_details_id` int(10) UNSIGNED NOT NULL,
  `equipment_id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AVAILABLE',
  `item_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_details`
--

INSERT INTO `equipment_details` (`equipment_details_id`, `equipment_id`, `item_name`, `item_type`, `item_code`, `item_quantity`, `item_warranty`, `item_status`, `item_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Converters', 'Converter', '0001', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(2, 1, 'RPK-N', 'Adaptor', '0002', 1, NULL, 'AVAILABLE', 'Good Condition', NULL, NULL),
(3, 1, 'RPS-N', 'Adaptor', '0003', 1, NULL, 'AVAILABLE', 'Good Condition', NULL, NULL),
(4, 1, 'RPE-N', 'Adaptor', '0004', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(5, 1, 'HDMI to SDI Converters', 'Converter', '0005', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(6, 1, 'SDI to HDMI Converters', 'Converter', '0006', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(7, 1, 'BMD Headsets', 'Headset', '0007', 1, NULL, 'BORROWED', NULL, NULL, NULL),
(8, 1, 'BMD Chargers', 'Charger', '0008', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(9, 1, 'BMD Telephoto Lense', 'BMD Lense', '0009', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(10, 1, 'BMD WideLense', 'BMD Lense', '0010', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(11, 1, 'BMD Intensity Shuttle Thunderbolt', 'Shuttle', '0011', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(12, 1, 'BMD Hyper Deck Shuttle', 'Shuttle', '0012', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(13, 1, 'Thunderbolt Ethernet', 'Adaptor', '0013', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(14, 1, 'Edimax Charger', 'Charger', '0014', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(15, 1, 'KTEc AC Adaptor', 'Adaptor', '0015', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(16, 1, 'Ethernet Switch', 'Switch', '0016', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(17, 1, 'Samsung Remote', 'Remote', '0017', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(18, 2, 'Microphone Cables', 'Cable', '0018', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(19, 2, 'OMNI 15M Extension Wheels', 'Extension', '0019', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(20, 2, 'OMNI Extension Bars: WER-103 (small)', 'Extension', '0020', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(21, 2, 'OMNI Extension Bars: WED-340 (big)', 'Extension', '0021', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(22, 2, 'Panther Extension Bars', 'Extension', '0022', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(23, 2, 'Danger Tapes', 'Tape', '0023', 5, NULL, 'AVAILABLE', NULL, NULL, NULL),
(24, 2, 'Caution Tape', 'Tape', '0024', 4, NULL, 'AVAILABLE', NULL, NULL, NULL),
(25, 2, 'Duct Tape', 'Tape', '0025', 10, NULL, 'AVAILABLE', NULL, NULL, NULL),
(26, 2, 'Tokina Extension Bars', 'Extension', '0026', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(27, 3, 'HDMI Cables', 'Cable', '0027', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(28, 3, 'Ethernet Cables: CAT5E', 'Cable', '0028', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(29, 3, 'Ethernet Cables: CAT6', 'Cable', '0029', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(30, 3, 'Coaxial Cables: RG-6U', 'Cable', '0030', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(31, 3, 'Coaxial Cable: SDI', 'Cable', '0031', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(32, 3, 'Coaxial Cable: L-5CFW', 'Cable', '0032', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(33, 3, 'NSW24707 Cable', 'Cable', '0033', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(34, 4, 'ASUS Monitors', 'Monitor', '0034', 1, NULL, 'AVAILABLE', 'Same when borrowed', NULL, NULL),
(35, 4, 'iMac Mini', 'MAC', '0035', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(36, 4, 'Apple Keyboard (USB)', 'Keyboard', '0036', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(37, 4, 'Apple Mouse (USB)', 'Mouse', '0037', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(38, 4, 'Mac', 'MAC', '0038', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(39, 4, 'Apple Magic Mouse (wireless)', 'Mouse', '0039', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(40, 4, 'Apple Keyboard (wireless)', 'Keyboard', '0040', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(41, 4, '4Tech N-320 Mouse', 'Mouse', '0041', 1, NULL, 'BORROWED', NULL, NULL, NULL),
(42, 4, '4Tech OP-720 Mouse', 'Mouse', '0042', 1, NULL, 'BORROWED', NULL, NULL, NULL),
(43, 4, '4Tech Keyboard', 'Mouse', '0043', 1, NULL, 'BORROWED', NULL, NULL, NULL),
(44, 4, 'Scorpion Gaming Mouse', 'Mouse', '0044', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(45, 4, 'Gigabit Switch', 'Switch', '0045', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(46, 4, 'VR Glasses', 'VR', '0046', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(47, 4, 'LG PSU', 'Power Supply', '0047', 1, NULL, 'AVAILABLE', 'Dead', NULL, NULL),
(48, 4, 'POWERLOGIC PSU', 'Power Supply', '0048', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(49, 4, 'HP COMPAQ', 'CPU', '0049', 1, NULL, 'AVAILABLE', '1 Dead', NULL, NULL),
(50, 4, 'APC Smart-UPS', 'Power Supply', '0050', 1, NULL, 'LOST', NULL, NULL, NULL),
(51, 4, 'Canon PRO-100 Printer', 'Printer', '0051', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(52, 4, 'Brother DCP-J100 Printer', 'Printer', '0052', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(53, 5, 'BMD', 'BMD', '0053', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(54, 5, 'BMD Tripod Bags', 'Bags', '0054', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(55, 5, 'SSD (240GB)', 'SSD', '0055', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(56, 5, 'Canon EOS 650D', 'Camera', '0056', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(57, 5, 'SD Cards (16GB)', 'SD Card', '0057', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(58, 5, 'Cam Rig', 'Camera Accessories', '0058', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(59, 5, 'FlyCam', 'Accessories', '0059', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(60, 5, 'Canon XA10', 'Camera', '0060', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(61, 5, 'Canon Compact Power Adaptor', 'Adaptor', '0061', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(62, 5, 'Tripods', 'Tripod', '0062', 1, NULL, 'AVAILABLE', '1 Dead', NULL, NULL),
(63, 5, 'Tripod (Manfrotto)', 'Tripod', '0063', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(64, 5, 'JINBEI Softboxes', 'Accessories', '0064', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(65, 5, 'Water Cellophane (for Studio Lights)', 'Accessories', '0065', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(66, 5, 'JINBEI Light Weight Stand', 'Accessories', '0066', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(67, 5, 'JINBEI Light Bulbs (85W)', 'Accessories', '0067', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(68, 5, 'Rode Mic Pole', 'Mic Pole', '0068', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(69, 5, 'Rode Mic and Windshield', 'Mic', '0069', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(70, 5, 'Firefly Light and Radio', 'Tools', '0070', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(71, 5, 'Eneloop Batteries', 'Batteries', '0071', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(72, 5, 'L.E.D.', 'LED Display', '0072', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(73, 5, 'Image Class MFb28Cw', 'Photocopier', '0073', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(74, 5, 'Canon iR1022iF', 'Photocopier', '0074', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(75, 5, 'AudioTechnica Receiver', 'Accessories', '0075', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(76, 5, 'Microphone Earmount/Clip-on', 'Accessories', '0076', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(77, 5, 'AudioTechnica Transmitter', 'Accessories', '0077', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(78, 5, 'AudioTechnica Adaptor', 'Adaptor', '0078', 1, NULL, 'RETIRED', NULL, NULL, NULL),
(79, 5, 'Zihyun Crane  for Mirrorless & DSLR Cameras', 'Accessories', '0079', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(80, 5, 'Phottix Speed Ring', 'Accessories', '0080', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(81, 5, 'Phottix Spartan Beauty Disk', 'Accessories', '0081', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(82, 5, 'Oval Reflector 150cm x 200cm', 'Accessories', '0082', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(83, 5, 'Yongnuo F750 Digital/video light rechargeable battery', 'Batteries', '0083', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(84, 5, 'Yonguo Digital  3000 III  Pro LED Video Light', 'Accessories', '0084', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(85, 5, 'Boya Microphone BY-M1', 'Mic', '0085', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(86, 5, 'Boya Microphone BY-WM5', 'Mic', '0086', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(87, 5, 'Yongnuo 660 Speedlite Flash', 'Accessories', '0087', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(88, 5, 'Yongnuo 3000 III LED Charger', 'Charger', '0088', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(89, 5, 'Yonguo  RF603C II Wireless Flash Trigger', 'Accessories', '0089', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(90, 5, 'Benro MoveOver4 Slider A04S9', 'Accessories', '0090', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(91, 5, 'Caler EII 200 Studio Flash Kit', 'Accessories', '0091', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(92, 5, 'Benro A28T Monopod', 'Monopod', '0092', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(93, 5, 'Benro S6 Fluid Head', 'Accesories', '0093', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(94, 5, 'Benro SystemGoPlus FGP28A', 'Accesories', '0094', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(95, 6, 'Macbook Pro', 'MAC', '0095', 1, 'Apple Care', 'DAMAGED', NULL, NULL, NULL),
(96, 6, 'iPhone X', 'Phone', '0096', 1, NULL, 'AVAILABLE', NULL, NULL, NULL),
(97, 8, 'JBL Speaker', 'Speaker', '0097', 1, NULL, 'AVAILABLE', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `events_id` int(10) UNSIGNED NOT NULL,
  `events_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `events_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `events_startdate` date NOT NULL,
  `events_deadline` date NOT NULL,
  `events_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`events_id`, `events_name`, `events_details`, `events_startdate`, `events_deadline`, `events_status`, `created_at`, `updated_at`) VALUES
(1, 'Awitenista Coverage', 'Awitenista Coverage Details', '2018-03-03', '2018-03-04', 'Finished', '2018-03-02 08:54:47', '2018-03-15 05:24:53'),
(2, 'Baccalaureate Mass(BM)', 'Baccalaureate Mass for BM', '2018-04-06', '2018-04-06', 'Ongoing', '2018-03-05 02:46:16', '2018-03-10 01:38:17'),
(3, '5AM Mass', '5am mass', '2018-03-05', '2018-03-05', 'Ongoing', '2018-03-05 04:09:25', '2018-03-05 04:11:07'),
(4, 'Biology Coverage', 'Biology Coverage', '2018-03-08', '2018-03-09', 'Ongoing', '2018-03-07 10:56:36', '2018-03-09 21:29:30'),
(5, 'Viewfinder Summit 2019', '5pm, Pakighinabi Room', '2018-03-20', '2018-03-20', 'Finished', '2018-03-20 18:40:20', '2018-03-20 18:43:18');

-- --------------------------------------------------------

--
-- Stand-in structure for view `events_assigned`
-- (See below for the actual view)
--
CREATE TABLE `events_assigned` (
`profile_id` int(10)
,`events_assigned` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `events_rank`
-- (See below for the actual view)
--
CREATE TABLE `events_rank` (
`profile_id` int(10)
,`total` bigint(21)
,`worked` bigint(21)
,`percentage` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `events_worked`
-- (See below for the actual view)
--
CREATE TABLE `events_worked` (
`profile_id` int(10)
,`events_worked` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `items_event`
--

CREATE TABLE `items_event` (
  `items_event_id` int(10) UNSIGNED NOT NULL,
  `events_id` int(10) UNSIGNED NOT NULL,
  `equipment_details_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_event`
--

INSERT INTO `items_event` (`items_event_id`, `events_id`, `equipment_details_id`) VALUES
(1, 5, 10),
(2, 5, 11),
(3, 5, 12),
(4, 5, 53),
(5, 5, 8),
(6, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `items_project`
--

CREATE TABLE `items_project` (
  `items_project_id` int(10) UNSIGNED NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `equipment_details_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items_project`
--

INSERT INTO `items_project` (`items_project_id`, `projects_id`, `equipment_details_id`) VALUES
(1, 12, 77),
(2, 12, 13),
(3, 12, 4),
(4, 12, 7),
(5, 5, 3),
(6, 5, 8),
(7, 5, 7),
(8, 11, 95),
(9, 11, 71);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, '2018_02_28_050313_project_items', 4),
(19, '2018_03_10_035620_profile_events_worked', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `milestone_finished`
-- (See below for the actual view)
--
CREATE TABLE `milestone_finished` (
`milestone_projects_id` int(10) unsigned
,`projects_id` int(10) unsigned
,`milestone_name` varchar(191)
,`milestone_deadline` date
,`milestone_status` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `milestone_projects`
--

CREATE TABLE `milestone_projects` (
  `milestone_projects_id` int(10) UNSIGNED NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `milestone_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `milestone_deadline` date NOT NULL,
  `milestone_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `milestone_projects`
--

INSERT INTO `milestone_projects` (`milestone_projects_id`, `projects_id`, `milestone_name`, `milestone_deadline`, `milestone_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Milestone 1', '2018-03-03', 'Finished', '2018-03-11 23:13:06', '2018-03-11 23:13:34'),
(2, 1, 'Milestone 2', '2018-03-05', 'Finished', '2018-03-11 23:13:29', '2018-03-11 23:13:39'),
(3, 1, 'Milestone 3', '2018-03-06', 'Finished', '2018-03-11 23:13:29', '2018-03-11 23:14:24'),
(4, 1, 'Milestone 4', '2018-03-07', 'Finished', '2018-03-11 23:15:28', '2018-03-11 23:15:33'),
(5, 2, 'Milestone 1', '2018-02-25', 'Finished', '2018-03-11 23:47:23', '2018-03-11 23:48:17'),
(6, 2, 'Milestone 2', '2018-02-28', 'Finished', '2018-03-11 23:47:42', '2018-03-11 23:48:33'),
(7, 2, 'Milestone 3', '2018-03-01', 'Finished', '2018-03-11 23:47:42', '2018-03-11 23:48:37'),
(8, 2, 'Milestone 4', '2018-03-03', 'Finished', '2018-03-11 23:47:57', '2018-03-11 23:52:54'),
(9, 2, 'Milestone 5', '2018-03-03', 'Finished', '2018-03-11 23:52:50', '2018-03-11 23:52:57'),
(10, 8, 'Milestone 1', '2018-03-06', 'Finished', '2018-03-14 20:34:41', '2018-03-15 00:02:57'),
(11, 8, 'Milestone 2', '2018-03-07', 'Finished', '2018-03-14 20:34:41', '2018-03-15 00:02:59'),
(12, 8, 'Milestone 3', '2018-03-08', 'Finished', '2018-03-14 20:34:41', '2018-03-15 00:03:08'),
(13, 8, 'Milestone 4', '2018-03-08', 'Finished', '2018-03-14 20:34:41', '2018-03-15 00:03:10'),
(14, 8, 'Milestone 5', '2018-03-10', 'Finished', '2018-03-14 21:08:20', '2018-03-15 00:03:14'),
(15, 8, 'Milestone 6', '2018-03-11', 'Finished', '2018-03-14 21:08:20', '2018-03-15 00:03:22'),
(16, 8, 'Milestone 7', '2018-03-12', 'Finished', '2018-03-14 21:08:36', '2018-03-15 00:03:24'),
(17, 10, 'Milestone 1', '2018-03-10', 'Finished', '2018-03-17 00:44:04', '2018-03-17 00:44:09'),
(18, 7, 'Milestone 1', '2018-02-26', 'Finished', '2018-03-19 17:59:41', '2018-03-19 17:59:44'),
(19, 7, 'Milestone 2', '2018-03-20', 'Finished', '2018-03-19 17:59:41', '2018-03-19 17:59:48'),
(20, 7, 'Milestone 3', '2018-04-07', 'Finished', '2018-03-19 17:59:41', '2018-03-19 18:49:15'),
(21, 11, 'Setup items sa studio', '2018-03-20', 'Finished', '2018-03-19 18:30:49', '2018-03-19 18:41:00'),
(22, 11, 'mag makeup sa models', '2018-03-21', 'Finished', '2018-03-19 18:30:49', '2018-03-19 18:41:05'),
(23, 11, 'mag photoshoot', '2018-03-22', 'Ongoing', '2018-03-19 18:30:49', '2018-03-19 18:30:49'),
(24, 11, 'Pack Up', '2018-03-23', 'Ongoing', '2018-03-19 18:30:49', '2018-03-19 18:30:49'),
(25, 11, 'return items', '2018-03-24', 'Ongoing', '2018-03-19 18:30:49', '2018-03-19 18:40:30'),
(26, 9, 'Milestone 1', '2018-03-20', 'Finished', '2018-03-20 02:16:05', '2018-03-20 08:49:57'),
(27, 9, 'Milestone 2', '2018-03-22', 'Finished', '2018-03-20 02:16:06', '2018-03-20 08:50:03'),
(28, 9, 'Milestone 3', '2018-03-28', 'Finished', '2018-03-20 02:16:06', '2018-03-20 08:50:17'),
(29, 9, 'Milestone 4', '2018-04-07', 'Finished', '2018-03-20 02:16:06', '2018-04-02 01:43:25'),
(30, 12, 'Fix Database', '2017-11-20', 'Finished', '2018-03-20 08:21:17', '2018-03-20 08:22:43'),
(31, 12, 'Learn Laravel', '2017-12-01', 'Finished', '2018-03-20 08:21:18', '2018-03-20 18:30:28'),
(32, 12, 'Module 1', '2018-01-05', 'Finished', '2018-03-20 08:21:18', '2018-03-20 18:30:22'),
(33, 12, 'Module 2', '2018-01-25', 'Finished', '2018-03-20 08:21:18', '2018-03-20 18:30:32'),
(34, 12, 'Module 3', '2018-02-15', 'Finished', '2018-03-20 08:21:18', '2018-03-20 18:30:42'),
(35, 12, 'Module 4', '2018-03-05', 'Ongoing', '2018-03-20 08:21:18', '2018-03-20 18:30:54'),
(36, 12, 'Defense Fee', '2018-03-16', 'Ongoing', '2018-03-20 08:21:18', '2018-03-20 08:22:34'),
(37, 12, 'Defense Day', '2018-03-21', 'Finished', '2018-03-20 08:21:18', '2018-03-20 18:30:59'),
(38, 13, 'Defense Day', '2018-03-21', 'Ongoing', '2018-03-20 18:32:18', '2018-03-20 18:32:18'),
(39, 13, 'Pass documents', '2018-03-21', 'Ongoing', '2018-03-20 18:32:48', '2018-03-20 18:32:48'),
(40, 5, 'Milestone 1', '2018-02-27', 'Finished', '2018-03-20 18:34:14', '2018-03-20 18:34:53'),
(41, 5, 'Milestone 2', '2018-03-02', 'Finished', '2018-03-20 18:34:46', '2018-03-20 18:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(10) NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactdetails` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(42, 'Lyen Krenz', NULL, 'Yap', 'OfficialEzra.C@gmail.com', '09231560814', '2018-01-21 22:48:55', '2018-01-21 22:48:55'),
(43, 'Maiko Angelo', 'Brion', 'Guino-o', 'mabguinoo@gmail.com', '09174059355', '2018-03-19 18:32:47', '2018-03-19 18:32:47'),
(44, 'Edna Leah May', 'E', 'Medija', 'elmemedija@addu.edu.ph', '09055652310', '2018-03-20 04:05:09', '2018-03-20 04:05:09'),
(45, 'Karlo Alexie', 'C', 'Puerto', 'kacpuerto@addu.edu.ph', '09177133880', '2018-03-20 04:05:47', '2018-03-20 04:05:47'),
(46, 'Gian Carlo', 'C', 'Tancontian', 'gcctancontian@addu.edu.ph', '09328828868', '2018-03-20 04:06:46', '2018-03-20 04:06:46'),
(47, 'Virgilio Martin', 'V', 'Castrillo', 'igy.castrillo@gmail.com', '09778291103', '2018-03-20 04:07:33', '2018-03-20 04:09:31'),
(48, 'Micheal Aaron', 'C', 'Gomez', 'macgomez@addu.edu.ph', '09171256847', '2018-03-20 04:08:28', '2018-03-20 04:09:42'),
(49, 'Murphy', 'P', 'Caballero', 'mpcaballero@addu.edu.ph', '09236640865', '2018-03-20 04:09:05', '2018-03-20 04:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `profile_events_assigned`
--

CREATE TABLE `profile_events_assigned` (
  `profile_events_assigned_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) NOT NULL,
  `events_id` int(10) UNSIGNED NOT NULL,
  `pre_setup` tinyint(1) NOT NULL,
  `actual_event` tinyint(1) NOT NULL,
  `pack_up` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_events_assigned`
--

INSERT INTO `profile_events_assigned` (`profile_events_assigned_id`, `profile_id`, `events_id`, `pre_setup`, `actual_event`, `pack_up`) VALUES
(1, 11, 1, 1, 0, 0),
(2, 12, 1, 1, 1, 1),
(3, 18, 4, 1, 1, 1),
(4, 23, 4, 0, 1, 1),
(5, 14, 5, 1, 0, 0),
(6, 11, 5, 1, 0, 0),
(7, 17, 5, 1, 1, 1),
(8, 20, 5, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_events_worked`
--

CREATE TABLE `profile_events_worked` (
  `profile_events_worked_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) NOT NULL,
  `events_id` int(10) UNSIGNED NOT NULL,
  `pre_setup` tinyint(1) NOT NULL,
  `actual_event` tinyint(1) NOT NULL,
  `pack_up` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_events_worked`
--

INSERT INTO `profile_events_worked` (`profile_events_worked_id`, `profile_id`, `events_id`, `pre_setup`, `actual_event`, `pack_up`) VALUES
(1, 11, 1, 1, 1, 1),
(2, 21, 1, 0, 1, 1),
(3, 14, 5, 0, 0, 1),
(4, 12, 5, 0, 1, 0),
(5, 20, 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_projects`
--

CREATE TABLE `profile_projects` (
  `profile_projects_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `milestone_projects_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_projects`
--

INSERT INTO `profile_projects` (`profile_projects_id`, `profile_id`, `projects_id`, `milestone_projects_id`) VALUES
(1, 25, 1, 1),
(2, 25, 1, 2),
(3, 25, 1, 3),
(4, 25, 1, 4),
(5, 11, 8, 10),
(6, 12, 8, 11),
(7, 13, 8, 12),
(8, 13, 8, 13),
(9, 14, 8, 14),
(10, 15, 8, 15),
(11, 16, 8, 16),
(12, 25, 10, 17),
(13, 11, 7, 18),
(14, 11, 7, 19),
(15, 11, 7, 20),
(16, 12, 7, 18),
(17, 12, 7, 19),
(18, 12, 7, 20),
(19, 14, 12, 30),
(20, 25, 12, 31),
(21, 14, 12, 31),
(22, 25, 12, 32),
(23, 25, 12, 33),
(24, 25, 12, 34),
(25, 25, 12, 35),
(26, 25, 12, 36),
(27, 14, 12, 36),
(28, 14, 12, 37),
(29, 25, 12, 37),
(30, 14, 5, 40),
(31, 16, 5, 41),
(32, 14, 5, 41);

-- --------------------------------------------------------

--
-- Table structure for table `profile_projects_worked`
--

CREATE TABLE `profile_projects_worked` (
  `profile_projects_worked_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `milestone_projects_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_projects_worked`
--

INSERT INTO `profile_projects_worked` (`profile_projects_worked_id`, `profile_id`, `projects_id`, `milestone_projects_id`) VALUES
(1, 25, 1, 1),
(2, 25, 1, 2),
(3, 25, 1, 3),
(4, 25, 1, 4),
(5, 25, 10, 17),
(6, 11, 7, 18),
(7, 11, 7, 19),
(8, 12, 7, 18),
(9, 12, 7, 19),
(10, 12, 7, 20),
(11, 11, 7, 20),
(12, 16, 5, 40),
(13, 19, 5, 41),
(14, 11, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projects_id` int(10) UNSIGNED NOT NULL,
  `projects_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projects_startdate` date NOT NULL,
  `projects_deadline` date NOT NULL,
  `projects_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projects_id`, `projects_name`, `projects_client`, `projects_details`, `projects_startdate`, `projects_deadline`, `projects_status`, `created_at`, `updated_at`) VALUES
(1, 'Project One', 'Client One', 'Project One Details', '2018-02-28', '2018-03-07', 'Finished', '2018-03-01 20:51:50', '2018-03-11 23:16:23'),
(2, 'Project Two', 'Client Two', 'Project Two Details', '2018-02-25', '2018-03-03', 'Finished', '2018-03-01 20:53:14', '2018-05-10 22:02:27'),
(3, 'Project Three', 'Client Three', 'Project Details Three', '2018-03-01', '2018-03-02', 'Ongoing', '2018-03-01 20:55:06', '2018-03-05 07:01:43'),
(4, 'Project Four', 'Client Four', 'Project Details Four', '2018-03-26', '2018-03-31', 'Pending', '2018-03-01 22:11:48', '2018-03-20 18:11:01'),
(5, 'Webster Self Project', 'Webster', 'details 5', '2018-02-27', '2018-03-02', 'Finished', '2018-03-01 22:28:08', '2018-03-20 18:36:36'),
(6, 'Project New', 'Client New', 'Details New', '2018-02-28', '2018-03-02', 'Ongoing', '2018-03-01 23:05:59', '2018-03-05 03:50:14'),
(7, 'Photoshoot for Yearbook', 'AdDU JHS', 'Photoshoot for Yearbook', '2018-02-25', '2018-04-07', 'Finished', '2018-03-05 08:21:55', '2018-03-19 18:58:51'),
(8, 'Date Validation Project', 'Date Validation Client', 'Date Validation Details', '2018-03-06', '2018-03-12', 'Ongoing', '2018-03-07 10:36:09', '2018-03-14 21:07:54'),
(9, 'Project', '1239851094812', 'Secret', '2018-03-10', '2018-04-07', 'Ongoing', '2018-03-08 00:15:25', '2018-03-10 01:56:15'),
(10, 'Project Test', 'Client Test', 'asdsadasd', '2018-03-01', '2018-03-10', 'Finished', '2018-03-10 00:52:41', '2018-03-17 00:44:17'),
(11, 'Photoshoot Models', 'Gauttier', 'Project ni GT pero si Maiko mutrabaho', '2018-03-20', '2018-03-24', 'Ongoing', '2018-03-19 18:29:16', '2018-03-19 18:40:19'),
(12, 'Demo Software Engineering System', 'Bernie Jereza', 'iCOMMP System', '2017-11-14', '2018-03-21', 'Ongoing', '2018-03-20 08:18:11', '2018-03-20 17:29:32'),
(13, 'Software Engineering System', 'Bernie Jereza', 'ICOMMP System', '2017-11-14', '2018-03-21', 'Ongoing', '2018-03-20 18:27:34', '2018-03-20 18:27:34');

-- --------------------------------------------------------

--
-- Stand-in structure for view `projects_assigned`
-- (See below for the actual view)
--
CREATE TABLE `projects_assigned` (
`profile_id` int(10)
,`projects_assigned` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `projects_rank`
-- (See below for the actual view)
--
CREATE TABLE `projects_rank` (
`profile_id` int(10)
,`total` bigint(21)
,`worked` bigint(21)
,`percentage` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `projects_worked`
-- (See below for the actual view)
--
CREATE TABLE `projects_worked` (
`profile_id` int(10)
,`projects_worked` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `cluster` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `profile_id`, `cluster`, `staff_pos`, `staff_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'Director', 'ACTIVE', NULL, '2018-03-20 18:59:59'),
(2, 2, 'Editorial & Social Media Cluster', 'Technical Staff', 'ACTIVE', '2018-01-25 21:45:59', '2018-01-26 22:28:25'),
(3, 44, 'Administrator', 'Administrative Associate', 'ACTIVE', '2018-03-20 04:05:09', '2018-03-20 04:05:09'),
(4, 45, 'Broadcast & Productions Cluster', 'Technical Staff', 'ACTIVE', '2018-03-20 04:05:47', '2018-03-20 04:05:47'),
(5, 46, 'Creative Cluster', 'Technical Staff', 'ACTIVE', '2018-03-20 04:06:46', '2018-03-20 04:06:46'),
(6, 47, 'Administrator', 'Consultant', 'ACTIVE', '2018-03-20 04:07:33', '2018-03-20 04:07:33'),
(7, 48, 'Editorial & Social Media Cluster', 'Technical Staff', 'ACTIVE', '2018-03-20 04:08:28', '2018-03-20 04:08:28'),
(8, 49, 'Creative Cluster', 'Technical Staff', 'ACTIVE', '2018-03-20 04:09:05', '2018-03-20 04:09:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sumofborrowed`
-- (See below for the actual view)
--
CREATE TABLE `sumofborrowed` (
`equipment_details_id` int(10) unsigned
,`item_name` varchar(191)
,`quantity_borrowed` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `user_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `staff_id`, `user_status`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'ACTIVE', 'admin', '$2y$10$A2BhT8qjn4cU2HPKP40ppOKBJZ84lz3nvZQ6umw/.4kTfSaJAf0ry', 'LDTRKJYj0iMBh7k91NR534b9T04e0FhLCR5BynucDAcTFlwKCvjjVN6Xs76z', '2018-01-12 10:01:39', '2018-03-20 18:59:59'),
(2, 2, 'ACTIVE', 'avillarba', '$2y$10$udxTbm/0R4M5MjGP7fIJTO3UmTuifv/Y43DJ5zFSzgUpp1YycVlJy', NULL, '2018-01-25 21:45:59', '2018-01-26 22:28:25'),
(3, 3, 'ACTIVE', 'emedija', '$2y$10$krC5Rupl9b1YRbff70.2cuK5d7LkyLFZAfZmU8iw1359W7H.683XC', NULL, '2018-03-20 04:05:10', '2018-03-20 04:05:10'),
(4, 4, 'ACTIVE', 'kpuerto', '$2y$10$MdbXo9wTRBBjInnDbbJT5eFjDERTBa8SEUkzI0eaO79z4xP8FpEwK', 'EnQ2LDFFHxUxMZUDGIhOxLnMvvETfaYuieDVZKTeZSG1dwFVqUnM8YclVaJm', '2018-03-20 04:05:47', '2018-03-20 04:05:47'),
(5, 5, 'ACTIVE', 'gtancontian', '$2y$10$5NwoLH18wXyKkFOac4R5mOOQ.Ain2IVNz5xiYda6gocg9W04tLnU6', NULL, '2018-03-20 04:06:46', '2018-03-20 04:06:46'),
(6, 6, 'ACTIVE', 'vcastrillo', '$2y$10$ajJuSd.n7VYPtzQh9Wj1Yuycjjm83LSMQH6I6HmpJrw2vThEII3si', NULL, '2018-03-20 04:07:33', '2018-03-20 04:07:33'),
(7, 7, 'ACTIVE', 'mgomez', '$2y$10$oJxFyplQ1AWH9cVDZQZflO9PxiMU9xnTQFGriI9yuD7zVyrA8aZPG', NULL, '2018-03-20 04:08:28', '2018-03-20 04:08:28'),
(8, 8, 'ACTIVE', 'mcaballero', '$2y$10$frWqCsT9B0mJBBH96A5XluPJHmOKbBiPeg1mlOWT7wzVEMGHxSkty', NULL, '2018-03-20 04:09:05', '2018-03-20 04:09:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_borrow_details`
-- (See below for the actual view)
--
CREATE TABLE `view_borrow_details` (
`quantity_borrowed` int(11)
,`equipment_details_id` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_damaged`
-- (See below for the actual view)
--
CREATE TABLE `view_damaged` (
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
CREATE TABLE `view_itemtype` (
`item_type` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `vols`
--

CREATE TABLE `vols` (
  `vol_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) DEFAULT NULL,
  `cluster` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearlvl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vol_status` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, 21, 'Broadcast & Productions Cluster', '3rd Year', 'AB Psychology', '3-AB Psychology', 'ACTIVE', '2018-01-21 22:24:11', '2018-03-19 19:35:13'),
(12, 22, 'Broadcast & Productions Cluster', '4th Year', 'AB IS Major in American Studies', '4-AB IS Major in American Studies', 'ACTIVE', '2018-01-21 22:25:30', '2018-01-21 22:25:30'),
(13, 23, 'Editorial & Social Media Cluster', 'Grade 11', 'STEM- Pre Science', '11 STEM- Pre Science', 'ACTIVE', '2018-01-21 22:26:34', '2018-01-21 22:26:34'),
(14, 24, 'Editorial & Social Media Cluster', '4th Year', 'BS Biology', '4-BS Biology', 'ACTIVE', '2018-01-21 22:27:36', '2018-01-21 22:27:36'),
(15, 25, 'Creative Cluster', '3rd Year', 'BS Information Technology', 'InTech 3-A', 'ACTIVE', '2018-01-21 22:28:42', '2018-03-17 00:01:07'),
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
(32, 42, 'Editorial & Social Media Cluster', '3rd Year', 'AB Psychology', '3-AB Psychology', 'ACTIVE', '2018-01-21 22:48:55', '2018-01-21 22:48:55'),
(33, 43, 'Creative Cluster', '3rd Year', 'AB Mass Communications', '3-A', 'ACTIVE', '2018-03-19 18:32:47', '2018-03-19 18:32:47');

-- --------------------------------------------------------

--
-- Structure for view `events_assigned`
--
DROP TABLE IF EXISTS `events_assigned`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `events_assigned`  AS  select `profile_events_assigned`.`profile_id` AS `profile_id`,count(0) AS `events_assigned` from `profile_events_assigned` group by `profile_events_assigned`.`profile_id` ;

-- --------------------------------------------------------

--
-- Structure for view `events_rank`
--
DROP TABLE IF EXISTS `events_rank`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `events_rank`  AS  select `events_assigned`.`profile_id` AS `profile_id`,`events_assigned`.`events_assigned` AS `total`,`events_worked`.`events_worked` AS `worked`,truncate(((`events_worked`.`events_worked` / `events_assigned`.`events_assigned`) * 100),0) AS `percentage` from (`events_assigned` left join `events_worked` on((`events_assigned`.`profile_id` = `events_worked`.`profile_id`))) order by truncate(((`events_worked`.`events_worked` / `events_assigned`.`events_assigned`) * 100),0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `events_worked`
--
DROP TABLE IF EXISTS `events_worked`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `events_worked`  AS  select `profile_events_worked`.`profile_id` AS `profile_id`,count(0) AS `events_worked` from `profile_events_worked` group by `profile_events_worked`.`profile_id` ;

-- --------------------------------------------------------

--
-- Structure for view `milestone_finished`
--
DROP TABLE IF EXISTS `milestone_finished`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `milestone_finished`  AS  select `milestone_projects`.`milestone_projects_id` AS `milestone_projects_id`,`milestone_projects`.`projects_id` AS `projects_id`,`milestone_projects`.`milestone_name` AS `milestone_name`,`milestone_projects`.`milestone_deadline` AS `milestone_deadline`,`milestone_projects`.`milestone_status` AS `milestone_status` from `milestone_projects` where (`milestone_projects`.`milestone_status` = 'Finished') ;

-- --------------------------------------------------------

--
-- Structure for view `projects_assigned`
--
DROP TABLE IF EXISTS `projects_assigned`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `projects_assigned`  AS  select `profile_projects`.`profile_id` AS `profile_id`,count(0) AS `projects_assigned` from `profile_projects` group by `profile_projects`.`profile_id` ;

-- --------------------------------------------------------

--
-- Structure for view `projects_rank`
--
DROP TABLE IF EXISTS `projects_rank`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `projects_rank`  AS  select `projects_assigned`.`profile_id` AS `profile_id`,`projects_assigned`.`projects_assigned` AS `total`,`projects_worked`.`projects_worked` AS `worked`,truncate(((`projects_worked`.`projects_worked` / `projects_assigned`.`projects_assigned`) * 100),0) AS `percentage` from (`projects_assigned` left join `projects_worked` on((`projects_assigned`.`profile_id` = `projects_worked`.`profile_id`))) order by truncate(((`projects_worked`.`projects_worked` / `projects_assigned`.`projects_assigned`) * 100),0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `projects_worked`
--
DROP TABLE IF EXISTS `projects_worked`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `projects_worked`  AS  select `profile_projects_worked`.`profile_id` AS `profile_id`,count(0) AS `projects_worked` from `profile_projects_worked` group by `profile_projects_worked`.`profile_id` ;

-- --------------------------------------------------------

--
-- Structure for view `sumofborrowed`
--
DROP TABLE IF EXISTS `sumofborrowed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `sumofborrowed`  AS  select `equipment_details`.`equipment_details_id` AS `equipment_details_id`,`equipment_details`.`item_name` AS `item_name`,`view_borrow_details`.`quantity_borrowed` AS `quantity_borrowed` from (`equipment_details` left join `view_borrow_details` on((`equipment_details`.`equipment_details_id` = `view_borrow_details`.`equipment_details_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_borrow_details`
--
DROP TABLE IF EXISTS `view_borrow_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `view_borrow_details`  AS  select `borrow_details`.`quantity_borrowed` AS `quantity_borrowed`,`borrow_details`.`equipment_details_id` AS `equipment_details_id` from (`borrow_details` join `borrow`) where (isnull(`borrow`.`returndate`) and (`borrow`.`borrow_id` = `borrow_details`.`borrow_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_damaged`
--
DROP TABLE IF EXISTS `view_damaged`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `view_damaged`  AS  select `equipment_details`.`equipment_details_id` AS `equipment_details_id`,`equipment_details`.`equipment_id` AS `equipment_id`,`equipment_details`.`item_name` AS `item_name`,`equipment_details`.`item_type` AS `item_type`,`equipment_details`.`item_code` AS `item_code`,`equipment_details`.`item_warranty` AS `item_warranty`,`equipment_details`.`item_status` AS `item_status`,`equipment_details`.`item_desc` AS `item_desc`,`equipment_details`.`created_at` AS `created_at`,`equipment_details`.`updated_at` AS `updated_at` from `equipment_details` where (`equipment_details`.`item_status` = 'DAMAGED') ;

-- --------------------------------------------------------

--
-- Structure for view `view_itemtype`
--
DROP TABLE IF EXISTS `view_itemtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wkgenise`@`localhost` SQL SECURITY DEFINER VIEW `view_itemtype`  AS  select distinct `equipment_details`.`item_type` AS `item_type` from `equipment_details` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD PRIMARY KEY (`borrow_details_id`),
  ADD KEY `borrow_id` (`borrow_id`),
  ADD KEY `equipment_details_id` (`equipment_details_id`);

--
-- Indexes for table `borrow_profile`
--
ALTER TABLE `borrow_profile`
  ADD PRIMARY KEY (`borrow_profile_id`),
  ADD KEY `borrow_id` (`borrow_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `equipment_details`
--
ALTER TABLE `equipment_details`
  ADD PRIMARY KEY (`equipment_details_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `items_event`
--
ALTER TABLE `items_event`
  ADD PRIMARY KEY (`items_event_id`),
  ADD KEY `events_id` (`events_id`),
  ADD KEY `equipment_details_id` (`equipment_details_id`);

--
-- Indexes for table `items_project`
--
ALTER TABLE `items_project`
  ADD PRIMARY KEY (`items_project_id`),
  ADD KEY `projects_id` (`projects_id`),
  ADD KEY `equipment_details_id` (`equipment_details_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestone_projects`
--
ALTER TABLE `milestone_projects`
  ADD PRIMARY KEY (`milestone_projects_id`),
  ADD KEY `projects_id` (`projects_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `profiles_email_unique` (`email`);

--
-- Indexes for table `profile_events_assigned`
--
ALTER TABLE `profile_events_assigned`
  ADD PRIMARY KEY (`profile_events_assigned_id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `events_id` (`events_id`);

--
-- Indexes for table `profile_events_worked`
--
ALTER TABLE `profile_events_worked`
  ADD PRIMARY KEY (`profile_events_worked_id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `events_id` (`events_id`);

--
-- Indexes for table `profile_projects`
--
ALTER TABLE `profile_projects`
  ADD PRIMARY KEY (`profile_projects_id`),
  ADD KEY `projects_id` (`projects_id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `milestone_projects_id` (`milestone_projects_id`);

--
-- Indexes for table `profile_projects_worked`
--
ALTER TABLE `profile_projects_worked`
  ADD PRIMARY KEY (`profile_projects_worked_id`),
  ADD KEY `milestone_projects_id` (`milestone_projects_id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `projects_id` (`projects_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projects_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `staffs_ibfk_1` (`profile_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`vol_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `borrow_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `borrow_profile`
--
ALTER TABLE `borrow_profile`
  MODIFY `borrow_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `equipment_details`
--
ALTER TABLE `equipment_details`
  MODIFY `equipment_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items_event`
--
ALTER TABLE `items_event`
  MODIFY `items_event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items_project`
--
ALTER TABLE `items_project`
  MODIFY `items_project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `milestone_projects`
--
ALTER TABLE `milestone_projects`
  MODIFY `milestone_projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `profile_events_assigned`
--
ALTER TABLE `profile_events_assigned`
  MODIFY `profile_events_assigned_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `profile_events_worked`
--
ALTER TABLE `profile_events_worked`
  MODIFY `profile_events_worked_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profile_projects`
--
ALTER TABLE `profile_projects`
  MODIFY `profile_projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `profile_projects_worked`
--
ALTER TABLE `profile_projects_worked`
  MODIFY `profile_projects_worked_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projects_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vols`
--
ALTER TABLE `vols`
  MODIFY `vol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
