-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 01:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criee`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacs`
--

CREATE TABLE `bacs` (
  `bac_id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bacs`
--

INSERT INTO `bacs` (`bac_id`, `libelle`) VALUES
(1, '15 litres'),
(2, '30 litres'),
(3, '40 litres'),
(4, '60 litres'),
(5, '60 litres ajouré');

-- --------------------------------------------------------

--
-- Table structure for table `bateaus`
--

CREATE TABLE `bateaus` (
  `bateau_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bateaus`
--

INSERT INTO `bateaus` (`bateau_id`, `nom`) VALUES
(1, 'Altai'),
(2, 'Barbarossa'),
(3, 'Caledonia'),
(4, 'Fulda'),
(5, 'Holm');

-- --------------------------------------------------------

--
-- Table structure for table `date_peches`
--

CREATE TABLE `date_peches` (
  `date_id` bigint(20) UNSIGNED NOT NULL,
  `datePeche` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `date_peches`
--

INSERT INTO `date_peches` (`date_id`, `datePeche`) VALUES
(1, '2021-04-01'),
(2, '2021-04-02'),
(3, '2021-04-03'),
(4, '2021-04-04'),
(5, '2021-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `encherirs`
--

CREATE TABLE `encherirs` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `date_enchere` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `encherirs`
--

INSERT INTO `encherirs` (`user_id`, `post_id`, `prix`, `date_enchere`) VALUES
(1, 6, '50.00', '2021-04-30 11:09:22'),
(1, 7, '150.00', '2021-04-30 11:09:59'),
(1, 8, '300.00', '2021-04-30 11:11:06'),
(1, 9, '300.00', '2021-04-30 11:12:48'),
(1, 10, '400.00', '2021-04-30 11:13:41'),
(1, 11, '150.00', '2021-04-30 11:14:16'),
(1, 12, '170.00', '2021-04-30 11:16:20'),
(1, 13, '230.00', '2021-04-30 11:17:08'),
(1, 14, '160.00', '2021-04-30 11:17:48'),
(2, 12, '175.50', '2021-04-30 11:19:13'),
(2, 13, '232.00', '2021-04-30 11:19:04'),
(2, 14, '161.00', '2021-04-30 11:18:40'),
(3, 10, '402.00', '2021-04-30 11:19:46'),
(3, 11, '152.00', '2021-04-30 11:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `especes`
--

CREATE TABLE `especes` (
  `espece_id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `especes`
--

INSERT INTO `especes` (`espece_id`, `libelle`) VALUES
(1, 'La langoustine'),
(2, 'La seiche'),
(3, 'Le merlu'),
(4, 'La crevette'),
(5, 'Le calmar'),
(6, 'Le merlan'),
(7, 'La pieuvre élédone'),
(8, 'Le calmar'),
(9, 'Le tourteau de casier'),
(10, 'L’araignée casier');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_29_102220_create_date_peches_table', 1),
(5, '2021_04_29_102241_create_bacs_table', 1),
(6, '2021_04_29_102256_create_qualites_table', 1),
(7, '2021_04_29_102306_create_presentations_table', 1),
(8, '2021_04_29_102319_create_bateaus_table', 1),
(9, '2021_04_29_102330_create_tailles_table', 1),
(10, '2021_04_29_102343_create_especes_table', 1),
(11, '2021_04_29_102344_create_posts_table', 1),
(12, '2021_04_29_102354_create_encherirs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `author-id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brut` decimal(8,2) NOT NULL,
  `prixDepart` decimal(8,2) NOT NULL,
  `prixPlancher` decimal(8,2) NOT NULL,
  `prixActuel` decimal(8,2) NOT NULL,
  `espece_id` bigint(20) UNSIGNED NOT NULL,
  `taille_id` bigint(20) UNSIGNED NOT NULL,
  `bateau_id` bigint(20) UNSIGNED NOT NULL,
  `bac_id` bigint(20) UNSIGNED NOT NULL,
  `presentation_id` bigint(20) UNSIGNED NOT NULL,
  `qualite_id` bigint(20) UNSIGNED NOT NULL,
  `date_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `author-id`, `created_at`, `updated_at`, `title`, `description`, `img`, `brut`, `prixDepart`, `prixPlancher`, `prixActuel`, `espece_id`, `taille_id`, `bateau_id`, `bac_id`, `presentation_id`, `qualite_id`, `date_id`) VALUES
(6, 1, '2021-04-30 09:09:22', '2021-04-30 09:09:22', 'Merlu Import', 'Espagne', NULL, '10.00', '50.00', '200.00', '50.00', 3, 2, 2, 4, 2, 1, 1),
(7, 1, '2021-04-30 09:09:59', '2021-04-30 09:09:59', 'Calmar Fr', 'Cournouaille', NULL, '30.00', '150.00', '300.00', '150.00', 5, 1, 1, 3, 1, 1, 2),
(8, 1, '2021-04-30 09:11:06', '2021-04-30 09:11:06', 'Langoustine Fr', 'Brest', NULL, '70.00', '300.00', '600.00', '300.00', 1, 4, 5, 5, 6, 2, 5),
(9, 1, '2021-04-30 09:12:48', '2021-04-30 09:12:48', 'Seiche Import', 'Royaume uni', NULL, '40.00', '300.00', '450.00', '300.00', 2, 2, 3, 3, 2, 2, 3),
(10, 1, '2021-04-30 09:13:41', '2021-04-30 09:19:46', 'Crevette Fr', 'L\'annion', NULL, '80.00', '400.00', '600.00', '402.00', 4, 4, 2, 5, 6, 2, 3),
(11, 1, '2021-04-30 09:14:16', '2021-04-30 09:19:42', 'Merlan Fr', 'Brest', NULL, '15.00', '150.00', '200.00', '152.00', 6, 2, 5, 2, 2, 2, 3),
(12, 1, '2021-04-30 09:16:20', '2021-04-30 09:19:13', 'Araignée casier', 'Italie', NULL, '20.00', '170.00', '300.00', '175.50', 10, 2, 1, 4, 1, 2, 1),
(13, 1, '2021-04-30 09:17:08', '2021-04-30 09:19:04', 'Tourteau casier', 'Vannes', NULL, '35.00', '230.00', '390.00', '232.00', 9, 4, 4, 5, 2, 2, 5),
(14, 1, '2021-04-30 09:17:48', '2021-04-30 09:18:40', 'Pieuvre Import', 'Espagne', NULL, '10.00', '160.00', '340.00', '161.00', 7, 4, 5, 3, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `presentation_id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`presentation_id`, `libelle`) VALUES
(1, 'Entier'),
(2, 'Vidé'),
(3, 'Vivant'),
(4, 'Décapité'),
(5, 'Pelé'),
(6, 'Décortiquée');

-- --------------------------------------------------------

--
-- Table structure for table `qualites`
--

CREATE TABLE `qualites` (
  `qualite_id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualites`
--

INSERT INTO `qualites` (`qualite_id`, `libelle`) VALUES
(1, 'Superieure'),
(2, 'Acceptable'),
(3, 'Médiocre');

-- --------------------------------------------------------

--
-- Table structure for table `tailles`
--

CREATE TABLE `tailles` (
  `taille_id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tailles`
--

INSERT INTO `tailles` (`taille_id`, `libelle`) VALUES
(1, '2-8 cm'),
(2, '9-14 cm'),
(3, '15-20 cm'),
(4, '20-25 cm'),
(5, '25-30 cm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_number` bigint(20) NOT NULL,
  `post_code` bigint(20) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `name`, `email`, `email_verified_at`, `password`, `street_name`, `street_number`, `post_code`, `city`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@a.a', NULL, '$2y$10$o5hxyyyOhXvURgMgUPPP5eBpjbk50YgnCRcjN9FK02ef6bcKOsQvm', '1', 1, 1, '1', 'xzCXJ0k3WlhwIiPM7v467ycrPgw23lAKqLm5eLWHgdYrN9gOqI6W3JcHsHdg', '2021-04-29 22:04:02', '2021-04-29 22:04:02'),
(2, 0, 'client', 'client@a.a', NULL, '$2y$10$x9ASgwV1GhfsyePzrhoxOufF2ix2arpNpiSuzSjWmqPsZ40UQeQJS', '1', 1, 1, '1', NULL, '2021-04-29 22:06:21', '2021-04-29 22:06:21'),
(3, 0, 'client2', 'client2@a.a', NULL, '$2y$10$7jMtyV1Vpp/15sKmJMBxl.J8.2WoaLJcR30IaYwh14d5tgAGOMiT2', '3', 3, 3, '3', NULL, '2021-04-30 07:27:00', '2021-04-30 07:27:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacs`
--
ALTER TABLE `bacs`
  ADD PRIMARY KEY (`bac_id`);

--
-- Indexes for table `bateaus`
--
ALTER TABLE `bateaus`
  ADD PRIMARY KEY (`bateau_id`);

--
-- Indexes for table `date_peches`
--
ALTER TABLE `date_peches`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `encherirs`
--
ALTER TABLE `encherirs`
  ADD PRIMARY KEY (`user_id`,`post_id`,`prix`),
  ADD KEY `encherirs_post_id_foreign` (`post_id`);

--
-- Indexes for table `especes`
--
ALTER TABLE `especes`
  ADD PRIMARY KEY (`espece_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_author_id_foreign` (`author-id`),
  ADD KEY `posts_espece_id_foreign` (`espece_id`),
  ADD KEY `posts_taille_id_foreign` (`taille_id`),
  ADD KEY `posts_bateau_id_foreign` (`bateau_id`),
  ADD KEY `posts_bac_id_foreign` (`bac_id`),
  ADD KEY `posts_presentation_id_foreign` (`presentation_id`),
  ADD KEY `posts_qualite_id_foreign` (`qualite_id`),
  ADD KEY `posts_date_id_foreign` (`date_id`);

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`presentation_id`);

--
-- Indexes for table `qualites`
--
ALTER TABLE `qualites`
  ADD PRIMARY KEY (`qualite_id`);

--
-- Indexes for table `tailles`
--
ALTER TABLE `tailles`
  ADD PRIMARY KEY (`taille_id`);

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
-- AUTO_INCREMENT for table `bacs`
--
ALTER TABLE `bacs`
  MODIFY `bac_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bateaus`
--
ALTER TABLE `bateaus`
  MODIFY `bateau_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `date_peches`
--
ALTER TABLE `date_peches`
  MODIFY `date_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `especes`
--
ALTER TABLE `especes`
  MODIFY `espece_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `presentation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qualites`
--
ALTER TABLE `qualites`
  MODIFY `qualite_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tailles`
--
ALTER TABLE `tailles`
  MODIFY `taille_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `encherirs`
--
ALTER TABLE `encherirs`
  ADD CONSTRAINT `encherirs_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `encherirs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author-id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_bac_id_foreign` FOREIGN KEY (`bac_id`) REFERENCES `bacs` (`bac_id`),
  ADD CONSTRAINT `posts_bateau_id_foreign` FOREIGN KEY (`bateau_id`) REFERENCES `bateaus` (`bateau_id`),
  ADD CONSTRAINT `posts_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `date_peches` (`date_id`),
  ADD CONSTRAINT `posts_espece_id_foreign` FOREIGN KEY (`espece_id`) REFERENCES `especes` (`espece_id`),
  ADD CONSTRAINT `posts_presentation_id_foreign` FOREIGN KEY (`presentation_id`) REFERENCES `presentations` (`presentation_id`),
  ADD CONSTRAINT `posts_qualite_id_foreign` FOREIGN KEY (`qualite_id`) REFERENCES `qualites` (`qualite_id`),
  ADD CONSTRAINT `posts_taille_id_foreign` FOREIGN KEY (`taille_id`) REFERENCES `tailles` (`taille_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
