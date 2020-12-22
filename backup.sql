-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 16, 2020 at 02:26 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_pabo`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `consumer` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `access_given` json NOT NULL,
  `used_at` int NOT NULL,
  `expire_at` int NOT NULL,
  `created_at` int NOT NULL,
  `update_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` varchar(10) NOT NULL,
  `namaKaryawan` varchar(200) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `noTelepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `namaKaryawan`, `departemen`, `noTelepon`, `email`, `alamat`) VALUES
('3400056730', 'John Botak', 'Keuangan', '081334562345', 'coba2@gmail.com', 'Jl. buntu No.20 Suka-suka'),
('3400056739', 'John azure', 'Keuangan', '081334562345', 'coba@gmail.com', 'Jl. buntu No.20 Suka-suka');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `noPolisi` varchar(10) NOT NULL,
  `merkKendaraan` varchar(100) NOT NULL,
  `jenisKendaraan` varchar(50) NOT NULL,
  `tipeKendaraan` varchar(50) NOT NULL,
  `tahun` year NOT NULL,
  `noMesin` varchar(20) NOT NULL,
  `noRangka` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`noPolisi`, `merkKendaraan`, `jenisKendaraan`, `tipeKendaraan`, `tahun`, `noMesin`, `noRangka`) VALUES
('AG4733XT', 'TOYOTA  INOVA', 'Roda Empat', 'AT/34', 2016, 'RWT567', 'RWT567TYRE'),
('AG4734XT', 'TOYOTA RUSH', 'Roda Empat', 'AT/35', 2018, 'RWT567', 'RWT567TYRE');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `body`) VALUES
(1, 'hanya coba', 'yaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idPengajuan` varchar(10) NOT NULL,
  `idKaryawan` varchar(10) NOT NULL,
  `tglPengajuan` date NOT NULL,
  `noPolisi` varchar(10) NOT NULL,
  `tempatServis` varchar(200) NOT NULL,
  `tanggalServis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idPengajuan`, `idKaryawan`, `tglPengajuan`, `noPolisi`, `tempatServis`, `tanggalServis`) VALUES
('HTRUT45H', '3400056730', '2020-12-08', 'AG4734XT', 'ASTRA OTTO ISKANDARDINATA', '2020-12-17'),
('WER45TS6', '3400056739', '2020-12-16', 'AG4733XT', 'ASTRA OTTO ISKANDARDINATA', '2020-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_reset_token` varchar(100) NOT NULL,
  `account_activation_token` varchar(100) NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`noPolisi`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idPengajuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `account_activation_token` (`account_activation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
