-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 10:59 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahmatina`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIDN` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `alamat_dosen` varchar(200) NOT NULL,
  `status` enum('0','1','','') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIDN`, `kd_prodi`, `nama_dosen`, `alamat_dosen`, `status`, `foto`) VALUES
('1245142908', 'TI', 'Muhammad', 'Lhok Kiro', '1', 'defult.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NPM` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `alamat_mahasiswa` varchar(200) NOT NULL,
  `kd_unit` varchar(10) NOT NULL,
  `status` enum('0','1','','') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NPM`, `kd_prodi`, `nama_mahasiswa`, `alamat_mahasiswa`, `kd_unit`, `status`, `foto`) VALUES
('1705020020', 'TI', 'Rahmatina', 'Paya Reuhat', 'TI17', '1', 'defult.jpg'),
('1705020120', 'TI', 'Maulana', 'Paya Gaboh', 'TI17', '1', 'defult.jpg'),
('1705020220', 'AGB', 'Rizal', 'Lhok Kiro', 'AGB17', '1', 'defult.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengajaran`
--

CREATE TABLE `pengajaran` (
  `id_pengajaran` int(4) NOT NULL,
  `NIDN` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `kd_unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajaran`
--

INSERT INTO `pengajaran` (`id_pengajaran`, `NIDN`, `kd_prodi`, `kd_unit`) VALUES
(1, '1245142908', 'TI', 'TI17');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `nama_prodi`) VALUES
('AGB', 'Agribisnis'),
('AGT', 'Agroteknologi'),
('AKBID', 'Kebidanan'),
('BDP', 'Budidaya Perairan'),
('EP', 'Ekonomi Pembangunan'),
('IANA', 'Ilmu Administrasi Niaga'),
('IANR', 'Ilmu Administrasi Negara'),
('IHI', 'Ilmu Hubungan Internasional'),
('KHN', 'Kehutanan'),
('MI', 'Managemen Informatika'),
('PB', 'Pendidikan Biologi'),
('PBE', 'Pendidikan Bahasa Inggris'),
('PBSI', 'Pendidikan Bahasa dan Sastra Indonesia'),
('PE', 'Pendidikan Ekonomi'),
('PF', 'Pendidikan Fisika'),
('PG', 'Pendidikan Geografi'),
('PGPU', 'Pendidikan Guru Paud'),
('PGSD', 'Pendidikan Guru SD'),
('PM', 'Pendidikan Matematika'),
('PTN', 'Peternakan'),
('TA', 'Teknik Arsitektur'),
('TI', 'Teknik Informatika'),
('TIP', 'Teknologi Industri Pertanian'),
('TS', 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `kd_unit` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `smester` enum('I','II','III','IV','V','VI','VII','VIII') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`kd_unit`, `kd_prodi`, `smester`) VALUES
('AGB17', 'AGB', 'VIII'),
('MI20', 'MI', 'III'),
('TI17', 'TI', 'VIII'),
('TI18', 'TI', 'VII'),
('TI19', 'TI', 'VI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` enum('admin BPM','prodi','dosen','mahasiswa','') NOT NULL,
  `kd_prodi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `kd_prodi`) VALUES
(1, '1705020120', '$2y$10$YQc42iswpzawLMKcaU/nXO3jyXbvBi4gBWEfI0vs33rBwhKOtXvve', 'mahasiswa', NULL),
(2, '1245145167', '$2y$10$Rqpq3KrjK1.SXc5L1Wc6rOwwC0g5nDzARq7upefxoPLjUwwoD2uKe', 'prodi', 'TI'),
(3, 'admin1', '$2y$10$ueVT4/i04vDip9u1E2BE1eIi/i9ezJic8rE.Bl5lXXFlQbSXIVu7.', 'admin BPM', NULL),
(4, '1245142908', '$2y$10$zICpaWsclq72cgvcc1q9aOSyNpr/.CJGWlMFZtfXLp0Y.Hz/ekM2m', 'dosen', 'TI'),
(5, '1705020020', '$2y$10$xRGaJYKoGUZu2g3iAJM/muap/r.mQG0gAjWAA0ot9T/Sr8j4CJA3m', 'mahasiswa', NULL),
(6, 'admin2', '$2y$10$QpqfYs7aL7h/H7WSjkLz/O/LWWbLQmtgVHtcChYRsQo0Q4D.glIVO', 'admin BPM', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIDN`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NPM`);

--
-- Indexes for table `pengajaran`
--
ALTER TABLE `pengajaran`
  ADD PRIMARY KEY (`id_pengajaran`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`kd_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajaran`
--
ALTER TABLE `pengajaran`
  MODIFY `id_pengajaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
