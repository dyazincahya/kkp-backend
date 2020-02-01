-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2020 at 09:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkp_backend`
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
(1, 'admin', 'admin@example.com', '202cb962ac59075b964b07152d234b70');

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
  `customer_status` smallint(6) NOT NULL DEFAULT 0,
  `customer_reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_no_ktp`, `customer_nama`, `customer_email`, `customer_password`, `customer_no_telp`, `customer_tgl_lahir`, `customer_kota_tinggal`, `customer_alamat`, `customer_status`, `customer_reg_date`) VALUES
(1, '12345678902342342', 'Budi Boy', 'budi@example.com', '202cb962ac59075b964b07152d234b70', '08123456789', '2018-10-01', 'DKI Jakarta', 'Ragunan, Pasar minggu, Jakarta selatan', 0, '0000-00-00 00:00:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_kurir_id` int(11) NOT NULL,
  `package_customer_id` int(11) NOT NULL,
  `package_tujuan` varchar(100) NOT NULL,
  `package_tgl_request` date NOT NULL,
  `package_keterangan` text NOT NULL,
  `package_resi` varchar(25) NOT NULL,
  `package_no_tagihan` varchar(15) NOT NULL,
  `package_status` enum('REQUEST PICKUP','KARANTINA','PENGIRIMAN','SELESAI') NOT NULL,
  `package_last_update` datetime NOT NULL,
  `package_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
