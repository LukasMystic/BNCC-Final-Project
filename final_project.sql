-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 11:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kids toy', '2024-07-20 00:06:24', '2024-07-20 00:06:24'),
(2, 'Boardgame', '2024-07-20 00:06:24', '2024-07-20 00:06:24'),
(3, 'Miscellaneous', '2024-07-20 00:06:24', '2024-07-20 00:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_header_id` char(36) NOT NULL,
  `toy_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_02_27_012505_create_categories_table', 1),
(6, '2024_02_27_012509_create_toys_table', 1),
(7, '2024_03_19_003912_create_invoices_table', 1),
(8, '2024_05_06_174046_create_invoice_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `category_id`, `image`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '1721462431_1.jpg', 'Teddy Bear', 'Soft and cuddly teddy bear, perfect for bedtime.', 150000, '2024-07-19 17:08:00', '2024-07-20 01:00:31'),
(2, 1, '1721462436_2.jpg', 'Lego Building Set', 'Creative building blocks for endless fun.', 300000, '2024-07-19 17:08:00', '2024-07-20 01:00:36'),
(3, 1, '1721462442_3.jpg', 'Remote Control Car', 'Fast and durable remote control car.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:00:42'),
(4, 1, '1721462448_4.jpg', 'Barbie Doll', 'Fashionable Barbie doll with accessories.', 200000, '2024-07-19 17:08:00', '2024-07-20 01:00:48'),
(5, 1, '1721462454_5.jpg', 'Action Figure', 'Superhero action figure with movable joints.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:00:54'),
(6, 2, '1721462459_6.jpeg', 'Puzzle Game', '500-piece puzzle game for kids.', 100000, '2024-07-19 17:08:00', '2024-07-20 01:00:59'),
(7, 1, '1721462465_7.jpg', 'Toy Kitchen Set', 'Complete kitchen playset with utensils.', 350000, '2024-07-19 17:08:00', '2024-07-20 01:01:05'),
(8, 1, '1721462470_8.jpg', 'Stuffed Bunny', 'Adorable stuffed bunny with floppy ears.', 140000, '2024-07-19 17:08:00', '2024-07-20 01:01:10'),
(9, 1, '1721462476_9.jpg', 'Train Set', 'Wooden train set with tracks and trains.', 270000, '2024-07-19 17:08:00', '2024-07-20 01:01:16'),
(10, 3, '1721462484_10.jpg', 'Coloring Book', 'Coloring book with 100 pages and crayons.', 50000, '2024-07-19 17:08:00', '2024-07-20 01:01:24'),
(11, 1, '1721462492_11.jpg', 'Plush Dinosaur', 'Soft plush dinosaur for cuddling.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:01:32'),
(12, 3, '1721462498_12.jpg', 'Science Kit', 'Educational science kit for experiments.', 220000, '2024-07-19 17:08:00', '2024-07-20 01:01:38'),
(13, 1, '1721462508_13.jpg', 'Doll House', 'Three-story doll house with furniture.', 500000, '2024-07-19 17:08:00', '2024-07-20 01:01:48'),
(14, 1, '1721462519_14.jpg', 'Toy Robot', 'Interactive toy robot with lights and sounds.', 280000, '2024-07-19 17:08:00', '2024-07-20 01:01:59'),
(15, 3, '1721462528_15.jpg', 'Water Gun', 'Fun water gun for outdoor play.', 120000, '2024-07-19 17:08:00', '2024-07-20 01:02:08'),
(16, 3, '1721462535_16.jpg', 'Craft Kit', 'Craft kit with materials for various projects.', 110000, '2024-07-19 17:08:00', '2024-07-20 01:02:15'),
(17, 1, '1721462542_17.jpg', 'Building Blocks', 'Colorful building blocks for creative play.', 190000, '2024-07-19 17:08:00', '2024-07-20 01:02:22'),
(18, 1, '1721462550_18.jpg', 'Stuffed Elephant', 'Large stuffed elephant with soft fur.', 210000, '2024-07-19 17:08:00', '2024-07-20 01:02:30'),
(19, 3, '1721462596_19.jpg', 'Soccer Ball', 'Standard size soccer ball for kids.', 130000, '2024-07-19 17:08:00', '2024-07-20 01:03:16'),
(20, 1, '1721462603_20.jpg', 'Musical Instrument Set', 'Toy musical instruments including drum and xylophone.', 230000, '2024-07-19 17:08:00', '2024-07-20 01:03:23'),
(21, 3, '1721462612_21.jpg', 'Magic Set', 'Magic set with tricks and props.', 170000, '2024-07-19 17:08:00', '2024-07-20 01:03:32'),
(22, 3, '1721462622_22.jpg', 'Play Tent', 'Colorful play tent for indoor and outdoor use.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:03:42'),
(23, 1, '1721462630_23.jpg', 'Toy Car Set', 'Set of 10 mini toy cars.', 90000, '2024-07-19 17:08:00', '2024-07-20 01:03:50'),
(24, 3, '1721462639_24.jpg', 'Craft Beads', 'Assorted craft beads for jewelry making.', 70000, '2024-07-19 17:08:00', '2024-07-20 01:03:59'),
(25, 1, '1721462648_25.jpg', 'Baby Doll', 'Realistic baby doll with outfit.', 210000, '2024-07-19 17:08:00', '2024-07-20 01:04:08'),
(26, 1, '1721462659_26.jpg', 'Play-Doh Set', 'Set of colorful Play-Doh with molds.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:04:19'),
(27, 1, '1721462668_27.jpg', 'Toy Helicopter', 'Remote control toy helicopter.', 260000, '2024-07-19 17:08:00', '2024-07-20 01:04:28'),
(28, 3, '1721462677_28.jpg', 'Basketball Hoop', 'Indoor basketball hoop with ball.', 190000, '2024-07-19 17:08:00', '2024-07-20 01:04:37'),
(29, 1, '1721462688_29.jpg', 'Stuffed Lion', 'Plush lion with realistic features.', 220000, '2024-07-19 17:08:00', '2024-07-20 01:04:48'),
(30, 1, '1721462701_30.jpg', 'Activity Table', 'Activity table with various games and toys.', 320000, '2024-07-19 17:08:00', '2024-07-20 01:05:01'),
(31, 1, '1721462710_31.jpg', 'Toy Guitar', 'Toy guitar with strings and sound effects.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:05:10'),
(32, 1, '1721462721_32.jpg', 'Alphabet Blocks', 'Wooden alphabet blocks for learning.', 140000, '2024-07-19 17:08:00', '2024-07-20 01:05:21'),
(33, 1, '1721462729_33.jpg', 'Stuffed Penguin', 'Cute stuffed penguin with soft fur.', 150000, '2024-07-19 17:08:00', '2024-07-20 01:05:29'),
(34, 1, '1721462738_34.jpg', 'Toy Boat', 'Floating toy boat for bath time fun.', 80000, '2024-07-19 17:08:00', '2024-07-20 01:05:38'),
(35, 3, '1721462746_35.jpg', 'Art Easel', 'Double-sided art easel with chalkboard and whiteboard.', 300000, '2024-07-19 17:08:00', '2024-07-20 01:05:46'),
(36, 1, '1721462755_36.jpg', 'Race Track Set', 'Race track set with two cars.', 210000, '2024-07-19 17:08:00', '2024-07-20 01:05:55'),
(37, 1, '1721462763_37.jpg', 'Stuffed Dog', 'Fluffy stuffed dog with a wagging tail.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:06:03'),
(38, 2, '1721462771_38.jpg', 'Chess Set', 'Classic chess set with wooden pieces.', 200000, '2024-07-19 17:08:00', '2024-07-20 01:06:11'),
(39, 1, '1721462804_44.jpg', 'Toy Fire Truck', 'Toy fire truck with ladder and hose.', 230000, '2024-07-19 17:08:00', '2024-07-20 01:06:44'),
(40, 1, '1721462819_42.jpg', 'Plush Monkey', 'Soft plush monkey with a long tail.', 150000, '2024-07-19 17:08:00', '2024-07-20 01:06:59'),
(41, 1, '1721463090_40.jpg', 'Dress-Up Costumes', 'Set of dress-up costumes for imaginative play.', 280000, '2024-07-19 17:08:00', '2024-07-20 01:11:30'),
(42, 1, '1721463158_41.jpg', 'Marble Run', 'Marble run set with tracks and marbles.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:12:38'),
(43, 1, '1721463171_47.jpg', 'Stuffed Tiger', 'Realistic stuffed tiger with stripes.', 220000, '2024-07-19 17:08:00', '2024-07-20 01:12:51'),
(44, 1, '1721463128_39.jpg', 'Toy Drum Set', 'Toy drum set with sticks and cymbals.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:12:08'),
(45, 2, '1721463199_43.jpg', 'Jigsaw Puzzle', '1000-piece jigsaw puzzle for kids.', 200000, '2024-07-19 17:08:00', '2024-07-20 01:13:19'),
(46, 1, '1721463421_51.jpg', 'Stuffed Giraffe', 'Tall stuffed giraffe with long neck.', 170000, '2024-07-19 17:08:00', '2024-07-20 01:17:01'),
(47, 1, '1721463275_46.jpg', 'Toy Tractor', 'Toy tractor with detachable trailer.', 150000, '2024-07-19 17:08:00', '2024-07-20 01:14:35'),
(48, 1, '1721463460_52.jpg', 'Plush Unicorn', 'Magical plush unicorn with sparkly horn.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:17:40'),
(49, 1, '1721464574_76.jpg', 'Toy Kitchen Mixer', 'Toy kitchen mixer with sound effects.', 130000, '2024-07-19 17:08:00', '2024-07-20 01:36:14'),
(50, 2, '1721464482_75.png', 'Town of Salem Card Game', 'Exciting card game for 4-36 players.', 170000, '2024-07-19 17:08:00', '2024-07-20 01:35:30'),
(51, 1, '1721464595_77.jpg', 'Toy Camera', 'Toy camera with lights and sounds.', 90000, '2024-07-19 17:08:00', '2024-07-20 01:36:35'),
(52, 3, '1721463304_48.jpg', 'Learning Tablet', 'Interactive learning tablet for kids.', 350000, '2024-07-19 17:08:00', '2024-07-20 01:15:16'),
(53, 1, '1721463604_55.jpg', 'Toy Farm Animals', 'Set of toy farm animals.', 120000, '2024-07-19 17:08:00', '2024-07-20 01:20:04'),
(54, 3, '1721463351_49.jpg', 'Bouncy Ball', 'Large bouncy ball for active play.', 80000, '2024-07-19 17:08:00', '2024-07-20 01:15:51'),
(55, 1, '1721463734_57.jpg', 'Toy Ambulance', 'Toy ambulance with lights and sounds.', 230000, '2024-07-19 17:08:00', '2024-07-20 01:22:14'),
(56, 1, '1721463758_58.jpg', 'Stuffed Horse', 'Plush horse with mane and tail.', 200000, '2024-07-19 17:08:00', '2024-07-20 01:22:38'),
(57, 1, '1721463819_59.jpg', 'Building Set', 'Magnetic building set for creative play.', 290000, '2024-07-19 17:08:00', '2024-07-20 01:23:39'),
(58, 1, '1721463847_60.jpg', 'Toy Pirate Ship', 'Toy pirate ship with figures and accessories.', 240000, '2024-07-19 17:08:00', '2024-07-20 01:24:07'),
(59, 1, '1721463873_61.jpg', 'Plush Bear', 'Soft plush bear with a bow tie.', 170000, '2024-07-19 17:08:00', '2024-07-20 01:24:33'),
(60, 3, '1721463525_53.jpg', 'Magic Wand', 'Light-up magic wand with sound effects.', 100000, '2024-07-19 17:08:00', '2024-07-20 01:18:45'),
(61, 3, '1721463574_54.jpg', 'Sandbox Set', 'Sandbox set with molds and tools.', 220000, '2024-07-19 17:08:00', '2024-07-20 01:19:34'),
(62, 1, '1721464041_64.jpg', 'Toy Airplane', 'Toy airplane with rolling wheels.', 150000, '2024-07-19 17:08:00', '2024-07-20 01:27:21'),
(63, 1, '1721464067_65.jpg', 'Stuffed Owl', 'Plush owl with big eyes and soft feathers.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:27:47'),
(64, 2, '1721464115_66.jpg', 'The Game of Life', 'Family board game for 2-8 players.', 220000, '2024-07-19 17:08:00', '2024-07-20 01:35:07'),
(65, 1, '1721464143_67.jpg', 'Toy Construction Set', 'Construction set with vehicles and tools.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:29:04'),
(66, 1, '1721464165_68.jpg', 'Plush Cat', 'Fluffy plush cat with a bell collar.', 170000, '2024-07-19 17:08:00', '2024-07-20 01:29:25'),
(67, 1, '1721464195_69.jpg', 'Alphabet Puzzle', 'Wooden alphabet puzzle for learning letters.', 130000, '2024-07-19 17:08:00', '2024-07-20 01:29:55'),
(68, 1, '1721464234_70.jpg', 'Toy Submarine', 'Toy submarine with movable parts.', 90000, '2024-07-19 17:08:00', '2024-07-20 01:30:34'),
(69, 3, '1721463679_56.jpg', 'Coloring Markers', 'Set of 24 colorful markers.', 70000, '2024-07-19 17:08:00', '2024-07-20 01:21:45'),
(70, 3, '1721463937_62.jpg', 'Educational Tablet', 'Tablet with educational games and apps.', 380000, '2024-07-19 17:08:00', '2024-07-20 01:25:56'),
(71, 1, '1721464325_72.jpg', 'Stuffed Frog', 'Soft stuffed frog with a smile.', 140000, '2024-07-19 17:08:00', '2024-07-20 01:32:05'),
(72, 3, '1721464349_73.jpg', 'Dance Mat', 'Interactive dance mat with music.', 270000, '2024-07-19 17:08:00', '2024-07-20 01:32:29'),
(73, 1, '1721464659_78.jpg', 'Building Bricks', 'Large set of colorful building bricks.', 200000, '2024-07-19 17:08:00', '2024-07-20 01:37:39'),
(74, 1, '1721464683_79.jpg', 'Toy Doctor Kit', 'Doctor playset with medical tools.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:38:03'),
(75, 1, '1721464707_80.jpg', 'Stuffed Koala', 'Cuddly stuffed koala with soft fur.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:38:27'),
(76, 1, '1721464732_81.jpg', 'Puzzle Blocks', 'Set of puzzle blocks for creative building.', 190000, '2024-07-19 17:08:00', '2024-07-20 01:38:52'),
(77, 1, '1721464762_82.jpg', 'Toy Spaceship', 'Toy spaceship with lights and sounds.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:39:22'),
(78, 1, '1721465311_100.jpeg', 'Stuffed Elephant', 'Adorable stuffed elephant with large ears.', 140000, '2024-07-19 17:08:00', '2024-07-20 01:48:31'),
(79, 1, '1721465292_99.jpg', 'Toy Cash Register', 'Toy cash register with play money.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:48:12'),
(80, 1, '1721465273_98.jpg', 'Building Tiles', 'Magnetic building tiles for creative play.', 300000, '2024-07-19 17:08:00', '2024-07-20 01:47:53'),
(81, 1, '1721465199_96.jpg', 'Toy Garage Set', 'Garage playset with cars and ramps.', 220000, '2024-07-19 17:08:00', '2024-07-20 01:46:39'),
(82, 1, '1721465234_97.jpg', 'Stuffed Giraffe', 'Soft stuffed giraffe with a long neck.', 170000, '2024-07-19 17:08:00', '2024-07-20 01:47:14'),
(83, 3, '1721463235_45.jpg', 'Art Supplies Kit', 'Comprehensive art supplies kit for kids.', 240000, '2024-07-19 17:08:00', '2024-07-20 01:13:55'),
(84, 1, '1721465167_95.jpg', 'Toy Ice Cream Cart', 'Toy ice cream cart with scoops and cones.', 200000, '2024-07-19 17:08:00', '2024-07-20 01:46:07'),
(85, 1, '1721465129_94.jpeg', 'Stuffed Bear', 'Soft and cuddly stuffed bear.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:45:29'),
(86, 1, '1721463361_50.jpg', 'Toy Police Car', 'Toy police car with lights and sirens.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:16:01'),
(87, 1, '1721465101_93.jpg', 'Building Blocks Set', 'Set of colorful building blocks for toddlers.', 140000, '2024-07-19 17:08:00', '2024-07-20 01:45:01'),
(88, 1, '1721465076_92.jpg', 'Stuffed Turtle', 'Soft stuffed turtle with a cute face.', 150000, '2024-07-19 17:08:00', '2024-07-20 01:44:36'),
(89, 3, '1721464287_71.jpg', 'Science Experiment Kit', 'Kit for conducting fun science experiments.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:31:27'),
(90, 1, '1721465055_91.jpg', 'Toy Fire Station', 'Toy fire station with fire trucks and accessories.', 250000, '2024-07-19 17:08:00', '2024-07-20 01:44:15'),
(91, 1, '1721465035_90.jpg', 'Stuffed Rabbit', 'Fluffy stuffed rabbit with long ears.', 150000, '2024-07-19 17:08:00', '2024-07-20 01:43:55'),
(92, 1, '1721465003_89.jpg', 'Toy Tool Set', 'Toy tool set with hammer, screwdriver, and wrench.', 140000, '2024-07-19 17:08:00', '2024-07-20 01:43:23'),
(93, 1, '1721464975_88.jpg', 'Stuffed Elephant', 'Cuddly stuffed elephant with soft fur.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:42:56'),
(94, 1, '1721464941_87.jpg', 'Toy Train', 'Toy train with tracks and lights.', 200000, '2024-07-19 17:08:00', '2024-07-20 01:42:21'),
(95, 1, '1721464918_86.jpg', 'Stuffed Bear', 'Soft plush bear with a bow tie.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:41:58'),
(96, 1, '1721464890_85.jpg', 'Toy Dinosaur', 'Toy dinosaur with realistic sounds.', 170000, '2024-07-19 17:08:00', '2024-07-20 01:41:30'),
(97, 1, '1721464867_84.jpg', 'Stuffed Dog', 'Fluffy stuffed dog with a wagging tail.', 160000, '2024-07-19 17:08:00', '2024-07-20 01:41:07'),
(98, 1, '1721464813_83.jpg', 'Stuffed Panda', 'Cute stuffed panda with bamboo accessory.', 180000, '2024-07-19 17:08:00', '2024-07-20 01:40:13'),
(99, 3, '1721464382_74.jpg', 'Trampoline', 'Outdoor trampoline for active play.', 500000, '2024-07-19 17:08:00', '2024-07-20 01:33:02'),
(100, 3, '1721464014_63.jpg', 'Playhouse', 'Outdoor playhouse with windows and door.', 500000, '2024-07-19 17:08:00', '2024-07-20 01:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$12$XbShcvS8UxLWK6x0WnYVkePFguRT2MvZ4d7/vhKJ/fG/RZoHmFdAS', NULL, '2024-07-20 00:06:24', '2024-07-20 00:06:24'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$12$WYE4hJmPHjj8sOrTB81BdeOpMDk3nn/9VNEhmIy7y6T7nAiGhN6t.', 'u7uOSQMOKarVBQpdVicDblPVY0QeL8nRRp1eipfEAvlupAEeKKJIuVIx4dZt', '2024-07-20 00:06:24', '2024-07-20 00:06:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_details_invoice_header_id_foreign` (`invoice_header_id`),
  ADD KEY `invoice_details_toy_id_foreign` (`toy_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toys_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toys`
--
ALTER TABLE `toys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_invoice_header_id_foreign` FOREIGN KEY (`invoice_header_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_details_toy_id_foreign` FOREIGN KEY (`toy_id`) REFERENCES `toys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `toys`
--
ALTER TABLE `toys`
  ADD CONSTRAINT `toys_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
