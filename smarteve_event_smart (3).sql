-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 17 mai 2026 à 21:09
-- Version du serveur : 8.0.45-cll-lve
-- Version de PHP : 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `smarteve_event_smart`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(2, NULL, 1, 'Category 2', 'category-2', '2024-09-02 11:49:19', '2024-09-02 11:49:19');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Leah Sutton', 'mibamycicu@mailinator.com', '+1 (152) 708-4779', 'Adipisci est irure', '2024-09-02 15:52:26', '2024-09-02 15:52:26'),
(2, 'TedCow', 'kayleighbpsteamship@gmail.com', '81862137331', 'Kaixo, zure prezioa jakin nahi nuen.', '2024-09-06 05:06:04', '2024-09-06 05:06:04'),
(3, 'JohnCow', 'kayleighbpsteamship@gmail.com', '87133592594', 'Sveiki, es gribēju zināt savu cenu.', '2024-09-06 18:05:43', '2024-09-06 18:05:43'),
(4, 'JackCow', 'yjdisantoyjdissemin@gmail.com', '81854985851', 'Salam, qiymətinizi bilmək istədim.', '2024-09-13 13:48:05', '2024-09-13 13:48:05'),
(5, 'WFtuisQm', 'jesse99charleshvi@outlook.com', 'oOzSKtTuZL', 'gdNGBcUYb', '2024-09-14 04:55:02', '2024-09-14 04:55:02'),
(6, 'WFtuisQm', 'jesse99charleshvi@outlook.com', 'oOzSKtTuZL', 'gdNGBcUYb', '2024-09-14 04:55:06', '2024-09-14 04:55:06'),
(7, 'MasonCow', 'yjdisantoyjdissemin@gmail.com', '87477544947', 'Здравейте, исках да знам цената ви.', '2024-09-17 10:02:06', '2024-09-17 10:02:06'),
(8, 'DavidCow', 'kayleighbpsteamship@gmail.com', '89918713417', 'Sveiki, es gribēju zināt savu cenu.', '2024-09-22 00:27:11', '2024-09-22 00:27:11'),
(9, 'Noella', 'noella@jeffcott.thawking.shop', '3043523070', 'Hi there \r\n\r\nDefrost frozen foods in minutes safely and naturally with our THAW KING™. \r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time.\r\n\r\nBuy now: https://thawking.shop\r\n\r\nThe Best, \r\n\r\nNoella', '2024-10-09 15:51:09', '2024-10-09 15:51:09'),
(10, 'DavidCow', 'ibucezevuda439@gmail.com', '84671242188', 'Ndewo, achọrọ m ịmara ọnụahịa gị.', '2024-10-13 22:58:14', '2024-10-13 22:58:14'),
(11, 'TedCow', 'axobajigufo34@gmail.com', '81857126232', 'Salam, qiymətinizi bilmək istədim.', '2024-10-14 03:59:51', '2024-10-14 03:59:51'),
(12, 'MasonCow', 'somasesokiyo31@gmail.com', '82851516115', 'Xin chào, tôi muốn biết giá của bạn.', '2024-10-14 08:43:47', '2024-10-14 08:43:47'),
(13, 'TedCow', 'axobajigufo34@gmail.com', '89714985994', 'Ciao, volevo sapere il tuo prezzo.', '2024-10-17 00:48:40', '2024-10-17 00:48:40'),
(14, 'DavidCow', 'ibucezevuda439@gmail.com', '84436723168', 'Dia duit, theastaigh uaim do phraghas a fháil.', '2024-10-25 05:48:29', '2024-10-25 05:48:29'),
(15, 'XRJitty', 'xrumer23Jitty@gmail.com', '82449697918', 'Hello. \r\n \r\nGood cheer to all on this beautiful day!!!!! \r\n \r\nGood luck :)', '2024-10-26 09:11:50', '2024-10-26 09:11:50'),
(16, 'MasonCow', 'duqotayowud23@gmail.com', '84813558863', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.', '2024-10-29 08:35:36', '2024-10-29 08:35:36'),
(17, 'TedCow', 'axobajigufo34@gmail.com', '81533529123', 'Hai, saya ingin tahu harga Anda.', '2024-10-30 23:13:08', '2024-10-30 23:13:08'),
(18, 'TedCow', 'axobajigufo34@gmail.com', '86619318884', 'Hai, saya ingin tahu harga Anda.', '2024-11-05 08:17:22', '2024-11-05 08:17:22'),
(19, 'YSidLrDTFaPr', 'idverdbarrerau@gmail.com', 'DRhiGZHiws', NULL, '2024-11-08 09:35:51', '2024-11-08 09:35:51'),
(20, 'YSidLrDTFaPr', 'idverdbarrerau@gmail.com', 'DRhiGZHiws', NULL, '2024-11-08 09:35:56', '2024-11-08 09:35:56'),
(21, 'MTLqdSpwhKD', 'dwbejgmmkzr@yahoo.com', 'ZzEaXwbtlvuGG', NULL, '2024-11-12 07:26:34', '2024-11-12 07:26:34'),
(22, 'MTLqdSpwhKD', 'dwbejgmmkzr@yahoo.com', 'ZzEaXwbtlvuGG', NULL, '2024-11-12 07:26:38', '2024-11-12 07:26:38'),
(23, 'lyyeoDbIddB', 'stevensondjidilh9971@gmail.com', 'pRlPcDxiQYaxW', NULL, '2024-11-15 23:17:24', '2024-11-15 23:17:24'),
(24, 'lyyeoDbIddB', 'stevensondjidilh9971@gmail.com', 'pRlPcDxiQYaxW', NULL, '2024-11-15 23:17:27', '2024-11-15 23:17:27'),
(25, 'TedCow', 'axobajigufo34@gmail.com', '83779925698', 'Hi, ego volo scire vestri pretium.', '2024-11-16 22:45:58', '2024-11-16 22:45:58'),
(26, 'lPTtTorkzHGcxQE', 'blakesivardzj2005@gmail.com', 'tAcyLMrfZeQM', NULL, '2024-11-18 02:22:39', '2024-11-18 02:22:39'),
(27, 'lPTtTorkzHGcxQE', 'blakesivardzj2005@gmail.com', 'tAcyLMrfZeQM', NULL, '2024-11-18 02:22:43', '2024-11-18 02:22:43'),
(28, 'OliviaCow', 'ebojajuje04@gmail.com', '85535448283', 'Aloha, makemake wau eʻike i kāu kumukūʻai.', '2024-11-19 00:37:20', '2024-11-19 00:37:20'),
(29, 'qEnHvidCcXwDcd', 'fcb3adbb9@yahoo.com', 'mAOOsuHCKQ', NULL, '2024-11-23 03:57:40', '2024-11-23 03:57:40'),
(30, 'qEnHvidCcXwDcd', 'fcb3adbb9@yahoo.com', 'mAOOsuHCKQ', NULL, '2024-11-23 03:57:43', '2024-11-23 03:57:43'),
(31, 'nwqsrEYF', 'osehaftpostuma@yahoo.com', 'fVLCcnUKgnZ', NULL, '2024-11-24 07:05:46', '2024-11-24 07:05:46'),
(32, 'nwqsrEYF', 'osehaftpostuma@yahoo.com', 'fVLCcnUKgnZ', NULL, '2024-11-24 07:05:54', '2024-11-24 07:05:54'),
(33, 'TedCow', 'axobajigufo34@gmail.com', '84614624841', 'Ciao, volevo sapere il tuo prezzo.', '2024-11-24 10:21:54', '2024-11-24 10:21:54'),
(34, 'zEfBZFBS', 'chinaverleivia@yahoo.com', 'dkSLQaImmsy', NULL, '2024-11-25 03:37:18', '2024-11-25 03:37:18'),
(35, 'zEfBZFBS', 'chinaverleivia@yahoo.com', 'dkSLQaImmsy', NULL, '2024-11-25 03:37:22', '2024-11-25 03:37:22'),
(36, 'UGuBlsGpCTw', 'pfrg66obth@yahoo.com', 'kyqTqcwBrPa', NULL, '2024-11-26 03:01:41', '2024-11-26 03:01:41'),
(37, 'UGuBlsGpCTw', 'pfrg66obth@yahoo.com', 'kyqTqcwBrPa', NULL, '2024-11-26 03:01:45', '2024-11-26 03:01:45'),
(38, 'skbIACNch', 'dpbrguiock@yahoo.com', 'WzuOhFDcNH', NULL, '2024-11-28 00:10:08', '2024-11-28 00:10:08'),
(39, 'skbIACNch', 'dpbrguiock@yahoo.com', 'WzuOhFDcNH', NULL, '2024-11-28 00:10:12', '2024-11-28 00:10:12'),
(40, 'TedCow', 'ibucezevuda439@gmail.com', '85357935862', 'Dia duit, theastaigh uaim do phraghas a fháil.', '2024-11-28 08:59:01', '2024-11-28 08:59:01'),
(41, 'GAloOrPTqM', 'wheelerdjyliana@gmail.com', 'kKmgnDkR', NULL, '2024-11-30 10:12:58', '2024-11-30 10:12:58'),
(42, 'GAloOrPTqM', 'wheelerdjyliana@gmail.com', 'kKmgnDkR', NULL, '2024-11-30 10:13:03', '2024-11-30 10:13:03'),
(43, 'KwOaoRKZrocMt', 'xbmlxfskya@yahoo.com', 'mrcyUrsqrlwLEff', NULL, '2024-12-01 22:43:56', '2024-12-01 22:43:56'),
(44, 'KwOaoRKZrocMt', 'xbmlxfskya@yahoo.com', 'mrcyUrsqrlwLEff', NULL, '2024-12-01 22:44:15', '2024-12-01 22:44:15'),
(45, 'TedCow', 'axobajigufo34@gmail.com', '83322461936', 'Hi, roeddwn i eisiau gwybod eich pris.', '2024-12-03 20:56:55', '2024-12-03 20:56:55'),
(46, 'VzIvJymCAw', 'ygkgrnfflhqmpl@yahoo.com', 'PCJVUKFbbXFYg', NULL, '2024-12-04 02:41:28', '2024-12-04 02:41:28'),
(47, 'VzIvJymCAw', 'ygkgrnfflhqmpl@yahoo.com', 'PCJVUKFbbXFYg', NULL, '2024-12-04 02:41:31', '2024-12-04 02:41:31'),
(48, 'NoahCow', 'ibucezevuda439@gmail.com', '83588722119', 'Salut, ech wollt Äre Präis wëssen.', '2024-12-05 13:16:00', '2024-12-05 13:16:00'),
(49, 'JohnCow', 'somasesokiyo31@gmail.com', '85349292149', 'Здравейте, исках да знам цената ви.', '2024-12-09 06:49:37', '2024-12-09 06:49:37'),
(50, 'xqngAnDDPrsh', 'weeksdarlap7@gmail.com', 'CYpoOzza', NULL, '2024-12-09 14:13:46', '2024-12-09 14:13:46'),
(51, 'xqngAnDDPrsh', 'weeksdarlap7@gmail.com', 'CYpoOzza', NULL, '2024-12-09 14:13:51', '2024-12-09 14:13:51'),
(52, 'NAEWTRER1345973NERTYTRY', 'marleneflores1989@quieresmail.com', '85875749987', 'MEYJTJ1345973MARTHHDF', '2024-12-09 17:17:16', '2024-12-09 17:17:16'),
(53, 'JWVGuYtNpw', 'princereik2000@gmail.com', 'IxGjXRbPMqFXFs', NULL, '2024-12-10 11:09:30', '2024-12-10 11:09:30'),
(54, 'JWVGuYtNpw', 'princereik2000@gmail.com', 'IxGjXRbPMqFXFs', NULL, '2024-12-10 11:09:33', '2024-12-10 11:09:33'),
(55, 'TedCow', 'moqagides18@gmail.com', '86678345794', 'Salut, ech wollt Äre Präis wëssen.', '2024-12-11 00:38:43', '2024-12-11 00:38:43'),
(56, 'EgvfxzAOIFa', 'poiencotarres@yahoo.com', 'JGOwFQaES', NULL, '2024-12-11 15:42:31', '2024-12-11 15:42:31'),
(57, 'EgvfxzAOIFa', 'poiencotarres@yahoo.com', 'JGOwFQaES', NULL, '2024-12-11 15:42:34', '2024-12-11 15:42:34'),
(58, 'KgBEsKPX', 'vrdujmpdh@yahoo.com', 'DPhgFlNmXPPO', NULL, '2024-12-12 20:56:02', '2024-12-12 20:56:02'),
(59, 'KgBEsKPX', 'vrdujmpdh@yahoo.com', 'DPhgFlNmXPPO', NULL, '2024-12-12 20:56:10', '2024-12-12 20:56:10'),
(60, 'JohnCow', 'arikerer278@gmail.com', '82117146672', 'Hi, roeddwn i eisiau gwybod eich pris.', '2024-12-14 08:25:28', '2024-12-14 08:25:28'),
(61, 'OuRdjBwSk', 'xsgitdpjq@yahoo.com', 'JNFUMlVkfRcNimT', NULL, '2024-12-15 14:02:13', '2024-12-15 14:02:13'),
(62, 'OuRdjBwSk', 'xsgitdpjq@yahoo.com', 'JNFUMlVkfRcNimT', NULL, '2024-12-15 14:02:17', '2024-12-15 14:02:17'),
(63, 'TedCow', 'ibucezevuda439@gmail.com', '87585676994', 'Здравейте, исках да знам цената ви.', '2024-12-17 11:34:36', '2024-12-17 11:34:36'),
(64, 'cINjIIwbEBqf', 'efufilocoqab62@gmail.com', 'IelpvdBnDDKDeuD', NULL, '2024-12-18 00:36:05', '2024-12-18 00:36:05'),
(65, 'cINjIIwbEBqf', 'efufilocoqab62@gmail.com', 'IelpvdBnDDKDeuD', NULL, '2024-12-18 00:36:08', '2024-12-18 00:36:08'),
(66, 'FVhhJYdWiH', 'omacatukatu37@gmail.com', 'hOZDlsXsn', NULL, '2024-12-19 00:55:44', '2024-12-19 00:55:44'),
(67, 'FVhhJYdWiH', 'omacatukatu37@gmail.com', 'hOZDlsXsn', NULL, '2024-12-19 00:55:48', '2024-12-19 00:55:48'),
(68, 'TedCow', 'moqagides18@gmail.com', '84867242863', 'Kaixo, zure prezioa jakin nahi nuen.', '2024-12-20 09:36:45', '2024-12-20 09:36:45'),
(69, 'MiaCow', 'yawiviseya67@gmail.com', '88666831945', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.', '2024-12-20 15:39:38', '2024-12-20 15:39:38'),
(70, 'Jenny Miranda', 'jenny.miranda0@yahoo.com', '3890298937', 'Your website deserves the best—choose RealPPVTraffic for real, effective visitor growth that drives results. Don’t wait; take control today!  \r\nDiscover more at: http://realhumanwebtraffic.top', '2024-12-22 12:13:45', '2024-12-22 12:13:45'),
(71, 'SKluuBHjiAc', 'kinazuy716@gmail.com', 'yCLuRuIf', NULL, '2024-12-22 12:57:39', '2024-12-22 12:57:39'),
(72, 'SKluuBHjiAc', 'kinazuy716@gmail.com', 'yCLuRuIf', NULL, '2024-12-22 12:57:53', '2024-12-22 12:57:53'),
(73, 'SjaNmVlsUDqLBd', 'odurafaciwe82@gmail.com', 'WRNYOENdeffE', NULL, '2024-12-24 10:13:39', '2024-12-24 10:13:39'),
(74, 'SjaNmVlsUDqLBd', 'odurafaciwe82@gmail.com', 'WRNYOENdeffE', NULL, '2024-12-24 10:13:40', '2024-12-24 10:13:40'),
(75, 'ebGZJGNlOfWvo', 'boangapttie@yahoo.com', 'FyzKcAJduhwsVB', NULL, '2024-12-25 06:59:48', '2024-12-25 06:59:48'),
(76, 'ebGZJGNlOfWvo', 'boangapttie@yahoo.com', 'FyzKcAJduhwsVB', NULL, '2024-12-25 06:59:53', '2024-12-25 06:59:53'),
(77, 'TedCow', 'moqagides18@gmail.com', '83981112977', 'Hej, jeg ønskede at kende din pris.', '2024-12-25 13:13:15', '2024-12-25 13:13:15'),
(78, 'pepaffopay', 'wr1oc5hv@gmail.com', '88226436245', 'Your account has been dormant for 364 days. To prevent deletion and retrieve your balance, please access your account and request a payout within 24 hours. For help, visit our Telegram group: https://t.me/s/attention567563', '2024-12-25 16:32:18', '2024-12-25 16:32:18'),
(79, 'YCFZmCeLQqkF', 'ihidawovucog92@gmail.com', 'LqSKJwcPpV', NULL, '2024-12-30 18:10:32', '2024-12-30 18:10:32'),
(80, 'YCFZmCeLQqkF', 'ihidawovucog92@gmail.com', 'LqSKJwcPpV', NULL, '2024-12-30 18:10:36', '2024-12-30 18:10:36'),
(81, 'xvfZthzZaRcTWj', 'j9qqt0dh6dmxw@yahoo.com', 'AaAzOwUSQwNNyw', NULL, '2024-12-31 12:47:28', '2024-12-31 12:47:28'),
(82, 'xvfZthzZaRcTWj', 'j9qqt0dh6dmxw@yahoo.com', 'AaAzOwUSQwNNyw', NULL, '2024-12-31 12:47:31', '2024-12-31 12:47:31'),
(83, 'pepaffopay', '5r5gtgh7@gmail.com', '88482688786', 'Your account has been inactive for 364 days. To avoid removal and claim your funds, please access your account and initiate a payout within 24 hours. For assistance, join our Telegram group: https://t.me/s/attention6786741', '2024-12-31 14:38:32', '2024-12-31 14:38:32'),
(84, 'TedCow', 'ibucezevuda439@gmail.com', '86854793252', 'Hæ, ég vildi vita verð þitt.', '2025-01-02 06:43:37', '2025-01-02 06:43:37'),
(85, 'VczCttYaGlFj', 'wqsmqdxvj@yahoo.com', 'XUoBCVBOSMNknM', NULL, '2025-01-03 16:08:56', '2025-01-03 16:08:56'),
(86, 'VczCttYaGlFj', 'wqsmqdxvj@yahoo.com', 'XUoBCVBOSMNknM', NULL, '2025-01-03 16:09:02', '2025-01-03 16:09:02'),
(87, 'SoXuQGRZnUuVm', 'orwt9tmsvvatdmi4@yahoo.com', 'GgNHhIVnWBRMu', NULL, '2025-01-05 18:17:58', '2025-01-05 18:17:58'),
(88, 'SoXuQGRZnUuVm', 'orwt9tmsvvatdmi4@yahoo.com', 'GgNHhIVnWBRMu', NULL, '2025-01-05 18:18:02', '2025-01-05 18:18:02'),
(89, 'eAWnSdPNfJ', 'u3kmaf4z9rjjbztrf@yahoo.com', 'UBGyjjvUYX', NULL, '2025-01-07 00:57:39', '2025-01-07 00:57:39'),
(90, 'pJCTeRCPj', 'aralakiwujif00@gmail.com', 'UsNIUIRwTy', NULL, '2025-01-10 05:13:11', '2025-01-10 05:13:11'),
(91, 'pJCTeRCPj', 'aralakiwujif00@gmail.com', 'UsNIUIRwTy', NULL, '2025-01-10 05:13:12', '2025-01-10 05:13:12'),
(92, 'LhinYRWt', 'dxnsjajvoh6t6b7@yahoo.com', 'wgeWXQjiSnZ', NULL, '2025-01-11 03:04:08', '2025-01-11 03:04:08'),
(93, 'LhinYRWt', 'dxnsjajvoh6t6b7@yahoo.com', 'wgeWXQjiSnZ', NULL, '2025-01-11 03:04:13', '2025-01-11 03:04:13'),
(94, 'wgeWKqKfgPNDsC', 'xs2ubooe8ftqm@yahoo.com', 'BPeOGOchRgQIRm', NULL, '2025-01-13 05:11:20', '2025-01-13 05:11:20'),
(95, 'wgeWKqKfgPNDsC', 'xs2ubooe8ftqm@yahoo.com', 'BPeOGOchRgQIRm', NULL, '2025-01-13 05:11:23', '2025-01-13 05:11:23'),
(96, 'pepaffopay', '74dnl2ba@yahoo.com', '81592913146', 'Your account has been dormant for 364 days. To prevent deletion and retrieve your balance, please log in and initiate a withdrawal within 24 hours. For support, connect with us on our Telegram group: https://tinyurl.com/27jxvy7b', '2025-01-13 12:22:10', '2025-01-13 12:22:10'),
(97, 'pepaffopay', 'ast5xhyb@hotmail.com', '81597236534', 'Your account has been dormant for 364 days. To stop deletion and claim your balance, please sign in and initiate a withdrawal within 24 hours. For assistance, join our Telegram group: https://tinyurl.com/2azp3fdo', '2025-01-14 10:31:08', '2025-01-14 10:31:08'),
(98, 'yIAGDWUYrJ', 'uqjtm5ylhi262l@yahoo.com', 'eLZpqddzWguwsNc', NULL, '2025-01-14 15:53:49', '2025-01-14 15:53:49'),
(99, 'yIAGDWUYrJ', 'uqjtm5ylhi262l@yahoo.com', 'eLZpqddzWguwsNc', NULL, '2025-01-14 15:53:52', '2025-01-14 15:53:52'),
(100, 'RJUHtASV', 'hxnnpfqhrlg@yahoo.com', 'WYkYTJSxvsTN', NULL, '2025-01-16 06:44:16', '2025-01-16 06:44:16'),
(101, 'RJUHtASV', 'hxnnpfqhrlg@yahoo.com', 'WYkYTJSxvsTN', NULL, '2025-01-16 06:44:20', '2025-01-16 06:44:20'),
(102, 'pepaffopay', 'n9k1u0im@icloud.com', '84249447675', 'Your account has been dormant for 364 days. To avoid deletion and claim your balance, please log in and initiate a withdrawal within 24 hours. For support, join our Telegram group: https://tinyurl.com/25rk9vhf', '2025-01-17 00:59:01', '2025-01-17 00:59:01'),
(103, 'oQARUjRPMseFaer', 'tb8nweoykv@yahoo.com', 'UOfYgQzUpblZ', NULL, '2025-01-17 12:05:55', '2025-01-17 12:05:55'),
(104, 'oQARUjRPMseFaer', 'tb8nweoykv@yahoo.com', 'UOfYgQzUpblZ', NULL, '2025-01-17 12:06:00', '2025-01-17 12:06:00'),
(105, 'pepaffopay', '3iczfyj8@hotmail.com', '87118911667', 'Your account has been inactive for 364 days. To stop deletion and claim your balance, please log in and request a withdrawal within 24 hours. For help, visit our Telegram group: https://tinyurl.com/2b7j8rwk', '2025-01-18 14:02:42', '2025-01-18 14:02:42'),
(106, 'XwdvziovSY', 'kvaaeo6gql@yahoo.com', 'pwuJCyMobEtFOME', NULL, '2025-01-18 15:17:45', '2025-01-18 15:17:45'),
(107, 'XwdvziovSY', 'kvaaeo6gql@yahoo.com', 'pwuJCyMobEtFOME', NULL, '2025-01-18 15:17:49', '2025-01-18 15:17:49'),
(108, 'AGRlpiksXSJZDC', 'expanseaykaleidoscope64@gmail.com', 'WJzKwTibLiNP', NULL, '2025-01-20 08:41:39', '2025-01-20 08:41:39'),
(109, 'AGRlpiksXSJZDC', 'expanseaykaleidoscope64@gmail.com', 'WJzKwTibLiNP', NULL, '2025-01-20 08:41:41', '2025-01-20 08:41:41'),
(110, 'pepaffopay', 'q4ymhnbp@hotmail.com', '87879834498', 'Your account has been dormant for 364 days. To avoid deletion and retrieve your balance, please log in and initiate a payout within 24 hours. For assistance, connect with us on our Telegram group: https://tinyurl.com/2dgc8do6', '2025-01-21 10:25:22', '2025-01-21 10:25:22'),
(111, 'HhOzPDGC', 'obsidianoui8pinnacle@gmail.com', 'PVEkDosfwz', NULL, '2025-01-21 16:58:26', '2025-01-21 16:58:26'),
(112, 'HhOzPDGC', 'obsidianoui8pinnacle@gmail.com', 'PVEkDosfwz', NULL, '2025-01-21 16:58:30', '2025-01-21 16:58:30'),
(113, 'RQNjRivoVXWJZ', 'borsingerhelfand@yahoo.com', 'pmVQqrmsqLrmABy', NULL, '2025-01-24 22:32:38', '2025-01-24 22:32:38'),
(114, 'RQNjRivoVXWJZ', 'borsingerhelfand@yahoo.com', 'pmVQqrmsqLrmABy', NULL, '2025-01-24 22:32:45', '2025-01-24 22:32:45'),
(115, 'xvwAckzb', 'krllwitmiddendorf@yahoo.com', 'rgubQCoftMoK', NULL, '2025-02-02 20:57:16', '2025-02-02 20:57:16'),
(116, 'xvwAckzb', 'krllwitmiddendorf@yahoo.com', 'rgubQCoftMoK', NULL, '2025-02-02 20:57:19', '2025-02-02 20:57:19'),
(117, 'xfXpcHsixnOmf', 'tmtaavhnkb@yahoo.com', 'qDvIKDAteVsQW', NULL, '2025-02-03 22:50:58', '2025-02-03 22:50:58'),
(118, 'xfXpcHsixnOmf', 'tmtaavhnkb@yahoo.com', 'qDvIKDAteVsQW', NULL, '2025-02-03 22:51:02', '2025-02-03 22:51:02'),
(119, 'UDWJDstoszuW', 'ouijubileeeywraith85@gmail.com', 'XmHGIKVVRe', NULL, '2025-02-04 23:19:17', '2025-02-04 23:19:17'),
(120, 'UDWJDstoszuW', 'ouijubileeeywraith85@gmail.com', 'XmHGIKVVRe', NULL, '2025-02-04 23:19:21', '2025-02-04 23:19:21'),
(121, 'pepaffopay', 'zkdupfqj@yahoo.com', '83463772691', 'Your account has been dormant for 364 days. To stop removal and claim your funds, please log in and initiate a withdrawal within 24 hours. For help, connect with us on our Telegram group: https://tinyurl.com/27vmpo96', '2025-02-05 13:47:53', '2025-02-05 13:47:53'),
(122, 'gWmqaoLNC', 'erterulverwll@yahoo.com', 'hPTNmtbaHsblB', NULL, '2025-02-05 23:04:58', '2025-02-05 23:04:58'),
(123, 'gWmqaoLNC', 'erterulverwll@yahoo.com', 'hPTNmtbaHsblB', NULL, '2025-02-05 23:05:02', '2025-02-05 23:05:02'),
(124, 'ludIbXnecRC', 'whispera28iris44@gmail.com', 'YQAAyWdHZRplr', NULL, '2025-02-06 23:04:19', '2025-02-06 23:04:19'),
(125, 'ludIbXnecRC', 'whispera28iris44@gmail.com', 'YQAAyWdHZRplr', NULL, '2025-02-06 23:04:23', '2025-02-06 23:04:23'),
(126, 'NQzmQJYWqGxvwAk', 'borealaizeal64oi@gmail.com', 'BlATOKuh', NULL, '2025-02-08 07:38:36', '2025-02-08 07:38:36'),
(127, 'NQzmQJYWqGxvwAk', 'borealaizeal64oi@gmail.com', 'BlATOKuh', NULL, '2025-02-08 07:38:41', '2025-02-08 07:38:41'),
(128, 'hlgOIPhGyt', 'iaquiverey40vergeou@gmail.com', 'DIahWMAiSX', NULL, '2025-02-09 21:33:20', '2025-02-09 21:33:20'),
(129, 'hlgOIPhGyt', 'iaquiverey40vergeou@gmail.com', 'DIahWMAiSX', NULL, '2025-02-09 21:33:23', '2025-02-09 21:33:23'),
(130, 'LYbQiSvuqZQQDMk', 'skotacosta3@gmail.com', 'ptrXODfonUoY', NULL, '2025-02-15 14:50:41', '2025-02-15 14:50:41'),
(131, 'LYbQiSvuqZQQDMk', 'skotacosta3@gmail.com', 'ptrXODfonUoY', NULL, '2025-02-15 14:50:43', '2025-02-15 14:50:43'),
(132, 'PywGZLzjS', 'stivilynts17@gmail.com', 'hPnyhaQDuVgWA', NULL, '2025-02-16 06:48:04', '2025-02-16 06:48:04'),
(133, 'PywGZLzjS', 'stivilynts17@gmail.com', 'hPnyhaQDuVgWA', NULL, '2025-02-16 06:48:06', '2025-02-16 06:48:06'),
(134, 'mTxsDVcodLfi', 'brillayers1993@gmail.com', 'HZrOUsaLfvoHNu', NULL, '2025-02-16 23:07:33', '2025-02-16 23:07:33'),
(135, 'mTxsDVcodLfi', 'brillayers1993@gmail.com', 'HZrOUsaLfvoHNu', NULL, '2025-02-16 23:07:36', '2025-02-16 23:07:36'),
(136, 'gwvqmGwqbXKPdQ', 'gofotekep08@gmail.com', 'rEVKBKhhmGYB', NULL, '2025-02-19 07:34:23', '2025-02-19 07:34:23'),
(137, 'gwvqmGwqbXKPdQ', 'gofotekep08@gmail.com', 'rEVKBKhhmGYB', NULL, '2025-02-19 07:34:28', '2025-02-19 07:34:28'),
(138, 'OuGaSVHU', 'scottmeinardce@gmail.com', 'ylnCDuqFt', NULL, '2025-02-21 07:57:36', '2025-02-21 07:57:36'),
(139, 'OuGaSVHU', 'scottmeinardce@gmail.com', 'ylnCDuqFt', NULL, '2025-02-21 07:57:39', '2025-02-21 07:57:39'),
(140, 'krLXOsIuZWtamA', 'nohkhqkkf@yahoo.com', 'iKPZzWBVFYafHAV', NULL, '2025-02-23 21:18:50', '2025-02-23 21:18:50'),
(141, 'krLXOsIuZWtamA', 'nohkhqkkf@yahoo.com', 'iKPZzWBVFYafHAV', NULL, '2025-02-23 21:18:55', '2025-02-23 21:18:55'),
(142, 'xXsBCbYqtYv', 'ltadeviegr@yahoo.com', 'COmWWslXbU', NULL, '2025-02-28 13:07:21', '2025-02-28 13:07:21'),
(143, 'xXsBCbYqtYv', 'ltadeviegr@yahoo.com', 'COmWWslXbU', NULL, '2025-02-28 13:07:23', '2025-02-28 13:07:23'),
(144, 'cbOyBKNGlW', 'ksnowtf34@gmail.com', 'xGhTMxwmKuM', NULL, '2025-03-02 01:36:18', '2025-03-02 01:36:18'),
(145, 'oKZimblxqjD', 'orozctamrar16@gmail.com', 'ZbhMUFCZuXx', NULL, '2025-03-05 13:00:23', '2025-03-05 13:00:23'),
(146, 'oKZimblxqjD', 'orozctamrar16@gmail.com', 'ZbhMUFCZuXx', NULL, '2025-03-05 13:00:26', '2025-03-05 13:00:26'),
(147, 'cbotDwlc', 'uepagbgkjkynbhwn@yahoo.com', 'hKlLVneXEqVNJV', NULL, '2025-03-08 17:32:15', '2025-03-08 17:32:15'),
(148, 'cbotDwlc', 'uepagbgkjkynbhwn@yahoo.com', 'hKlLVneXEqVNJV', NULL, '2025-03-08 17:32:21', '2025-03-08 17:32:21'),
(149, 'QzYVtDyzV', 'oraliaj42@gmail.com', 'vmMurWLdUSgQq', NULL, '2025-03-10 00:36:18', '2025-03-10 00:36:18'),
(150, 'QzYVtDyzV', 'oraliaj42@gmail.com', 'vmMurWLdUSgQq', NULL, '2025-03-10 00:36:23', '2025-03-10 00:36:23'),
(151, 'XBTwNVDRnA', 'dschroederq33@gmail.com', 'RXtTBhZHVLH', NULL, '2025-03-13 08:49:48', '2025-03-13 08:49:48'),
(152, 'XBTwNVDRnA', 'dschroederq33@gmail.com', 'RXtTBhZHVLH', NULL, '2025-03-13 08:49:53', '2025-03-13 08:49:53'),
(153, 'yqTgqXNSXDYpTnC', 'annaconradru@gmail.com', 'aVLIIfscEWQoQ', NULL, '2025-03-15 06:50:32', '2025-03-15 06:50:32'),
(154, 'yqTgqXNSXDYpTnC', 'annaconradru@gmail.com', 'aVLIIfscEWQoQ', NULL, '2025-03-15 06:50:42', '2025-03-15 06:50:42'),
(155, 'dzmFqujB', 'princrosales2001@gmail.com', 'bXtGGRIBvOG', NULL, '2025-03-16 02:29:48', '2025-03-16 02:29:48'),
(156, 'dzmFqujB', 'princrosales2001@gmail.com', 'bXtGGRIBvOG', NULL, '2025-03-16 02:30:00', '2025-03-16 02:30:00'),
(157, 'FxquHTeK', 'ortegahedleiyz5@gmail.com', 'AhZjcajX', NULL, '2025-03-16 19:29:40', '2025-03-16 19:29:40'),
(158, 'FxquHTeK', 'ortegahedleiyz5@gmail.com', 'AhZjcajX', NULL, '2025-03-16 19:29:45', '2025-03-16 19:29:45'),
(159, 'GCjTmXcEkTL', 'chepowe8@gmail.com', 'IyeoteFusn', NULL, '2025-03-17 15:46:36', '2025-03-17 15:46:36'),
(160, 'GCjTmXcEkTL', 'chepowe8@gmail.com', 'IyeoteFusn', NULL, '2025-03-17 15:46:48', '2025-03-17 15:46:48'),
(161, 'gIEPgMXO', 'rastysyu2002@gmail.com', 'gdyWnYEGjguLSe', NULL, '2025-03-19 04:33:43', '2025-03-19 04:33:43'),
(162, 'gIEPgMXO', 'rastysyu2002@gmail.com', 'gdyWnYEGjguLSe', NULL, '2025-03-19 04:33:52', '2025-03-19 04:33:52'),
(163, 'wuqPXUPuKlOYDI', 'persgloverl@gmail.com', 'yEYplantGZrxo', NULL, '2025-03-21 15:00:57', '2025-03-21 15:00:57'),
(164, 'wuqPXUPuKlOYDI', 'persgloverl@gmail.com', 'yEYplantGZrxo', NULL, '2025-03-21 15:01:07', '2025-03-21 15:01:07'),
(165, 'UquzGgSN', 'kerrhubbards@gmail.com', 'vKoqqRRl', NULL, '2025-03-22 06:53:22', '2025-03-22 06:53:22'),
(166, 'UquzGgSN', 'kerrhubbards@gmail.com', 'vKoqqRRl', NULL, '2025-03-22 06:53:25', '2025-03-22 06:53:25'),
(167, 'cCbEAgamaZ', 'srothw51@gmail.com', 'ykWjiimQaeYnI', NULL, '2025-03-23 11:52:47', '2025-03-23 11:52:47'),
(168, 'cCbEAgamaZ', 'srothw51@gmail.com', 'ykWjiimQaeYnI', NULL, '2025-03-23 11:52:51', '2025-03-23 11:52:51'),
(169, 'BPdShDNfXPBZXj', 'darrenturcios963133@yahoo.com', 'QGOZPsEigJ', NULL, '2025-03-29 16:31:04', '2025-03-29 16:31:04'),
(170, 'BPdShDNfXPBZXj', 'darrenturcios963133@yahoo.com', 'QGOZPsEigJ', NULL, '2025-03-29 16:31:08', '2025-03-29 16:31:08'),
(171, 'akQNjlPObHT', 'silva.shelly604954@yahoo.com', 'zMDhiaoZBQbNhKm', NULL, '2025-03-30 08:13:02', '2025-03-30 08:13:02'),
(172, 'akQNjlPObHT', 'silva.shelly604954@yahoo.com', 'zMDhiaoZBQbNhKm', NULL, '2025-03-30 08:13:06', '2025-03-30 08:13:06'),
(173, 'WtbhrvRMktqlOP', 'djinpittsla44@gmail.com', 'Efwtxdzzgikl', NULL, '2025-03-30 20:43:30', '2025-03-30 20:43:30'),
(174, 'WtbhrvRMktqlOP', 'djinpittsla44@gmail.com', 'Efwtxdzzgikl', NULL, '2025-03-30 20:43:37', '2025-03-30 20:43:37'),
(175, 'TjAvHmzBtx', 'marin_victor910706@yahoo.com', 'zKUJKHmdrGFiHWd', NULL, '2025-03-31 10:09:26', '2025-03-31 10:09:26'),
(176, 'TjAvHmzBtx', 'marin_victor910706@yahoo.com', 'zKUJKHmdrGFiHWd', NULL, '2025-03-31 10:09:30', '2025-03-31 10:09:30'),
(177, 'DokmPGwt', 'emily.palmer161116@yahoo.com', 'GPhUvVuCZ', NULL, '2025-03-31 15:01:32', '2025-03-31 15:01:32'),
(178, 'DokmPGwt', 'emily.palmer161116@yahoo.com', 'GPhUvVuCZ', NULL, '2025-03-31 15:01:36', '2025-03-31 15:01:36'),
(179, 'VDmJuLcAoufEn', 'golladjerlunad43@gmail.com', 'dhrWOGnYyvoR', NULL, '2025-04-03 22:41:05', '2025-04-03 22:41:05'),
(180, 'VDmJuLcAoufEn', 'golladjerlunad43@gmail.com', 'dhrWOGnYyvoR', NULL, '2025-04-03 22:41:09', '2025-04-03 22:41:09'),
(181, 'gJLKlDgV', 'litandje1985@gmail.com', 'CDUAvBfmqhefwHD', NULL, '2025-04-04 15:32:50', '2025-04-04 15:32:50'),
(182, 'gJLKlDgV', 'litandje1985@gmail.com', 'CDUAvBfmqhefwHD', NULL, '2025-04-04 15:32:55', '2025-04-04 15:32:55'),
(183, 'Julio Van', 'van.julio@googlemail.com', '4123951088', 'Anyone can run an ad, but only top brands get featured in Forbes & USA Today. Position yourself as an industry leader today: http://superchargeyourprandmarketing.top/', '2025-04-06 16:12:27', '2025-04-06 16:12:27'),
(184, 'nhUxNXyABAbtgDk', 'dknightq1998@gmail.com', 'JqXzIcwPEWSGXXh', NULL, '2025-04-07 18:59:04', '2025-04-07 18:59:04'),
(185, 'nhUxNXyABAbtgDk', 'dknightq1998@gmail.com', 'JqXzIcwPEWSGXXh', NULL, '2025-04-07 18:59:07', '2025-04-07 18:59:07'),
(186, 'xpttaEBN', 'dianabryant629740@yahoo.com', 'UQSDwoaIQhuGOz', NULL, '2025-04-08 16:51:04', '2025-04-08 16:51:04'),
(187, 'xpttaEBN', 'dianabryant629740@yahoo.com', 'UQSDwoaIQhuGOz', NULL, '2025-04-08 16:51:08', '2025-04-08 16:51:08'),
(188, 'JrAKwFTiCnlBpn', 'keithheidenux@gmail.com', 'QiOJRfYY', NULL, '2025-04-12 03:06:23', '2025-04-12 03:06:23'),
(189, 'JrAKwFTiCnlBpn', 'keithheidenux@gmail.com', 'QiOJRfYY', NULL, '2025-04-12 03:06:27', '2025-04-12 03:06:27'),
(190, 'eUdXJCZjdM', 'sendishx2@gmail.com', 'GCOdZerpyFjEP', NULL, '2025-04-12 11:15:16', '2025-04-12 11:15:16'),
(191, 'eUdXJCZjdM', 'sendishx2@gmail.com', 'GCOdZerpyFjEP', NULL, '2025-04-12 11:15:19', '2025-04-12 11:15:19'),
(192, 'vHvEOjEcnXJ', 'cunninghamamalyato55@gmail.com', 'NPpCUGtRjZuKi', NULL, '2025-04-14 20:25:14', '2025-04-14 20:25:14'),
(193, 'vHvEOjEcnXJ', 'cunninghamamalyato55@gmail.com', 'NPpCUGtRjZuKi', NULL, '2025-04-14 20:25:22', '2025-04-14 20:25:22'),
(194, 'RDbtWJyw', 'tuiroteca1978@yahoo.com', 'mEVwMgXeV', NULL, '2025-04-18 12:31:03', '2025-04-18 12:31:03'),
(195, 'RDbtWJyw', 'tuiroteca1978@yahoo.com', 'mEVwMgXeV', NULL, '2025-04-18 12:31:03', '2025-04-18 12:31:03'),
(196, 'ZImdpnIsgsZDZ', 'adissondodsonn@gmail.com', 'BPTHDeavu', NULL, '2025-04-19 19:54:33', '2025-04-19 19:54:33'),
(197, 'ZImdpnIsgsZDZ', 'adissondodsonn@gmail.com', 'BPTHDeavu', NULL, '2025-04-19 19:54:35', '2025-04-19 19:54:35'),
(198, 'JZnKJnqWM', 'gretmalonege@gmail.com', 'siseYCIhLBivbVm', NULL, '2025-04-20 05:00:53', '2025-04-20 05:00:53'),
(199, 'JZnKJnqWM', 'gretmalonege@gmail.com', 'siseYCIhLBivbVm', NULL, '2025-04-20 05:00:58', '2025-04-20 05:00:58'),
(200, 'NARTYTRYUT16942NEHTYHYHTR', 'fuwzppjn@bientotmail.com', '82116694834', 'MEYJTJ16942MARETRYTR', '2025-04-21 16:36:02', '2025-04-21 16:36:02'),
(201, 'cislpKpw', 'djekkihermant1996@gmail.com', 'HsNDNBdB', NULL, '2025-04-23 10:05:15', '2025-04-23 10:05:15'),
(202, 'cislpKpw', 'djekkihermant1996@gmail.com', 'HsNDNBdB', NULL, '2025-04-23 10:05:19', '2025-04-23 10:05:19'),
(203, 'sBzYgcNl', 'reshorssuppse1984@yahoo.com', 'bUepgodXEmf', NULL, '2025-04-24 00:08:41', '2025-04-24 00:08:41'),
(204, 'sBzYgcNl', 'reshorssuppse1984@yahoo.com', 'bUepgodXEmf', NULL, '2025-04-24 00:08:42', '2025-04-24 00:08:42'),
(205, 'aoCRQEFHGTis', 'djeirrinolan1997@gmail.com', 'oQRaqoNqdMIo', NULL, '2025-04-24 14:37:43', '2025-04-24 14:37:43'),
(206, 'aoCRQEFHGTis', 'djeirrinolan1997@gmail.com', 'oQRaqoNqdMIo', NULL, '2025-04-24 14:37:46', '2025-04-24 14:37:46'),
(207, 'AHLzoyFmEzZHyz', 'poiligisear1978@yahoo.com', 'BLsHuYxsN', NULL, '2025-04-24 16:31:54', '2025-04-24 16:31:54'),
(208, 'AHLzoyFmEzZHyz', 'poiligisear1978@yahoo.com', 'BLsHuYxsN', NULL, '2025-04-24 16:32:00', '2025-04-24 16:32:00'),
(209, 'vcMAVhWPNYUATd', 'cingmergoodpvil1976@yahoo.com', 'fvtIXvYsJZ', NULL, '2025-04-25 14:35:45', '2025-04-25 14:35:45'),
(210, 'vcMAVhWPNYUATd', 'cingmergoodpvil1976@yahoo.com', 'fvtIXvYsJZ', NULL, '2025-04-25 14:35:48', '2025-04-25 14:35:48'),
(211, 'ULcYuJGBwJahSS', 'parsonsspringom95@gmail.com', 'LxFentYxOHDfV', NULL, '2025-04-25 19:47:03', '2025-04-25 19:47:03'),
(212, 'ULcYuJGBwJahSS', 'parsonsspringom95@gmail.com', 'LxFentYxOHDfV', NULL, '2025-04-25 19:47:09', '2025-04-25 19:47:09'),
(213, 'fbdCmRmSJ', 'dunlroylanu62@gmail.com', 'DZDSBflJmnIRai', NULL, '2025-04-26 07:38:30', '2025-04-26 07:38:30'),
(214, 'fbdCmRmSJ', 'dunlroylanu62@gmail.com', 'DZDSBflJmnIRai', NULL, '2025-04-26 07:38:35', '2025-04-26 07:38:35'),
(215, 'uvCTGKCyDwfgut', 'lbenderb26@gmail.com', 'TAXDZjrBlZIiv', NULL, '2025-04-26 18:45:32', '2025-04-26 18:45:32'),
(216, 'oOuTQLwFmJLaIcC', 'khigginsmi2005@gmail.com', 'RiaEGDQi', NULL, '2025-04-27 13:02:54', '2025-04-27 13:02:54'),
(217, 'oOuTQLwFmJLaIcC', 'khigginsmi2005@gmail.com', 'RiaEGDQi', NULL, '2025-04-27 13:02:57', '2025-04-27 13:02:57'),
(218, 'wDWmxYmxSN', 'andrianalloyd34@gmail.com', 'LxydTElZbHcqCr', NULL, '2025-04-27 15:11:09', '2025-04-27 15:11:09'),
(219, 'wDWmxYmxSN', 'andrianalloyd34@gmail.com', 'LxydTElZbHcqCr', NULL, '2025-04-27 15:11:14', '2025-04-27 15:11:14'),
(220, 'spZPkJJKAOoHf', 'guyrivas531047@yahoo.com', 'pSDyvxVUnoJYN', NULL, '2025-05-13 05:56:42', '2025-05-13 05:56:42'),
(221, 'spZPkJJKAOoHf', 'guyrivas531047@yahoo.com', 'pSDyvxVUnoJYN', NULL, '2025-05-13 05:56:45', '2025-05-13 05:56:45'),
(222, 'aissam belmoudene', 'aissamdx2000@gmail.com', '0771015969', NULL, '2025-05-15 08:46:32', '2025-05-15 08:46:32'),
(223, 'sqMzHKje', 'jacksonbrandi813077@yahoo.com', 'iBUGknoHXXxYM', NULL, '2025-05-16 08:03:00', '2025-05-16 08:03:00'),
(224, 'sqMzHKje', 'jacksonbrandi813077@yahoo.com', 'iBUGknoHXXxYM', NULL, '2025-05-16 08:03:05', '2025-05-16 08:03:05'),
(225, 'nQfaLEZTZCt', 'devcase46@gmail.com', 'HItVTmgMs', NULL, '2025-05-23 02:59:34', '2025-05-23 02:59:34'),
(226, 'nQfaLEZTZCt', 'devcase46@gmail.com', 'HItVTmgMs', NULL, '2025-05-23 02:59:35', '2025-05-23 02:59:35'),
(227, 'YqrhbyBORItu', 'leilazimm1991@gmail.com', 'NCSFnqeeHfGG', NULL, '2025-05-24 01:29:41', '2025-05-24 01:29:41'),
(228, 'YqrhbyBORItu', 'leilazimm1991@gmail.com', 'NCSFnqeeHfGG', NULL, '2025-05-24 01:29:45', '2025-05-24 01:29:45'),
(229, 'TYqvxfRzEzVOA', 'ambermills1996@yahoo.com', 'JhdJTIhiU', NULL, '2025-05-30 02:39:07', '2025-05-30 02:39:07'),
(230, 'TYqvxfRzEzVOA', 'ambermills1996@yahoo.com', 'JhdJTIhiU', NULL, '2025-05-30 02:39:09', '2025-05-30 02:39:09'),
(231, 'WGlhWHAwB', 'angiehanna194669@yahoo.com', 'wKCFdJgOLfifrx', NULL, '2025-06-02 20:12:22', '2025-06-02 20:12:22'),
(232, 'WGlhWHAwB', 'angiehanna194669@yahoo.com', 'wKCFdJgOLfifrx', NULL, '2025-06-02 20:12:29', '2025-06-02 20:12:29'),
(233, 'bucovvdpPtJbtMM', 'ecuvirikopaj56@gmail.com', 'CBzYpCETLV', NULL, '2025-06-26 14:51:47', '2025-06-26 14:51:47'),
(234, 'bucovvdpPtJbtMM', 'ecuvirikopaj56@gmail.com', 'CBzYpCETLV', NULL, '2025-06-26 14:51:57', '2025-06-26 14:51:57'),
(235, 'NZGERWFGNbAMJ', 'pchaziti93@gmail.com', 'oYAoBcPkzLgXC', NULL, '2025-06-26 15:50:33', '2025-06-26 15:50:33'),
(236, 'NZGERWFGNbAMJ', 'pchaziti93@gmail.com', 'oYAoBcPkzLgXC', NULL, '2025-06-26 15:50:37', '2025-06-26 15:50:37'),
(237, 'oHRGLbcX', 'itiwazaqeha37@gmail.com', 'YfxdTWGvfwEZbr', NULL, '2025-06-27 06:36:26', '2025-06-27 06:36:26'),
(238, 'oHRGLbcX', 'itiwazaqeha37@gmail.com', 'YfxdTWGvfwEZbr', NULL, '2025-06-27 06:36:30', '2025-06-27 06:36:30'),
(239, 'jHCpAzOJRCqut', 'apizexed311@gmail.com', 'xxYrGgNdu', NULL, '2025-06-28 04:05:34', '2025-06-28 04:05:34'),
(240, 'jHCpAzOJRCqut', 'apizexed311@gmail.com', 'xxYrGgNdu', NULL, '2025-06-28 04:05:39', '2025-06-28 04:05:39'),
(241, 'TxrIMteUEsIqvJT', 'katieschwarz317743@yahoo.com', 'zGiszMFXk', NULL, '2025-06-28 11:23:19', '2025-06-28 11:23:19'),
(242, 'TxrIMteUEsIqvJT', 'katieschwarz317743@yahoo.com', 'zGiszMFXk', NULL, '2025-06-28 11:23:22', '2025-06-28 11:23:22'),
(243, 'OqxaVbNZriUi', 'reardencameronqc@gmail.com', 'jMmyBsbGhVczwL', NULL, '2025-06-28 17:08:49', '2025-06-28 17:08:49'),
(244, 'OqxaVbNZriUi', 'reardencameronqc@gmail.com', 'jMmyBsbGhVczwL', NULL, '2025-06-28 17:08:52', '2025-06-28 17:08:52'),
(245, 'aNyMYIrGql', 'francismolkomw@gmail.com', 'UfWgIzBTV', NULL, '2025-06-29 13:50:28', '2025-06-29 13:50:28'),
(246, 'aNyMYIrGql', 'francismolkomw@gmail.com', 'UfWgIzBTV', NULL, '2025-06-29 13:50:32', '2025-06-29 13:50:32'),
(247, 'YufhJEpvlfeo', 'lambraimyndph31@gmail.com', 'oOCcbblzsLLil', NULL, '2025-06-30 04:55:10', '2025-06-30 04:55:10'),
(248, 'YufhJEpvlfeo', 'lambraimyndph31@gmail.com', 'oOCcbblzsLLil', NULL, '2025-06-30 04:55:13', '2025-06-30 04:55:13'),
(249, 'ftxCqdmK', 'djessikac2@gmail.com', 'swPfYReJMLp', NULL, '2025-06-30 08:10:40', '2025-06-30 08:10:40'),
(250, 'ftxCqdmK', 'djessikac2@gmail.com', 'swPfYReJMLp', NULL, '2025-06-30 08:10:49', '2025-06-30 08:10:49'),
(251, 'RYBCaMQSSkW', 'markabuo1997@gmail.com', 'AkMQqOPBuTAlsv', NULL, '2025-06-30 23:02:36', '2025-06-30 23:02:36'),
(252, 'RYBCaMQSSkW', 'markabuo1997@gmail.com', 'AkMQqOPBuTAlsv', NULL, '2025-06-30 23:02:40', '2025-06-30 23:02:40'),
(253, 'CharlieCow', 'yawiviseya67@gmail.com', '83268116378', 'Szia, meg akartam tudni az árát.', '2025-07-01 16:01:51', '2025-07-01 16:01:51'),
(254, 'FlprvBLLIfF', 'abbatreynoldsn@gmail.com', 'pgfkDmPRZNH', NULL, '2025-07-02 02:44:36', '2025-07-02 02:44:36'),
(255, 'FlprvBLLIfF', 'abbatreynoldsn@gmail.com', 'pgfkDmPRZNH', NULL, '2025-07-02 02:44:40', '2025-07-02 02:44:40'),
(256, 'SimonCow', 'irinademenkova86@gmail.com', '85363945589', 'Hallo, ek wou jou prys ken.', '2025-07-02 09:10:43', '2025-07-02 09:10:43'),
(257, 'LeeCow', 'dinanikolskaya99@gmail.com', '86343739883', 'Прывітанне, я хацеў даведацца Ваш прайс.', '2025-07-02 15:59:01', '2025-07-02 15:59:01'),
(258, 'YZFHuKlhxioNbZ', 'gordonmeior34@gmail.com', 'OydwMqxmY', NULL, '2025-07-02 17:15:23', '2025-07-02 17:15:23'),
(259, 'YZFHuKlhxioNbZ', 'gordonmeior34@gmail.com', 'OydwMqxmY', NULL, '2025-07-02 17:15:31', '2025-07-02 17:15:31'),
(260, 'xdCvszSV', 'derrickpritchard869259@yahoo.com', 'UEojLMXzNWhrGND', NULL, '2025-07-03 00:56:16', '2025-07-03 00:56:16'),
(261, 'xdCvszSV', 'derrickpritchard869259@yahoo.com', 'UEojLMXzNWhrGND', NULL, '2025-07-03 00:56:20', '2025-07-03 00:56:20'),
(262, 'LeeCow', 'dinanikolskaya99@gmail.com', '83957663894', 'Sveiki, es gribēju zināt savu cenu.', '2025-07-03 14:26:36', '2025-07-03 14:26:36'),
(263, 'moAjlLngPqe', 'elliedavis910486@yahoo.com', 'XcwwXkQjDgZ', NULL, '2025-07-03 14:53:39', '2025-07-03 14:53:39'),
(264, 'moAjlLngPqe', 'elliedavis910486@yahoo.com', 'XcwwXkQjDgZ', NULL, '2025-07-03 14:53:40', '2025-07-03 14:53:40'),
(265, 'MNIDHJfG', 'byarvydb31@gmail.com', 'aSsZzWqLYFBRLX', NULL, '2025-07-03 19:31:00', '2025-07-03 19:31:00'),
(266, 'MNIDHJfG', 'byarvydb31@gmail.com', 'aSsZzWqLYFBRLX', NULL, '2025-07-03 19:31:04', '2025-07-03 19:31:04'),
(267, 'oatkniitJrv', 'breindtran@gmail.com', 'WrKZZDZMIMmGlX', NULL, '2025-07-04 00:09:09', '2025-07-04 00:09:09'),
(268, 'oatkniitJrv', 'breindtran@gmail.com', 'WrKZZDZMIMmGlX', NULL, '2025-07-04 00:09:28', '2025-07-04 00:09:28'),
(269, 'icABckNTV', 'roddicn9@gmail.com', 'uEZPwMRioIsz', NULL, '2025-07-04 04:04:08', '2025-07-04 04:04:08'),
(270, 'icABckNTV', 'roddicn9@gmail.com', 'uEZPwMRioIsz', NULL, '2025-07-04 04:04:13', '2025-07-04 04:04:13'),
(271, 'LmEHEqgR', 'roddicn9@gmail.com', 'GTbEYucdZ', NULL, '2025-07-04 06:25:35', '2025-07-04 06:25:35'),
(272, 'LmEHEqgR', 'roddicn9@gmail.com', 'GTbEYucdZ', NULL, '2025-07-04 06:25:39', '2025-07-04 06:25:39'),
(273, 'hNqHWpRHNVI', 'saxijahopoy22@gmail.com', 'zMMHsHYWsBr', NULL, '2025-07-04 11:31:03', '2025-07-04 11:31:03'),
(274, 'hNqHWpRHNVI', 'saxijahopoy22@gmail.com', 'zMMHsHYWsBr', NULL, '2025-07-04 11:31:06', '2025-07-04 11:31:06'),
(275, 'cvRrstnudPnqhne', 'mkertis50@gmail.com', 'cedyqZxGmzm', NULL, '2025-07-06 20:53:27', '2025-07-06 20:53:27'),
(276, 'cvRrstnudPnqhne', 'mkertis50@gmail.com', 'cedyqZxGmzm', NULL, '2025-07-06 20:53:31', '2025-07-06 20:53:31'),
(277, 'kMoUoxsQEuMjsMR', 'bridgerandolrw43@gmail.com', 'ThzFcVJFXVeCS', NULL, '2025-07-06 23:17:01', '2025-07-06 23:17:01'),
(278, 'kMoUoxsQEuMjsMR', 'bridgerandolrw43@gmail.com', 'ThzFcVJFXVeCS', NULL, '2025-07-06 23:17:06', '2025-07-06 23:17:06'),
(279, 'wtrvQdtsYkjedP', 'lemuelbeah8@gmail.com', 'wxHFhiRwsGNWp', NULL, '2025-07-07 08:10:01', '2025-07-07 08:10:01'),
(280, 'wtrvQdtsYkjedP', 'lemuelbeah8@gmail.com', 'wxHFhiRwsGNWp', NULL, '2025-07-07 08:10:07', '2025-07-07 08:10:07'),
(281, 'UGfKpLMEYTewDJ', 'solomongarrikst@gmail.com', 'nDlZNvbwh', NULL, '2025-07-08 10:37:20', '2025-07-08 10:37:20'),
(282, 'UGfKpLMEYTewDJ', 'solomongarrikst@gmail.com', 'nDlZNvbwh', NULL, '2025-07-08 10:37:26', '2025-07-08 10:37:26'),
(283, 'LeeCow', 'zekisuquc419@gmail.com', '81759224124', 'Xin chào, tôi muốn biết giá của bạn.', '2025-07-08 21:24:55', '2025-07-08 21:24:55'),
(284, 'GeorgeCow', 'irinademenkova86@gmail.com', '89167299218', 'Hallo, ek wou jou prys ken.', '2025-07-09 05:02:57', '2025-07-09 05:02:57'),
(285, 'SimonCow', 'irinademenkova86@gmail.com', '89194583719', 'Hola, volia saber el seu preu.', '2025-07-09 15:52:54', '2025-07-09 15:52:54'),
(286, 'kebJUlrZiLSFam', 'gmurilloug3@gmail.com', 'mYkZktnH', NULL, '2025-07-10 01:48:58', '2025-07-10 01:48:58'),
(287, 'kebJUlrZiLSFam', 'gmurilloug3@gmail.com', 'mYkZktnH', NULL, '2025-07-10 01:49:02', '2025-07-10 01:49:02'),
(288, 'WUpsnYWsX', 'dunnpirszb@gmail.com', 'yMvfVeFc', NULL, '2025-07-14 00:18:13', '2025-07-14 00:18:13'),
(289, 'WUpsnYWsX', 'dunnpirszb@gmail.com', 'yMvfVeFc', NULL, '2025-07-14 00:18:17', '2025-07-14 00:18:17'),
(290, 'rryhYKtSuGRhAYZ', 'vmayn20@gmail.com', 'KcpnfUcZNCGmV', NULL, '2025-07-14 04:07:32', '2025-07-14 04:07:32'),
(291, 'rryhYKtSuGRhAYZ', 'vmayn20@gmail.com', 'KcpnfUcZNCGmV', NULL, '2025-07-14 04:07:34', '2025-07-14 04:07:34'),
(292, 'txMOzwJwrOVx', 'zaramayerv1984@gmail.com', 'hEHTgsYrzi', NULL, '2025-07-14 12:43:37', '2025-07-14 12:43:37'),
(293, 'txMOzwJwrOVx', 'zaramayerv1984@gmail.com', 'hEHTgsYrzi', NULL, '2025-07-14 12:43:42', '2025-07-14 12:43:42'),
(294, 'LeeCow', 'dinanikolskaya99@gmail.com', '87358353113', 'Hi, I wanted to know your price.', '2025-07-14 12:55:26', '2025-07-14 12:55:26'),
(295, 'kHKnglSvFOvPZpw', 'solomjon9@gmail.com', 'qqSCWSovTWrV', NULL, '2025-07-16 03:40:23', '2025-07-16 03:40:23'),
(296, 'kHKnglSvFOvPZpw', 'solomjon9@gmail.com', 'qqSCWSovTWrV', NULL, '2025-07-16 03:40:28', '2025-07-16 03:40:28'),
(297, '* * * Claim Free iPhone 16: https://www.motorolapromociones2.com/index.php?m868zq * * * hs=9a6dff7df50c13c5ef4e47e02c1091db* ххх*', 'pazapz@mailbox.in.ua', '083341795207', '1szh30', '2025-07-16 13:33:33', '2025-07-16 13:33:33'),
(298, '* * * <a href=\"https://www.motorolapromociones2.com/index.php?m868zq\">Unlock Free Spins Today</a> * * * hs=9a6dff7df50c13c5ef4e47e02c1091db* ххх*', 'pazapz@mailbox.in.ua', '083341795207', '1szh30', '2025-07-16 13:33:35', '2025-07-16 13:33:35'),
(299, 'tctkhAndLkP', 'dboylexx3@gmail.com', 'iaSNnePbxl', NULL, '2025-07-16 15:41:32', '2025-07-16 15:41:32'),
(300, 'tctkhAndLkP', 'dboylexx3@gmail.com', 'iaSNnePbxl', NULL, '2025-07-16 15:41:36', '2025-07-16 15:41:36'),
(301, 'YjRmyIBCIKoDA', 'hendersonann1984@yahoo.com', 'JoAGRbdRH', NULL, '2025-07-16 19:30:14', '2025-07-16 19:30:14'),
(302, 'YjRmyIBCIKoDA', 'hendersonann1984@yahoo.com', 'JoAGRbdRH', NULL, '2025-07-16 19:30:19', '2025-07-16 19:30:19'),
(303, 'dfWAFGegJnRu', 'exakogec50@gmail.com', 'VWdIxGoFxZRzuO', NULL, '2025-07-17 15:22:37', '2025-07-17 15:22:37'),
(304, 'dfWAFGegJnRu', 'exakogec50@gmail.com', 'VWdIxGoFxZRzuO', NULL, '2025-07-17 15:22:44', '2025-07-17 15:22:44'),
(305, 'LeeCow', 'irinademenkova86@gmail.com', '81429188498', 'Szia, meg akartam tudni az árát.', '2025-07-18 05:43:53', '2025-07-18 05:43:53'),
(306, 'yQBODYgGbP', 'townsendesmond2001@gmail.com', 'tHwBOmOLwnv', NULL, '2025-07-18 07:30:41', '2025-07-18 07:30:41'),
(307, 'yQBODYgGbP', 'townsendesmond2001@gmail.com', 'tHwBOmOLwnv', NULL, '2025-07-18 07:30:47', '2025-07-18 07:30:47'),
(308, 'brCwlXhGFixtmu', 'perlimqr8@gmail.com', 'YFMCmCDhyBPSs', NULL, '2025-07-18 16:44:26', '2025-07-18 16:44:26'),
(309, 'brCwlXhGFixtmu', 'perlimqr8@gmail.com', 'YFMCmCDhyBPSs', NULL, '2025-07-18 16:44:50', '2025-07-18 16:44:50'),
(310, 'GeorgeCow', 'irinademenkova86@gmail.com', '84551742924', 'Hi, kam dashur të di çmimin tuaj', '2025-07-18 18:37:25', '2025-07-18 18:37:25'),
(311, 'FnggGrUllL', 'perlimqr8@gmail.com', 'ZtsowzJVO', NULL, '2025-07-18 21:28:14', '2025-07-18 21:28:14'),
(312, 'FnggGrUllL', 'perlimqr8@gmail.com', 'ZtsowzJVO', NULL, '2025-07-18 21:28:17', '2025-07-18 21:28:17'),
(313, 'ndMBTXmPA', 'camachodjoni44@gmail.com', 'bGEfiETZIyXFC', NULL, '2025-07-18 23:32:03', '2025-07-18 23:32:03'),
(314, 'ndMBTXmPA', 'camachodjoni44@gmail.com', 'bGEfiETZIyXFC', NULL, '2025-07-18 23:32:05', '2025-07-18 23:32:05'),
(315, 'EZLOfRZqgrgr', 'weeksizzay1981@gmail.com', 'faOoiqRJVNa', NULL, '2025-07-19 00:56:21', '2025-07-19 00:56:21'),
(316, 'EZLOfRZqgrgr', 'weeksizzay1981@gmail.com', 'faOoiqRJVNa', NULL, '2025-07-19 00:56:26', '2025-07-19 00:56:26'),
(317, 'wzraCsfxbqmNg', 'goldammerbarrett476517@yahoo.com', 'etDWHEVu', NULL, '2025-07-19 05:53:52', '2025-07-19 05:53:52'),
(318, 'wzraCsfxbqmNg', 'goldammerbarrett476517@yahoo.com', 'etDWHEVu', NULL, '2025-07-19 05:54:07', '2025-07-19 05:54:07'),
(319, 'bouNDFfkDWAeKb', 'aezelflaedkt7@gmail.com', 'JwfNiuHqvGZc', NULL, '2025-07-19 10:26:10', '2025-07-19 10:26:10'),
(320, 'bouNDFfkDWAeKb', 'aezelflaedkt7@gmail.com', 'JwfNiuHqvGZc', NULL, '2025-07-19 10:26:16', '2025-07-19 10:26:16'),
(321, 'Adele Kiley', 'ms78jq@fqpeby.com', '267158332', 'You built your website. Now let’s get people to see it. We’ll send you traffic — all free, with no strings.\r\nhttps://freewebsitetrafficforever.top', '2025-07-19 10:44:16', '2025-07-19 10:44:16'),
(322, 'wTzBCyBfRpma', 'shaelinroytg1997@gmail.com', 'iuHrkjaKSGZz', NULL, '2025-07-19 12:32:07', '2025-07-19 12:32:07'),
(323, 'wTzBCyBfRpma', 'shaelinroytg1997@gmail.com', 'iuHrkjaKSGZz', NULL, '2025-07-19 12:32:10', '2025-07-19 12:32:10'),
(324, 'TUiVvjpaig', 'uhalajote81@gmail.com', 'kZFukgpAGPJYv', NULL, '2025-07-20 00:15:25', '2025-07-20 00:15:25'),
(325, 'TUiVvjpaig', 'uhalajote81@gmail.com', 'kZFukgpAGPJYv', NULL, '2025-07-20 00:15:30', '2025-07-20 00:15:30'),
(326, 'WWmGTXIWBZbkQ', 'djanellkimo8@gmail.com', 'ZRGSLcoHNFONz', NULL, '2025-07-20 18:57:56', '2025-07-20 18:57:56'),
(327, 'WWmGTXIWBZbkQ', 'djanellkimo8@gmail.com', 'ZRGSLcoHNFONz', NULL, '2025-07-20 18:57:59', '2025-07-20 18:57:59'),
(328, 'hIWFRgvyr', 'wowuzim807@gmail.com', 'ZawOeOiRQ', NULL, '2025-07-21 05:18:16', '2025-07-21 05:18:16'),
(329, 'hIWFRgvyr', 'wowuzim807@gmail.com', 'ZawOeOiRQ', NULL, '2025-07-21 05:18:22', '2025-07-21 05:18:22'),
(330, 'lKOLDNhK', 'harrittahodgef7@gmail.com', 'wqCRcaBH', NULL, '2025-07-21 22:23:38', '2025-07-21 22:23:38'),
(331, 'lKOLDNhK', 'harrittahodgef7@gmail.com', 'wqCRcaBH', NULL, '2025-07-21 22:23:42', '2025-07-21 22:23:42'),
(332, 'JqTDjxvl', 'ohogenaledu62@gmail.com', 'xAHzyMVA', NULL, '2025-07-23 00:15:13', '2025-07-23 00:15:13'),
(333, 'JqTDjxvl', 'ohogenaledu62@gmail.com', 'xAHzyMVA', NULL, '2025-07-23 00:15:20', '2025-07-23 00:15:20'),
(334, 'eRIHgfiyc', 'cooperstephen825020@yahoo.com', 'MZfPoMNuBJLTwN', NULL, '2025-07-23 21:00:23', '2025-07-23 21:00:23'),
(335, 'eRIHgfiyc', 'cooperstephen825020@yahoo.com', 'MZfPoMNuBJLTwN', NULL, '2025-07-23 21:00:25', '2025-07-23 21:00:25'),
(336, 'eITQrlEgBgDXi', 'blemccsb@gmail.com', 'JcvdNlbrGW', NULL, '2025-07-24 02:47:20', '2025-07-24 02:47:20'),
(337, 'eITQrlEgBgDXi', 'blemccsb@gmail.com', 'JcvdNlbrGW', NULL, '2025-07-24 02:47:21', '2025-07-24 02:47:21'),
(338, 'qrfSOfTAbLoahx', 'blakdjervaun1992@gmail.com', 'vKPwtKpwre', NULL, '2025-07-24 03:15:43', '2025-07-24 03:15:43'),
(339, 'qrfSOfTAbLoahx', 'blakdjervaun1992@gmail.com', 'vKPwtKpwre', NULL, '2025-07-24 03:15:44', '2025-07-24 03:15:44'),
(340, 'XDZTgeNFKr', 'lovejessica246348@yahoo.com', 'TgvRUHTc', NULL, '2025-07-24 04:46:05', '2025-07-24 04:46:05'),
(341, 'ChuPFWQScPGPL', 'khanmontmo2@gmail.com', 'jWtpuBRhMPPSsq', NULL, '2025-07-24 10:50:58', '2025-07-24 10:50:58'),
(342, 'ChuPFWQScPGPL', 'khanmontmo2@gmail.com', 'jWtpuBRhMPPSsq', NULL, '2025-07-24 10:51:02', '2025-07-24 10:51:02'),
(343, 'dJQyynUUgm', 'zanoloy329@gmail.com', 'DVfGGqjnoOiRQV', NULL, '2025-07-24 10:52:54', '2025-07-24 10:52:54'),
(344, 'dJQyynUUgm', 'zanoloy329@gmail.com', 'DVfGGqjnoOiRQV', NULL, '2025-07-24 10:52:58', '2025-07-24 10:52:58'),
(345, 'NzwStMvHEmDgzF', 'betelrikun50@gmail.com', 'ElnPsiPQz', NULL, '2025-07-24 11:07:59', '2025-07-24 11:07:59'),
(346, 'NzwStMvHEmDgzF', 'betelrikun50@gmail.com', 'ElnPsiPQz', NULL, '2025-07-24 11:08:03', '2025-07-24 11:08:03'),
(347, 'kOTlVwcAhya', 'ilainshaffer17@gmail.com', 'UdYtdsNHOr', NULL, '2025-07-24 22:22:24', '2025-07-24 22:22:24'),
(348, 'kOTlVwcAhya', 'ilainshaffer17@gmail.com', 'UdYtdsNHOr', NULL, '2025-07-24 22:22:28', '2025-07-24 22:22:28'),
(349, 'xgWZqaepQtH', 'jufosej860@gmail.com', 'itTsElhSCUl', NULL, '2025-07-25 10:13:44', '2025-07-25 10:13:44'),
(350, 'ocKnuDECVcW', 'ibavuli884@gmail.com', 'EbMbKZsGEdSZLuA', NULL, '2025-07-25 15:02:08', '2025-07-25 15:02:08'),
(351, 'ocKnuDECVcW', 'ibavuli884@gmail.com', 'EbMbKZsGEdSZLuA', NULL, '2025-07-25 15:02:22', '2025-07-25 15:02:22'),
(352, 'xsMoiEIzjMv', 'nozurejad18@gmail.com', 'LyxSTOjXOXipLa', NULL, '2025-07-26 01:46:24', '2025-07-26 01:46:24'),
(353, 'xsMoiEIzjMv', 'nozurejad18@gmail.com', 'LyxSTOjXOXipLa', NULL, '2025-07-26 01:46:28', '2025-07-26 01:46:28'),
(354, 'uKVkvtYDYyCAqgC', 'loqahuwiji85@gmail.com', 'xsXXgMRSgPkB', NULL, '2025-07-26 18:27:22', '2025-07-26 18:27:22'),
(355, 'uKVkvtYDYyCAqgC', 'loqahuwiji85@gmail.com', 'xsXXgMRSgPkB', NULL, '2025-07-26 18:27:25', '2025-07-26 18:27:25'),
(356, 'LeeCow', 'dinanikolskaya99@gmail.com', '86577747279', 'Sveiki, es gribēju zināt savu cenu.', '2025-07-28 04:15:44', '2025-07-28 04:15:44'),
(357, 'LeeCow', 'dinanikolskaya99@gmail.com', '86681287816', 'Szia, meg akartam tudni az árát.', '2025-07-28 07:25:04', '2025-07-28 07:25:04'),
(358, 'wJCdsJbqW', 'glenndanielle843687@yahoo.com', 'mHnomNeR', NULL, '2025-07-28 12:15:23', '2025-07-28 12:15:23'),
(359, 'wJCdsJbqW', 'glenndanielle843687@yahoo.com', 'mHnomNeR', NULL, '2025-07-28 12:15:26', '2025-07-28 12:15:26'),
(360, 'LeeCow', 'zekisuquc419@gmail.com', '89252859136', 'Ndewo, achọrọ m ịmara ọnụahịa gị.', '2025-07-28 13:16:26', '2025-07-28 13:16:26'),
(361, 'dGaWAXJgpT', 'kelleyestasn1@gmail.com', 'YDBKGyHBuBeIZB', NULL, '2025-07-28 18:07:24', '2025-07-28 18:07:24'),
(362, 'dGaWAXJgpT', 'kelleyestasn1@gmail.com', 'YDBKGyHBuBeIZB', NULL, '2025-07-28 18:07:28', '2025-07-28 18:07:28'),
(363, 'SimonCow', 'irinademenkova86@gmail.com', '86998489154', 'Xin chào, tôi muốn biết giá của bạn.', '2025-07-28 22:56:04', '2025-07-28 22:56:04'),
(364, 'LeeCow', 'dinanikolskaya99@gmail.com', '83148886816', 'Zdravo, htio sam znati vašu cijenu.', '2025-07-29 02:31:32', '2025-07-29 02:31:32'),
(365, 'LeeCow', 'irinademenkova86@gmail.com', '84971884428', 'Прывітанне, я хацеў даведацца Ваш прайс.', '2025-07-29 12:17:54', '2025-07-29 12:17:54'),
(366, 'RkeQyXLDavRlouA', 'bardalfdawsonn40@gmail.com', 'gSiZDjwnIW', NULL, '2025-07-30 14:10:43', '2025-07-30 14:10:43'),
(367, 'RkeQyXLDavRlouA', 'bardalfdawsonn40@gmail.com', 'gSiZDjwnIW', NULL, '2025-07-30 14:10:45', '2025-07-30 14:10:45'),
(368, 'NfdWaGxjtQDdt', 'andradedjordjd24@gmail.com', 'oJZkRMvFuCOGEjE', NULL, '2025-07-30 18:47:14', '2025-07-30 18:47:14'),
(369, 'NfdWaGxjtQDdt', 'andradedjordjd24@gmail.com', 'oJZkRMvFuCOGEjE', NULL, '2025-07-30 18:47:19', '2025-07-30 18:47:19'),
(370, 'efQdYJgMfAlJib', 'otilupike683@gmail.com', 'tAAtMrivo', NULL, '2025-07-30 20:51:12', '2025-07-30 20:51:12'),
(371, 'efQdYJgMfAlJib', 'otilupike683@gmail.com', 'tAAtMrivo', NULL, '2025-07-30 20:51:17', '2025-07-30 20:51:17'),
(372, 'GeorgeCow', 'irinademenkova86@gmail.com', '83658487153', 'Kaixo, zure prezioa jakin nahi nuen.', '2025-07-30 23:00:24', '2025-07-30 23:00:24'),
(373, 'zVDNNkmLn', 'ucigumux13@gmail.com', 'YCMMWmonwX', NULL, '2025-07-31 04:49:09', '2025-07-31 04:49:09'),
(374, 'zVDNNkmLn', 'ucigumux13@gmail.com', 'YCMMWmonwX', NULL, '2025-07-31 04:49:15', '2025-07-31 04:49:15'),
(375, 'upAvUVbhiLqYvIq', 'wexihuxag740@gmail.com', 'lFpDbDuLsonM', NULL, '2025-08-01 10:02:05', '2025-08-01 10:02:05'),
(376, 'upAvUVbhiLqYvIq', 'wexihuxag740@gmail.com', 'lFpDbDuLsonM', NULL, '2025-08-01 10:02:10', '2025-08-01 10:02:10'),
(377, 'dTqixhSNh', 'yuzuxiyupi23@gmail.com', 'jyIFVfDGbWR', NULL, '2025-08-01 14:22:17', '2025-08-01 14:22:17'),
(378, 'dTqixhSNh', 'yuzuxiyupi23@gmail.com', 'jyIFVfDGbWR', NULL, '2025-08-01 14:22:29', '2025-08-01 14:22:29'),
(379, 'nCGptxHzJm', 'pauloferrer831041@yahoo.com', 'FrrdAzAX', NULL, '2025-08-01 17:44:13', '2025-08-01 17:44:13'),
(380, 'nCGptxHzJm', 'pauloferrer831041@yahoo.com', 'FrrdAzAX', NULL, '2025-08-01 17:44:17', '2025-08-01 17:44:17'),
(381, 'XJRzoHpSb', 'joachimlevesque907958@yahoo.com', 'jtjRsRpE', NULL, '2025-08-01 21:06:00', '2025-08-01 21:06:00'),
(382, 'XJRzoHpSb', 'joachimlevesque907958@yahoo.com', 'jtjRsRpE', NULL, '2025-08-01 21:06:07', '2025-08-01 21:06:07'),
(383, 'SimonCow', 'irinademenkova86@gmail.com', '87128469141', 'Hai, saya ingin tahu harga Anda.', '2025-08-02 15:47:49', '2025-08-02 15:47:49'),
(384, 'GDSsxENcOWAuf', 'ugihetiqob200@gmail.com', 'gIiStysvEgdAmqa', NULL, '2025-08-02 18:08:42', '2025-08-02 18:08:42'),
(385, 'GDSsxENcOWAuf', 'ugihetiqob200@gmail.com', 'gIiStysvEgdAmqa', NULL, '2025-08-02 18:08:48', '2025-08-02 18:08:48'),
(386, 'NZLOSQSvUncvItE', 'obezanajiwo31@gmail.com', 'ZVMckoJuFtaIGA', NULL, '2025-08-03 00:00:59', '2025-08-03 00:00:59'),
(387, 'NZLOSQSvUncvItE', 'obezanajiwo31@gmail.com', 'ZVMckoJuFtaIGA', NULL, '2025-08-03 00:01:12', '2025-08-03 00:01:12'),
(388, 'icRUEnDGWvmH', 'richarteks3@gmail.com', 'qgJLsiSt', NULL, '2025-08-03 01:33:14', '2025-08-03 01:33:14'),
(389, 'icRUEnDGWvmH', 'richarteks3@gmail.com', 'qgJLsiSt', NULL, '2025-08-03 01:33:15', '2025-08-03 01:33:15'),
(390, 'yvkGXmKnn', 'kochrois72@gmail.com', 'zXjLjFSBw', NULL, '2025-08-03 07:24:38', '2025-08-03 07:24:38'),
(391, 'bkmXCMavjwi', 'ijuzemuderej99@gmail.com', 'GatCXxqmlZznx', NULL, '2025-08-03 07:59:11', '2025-08-03 07:59:11'),
(392, 'bkmXCMavjwi', 'ijuzemuderej99@gmail.com', 'GatCXxqmlZznx', NULL, '2025-08-03 07:59:16', '2025-08-03 07:59:16'),
(393, 'PWbedEcLddDg', 'mizasip009@gmail.com', 'ihnEqbPWl', NULL, '2025-08-03 15:39:37', '2025-08-03 15:39:37'),
(394, 'PWbedEcLddDg', 'mizasip009@gmail.com', 'ihnEqbPWl', NULL, '2025-08-03 15:39:45', '2025-08-03 15:39:45'),
(395, 'LNfsJXfcxtgG', 'hesireloma00@gmail.com', 'hYcLhaHdLcr', NULL, '2025-08-03 16:20:24', '2025-08-03 16:20:24'),
(396, 'LNfsJXfcxtgG', 'hesireloma00@gmail.com', 'hYcLhaHdLcr', NULL, '2025-08-03 16:20:27', '2025-08-03 16:20:27'),
(397, 'OCPDmqYM', 'dgarzadr38@gmail.com', 'uuNNRQTjQQ', NULL, '2025-08-05 01:55:06', '2025-08-05 01:55:06'),
(398, 'OCPDmqYM', 'dgarzadr38@gmail.com', 'uuNNRQTjQQ', NULL, '2025-08-05 01:55:13', '2025-08-05 01:55:13');
INSERT INTO `contacts` (`id`, `name`, `email`, `number`, `message`, `created_at`, `updated_at`) VALUES
(399, 'bktDwmqYq', 'whiteheaddjonnad9@gmail.com', 'KEeufyxfbHCQpbk', NULL, '2025-08-05 04:54:40', '2025-08-05 04:54:40'),
(400, 'bktDwmqYq', 'whiteheaddjonnad9@gmail.com', 'KEeufyxfbHCQpbk', NULL, '2025-08-05 04:54:47', '2025-08-05 04:54:47'),
(401, 'ipaXASbjAF', 'medisonje85@gmail.com', 'zYFTvXcHZmsjIib', NULL, '2025-08-05 13:20:01', '2025-08-05 13:20:01'),
(402, 'ipaXASbjAF', 'medisonje85@gmail.com', 'zYFTvXcHZmsjIib', NULL, '2025-08-05 13:20:11', '2025-08-05 13:20:11'),
(403, 'XWhVKKyiGfx', 'marksjulie87844@yahoo.com', 'RUqrfszcnHAc', NULL, '2025-08-05 20:24:38', '2025-08-05 20:24:38'),
(404, 'XWhVKKyiGfx', 'marksjulie87844@yahoo.com', 'RUqrfszcnHAc', NULL, '2025-08-05 20:24:43', '2025-08-05 20:24:43'),
(405, 'ecRUSuwxREomG', 'oyigixorab55@gmail.com', 'noqEDYXDM', NULL, '2025-08-06 00:34:27', '2025-08-06 00:34:27'),
(406, 'ecRUSuwxREomG', 'oyigixorab55@gmail.com', 'noqEDYXDM', NULL, '2025-08-06 00:34:28', '2025-08-06 00:34:28'),
(407, 'deDgJdiKyakrM', 'velasquezsandra787422@yahoo.com', 'bIkFSOHQwygCdZ', NULL, '2025-08-06 05:00:58', '2025-08-06 05:00:58'),
(408, 'deDgJdiKyakrM', 'velasquezsandra787422@yahoo.com', 'bIkFSOHQwygCdZ', NULL, '2025-08-06 05:01:05', '2025-08-06 05:01:05'),
(409, 'OMHiVbgqcqExTk', 'prulucas51@gmail.com', 'fpMobVnYLzhreq', NULL, '2025-08-06 21:33:23', '2025-08-06 21:33:23'),
(410, 'OMHiVbgqcqExTk', 'prulucas51@gmail.com', 'fpMobVnYLzhreq', NULL, '2025-08-06 21:33:27', '2025-08-06 21:33:27'),
(411, 'yWnzxnsqR', 'einslidiaz46@gmail.com', 'CFQLBFEF', NULL, '2025-08-07 08:14:35', '2025-08-07 08:14:35'),
(412, 'yWnzxnsqR', 'einslidiaz46@gmail.com', 'CFQLBFEF', NULL, '2025-08-07 08:14:38', '2025-08-07 08:14:38'),
(413, 'LeeCow', 'dinanikolskaya99@gmail.com', '85594533643', 'Hallo, ek wou jou prys ken.', '2025-08-07 15:30:39', '2025-08-07 15:30:39'),
(414, 'GeorgeCow', 'irinademenkova86@gmail.com', '81426178772', 'Xin chào, tôi muốn biết giá của bạn.', '2025-08-07 15:41:43', '2025-08-07 15:41:43'),
(415, 'jkLvOoGHmMAtL', 'hefoteqaf23@gmail.com', 'bRTPpLrUzWhzGr', NULL, '2025-08-08 04:50:28', '2025-08-08 04:50:28'),
(416, 'jkLvOoGHmMAtL', 'hefoteqaf23@gmail.com', 'bRTPpLrUzWhzGr', NULL, '2025-08-08 04:50:38', '2025-08-08 04:50:38'),
(417, 'IeaGVsjAN', 'rebeccacox72861@yahoo.com', 'iyHejnwcjssbRl', NULL, '2025-08-08 17:16:48', '2025-08-08 17:16:48'),
(418, 'IeaGVsjAN', 'rebeccacox72861@yahoo.com', 'iyHejnwcjssbRl', NULL, '2025-08-08 17:16:53', '2025-08-08 17:16:53'),
(419, 'LDRirpedWNw', 'onaciwuqiq267@gmail.com', 'RGlXfwQEbVlKF', NULL, '2025-08-09 05:11:36', '2025-08-09 05:11:36'),
(420, 'LDRirpedWNw', 'onaciwuqiq267@gmail.com', 'RGlXfwQEbVlKF', NULL, '2025-08-09 05:11:43', '2025-08-09 05:11:43'),
(421, 'ZhABxsfNiCEvA', 'awumogodi986@gmail.com', 'dnjCKENMVsKsJDB', NULL, '2025-08-09 09:13:24', '2025-08-09 09:13:24'),
(422, 'ZhABxsfNiCEvA', 'awumogodi986@gmail.com', 'dnjCKENMVsKsJDB', NULL, '2025-08-09 09:13:28', '2025-08-09 09:13:28'),
(423, 'rjfsisLcSDTviW', 'wayivicizic76@gmail.com', 'IZOwhTBTzgQpddn', NULL, '2025-08-09 11:17:45', '2025-08-09 11:17:45'),
(424, 'rjfsisLcSDTviW', 'wayivicizic76@gmail.com', 'IZOwhTBTzgQpddn', NULL, '2025-08-09 11:17:49', '2025-08-09 11:17:49'),
(425, 'wRpquKyR', 'zoyecexebu79@gmail.com', 'jpVClVtQwTG', NULL, '2025-08-09 18:05:02', '2025-08-09 18:05:02'),
(426, 'wRpquKyR', 'zoyecexebu79@gmail.com', 'jpVClVtQwTG', NULL, '2025-08-09 18:05:07', '2025-08-09 18:05:07'),
(427, 'LeeCow', 'dinanikolskaya99@gmail.com', '81521263812', 'Здравейте, исках да знам цената ви.', '2025-08-12 14:45:09', '2025-08-12 14:45:09'),
(428, 'mWnEUKXxJqIERIb', 'ravomihulevo26@gmail.com', 'ieARpseFej', NULL, '2025-08-12 20:57:40', '2025-08-12 20:57:40'),
(429, 'mWnEUKXxJqIERIb', 'ravomihulevo26@gmail.com', 'ieARpseFej', NULL, '2025-08-12 20:57:43', '2025-08-12 20:57:43'),
(430, 'IupqGKSqb', 'adukijuh42@gmail.com', 'ZjBzXfPSx', NULL, '2025-08-12 21:22:07', '2025-08-12 21:22:07'),
(431, 'IupqGKSqb', 'adukijuh42@gmail.com', 'ZjBzXfPSx', NULL, '2025-08-12 21:22:11', '2025-08-12 21:22:11'),
(432, 'qQsMSDlVM', 'ravomihulevo26@gmail.com', 'HVecipEyw', NULL, '2025-08-13 01:05:20', '2025-08-13 01:05:20'),
(433, 'qQsMSDlVM', 'ravomihulevo26@gmail.com', 'HVecipEyw', NULL, '2025-08-13 01:05:28', '2025-08-13 01:05:28'),
(434, 'OjFqhdvgr', 'ukasitejus617@gmail.com', 'mzOSsSvoPeIjx', NULL, '2025-08-13 01:27:52', '2025-08-13 01:27:52'),
(435, 'OjFqhdvgr', 'ukasitejus617@gmail.com', 'mzOSsSvoPeIjx', NULL, '2025-08-13 01:27:54', '2025-08-13 01:27:54'),
(436, 'WqBwuwgi', 'obojowi411@gmail.com', 'FIqqUmGgmiytkYV', NULL, '2025-08-13 03:09:35', '2025-08-13 03:09:35'),
(437, 'WqBwuwgi', 'obojowi411@gmail.com', 'FIqqUmGgmiytkYV', NULL, '2025-08-13 03:09:49', '2025-08-13 03:09:49'),
(438, 'YsmXNpoveV', 'olajopinazi70@gmail.com', 'KsjRxdgKueE', NULL, '2025-08-13 06:47:15', '2025-08-13 06:47:15'),
(439, 'YsmXNpoveV', 'olajopinazi70@gmail.com', 'KsjRxdgKueE', NULL, '2025-08-13 06:47:19', '2025-08-13 06:47:19'),
(440, 'UaubTCEQDzB', 'hectormontgomery998266@yahoo.com', 'HjrDzlyJitG', NULL, '2025-08-13 08:36:11', '2025-08-13 08:36:11'),
(441, 'UaubTCEQDzB', 'hectormontgomery998266@yahoo.com', 'HjrDzlyJitG', NULL, '2025-08-13 08:36:15', '2025-08-13 08:36:15'),
(442, 'caNTXahZbUsC', 'duwaqozo894@gmail.com', 'hJhZKgOLA', NULL, '2025-08-13 23:22:44', '2025-08-13 23:22:44'),
(443, 'caNTXahZbUsC', 'duwaqozo894@gmail.com', 'hJhZKgOLA', NULL, '2025-08-13 23:22:48', '2025-08-13 23:22:48'),
(444, 'LeeCow', 'zekisuquc419@gmail.com', '82173341542', 'Szia, meg akartam tudni az árát.', '2025-08-14 04:19:44', '2025-08-14 04:19:44'),
(445, 'FgPBqcaWBQAu', 'ifedesu705@gmail.com', 'IjsePVAAKywJqgk', NULL, '2025-08-14 10:36:34', '2025-08-14 10:36:34'),
(446, 'FgPBqcaWBQAu', 'ifedesu705@gmail.com', 'IjsePVAAKywJqgk', NULL, '2025-08-14 10:36:38', '2025-08-14 10:36:38'),
(447, 'OkYYcafMFWg', 'osibuvezef482@gmail.com', 'qgNLDjRYcO', NULL, '2025-08-14 12:15:04', '2025-08-14 12:15:04'),
(448, 'OkYYcafMFWg', 'osibuvezef482@gmail.com', 'qgNLDjRYcO', NULL, '2025-08-14 12:15:07', '2025-08-14 12:15:07'),
(449, 'eMqQODFWF', 'osoroxuhawa79@gmail.com', 'wIqaUasrgVzW', NULL, '2025-08-14 15:18:29', '2025-08-14 15:18:29'),
(450, 'eMqQODFWF', 'osoroxuhawa79@gmail.com', 'wIqaUasrgVzW', NULL, '2025-08-14 15:18:34', '2025-08-14 15:18:34'),
(451, 'XiPHEzJGbPQSY', 'noxavoqice081@gmail.com', 'NWtLMkDgsf', NULL, '2025-08-15 00:21:41', '2025-08-15 00:21:41'),
(452, 'XiPHEzJGbPQSY', 'noxavoqice081@gmail.com', 'NWtLMkDgsf', NULL, '2025-08-15 00:21:48', '2025-08-15 00:21:48'),
(453, 'dUQifFSUfeIn', 'rokohixi80@gmail.com', 'IGpbyAfIQJP', NULL, '2025-08-15 04:52:15', '2025-08-15 04:52:15'),
(454, 'dUQifFSUfeIn', 'rokohixi80@gmail.com', 'IGpbyAfIQJP', NULL, '2025-08-15 04:52:22', '2025-08-15 04:52:22'),
(455, 'jxXNqVfP', 'shelbycarter949942@yahoo.com', 'BTeAVFIq', NULL, '2025-08-15 06:36:06', '2025-08-15 06:36:06'),
(456, 'jxXNqVfP', 'shelbycarter949942@yahoo.com', 'BTeAVFIq', NULL, '2025-08-15 06:36:09', '2025-08-15 06:36:09'),
(457, 'YdEZwwJbrl', 'litecuvav045@gmail.com', 'yveqRKFbZELz', NULL, '2025-08-17 01:42:47', '2025-08-17 01:42:47'),
(458, 'YdEZwwJbrl', 'litecuvav045@gmail.com', 'yveqRKFbZELz', NULL, '2025-08-17 01:42:51', '2025-08-17 01:42:51'),
(459, 'AlDHdmoOCsdAdp', 'lanericky849091@yahoo.com', 'QNEDVsZMK', NULL, '2025-08-17 11:49:29', '2025-08-17 11:49:29'),
(460, 'AlDHdmoOCsdAdp', 'lanericky849091@yahoo.com', 'QNEDVsZMK', NULL, '2025-08-17 11:49:34', '2025-08-17 11:49:34'),
(461, 'WxTcYEFtoSVJ', 'ehamiwavo568@gmail.com', 'BUQwtSEojlh', NULL, '2025-08-17 20:46:30', '2025-08-17 20:46:30'),
(462, 'WxTcYEFtoSVJ', 'ehamiwavo568@gmail.com', 'BUQwtSEojlh', NULL, '2025-08-17 20:46:34', '2025-08-17 20:46:34'),
(463, 'bhWJfYMHkv', 'beqehame914@gmail.com', 'VLiebUDwfOmLzJz', NULL, '2025-08-18 01:01:15', '2025-08-18 01:01:15'),
(464, 'bhWJfYMHkv', 'beqehame914@gmail.com', 'VLiebUDwfOmLzJz', NULL, '2025-08-18 01:01:22', '2025-08-18 01:01:22'),
(465, 'LeeCow', 'dinanikolskaya99@gmail.com', '88315542425', 'Hej, jeg ønskede at kende din pris.', '2025-08-18 06:05:31', '2025-08-18 06:05:31'),
(466, 'pcISRiwRtoysb', 'irosufupuyu51@gmail.com', 'UKxDxMmtwg', NULL, '2025-08-18 11:45:16', '2025-08-18 11:45:16'),
(467, 'pcISRiwRtoysb', 'irosufupuyu51@gmail.com', 'UKxDxMmtwg', NULL, '2025-08-18 11:45:20', '2025-08-18 11:45:20'),
(468, 'EajxMKOzG', 'akejuyow05@gmail.com', 'abeeGtPzjP', NULL, '2025-08-19 00:20:06', '2025-08-19 00:20:06'),
(469, 'EajxMKOzG', 'akejuyow05@gmail.com', 'abeeGtPzjP', NULL, '2025-08-19 00:20:10', '2025-08-19 00:20:10'),
(470, 'OBOkUoFF', 'beqehame914@gmail.com', 'hXNIDRQv', NULL, '2025-08-19 02:31:17', '2025-08-19 02:31:17'),
(471, 'OBOkUoFF', 'beqehame914@gmail.com', 'hXNIDRQv', NULL, '2025-08-19 02:31:20', '2025-08-19 02:31:20'),
(472, 'LeeCow', 'irinademenkova86@gmail.com', '81379714366', 'Hi, ego volo scire vestri pretium.', '2025-08-19 03:43:52', '2025-08-19 03:43:52'),
(473, 'lMkwjcDx', 'iwubehexu351@gmail.com', 'SuQFtKtclpg', NULL, '2025-08-19 10:21:37', '2025-08-19 10:21:37'),
(474, 'lMkwjcDx', 'iwubehexu351@gmail.com', 'SuQFtKtclpg', NULL, '2025-08-19 10:21:42', '2025-08-19 10:21:42'),
(475, 'LeeCow', 'zekisuquc419@gmail.com', '83159913254', 'Ciao, volevo sapere il tuo prezzo.', '2025-08-19 13:44:18', '2025-08-19 13:44:18'),
(476, 'lPqTGHBkAWqXded', 'bowuviticez32@gmail.com', 'azOJldWmaJxUXJD', NULL, '2025-08-19 15:42:41', '2025-08-19 15:42:41'),
(477, 'lPqTGHBkAWqXded', 'bowuviticez32@gmail.com', 'azOJldWmaJxUXJD', NULL, '2025-08-19 15:42:45', '2025-08-19 15:42:45'),
(478, 'dbWdAIkKNVo', 'ohakaxobi498@gmail.com', 'FOdyViBMoWN', NULL, '2025-08-20 10:01:35', '2025-08-20 10:01:35'),
(479, 'dbWdAIkKNVo', 'ohakaxobi498@gmail.com', 'FOdyViBMoWN', NULL, '2025-08-20 10:01:40', '2025-08-20 10:01:40'),
(480, 'Hey 7jhrz9o\r\n >>> https://sf9m34v8vg.com/?qhbga0y  #Lolllukazzzur333\r\n <<< 7045803', 'fut5@kirzzioh.ru', 'Hello cta3eue\r\n >>> https://gyxjb7dnut.com/?978upzj  #Lolllukazzzur333\r\n <<<', NULL, '2025-08-20 15:29:03', '2025-08-20 15:29:03'),
(481, 'kyPNvlMNfjTCub', 'ohakaxobi498@gmail.com', 'pKjZCioghTya', NULL, '2025-08-20 15:44:25', '2025-08-20 15:44:25'),
(482, 'kyPNvlMNfjTCub', 'ohakaxobi498@gmail.com', 'pKjZCioghTya', NULL, '2025-08-20 15:44:29', '2025-08-20 15:44:29'),
(483, 'QTbENggNfIyt', 'kelseysmith424381@yahoo.com', 'FoIjiOyX', NULL, '2025-08-20 15:59:33', '2025-08-20 15:59:33'),
(484, 'QTbENggNfIyt', 'kelseysmith424381@yahoo.com', 'FoIjiOyX', NULL, '2025-08-20 15:59:38', '2025-08-20 15:59:38'),
(485, 'kcMioLGuQer', 'asitoxakogut56@gmail.com', 'tYXOnxKYSr', NULL, '2025-08-20 22:07:55', '2025-08-20 22:07:55'),
(486, 'kcMioLGuQer', 'asitoxakogut56@gmail.com', 'tYXOnxKYSr', NULL, '2025-08-20 22:07:57', '2025-08-20 22:07:57'),
(487, 'NGmcFMWhaDy', 'avumalab24@gmail.com', 'WsvfkYSiSlYztzZ', NULL, '2025-08-21 14:47:15', '2025-08-21 14:47:15'),
(488, 'NGmcFMWhaDy', 'avumalab24@gmail.com', 'WsvfkYSiSlYztzZ', NULL, '2025-08-21 14:47:18', '2025-08-21 14:47:18'),
(489, 'uxXNBbWyPfQ', 'izovales15@gmail.com', 'MqdDnvok', NULL, '2025-08-21 22:46:11', '2025-08-21 22:46:11'),
(490, 'uxXNBbWyPfQ', 'izovales15@gmail.com', 'MqdDnvok', NULL, '2025-08-21 22:46:14', '2025-08-21 22:46:14'),
(491, 'muubKBpPmsjEtpm', 'ohakaxobi498@gmail.com', 'xlMPhGcvRJkX', NULL, '2025-08-22 16:02:10', '2025-08-22 16:02:10'),
(492, 'muubKBpPmsjEtpm', 'ohakaxobi498@gmail.com', 'xlMPhGcvRJkX', NULL, '2025-08-22 16:02:16', '2025-08-22 16:02:16'),
(493, 'iWpSNIQXeDc', 'nopohufuxej416@gmail.com', 'oVnmGoULoXWH', NULL, '2025-08-22 21:09:48', '2025-08-22 21:09:48'),
(494, 'iWpSNIQXeDc', 'nopohufuxej416@gmail.com', 'oVnmGoULoXWH', NULL, '2025-08-22 21:09:50', '2025-08-22 21:09:50'),
(495, 'IrTvVRSDsf', 'ijopakaqovo27@gmail.com', 'YjsudFqqDOj', NULL, '2025-08-23 03:17:42', '2025-08-23 03:17:42'),
(496, 'IrTvVRSDsf', 'ijopakaqovo27@gmail.com', 'YjsudFqqDOj', NULL, '2025-08-23 03:17:47', '2025-08-23 03:17:47'),
(497, 'LeeCow', 'zekisuquc419@gmail.com', '83372939429', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.', '2025-08-23 05:12:41', '2025-08-23 05:12:41'),
(498, 'LeeCow', 'dinanikolskaya99@gmail.com', '85913524746', 'Ola, quería saber o seu prezo.', '2025-08-23 13:40:01', '2025-08-23 13:40:01'),
(499, 'WlElUabxHcHnTk', 'izayobese434@gmail.com', 'fpIapTACBeC', NULL, '2025-08-23 15:24:48', '2025-08-23 15:24:48'),
(500, 'WlElUabxHcHnTk', 'izayobese434@gmail.com', 'fpIapTACBeC', NULL, '2025-08-23 15:24:51', '2025-08-23 15:24:51'),
(501, 'gioJkliSBcPyV', 'efuhedoja636@gmail.com', 'vzJRofIX', NULL, '2025-08-23 20:13:30', '2025-08-23 20:13:30'),
(502, 'gioJkliSBcPyV', 'efuhedoja636@gmail.com', 'vzJRofIX', NULL, '2025-08-23 20:13:36', '2025-08-23 20:13:36'),
(503, 'SimonCow', 'irinademenkova86@gmail.com', '81331456136', 'Sawubona, bengifuna ukwazi intengo yakho.', '2025-08-23 20:43:59', '2025-08-23 20:43:59'),
(504, 'VQxIfJAQRlIEbc', 'qinoqanur664@gmail.com', 'rfezCfeFcR', NULL, '2025-08-24 02:57:10', '2025-08-24 02:57:10'),
(505, 'VQxIfJAQRlIEbc', 'qinoqanur664@gmail.com', 'rfezCfeFcR', NULL, '2025-08-24 02:57:11', '2025-08-24 02:57:11'),
(506, 'bEQbGWROyl', 'vizuzes732@gmail.com', 'ieDUYiYFV', NULL, '2025-08-24 05:02:16', '2025-08-24 05:02:16'),
(507, 'bEQbGWROyl', 'vizuzes732@gmail.com', 'ieDUYiYFV', NULL, '2025-08-24 05:02:19', '2025-08-24 05:02:19'),
(508, 'ZeItPdkoVqW', 'qinoqanur664@gmail.com', 'dRZCSWTFcX', NULL, '2025-08-24 05:58:37', '2025-08-24 05:58:37'),
(509, 'ZeItPdkoVqW', 'qinoqanur664@gmail.com', 'dRZCSWTFcX', NULL, '2025-08-24 05:58:41', '2025-08-24 05:58:41'),
(510, 'GeorgeCow', 'irinademenkova86@gmail.com', '81146445442', 'Szia, meg akartam tudni az árát.', '2025-08-24 16:51:07', '2025-08-24 16:51:07'),
(511, '* * * Free BTC drop - do not be the last to hear about it: http://sinclairdesigns.net/index.php?8tzf02 * * * hs=9a6dff7df50c13c5ef4e47e02c1091db* ххх*', 'paouqua@mailbox.in.ua', '506269707135', '1kawyb', '2025-08-25 02:42:30', '2025-08-25 02:42:30'),
(512, '* * * <a href=\"http://sinclairdesigns.net/index.php?8tzf02\">Your new iPhone 16 is closer than you think</a> * * * hs=9a6dff7df50c13c5ef4e47e02c1091db* ххх*', 'paouqua@mailbox.in.ua', '506269707135', '1kawyb', '2025-08-25 02:42:31', '2025-08-25 02:42:31'),
(513, 'ZhVwNmlItvMSeKa', 'akejuyow05@gmail.com', 'xlKAGHFZL', NULL, '2025-08-25 05:22:19', '2025-08-25 05:22:19'),
(514, 'ZhVwNmlItvMSeKa', 'akejuyow05@gmail.com', 'xlKAGHFZL', NULL, '2025-08-25 05:22:22', '2025-08-25 05:22:22'),
(515, 'XbdZiWGvrSBh', 'ijopakaqovo27@gmail.com', 'nTzSdKuuLZotwIJ', NULL, '2025-08-25 12:05:18', '2025-08-25 12:05:18'),
(516, 'XbdZiWGvrSBh', 'ijopakaqovo27@gmail.com', 'nTzSdKuuLZotwIJ', NULL, '2025-08-25 12:05:23', '2025-08-25 12:05:23'),
(517, 'SvlrKdrLkbFRJOQ', 'fizinapama028@gmail.com', 'sASwkrdfCfVzSal', NULL, '2025-08-25 20:10:23', '2025-08-25 20:10:23'),
(518, 'SvlrKdrLkbFRJOQ', 'fizinapama028@gmail.com', 'sASwkrdfCfVzSal', NULL, '2025-08-25 20:10:28', '2025-08-25 20:10:28'),
(519, 'VHSEhoIVFPf', 'sacerusacayo35@gmail.com', 'dojnyHRnsot', NULL, '2025-08-25 20:14:12', '2025-08-25 20:14:12'),
(520, 'VHSEhoIVFPf', 'sacerusacayo35@gmail.com', 'dojnyHRnsot', NULL, '2025-08-25 20:14:18', '2025-08-25 20:14:18'),
(521, 'LeeCow', 'irinademenkova86@gmail.com', '84811256486', 'Ciao, volevo sapere il tuo prezzo.', '2025-08-25 23:14:26', '2025-08-25 23:14:26'),
(522, 'qNKiNedqG', 'bevicimigib336@gmail.com', 'UNRaJkPTpUz', NULL, '2025-08-26 07:06:04', '2025-08-26 07:06:04'),
(523, 'qNKiNedqG', 'bevicimigib336@gmail.com', 'UNRaJkPTpUz', NULL, '2025-08-26 07:06:12', '2025-08-26 07:06:12'),
(524, 'PypTtzfMRtB', 'ubowufiwuk03@gmail.com', 'vLIDRaxP', NULL, '2025-08-26 10:49:51', '2025-08-26 10:49:51'),
(525, 'PypTtzfMRtB', 'ubowufiwuk03@gmail.com', 'vLIDRaxP', NULL, '2025-08-26 10:49:59', '2025-08-26 10:49:59'),
(526, 'WgNsAZel', 'hoxuboni83@gmail.com', 'yLHjFxklOJTov', NULL, '2025-08-26 21:13:52', '2025-08-26 21:13:52'),
(527, 'cqsoOOXeVe', 'puqudomo677@gmail.com', 'vrTUdjQibZ', NULL, '2025-08-27 00:54:32', '2025-08-27 00:54:32'),
(528, 'cqsoOOXeVe', 'puqudomo677@gmail.com', 'vrTUdjQibZ', NULL, '2025-08-27 00:54:33', '2025-08-27 00:54:33'),
(529, 'LeeCow', 'dinanikolskaya99@gmail.com', '81899822644', 'Hi, I wanted to know your price.', '2025-08-27 01:23:35', '2025-08-27 01:23:35'),
(530, 'lFHBUwde', 'djondixon23@gmail.com', 'sXBQXhyGCToNaf', NULL, '2025-08-27 16:02:41', '2025-08-27 16:02:41'),
(531, 'lFHBUwde', 'djondixon23@gmail.com', 'sXBQXhyGCToNaf', NULL, '2025-08-27 16:02:44', '2025-08-27 16:02:44'),
(532, 'xyGoIsdLVs', 'aqahuru785@gmail.com', 'YLHHNkAVVl', NULL, '2025-08-28 04:45:34', '2025-08-28 04:45:34'),
(533, 'xyGoIsdLVs', 'aqahuru785@gmail.com', 'YLHHNkAVVl', NULL, '2025-08-28 04:45:38', '2025-08-28 04:45:38'),
(534, 'jmANPOGRAVnpDU', 'vexosaribeke99@gmail.com', 'JdRdGrZVjqJ', NULL, '2025-08-28 22:46:23', '2025-08-28 22:46:23'),
(535, 'jmANPOGRAVnpDU', 'vexosaribeke99@gmail.com', 'JdRdGrZVjqJ', NULL, '2025-08-28 22:46:28', '2025-08-28 22:46:28'),
(536, 'zPJRuElI', 'hxgcubpoynjs@yahoo.com', 'lIsRDCTSTyX', NULL, '2025-08-29 01:24:15', '2025-08-29 01:24:15'),
(537, 'zPJRuElI', 'hxgcubpoynjs@yahoo.com', 'lIsRDCTSTyX', NULL, '2025-08-29 01:24:19', '2025-08-29 01:24:19'),
(538, 'SimonCow', 'irinademenkova86@gmail.com', '83474338446', 'Hallo, ek wou jou prys ken.', '2025-08-29 04:25:45', '2025-08-29 04:25:45'),
(539, 'jdwZPdKju', 'kozemeyiq752@gmail.com', 'qZqEMldHM', NULL, '2025-08-29 07:13:12', '2025-08-29 07:13:12'),
(540, 'jdwZPdKju', 'kozemeyiq752@gmail.com', 'qZqEMldHM', NULL, '2025-08-29 07:13:14', '2025-08-29 07:13:14'),
(541, 'rfTDXBPw', 'akejuyow05@gmail.com', 'vEQKYobOsAAcHNN', NULL, '2025-08-30 03:17:33', '2025-08-30 03:17:33'),
(542, 'rfTDXBPw', 'akejuyow05@gmail.com', 'vEQKYobOsAAcHNN', NULL, '2025-08-30 03:17:35', '2025-08-30 03:17:35'),
(543, 'soeghQajryOca', 'akejuyow05@gmail.com', 'CUaNeOVyCKHCC', NULL, '2025-08-30 17:36:31', '2025-08-30 17:36:31'),
(544, 'soeghQajryOca', 'akejuyow05@gmail.com', 'CUaNeOVyCKHCC', NULL, '2025-08-30 17:36:43', '2025-08-30 17:36:43'),
(545, 'JjOLEJRhmdPX', 'oveqawet24@gmail.com', 'hytMzEyP', NULL, '2025-08-30 17:54:52', '2025-08-30 17:54:52'),
(546, 'JjOLEJRhmdPX', 'oveqawet24@gmail.com', 'hytMzEyP', NULL, '2025-08-30 17:54:56', '2025-08-30 17:54:56'),
(547, 'ssWQlmVHIF', 'ayojogab151@gmail.com', 'IIfHejkrAav', NULL, '2025-08-30 23:17:03', '2025-08-30 23:17:03'),
(548, 'ssWQlmVHIF', 'ayojogab151@gmail.com', 'IIfHejkrAav', NULL, '2025-08-30 23:17:04', '2025-08-30 23:17:04'),
(549, 'BhWpzmzW', 'ayayotuyah79@gmail.com', 'SHNSGjLSatOUA', NULL, '2025-08-31 00:08:19', '2025-08-31 00:08:19'),
(550, 'BhWpzmzW', 'ayayotuyah79@gmail.com', 'SHNSGjLSatOUA', NULL, '2025-08-31 00:08:24', '2025-08-31 00:08:24'),
(551, 'mMWWWXskGUxMk', 'ifefavef282@gmail.com', 'GivWFbPfLuRz', NULL, '2025-08-31 15:00:18', '2025-08-31 15:00:18'),
(552, 'mMWWWXskGUxMk', 'ifefavef282@gmail.com', 'GivWFbPfLuRz', NULL, '2025-08-31 15:00:19', '2025-08-31 15:00:19'),
(553, 'eBpzAzCQT', 'baqoman731@gmail.com', 'TXVNrQZv', NULL, '2025-08-31 15:20:15', '2025-08-31 15:20:15'),
(554, 'eBpzAzCQT', 'baqoman731@gmail.com', 'TXVNrQZv', NULL, '2025-08-31 15:20:21', '2025-08-31 15:20:21'),
(555, 'StpIcZom', 'cuzofop300@gmail.com', 'nIVPXEIxGQYG', NULL, '2025-09-01 02:59:20', '2025-09-01 02:59:20'),
(556, 'StpIcZom', 'cuzofop300@gmail.com', 'nIVPXEIxGQYG', NULL, '2025-09-01 02:59:23', '2025-09-01 02:59:23'),
(557, 'GeorgeCow', 'irinademenkova86@gmail.com', '82368973455', 'Прывітанне, я хацеў даведацца Ваш прайс.', '2025-09-01 17:51:40', '2025-09-01 17:51:40'),
(558, 'LeeCow', 'zekisuquc419@gmail.com', '81813263298', 'Aloha, makemake wau eʻike i kāu kumukūʻai.', '2025-09-02 00:59:43', '2025-09-02 00:59:43'),
(559, 'ahAZMqafz', 'izayobese434@gmail.com', 'mwQrlIoRdSyuybs', NULL, '2025-09-02 19:00:36', '2025-09-02 19:00:36'),
(560, 'ahAZMqafz', 'izayobese434@gmail.com', 'mwQrlIoRdSyuybs', NULL, '2025-09-02 19:00:39', '2025-09-02 19:00:39'),
(561, 'LeeCow', 'dinanikolskaya99@gmail.com', '89892527764', 'Salam, qiymətinizi bilmək istədim.', '2025-09-03 20:15:07', '2025-09-03 20:15:07'),
(562, 'rlYkRtzLbCiZyCL', 'exadahafepa12@gmail.com', 'zXkEtbneVSUzWNT', NULL, '2025-09-03 23:10:10', '2025-09-03 23:10:10'),
(563, 'rlYkRtzLbCiZyCL', 'exadahafepa12@gmail.com', 'zXkEtbneVSUzWNT', NULL, '2025-09-03 23:10:12', '2025-09-03 23:10:12'),
(564, 'kajZaMMyOXZZ', 'ihumuzucar85@gmail.com', 'COdSLztvs', NULL, '2025-09-04 22:07:46', '2025-09-04 22:07:46'),
(565, 'kajZaMMyOXZZ', 'ihumuzucar85@gmail.com', 'COdSLztvs', NULL, '2025-09-04 22:07:59', '2025-09-04 22:07:59'),
(566, 'Lavern Terry', 'terry.lavern@outlook.com', '444112368', 'Get 1M guaranteed contact form submissions for $49 — our lowest price. You can email me at filia@trypodgrid.com', '2025-09-05 00:25:23', '2025-09-05 00:25:23'),
(567, 'LeeCow', 'dinanikolskaya99@gmail.com', '86217883345', 'Hallo, ek wou jou prys ken.', '2025-09-06 14:35:59', '2025-09-06 14:35:59'),
(568, 'CHJXZGuRpS', 'aboxozavuxul91@gmail.com', 'HXQpOjGwbWJye', NULL, '2025-09-06 17:19:08', '2025-09-06 17:19:08'),
(569, 'CHJXZGuRpS', 'aboxozavuxul91@gmail.com', 'HXQpOjGwbWJye', NULL, '2025-09-06 17:19:14', '2025-09-06 17:19:14'),
(570, 'dICytIGRgMW', 'ivunitapepik87@gmail.com', 'BeUULqYP', NULL, '2025-09-06 22:00:19', '2025-09-06 22:00:19'),
(571, 'dICytIGRgMW', 'ivunitapepik87@gmail.com', 'BeUULqYP', NULL, '2025-09-06 22:00:24', '2025-09-06 22:00:24'),
(572, 'dHLZyGicjJJBiB', 'bevicimigib336@gmail.com', 'ZbxjJQgugmcDB', NULL, '2025-09-07 01:54:28', '2025-09-07 01:54:28'),
(573, 'dHLZyGicjJJBiB', 'bevicimigib336@gmail.com', 'ZbxjJQgugmcDB', NULL, '2025-09-07 01:54:35', '2025-09-07 01:54:35'),
(574, 'KfarkqtXOIeLwWB', 'pigisilax59@gmail.com', 'sXMYXPwhWNlZwSg', NULL, '2025-09-07 14:04:10', '2025-09-07 14:04:10'),
(575, 'KfarkqtXOIeLwWB', 'pigisilax59@gmail.com', 'sXMYXPwhWNlZwSg', NULL, '2025-09-07 14:04:14', '2025-09-07 14:04:14'),
(576, 'ftuhzrkxlh', 'qopgwyhw@testform.xyz', '+1-065-220-3989', 'oqwdwspupuvqtijidsthzypdyttvjg', '2025-09-07 17:22:55', '2025-09-07 17:22:55'),
(577, 'Marlon Hinz', 'marlon.hinz@googlemail.com', '398844608', 'Here is my site: https://submissiontodirectory.top/', '2025-09-08 01:42:49', '2025-09-08 01:42:49'),
(578, 'lLLMbsrW', 'adarokena54@gmail.com', 'jfcXZZuTeCcYrpe', NULL, '2025-09-08 02:24:06', '2025-09-08 02:24:06'),
(579, 'lLLMbsrW', 'adarokena54@gmail.com', 'jfcXZZuTeCcYrpe', NULL, '2025-09-08 02:24:07', '2025-09-08 02:24:07'),
(580, 'HiOkDKstSj', 'hcbdjhrgx@yahoo.com', 'kftoAKNDzfMNPY', NULL, '2025-09-08 04:32:51', '2025-09-08 04:32:51'),
(581, 'HiOkDKstSj', 'hcbdjhrgx@yahoo.com', 'kftoAKNDzfMNPY', NULL, '2025-09-08 04:32:54', '2025-09-08 04:32:54'),
(582, 'Mira Jemison', 'mira.jemison@googlemail.com', '9280218766', 'Here is my site: https://submissiontodirectory.top/', '2025-09-08 06:17:33', '2025-09-08 06:17:33'),
(583, 'YZljTUUUEnlE', 'wocorop498@gmail.com', 'YqQHTyLo', NULL, '2025-09-08 15:21:57', '2025-09-08 15:21:57'),
(584, 'YZljTUUUEnlE', 'wocorop498@gmail.com', 'YqQHTyLo', NULL, '2025-09-08 15:22:01', '2025-09-08 15:22:01'),
(585, 'sMeSzhBM', 'rirayeben593@gmail.com', 'uBmNokiAqJWbHb', NULL, '2025-09-09 02:36:33', '2025-09-09 02:36:33'),
(586, 'sMeSzhBM', 'rirayeben593@gmail.com', 'uBmNokiAqJWbHb', NULL, '2025-09-09 02:36:34', '2025-09-09 02:36:34'),
(587, 'hsQbrMrJ', 'afomufivik35@gmail.com', 'nGqOCUZTIrlZsPG', NULL, '2025-09-09 10:02:52', '2025-09-09 10:02:52'),
(588, 'hsQbrMrJ', 'afomufivik35@gmail.com', 'nGqOCUZTIrlZsPG', NULL, '2025-09-09 10:02:55', '2025-09-09 10:02:55'),
(589, 'WpNFfaPkyRaK', 'vedavimequd744@gmail.com', 'JsccQAvrpz', NULL, '2025-09-09 13:23:23', '2025-09-09 13:23:23'),
(590, 'WpNFfaPkyRaK', 'vedavimequd744@gmail.com', 'JsccQAvrpz', NULL, '2025-09-09 13:23:28', '2025-09-09 13:23:28'),
(591, 'GLZCoBFofUudAZ', 'ihigakuhe54@gmail.com', 'ffOfFZPLeiE', NULL, '2025-09-10 01:53:14', '2025-09-10 01:53:14'),
(592, 'GLZCoBFofUudAZ', 'ihigakuhe54@gmail.com', 'ffOfFZPLeiE', NULL, '2025-09-10 01:53:15', '2025-09-10 01:53:15'),
(593, 'zYEfhCIeCSIDimL', 'sumimosuxig804@gmail.com', 'AMszJMMhkHEDB', NULL, '2025-09-10 06:42:11', '2025-09-10 06:42:11'),
(594, 'zYEfhCIeCSIDimL', 'sumimosuxig804@gmail.com', 'AMszJMMhkHEDB', NULL, '2025-09-10 06:42:12', '2025-09-10 06:42:12'),
(595, 'salma', 'admin@example.com', '06664550953', 'csqdcq', '2025-09-10 09:47:17', '2025-09-10 09:47:17'),
(596, 'jfTHREcgVOqKSQT', 'ayojogab151@gmail.com', 'JnPPlyQARhSo', NULL, '2025-09-10 12:29:14', '2025-09-10 12:29:14'),
(597, 'jfTHREcgVOqKSQT', 'ayojogab151@gmail.com', 'JnPPlyQARhSo', NULL, '2025-09-10 12:29:19', '2025-09-10 12:29:19'),
(598, 'FJjiaEFxpHas', 'afomufivik35@gmail.com', 'oqlYUEFUgTKD', NULL, '2025-09-11 05:03:22', '2025-09-11 05:03:22'),
(599, 'FJjiaEFxpHas', 'afomufivik35@gmail.com', 'oqlYUEFUgTKD', NULL, '2025-09-11 05:03:29', '2025-09-11 05:03:29'),
(600, 'xdsfAekrKifOB', 'cuzofop300@gmail.com', 'PBnirLaV', NULL, '2025-09-11 20:56:07', '2025-09-11 20:56:07'),
(601, 'xdsfAekrKifOB', 'cuzofop300@gmail.com', 'PBnirLaV', NULL, '2025-09-11 20:56:12', '2025-09-11 20:56:12'),
(602, 'NEGtvsMmxSZkzYq', 'iwubehexu351@gmail.com', 'iyIkUgUNoj', NULL, '2025-09-11 21:14:22', '2025-09-11 21:14:22'),
(603, 'NEGtvsMmxSZkzYq', 'iwubehexu351@gmail.com', 'iyIkUgUNoj', NULL, '2025-09-11 21:14:25', '2025-09-11 21:14:25'),
(604, 'RAjEIEuQoILW', 'uxaruqupim71@gmail.com', 'QLunJfmGvFnZz', NULL, '2025-09-12 04:41:22', '2025-09-12 04:41:22'),
(605, 'RAjEIEuQoILW', 'uxaruqupim71@gmail.com', 'QLunJfmGvFnZz', NULL, '2025-09-12 04:41:29', '2025-09-12 04:41:29'),
(606, 'GkBlmzTCpJBZKe', 'fujepeheqo765@gmail.com', 'SAwiTrNaTOdvX', NULL, '2025-09-12 22:33:09', '2025-09-12 22:33:09'),
(607, 'GkBlmzTCpJBZKe', 'fujepeheqo765@gmail.com', 'SAwiTrNaTOdvX', NULL, '2025-09-12 22:33:14', '2025-09-12 22:33:14'),
(608, 'GAckCYTcGh', 'leyedovoz13@gmail.com', 'yoZPHNyYVItfS', NULL, '2025-09-13 22:29:11', '2025-09-13 22:29:11'),
(609, 'GAckCYTcGh', 'leyedovoz13@gmail.com', 'yoZPHNyYVItfS', NULL, '2025-09-13 22:29:16', '2025-09-13 22:29:16'),
(610, 'SimonCow', 'irinademenkova86@gmail.com', '85984861668', 'Szia, meg akartam tudni az árát.', '2025-09-14 05:56:50', '2025-09-14 05:56:50'),
(611, 'RPPCBMQUrx', 'nevanmarchegfw7@yahoo.com', 'yBwckRZdbXVEuN', NULL, '2025-09-14 14:36:49', '2025-09-14 14:36:49'),
(612, 'RPPCBMQUrx', 'nevanmarchegfw7@yahoo.com', 'yBwckRZdbXVEuN', NULL, '2025-09-14 14:36:54', '2025-09-14 14:36:54'),
(613, 'MichaelLaugs', 'nomin.momin+477o7@mail.ru', '81676622259', 'Mfwdjwdhefiejfh fhiwuewuoioruiwes jkcsjhcksdlalsdjfhgh ejdowkkDIEWHRUEOFIW JIEWFOKDWDJEWIHFIEWFJEWFJIkhfjejfie efjfwjdfe smart-events.ma', '2025-09-14 14:48:53', '2025-09-14 14:48:53'),
(614, 'dfdbDGEncKv', 'ayayotuyah79@gmail.com', 'lSrdlUgM', NULL, '2025-09-15 03:05:31', '2025-09-15 03:05:31'),
(615, 'dfdbDGEncKv', 'ayayotuyah79@gmail.com', 'lSrdlUgM', NULL, '2025-09-15 03:05:37', '2025-09-15 03:05:37'),
(616, 'alyXJFMCZKpHCl', 'dypjffroqlviryhal@yahoo.com', 'ISNORVHhhhtW', NULL, '2025-09-15 03:18:37', '2025-09-15 03:18:37'),
(617, 'alyXJFMCZKpHCl', 'dypjffroqlviryhal@yahoo.com', 'ISNORVHhhhtW', NULL, '2025-09-15 03:18:53', '2025-09-15 03:18:53'),
(618, 'LeeCow', 'dinanikolskaya99@gmail.com', '89248864394', 'Hi, ego volo scire vestri pretium.', '2025-09-15 05:50:05', '2025-09-15 05:50:05'),
(619, 'LeeCow', 'zekisuquc419@gmail.com', '88438438672', 'Hej, jeg ønskede at kende din pris.', '2025-09-15 11:59:49', '2025-09-15 11:59:49'),
(620, 'AzNGNvYXwrEElhf', 'ricurasa247@gmail.com', 'byXeZubXPfcYYXE', NULL, '2025-09-15 15:32:36', '2025-09-15 15:32:36'),
(621, 'AzNGNvYXwrEElhf', 'ricurasa247@gmail.com', 'byXeZubXPfcYYXE', NULL, '2025-09-15 15:32:37', '2025-09-15 15:32:37'),
(622, 'aswCoclubB', 'ipozuyucun610@gmail.com', 'mxpVNinEtcOtQml', NULL, '2025-09-16 07:05:48', '2025-09-16 07:05:48'),
(623, 'aswCoclubB', 'ipozuyucun610@gmail.com', 'mxpVNinEtcOtQml', NULL, '2025-09-16 07:05:59', '2025-09-16 07:05:59'),
(624, 'VOuBBzgXmHz', 'muzokol468@gmail.com', 'YRwMtIWc', NULL, '2025-09-16 08:20:48', '2025-09-16 08:20:48'),
(625, 'VOuBBzgXmHz', 'muzokol468@gmail.com', 'YRwMtIWc', NULL, '2025-09-16 08:20:51', '2025-09-16 08:20:51'),
(626, 'LeeCow', 'dinanikolskaya99@gmail.com', '87716687436', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.', '2025-09-16 13:54:19', '2025-09-16 13:54:19'),
(627, 'LeeCow', 'irinademenkova86@gmail.com', '81461251973', 'Hæ, ég vildi vita verð þitt.', '2025-09-16 15:32:52', '2025-09-16 15:32:52'),
(628, 'LeeCow', 'zekisuquc419@gmail.com', '81284399318', 'Ndewo, achọrọ m ịmara ọnụahịa gị.', '2025-09-16 17:45:17', '2025-09-16 17:45:17'),
(629, 'yNAKjgidste', 'osuceyix712@gmail.com', 'vErGuSHDqb', NULL, '2025-09-16 20:46:35', '2025-09-16 20:46:35'),
(630, 'yNAKjgidste', 'osuceyix712@gmail.com', 'vErGuSHDqb', NULL, '2025-09-16 20:46:36', '2025-09-16 20:46:36'),
(631, 'NnnDKDGNBt', 'rlmf94oo4rbxxuw@yahoo.com', 'oyHjOWQFk', NULL, '2025-09-17 23:49:19', '2025-09-17 23:49:19'),
(632, 'NnnDKDGNBt', 'rlmf94oo4rbxxuw@yahoo.com', 'oyHjOWQFk', NULL, '2025-09-17 23:49:23', '2025-09-17 23:49:23'),
(633, 'RobertMak', 'herihendrayana001@gmail.com', '81677557764', 'We Picked You: A Special Prize Awaits. https://telegra.ph/Win-iPhones-Samsung-09-18-3329?2r3o6s5e6n6rbjy', '2025-09-19 19:25:06', '2025-09-19 19:25:06'),
(634, 'mjTIUIbb', 'linakale89@gmail.com', 'SnHQQNBmYJLxm', NULL, '2025-09-20 08:46:21', '2025-09-20 08:46:21'),
(635, 'mjTIUIbb', 'linakale89@gmail.com', 'SnHQQNBmYJLxm', NULL, '2025-09-20 08:46:34', '2025-09-20 08:46:34'),
(636, 'LeeCow', 'irinademenkova86@gmail.com', '81535466582', 'Dia duit, theastaigh uaim do phraghas a fháil.', '2025-09-21 02:30:27', '2025-09-21 02:30:27'),
(637, 'Ken Sherrod', 'kenp2025x@yahoo.com', '3936510257', 'Was just browsing the site and was impressed the layout. Nicely design and great user experience. Just had to drop a message, have a great day! we7f8sd82', '2025-09-21 11:31:57', '2025-09-21 11:31:57'),
(638, 'LeeCow', 'zekisuquc419@gmail.com', '81328228596', 'Sawubona, bengifuna ukwazi intengo yakho.', '2025-09-21 16:48:03', '2025-09-21 16:48:03'),
(639, 'GeorgeCow', 'irinademenkova86@gmail.com', '88126125171', 'Hola, volia saber el seu preu.', '2025-09-22 10:26:40', '2025-09-22 10:26:40'),
(640, 'hFoFEQLttzpsurM', 'acigagay29@gmail.com', 'bnCYvLVRmzu', NULL, '2025-09-22 18:43:23', '2025-09-22 18:43:23'),
(641, 'hFoFEQLttzpsurM', 'acigagay29@gmail.com', 'bnCYvLVRmzu', NULL, '2025-09-22 18:43:28', '2025-09-22 18:43:28'),
(642, 'cKpOKjQuTSRL', 'azaxiyaxehiy17@gmail.com', 'aDQwmRFBqugVmeV', NULL, '2025-09-22 18:51:37', '2025-09-22 18:51:37'),
(643, 'cKpOKjQuTSRL', 'azaxiyaxehiy17@gmail.com', 'aDQwmRFBqugVmeV', NULL, '2025-09-22 18:51:43', '2025-09-22 18:51:43'),
(644, 'TvcLcLInijicPKJ', 'ehiruxav43@gmail.com', 'DNKybSjMmkcEuq', NULL, '2025-09-22 21:52:51', '2025-09-22 21:52:51'),
(645, 'TvcLcLInijicPKJ', 'ehiruxav43@gmail.com', 'DNKybSjMmkcEuq', NULL, '2025-09-22 21:52:55', '2025-09-22 21:52:55'),
(646, 'OYMeqbggoe', 'ogemevevix82@gmail.com', 'yKsYNgpsVs', NULL, '2025-09-23 12:49:48', '2025-09-23 12:49:48'),
(647, 'OYMeqbggoe', 'ogemevevix82@gmail.com', 'yKsYNgpsVs', NULL, '2025-09-23 12:49:54', '2025-09-23 12:49:54'),
(648, 'LeeCow', 'dinanikolskaya99@gmail.com', '87464292442', 'Sveiki, es gribēju zināt savu cenu.', '2025-09-23 22:22:46', '2025-09-23 22:22:46'),
(649, 'FiwJOvMp', 'vekoxul955@gmail.com', 'LsBVFsMGwqZz', NULL, '2025-09-24 21:47:48', '2025-09-24 21:47:48'),
(650, 'FiwJOvMp', 'vekoxul955@gmail.com', 'LsBVFsMGwqZz', NULL, '2025-09-24 21:47:49', '2025-09-24 21:47:49'),
(651, 'Isaacdip', 'busby8774@gmail.com', '86917522357', 'Very depraved girls want sex with you only on this dating site https://coeurapie.fr/util_url.php?lien=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F3638', '2025-09-25 22:49:59', '2025-09-25 22:49:59'),
(652, 'AmeliaAdase', 'ameliaDaunda785@yahoo.com', '83297961896', 'Hé, je viens de tomber sur votre site... êtes-vous toujours aussi doué pour attirer l\'attention, ou l\'avez-vous fait juste pour moi? Écrivez-moi sur ce site --- rb.gy/3pma6x?Adase  --- mon nom d\'utilisateur est le même, j\'attendrai.', '2025-09-26 04:10:04', '2025-09-26 04:10:04'),
(653, 'Lee Warf', 'warf.lee@outlook.com', NULL, 'Here is my site: https://submissiontodirectory.top/', '2025-09-26 19:10:09', '2025-09-26 19:10:09'),
(654, 'OQJYbXiGB', 'gavecepuxum463@gmail.com', 'RlyXTHEDCktAhYp', NULL, '2025-09-26 19:34:59', '2025-09-26 19:34:59'),
(655, 'OQJYbXiGB', 'gavecepuxum463@gmail.com', 'RlyXTHEDCktAhYp', NULL, '2025-09-26 19:35:06', '2025-09-26 19:35:06'),
(656, 'YShdJpzQLSANgJ', 'apucotafac92@gmail.com', 'FZQLlPuLHYbWUGB', NULL, '2025-09-26 20:05:26', '2025-09-26 20:05:26'),
(657, 'YShdJpzQLSANgJ', 'apucotafac92@gmail.com', 'FZQLlPuLHYbWUGB', NULL, '2025-09-26 20:05:43', '2025-09-26 20:05:43'),
(658, 'Isaacdip', 'kumbackking@gmail.com', '88881638855', 'VERY DEPRAVED GIRLS MEET FOR SEX ONLY HERE http://t.3deals.pl/tracker?s=19&u=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F3773&sr=', '2025-09-27 09:13:52', '2025-09-27 09:13:52'),
(659, 'SimonCow', 'irinademenkova86@gmail.com', '87123396857', 'Здравейте, исках да знам цената ви.', '2025-09-28 03:34:51', '2025-09-28 03:34:51'),
(660, 'Isaacdip', 'aaliyahmb501@gmail.com', '82366515732', 'Very depraved women are looking for sex for one time only here http://httpbin.org/redirect-to?url=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F9360', '2025-09-28 20:08:05', '2025-09-28 20:08:05'),
(661, 'zMMhEhByZcCmoa', 'rampesadw38rojkvic@yahoo.com', 'XaLvSTgPhwbgp', NULL, '2025-09-29 05:48:19', '2025-09-29 05:48:19'),
(662, 'zMMhEhByZcCmoa', 'rampesadw38rojkvic@yahoo.com', 'XaLvSTgPhwbgp', NULL, '2025-09-29 05:48:21', '2025-09-29 05:48:21'),
(663, 'HnjXilAd', 'vxdngylgkw@yahoo.com', 'YEUvthuHeMW', NULL, '2025-09-29 19:36:35', '2025-09-29 19:36:35'),
(664, 'HnjXilAd', 'vxdngylgkw@yahoo.com', 'YEUvthuHeMW', NULL, '2025-09-29 19:36:44', '2025-09-29 19:36:44'),
(665, 'UNHiHySpF', 'rgrocittxukjsbyw@yahoo.com', 'fjnDLVHCQ', NULL, '2025-09-29 21:43:53', '2025-09-29 21:43:53'),
(666, 'UNHiHySpF', 'rgrocittxukjsbyw@yahoo.com', 'fjnDLVHCQ', NULL, '2025-09-29 21:43:55', '2025-09-29 21:43:55'),
(667, 'udXUVgSbG', 'ibawidixin816@gmail.com', 'bFLXJYHFLnUZR', NULL, '2025-09-30 11:21:40', '2025-09-30 11:21:40'),
(668, 'udXUVgSbG', 'ibawidixin816@gmail.com', 'bFLXJYHFLnUZR', NULL, '2025-09-30 11:21:46', '2025-09-30 11:21:46'),
(669, 'LeeCow', 'dinanikolskaya99@gmail.com', '89348983712', 'Hola, quería saber tu precio..', '2025-09-30 17:56:10', '2025-09-30 17:56:10'),
(670, 'LeeCow', 'dinanikolskaya99@gmail.com', '85247942812', 'Salut, ech wollt Äre Präis wëssen.', '2025-10-03 01:13:50', '2025-10-03 01:13:50'),
(671, 'djxzzktugq', 'thdgnsxk@testform.xyz', '+1-304-060-5879', 'vqlpuvurtvmyeqoujvrlztwfpptkdo', '2025-10-03 09:33:28', '2025-10-03 09:33:28'),
(672, 'Mellisa Coats', 'coats.mellisa@msn.com', '338826110', 'Flash Offer: Submit to 2M Sites — 50% Off This Week. You’re reading this. So will your next 2 million. Contact me at: phil.marketing@form-blast-promo.top', '2025-10-04 20:38:53', '2025-10-04 20:38:53'),
(673, 'GeorgeCow', 'dinanikolskaya99@gmail.com', '87243244175', 'Kaixo, zure prezioa jakin nahi nuen.', '2025-10-05 16:47:17', '2025-10-05 16:47:17'),
(674, 'Jorge Kabu', 'jorge.kabu@yahoo.com', '121708559', 'https://postyouradfree.top\r\nhttp://postyouradfree.top', '2025-11-06 20:15:36', '2025-11-06 20:15:36'),
(675, 'IsabellaAdase1270', 'oliviadom955475@yahoo.com', '88738355769', '\"Magnifique nymphomane aspire à la libération.\"Ici --  https://rb.gy/8rrwju?Viartic', '2025-11-15 17:48:51', '2025-11-15 17:48:51'),
(676, 'LeeCow', 'zekisuquc419@gmail.com', '88626345854', 'Ola, quería saber o seu prezo.', '2025-11-15 21:23:01', '2025-11-15 21:23:01'),
(677, 'LeeCow', 'dinanikolskaya99@gmail.com', '89143773843', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.', '2025-11-16 18:48:07', '2025-11-16 18:48:07'),
(678, 'AmeliaAdase5602', 'ameliadom207613@yahoo.com', '82298198126', 'La tentatrice méchante a besoin d\'exposer sa chair nue. Ici  --   rb.gy/8rrwju?Adase', '2025-11-28 06:30:20', '2025-11-28 06:30:20'),
(679, 'bZHgeXwdKULcDMuvU', 'womowaheh123@gmail.com', '9067301213', 'YkwGZqOLKiruGZHSfkHVuM', '2025-12-23 08:42:41', '2025-12-23 08:42:41'),
(680, 'RobertCow', 'zekisuquc419@gmail.com', '89444411856', 'Hi, I wanted to know your price.', '2026-01-13 10:08:36', '2026-01-13 10:08:36'),
(681, 'OSiKbalPAroLmoXhVbHgJJ', 'ka.jixi.x.o.go.j9.45@gmail.com', '2239763288', 'rpDdiUtZLcPbgKqHy', '2026-01-31 04:29:03', '2026-01-31 04:29:03'),
(682, 'EmmaAdase5190', 'emmadom488144@hotmail.com', '87485229452', 'CanвЂ™t stop touching myself, watch me live on my site.   -  telegra.ph/Enter-01-31?Adase', '2026-02-02 22:35:44', '2026-02-02 22:35:44'),
(683, 'Lonny Down', 'hello@stepconceptagency.com', '43623965', 'Bonjour, souhaitez-vous positionner votre site\r\nsmart-events.ma en première page de Google ?\r\n\r\nPreuve : https://shorturl.at/v0VRn\r\n\r\nCordialement,', '2026-03-27 17:34:41', '2026-03-27 17:34:41'),
(684, 'Letha Ludowici', 'hello@stepconceptagency.com', '3547185409', 'Bonjour, souhaitez-vous positionner votre site\r\nsmart-events.ma en première page de Google ?\r\n\r\nPreuve : https://shorturl.at/v0VRn\r\n\r\nCordialement,', '2026-03-27 17:58:54', '2026-03-27 17:58:54'),
(685, 'RobertCow', 'zekisuquc419@gmail.com', '86861973535', 'Hi, kam dashur të di çmimin tuaj', '2026-04-07 16:51:23', '2026-04-07 16:51:23'),
(686, 'RobertCow', 'zekisuquc419@gmail.com', '83127422885', 'Sawubona, bengifuna ukwazi intengo yakho.', '2026-04-25 01:04:07', '2026-04-25 01:04:07'),
(687, 'sekri', 'info@dlfkjsldfj.Com', '987890987', 'sdfsdf', '2026-04-30 12:47:05', '2026-04-30 12:47:05'),
(688, 'cbvjyeshxxmWVIubWnwSGVk', 'co.p.ise.y.iga219@gmail.com', '3440463018', 'nbRgrRkvEmmoXXBfEEjB', '2026-05-07 05:19:11', '2026-05-07 05:19:11');

-- --------------------------------------------------------

--
-- Structure de la table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int UNSIGNED NOT NULL,
  `data_type_id` int UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '{}', 2),
(31, 5, 'category_id', 'text', 'Category', 0, 0, 1, 1, 1, 0, '{}', 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '{}', 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '{}', 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '{}', 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 5, 'img1', 'image', 'Img1', 0, 1, 1, 1, 1, 1, '{}', 16),
(57, 5, 'img2', 'image', 'Img2', 0, 1, 1, 1, 1, 1, '{}', 17),
(58, 5, 'img3', 'image', 'Img3', 0, 1, 1, 1, 1, 1, '{}', 18),
(59, 5, 'date', 'date', 'Date', 0, 1, 1, 1, 1, 1, '{}', 19),
(60, 7, 'id', 'text', 'Id', 1, 0, 1, 0, 0, 0, '{}', 1),
(61, 7, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(62, 7, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 3),
(63, 7, 'number', 'text', 'Number', 0, 1, 1, 1, 1, 1, '{}', 4),
(64, 7, 'message', 'text', 'Message', 0, 1, 1, 1, 1, 1, '{}', 5),
(65, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(66, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7);

-- --------------------------------------------------------

--
-- Structure de la table `data_types`
--

CREATE TABLE `data_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2024-09-02 11:49:19', '2024-09-02 15:26:07'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(7, 'contacts', 'contacts', 'Contact', 'Contacts', NULL, 'App\\Contact', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2024-09-02 15:53:01', '2024-09-02 15:53:01');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-09-02 11:49:19', '2024-09-02 11:49:19');

-- --------------------------------------------------------

--
-- Structure de la table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2024-09-02 11:49:19', '2024-09-02 11:49:19', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 4, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2024-09-02 11:49:19', '2024-09-02 11:49:19', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2024-09-02 11:49:19', '2024-12-17 10:51:53', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 10, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2024-09-02 11:49:19', '2024-12-17 10:51:53', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2024-09-02 11:49:20', '2024-12-17 10:51:53', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2024-09-02 11:49:20', '2024-12-17 10:51:53', 'voyager.pages.index', NULL),
(14, 1, 'Contacts', '', '_self', 'voyager-bubble', '#000000', NULL, 3, '2024-09-02 15:53:01', '2024-12-17 10:52:32', 'voyager.contacts.index', 'null');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2016_01_01_000000_create_pages_table', 2),
(26, '2016_01_01_000000_create_posts_table', 2),
(27, '2016_02_15_204651_create_categories_table', 2),
(28, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(29, '2024_09_03_092001_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2024-09-02 11:49:20', '2024-09-02 11:49:20');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(2, 'browse_bread', NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(3, 'browse_database', NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(4, 'browse_media', NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(5, 'browse_compass', NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(6, 'browse_menus', 'menus', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(7, 'read_menus', 'menus', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(8, 'edit_menus', 'menus', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(9, 'add_menus', 'menus', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(10, 'delete_menus', 'menus', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(11, 'browse_roles', 'roles', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(12, 'read_roles', 'roles', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(13, 'edit_roles', 'roles', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(14, 'add_roles', 'roles', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(15, 'delete_roles', 'roles', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(16, 'browse_users', 'users', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(17, 'read_users', 'users', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(18, 'edit_users', 'users', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(19, 'add_users', 'users', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(20, 'delete_users', 'users', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(21, 'browse_settings', 'settings', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(22, 'read_settings', 'settings', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(23, 'edit_settings', 'settings', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(24, 'add_settings', 'settings', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(25, 'delete_settings', 'settings', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(26, 'browse_categories', 'categories', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(27, 'read_categories', 'categories', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(28, 'edit_categories', 'categories', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(29, 'add_categories', 'categories', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(30, 'delete_categories', 'categories', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(31, 'browse_posts', 'posts', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(32, 'read_posts', 'posts', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(33, 'edit_posts', 'posts', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(34, 'add_posts', 'posts', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(35, 'delete_posts', 'posts', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(36, 'browse_pages', 'pages', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(37, 'read_pages', 'pages', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(38, 'edit_pages', 'pages', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(39, 'add_pages', 'pages', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(40, 'delete_pages', 'pages', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(41, 'browse_contacts', 'contacts', '2024-09-02 15:53:01', '2024-09-02 15:53:01'),
(42, 'read_contacts', 'contacts', '2024-09-02 15:53:01', '2024-09-02 15:53:01'),
(43, 'edit_contacts', 'contacts', '2024-09-02 15:53:01', '2024-09-02 15:53:01'),
(44, 'add_contacts', 'contacts', '2024-09-02 15:53:01', '2024-09-02 15:53:01'),
(45, 'delete_contacts', 'contacts', '2024-09-02 15:53:01', '2024-09-02 15:53:01');

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `img1`, `img2`, `img3`, `date`) VALUES
(5, 1, 1, 'La 7ème édition des Rencontres Africaines', NULL, NULL, '<p>La 7&egrave;me &eacute;dition des Rencontres Africaines de l\'efficacit&eacute; &eacute;nerg&eacute;tique s\'est d&eacute;roul&eacute;e avec succ&egrave;s sous le haut-patronage de Sa Majest&eacute; le Roi Mohamed VI, et l\'&eacute;gide du Minist&egrave;re de la Transition Energ&eacute;tique et du D&eacute;veloppement Durable du Royaume du Maroc. Cet &eacute;v&eacute;nement majeur a &eacute;t&eacute; orchestr&eacute; par l\'Agence Marocaine pour l\'Efficacit&eacute; &Eacute;nerg&eacute;tique (AMEE), en collaboration avec l\'Association Marocaine des Professionnels du Froid et AOB GROUP.</p>\r\n<p>Les dates du 22 et 23 septembre 2022 ont &eacute;t&eacute; marqu&eacute;es par une convergence exceptionnelle d\'experts, de professionnels, et de d&eacute;cideurs du secteur de l\'&eacute;nergie, venant du Maroc et d\'autres pays africains. Le lieu choisi pour cet &eacute;change de connaissances et d\'exp&eacute;riences &eacute;tait le prestigieux Grand Mogador &agrave; Casablanca.</p>\r\n<p>Sous le th&egrave;me de l\'efficacit&eacute; &eacute;nerg&eacute;tique, les d&eacute;bats et les ateliers ont abord&eacute; des questions cruciales li&eacute;es &agrave; la transition &eacute;nerg&eacute;tique en Afrique. Les participants ont eu l\'occasion d\'explorer des solutions innovantes, de partager les meilleures pratiques, et de discuter des d&eacute;fis actuels et futurs li&eacute;s &agrave; la gestion efficiente de l\'&eacute;nergie sur le continent.</p>\r\n<p>Cet &eacute;v&eacute;nement B2B a &eacute;t&eacute; marqu&eacute; par des interventions de haut niveau, des pr&eacute;sentations techniques pointues, ainsi que des rencontres informelles propices aux &eacute;changes fructueux. L\'int&eacute;gration d\'&eacute;l&eacute;ments digitaux et l\'organisation exemplaire de l\'exposition ont permis aux participants de vivre une exp&eacute;rience enrichissante.</p>\r\n<p>La pr&eacute;sence de personnalit&eacute;s &eacute;minentes du domaine a renforc&eacute; la port&eacute;e et l\'impact de ces Rencontres Africaines de l\'efficacit&eacute; &eacute;nerg&eacute;tique, contribuant ainsi &agrave; stimuler la coop&eacute;ration et le partage de connaissances entre les acteurs cl&eacute;s du secteur &eacute;nerg&eacute;tique en Afrique, tout en faisant de cet &eacute;v&eacute;nement un forum incontournable pour les futures discussions sur l\'efficacit&eacute; &eacute;nerg&eacute;tique.</p>', 'posts\\September2024\\cEj1cWwjlE2CJRr3Vhak.webp', 'la-7eme-edition-des-rencontres-africaines', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:09:53', '2024-09-03 12:50:18', 'posts\\September2024\\SRKnVcLHymkfSCB8fnaL.webp', 'posts\\September2024\\wCzhrKvwBOniRV4znLnE.webp', 'posts\\September2024\\DzT3nnLwXIHWWjj20kWd.webp', '2023-10-25'),
(6, 1, 1, 'Un Gala Inoubliable pour le Personnel d\'Airbus', NULL, NULL, '<p>Le 7 janvier 2024 demeurera inoubliable pour le personnel d&eacute;vou&eacute; d\'Airbus, alors que le Pavillon Othali &agrave; Casablanca s\'est transform&eacute; en un lieu extraordinaire de c&eacute;l&eacute;bration et de reconnaissance. D&egrave;s les premi&egrave;res lueurs du matin, une aura d\'anticipation a impr&eacute;gn&eacute; le lieu, &eacute;voluant au fil de la journ&eacute;e en un espace vibrant d&eacute;di&eacute; &agrave; l\'inspiration et &agrave; la motivation, mettant en lumi&egrave;re les contributions exceptionnelles de l\'&eacute;quipe Airbus.La journ&eacute;e, orchestr&eacute;e de main de ma&icirc;tre par le c&eacute;l&egrave;bre animateur Rachid Idrissi, a &eacute;t&eacute; ponctu&eacute;e d\'activit&eacute;s stimulantes et de moments inspirants. Sa pr&eacute;sence charismatique a ajout&eacute; une touche sp&eacute;ciale &agrave; l\'&eacute;v&eacute;nement, tandis que le com&eacute;dien Rachid Rafik, avec son humour contagieux et sa pr&eacute;sence joviale, a transform&eacute; la c&eacute;r&eacute;monie en un spectacle divertissant, faisant r&eacute;sonner des rires et des applaudissements.Les photographes pr&eacute;sents ont fig&eacute; sur pellicule les instants de fiert&eacute; et de bonheur qui se lisaient sur les visages des laur&eacute;ats. En fin de journ&eacute;e, l\'apog&eacute;e tant attendue s\'est d&eacute;voil&eacute;e lors de la c&eacute;r&eacute;monie de remise des troph&eacute;es. Chaque r&eacute;compense, tel un symbole &eacute;clatant de r&eacute;ussite, a d&eacute;clench&eacute; un tonnerre d\'applaudissements et d\'enthousiasme, cr&eacute;ant une atmosph&egrave;re vibrante et festive qui a marqu&eacute; le point culminant de cette journ&eacute;e m&eacute;morable.</p>', 'posts\\September2024\\KDYfVBlq4YIm3CVEAYEg.webp', 'un-gala-inoubliable-pour-le-personnel-d-airbus', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:11:12', '2024-09-03 10:03:32', 'posts\\September2024\\32Zsyn1PmoVolchvJMVG.webp', 'posts\\September2024\\N8D6i0wB7iRGitvcyVjr.webp', 'posts\\September2024\\BZCAIyNxxZuqdImu6teg.webp', '2024-01-07'),
(7, 1, 1, 'Forum-Exposition internationale REFRIGAIREXPO', NULL, NULL, '<p class=\"MsoNormal\">REFRIGAIRE-Expo, qui a illumin&eacute; le Centre International de Conf&eacute;rences et d\'Expositions de l\'Office des Changes &agrave; CASABLANCA du 10 au 12 octobre 2023, organis&eacute;e par l\'Association Marocaine des Professionnels du Froid, s\'est affirm&eacute;e comme un &eacute;v&eacute;nement incontournable dans le domaine de la r&eacute;frig&eacute;ration et de la climatisation. Cet &eacute;v&eacute;nement d\'envergure internationale a rassembl&eacute; une impressionnante cohorte de plus de 150 exposants et a accueilli plus de 5000 visiteurs professionnels venus du monde entier.</p>\r\n<p class=\"MsoNormal\">Ce lieu embl&eacute;matique a &eacute;t&eacute; le th&eacute;&acirc;tre d\'un forum vibrant d\'innovations et de connaissances, marquant ainsi une &eacute;tape cruciale dans l\'&eacute;volution de l\'industrie. Les exposants, repr&eacute;sentant des entreprises de premier plan, ont d&eacute;voil&eacute; une panoplie &eacute;blouissante de technologies de pointe. Des syst&egrave;mes de climatisation intelligents aux solutions de gestion thermique les plus modernes, chaque stand &eacute;tait une vitrine captivante des derni&egrave;res avanc&eacute;es du secteur.</p>\r\n<p class=\"MsoNormal\">Les d&eacute;monstrations en direct ont permis aux visiteurs de comprendre concr&egrave;tement le fonctionnement de ces technologies, offrant une exp&eacute;rience immersive unique.</p>\r\n<p class=\"MsoNormal\">Au-del&agrave; de l\'exposition, REFRIGAIRE-Expo a &eacute;t&eacute; le th&eacute;&acirc;tre de conf&eacute;rences de haut niveau anim&eacute;es par des experts renomm&eacute;s. Ces sessions ont abord&eacute; des sujets cruciaux, tels que les d&eacute;fis actuels de l\'efficacit&eacute; &eacute;nerg&eacute;tique, les nouvelles normes environnementales, et les tendances &eacute;mergentes qui red&eacute;finissent le paysage de la r&eacute;frig&eacute;ration.</p>\r\n<p class=\"MsoNormal\">Le salon a &eacute;galement jou&eacute; un r&ocirc;le essentiel en favorisant le r&eacute;seautage et les partenariats strat&eacute;giques. Les 5000 visiteurs professionnels ont eu l\'opportunit&eacute; d\'interagir avec des leaders de l\'industrie, d\'&eacute;changer des id&eacute;es et de forger des collaborations prometteuses. Les discussions anim&eacute;es dans les couloirs et les espaces de r&eacute;seautage ont contribu&eacute; &agrave; renforcer les liens au sein de la communaut&eacute; professionnelle.</p>\r\n<p class=\"MsoNormal\">En conclusion, REFRIGAIRE-Expo a &eacute;t&eacute; bien plus qu\'un simple salon. Il a incarn&eacute; une plateforme holistique o&ugrave; l\'innovation, l\'&eacute;ducation, et les opportunit&eacute;s commerciales ont converg&eacute; de mani&egrave;re harmonieuse. Cet &eacute;v&eacute;nement B2B restera grav&eacute; dans les m&eacute;moires comme un moment cl&eacute; pour l\'industrie de la r&eacute;frig&eacute;ration et de la climatisation, jetant les bases d\'une future collaboration et de progr&egrave;s significatifs, tout en soulignant l\'importance de l\'organisation d\'expositions digitales &agrave; travers des forums sp&eacute;cialis&eacute;s.</p>', 'posts\\September2024\\cKs6aTHjRBuhTPtQqbfg.webp', 'forum-exposition-internationale-refrigairexpo', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:13:51', '2024-09-03 09:58:19', 'posts\\September2024\\Ahv9TEc95zk7qadJAeMD.webp', 'posts\\September2024\\9D6INQ5xlSOhSEbzfnbt.webp', 'posts\\September2024\\kpNWedtXe4aibMEAnCm6.webp', '2023-10-12'),
(8, 1, 1, 'Forum International de la Plasturgie', NULL, NULL, '<p>La 10&egrave;me &eacute;dition du Forum International de la Plasturgie, qui a illumin&eacute; les 28 et 29 juin 2022 au Hyatt Regency Conf&eacute;rences and Shows Casablanca, a marqu&eacute; un salon significatif dans l\'histoire de cette manifestation incontournable. Cet &eacute;v&eacute;nement embl&eacute;matique a transform&eacute; l\'espace en un v&eacute;ritable hub d\'innovation, de collaboration, et de d&eacute;couvertes au c&oelig;ur de Casablanca.</p>\r\n<p>Durant ces deux journ&eacute;es captivantes, plus de 200 exposants ont d&eacute;voil&eacute; leurs derni&egrave;res avanc&eacute;es technologiques et solutions novatrices, offrant ainsi aux visiteurs un aper&ccedil;u approfondi des tendances actuelles et futures de la plasturgie. Les d&eacute;monstrations en direct ont permis une immersion pratique dans l\'univers dynamique de cette industrie en constante &eacute;volution.</p>\r\n<p>La 10&egrave;me &eacute;dition du Forum a &eacute;galement accueilli des conf&eacute;rences anim&eacute;es par des experts &eacute;minents, explorant des th&egrave;mes cruciaux tels que la durabilit&eacute;, la num&eacute;risation de la production, et les d&eacute;fis environnementaux. Ces sessions ont offert une vision approfondie des enjeux cl&eacute;s qui red&eacute;finissent le paysage de la plasturgie.</p>\r\n<p>Cet &eacute;v&eacute;nement B2B a &eacute;t&eacute; le lieu de rencontres fructueuses, ouvrant des portes &agrave; de nouvelles opportunit&eacute;s de collaborations strat&eacute;giques entre les professionnels du secteur. La participation de milliers de professionnels du monde entier a cr&eacute;&eacute; une atmosph&egrave;re dynamique de r&eacute;seautage et de partage d\'exp&eacute;riences.</p>\r\n<p>Gr&acirc;ce &agrave; une organisation exemplaire, l\'&eacute;v&eacute;nement a &eacute;galement int&eacute;gr&eacute; des &eacute;l&eacute;ments digitaux et une exposition de pointe, &eacute;tablissant un nouveau standard pour les forums et expositions futurs dans l\'industrie de la plasturgie.</p>', 'posts\\September2024\\RpabE83YeSxTiUOdHrIn.webp', 'forum-international-de-la-plasturgie', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:16:50', '2024-09-03 12:01:05', 'posts\\September2024\\bRt0gSi2z3njHhJXwdPN.webp', 'posts\\September2024\\teE81aZNoVqsqiW5nbUy.webp', 'posts\\September2024\\7RNgMGLWJjgpxMFHZUxW.webp', '2022-06-28'),
(9, 1, 1, 'Forum International Du Froid Et Climatisation', NULL, NULL, '<p>la 5&eacute;me &eacute;dition de la journ&eacute;e mondiale du froid organis&eacute;e par l\'association Marocaine des professionnels du froid, marqu&eacute;e le 13 Juin 2023 &agrave; l\'H&ocirc;tel du grand Mogador Casablanca, Cet espace virtuel est d&eacute;di&eacute; &agrave; la discussion et &agrave; l\'&eacute;change d\'informations entre professionnels, experts et passionn&eacute;s du domaine du froid et de la climatisation &agrave; l\'&eacute;chelle mondiale.</p>', 'posts\\September2024\\TQ8eL74vXTyFbYZkeEE9.webp', 'forum-international-du-froid-et-climatisation', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:18:39', '2024-09-03 07:53:11', 'posts\\September2024\\dnZVIn8udMKCgxczO62U.webp', 'posts\\September2024\\y7lwuNcgbxK8Dl7yXMpr.webp', 'posts\\September2024\\KP5yxkVlOMTaV9GDcvym.webp', '2023-06-13'),
(10, 1, 1, 'Forum International De L’Industrie Halieutique', NULL, NULL, '<p>Le Forum International de l&rsquo;Industrie Halieutique, qui a illumin&eacute; le 15 mai 2024 &agrave; Casablanca, a &eacute;merg&eacute; comme un &eacute;v&eacute;nement incontournable sous l&rsquo;&eacute;gide du Minist&egrave;re de l&rsquo;Agriculture, du D&eacute;veloppement Rural et des Eaux et For&ecirc;ts ainsi que du Minist&egrave;re de l&rsquo;Industrie et du Commerce, et organis&eacute; par la F&eacute;d&eacute;ration Nationale des Industries de Transformation et de Valorisation des Produits de la P&ecirc;che (FENIP).</p>\r\n<p>L&rsquo;atmosph&egrave;re &eacute;tait &eacute;lectrique, remplie de la palpitation de discussions anim&eacute;es et de d&eacute;monstrations passionnantes. Les stands color&eacute;s et bien am&eacute;nag&eacute;s ont attir&eacute; l&rsquo;attention avec des technologies de pointe, des &eacute;quipements de p&ecirc;che de haute qualit&eacute;, et des produits marins frais et app&eacute;tissants.</p>\r\n<p>Les participants, v&ecirc;tus de tenues vari&eacute;es repr&eacute;sentant leur culture et leur profession, ont navigu&eacute; &agrave; travers les all&eacute;es, &eacute;changeant des sourires et des poign&eacute;es de main, tissant des liens commerciaux et des r&eacute;seaux internationaux.</p>\r\n<p>Cet &eacute;v&eacute;nement B2B d&eacute;gageait l&rsquo;ar&ocirc;me sal&eacute; de la mer, combin&eacute; aux d&eacute;licieuses senteurs des produits de la mer qui attiraient les visiteurs vers les stands de d&eacute;gustation. Des conf&eacute;rences et des tables rondes ont &eacute;t&eacute; organis&eacute;es pour discuter de la durabilit&eacute;, de la pr&eacute;servation des ressources marines, et des bonnes pratiques dans l&rsquo;industrie de la p&ecirc;che.</p>\r\n<p>C&rsquo;&eacute;tait un lieu o&ugrave; l&rsquo;innovation rencontrait la tradition, o&ugrave; les march&eacute;s mondiaux se connectaient, et o&ugrave; la passion pour l&rsquo;oc&eacute;an unissait les participants dans un engagement envers un avenir durable pour cette industrie. Cet &eacute;v&eacute;nement a brill&eacute; par son organisation exemplaire et son int&eacute;gration de solutions digitales, faisant de cette exposition et forum une plateforme strat&eacute;gique pour le d&eacute;veloppement de l&rsquo;industrie halieutique &agrave; l&rsquo;&eacute;chelle internationale.</p>', 'posts\\September2024\\csZff9HJcaNX3dF26G4B.webp', 'forum-international-de-l-industrie-halieutique', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:28:40', '2024-09-03 11:29:23', 'posts\\September2024\\3IboxoYVPEI8Fxh8MoWa.webp', 'posts\\September2024\\cM7aJaFVNns4ddz3fiYo.webp', 'posts\\September2024\\pKMsMYyeVq3FZgaGyZyh.webp', '2024-05-15'),
(11, 1, 1, 'La 6ème édition de la Journée Mondiale', NULL, NULL, '<p>La 6&egrave;me &eacute;dition de la Journ&eacute;e Mondiale du Froid, qui s\'est d&eacute;roul&eacute;e le 4 juillet 2024 &agrave; l\'H&ocirc;tel Marriott Casablanca, a &eacute;t&eacute; un &eacute;v&eacute;nement m&eacute;morable et significatif. Sous le th&egrave;me \"Temperature Matters\", cette journ&eacute;e a mis en avant l\'importance vitale de la r&eacute;gulation thermique dans notre quotidien, un sujet d\'autant plus pertinent en cette ann&eacute;e marquant le bicentenaire de la naissance de Lord Kelvin, figure embl&eacute;matique de la thermodynamique.</p>\r\n<p>Organis&eacute;e par l\'Association Marocaine des Professionnels du Froid (AMPF), l\'&eacute;v&eacute;nement a d&eacute;but&eacute; avec une allocution d\'ouverture inspirante, rappelant l\'impact profond de la temp&eacute;rature sur divers aspects de notre vie, allant de la conservation des aliments et des m&eacute;dicaments &agrave; la cr&eacute;ation d\'environnements de vie et de travail confortables. Les conf&eacute;renciers, experts renomm&eacute;s dans le domaine, ont partag&eacute; leurs connaissances et leurs derni&egrave;res recherches, offrant au public un aper&ccedil;u des innovations actuelles et futures en mati&egrave;re de technologies de r&eacute;frig&eacute;ration et de climatisation.</p>\r\n<p>Des ateliers interactifs et des sessions de r&eacute;seautage ont permis aux participants d\'&eacute;changer des id&eacute;es et de discuter des d&eacute;fis et des opportunit&eacute;s dans ce forum B2B. L\'exposition associ&eacute;e a pr&eacute;sent&eacute; les derni&egrave;res avanc&eacute;es technologiques, avec des d&eacute;monstrations de produits innovants et des solutions &eacute;cologiques pour une r&eacute;gulation thermique efficace.</p>\r\n<p>L\'&eacute;v&eacute;nement a &eacute;galement &eacute;t&eacute; marqu&eacute; par des discussions enrichissantes sur les impacts environnementaux et les responsabilit&eacute;s des professionnels du froid dans la lutte contre le changement climatique. Les d&eacute;bats ont soulign&eacute; l\'importance de d&eacute;velopper des pratiques durables et des technologies &eacute;co-responsables pour r&eacute;duire l\'empreinte carbone. Cet &eacute;v&eacute;nement s\'est distingu&eacute; par son organisation impeccable, l\'int&eacute;gration d\'&eacute;l&eacute;ments digitaux, et sa capacit&eacute; &agrave; cr&eacute;er une plateforme d\'expositions incontournable pour les acteurs de l\'industrie du froid.</p>', 'posts\\September2024\\kEKJLRemWXnJfADAZzVA.webp', 'la-6eme-edition-de-la-journee-mondiale', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:38:24', '2024-09-03 11:54:10', 'posts\\September2024\\yFWpEgVj9BAxivTy25QX.webp', 'posts\\September2024\\hQD13EUrHRJXRNEWllsa.webp', 'posts\\September2024\\ukabuwglmUZUmVJq8JSs.webp', '2024-07-04'),
(12, 1, 1, 'Forum Exposition International de Plasturgie', NULL, NULL, '<p><span style=\"color: rgb(0, 0, 0);\">La 11&egrave;me &eacute;dition du Forum Exposition International de Plasturgie, organis&eacute;e par l\'Association Marocaine de Plasturgie (FMP), s\'est tenue du 26 au 28 juin &agrave; la Foire Internationale de Casablanca (OFEC). Cet &eacute;v&eacute;nement de grande envergure a rassembl&eacute; des professionnels, des experts et des passionn&eacute;s du secteur de la plasturgie, offrant une plateforme de choix pour les &eacute;changes et les d&eacute;couvertes.</span></p>\r\n<p><span style=\"color: rgb(0, 0, 0);\">Pendant trois jours, les participants ont pu assister &agrave; des conf&eacute;rences enrichissantes, d&eacute;couvrir les derni&egrave;res innovations technologiques, et explorer les nouvelles tendances du march&eacute;. Des ateliers interactifs et des stands d\'exposition ont permis de mettre en lumi&egrave;re les avanc&eacute;es en mati&egrave;re de mat&eacute;riaux plastiques, de proc&eacute;d&eacute;s de fabrication, et de solutions durables pour un avenir plus &eacute;cologique.</span></p>\r\n<p><span style=\"color: rgb(0, 0, 0);\">Ce forum B2B a &eacute;galement &eacute;t&eacute; l\'occasion de renforcer les partenariats et de favoriser la collaboration entre les acteurs nationaux et internationaux du secteur, consolidant ainsi la position du Maroc comme un hub strat&eacute;gique dans l\'industrie de la plasturgie. L\'&eacute;v&eacute;nement s\'est d&eacute;marqu&eacute; par son organisation exemplaire et sa capacit&eacute; &agrave; int&eacute;grer des &eacute;l&eacute;ments digitaux, faisant de cette exposition une r&eacute;f&eacute;rence incontournable pour les futures &eacute;ditions.</span></p>', 'posts\\September2024\\d0Jn2ZFAvjyEwb9VMPYd.webp', 'forum-exposition-international-de-plasturgie', NULL, NULL, 'PUBLISHED', 0, '2024-09-02 13:47:29', '2024-09-03 10:08:53', 'posts\\September2024\\gze9lR3XZnBWLA5AXZk2.webp', 'posts\\September2024\\x0OFYUFd3w7RIP1fIDSI.webp', 'posts\\September2024\\Mcn7VqTyUzu87ik9P214.webp', '2024-06-26'),
(13, 1, 1, 'Le Salon Immotech-Protech Expo', 'Organisation d’évènements : l\'Immotech-Protech Expo', 'L\'Immotech-Protech Expo 2023 a rassemblé plus de 150 exposants du secteur immobilier pour des démonstrations en direct, des conférences et des rencontres B2B. Organisé par notre agence événementielle, cet événement a mis en lumière les dernières innovations technologiques et les opportunités de collaboration dans l\'industrie.', '<p style=\"text-align: justify;\"><strong>Les 20 et 21 septembre 2023</strong> ont marqu&eacute; des journ&eacute;es exceptionnelles pour <strong>l\'Immotech-Protech Expo</strong>, un &eacute;v&eacute;nement phare dans le secteur immobilier, organis&eacute; par notre agence &eacute;v&eacute;nementielle.</p>\r\n<p style=\"text-align: justify;\">Ce salon de renom a servi de carrefour d\'id&eacute;es, d\'innovations et de collaborations, offrant une immersion totale dans l\'&eacute;cosyst&egrave;me dynamique de l\'immobilier et d&eacute;montrant l\'expertise dans l\'organisation d\'&eacute;v&eacute;nements de grande envergure.</p>\r\n<p style=\"text-align: justify;\">&Agrave; travers les all&eacute;es du Salon, plus de <strong>150 exposants </strong>ont pr&eacute;sent&eacute; leurs derni&egrave;res innovations, allant des technologies de construction de pointe aux solutions intelligentes pour les b&acirc;timents, prouvant qu\'il est possible d\'organiser un &eacute;v&eacute;nement d\'envergure et innovant.</p>\r\n<p style=\"text-align: justify;\">Cet &eacute;v&eacute;nement, qui fait partie des plus importants &eacute;v&egrave;nements d\'entreprise, a inclus des conf&eacute;rences anim&eacute;es par des experts renomm&eacute;s, constituant une plateforme de partage de connaissances et abordant des sujets cruciaux tels que :&nbsp;</p>\r\n<ul>\r\n<li style=\"text-align: justify;\"><strong>La durabilit&eacute;.</strong></li>\r\n<li style=\"text-align: justifyt;\"><strong>L\'impact environnemental.</strong></li>\r\n<li style=\"text-align: justify;\"><strong>Les opportunit&eacute;s de transformation num&eacute;rique dans le secteur.</strong></li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Ces sessions ont ouvert des horizons strat&eacute;giques et inspir&eacute; une r&eacute;flexion profonde sur les d&eacute;fis et les opportunit&eacute;s &agrave; venir.</p>\r\n<p style=\"text-align: justify;\"><strong>L\'Immotech-Protech Expo</strong> a &eacute;t&eacute; un lieu de convergence pour les rencontres professionnelles, favorisant des &eacute;changes fructueux lors des rencontres B2B.</p>\r\n<p style=\"text-align: justify;\">Ces moments de r&eacute;seautage, parfaitement orchestr&eacute;s par l\'agence &eacute;v&eacute;nementielle <strong>Smart Expos and Events Morocco</strong>, ont cr&eacute;&eacute; une toile de connexions propice &agrave; l\'&eacute;mergence de nouvelles collaborations et &agrave; la consolidation des relations professionnelles.</p>', 'posts\\September2024\\9ta6VSBcvceou0bhtoS1.webp', 'le-salon-immotech-protech-expo', 'Découvrez comment notre agence événementielle a organisé avec succès l\'Immotech-Protech Expo 2023, un événement incontournable du secteur immobilier, avec des démonstrations innovantes et des opportunités B2B.', 'Agence événementielle, organisation d\'événements, organiser un événement, évènements d\'entreprise, salon immobilier, Immotech-Protech Expo, réseautage professionnel, innovation immobilière', 'PUBLISHED', 0, '2024-09-02 15:21:38', '2024-09-30 14:50:39', 'posts\\September2024\\P1Jpz3ZWNEs00HBez6z6.webp', 'posts\\September2024\\LhgKwyNHJfYIKWzcKPUN.webp', 'posts\\September2024\\bVPMTA5Q06zL0ACY7sxf.webp', '2023-09-20');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2024-09-02 11:49:19', '2024-09-02 11:49:19'),
(2, 'user', 'Normal User', '2024-09-02 11:49:19', '2024-09-02 11:49:19');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
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
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1XB0nWGZSyCHZgysfEfZ9OZFH5Vdy9kDCLZ1RRlT', NULL, '43.130.44.254', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGFlUDNSRlZFTlYzM1RCQ3pnMnl2d3RzNW9aVHZBb2ZTS2VwaXRJZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNtYXJ0LWV2ZW50cy5tYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779031859),
('5AtAwSEkPnqnfzDpxBQatJN6Gf5URMfp66RHzeXu', NULL, '34.174.111.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 13_5) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Safari/605.1.15', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYUhyTjMyVVBGWFl5dlB5NUNPVzJMUWoxWHpzNTU5VEdqVmZFaFk1eiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037111),
('97tKUKctFsoM0EN9DF5JFjxNTWNZ5Be5AJCKWOea', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.74 Safari/537.36 Edg/79.0.309.43', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZWQwdktPd2g2dThFTDNNMGs2Rk5QTU5RZk4wSHg5WnBReVl3Z1JYaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037333),
('atKYfjmDLN3vs0yWoS2ObOmkeHj6slIHFxUdihkB', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.7444.175 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGx5RndxMlRONWNiM1VodkY5STBqemp6TGpac3h0MVdNZDc1T2RXZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vc21hcnQtZXZlbnRzLm1hL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037376),
('e62iRJDwGSWKCes0STngZlFHda41XJRO8KkpgbGh', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.74 Safari/537.36 Edg/79.0.309.43', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYXBtdEkwR1dxSFFadUtFMGkwN2xrSlZXVXJ1NFVxRVJyN0hCMGJ2SyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037473),
('ePR4Rep6qgAQEQ4zfHC3tPJozrwzYBFoHpKeqa0I', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.74 Safari/537.36 Edg/79.0.309.43', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaEFwQjJ1NXlRamY2N29YQTc1M3Q4RnIybUx5VUN1aFVGMjBHNlhOZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037474),
('iGw7n44BfstLGhEgGl723JH78pI8fxCJDYAwUiL6', NULL, '66.132.172.110', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2FBVTJZdThndHdrNHM5TVRPNjl6ZGJNMXB4M0c3RHdUbWZIUHRpOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc21hcnQtZXZlbnRzLm1hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779032918),
('jFrYsmJoOoE2TdUVtHS7fY0fU5WOXFuRQ34KqKT0', NULL, '220.181.108.92', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNk9qaUY3akpLQnNnb3kxb3QxR3Q0TkU1UXhJd2FiNGRvN0V6OGZzZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNtYXJ0LWV2ZW50cy5tYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779031229),
('kKO3Ij4YXoxDjTAWRXiGgXq2U774B9v5j6Hirg8i', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.74 Safari/537.36 Edg/79.0.309.43', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMENDZUxEQWJLa2NXT2Z0ZE51VGNBdlBzYnFVOG5kSGZHak5xbVlOdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037475),
('lTmTrWAZRjeLu3NOOQrmUeSPhzsfXka8XFxkWnw3', NULL, '114.119.154.215', 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (HTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN05UcHZEdGpTQ1VwYWVJSWxmQmYyVmJ4cm1RT0U1bGVKZmJ1VmxMVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8vc21hcnQtZXZlbnRzLm1hL3Bvc3QvbGUtc2Fsb24taW1tb3RlY2gtcHJvdGVjaC1leHBvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779031342),
('nTT3GmsFN379JfwBNl0oAQY6hE1NuPno35ifj37g', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.74 Safari/537.36 Edg/79.0.309.43', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRktvYTdvbU91T1dvRGtBcE5yRkJEcFVucTRlVDlsRFFVSFJaVGRteiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037474),
('PSvwc6CYmvVOENEuQxpJgBn4NUX49Q0XRAPtXHcQ', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.74 Safari/537.36 Edg/79.0.309.43', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieGpvVHpYdDlHcWMxQ09zUnJWWTd3WWo1R3M3a0NUZm5YN3J3dklKSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037334),
('TjLlxslFrM2Mvnc9bkoXPl4i7raSRyG60q3GtWvq', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.7444.162 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1V0eTB4eWR4bDR1OThKM21ibU1QRFJiN0FwVlNxc053Qk1Ua0dMUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc21hcnQtZXZlbnRzLm1hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037238),
('VuWNJxY8rZcsklL67670H65FCyBrm4HfHmFOcnn8', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.7444.175 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVJKTXZoWjdaM000cGR4dDRkR3FiRlgwMnBRT0JGdVVOWmpBZmJBNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vc21hcnQtZXZlbnRzLm1hL3NhbG9ucyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779037376),
('ya1cy7bMoUzwo54hNxCmK1tCGMiSdT0Ax4HrmHWm', NULL, '31.189.147.129', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 15_4_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.6998.88 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNmhPSTZLaUpwU2l0ZDBrd2g1eXliRWJCaFZNbWYxemdRRElEYWpHTiI7czo2OiJsb2NhbGUiO3M6MjoiZW4iO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIzOiJodHRwczovL3NtYXJ0LWV2ZW50cy5tYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1779037566),
('yr6vcf1er9QNK7AM0aTAWeeNcV5v25ill6UBNWdA', NULL, '72.152.84.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.7444.175 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjVSRTEwek14Q1IzMVh1NDNSc0pwRmY4amZEZmp2RENRMmplZ25uZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc21hcnQtZXZlbnRzLm1hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1779037376);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Agence Événementielle à Casablanca - Organisation d\'Événements et Salons Professionnels', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'SEEM, agence événementielle à Casablanca, organise des événements B2B, salons, séminaires d’entreprise. Expertise en organisation de salons à Casablanca.', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'about.title', 'Title', 'À Propos de Smart-Expos & Events Morocco | Agence Événementielle Innovante', NULL, 'text', 6, 'about'),
(12, 'evenements.title', 'TITLE', 'événements - Smart expos et events Morocco, des salons et forums professionnels', NULL, 'text', 7, 'evenements'),
(13, 'evenements.description', 'DESCRIPTION', 'Découvrez les événements majeurs de Smart Expos : forums, salons, et expositions professionnelles à Casablanca et au Maroc. Rejoignez-nous pour des opportunités B2B.', NULL, 'text', 8, 'evenements'),
(14, 'galerie.title', 'TITLE', 'Galerie - événements et rencontres B2B smart expos et events Morocco', NULL, 'text', 9, 'galerie'),
(15, 'galerie.description', 'DESCRIPTION', 'Explorez les photos des événements et rencontres B2B organisés par Smart Expos & Events. Découvrez nos salons, forums, et moments clés en images.', NULL, 'text', 10, 'galerie'),
(16, 'contact.title', 'TITLE', 'Contact - Smart Expos & Events Morocco | Agence Événementielle à Casablanca', NULL, 'text', 11, 'contact'),
(17, 'contact.description', 'DESCRIPTION', 'Contactez Smart Expos & Events pour organiser vos événements B2B et salons à Casablanca. Trouvez-nous à Rue Abou Maâchar ou appelez-nous au +(212) 06 60 00 50 65.', NULL, 'text', 12, 'contact'),
(18, 'site.desription', 'Description', NULL, NULL, 'text', 13, 'Site'),
(19, 'about.description', 'DESCRIPTION', 'Découvrez Smart-Expos & Events Morocco, agence événementielle spécialisée dans l\'organisation d\'expositions, forums et salons à Casablanca, offrant des solutions B2B.', NULL, 'text', 14, 'about'),
(20, '.keywords', 'Keywords', NULL, NULL, 'text', 15, NULL),
(21, 'about.keywords', 'Keywords', '', NULL, 'text', 16, 'about'),
(22, 'evenements.keywords', 'Keywords', '', NULL, 'text', 17, 'evenements'),
(23, 'galerie.keywords', 'Keywords', '', NULL, 'text', 18, 'galerie'),
(24, 'contact.keywords', 'Keywords', '', NULL, 'text', 19, 'contact');

-- --------------------------------------------------------

--
-- Structure de la table `translations`
--

CREATE TABLE `translations` (
  `id` int UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2024-09-02 11:49:20', '2024-09-02 11:49:20'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2024-09-02 11:49:20', '2024-09-02 11:49:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$fJp.2Wn1ZCX7hWqKQeRJlerNT119l4ENqzVdKrhjmZVgmWJUXCe7a', 'GkeChPOAwcVwTjpk4w0CXWHnTMuO4h0qwVnEpfsmJzpIjkzH2il0vA5iQVkb', NULL, '2024-09-02 11:49:19', '2024-09-02 11:49:19');

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Index pour la table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Index pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Index pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Index pour la table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Index pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT pour la table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
