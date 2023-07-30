-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 01:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `status` enum('new','process','sold') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `deskripsi`, `harga_awal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Xsr 155', 'loremqoqp', 100000, 'sold', '2023-03-11 01:36:31', '2023-03-11 01:38:00'),
(2, 'Beat 2021', 'foeqflkqmfqenf', 21000, 'process', '2023-03-11 01:36:57', '2023-03-11 01:36:57'),
(3, 'Macbook', 'dwkoifa', 120, 'process', '2023-03-11 01:44:45', '2023-03-11 01:44:45'),
(5, 'fwaouggfguo', 'joqjfbqo', 38107, 'new', '2023-03-11 02:25:00', '2023-03-11 02:39:43');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_barang`
-- (See below for the actual view)
--
CREATE TABLE `detail_barang` (
`id_barang` bigint(20) unsigned
,`nama_barang` varchar(25)
,`deskripsi` varchar(100)
,`harga_awal` int(11)
,`gambar` varchar(255)
,`status` enum('new','process','sold')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_lelang`
-- (See below for the actual view)
--
CREATE TABLE `detail_lelang` (
`id_lelang` bigint(20) unsigned
,`id_barang` bigint(20) unsigned
,`tgl_mulai` date
,`tgl_akhir` date
,`nama_barang` varchar(25)
,`gambar` varchar(255)
,`deskripsi` varchar(100)
,`harga_awal` double(15,2)
,`harga_akhir` double(15,2)
,`status` enum('open','closed','cancel','confirmed')
,`confirm_date` datetime
,`created_by` bigint(20) unsigned
,`penanggungjawab` varchar(255)
,`created_date` datetime
,`id_masyarakat` bigint(20) unsigned
,`pemenang` varchar(100)
,`email` varchar(100)
,`nik` char(16)
,`jk` enum('Perempuan','Laki-laki')
,`no_hp` varchar(15)
,`alamat` varchar(255)
,`allow_edit` varchar(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_penawaran`
-- (See below for the actual view)
--
CREATE TABLE `detail_penawaran` (
`id_penawaran` bigint(20) unsigned
,`id_masyarakat` bigint(20) unsigned
,`nama_penawar` varchar(100)
,`email_penawar` varchar(100)
,`no_hp` varchar(15)
,`status_penawar` tinyint(4)
,`id_lelang` bigint(20) unsigned
,`tgl_penawaran` datetime
,`id_barang` bigint(20) unsigned
,`nama_barang` varchar(25)
,`deskripsi` varchar(100)
,`gambar` varchar(255)
,`harga_awal` double(15,2)
,`harga_penawaran` double(15,2)
);

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
-- Table structure for table `gambars`
--

CREATE TABLE `gambars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utama` tinyint(4) NOT NULL DEFAULT 1,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambars`
--

INSERT INTO `gambars` (`id`, `id_barang`, `gambar`, `nama_gambar`, `utama`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 1, 'gambar-barang/xvKWA5TWElPrSpgUtUKZZw5xcUOUU3GgpRm36A02.png', 'Xsr 155', 1, 0, '2023-03-11 01:36:31', '2023-03-11 01:36:31'),
(2, 2, 'gambar-barang/mUXIInWaCP9Zfx8kvA3TAogE5TwbTW4a1bZMMKYu.png', 'Beat 2021', 1, 0, '2023-03-11 01:36:57', '2023-03-11 01:36:57'),
(3, 3, 'gambar-barang/Mg5gMRbUqQE1NL5ecQKD7WGrtD4jxiIJipm4OLGO.png', 'Macbook', 1, 0, '2023-03-11 01:44:46', '2023-03-11 01:44:46'),
(5, 5, 'gambar-barang/1O5VjhQjjL7rQoLCLEkOklSW0vtU5hw7TJEMtsM6.jpg', 'fwaouggfguo', 1, 0, '2023-03-11 02:25:00', '2023-03-11 02:25:00');

--
-- Triggers `gambars`
--
DELIMITER $$
CREATE TRIGGER `urutan` BEFORE INSERT ON `gambars` FOR EACH ROW SET NEW.urutan = (SELECT IFNULL((MAX(g.urutan) + 1),0) FROM gambars g WHERE g.id_barang = NEW.id_barang)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `get_max_penawaran`
-- (See below for the actual view)
--
CREATE TABLE `get_max_penawaran` (
`id_lelang` bigint(20) unsigned
,`id_masyarakat` bigint(20) unsigned
,`harga_penawaran` double(15,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `lelangs`
--

CREATE TABLE `lelangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `harga_awal` double(15,2) NOT NULL,
  `status` enum('open','closed','cancel','confirmed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `id_masyarakat` bigint(20) UNSIGNED DEFAULT NULL,
  `harga_akhir` double(15,2) DEFAULT NULL,
  `confirm_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lelangs`
--

INSERT INTO `lelangs` (`id`, `id_barang`, `tgl_mulai`, `tgl_akhir`, `harga_awal`, `status`, `created_by`, `created_date`, `id_masyarakat`, `harga_akhir`, `confirm_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-09', '2023-03-16', 100000.00, 'confirmed', 2, '2023-03-11 08:37:13', 1, 200000.00, '2023-03-11 08:38:12', '2023-03-11 01:37:13', '2023-03-11 01:38:12'),
(2, 2, '2023-03-10', '2023-03-21', 21000.00, 'open', 2, '2023-03-11 08:41:49', NULL, NULL, NULL, '2023-03-11 01:41:49', '2023-03-11 01:41:49'),
(3, 3, '2023-03-10', '2023-03-17', 120.00, 'open', 2, '2023-03-11 08:45:02', NULL, NULL, NULL, '2023-03-11 01:45:02', '2023-03-11 01:45:02'),
(4, 5, '2023-03-15', '2023-03-10', 38107.00, 'cancel', 2, '2023-03-11 09:38:41', NULL, NULL, NULL, '2023-03-11 02:38:41', '2023-03-11 02:39:43');

--
-- Triggers `lelangs`
--
DELIMITER $$
CREATE TRIGGER `insert harga awal` BEFORE INSERT ON `lelangs` FOR EACH ROW SET new.harga_awal = (SELECT harga_awal FROM barangs WHERE id = NEW.id_barang)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update barang` AFTER INSERT ON `lelangs` FOR EACH ROW UPDATE barangs SET status = 'proses' WHERE id = new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `lelang_berlangsung`
-- (See below for the actual view)
--
CREATE TABLE `lelang_berlangsung` (
`id_lelang` bigint(20) unsigned
,`id_barang` bigint(20) unsigned
,`nama_barang` varchar(25)
,`gambar` varchar(255)
,`deskripsi` varchar(100)
,`tgl_mulai` date
,`tgl_akhir` date
,`harga_awal` double(15,2)
,`total_penawaran` bigint(21)
,`harga_tertinggi` double(15,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakats`
--

CREATE TABLE `masyarakats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('Perempuan','Laki-laki') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perempuan',
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_join` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `update_by` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masyarakats`
--

INSERT INTO `masyarakats` (`id`, `email`, `password`, `nik`, `name`, `username`, `jk`, `no_hp`, `alamat`, `tgl_join`, `status`, `update_by`, `update_date`, `created_at`, `updated_at`) VALUES
(1, 'azzamrafizafran@gmail.com', '$2y$10$BONB6GhoTrVWgymG/2kgpepiU6PELCm9WLc68G80fkD7eexsoQWKe', '32010', 'Azzam Rafi Zafran', 'azrazaff', 'Laki-laki', '081384197696', 'kav. Latansa Jl. Veteran 3', '2023-03-11 08:34:52', 1, NULL, NULL, '2023-03-11 01:34:52', '2023-03-11 01:34:52'),
(2, 'rakhis@gmail.com', '$2y$10$LkCA/21tebdQX25TCExISetbV8HgrjaA21zbaG2lfLEgVcbDJg3Ya', '1907', 'Rakhis Yudha', 'raaa', 'Perempuan', '081384197696', 'kav. Latansa Jl. Veteran 3', '2023-03-11 08:59:38', 1, NULL, NULL, '2023-03-11 01:59:38', '2023-03-11 01:59:38');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_10_025316_create_masyarakats_table', 1),
(6, '2023_03_10_032508_create_barangs_table', 1),
(7, '2023_03_10_034907_create_lelangs_table', 1),
(8, '2023_03_10_043502_create_gambars_table', 1),
(9, '2023_03_10_043524_create_penawarans_table', 1);

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
-- Stand-in structure for view `pemenang_lelang`
-- (See below for the actual view)
--
CREATE TABLE `pemenang_lelang` (
`id_lelang` bigint(20) unsigned
,`tgl_mulai` date
,`tgl_akhir` date
,`id_masyarakat` bigint(20) unsigned
,`pemenang` varchar(100)
,`nik` char(16)
,`jk` enum('Perempuan','Laki-laki')
,`email` varchar(100)
,`no_hp` varchar(15)
,`alamat` varchar(255)
,`id_barang` bigint(20) unsigned
,`nama_barang` varchar(25)
,`deskripsi` varchar(100)
,`harga_awal` double(15,2)
,`harga_akhir` double(15,2)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `penawarans`
--

CREATE TABLE `penawarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_masyarakat` bigint(20) UNSIGNED NOT NULL,
  `id_lelang` bigint(20) UNSIGNED NOT NULL,
  `tgl_penawaran` datetime NOT NULL,
  `harga_penawaran` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penawarans`
--

INSERT INTO `penawarans` (`id`, `id_masyarakat`, `id_lelang`, `tgl_penawaran`, `harga_penawaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-11 08:37:38', 200000.00, '2023-03-11 01:37:38', '2023-03-11 01:37:38'),
(2, 1, 3, '2023-03-11 08:46:20', 1200.00, '2023-03-11 01:46:20', '2023-03-11 01:46:20'),
(3, 1, 3, '2023-03-11 09:26:52', 1000.00, '2023-03-11 02:26:52', '2023-03-11 02:26:52'),
(4, 2, 3, '2023-03-11 09:28:45', 1000.00, '2023-03-11 02:28:45', '2023-03-11 02:28:45');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petugas',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `nip`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '21', 'admin@gmail.com', '$2y$10$BONB6GhoTrVWgymG/2kgpepiU6PELCm9WLc68G80fkD7eexsoQWKe', 'admin', 1, NULL, NULL, NULL),
(2, 'petugas', 'petugas', '231', 'petugas@gmail.com', '$2y$10$gAgMpf7gCvMpZV3WH1y.OOvaIeBqMHeKXeQPthpBcEgIX4kk3Wx1q', 'petugas', 1, NULL, '2023-03-11 01:35:57', '2023-03-11 01:35:57');

-- --------------------------------------------------------

--
-- Structure for view `detail_barang`
--
DROP TABLE IF EXISTS `detail_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang`  AS  select `b`.`id` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,`b`.`deskripsi` AS `deskripsi`,`b`.`harga_awal` AS `harga_awal`,`g`.`gambar` AS `gambar`,`b`.`status` AS `status` from (`barangs` `b` left join `gambars` `g` on(`b`.`id` = `g`.`id_barang` and `g`.`utama` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_lelang`
--
DROP TABLE IF EXISTS `detail_lelang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_lelang`  AS  select `a`.`id` AS `id_lelang`,`a`.`id_barang` AS `id_barang`,`a`.`tgl_mulai` AS `tgl_mulai`,`a`.`tgl_akhir` AS `tgl_akhir`,`b`.`nama_barang` AS `nama_barang`,`g`.`gambar` AS `gambar`,`b`.`deskripsi` AS `deskripsi`,`a`.`harga_awal` AS `harga_awal`,`a`.`harga_akhir` AS `harga_akhir`,`a`.`status` AS `status`,`a`.`confirm_date` AS `confirm_date`,`a`.`created_by` AS `created_by`,`c`.`name` AS `penanggungjawab`,`a`.`created_date` AS `created_date`,`a`.`id_masyarakat` AS `id_masyarakat`,`d`.`name` AS `pemenang`,`d`.`email` AS `email`,`d`.`nik` AS `nik`,`d`.`jk` AS `jk`,`d`.`no_hp` AS `no_hp`,`d`.`alamat` AS `alamat`,case when curdate() between `a`.`tgl_mulai` and `a`.`tgl_akhir` then '0' else '1' end AS `allow_edit` from ((((`lelangs` `a` join `barangs` `b` on(`a`.`id_barang` = `b`.`id`)) left join `gambars` `g` on(`g`.`id_barang` = `b`.`id` and `g`.`utama` = 1)) join `users` `c` on(`a`.`created_by` = `c`.`id`)) left join `masyarakats` `d` on(`a`.`id_masyarakat` = `d`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_penawaran`
--
DROP TABLE IF EXISTS `detail_penawaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_penawaran`  AS  select `a`.`id` AS `id_penawaran`,`a`.`id_masyarakat` AS `id_masyarakat`,`m`.`name` AS `nama_penawar`,`m`.`email` AS `email_penawar`,`m`.`no_hp` AS `no_hp`,`m`.`status` AS `status_penawar`,`a`.`id_lelang` AS `id_lelang`,`a`.`tgl_penawaran` AS `tgl_penawaran`,`b`.`id_barang` AS `id_barang`,`c`.`nama_barang` AS `nama_barang`,`c`.`deskripsi` AS `deskripsi`,`d`.`gambar` AS `gambar`,`b`.`harga_awal` AS `harga_awal`,`a`.`harga_penawaran` AS `harga_penawaran` from ((((`penawarans` `a` join `lelangs` `b` on(`a`.`id_lelang` = `b`.`id`)) join `barangs` `c` on(`b`.`id_barang` = `c`.`id`)) left join `gambars` `d` on(`c`.`id` = `d`.`id_barang` and `d`.`utama` = 1)) join `masyarakats` `m` on(`a`.`id_masyarakat` = `m`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `get_max_penawaran`
--
DROP TABLE IF EXISTS `get_max_penawaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_max_penawaran`  AS  select `p`.`id_lelang` AS `id_lelang`,`p`.`id_masyarakat` AS `id_masyarakat`,max(`p`.`harga_penawaran`) AS `harga_penawaran` from `penawarans` `p` group by `p`.`id_lelang`,`p`.`id_masyarakat` order by max(`p`.`harga_penawaran`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `lelang_berlangsung`
--
DROP TABLE IF EXISTS `lelang_berlangsung`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lelang_berlangsung`  AS  select `a`.`id` AS `id_lelang`,`a`.`id_barang` AS `id_barang`,`c`.`nama_barang` AS `nama_barang`,`d`.`gambar` AS `gambar`,`c`.`deskripsi` AS `deskripsi`,`a`.`tgl_mulai` AS `tgl_mulai`,`a`.`tgl_akhir` AS `tgl_akhir`,`a`.`harga_awal` AS `harga_awal`,ifnull(`b`.`total_penawaran`,0) AS `total_penawaran`,ifnull(`b`.`harga_tertinggi`,0) AS `harga_tertinggi` from (((`lelangs` `a` left join (select `p`.`id_lelang` AS `id_lelang`,max(`p`.`harga_penawaran`) AS `harga_tertinggi`,count(`p`.`id`) AS `total_penawaran` from `penawarans` `p` group by `p`.`id_lelang`) `b` on(`a`.`id` = `b`.`id_lelang`)) join `barangs` `c` on(`a`.`id_barang` = `c`.`id`)) left join `gambars` `d` on(`c`.`id` = `d`.`id_barang` and `d`.`utama` = 1)) where `a`.`status` = 'open' and curdate() between `a`.`tgl_mulai` and `a`.`tgl_akhir` ;

-- --------------------------------------------------------

--
-- Structure for view `pemenang_lelang`
--
DROP TABLE IF EXISTS `pemenang_lelang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemenang_lelang`  AS  select `a`.`id` AS `id_lelang`,`a`.`tgl_mulai` AS `tgl_mulai`,`a`.`tgl_akhir` AS `tgl_akhir`,`a`.`id_masyarakat` AS `id_masyarakat`,`b`.`name` AS `pemenang`,`b`.`nik` AS `nik`,`b`.`jk` AS `jk`,`b`.`email` AS `email`,`b`.`no_hp` AS `no_hp`,`b`.`alamat` AS `alamat`,`a`.`id_barang` AS `id_barang`,`c`.`nama_barang` AS `nama_barang`,`c`.`deskripsi` AS `deskripsi`,`a`.`harga_awal` AS `harga_awal`,`a`.`harga_akhir` AS `harga_akhir`,case when `a`.`status` <> 'confirmed' then 'Unconfirmed' else 'Confirmed' end AS `status` from ((`lelangs` `a` join `masyarakats` `b` on(`a`.`id_masyarakat` = `b`.`id`)) join `barangs` `c` on(`a`.`id_barang` = `c`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gambars`
--
ALTER TABLE `gambars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambars_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `lelangs`
--
ALTER TABLE `lelangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lelangs_id_barang_foreign` (`id_barang`),
  ADD KEY `lelangs_created_by_foreign` (`created_by`);

--
-- Indexes for table `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `masyarakats_email_unique` (`email`);

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
-- Indexes for table `penawarans`
--
ALTER TABLE `penawarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penawarans_id_masyarakat_foreign` (`id_masyarakat`),
  ADD KEY `penawarans_id_lelang_foreign` (`id_lelang`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambars`
--
ALTER TABLE `gambars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lelangs`
--
ALTER TABLE `lelangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penawarans`
--
ALTER TABLE `penawarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambars`
--
ALTER TABLE `gambars`
  ADD CONSTRAINT `gambars_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lelangs`
--
ALTER TABLE `lelangs`
  ADD CONSTRAINT `lelangs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lelangs_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penawarans`
--
ALTER TABLE `penawarans`
  ADD CONSTRAINT `penawarans_id_lelang_foreign` FOREIGN KEY (`id_lelang`) REFERENCES `lelangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penawarans_id_masyarakat_foreign` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
