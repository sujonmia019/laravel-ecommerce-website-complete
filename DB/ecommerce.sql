-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 10:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_copy`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'otobi', '2020-09-19 02:20:42', NULL),
(2, 'Partex', '2020-09-19 02:21:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Table', '2020-09-19 02:19:36', NULL),
(2, 'Chair', '2020-09-19 02:19:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Black', '2020-09-19 02:21:31', NULL),
(2, 'Grey', '2020-09-19 02:21:42', NULL),
(3, 'White', '2020-09-19 02:21:57', NULL),
(4, 'Blue', '2020-09-19 02:22:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) NOT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `mobile`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Sujon Mia', '01872339806', 'sujonbdjoin28783@gmail.com', 'how are you?', '2020-09-19 15:20:46', NULL),
(3, 'Sujon Mia', '01872339807', 'sujonbdjoin28783@gmail.com', 'sujon ia', '2020-09-19 15:22:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_02_090122_create_product_sizes_table', 2),
(5, '2020_09_02_090739_create_product_sub_images_table', 2),
(6, '2020_09_02_085907_create_product_colors_table', 3),
(8, '2020_09_01_182247_create_colors_table', 4),
(9, '2020_09_01_182338_create_sizes_table', 4),
(10, '2020_08_30_190712_create_categories_table', 5),
(11, '2020_08_30_190800_create_brands_table', 5),
(12, '2020_08_28_101426_create_contacts_table', 6),
(13, '2020_08_29_052043_create_settings_table', 6),
(14, '2020_09_02_090002_create_products_table', 7),
(15, '2020_09_22_021905_create_shippings_table', 8),
(16, '2020_09_22_022350_create_orders_table', 8),
(17, '2020_09_22_022624_create_payments_table', 8),
(18, '2020_09_22_023648_create_order_details_table', 8),
(24, '2020_11_17_011752_create_sliders_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=panding and 1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `payment_id`, `order_number`, `order_total`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 1, 1, 32500, 0, '2020-11-13 20:16:13', '2020-11-13 20:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 1, 1, '2020-11-13 20:16:13', '2020-11-13 20:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(191) NOT NULL,
  `transaction_no` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `method`, `transaction_no`, `created_at`, `updated_at`) VALUES
(1, 'cash on delivery', NULL, '2020-11-13 20:16:13', '2020-11-13 20:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `price` double NOT NULL,
  `short_desc` text DEFAULT NULL,
  `long_desc` longtext DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price`, `short_desc`, `long_desc`, `image`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'DSR Dinning Chair', 'dsr-dinning-chair', 5000, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium fugiat temporibus facere!', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium fugiat temporibus facere! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium fugiat temporibus facere! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium fugiat temporibus facere!', 'c838ff32470c113787e1fb4722eed1a6.jpg', '2020-09-19 02:42:26', '2020-09-19 02:42:26'),
(3, 1, 1, 'Canon EOS 3000D DSLR Camera With 18-55mm Lens', 'canon-eos-3000d-dslr-camera-with-18-55mm-lens', 32500, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos suscipit eligendi dicta maxime beatae aspernatur nihil qui exercitationem aliquid ratione.', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos suscipit eligendi dicta maxime beatae aspernatur nihil qui exercitationem aliquid ratione.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos suscipit eligendi dicta maxime beatae aspernatur nihil qui exercitationem aliquid ratione.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos suscipit eligendi dicta maxime beatae aspernatur nihil qui exercitationem aliquid ratione.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos suscipit eligendi dicta maxime beatae aspernatur nihil qui exercitationem aliquid ratione.', '36fc2a4129e43f93c887d0aa0bd5badf.jpg', '2020-11-09 19:16:11', '2020-11-09 19:16:11');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(3, 2, 3, '2020-09-19 02:42:27', '2020-09-19 02:42:27'),
(4, 2, 2, '2020-09-19 02:42:27', '2020-09-19 02:42:27'),
(5, 3, 4, '2020-11-09 19:16:11', '2020-11-09 19:16:11'),
(6, 3, 1, '2020-11-09 19:16:11', '2020-11-09 19:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(3, 2, 2, '2020-09-19 02:42:27', '2020-09-19 02:42:27'),
(4, 2, 1, '2020-09-19 02:42:27', '2020-09-19 02:42:27'),
(5, 3, 1, '2020-11-09 19:16:11', '2020-11-09 19:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(4, 2, '2a96f174e21f89c22ac69680bbd35f5d.jpg', '2020-09-19 02:42:27', '2020-09-19 02:42:27'),
(5, 2, 'ee853e5a8810f01bc695188c1a790a09.jpg', '2020-09-19 02:42:27', '2020-09-19 02:42:27'),
(6, 2, '75c00edfdc4d8df30b7b3a647fbe0813.jpg', '2020-09-19 02:42:27', '2020-09-19 02:42:27'),
(7, 3, 'f3a8cdb2826ea9a1bbe0c76c7cd9f4b1.jpg', '2020-11-09 19:16:11', '2020-11-09 19:16:11'),
(8, 3, '679723f0389ca06a910f933c831510ba.jpg', '2020-11-09 19:16:11', '2020-11-09 19:16:11'),
(9, 3, '2646deb352458aa4b26cc52f48f1084c.jpg', '2020-11-09 19:16:11', '2020-11-09 19:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `linkdin` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `email`, `logo`, `facebook`, `twitter`, `youtube`, `linkdin`, `address`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '01872339806', 'sujonbdjoin019@gmail.com', '99ce961642f46cbdbbdf73ecedaf030b.png', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-09-19 01:54:08', '2020-09-19 01:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id=customer_id',
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `zip_code` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `name`, `email`, `city`, `state`, `zip_code`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 9, 'Sujon Mia', 'sujonbdjoin019@gmail.com', 'Bogura', 'Subgram', '5800', '01872339806', 'Bogura, Bangladesh', '2020-11-13 20:15:57', '2020-11-13 20:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '20 inc x 25 inc', '2020-09-19 02:22:14', NULL),
(2, '15 inc x 10 inc', '2020-09-19 02:22:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `sub_hadding` varchar(191) NOT NULL,
  `hadding` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `sub_hadding`, `hadding`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ELEGENT FURNITURE--1605558211.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum ipsam numquam corrupti quaerat animi molestiae, ratione incidunt esse distinctio iure.', 'ELEGENT FURNITURE', 0, '2020-11-16 20:23:31', '2020-11-16 20:23:31'),
(2, 'ELEGENT FURNITURE--1605558811.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum ipsam numquam corrupti quaerat animi molestiae, ratione incidunt esse distinctio iure.', 'ELEGENT FURNITURE', 1, '2020-11-16 20:33:31', '2020-11-16 20:33:31'),
(3, 'ELEGENT FURNITURE--1605558839.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum ipsam numquam corrupti quaerat animi molestiae, ratione incidunt esse distinctio iure.', 'ELEGENT FURNITURE', 1, '2020-11-16 20:33:59', '2020-11-16 20:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `usertype` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `role` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `code` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `usertype`, `email`, `role`, `email_verified_at`, `password`, `mobile`, `gender`, `image`, `address`, `status`, `code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sujon mia', '1', 'sujonbdjoin019@gmail.com', '1', NULL, '$2y$10$b0se.HuwF/XdnuJgTt6rZuL5Lflidj5GY2X4e958RzXxayDFd7kGy', '01872339806', '1', 'sujon mia-5f6563834e9001600480131.JPG', 'Bogura', 1, NULL, NULL, NULL, '2020-09-19 01:50:26'),
(9, 'Ismail Hossian', 'customer', 'webthemeupload@gmail.com', NULL, NULL, '$2y$10$qeS/a5NG05ZkFnJ5ivpeNOoKnPGC1iMWH.B6MGw4CVoCJe7kFpiRG', '01872339805', NULL, NULL, NULL, 1, 5542, NULL, '2020-10-18 10:41:06', '2020-10-18 10:47:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
