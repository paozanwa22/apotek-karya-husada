-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 05:15 AM
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
(100, 11, '2021-06-02', 1),
(101, 11, '2021-06-02', 2),
(102, 11, '2021-06-02', 2),
(103, 11, '2021-06-03', 1);

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
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nm_obat`, `kd_sup`, `id_s`, `id_k`, `harga_beli`, `harga_jual`, `stok`, `tgl_kadaluarsa`) VALUES
('KDOB0001', 'Etoricoxib 90 mg', 'SUP0025', 4, 4, '6000', '7000', 56, '2022-01-02'),
('KDOB0002', 'Hansaplast princess Isi 10', 'SUP0025', 7, 5, '5500', '9000', 69, '2022-12-01'),
('KDOB0003', 'Hansaplast Roll Kain 1,25x5M', 'SUP0025', 7, 5, '6000', '10000', 44, '2022-11-01'),
('KDOB0004', 'Nivea Deo Invisible 50', 'SUP0024', 7, 5, '13500', '18000', 64, '2023-02-03'),
('KDOB0005', 'Nivea Roll On ext white ac 50', 'SUP0024', 7, 5, '15500', '20500', 44, '2024-09-04'),
('KDOB0006', 'Nivea Deo wht h. shave ro 50 ml', 'SUP0023', 7, 5, '14000', '19000', 21, '2023-12-08'),
('KDOB0007', 'Ibuprofen 400 mg', 'SUP0023', 4, 4, '25000', '29000', 37, '2024-09-25'),
('KDOB0008', 'Amlodipine 10 mg', 'SUP0022', 4, 4, '8000', '11000', 40, '2023-09-22'),
('KDOB0009', 'Theraskin Serum Vit C plus', 'SUP0007', 6, 7, '45000', '60000', 23, '2024-11-12'),
('KDOB0010', 'Theraskin deo lotion 20ml', 'SUP0007', 6, 7, '12500', '16000', 35, '2023-10-03'),
('KDOB0011', 'Theraskin AHA 10 Cream 10gr', 'SUP0007', 14, 7, '17000', '25000', 19, '2023-12-24'),
('KDOB0012', 'Tremenza Syrup', 'SUP0008', 6, 4, '21000', '25000', 9, '2023-06-11'),
('KDOB0013', 'Valproic Acid Syrup', 'SUP0010', 6, 4, '50600', '70500', 26, '2024-11-12'),
('KDOB0014', 'Vectrine Syrup', 'SUP0011', 6, 4, '45000', '65000', 19, '2023-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pem` int(11) NOT NULL,
  `no_transaksi` varchar(20) NOT NULL,
  `kd_sup` varchar(150) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `nm_obat` varchar(150) NOT NULL,
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
(13, '020620210002', 'SUP0024', 102, '2021-06-02', 'Nivea Roll On ext white ac 50', 15500, 1, 15500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
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
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `jk`, `password`, `no_hp`, `tgl_buat`, `poto`, `level`, `alamat`) VALUES
(11, 'Haikal Wahyudi', 'admin@gmail.com', 'Perempuan', '$2y$10$Kx.5CSgGwtRPZ4owG4KL9.Bw.Q53sbEHvb2Fu1cBYA5JpfJR4L7py', '123456789045635', '2021-05-24', '1622748655_3031746b59ded0191bfd.png', 'Admin', 'Lotim fdgfdg'),
(12, 'Ucriets', 'apoteker@gmail.com', 'Laki-Laki', '$2y$10$Sj3NkbJ7Z71/mEWJMJUtk.FgoHl6e4NfC0O0WP9Tn2adMUkgf1CGe', '083123454321', '2021-05-24', '1621864509_0703b515f07447d08277.jpg', 'Apoteker', 'Masbagik'),
(13, 'Udang', 'pimpinan@gmail.com', '-', '$2y$10$CqzcLdF/xLrsmCFXwzSXMen8n67KnOYO0fv7/431QHLJ0a.7LHJSS', '-', '2021-05-24', 'default.png', 'Pimpinan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_pen` int(11) NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `kd_obat` varchar(150) NOT NULL,
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
(119, '020620210001', 'KDOB0014', 99, '2021-06-02', 1, 65000, '80.000', '4.000'),
(120, '020620210001', 'KDOB0008', 99, '2021-06-02', 1, 11000, '80.000', '4.000'),
(121, '020620210002', 'KDOB0013', 100, '2021-06-02', 1, 70500, '80.000', '9.500'),
(122, '030620210003', 'KDOB0014', 103, '2021-06-03', 1, 65000, '70.000', '5.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` int(11) NOT NULL,
  `nm_apotek` varchar(150) NOT NULL,
  `pimpinan` varchar(150) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`id`, `nm_apotek`, `pimpinan`, `alamat`) VALUES
(1, 'APOTEK KARYA HUSADA', 'H. Mustafa, S.Kep.Ners', 'Jln. Masbagik - Labuhan Lombok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan_obat`
--

CREATE TABLE `tb_satuan_obat` (
  `id_s` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
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
  `kd_sup` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
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
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_pen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_satuan_obat`
--
ALTER TABLE `tb_satuan_obat`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
