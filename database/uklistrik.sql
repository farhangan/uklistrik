-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2019 pada 13.21
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uklistrik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(7) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
('ADM0002', 'Farhan Ismul Afriza', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('ADM0003', 'Elfani Putri Muchain', 'elfani', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
('ADM0004', 'Farhan Ismul Afriza', 'farhan', '14e94af205f8d81050aced688b1de5f0', 'admin'),
('ADM0005', 'fazril albalqi', 'fazril', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` char(7) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `username`, `password`, `level`) VALUES
('BNK0001', 'Bank Mandiri', 'mandiri', '5f3ec9208e95d246e7abc35b99710ffe', 'bank'),
('BNK0002', 'Bank BNI', 'bni', '827ccb0eea8a706c4c34a16891f84e7b', 'bank');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(7) NOT NULL,
  `nomor_kwh` int(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_tarif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES
('PLG0001', 1203992382, 'Farhan Ismul Afriza', 'Jl.Medan Barat', 'TRF0001'),
('PLG0002', 1203992382, 'Muhammad Farhan', 'Jl.sekata gg.ihklas', 'TRF0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(7) NOT NULL,
  `id_tagihan` char(7) NOT NULL,
  `id_pelanggan` char(7) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `bulan_bayar` int(20) NOT NULL,
  `biaya_admin` int(12) NOT NULL,
  `total_bayar` int(12) NOT NULL,
  `id_bank` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` char(7) NOT NULL,
  `id_pelanggan` char(7) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `meter_awal` int(12) NOT NULL,
  `meter_akhir` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` char(7) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
('PTG0001', 'Muhammad Farhan', 'farhanitam', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas'),
('PTG0002', 'Hafizh Majid', 'hafizh', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas'),
('PTG0003', 'Farhan Ismul', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas'),
('PTG0004', 'Muhammad Aqil', 'aqiller', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas'),
('PTG0005', 'mizone', 'mizone', '827ccb0eea8a706c4c34a16891f84e7b', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` char(7) NOT NULL,
  `id_penggunaan` char(7) NOT NULL,
  `id_pelanggan` char(7) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlah_meter` int(12) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` char(7) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `daya` varchar(20) NOT NULL,
  `tarifperkwh` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `golongan`, `daya`, `tarifperkwh`) VALUES
('TRF0001', 'R-1/900VA', '900VA', 586),
('TRF0002', 'R-1/450VA', '450VA', 450),
('TRF0003', 'R-1/1300VA', '1300VA', 1467),
('TRF0004', 'R-1M/900VA', '900VA', 1352),
('TRF0005', 'R-1/2200VA', '2200VA', 1467),
('TRF0006', 'R-2/3500VA', '3500VA', 1467),
('TRF0007', 'R-2/4400VA', '4400VA', 1467),
('TRF0008', 'R-2/5500VA', '5500VA', 1467),
('TRF0009', 'R3/6600VA', '6600VA', 1467);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `idpelanggan` (`id_pelanggan`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_petugas`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_4` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`);

--
-- Ketidakleluasaan untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`id_penggunaan`) REFERENCES `penggunaan` (`id_penggunaan`) ON DELETE CASCADE,
  ADD CONSTRAINT `tagihan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
