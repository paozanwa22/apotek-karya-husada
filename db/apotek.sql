-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 04:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

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
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `aksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_pengguna`, `tgl_beli`, `aksi`) VALUES
(166, 11, '2021-07-20', 1),
(171, 11, '2021-07-20', 2),
(172, 11, '2021-07-20', 1),
(173, 11, '2021-07-20', 2),
(174, 11, '2021-07-20', 2),
(175, 11, '2021-07-20', 2),
(176, 11, '2021-07-20', 1),
(177, 11, '2021-07-30', 2),
(178, 11, '2021-07-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_obat`
--

CREATE TABLE `tb_kategori_obat` (
  `id_k` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori_obat`
--

INSERT INTO `tb_kategori_obat` (`id_k`, `kategori`) VALUES
(4, 'Keras'),
(5, 'Bebas'),
(6, 'Bebas Terbatas'),
(7, 'Kosmetik'),
(8, 'Minuman'),
(9, 'Umum'),
(10, 'Herbal'),
(11, 'Susu'),
(12, 'Vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kd_obat` varchar(20) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `kd_sup` varchar(20) NOT NULL,
  `id_s` int(11) NOT NULL,
  `id_k` int(11) NOT NULL,
  `harga_beli` varchar(20) DEFAULT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nm_obat`, `kd_sup`, `id_s`, `id_k`, `harga_beli`, `harga_jual`, `stok`, `tgl_kadaluarsa`) VALUES
('KDOB0001', 'Etoricoxib 90 mg', 'SUP0025', 4, 4, '6000', '7000', 74, '2022-01-02'),
('KDOB0002', 'Hansaplast princess Isi 10', 'SUP0025', 7, 5, '5500', '9000', 79, '2022-12-01'),
('KDOB0003', 'Hansaplast Roll Kain 1,25x5M', 'SUP0025', 7, 5, '6000', '10000', 44, '2022-11-01'),
('KDOB0004', 'Nivea Deo Invisible 50', 'SUP0024', 7, 5, '13500', '18000', 63, '2021-07-22'),
('KDOB0005', 'Nivea Roll On ext white ac 50', 'SUP0024', 7, 5, '15500', '20500', 20, '2024-09-04'),
('KDOB0006', 'Nivea Deo wht h. shave ro 50 ml', 'SUP0023', 7, 5, '14000', '19000', 22, '2021-08-08'),
('KDOB0007', 'Ibuprofen 400 mg', 'SUP0023', 4, 4, '25000', '29000', 37, '2022-07-19'),
('KDOB0008', 'Amlodipine 10 mg', 'SUP0022', 4, 4, '8000', '11000', 35, '2023-09-22'),
('KDOB0009', 'Theraskin Serum Vit C plus', 'SUP0007', 6, 7, '45000', '60000', 13, '2021-06-12'),
('KDOB0010', 'Theraskin deo lotion 20ml', 'SUP0007', 6, 7, '12500', '16000', 1, '2023-10-03'),
('KDOB0011', 'Theraskin AHA 10 Cream 10gr', 'SUP0007', 14, 7, '17000', '25000', 0, '2021-07-08'),
('KDOB0012', 'Tremenza Syrup', 'SUP0008', 6, 4, '21000', '25000', 11, '2021-08-19'),
('KDOB0013', 'Valproic Acid Syrup', 'SUP0010', 6, 4, '50600', '70500', 13, '2021-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pem` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `kd_sup` varchar(30) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `total_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pem`, `no_transaksi`, `kd_sup`, `id_invoice`, `tgl_pembelian`, `nm_obat`, `harga`, `banyak`, `total_beli`) VALUES
(44, '200720210002', 'SUP0008', 171, '2021-07-12', 'Tremenza Syrup', 21000, 1, 21000),
(45, '200720210003', 'SUP0007', 173, '2021-07-12', 'Theraskin deo lotion 20ml', 12500, 1, 12500),
(46, '200720210003', 'SUP0025', 173, '2021-07-13', 'Hansaplast princess Isi 10', 5500, 1, 5500),
(47, '200720210004', 'SUP0008', 174, '2021-07-13', 'Tremenza Syrup', 21000, 1, 21000),
(48, '200720210005', 'SUP0024', 175, '2021-07-20', 'Nivea Deo Invisible 50', 13500, 1, 13500),
(49, '300720210006', 'SUP0024', 177, '2021-07-30', 'Nivea Roll On ext white ac 50', 15500, 10, 155000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_buat` date NOT NULL,
  `poto` varchar(200) NOT NULL,
  `level` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `jk`, `password`, `no_hp`, `tgl_buat`, `poto`, `level`, `alamat`) VALUES
(11, 'Haikal Wahyudi', 'admin@gmail.com', 'Perempuan', '$2y$10$eY2AOyMIshqL8wyexOFlO.wqu109mjn/cncJUowaSpzgNPC/1zarO', '0', '2021-05-24', '1622748655_3031746b59ded0191bfd.png', 'Admin', '-'),
(12, 'Ucriets', 'cocakun459@gmail.com', 'Laki-Laki', '$2y$10$DHzYMmNlDKxwRhLtCIpdl.s9VNl4x3N34M/jpTWIHMy65.I3m.NIy', '083123454321', '2021-05-24', '1621864509_0703b515f07447d08277.jpg', 'Admin', 'Masbagikhh'),
(13, 'Udang', 'pimpinan@gmail.com', '-', '$2y$10$0qn/GIWEULtPD4CNrQufHe5B0D4/OEyv18Sn/t..J5q796m2uszyu', '-', '2021-05-24', 'default.png', 'Pimpinan', '-'),
(15, 'PT Marga Nusantar Jaya', 'admssin@gmail.com', '-', '$2y$10$N6UxszTHAaxkUTewP1ZuDOo5x8AbibLUkETwB7x0G/PANR2WANrbG', '-', '2021-06-06', 'default.png', 'Admin', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_pen` int(11) NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `kd_obat` varchar(20) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tgl_jual` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `total_bayar` varchar(12) NOT NULL,
  `kembalian` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_pen`, `no_transaksi`, `kd_obat`, `id_invoice`, `tgl_jual`, `jumlah`, `total`, `total_bayar`, `kembalian`) VALUES
(160, '200720210003', 'KDOB0004', 166, '2021-06-20', 1, 18000, '20.000', '2.000'),
(163, '200720210004', 'KDOB0002', 172, '2021-07-20', 2, 18000, '50.000', '18.000'),
(164, '200720210004', 'KDOB0001', 172, '2021-07-21', 2, 14000, '50.000', '18.000'),
(165, '200720210005', 'KDOB0009', 176, '2021-07-21', 1, 60000, '70.000', '10.000'),
(166, '300720210006', 'KDOB0012', 178, '2021-07-30', 1, 25000, '30.000', '5.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` int(11) NOT NULL,
  `nm_apotek` varchar(80) NOT NULL,
  `pimpinan` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`id`, `nm_apotek`, `pimpinan`, `alamat`) VALUES
(1, 'APOTEK KARYA HUSADA', 'H. Mustafa, S.Kep.Ners', 'Jln. Lotim Masbagik - Labuhan Lombok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan_obat`
--

CREATE TABLE `tb_satuan_obat` (
  `id_s` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_satuan_obat`
--

INSERT INTO `tb_satuan_obat` (`id_s`, `satuan`) VALUES
(4, 'Tablet'),
(5, 'Box'),
(6, 'Botol'),
(7, 'Pcs'),
(8, 'Strip'),
(9, 'Sachet'),
(10, 'Tube'),
(11, 'Ampul'),
(12, 'Vial'),
(13, 'Capsule'),
(14, 'Pot');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kd_sup` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_sup`, `nama`, `no_hp`, `alamat`) VALUES
('SUP0001', 'PT.Merapi Utama Pharma', '0', '-'),
('SUP0002', 'PT.Anugrah Argon Medica', '0', '-'),
('SUP0003', 'PT.Mensa Bina Sukses', '0', '-'),
('SUP0004', 'PT.Penta Valent', '0', '-'),
('SUP0005', 'PT.Anugerah Pharmindo Lestari', '0', '-'),
('SUP0006', 'PT.AntarMitra Sembada', '0', '-'),
('SUP0007', 'PT.Kebayoran Pharma', '0', '-'),
('SUP0008', 'PT.Indo Alkes', '0', '-'),
('SUP0009', 'PT.Herbal Mandiri', '0', '-'),
('SUP0010', 'PT.Enseval Putra Megatrading ', '0', '-'),
('SUP0011', 'PT Marga Nusantar Jaya', '0', '-'),
('SUP0012', 'PT.Ericindo Huma Internasional', '0', '-'),
('SUP0013', 'PT.Great Deli Farma', '0', '-'),
('SUP0014', 'PT.Bina San Prima', '0', '-'),
('SUP0015', 'PT. Panay Farma Lab', '0', '-'),
('SUP0016', 'PT.Rajawali Nusindo', '0', '-'),
('SUP0017', 'PT.Mitra Sukses Abadi', '0', '-'),
('SUP0018', 'PT Marga Nusantar Jaya', '0', '-'),
('SUP0019', 'PT.Ericindo Huma Internasional', '0', '-'),
('SUP0020', 'PT.Great Deli Farma', '0', '-'),
('SUP0021', 'PT.Bina San Prima', '0', '-'),
('SUP0022', 'PT. Panay Farma Lab', '0', '-'),
('SUP0023', 'PT.Rajawali Nusindo', '0', '-'),
('SUP0024', 'PT.Mitra Sukses Abadi', '0', '-'),
('SUP0025', 'PT.Tempo', '0', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pem`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_pen`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_satuan_obat`
--
ALTER TABLE `tb_satuan_obat`
  ADD PRIMARY KEY (`id_s`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kd_sup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_pen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_satuan_obat`
--
ALTER TABLE `tb_satuan_obat`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
