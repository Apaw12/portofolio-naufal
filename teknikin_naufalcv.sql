-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2025 at 11:32 PM
-- Server version: 10.6.24-MariaDB
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teknikin_naufalcv`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Web Development', 'web-development', NULL, NULL),
(5, 'Desain Grafis', 'desain-grafis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `body` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `excerpt`, `body`, `image`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(3, 1, 4, 'Mengenal Lebih Dekat Tailwind CSS', 'tailwind-css-untuk-pemula', 'Pilih salah satu yang sudah ada (misalnya, Web Development atau Desain Grafis).', 'Tailwind CSS adalah framework CSS utility-first yang dikembangkan oleh Adam Wathan, Steve Schoger, dan Jonathan Reinink. Berbeda dengan framework tradisional seperti Bootstrap, Tailwind tidak menyediakan komponen siap pakai (seperti tombol .btn atau kartu .card utuh), melainkan menyediakan kelas utilitas berlevel rendah.\r\n\r\nApa Itu Utility-First? Pendekatan utility-first berarti Anda membangun desain kustom dengan cara menggabungkan kelas-kelas kecil yang hanya melakukan satu hal spesifik. Contohnya, untuk membuat tombol biru dengan padding besar dan teks putih, Anda akan menggabungkan kelas seperti: bg-blue-500, text-white, p-4, dan rounded-lg. Keunggulan utama dari pendekatan ini adalah Anda tidak perlu meninggalkan file HTML Anda. Proses pengembangan menjadi sangat cepat karena developer tidak perlu terus menerus menulis CSS kustom baru atau memberi nama kelas yang sulit.\r\n\r\nMengapa Menggunakan Tailwind CSS?\r\n\r\nPengembangan Cepat: Karena semua kelas sudah tersedia, styling dapat dilakukan langsung di markup HTML.\r\n\r\nKustomisasi Penuh: Anda tidak terikat pada gaya default framework. Setiap elemen dibangun dari dasar, sehingga Anda memiliki kontrol penuh atas desain.\r\n\r\nCSS yang Lebih Kecil: Dengan menghilangkan kelas-kelas yang tidak terpakai (melalui PurgeCSS atau JIT mode), file CSS akhir Anda akan menjadi sangat kecil dan performant.\r\n\r\nTailwind CSS sangat populer di ekosistem Laravel karena sering digunakan bersama dengan stack seperti Livewire dan Vue/React. Ini adalah pilihan yang solid untuk membangun antarmuka admin (seperti yang sedang kita lakukan) maupun landing page yang kompleks dan unik.', 'posts/1763653322_apau.png', 1, NULL, '2025-11-20 08:42:02', '2025-11-20 08:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `technologies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`technologies`)),
  `repo_url` varchar(255) DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `image`, `description`, `technologies`, `repo_url`, `project_url`, `is_featured`, `created_at`, `updated_at`) VALUES
(5, 'MOovers (Aplikasi Tiket Bioskop)', 'moovers-tiket-bioskop', 'projects/1763652504_8.png', 'Aplikasi mobile mockup untuk pembelian tiket bioskop, dibuat dengan Android Studio.', '[\"[\\\"Android Studio\\\"]\"]', 'https://github.com/Apaw12/Moovers', NULL, 1, '2025-11-20 08:28:24', '2025-11-20 08:28:24'),
(6, 'Saving Money (Money Management)', 'saving-money-react-native', 'projects/1763652617_moneysaving.jpg', 'Aplikasi mobile untuk manajemen keuangan pribadi, dibuat dengan React Native.', '[\"[\\\"React Native\\\"]\"]', 'https://github.com/liefhax/MoneySaving.git', NULL, 1, '2025-11-20 08:30:17', '2025-11-20 08:30:17'),
(7, 'NuCle Factory Outlet', 'nucle-factory-outlet', 'projects/1763653841_NUucnle.jpg', 'Katalog e-commerce berbasis web untuk factory outlet, dibuat dengan CodeIgniter.', '[\"[\\\"CodeIgniter\\\"]\"]', 'https://github.com/liefhax/katalog-advance.git', NULL, 1, '2025-11-20 08:50:41', '2025-11-20 08:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Naufal Atillah', 'naufalatilah2005@gmail.com', '$2y$12$hwIWXxoWYaP6fT9S1JmGTu9jvefgVL6jWfgaTKpGhQOdwu4ayXKMe', '2025-11-20 15:13:41', '2025-11-20 08:20:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
