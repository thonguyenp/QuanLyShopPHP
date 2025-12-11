-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2025 at 04:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(44, 12, 11, 2, '2025-12-04 00:37:21', '2025-12-11 09:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', 'smartphone', 'Điện1  thoại di động có tích hợp nhiều tính năng và khả năng xử lý thông minh', 'upload/categories/1763123882-691722aa9a8dd.png', '2025-11-06 21:25:43', '2025-11-14 12:38:02'),
(2, 'Laptop', 'laptop', 'một máy tính cá nhân nhỏ gọn, có tính di động cao', 'upload/categories/laptop.png', '2025-11-06 21:25:43', '2025-11-06 21:25:43'),
(3, 'Tablet', 'tablet', 'thiết bị điện tử di động có màn hình cảm ứng lớn hơn điện thoại, nhưng nhỏ hơn laptop', 'upload/categories/tablet.png', '2025-11-06 21:25:43', '2025-11-06 21:25:43'),
(4, 'Accessory', 'accessory', 'Các phụ kiện thông minh', 'upload/categories/accessory.png', '2025-11-06 21:25:43', '2025-11-06 21:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_replied` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `phone_number`, `email`, `message`, `is_replied`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Phước Thọ', '0367137145', 'petho23062004@gmail.com', 'he he', 0, '2025-11-11 13:46:51', '2025-11-16 12:16:50'),
(2, 'Nguyễn Phước Thọ', '0367137145', 'tho.np.64cntt@ntu.edu.vn', 'Có ip 17 chưa', 1, '2025-11-16 07:37:56', '2025-11-16 12:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `kpi_bonuses`
--

CREATE TABLE `kpi_bonuses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `year` year NOT NULL,
  `total_score` int NOT NULL,
  `bonus_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpi_bonuses`
--

INSERT INTO `kpi_bonuses` (`id`, `user_id`, `year`, `total_score`, `bonus_amount`, `created_at`, `updated_at`) VALUES
(1, 5, '2025', 88, 0.00, '2025-12-01 02:21:56', '2025-12-01 02:30:44'),
(2, 5, '2024', 0, 0.00, '2025-12-01 02:27:20', '2025-12-01 02:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `kpi_criteria`
--

CREATE TABLE `kpi_criteria` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpi_criteria`
--

INSERT INTO `kpi_criteria` (`id`, `name`, `max_score`, `created_at`, `updated_at`) VALUES
(1, 'Đi đúng giờ', 10, '2025-12-01 00:50:32', '2025-12-01 00:50:32'),
(2, 'Hiệu suất công việc', 30, '2025-12-01 00:50:32', '2025-12-01 00:50:32'),
(3, 'Thái độ & hợp tác', 20, '2025-12-01 00:50:32', '2025-12-01 00:50:32'),
(4, 'Chất lượng công việc', 30, '2025-12-01 00:50:32', '2025-12-01 00:50:32'),
(5, 'Kỷ luật & tuân thủ', 10, '2025-12-01 00:50:32', '2025-12-01 00:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `kpi_scores`
--

CREATE TABLE `kpi_scores` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `rated_by` bigint UNSIGNED NOT NULL,
  `score` int NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpi_scores`
--

INSERT INTO `kpi_scores` (`id`, `user_id`, `criteria_id`, `rated_by`, `score`, `period`, `note`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 13, 8, '2025-11', 'Thi thoảng đi muộn 5 phút', '2025-12-01 00:54:00', '2025-12-01 00:54:00'),
(2, 5, 2, 13, 26, '2025-11', 'Hoàn thành phần lớn công việc đúng deadline', '2025-12-01 00:54:00', '2025-12-01 00:54:00'),
(3, 5, 3, 13, 18, '2025-11', 'Hợp tác tốt với đồng nghiệp', '2025-12-01 00:54:00', '2025-12-01 00:54:00'),
(4, 5, 4, 13, 27, '2025-11', 'Kết quả công việc đạt chất lượng tốt', '2025-12-01 00:54:00', '2025-12-01 00:54:00'),
(5, 5, 5, 13, 9, '2025-11', 'Không vi phạm nội quy', '2025-12-01 00:54:00', '2025-12-01 00:54:00'),
(6, 1, 1, 13, 10, '2025-11', 'test', '2025-12-01 01:59:02', '2025-12-01 01:59:02'),
(7, 1, 2, 13, 30, '2025-11', 'test', '2025-12-01 01:59:02', '2025-12-01 01:59:02'),
(8, 1, 3, 13, 20, '2025-11', 'test', '2025-12-01 01:59:02', '2025-12-01 01:59:02'),
(9, 1, 4, 13, 30, '2025-11', 'test', '2025-12-01 01:59:02', '2025-12-01 01:59:02'),
(10, 1, 5, 13, 10, '2025-11', 'test', '2025-12-01 01:59:02', '2025-12-01 01:59:02'),
(11, 1, 1, 13, 8, '2025-08', 'Di lam dung gio', '2025-12-04 00:39:41', '2025-12-04 00:39:41'),
(12, 1, 2, 13, 28, '2025-08', 'Di lam dung gio', '2025-12-04 00:39:41', '2025-12-04 00:39:41'),
(13, 1, 3, 13, 18, '2025-08', 'Di lam dung gio', '2025-12-04 00:39:41', '2025-12-04 00:39:41'),
(14, 1, 4, 13, 28, '2025-08', 'Di lam dung gio', '2025-12-04 00:39:41', '2025-12-04 00:39:41'),
(15, 1, 5, 13, 8, '2025-08', 'Di lam dung gio', '2025-12-04 00:39:41', '2025-12-04 00:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', 'Apple Inc. là một tập đoàn công nghệ nổi tiếng với các sản phẩm như iPhone, iPad, MacBook và Apple Watch.', 'upload/manufacturers/apple.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(2, 'Samsung', 'samsung', 'Samsung là công ty công nghệ hàng đầu Hàn Quốc, nổi tiếng với điện thoại Galaxy, TV và laptop.', 'upload/manufacturers/samsung.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(3, 'Dell', 'dell', 'Dell chuyên sản xuất máy tính xách tay, máy tính để bàn và thiết bị văn phòng chất lượng cao.', 'upload/manufacturers/dell.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(4, 'HP', 'hp', 'HP (Hewlett-Packard) là thương hiệu máy tính lâu đời, nổi tiếng với laptop và máy in.', 'upload/manufacturers/hp.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(5, 'Asus', 'asus', 'Asus là hãng máy tính Đài Loan nổi tiếng với dòng laptop gaming và bo mạch chủ.', 'upload/manufacturers/asus.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(6, 'Lenovo', 'lenovo', 'Lenovo là tập đoàn công nghệ Trung Quốc, nổi bật với dòng laptop ThinkPad và IdeaPad.', 'upload/manufacturers/lenovo.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(7, 'Xiaomi', 'xiaomi', 'Xiaomi nổi tiếng với điện thoại giá rẻ cấu hình mạnh, cùng nhiều thiết bị điện tử thông minh.', 'upload/manufacturers/xiaomi.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(8, 'Huawei', 'huawei', 'Huawei là tập đoàn công nghệ Trung Quốc với thế mạnh trong lĩnh vực smartphone và thiết bị mạng.', 'upload/manufacturers/huawei.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(10, 'Acer', 'acer', 'Acer là hãng máy tính nổi tiếng với sản phẩm laptop và màn hình giá rẻ, hiệu năng tốt.', 'upload/manufacturers/acer.png', '2025-11-07 17:39:09', '2025-11-07 17:39:09'),
(11, 'ssss', 'oppo', 'OPPO là thương hiệu điện thoại đến từ Trung Quốc, nổi tiếng với các sản phẩm chú trọng vào thiết kế trẻ trung, camera chất lượng cao.', 'upload/manufacturers/1764809178-6930d9da9e495.png', '2025-11-07 17:45:48', '2025-12-04 00:46:18'),
(13, 'Sony', 'sony', 'Sony là tập đoàn đa quốc gia của Nhật Bản, nổi tiếng toàn cầu về sản xuất điện tử tiêu dùng với các sản phẩm đột phá như tivi, điện thoại, máy ảnh.', 'upload/manufacturers/sony.png', '2025-11-08 01:02:34', '2025-11-08 01:02:34'),
(14, 'Logitech', 'logitech', 'Logitech là công ty đa quốc gia của Thụy Sĩ, chuyên sản xuất các thiết bị ngoại vi máy tính như chuột, bàn phím, webcam và thiết bị âm thanh', 'upload/manufacturers/logitech.png', '2025-11-08 01:05:48', '2025-11-08 01:05:48'),
(15, 'Anker', 'anker', 'Anker là thương hiệu phụ kiện điện tử của Trung Quốc, chuyên sản xuất các giải pháp sạc thông minh và thiết bị di động', 'upload/manufacturers/anker.png', '2025-11-08 01:07:20', '2025-11-08 01:07:20'),
(23, 'aaa', 'aaa', 'aaaa', 'upload/manufacturers/1764809149_6930d9bd30359.jpg', '2025-12-04 00:45:49', '2025-12-04 00:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_10_03_031556_create_roles_table', 1),
(2, '2025_10_03_031654_create_permissions_table', 1),
(3, '2025_10_03_031734_create_role_permissions_table', 1),
(4, '2025_10_03_031745_create_users_table', 1),
(5, '2025_10_03_032310_create_categories_table', 1),
(6, '2025_10_03_032326_create_products_table', 1),
(7, '2025_10_03_032338_create_products_images_table', 1),
(8, '2025_10_03_032418_create_shipping_addresses_table', 1),
(9, '2025_10_03_032439_create_orders_table', 1),
(10, '2025_10_03_032450_create_orders_items_table', 1),
(11, '2025_10_03_032506_create_payments_table', 1),
(12, '2025_10_03_032522_create_wishlists_table', 1),
(13, '2025_10_03_032550_create_reviews_table', 1),
(14, '2025_10_03_032601_create_notifications_table', 1),
(15, '2025_10_03_032615_create_contacts_table', 1),
(16, '2025_10_03_032643_create_order_status_histories_table', 1),
(17, '2025_10_03_032847_create_cart_items_table', 1),
(18, '2025_10_03_032922_create_password_reset_tokens_table', 1),
(19, '2025_10_04_145754_create_sessions_table', 2),
(20, '2025_11_07_230331_create_manufacturers_table', 3),
(21, '2025_11_07_230724_add_specs_to_products_table', 4),
(22, '2025_11_08_003257_add_manufacturer_id_to_products_table', 5),
(24, '2025_11_11_085431_update_status_enum_in_payments_table', 6),
(25, '2025_12_01_074515_create_kpi_criteria_table', 6),
(26, '2025_12_01_074632_create_kpi_scores_table', 6),
(27, '2025_12_01_090630_create_kpi_bonus_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `type`, `message`, `link`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 'order', 'Có đơn đặt hàng từ DPQ', '/orders', 1, '2025-11-24 09:47:13', '2025-11-24 12:07:54'),
(2, 1, 'contact', 'Có liên hệ từ DPQ', '/contacts', 1, '2025-11-24 09:47:13', '2025-11-24 12:08:12'),
(3, 1, 'order', 'Có đơn đặt hàng từ DPQ', '/orders', 0, '2025-11-24 09:47:13', '2025-11-24 09:47:18'),
(4, 1, 'contact', 'Có liên hệ từ DPQ', '/contacts', 0, '2025-11-24 09:47:13', '2025-11-24 09:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_price` decimal(15,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `shipping_address_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `shipping_address_id`, `created_at`, `updated_at`) VALUES
(6, 12, 110985000.00, 'canceled', 1, '2025-11-11 01:25:31', '2025-11-16 04:18:52'),
(7, 12, 33015000.00, 'processing', 1, '2025-11-11 01:28:46', '2025-11-16 01:53:37'),
(8, 12, 50015000.00, 'completed', 1, '2025-11-11 04:01:03', '2025-11-11 04:01:40'),
(9, 12, 30015000.00, 'canceled', 1, '2025-11-12 14:22:00', '2025-11-16 01:51:44'),
(10, 12, 30015000.00, 'pending', 1, '2025-11-28 04:21:34', '2025-11-28 04:21:34'),
(11, 12, 26000.00, 'pending', 1, '2025-11-28 04:24:22', '2025-11-28 04:24:22'),
(12, 12, 26000.00, 'pending', 1, '2025-11-28 04:29:14', '2025-11-28 04:29:14'),
(13, 12, 26000.00, 'pending', 1, '2025-11-28 04:35:37', '2025-11-28 04:35:37'),
(14, 12, 26000.00, 'pending', 1, '2025-11-28 04:36:05', '2025-11-28 04:36:05'),
(15, 12, 26000.00, 'pending', 1, '2025-11-28 04:40:18', '2025-11-28 04:40:18'),
(16, 12, 26000.00, 'pending', 1, '2025-11-28 04:44:52', '2025-11-28 04:44:52'),
(17, 12, 26000.00, 'pending', 1, '2025-11-28 04:44:55', '2025-11-28 04:44:55'),
(18, 12, 26000.00, 'pending', 1, '2025-11-28 04:49:33', '2025-11-28 04:49:33'),
(19, 12, 26000.00, 'pending', 1, '2025-11-28 04:49:53', '2025-11-28 04:49:53'),
(20, 12, 26000.00, 'pending', 1, '2025-11-28 04:51:08', '2025-11-28 04:51:08'),
(21, 12, 26000.00, 'pending', 1, '2025-11-28 04:51:43', '2025-11-28 04:51:43'),
(22, 12, 26000.00, 'pending', 1, '2025-11-28 04:53:47', '2025-11-28 04:53:47'),
(23, 12, 26000.00, 'pending', 1, '2025-11-28 04:56:19', '2025-11-28 04:56:19'),
(24, 12, 26000.00, 'pending', 1, '2025-11-28 04:56:38', '2025-11-28 04:56:38'),
(25, 12, 26000.00, 'pending', 1, '2025-11-28 04:57:50', '2025-11-28 04:57:50'),
(26, 12, 26000.00, 'pending', 1, '2025-11-28 04:59:54', '2025-11-28 04:59:54'),
(27, 12, 26000.00, 'pending', 1, '2025-11-28 05:02:28', '2025-11-28 05:02:28'),
(28, 12, 26000.00, 'pending', 1, '2025-11-28 05:04:09', '2025-11-28 05:04:09'),
(29, 12, 26000.00, 'pending', 1, '2025-11-28 05:04:13', '2025-11-28 05:04:13'),
(30, 12, 26000.00, 'pending', 1, '2025-11-28 05:04:14', '2025-11-28 05:04:14'),
(31, 12, 26000.00, 'pending', 1, '2025-11-28 05:04:15', '2025-11-28 05:04:15'),
(32, 12, 26000.00, 'pending', 1, '2025-11-28 05:04:20', '2025-11-28 05:04:20'),
(33, 12, 26000.00, 'pending', 1, '2025-11-28 05:06:55', '2025-11-28 05:06:55'),
(34, 12, 26000.00, 'pending', 1, '2025-11-28 05:08:47', '2025-11-28 05:08:47'),
(35, 12, 26000.00, 'pending', 1, '2025-11-28 05:08:56', '2025-11-28 05:08:56'),
(36, 12, 30016000.00, 'pending', 1, '2025-12-04 00:37:28', '2025-12-04 00:37:28'),
(37, 12, 30016000.00, 'pending', 1, '2025-12-04 00:37:34', '2025-12-04 00:37:34'),
(38, 12, 60005000.00, 'pending', 1, '2025-12-11 09:29:46', '2025-12-11 09:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(7, 6, 11, 2, 29990000.00, '2025-11-11 01:25:31', '2025-11-11 01:25:31'),
(8, 6, 13, 1, 31990000.00, '2025-11-11 01:25:31', '2025-11-11 01:25:31'),
(9, 6, 15, 1, 18990000.00, '2025-11-11 01:25:31', '2025-11-11 01:25:31'),
(10, 7, 12, 1, 32990000.00, '2025-11-11 01:28:46', '2025-11-11 01:28:46'),
(11, 8, 14, 1, 49990000.00, '2025-11-11 04:01:03', '2025-11-11 04:01:03'),
(12, 9, 11, 1, 29990000.00, '2025-11-12 14:22:00', '2025-11-12 14:22:00'),
(13, 10, 11, 1, 29990000.00, '2025-11-28 04:21:34', '2025-11-28 04:21:34'),
(14, 11, 36, 1, 1000.00, '2025-11-28 04:24:22', '2025-11-28 04:24:22'),
(15, 12, 36, 1, 1000.00, '2025-11-28 04:29:14', '2025-11-28 04:29:14'),
(16, 13, 36, 1, 1000.00, '2025-11-28 04:35:37', '2025-11-28 04:35:37'),
(17, 14, 36, 1, 1000.00, '2025-11-28 04:36:05', '2025-11-28 04:36:05'),
(18, 15, 36, 1, 1000.00, '2025-11-28 04:40:18', '2025-11-28 04:40:18'),
(19, 16, 36, 1, 1000.00, '2025-11-28 04:44:52', '2025-11-28 04:44:52'),
(20, 17, 36, 1, 1000.00, '2025-11-28 04:44:55', '2025-11-28 04:44:55'),
(21, 18, 36, 1, 1000.00, '2025-11-28 04:49:33', '2025-11-28 04:49:33'),
(22, 19, 36, 1, 1000.00, '2025-11-28 04:49:53', '2025-11-28 04:49:53'),
(23, 20, 36, 1, 1000.00, '2025-11-28 04:51:08', '2025-11-28 04:51:08'),
(24, 21, 36, 1, 1000.00, '2025-11-28 04:51:43', '2025-11-28 04:51:43'),
(25, 22, 36, 1, 1000.00, '2025-11-28 04:53:47', '2025-11-28 04:53:47'),
(26, 23, 36, 1, 1000.00, '2025-11-28 04:56:19', '2025-11-28 04:56:19'),
(27, 24, 36, 1, 1000.00, '2025-11-28 04:56:38', '2025-11-28 04:56:38'),
(28, 25, 36, 1, 1000.00, '2025-11-28 04:57:50', '2025-11-28 04:57:50'),
(29, 26, 36, 1, 1000.00, '2025-11-28 04:59:54', '2025-11-28 04:59:54'),
(30, 27, 36, 1, 1000.00, '2025-11-28 05:02:28', '2025-11-28 05:02:28'),
(31, 28, 36, 1, 1000.00, '2025-11-28 05:04:09', '2025-11-28 05:04:09'),
(32, 29, 36, 1, 1000.00, '2025-11-28 05:04:13', '2025-11-28 05:04:13'),
(33, 30, 36, 1, 1000.00, '2025-11-28 05:04:14', '2025-11-28 05:04:14'),
(34, 31, 36, 1, 1000.00, '2025-11-28 05:04:15', '2025-11-28 05:04:15'),
(35, 32, 36, 1, 1000.00, '2025-11-28 05:04:20', '2025-11-28 05:04:20'),
(36, 33, 36, 1, 1000.00, '2025-11-28 05:06:55', '2025-11-28 05:06:55'),
(37, 34, 36, 1, 1000.00, '2025-11-28 05:08:47', '2025-11-28 05:08:47'),
(38, 35, 36, 1, 1000.00, '2025-11-28 05:08:56', '2025-11-28 05:08:56'),
(39, 36, 36, 1, 1000.00, '2025-12-04 00:37:28', '2025-12-04 00:37:28'),
(40, 36, 11, 1, 29990000.00, '2025-12-04 00:37:28', '2025-12-04 00:37:28'),
(41, 37, 36, 1, 1000.00, '2025-12-04 00:37:34', '2025-12-04 00:37:34'),
(42, 37, 11, 1, 29990000.00, '2025-12-04 00:37:34', '2025-12-04 00:37:34'),
(43, 38, 11, 2, 29990000.00, '2025-12-11 09:29:46', '2025-12-11 09:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_histories`
--

CREATE TABLE `order_status_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','processing','shipped','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `changed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `payment_method` enum('cash','atm') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `status` enum('pending','processing','completed','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_method`, `transaction_id`, `amount`, `status`, `paid_at`, `created_at`, `updated_at`) VALUES
(1, 6, 'cash', NULL, 110985000.00, 'pending', NULL, '2025-11-11 01:25:31', '2025-11-11 01:25:31'),
(2, 7, 'cash', NULL, 33015000.00, 'pending', NULL, '2025-11-11 01:28:46', '2025-11-11 01:28:46'),
(3, 8, 'cash', NULL, 50015000.00, 'pending', NULL, '2025-11-11 04:01:03', '2025-11-11 04:01:03'),
(4, 9, 'cash', NULL, 30015000.00, 'pending', NULL, '2025-11-12 14:22:00', '2025-11-12 14:22:00'),
(5, 10, 'atm', NULL, 30015000.00, 'pending', NULL, '2025-11-28 04:21:34', '2025-11-28 04:21:34'),
(6, 11, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:24:22', '2025-11-28 04:24:22'),
(7, 12, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:29:14', '2025-11-28 04:29:14'),
(8, 13, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:35:37', '2025-11-28 04:35:37'),
(9, 14, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:36:05', '2025-11-28 04:36:05'),
(10, 15, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:40:18', '2025-11-28 04:40:18'),
(11, 16, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:44:52', '2025-11-28 04:44:52'),
(12, 17, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:44:55', '2025-11-28 04:44:55'),
(13, 18, 'cash', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:49:33', '2025-11-28 04:49:33'),
(14, 19, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:49:53', '2025-11-28 04:49:53'),
(15, 20, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:51:08', '2025-11-28 04:51:08'),
(16, 21, 'cash', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:51:43', '2025-11-28 04:51:43'),
(17, 22, 'cash', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:53:47', '2025-11-28 04:53:47'),
(18, 23, 'cash', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:56:19', '2025-11-28 04:56:19'),
(19, 24, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:56:38', '2025-11-28 04:56:38'),
(20, 25, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:57:50', '2025-11-28 04:57:50'),
(21, 26, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 04:59:54', '2025-11-28 04:59:54'),
(22, 27, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:02:28', '2025-11-28 05:02:28'),
(23, 28, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:04:09', '2025-11-28 05:04:09'),
(24, 29, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:04:13', '2025-11-28 05:04:13'),
(25, 30, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:04:14', '2025-11-28 05:04:14'),
(26, 31, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:04:15', '2025-11-28 05:04:15'),
(27, 32, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:04:20', '2025-11-28 05:04:20'),
(28, 33, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:06:55', '2025-11-28 05:06:55'),
(29, 34, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:08:47', '2025-11-28 05:08:47'),
(30, 35, 'atm', NULL, 26000.00, 'pending', NULL, '2025-11-28 05:08:56', '2025-11-28 05:08:56'),
(31, 36, 'atm', NULL, 30016000.00, 'pending', NULL, '2025-12-04 00:37:28', '2025-12-04 00:37:28'),
(32, 37, 'cash', NULL, 30016000.00, 'pending', NULL, '2025-12-04 00:37:34', '2025-12-04 00:37:34'),
(33, 38, 'cash', NULL, 60005000.00, 'pending', NULL, '2025-12-11 09:29:46', '2025-12-11 09:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'manage_users', '2025-10-16 19:53:55', '2025-10-16 19:53:55'),
(2, 'manage_products', '2025-10-16 19:53:55', '2025-10-16 19:53:55'),
(3, 'manage_orders', '2025-10-16 19:53:55', '2025-10-16 19:53:55'),
(4, 'manage_categories', '2025-10-16 19:53:55', '2025-10-16 19:53:55'),
(5, 'manage_contacts', '2025-10-16 19:53:55', '2025-10-16 19:53:55'),
(6, 'manage_manufacturers', NULL, NULL),
(7, 'manage_kpi', '2025-12-01 00:56:50', '2025-12-01 00:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `gpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitor_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitor_resolution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isArrival` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_stock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manufacturer_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `description`, `gpu`, `cpu`, `ram`, `rom`, `connection_port`, `camera`, `battery`, `monitor_size`, `monitor_resolution`, `isArrival`, `price`, `stock`, `status`, `created_at`, `updated_at`, `manufacturer_id`) VALUES
(11, 'iPhone 15 Pro', 'iphone-15-pro_1764118259', 1, 'Flagship smartphone from Apple with A17 Pro chip.', 'Apple GPU 6-core', 'A17 Pro Hexa-core', '6GB', '6GB', 'USB-C', 'Apple GPU 6-core', 'Apple GPU 6-core', '6.1 inch', '2556x1179', 1, 29990000.00, 8, 'in_stock', '2025-11-07 17:24:28', '2025-12-11 09:29:46', 1),
(12, 'Samsung Galaxy S24 Ultra', 'samsung-galaxy-s24-ultra_1764118447', 1, 'High-end Android phone with S Pen and AI features.', 'Adreno 750', 'Snapdragon 8 Gen 3', '12GB', '12GB', 'USB-C', '200MP + 12MP + 10MP', '5000mAh', '6.8 inch', '3088x1440', 1, 32990000.00, 6, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 00:54:07', 2),
(13, 'MacBook Air M3 2025', 'macbook-air-m3-2025_1764118926', 2, 'Lightweight laptop with Apple M3 chip and Retina display.', 'Integrated 10-core GPU', 'Apple M3 8-core', '16GB', '16GB', '2x Thunderbolt 4, MagSafe 3', '1080p FaceTime HD', '52.6Wh', '13.6 inch', '2560x1664', 1, 31990000.00, 10, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:02:06', 1),
(14, 'ASUS ROG Zephyrus G16', 'asus-rog-zephyrus-g16_1764119136', 2, 'Gaming laptop with RTX 4070 GPU and Intel Core i9.', 'NVIDIA RTX 4070 8GB', 'Intel Core i9-13900H', '32GB', '32GB', 'USB-C, HDMI, Ethernet', 'FHD 1080p', '90Wh', '16 inch', '2560x1600', 0, 49990000.00, 2, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:05:36', 5),
(15, 'iPad Air M2', 'ipad-air-m2_1764119339', 3, 'Apple iPad Air powered by M2 chip for work and entertainment.', 'Apple GPU 10-core', 'Apple M2', '8GB', '8GB', 'USB-C', '12MP Wide', '28.6Wh', '10.9 inch', '2360x1640', 0, 18990000.00, 8, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:08:59', 1),
(16, 'Samsung Galaxy Tab S9 Ultra', 'samsung-galaxy-tab-s9-ultra_1764119550', 3, 'Large AMOLED tablet with S Pen and IP68 water resistance.', 'Adreno 740', 'Snapdragon 8 Gen 2', '12GB', '12GB', 'USB-C 3.2', '13MP + 8MP', '11200mAh', '14.6 inch', '2960x1848', 0, 27990000.00, 4, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:12:30', 2),
(17, 'Apple Watch Series 10', 'apple-watch-series-10_1764119662', 4, 'Smartwatch with health sensors and improved display.', 'Apple GPU', 'S10 Dual-core', '2GB', '2GB', 'Wireless charging', NULL, '308mAh', '2 inch', '410x502', 1, 13990000.00, 12, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:14:22', 1),
(18, 'AirPods Pro 2', 'airpods-pro-2_1764119819', 4, 'Wireless earbuds with ANC and MagSafe charging.', 'Apple H2 chip', 'Apple H2', NULL, NULL, 'Lightning / MagSafe', NULL, '6 hours (earbuds)', NULL, NULL, 0, 6990000.00, 15, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:16:59', 1),
(19, 'Logitech MX Master 4S', 'logitech-mx-master-4s_1764120036', 4, 'Ergonomic wireless mouse for productivity and creators.', NULL, NULL, NULL, NULL, 'USB-C charging', NULL, '70 days per charge', NULL, NULL, 0, 2990000.00, 9, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:20:36', 14),
(20, 'Anker 737 Power Bank', 'anker-737-power-bank_1764120108', 4, 'Powerful 140W USB-C power bank supporting PD 3.1.', NULL, NULL, NULL, NULL, 'USB-C x2, USB-A x1', NULL, '24000mAh', NULL, NULL, 0, 4990000.00, 0, 'in_stock', '2025-11-07 17:24:28', '2025-11-26 01:21:48', 15),
(21, 'iPhone 16', 'iphone-16_1764120239', 1, 'Next-generation iPhone 16 with A18 chip and improved battery life.', 'Apple GPU 6-core', 'A18 Hexa-core', '8GB', '8GB', 'USB-C', '48MP + 12MP', '3300mAh', '6.1 inch', '2556x1179', 1, 32990000.00, 12, 'in_stock', '2025-11-08 07:59:57', '2025-11-26 01:23:59', 1),
(22, 'iPhone 16 Pro', 'iphone-16-pro_1764120716', 1, 'iPhone 16 Pro with A18 Pro chip, top-tier performance.', 'Apple GPU 6-core', 'A18 Pro Hexa-core', '8GB', '8GB', 'USB-C', '48MP + 12MP + 12MP', '3400mAh', '6.1 inch', '2556x1179', 1, 39990000.00, 10, 'in_stock', '2025-11-08 07:59:57', '2025-11-26 01:31:56', 1),
(23, 'iPhone 17', 'iphone-17_1764120836', 1, 'Future iPhone 17 with A19 chip, ultimate performance and camera system.', 'Apple GPU 7-core', 'A19 Hexa-core', '12GB', '12GB', 'USB-C', '48MP + 12MP + 12MP + LiDAR', '3500mAh', '6.2 inch', '2592x1200', 1, 49990000.00, 8, 'in_stock', '2025-11-08 07:59:57', '2025-11-26 01:33:56', 1),
(36, 'sp test', 'sp-test_1764303809', 1, 'Danh muc test', 'Danh muc test', 'Danh muc test', '124bb', '124bb', '124bb', '124bb', '124bb', '124bb', '124bb', 1, 1000.00, 983, 'in_stock', '2025-11-28 04:23:29', '2025-12-04 00:37:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(33, 11, 'upload/products/1764118259_69264ef381d5e.png', '2025-11-26 00:50:59', '2025-11-26 00:50:59'),
(34, 11, 'upload/products/1764118259_69264ef3a424f.png', '2025-11-26 00:50:59', '2025-11-26 00:50:59'),
(35, 11, 'upload/products/1764118259_69264ef3bc415.png', '2025-11-26 00:50:59', '2025-11-26 00:50:59'),
(36, 12, 'upload/products/1764118447_69264faf2860a.png', '2025-11-26 00:54:07', '2025-11-26 00:54:07'),
(37, 12, 'upload/products/1764118447_69264faf3f7a0.png', '2025-11-26 00:54:07', '2025-11-26 00:54:07'),
(38, 12, 'upload/products/1764118447_69264faf551cf.png', '2025-11-26 00:54:07', '2025-11-26 00:54:07'),
(39, 13, 'upload/products/1764118926_6926518e3c9ee.jpg', '2025-11-26 01:02:06', '2025-11-26 01:02:06'),
(40, 13, 'upload/products/1764118926_6926518e4c16a.jpg', '2025-11-26 01:02:06', '2025-11-26 01:02:06'),
(41, 13, 'upload/products/1764118926_6926518e6cc68.jpg', '2025-11-26 01:02:06', '2025-11-26 01:02:06'),
(42, 14, 'upload/products/1764119136_692652600a54e.jpg', '2025-11-26 01:05:36', '2025-11-26 01:05:36'),
(43, 14, 'upload/products/1764119136_6926526018c28.jpg', '2025-11-26 01:05:36', '2025-11-26 01:05:36'),
(44, 14, 'upload/products/1764119136_6926526023508.jpg', '2025-11-26 01:05:36', '2025-11-26 01:05:36'),
(45, 14, 'upload/products/1764119136_692652602d4b2.jpg', '2025-11-26 01:05:36', '2025-11-26 01:05:36'),
(46, 15, 'upload/products/1764119339_6926532bdabb5.png', '2025-11-26 01:09:00', '2025-11-26 01:09:00'),
(47, 15, 'upload/products/1764119340_6926532c0b671.png', '2025-11-26 01:09:00', '2025-11-26 01:09:00'),
(48, 15, 'upload/products/1764119340_6926532c177b9.png', '2025-11-26 01:09:00', '2025-11-26 01:09:00'),
(49, 16, 'upload/products/1764119550_692653fe2c9f1.jpg', '2025-11-26 01:12:30', '2025-11-26 01:12:30'),
(50, 16, 'upload/products/1764119550_692653fe3cd2b.jpg', '2025-11-26 01:12:30', '2025-11-26 01:12:30'),
(51, 16, 'upload/products/1764119550_692653fe48bac.jpg', '2025-11-26 01:12:30', '2025-11-26 01:12:30'),
(52, 17, 'upload/products/1764119662_6926546ee9c24.png', '2025-11-26 01:14:23', '2025-11-26 01:14:23'),
(53, 17, 'upload/products/1764119663_6926546f11e8b.png', '2025-11-26 01:14:23', '2025-11-26 01:14:23'),
(54, 17, 'upload/products/1764119663_6926546f212b9.png', '2025-11-26 01:14:23', '2025-11-26 01:14:23'),
(55, 17, 'upload/products/1764119663_6926546f3085c.png', '2025-11-26 01:14:23', '2025-11-26 01:14:23'),
(56, 18, 'upload/products/1764119819_6926550bda20a.jpg', '2025-11-26 01:16:59', '2025-11-26 01:16:59'),
(57, 18, 'upload/products/1764119819_6926550be7eba.jpg', '2025-11-26 01:17:00', '2025-11-26 01:17:00'),
(58, 18, 'upload/products/1764119820_6926550c01df7.jpg', '2025-11-26 01:17:00', '2025-11-26 01:17:00'),
(59, 19, 'upload/products/1764120036_692655e48c64d.jpg', '2025-11-26 01:20:36', '2025-11-26 01:20:36'),
(60, 19, 'upload/products/1764120036_692655e49f0fa.jpg', '2025-11-26 01:20:36', '2025-11-26 01:20:36'),
(61, 19, 'upload/products/1764120036_692655e4b73f3.jpg', '2025-11-26 01:20:36', '2025-11-26 01:20:36'),
(62, 20, 'upload/products/1764120108_6926562cc7eab.png', '2025-11-26 01:21:48', '2025-11-26 01:21:48'),
(63, 20, 'upload/products/1764120108_6926562ce4b7e.png', '2025-11-26 01:21:49', '2025-11-26 01:21:49'),
(64, 20, 'upload/products/1764120109_6926562d101c8.png', '2025-11-26 01:21:49', '2025-11-26 01:21:49'),
(65, 21, 'upload/products/1764120239_692656afaf244.jpg', '2025-11-26 01:23:59', '2025-11-26 01:23:59'),
(66, 21, 'upload/products/1764120239_692656afc1590.jpg', '2025-11-26 01:23:59', '2025-11-26 01:23:59'),
(67, 21, 'upload/products/1764120239_692656afcf689.jpg', '2025-11-26 01:23:59', '2025-11-26 01:23:59'),
(68, 21, 'upload/products/1764120239_692656afdda4b.jpg', '2025-11-26 01:23:59', '2025-11-26 01:23:59'),
(69, 22, 'upload/products/1764120716_6926588c9698f.jpg', '2025-11-26 01:31:56', '2025-11-26 01:31:56'),
(70, 22, 'upload/products/1764120716_6926588caea6d.jpg', '2025-11-26 01:31:56', '2025-11-26 01:31:56'),
(71, 22, 'upload/products/1764120716_6926588cbd41e.jpg', '2025-11-26 01:31:56', '2025-11-26 01:31:56'),
(72, 23, 'upload/products/1764120836_692659041730e.jpg', '2025-11-26 01:33:56', '2025-11-26 01:33:56'),
(73, 23, 'upload/products/1764120836_6926590424707.jpg', '2025-11-26 01:33:56', '2025-11-26 01:33:56'),
(74, 36, 'upload/products/1764303809_692923c1175df.jpg', '2025-11-28 04:23:29', '2025-11-28 04:23:29'),
(75, 36, 'upload/products/1764303809_692923c1301b4.png', '2025-11-28 04:23:29', '2025-11-28 04:23:29'),
(76, 36, 'upload/products/1764303809_692923c15e106.png', '2025-11-28 04:23:29', '2025-11-28 04:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 12, 14, 5, 'test', '2025-11-11 08:23:45', '2025-11-11 08:23:45'),
(2, 12, 14, 4, 'test 2', '2025-11-11 08:53:51', '2025-11-11 08:53:51'),
(3, 12, 14, 5, 'test 3', '2025-11-11 08:54:21', '2025-11-11 08:54:21'),
(4, 12, 14, 5, 'Test 4', '2025-11-11 08:54:56', '2025-11-11 08:54:56'),
(5, 12, 14, 5, 'Test 4', '2025-11-11 08:55:22', '2025-11-11 08:55:22'),
(6, 12, 14, 5, 'Test 5', '2025-11-11 08:56:23', '2025-11-11 08:56:23'),
(7, 12, 11, 3, 'Test', '2025-11-11 11:14:07', '2025-11-11 11:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-10-16 19:53:55', '2025-10-16 19:53:55'),
(2, 'staff', '2025-10-16 19:53:55', '2025-10-16 19:53:55'),
(3, 'customer', '2025-10-16 19:53:55', '2025-10-16 19:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(2, 2, NULL, NULL),
(2, 5, NULL, NULL),
(1, 6, NULL, NULL),
(1, 7, '2025-12-01 00:57:25', '2025-12-01 00:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4Is3sdaPvXbdPJaEFBInRhkM49MRRM8qet0P2iIV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV0puV3p2V3hjTlRKam9MOVBqdERCUVlVQmdGcHRKSEN2Rzk3ckNEayI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMjoiaHR0cDovL3F1YW5seXNob3AudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7fQ==', 1764771351),
('OfvZMxPXa4TW6ryGpQ8NcFv47Kcq1OLeXLs5ZRoG', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiY09VZGxERXlubXFRMEZ5UTdjRG10OXpaNmFSMUphbms5aTdzUnJUMCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cDovL3F1YW5seXNob3AudGVzdC9hZG1pbi9wcm9kdWN0L2FkZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO3M6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7fQ==', 1764809203),
('SAFjzuQSeMHpVmRPHTfy7UkX4wfIp6CZVDRSTuWX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV015YkpVVTkycjZYd0JBd3lONE5qSW1sbThTaEU1ZEhFaUY5SnlLZyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cDovL3F1YW5seXNob3AudGVzdC9hZG1pbi9wcm9kdWN0L2FkZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7fQ==', 1764558307),
('vbcoUyV1VvvdRVxoVsnJQb17CBwmnxhGwz5UFSYI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic0N1TVViN3EyemJZSE5XVXZXYUJMSzhzRjRaY2FTUHkxSVZNTnNvNyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovL3F1YW5seXNob3AudGVzdC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO30=', 1764642280),
('ybVoyjXOg3esRmYviGKUTTdfqtes2LS8yCLRku9X', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNHl4eWtaTVltRzBUamlFbU04VjRnZWM3clNmaFpzdlRkY0NZQ1RNbSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cDovL3F1YW5seXNob3AudGVzdC9hY2NvdW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7fQ==', 1765445386);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `user_id`, `full_name`, `phone`, `address`, `city`, `default`, `created_at`, `updated_at`) VALUES
(1, 12, 'Nguyễn Phước Thọ', '0933315937', '984 23/10 street', 'Vinh Thanh, Nha Trang', 1, '2025-11-06 19:55:45', '2025-11-07 04:45:09'),
(3, 12, 'Nguyễn Phước Thọ', '0367137145', '984 2/4 street', 'Vinh Thanh, Bac Nha Trang', 0, '2025-11-06 20:59:38', '2025-11-07 04:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','active','banned','deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role_id` bigint UNSIGNED NOT NULL,
  `activation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `phone_number`, `avatar`, `address`, `role_id`, `activation_token`, `google_id`, `created_at`, `updated_at`) VALUES
(1, 'Duong Phu Quang', 'nguyenvana@example.com', '$2y$12$M3hs8r8Fo1BzawjsUcbaK.6NkHhuegEp1uKkNVYc4ng17xw65.lou', 'pending', '0123456789', '', 'KhanhHoa, Vietnam', 2, NULL, NULL, '2025-10-16 20:04:18', '2025-11-14 04:58:32'),
(2, 'Mai Ngoc Hoang Long', 'tranthib@example.com', '$2y$12$Y059tK59n7A5ipVepjE0yeGwXP1aP8x775s4z6lwzpkODWDC.W/Sa', 'pending', '0987654321', '', 'Gia Lai, Vietnam', 2, NULL, NULL, '2025-10-16 20:04:18', '2025-10-16 20:04:18'),
(3, 'Pham Gia Huy', 'minhdien@example.com', '$2y$12$7LqdRMl2PbUUpjErzyHrlONtN6G.Q.9ey3GiIYBAKE/ABrGWpy44K', 'pending', '0987612345', '', 'Ho Chi Minh City, Vietnam', 2, NULL, NULL, '2025-10-16 20:04:18', '2025-11-14 04:41:21'),
(4, 'Admin User', 'admin@example.com', '$2y$12$QS8Qd1ijaZ4U4kMaJ1F5ZORqWMshDHv5UyMJYeZ7LPKKvpeZtY1PG', 'active', '0999999999', '', 'BR-VT, Vietnam', 1, NULL, NULL, '2025-10-16 20:04:18', '2025-10-16 20:04:18'),
(5, 'Staff User', 'staff@example.com', '$2y$12$9RbOCmV/3MogAvt8bmHyougWjPA6.wRTezO8lxCMIp4KxYx0i.Vb.', 'active', '0888888888', '', 'Ha Noi, Vietnam', 2, NULL, NULL, '2025-10-16 20:04:19', '2025-10-16 20:04:19'),
(7, 'cvb', 'nphuoctho@gmail.com', '$2y$12$3bQL6ALj.1xQ41dMxFzwA.gbb.XzEerfDbDPZ42naADpCZjDvD0fu', 'pending', NULL, NULL, NULL, 2, 'xJNjjzl0fy4eouFLcWePb6qd9Ws6B0JRvdUjuIcFKf4cKzCuuHa1SMDlcjXUUCZA', NULL, '2025-11-05 18:25:57', '2025-11-14 04:43:09'),
(12, 'Nguyễn Phước Thọ', 'tho.np.64cntt@ntu.edu.vn', '$2y$12$6Lo/OGz2gWikk2cRPDMZb.FHYnaV/cmlYJMZgobXlRroecDe0HWdq', 'active', '0367137145', NULL, '984 23/10 street', 3, NULL, NULL, '2025-11-05 20:17:57', '2025-11-06 17:45:43'),
(13, 'admin', 'nphuoctho2406@gmail.com', '$2y$12$HWt18LIFo9DaV640Rwu/JOlKz5MHlutoAy7vgKh91MMi8/4p/1hrK', 'active', '0367137141', 'upload/users/1763342851_691a7a037a4f7.jpg', '984 đường', 1, NULL, NULL, '2025-11-13 01:42:20', '2025-11-17 01:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 12, 12, '2025-11-12 03:10:25', '2025-11-12 03:10:25'),
(7, 12, 13, '2025-11-12 03:10:41', '2025-11-12 03:10:41'),
(8, 12, 11, '2025-12-04 00:37:02', '2025-12-04 00:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi_bonuses`
--
ALTER TABLE `kpi_bonuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kpi_bonus_user_id_foreign` (`user_id`);

--
-- Indexes for table `kpi_criteria`
--
ALTER TABLE `kpi_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi_scores`
--
ALTER TABLE `kpi_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kpi_scores_user_id_foreign` (`user_id`),
  ADD KEY `kpi_scores_criteria_id_foreign` (`criteria_id`),
  ADD KEY `kpi_scores_rated_by_foreign` (`rated_by`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manufacturers_name_unique` (`name`),
  ADD UNIQUE KEY `manufacturers_slug_unique` (`slug`);

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
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shipping_address_id_foreign` (`shipping_address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_status_histories`
--
ALTER TABLE `order_status_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_histories_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_manufacturer_id_foreign` (`manufacturer_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kpi_bonuses`
--
ALTER TABLE `kpi_bonuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kpi_criteria`
--
ALTER TABLE `kpi_criteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kpi_scores`
--
ALTER TABLE `kpi_scores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_status_histories`
--
ALTER TABLE `order_status_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kpi_bonuses`
--
ALTER TABLE `kpi_bonuses`
  ADD CONSTRAINT `kpi_bonus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kpi_scores`
--
ALTER TABLE `kpi_scores`
  ADD CONSTRAINT `kpi_scores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `kpi_criteria` (`id`),
  ADD CONSTRAINT `kpi_scores_rated_by_foreign` FOREIGN KEY (`rated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kpi_scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_address_id_foreign` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status_histories`
--
ALTER TABLE `order_status_histories`
  ADD CONSTRAINT `order_status_histories_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
