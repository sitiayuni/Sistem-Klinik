-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 07:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siaku`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `id` int(11) NOT NULL,
  `kode_apoteker` int(11) DEFAULT NULL,
  `nama_apoteker` varchar(255) DEFAULT NULL,
  `umur_apoteker` varchar(255) DEFAULT NULL,
  `alamat_apoteker` varchar(255) DEFAULT NULL,
  `telepon_apoteker` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apoteker`
--

INSERT INTO `apoteker` (`id`, `kode_apoteker`, `nama_apoteker`, `umur_apoteker`, `alamat_apoteker`, `telepon_apoteker`, `status`) VALUES
(4, 1101, 'Keyvin', '28', 'Sukarame', '089625337587', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `kode_dokter` int(11) DEFAULT NULL,
  `nama_dokter` varchar(255) DEFAULT NULL,
  `umur_dokter` int(11) DEFAULT NULL,
  `alamat_dokter` varchar(255) DEFAULT NULL,
  `telepon_dokter` varchar(20) DEFAULT NULL,
  `poli` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `kode_dokter`, `nama_dokter`, `umur_dokter`, `alamat_dokter`, `telepon_dokter`, `poli`) VALUES
(3, 1201, 'dr Agus', 28, 'Rajabasa', '089624373564', 'Umum'),
(4, 1202, 'dr Rin', 28, 'Natar', '089625773564', 'Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(50) DEFAULT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `stok` int(50) DEFAULT NULL,
  `harga_beli` int(50) DEFAULT NULL,
  `harga_jual` int(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `kode_obat`, `nama_obat`, `kategori`, `stok`, `harga_beli`, `harga_jual`, `status`) VALUES
(1, '1301', 'Adem Sari', 'Bebas', 28, 9000, 12000, 'Tersedia'),
(2, '1302', 'Paracetamol', 'Bebas', 30, 5000, 8000, 'Hampir Habis');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `kode_pasien` varchar(40) DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `umur_pasien` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(40) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `kode_pasien`, `nama_pasien`, `umur_pasien`, `jenis_kelamin`, `alamat`, `telepon`, `tanggal`) VALUES
(2, '101', 'Ayu', '37', 'Perempuan', 'Tanjungkarang', '089738217213', '2023-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` int(11) NOT NULL,
  `no_rekam_medis` varchar(30) DEFAULT NULL,
  `kode_pasien` varchar(30) DEFAULT NULL,
  `berat_badan` int(30) DEFAULT NULL,
  `tinggi_badan` int(30) DEFAULT NULL,
  `suhu_badan` int(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keluhan` varchar(255) DEFAULT NULL,
  `obat` varchar(255) DEFAULT NULL,
  `kode_dokter` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `no_rekam_medis`, `kode_pasien`, `berat_badan`, `tinggi_badan`, `suhu_badan`, `tanggal`, `keluhan`, `obat`, `kode_dokter`) VALUES
(1, 'RM1501', '1001', 50, 170, 60, '2023-06-23', 'Demam Tinggi', 'Paracetamol', '1107'),
(2, 'RM1502', '1002', 78, 166, 38, '2023-06-21', 'Sakit Hati', 'Adem Sari', '1103');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(20) DEFAULT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `biaya_daftar` int(30) DEFAULT NULL,
  `layanan` varchar(255) DEFAULT NULL,
  `biaya_medis` int(30) DEFAULT NULL,
  `biaya_obat` int(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `nama_pasien`, `biaya_daftar`, `layanan`, `biaya_medis`, `biaya_obat`, `tanggal`) VALUES
(1, '11303', 'Keyvin', 50000, 'Lepas Jahitan', 25000, 0, '2023-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama_depan`, `nama_belakang`, `alamat`) VALUES
(1, 'admin', '12345', 'admin', 'keyvin', 'jordan', 'sukarame'),
(3, 'pimpinan', '12345', 'pimpinan', NULL, NULL, NULL),
(4, 'apoteker', '12345', 'apoteker', 'J', 'Keyvin', 'Sukarame'),
(5, 'dokter', '12345', 'dokter', 'Key', 'Jor', 'Sukarame');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
