-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2021 pada 02.55
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
-- Struktur dari tabel `transaksi_midtrans`
--

CREATE TABLE `transaksi_midtrans` (
  `order_id` char(20) NOT NULL,
  `nama` text NOT NULL,
  `wisata` text NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(13) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `va_number` varchar(30) NOT NULL,
  `pdf_url` text NOT NULL,
  `status_code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_midtrans`
--

INSERT INTO `transaksi_midtrans` (`order_id`, `nama`, `wisata`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`) VALUES
('2109171865', 'Test', 'Karacak Valley', 100000, 'bank_transfer', '2021-12-18 17:27:19', 'bni', '9884609851102460', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3ffcb5e9-e6f7-4563-810d-02527617c761/pdf', '201');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_wisata`
--

CREATE TABLE `transaksi_wisata` (
  `order_id` char(20) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(13) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `va_number` varchar(30) NOT NULL,
  `pdf_url` text NOT NULL,
  `status_code` char(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_wisatawan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `id_wisata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_wisata`
--

INSERT INTO `transaksi_wisata` (`order_id`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `jumlah`, `id_wisatawan`, `nama`, `alamat`, `email`, `no_hp`, `id_wisata`) VALUES
('1224965716', 10000, 'bank_transfer', '2021-12-19 18:48:05', 'bca', '46098241297', 'https://app.sandbox.midtrans.com/snap/v1/transactions/1e711fe5-014f-4256-881e-9fc72cc761f5/pdf', '201', 2, 4, 'Test', 'Solo', 'test@mail.com', '081231234', 4),
('1475501474', 50000, 'bank_transfer', '2021-12-18 23:22:58', 'bca', '46098295135', 'https://app.sandbox.midtrans.com/snap/v1/transactions/7fd58dcf-80f5-492b-95a5-bfda73e9f2d6/pdf', '201', 5, 4, 'Test', 'Solo', 'test@mail.com', '081231234', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lokasi` text NOT NULL,
  `maps` text NOT NULL,
  `harga` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `thumbnail` text NOT NULL,
  `header` text NOT NULL,
  `destinasi1` text NOT NULL,
  `destinasi2` text NOT NULL,
  `destinasi3` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama`, `lokasi`, `maps`, `harga`, `deskripsi`, `thumbnail`, `header`, `destinasi1`, `destinasi2`, `destinasi3`, `id_petugas`) VALUES
(1, 'Cipanas', 'Desa Cipanas', '', 0, 'Wisata pemandian air panas alami', 'cta-1-368x420.jpg', 'breadcrumbs-bg.jpg', 'cta-1-368x420.jpg', 'cta-1-368x420.jpg', 'cta-1-368x420.jpg', 5),
(2, 'Kompleks Wisata Darajat Garut', 'Puncak Darajat', '', 0, 'Wisata pemandian air panas alami', 'cta-1-368x420.jpg', 'breadcrumbs-bg.jpg', 'cta-1-368x420.jpg', 'cta-1-368x420.jpg', 'cta-1-368x420.jpg', 5),
(4, 'Karacak Valley', 'Garut Kota', 'https://maps.google.com/maps?q=karacak%20valley&t=k&z=13&ie=UTF8&iwloc=&output=embed', 5000, '<p>Tempat liburan berupa hutan pinus dan kebun kopi.<br></p>', 'cta-1-368x420.jpg', 'breadcrumbs-bg.jpg', 'cta-1-368x420.jpg', 'cta-1-368x420.jpg', 'cta-1-368x420.jpg', 5),
(5, 'Awit Sinar Alam Darajat', 'Kecamatan Pasirwangi', 'https://maps.google.com/maps?q=Awit%20Sinar%20Alam%20Darajat&t=k&z=17&ie=UTF8&iwloc=&output=embed', 10000, '<p>Pemandian air panas, <i>cottage</i> bergaya klasik dan area <i>outbound</i>.<br></p>', 'thumbnail.jpg', '3.jpg', '2.jpg', '5.jpg', '4.jpg', 5);

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
(2, 'Syahrizal Hanif', 'rizal666', '$2y$05$Ybe6.dA8z26QJLfLUzvn1uJPUzddxrlTE/dmXjb8bjEzbNKaocBpa', 'Solo', 'rzlco20@gmail.com', '0812736123', 1),
(4, 'Testt', 'test', '$2y$05$JTHHX/X67oVr76F6T4a0XexWQ6Ex908EgtTYYcz7r0qqXJS/aAr0C', 'Solo0', 'test@mail.com', '0812312344', 1),
(5, 'Syahrizal Hanif', 'rzlco', '$2y$05$vXBZlZUdw1ncO5UgU1ciXepMQIQBkSfNhOKMGnNFDGYsNQ6OVFBi.', 'Semarang', 'syahrizalhanif@student.telkomuniversity.ac.id', '082312', 1);

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
-- Indeks untuk tabel `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `transaksi_wisata`
--
ALTER TABLE `transaksi_wisata`
  ADD PRIMARY KEY (`order_id`),
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
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `wisatawan`
--
ALTER TABLE `wisatawan`
  MODIFY `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
