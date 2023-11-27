-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 07:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `street_number` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'JJ', '2023-06-13 12:26:15', '2023-06-13 12:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_095049_create_roles_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_27_090023_create_users_table', 1),
(6, '2023_05_27_092908_create_country_table', 1),
(7, '2023_05_27_092928_create_address_table', 1),
(8, '2023_05_27_092946_create_user_address_table', 1),
(9, '2023_05_27_131924_create_payment_type_table', 1),
(10, '2023_05_27_132012_create_user_payment_method_table', 1),
(11, '2023_05_27_141355_product_category_table', 1),
(12, '2023_05_27_142322_product_variation_table', 1),
(13, '2023_05_27_142552_product_variation_options_table', 1),
(14, '2023_05_27_145254_products_table', 1),
(15, '2023_05_27_150132_product_item_table', 1),
(16, '2023_05_27_151342_products_configuration', 1),
(17, '2023_05_27_152736_create_shopping_cart_table', 1),
(19, '2023_05_27_153353_create_shipping_method_table', 1),
(20, '2023_05_27_153409_create_order_status_table', 1),
(21, '2023_05_27_153624_create_shop_order_table', 1),
(22, '2023_05_27_161628_create_shop_order_line_table', 1),
(23, '2023_06_13_121458_create_brands_table', 2),
(24, '2023_06_13_121326_create_new_products_table', 3),
(25, '2023_06_13_140219_create_product_images_table', 4),
(26, '2023_05_27_152937_create_shopping_cart_items_table', 5),
(27, '2023_06_13_214817_create_user_sizes_table', 6),
(28, '2023_06_18_100828_create_my_whishlist_table', 7),
(29, '2023_06_18_172546_create_shop_order_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `my_whishlist`
--

CREATE TABLE `my_whishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_products`
--

CREATE TABLE `new_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `sku` varchar(255) NOT NULL,
  `qty_in_stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_products`
--

INSERT INTO `new_products` (`id`, `category_id`, `brand_id`, `product_name`, `short_description`, `long_description`, `sku`, `qty_in_stock`, `price`, `created_at`, `updated_at`) VALUES
(10, 11, 1, 'AMBER-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '5e32', 5, 2000, '2023-06-18 16:25:25', '2023-06-18 16:25:25'),
(11, 11, 1, 'CASCADES-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '34', 5, 1500, '2023-06-18 16:27:39', '2023-06-18 16:27:39'),
(12, 12, 1, 'CEDAR-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '31241', 5, 1700, '2023-06-18 16:28:59', '2023-06-18 16:28:59'),
(13, 12, 1, 'CHARCOAL-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '32423', 6, 2100, '2023-06-18 16:29:53', '2023-06-18 16:29:53'),
(14, 13, 1, 'CHOCO-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '324324', 6, 2800, '2023-06-18 16:31:12', '2023-06-18 16:31:12'),
(15, 13, 1, 'DARBAAR', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '234324', 8, 3300, '2023-06-18 16:32:13', '2023-06-18 16:32:13'),
(16, 13, 1, 'ESPRESSO-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '3224', 3, 1100, '2023-06-18 16:33:08', '2023-06-18 16:33:08'),
(17, 14, 1, 'H-GLASS-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '32432', 4, 1599, '2023-06-18 16:36:13', '2023-06-18 16:36:13'),
(18, 14, 1, 'IRON-ORE-BLENDED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', '343', 6, 1999, '2023-06-18 16:36:59', '2023-06-18 16:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_category_image` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `parent_category_id`, `product_category_image`, `category_name`, `created_at`, `updated_at`) VALUES
(11, NULL, '/product_category_images/1687122978_Cotton Fabrics.png', 'Cotton Fabrics', '2023-06-18 16:16:18', '2023-06-18 16:16:18'),
(12, NULL, '/product_category_images/1687123020_Blended Fabrics.png', 'Blended Fabrics', '2023-06-18 16:17:00', '2023-06-18 16:17:00'),
(13, NULL, '/product_category_images/1687123033_Cotton Regular.png', 'Cotton Regular', '2023-06-18 16:17:13', '2023-06-18 16:17:13'),
(14, NULL, '/product_category_images/1687123047_Tropical Fabrics.png', 'Tropical Fabrics', '2023-06-18 16:17:27', '2023-06-18 16:17:27'),
(15, NULL, '/product_category_images/1687123073_Zayir.png', 'Zayir', '2023-06-18 16:17:53', '2023-06-18 16:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_configuration`
--

CREATE TABLE `product_configuration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_item_id` bigint(20) UNSIGNED NOT NULL,
  `variation_option_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`, `created_at`, `updated_at`) VALUES
(10, 10, '[\"1687123524-1.png\",\"1687123524-AMBER-BLENDED (1).png\",\"1687123524-AMBER-BLENDED (2).png\",\"1687123524-AMBER-BLENDED (3).png\",\"1687123524-AMBER-BLENDED (4).png\"]', '2023-06-18 16:25:25', '2023-06-18 16:25:25'),
(11, 11, '[\"1687123659-1.png\",\"1687123659-CASCADES-BLENDED (1).png\",\"1687123659-CASCADES-BLENDED (2).png\",\"1687123659-CASCADES-BLENDED (3).png\",\"1687123659-CASCADES-BLENDED (4).png\"]', '2023-06-18 16:27:39', '2023-06-18 16:27:39'),
(12, 12, '[\"1687123739-1.png\",\"1687123739-CEDAR-BLENDED (1).png\",\"1687123739-CEDAR-BLENDED (2).png\",\"1687123739-CEDAR-BLENDED (3).png\",\"1687123739-CEDAR-BLENDED (4).png\"]', '2023-06-18 16:28:59', '2023-06-18 16:28:59'),
(13, 13, '[\"1687123793-1.png\",\"1687123793-CHARCOAL-BLENDED (1).png\",\"1687123793-CHARCOAL-BLENDED (2).png\",\"1687123793-CHARCOAL-BLENDED (3).png\",\"1687123793-CHARCOAL-BLENDED (4).png\"]', '2023-06-18 16:29:53', '2023-06-18 16:29:53'),
(14, 14, '[\"1687123872-1.png\",\"1687123872-CHOCO-BLENDED (1).png\",\"1687123872-CHOCO-BLENDED (2).png\",\"1687123872-CHOCO-BLENDED (3).png\",\"1687123872-CHOCO-BLENDED (4).png\"]', '2023-06-18 16:31:12', '2023-06-18 16:31:12'),
(15, 15, '[\"1687123933-1.png\",\"1687123933-DARBAAR (1).png\",\"1687123933-DARBAAR (2).png\",\"1687123933-DARBAAR (3).png\",\"1687123933-DARBAAR (4).png\"]', '2023-06-18 16:32:13', '2023-06-18 16:32:13'),
(16, 16, '[\"1687123987-1.png\",\"1687123987-ESPRESSO-BLENDED (1).png\",\"1687123987-ESPRESSO-BLENDED (2).png\",\"1687123987-ESPRESSO-BLENDED (3).png\",\"1687123987-ESPRESSO-BLENDED (4).png\"]', '2023-06-18 16:33:08', '2023-06-18 16:33:08'),
(17, 17, '[\"1687124173-1.png\",\"1687124173-H-GLASS-BLENDED (1).png\",\"1687124173-H-GLASS-BLENDED (2).png\",\"1687124173-H-GLASS-BLENDED (3).png\",\"1687124173-H-GLASS-BLENDED (4).png\"]', '2023-06-18 16:36:13', '2023-06-18 16:36:13'),
(18, 18, '[\"1687124219-1.png\",\"1687124219-IRON-ORE-BLENDED (1).png\",\"1687124219-IRON-ORE-BLENDED (2).png\",\"1687124219-IRON-ORE-BLENDED (3).png\",\"1687124219-IRON-ORE-BLENDED (4).png\"]', '2023-06-18 16:36:59', '2023-06-18 16:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `qty_in_stock` int(11) DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `variation_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variation_options`
--

CREATE TABLE `product_variation_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL,
  `variation_option_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_method_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(18, 1, '2023-06-18 17:01:48', '2023-06-18 17:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_items`
--

CREATE TABLE `shopping_cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_cart_items`
--

INSERT INTO `shopping_cart_items` (`id`, `cart_id`, `product_item_id`, `qty`, `created_at`, `updated_at`) VALUES
(15, 18, 10, 8, '2023-06-18 17:01:48', '2023-06-18 17:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE `shop_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address` bigint(20) UNSIGNED NOT NULL,
  `shipping_method` bigint(20) UNSIGNED NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_line`
--

CREATE TABLE `shop_order_line` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_by` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_new`
--

CREATE TABLE `shop_order_new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` longtext NOT NULL,
  `total_price` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_type` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_order_new`
--

INSERT INTO `shop_order_new` (`id`, `user_id`, `products`, `total_price`, `name`, `email`, `phone`, `country`, `city`, `postal_code`, `permanent_address`, `shipping_address`, `shipping_type`, `order_status`, `created_at`, `updated_at`) VALUES
(2, 1, '[{\"1\":2,\"2\":1},{\"1\":5,\"2\":2}]', 9970, 'Admin', 'admin@admin.com', 12345, 'Pakistan', 'Karachi', '432423', 'asd sad as dsa dsa dsad', 'sfs ds sdf sdf', '-', 'ordered', '2023-06-18 14:00:28', '2023-06-18 14:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `avatar`, `phone_no`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', NULL, 12345, 'admin@admin.com', 'asd sad as dsa dsa dsad', NULL, '$2a$12$sgUK9zGplBUzaFggFjEJ0.0DiprDLk8vZYBDdgkFmIcjZbpNvbbRm', NULL, '2023-05-01 09:41:48', '2023-05-01 09:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_method`
--

CREATE TABLE `user_payment_method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) NOT NULL,
  `account_number` bigint(20) NOT NULL,
  `expiry_date` date NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-05-03 07:56:42', '2023-05-02 07:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_sizes`
--

CREATE TABLE `user_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `body_type` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fit` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_sizes`
--

INSERT INTO `user_sizes` (`id`, `user_id`, `body_type`, `height`, `size`, `type`, `fit`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'athletic', '5', '5', 'average', 'structure', 'yes', '2023-06-17 14:49:37', '2023-06-18 17:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_country_id_foreign` (`country_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_whishlist`
--
ALTER TABLE `my_whishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_products`
--
ALTER TABLE `new_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_products_category_id_foreign` (`category_id`),
  ADD KEY `new_products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_configuration_product_item_id_foreign` (`product_item_id`),
  ADD KEY `product_configuration_variation_option_id_foreign` (`variation_option_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variation_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_variation_options`
--
ALTER TABLE `product_variation_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variation_options_variation_id_foreign` (`variation_id`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `shopping_cart_items`
--
ALTER TABLE `shopping_cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `shopping_cart_items_product_item_id_foreign` (`product_item_id`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_order_user_id_foreign` (`user_id`),
  ADD KEY `shop_order_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `shop_order_shipping_address_foreign` (`shipping_address`),
  ADD KEY `shop_order_shipping_method_foreign` (`shipping_method`),
  ADD KEY `shop_order_order_status_foreign` (`order_status`);

--
-- Indexes for table `shop_order_line`
--
ALTER TABLE `shop_order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_order_line_product_item_id_foreign` (`product_item_id`);

--
-- Indexes for table `shop_order_new`
--
ALTER TABLE `shop_order_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_address_user_id_foreign` (`user_id`),
  ADD KEY `user_address_address_id_foreign` (`address_id`);

--
-- Indexes for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_payment_method_account_number_unique` (`account_number`),
  ADD KEY `user_payment_method_user_id_foreign` (`user_id`),
  ADD KEY `user_payment_method_payment_type_id_foreign` (`payment_type_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sizes`
--
ALTER TABLE `user_sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `my_whishlist`
--
ALTER TABLE `my_whishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `new_products`
--
ALTER TABLE `new_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_configuration`
--
ALTER TABLE `product_configuration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_variation_options`
--
ALTER TABLE `product_variation_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shopping_cart_items`
--
ALTER TABLE `shopping_cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_order_line`
--
ALTER TABLE `shop_order_line`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_order_new`
--
ALTER TABLE `shop_order_new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sizes`
--
ALTER TABLE `user_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_products`
--
ALTER TABLE `new_products`
  ADD CONSTRAINT `new_products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD CONSTRAINT `product_configuration_product_item_id_foreign` FOREIGN KEY (`product_item_id`) REFERENCES `product_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_configuration_variation_option_id_foreign` FOREIGN KEY (`variation_option_id`) REFERENCES `product_variation_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_items`
--
ALTER TABLE `product_items`
  ADD CONSTRAINT `product_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD CONSTRAINT `product_variation_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variation_options`
--
ALTER TABLE `product_variation_options`
  ADD CONSTRAINT `product_variation_options_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `product_variation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_cart_items`
--
ALTER TABLE `shopping_cart_items`
  ADD CONSTRAINT `shopping_cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_cart_items_product_item_id_foreign` FOREIGN KEY (`product_item_id`) REFERENCES `new_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `shop_order_order_status_foreign` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shop_order_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `user_payment_method` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shop_order_shipping_address_foreign` FOREIGN KEY (`shipping_address`) REFERENCES `user_address` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shop_order_shipping_method_foreign` FOREIGN KEY (`shipping_method`) REFERENCES `shipping_method` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shop_order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_order_line`
--
ALTER TABLE `shop_order_line`
  ADD CONSTRAINT `shop_order_line_product_item_id_foreign` FOREIGN KEY (`product_item_id`) REFERENCES `product_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_payment_method`
--
ALTER TABLE `user_payment_method`
  ADD CONSTRAINT `user_payment_method_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_payment_method_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
