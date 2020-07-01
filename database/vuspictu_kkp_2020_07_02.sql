-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2020 at 05:34 AM
-- Server version: 5.7.30-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuspictu_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(75) NOT NULL,
  `admin_email` varchar(75) NOT NULL,
  `admin_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_password`) VALUES
(1, 'admin kikan', 'admin@kikan.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_no_ktp` varchar(21) NOT NULL,
  `customer_nama` varchar(75) NOT NULL,
  `customer_email` varchar(75) NOT NULL,
  `customer_password` varchar(32) NOT NULL,
  `customer_no_telp` varchar(15) NOT NULL,
  `customer_tgl_lahir` date NOT NULL,
  `customer_kota_tinggal` varchar(20) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_status` smallint(6) NOT NULL DEFAULT '2',
  `customer_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_no_ktp`, `customer_nama`, `customer_email`, `customer_password`, `customer_no_telp`, `customer_tgl_lahir`, `customer_kota_tinggal`, `customer_alamat`, `customer_status`, `customer_reg_date`) VALUES
(1, '12345678902342342', 'Budi Boy', 'budi@example.com', '202cb962ac59075b964b07152d234b70', '08123456789', '2018-10-01', 'DKI Jakarta', 'Ragunan, Pasar minggu, Jakarta selatan', 1, '2020-02-24 22:16:00'),
(2, '123', 'cahya', 'cahyadyazin@yahoo.com', '202cb962ac59075b964b07152d234b70', '12345', '1995-07-04', 'Jkt', 'Jaksel', 2, '2020-02-03 17:04:32'),
(3, '111111', 'dias', 'dyazincahya@gmail.com', '9a2927aeadaaea3e713734439a0ee63a', '08215466487', '2020-02-04', 'Jakarta', 'Jaksel', 0, '2020-02-04 16:19:22'),
(4, '1234567890', 'Customer Kikan', 'customer@kikan.com', '202cb962ac59075b964b07152d234b70', '08123456789', '2020-02-16', 'Jakarta', 'Ragunan, Pasar minggu, Jakarta selatan', 1, '2020-02-01 22:26:42'),
(5, '111', 'mira', 'riskyismiranda888@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0888', '2020-02-09', 'jakarta pusat', 'Jl kaki', 1, '2020-02-14 10:57:04'),
(6, '111', 'miraa', 'putrimira888@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0888', '2020-02-29', 'jakarta pusat', 'Jl kaki', 1, '2020-02-14 11:00:04'),
(7, '1627', 'cahay', 'cahya', '202cb962ac59075b964b07152d234b70', '084551', '2020-02-15', 'jakarta selatan', 'Gjs', 1, '2020-02-14 11:00:52'),
(8, '1627', 'cahay', 'cahya123@gmail.com', '202cb962ac59075b964b07152d234b70', '084551', '2020-02-18', 'jakarta selatan', 'Gjs', 1, '2020-02-14 11:03:58'),
(9, '', 'Hana Nufara', 'hananufara25@gmail.com', 'cbb16336640011a78481b8a50c170484', '081259535555', '1996-02-05', '', 'Jl. Merdeka Raya No.01/Rw02, Ciracas', 1, '2020-02-22 10:10:10'),
(10, '', 'Aris Wahyudi', 'bettaidnew@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '081213069693', '1986-02-20', '', 'Sunter', 1, '2020-02-22 10:10:37'),
(11, '0181725281919199', 'budiboy', 'exploremoendoe@gmail.com', 'a7f421d6c178d5ee23946501f9739969', '089502606853', '2020-02-23', 'jakarta timur', 'mundu', 1, '2020-02-22 19:06:01'),
(12, '0918161616178', 'budi', 'budiboy195@gmail.com', 'a7f421d6c178d5ee23946501f9739969', '089502606853', '2020-02-25', 'jakarta timur', 'mundu\n', 1, '2020-02-22 19:07:28'),
(13, '748393838', 'hahahaha', 'testtcrwhitelist@gmail.com', '6f10779af2e0f5cb05b6cf3dbb23be53', '6282136704408', '1974-02-24', 'jakarta selatan', 'hxhx72828xn', 1, '2020-02-25 03:36:23'),
(14, '3641050510880000', 'Richard Sondy', 'richardsondy88@gmail.com', 'd9b2c21cf21b8653ce868cb44f189dc6', '081932601074', '2020-10-05', 'tanggerang', 'Pinus raya no 239', 1, '2020-03-06 08:30:18'),
(15, '1111222233334444', 'JOHN DOE ', 'babelklmy@gmail.com', '0008a24efbceae1d25db583be20d5c3e', '082136704408', '1990-01-01', 'jakarta timur', 'AMPHITHEATER PKWY', 2, '2020-03-08 08:30:38'),
(16, '3603282004830006', 'rizky tanjung', 'rickygimbal15@gmail.com', '9f6252654ed84d578309c7fa5bade7a1', '085280667313', '1983-04-20', 'tanggerang', 'Jl apel 1 no am2 talaga bestari balaraja tangerang banten', 2, '2020-03-30 01:26:39'),
(17, '3504010408950001', 'riza abdullah khoir', 'rezaguppytulungagung@gmail.com', '14bb81f54f4f5d9ba749f9c1561baab4', '085895183497', '1995-08-04', 'jakarta pusat', 'jln supriyadi 24e bago tulungagung', 2, '2020-06-20 18:09:40'),
(18, '3275092502960010', 'anggi aditya', 'anggiadityaramdani@gmail.com', 'dfa89113c4c1dc6ca439d93c1c9068bc', '0895424042554', '1994-06-25', 'bekasi', 'Jln almamuriah jatiasih', 2, '2020-06-23 17:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `kurir_id` int(11) NOT NULL,
  `kurir_no_ktp` varchar(25) NOT NULL,
  `kurir_nama` varchar(75) NOT NULL,
  `kurir_no_telp` varchar(15) NOT NULL,
  `kurir_email` varchar(75) NOT NULL,
  `kurir_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`kurir_id`, `kurir_no_ktp`, `kurir_nama`, `kurir_no_telp`, `kurir_email`, `kurir_password`) VALUES
(1, '1234567890', 'Kurir Kikan', '0812345433210', 'kurir@kikan.com', '202cb962ac59075b964b07152d234b70'),
(4, '', 'robi', '021', 'irwanrobi@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_kurir_id` int(11) NOT NULL,
  `package_customer_id` int(11) NOT NULL,
  `package_tujuan` varchar(100) NOT NULL,
  `package_alamat` text NOT NULL,
  `package_tgl_request` datetime DEFAULT NULL,
  `package_tgl_pickup` datetime DEFAULT NULL,
  `package_tgl_karantina` datetime DEFAULT NULL,
  `package_tgl_pengiriman` datetime DEFAULT NULL,
  `package_tgl_selesai` datetime DEFAULT NULL,
  `package_nama` varchar(75) NOT NULL,
  `package_keterangan` text,
  `package_resi` varchar(25) DEFAULT NULL,
  `package_tagihan_karantina` varchar(15) DEFAULT NULL,
  `package_tagihan_pengiriman` varchar(15) DEFAULT NULL,
  `package_status` enum('REQUEST','PICKUP','KARANTINA','PENGIRIMAN','SELESAI') NOT NULL DEFAULT 'REQUEST',
  `package_last_update` datetime DEFAULT NULL,
  `package_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_kurir_id`, `package_customer_id`, `package_tujuan`, `package_alamat`, `package_tgl_request`, `package_tgl_pickup`, `package_tgl_karantina`, `package_tgl_pengiriman`, `package_tgl_selesai`, `package_nama`, `package_keterangan`, `package_resi`, `package_tagihan_karantina`, `package_tagihan_pengiriman`, `package_status`, `package_last_update`, `package_created`) VALUES
(1, 1, 1, 'JAKARTA SELATAN', '', '2020-02-08 03:57:03', '2020-02-12 00:51:29', '2020-02-22 19:06:21', '2020-02-22 19:26:04', NULL, 'IKAN LELE', '30 EKOR', '2039189', '', '70000', 'PENGIRIMAN', '2020-02-22 19:26:04', '2020-02-08 10:57:03'),
(2, 1, 1, 'KALIMANTAN TIMUR', 'hahahahah', '2020-02-08 03:58:16', '2020-02-12 00:50:31', '2020-02-12 00:53:26', '2020-02-13 11:20:34', '2020-02-13 11:30:04', 'TES', '13', '123456789', '30000', '300000', 'SELESAI', '2020-02-13 11:30:04', '2020-02-08 10:58:16'),
(3, 1, 4, 'JAWA TIMUR', 'JALAN WIJAYA NOMOR 9', '2020-02-14 10:03:32', '2020-02-14 10:04:31', '2020-02-14 10:18:52', '2020-02-14 10:19:15', '2020-02-22 19:06:07', 'IKAN GURAME', '50 KILO, KURANG LEBIH 16 EKOR', '3211134', '50000', '500000', 'SELESAI', '2020-02-22 19:06:07', '2020-02-14 17:03:32'),
(4, 4, 10, 'BALI', 'JL. DENPASAR NO.32 KUTA BALI', '2020-02-22 10:15:11', '2020-02-22 19:07:34', '2020-02-22 19:07:52', '2020-02-22 19:26:11', '2020-02-22 19:31:19', 'IKAN CUPANG', '2 EKOR', '2039187', '85000', '70000', 'SELESAI', '2020-02-22 19:31:19', '2020-02-22 17:15:11'),
(5, 4, 9, 'SULAWESI SELATAN', 'PULAU KULAMBING DESA MATIRRO ULENG', '2020-02-22 10:48:09', '2020-02-22 10:50:34', '2020-02-22 10:51:11', '2020-02-22 10:52:50', '2020-02-22 10:53:45', 'IKAN GUPPY', '12 EKOR', '014342901', '100000', '75000', 'SELESAI', '2020-02-22 10:53:45', '2020-02-22 17:48:09'),
(6, 4, 9, 'SULAWESI SELATAN', 'PULAU KULAMBING, DESA MATTIRO ULENG', '2020-02-22 18:17:55', '2020-02-22 18:19:04', '2020-02-22 18:19:52', '2020-02-22 18:20:20', '2020-02-22 18:22:26', 'IKAN CUPANG', '12 EKOR', '0927362', '95000', '87000', 'SELESAI', '2020-02-22 18:22:26', '2020-02-22 18:17:55'),
(7, 4, 10, 'KALIMANTAN TIMUR', 'BANJARMASIN', '2020-02-22 19:06:46', '2020-02-22 19:07:28', '2020-02-22 19:07:39', '2020-02-22 19:25:47', '2020-02-22 19:31:07', 'IKAN CUPANG', '2 EKOR', '200173783', '25000', '70000', 'SELESAI', '2020-02-22 19:31:07', '2020-02-22 19:06:46'),
(8, 4, 9, 'JAWA TENGAH', 'JL. RASDAN 01', '2020-02-22 19:10:52', '2020-02-22 19:11:22', '2020-02-22 19:11:46', '2020-02-22 19:25:29', '2020-02-22 19:28:06', 'IKAN MELLOW', '12 EKOR', '192710', '25000', '70000', 'SELESAI', '2020-02-22 19:28:06', '2020-02-22 19:10:52'),
(9, 1, 10, 'BALI', 'JL DENPASAR NO.32 KUTA BALI', '2020-02-23 02:14:48', '2020-02-23 18:27:05', '2020-02-24 08:24:15', '2020-02-24 08:24:32', '2020-02-24 15:30:40', 'IKAN CUPANG', '2 EKOR', '1234', '50000', '72000', 'SELESAI', '2020-02-24 15:30:40', '2020-02-23 02:14:48'),
(10, 1, 10, 'JAWA TENGAH', 'PURWOKERTO', '2020-02-29 08:56:14', '2020-02-29 19:58:25', '2020-02-29 19:59:55', '2020-02-29 20:00:22', '2020-02-29 21:51:35', 'IKAN PAUS', '1 IKAN', '014356290480', '100000', '50000', 'SELESAI', '2020-02-29 21:51:35', '2020-02-29 08:56:14'),
(11, 1, 4, 'JAWA TIMUR', 'JALAN BUNGA NO 12', '2020-02-29 19:59:30', '2020-02-29 19:59:54', '2020-02-29 20:00:39', '2020-02-29 20:00:49', NULL, 'LELE DUMBO', '5 EKOR', '0182749', '100000', '70000', 'PENGIRIMAN', '2020-02-29 20:00:49', '2020-02-29 19:59:30'),
(12, 4, 10, 'BALI', 'JL. KUTA NO.21 DENPASAR', '2020-02-29 21:49:14', '2020-02-29 21:50:44', '2020-02-29 21:50:59', '2020-02-29 21:51:12', '2020-02-29 21:51:50', 'IKAN CUPANG', '5 IKAN', '012345', '100000', '65000', 'SELESAI', '2020-02-29 21:51:50', '2020-02-29 21:49:14'),
(13, 5, 10, 'JAWA TENGAH', 'PURWOKERTO', '2020-03-06 16:15:38', '2020-03-08 23:37:42', '2020-03-08 23:38:27', '2020-03-08 23:38:45', NULL, 'IKAN CUPANG', '2 EKOR', '1754288E6637', '10000', '25000', 'PENGIRIMAN', '2020-03-08 23:38:45', '2020-03-06 16:15:38'),
(14, 5, 14, 'BALI', 'DENPASAR', '2020-03-06 16:24:06', '2020-03-08 23:37:21', '2020-03-08 23:38:03', '2020-03-08 23:38:16', NULL, 'IKAN', 'IKAN', '71654Q899377', '10000', '34000', 'PENGIRIMAN', '2020-03-08 23:38:16', '2020-03-06 16:24:06'),
(15, 1, 4, 'JAWA TIMUR', 'JL. KALIMASADA RT06 KEL WARUNG DOWO PASURUAN', '2020-03-09 20:19:02', '2020-03-09 20:20:07', '2020-03-09 20:21:04', NULL, NULL, 'IKAN CUPANG', '1 SET', NULL, '100000', NULL, 'KARANTINA', '2020-03-09 20:21:04', '2020-03-09 20:19:02'),
(16, 5, 10, 'JAWA TIMUR', 'JL IR JUANDA NO.52 SURABAYA', '2020-03-09 20:24:28', '2020-03-09 20:30:00', '2020-03-20 12:14:04', '2020-03-20 12:14:24', NULL, 'IKAN CUPANG HALFMOON', '2 IKAN', '0129JKF', '100000', '45000', 'PENGIRIMAN', '2020-03-20 12:14:24', '2020-03-09 20:24:28'),
(17, 5, 14, 'SULAWESI SELATAN', 'HFDJ', '2020-03-14 17:32:06', '2020-03-14 17:32:41', '2020-03-14 17:34:33', '2020-03-14 17:34:55', '2020-03-14 17:36:06', 'IKAN', '2 ', 'AHSGSUSJSN', '10000', '37000', 'SELESAI', '2020-03-14 17:36:06', '2020-03-14 17:32:06'),
(18, 0, 10, 'JAWA TIMUR', 'JAFAG', '2020-03-18 16:30:47', NULL, NULL, NULL, NULL, 'IKAN', '2IKAN', NULL, NULL, NULL, 'REQUEST', '2020-03-18 16:30:47', '2020-03-18 16:30:47'),
(19, 0, 14, 'JAWA TIMUR', 'AAA', '2020-06-22 00:52:42', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, 'REQUEST', '2020-06-22 00:52:42', '2020-06-22 00:52:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`kurir_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
