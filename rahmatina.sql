-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 08:53 AM
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
  `status` int(1) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIDN`, `kd_prodi`, `nama_dosen`, `alamat_dosen`, `status`, `foto`) VALUES
('0000034568', 'TI', 'Feri Irawan', 'Mataram', 1, ''),
('009876523', 'TI', 'Maimun', 'Paloh', 1, 'JJSA'),
('2222000002', 'TI', 'Maharaani', 'dfwfwk', 1, ''),
('2222234567', 'TI', 'Muhammad3', 'Lhok Kiro', 1, 'defult.jpg'),
('2222234568', 'SI', 'Fadhli', 'Paya Bugak', 1, 'default.jpg'),
('3555345345', 'PBE', 'Andika', 'Paya Rukoh', 1, 'default.jpg'),
('664756437', 'PF', 'Garung', 'sdgs', 0, 'default.jpg'),
('8855757745', 'PB', 'Saiful', 'Rukoh', 1, ''),
('ffffsfrwr3', 'TI', 'dssd', 'gfdgdfg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kd_fakultas` varchar(10) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kd_fakultas`, `nama_fakultas`) VALUES
('FE', 'Fakultas Ekonomi'),
('FIKOM', 'Fakultas Ilmu Komputer'),
('FISIPOL', 'Fakultas ilmu Sosial dan Politik'),
('FKIP', 'Fakultas Keguruan dan Ilmu Pendidikan'),
('FT', 'Fakultas Teknik'),
('gdfg', 'gsdfgdssgs'),
('KEBIDANAN', 'Kebidanan'),
('PERTANIAN', 'Fakultas Pertanian');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_pertanyaan`
--

CREATE TABLE `kriteria_pertanyaan` (
  `kd_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_pertanyaan`
--

INSERT INTO `kriteria_pertanyaan` (`kd_kriteria`, `nama_kriteria`) VALUES
('DM', 'Disiplin Mengajar'),
('EMJ', 'Evaluasi Mengajar'),
('KD', 'Kepribadian Dosen'),
('KM', 'Kesiapam Mengajar'),
('MP', 'Materi Pengajaran');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NPM` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `alamat_mahasiswa` varchar(200) NOT NULL,
  `status` enum('0','1','','') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NPM`, `kd_prodi`, `nama_mahasiswa`, `alamat_mahasiswa`, `status`, `foto`) VALUES
('1234567890', 'TI', 'Rahmatina', 'Paya Reuhat', '1', 'defult.jpg'),
('1436473777', 'PM', 'M. Arif', 'Paya', '1', ''),
('1705020120', 'BDP', 'Maulana', 'Paya Gaboh', '1', 'defult.jpg'),
('1705020220', 'AGB', 'Rizal', 'Lhok Kiro', '1', 'defult.jpg'),
('1815020220', 'PB', 'Rauzah', 'Matang Sago', '1', 'default.jpg'),
('2221232130', 'TI', 'Mulyadi', 'fdfg', '1', ''),
('442eefsffe', 'TI', 'fedfsf', 'dfsdfs', '1', ''),
('4577636009', 'PGSD', 'Mahfudhah', 'Hanoi', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kd_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(30) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `sks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kd_matakuliah`, `nama_matakuliah`, `kd_prodi`, `sks`) VALUES
('dfs', 'gsgsg123', 'SI', 2),
('MKMP', 'Metode Penelitian', 'TI', 3),
('MKPM1', 'Pemrograman 1', 'TI', 3),
('MKPM2', 'Pemrograman 2', 'TI', 3);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_dosen`
--

CREATE TABLE `matakuliah_dosen` (
  `id` int(11) NOT NULL,
  `kd_matakuliah` varchar(10) NOT NULL,
  `NIDN` varchar(10) NOT NULL,
  `smester` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `NPM` varchar(10) NOT NULL,
  `NIDN` varchar(10) NOT NULL,
  `kd_matakuliah` varchar(10) NOT NULL,
  `smester` varchar(6) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `NPM`, `NIDN`, `kd_matakuliah`, `smester`, `tahun_ajaran`, `nilai`, `pesan`) VALUES
(1, '1234567890', '2222000002', 'MKMP', 'Ganjil', '2020 / 2021', '5.00', 'fgjfjjfdjd'),
(3, '1234567890', '2222234567', 'MKPM1', 'Ganjil', '2020 / 2021', '3.00', 'ggggfgffhg'),
(4, '1234567890', '2222234567', 'MKMP', 'Genap', '2020 / 2021', '4.00', 'gfdgdsf'),
(5, '2221232130', '2222000002', 'MKMP', 'Ganjil', '2020 / 2021', '4.11', 'lnlnnlnlkn'),
(6, '1234567890', '009876523', 'MKMP', 'Genap', '2020 / 2021', '4.56', ',md;jwjgjgepgj'),
(7, '1234567890', '009876523', 'MKMP', 'Ganjil', '2019 / 2020', '2.67', 'sdvsdvvsdvs');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `kd_kriteria` varchar(10) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `kd_kriteria`, `pertanyaan`) VALUES
(1, 'KM', 'Dosen sangat siap mengajar di kelas'),
(2, 'KM', 'Dosen menyediakan diktat kuliah selain buku teks'),
(3, 'MP', 'Dosen menyelesaikan seluruh materi sesuai isi SAP'),
(4, 'DM', 'Dosen selalu hadir memberi kuliah setiap pertemuan'),
(5, 'EMJ', 'Sikap dosen baik saat mengajar'),
(6, 'EMJ', 'Dosen menerima masukan mahasiswa dengan baik'),
(7, 'KD', 'Dosen sangat disiplin'),
(8, 'KD', 'Memberikan nilai mahasiswa sesuai kemampuan'),
(9, 'MP', 'Dosen menyediakan bahan ajar tambahan selain diktat dan buku teks');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kd_prodi` varchar(10) NOT NULL,
  `kd_fakultas` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `kd_fakultas`, `nama_prodi`) VALUES
('AGB', 'PERTANIAN', 'Agribisnis'),
('AGT', 'PERTANIAN', 'Agroteknologi'),
('AKBID', 'KEBIDANAN', 'Kebidanan'),
('BDP', 'PERTANIAN', 'Budidaya Perairan'),
('EP', 'FE', 'Ekonomi Pembangunan'),
('IANA', 'FISIPOL', 'Ilmu Administrasi Niaga'),
('IANR', 'FISIPOL', 'Ilmu Administrasi Negara'),
('IHI', 'FISIPOL', 'Ilmu Hubungan Internasional'),
('KHN', 'PERTANIAN', 'Kehutanan'),
('PB', 'FKIP', 'Pendidikan Biologi'),
('PBE', 'FKIP', 'Pendidikan Bahasa Inggris'),
('PBSI', 'FKIP', 'Pendidikan Bahasa dan Sastra Indonesia'),
('PE', 'FKIP', 'Pendidikan Ekonomi'),
('PF', 'FKIP', 'Pendidikan Fisika'),
('PG', 'FKIP', 'Pendidikan Geografi'),
('PGPU', 'FKIP', 'Pendidikan Guru Paud'),
('PGSD', 'FKIP', 'Pendidikan Guru SD'),
('PM', 'FKIP', 'Pendidikan Matematika'),
('PTN', 'PERTANIAN', 'Peternakan'),
('SI', 'FIKOM', 'Sistem Informasi'),
('TA', 'FT', 'Teknik Arsitektur'),
('TI', 'FIKOM', 'Teknik Informatika'),
('TIP', 'PERTANIAN', 'Teknologi Industri Pertanian'),
('TS', 'FT', 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(30) NOT NULL,
  `kd_prodi` varchar(10) DEFAULT NULL,
  `created` varchar(100) NOT NULL,
  `modifed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `kd_prodi`, `created`, `modifed`) VALUES
(6, 'bpm1', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'BPM', NULL, '08-02-2021 01:11:30', ''),
(8, '2222234567', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'dosen', 'TI', '05-04-2021 19:40:40', ''),
(12, '1234567890', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'mahasiswa', 'TI', '05-04-2021 19:40:40', '15-04-2021 01:02:26'),
(14, 'proditi', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'prodi', 'TI', '05-04-2021 19:40:40', '13-04-2021 20:31:32'),
(15, 'admin1', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'admin', NULL, '05-04-2021 19:40:40', '13-04-2021 19:25:31'),
(17, 'admin3', '$2y$10$mKGb1x4mSkx8YQi/zwjLFOnAb1D60599ltHj99luuGQdLGb0UWza6', 'admin', NULL, '12-04-2021 16:24:17', '13-04-2021 13:56:53'),
(18, 'admin4', '$2y$10$RWsQr4JEcKaMitUB6Ir9vuf1Aa6YsFGvcKngskogTxgPhS6d5D63O', 'admin', NULL, '12-04-2021 16:25:22', '13-04-2021 13:55:21'),
(20, 'prodisi', '$2y$10$8ngIHGqWSmcu51YxY9la.ulIw.v.0u0Owy.NdUg1iZKSeT/O9JEAe', 'prodi', 'SI', '12-04-2021 23:47:08', '13-04-2021 20:58:09'),
(21, '2222234568', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'dosen', 'SI', '13-04-2021 00:08:41', '13-04-2021 14:14:03'),
(23, '4577636009', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'mahasiswa', 'PGSD', '13-04-2021 00:45:11', NULL),
(25, '1436473777', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'mahasiswa', 'PM', '15-04-2021 00:08:08', '15-04-2021 00:08:45'),
(26, '8855757745', '$2y$10$Mfd2u.AKS9UA0aTy.1GLIeVbFFaVBPbJSRVmIWqwHFSZCcFLZf.OK', 'dosen', 'PBE', '15-04-2021 00:40:54', NULL),
(28, '009876523', '$2y$10$KL0256uWTvEiTEYg4IiAROR5ZoR6UlZzmTLNUnOxREI4qLNwkWCv6', 'dosen', 'TI', '05-04-2021 19:40:40', NULL),
(29, '2222000002', '$2y$10$3vf1W8nWaGFea1d3tuIvGevyOWdIbJUJDlnE6qlLwbYOZQkeLI4o6qa', 'dosen', 'TI', '16-04-2021 21:00:26', NULL),
(30, '2221232130', '$2y$10$OyZORJ/InmQib5OoFyXNiOM/TXIoVBVfWqg8KRIfhBVu4gtUEgyPK', 'mahasiswa', 'TI', '16-04-2021 21:04:22', NULL),
(31, '0000034568', '$2y$10$8i4z2CvPx8qoaX3BeDpbQux7mqCAQSMmlUhJgACM1CWAJ1par7HTG', 'dosen', 'TI', '19-04-2021 11:42:10', NULL),
(32, '442eefsffe', '$2y$10$WlVdcVfq5oSnmG8W5OWsr.rjcABs5fImNUp1LlB4zAl7PGzhiUzV2', 'mahasiswa', 'TI', '19-04-2021 12:22:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIDN`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kd_fakultas`);

--
-- Indexes for table `kriteria_pertanyaan`
--
ALTER TABLE `kriteria_pertanyaan`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NPM`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kd_matakuliah`);

--
-- Indexes for table `matakuliah_dosen`
--
ALTER TABLE `matakuliah_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matakuliah_dosen`
--
ALTER TABLE `matakuliah_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
