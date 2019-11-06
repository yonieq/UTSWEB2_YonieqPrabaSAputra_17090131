-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jul 2019 pada 08.22
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_motor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_motor`
--

CREATE TABLE `jenis_motor` (
  `id_jenis_motor` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `jenis_motor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_motor`
--

INSERT INTO `jenis_motor` (`id_jenis_motor`, `id_merk`, `jenis_motor`) VALUES
(1, 2, 'Beat'),
(5, 1, 'Mio'),
(7, 2, 'scoopy'),
(9, 7, 'Ninja RR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(1, 'Yamahaa'),
(2, 'Honda'),
(3, 'Suzuki'),
(7, 'kawasaki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_jenis_motor` int(11) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `stnk` int(2) NOT NULL,
  `bpkb` int(2) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `harga_pembelian` double NOT NULL,
  `penjual` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_jenis_motor`, `nopol`, `stnk`, `bpkb`, `tgl_pembelian`, `harga_pembelian`, `penjual`, `alamat`, `keterangan`, `status`) VALUES
(9, 7, 'G 3454 AFG', 0, 0, '2019-07-02', 12000, 'Daplank', 'kedokan sayang', 'barang special', 0),
(10, 1, 'G 1234 AEF', 0, 0, '2019-07-02', 15000000, 'DANI', 'tegal', 'baru', 0),
(11, 9, 'G 6234 AEF', 0, 0, '2019-07-02', 20000000, 'Dani', 'pagerbarang', 'special', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `harga_penjualan` double NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pembelian`, `tgl_penjualan`, `harga_penjualan`, `pembeli`, `alamat`, `keterangan`) VALUES
(10, 11, '2019-07-02', 22000000, 'Dani', '', 'dp 1000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `hak_akses`, `foto`) VALUES
(1, 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', ''),
(3, 'Dani', 'pengguna', '827ccb0eea8a706c4c34a16891f84e7b', 'operator', 'file/foto_petugas/default_user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_motor`
--
ALTER TABLE `jenis_motor`
  ADD PRIMARY KEY (`id_jenis_motor`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_merk` (`id_jenis_motor`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_motor`
--
ALTER TABLE `jenis_motor`
  MODIFY `id_jenis_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
