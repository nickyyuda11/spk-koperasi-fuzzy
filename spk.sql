-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2021 pada 06.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(10) NOT NULL,
  `nama_adm` varchar(255) NOT NULL,
  `username_adm` varchar(255) NOT NULL,
  `pass_adm` varchar(255) NOT NULL,
  `status_adm` varchar(50) NOT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `username_adm`, `pass_adm`, `status_adm`, `tanggal_daftar`) VALUES
(1, 'yuda admin', 'yuda123', '$2y$10$pseQ6Jky9g07L1wBSs9tQ.2BxANTJqUSGDKCp5h1YIR7SSw8psJoC', 'aktif', '2021-06-26 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_sktp` varchar(255) NOT NULL,
  `foto_sgaji` varchar(255) NOT NULL,
  `setuju_sk` varchar(20) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `hasil_spk` float NOT NULL,
  `status_pengajuan` varchar(50) NOT NULL,
  `gaji` int(10) NOT NULL,
  `umur` int(2) NOT NULL,
  `jumlah_pengajuan` int(10) NOT NULL,
  `waktu_pengajuan` int(2) NOT NULL,
  `status_client` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `password`, `nik`, `no_kk`, `npwp`, `foto_ktp`, `foto_sktp`, `foto_sgaji`, `setuju_sk`, `tanggal_daftar`, `tanggal_pengajuan`, `hasil_spk`, `status_pengajuan`, `gaji`, `umur`, `jumlah_pengajuan`, `waktu_pengajuan`, `status_client`) VALUES
(1, 'Nicky Yuda', 'nickyyuda', '$2y$10$pseQ6Jky9g07L1wBSs9tQ.2BxANTJqUSGDKCp5h1YIR7SSw8psJoC', '3578062402630003', '3578062402630003', '357806240263000', '', '', '', 'on', '2021-06-25 11:03:14', '2021-06-25 00:00:00', 54.75, 'pengajuan batal', 1800000, 21, 1000000, 3, 'aktif'),
(2, 'aldy yuwanda', 'aldyyuwanda15', '$2y$10$fI/CzfKTK7JhqtzYYE6Jfe/9m0rJ9cxuLWyfDGwZobIDC5YbIg/06', '', '', '', '', '', '', '', '2021-06-26 06:02:13', '0000-00-00 00:00:00', 0, '', 0, 0, 0, 0, 'aktif'),
(3, 'Aldy', 'aldy123', '$2y$10$vYSwCyApyWZw2YvvIuoio.ytjI85OXMZgpAmXTqIgmRHugMHPf/l6', '', '', '', '', '', '', '', '2021-06-26 06:10:54', '0000-00-00 00:00:00', 0, '', 0, 0, 0, 0, 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
