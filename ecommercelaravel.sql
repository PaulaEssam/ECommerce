-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 05:59 PM
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
-- Database: `ecommercelaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `bolg_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `total_views` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image_name`, `bolg_category_id`, `description`, `meta_title`, `meta_desc`, `meta_key`, `total_views`, `status`, `created_at`, `updated_at`) VALUES
(2, 'New Yourk', 'new-yourk-2', '26zyxyy2qtcvyiyso0bzx.png', 2, '$blog->save();', 'New Yourk', '$blog->save();', 'New Yourk', 44, 0, '2024-10-05 22:50:22', '2024-10-08 16:06:45'),
(3, 'سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسون', 'samsong-samsong-samsong-samsong-samsong-samsong-samsong-samsong-samson', 'xenyuveksdzvsomyajjy.png', 2, 'سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسون', 'Samsung Samsung', 'سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسون', 'سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسونج سامسون', 19, 0, '2024-10-06 09:15:19', '2024-10-08 16:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `meta_title`, `meta_desc`, `meta_key`, `status`, `created_at`, `updated_at`) VALUES
(2, 'PHP', 'PHP', 'PHP', 'PHP', 'PHP', 0, '2024-10-05 21:52:42', '2024-10-05 21:52:42'),
(3, 'js', 'js', 'js', 'js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js js', 'js', 0, '2024-10-08 15:54:42', '2024-10-08 15:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `user_id`, `blog_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 26, 2, 'hello freind', '2024-10-07 19:45:32', '2024-10-07 19:45:32'),
(2, 26, 2, 'Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.', '2024-10-07 19:47:02', '2024-10-07 19:47:02'),
(3, 26, 2, 'ffmkakrf', '2024-10-07 20:00:57', '2024-10-07 20:00:57'),
(4, 26, 2, 'السلام عليكم', '2024-10-07 20:02:23', '2024-10-07 20:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `meta_title`, `meta_desc`, `meta_key`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'samsung', 'Samsung Samsung', 'Samsung Samsung', 'Samsung', 1, 0, '2024-08-14 11:19:39', '2024-08-14 11:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image_name`, `meta_title`, `meta_desc`, `meta_key`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'clothes', 'clothes-category', '2ndky1hcxzama9jju0crl.png', 'clothes', 'clothes clothes clothes clothes', 'clothes,clothes', 0, 1, '2024-08-13 21:15:33', '2024-10-02 11:32:15'),
(3, 'mobiles', 'mobiles', NULL, 'mobiles', 'mobiles', 'oppo, xiome', 0, 1, '2024-08-13 21:47:19', '2024-08-13 21:47:19'),
(4, 'laptop', 'laptop', '5mhvpii7w0sbh01zmara.png', 'laptop', 'laptop laptop', 'laptop', 0, 1, '2024-10-02 11:39:12', '2024-10-02 11:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'red', '#ff0019', 1, 0, '2024-08-14 11:51:19', '2024-08-14 11:57:23'),
(3, 'green', '#00fa00', 1, 0, '2024-08-16 12:30:06', '2024-08-16 12:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'paula', 'paulaessam8@gmail.com', '01014628698', 'm', 'مساء الخير', '2024-09-27 13:22:36', '2024-09-27 13:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `percent_amount` varchar(255) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `name`, `type`, `percent_amount`, `expire_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'paula111239', 'Percent', '10', '2025-02-12', 0, '2024-08-31 22:01:11', '2024-08-31 23:09:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2024_08_13_121934_create_categories_table', 2),
(9, '2024_08_13_235759_create_sub_categories_table', 3),
(10, '2024_08_14_131630_create_brands_table', 3),
(11, '2024_08_14_132906_create_products_table', 3),
(12, '2024_08_14_143350_create_colors_table', 4),
(13, '2024_08_16_150929_create_product_colors_table', 5),
(14, '2024_08_16_173217_create_product_sizes_table', 6),
(15, '2024_08_17_012153_create_product_images_table', 7),
(16, '2024_09_01_002608_create_discount_codes_table', 8),
(17, '2024_09_01_123056_create_shipping_charges_table', 9),
(18, '2024_09_06_231359_create_orders_table', 10),
(20, '2024_09_06_232611_create_orders_items_table', 11),
(21, '2024_09_23_160524_create_product_wishlists_table', 12),
(22, '2024_09_24_203043_create_pages_table', 13),
(23, '2024_09_27_133740_create_system_settings_table', 14),
(24, '2024_09_27_160302_create_contact_us_table', 15),
(25, '2024_09_28_223936_create_sliders_table', 16),
(26, '2024_10_06_001640_create_blog_categories_table', 17),
(27, '2024_10_06_010443_create_blogs_table', 18),
(28, '2024_10_07_223820_create_blog_comments_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_one` varchar(255) DEFAULT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `discount_code` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(25) DEFAULT '0',
  `shipping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_amount` varchar(25) DEFAULT '0',
  `total_amount` varchar(25) DEFAULT '0',
  `payment_method` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=inprogress, 2=delivered, 3=completed, 4=cancelled  ',
  `is_payment` tinyint(4) NOT NULL DEFAULT 0,
  `payment_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `user_id`, `first_name`, `last_name`, `company_name`, `country`, `address_one`, `address_two`, `city`, `state`, `postcode`, `phone`, `email`, `notes`, `discount_code`, `discount_amount`, `shipping_id`, `shipping_amount`, `total_amount`, `payment_method`, `status`, `is_payment`, `payment_data`, `created_at`, `updated_at`) VALUES
(84, NULL, 1, 'Paula', 'Essam', 'vts', 'Egypt', 'fayoum - sinnores', NULL, 'Fayoum', 'الفيوم', '63516', '01014628698', 'poula21-01446@student.eelu.edu.eg', NULL, 'paula111239', '36.6', 3, '10', '339.4', 'cash', 3, 1, NULL, '2024-09-13 23:51:38', '2024-09-17 13:45:24'),
(85, NULL, 1, 'Paula', 'Essam', 'vts', 'Egypt', 'fayoum - sinnores', 'nn', 'Fayoum', 'الفيوم', '63516', '01014628698', 'paulaessam8@gmail.com', NULL, '', '0', 2, '07', '2087', 'cash', 0, 1, NULL, '2022-09-16 12:09:26', '2024-09-17 13:45:33'),
(86, NULL, 1, 'Paula', 'Essam', 'vts', 'Egypt', 'fayoum - sinnores', 'nn', 'Fayoum', 'الفيوم', '63516', '01014628698', 'paulaessam8@gmail.com', NULL, '', '0', 2, '07', '73', 'cash', 0, 1, NULL, '2024-09-18 13:46:10', '2024-09-18 13:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` varchar(25) DEFAULT '0',
  `color_name` varchar(255) DEFAULT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `size_amount` varchar(25) DEFAULT '0',
  `total_price` varchar(25) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `color_name`, `size_name`, `size_amount`, `total_price`, `created_at`, `updated_at`) VALUES
(4, 84, 1, 3, '122', 'red', '1', '22', '122', '2024-09-13 23:51:38', '2024-09-13 23:51:38'),
(5, 85, 4, 2, '1040', 'green', '12', '40', '1040', '2024-09-16 12:09:26', '2024-09-16 12:09:26'),
(6, 86, 2, 2, '33', 'red', 'xxl', '20', '66', '2024-09-18 13:46:10', '2024-09-18 13:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `title`, `description`, `image_name`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(2, 'fag', 'fag', 'fag', NULL, '2drkkxzvuurs3nnzbo45q.png', NULL, NULL, NULL, NULL, '2024-09-25 23:27:34'),
(3, 'about', 'about', 'about us', 'about us', '3jvqij1gezcshdyskwvcj.png', 'about us', 'about us', 'about us', NULL, '2024-09-25 23:39:00'),
(4, 'contact', 'contact', 'contact', 'contact contact', '4fbibov9xp29bgbpwg9fc.png', 'contact', 'contact', 'contact', NULL, '2024-09-25 23:42:45'),
(5, 'Blog', 'blog', 'Blog', NULL, '58a9v2xibgqhcf7c2llnr.png', 'blog', NULL, 'blog', NULL, '2024-10-06 08:55:08');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `old_price` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `short_desc` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `shipping_returns` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `category_id`, `sub_category_id`, `brand_id`, `old_price`, `price`, `short_desc`, `desc`, `additional_info`, `shipping_returns`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'new product created', 'new-product-created', 'sku1', 2, 1, 1, 120, 100, 'Short Description *', 'Description *', 'Additional Info *', 'Shipping Returns *', 0, 1, '2024-08-14 17:28:01', '2024-08-16 11:39:33'),
(2, 'second product', 'new-product-created-2', 'second sku', 2, 1, 1, 23, 13, 'ff', 'ff', 'ff', 'ff', 0, 1, '2024-08-14 17:29:49', '2024-08-22 15:21:09'),
(4, 'iphone', 'iphone', 'iphone1', 3, 4, 1, 1200, 1000, ',lafs,', 'zfd,vld', 'f,als,', 'f,dsl,', 0, 1, '2024-08-20 17:25:01', '2024-08-20 17:26:16'),
(6, 'msi', 'msi', 'gf63 thin 11', 4, 5, 1, 120, 40000, 'msi', 'msi', 'msi', 'msi', 0, 1, '2024-10-03 10:27:44', '2024-10-03 10:28:13'),
(7, 'paula', 'paula', 'gf63 thin 11', 4, 5, 1, 120, 40000, 'lap', 'lap', 'lap', 'lap', 0, 1, '2024-10-03 21:44:07', '2024-10-03 21:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(27, 1, 1, '2024-08-20 17:18:47', '2024-08-20 17:18:47'),
(32, 4, 1, '2024-08-20 17:26:16', '2024-08-20 17:26:16'),
(33, 4, 3, '2024-08-20 17:26:17', '2024-08-20 17:26:17'),
(43, 2, 1, '2024-08-26 22:30:31', '2024-08-26 22:30:31'),
(44, 2, 3, '2024-08-26 22:30:31', '2024-08-26 22:30:31'),
(45, 6, 1, '2024-10-03 10:28:13', '2024-10-03 10:28:13'),
(46, 7, 3, '2024-10-03 21:44:34', '2024-10-03 21:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_ext` varchar(25) DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_name`, `image_ext`, `order_by`, `created_at`, `updated_at`) VALUES
(14, 1, '1eak4bicgtko3eh7rxnno.jpeg', 'jpeg', 100, '2024-08-20 17:18:47', '2024-08-20 17:18:47'),
(15, 1, '1cuycrieiiva4nfgtywt3.jpeg', 'jpeg', 100, '2024-08-20 17:18:47', '2024-08-20 17:18:47'),
(16, 1, '1obzfzjekkwqjsne3lkvs.jpeg', 'jpeg', 100, '2024-08-20 17:18:47', '2024-08-20 17:18:47'),
(17, 1, '17hmw7wcwkwro9hcnech0.jpeg', 'jpeg', 100, '2024-08-20 17:18:47', '2024-08-20 17:18:47'),
(18, 2, '29razpk1dih3qcfa0cuhn.png', 'png', 100, '2024-08-20 17:19:07', '2024-08-20 17:19:07'),
(19, 2, '20twogkadt1nf9mcg7xah.png', 'png', 100, '2024-08-20 17:19:07', '2024-08-20 17:19:07'),
(20, 2, '2p8alnole7ys88lxr3mfz.png', 'png', 100, '2024-08-20 17:19:07', '2024-08-20 17:19:07'),
(21, 2, '22drel6rrff8lenanskmp.png', 'png', 100, '2024-08-20 17:19:07', '2024-08-20 17:19:07'),
(22, 2, '2w0kiaqkgmvmjpsied80k.png', 'png', 100, '2024-08-20 17:19:07', '2024-08-20 17:19:07'),
(23, 4, '4pi1zarlgz9awdba8ertb.jpeg', 'jpeg', 100, '2024-08-20 17:26:17', '2024-08-20 17:26:17'),
(24, 6, '6s9xkb3q9rbutshlaimjx.png', 'png', 100, '2024-10-03 10:28:13', '2024-10-03 10:28:13'),
(25, 7, '70vvd3u4qfewppqfxczag.jpeg', 'jpeg', 100, '2024-10-03 21:44:34', '2024-10-03 21:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(26, 1, '1', 22, '2024-08-20 17:18:47', '2024-08-20 17:18:47'),
(33, 4, '12', 40, '2024-08-20 17:26:17', '2024-08-20 17:26:17'),
(50, 2, 'sm', 13, '2024-08-26 22:30:31', '2024-08-26 22:30:31'),
(51, 2, 'l', 11, '2024-08-26 22:30:31', '2024-08-26 22:30:31'),
(52, 2, 'xl', 14, '2024-08-26 22:30:31', '2024-08-26 22:30:31'),
(53, 2, 'xxl', 20, '2024-08-26 22:30:31', '2024-08-26 22:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_wishlists`
--

CREATE TABLE `product_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_wishlists`
--

INSERT INTO `product_wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 26, 2, '2024-09-23 13:57:09', '2024-09-23 13:57:09'),
(13, 26, 4, '2024-09-23 20:15:11', '2024-09-23 20:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Free shipping', '07', 0, '2024-09-01 09:53:25', '2024-09-01 09:56:47'),
(3, 'paula', '10', 0, '2024-09-01 10:19:48', '2024-09-01 10:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image_name`, `button_name`, `button_link`, `created_at`, `updated_at`) VALUES
(2, 'Home page', '2eyjrz2ztgutkee5s1r3f.png', 'local host', 'http://localhost/ECommerce/', '2024-09-28 20:21:40', '2024-09-28 20:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `meta_title`, `meta_desc`, `meta_key`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pantalons', 'Pantalons', 'Pantalons', NULL, 'kargo, bagy, soft, melton', 0, 1, '2024-08-14 19:49:36', '2024-08-14 19:49:36'),
(2, 2, 'Samsung', 'samsung', 'Samsung Samsung', NULL, 'Samsung', 0, 1, '2024-08-14 19:50:03', '2024-08-19 15:06:43'),
(3, 2, 'Samsung', 'samsungs', 'Samsung Samsung', NULL, 'Samsung', 0, 1, '2024-08-14 21:34:16', '2024-08-14 21:34:16'),
(4, 3, 'oppo', 'oppo', 'oppo', NULL, 'oppo, xiome', 0, 1, '2024-08-14 21:35:02', '2024-08-14 21:35:02'),
(5, 4, 'msi laptop', 'msi-laptop', 'msi', NULL, NULL, 0, 1, '2024-10-03 10:26:46', '2024-10-03 10:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fevicon` varchar(255) DEFAULT NULL,
  `footer_description` text DEFAULT NULL,
  `footer_payment_icon` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_two` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `website_name`, `logo`, `fevicon`, `footer_description`, `footer_payment_icon`, `address`, `phone`, `phone_two`, `email`, `facebook`, `twitter`, `instagram`, `youtube`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'E-Commerce', '19dqvebq55o.png', '1yvmgtvu8ev.png', 'Footer Description', '1jycnncne8v.png', 'fayoum - sinnores', '01014628698', '01014628698', 'paulaessam8@gmail.com', 'http://www.facebook.com', 'http://www.facebook.com', 'http://www.facebook.com', 'http://www.facebook.com', 'http://www.facebook.com', NULL, '2024-09-27 11:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_two` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `company_name`, `country`, `address_one`, `address_two`, `city`, `state`, `postcode`, `phone`, `is_admin`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', NULL, '$2y$12$qIVA8uVGfQ6xeRoFEDjLVuOmCSrCcIlDe5l0qv3q5cbhYDy/BFQsq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, '2024-08-13 11:14:04'),
(26, 'Paula', 'Essam', 'poula21-01446@student.eelu.edu.eg', NULL, '$2y$12$1iQ2XNuldQ2hQj613rXI.ewqmyv0WgyvI/F0W2...mCtPJvFptO4e', NULL, 'vts', 'Egypt', 'fayoum - sinnores', NULL, 'Fayoum', 'الفيوم', '63516', '01014628698', 0, 0, 0, '2024-09-06 16:39:21', '2024-09-23 10:56:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_bolg_category_id_foreign` (`bolg_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_created_by_foreign` (`created_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_created_by_foreign` (`created_by`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_user_id_foreign` (`user_id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_items_order_id_foreign` (`order_id`),
  ADD KEY `orders_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_created_by_foreign` (`created_by`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_wishlists_user_id_foreign` (`user_id`),
  ADD KEY `product_wishlists_product_id_foreign` (`product_id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_bolg_category_id_foreign` FOREIGN KEY (`bolg_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shipping_charges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  ADD CONSTRAINT `product_wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
