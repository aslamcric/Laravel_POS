-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 04:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Smart Electronics', 'Latest in smartphones, smartwatches, and home automation, reshaping daily life in Bangladesh.', '2025-02-18 04:15:07', '2025-02-17 23:16:58'),
(2, 'Bangladesh Tech Innovations', 'Showcasing local tech innovations in Bangladesh.', '2025-02-18 04:15:07', '2025-02-17 23:16:41'),
(3, 'Consumer Electronics', 'From affordable yet powerful smartphones to home entertainment systems.', '2025-02-18 04:15:07', '2025-02-17 23:17:43'),
(5, 'Salman Traders', 'sddfdd', '2025-02-17 22:33:23', '2025-02-17 22:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `photo`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Aslam', '1.jpg', '01744445678', 'aslam@example.com', 'Dhaka, Bangladesh', '2025-03-22 06:31:52', '2025-03-22 06:31:52'),
(2, 'Salman', '2.png', '01844445679', 'salman@example.com', 'Chittagong, Bangladesh', '2025-03-22 06:29:34', '2025-03-22 00:36:54'),
(3, 'Mizan', '3.png', '01944445677', 'mizan@example.com', 'Sylhet, Bangladesh', '2025-03-12 05:57:06', '2025-03-22 00:37:12'),
(4, 'Md. Rahim Uddin', '4.jpg', '01812345678', 'rahim.uddin@example.com', '45/A Green Road, Dhaka, Bangladesh', '2025-03-12 05:57:17', '2025-03-12 05:57:17'),
(5, 'Ayesha Siddiqua', '5.png', '01798765432', 'ayesha.siddiqua@example.com', '12/3 Bashundhara, Dhaka, Bangladesh', '2025-03-12 05:57:28', '2025-03-22 00:37:49'),
(6, 'Tanvir Hasan', '6.jpg', '01655667788', 'tanvir.hasan@example.com', '78 Lake Circus, Kalabagan, Dhaka, Bangladesh', '2025-03-12 05:57:38', '2025-03-12 05:57:38'),
(7, 'Farzana Akter', '7.png', '01911223344', 'farzana.akter@example.com', 'House-10, Road-5, Uttara, Dhaka, Bangladesh', '2025-03-12 06:54:18', '2025-03-22 00:38:09'),
(8, 'Jamal Hossain', '8.jpg', '01599887766', 'jamal.hossain@example.com', '25/A Agrabad, Chattogram, Bangladesh', '2025-03-12 06:58:19', '2025-03-12 06:58:19');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka Electronics Ltd.', '+8801234567890', 'info@dhakatelecom.com', '123, Mirpur Road, Dhaka, Bangladesh', '2025-02-18 07:11:11', '2025-02-18 07:11:11'),
(2, 'Chittagong Appliances Ltd.', '+8802345678901', 'contact@chittagongappl.com', '456, Kazir Dewri, Chittagong, Bangladesh', '2025-02-18 07:11:11', '2025-02-18 07:11:11'),
(3, 'Sylhet Tech Industries', '+8803456789012', 'support@sylhettech.com', '789, Osmani Nagar, Sylhet, Bangladesh', '2025-02-18 07:11:11', '2025-02-18 07:11:11');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_22_034925_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `shipping_address` varchar(200) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_total`, `discount`, `shipping_address`, `paid_amount`, `status_id`, `order_date`, `delivery_date`, `vat`, `remark`, `created_at`, `updated_at`) VALUES
(118, 3, 11182.5, 150, '', 11182.5, 1, '2025-03-12', '2025-03-19', 532.5, '', '2025-03-12 04:34:46', '2025-03-12 04:34:46'),
(119, 2, 6195, 200, '', 6195, 1, '2025-03-12', '2025-03-19', 295, '', '2025-03-12 05:15:23', '2025-03-12 05:15:23'),
(120, 6, 315, 50, '', 315, 1, '2025-03-12', '2025-03-19', 15, '', '2025-03-12 05:45:14', '2025-03-12 05:45:14'),
(122, 1, 262.5, 0, '', 262.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:45:16', '2025-03-18 05:45:16'),
(123, 5, 1890, 0, '', 1890, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:45:34', '2025-03-18 05:45:34'),
(124, 4, 4830, 150, '', 4830, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:47:08', '2025-03-18 05:47:08'),
(125, 4, 4830, 150, '', 4830, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:47:25', '2025-03-18 05:47:25'),
(126, 3, 1048.95, 0, '', 1048.95, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:49:45', '2025-03-18 05:49:45'),
(127, 3, 1048.95, 0, '', 1048.95, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:50:08', '2025-03-18 05:50:08'),
(128, 3, 1048.95, 0, '', 1048.95, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:50:23', '2025-03-18 05:50:23'),
(129, 3, 1048.95, 0, '', 1048.95, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:51:12', '2025-03-18 05:51:12'),
(130, 3, 1048.95, 0, '', 1048.95, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:54:19', '2025-03-18 05:54:19'),
(131, 3, 1048.95, 0, '', 1048.95, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:56:41', '2025-03-18 05:56:41'),
(132, 4, 1260, 0, '', 1260, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:57:37', '2025-03-18 05:57:37'),
(133, 4, 1260, 0, '', 1260, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:57:49', '2025-03-18 05:57:49'),
(134, 3, 262.5, 0, '', 262.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 05:59:08', '2025-03-18 05:59:08'),
(135, 4, 105, 0, '', 105, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:01:28', '2025-03-18 06:01:28'),
(136, 1, 2625, 0, '', 2625, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:03:07', '2025-03-18 06:03:07'),
(137, 2, 2625, 0, '', 2625, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:03:45', '2025-03-18 06:03:45'),
(138, 2, 262.5, 0, '', 262.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:05:17', '2025-03-18 06:05:17'),
(139, 2, 262.5, 0, '', 262.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:06:15', '2025-03-18 06:06:15'),
(140, 2, 262.5, 0, '', 262.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:06:58', '2025-03-18 06:06:58'),
(141, 2, 262.5, 0, '', 262.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:10:16', '2025-03-18 06:10:16'),
(142, 3, 1155, 0, '', 1155, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:10:49', '2025-03-18 06:10:49'),
(143, 5, 409.5, 60, '', 409.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:12:00', '2025-03-18 06:12:00'),
(144, 3, 1260, 0, '', 1260, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:13:36', '2025-03-18 06:13:36'),
(145, 5, 105, 0, '', 105, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:14:24', '2025-03-18 06:14:24'),
(146, 4, 1575, 0, '', 1575, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:15:00', '2025-03-18 06:15:00'),
(147, 3, 105, 0, '', 105, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:16:34', '2025-03-18 06:16:34'),
(148, 4, 367.5, 0, '', 367.5, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:18:39', '2025-03-18 06:18:39'),
(149, 3, 105, 0, '', 105, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:19:23', '2025-03-18 06:19:23'),
(150, 6, 1575, 0, '', 1575, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:20:31', '2025-03-18 06:20:31'),
(151, 4, 105, 0, '', 105, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:21:44', '2025-03-18 06:21:44'),
(152, 4, 2625, 0, '', 2625, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:23:32', '2025-03-18 06:23:32'),
(153, 5, 1260, 150, '', 1260, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:25:11', '2025-03-18 06:25:11'),
(154, 4, 2625, 0, '', 2625, 1, '2025-03-18', '2025-03-25', NULL, '', '2025-03-18 06:33:41', '2025-03-18 06:33:41'),
(155, 1, 1837.5, 50, '', 1837.5, 1, '2025-03-19', '2025-03-26', NULL, '', '2025-03-19 03:27:14', '2025-03-19 03:27:14'),
(156, 4, 1974, 120, '', 1974, 1, '2025-03-19', '2025-03-26', NULL, '', '2025-03-19 04:01:12', '2025-03-19 04:01:12'),
(157, 6, 735, 50, '', 735, 1, '2025-03-19', '2025-03-26', NULL, '', '2025-03-19 06:11:19', '2025-03-19 06:11:19'),
(158, 7, 9586.5, 120, '', 9586.5, 1, '2025-03-22', '2025-03-29', NULL, '', '2025-03-22 03:15:50', '2025-03-22 03:15:50'),
(159, 3, 3150, 600, '', 3150, 1, '2025-03-22', '2025-03-29', NULL, '', '2025-03-22 05:22:41', '2025-03-22 05:22:41'),
(160, 2, 3759, 320, '', 3759, 1, '2025-03-23', '2025-03-30', 179, '', '2025-03-23 03:24:09', '2025-03-23 03:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `vat` double DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `vat`, `uom_id`, `discount`, `created_at`, `updated_at`) VALUES
(81, 118, 11, 3, 1100, 532.5, 1, 100, '2025-03-12 04:34:46', '2025-03-12 04:34:46'),
(82, 118, 14, 3, 2500, 532.5, 1, 50, '2025-03-12 04:34:46', '2025-03-12 04:34:46'),
(83, 119, 11, 1, 1100, 295, 1, 100, '2025-03-12 05:15:23', '2025-03-12 05:15:23'),
(84, 119, 14, 2, 2500, 295, 1, 100, '2025-03-12 05:15:23', '2025-03-12 05:15:23'),
(85, 120, 9, 1, 350, 15, 1, 50, '2025-03-12 05:45:14', '2025-03-12 05:45:14'),
(86, 150, 13, 1, 1500, 0, 1, 0, '2025-03-18 06:20:31', '2025-03-18 06:20:31'),
(87, 151, 12, 1, 100, 0, 1, 0, '2025-03-18 06:21:44', '2025-03-18 06:21:44'),
(88, 152, 14, 1, 2500, 0, 1, 0, '2025-03-18 06:23:33', '2025-03-18 06:23:33'),
(89, 153, 15, 1, 250, 0, 1, 50, '2025-03-18 06:25:11', '2025-03-18 06:25:11'),
(90, 153, 11, 1, 1100, 0, 1, 100, '2025-03-18 06:25:11', '2025-03-18 06:25:11'),
(91, 154, 14, 1, 2500, 0, 1, 0, '2025-03-18 06:33:41', '2025-03-18 06:33:41'),
(92, 155, 16, 1, 1800, 0, 1, 50, '2025-03-19 03:27:14', '2025-03-19 03:27:14'),
(93, 156, 13, 3, 1500, 0, 1, 20, '2025-03-19 04:01:13', '2025-03-19 04:01:13'),
(94, 156, 14, -1, 2500, 0, 1, 100, '2025-03-19 04:01:13', '2025-03-19 04:01:13'),
(95, 157, 15, 3, 250, 0, 1, 50, '2025-03-19 06:11:19', '2025-03-19 06:11:19'),
(96, 158, 15, 1, 250, 0, 1, 20, '2025-03-22 03:15:50', '2025-03-22 03:15:50'),
(97, 158, 16, 5, 1800, 0, 1, 100, '2025-03-22 03:15:50', '2025-03-22 03:15:50'),
(98, 159, 16, 2, 1800, 0, 1, 600, '2025-03-22 05:22:41', '2025-03-22 05:22:41'),
(99, 160, 10, 3, 1200, 179, 1, 300, '2025-03-23 03:24:09', '2025-03-23 03:24:09'),
(100, 160, 12, 3, 100, 179, 1, 20, '2025-03-23 03:24:09', '2025-03-23 03:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 'Order has been placed but not processed yet', '2025-03-04 03:56:26', '2025-03-04 03:56:26'),
(2, 'Processing', 'Order is being prepared', '2025-03-04 03:56:26', '2025-03-04 03:56:26'),
(3, 'Shipped', 'Order has been shipped to the customer', '2025-03-04 03:56:26', '2025-03-04 03:56:26'),
(4, 'Delivered', 'Order has been delivered successfully', '2025-03-04 03:56:26', '2025-03-04 03:56:26'),
(5, 'Cancelled', 'Order has been cancelled by the customer or seller', '2025-03-04 03:56:26', '2025-03-04 03:56:26'),
(6, 'Refunded', 'Order has been refunded to the customer', '2025-03-04 03:56:26', '2025-03-04 03:56:26');

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
-- Table structure for table `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_statuses`
--

INSERT INTO `payment_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Paid', '2025-03-03 05:33:15', '2025-03-03 05:33:15'),
(2, 'Unpaid', '2025-03-03 05:33:15', '2025-03-03 05:33:15'),
(3, 'Pending', '2025-03-03 05:33:15', '2025-03-03 05:33:15');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `price` double NOT NULL,
  `offer_price` double DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `barcode` bigint(20) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `size` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `price`, `offer_price`, `category_id`, `uom_id`, `barcode`, `sku`, `manufacturer_id`, `description`, `weight`, `size`, `created_at`, `updated_at`) VALUES
(7, 'Laptop HP Pavilion', '7.webp', 750, 700, 1, 1, 1234567890123, 'HP-PAV-01', 1, 'High-performance HP laptop with 16GB RAM', 2.5, '15.6 inch', '2025-03-12 07:00:38', '2025-03-12 07:00:39'),
(8, 'Samsung Galaxy S22', '8.jpg', 999, 950, 2, 2, 1234567890124, 'SAM-S22', 2, 'Latest Samsung flagship smartphone', 0.2, '6.1 inch', '2025-03-12 06:50:20', '2025-03-12 06:50:20'),
(9, 'Sony Headphones WH-1000XM5', '9.jpg', 350, 320, 3, 3, 1234567890125, 'SONY-XM5', 3, 'Noise-canceling wireless headphones', 0.3, 'Standard', '2025-03-05 05:01:20', '2025-03-05 05:01:20'),
(10, 'Dell XPS 13', '10.webp', 1200, 1150, 1, 1, 1234567890126, 'DELL-XPS-13', 1, 'Ultra-thin lightweight laptop with OLED display', 1.2, '13.4 inch', '2025-03-05 05:02:19', '2025-03-05 05:02:19'),
(11, 'Apple iPhone 14', '11.webp', 1100, 1050, 2, 2, 1234567890127, 'IPHONE-14', 2, 'Latest Apple smartphone with A15 chip', 0.2, '6.1 inch', '2025-03-05 05:03:16', '2025-03-05 05:03:16'),
(12, 'Logitech MX Master 3', '12.webp', 100, 90, 1, 1, 1234567890128, 'LOGI-MX3', 1, 'Ergonomic wireless mouse for productivity', 0.15, 'Standard', '2025-03-05 05:05:01', '2025-03-05 05:05:01'),
(13, 'Samsung 4K Smart TV', '13.avif', 1500, 1400, 5, 1, 1234567890129, 'SAM-TV-4K', 2, '65-inch UHD Smart TV with HDR', 20, '65 inch', '2025-03-05 05:06:05', '2025-03-05 05:06:05'),
(14, 'Canon EOS R6 Camera', '14.jpg', 2500, 2400, 1, 1, 1234567890130, 'CANON-R6', 1, 'Mirrorless camera with 4K video recording', 1.5, 'Standard', '2025-03-05 05:06:51', '2025-03-05 05:06:51'),
(15, 'Bose SoundLink Speaker', '15.jpg', 250, 230, 3, 3, 1234567890131, 'BOSE-SL', 3, 'Portable Bluetooth speaker with deep bass', 0.6, 'Compact', '2025-03-05 05:08:10', '2025-03-05 05:08:10'),
(16, 'Asus ROG Gaming Laptop', '16.jpg', 1800, 1750, 1, 1, 1234567890132, 'ASUS-ROG', 1, 'High-end gaming laptop with RTX 3080 GPU', 2.8, '17.3 inch', '2025-03-05 05:09:22', '2025-03-05 05:09:22'),
(17, 'Aslam Traders', '17.jpg', 1500, 1200, 3, 1, 123, '235', 3, 'dasjfju', 10, '.5', '2025-03-23 03:26:37', '2025-03-23 03:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `order_total` double NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shipping_address` varchar(150) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `status_id`, `order_total`, `paid_amount`, `discount`, `vat`, `photo`, `date`, `shipping_address`, `description`, `created_at`, `updated_at`) VALUES
(57, 2, 2, 9135, 9135, 150, 435, NULL, '2025-03-12', NULL, '', '2025-03-12 04:12:29', '2025-03-12 04:12:29'),
(58, 3, 2, 5460, 5460, 50, 260, NULL, '2025-03-12', NULL, '', '2025-03-12 04:47:43', '2025-03-12 04:47:43'),
(59, 1, 2, 213675, 213675, 1500, 10175, NULL, '2025-03-19', NULL, '', '2025-03-19 03:26:45', '2025-03-19 03:26:45'),
(60, 3, 2, 7350, 7350, 500, 350, NULL, '2025-03-22', NULL, '', '2025-03-22 06:28:14', '2025-03-22 06:28:14'),
(61, 4, 2, 7350, 7350, 500, 350, NULL, '2025-03-23', NULL, '', '2025-03-23 03:34:30', '2025-03-23 03:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_details`
--

CREATE TABLE `purchases_details` (
  `id` int(11) NOT NULL,
  `purchases_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases_details`
--

INSERT INTO `purchases_details` (`id`, `purchases_id`, `product_id`, `qty`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(26, 56, 8, 1, 999, 99, '2025-03-12 04:03:24', '2025-03-12 04:03:24'),
(27, 56, 11, 1, 1100, 100, '2025-03-12 04:03:24', '2025-03-12 04:03:24'),
(28, 56, 12, 1, 100, 0, '2025-03-12 04:03:24', '2025-03-12 04:03:24'),
(29, 57, 7, 7, 750, 50, '2025-03-12 04:12:29', '2025-03-12 04:12:29'),
(30, 57, 10, 3, 1200, 100, '2025-03-12 04:12:29', '2025-03-12 04:12:29'),
(31, 58, 7, 7, 750, 50, '2025-03-12 04:47:43', '2025-03-12 04:47:43'),
(32, 59, 16, 100, 1800, 1000, '2025-03-19 03:26:45', '2025-03-19 03:26:45'),
(33, 59, 15, 100, 250, 500, '2025-03-19 03:26:45', '2025-03-19 03:26:45'),
(34, 60, 14, 3, 2500, 500, '2025-03-22 06:28:14', '2025-03-22 06:28:14'),
(35, 61, 14, 3, 2500, 500, '2025-03-23 03:34:30', '2025-03-23 03:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `id` int(11) NOT NULL,
  `purchases_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `purchase_status_id` int(11) DEFAULT NULL,
  `order_total` double NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shipping_address` varchar(150) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_returns`
--

INSERT INTO `purchase_returns` (`id`, `purchases_id`, `supplier_id`, `purchase_status_id`, `order_total`, `paid_amount`, `discount`, `vat`, `date`, `shipping_address`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 5000, 4500, 200, 50, '2025-03-05', '123 Street, Dhaka', 'Defective items returned', '2025-03-05 03:51:06', '2025-03-05 03:51:06'),
(2, 2, 3, 2, 3000, 2800, 100, 30, '2025-03-06', '456 Avenue, Chittagong', 'Damaged packaging', '2025-03-05 03:51:06', '2025-03-05 03:51:06'),
(3, 3, 4, 1, 7000, 6500, 300, 70, '2025-03-07', '789 Road, Sylhet', 'Incorrect items received', '2025-03-05 03:51:06', '2025-03-05 03:51:06'),
(11, 1, 3, 1, 945, 945, 99, 45, '2025-03-06', NULL, 'Display', '2025-03-06 05:00:42', '2025-03-06 05:00:42'),
(12, 1, 2, 1, 945, 945, 99, 45, '2025-03-06', NULL, 'Display', '2025-03-06 05:02:37', '2025-03-06 05:02:37'),
(13, 1, 3, 1, 6195, 6195, 100, 295, '2025-03-06', NULL, 'Broken', '2025-03-06 05:13:44', '2025-03-06 05:13:44'),
(14, 1, 4, 1, 127575, 127575, 0, 6075, '2025-03-06', NULL, 'Display Problem', '2025-03-06 05:14:45', '2025-03-06 05:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_details`
--

CREATE TABLE `purchase_return_details` (
  `id` int(11) NOT NULL,
  `purchase_return_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_return_details`
--

INSERT INTO `purchase_return_details` (`id`, `purchase_return_id`, `product_id`, `qty`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 101, 2, 1500, 50, '2025-03-05 03:51:29', '2025-03-05 03:51:29'),
(2, 1, 102, 1, 2000, 100, '2025-03-05 03:51:29', '2025-03-05 03:51:29'),
(3, 2, 103, 3, 900, 30, '2025-03-05 03:51:29', '2025-03-05 03:51:29'),
(4, 3, 104, 4, 1700, 70, '2025-03-05 03:51:29', '2025-03-05 03:51:29'),
(5, 3, 105, 2, 2500, 200, '2025-03-05 03:51:29', '2025-03-05 03:51:29'),
(6, 7, 8, 1, 999, 99, '2025-03-06 04:41:02', '2025-03-06 04:41:02'),
(7, 8, 8, 1, 999, 99, '2025-03-06 04:43:11', '2025-03-06 04:43:11'),
(8, 9, 8, 1, 999, 99, '2025-03-06 04:46:43', '2025-03-06 04:46:43'),
(9, 10, 8, 1, 999, 99, '2025-03-06 04:47:23', '2025-03-06 04:47:23'),
(10, 11, 8, 1, 999, 99, '2025-03-06 05:00:42', '2025-03-06 05:00:42'),
(11, 13, 10, 5, 1200, 100, '2025-03-06 05:13:44', '2025-03-06 05:13:44'),
(12, 14, 13, 81, 1500, 0, '2025-03-06 05:14:45', '2025-03-06 05:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_statuses`
--

CREATE TABLE `purchase_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_statuses`
--

INSERT INTO `purchase_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Returned', '2025-03-05 04:47:14', '2025-03-06 05:07:39'),
(2, 'Approved', '2025-03-05 04:47:14', '2025-03-05 04:47:14'),
(3, 'Rejected', '2025-03-05 04:47:14', '2025-03-05 04:47:14'),
(4, 'Completed', '2025-03-05 04:47:14', '2025-03-05 04:47:14'),
(5, 'Cancelled', '2025-03-05 04:47:14', '2025-03-05 04:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2025-02-19 03:17:36', '2025-02-19 03:17:36'),
(2, 'Manager', '2025-02-19 03:17:36', '2025-02-19 03:17:36'),
(3, 'User', '2025-02-19 03:17:36', '2025-02-19 03:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4JhNHVURLQIDvxUH62ueFoVa86yXQ0179K2p2UlM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidlYxU0MwMTRFTlJPVTB3VE9ZSnBNdDdyTVlkNXN5d2R4SlA5R3pXTyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL29yZGVycy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740028807);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'On Credit', '2025-02-19 03:18:52', '2025-03-12 05:50:38'),
(2, 'Pending', '2025-02-19 03:18:52', '2025-03-12 05:50:35'),
(3, 'Delivered', '2025-02-19 03:18:52', '2025-02-19 03:18:52'),
(4, 'Paid', '2025-03-02 05:21:10', '2025-03-02 05:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `qty` double NOT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `transaction_type_id`, `warehouse_id`, `qty`, `uom_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 20, 1, 'Purchase', '2025-02-19 05:55:09', '2025-03-04 05:08:14'),
(2, 8, 2, 2, 50, 2, 'Sales', '2025-02-19 05:55:09', '2025-03-04 05:08:22'),
(3, 9, 3, 3, 15, 3, 'Sales', '2025-02-19 05:55:09', '2025-03-04 05:08:28'),
(19, 7, 2, 1, -1, 1, 'Sales', '2025-02-26 06:11:07', '2025-02-26 06:11:07'),
(20, 8, 2, 1, -5, 1, 'Sales', '2025-02-26 06:16:53', '2025-02-26 06:16:53'),
(21, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:11:55', '2025-02-26 07:11:55'),
(22, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:11:58', '2025-02-26 07:11:58'),
(23, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:00', '2025-02-26 07:12:00'),
(24, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:00', '2025-02-26 07:12:00'),
(25, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:01', '2025-02-26 07:12:01'),
(26, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:01', '2025-02-26 07:12:01'),
(27, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:15', '2025-02-26 07:12:15'),
(28, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:16', '2025-02-26 07:12:16'),
(29, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:16', '2025-02-26 07:12:16'),
(30, 10, 2, 1, -2, 1, 'Sales', '2025-02-26 07:12:25', '2025-02-26 07:12:25'),
(31, 10, 2, 1, -5, 1, 'Sales', '2025-02-26 07:13:48', '2025-02-26 07:13:48'),
(32, 10, 2, 1, 5, 1, 'Sales', '2025-02-26 07:15:03', '2025-02-26 07:15:03'),
(33, 10, 2, 1, 5, 1, 'Sales', '2025-02-26 07:17:24', '2025-02-26 07:17:24'),
(34, 8, 2, 1, 5, 1, 'Sales', '2025-03-01 04:34:15', '2025-03-01 04:34:15'),
(35, 8, 2, 1, 5, 1, 'Purchase', '2025-03-01 04:43:58', '2025-03-01 04:43:58'),
(36, 10, 2, 1, 5, 1, 'Purchase', '2025-03-01 04:43:58', '2025-03-01 04:43:58'),
(37, 16, 2, 1, 10, 1, 'Purchase', '2025-03-01 04:45:32', '2025-03-01 04:45:32'),
(38, 11, 2, 1, 10, 1, 'Purchase', '2025-03-02 05:05:50', '2025-03-02 05:05:50'),
(39, 11, 1, 2, 5, 1, 'Adjust', '2025-03-04 05:03:10', '2025-03-04 05:07:37'),
(40, 16, 1, 1, 5, 1, 'Adjust', '2025-03-04 05:05:23', '2025-03-04 05:07:41'),
(41, 12, 2, 1, 50, 1, 'Purchase', '2025-03-04 05:30:15', '2025-03-04 05:30:15'),
(42, 10, 2, 1, 115, 1, 'Purchase', '2025-03-04 05:34:22', '2025-03-12 04:40:05'),
(43, 7, 2, 1, 5, 1, 'Purchase', '2025-03-04 05:39:22', '2025-03-04 05:39:22'),
(44, 11, 2, 1, -4, 1, 'Sales', '2025-03-04 05:41:02', '2025-03-04 05:41:02'),
(45, 11, 2, 1, -4, 1, 'Sales', '2025-03-04 05:45:56', '2025-03-04 05:45:56'),
(46, 11, 2, 1, 8, 1, 'Purchase', '2025-03-04 05:48:37', '2025-03-04 05:48:37'),
(47, 11, 2, 1, 8, 1, 'Purchase', '2025-03-04 05:55:13', '2025-03-04 05:55:13'),
(48, 11, 2, 1, 8, 1, 'Purchase', '2025-03-04 05:55:25', '2025-03-04 05:55:25'),
(49, 11, 2, 1, 8, 1, 'Purchase', '2025-03-04 06:20:46', '2025-03-04 06:20:46'),
(50, 13, 2, 1, 201, 1, 'Purchase', '2025-03-04 06:20:47', '2025-03-04 06:20:47'),
(51, 11, 2, 1, 8, 1, 'Purchase', '2025-03-04 06:23:02', '2025-03-04 06:23:02'),
(52, 13, 2, 1, 201, 1, 'Purchase', '2025-03-04 06:23:02', '2025-03-04 06:23:02'),
(53, 11, 2, 1, 8, 1, 'Purchase', '2025-03-04 06:35:58', '2025-03-04 06:35:58'),
(54, 11, 2, 1, 8, 1, 'Purchase', '2025-03-04 06:41:12', '2025-03-04 06:41:12'),
(55, 11, 2, 1, -4, 1, 'Sales', '2025-03-04 06:42:34', '2025-03-04 06:42:34'),
(56, 13, 2, 1, -11, 1, 'Sales', '2025-03-05 03:28:42', '2025-03-05 03:28:42'),
(57, 13, 2, 1, -10, 1, 'Sales', '2025-03-05 03:31:02', '2025-03-05 03:31:02'),
(58, 7, 2, 1, 1, 1, 'Purchase', '2025-03-06 03:54:40', '2025-03-06 03:54:40'),
(59, 7, 2, 1, 1, 1, 'Purchase', '2025-03-06 03:56:42', '2025-03-06 03:56:42'),
(60, 8, 2, 1, -1, 1, 'Sales', '2025-03-06 04:43:11', '2025-03-06 04:43:11'),
(61, 8, 2, 1, -1, 1, 'Purchase Returns', '2025-03-06 04:46:43', '2025-03-06 04:46:43'),
(62, 8, 2, 1, -1, 1, 'Purchase Returns', '2025-03-06 04:47:23', '2025-03-06 04:47:23'),
(63, 8, 2, 1, -1, 1, 'Purchase Returns', '2025-03-06 05:00:42', '2025-03-06 05:00:42'),
(64, 10, 2, 1, 15, 1, 'Purchase Returns', '2025-03-06 05:13:44', '2025-03-06 05:15:27'),
(65, 13, 2, 1, -81, 1, 'Purchase Returns', '2025-03-06 05:14:45', '2025-03-06 05:14:45'),
(66, 13, 2, 1, -5, 1, 'Sales', '2025-03-06 05:27:38', '2025-03-06 05:27:38'),
(67, 16, 2, 1, -14, 1, 'Sales', '2025-03-10 06:57:12', '2025-03-12 04:58:01'),
(68, 14, 2, 1, -1, 1, 'Sales', '2025-03-10 06:57:12', '2025-03-10 06:57:12'),
(69, 12, 2, 1, -1, 1, 'Sales', '2025-03-10 06:57:12', '2025-03-10 06:57:12'),
(70, 8, 2, 1, 1, 1, 'Purchase', '2025-03-12 04:03:24', '2025-03-12 04:03:24'),
(71, 11, 2, 1, 1, 1, 'Purchase', '2025-03-12 04:03:24', '2025-03-12 04:03:24'),
(72, 12, 2, 1, 1, 1, 'Purchase', '2025-03-12 04:03:24', '2025-03-12 04:03:24'),
(73, 7, 2, 1, 7, 1, 'Purchase', '2025-03-12 04:12:29', '2025-03-12 04:12:29'),
(74, 14, 2, 1, 113, 1, 'Purchase', '2025-03-12 04:12:29', '2025-03-12 04:39:22'),
(75, 11, 2, 1, -3, 1, 'Sales', '2025-03-12 04:34:46', '2025-03-12 04:34:46'),
(76, 14, 2, 1, -3, 1, 'Sales', '2025-03-12 04:34:46', '2025-03-12 04:34:46'),
(77, 7, 2, 1, 7, 1, 'Purchase', '2025-03-12 04:47:43', '2025-03-12 04:47:43'),
(78, 11, 2, 1, -1, 1, 'Sales', '2025-03-12 05:15:23', '2025-03-12 05:15:23'),
(79, 14, 2, 1, -2, 1, 'Sales', '2025-03-12 05:15:23', '2025-03-12 05:15:23'),
(80, 9, 2, 1, -1, 1, 'Sales', '2025-03-12 05:45:14', '2025-03-12 05:45:14'),
(81, 12, 2, 1, -1, 1, 'Sales', '2025-03-18 06:21:44', '2025-03-18 06:21:44'),
(82, 14, 2, 1, -1, 1, 'Sales', '2025-03-18 06:23:33', '2025-03-18 06:23:33'),
(83, 15, 2, 1, -1, 1, 'Sales', '2025-03-18 06:25:11', '2025-03-18 06:25:11'),
(84, 11, 2, 1, -1, 1, 'Sales', '2025-03-18 06:25:11', '2025-03-18 06:25:11'),
(85, 14, 2, 1, -1, 1, 'Sales', '2025-03-18 06:33:42', '2025-03-18 06:33:42'),
(86, 16, 2, 1, 100, 1, 'Purchase', '2025-03-19 03:26:45', '2025-03-19 03:26:45'),
(87, 15, 2, 1, 100, 1, 'Purchase', '2025-03-19 03:26:45', '2025-03-19 03:26:45'),
(88, 16, 2, 1, -1, 1, 'Sales', '2025-03-19 03:27:14', '2025-03-19 03:27:14'),
(89, 13, 2, 1, -3, 1, 'Sales', '2025-03-19 04:01:13', '2025-03-19 04:01:13'),
(90, 14, 2, 1, 1, 1, 'Sales', '2025-03-19 04:01:13', '2025-03-19 04:01:13'),
(91, 15, 2, 1, -3, 1, 'Sales', '2025-03-19 06:11:19', '2025-03-19 06:11:19'),
(92, 15, 2, 1, -1, 1, 'Sales', '2025-03-22 03:15:50', '2025-03-22 03:15:50'),
(93, 16, 2, 1, -5, 1, 'Sales', '2025-03-22 03:15:50', '2025-03-22 03:15:50'),
(94, 16, 2, 1, -2, 1, 'Sales', '2025-03-22 05:22:41', '2025-03-22 05:22:41'),
(95, 14, 2, 1, 3, 1, 'Purchase', '2025-03-22 06:28:14', '2025-03-22 06:28:14'),
(96, 10, 2, 1, -3, 1, 'Sales', '2025-03-23 03:24:09', '2025-03-23 03:24:09'),
(97, 12, 2, 1, -3, 1, 'Sales', '2025-03-23 03:24:09', '2025-03-23 03:24:09'),
(98, 14, 2, 1, 3, 1, 'Purchase', '2025-03-23 03:34:30', '2025-03-23 03:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustment`
--

CREATE TABLE `stock_adjustment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `adjustment_type_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_adjustment`
--

INSERT INTO `stock_adjustment` (`id`, `user_id`, `adjustment_type_id`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-02-19 05:55:09', '2025-02-19 05:55:09'),
(2, 2, 2, 2, '2025-02-19 05:55:09', '2025-02-19 05:55:09'),
(3, 3, 1, 1, '2025-02-19 05:55:09', '2025-02-19 05:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustment_details`
--

CREATE TABLE `stock_adjustment_details` (
  `id` int(11) NOT NULL,
  `stock_adjustment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_adjustment_details`
--

INSERT INTO `stock_adjustment_details` (`id`, `stock_adjustment_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 1500, '2025-02-19 05:55:09', '2025-02-19 05:55:09'),
(2, 2, 2, 10, 900, '2025-02-19 05:55:09', '2025-02-19 05:55:09'),
(3, 3, 3, 2, 250, '2025-02-19 05:55:09', '2025-02-19 05:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `photo`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Salman', 'Salman.jpg', '01724566321', 'salmanidb61@gmail.com', 'Mirpur, Dahaka', '2025-02-15 21:42:01', '2025-02-15 21:42:01'),
(2, 'Bangladesh Components', 'Bangladesh Components.jpg', '01933345677', 'contact@bdcomponents.com', 'Sylhet, Bangladesh', '2025-02-19 03:19:36', '2025-03-11 23:58:28'),
(3, 'Tech Supplies Ltd.', 'Tech Supplies Ltd..jpg', '01733345678', 'info@techsupplies.com', 'Dhaka, Bangladesh', '2025-02-19 03:19:36', '2025-03-11 23:58:39'),
(4, 'Electronics Hub', 'Electronics Hub.jpg', '01833345679', 'support@electronicshub.com', 'Chittagong, Bangladesh', '2025-02-19 03:19:36', '2025-03-11 23:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `factor` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `name`, `factor`, `created_at`, `updated_at`) VALUES
(1, 'Purchase', 1, '2025-02-19 05:55:09', '2025-02-19 05:55:09'),
(2, 'Sale', -1, '2025-02-19 05:55:09', '2025-02-19 05:55:09'),
(3, 'Return', 0.5, '2025-02-19 05:55:09', '2025-02-19 05:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

CREATE TABLE `uoms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uoms`
--

INSERT INTO `uoms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Piece', '2025-02-19 03:18:30', '2025-02-19 03:18:30'),
(2, 'Kilogram', '2025-02-19 03:18:30', '2025-02-19 03:18:30'),
(3, 'Liter', '2025-02-19 03:18:30', '2025-02-19 03:18:30');

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
(1, 'Aslam', 'mdaslamcric@gmail.com', NULL, '$2y$12$tQOwD4CBCkIYt3L8/ZiQYeup33BKhZD3XePpiXA1RqHAbCxC8VdSa', 'BqwcEdncS84NC7hvfhvHxPdVOvJy5ekyzdwqu6yTuaL80iHf8RPBpLMehg3D', '2025-02-13 01:11:33', '2025-02-13 01:11:33'),
(2, 'Salman', 'salmanidb61@gmail.com', NULL, '$2y$12$UqtR0g/uCGHTSVDb/M55cuaKo2uvqs8phDvno2JtzU..XvqhdH6My', NULL, '2025-02-13 01:24:28', '2025-02-13 01:24:28'),
(3, 'Razib', 'razibidb61@gmail.com', NULL, '$2y$12$PrOY4tAsIXE8t8iwyiE9xe6D3JwNN7OXEJ.ywRV2D/dxfcDrvnWfa', NULL, '2025-02-13 01:28:00', '2025-02-13 01:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `name`, `phone`, `location`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka Warehouse', '01722345678', 'Dhaka', 'Road 10, Dhaka', '2025-02-19 03:19:14', '2025-02-19 03:19:14'),
(2, 'Chittagong Warehouse', '01822345679', 'Chittagong', 'Port Area, Chittagong', '2025-02-19 03:19:14', '2025-02-19 03:19:14'),
(3, 'Sylhet Warehouse', '01922345677', 'Sylhet', 'Main Road, Sylhet', '2025-02-19 03:19:14', '2025-02-19 03:19:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases_details`
--
ALTER TABLE `purchases_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_statuses`
--
ALTER TABLE `purchase_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adjustment`
--
ALTER TABLE `stock_adjustment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adjustment_details`
--
ALTER TABLE `stock_adjustment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `uoms`
--
ALTER TABLE `uoms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `purchases_details`
--
ALTER TABLE `purchases_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase_statuses`
--
ALTER TABLE `purchase_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `stock_adjustment`
--
ALTER TABLE `stock_adjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_adjustment_details`
--
ALTER TABLE `stock_adjustment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uoms`
--
ALTER TABLE `uoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
