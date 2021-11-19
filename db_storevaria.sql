-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2021 pada 17.07
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_storevaria`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penggarang_buku` varchar(255) NOT NULL,
  `penerbit_buku` varchar(255) NOT NULL,
  `tahun_buku` varchar(255) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `harga_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `kode_buku`, `judul_buku`, `penggarang_buku`, `penerbit_buku`, `tahun_buku`, `jumlah_buku`, `harga_buku`) VALUES
(6, '13221009', 'Mencari Surga', 'Pirdaus', 'PT. Elang Perkasa', '2021', 87, 60000),
(7, '13221008', 'Pujanggan Asmara', 'Sutan Mudo', 'PT. Pesona Muara', '2020', 27, 90000),
(8, '13221007', 'Kerinduan Buah Hati', 'Mak Itam', 'PT. Bintang Kejora', '2018', 25, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailjual`
--

CREATE TABLE `tb_detailjual` (
  `id_detail` int(11) NOT NULL,
  `id_invoice_detail` int(11) NOT NULL,
  `id_barang_detail` int(11) NOT NULL,
  `qty_detail` int(11) NOT NULL,
  `total_bayar_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `nohp_pelanggan` varchar(255) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `status_pelanggan` enum('Baru','Member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp_pelanggan`, `email_pelanggan`, `status_pelanggan`) VALUES
(3, 'Muhammad Arif', 'Sawahlunto', '08238899xxxx', 'arif@gamil.com', 'Baru'),
(4, 'Muhammad Asnur', 'Padang', '08238899xxxx', 'asnur@gmail.com', 'Baru'),
(5, 'Muhammad Furqon', 'Solok', '08238899xxxx', 'furqon@gmail.com', 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `nota_penjualan` varchar(50) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `total_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `nota_penjualan`, `tanggal_penjualan`, `total_penjualan`) VALUES
(59, '1', '2021-11-18', 390000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualandetail`
--

CREATE TABLE `tb_penjualandetail` (
  `id_detail` int(11) NOT NULL,
  `nota_detail` varchar(50) NOT NULL,
  `kode_detail` int(11) NOT NULL,
  `nama_detail` varchar(50) NOT NULL,
  `harga_detail` int(11) NOT NULL,
  `qty_detail` int(11) NOT NULL,
  `total_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualandetail`
--

INSERT INTO `tb_penjualandetail` (`id_detail`, `nota_detail`, `kode_detail`, `nama_detail`, `harga_detail`, `qty_detail`, `total_detail`) VALUES
(11, '1', 13221008, 'Pujanggan Asmara', 90000, 1, 90000),
(12, '1', 13221009, 'Mencari Surga', 60000, 5, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_temp`
--

CREATE TABLE `tb_temp` (
  `kode_temp` int(11) NOT NULL,
  `nama_temp` varchar(50) NOT NULL,
  `harga_temp` int(11) NOT NULL,
  `qty_temp` int(11) NOT NULL,
  `total_temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pelanggan','Pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'Admin'),
(5, 'fadel', 'fadel88', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_detailjual`
--
ALTER TABLE `tb_detailjual`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_penjualandetail`
--
ALTER TABLE `tb_penjualandetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_detailjual`
--
ALTER TABLE `tb_detailjual`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualandetail`
--
ALTER TABLE `tb_penjualandetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
