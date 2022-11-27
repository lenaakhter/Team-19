-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 05:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarth`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productID` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `userID` int(11) NOT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_11_08_131700_add_username_to_userinformation_table', 1),
(4, '2022_11_08_132024_add_isadmin_to_userinformation_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2022_11_10_023240_create_basket_table', 3),
(9, '2022_11_12_175118_create_orders_table', 4),
(11, '2022_11_19_231958_add_qty_to_basket_table', 5),
(12, '2022_11_21_213604_add_stock_to_productinformation_table', 6),
(13, '2022_11_22_204411_add_user_i_d_to_basket_table', 7),
(14, '2022_11_23_205511_create_order_products_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userID`, `email`, `name`, `subtotal`, `status`, `created_at`, `updated_at`) VALUES
(77, 4, 'Test@gmail.com', 'Test name', 246.94, 'pending', '2022-11-24 03:49:46', '2022-11-24 03:49:46'),
(78, 4, 'Test@gmail.com', 'Test name', 19.99, 'pending', '2022-11-24 03:51:41', '2022-11-24 03:51:41'),
(79, 4, 'Test@gmail.com', 'Test name', 104.95, 'pending', '2022-11-24 03:52:14', '2022-11-24 03:52:14'),
(80, 4, 'Test@gmail.com', 'Test name', 124.95, 'pending', '2022-11-24 03:54:08', '2022-11-24 03:54:08'),
(81, 4, 'Test@gmail.com', 'Test name', 323.27, 'pending', '2022-11-24 03:56:50', '2022-11-24 03:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `orderID`, `productID`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(18, '73', '1', 20.99, 3, '2022-11-24 03:44:52', '2022-11-24 03:44:52'),
(19, '73', '9', 59.99, 1, '2022-11-24 03:44:52', '2022-11-24 03:44:52'),
(20, '75', '1', 20.99, 1, '2022-11-24 03:47:19', '2022-11-24 03:47:19'),
(21, '77', '5', 20.99, 1, '2022-11-24 03:49:46', '2022-11-24 03:49:46'),
(22, '77', '10', 25.99, 1, '2022-11-24 03:49:46', '2022-11-24 03:49:46'),
(23, '77', '19', 49.99, 4, '2022-11-24 03:49:46', '2022-11-24 03:49:46'),
(24, '78', '3', 19.99, 1, '2022-11-24 03:51:41', '2022-11-24 03:51:41'),
(25, '79', '6', 11.99, 1, '2022-11-24 03:52:14', '2022-11-24 03:52:14'),
(26, '79', '14', 20.99, 1, '2022-11-24 03:52:14', '2022-11-24 03:52:14'),
(27, '79', '15', 23.99, 3, '2022-11-24 03:52:14', '2022-11-24 03:52:14'),
(28, '80', '1', 20.99, 1, '2022-11-24 03:54:08', '2022-11-24 03:54:08'),
(29, '80', '20', 25.99, 4, '2022-11-24 03:54:08', '2022-11-24 03:54:08'),
(30, '81', '15', 23.99, 3, '2022-11-24 03:56:50', '2022-11-24 03:56:50'),
(31, '81', '17', 35.90, 7, '2022-11-24 03:56:50', '2022-11-24 03:56:50');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productinformation`
--

CREATE TABLE `productinformation` (
  `productID` int(100) NOT NULL,
  `imageLocation` text NOT NULL,
  `productName` varchar(1000) NOT NULL,
  `productDescription` varchar(10000) NOT NULL,
  `price` float NOT NULL,
  `ageRating` varchar(20) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productinformation`
--

INSERT INTO `productinformation` (`productID`, `imageLocation`, `productName`, `productDescription`, `price`, `ageRating`, `stock`) VALUES
(1, '/imagesOfGames/7DaysToDiePC.jpg', '7 Days To Die', '7 Days to Die is an early access survival horror video game set in an open world developed by The Fun Pimps. It was released through Early Access on Steam for Microsoft Windows and Mac OS X on December 13, 2013, and for Linux on November 22, 2014.', 20.99, 'PEGI 18', -1),
(2, '/imagesOfGames/APlagueTaleRequiemPC.jpg', 'A Plague Tale Requiem', 'A Plague Tale: Requiem is an action-adventure survival horror stealth video game developed by Asobo Studio and published by Focus Entertainment.', 29.99, 'PEGI 18', -1),
(3, '/imagesOfGames/Borderlands3PC.jpg', 'Borderlands 3', 'Borderlands 3 is an action role-playing first-person shooter video game developed by Gearbox Software and published by 2K. It is a sequel to 2012s Borderlands 2, and the fourth entry in the main Borderlands series.', 19.99, 'PEGI 12', -1),
(4, '/imagesOfGames/DaysGonePC.jpg', 'Days Gone', 'Days Gone is a 2019 action-adventure video game developed by Bend Studio and published by Sony Interactive Entertainment. The game is set in post-apocalyptic Oregon two years after the start of a pandemic that turned a portion of humanity into vicious zombie-like creatures.', 34.99, 'PEGI 18', -1),
(5, '/imagesOfGames/DeadByDaylightPC.jpg', 'Dead By Daylight', 'Dead by Daylight is an asymmetric multiplayer survival horror online game developed by Canadian studio Behaviour Interactive.', 20.99, 'PEGI 18', -1),
(6, '/imagesOfGames/Fallout76PC.jpg', 'Fallout 76', 'Fallout 76 is a 2018 online action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks. It is an installment in the Fallout series and a prequel to previous entries.', 11.99, 'PEGI 18', -1),
(7, '/imagesOfGames/FarCry6PC.jpg', 'Far Cry 6', 'Far Cry 6 is a 2021 first-person shooter game developed by Ubisoft Toronto and published by Ubisoft. It is the sixth main installment in the Far Cry series and the successor to 2018s Far Cry 5.', 24.99, 'PEGI 18', 100),
(8, '/imagesOfGames/Fifa22PC.jpg', 'Fifa 22', 'FIFA 22 is a football simulation video game published by Electronic Arts. It is the 29th installment in the FIFA series.', 19.99, 'PEGI 3', -1),
(9, '/imagesOfGames/Fifa23PC.jpg', 'Fifa 23', 'FIFA 23 is a football simulation video game published by Electronic Arts. It is the 30th installment in the FIFA series.', 59.99, 'PEGI 3', -1),
(10, '/imagesOfGames/GodofWarPC.jpg', 'God of War', 'God of War is an action-adventure game franchise created by David Jaffe at Sonys Santa Monica Studio.', 25.99, 'PEGI 18', -1),
(11, '/imagesOfGames/CyberPunk2077PC.jpg', 'CyberPunk 2077', 'Cyberpunk 2077 is an action role-playing video game developed by CD Projekt Red and published by CD Projekt. The story takes place in Night City, an open world set in the Cyberpunk universe.', 25.99, 'PEGI 18', -2),
(12, '/imagesOfGames/GTAVPC.jpg', 'GTA V', 'Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall.', 30.99, 'PEGI 18', -1),
(13, '/imagesOfGames/NoMan\'sSkyPC.jpg', 'No Man\'s Sky', 'No Man\'s Sky is an action-adventure survival game developed and published by Hello Games.', 22.99, 'PEGI 7', 100),
(14, '/imagesOfGames/RedDeadRedemption2PC.jpg', 'Red Dead Redemption 2', 'Red Dead Redemption 2 is a 2018 action-adventure game developed and published by Rockstar Games. The game is the third entry in the Red Dead series and a prequel to the 2010 game Red Dead Redemption.', 20.99, 'PEGI 18', -1),
(15, '/imagesOfGames/ResidentEvilBiohazardPC.jpg', 'Resident Evil Biohazard', 'Resident Evil Biohazard is a 2017 survival horror game developed and published by Capcom. The player controls Ethan Winters as he searches for his long-missing wife in a derelict plantation occupied by an infected family, solving puzzles and fighting enemies.', 23.99, 'PEGI 15', -3),
(16, '/imagesOfGames/ResidentEvilVillagePC.jpg', 'Resident Evil Village', 'Resident Evil Village is a 2021 survival horror game developed and published by Capcom. It is the sequel to Resident Evil 7: Biohazard. Players control Ethan Winters, who searches for his kidnapped daughter in a village filled with mutant creatures.', 30.99, 'PEGI 15', 100),
(17, '/imagesOfGames/ScornPC.jpg', 'Scorn 1', 'Scorn is a first-person biopunk survival horror adventure video game developed by Serbian developer Ebb Software for Microsoft Windows and Xbox Series X/S. The game is inspired by the works of visual artists H. R. Giger and Zdzisław Beksiński. The game was released on 14 October 2022 for Microsoft Windows and Xbox Series X/S.', 35.9, 'PEGI 13', -7),
(18, '/imagesOfGames/SpidermanMilesMoralesPC.jpg', 'Spiderman Miles Morales', 'Marvel\'s Spider-Man: Miles Morales is a 2020 action-adventure game developed by Insomniac Games and published by Sony Interactive Entertainment.', 39.99, 'PEGI 16', 100),
(19, '/imagesOfGames/SpidermanRemasteredPC.jpg', 'Spiderman Remastered', 'In Marvel\'s Spider-Man Remastered, the worlds of Peter Parker and Spider-Man collide in an original action-packed story. Play as an experienced Peter Parker, fighting big crime and iconic villains in Marvel\'s New York.', 49.99, 'PEGI 16', -4),
(20, '/imagesOfGames/Victoria3PC.jpg', 'Victoria 3', 'Victoria 3 is a 2022 grand strategy video game developed by Paradox Development Studio and published by Paradox Interactive. It is a sequel to the 2010 game Victoria II and was released on 25 October 2022.', 25.99, 'PEGI 12', -4);

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isadmin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `isadmin`) VALUES
(1, 'Hasnain Ali', '200072061@aston.ac.uk', NULL, '$2y$10$b3.aLBbeYJdO2U0KXeEyru7/lfqYbJqHFfgmVbB0LRXwv2B0F82GO', NULL, '2022-11-08 14:13:00', '2022-11-08 14:13:00', 'hasnain123', 'true'),
(2, 'Muniib Ali', '200103424@aston.ac.uk', NULL, '$2y$10$i/gLc1BEQkr/ugvhTmkFleV12waXn2kPfQpj0iwD8wmuYELMnNEWe', NULL, '2022-11-08 14:14:55', '2022-11-08 14:14:55', 'Muniib123', 'true'),
(3, 'Faraz Ahmed', 'farazahmed@gmail.com', NULL, '$2y$10$qzO0DwVMAVs2i1iN2JtMT.D9PBDZaxsyHjUPKsjL/4HoGtqiJwukW', NULL, '2022-11-09 02:27:56', '2022-11-09 02:27:56', 'faraz123', 'true'),
(4, 'Test name', 'Test@gmail.com', NULL, '$2y$10$Y4egNLfMMrqxzq5nFywcjuJdX.ouYvNJG7LkIc8.uFCKaLW8kvqze', NULL, '2022-11-09 22:39:17', '2022-11-09 22:39:17', 'Test123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productinformation`
--
ALTER TABLE `productinformation`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userinformation_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productinformation`
--
ALTER TABLE `productinformation`
  MODIFY `productID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;