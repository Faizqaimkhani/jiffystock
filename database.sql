-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2022 at 07:44 AM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rami_jffystock`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds_durations`
--

CREATE TABLE `adds_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration_days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_package_prices`
--

CREATE TABLE `add_package_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration_in_days` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_package_prices`
--

INSERT INTO `add_package_prices` (`id`, `name`, `duration_in_days`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Fast deal', 1, 10, '2021-09-13 05:55:17', '2021-09-13 05:55:17'),
(3, 'Hurry deal', 3, 50, '2021-09-13 05:56:09', '2021-09-13 05:56:09'),
(4, 'Special deal', 7, 100, '2021-09-13 05:56:34', '2022-01-17 10:05:39'),
(5, 'TESTING', 12, 600, '2022-01-11 14:41:55', '2022-01-17 10:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallets`
--

CREATE TABLE `admin_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `deposit` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) NOT NULL DEFAULT 0,
  `sell_product` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_wallets`
--

INSERT INTO `admin_wallets` (`id`, `user_id`, `price`, `deposit`, `refund`, `sell_product`, `created_at`, `updated_at`) VALUES
(1, 1, 3579, 0, 0, 0, '2021-11-26 05:17:00', '2022-01-14 07:43:57'),
(2, 86, 200, 200, 0, 0, '2022-01-11 09:44:59', '2022-01-12 11:55:35'),
(3, 3, 150, 150, 0, 0, '2022-01-12 11:15:45', '2022-01-12 11:29:24'),
(4, 91, 100, 100, 0, 0, '2022-01-12 11:52:16', '2022-01-12 11:52:16'),
(5, 20, 118, 0, 0, 39, '2022-01-13 12:59:47', '2022-01-13 14:57:02'),
(6, 18, 1430, 100, 0, 49, '2022-01-13 13:15:12', '2022-01-14 07:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_at` date DEFAULT NULL,
  `pacakge_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `user_id`, `text`, `expire_at`, `pacakge_id`, `image`, `created_at`, `updated_at`, `status`) VALUES
(0, 16, '7th genration Laptop', '2021-09-21', 2, '613b8598048f2.jpg', '2021-09-10 11:19:36', '2021-09-21 08:15:36', 3),
(2, 16, '24/7 cooling refrigerator', NULL, 2, '613b8573717fa.jpg', '2021-09-10 11:18:59', '2021-09-11 06:07:36', 2),
(3, 82, 'test', '2021-09-21', 2, '61a71e11955f8.jpg', '2021-12-01 02:02:41', '2021-12-01 02:02:41', NULL),
(10, 96, 'another one', NULL, 2, '61a77d0bed853-.jpg', '2021-12-01 08:46:02', '2021-12-01 08:48:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `approved_bids`
--

CREATE TABLE `approved_bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `auction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_bid` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `expire_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `user_id`, `product_id`, `quantity`, `min_bid`, `package`, `expire_at`, `created_at`, `updated_at`) VALUES
(2, 16, 6, 5, 500, 4, '2022-03-17 10:30:50', '2021-09-29 05:30:50', '2021-09-29 05:30:50'),
(3, 20, 11, 2, 20, 2, '2022-03-26 14:26:56', '2021-10-13 09:26:56', '2021-10-13 09:26:56'),
(4, 18, 13, 50, 50000, 4, '2022-08-23 15:25:58', '2021-10-18 10:25:58', '2021-10-18 10:25:58'),
(6, 18, 7, 50, 45, 2, '2022-05-25 09:10:34', '2021-10-20 04:10:34', '2021-10-20 04:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversations`
--

CREATE TABLE `chat_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 1,
  `direct_message` tinyint(1) NOT NULL DEFAULT 0,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat_conversations`
--

INSERT INTO `chat_conversations` (`id`, `private`, `direct_message`, `data`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '[]', '2021-09-20 08:45:41', '2021-09-20 08:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `participation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message_notifications`
--

CREATE TABLE `chat_message_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `messageable_id` bigint(20) UNSIGNED NOT NULL,
  `messageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `participation_id` bigint(20) UNSIGNED NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `is_sender` tinyint(1) NOT NULL DEFAULT 0,
  `flagged` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_participation`
--

CREATE TABLE `chat_participation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `messageable_id` bigint(20) UNSIGNED NOT NULL,
  `messageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'hyderabad', 4, '2021-09-04 10:58:36', '2021-09-04 10:58:36'),
(2, 'Shanghai', 5, '2021-09-04 10:58:52', '2021-10-06 14:11:17'),
(6, 'Shenzhen', 5, '2021-10-06 14:11:41', '2021-10-06 14:11:41'),
(7, 'Beijing', 5, '2021-10-06 14:11:54', '2021-10-06 14:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_services`
--

CREATE TABLE `clearance_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clearance_services`
--

INSERT INTO `clearance_services` (`id`, `title`, `data`, `thumbnail`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'title', '<h1>\r\nTesting Services\r\n</h1>\r\n<p>\r\nlorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum \r\n</p>', 'public/shipment/images//dlPni2f7hRECbLJbOFnkk0AzbZACtxcmvikuVDkr.jpg', 102, NULL, NULL, NULL),
(2, 'new service', '<h2>service</h2>', 'public/clearance/images//rQ51N0mCc7gGqwvMRqydqu741wlPqiQ4Lfjd21jJ.jpg', 102, '2021-12-01 09:09:03', '2021-12-01 10:23:09', NULL),
(3, 'test service', '<h2>hello world</h2>', 'public/clearance/images//HPGXzI7HF1HMbglagI7lSkfslW281d1dz0zIWMxi.jpg', 101, '2021-12-01 10:20:44', '2021-12-01 10:22:53', '2021-12-01 10:22:53'),
(4, 'test', '<h2>test</h2>', 'public/clearance/images//VBk3JTEZ3YrxYoxyqj4oJe4b3cxGuYs1wh62Ysub.jpg', 101, '2021-12-01 10:23:29', '2021-12-01 10:23:32', '2021-12-01 10:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'black', '#000', '2021-09-06 04:19:53', '2021-09-06 04:20:22'),
(2, 'white', '#fff', '2021-09-06 04:20:13', '2021-09-06 04:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `license`, `contact_number`, `user_id`, `created_at`, `updated_at`) VALUES
(32, 'korejo', 'a7839jdsa', '1234567890', 85, '2021-11-25 08:16:46', '2021-11-25 08:16:46'),
(33, 'fedex', '73891237', '1234567890', 86, '2021-11-25 08:25:34', '2021-11-25 08:25:34'),
(34, 'fedex shipment', '738942198', '37283712898', 87, '2021-11-25 08:33:02', '2021-11-25 08:33:02'),
(35, 'Evergreen', '372617878', '1234567890', 88, '2021-11-25 08:37:43', '2021-11-25 08:37:43'),
(36, 'Cosco', '376278887', '1234567890', 89, '2021-11-25 08:48:54', '2021-11-25 08:48:54'),
(37, 'Mediterranean Shipping Company', '3781939789', '1234567890', 90, '2021-11-25 08:53:03', '2021-11-25 08:53:03'),
(38, 'simple shipping company', '372717678', '1234567890', 91, '2021-11-25 08:58:16', '2021-11-25 08:58:16'),
(39, 'sample shipping company', '69486347', '1234567890', 92, '2021-11-25 09:04:19', '2021-11-25 09:04:19'),
(42, 'supplier', '73317389', '7138927', 94, '2021-11-27 09:31:01', '2021-11-27 09:31:01'),
(43, 'kadi', '381281398', '37123728937127', 95, '2021-11-27 11:02:17', '2021-11-27 11:02:17'),
(44, 'azanko', '5757656', '1234567890', 96, '2021-11-30 23:39:47', '2021-11-30 23:39:47'),
(45, 'azship', '0987654321', '0987654321', 99, '2021-12-01 07:23:30', '2021-12-01 07:23:30'),
(46, 'azcustom', '865456', '98765432', 100, '2021-12-01 07:27:19', '2021-12-01 07:27:19'),
(47, 'azcustom', '865456', '98765432', 101, '2021-12-01 07:29:02', '2021-12-01 07:29:02'),
(48, 'azclearance', '65435678', '9876543', 102, '2021-12-01 08:53:15', '2021-12-01 08:53:15'),
(49, 'shipment company', '732187', '03092816816', 104, '2021-12-01 10:43:13', '2021-12-01 10:43:13'),
(50, 'Jiffy', '78321822', '03092816816', 105, '2021-12-01 10:51:47', '2021-12-01 10:51:47'),
(52, 'test shipment', '312323', '03092816816', 110, '2021-12-01 13:05:48', '2021-12-01 13:05:48'),
(53, 'babar shipments', '3637128', '00987654321', 111, '2021-12-02 06:17:39', '2021-12-02 06:17:39'),
(54, 'azank', '09876Hj&889', '0987654321', 112, '2021-12-27 00:37:37', '2021-12-27 00:37:37'),
(55, 'clance', '65676', '09876543456', 113, '2021-12-27 00:39:08', '2021-12-27 00:39:08'),
(56, 'test1jh', '878d017', '98765432', 114, '2021-12-27 00:59:56', '2021-12-27 00:59:56'),
(57, 'dhasjk', '371829', '63713278', 115, '2021-12-27 02:59:10', '2021-12-27 02:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `message`, `user_type`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(18, 'hi', 'App\\Models\\Customers', 33, 4, '2021-12-24 08:54:25', '2021-12-24 08:54:25'),
(19, 'hello', 'App\\Models\\User', 82, 4, '2021-12-24 08:55:20', '2021-12-24 08:55:20'),
(20, 'hry', 'App\\Models\\Customers', 33, 4, '2021-12-24 08:55:26', '2021-12-24 08:55:26'),
(21, 'hello', 'App\\Models\\Customers', 33, 4, '2021-12-24 08:56:50', '2021-12-24 08:56:50'),
(22, 'middleware working', 'App\\Models\\User', 82, 4, '2021-12-24 09:11:06', '2021-12-24 09:11:06'),
(23, 'okay', 'App\\Models\\Customers', 33, 4, '2021-12-24 09:11:33', '2021-12-24 09:11:33'),
(24, 'hello', 'App\\Models\\User', 82, 4, '2021-12-24 09:16:24', '2021-12-24 09:16:24'),
(25, 'hi', 'App\\Models\\Customers', 33, 4, '2021-12-24 09:16:35', '2021-12-24 09:16:35'),
(26, 'Hi, I like this product', 'App\\Models\\Customers', 33, 5, '2021-12-24 10:27:04', '2021-12-24 10:27:04'),
(27, 'test', 'App\\Models\\User', 82, 4, '2021-12-24 10:53:17', '2021-12-24 10:53:17'),
(28, 'hello world', 'App\\Models\\User', 82, 4, '2021-12-24 10:53:30', '2021-12-24 10:53:30'),
(29, 'buyer, Started this chat', 'App\\Models\\Customers', 33, 6, '2021-12-30 16:00:42', '2021-12-30 16:00:42'),
(30, 'user, Started this chat', 'App\\Models\\Customers', 1, 7, '2022-01-03 03:23:08', '2022-01-03 03:23:08'),
(31, 'user, Started this chat', 'App\\Models\\Customers', 1, 8, '2022-01-03 04:14:46', '2022-01-03 04:14:46'),
(32, 'user, Started this chat', 'App\\Models\\Customers', 1, 9, '2022-01-03 04:22:30', '2022-01-03 04:22:30'),
(33, 'user, Started this chat', 'App\\Models\\Customers', 1, 10, '2022-01-03 04:58:55', '2022-01-03 04:58:55'),
(34, 'hellow', 'App\\Models\\Customers', 1, 10, '2022-01-03 04:59:10', '2022-01-03 04:59:10'),
(35, 'user, Started this chat', 'App\\Models\\Customers', 1, 11, '2022-01-03 05:11:05', '2022-01-03 05:11:05'),
(36, 'hello', 'App\\Models\\Customers', 1, 7, '2022-01-03 05:11:16', '2022-01-03 05:11:16'),
(37, 'hello', 'App\\Models\\Customers', 1, 8, '2022-01-03 05:11:30', '2022-01-03 05:11:30'),
(38, 'hello', 'App\\Models\\Customers', 1, 9, '2022-01-03 05:11:41', '2022-01-03 05:11:41'),
(39, 'hellowawwa', 'App\\Models\\Customers', 1, 11, '2022-01-03 05:11:53', '2022-01-03 05:11:53'),
(40, 'hi', 'App\\Models\\User', 18, 11, '2022-01-04 06:35:14', '2022-01-04 06:35:14'),
(41, 'user, Started this chat', 'App\\Models\\Customers', 1, 12, '2022-01-04 08:55:23', '2022-01-04 08:55:23'),
(42, 'there', 'App\\Models\\Customers', 1, 12, '2022-01-11 05:49:19', '2022-01-11 05:49:19'),
(43, 'hello', 'App\\Models\\Customers', 1, 12, '2022-01-12 11:05:36', '2022-01-12 11:05:36'),
(44, 'user, Started this chat', 'App\\Models\\Customers', 1, 13, '2022-01-12 11:08:11', '2022-01-12 11:08:11'),
(45, 'user, Started this chat', 'App\\Models\\Customers', 1, 14, '2022-01-12 11:08:36', '2022-01-12 11:08:36'),
(46, 'user, Started this chat', 'App\\Models\\Customers', 1, 15, '2022-01-12 11:14:33', '2022-01-12 11:14:33'),
(47, 'user, Started this chat', 'App\\Models\\Customers', 1, 16, '2022-01-12 11:15:05', '2022-01-12 11:15:05'),
(48, 'hye cheu', 'App\\Models\\Customers', 1, 16, '2022-01-12 11:16:32', '2022-01-12 11:16:32'),
(49, 'hello', 'App\\Models\\User', 86, 16, '2022-01-12 11:57:29', '2022-01-12 11:57:29'),
(50, 'hye cheeu here', 'App\\Models\\User', 3, 16, '2022-01-12 11:57:44', '2022-01-12 11:57:44'),
(51, 'user, Started this chat', 'App\\Models\\Customers', 1, 17, '2022-01-13 10:20:21', '2022-01-13 10:20:21'),
(52, 'New, Started this chat', 'App\\Models\\Customers', 9, 18, '2022-01-13 12:56:50', '2022-01-13 12:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Pakistan', '2021-09-06 08:19:31', '2021-09-06 08:19:31'),
(5, 'China', '2021-09-06 08:19:45', '2021-09-06 08:19:45'),
(6, 'Afghanistan', '2021-10-06 14:04:19', '2021-10-06 14:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default` int(11) NOT NULL,
  `current` int(11) NOT NULL,
  `value` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `symbol` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `default`, `current`, `value`, `date`, `created_at`, `updated_at`, `symbol`) VALUES
(1, 'Yuan', 'CNY', 1, 1, 1, '2021-09-25', '2021-09-25 13:44:17', '2021-09-25 13:44:17', '¥'),
(2, 'US Dollar', 'USD', 0, 0, 6.391688, '2021-09-25', '2021-09-25 13:55:54', '2021-11-10 02:35:25', '$');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `company`, `category_id`, `contact_number`, `country`, `city`, `vip`, `remember_token`, `created_at`, `updated_at`, `usertype`, `google_id`) VALUES
(1, 'user', 'user@user.com', '$2y$10$z7GzTQuPiE9iWSJX2R.UJ.plVwCKmP83/T68MK2hzTQPOU4UN53Ru', 'user', '1', '03473107139', 4, 1, 0, NULL, '2021-09-06 09:47:45', '2021-09-06 09:47:45', 'customer', NULL),
(2, 'user test 2', 'user2@user.com', '$2y$10$Z6IZmfP.ai4nZsoKJEWpsev291T1GtY3wgaZ0RC.PXSVMLNaeDdzy', 'az-solution', '1', '0347166846446', 5, 2, 0, NULL, '2021-09-09 03:39:26', '2021-09-09 03:39:26', 'customer', NULL),
(6, 'nabeel13', 'nabeel13@gmail.com', '$2y$10$RQynMVkcR0Hpdf.vaFlo7OG1NFOOSLN3i5P1q8z2JcS8c1XsIDsCu', 'az', '1', '355645465485', 4, 1, 0, NULL, '2021-09-20 11:31:05', '2021-09-20 11:31:05', 'customer', NULL),
(8, 'nabeel naeem', 'demooo@gmial.com', '$2y$10$eX2H3RTbzEj6VN65dw0yi.lDHta85/xA2VkZdpjsdOG3Y/6clQx5q', 'admin@admin.com', '1', '06473107139', 4, 1, 0, NULL, '2021-09-23 05:46:58', '2021-09-23 05:46:58', 'customer', NULL),
(9, 'New', 'new@gmail.com', '$2y$10$3vw5SbZ25RhYeBhYL49TfOVBvDWKATXgoD644jbIoICj8Foa/pCpS', 'az', '1', '03473107139', 4, 1, 0, NULL, '2021-09-25 05:17:10', '2021-09-25 05:17:10', 'customer', NULL),
(10, 'nabeel', 'nabeel132@gmailcom', '$2y$10$NTzlEyv6JAY4w1APx/01/uRio8kYPru3GdXS.IY.5cUP7m6QoC6gy', 'az', '1', '03473107139', 4, 1, 0, NULL, '2021-09-25 07:39:22', '2021-09-25 07:39:22', 'customer', NULL),
(11, 'Muhammad Nabeel Naeem', 'mnq.nabeel13@gmail.com', '$2y$10$z7GzTQuPiE9iWSJX2R.UJ.plVwCKmP83/T68MK2hzTQPOU4UN53Ru', 'Unknown', '0', '0000000000', 0, 0, 0, NULL, '2021-09-25 07:43:59', '2021-10-04 09:59:51', 'Customer', '102488954627949984622'),
(12, 'Buyer', 'mqnabeel13@gmail.com', '$2y$10$z7GzTQuPiE9iWSJX2R.UJ.plVwCKmP83/T68MK2hzTQPOU4UN53Ru', 'az', '1', '03473107139', 4, 1, 0, NULL, '2021-09-28 03:51:00', '2021-09-28 03:51:00', 'customer', NULL),
(13, 'Dummy Buyyer', 'dummy@gmail.com', '$2y$10$oguDchYlf/5v1UVsH2gm2.eJzX7Qm5NjB2OvYjRhOvYwJH8jd9tga', 'az', '1', '355645465485', 4, 1, 0, NULL, '2021-10-07 07:13:34', '2021-10-22 08:19:52', 'customer', NULL),
(15, 'Aurangzeb Rafique', 'zebrafique@icloud.com', '$2y$10$0OSEZORxxElZzTZhBtvHx.pb9IRQ7js4zFAnISueMT1K9/QkFeWzK', 'fssdds', '4', '+923352219943', 4, 1, 0, NULL, '2021-10-07 12:18:15', '2021-10-07 12:18:15', 'customer', NULL),
(16, 'test', 'test@gmail.com', '$2y$10$si894KSRSbf4x5AYdyPXyuVji5lZkVQs03/ejpcZF35Ke2R8wECQS', 'test', '1', '123423425', 4, 1, 0, NULL, '2021-10-18 10:36:12', '2021-10-18 10:36:12', 'customer', NULL),
(18, 'nabeel', 'mqnabeel@gmail.com', '$2y$10$tbtFde4er5r.dPFH6ARmXeHlHExB.Q4EnXb5ZZPlWpWr6g5q3F5Q.', 'az-solution', '4', '03473107139', 4, 1, 0, NULL, '2021-10-20 07:13:37', '2021-10-20 07:13:37', 'customer', NULL),
(20, 'Rami Altawara', 'rami@s-creators.tech', '$2y$10$aO0dMlS82LkIz7YhGpXxGeEXl4EMSYexedJGAW1CfffMkylBaI28G', 'Solution creators technology', '5', '0565621074', 5, 2, 0, NULL, '2021-10-27 03:48:10', '2021-10-27 03:48:10', 'customer', NULL),
(21, 'Rami Altorah', 'raltawara79@gmail.com', '$2y$10$IQ5mDzDZ3A9QmHe1FmFc5.yYfN5N36FZBZEKrimQ/pzzxOnbI9qva', 'Solution creators technology', '7', '0565621074', 5, 2, 0, NULL, '2021-10-27 04:34:23', '2021-10-27 04:34:23', 'customer', NULL),
(22, 'azan korejo', 'azan222@gmail.com', '$2y$10$lfNxlBpKpuxcViGEghJIUuxt2fQDhrgwCL4KPT4pOFLZIrJSv0JCy', 'azan', '2', '32812789', 4, 1, 0, NULL, '2021-11-20 08:42:15', '2021-11-20 08:42:15', 'customer', NULL),
(26, 'azan korejo', 'azan@gmail.com', '$2y$10$TvC.YTLHqSurWaJu6eBtieXYogQcXDC9EcAf1n.oYbxRsBGjSCvp2', 'ako', '6', '378932', 4, 1, 0, NULL, '2021-11-22 02:45:18', '2021-11-22 02:45:18', 'customer', NULL),
(27, 'azan', 'buyyer@buyyer.com', '$2y$10$aqXRmbQsPdIoZGI5gg5ByO/UjxgGunGDpwI1lq2CFYZnQnVt3o0FK', 'dhasjk', '6', '37892783', 4, 1, 0, NULL, '2021-11-25 05:01:06', '2021-11-25 05:01:06', 'customer', NULL),
(28, 'azan', 'azan@company.com', '$2y$10$qM71heD5IRquZw7iZwHdWuLkpKtPcOZiI/GPcSC2sSO5G5rMKYqHG', 'company', '5', '3789123889', 4, 1, 0, NULL, '2021-11-25 05:02:30', '2021-11-25 05:02:30', 'customer', NULL),
(29, 'azan test', 'azan@test.tests', '$2y$10$3d0Ufi6MYwimVyoAsHrY4eo2tFWaPtEMvwR4QizKS.OZDPrz7W9P2', '', '', '', 4, 1, 0, NULL, '2021-11-27 09:26:26', '2021-11-27 09:26:26', 'customer', NULL),
(32, 'testing company', 'azan@test1.tests', '$2y$10$YWW3/F4vjJXaNluItC8rXOFAXJwozDNo7FT88bJC/gaeQ4tXi73hK', '', '', '31731312', 4, 1, 0, NULL, '2021-11-27 09:29:00', '2021-11-27 09:29:00', 'customer', NULL),
(33, 'buyer', 'buyer@buyer.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'buyer', '5', '1234567890', 4, 1, 0, NULL, '2021-12-01 04:19:04', '2021-12-01 04:19:04', 'customer', NULL),
(34, 'testuser12345', 'testuser123456@gmail.com', '$2y$10$qJJ.B5V31aizKACWCSCMaO2TKnZ3utbCQd3l5z0P/yFdPjbnDcHcG', 'testuser12345', '5', '2131231232', 4, 1, 0, NULL, '2022-01-12 13:48:49', '2022-01-12 13:48:49', 'customer', NULL),
(35, 'muzaffar', 'amuzaffar383@gmail.com', '$2y$10$0Hs3Z27WROx6eT5jhvtBt.2OLRzae.SZkc6Fk8GhfF.RRNkUBX7z6', 'azsolution', '3', '2131231232', 4, 1, 0, NULL, '2022-01-12 13:50:50', '2022-01-12 13:50:50', 'customer', NULL),
(36, 'Elghazali', 'gh2o@hotmail.com', '$2y$10$3NZdTAZVZ/BK4hBclW6d6O/Z//bB5WQY4YuljDgvjDaIqOcWCuBAy', 'MOH PMAH', '3', '00966565377321', 5, 2, 0, NULL, '2022-01-16 10:13:19', '2022-01-16 10:13:19', 'customer', NULL),
(37, 'Aurangzeb Rafique', 'aurangzebrafique25@gmail.com', '$2y$10$v1urFzPtWg2AAAEnzMUnxeaOvFsV7n4eizV107aHysSq.QTgicyvq', 'jiff', '9', '+923352219943', 4, 1, 0, NULL, '2022-01-17 12:56:51', '2022-01-17 12:56:51', 'customer', NULL),
(38, 'Aurangzeb Rafique', 'zeb.rafique112@gmail.com', '$2y$10$YZdsoVJh7kUJBflFlzxSPePNR3YsR2ssUO8Ly9i1.jlmW/fxDaAu.', 'xyz', '7', '+923352219943', 4, 1, 0, NULL, '2022-01-17 13:01:27', '2022-01-17 13:01:27', 'customer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_wallets`
--

CREATE TABLE `customer_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `deposits` int(11) DEFAULT NULL,
  `refunds` int(11) DEFAULT NULL,
  `sell_products` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `buy_products` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_wallets`
--

INSERT INTO `customer_wallets` (`id`, `customer_id`, `price`, `deposits`, `refunds`, `sell_products`, `created_at`, `updated_at`, `buy_products`) VALUES
(1, 2, -369, 100, 0, NULL, '2021-09-09 03:39:26', '2022-01-14 06:20:30', 0),
(2, 3, 810, 5000, 0, NULL, '2021-09-11 06:56:21', '2021-09-11 10:25:29', 4520),
(3, 6, 0, 0, 0, NULL, '2021-09-20 11:31:05', '2021-09-20 11:31:05', 0),
(4, 7, 0, 0, 0, NULL, '2021-09-23 05:45:10', '2021-09-23 05:45:10', 0),
(5, 8, 0, 0, 0, NULL, '2021-09-23 05:46:58', '2021-09-23 05:46:58', 0),
(6, 9, 10064, 20640, 0, NULL, '2021-09-25 05:17:10', '2022-01-14 07:43:57', 780),
(7, 10, 0, 0, 0, NULL, '2021-09-25 07:39:22', '2021-09-25 07:39:22', 0),
(8, 11, 0, 0, 0, NULL, '2021-09-25 07:43:59', '2021-09-25 07:43:59', 0),
(9, 12, -1, 0, 0, NULL, '2021-09-28 03:51:00', '2022-01-14 06:21:19', 0),
(10, 1, 794, 1665, 222, 0, '2021-09-29 05:51:23', '2022-01-17 14:18:14', 647),
(11, 13, 0, 0, 0, NULL, '2021-10-07 07:13:34', '2021-10-07 07:13:34', 0),
(12, 14, 0, 0, 0, NULL, '2021-10-07 08:02:01', '2021-10-07 08:02:01', 0),
(13, 15, 0, 0, 0, NULL, '2021-10-07 12:18:15', '2021-10-07 12:18:15', 0),
(14, 16, 0, 0, 0, NULL, '2021-10-18 10:36:12', '2021-10-18 10:36:12', 0),
(15, 17, -155, 0, 0, NULL, '2021-10-18 11:09:32', '2021-10-20 03:46:16', 155),
(16, 18, 0, 0, 0, NULL, '2021-10-20 07:13:37', '2021-10-20 07:13:37', 0),
(17, 19, 0, 0, 0, NULL, '2021-10-22 13:35:16', '2021-10-22 13:35:16', 0),
(18, 20, 0, 0, 0, NULL, '2021-10-27 03:48:10', '2021-10-27 03:48:10', 0),
(19, 21, 0, 0, 0, NULL, '2021-10-27 04:34:23', '2021-10-27 04:34:23', 0),
(20, 22, 0, 0, 0, NULL, '2021-11-20 08:42:15', '2021-11-20 08:42:15', 0),
(21, 23, 0, 0, 0, NULL, '2021-11-20 08:44:32', '2021-11-20 08:44:32', 0),
(22, 24, 0, 0, 0, NULL, '2021-11-22 02:38:27', '2021-11-22 02:38:27', 0),
(23, 25, 0, 0, 0, NULL, '2021-11-22 02:43:11', '2021-11-22 02:43:11', 0),
(24, 26, 0, 0, 0, NULL, '2021-11-22 02:45:18', '2021-11-22 02:45:18', 0),
(25, 27, 0, 0, 0, NULL, '2021-11-22 04:22:48', '2021-11-22 04:22:48', 0),
(26, 27, 0, 0, 0, NULL, '2021-11-25 05:01:06', '2021-11-25 05:01:06', 0),
(27, 33, 0, 0, 0, NULL, '2021-12-01 04:19:04', '2021-12-01 04:19:04', 0),
(28, 34, 0, 0, 0, NULL, '2022-01-12 13:48:49', '2022-01-12 13:48:49', 0),
(29, 35, 0, 0, 0, NULL, '2022-01-12 13:50:50', '2022-01-12 13:50:50', 0),
(30, 36, 0, 0, 0, NULL, '2022-01-16 10:13:19', '2022-01-16 10:13:19', 0),
(31, 37, 0, 0, 0, NULL, '2022-01-17 12:56:51', '2022-01-17 12:56:51', 0),
(32, 38, 0, 0, 0, NULL, '2022-01-17 13:01:27', '2022-01-17 13:01:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_withdraw_requests`
--

CREATE TABLE `customer_withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  `stripe_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `Status` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_withdraw_requests`
--

INSERT INTO `customer_withdraw_requests` (`id`, `customer_id`, `wallet_id`, `stripe_email`, `price`, `Status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'jahanzaibkhan9999@gmail.com', 222, NULL, '2022-01-17 14:18:14', '2022-01-17 14:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 'chair', 6, '2021-12-24 08:49:46', '2021-12-24 08:49:46'),
(5, 'chair', 6, '2021-12-24 10:27:03', '2021-12-24 10:27:03'),
(6, 'dummy1234', 13, '2021-12-30 16:00:41', '2021-12-30 16:00:41'),
(7, 'dummy', 12, '2022-01-03 03:23:08', '2022-01-03 03:23:08'),
(8, 'dummy', 12, '2022-01-03 04:14:46', '2022-01-03 04:14:46'),
(9, 'dummy', 12, '2022-01-03 04:22:30', '2022-01-03 04:22:30'),
(10, 'dummy', 12, '2022-01-03 04:58:55', '2022-01-03 04:58:55'),
(11, 'dummy', 12, '2022-01-03 05:11:05', '2022-01-03 05:11:05'),
(12, 'dummy1234', 13, '2022-01-04 08:55:23', '2022-01-04 08:55:23'),
(13, 'dummy1234', 13, '2022-01-12 11:08:11', '2022-01-12 11:08:11'),
(14, 'dummy1234', 13, '2022-01-12 11:08:36', '2022-01-12 11:08:36'),
(15, 'meu', 35, '2022-01-12 11:14:33', '2022-01-12 11:14:33'),
(16, 'meu', 35, '2022-01-12 11:15:05', '2022-01-12 11:15:05'),
(17, 'dummy1234', 13, '2022-01-13 10:20:21', '2022-01-13 10:20:21'),
(18, 'Cotton cloth', 11, '2022-01-13 12:56:50', '2022-01-13 12:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`id`, `group_id`, `user_type`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 4, 'App\\Models\\Customers', 33, '2021-12-24 08:49:46', '2021-12-24 08:49:46'),
(8, 4, 'App\\Models\\User', 82, '2021-12-24 08:49:46', '2021-12-24 08:49:46'),
(9, 4, 'App\\Models\\User', 111, '2021-12-24 08:50:22', '2021-12-24 08:50:22'),
(10, 5, 'App\\Models\\Customers', 33, '2021-12-24 10:27:03', '2021-12-24 10:27:03'),
(11, 5, 'App\\Models\\User', 82, '2021-12-24 10:27:04', '2021-12-24 10:27:04'),
(12, 5, 'App\\Models\\User', 111, '2021-12-24 08:50:22', '2021-12-24 08:50:22'),
(13, 6, 'App\\Models\\Customers', 33, '2021-12-30 16:00:41', '2021-12-30 16:00:41'),
(14, 6, 'App\\Models\\User', 18, '2021-12-30 16:00:42', '2021-12-30 16:00:42'),
(15, 6, 'App\\Models\\User', 112, '2021-12-31 17:26:24', '2021-12-31 17:26:24'),
(16, 7, 'App\\Models\\Customers', 1, '2022-01-03 03:23:08', '2022-01-03 03:23:08'),
(17, 7, 'App\\Models\\User', 18, '2022-01-03 03:23:08', '2022-01-03 03:23:08'),
(18, 8, 'App\\Models\\Customers', 1, '2022-01-03 04:14:46', '2022-01-03 04:14:46'),
(19, 8, 'App\\Models\\User', 18, '2022-01-03 04:14:46', '2022-01-03 04:14:46'),
(20, 9, 'App\\Models\\Customers', 1, '2022-01-03 04:22:30', '2022-01-03 04:22:30'),
(21, 9, 'App\\Models\\User', 18, '2022-01-03 04:22:30', '2022-01-03 04:22:30'),
(22, 10, 'App\\Models\\Customers', 1, '2022-01-03 04:58:55', '2022-01-03 04:58:55'),
(23, 10, 'App\\Models\\User', 18, '2022-01-03 04:58:55', '2022-01-03 04:58:55'),
(25, 11, 'App\\Models\\Customers', 1, '2022-01-03 05:11:05', '2022-01-03 05:11:05'),
(26, 11, 'App\\Models\\User', 18, '2022-01-03 05:11:05', '2022-01-03 05:11:05'),
(27, 12, 'App\\Models\\Customers', 1, '2022-01-04 08:55:23', '2022-01-04 08:55:23'),
(28, 12, 'App\\Models\\User', 18, '2022-01-04 08:55:23', '2022-01-04 08:55:23'),
(34, 11, 'App\\Models\\User', 114, '2022-01-11 07:16:44', '2022-01-11 07:16:44'),
(35, 11, 'App\\Models\\User', 102, '2022-01-11 07:17:36', '2022-01-11 07:17:36'),
(36, 9, 'App\\Models\\User', 114, '2022-01-11 07:23:51', '2022-01-11 07:23:51'),
(37, 10, 'App\\Models\\User', 114, '2022-01-11 07:25:55', '2022-01-11 07:25:55'),
(38, 10, 'App\\Models\\User', 102, '2022-01-11 07:26:21', '2022-01-11 07:26:21'),
(39, 8, 'App\\Models\\User', 114, '2022-01-11 07:38:43', '2022-01-11 07:38:43'),
(50, 12, 'App\\Models\\User', 112, '2022-01-12 11:05:22', '2022-01-12 11:05:22'),
(51, 12, 'App\\Models\\User', 102, '2022-01-12 11:05:28', '2022-01-12 11:05:28'),
(52, 13, 'App\\Models\\Customers', 1, '2022-01-12 11:08:11', '2022-01-12 11:08:11'),
(53, 13, 'App\\Models\\User', 18, '2022-01-12 11:08:11', '2022-01-12 11:08:11'),
(54, 14, 'App\\Models\\Customers', 1, '2022-01-12 11:08:36', '2022-01-12 11:08:36'),
(55, 14, 'App\\Models\\User', 18, '2022-01-12 11:08:36', '2022-01-12 11:08:36'),
(56, 15, 'App\\Models\\Customers', 1, '2022-01-12 11:14:33', '2022-01-12 11:14:33'),
(57, 15, 'App\\Models\\User', 3, '2022-01-12 11:14:33', '2022-01-12 11:14:33'),
(58, 16, 'App\\Models\\Customers', 1, '2022-01-12 11:15:05', '2022-01-12 11:15:05'),
(59, 16, 'App\\Models\\User', 3, '2022-01-12 11:15:05', '2022-01-12 11:15:05'),
(60, 16, 'App\\Models\\User', 86, '2022-01-12 11:16:08', '2022-01-12 11:16:08'),
(61, 16, 'App\\Models\\User', 91, '2022-01-12 11:16:20', '2022-01-12 11:16:20'),
(62, 17, 'App\\Models\\Customers', 1, '2022-01-13 10:20:21', '2022-01-13 10:20:21'),
(63, 17, 'App\\Models\\User', 18, '2022-01-13 10:20:21', '2022-01-13 10:20:21'),
(64, 17, 'App\\Models\\User', 102, '2022-01-13 10:22:07', '2022-01-13 10:22:07'),
(65, 17, 'App\\Models\\User', 114, '2022-01-13 10:22:14', '2022-01-13 10:22:14'),
(66, 18, 'App\\Models\\Customers', 9, '2022-01-13 12:56:50', '2022-01-13 12:56:50'),
(67, 18, 'App\\Models\\User', 20, '2022-01-13 12:56:50', '2022-01-13 12:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_user` int(10) UNSIGNED NOT NULL,
  `to_user` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `content`, `status`, `created_at`, `updated_at`, `sender`) VALUES
(54, 2, 2, 'heloo', 1, '2021-09-09 08:41:16', '2021-09-14 04:34:33', 1),
(55, 2, 2, 'sefre', 1, '2021-09-09 08:41:29', '2021-09-14 04:34:33', 1),
(56, 2, 3, 'hello', 1, '2021-09-09 08:41:39', '2021-09-09 09:47:38', 1),
(57, 1, 3, 'hello', 1, '2021-09-09 08:43:18', '2021-09-09 09:47:41', 1),
(58, 1, 2, 'how do you do', 1, '2021-09-09 08:43:28', '2021-09-14 04:34:34', 1),
(59, 1, 3, 'heloo', 1, '2021-09-09 09:47:01', '2021-09-09 09:47:41', 1),
(60, 1, 1, 'hello', 1, '2021-09-20 09:26:16', '2022-01-13 11:07:47', 1),
(61, 1, 1, 'bro', 1, '2021-09-20 10:10:11', '2022-01-13 11:07:47', 1),
(62, 1, 1, 'yes', 1, '2021-09-20 10:10:17', '2022-01-13 11:07:47', 1),
(63, 1, 2, 'ds', 0, '2021-09-20 10:10:26', '2021-09-20 10:10:26', 1),
(64, 1, 1, 'han', 1, '2021-09-20 10:11:06', '2022-01-13 11:07:47', 1),
(65, 1, 1, 'yes', 1, '2021-09-20 10:51:32', '2022-01-13 11:07:47', 0),
(66, 1, 1, 'yes', 1, '2021-09-20 10:53:27', '2022-01-13 11:07:47', 0),
(67, 1, 2, 'jkhjn', 0, '2021-09-20 11:14:52', '2021-09-20 11:14:52', 1),
(68, 11, 1, 'hello', 1, '2021-09-25 08:32:23', '2021-11-20 04:50:23', 1),
(69, 11, 1, 'hello', 1, '2021-09-25 08:32:46', '2021-11-20 04:50:23', 1),
(70, 11, 1, 'hi', 1, '2021-09-25 08:33:14', '2021-11-20 04:50:24', 1),
(71, 11, 1, 'h', 1, '2021-09-25 08:33:59', '2021-11-20 04:50:24', 1),
(72, 1, 3, 'hi', 0, '2021-09-29 05:54:09', '2021-09-29 05:54:09', 1),
(73, 11, 1, 'bro', 1, '2021-10-04 08:33:59', '2021-11-20 04:50:24', 1),
(74, 11, 1, 'bro', 1, '2021-10-04 08:34:12', '2021-11-20 04:50:24', 1),
(75, 11, 1, 'bro', 1, '2021-10-04 08:34:32', '2021-11-20 04:50:24', 1),
(76, 11, 1, 'dsdsd', 1, '2021-10-04 08:37:32', '2021-11-20 04:50:24', 1),
(77, 11, 1, 'dgfgdfg', 1, '2021-10-04 08:39:08', '2021-11-20 04:50:24', 1),
(78, 11, 1, 'u7u7u7', 1, '2021-10-04 08:40:34', '2021-11-20 04:50:24', 1),
(79, 11, 1, 't7vgg', 0, '2021-10-04 08:41:35', '2021-10-04 08:41:35', 1),
(80, 11, 1, 'er-0kpe,w,', 0, '2021-10-04 08:43:44', '2021-10-04 08:43:44', 1),
(81, 11, 16, 'hello bro', 0, '2021-10-04 08:44:43', '2021-10-04 08:44:43', 1),
(82, 11, 16, 'hiw do you do', 0, '2021-10-04 08:44:54', '2021-10-04 08:44:54', 1),
(83, 11, 3, 'kehro hall a khush aa', 0, '2021-10-04 13:18:14', '2021-10-04 13:18:14', 1),
(84, 15, 18, 'hello', 0, '2021-10-07 12:20:37', '2021-10-07 12:20:37', 1),
(85, 13, 1, 'hello', 1, '2021-10-08 13:56:42', '2021-11-20 04:50:27', 1),
(86, 18, 1, 'heloo admin from seller', 1, '2021-10-08 14:38:48', '2021-11-20 04:50:30', 0),
(87, 13, 1, 'hi', 1, '2021-10-13 09:45:39', '2021-11-20 04:50:27', 1),
(88, 13, 1, 'Hello', 1, '2021-10-18 09:07:03', '2021-11-20 04:50:27', 1),
(89, 13, 1, 'Hello', 1, '2021-10-18 09:07:04', '2021-11-20 04:50:27', 1),
(90, 13, 1, 'Hi', 1, '2021-10-18 09:07:08', '2021-11-20 04:50:27', 1),
(91, 17, 23, 'hi', 1, '2021-10-20 03:33:19', '2021-10-20 04:01:00', 1),
(92, 17, 23, 'hello', 1, '2021-10-20 03:34:15', '2021-10-20 04:01:00', 1),
(93, 23, 17, '..', 1, '2021-10-20 03:37:05', '2021-10-20 04:01:00', 0),
(94, 17, 23, '1', 1, '2021-10-20 04:00:44', '2021-10-20 04:01:00', 1),
(95, 17, 23, '1', 1, '2021-10-20 04:00:48', '2021-10-20 04:01:00', 1),
(96, 17, 23, '1', 1, '2021-10-20 04:00:50', '2021-10-20 04:01:00', 1),
(97, 23, 17, '1111', 0, '2021-10-20 04:01:05', '2021-10-20 04:01:05', 0),
(98, 18, 1, 'hello', 1, '2021-10-20 04:18:29', '2021-11-20 04:50:30', 0),
(99, 17, 18, 'lllll', 0, '2021-10-20 08:50:17', '2021-10-20 08:50:17', 1),
(100, 17, 18, '123', 0, '2021-10-20 08:50:25', '2021-10-20 08:50:25', 1),
(101, 13, 18, 'hi', 1, '2021-10-20 12:32:13', '2021-11-05 07:07:55', 1),
(102, 24, 1, 'hello\nthere', 1, '2021-10-22 13:47:36', '2021-11-16 03:56:12', 0),
(103, 25, 1, 'dfgfsg', 1, '2021-10-27 07:21:29', '2021-11-16 03:56:13', 0),
(104, 1, 24, 'aaa', 0, '2021-11-16 03:56:27', '2021-11-16 03:56:27', 0),
(105, 1, 24, 'aaa', 0, '2021-11-16 03:56:34', '2021-11-16 03:56:34', 0),
(106, 32, 82, 'hi', 1, '2021-12-01 01:16:33', '2021-12-01 02:19:04', 1),
(107, 82, 32, 'hi', 1, '2021-12-01 01:18:02', '2021-12-01 02:19:04', 0),
(108, 32, 82, 'test', 1, '2021-12-01 01:18:14', '2021-12-01 02:19:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_07_13_064546_create_users_table', 1),
(4, '2021_07_13_065315_create_countries_table', 1),
(5, '2021_07_13_065354_create_cities_table', 1),
(6, '2021_07_13_065636_create_vip_customers_table', 1),
(7, '2021_07_13_065737_create_customers_table', 1),
(8, '2021_07_13_070203_create_adds_durations_table', 1),
(9, '2021_07_13_070600_create_product_categories_table', 1),
(10, '2021_07_13_070908_create_sub_categories_table', 1),
(11, '2021_07_13_071037_create_products_table', 1),
(12, '2021_07_13_071702_create_product_images_table', 1),
(13, '2021_07_13_071845_create_product_videos_table', 1),
(14, '2021_07_13_072023_create_services_table', 1),
(15, '2021_07_13_072201_create_reviews_table', 1),
(16, '2021_07_13_072513_create_wallets_table', 1),
(17, '2021_07_13_072656_create_transactions_table', 1),
(18, '2021_07_13_072932_create_orders_table', 1),
(19, '2021_07_13_073233_create_order_products_table', 1),
(20, '2021_07_31_083533_create_colors_table', 1),
(21, '2021_07_31_101233_create_product_colors_table', 1),
(22, '2021_08_02_081735_create_sliders_table', 1),
(23, '2021_08_06_114415_create_auctions_table', 1),
(24, '2021_08_09_075649_create_product_adds_table', 1),
(25, '2021_08_09_102943_create_customer_wallets_table', 1),
(26, '2021_08_16_113625_create_add_package_prices_table', 1),
(27, '2021_08_21_133731_create_pending_bids_table', 1),
(28, '2021_08_21_134404_create_approved_bids_table', 1),
(29, '2021_08_25_165333_create_user_withdraw_requests_table', 1),
(30, '2021_09_01_105415_add_status_to_user_withdraw_requests', 1),
(31, '2021_09_03_105638_create_messages_table', 1),
(32, '2021_09_04_125338_create_notifications_table', 1),
(33, '2021_09_04_150901_create_customer_withdraw_request_table', 1),
(34, '2021_09_06_095523_add_expire_at_to_product_adds_table', 2),
(35, '2021_09_06_134519_add_usertype_to_customers_table', 3),
(36, '2021_09_06_144833_add_buy_products_to_customer_wallets_table', 4),
(37, '2021_09_09_100623_add_sender_to_messages', 5),
(38, '2021_09_09_141940_create_advertisement_table', 6),
(39, '2021_09_11_073915_add_status_to_advertisement', 7),
(40, '2021_09_18_130621_add_google_id_to_customers', 8),
(41, '2021_09_18_130657_add_google_id_to_users', 9),
(42, '2021_09_20_130310_create_chat_tables', 10),
(43, '2021_09_21_141303_create_wishlists_table', 11),
(44, '2021_09_25_132710_create_currencies_table', 12),
(45, '2021_09_28_130005_add_featured_to_products', 13),
(46, '2021_10_05_114400_create_product_orders_table', 14),
(47, '2021_09_25_095536_add_fb_id_column_in_users_table', 15),
(48, '2021_11_19_141553_create_companies_table', 15),
(49, '2021_11_19_141620_create_shipment_services_table', 15),
(50, '2021_11_19_141627_create_clearance_services_table', 15),
(51, '2021_11_20_080403_change_colummn_name_in_services_table', 16),
(52, '2021_11_20_081429_change_data_type_in_services_table', 17),
(53, '2021_11_20_091408_add_soft_delete_to_services', 18),
(55, '2021_11_22_082212_add_columns_to_products', 19),
(56, '2021_11_22_105759_add_email_verification_column_to_users_table', 20),
(57, '2021_11_23_100248_add_verify_column_to_users_table', 21),
(58, '2021_11_23_112034_change_column_name_in_users_table', 22),
(60, '2021_11_23_194059_change_badge_verification_status_datatype_in_users_table', 23),
(61, '2021_11_26_082113_create_admin_wallets_table', 24),
(62, '2021_11_26_094029_add_wallet_column_to_users_table', 25),
(63, '2021_11_26_094346_make_user_id_unique_in_admin_wallets_table', 25),
(64, '2021_11_26_094753_rename_columns_in_admin_wallets_table', 25),
(65, '2021_11_26_112504_create_vouchers_table', 26),
(66, '2021_11_26_130930_rename_discount_column_in_vouchers_table', 27),
(71, '2021_11_26_132158_add_column_to_vouchers_table', 28),
(72, '2021_11_27_162922_add_user_id_column_to_services_table', 28),
(73, '2021_11_28_161724_change_name_of_columns_in_services_table', 29),
(75, '2021_11_29_095907_add_columns_to_products_table', 30),
(76, '2021_12_15_111801_create_conversations_table', 31),
(77, '2021_12_15_111849_create_groups_table', 31),
(78, '2021_12_15_111920_create_group_user_table', 31),
(79, '2021_12_19_163155_create_followers_table', 31),
(80, '2021_12_19_185717_create_reports_table', 31),
(81, '2021_12_19_192747_create_report_images_table', 31),
(82, '2021_12_19_193254_add_type_into_reports_table', 31),
(83, '2021_12_20_064824_add_product_id_field_to_reports_table', 31),
(84, '2021_12_20_071109_add_user_id_column_to_reports_table', 31),
(85, '2021_12_20_075056_change_image_datatype_in_report_images_table', 31),
(87, '2021_12_25_153740_add_column_to_order_products_table', 32),
(88, '2021_12_26_160503_add_column_to_groups_table', 33),
(89, '2021_12_26_170345_add_column_to_product_orders_table', 34),
(90, '2021_12_26_174745_add_order_id_column_to_product_orders_table', 35),
(91, '2021_12_27_052217_add_license_field_to_users_table', 36),
(92, '2021_12_27_063437_add_column_terms_and_condition_to_users_table', 37),
(93, '2021_12_27_063447_add_column_terms_and_condition_to_customers_table', 37),
(94, '2021_12_27_064047_add_column_to_product_categories_table', 37),
(95, '2021_12_27_070501_add_icon_field_to_sub_categories_table', 38),
(96, '2021_12_27_080030_drop_terms_and_condition_field_from_users_and_customers_table', 39),
(97, '2021_12_31_215621_add_order_number_field_to_orders_table', 40);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `shipping_price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_id`, `order_number`, `name`, `email`, `contact_no`, `country`, `city`, `zip_code`, `address`, `product_quantity`, `shipping_price`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 82, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '0313131554', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 1980, 'Approved', '2021-09-11 07:43:36', '2021-10-05 16:24:04'),
(2, 3, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '03473107139', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 1880, 'pending', '2021-09-11 08:39:48', '2021-09-11 08:39:48'),
(3, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '03473107139', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'pending', '2021-09-11 09:51:15', '2021-09-11 09:51:15'),
(4, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '03473107139', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'pending', '2021-09-11 09:53:11', '2021-09-11 09:53:11'),
(5, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '03473107139', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'pending', '2021-09-11 09:53:17', '2021-09-11 09:53:17'),
(6, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '03473107139', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'pending', '2021-09-11 09:53:57', '2021-09-11 09:53:57'),
(7, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '03473107139', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'pending', '2021-09-11 09:54:16', '2021-09-11 09:54:16'),
(8, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '03473107139', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'pending', '2021-09-11 09:56:02', '2021-09-11 09:56:02'),
(9, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '0313131554', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'Accepted', '2021-09-11 09:56:23', '2021-09-11 10:38:40'),
(10, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '0313131554', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'Reject', '2021-09-11 09:56:54', '2021-09-11 10:25:29'),
(11, 2, 3, '', 'Muhammad aqib', 'aqibshaikh168@gmail.com', '0313131554', 4, 1, '17000', 'hyderabad, pakistan, address', NULL, 30, 330, 'Accepted', '2021-09-11 09:58:23', '2021-09-11 10:12:52'),
(12, NULL, NULL, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 1982, NULL, '2021-12-26 10:58:16', '2021-12-26 10:58:16'),
(13, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, NULL, '2021-12-26 11:44:11', '2021-12-26 11:44:11'),
(14, NULL, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:11:21', '2021-12-26 12:11:21'),
(15, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:36:47', '2021-12-26 12:36:47'),
(16, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:37:40', '2021-12-26 12:37:40'),
(17, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:39:00', '2021-12-26 12:39:00'),
(18, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:39:55', '2021-12-26 12:39:55'),
(19, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:40:38', '2021-12-26 12:40:38'),
(20, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:40:49', '2021-12-26 12:40:49'),
(21, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:41:18', '2021-12-26 12:41:18'),
(22, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 4, 1, '56756', 'address address address address', 8, 1982, 37982, 'pending', '2021-12-26 12:41:43', '2021-12-26 12:41:43'),
(23, 82, 33, '', 'azan', 'email@gmail.com', '0987654321', 5, 2, '56756', 'address address address address', 8, 1982, 37982, 'delivered', '2021-12-26 12:43:09', '2021-12-26 14:54:53'),
(24, 18, 33, '', 'azan', 'azan@gmail.com', '9867667447274238', 4, 1, '7388', 'address address address address', 2, 789, 1689, 'pending', '2021-12-31 17:27:10', '2021-12-31 17:27:10'),
(25, 18, 33, '74ad99', 'azan', 'azan@gmail.com', '9867667447274238', 4, 1, '7388', 'address address address address', 2, 789, 1689, 'pending', '2021-12-31 17:29:06', '2021-12-31 17:29:06'),
(26, 18, 33, '74ad99', 'azan', 'azan@gmail.com', '9867667447274238', 5, 2, '7388', 'address address address address', 2, 789, 1689, 'pending', '2021-12-31 17:32:50', '2021-12-31 17:32:50'),
(27, 18, 1, '74ad99', 'azan', 'azan@gmail.com', '98765436768676767', 4, 1, '7388', 'address address address address', 22, 282, 10182, 'pending', '2022-01-04 06:37:34', '2022-01-04 06:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `shipment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_quantity`, `product_price`, `shipment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 100, 0, '2021-09-11 07:43:36', '2021-09-11 07:43:36'),
(2, 2, 4, 1, 1550, 0, '2021-09-11 08:39:48', '2021-09-11 08:39:48'),
(3, 6, 1, 1, 200, 0, '2021-09-11 09:53:57', '2021-09-11 09:53:57'),
(4, 6, 3, 1, 100, 0, '2021-09-11 09:53:57', '2021-09-11 09:53:57'),
(5, 7, 1, 1, 200, 0, '2021-09-11 09:54:16', '2021-09-11 09:54:16'),
(6, 7, 3, 1, 100, 0, '2021-09-11 09:54:16', '2021-09-11 09:54:16'),
(7, 8, 1, 1, 200, 0, '2021-09-11 09:56:02', '2021-09-11 09:56:02'),
(8, 8, 3, 1, 100, 0, '2021-09-11 09:56:02', '2021-09-11 09:56:02'),
(9, 9, 1, 1, 200, 0, '2021-09-11 09:56:23', '2021-09-11 09:56:23'),
(10, 9, 3, 1, 100, 0, '2021-09-11 09:56:23', '2021-09-11 09:56:23'),
(11, 10, 1, 1, 200, 0, '2021-09-11 09:56:54', '2021-09-11 09:56:54'),
(12, 10, 3, 1, 100, 0, '2021-09-11 09:56:54', '2021-09-11 09:56:54'),
(13, 11, 1, 1, 200, 0, '2021-09-11 09:58:23', '2021-09-11 09:58:23'),
(14, 11, 3, 1, 100, 0, '2021-09-11 09:58:23', '2021-09-11 09:58:23'),
(15, 12, NULL, 8, NULL, 0, '2021-12-26 10:58:16', '2021-12-26 10:58:16'),
(16, 13, 6, 8, 4500, 0, '2021-12-26 11:44:11', '2021-12-26 11:44:11'),
(17, 16, 6, 8, 4500, 111, '2021-12-26 12:37:41', '2021-12-26 12:37:41'),
(18, NULL, 6, 8, 4500, 111, '2021-12-26 12:37:41', '2021-12-26 12:37:41'),
(19, 17, 6, 8, 4500, 111, '2021-12-26 12:39:00', '2021-12-26 12:39:00'),
(20, NULL, 6, 8, 4500, 111, '2021-12-26 12:39:00', '2021-12-26 12:39:00'),
(21, 18, 6, 8, 4500, 111, '2021-12-26 12:39:55', '2021-12-26 12:39:55'),
(22, 19, 6, 8, 4500, 111, '2021-12-26 12:40:38', '2021-12-26 12:40:38'),
(23, 20, 6, 8, 4500, 111, '2021-12-26 12:40:49', '2021-12-26 12:40:49'),
(24, 21, 6, 8, 4500, 111, '2021-12-26 12:41:19', '2021-12-26 12:41:19'),
(25, 22, 6, 8, 4500, 111, '2021-12-26 12:41:43', '2021-12-26 12:41:43'),
(26, 23, 6, 8, 4500, 111, '2021-12-26 12:43:09', '2021-12-26 12:43:09'),
(27, 24, 13, 2, 450, 112, '2021-12-31 17:27:10', '2021-12-31 17:27:10'),
(28, 25, 13, 2, 450, 112, '2021-12-31 17:29:06', '2021-12-31 17:29:06'),
(29, 26, 13, 2, 450, 112, '2021-12-31 17:32:50', '2021-12-31 17:32:50'),
(30, 27, 13, 22, 450, 112, '2022-01-04 06:37:34', '2022-01-04 06:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aurangzebrafique25@gmail.com', 'PgSuuqi0c78cVnAL2kf4TAOvST1vJ5iUc1BLKNEP3MpeSd1YdbPaNacBloxKDLFC', '2022-01-17 12:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `pending_bids`
--

CREATE TABLE `pending_bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `auction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pending_bids`
--

INSERT INTO `pending_bids` (`id`, `product_id`, `auction_id`, `user_id`, `customer_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(33, 7, 6, 18, 9, 50, 'Approved', '2022-01-14 07:43:06', '2022-01-14 07:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` int(11) DEFAULT NULL,
  `average_market_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `little_describe` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_durations` int(11) NOT NULL DEFAULT 0,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image5` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fast_deals` tinyint(1) NOT NULL DEFAULT 0,
  `hurry_deals` tinyint(1) NOT NULL DEFAULT 0,
  `special_deals` tinyint(1) NOT NULL DEFAULT 0,
  `stock_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `limited_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sub_category_id`, `brand`, `color`, `average_market_price`, `price`, `unit`, `payment`, `delivery`, `little_describe`, `description`, `stock_quantity`, `user_id`, `add_durations`, `video`, `image1`, `image2`, `image3`, `image4`, `image5`, `created_at`, `updated_at`, `featured`, `fast_deals`, `hurry_deals`, `special_deals`, `stock_location`, `limited_time`) VALUES
(6, 'dummy', 2, 'dummy', 1, 5000, 4500, 'meter', '[\"Paypal\",\"Cradit\",\"Debit card\",\"Bank Transfer\"]', '[\"Door Step\",\"International\"]', 'dummy', 'dummy', 50, 18, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-10-07 09:48:52', '2021-10-20 12:42:16', '1', 0, 1, 0, '', NULL),
(7, 'dummy', 2, 'dummy', 1, 253, 150, 'peice', '[\"Paypal\",\"Cradit\",\"Debit card\"]', '[\"Door Step\"]', 'dummy', 'dummy', 555, 18, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-10-07 09:50:09', '2021-10-20 12:42:16', '0', 0, 1, 0, '', NULL),
(8, 'dummy', 2, 'dummy', 2, 584154, 554545, 'peice', '[\"Paypal\",\"Cradit\",\"Debit card\"]', '[\"Door Step\"]', 'dummy', 'dummy', 8984, 18, 0, '', '61a4b72b71db7-test.jpg', '615f096cce69a-dummy.png', '615f096ccf462-dummy.png', '615f096cd01e8-dummy.png', '615f096cd0fc6-dummy.png', '2021-10-07 09:51:24', '2021-10-20 12:42:13', '0', 0, 1, 0, '', NULL),
(9, 'dummy', 2, 'dummy', 1, 545, 445, 'peice', '[\"Paypal\",\"Cradit\",\"Debit card\"]', '[\"Door Step\",\"International\"]', 'fgdfddfg', 'fgfdgfdg', 6556, 18, 0, '', '61a4b72b71db7-test.jpg', '615f0c2160cc6-dummy.jpg', '615f0c2161d4d-dummy.jpg', '615f0c2162d77-dummy.jpg', '615f0c2163da4-dummy.jpg', '2021-10-07 10:02:57', '2021-10-20 12:42:07', '0', 0, 1, 0, '', NULL),
(10, 'vncnnvq', 5, 'djjdjj', 1, 899, 777, 'cm', '[\"Paypal\",\"Master card\"]', '[\"Door Step\",\"National\"]', 'nc,xcccc,xcnx,n,', 'djknsjknsjknfksnk', 11, 20, 0, '', '61a4b72b71db7-test.jpg', '615f2715ab469-vncnnvq.jpg', '', '', '', '2021-10-07 11:57:57', '2022-01-13 12:56:44', '0', 0, 1, 0, '', NULL),
(11, 'Cotton cloth', 3, 'Khaadi', 1, 400, 300, 'meter', '[\"Paypal\",\"Master card\",\"Cradit\",\"Debit card\"]', '[\"Door Step\"]', 'khaadi khaadi khaadi', 'khaadikhaadikhaadikhaadikhaadikhaadikhaadikhaadikhaadikhaadikhaadikhaadi', 10, 20, 0, '', '61a4b72b71db7-test.jpg', '615f27b0276a3-Cotton cloth.jpg', '615f27b028641-Cotton cloth.jpg', '615f27b02967a-Cotton cloth.jpg', '', '2021-10-07 12:00:32', '2021-10-20 12:42:32', '0', 0, 1, 0, '', NULL),
(12, 'dummy', 5, 'dummy', 0, 500, 450, 'peice', '[\"Paypal\"]', '[\"Door Step\"]', 'fgvhvgvhgnmvb n', 'uygsddsjfndsndbuydgsurbgugkmfngfkgnfcxgnlgitr', 50, 18, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-10-18 10:21:50', '2022-01-11 14:43:56', '0', 1, 1, 1, 'Hyderabad', NULL),
(13, 'dummy1234', 5, 'dummy', 0, 500, 450, 'peice', '[\"Paypal\"]', '[\"Door Step\"]', 'fdfdvgdvfgdgfd', 'fgddgbfcfbcgfx', 50, 18, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-10-18 10:22:44', '2022-01-11 14:43:57', '0', 1, 1, 1, 'Latifabad', NULL),
(21, 'test', 9, 'test', 1, 678, 45, 'piece', '[\"Paypal\",\"Debit card\",\"We Chat\"]', '[\"Door Step\",\"International\"]', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 78, 82, 0, '61a48e7e5cf98-test.mp4', '61a4b72b71db7-test.jpg', '61a48e7e6eea5-test.jpg', '61a48e7e6f520-test.jpg', '61a48e7e730df-test.jpg', '61a48e7e739b6-test.jpg', '2021-11-29 03:25:34', '2021-11-29 03:25:34', NULL, 0, 0, 0, '', NULL),
(22, 'test', 9, 'test', 1, 37, 78, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'tetse', 'tetse', 44, 82, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-11-29 06:16:12', '2021-11-29 06:16:12', '1', 0, 0, 0, 'Qasimabad', '2021-12-29 16:47:17'),
(23, 'test2', 6, 'test', 1, 87, 67, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 67, 82, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-11-29 06:19:07', '2021-11-29 06:19:07', '1', 0, 0, 0, 'Lahore', '2021-11-29 06:21:03'),
(24, 'test', 6, 'test', 1, 87, 67, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 67, 82, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-11-29 06:20:05', '2021-11-29 06:20:05', '1', 0, 0, 0, 'Karachi', '2021-11-29 06:21:03'),
(25, 'test', 6, 'test', 1, 87, 67, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 67, 82, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-11-29 06:20:51', '2021-11-29 06:20:51', NULL, 0, 0, 0, '', '2021-11-29 06:21:03'),
(26, 'test2', 6, 'test', 1, 87, 67, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 67, 82, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-11-29 06:21:03', '2021-11-29 06:21:03', NULL, 0, 0, 0, '', '2000-01-29 14:18:34'),
(27, 'name', 9, 'name', 1, 678, 666, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'namenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamename', 'namenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamenamename', 76, 82, 0, '', '61a4b72b71db7-test.jpg', '61a5af449afaf-name.jpg', '', '', '', '2021-11-29 23:57:40', '2021-11-29 23:57:40', NULL, 0, 0, 0, 'hyd', '2021-11-29 23:57:40'),
(28, 'name', 5, 'brand', 1, 78, 76, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'brandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrand', 'brandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrand', 7, 82, 0, '', '61a4b72b71db7-test.jpg', '61a5af93beb74-name.jpg', '61a5af93bf555-name.jpg', '', '', '2021-11-29 23:58:59', '2021-11-29 23:58:59', NULL, 0, 0, 0, 'hyd', '2021-11-29 23:58:59'),
(29, 'brand', 9, 'brand', 1, 7, 66, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'brandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrand', 'brandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrandbrand', 67, 82, 0, '', '61a4b72b71db7-test.jpg', '61a5b097a4d41-brand.jpg', '', '', '', '2021-11-30 00:03:19', '2021-11-30 00:03:19', NULL, 0, 0, 0, 'hyd', '2021-12-30 00:03:19'),
(30, 'name', 9, 'name', 1, 6, 6787, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'namenamenamenamenamenamenamenamenamenamename', 'namenamenamenamenamenamenamenamenamenamename', 7, 82, 0, '', '61a4b72b71db7-test.jpg', '', '', '', '', '2021-11-30 00:08:14', '2021-11-30 00:08:14', NULL, 0, 0, 0, 'hyd', NULL),
(31, 'name', 9, 'bean', 1, 768, 76, 'piece', '[\"Paypal\"]', '[\"Door Step\"]', 'beanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbean', 'beanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbeanbean', 678, 82, 0, '', '61a4b72b71db7-test.jpg', '61a5b20d2c455-name.jpg', '', '', '', '2021-11-30 00:09:33', '2021-11-30 00:09:33', NULL, 0, 0, 0, 'hyd', '2022-01-02 20:03:00'),
(35, 'meu', 11, 'keu', 0, 100, 90, 'kg', '[\"Paypal\"]', '[\"Door Step\"]', 'keu meu cheui', 'asdasdasdasdasdasdasdasd', 100, 3, 0, '', '61e57ac384666-meu.jpg', '61dec617caf0d-meu.png', '61dec617cb35e-meu.png', '', '', '2022-01-12 11:14:15', '2022-01-17 13:18:43', '0', 0, 0, 0, 'asdasd', NULL),
(36, 'demo product', 9, 'demo brand', 1, 2000, 1000, 'block', '[\"Paypal\"]', '[\"Door Step\"]', 'lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text', 'lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text lorem ipsum is dummy text', 10, 3, 0, '', '61e56c0eedb50-demo product.jpg', '', '', '', '', '2022-01-17 10:12:11', '2022-01-17 12:15:58', NULL, 0, 0, 0, 'pakistan', NULL),
(37, 'demo product', 9, 'demo brand', 0, 2000, 1000, 'block', '[\"Paypal\"]', '[\"Door Step\"]', 'lorem ipsum is dummy text', 'lorem ipsum is dummy textlorem ipsum is dummy textllorem ipsum is dummy textlorem ipsum is dummy textlorem ipsum is dummy textlorem ipsum is dummy textlorem ipsum is dummy textorem ipsum is dummy textlorem ipsum is dummy textlorem ipsum is dummy text', 50, 3, 0, '', '61e57a067ce10-demo product.jpg', '', '', '', '', '2022-01-17 13:15:34', '2022-01-17 13:15:34', NULL, 0, 0, 0, 'pakistan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_adds`
--

CREATE TABLE `product_adds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expire_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_adds`
--

INSERT INTO `product_adds` (`id`, `user_id`, `product_id`, `package`, `created_at`, `updated_at`, `expire_at`) VALUES
(18, 18, 6, 4, '2021-10-07 12:15:12', '2021-10-07 12:15:12', '2021-10-14'),
(19, 18, 7, 3, '2021-10-07 12:17:33', '2021-10-07 12:17:33', '2021-10-10'),
(21, 18, 13, 4, '2021-10-18 10:23:34', '2021-10-18 10:23:34', '2021-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'gadgets', '', '2021-09-06 04:18:58', '2021-09-06 04:18:58'),
(2, 'Furniture', '', '2021-10-06 14:05:09', '2021-10-06 14:05:09'),
(3, 'Automotive', '', '2021-10-06 14:05:19', '2021-10-06 14:05:19'),
(4, 'Electronics', '', '2021-10-06 14:05:31', '2021-10-06 14:05:31'),
(5, 'Sports', '', '2021-10-06 14:05:46', '2021-10-06 14:05:46'),
(6, 'Clothing', '', '2021-10-06 14:05:57', '2021-10-06 14:05:57'),
(7, 'Home Decor', '', '2021-10-06 14:06:07', '2021-10-06 14:06:07'),
(8, 'Gadgets', '', '2021-10-06 14:06:16', '2021-10-06 14:06:16'),
(9, 'Machinery', '', '2021-10-06 14:06:24', '2021-10-06 14:06:24'),
(10, 'Food', '', '2021-10-06 14:06:31', '2021-10-06 14:06:31'),
(11, 'Softwares', '', '2021-10-06 14:06:55', '2021-10-06 14:06:55'),
(12, 'Agriculture', '', '2021-10-06 14:07:30', '2021-10-06 14:07:30'),
(13, 'id card', 'fa fa-balance-scale-left', '2021-12-27 01:54:20', '2021-12-27 01:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `product_id`, `user_id`, `order_id`, `payment`, `delivery`, `quantity`, `shipment_id`, `created_at`, `updated_at`, `customer_id`) VALUES
(5, 6, 82, 23, 'cash on delivery', '', '', 111, '2021-12-26 12:41:43', '2021-12-26 12:41:43', 33),
(6, 6, 82, 23, 'cash on delivery', 'door step', '8', 111, '2021-12-26 12:43:09', '2021-12-26 12:43:09', 33),
(9, 13, 18, 26, 'cash on delivery', 'door step', '2', 112, '2021-12-31 17:32:50', '2021-12-31 17:32:50', 33),
(10, 13, 18, 27, 'cash on delivery', 'door step', '22', 112, '2022-01-04 06:37:34', '2022-01-04 06:37:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_videos`
--

CREATE TABLE `product_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `description`, `product_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(3, 'hello orldasd', 'testingtestingtestingtesting', 12, 33, 'product', '2021-12-27 09:38:30', '2021-12-27 09:38:30'),
(4, 'reporting title', 'reporting title reporting titlereporting titlereporting titlereporting title', 13, 33, 'product', '2021-12-30 14:50:27', '2021-12-30 14:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `report_images`
--

CREATE TABLE `report_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report_images`
--

INSERT INTO `report_images` (`id`, `report_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/report/images//eUIOjLptnJMN1CKBP8oAtMg89cGkBxOwbqrWswOg.png', '2021-12-26 23:35:34', '2021-12-26 23:35:34'),
(2, 1, 'public/report/images//plZhHN6l082R6k9nUabKnpqMaKktnKS8DxNhrpCg.png', '2021-12-26 23:35:34', '2021-12-26 23:35:34'),
(3, 1, 'public/report/images//8vlNrr6CvXS5Kw1TbUHdFMDLubbdraXvvWxJ7AP1.png', '2021-12-26 23:35:34', '2021-12-26 23:35:34'),
(4, 1, 'public/report/images//oWKxhQOfJnoHywJ6SULDUdpPNxBjGVsoOyIEKTMF.png', '2021-12-26 23:35:34', '2021-12-26 23:35:34'),
(5, 2, 'public/report/images//64wIhdr9wP2q1VxBSXeyB1yn2TPHJ187iXuJS8uO.png', '2021-12-26 23:39:04', '2021-12-26 23:39:04'),
(6, 2, 'public/report/images//6FsI67Ss59WxdqVkWTVln7kY48vfFJMoZbBABpdL.png', '2021-12-26 23:39:04', '2021-12-26 23:39:04'),
(7, 2, 'public/report/images//Fwi5zzaDH4ybNQi9aSmjomlnFLGfhQmaikBHNq2a.png', '2021-12-26 23:39:04', '2021-12-26 23:39:04'),
(8, 2, 'public/report/images//KAwa2Yvvjzlb8VYmVYpkxKcWowZHOe0ZzJoPP51y.png', '2021-12-26 23:39:04', '2021-12-26 23:39:04'),
(9, 2, 'public/report/images//9cpdrWey0GqKGWq08bW7T3jldk2vQiSLZnphIsxj.png', '2021-12-27 09:37:13', '2021-12-27 09:37:13'),
(10, 3, 'public/report/images//dALYX7JEb3M53AjrNkBHN7TkHKJGb9h8uUZKYXhp.png', '2021-12-27 09:38:31', '2021-12-27 09:38:31'),
(11, 4, 'public/report/images//4FPffTcn4XJ4WuB4bZXHKE4YYM2g3A98cfT15Uym.jpg', '2021-12-30 14:50:30', '2021-12-30 14:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `review` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `customer_id`, `product_id`, `order_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 107, 13, 13, NULL, 'testing test', 3, '2021-10-20 12:01:26', '2021-10-20 12:01:26'),
(2, 108, 13, 13, NULL, 'testing 2', 2, '2021-10-20 12:01:44', '2021-10-20 12:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `data`, `thumbnail`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'service2', '<h2>HELLO WORLD</h2>', 'public/sellers/images//QaU6CyTEdMNI4CugDH1khtmesnjox6eLOfo7Ae7C.jpg', 82, '2021-11-28 11:26:15', '2021-11-28 11:34:49'),
(2, 'service', '<h2>HELLO WORLD</h2>', 'public/sellers/images//kn9gLpMqZkY7Kly10N9rh0NsnYQ9lGE2jYEFD5Sh.jpg', 82, '2021-11-28 11:28:00', '2021-11-28 11:28:00'),
(3, 'testing service', '<h2>testing service</h2>', 'public/sellers/images//Cs28gxJ9f03mpa3Ced94nPKb4KDiXkopdc30GNpz.jpg', 82, '2021-11-28 12:05:45', '2021-11-28 12:05:45'),
(4, 'testing service', '<h2>testing service</h2>', 'public/sellers/images//M7fFPzvdWj40dBBjBPhPcpGdwwMLcA9rgNNAml32.jpg', 82, '2021-11-28 12:06:54', '2021-11-28 12:06:54'),
(5, 'Azeem Services', '<h3>Azeem Services</h3><h2>Azeem Services</h2><p>Azeem ServicesAzeem ServicesAzeem ServicesAzeem ServicesAzeem ServicesAzeem ServicesAzeem ServicesAzeem ServicesAzeem Services</p>', 'public/sellers/images//venxNQuW6bilbsCrBcx4kxCV9KLZ4i8fEiWamH1f.jpg', 109, '2021-12-01 12:56:49', '2021-12-01 12:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_services`
--

CREATE TABLE `shipment_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipment_services`
--

INSERT INTO `shipment_services` (`id`, `title`, `data`, `thumbnail`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'example service', '<h1>example service</h1><h1>example service</h1><h1>example service</h1><h1>example service</h1><h1>example service</h1><h1>example service</h1>', 'public/shipment/images//dlPni2f7hRECbLJbOFnkk0AzbZACtxcmvikuVDkr.jpg', 111, '2021-11-25 08:19:15', '2021-11-25 08:19:15', NULL),
(2, 'Service Example', '\"\\\"<h2>Service Example<\\\\\\/h2><p>&nbsp;<\\\\\\/p><h3>Lorem ipsum<\\\\\\/h3><p>&nbsp;<\\\\\\/p><p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum&nbsp;<\\\\\\/p>\\\"\"', 'public/shipment/images//Sc9DjLkf4hXxD15kY1wSrK1rE0PEhMi1CV4fQGcn.jpg', 86, '2021-11-25 08:27:23', '2021-11-25 08:27:23', NULL),
(3, 'Mediterranean Service', '\"<h3>Mediterranean Service Package<\\/h3><h4>lorem ipsum&nbsp;<\\/h4><p>&nbsp;<\\/p><p>&nbsp;<\\/p><p>&nbsp;<\\/p><p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum&nbsp;<\\/p>\"', 'public/shipment/images//x0CssgSJR3NMuXJJsJLz1eWPWdFNT1LWe350s0eK.jpg', 86, '2021-11-25 08:54:50', '2021-11-25 08:54:50', NULL),
(4, 'Simple Service Package', '\"<h2>SIMPLE SERVICE PACKAGE<\\/h2><p><br>&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/p>\"', 'public/shipment/images//4wcsSBQ4wZ1HLPGxlzViCkBWT897s2MZfdgq9d0k.jpg', 91, '2021-11-25 08:59:56', '2021-11-25 08:59:56', NULL),
(5, 'Sample Service', '<h2>Sample Service Package</h2><p><br>&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;\\/p&gt;\"</p>', 'public/shipment/images//LD4D7Y3QmEXmYnqEegY1VypUItWLZKx8nlWLKQkq.jpg', 111, '2021-11-25 09:05:55', '2021-11-25 09:06:20', NULL),
(6, 'title', '<h2>first service</h2>', 'public/shipment/images//VBindQ3mv3p6GKU9YkCAmHI3Aw2RHcddDOrB2HIG.jpg', 96, '2021-12-01 05:21:29', '2021-12-01 05:21:29', NULL),
(7, 'Shipment Service', '<h2>Shipment Service</h2><p>&nbsp;</p><p>lorem ipsum dummy text lorem ipsum dummy textlorem ipsum dummy textlorem ipsum dummy textlorem ipsum dummy text</p>', 'public/shipment/images//veFQ4S0LNAWQo7nLdqRMa81RrjhFkOArmDSag8D7.jpg', 105, '2021-12-01 10:45:38', '2021-12-01 10:45:38', NULL),
(8, 'Test', '<h2>Test</h2><p>&nbsp;</p><p>lorem ipsum is a dummy text lorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy textlorem ipsum is a dummy text</p>', 'public/shipment/images//HcraSJ9P3OiYhNWQaMb6p5ToiBmpsBjnCLhRhduA.jpg', 105, '2021-12-01 10:54:06', '2021-12-01 10:54:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `heading`, `text`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '61e56dfd91c7d-.jpg', 'Refrigerator', '24/7 cooling refrigerator', 5, '2021-09-28 06:44:59', '2022-01-17 12:24:13'),
(2, '61534b8951fa8-.jpg', 'tesing', 'tesing slider banners', NULL, '2021-09-28 07:10:57', '2021-09-28 12:06:17'),
(3, '61e5702c5a621-.jpg', 'demo slider', 'buy now', NULL, '2022-01-17 12:33:32', '2022-01-17 12:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(2, 6, 'Linen', '', '2021-10-06 14:08:16', '2021-10-06 14:08:16'),
(3, 6, 'Cotton', '', '2021-10-06 14:08:41', '2021-10-06 14:08:41'),
(4, 6, 'Velvet', '', '2021-10-06 14:09:09', '2021-10-06 14:09:09'),
(5, 4, 'OLED', '', '2021-10-06 14:09:29', '2021-10-06 14:09:29'),
(6, 4, 'Vaccum Cleaner', '', '2021-10-06 14:09:59', '2021-10-06 14:09:59'),
(7, 10, 'Whey Protein', '', '2021-10-06 14:10:14', '2021-10-06 14:10:14'),
(8, 10, 'Fats', '', '2021-10-06 14:10:30', '2021-10-06 14:10:30'),
(9, 2, 'wood', '', '2021-11-26 08:46:56', '2021-11-26 08:46:56'),
(10, 7, 'id', '', '2021-12-27 02:09:03', '2021-12-27 02:09:03'),
(11, 13, 'new icon', 'fa fa-arrows-alt', '2021-12-27 02:12:13', '2021-12-27 02:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `seller_id` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `license_img` int(11) NOT NULL,
  `usertype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `badge_verification_status` smallint(6) NOT NULL DEFAULT 0,
  `wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `company`, `company_license`, `contact_number`, `country`, `license_img`, `usertype`, `city`, `remember_token`, `created_at`, `updated_at`, `google_id`, `email_verified_at`, `badge_verification_status`, `wallet_id`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'traders', 'approved', '034756114566', 4, 0, 'admin', 2, NULL, '2021-09-04 15:20:46', '2021-09-04 15:20:46', NULL, '2021-09-04 15:20:46', 0, 0),
(3, 'cheeu', 'seller@seller.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xiaomi', 'approved', '0347166846446', 5, 0, 'user', 2, NULL, '2021-09-09 03:33:54', '2021-11-28 12:27:09', NULL, '2021-12-23 11:17:42', 2, 23),
(15, 'zaib', 'zaib@gmail.com', '$2y$10$0aD.brkSseA4r1IYRZlsgel2AEF7HmhzqW1rdGmt2PdCRzfX5tVly', 'traders', 'approved', '03473107139', 4, 0, 'user', 1, NULL, '2021-09-25 05:22:49', '2021-09-25 05:22:49', NULL, NULL, 0, 0),
(16, 'Nabeel', 'mqnabeel@gmail.com', '$2y$10$64p.exxxG1UhvwLhVXmhCuhacDsXWbx//Rh6wip9WQI0TEYr/1Fd.', 'az', 'approved', '03473107139', 4, 0, 'user', 1, NULL, '2021-09-25 05:26:26', '2021-09-25 05:26:26', NULL, '2022-01-25 22:24:30', 2, 0),
(18, 'Dummy Seller', 'dummy@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dummy@gmail.com', 'approved', '355645465485', 4, 0, 'user', 1, NULL, '2021-10-07 07:14:46', '2021-10-22 08:20:41', NULL, '2022-01-27 22:24:46', 2, 2),
(20, 'ncnnncn', 'zebrafique@icloud.com', '$2y$10$wtMuDaeXrryCryrcQJGDa..cuJTu3TLBIfiwtqC.j6Br/L7CeT4KO', 'cnncn', 'ncxnnn', '03352219943', 4, 0, 'user', 1, NULL, '2021-10-07 10:13:02', '2021-10-07 10:13:02', NULL, NULL, 0, 0),
(21, 'Sameer Ahmed Mallah', 'mallahgq225@gmail.com', '$2y$10$/RzGJg4JtMtoopLS.LiUTOAHhll81pv5fQ77CAFLyeYp7Gme.epMO', 'azsolution', 'asdasd', '03463653911', 4, 0, 'user', 1, NULL, '2021-10-07 10:21:24', '2021-10-07 10:21:24', NULL, NULL, 0, 0),
(59, 'azan', 'azankorejo@test.com', '$2y$10$fFwP/GYfjeghf89Sc66rt.MTBNfHdqJJWwy.0w/R1U6HGpecCJgfe', 'azan', '7323318978', '78937892', 4, 0, 'user', 1, NULL, '2021-11-22 04:25:29', '2021-11-22 04:25:29', NULL, NULL, 0, 0),
(79, 'Suppro', 'suppro@gmail.com', '$2y$10$WoNVdrKU05LbwVzfFbxMQexO0qDa641HUesjOxPF56PiC214aEivG', 'Suppro', '7391273289', '3627818', 4, 0, 'user', 1, NULL, '2021-11-25 05:08:19', '2021-11-25 05:08:19', NULL, NULL, 0, 0),
(80, 'supplier', 'azan@supplier.com', '$2y$10$LGyo7qQg53oA.x9yUUSUf.J9AhEemp/awBXdJh0rpwceHBjRwtfzy', 'dhajks', '372897128', '73897438', 4, 0, 'user', 1, NULL, '2021-11-25 05:11:08', '2021-11-25 05:12:52', NULL, '2021-11-25 05:12:52', 0, 0),
(81, 'djhskaku', 'azankrejo@mgai.com', '$2y$10$Ft4W5ysTzFe1e0/XDiuGjuCutOH40TpHfHygMadtDXMf7Ftj6KRna', 'hdjks', '3128989', '37832838938', 4, 0, 'user', 1, NULL, '2021-11-25 05:14:40', '2021-11-25 05:14:40', NULL, NULL, 0, 0),
(83, 'supplier', 'sup@supplier.com', '$2y$10$uIJ5wDTLoX09mukCHJ6Wn.kJOTuosN0FA0rHqa26uGHZi7HWo3vBu', 'hdasdjkhjk', '83890809832', '37198978', 4, 0, 'user', 1, NULL, '2021-11-25 05:23:05', '2021-11-25 05:32:23', NULL, '2021-11-25 05:32:23', 0, 0),
(85, 'azan', 'azan@gmail.com', '$2y$10$9B4o8/4908xooP9JsR.lIuV905wRSYhH3A.qJFjiuHJFEzwgCQeSC', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-25 08:16:46', '2021-11-25 08:17:55', NULL, '2021-11-25 08:17:09', 2, 0),
(86, 'fedex', 'shipment@shipment.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-25 08:25:34', '2021-11-25 08:26:19', NULL, '2021-11-25 08:25:51', 2, 0),
(87, 'shipment company', 'shipment@fedex.com', '$2y$10$XeQClNtceZad1xJNgI26humQIlzSqsZ7hJMWUXHXh6s0yMrDoX.Hy', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-25 08:33:02', '2021-11-25 08:33:44', NULL, '2021-11-25 08:33:18', 2, 0),
(88, 'evergreen', 'evergreen@gmail.com', '$2y$10$W6DkkwOXYDwkYbLtRq170.yMakcnFUpNCo9W2DxCG4OU/s0ZIDF0a', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-25 08:37:43', '2021-11-25 08:38:27', NULL, '2021-11-25 08:38:00', 2, 0),
(89, 'cosco', 'cosco@gmail.com', '$2y$10$SVHnDCMayNviMZHyqYQkf.D8lWDFBdCzpDsHWHwqus8LzPGW.Vx76', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-25 08:48:54', '2021-11-25 08:49:20', NULL, '2021-11-25 08:49:16', 1, 0),
(90, 'Mediterranean', 'mediterranean@gmail.com', '$2y$10$AatiUQwYC4nE5W0yftRwH./4B1yMXzDV5vgboeYdX4.ggk2lSLPj6', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-25 08:53:03', '2021-11-25 08:53:41', NULL, '2021-11-25 08:53:19', 2, 0),
(91, 'simple', 'clearance@clearance.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '', '', 4, 0, 'clearance-user', 1, NULL, '2021-11-25 08:58:16', '2021-11-25 08:58:56', NULL, '2021-11-25 08:58:31', 2, 0),
(92, 'sample', 'sample@co.com', '$2y$10$FBsbVkhc1qo.bJJKLGj88.eSFGNjs4r2Mp.vOIlYyg/TKQG/9GKz6', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-25 09:04:19', '2021-11-25 09:04:56', NULL, '2021-11-25 09:04:34', 2, 0),
(94, 'supplier', 'supplier@seller.com', '$2y$10$3G7YPCA/uZdkVGqizkgVt.xDUwumWu.X/BXqcDBJBtKDpDDlAmlq6', '', '', '', 4, 0, 'user', 1, NULL, '2021-11-27 09:31:01', '2021-11-27 09:31:01', NULL, NULL, 0, 0),
(95, 'kadi', 'kadi@ship.com', '$2y$10$ycllpnvGhVnl8dXar/IkuuAp7di0YlsdFgY7zvSmlEcIkaBUH1lh.', '', '', '', 4, 0, 'user', 1, NULL, '2021-11-27 11:02:17', '2021-11-27 11:02:17', NULL, NULL, 0, 0),
(96, 'azan', 'azship@gmail.com', '$2y$10$dA.gxSDbDKfUj.RVc33fhu9/jeN.IqpGP7Jcf7CeOGr5DjzWIHfTC', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-11-30 23:39:47', '2021-11-30 23:46:43', NULL, '2021-11-30 23:43:27', 2, 0),
(97, 'supply', 'supply@gmail.supply', '$2y$10$vuUcQ9BBtv/uZuCTPwPdTOVIq.b25dofRKmzaXaAUPZXpRaqVE4kW', 'supply', '8765464678', '0987654321', 4, 0, 'user', 1, NULL, '2021-12-01 04:53:07', '2021-12-01 04:53:07', NULL, NULL, 0, 0),
(98, 'test', 'test@supply.com', '$2y$10$ZIy1csWCVskxLW8QuAaCMeMpoPcdTEADHhFXUMCZU1FUYpJMM.cBy', 'tests', '09876543', '0987654321', 4, 0, 'user', 1, NULL, '2021-12-01 04:57:16', '2021-12-01 04:57:47', NULL, '2021-12-01 04:57:41', 1, 0),
(99, 'azship', 'azship@ship.com', '$2y$10$VLYoFKdPENhIdJtW.mk52e6l4liJQOHo1lTiDWJZzVfsWFzhEqm8q', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-12-01 07:23:30', '2021-12-01 07:24:56', NULL, '2021-12-01 07:23:51', 2, 0),
(100, 'azan', 'azcust1om@gmail.com', '$2y$10$z55vcCLeNavM1BKtdB9qQeVKhHgTLDL7IzU0zQnKxtBC.SExxiRh2', '', '', '', 4, 0, 'clearance-user', 1, NULL, '2021-12-01 07:27:19', '2021-12-01 07:27:19', NULL, NULL, 0, 0),
(101, 'azan', 'azcustom@gmail.com', '$2y$10$LIzov5gP2PoDt7MXIUM.v.XJzK9nr6Nf7vCQDEDyRB9hFa7B/MVnK', '', '', '', 4, 0, 'clearance-user', 1, NULL, '2021-12-01 07:29:02', '2021-12-01 07:29:38', NULL, '2021-12-01 07:29:16', 2, 0),
(102, 'azclearance', 'azclearance@gmail.com', '$2y$10$aXnbDJwSbsh2kR8iTfNpmuYKrNZT8KyYVqXeo87xFBiHC6i24N2tu', '', '', '', 4, 0, 'clearance-user', 1, NULL, '2021-12-01 08:53:15', '2021-12-01 08:55:19', NULL, '2021-12-01 08:53:36', 2, 0),
(103, 'supplytest', 'supplytest@gmail.com', '$2y$10$iOxSGTGusJc2z8SZ6hikvezkGggviUaGR7UqNq6TrS/9Y5fcGD47y', 'supplytest', '864546', '87654344', 4, 0, 'user', 1, NULL, '2021-12-01 10:24:34', '2021-12-01 10:24:57', NULL, '2021-12-01 10:24:52', 1, 0),
(104, 'shipment company', 'testing@shipment.com', '$2y$10$.MeXVsk0r/MiICMsfOHrd.bIPu7y0j5I5BkFShGx7gqyovakUN3Su', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-12-01 10:43:13', '2021-12-01 10:44:39', NULL, '2021-12-01 10:43:43', 2, 0),
(105, 'jiffy', 'jiffy@ship.com', '$2y$10$9oIoGTYMMMC.1nODNH1GgO0U4a/kaAR.OQfh91FkL8xXi.nCdWA2a', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-12-01 10:51:47', '2021-12-01 10:53:01', NULL, '2021-12-01 10:52:18', 2, 0),
(106, 'test', 'test@dummy.com', '$2y$10$VhzSjnJDCl/D4GStm44b6u1wS9qfKIVNaxVg0esojhfpnz/e5bjsy', 'dummy supplier', '3788877', '030931287489', 4, 0, 'user', 1, NULL, '2021-12-01 11:10:25', '2021-12-01 11:11:01', NULL, '2021-12-01 11:10:57', 1, 0),
(107, 'azan korejo', 'azan@dummycompany.com', '$2y$10$eYBPPI7wVU0z6IdP6i0fheuDJ7YOZxp4Vd22CbnTVcYZz8/oSHRnG', 'dummy company', '7673877', '030931287489', 4, 0, 'user', 1, NULL, '2021-12-01 11:14:19', '2021-12-01 11:15:30', NULL, '2021-12-01 11:14:52', 2, 0),
(108, 'asif', 'asif@gmail.com', '$2y$10$jbdn6In10pxN6fQEsx/epeBDrzsG.qJ1sfu7d.keLAfvGPVfsf0US', 'asif ali', '7876778', '030931287489', 4, 0, 'user', 1, NULL, '2021-12-01 11:21:52', '2021-12-01 11:23:07', NULL, '2021-12-01 11:22:22', 2, 0),
(110, 'test', 'test@shipment.co', '$2y$10$9lzPJ/lA/xQvKgVCSXlTn.Fwm.bMYRiHK1fbNICL.l8WpLOUh29IK', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-12-01 13:05:48', '2021-12-01 13:05:48', NULL, NULL, 0, 0),
(111, 'babar', 'babar@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '', '', 5, 0, 'shipment-user', 1, NULL, '2021-12-02 06:17:39', '2021-12-02 06:17:39', NULL, '2021-12-23 18:14:22', 2, 0),
(112, 'azan korejo', 'azan@lorem.com', '$2y$10$hXCwM0AICZvE2RY2pof.sufh3Mv0i9wQ0VghSzpy2VTMr9Btx.XlO', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-12-27 00:37:37', '2021-12-27 00:37:37', NULL, NULL, 0, 0),
(113, 'azanclearance', 'azan@ipsum.com', '$2y$10$1P3.WfOEQZQLEcnWoISA7.SmtUZY0.FAdMrgWCu4Kff.Cjq.xqODy', '', '', '', 4, 0, 'clearance-user', 1, NULL, '2021-12-27 00:39:08', '2021-12-27 00:39:08', NULL, NULL, 0, 0),
(114, 'azan', 'azankorejo@ipsum.co', '$2y$10$EZrijLMFcBidtJ3JoLw8POEQ99NNmCqRLezWiPC9QxB2dZvDZrU2W', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-12-27 00:59:56', '2021-12-27 00:59:56', NULL, NULL, 0, 0),
(115, 'azan', 'azan@lorem.ipsum', '$2y$10$4ZBzGcGYDdOw6/63NWyOq.C6eA5iTHobDEoQG5ReKDx89fzEwG826', '', '', '', 4, 0, 'shipment-user', 1, NULL, '2021-12-27 02:59:10', '2021-12-27 02:59:10', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_withdraw_requests`
--

CREATE TABLE `user_withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  `stripe_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Status` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_withdraw_requests`
--

INSERT INTO `user_withdraw_requests` (`id`, `user_id`, `wallet_id`, `stripe_email`, `price`, `created_at`, `updated_at`, `Status`) VALUES
(1, 3, 2, 'mnq.nabeel13@gmail.com', 4750, '2021-09-09 09:07:10', '2021-09-09 09:07:10', '0'),
(2, 3, 23, 'davidtrio011@gmail.com', 10, '2022-01-03 05:13:25', '2022-01-03 05:13:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vip_customers`
--

CREATE TABLE `vip_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discounted_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `times_to_use` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `discounted_price`, `times_to_use`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'test', '56', 0, 59, '2021-11-26 08:20:52', '2021-11-26 08:20:52'),
(2, 'dummy', '928', 0, 59, '2021-11-26 08:35:05', '2021-11-26 08:35:05'),
(3, 'dummy', '928', 0, 59, '2021-11-26 08:35:51', '2021-11-26 08:35:51'),
(4, 'dummy', '928', 0, 59, '2021-11-26 08:36:06', '2021-11-26 08:36:06'),
(5, 'dummy', '928', 0, 59, '2021-11-26 08:36:17', '2021-11-26 08:36:17'),
(7, 'voucher', '321', 2, 3, '2021-11-28 12:23:15', '2021-11-28 12:23:15'),
(8, 'test', '100', 1, 108, '2021-12-01 11:38:33', '2021-12-01 11:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `deposits` int(11) NOT NULL DEFAULT 0,
  `refunds` int(11) NOT NULL DEFAULT 0,
  `sell_products` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `price`, `deposits`, `refunds`, `sell_products`, `created_at`, `updated_at`) VALUES
(1, 2, 1650, 500, 0, 2310, '2021-09-06 04:13:26', '2021-09-18 07:04:52'),
(3, 14, 0, 0, 0, 0, '2021-09-25 05:18:39', '2021-09-25 05:18:39'),
(4, 15, 0, 0, 0, 0, '2021-09-25 05:22:49', '2021-09-25 05:22:49'),
(5, 16, 11432, 11792, 0, 0, '2021-09-25 05:26:26', '2021-09-29 05:30:50'),
(6, 18, 4630, 5000, 0, 0, '2021-10-07 07:14:46', '2021-10-20 04:10:34'),
(7, 19, 0, 0, 0, 0, '2021-10-07 08:03:59', '2021-10-07 08:03:59'),
(8, 20, -10, 0, 0, 0, '2021-10-07 10:13:02', '2021-10-13 09:26:56'),
(9, 21, 0, 0, 0, 0, '2021-10-07 10:21:24', '2021-10-07 10:21:24'),
(10, 22, 0, 0, 0, 0, '2021-10-18 10:37:20', '2021-10-18 10:37:20'),
(11, 23, 75, 0, 30, 155, '2021-10-20 03:30:12', '2021-10-20 04:11:06'),
(12, 24, 0, 0, 0, 0, '2021-10-22 13:39:03', '2021-10-22 13:39:03'),
(13, 25, 0, 0, 0, 0, '2021-10-27 06:34:19', '2021-10-27 06:34:19'),
(14, 58, 0, 0, 0, 0, '2021-11-22 04:14:21', '2021-11-22 04:14:21'),
(15, 59, 120, 0, 0, 0, '2021-11-22 04:25:30', '2021-11-26 08:40:44'),
(16, 79, 0, 0, 0, 0, '2021-11-25 05:08:19', '2021-11-25 05:08:19'),
(17, 80, 0, 0, 0, 0, '2021-11-25 05:11:08', '2021-11-25 05:11:08'),
(18, 81, 0, 0, 0, 0, '2021-11-25 05:14:40', '2021-11-25 05:14:40'),
(19, 82, 40, 0, 0, 0, '2021-11-25 05:16:15', '2021-12-01 06:15:30'),
(20, 83, 0, 0, 0, 0, '2021-11-25 05:23:05', '2021-11-25 05:23:05'),
(23, 3, 10, 0, 10, 0, '2021-11-28 12:27:09', '2022-01-03 05:13:25'),
(24, 97, 0, 0, 0, 0, '2021-12-01 04:53:07', '2021-12-01 04:53:07'),
(25, 98, 0, 0, 0, 0, '2021-12-01 04:57:16', '2021-12-01 04:57:16'),
(26, 96, 990, 0, 0, 0, '2021-12-01 07:23:31', '2021-12-01 08:46:02'),
(27, 101, 0, 0, 0, 0, '2021-12-01 07:29:02', '2021-12-01 07:29:02'),
(28, 102, 980, 0, 0, 0, '2021-12-01 08:53:15', '2021-12-01 09:07:17'),
(29, 103, 0, 0, 0, 0, '2021-12-01 10:24:34', '2021-12-01 10:24:34'),
(30, 104, 0, 0, 0, 0, '2021-12-01 10:43:13', '2021-12-01 10:43:13'),
(31, 105, 0, 0, 0, 0, '2021-12-01 10:51:47', '2021-12-01 10:51:47'),
(32, 106, 0, 0, 0, 0, '2021-12-01 11:10:25', '2021-12-01 11:10:25'),
(33, 107, 0, 0, 0, 0, '2021-12-01 11:14:19', '2021-12-01 11:14:19'),
(34, 108, 100, 0, 0, 0, '2021-12-01 11:21:52', '2021-12-01 11:37:22'),
(35, 110, 0, 0, 0, 0, '2021-12-01 13:05:49', '2021-12-01 13:05:49'),
(36, 111, 0, 0, 0, 0, '2021-12-02 06:17:39', '2021-12-02 06:17:39'),
(37, 112, 0, 0, 0, 0, '2021-12-27 00:37:37', '2021-12-27 00:37:37'),
(38, 113, 0, 0, 0, 0, '2021-12-27 00:39:08', '2021-12-27 00:39:08'),
(39, 114, 0, 0, 0, 0, '2021-12-27 00:59:56', '2021-12-27 00:59:56'),
(40, 115, 0, 0, 0, 0, '2021-12-27 02:59:10', '2021-12-27 02:59:10'),
(41, 0, 100, 100, 0, 0, '2022-01-11 09:11:47', '2022-01-11 09:11:47'),
(42, 0, 100, 100, 0, 0, '2022-01-11 09:14:28', '2022-01-11 09:14:28'),
(43, 0, 100, 100, 0, 0, '2022-01-11 09:25:33', '2022-01-11 09:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 1, 4, '2021-09-21 12:05:54', '2021-09-21 12:05:54'),
(5, 17, 16, '2021-10-20 03:48:06', '2021-10-20 03:48:06'),
(6, 13, 17, '2021-10-20 04:09:16', '2021-10-20 04:09:16'),
(7, 32, 32, '2021-12-01 01:26:23', '2021-12-01 01:26:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds_durations`
--
ALTER TABLE `adds_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_package_prices`
--
ALTER TABLE `add_package_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_bids`
--
ALTER TABLE `approved_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_participation_id_foreign` (`participation_id`),
  ADD KEY `chat_messages_conversation_id_foreign` (`conversation_id`);

--
-- Indexes for table `chat_message_notifications`
--
ALTER TABLE `chat_message_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participation_message_index` (`participation_id`,`message_id`),
  ADD KEY `chat_message_notifications_message_id_foreign` (`message_id`),
  ADD KEY `chat_message_notifications_conversation_id_foreign` (`conversation_id`);

--
-- Indexes for table `chat_participation`
--
ALTER TABLE `chat_participation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `participation_index` (`conversation_id`,`messageable_id`,`messageable_type`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_services`
--
ALTER TABLE `clearance_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clearance_services_user_id_foreign` (`user_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_user_type_user_id_index` (`user_type`,`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_withdraw_requests`
--
ALTER TABLE `customer_withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_users_user_type_user_id_index` (`user_type`,`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pending_bids`
--
ALTER TABLE `pending_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_adds`
--
ALTER TABLE `product_adds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_images`
--
ALTER TABLE `report_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_services`
--
ALTER TABLE `shipment_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipment_services_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_withdraw_requests`
--
ALTER TABLE `user_withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vip_customers`
--
ALTER TABLE `vip_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vouchers_user_id_foreign` (`user_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds_durations`
--
ALTER TABLE `adds_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_package_prices`
--
ALTER TABLE `add_package_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_wallets`
--
ALTER TABLE `admin_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `approved_bids`
--
ALTER TABLE `approved_bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message_notifications`
--
ALTER TABLE `chat_message_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_participation`
--
ALTER TABLE `chat_participation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clearance_services`
--
ALTER TABLE `clearance_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customer_withdraw_requests`
--
ALTER TABLE `customer_withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pending_bids`
--
ALTER TABLE `pending_bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_adds`
--
ALTER TABLE `product_adds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_videos`
--
ALTER TABLE `product_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report_images`
--
ALTER TABLE `report_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipment_services`
--
ALTER TABLE `shipment_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `user_withdraw_requests`
--
ALTER TABLE `user_withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vip_customers`
--
ALTER TABLE `vip_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_messages_participation_id_foreign` FOREIGN KEY (`participation_id`) REFERENCES `chat_participation` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `chat_message_notifications`
--
ALTER TABLE `chat_message_notifications`
  ADD CONSTRAINT `chat_message_notifications_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_message_notifications_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `chat_messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_message_notifications_participation_id_foreign` FOREIGN KEY (`participation_id`) REFERENCES `chat_participation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_participation`
--
ALTER TABLE `chat_participation`
  ADD CONSTRAINT `chat_participation_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clearance_services`
--
ALTER TABLE `clearance_services`
  ADD CONSTRAINT `clearance_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipment_services`
--
ALTER TABLE `shipment_services`
  ADD CONSTRAINT `shipment_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
