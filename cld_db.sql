-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2022 pada 06.42
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cld_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_barang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `stok_awal` varchar(50) NOT NULL,
  `stok_akhir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `satuan`, `stok_awal`, `stok_akhir`) VALUES
('BRG001', 'Control Piston', 'Unit', '300', '300'),
('BRG002', 'Filter Complete HDS', 'Unit', '200', '400'),
('BRG003', 'PC', 'Unit', '200', '200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_barang_keluar` varchar(50) NOT NULL,
  `id_barang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `stok_awal` varchar(50) CHARACTER SET latin1 NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_barang_keluar` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jml_barang_keluar` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ttl_stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_barang_keluar`, `id_barang`, `stok_awal`, `satuan`, `periode`, `tahun`, `tgl_barang_keluar`, `jml_barang_keluar`, `ttl_stok`) VALUES
('IBK001', 'BRG001', '500', 'Unit', '4', '2022', '2022-04-05', '200', '300'),
('IBK002', 'BRG003', '400', 'Unit', '4', '2022', '2022-04-22', '200', '200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_barang_masuk` varchar(50) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok_awal` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `tgl_barang_masuk` varchar(50) NOT NULL,
  `jml_barang_masuk` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_barang_masuk`, `id_barang`, `satuan`, `stok_awal`, `periode`, `tahun`, `tgl_barang_masuk`, `jml_barang_masuk`, `total_stok`) VALUES
('IBM001', 'BRG001', 'Unit', '300', '4', '2022', '2022-04-05', '200', '500'),
('IBM002', 'BRG002', 'Unit', '200', '4', '2022', '2022-04-22', '200', '400'),
('IBM003', 'BRG003', 'Unit', '200', '4', '2022', '2022-04-22', '200', '400');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_barang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `harga_satuan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `biaya_pembelian` varchar(50) NOT NULL,
  `biaya_penyimpanan` varchar(50) NOT NULL,
  `lead_time` varchar(50) NOT NULL,
  `total_biaya` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_barang`, `periode`, `tahun`, `tanggal`, `satuan`, `jumlah`, `harga_satuan`, `biaya_pembelian`, `biaya_penyimpanan`, `lead_time`, `total_biaya`) VALUES
('RPB001', 'BRG001', '4', '2022', '2022-04-07', 'Unit', '5', '195500', '150000', '25', '12', '977500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama_pengguna`, `telepon`, `email`, `username`, `password`, `level`) VALUES
('PGN001', 'Acen', '082339368112', 'acen@gmail.com', 'admin', '1234', 'Admin Gudang'),
('PGN002', 'Natan', '082339368112', 'natan@gmail.com', '1234', '1234', 'Accounting'),
('PGN003', 'Yhun', '082339368112', 'yu@gmail.com', '12345', '12345', 'Owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perkiraan`
--

CREATE TABLE `tbl_perkiraan` (
  `id_perkiraan` int(11) NOT NULL,
  `id_pembelian` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_barang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga_satuan` varchar(50) NOT NULL,
  `total_biaya` varchar(50) NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal` varchar(50) CHARACTER SET latin1 NOT NULL,
  `eoq` varchar(50) NOT NULL,
  `frekuensi` varchar(50) NOT NULL,
  `rop` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_perkiraan`
--

INSERT INTO `tbl_perkiraan` (`id_perkiraan`, `id_pembelian`, `id_barang`, `satuan`, `jumlah`, `harga_satuan`, `total_biaya`, `periode`, `tahun`, `tanggal`, `eoq`, `frekuensi`, `rop`) VALUES
(3, 'RPB001', 'BRG001', 'Unit', '5', '195500', '977500', '4', '2022', '2022-04-07', '6', '1', '7');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_perkiraan`
--
ALTER TABLE `tbl_perkiraan`
  ADD PRIMARY KEY (`id_perkiraan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_perkiraan`
--
ALTER TABLE `tbl_perkiraan`
  MODIFY `id_perkiraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
