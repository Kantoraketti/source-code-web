-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2020 pada 03.51
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_beasiswa`
--

CREATE TABLE `informasi_beasiswa` (
  `id` int(11) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `nama_beasiswa` varchar(50) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informasi_beasiswa`
--

INSERT INTO `informasi_beasiswa` (`id`, `gambar`, `nama_beasiswa`, `tanggal`, `deskripsi`, `link`) VALUES
(81, 'img1.jpg', 'Beasiswa Bank Indonesia', '2021-02-21', 'Beasiswa Bank Indonesia Batch 10 tahun 2020', 'www.BeasiswaBankIndonesia.com'),
(82, 'img2.jpg', 'Beasiswa Bidikmisi 2020', '2021-06-10', 'Beasiswa Bidik Misi tahun 2021', 'www.Bidikmisi.com'),
(83, 'img3.jpg', 'Beasiswa Bank Lampung', '2021-11-17', 'Beasiswa Bank Lampung tahun 2021', 'www.BeasiswaBankLampung.com.com'),
(94, 'jpg', 'Beasiswa Paktani', '2020-12-31', 'Beasiswa Paktani', 'www.paktani.com'),
(99, 'poster-beasiswa-ideas-revisi-1-1-1024x1024.jpg', 'Beasiswa Ideas for Indonesia', '2021-03-03', 'Program beasiswa ini diluncurkan oleh ideas for Indonesia. IDEAS (International Delegates of Educational Academic Society) for Indonesian hadir sebagai platform pendidikan masyarakat ASEAN (Indonesia) untuk dunia. Beasiswa IDEAS for Indonesia ini merupakan komitmen dan kepedulian terhadap pendidikan di Indonesia Program ini diluncurkan dan di peruntukan untuk pelajar SMA/SMK/MA/Sederajat dan mahasiswa baik dari kategori mahasiswa yang berasal dari keluarga kurang mampu atau mahasiswa yang berprestasi baik akademik maupun non akademik. Tujuan dari program ini supaya banyak pelajar yang dibantu dalam hal pembiayaan pendidikannya sehingga mereka bisa menghasilkan prestasi gemilang.  ', 'www.ideasforindonesia.com/BEASISWAIDEAS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi_beasiswa`
--
ALTER TABLE `informasi_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `informasi_beasiswa`
--
ALTER TABLE `informasi_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
