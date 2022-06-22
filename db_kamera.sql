-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Jun 2022 pada 23.06
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kamera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_karyawan`
--

CREATE TABLE `history_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_karyawan`
--

INSERT INTO `history_karyawan` (`id`, `nama`, `info`, `tanggal`) VALUES
(531, 'admin', 'admin Telah melakukan login', '16/06/2022 09:39:38'),
(532, 'admin', 'admin Telah melakukan login', '16/06/2022 09:44:38'),
(533, 'admin', 'admin Telah melakukan login', '16/06/2022 10:24:59'),
(534, 'admin', 'admin Telah melakukan login', '16/06/2022 13:09:47'),
(535, 'admin', 'admin Telah melakukan login', '16/06/2022 13:25:53'),
(536, 'admin', 'admin Telah melakukan login', '16/06/2022 15:59:30'),
(537, 'admin', 'admin Telah melakukan login', '16/06/2022 16:16:49'),
(538, 'admin', 'admin Telah melakukan login', '16/06/2022 19:25:19'),
(539, 'admin', 'admin Telah melakukan login', '16/06/2022 20:08:41'),
(540, 'admin', 'admin Telah melakukan login', '16/06/2022 20:37:25'),
(541, 'admin', 'admin Telah melakukan login', '16/06/2022 20:39:27'),
(542, 'pegawai', 'pegawai Telah melakukan login', '16/06/2022 20:39:50'),
(543, 'admin', 'admin Telah melakukan login', '17/06/2022 06:02:25'),
(544, 'admin', 'admin Telah melakukan login', '17/06/2022 06:44:30'),
(545, 'admin', 'admin Telah melakukan login', '17/06/2022 07:34:59'),
(546, 'admin', 'admin Telah melakukan login', '17/06/2022 13:05:05'),
(547, 'admin', 'admin Telah melakukan login', '17/06/2022 20:04:11'),
(548, 'admin', 'admin Telah melakukan login', '18/06/2022 09:02:53'),
(549, 'admin', 'admin Telah melakukan login', '18/06/2022 13:23:49'),
(550, 'admin', 'admin Telah melakukan login', '18/06/2022 15:58:36'),
(551, 'pegawai', 'pegawai Telah melakukan login', '18/06/2022 16:06:21'),
(552, 'pegawai', 'pegawai Telah melakukan login', '18/06/2022 16:12:01'),
(553, 'admin', 'admin Telah melakukan login', '18/06/2022 16:36:41'),
(554, 'admin', 'admin Telah melakukan login', '18/06/2022 16:42:35'),
(555, 'admin', 'admin Telah melakukan login', '18/06/2022 20:36:32'),
(556, 'pegawai', 'pegawai Telah melakukan login', '18/06/2022 20:51:44'),
(557, 'admin', 'admin Telah melakukan login', '18/06/2022 20:52:32'),
(558, 'admin', 'admin Telah melakukan login', '18/06/2022 21:56:34'),
(559, 'admin', 'admin Telah melakukan login', '18/06/2022 21:56:45'),
(560, 'admin', 'admin Telah melakukan login', '18/06/2022 21:59:29'),
(561, 'admin', 'admin Telah melakukan login', '18/06/2022 22:00:20'),
(562, 'pegawai', 'pegawai Telah melakukan login', '18/06/2022 22:00:27'),
(563, 'admin', 'admin Telah melakukan login', '18/06/2022 22:00:32'),
(564, 'admin', 'admin Telah melakukan login', '18/06/2022 22:01:29'),
(565, 'admin', 'admin Telah melakukan login', '21/06/2022 18:32:37'),
(566, 'admin', 'admin Telah melakukan login', '21/06/2022 18:45:46'),
(567, 'admin', 'admin Telah melakukan login', '21/06/2022 22:00:39'),
(568, 'admin', 'admin Telah melakukan login', '22/06/2022 00:23:26'),
(569, 'admin', 'admin Telah melakukan login', '22/06/2022 00:24:13'),
(570, 'admin', 'admin Telah melakukan login', '22/06/2022 00:24:46'),
(571, 'admin', 'admin Telah melakukan login', '22/06/2022 00:31:57'),
(572, 'admin', 'admin Telah melakukan login', '22/06/2022 08:01:14'),
(573, 'admin', 'admin Telah melakukan login', '23/06/2022 01:27:36'),
(574, 'admin', 'admin Telah melakukan login', '23/06/2022 04:10:56'),
(575, 'admin', 'admin Telah melakukan login', '23/06/2022 04:18:53'),
(576, 'admin', 'admin Telah melakukan login', '23/06/2022 05:34:25'),
(577, 'admin', 'admin Telah melakukan login', '23/06/2022 05:42:59'),
(578, 'admin', 'admin Telah melakukan login', '23/06/2022 05:43:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(1, '10000', 'Aktive', '22-06-18 20:46:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kamera`
--

CREATE TABLE `tbl_kamera` (
  `id_kamera` int(11) NOT NULL,
  `kode_kamera` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kamera` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `jml` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kamera`
--

INSERT INTO `tbl_kamera` (`id_kamera`, `kode_kamera`, `id_kategori`, `nama_kamera`, `deskripsi`, `jml`, `harga`, `photo`) VALUES
(7, 'KA0004', 8, 'Kamera Canon D1000', 'jkdhsajhjsdadaszx', 10, 800, 'item-220618-104289744c.png'),
(8, 'KA0005', 9, 'Lensa Kamera Epson', 'Magnam sit pariatur', 100, 1000, 'item-220622-73354c7482.jpg'),
(9, 'KA0006', 7, 'Ea in quibusdam est ', 'Exercitationem duis ', 100, 8000, 'item-220622-65a1dc4f08.jpg'),
(10, 'KA0007', 8, 'Totam sint sed vero', 'Culpa quibusdam volu', 0, 96, 'item-220622-3e1ebda376.png'),
(11, 'KA0008', 8, 'Itaque alias tempori', 'Cupiditate et eum vo', 0, 81, 'item-220622-f6fd11a9d1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(7, 'Lensa'),
(8, 'Kamera'),
(9, 'Aksesoris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `nama_member` varchar(150) NOT NULL,
  `jk_kelamin` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `username`, `ktp`, `nama_member`, `jk_kelamin`, `no_hp`, `alamat`, `password`) VALUES
(8, '1234', '123456789', 'Muhammad Saeful Ramdan', 'Laki-Laki', '083874731480', 'Bogor', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sewa`
--

CREATE TABLE `tbl_sewa` (
  `sewa_id` int(11) NOT NULL,
  `kode_sewa` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `tanggal_req` date DEFAULT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sewa`
--

INSERT INTO `tbl_sewa` (`sewa_id`, `kode_sewa`, `member_id`, `tanggal_req`, `tanggal_sewa`, `users_id`, `grand_total`) VALUES
(59, 'SW0001', 8, '2022-06-23', NULL, NULL, 81);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sewa_detail`
--

CREATE TABLE `tbl_sewa_detail` (
  `sewa_detail_id` int(11) NOT NULL,
  `sewa_id` int(11) NOT NULL,
  `kamera_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tanggal_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sewa_detail`
--

INSERT INTO `tbl_sewa_detail` (`sewa_detail_id`, `sewa_id`, `kamera_id`, `harga`, `total`, `tanggal_sewa`, `lama_sewa`, `tanggal_kembali`) VALUES
(86, 59, 11, 81, 81, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `anggota_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level` char(1) DEFAULT 'U',
  `img_user` varchar(30) DEFAULT 'default.png',
  `is_aktive` enum('1','2') NOT NULL,
  `tgl_gabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`anggota_id`, `username`, `password`, `email`, `level`, `img_user`, `is_aktive`, `tgl_gabung`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'saepulramdan244@gmail.com', 'A', 'item-220616-f7c2f2db38.png', '1', '0000-00-00'),
(5, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'zojaw@mailinator.com', 'U', 'item-220616-d376cadceb.png', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `id_kamera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history_karyawan`
--
ALTER TABLE `history_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indeks untuk tabel `tbl_kamera`
--
ALTER TABLE `tbl_kamera`
  ADD PRIMARY KEY (`id_kamera`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD PRIMARY KEY (`sewa_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indeks untuk tabel `tbl_sewa_detail`
--
ALTER TABLE `tbl_sewa_detail`
  ADD PRIMARY KEY (`sewa_detail_id`),
  ADD KEY `sewa_id` (`sewa_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `id_kamera` (`id_kamera`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history_karyawan`
--
ALTER TABLE `history_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=579;

--
-- AUTO_INCREMENT untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kamera`
--
ALTER TABLE `tbl_kamera`
  MODIFY `id_kamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  MODIFY `sewa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tbl_sewa_detail`
--
ALTER TABLE `tbl_sewa_detail`
  MODIFY `sewa_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_kamera`
--
ALTER TABLE `tbl_kamera`
  ADD CONSTRAINT `tbl_kamera_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD CONSTRAINT `tbl_sewa_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `tbl_member` (`member_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sewa_detail`
--
ALTER TABLE `tbl_sewa_detail`
  ADD CONSTRAINT `tbl_sewa_detail_ibfk_1` FOREIGN KEY (`sewa_id`) REFERENCES `tbl_sewa` (`sewa_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `tbl_member` (`member_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_kamera`) REFERENCES `tbl_kamera` (`id_kamera`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
