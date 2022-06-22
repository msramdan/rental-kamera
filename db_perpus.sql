-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 10:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `bahasa_id` int(3) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `nama_alt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`bahasa_id`, `nama`, `nama_alt`) VALUES
(1, 'Indonesia', 'Bahasa Indonesia'),
(2, 'English', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `history_karyawan`
--

CREATE TABLE `history_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_karyawan`
--

INSERT INTO `history_karyawan` (`id`, `nama`, `info`, `tanggal`) VALUES
(498, 'M S Ramdan', ' Telah melakukan login', '14/07/2020 17:25:52'),
(499, 'ramdan', ' Telah melakukan login', '14/07/2020 17:26:59'),
(500, 'M S Ramdan', ' Telah melakukan login', '14/07/2020 17:28:11'),
(501, 'M S Ramdan', ' Telah melakukan login', '15/07/2020 16:30:11'),
(502, 'M S Ramdan', ' Telah melakukan login', '15/07/2020 16:35:09'),
(503, 'M S Ramdan', ' Telah melakukan login', '15/07/2020 16:35:37'),
(504, 'ramdan9090', ' Telah melakukan login', '15/07/2020 16:37:29'),
(505, 'M S Ramdan', ' Telah melakukan login', '15/07/2020 16:42:58'),
(506, 'ramdan9090', ' Telah melakukan login', '15/07/2020 16:43:32'),
(507, 'M S Ramdan', ' Telah melakukan login', '15/07/2020 16:44:00'),
(508, 'M S Ramdan', ' Telah melakukan login', '15/07/2020 19:37:52'),
(509, 'M S Ramdan', ' Telah melakukan login', '15/07/2020 19:47:30'),
(510, 'M S Ramdan', ' Telah melakukan login', '17/07/2020 10:22:01'),
(511, 'M S Ramdan', ' Telah melakukan login', '17/07/2020 11:03:51'),
(512, 'M S Ramdan', ' Telah melakukan login', '17/07/2020 12:23:20'),
(513, 'M S Ramdan', ' Telah melakukan login', '17/07/2020 16:24:48'),
(514, 'Muhammad Saeful Ramdan', ' Telah melakukan login', '18/07/2020 00:52:34'),
(515, 'Admin Aplikasi', ' Telah melakukan login', '18/07/2020 01:05:50'),
(516, 'Admin Aplikasi', ' Telah melakukan login', '18/07/2020 01:10:34'),
(517, 'Admin Aplikasi', ' Telah melakukan login', '18/07/2020 01:17:37'),
(518, 'Admin Aplikasi', ' Telah melakukan login', '18/07/2020 02:38:45'),
(519, 'Admin Aplikasi', ' Telah melakukan login', '18/07/2020 09:45:19'),
(520, 'Admin Aplikasi', ' Telah melakukan login', '18/07/2020 11:27:14'),
(521, 'Admin Aplikasi', ' Telah melakukan login', '18/07/2020 12:24:46'),
(522, 'Admin Aplikasi', ' Telah melakukan login', '19/07/2020 21:16:46'),
(523, 'Admin Aplikasi', ' Telah melakukan login', '19/07/2020 22:31:35'),
(524, 'Admin Aplikasi', ' Telah melakukan login', '19/07/2020 22:32:58'),
(525, 'Admin Aplikasi', ' Telah melakukan login', '19/07/2020 22:33:44'),
(526, 'Admin Aplikasi', ' Telah melakukan login', '19/07/2020 22:35:07'),
(527, 'Admin Aplikasi', ' Telah melakukan login', '05/01/2022 23:37:44'),
(528, 'Admin Aplikasi', ' Telah melakukan login', '07/01/2022 16:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `kamus`
--

CREATE TABLE `kamus` (
  `kamus_id` int(5) NOT NULL,
  `bahasa_id` int(3) DEFAULT NULL,
  `kode_kamus` int(3) DEFAULT NULL,
  `teks` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamus`
--

INSERT INTO `kamus` (`kamus_id`, `bahasa_id`, `kode_kamus`, `teks`) VALUES
(90, 1, 1, 'Selamat Datang'),
(91, 2, 1, 'Welcome'),
(92, 1, 2, 'Daftar Pekerjaan'),
(93, 2, 2, 'Job List'),
(94, 1, 3, 'Absen'),
(95, 2, 3, 'Absent'),
(96, 1, 4, 'Pengumuman'),
(97, 2, 4, 'Announcement'),
(98, 1, 5, 'Menjadi Universitas Terbaik dan Terpercaya Di Tingkat Nasional dengan Reputasi Global pada Tahun 2044'),
(99, 2, 5, 'Becoming the Best and Most Trusted University at the National Level with a Global Reputation in 2044'),
(100, NULL, 0, '2'),
(101, NULL, 0, NULL),
(102, NULL, 0, '2'),
(103, NULL, 0, NULL),
(104, NULL, NULL, NULL),
(105, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(1, '1000', 'Aktive', '20-07-20 01:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `buku_id`, `id_kategori`, `id_rak`, `sampul`, `isbn`, `title`, `penerbit`, `pengarang`, `thn_buku`, `jml`, `tgl_masuk`) VALUES
(10, 'BK0001', 1, 4, 'item-200718-6088f1395b.jpg', '9090', 'Pemrograman Dasar 1', 'PT AAA', 'Muhammad Saeful Ramdan', '2019', 12, '20-07-17 16:58:53'),
(11, 'BK0002', 1, 1, 'item-200718-3203b9429b.jpg', '222222222222', 'Pemrograman PHP', 'PT ABC', 'Ramdan', '2020', 200, '20-07-17 17:02:40'),
(12, 'BK0003', 1, 1, NULL, '3333333333333', 'Pemrograman Javascript', 'PT ABC', 'Ramdan', '2020', 250, '20-07-17 17:03:28'),
(13, 'BK0004', 2, 7, NULL, '909090', 'Belajar Akuntansi S1', 'PT Angkasa Raya', 'Ramdan', '2020', 20, '20-07-17 23:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pemrograman'),
(2, 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak Buku 1'),
(4, 'Rak Buku 2'),
(6, 'Rak Buku 3'),
(7, 'Rak Buku 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `anggota_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `level` char(1) DEFAULT 'U',
  `img_user` varchar(30) DEFAULT 'default.png',
  `is_aktive` enum('1','2') NOT NULL,
  `tgl_gabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`anggota_id`, `username`, `password`, `nama`, `email`, `alamat`, `kota`, `provinsi`, `kode_pos`, `telepon`, `level`, `img_user`, `is_aktive`, `tgl_gabung`) VALUES
(1, 'ramdan', '889752dcb81b4ad98ad6e36e9db2cd43', 'Muhammad Saeful Ramdan', 'ramdan_genz@yahoo.com', '', '', '', '', '083874731480', 'U', 'item-200718-e7e4679925.jpg', '1', '0000-00-00'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Aplikasi', 'saepulramdan244@gmail.com', 'Bekasi TImur', 'Bekasi', 'Jawa Barat', '17113', '083874731480', 'A', 'item-220105-542e0597c4.jpg', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_user_token` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_user_token`, `email`, `token`, `create_date`) VALUES
(25, 'ramdan_genz@yahoo.com', '4TU7/KERZPS2FdOG2TeI2+oXQVmvaRilp/FJBKLxgRI=', 1595009774),
(26, 'ramdan_genz@yahoo.com', 'cc0rZpm2hgM0tI6jNh9e7T0w/yZDnafkgm+LC5OqYLQ=', 1595009813);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`bahasa_id`);

--
-- Indexes for table `history_karyawan`
--
ALTER TABLE `history_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamus`
--
ALTER TABLE `kamus`
  ADD PRIMARY KEY (`kamus_id`);

--
-- Indexes for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_user_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `bahasa_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_karyawan`
--
ALTER TABLE `history_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;

--
-- AUTO_INCREMENT for table `kamus`
--
ALTER TABLE `kamus`
  MODIFY `kamus_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_user_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
