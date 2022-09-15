-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2022 pada 15.48
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
(4, 3, '<p><sup>APa</sup></p>', 'C'),
(9, 3, '<p>Jawaban C</p>', 'C'),
(10, 3, '<p>Silahkan anda Sebutkan Macam - Macam Perangkat Komputer ?</p>', 'Essai'),
(11, 3, '<p>Komputer berasal dari bahasa</p>\r\n\r\n<p>A. Komputer</p>\r\n\r\n<p>B. Jawaban Benar</p>', 'A'),
(12, 3, '<p><img src=\"http://192.168.1.20/mediabelajar/app/api/file/gambar/sA2EIU26I5lHVpYQFTBaAJ6dG67805UMhyUCLlrPUs4yfeTN9p3t6AjoXIydiQMaDR9AVw..?session=bqQJ-7NzstoL9mmD7r3l8s99YkHQW8Yffjdk8c70ZYk.&amp;csrf_name=csrf632140e3a8f32&amp;csrf_value=c33cda7c5e756e7d4fe263c27c07fb96\" alt=\"sA2EIU26I5lHVpYQFTBaAJ6dG67805UMhyUCLlrPUs4yfeTN9p3t6AjoXIydiQMaDR9AVw..?session=bqQJ-7NzstoL9mmD7r3l8s99YkHQW8Yffjdk8c70ZYk.&amp;csrf_name=csrf632140e3a8f32&amp;csrf_value=c33cda7c5e756e7d4fe263c27c07fb96\" /></p>', 'Essai'),
(13, 3, '<p>Gambar Apa ?</p>\r\n\r\n<p><img alt=\"\" src=\"http://192.168.1.20/mediabelajar/app/files/g1.PNG\" style=\"height:390px;width:413px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://192.168.1.20/mediabelajar/app/files/Capture.PNG\" style=\"height:452px;width:376px;\" /></p>', 'Essai'),
(14, 3, '<p>Silahkan Anda Jelaskan , Gambar apa ini ?</p>\r\n\r\n<p><img alt=\"\" src=\"http://192.168.1.20/mediabelajar/app/files/es.PNG\" style=\"height:498px;width:943px;\" /></p>', 'Essai'),
(15, 5, '<p>Menurut Anda Apa itu Website ?</p>', 'Essai'),
(16, 5, '<ol>\r\n	<li style=\"list-style-type:decimal;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Sebuah website yang memungkinkan penggunanya untuk berinteraksi secara langsung, dalam artian pengguna dapat menambah, memodifikasi, ataupun menghapus konten di dalam sebuah web tanpa harus membuka struktur kode dari web tersebut disebut ?</span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"list-style-type:decimal;\"> </p>\r\n\r\n<ol>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Web Dinamis</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Web Static</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Web Loading</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Google Chrome</span></span></span></li>\r\n</ol>', 'A'),
(17, 5, '<ol start=\"2\">\r\n	<li style=\"list-style-type:decimal;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Pada berikut yang bukan bahasa pemrograman adalah ?</span></span></span></li>\r\n</ol>\r\n\r\n<ol>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">PHP</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Streaming</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">HTML</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Javascript</span></span></span></li>\r\n</ol>', 'B'),
(18, 5, '<ol start=\"3\">\r\n	<li style=\"list-style-type:decimal;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Penemu World Wide Web adalah ?</span></span></span></li>\r\n</ol>\r\n\r\n<ol>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Thomas Alfa Edison</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Muhammad Ullil Fahri</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Sir Timothy John</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Albert Einsten</span></span></span></li>\r\n</ol>\r\n\r\n<p> </p>', 'C'),
(19, 5, '<ol start=\"4\">\r\n	<li style=\"list-style-type:decimal;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Berikut TLD ( Top Level Domain ), Kecuali ?</span></span></span></li>\r\n</ol>\r\n\r\n<ol>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">.com</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">.id</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">.us</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">.web.id</span></span></span></li>\r\n</ol>', 'D'),
(20, 5, '<ol start=\"5\">\r\n	<li style=\"list-style-type:decimal;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Perangkat lunak yang memungkinkan kamu untuk mencari, mengakses, dan menampilkan halaman website di internet ?</span></span></span></li>\r\n</ol>\r\n\r\n<ol>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Google Chrome</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Local Area Network</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Internet</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Intanet</span></span></span></li>\r\n</ol>\r\n\r\n<p> </p>', 'A'),
(21, 5, '<ol start=\"6\">\r\n	<li style=\"list-style-type:decimal;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Fasilitas untuk mencatat dan menyimpan data sejarah penelusuran dan penggunaan internet, history ini bisa sangat bermanfaat jika ingin melihat situs mana saja yang pernah dikunjungi adalah ?</span></span></span></li>\r\n</ol>\r\n\r\n<ol>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Google Chrome</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">History Browser</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Searching </span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Browsing</span></span></span></li>\r\n</ol>', 'B'),
(22, 5, '<p>Apa Fungsi Email ?</p>', 'Essai'),
(23, 5, '<ol start=\"8\">\r\n	<li style=\"list-style-type:decimal;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Menjelajah dunia maya atau internet untuk mencari sesuatu yg bermanfaat disebut dengan ?</span></span></span></li>\r\n</ol>\r\n\r\n<ol>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Browsing</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Slicing</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Charging</span></span></span></li>\r\n	<li style=\"list-style-type:lower-alpha;\"><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\';\"><span style=\"color:#000000;\">Download </span></span></span></li>\r\n</ol>', 'A'),
(24, 5, '<p>Apa yang anda tau tentang Gambar berikut ?</p>\r\n\r\n<p><img alt=\"\" src=\"http://192.168.0.36/mediabelajar/app/files/gambar.PNG\" style=\"height:509px;width:689px;\" /></p>', 'Essai'),
(25, 6, '<div class=\"WordSection1\">\r\n<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Sebuah website yang memungkinkan penggunanya untuk berinteraksi secara langsung, dalam artian pengguna dapat menambah, memodifikasi, ataupun menghapus konten di dalam sebuah web tanpa harus membuka struktur kode dari web tersebut disebut ?</span></span></p>\r\n</div>\r\n\r\n<div> </div>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Web Dinamis</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Web Static</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Web Loading</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Google Chrome</span></span></li>\r\n</ol>', 'A'),
(26, 6, '<div class=\"WordSection1\">\r\n<div class=\"WordSection1\">\r\n<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Fasilitas untuk mencatat dan menyimpan data sejarah penelusuran dan penggunaan internet, history ini bisa sangat bermanfaat jika ingin melihat situs mana saja yang pernah dikunjungi adalah ?</span></span></p>\r\n</div>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Google Chrome</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">History Browser</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Searching </span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Browsing</span></span></li>\r\n</ol>\r\n</div>', 'B'),
(27, 6, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Sebutkan Search Engine apa saja yang diketahui selain google ?</span></span></p>', 'Essai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(100) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `nama_gambar`) VALUES
(1, 'Capture.PNG'),
(2, 'g1.PNG'),
(3, 'es.PNG'),
(4, 'gambar.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `live`
--

CREATE TABLE `live` (
  `id_live` int(100) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `id_materi` int(100) NOT NULL,
  `live_catatan` text NOT NULL,
  `nomor_soal` int(100) NOT NULL,
  `waktu_soal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `live`
--

INSERT INTO `live` (`id_live`, `aksi`, `id_materi`, `live_catatan`, `nomor_soal`, `waktu_soal`) VALUES
(1, 'Materi', 6, '<p>Pembahasan Materi Tentang Website</p>', 3, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(100) NOT NULL,
  `id_media` int(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_media`, `judul`, `isi`, `pdf`) VALUES
(3, 2, 'MACAM MACAM PERANGKAT TEKNOLOGI INFORMASI', '<p>MACAM MACAM PERANGKAT TEKNOLOGI INFORMASI</p>', '1 Materi SMP Kelas 7.pdf'),
(4, 2, 'part 2', '<p>Tes Part 2</p>', '090922024924-3-DRUSILABENU.pdf'),
(5, 4, 'Bahan Materi MID Semester', '<p>MID Semester</p>', 'TIK KELAS 9.pdf'),
(6, 4, 'Tentang Website', '<p>Tentang Website</p>', 'TIK KELAS 9(1).pdf');

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
(2, 'Mengidentifikasi peralatan teknologi informasi dan komunikasi di berbagai bidang', 'Ya'),
(3, 'TIK Kelas 8', 'Ya'),
(4, 'TIK Kelas 9', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(100) NOT NULL,
  `tanggal_jam` varchar(100) NOT NULL,
  `nama_peserta` varchar(100) NOT NULL,
  `id_evaluasi` int(100) NOT NULL,
  `benar` varchar(100) NOT NULL,
  `jawaban_essai` text NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `tanggal_jam`, `nama_peserta`, `id_evaluasi`, `benar`, `jawaban_essai`, `ip`) VALUES
(1, '15-09-2022 13:30:27', 'Fahri', 25, 'salah', 'C', '::1'),
(2, '15-09-2022 13:31:54', 'aa', 25, 'benar', 'A', '127.0.0.1'),
(3, '15-09-2022 13:32:11', 'Usr 3', 25, 'benar', 'A', '127.0.0.1'),
(6, '15-09-2022 13:41:03', 'Fahri', 27, '-', 'Yahoo dan Bing', '::1'),
(7, '15-09-2022 13:41:40', 'Usr 3', 27, '-', 'Gak tau saya Pak', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(100) NOT NULL,
  `slide` int(100) NOT NULL,
  `refresh` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id_slide`, `slide`, `refresh`) VALUES
(1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

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
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `live`
--
ALTER TABLE `live`
  MODIFY `id_live` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
