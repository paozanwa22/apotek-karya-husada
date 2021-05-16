-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2021 pada 01.24
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
  `id_transaksi` int(11) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `aksi` int(11) NOT NULL
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
(5, 'Narkotika'),
(7, 'Obat bebas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kd_obat` varchar(255) NOT NULL,
  `nm_obat` varchar(150) NOT NULL,
  `kd_sup` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `id_k` int(11) NOT NULL,
  `harga_beli` varchar(30) NOT NULL,
  `harga_jual` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nm_obat`, `kd_sup`, `id_s`, `id_k`, `harga_beli`, `harga_jual`, `stok`, `tgl_kadaluarsa`) VALUES
('KDOB0003', 'sdfsdf', 0, 1, 0, '43.243', '344.243', 54, '1321-12-31'),
('KDOB0004', 'tree', 0, 1, 0, '435.435', '34.543', 34534, '4543-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pem` int(11) NOT NULL,
  `id_sup` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `obat` varchar(100) NOT NULL,
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
  `email` varchar(100) NOT NULL,
  `jk` char(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(100) NOT NULL,
  `poto` varchar(255) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `jk`, `password`, `no_tlp`, `alamat`, `level`, `poto`, `tgl_buat`) VALUES
(13, 'Haikal Wahyudilllll', 'haikal@gmail.comlllll', '', 'mkkkllllllllllllllllllllllllllllllllllllllll', '', '-', 'Pimpinan', 'default.png', '2021-05-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_pen` int(11) NOT NULL,
  `id_ob` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tgl_jual` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id` int(11) NOT NULL,
  `nm_apotek` varchar(50) NOT NULL,
  `pimpinan` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `poto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id`, `nm_apotek`, `pimpinan`, `alamat`, `poto`) VALUES
(1, 'Apotek Karya Husada', 'aaa', 'Jln. Masbagik - Labuhan Lombok', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan_obat`
--

CREATE TABLE `tb_satuan_obat` (
  `id_s` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_satuan_obat`
--

INSERT INTO `tb_satuan_obat` (`id_s`, `satuan`) VALUES
(2, 'Box'),
(3, 'Tablet'),
(7, 'Botol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kd_sup` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_sup`, `nama`, `no_tlp`, `alamat`) VALUES
('SUP0001', 'ss', '5345', 'fdgd'),
('SUP0002', 'SJDFHSD', '8326478', 'ueruwe');

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
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
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
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_pen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan_obat`
--
ALTER TABLE `tb_satuan_obat`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
