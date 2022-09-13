-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2022 pada 11.18
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
-- Database: `mediabelajar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(100) NOT NULL,
  `id_materi` int(100) NOT NULL,
  `soal` text NOT NULL,
  `jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `evaluasi`
--

INSERT INTO `evaluasi` (`id_evaluasi`, `id_materi`, `soal`, `jawaban`) VALUES
(1, 1, '<p>Menurut anda apa itu komputer </p>\r\n\r\n<p>A. Jawaban A</p>\r\n\r\n<p>B. Contoh</p>\r\n\r\n<p>C. Oke</p>\r\n\r\n<p>D. Bisa</p>', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `live`
--

CREATE TABLE `live` (
  `id_live` int(100) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `id_materi` int(100) NOT NULL,
  `live_catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `live`
--

INSERT INTO `live` (`id_live`, `aksi`, `id_materi`, `live_catatan`) VALUES
(1, 'Materi', 1, '<p>Oke</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(100) NOT NULL,
  `id_media` int(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_media`, `judul`, `isi`) VALUES
(1, 1, 'Perangkat Keras', '<p>Pengertian Perangkat Keras (Hardware) – Apa itu Hardware? Pengertian hardware adalah segala piranti atau komponen dari sebuah komputer yang sifatnya bisa dilihat secara kasat mata dan bisa diraba secara langsung. Dengan kata lain hardware merupakan komponen yang memiliki bentuk nyata.</p>\r\n\r\n<p>Menurut pendapat ahli James O’Brien, pengertian hardware merupakan semua komponen/peralatan fisik yang digunakan dalam pemrosesan informasi seperti CPU, RAM, monitor, mouse, keyboard, printer, scanner, dan lain-lain.</p>\r\n\r\n<p>Biasanya, hardware terlihat sebagai bentuk output dari setiap proses sistem operasi komputer. Namun tentu saja, perangkat keras harus dibantu dengan software pendukung agar perintah yang ada dalam komputer dapat dioperasikan baik.</p>\r\n\r\n<p>Pengertian hardware atau perangkat keras komputer adalah semua jenis piranti atau komponen komputer yang bagian fisiknya dapat dilihat secara kasat mata dan dirasakan langsung.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id_media` int(100) NOT NULL,
  `nama_media` varchar(255) NOT NULL,
  `aktif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id_media`, `nama_media`, `aktif`) VALUES
(1, 'Pengenalan Komputer', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(100) NOT NULL,
  `tanggal_jam` varchar(100) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `id_evaluasi` int(100) NOT NULL,
  `benar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indeks untuk tabel `live`
--
ALTER TABLE `live`
  ADD PRIMARY KEY (`id_live`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `live`
--
ALTER TABLE `live`
  MODIFY `id_live` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
