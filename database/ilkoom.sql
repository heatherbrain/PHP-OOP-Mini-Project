-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2024 pada 17.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilkoom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `food`
--

CREATE TABLE `food` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(50) DEFAULT NULL,
  `jumlah_makanan` int(11) DEFAULT NULL,
  `harga_makanan` decimal(10,0) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `food`
--

INSERT INTO `food` (`id_makanan`, `nama_makanan`, `jumlah_makanan`, `harga_makanan`, `tanggal_update`) VALUES
(1, 'Bakso Bakar', 5, 5000, '2024-02-12 04:32:07'),
(2, 'Bakso Goreng', 10, 10000, '2024-02-06 09:12:11'),
(3, 'Nasi Goreng', 1, 12000, '2024-02-12 04:32:40'),
(4, 'Mie Goreng', 1, 10000, '2024-02-06 09:12:11'),
(5, 'Mie Kuah', 2, 20000, '2024-02-12 04:33:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `fakultas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `fakultas`) VALUES
('12345678', 'Zia Athifa', 'rumah sakit', '2008-09-12', 'RPL'),
('13579246', 'Zia Athifa', 'rumah sakit', '2008-09-12', 'RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(2, 'kyoya', 'kyoya123', 'kyoya@gmail.com'),
(3, 'miyamura', 'miyamura123', 'miyamura@gmail.com'),
(4, 'asta', 'asta123', 'asta@gmail.com'),
(5, 'noya', 'noya123', 'noya@gmail.com'),
(6, 'kirito', 'kirito123', 'kirito@gmail.com'),
(7, 'yuta', 'yuta123', 'yuta@gmail.com'),
(8, 'maki', 'maki123', 'maki@gmail.com'),
(9, 'inumaki', '$2y$10$XeGOU.8I2X3MMjBTdNORa.mlH8KDDFh6IUAve0TaMsa.CLgzc4/ZS', 'inumaki@gmail.com'),
(10, 'tamaki', '$2y$10$hikfwmSubDdUTv5AkI4ZO.gTFJHOjkV.N/kgBxZi8oXlNWQLRXTI2', 'tamaki@gmail.com'),
(11, 'tsukishima', '$2y$10$gAtk8g6sm9ZCsecT3ytSYOOswHXssky6XkD7InR4NN5/I9tcVIlq2', 'tsukishima@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `food`
--
ALTER TABLE `food`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
