-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2023 pada 07.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_carwash`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cucimobil`
--

CREATE TABLE `tbl_cucimobil` (
  `cucimobil_id` int(11) NOT NULL,
  `cucimobil_idtransaksi` varchar(100) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `cucimobil_tanggal` date NOT NULL DEFAULT current_timestamp(),
  `cucimobil_nama` varchar(200) NOT NULL,
  `cucimobil_tipe` varchar(100) NOT NULL,
  `cucimobil_plat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_cucimobil`
--

INSERT INTO `tbl_cucimobil` (`cucimobil_id`, `cucimobil_idtransaksi`, `paket_id`, `cucimobil_tanggal`, `cucimobil_nama`, `cucimobil_tipe`, `cucimobil_plat`) VALUES
(7, '011', 0, '2023-01-04', 'Hilmi Kumod', 'Avanza', '022123'),
(9, 'A002', 4, '2023-01-05', 'Hilmi dzul', 'Sedan', 'B 2032 ENT'),
(10, 'A001', 2, '2023-01-06', 'Iki', 'Minibus', 'D 2020 EWE'),
(11, 'A002', 5, '2023-01-05', 'Dupan', 'Sedan', 'B 2032 ENT'),
(12, 'A0005', 3, '2023-01-13', 'Alvika Tampan', 'BMW', 'A ABVN 2c'),
(13, '123', 3, '2023-02-14', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `paket_id` int(11) NOT NULL,
  `paket_nama` varchar(200) NOT NULL,
  `paket_jeniskendaraan` varchar(200) NOT NULL,
  `paket_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`paket_id`, `paket_nama`, `paket_jeniskendaraan`, `paket_harga`) VALUES
(2, 'Paket Standar ', 'Mobil Kecil', 35000),
(3, 'Paket Premium', 'Mini Bus', 70000),
(5, 'Paket Detailing', 'All Car', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_username`, `user_password`, `user_email`) VALUES
(2, 'alvika', '2f06a87d2b049973067695328b013230', 'alvika@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cucimobil`
--
ALTER TABLE `tbl_cucimobil`
  ADD PRIMARY KEY (`cucimobil_id`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cucimobil`
--
ALTER TABLE `tbl_cucimobil`
  MODIFY `cucimobil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
