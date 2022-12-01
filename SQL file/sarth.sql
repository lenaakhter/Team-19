-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 01:03 PM
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `sessionID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(14, '2022_11_23_205511_create_order_products_table', 8),
(16, '2022_11_26_041014_add_gamekey_to_order_products_table', 9),
(17, '2022_11_28_000509_add_session_i_d_to_basket_table', 10),
(18, '2022_11_30_095700_create_newsletter_table', 11),
(19, '2022_12_01_115632_create_contactus_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekly` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `name`, `weekly`, `created_at`, `updated_at`) VALUES
(3, 'smith@gmail.com', 's', 'on', '2022-11-30 21:09:06', '2022-11-30 21:09:06'),
(4, 'h1@gmail.com', 'hasnian', 'on', '2022-11-30 22:38:24', '2022-11-30 22:38:24'),
(5, 'sui@gmail.com', 'sui', 'on', '2022-11-30 22:42:03', '2022-11-30 22:42:03');

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
(5, 4, 'Test@gmail.com', 'Test name', 94.97, 'completed', '2022-11-26 19:45:24', '2022-11-26 19:45:24'),
(6, 4, 'Test@gmail.com', 'Test name', 29.99, 'pending', '2022-11-26 21:42:44', '2022-11-26 21:42:44'),
(7, 4, 'Test@gmail.com', 'Test name', 229.88, 'pending', '2022-11-26 21:45:35', '2022-11-26 21:45:35'),
(8, 5, 'spiderman@gmail.com', 'Spider Man', 129.95, 'pending', '2022-11-26 23:13:20', '2022-11-26 23:13:20'),
(9, 4, 'Test@gmail.com', 'Test name', 149.94, 'pending', '2022-11-28 00:50:06', '2022-11-28 00:50:06'),
(10, 4, 'Test@gmail.com', 'Test name', 35.97, 'pending', '2022-11-28 01:02:55', '2022-11-28 01:02:55'),
(11, 4, 'Test@gmail.com', 'Test name', 81.97, 'pending', '2022-11-28 03:05:08', '2022-11-28 03:05:08'),
(12, 4, 'Test@gmail.com', 'Test name', 143.94, 'pending', '2022-11-28 03:05:43', '2022-11-28 03:05:43'),
(13, 4, 'Test@gmail.com', 'Test name', 190.92, 'pending', '2022-11-28 03:08:07', '2022-11-28 03:08:07'),
(14, 4, 'Test@gmail.com', 'Test name', 193.92, 'pending', '2022-11-28 03:27:56', '2022-11-28 03:27:56'),
(15, 4, 'Test@gmail.com', 'Test name', 99.97, 'pending', '2022-11-28 09:41:29', '2022-11-28 09:41:29'),
(16, 4, 'Test@gmail.com', 'Test name', 36.98, 'pending', '2022-11-28 11:06:50', '2022-11-28 11:06:50'),
(17, 4, 'Test@gmail.com', 'Test name', 86.96, 'pending', '2022-11-28 11:15:52', '2022-11-28 11:15:52'),
(18, 4, 'Test@gmail.com', 'Test name', 39.98, 'pending', '2022-11-28 16:12:13', '2022-11-28 16:12:13'),
(19, 4, 'Test@gmail.com', 'Test name', 39.98, 'pending', '2022-11-28 16:45:10', '2022-11-28 16:45:10'),
(20, 4, 'Test@gmail.com', 'Test name', 99.96, 'pending', '2022-11-28 16:45:39', '2022-11-28 16:45:39'),
(21, 4, 'Test@gmail.com', 'Test name', 144.95, 'pending', '2022-11-28 16:46:03', '2022-11-28 16:46:03'),
(22, 4, 'Test@gmail.com', 'Test name', 11.99, 'completed', '2022-11-28 16:52:20', '2022-11-28 16:52:20'),
(23, 4, 'Test@gmail.com', 'Test name', 69.98, 'completed', '2022-11-29 15:09:41', '2022-11-29 15:09:41');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `gamekey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `orderID`, `productID`, `price`, `qty`, `created_at`, `updated_at`, `gamekey`) VALUES
(7, '5', '2', 29.99, 2, '2022-11-26 19:45:24', '2022-11-26 19:45:24', 'vBlaYoKBf5'),
(8, '5', '4', 34.99, 1, '2022-11-26 19:45:24', '2022-11-26 19:45:24', 'R9jx9c7NzS'),
(9, '6', '2', 29.99, 1, '2022-11-26 21:42:44', '2022-11-26 21:42:44', 'owQS8urS03'),
(10, '7', '2', 29.99, 3, '2022-11-26 21:45:35', '2022-11-26 21:45:35', 'ArbPzsRCFm'),
(11, '7', '6', 11.99, 5, '2022-11-26 21:45:35', '2022-11-26 21:45:35', '9MlWHGBvLB'),
(12, '7', '8', 19.99, 4, '2022-11-26 21:45:35', '2022-11-26 21:45:35', 'QKkqB1a1uh'),
(13, '8', '2', 29.99, 1, '2022-11-26 23:13:20', '2022-11-26 23:13:20', '2aqPIW4yyq'),
(14, '8', '7', 24.99, 4, '2022-11-26 23:13:20', '2022-11-26 23:13:20', 'MxNhNXiwE9'),
(15, '9', '2', 29.99, 3, '2022-11-28 00:50:06', '2022-11-28 00:50:06', '1t7SSecZLO'),
(16, '9', '3', 19.99, 3, '2022-11-28 00:50:06', '2022-11-28 00:50:06', 'ij8CKJA0S4'),
(17, '10', '6', 11.99, 3, '2022-11-28 01:02:55', '2022-11-28 01:02:55', 'E2pyym6fcT'),
(18, '11', '4', 34.99, 2, '2022-11-28 03:05:08', '2022-11-28 03:05:08', 'JNn14RDLO3'),
(19, '11', '6', 11.99, 1, '2022-11-28 03:05:08', '2022-11-28 03:05:08', '6FLaRwZbJe'),
(20, '12', '3', 19.99, 2, '2022-11-28 03:05:43', '2022-11-28 03:05:43', 'NIKmzhezmM'),
(21, '12', '20', 25.99, 4, '2022-11-28 03:05:43', '2022-11-28 03:05:43', 'lPQ2QNvUrD'),
(22, '13', '7', 24.99, 3, '2022-11-28 03:08:07', '2022-11-28 03:08:07', 't5NKVsjwaS'),
(23, '13', '13', 22.99, 4, '2022-11-28 03:08:07', '2022-11-28 03:08:07', 'oQRISVfUZ6'),
(24, '13', '15', 23.99, 1, '2022-11-28 03:08:07', '2022-11-28 03:08:07', 'ZsLOtepJbg'),
(25, '14', '3', 19.99, 2, '2022-11-28 03:27:56', '2022-11-28 03:27:56', 'iWyI8tVlm9'),
(26, '14', '7', 24.99, 2, '2022-11-28 03:27:56', '2022-11-28 03:27:56', 'NuZCe0IKjO'),
(27, '14', '20', 25.99, 1, '2022-11-28 03:27:56', '2022-11-28 03:27:56', 'ZdCa1Qh5zg'),
(28, '14', '10', 25.99, 3, '2022-11-28 03:27:56', '2022-11-28 03:27:56', 'CacWOyHTZu'),
(29, '15', '3', 19.99, 2, '2022-11-28 09:41:29', '2022-11-28 09:41:29', '8cKFTnxQkk'),
(30, '15', '9', 59.99, 1, '2022-11-28 09:41:29', '2022-11-28 09:41:29', 'AiYFIwUbJO'),
(31, '16', '6', 11.99, 1, '2022-11-28 11:06:51', '2022-11-28 11:06:51', '6l96omEysb'),
(32, '16', '7', 24.99, 1, '2022-11-28 11:06:51', '2022-11-28 11:06:51', 'BDyDCrruy0'),
(33, '17', '6', 11.99, 1, '2022-11-28 11:15:52', '2022-11-28 11:15:52', 'eDhI9eaXrz'),
(34, '17', '7', 24.99, 3, '2022-11-28 11:15:52', '2022-11-28 11:15:52', 'mgPSKq68vR'),
(35, '18', '3', 19.99, 2, '2022-11-28 16:12:13', '2022-11-28 16:12:13', '41TUapphHY'),
(36, '19', '3', 19.99, 2, '2022-11-28 16:45:10', '2022-11-28 16:45:10', 'r8xZNjYi7k'),
(37, '20', '7', 24.99, 4, '2022-11-28 16:45:39', '2022-11-28 16:45:39', 'g2vcUddxJb'),
(38, '21', '12', 30.99, 3, '2022-11-28 16:46:03', '2022-11-28 16:46:03', 'iaa1L1UGyj'),
(39, '21', '20', 25.99, 1, '2022-11-28 16:46:03', '2022-11-28 16:46:03', 'H4W3ctYQvj'),
(40, '21', '10', 25.99, 1, '2022-11-28 16:46:03', '2022-11-28 16:46:03', 'o3prXPEqVK'),
(41, '22', '6', 11.99, 1, '2022-11-28 16:52:20', '2022-11-28 16:52:20', 'rRXUoBILkW'),
(42, '23', '4', 34.99, 2, '2022-11-29 15:09:41', '2022-11-29 15:09:41', 'F5d0Zannw5');

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
(2, '/imagesOfGames/APlagueTaleRequiemPC.jpg', 'A Plague Tale Requiem', 'A Plague Tale: Requiem is an action-adventure survival horror stealth video game developed by Asobo Studio and published by Focus Entertainment.', 29.99, 'PEGI 18', 94),
(3, '/imagesOfGames/Borderlands3PC.jpg', 'Borderlands 3', 'Borderlands 3 is an action role-playing first-person shooter video game developed by Gearbox Software and published by 2K. It is a sequel to 2012s Borderlands 2, and the fourth entry in the main Borderlands series.', 19.99, 'PEGI 12', 87),
(4, '/imagesOfGames/DaysGonePC.jpg', 'Days Gone', 'Days Gone is a 2019 action-adventure video game developed by Bend Studio and published by Sony Interactive Entertainment. The game is set in post-apocalyptic Oregon two years after the start of a pandemic that turned a portion of humanity into vicious zombie-like creatures.', 34.99, 'PEGI 18', 96),
(5, '/imagesOfGames/DeadByDaylightPC.jpg', 'Dead By Daylight', 'Dead by Daylight is an asymmetric multiplayer survival horror online game developed by Canadian studio Behaviour Interactive.', 20.99, 'PEGI 18', 100),
(6, '/imagesOfGames/Fallout76PC.jpg', 'Fallout 76', 'Fallout 76 is a 2018 online action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks. It is an installment in the Fallout series and a prequel to previous entries.', 11.99, 'PEGI 18', 88),
(7, '/imagesOfGames/FarCry6PC.jpg', 'Far Cry 6', 'Far Cry 6 is a 2021 first-person shooter game developed by Ubisoft Toronto and published by Ubisoft. It is the sixth main installment in the Far Cry series and the successor to 2018s Far Cry 5.', 24.99, 'PEGI 18', 83),
(8, '/imagesOfGames/Fifa22PC.jpg', 'Fifa 22', 'FIFA 22 is a football simulation video game published by Electronic Arts. It is the 29th installment in the FIFA series.', 19.99, 'PEGI 3', 96),
(9, '/imagesOfGames/Fifa23PC.jpg', 'Fifa 23', 'FIFA 23 is a football simulation video game published by Electronic Arts. It is the 30th installment in the FIFA series.', 59.99, 'PEGI 3', 99),
(10, '/imagesOfGames/GodofWarPC.jpg', 'God of War', 'God of War is an action-adventure game franchise created by David Jaffe at Sonys Santa Monica Studio.', 25.99, 'PEGI 18', 96),
(11, '/imagesOfGames/CyberPunk2077PC.jpg', 'CyberPunk 2077', 'Cyberpunk 2077 is an action role-playing video game developed by CD Projekt Red and published by CD Projekt. The story takes place in Night City, an open world set in the Cyberpunk universe.', 25.99, 'PEGI 18', 100),
(12, '/imagesOfGames/GTAVPC.jpg', 'GTA V', 'Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall.', 30.99, 'PEGI 18', 97),
(13, '/imagesOfGames/NoMan\'sSkyPC.jpg', 'No Man\'s Sky', 'No Man\'s Sky is an action-adventure survival game developed and published by Hello Games.', 22.99, 'PEGI 7', 96),
(14, '/imagesOfGames/RedDeadRedemption2PC.jpg', 'Red Dead Redemption 2', 'Red Dead Redemption 2 is a 2018 action-adventure game developed and published by Rockstar Games. The game is the third entry in the Red Dead series and a prequel to the 2010 game Red Dead Redemption.', 20.99, 'PEGI 18', 100),
(15, '/imagesOfGames/ResidentEvilBiohazardPC.jpg', 'Resident Evil Biohazard', 'Resident Evil Biohazard is a 2017 survival horror game developed and published by Capcom. The player controls Ethan Winters as he searches for his long-missing wife in a derelict plantation occupied by an infected family, solving puzzles and fighting enemies.', 23.99, 'PEGI 15', 99),
(16, '/imagesOfGames/ResidentEvilVillagePC.jpg', 'Resident Evil Village', 'Resident Evil Village is a 2021 survival horror game developed and published by Capcom. It is the sequel to Resident Evil 7: Biohazard. Players control Ethan Winters, who searches for his kidnapped daughter in a village filled with mutant creatures.', 30.99, 'PEGI 15', 100),
(17, '/imagesOfGames/ScornPC.jpg', 'Scorn 1', 'Scorn is a first-person biopunk survival horror adventure video game developed by Serbian developer Ebb Software for Microsoft Windows and Xbox Series X/S. The game is inspired by the works of visual artists H. R. Giger and Zdzisław Beksiński. The game was released on 14 October 2022 for Microsoft Windows and Xbox Series X/S.', 35.9, 'PEGI 13', 100),
(18, '/imagesOfGames/SpidermanMilesMoralesPC.jpg', 'Spiderman Miles Morales', 'Marvel\'s Spider-Man: Miles Morales is a 2020 action-adventure game developed by Insomniac Games and published by Sony Interactive Entertainment.', 39.99, 'PEGI 16', 100),
(19, '/imagesOfGames/SpidermanRemasteredPC.jpg', 'Spiderman Remastered', 'In Marvel\'s Spider-Man Remastered, the worlds of Peter Parker and Spider-Man collide in an original action-packed story. Play as an experienced Peter Parker, fighting big crime and iconic villains in Marvel\'s New York.', 49.99, 'PEGI 16', 100),
(20, '/imagesOfGames/Victoria3PC.jpg', 'Victoria 3', 'Victoria 3 is a 2022 grand strategy video game developed by Paradox Development Studio and published by Paradox Interactive. It is a sequel to the 2010 game Victoria II and was released on 25 October 2022.', 25.99, 'PEGI 12', 94);

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
  `isadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `isadmin`) VALUES
(1, 'Hasnain Ali', '200072061@aston.ac.uk', NULL, '$2y$10$b3.aLBbeYJdO2U0KXeEyru7/lfqYbJqHFfgmVbB0LRXwv2B0F82GO', NULL, '2022-11-08 14:13:00', '2022-11-08 14:13:00', 'hasnain123', '1'),
(2, 'Muniib Ali', '200103424@aston.ac.uk', NULL, '$2y$10$i/gLc1BEQkr/ugvhTmkFleV12waXn2kPfQpj0iwD8wmuYELMnNEWe', NULL, '2022-11-08 14:14:55', '2022-11-08 14:14:55', 'Muniib123', '1'),
(3, 'Faraz Ahmed', 'farazahmed@gmail.com', NULL, '$2y$10$qzO0DwVMAVs2i1iN2JtMT.D9PBDZaxsyHjUPKsjL/4HoGtqiJwukW', NULL, '2022-11-09 02:27:56', '2022-11-09 02:27:56', 'faraz123', '1'),
(4, 'Test name', 'Test@gmail.com', NULL, '$2y$10$Y4egNLfMMrqxzq5nFywcjuJdX.ouYvNJG7LkIc8.uFCKaLW8kvqze', NULL, '2022-11-09 22:39:17', '2022-11-09 22:39:17', 'Test123', '0'),
(5, 'Spider Man', 'spiderman@gmail.com', NULL, '$2y$10$ScpyY.PqdwA.A7zNfK/gb.CL4JC0gDNuUuMv7C7YO05EcS/PVxr/S', NULL, '2022-11-26 23:13:02', '2022-11-26 23:13:02', 'Spiderman@123', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productinformation`
--
ALTER TABLE `productinformation`
  MODIFY `productID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
