-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 05:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
(99, 11, '2021-06-02', 1),
(101, 11, '2021-06-02', 2),
(102, 11, '2021-06-02', 2),
(104, 11, '2021-06-06', 1),
(105, 11, '2021-06-06', 2),
(106, 11, '2021-06-06', 1),
(119, 11, '2021-06-08', 2),
(120, 11, '2021-06-08', 2),
(121, 11, '2021-06-08', 2),
(122, 12, '2021-06-08', 1),
(123, 12, '2021-06-08', 2),
(124, 11, '2021-06-08', 2),
(125, 11, '2021-06-08', 1),
(126, 11, '2021-06-08', 1),
(127, 11, '2021-06-08', 1),
(128, 11, '2021-06-08', 1),
(129, 11, '2021-06-09', 1),
(130, 11, '2021-06-09', 1),
(131, 11, '2021-06-09', 2),
(132, 11, '2021-06-09', 1),
(133, 11, '2021-06-09', 2),
(134, 11, '2021-06-09', 2),
(135, 11, '2021-06-09', 1),
(136, 11, '2021-06-15', 1),
(137, 11, '2021-06-15', 1),
(138, 11, '2021-06-15', 1),
(139, 11, '2021-06-15', 1),
(140, 11, '2021-06-16', 1),
(141, 12, '2021-06-17', 1),
(142, 11, '2021-06-17', 1),
(143, 11, '2021-06-17', 1),
(144, 11, '2021-06-17', 1),
(145, 11, '2021-06-17', 1),
(146, 11, '2021-06-17', 1),
(147, 11, '2021-06-17', 1);

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
('KDOB0001', 'Etoricoxib 90 mg', 'SUP0025', 4, 4, '6000', '7000', 77, '2022-01-02'),
('KDOB0002', 'Hansaplast princess Isi 10', 'SUP0025', 7, 5, '5500', '9000', 75, '2022-12-01'),
('KDOB0003', 'Hansaplast Roll Kain 1,25x5M', 'SUP0025', 7, 5, '6000', '10000', 44, '2022-11-01'),
('KDOB0004', 'Nivea Deo Invisible 50', 'SUP0024', 7, 5, '13500', '18000', 63, '2023-02-03'),
('KDOB0005', 'Nivea Roll On ext white ac 50', 'SUP0024', 7, 5, '15500', '20500', 44, '2024-09-04'),
('KDOB0006', 'Nivea Deo wht h. shave ro 50 ml', 'SUP0023', 7, 5, '14000', '19000', 21, '2023-12-08'),
('KDOB0007', 'Ibuprofen 400 mg', 'SUP0023', 4, 4, '25000', '29000', 38, '2024-09-25'),
('KDOB0008', 'Amlodipine 10 mg', 'SUP0022', 4, 4, '8000', '11000', 39, '2023-09-22'),
('KDOB0009', 'Theraskin Serum Vit C plus', 'SUP0007', 6, 7, '45000', '60000', 23, '2024-11-12'),
('KDOB0010', 'Theraskin deo lotion 20ml', 'SUP0007', 6, 7, '12500', '16000', 31, '2023-10-03'),
('KDOB0011', 'Theraskin AHA 10 Cream 10gr', 'SUP0007', 14, 7, '17000', '25000', 15, '2023-12-24'),
('KDOB0012', 'Tremenza Syrup', 'SUP0008', 6, 4, '21000', '25000', 28, '2023-06-11'),
('KDOB0013', 'Valproic Acid Syrup', 'SUP0010', 6, 4, '50600', '70500', 21, '2024-11-12');

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
(9, '020620210001', 'SUP0025', 101, '2021-06-02', 'Hansaplast princess Isi 10', 5500, 1, 5500),
(10, '020620210001', 'SUP0010', 101, '2021-06-02', 'Valproic Acid Syrup', 50600, 1, 50600),
(11, '020620210002', 'SUP0007', 102, '2021-06-02', 'Theraskin Serum Vit C plus', 45000, 1, 45000),
(12, '020620210002', 'SUP0008', 102, '2021-06-02', 'Tremenza Syrup', 21000, 2, 42000),
(13, '020620210002', 'SUP0024', 102, '2021-06-02', 'Nivea Roll On ext white ac 50', 15500, 1, 15500),
(14, '060620210003', 'SUP0024', 105, '2021-06-06', 'Nivea Deo Invisible 50', 13500, 1, 13500),
(15, '060620210004', 'SUP0023', 107, '2021-06-06', 'Nivea Deo wht h. shave ro 50 ml', 14000, 1, 14000),
(16, '070620210005', 'SUP0025', 108, '2021-06-07', 'Hansaplast princess Isi 10', 5500, 1, 5500),
(17, '080620210006', 'SUP0023', 109, '2021-06-08', 'Ibuprofen 400 mg', 25000, 1, 25000),
(18, '080620210007', 'SUP0023', 110, '2021-06-08', 'Ibuprofen 400 mg', 25000, 1, 25000),
(19, '080620210008', 'SUP0023', 111, '2021-06-08', 'Ibuprofen 400 mg', 25000, 1, 25000),
(20, '080620210009', 'SUP0023', 112, '2021-06-08', 'Ibuprofen 400 mg', 25000, 1, 25000),
(21, '080620210010', 'SUP0023', 115, '2021-06-08', 'Ibuprofen 400 mg', 25000, 3, 75000),
(22, '080620210011', 'SUP0025', 116, '2021-06-08', 'Etoricoxib 90 mg', 6000, 25, 150000),
(23, '080620210012', 'SUP0008', 118, '2021-06-08', 'Tremenza Syrup', 21000, 25, 525000),
(24, '080620210013', 'SUP0025', 119, '2021-06-08', 'Hansaplast princess Isi 10', 5500, 2, 11000),
(25, '080620210014', 'SUP0010', 120, '2021-06-08', 'Valproic Acid Syrup', 50600, 1, 50600),
(26, '080620210015', 'SUP0010', 121, '2021-06-08', 'Valproic Acid Syrup', 50600, 3, 151800),
(27, '080620210016', 'SUP0024', 123, '2021-06-08', 'Nivea Deo Invisible 50', 13500, 1, 13500),
(28, '080620210017', 'SUP0024', 124, '2021-06-08', 'Nivea Deo Invisible 50', 13500, 2, 27000),
(29, '090620210018', 'SUP0008', 131, '2021-06-09', 'Tremenza Syrup', 21000, 5, 105000),
(30, '090620210019', 'SUP0025', 133, '2021-06-09', 'Hansaplast princess Isi 10', 5500, 5, 27500),
(31, '090620210020', 'SUP0025', 134, '2021-06-09', 'Hansaplast princess Isi 10', 5500, 4, 22000);

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
(12, 'Ucriets', 'cocakun459@gmail.com', 'Laki-Laki', '$2y$10$HljNpMgcqeuwmYjHfkkUUuFqb3ININaMgQ9M4abCwFvwVJ2YFn2J6', '083123454321', '2021-05-24', '1621864509_0703b515f07447d08277.jpg', 'Admin', 'Masbagikhh'),
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
(126, '080620210007', 'KDOB0013', 125, '2021-05-18', 2, 341000, '150.000', '9.000'),
(127, '080620210008', 'KDOB0013', 126, '2021-06-17', 2, 111000, '145.000', '4.000'),
(130, '090620210011', 'KDOB0012', 129, '2021-04-14', 1, 25000, '30.000', '5.000'),
(131, '090620210012', 'KDOB0012', 130, '2021-04-12', 1, 25000, '50.000', '25.000'),
(134, '090620210014', 'KDOB0002', 135, '2021-03-16', 5, 45000, '50.000', '5.000'),
(139, '160620210015', 'KDOB0012', 140, '2021-06-16', 1, 25000, '25.000', '0'),
(140, '170620210016', 'KDOB0007', 141, '2021-06-17', 2, 58000, '60.000', '2.000'),
(141, '170620210017', 'KDOB0011', 142, '2021-06-17', 1, 25000, '30.000', '5.000'),
(142, '170620210018', 'KDOB0010', 143, '2021-06-17', 1, 16000, '20.000', '4.000'),
(143, '170620210019', 'KDOB0008', 144, '2021-06-17', 1, 11000, '11.000', '0'),
(144, '170620210020', 'KDOB0004', 145, '2021-06-18', 1, 18000, '20.000', '2.000'),
(145, '170620210021', 'KDOB0004', 146, '2021-06-17', 1, 18000, '20.000', '2.000'),
(146, '170620210022', 'KDOB0001', 147, '2021-06-17', 4, 28000, '30.000', '2.000');

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
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_pen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

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
