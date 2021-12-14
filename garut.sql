-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2021 pada 18.29
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garut`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `username`, `email`, `password`, `alamat`) VALUES
(1, 'Admin', 'admin', '', '$2y$05$45XlEAS82O77pwBBTcdDguWYZHkwDcvH4lcxHYrzkMg9cBV8zyDIu', 'Garut'),
(3, 'Rizal', 'rizal', 'syahrizalhanif@gmail.com', '$2y$05$OIujCOh.nFHGfXy3bKD35uYLFOlaCCb85YuZE/G4qQ.m/u1O21s3i', 'Kartasura'),
(5, 'Test', 'Test', 't@mail.com', '$2y$05$Za6MtNz3Q/ME.IdbI/yLTehAfdcYasJ/Rl45KrNHRjzHArEvaOWu2', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_event`
--

CREATE TABLE `rating_event` (
  `id_rating_event` int(11) NOT NULL,
  `rating` int(5) NOT NULL,
  `feedback` text NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_wisata`
--

CREATE TABLE `rating_wisata` (
  `id_rating_wisata` int(11) NOT NULL,
  `rating` int(5) NOT NULL,
  `feedback` text NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_event`
--

CREATE TABLE `transaksi_event` (
  `id_transaksi_event` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` text NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_wisata`
--

CREATE TABLE `transaksi_wisata` (
  `id_transaksi_wisata` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` text NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `thumbnail` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama`, `lokasi`, `deskripsi`, `thumbnail`, `id_petugas`) VALUES
(1, 'Cipanas', 'Desa Cipanas', 'Wisata pemandian air panas alami', 'cta-1-368x420.jpg', 5),
(2, 'Kompleks Wisata Darajat Garut', 'Puncak Darajat', 'Wisata pemandian air panas alami', 'cta-1-368x420.jpg', 5),
(4, 'Karacak Valley', 'Garut Kota', '<p>Tempat liburan berupa hutan pinus dan kebun kopi.<br></p>', 'cta-1-368x420.jpg', 5),
(5, 'Awit Sinar Alam Darajat', 'Kecamatan Pasirwangi', '<p>Pemandian air panas, <i>cottage</i> bergaya klasik dan area <i>outbound</i>.<br></p>', 'cta-1-368x420.jpg', 5),
(78, 'Garut', 'Gar', '<p>Gaa</p>', 'lab_itspku-600x400.jpg', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisatawan`
--

CREATE TABLE `wisatawan` (
  `id_wisatawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisatawan`
--

INSERT INTO `wisatawan` (`id_wisatawan`, `nama`, `username`, `password`, `alamat`, `email`, `no_hp`, `status`) VALUES
(2, 'Syahrizal', 'rizal666', '$2y$05$P9unxmPMRtcE8LrBUx4Uc.KzXxf6SvrP7cpXS5Jj3sDiNDnJBexjO', 'Solo', 'rzlco20@gmail.com', '0812736123', 1),
(4, 'Test', 'test', '$2y$05$UhuRQ19hb8uqenRgpOpTAOKux1bx3P3h/WvZbTWaWmN0scrrYuaSa', 'Solo', 'test@mail.com', '081231234', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `rating_event`
--
ALTER TABLE `rating_event`
  ADD PRIMARY KEY (`id_rating_event`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_wisatawan` (`id_wisatawan`);

--
-- Indeks untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  ADD PRIMARY KEY (`id_rating_wisata`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_wisatawan` (`id_wisatawan`);

--
-- Indeks untuk tabel `transaksi_event`
--
ALTER TABLE `transaksi_event`
  ADD PRIMARY KEY (`id_transaksi_event`),
  ADD KEY `id_wisatawan` (`id_wisatawan`),
  ADD KEY `id_event` (`id_event`);

--
-- Indeks untuk tabel `transaksi_wisata`
--
ALTER TABLE `transaksi_wisata`
  ADD PRIMARY KEY (`id_transaksi_wisata`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_wisatawan` (`id_wisatawan`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `wisatawan`
--
ALTER TABLE `wisatawan`
  ADD PRIMARY KEY (`id_wisatawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rating_event`
--
ALTER TABLE `rating_event`
  MODIFY `id_rating_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  MODIFY `id_rating_wisata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_event`
--
ALTER TABLE `transaksi_event`
  MODIFY `id_transaksi_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_wisata`
--
ALTER TABLE `transaksi_wisata`
  MODIFY `id_transaksi_wisata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `wisatawan`
--
ALTER TABLE `wisatawan`
  MODIFY `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating_event`
--
ALTER TABLE `rating_event`
  ADD CONSTRAINT `rating_event_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_event_ibfk_2` FOREIGN KEY (`id_wisatawan`) REFERENCES `wisatawan` (`id_wisatawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating_wisata`
--
ALTER TABLE `rating_wisata`
  ADD CONSTRAINT `rating_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_wisata_ibfk_2` FOREIGN KEY (`id_wisatawan`) REFERENCES `wisatawan` (`id_wisatawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_event`
--
ALTER TABLE `transaksi_event`
  ADD CONSTRAINT `transaksi_event_ibfk_1` FOREIGN KEY (`id_wisatawan`) REFERENCES `wisatawan` (`id_wisatawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_event_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_wisata`
--
ALTER TABLE `transaksi_wisata`
  ADD CONSTRAINT `transaksi_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_wisata_ibfk_2` FOREIGN KEY (`id_wisatawan`) REFERENCES `wisatawan` (`id_wisatawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
