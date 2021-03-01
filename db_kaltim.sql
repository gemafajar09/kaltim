-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2021 pada 11.03
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kaltim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_30_093736_create_data_polres_models_table', 1),
(5, '2021_01_30_093753_create_data_biro_models_table', 1),
(6, '2021_01_31_113948_create_user_models_table', 1),
(7, '2021_01_31_122303_create_cabang_models_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bus`
--

CREATE TABLE `tb_bus` (
  `bus_id` int(11) NOT NULL,
  `bus_a` int(11) DEFAULT 0,
  `bus_au` int(11) DEFAULT 0,
  `bus_c` int(11) DEFAULT 0,
  `bus_d` int(11) DEFAULT 0,
  `bus_b1` int(11) DEFAULT 0,
  `bus_b1u` int(11) DEFAULT 0,
  `bus_b2` int(11) DEFAULT 0,
  `bus_b2u` int(11) DEFAULT 0,
  `bus_rusak` int(11) DEFAULT 0,
  `id_data` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_polres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `cabang_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang_kode` int(11) NOT NULL,
  `cabanag_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_cabang`
--

INSERT INTO `tb_cabang` (`cabang_id`, `cabang_nama`, `cabang_alamat`, `cabang_kode`, `cabanag_foto`) VALUES
(1, 'BIRO ARKA', '-', 2, NULL),
(2, 'BIRO RHYS', '-', 2, NULL),
(5, 'BIRO NJM', '-', 2, NULL),
(6, 'BIRO BIMA NUSANTARA', '-', 2, NULL),
(7, 'BIRO ASSESMENT PSIKOLOGI', '-', 2, NULL),
(8, 'Satpas Balikpapan', '-', 1, NULL),
(9, 'Satpas Samarinda', '-', 1, NULL),
(10, 'Satpas Kukar', '-', 1, NULL),
(11, 'Satpas Kutim', '-', 1, NULL),
(12, 'Satpas Kubar', '-', 1, NULL),
(13, 'Satpas Berau', '-', 1, NULL),
(14, 'Satpas Bontang', '-', 1, NULL),
(15, 'Satpas Paser', '-', 1, NULL),
(16, 'Satpas PPU', '-', 1, NULL),
(17, 'Polda Kaltim', '-', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_biro`
--

CREATE TABLE `tb_data_biro` (
  `data_biro_id` bigint(20) UNSIGNED NOT NULL,
  `biro_id` int(11) NOT NULL,
  `data_biro_tgl` date NOT NULL,
  `data_biro_sim_a_baru` int(11) DEFAULT NULL,
  `data_biro_sim_c_baru` int(11) DEFAULT NULL,
  `data_biro_sim_ac_baru` int(11) DEFAULT NULL,
  `data_biro_sim_a_perpanjang` int(11) DEFAULT NULL,
  `data_biro_sim_c_perpanjang` int(11) DEFAULT NULL,
  `data_biro_sim_ac_perpanjang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_polres`
--

CREATE TABLE `tb_data_polres` (
  `data_polres_id` bigint(20) UNSIGNED NOT NULL,
  `polres_id` int(11) NOT NULL,
  `data_polres_tgl` date NOT NULL,
  `data_polres_sim_a_baru` int(11) DEFAULT NULL,
  `data_polres_sim_a_umum_baru` int(11) DEFAULT NULL,
  `data_polres_sim_b1_baru` int(11) DEFAULT NULL,
  `data_polres_sim_b2_baru` int(11) DEFAULT NULL,
  `data_polres_sim_c_baru` int(11) DEFAULT NULL,
  `data_polres_sim_d_baru` int(11) DEFAULT NULL,
  `data_polres_sim_a_perpanjang` int(11) DEFAULT NULL,
  `data_polres_sim_a_umum_perpanjang` int(11) DEFAULT NULL,
  `data_polres_sim_b1_perpanjang` int(11) DEFAULT NULL,
  `data_polres_sim_b2_perpanjang` int(11) DEFAULT NULL,
  `data_polres_sim_c_perpanjang` int(11) DEFAULT NULL,
  `data_polres_sim_d_perpanjang` int(11) DEFAULT NULL,
  `data_polres_sim_b1_umum` int(11) DEFAULT NULL,
  `data_polres_sim_b2_umum` int(11) DEFAULT NULL,
  `data_polres_sim_b1_umum_perpanjang` int(11) DEFAULT 0,
  `data_polres_sim_b2_umum_perpanjang` int(11) DEFAULT 0,
  `rusak` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_data_polres`
--

INSERT INTO `tb_data_polres` (`data_polres_id`, `polres_id`, `data_polres_tgl`, `data_polres_sim_a_baru`, `data_polres_sim_a_umum_baru`, `data_polres_sim_b1_baru`, `data_polres_sim_b2_baru`, `data_polres_sim_c_baru`, `data_polres_sim_d_baru`, `data_polres_sim_a_perpanjang`, `data_polres_sim_a_umum_perpanjang`, `data_polres_sim_b1_perpanjang`, `data_polres_sim_b2_perpanjang`, `data_polres_sim_c_perpanjang`, `data_polres_sim_d_perpanjang`, `data_polres_sim_b1_umum`, `data_polres_sim_b2_umum`, `data_polres_sim_b1_umum_perpanjang`, `data_polres_sim_b2_umum_perpanjang`, `rusak`, `created_at`, `updated_at`) VALUES
(1, 17, '2021-03-01', 85, 52, 28, 12, 40, 91, 84, 75, 59, 31, 48, 78, 43, 15, 58, 29, 46, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_user`
--

CREATE TABLE `tb_data_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ulangi_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_data_user`
--

INSERT INTO `tb_data_user` (`user_id`, `user_nama`, `cabang_id`, `user_level`, `user_username`, `user_password`, `user_ulangi_password`, `created_at`, `updated_at`) VALUES
(3, 'polda', 17, 1, 'polda', 'b5436312cdcde0d6ddb84c6d5541ab55eccd4ead63ce7c27c102599ecebbebc87e9ccb9324b2e1fbef12cb6d0316282e20468f2a9a11371090e42825aee345f2', 'polda', NULL, NULL),
(6, 'BIRO ARKA', 1, 3, 'BIROARKA', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:24:33', '2021-02-28 09:24:33'),
(7, 'BIRO RHYS', 2, 3, 'BIRORHYS', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:26:38', '2021-02-28 09:26:38'),
(8, 'BIRO NJM', 5, 3, 'BIRONJM', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:27:03', '2021-02-28 09:27:03'),
(9, 'BIRO BIMA NUSANTARA', 6, 3, 'BIROBIMANUSANTARA', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:27:29', '2021-02-28 09:27:29'),
(10, 'Satpas Balikpapan', 8, 2, 'balikpapan', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:29:46', '2021-02-28 09:29:46'),
(11, 'Satpas Samarinda', 9, 2, 'samarinda', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:30:27', '2021-02-28 09:30:27'),
(12, 'Satpas Kukar', 10, 1, 'kukar', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:31:04', '2021-02-28 09:31:04'),
(13, 'Satpas Kutim', 11, 2, 'kutim', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:31:32', '2021-02-28 09:31:32'),
(14, 'Satpas Kubar', 12, 2, 'kubar', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:31:58', '2021-02-28 09:31:58'),
(15, 'Satpas Berau', 13, 2, 'berau', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:32:22', '2021-02-28 09:32:22'),
(16, 'Satpas Bontang', 14, 2, 'bontang', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:32:42', '2021-02-28 09:32:42'),
(17, 'Satpas Paser', 15, 2, 'paser', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:33:01', '2021-02-28 09:33:01'),
(18, 'Satpas PPU', 16, 2, 'ppu', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '12345', '2021-02-28 09:33:26', '2021-02-28 09:33:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_data` int(11) NOT NULL,
  `id_biro` int(11) NOT NULL,
  `sim_a_baru` int(11) DEFAULT 0,
  `sim_c_baru` int(11) DEFAULT 0,
  `sim_ac_baru` int(11) DEFAULT 0,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `id_data`, `id_biro`, `sim_a_baru`, `sim_c_baru`, `sim_ac_baru`, `tanggal`) VALUES
(1, 1, 1, 45, 27, 34, '2021-03-01'),
(2, 1, 2, 93, 93, 25, '2021-03-01'),
(3, 1, 5, 42, 31, 63, '2021-03-01'),
(4, 1, 6, 30, 25, 98, '2021-03-01'),
(5, 1, 7, 81, 77, 24, '2021-03-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id`, `level`) VALUES
(1, 'Kapolda'),
(2, 'Humas'),
(3, 'Biro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_simlink`
--

CREATE TABLE `tb_simlink` (
  `simlink_id` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `simlink1_a` int(11) NOT NULL DEFAULT 0,
  `simlink1_au` int(11) DEFAULT 0,
  `simlink1_c` int(11) DEFAULT 0,
  `simlink1_d` int(11) DEFAULT 0,
  `simlink1_b1` int(11) DEFAULT 0,
  `simlink1_b1u` int(11) DEFAULT 0,
  `simlink1_b2` int(11) DEFAULT 0,
  `simlink1_b2u` int(11) DEFAULT 0,
  `simlink1_rusak` int(11) DEFAULT 0,
  `simlink2_a` int(11) NOT NULL DEFAULT 0,
  `simlink2_au` int(11) DEFAULT 0,
  `simlink2_c` int(11) NOT NULL DEFAULT 0,
  `simlink2_d` int(11) NOT NULL DEFAULT 0,
  `simlink2_b1` int(11) NOT NULL DEFAULT 0,
  `simlink2_b1u` int(11) NOT NULL DEFAULT 0,
  `simlink2_b2` int(11) NOT NULL DEFAULT 0,
  `simlink2_b2u` int(11) NOT NULL DEFAULT 0,
  `simlink2_rusak` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_simlink`
--

INSERT INTO `tb_simlink` (`simlink_id`, `id_data`, `simlink1_a`, `simlink1_au`, `simlink1_c`, `simlink1_d`, `simlink1_b1`, `simlink1_b1u`, `simlink1_b2`, `simlink1_b2u`, `simlink1_rusak`, `simlink2_a`, `simlink2_au`, `simlink2_c`, `simlink2_d`, `simlink2_b1`, `simlink2_b1u`, `simlink2_b2`, `simlink2_b2u`, `simlink2_rusak`) VALUES
(1, 1, 11, 0, 0, 0, 0, 0, 0, 0, 0, 49, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`cabang_id`);

--
-- Indeks untuk tabel `tb_data_biro`
--
ALTER TABLE `tb_data_biro`
  ADD PRIMARY KEY (`data_biro_id`);

--
-- Indeks untuk tabel `tb_data_polres`
--
ALTER TABLE `tb_data_polres`
  ADD PRIMARY KEY (`data_polres_id`);

--
-- Indeks untuk tabel `tb_data_user`
--
ALTER TABLE `tb_data_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_simlink`
--
ALTER TABLE `tb_simlink`
  ADD PRIMARY KEY (`simlink_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `cabang_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_data_biro`
--
ALTER TABLE `tb_data_biro`
  MODIFY `data_biro_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_data_polres`
--
ALTER TABLE `tb_data_polres`
  MODIFY `data_polres_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_data_user`
--
ALTER TABLE `tb_data_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_simlink`
--
ALTER TABLE `tb_simlink`
  MODIFY `simlink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
