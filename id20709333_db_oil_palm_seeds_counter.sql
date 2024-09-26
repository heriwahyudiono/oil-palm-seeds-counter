-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Agu 2024 pada 13.34
-- Versi server: 10.5.20-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20709333_db_oil_palm_seeds_counter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `blok_ke` int(11) NOT NULL,
  `baris_ke` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_hitung` date NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `blok_ke`, `baris_ke`, `jumlah`, `tanggal_hitung`, `keterangan`) VALUES
(9, 1, 1, 7, '2023-03-18', ''),
(10, 1, 2, 8, '2023-03-18', ''),
(11, 1, 3, 8, '2023-03-18', ''),
(12, 1, 4, 9, '2023-03-18', ''),
(13, 1, 5, 10, '2023-03-18', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `date_of_birth`, `email`, `phone_number`, `password`, `token`) VALUES
(7, 'Riski', 'Male', '1996-05-12', 'ah17011966@gmail.com', '0864242466646', '$2y$10$VGGCv.hvV9wViBn/ZxXoqu6SqRrzUvSgH0O7vfbMY40w0AfIo2wGu', 'c38653d4e181d26727da9233ca8c42078879cf965b0287b0c122962a169a3570'),
(9, 'Reza', 'Male', '2003-04-19', 'rezaoktario77@gmail.com', '0853779916605', '$2y$10$Ore4wNdXJfgsZ9kHuvLzq.fKgmDppR3nuSWDabql0WxF.gCgu/D46', 'cec8676187a60f6cac6576b5a65d8369629b136e1dbdae826b6a2800da4b7013'),
(13, 'Heri Wahyudiono', 'Male', '2001-03-15', 'heriwhydiono@gmail.com', '085609839193', '$2y$10$7.F8Qmoiha1KZ7ZMeAB3sOdDgObJOt1vLHUe/Iqz.5ip9GNxqnzNG', 'f3af50d9ec838237450a50ec3fc4c42e1bdd2bdef5f4c41994defd50fa368fc2'),
(14, 'Heri Wahyudiono', 'Male', '2023-07-25', 'heriwahyudiono@outlook.co.id', '085609839193', '$2y$10$e9D8HW/S8wt74eKRvuf6ReaixdcHvIoELMeuuolSali9lpRJz/inW', '3b8653148a81aeaeba85016cb21e7c9ac5cdaec4b34560b22a6abb6fa0c2f102'),
(15, 'Rz', 'Male', '2023-07-02', 'reza@gmail.com', '08976543', '$2y$10$z6UxG8giAVIyeJdA4oV8Q.JPYp6UWUBEv3r476OBrjeVkHMegXlVS', NULL),
(16, 'admin', 'Male', '2023-10-28', 'admin@mail.com', '089617172727', '$2y$10$EpXSKfU4xK82KiZF7XUawuJVtdOc2WyprRF1FWttMZn2MvdA9J8Aa', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
