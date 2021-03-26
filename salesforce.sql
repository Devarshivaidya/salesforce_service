-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 01:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesforce`
--
CREATE DATABASE IF NOT EXISTS `salesforce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `salesforce`;

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Brant Lynch DVM', 'ugoyette@example.org', '2021-03-24 02:01:58', '2021-03-24 02:01:58'),
(2, 'Thora Boehm', 'khayes@example.net', '2021-03-24 02:01:58', '2021-03-24 02:01:58'),
(3, 'Meaghan Abernathy', 'fgottlieb@example.net', '2021-03-24 02:01:58', '2021-03-24 02:01:58'),
(4, 'Isidro Wunsch', 'bessie.hudson@example.com', '2021-03-24 02:01:58', '2021-03-24 02:01:58'),
(5, 'Aurelie O\'Keefe', 'elian05@example.net', '2021-03-24 02:01:58', '2021-03-24 02:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2021_03_21_052706_add_admin_to_users_table', 2),
(16, '2014_10_12_000000_create_users_table', 3),
(17, '2014_10_12_100000_create_password_resets_table', 3),
(18, '2019_08_19_000000_create_failed_jobs_table', 3),
(19, '2021_03_22_042455_create_products_table', 3),
(20, '2021_03_24_072341_create_distributors_table', 4),
(21, '2021_03_24_073256_create_sales_management_table', 5),
(22, '2021_03_24_093104_add_status_field_in_product_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `image`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BOAT Storm', 'The boAt Watch Storm is the perfect companion for your fitness transformation. Your Watch Storm is here to remove all obstructions that may come on your goal achieving path.', 'n8cD8QG0nULl9wAgVIFzWBFpiuSNaqqiFSpC5DrU.png', '2499 ', '1', '2021-03-22 06:32:33', '2021-03-24 07:25:09'),
(2, 'Timex iConnect TW5M34500 Smart Watch', 'Reach every goal and take your workouts a step further. Our iConnect Active smartwatch tracks more than just steps - it helps you monitor your heart rate, sleep, and activity. You can also enable notifications on the color display and track your progress and individual workouts using Sports Mode.', 'pIoEPeVZ3CsaYku1PnEXEaevusP2085yOFEFyalu.jpg', '4995 ', '1', '2021-03-22 06:34:26', '2021-03-26 06:30:27'),
(3, 'Apple Watch SE', 'Track your daily activity on Apple Watch and see your trends in the Fitness app on iPhone', '3sQK67WKWRYy3duFGujXESVJoNA7Xhe8DvX7rWe2.jpg', '2949 ', '1', '2021-03-22 06:39:24', '2021-03-26 06:30:30'),
(4, 'Fitbit Charge 4', 'Built-in GPS During outdoor runs, cycles, hikes and more, use built-in GPS to see your pace and distance, then see a map of your workout in the Fitbit app. 24/7 Heart Rate Use 24/7 heart rate to better track calorie burn, optimise workouts and know how hard you\'re working as you make moves on your fitness goals.', 'RYcUMlLPsRU0n5Q9NU0bHxbO3A1D60QIfYIcc6fk.png', '11499 ', '1', '2021-03-22 06:40:32', '2021-03-22 06:40:32'),
(5, 'NoiseFit Evolve', 'The only inevitability of time is evolution. Paving the way for future technology and wearables, the NoiseFit Evolve is the latest offering in the chronology of natural selection. Complete with a bold, stylish design and a sleek, round finish, witness the power of superior ‘evolution’.', '8Y2tz0ELOTZo0DUuXgJ7zy6bo7HYHJ3Ky19hUQz8.png', '4999 ', '1', '2021-03-22 06:41:39', '2021-03-22 06:41:39'),
(6, 'SONATA STRIDE', 'Amp up your style and fitness quotient together with SONATA STRIDE.', '1kv8VdB2xnTnTknZR33ACECh86B7gFNkIeqYF1Gl.webp', '3495 ', '1', '2021-03-22 06:42:46', '2021-03-22 06:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `sales_management`
--

CREATE TABLE `sales_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `distributor_id` bigint(20) UNSIGNED NOT NULL,
  `cost_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_date` date NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_management`
--

INSERT INTO `sales_management` (`id`, `product_id`, `user_id`, `distributor_id`, `cost_price`, `selling_price`, `selling_date`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 4, 4, 1, '11499 ', '2500', '2021-03-24', '5', '2021-03-24 04:32:00', '2021-03-24 04:32:00'),
(3, 4, 3, 4, '11499 ', '2500', '2021-03-24', '5', '2021-03-24 11:55:12', '2021-03-24 11:55:12'),
(4, 6, 3, 3, '2499 ', '2500', '2021-03-26', '50', '2021-03-25 05:21:27', '2021-03-25 05:21:43'),
(5, 1, 3, 2, '2499 ', '5000', '2021-03-04', '3', '2021-03-26 06:28:27', '2021-03-26 06:28:27'),
(6, 2, 3, 5, '4995 ', '2500', '2021-03-28', '1', '2021-03-26 06:39:56', '2021-03-26 06:39:56'),
(7, 6, 4, 2, '3495 ', '25000', '2021-06-16', '5', '2021-03-26 06:40:30', '2021-03-26 06:40:30'),
(8, 3, 4, 2, '2949 ', '500000', '2021-03-12', '25', '2021-03-26 06:41:36', '2021-03-26 06:41:36'),
(9, 5, 4, 4, '4999 ', '120000', '2021-02-17', '7', '2021-03-26 06:41:57', '2021-03-26 06:41:57'),
(10, 4, 3, 5, '11499 ', '500000', '2021-03-18', '3', '2021-03-26 06:45:48', '2021-03-26 06:45:48'),
(11, 3, 3, 3, '2949 ', '5000', '2021-03-01', '5', '2021-03-26 06:46:35', '2021-03-26 06:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '2021-03-22 06:29:41', '$2y$10$58eAembGb7PaVnPdd/2Bju.nAL7yKX0fSyt3Z0bzRd/EnP9Yd1Nji', 'superadmin', 1, NULL, '2021-03-22 06:29:41', '2021-03-22 06:29:41'),
(2, 'Sales Manager', 'salesmanager@gmail.com', NULL, '$2y$10$vCQpkqYnlMJpE9jzK8f/k.lIFndSiFy4vZohWjORN1IHUvD/gcpXi', 'salesmanager', 1, NULL, '2021-03-22 07:28:37', '2021-03-23 05:50:55'),
(3, 'salesmen', 'salesmen@gmail.com', NULL, '$2y$10$NR5RxG.fjwkowmuI8Rn8neaKAqF6GhmFh69w23mOsCi/qj9M3MDzy', 'salesmen', 1, NULL, '2021-03-22 07:29:03', '2021-03-22 07:29:03'),
(4, 'Devarshi', '1@gmail.com', NULL, '$2y$10$g1id7/TXhk/gsCrhwudhIOPISdxRpiSDbBh8xmDJyU9EH608uQhBC', 'salesmen', 1, NULL, '2021-03-24 04:31:37', '2021-03-26 06:38:37'),
(5, 'Sales-Men', 'test@test.com', NULL, '$2y$10$M71Yem2tZU8Z0p5/3g.BeeUgGHbYx0Fu1yfBaMTFpwXUzIIJitmOC', 'salesmen', 0, NULL, '2021-03-26 06:39:12', '2021-03-26 06:39:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_management`
--
ALTER TABLE `sales_management`
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
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_management`
--
ALTER TABLE `sales_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
