-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2022 pada 13.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pwtm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_pesan`
--

CREATE TABLE `detil_pesan` (
  `id_pesan` int(5) NOT NULL,
  `id_produk` varchar(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detil_pesan`
--

INSERT INTO `detil_pesan` (`id_pesan`, `id_produk`, `jumlah`, `harga`) VALUES
(1, 'B0001', 10, '20000'),
(1, 'B0003', 10, '5000'),
(1, 'B0004', 50, '50000'),
(2, 'B0003', 20, '10000'),
(3, 'B0001', 10, '20000'),
(4, 'B0002', 1, '2500');

--
-- Trigger `detil_pesan`
--
DELIMITER $$
CREATE TRIGGER `ambilstock` AFTER INSERT ON `detil_pesan` FOR EACH ROW BEGIN
	UPDATE produk set stock = stock - NEW.jumlah
	WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(5) NOT NULL,
  `id_pesan` int(5) NOT NULL,
  `tgl_faktur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `id_pesan`, `tgl_faktur`) VALUES
(1, 1, '2022-07-06'),
(2, 2, '2022-07-06'),
(3, 3, '2022-07-06'),
(4, 4, '2022-07-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuitansi`
--

CREATE TABLE `kuitansi` (
  `id_kuitansi` int(5) NOT NULL,
  `id_faktur` int(5) NOT NULL,
  `tgl_kuitansi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kuitansi`
--

INSERT INTO `kuitansi` (`id_kuitansi`, `id_faktur`, `tgl_kuitansi`) VALUES
(1, 1, '2022-07-06'),
(2, 2, '2022-07-06'),
(3, 3, '2022-07-06'),
(4, 4, '2022-07-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nm_pelanggan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `alamat`, `telepon`, `email`) VALUES
('P0001', 'Januwa Putra', 'Jakarta', '08967567575', 'janu@gmail.com'),
('P0002', 'budi', 'Tangerang', '0896767565', 'budi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(5) NOT NULL,
  `id_pelanggan` varchar(5) NOT NULL,
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `tgl_pesan`) VALUES
(1, 'P0001', '2022-07-06'),
(2, 'P0002', '2022-07-06'),
(3, 'P0001', '2022-07-04'),
(4, 'P0001', '2022-07-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(5) NOT NULL,
  `nm_produk` varchar(30) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `satuan`, `harga`, `stock`) VALUES
('B0001', 'Penggaris', 'Buah', '2500', 180),
('B0002', 'Pensil', 'Buah', '2500', 199),
('B0003', 'Pulpen', 'Buah', '2000', 170),
('B0004', 'Buku Tulis', 'Buah', '5000', 150);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detil_pesan`
--
ALTER TABLE `detil_pesan`
  ADD PRIMARY KEY (`id_pesan`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indeks untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD PRIMARY KEY (`id_kuitansi`),
  ADD KEY `id_faktur` (`id_faktur`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pelanggam` (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detil_pesan`
--
ALTER TABLE `detil_pesan`
  ADD CONSTRAINT `detil_pesan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_pesan_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD CONSTRAINT `kuitansi_ibfk_1` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
