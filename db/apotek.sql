-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2021 pada 04.34
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_obat`
--

CREATE TABLE `tb_kategori_obat` (
  `id_k` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_obat`
--

INSERT INTO `tb_kategori_obat` (`id_k`, `kategori`) VALUES
(1, 'Obat bebaskk'),
(3, 'Narkotika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kd_obat` varchar(150) NOT NULL,
  `nm_obat` varchar(150) NOT NULL,
  `kd_sup` varchar(150) NOT NULL,
  `id_s` int(11) NOT NULL,
  `id_k` int(11) NOT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nm_obat`, `kd_sup`, `id_s`, `id_k`, `harga_beli`, `harga_jual`, `stok`, `tgl_kadaluarsa`) VALUES
('KDOB0001', 'Bodrexx', 'SUP0001', 1, 1, '10.000', '12.000', 12, '2021-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pem` int(11) NOT NULL,
  `id_sup` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `nm_obat` varchar(150) NOT NULL,
  `harga` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `total_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jk` char(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_buat` date NOT NULL,
  `poto` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `jk`, `password`, `no_hp`, `tgl_buat`, `poto`, `level`, `alamat`) VALUES
(11, 'Udin tralala', 'admin@gmail.com', 'Perempuan', '$2y$10$Kx.5CSgGwtRPZ4owG4KL9.Bw.Q53sbEHvb2Fu1cBYA5JpfJR4L7py', '123456789045635', '2021-05-24', '1621907613_9453940a334b8615b279.jpg', 'Admin', 'Lotim fdgfdg'),
(12, 'Ucriets', 'apoteker@gmail.com', 'Laki-Laki', '$2y$10$Sj3NkbJ7Z71/mEWJMJUtk.FgoHl6e4NfC0O0WP9Tn2adMUkgf1CGe', '083123454321', '2021-05-24', '1621864509_0703b515f07447d08277.jpg', 'Apoteker', 'Masbagik'),
(13, 'Udang', 'pimpinan@gmail.com', '-', '$2y$10$CqzcLdF/xLrsmCFXwzSXMen8n67KnOYO0fv7/431QHLJ0a.7LHJSS', '-', '2021-05-24', 'default.png', 'Pimpinan', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_pen` int(11) NOT NULL,
  `kd_obat` varchar(150) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tgl_jual` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` int(11) NOT NULL,
  `nm_apotek` varchar(150) NOT NULL,
  `pimpinan` varchar(150) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profile`
--

INSERT INTO `tb_profile` (`id`, `nm_apotek`, `pimpinan`, `alamat`) VALUES
(1, 'Apotek Karya Husada', 'H. Mustafa, S.Kep.Ners', 'Jln. Masbagik - Labuhan Lombok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan_obat`
--

CREATE TABLE `tb_satuan_obat` (
  `id_s` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_satuan_obat`
--

INSERT INTO `tb_satuan_obat` (`id_s`, `satuan`) VALUES
(1, 'Tabletyy'),
(3, 'box');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kd_sup` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_sup`, `nama`, `no_hp`, `alamat`) VALUES
('SUP0001', 'Abu Jayau', '12345678900', 'Masbagikk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  ADD PRIMARY KEY (`id_k`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pem`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_pen`);

--
-- Indeks untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_satuan_obat`
--
ALTER TABLE `tb_satuan_obat`
  ADD PRIMARY KEY (`id_s`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kd_sup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan_obat`
--
ALTER TABLE `tb_satuan_obat`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
