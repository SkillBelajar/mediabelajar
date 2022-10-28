-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2022 pada 03.17
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
-- Struktur dari tabel `data_peserta`
--

CREATE TABLE `data_peserta` (
  `id_data_peserta` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `emosi` varchar(255) NOT NULL,
  `harapan` text NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_peserta`
--

INSERT INTO `data_peserta` (`id_data_peserta`, `nama`, `emosi`, `harapan`, `level`) VALUES
(2, 'Eki &  Kalvin', 'senyum', '-', 1),
(3, 'Fatra & Arya', 'senyum', 'Konten pelajaran adalah konten tentang pelajaran', 1),
(4, 'Dimas dan Dika', 'sedih', 'p', 1),
(5, 'Helen', 'senyum', 'konten belajaran adalah vidio yang  berisi seseorang memberikan ilmu melalui vidio', 2),
(6, 'Putri', 'senyum', 'Konten belajar adalah vidio yang berisi memberikan ilmu suatu pelajaran yang di tampilkan', 2),
(7, 'alyott', 'senyum', 'konten yang berisi pembelajaran', 2),
(8, 'siska-zahra', 'senyum', 'konten yang berisi tentang pembelajaran yang ingin dipelajari', 2),
(9, 'encekk_ika_yk', 'sedih', 'Konten pembelajaran adalah sebuah konten yang berkaitan dengan pelajaran agar yang melihat konten tersebut mendapat manfaat', 2),
(10, 'Cristia ketceh', 'senyum', 'konten pembelajaran adalah konten yang berisi tentang pembelajaran misalnya materi pembelajaran', 2),
(11, 'novi', 'senyum', 'konten yang berisi tentang pelajaran', 1),
(12, 'ari wahyudi', 'senyum', 'konten pelajaran adalah konten tentang pelajaran web', 1),
(13, 'Satrio Dan Dwi', 'ketawa', 'Konten yang berisi muatan pembelajaran', 2),
(14, 'Amanda uyy', 'marah', 'konten pembelajaran adalah membuat kita memahami semua pembelajaran', 2),
(15, 'giant abdul hanif', 'senyum', 'konten pelajaran adalah konten tentang pelajaran yang di pelajari sebuah web', 1),
(16, 'Deria yudit', 'senyum', 'yang berisi pelajaran', 1),
(17, 'chritoforus rehan', 'senyum', 'konten pelajaran adalah berisi sebuah pelajaran', 1),
(18, 'eki gntg & Kalvin Lee', 'ketawa', 'Konten pembelajaran adalah suatu konten yang berisi tentang pelajaran dari suatu web', 2),
(19, 'shinta dewi', 'senyum', 'konten pembelajaran adalah konten yamg berisikan informasi tentang pelajaran', 2),
(20, 'MR andra', 'marah', 'konten merupakan konten tentang peelajaran dan', 1),
(21, 'Daviq sioso', 'malu', 'suatu konten yang menuju pembelajaran yang sedang dikerjakan', 2),
(22, 'wakman', 'senyum', 'konten pembelajaran adalah suatu gagasan pokok', 1),
(23, 'ari wahyudi', 'senyum', 'konten pelajaran adalah konten tentang pelajaran web', 1),
(24, 'Test', 'senyum', '-', 1),
(25, '@linda', 'senyum', 'konten pembelajaran adalah suatu gagasan pokok', 1),
(26, 'Deria yudit', 'senyum', 'yang berisi pelajaran', 1),
(27, 'alyott', 'senyum', 'konten yang berisi pembelajaran', 2),
(28, 'Fatra & Arya', 'senyum', 'Konten pelajaran adalah konten tentang pelajaran', 1),
(29, 'Deria yudit dan rehan', 'senyum', 'yang berisi pelajaran', 1),
(30, 'Dimas dan Dika', 'sedih', 'p', 1),
(31, 'buayak terbang', 'sedih', 'p', 1),
(32, 'Fatra & Arya', 'senyum', '-', 1),
(33, 'RRQ andra', 'nangis', 'p', 1);

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
(27, 6, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Sebutkan Search Engine apa saja yang diketahui selain google ?</span></span></p>', 'Essai'),
(28, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Komputer merupakan alat berupa ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Hardware dan Software                      c. Alat Rumah Tangga</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Mesin Cuci                                          d. Alat Pertukangan</span></span></li>\r\n</ol>\r\n\r\n<p> </p>', 'A'),
(29, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Peralatan yang fungsinya sama dengan komputer tetapi bentuknya praktis dapat dilipat dan dibawa-bawa karena menggunakan bantuan baterai charger sehingga bisa digunakan tanpa menggunakan listrik disebut ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Mouse                                                 c. Keyboard</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Notebook                                            d. Printer</span></span></li>\r\n</ol>', 'B'),
(30, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Komputer sejenis Notebook namun ukurannya lebih diperkecil dan spesifikasi hardwarenya lebih rendah disebut ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Mouse                                                 c. Netbook</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Keyboard                                            d. Printer</span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:96px;\"> </p>', 'C'),
(31, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Laptop atau komputer portable berbentuk buku disebut ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Notebook Mini                                    c. Printer</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Keyboard                                            d. Tablet PC</span></span></li>\r\n</ol>', 'D'),
(32, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Televisi merupakan perangkat teknologi informasi yang berupa sistem penyiaran yang disertai dengan ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Gambar (visual) dan suara (audio)     c. Audio</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Visual                                                  d. Gambar Saja</span></span></li>\r\n</ol>', 'A'),
(33, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Perangkat elektronik ini memiliki fungsi untuk menyampaikan Informasi berupa suara saja dari station pemancar melalui frekuensi disebut ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Televisi                                                c. Whatsapp</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Radio                                                  d. SMS</span></span></li>\r\n</ol>', 'B'),
(34, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Koran yaitu  ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Media Televisi                                    c. Media Cetak</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Media Elektronik                                d. Email</span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:144px;\"> </p>', 'C'),
(35, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Peralatan yang dapat menyimpan data sekaligus dapat digunakan untuk memutar music ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Whatsapp                                            c. Radio</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Mesin Cuci                                          d. MP3 Player</span></span></li>\r\n</ol>', 'D'),
(36, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Istilah yang biasa digunakan untuk mendeskripsikan software komputer untuk memainkan file video ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Video Player                                       c. MP3 Player</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Ms. Word                                            d. Ms. Excel</span></span></li>\r\n</ol>', 'A'),
(37, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Perangkat teknologi yang biasa digunakan untuk mengabadikan gambar atau video dengan menggunakan metode penyimpanan secara digital atau disk ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Hardisk                                               c. Kaca Mata</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Kamera Digital                                   d. Radio</span></span></li>\r\n</ol>', 'B'),
(38, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Alat yang digunakan untuk menjumlahkan atau menghitung berbagai satuan ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Kamera Digital                                   c. Kalkulator</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">CPU                                                    d. Radio</span></span></li>\r\n</ol>', 'C'),
(39, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Berikut yang merupakan alat mencetak adalah ?</span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha;\">\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Kamera Digital                                   c. Kalkulator</span></span></li>\r\n	<li><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Radio                                                  d. Printer</span></span></li>\r\n</ol>\r\n\r\n<p> </p>', 'D'),
(40, 8, '<p>Apa itu Komputer Menurut Anda ? </p>', 'Essai'),
(41, 8, '<p>Silahkan Anda Sebutkan Fungsi - Fungsi Pada gambar berikut :</p>\r\n\r\n<p><img alt=\"\" src=\"http://192.168.0.36/mediabelajar/app/files/komputer.PNG\" style=\"height:397px;width:532px;\" /></p>', 'Essai'),
(42, 8, '<p>Siapa nama guru TIK Anda ?</p>', 'Essai'),
(43, 8, '<p>Silahkan Anda Sebutkan perangkat lunak dan perangkat keras yang anda ketahui ?</p>', 'Essai'),
(44, 8, '<p>Apa Fungsi Dari Gambar Berikut ?</p>\r\n\r\n<p><img alt=\"\" src=\"http://192.168.0.36/mediabelajar/app/files/fl.PNG\" style=\"height:313px;width:525px;\" /></p>', 'Essai'),
(45, 8, '<p>Apa yang anda ketahui tentang AntiVirus ?</p>', 'Essai'),
(46, 8, '<p>Buat Cerita tentang komputer ? apa saja yang anda ketahui .</p>\r\n\r\n<p>*Jawab dengan minimal 2 baris</p>', 'Essai'),
(47, 8, '<p><span style=\"font-size:12pt;\"><span style=\"font-family:\'Times New Roman\', serif;\">Sistem utiliti yang berfungsi untuk manajemen file adalah ?</span></span></p>', 'Essai'),
(58, 9, '<p>Router digunakan dalam protokol jaringan router :</p>\r\n\r\n<p>A. IP</p>\r\n\r\n<p>B. TCP</p>\r\n\r\n<p>C. TCP/IP</p>\r\n\r\n<p>D. Internet</p>\r\n\r\n<p> </p>', 'C'),
(59, 9, '<p>menggunakan Wi-Fi tanpa menggunakan kabel merupakan alat dari ?</p>\r\n\r\n<p>A. LAN Card</p>\r\n\r\n<p>B. Wireless Card</p>\r\n\r\n<p>C. Router</p>\r\n\r\n<p>D. NIC Card</p>', 'B'),
(64, 10, '<p>Pada desktop terdapat , Kucuali ?</p>\r\n\r\n<p>A. Walpaper</p>\r\n\r\n<p>B. Akses Menu</p>\r\n\r\n<p>C. Pengaturan Sistem</p>\r\n\r\n<p>D. Projector</p>', 'D'),
(65, 10, '<p>Desktop Windows memiliki recycle bin, Berfungsi ?</p>\r\n\r\n<p>A. Melihat Folder</p>\r\n\r\n<p>B. Koneksi Monitor</p>\r\n\r\n<p>C. Melihat data Terhapus</p>\r\n\r\n<p>D. Pencarian</p>', 'C'),
(66, 10, '<p>Semua Sistem Operasi  ada tampilan dekstop, Kecuali ?</p>\r\n\r\n<p>A. Google Docs</p>\r\n\r\n<p>B. WIndows</p>\r\n\r\n<p>C. Linux</p>\r\n\r\n<p>D. Chrome Os</p>', 'A'),
(67, 11, '<p>1</p>', 'Essai'),
(68, 10, '<p>Apa itu Navigasi Komputer Menurut Anda ?</p>', 'Essai'),
(69, 12, '<p>website adalah, Kecuali ?</p>\r\n\r\n<p>A. Halaman yang ada di internet</p>\r\n\r\n<p>B. Sekumpulan Halaman</p>\r\n\r\n<p>C. Jaringan LAN</p>\r\n\r\n<p>D. Ada Tampilan Visual</p>', 'C'),
(70, 12, '<p>Konten tertulis terbaik adalah ?</p>\r\n\r\n<p>A. konten web copy paste</p>\r\n\r\n<p>B. konten web tekstual unik yang bebas dari plagiarisme</p>\r\n\r\n<p>C. konten web Ilegal</p>\r\n\r\n<p>D. konten bukan Originalitas </p>', 'B'),
(71, 12, '<p>Silahkan Anda Sebutkan , Unsur Multimedia apa saja yang ada di dalam website ?</p>', 'Essai'),
(72, 12, '<p>WCM adalah ?</p>\r\n\r\n<p>A. Manajemen  web</p>\r\n\r\n<p>B. Manajemen konten web</p>\r\n\r\n<p>C. Manajemen  web</p>\r\n\r\n<p>D. Manajemen Internet</p>', 'B'),
(73, 12, '<p>Apa itu Konten Website ? dan Silahkan Pilih mata pelajaran apa yang akan anda masukan di ke dalam Konten Website anda ?</p>', 'Essai'),
(74, 12, '<p>Konten web didominasi oleh konsep \"halaman\", dimulai dalam lingkungan akademis, dan dalam pengaturan yang didominasi oleh halaman yang ditulis dengan ketik, gagasan web adalah untuk menghubungkan ?</p>', 'Essai'),
(75, 12, '<p>Silahkan anda ( Seingat anda saja ) sebutkan langkah - langkah dalam membuat website dengan wordpress ?</p>', 'Essai'),
(77, 15, '<p>Di dalam menyimpan file,  Salah satu yang mungkin masih membuat sebagian orang bingung adalah ?</p>\r\n\r\n<p> </p>', 'Essai'),
(78, 15, '<p>membantu menyimpan file baru atau menyimpan file yang sudah ada ke lokasi baru dengan nama yang sama atau nama yang berbeda disebut dengan ?</p>\r\n\r\n<p>A. Save</p>\r\n\r\n<p>B. As Save</p>\r\n\r\n<p>C. Save As</p>\r\n\r\n<p>D. Save File</p>', 'C'),
(79, 15, '<p>Manajemen file saat bekerja dengan komputer dan menggunakan aplikasi seperti Microsoft Word, diperlukan berbagai aktivitas seperti, Kecuali ?</p>\r\n\r\n<p>A. Membuka File</p>\r\n\r\n<p>B. Mengedit</p>\r\n\r\n<p>C. Internet Browsing</p>\r\n\r\n<p>D. Menyimpan</p>', 'C'),
(80, 15, '<p>Menurut anda , Apa Perbedaan Save dan Save As ?</p>', 'Essai'),
(81, 15, '<p>Coba Anda Jelaskan, Mengapa Save File itu sangat penting ?.</p>\r\n\r\n<p>*Buat Jawaban Yang Panjang*</p>', 'Essai'),
(83, 9, '<p>Apa Perbedaan LAN Card dan Wifi Card ?</p>', 'Essai'),
(84, 9, '<p>Anda Sebagai Teman , Bisa jelaskan mengapa Excel tidak bisa menjawab perbedaan LAN dan Wifi Card ?</p>', 'Essai'),
(85, 9, '<p>jika HUB mengalami gangguan transmisi ke jaringan lain, itu akan ?<br />\r\n </p>\r\n\r\n<p>A. Mencepat</p>\r\n\r\n<p>B. Mendownload</p>\r\n\r\n<p>C. Terhambat</p>\r\n\r\n<p>D. Internet</p>', 'C'),
(86, 9, '<p>Pada Jaringan Komputer, HUB Hampir Sama Dengan ?</p>', 'Essai'),
(87, 9, '<p>Menurut anda , Apa Itu Acces Point ?</p>', 'Essai'),
(88, 9, '<p>perangkat jaringan yang dapat memperkuat sinyal dan memperluas jangkauan sinyal wifi ?</p>\r\n\r\n<p>A. Router</p>\r\n\r\n<p>B. Speater</p>\r\n\r\n<p>C. Repeater</p>\r\n\r\n<p>D. Kalbulator</p>', 'C'),
(89, 9, '<p>Berikut adalah Gambar Dari :</p>\r\n\r\n<p> <img alt=\"\" src=\"http://192.168.0.37/mediabelajar/app/files/1.PNG\" style=\"height:471px;width:458px;\" /></p>', 'Essai'),
(90, 9, '<p>Konektor berfungsi untuk ?</p>\r\n\r\n<p> </p>', 'Essai'),
(91, 9, '<p>Soal Bonus, Dengan Nilai X 2.</p>\r\n\r\n<p>Silahkan anda buat kesimpulan, Apa saja yang sudah anda dapat hari ini tentang Materi Perangkat Jaringan Komputer ?</p>\r\n\r\n<p>*Buat Jawaban Lebih Panjang*</p>', 'Essai'),
(92, 9, '<p>Silahkan anda Tuliskan nama satu teman kalian , untuk maju ke depan menjelaskan kesimpulan ?</p>', 'Essai'),
(93, 16, '<p>Kemdikbud memiliki portal media pembelajaran online bernama ?</p>\r\n\r\n<p>A. Belajar Rumah</p>\r\n\r\n<p>B. Rumah Belajar</p>\r\n\r\n<p>C. Belajar Sahabat</p>\r\n\r\n<p>D. Sekolah Belajar</p>', 'B'),
(94, 16, '<p>Suara Edukasi Kemdikbud adalah ?</p>', 'Essai'),
(95, 16, '<p>TV Edukasi Kemdikbud adalah ?</p>\r\n\r\n<p>A. Media Belajar Online  Visual</p>\r\n\r\n<p>B. Media Belajar  Audio Visual</p>\r\n\r\n<p>C. Media Belajar Online Audio Visual</p>\r\n\r\n<p>D. Media Belajar  Audio Visual</p>', 'C'),
(96, 16, '<p>Silahkan anda isikan apa alamat domain website wikipedia ?</p>', 'Essai');

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
(4, 'gambar.PNG'),
(5, 'komputer.PNG'),
(6, 'fl.PNG'),
(7, '1.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_ulangan`
--

CREATE TABLE `history_ulangan` (
  `id_history_ulangan` int(100) NOT NULL,
  `media` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_ulangan`
--

INSERT INTO `history_ulangan` (`id_history_ulangan`, `media`, `nama`, `nilai`, `tanggal`) VALUES
(9, '6', 'Fahri', '35.29', '23-10-2022'),
(10, '6', 'a', '29.41', '23-10-2022'),
(11, '6', 'Fshrixzz', '0.00', '23-10-2022'),
(650, '6', 'Fahri', '0.00', '24-10-2022'),
(671, '6', 'x', '0.00', '24-10-2022'),
(975, '6', 'Resti 7d', '100.00', '24-10-2022'),
(976, '6', 'Meylannie VII D', '94.12', '24-10-2022'),
(977, '6', 'MAWAN', '88.24', '24-10-2022'),
(978, '6', 'Selvi 7D', '82.35', '24-10-2022'),
(979, '6', 'Rico dan Ajeng', '82.35', '24-10-2022'),
(980, '6', 'Fadhil', '76.47', '24-10-2022'),
(981, '6', 'THERESIA OLIVE PEBRIANTI MAGDELENA', '70.59', '24-10-2022'),
(982, '6', 'RANDIKA', '70.59', '24-10-2022'),
(983, '6', 'Tedi Mulyadi', '70.59', '24-10-2022'),
(984, '6', 'SILPA', '70.59', '24-10-2022'),
(985, '6', 'aziiiii', '70.59', '24-10-2022'),
(986, '6', 'Fazia', '70.59', '24-10-2022'),
(987, '6', 'Firza', '70.59', '24-10-2022'),
(988, '6', 'Febbi indriani', '64.71', '24-10-2022'),
(989, '6', 'gracella', '64.71', '24-10-2022'),
(990, '6', 'radit', '64.71', '24-10-2022'),
(991, '6', 'ulfianti dwi sandika', '64.71', '24-10-2022'),
(992, '6', 'nayya', '52.94', '24-10-2022'),
(993, '6', 'Astajib lakum', '35.29', '24-10-2022'),
(994, '6', 'Damianus', '17.65', '24-10-2022'),
(995, '6', 'Av', '0.00', '24-10-2022'),
(4793, '4', 'Fadhil dan ambar', '100.00', '24-10-2022'),
(4794, '4', 'THOMAS DERLY & ALIUNG', '100.00', '24-10-2022'),
(4795, '4', 'Darling zhehan zalindra', '100.00', '24-10-2022'),
(4796, '4', 'UrayRasya', '100.00', '24-10-2022'),
(4797, '4', 'M Sandy P', '92.86', '24-10-2022'),
(4798, '4', 'Desi - Yusrina', '92.86', '24-10-2022'),
(4799, '4', 'Angelita Galho', '92.86', '24-10-2022'),
(4800, '4', 'Reval dan Lutfi', '92.86', '24-10-2022'),
(4801, '4', 'Rifki Attamimi', '85.71', '24-10-2022'),
(4802, '4', 'Mislia Cahyuni', '85.71', '24-10-2022'),
(4803, '4', 'Hendri Apriandi', '85.71', '24-10-2022'),
(4804, '4', 'Paril', '85.71', '24-10-2022'),
(4805, '4', 'Yunika Nurfadhilah Haryanto', '85.71', '24-10-2022'),
(4806, '4', 'Alif Nurwahid Ramadhani', '78.57', '24-10-2022'),
(4807, '4', 'afrilliyaandini', '78.57', '24-10-2022'),
(4808, '4', 'Nur Halimah', '78.57', '24-10-2022'),
(4809, '4', 'Nazra Tusyita Rosa', '78.57', '24-10-2022'),
(4810, '4', 'Chelsea Agustin', '71.43', '24-10-2022'),
(4811, '4', 'Ananda Fadhillah Sadewa', '71.43', '24-10-2022'),
(4812, '4', 'Melisa', '64.29', '24-10-2022'),
(4832, '4', 'Av', '0.00', '24-10-2022'),
(8603, '4', 'akbar', '100.00', '24-10-2022'),
(8604, '4', 'ciaa slebeww', '100.00', '24-10-2022'),
(8605, '4', 'Amadkopling', '100.00', '24-10-2022'),
(8606, '4', 'Ninaaaaaaaaaaa', '100.00', '24-10-2022'),
(8607, '4', 'Nova Angraini', '100.00', '24-10-2022'),
(8608, '4', 'Fadhilllnzrl_', '92.86', '24-10-2022'),
(8609, '4', 'Mr.ibnu', '92.86', '24-10-2022'),
(8610, '4', 'Runnica ebewww', '85.71', '24-10-2022'),
(8611, '4', 'aijun', '85.71', '24-10-2022'),
(8612, '4', 'Dias', '78.57', '24-10-2022'),
(8613, '4', 'kessya amelya', '78.57', '24-10-2022'),
(8614, '4', 'DIva ilmiyani', '71.43', '24-10-2022'),
(8615, '4', 'Andika', '71.43', '24-10-2022'),
(8616, '4', 'Azzuraa', '71.43', '24-10-2022'),
(8617, '4', 'TIKA  DAN NAYLA', '71.43', '24-10-2022'),
(8618, '4', 'Raisya Hikmalia', '64.29', '24-10-2022'),
(8619, '4', 'Heryansyah', '64.29', '24-10-2022'),
(8620, '4', 'audia', '64.29', '24-10-2022'),
(8621, '4', 'akbar200cc', '64.29', '24-10-2022'),
(8622, '4', 'M.Ferdi Sambo dan Rizky Pelu sambo geng sambo', '57.14', '24-10-2022'),
(8623, '4', 'Devon Satrio Putra', '42.86', '24-10-2022'),
(8852, '4', 'Test', '0.00', '25-10-2022'),
(11153, '4', 'Deria yudit dan rehan', '100.00', '25-10-2022'),
(11154, '4', 'alyott', '100.00', '25-10-2022'),
(11155, '4', 'siska-zahra', '100.00', '25-10-2022'),
(11156, '4', 'novi', '100.00', '25-10-2022'),
(11157, '4', 'Dimas dan Dika', '100.00', '25-10-2022'),
(11158, '4', 'eki gntg & Kalvin Lee', '100.00', '25-10-2022'),
(11159, '4', 'Cristia ketceh', '100.00', '25-10-2022'),
(11160, '4', 'Putri', '100.00', '25-10-2022'),
(11161, '4', 'Fatra & Arya', '100.00', '25-10-2022'),
(11162, '4', '@linda', '92.86', '25-10-2022'),
(11163, '4', 'encekk_ika_yk', '92.86', '25-10-2022'),
(11164, '4', 'Satrio Dan Dwi', '92.86', '25-10-2022'),
(11165, '4', 'shinta dewi', '92.86', '25-10-2022'),
(11166, '4', 'Helen', '92.86', '25-10-2022'),
(11167, '4', 'Amanda uyy', '85.71', '25-10-2022'),
(11168, '4', 'wakman', '78.57', '25-10-2022'),
(11169, '4', 'ari wahyudi', '78.57', '25-10-2022'),
(11170, '4', 'RRQ andra', '78.57', '25-10-2022'),
(11171, '4', 'giant abdul hanif', '71.43', '25-10-2022'),
(11172, '4', 'Daviq sioso', '64.29', '25-10-2022');

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
(1, 'Materi', 16, '<p>-</p>', 1, 999999999);

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
(5, 4, 'Bahan Materi MID Semester', '<p>MID Semester</p>', 'TIK KELAS 9.pdf'),
(6, 4, 'Tentang Website', '<p>Tentang Website</p>', 'TIK KELAS 9(1).pdf'),
(8, 6, 'Kelas 7 : Mengenal Sistem Komputer', '<p>-</p>', 'Materi TIK MID Semester final.pdf'),
(9, 3, 'Pertemuan 12 Perangkat Jaringan', '<p>-</p>', '12 Perangakat Jaringan.pdf'),
(10, 6, 'Mengenal Dekstop Windows', '<p>-</p>', '12 Mengenal Dekstop Windows dan Chrome OS.pdf'),
(12, 4, 'Konten Website', '<p>isi dari konten Website</p>', '13 Content Website.pdf'),
(13, 6, 'Contoh Mengenal Dekstop Windows', '<p>isnya </p>', '13 Content Website(1).pdf'),
(14, 6, 'Link Video Kelas 7', '<p>---</p>', 'link 2.pdf'),
(15, 6, 'Pertemuan 14 : Save File', '<p>----</p>', '14 Save File.pdf'),
(16, 4, 'Konten Pembelajaran', '<p>-</p>', '14 Content Pembelajaran.pdf');

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
(4, 'TIK Kelas 9', 'Ya'),
(5, 'Latihan', 'Ya'),
(6, 'TIK Kelas 7', 'Ya'),
(7, 'Contoh Materi', 'Ya');

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
(3, '25-10-2022 00:26:58', 'encekk_ika_yk', 93, 'benar', 'B', '192.168.0.47'),
(4, '25-10-2022 00:26:59', 'Cristia ketceh', 93, 'benar', 'B', '192.168.0.24'),
(5, '25-10-2022 00:27:04', 'siska-zahra', 93, 'benar', 'B', '192.168.0.43'),
(7, '25-10-2022 00:27:07', 'Fatra & Arya', 93, 'benar', 'B', '192.168.0.50'),
(8, '25-10-2022 00:27:08', 'novi', 93, 'benar', 'B', '192.168.0.20'),
(9, '25-10-2022 00:27:11', 'Amanda uyy', 93, 'benar', 'B', '192.168.0.37'),
(10, '25-10-2022 00:27:13', 'alyott', 93, 'benar', 'B', '192.168.0.40'),
(11, '25-10-2022 00:27:13', 'Helen', 93, 'benar', 'B', '192.168.0.26'),
(12, '25-10-2022 00:27:13', 'MR andra', 93, 'benar', 'B', '192.168.0.28'),
(13, '25-10-2022 00:27:14', 'eki gntg & Kalvin Lee', 93, 'benar', 'B', '192.168.0.38'),
(14, '25-10-2022 00:27:14', 'Putri', 93, 'benar', 'B', '192.168.0.22'),
(15, '25-10-2022 00:27:16', 'Satrio Dan Dwi', 93, 'benar', 'B', '192.168.0.39'),
(16, '25-10-2022 00:27:19', 'Dimas dan Dika', 93, 'benar', 'B', '192.168.0.25'),
(17, '25-10-2022 00:27:21', '@linda', 93, 'benar', 'B', '192.168.0.23'),
(18, '25-10-2022 00:27:22', 'Daviq sioso', 93, 'benar', 'B', '192.168.0.46'),
(19, '25-10-2022 00:27:24', 'shinta dewi', 93, 'benar', 'B', '192.168.0.27'),
(21, '25-10-2022 00:27:44', 'wakman', 93, 'benar', 'B', '192.168.0.29'),
(22, '25-10-2022 00:27:48', 'ari wahyudi', 93, 'benar', 'B', '192.168.0.34'),
(23, '25-10-2022 00:27:56', 'giant abdul hanif', 93, 'benar', 'B', '192.168.0.49'),
(24, '25-10-2022 00:28:05', 'chritoforus rehan', 93, 'benar', 'B', '192.168.0.41'),
(25, '25-10-2022 00:35:16', 'Fatra & Arya', 94, '-', 'Radio Suara edukasi merupakan radio untuk pendidikan\r\nyang dikembangkan oleh Kemdikbud.', '192.168.0.50'),
(26, '25-10-2022 00:35:37', 'eki gntg & Kalvin Lee', 94, '-', 'radio untuk pendidikan  yang dikembangkan oleh kemdikbud', '192.168.0.38'),
(27, '25-10-2022 00:35:42', 'Dimas dan Dika', 94, '-', 'Radio Suara edukasi merupakan radio untuk pendidikan\r\nyang dikembangkan oleh Kemdikbud. Memiliki begitu\r\nbanyak konten audio tentang berbagai materi pendidikan\r\nuntuk PAUD hingga SMA hingga siaran tentang info-info\r\npendidikan di Indonesia.', '192.168.0.25'),
(28, '25-10-2022 00:35:46', 'encekk_ika_yk', 94, '-', 'Radio suara edukasi merupakan radio untuk pendidikan', '192.168.0.47'),
(29, '25-10-2022 00:35:52', 'Cristia ketceh', 94, '-', 'radio suara edukasi merupakan radio untuk pendidikan yang dikembangkan oleh kemdikbud', '192.168.0.24'),
(30, '25-10-2022 00:36:04', 'Deria yudit dan rehan', 94, '-', 'radio untuk pendidikkan', '192.168.0.41'),
(31, '25-10-2022 00:36:04', 'Amanda uyy', 94, '-', 'Radio suara edukasi merupakan radio untuk pendidikan', '192.168.0.37'),
(32, '25-10-2022 00:36:19', 'Helen', 94, '-', 'radio untuk pendidikan yang bisa digunakan dari paud hingga sma yang berisi informasi informasi pendidikan', '192.168.0.26'),
(33, '25-10-2022 00:36:22', 'alyott', 94, '-', 'radio untuk pendidikan yang dikembangkan oleh kemdikbud', '192.168.0.40'),
(34, '25-10-2022 00:36:30', 'Putri', 94, '-', 'suara edukasi merupakan radio untuk pendidikan yang dikembangkan oleh Kemdikbud.', '192.168.0.22'),
(35, '25-10-2022 00:36:32', 'MR andra', 94, '-', 'suara  edukasi merupakan radio untuk pendidikan', '192.168.0.28'),
(36, '25-10-2022 00:36:34', 'siska-zahra', 94, '-', 'merupakan radio untuk pendidikan yang dikembangkan oleh kemdikbud', '192.168.0.43'),
(37, '25-10-2022 00:36:45', 'Satrio Dan Dwi', 94, '-', 'Audio suara belajar dari PAUD sampai SMA', '192.168.0.39'),
(38, '25-10-2022 00:36:57', '@linda', 94, '-', 'merupakan radio untuk pendidikan yang berkembang oleh kemdikbud', '192.168.0.23'),
(39, '25-10-2022 00:37:02', 'giant abdul hanif', 94, '-', 'radio suara edukasi merupakan radio untuk pemdidikan yang dikembangkan oleh kemdikbud', '192.168.0.49'),
(40, '25-10-2022 00:37:03', 'novi', 94, '-', 'merupakan radio untuk pendidikan yg dikembangkan oleh kemdikbud', '192.168.0.20'),
(41, '25-10-2022 00:37:05', 'ari wahyudi', 94, '-', 'radio suara edukasi merupakan radio untuk pendidikan yg dikembangkn kemdibud', '192.168.0.34'),
(42, '25-10-2022 00:37:20', 'shinta dewi', 94, '-', 'suara kemdikbud merupakan radio untuk pendidikan', '192.168.0.27'),
(43, '25-10-2022 00:37:28', 'Daviq sioso', 94, '-', 'radio suara edukasi', '192.168.0.46'),
(44, '25-10-2022 00:37:42', 'wakman', 94, '-', 'merupakan radio untuk pendidikan yang berkembang oleh kemdikbut', '192.168.0.29'),
(45, '25-10-2022 00:42:02', 'Satrio Dan Dwi', 95, 'benar', 'C', '192.168.0.39'),
(48, '25-10-2022 00:42:10', 'Amanda uyy', 95, 'benar', 'C', '192.168.0.37'),
(50, '25-10-2022 00:42:15', 'eki gntg & Kalvin Lee', 95, 'benar', 'C', '192.168.0.38'),
(51, '25-10-2022 00:42:15', 'Cristia ketceh', 95, 'benar', 'C', '192.168.0.24'),
(52, '25-10-2022 00:42:17', 'Helen', 95, 'benar', 'C', '192.168.0.26'),
(53, '25-10-2022 00:42:22', 'siska-zahra', 95, 'benar', 'C', '192.168.0.43'),
(54, '25-10-2022 00:42:29', 'Putri', 95, 'benar', 'C', '192.168.0.22'),
(55, '25-10-2022 00:42:29', 'Fatra & Arya', 95, 'benar', 'C', '192.168.0.50'),
(56, '25-10-2022 00:42:31', 'alyott', 95, 'benar', 'C', '192.168.0.40'),
(57, '25-10-2022 00:42:34', 'novi', 95, 'benar', 'C', '192.168.0.20'),
(58, '25-10-2022 00:42:35', 'encekk_ika_yk', 95, 'benar', 'C', '192.168.0.47'),
(59, '25-10-2022 00:42:41', 'MR andra', 95, 'salah', 'B', '192.168.0.28'),
(60, '25-10-2022 00:42:44', 'ari wahyudi', 95, 'salah', 'B', '192.168.0.34'),
(61, '25-10-2022 00:42:46', 'shinta dewi', 95, 'salah', 'B', '192.168.0.27'),
(62, '25-10-2022 00:42:46', 'giant abdul hanif', 95, 'salah', 'B', '192.168.0.49'),
(64, '25-10-2022 00:43:07', 'Dimas dan Dika', 95, 'salah', 'D', '192.168.0.25'),
(65, '25-10-2022 00:43:08', 'wakman', 95, 'salah', 'B', '192.168.0.29'),
(66, '25-10-2022 00:43:30', 'Daviq sioso', 95, 'benar', 'C', '192.168.0.46'),
(67, '25-10-2022 00:43:32', 'Deria yudit dan rehan', 95, 'benar', 'C', '192.168.0.41'),
(68, '25-10-2022 00:50:25', 'Cristia ketceh', 96, '-', 'https://id.wikipedia.org/', '192.168.0.24'),
(69, '25-10-2022 00:50:45', 'alyott', 96, '-', 'https://id.wikipedia.org/', '192.168.0.40'),
(70, '25-10-2022 00:50:51', 'Satrio Dan Dwi', 96, '-', 'www.wikipedia.com', '192.168.0.39'),
(71, '25-10-2022 00:50:51', 'Fatra & Arya', 96, '-', 'https;//id.wikipedia.org/', '192.168.0.50'),
(72, '25-10-2022 00:51:08', 'eki gntg & Kalvin Lee', 96, '-', 'www://wikipedia.com', '192.168.0.38'),
(73, '25-10-2022 00:51:17', 'Daviq sioso', 96, '-', 'www//wikipedia.id', '192.168.0.46'),
(74, '25-10-2022 00:51:36', 'wakman', 96, '-', 'www.wikipedia.com', '192.168.0.29'),
(75, '25-10-2022 00:51:39', 'Deria yudit dan rehan', 96, '-', 'Https://Id.wikipedia.org/', '192.168.0.41'),
(76, '25-10-2022 00:51:46', 'Dimas dan Dika', 96, '-', 'https//id.wikipedia.org/', '192.168.0.25'),
(77, '25-10-2022 00:51:54', 'Amanda uyy', 96, '-', 'https;//id.wikpedia.org/', '192.168.0.37'),
(78, '25-10-2022 00:51:54', 'Putri', 96, '-', 'https//id.wikipedia.org/', '192.168.0.22'),
(79, '25-10-2022 00:51:54', 'encekk_ika_yk', 96, '-', 'https://id.wikipedia.org/', '192.168.0.47'),
(80, '25-10-2022 00:52:09', 'Helen', 96, '-', 'https//id.wikipedia.org/', '192.168.0.26'),
(81, '25-10-2022 00:52:13', 'siska-zahra', 96, '-', 'https.//wikipedia.go.id/', '192.168.0.43'),
(82, '25-10-2022 00:52:40', '@linda', 96, '-', 'htps/id.wekipedia.org/', '192.168.0.23'),
(83, '25-10-2022 00:52:45', 'shinta dewi', 96, '-', 'https/ID.WIKIPEDIA.ORG/', '192.168.0.27'),
(84, '25-10-2022 00:52:54', 'novi', 96, '-', 'https://wikipedia.go.id/', '192.168.0.20'),
(85, '25-10-2022 00:53:30', 'ari wahyudi', 96, '-', 'htpps;id .wikipedia org', '192.168.0.34'),
(86, '25-10-2022 00:53:33', 'buayak terbang', 96, '-', 'https:// id .wekipedia.org', '192.168.0.28'),
(87, '25-10-2022 00:53:52', 'giant abdul hanif', 96, '-', 'htpps;id wikipedia .org', '192.168.0.49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor_ulangan`
--

CREATE TABLE `skor_ulangan` (
  `id_skor_ulangan` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `skor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skor_ulangan`
--

INSERT INTO `skor_ulangan` (`id_skor_ulangan`, `nama`, `skor`) VALUES
(1, 'Deria yudit dan rehan', 14),
(2, 'Putri', 14),
(3, 'Fatra & Arya', 14),
(4, 'giant abdul hanif', 10),
(5, 'Satrio Dan Dwi', 13),
(7, 'Cristia ketceh', 14),
(8, 'eki gntg & Kalvin Lee', 14),
(9, 'Dimas dan Dika', 14),
(10, 'wakman', 11),
(11, 'RRQ andra', 11),
(12, '@linda', 13),
(13, 'ari wahyudi', 11),
(14, 'Helen', 13),
(15, 'siska-zahra', 14),
(16, 'shinta dewi', 13),
(17, 'alyott', 14),
(18, 'Daviq sioso', 9),
(19, 'Amanda uyy', 12),
(20, 'encekk_ika_yk', 13),
(21, 'novi', 14);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `terpilih`
--

CREATE TABLE `terpilih` (
  `id_terpilih` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terpilih`
--

INSERT INTO `terpilih` (`id_terpilih`, `nama`) VALUES
(1, 'Dimas dan Dika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulangan`
--

CREATE TABLE `ulangan` (
  `id_ulangan` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_soal` varchar(100) NOT NULL,
  `skor` int(100) NOT NULL,
  `jawaban` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulangan`
--

INSERT INTO `ulangan` (`id_ulangan`, `nama`, `nomor_soal`, `skor`, `jawaban`) VALUES
(17, 'Satrio Dan Dwi', '5', 1, 'A'),
(18, 'alyott', '1', 1, 'A'),
(23, 'Satrio Dan Dwi', '6', 1, 'B'),
(27, 'shinta dewi', '1', 1, 'A'),
(32, 'Satrio Dan Dwi', '7', 1, 'A'),
(33, 'Fatra & Arya', '4', 1, 'D'),
(34, 'encekk_ika_yk', '1', 1, 'A'),
(51, 'shinta dewi', '2', 1, 'B'),
(54, 'alyott', '2', 1, 'B'),
(57, 'Satrio Dan Dwi', '9', 1, 'B'),
(63, 'shinta dewi', '3', 1, 'C'),
(71, 'alyott', '3', 1, 'C'),
(75, 'Putri', '3', 1, 'C'),
(76, 'shinta dewi', '4', 1, 'D'),
(77, 'encekk_ika_yk', '4', 1, 'D'),
(84, 'siska-zahra', '1', 1, 'A'),
(85, 'Putri', '4', 1, 'D'),
(89, 'encekk_ika_yk', '5', 1, 'A'),
(92, 'shinta dewi', '5', 1, 'A'),
(93, 'Putri', '5', 1, 'A'),
(96, 'Satrio Dan Dwi', '11', 1, 'B'),
(106, 'shinta dewi', '6', 1, 'B'),
(109, 'Satrio Dan Dwi', '13', 1, 'B'),
(110, 'alyott', '4', 1, 'D'),
(112, 'Putri', '7', 1, 'A'),
(114, 'Deria yudit dan rehan', '14', 1, 'C'),
(120, 'Satrio Dan Dwi', '14', 1, 'C'),
(127, 'alyott', '5', 1, 'A'),
(140, 'alyott', '6', 1, 'B'),
(141, 'siska-zahra', '3', 1, 'C'),
(147, 'alyott', '7', 1, 'A'),
(150, 'Fatra & Arya', '10', 1, 'C'),
(171, 'Cristia ketceh', '11', 1, 'B'),
(180, 'alyott', '8', 1, 'A'),
(182, 'siska-zahra', '4', 1, 'D'),
(183, 'shinta dewi', '7', 1, 'A'),
(193, 'Cristia ketceh', '12', 1, 'B'),
(194, 'siska-zahra', '5', 1, 'A'),
(196, 'shinta dewi', '8', 0, 'B'),
(202, 'Cristia ketceh', '13', 1, 'B'),
(205, 'siska-zahra', '6', 1, 'B'),
(207, 'Dimas dan Dika', '2', 1, 'B'),
(208, 'alyott', '9', 1, 'B'),
(209, 'Cristia ketceh', '14', 1, 'C'),
(210, 'Dimas dan Dika', '3', 1, 'C'),
(211, 'Dimas dan Dika', '4', 1, 'D'),
(214, 'alyott', '10', 1, 'C'),
(216, 'Dimas dan Dika', '5', 1, 'A'),
(217, 'shinta dewi', '9', 1, 'B'),
(218, 'siska-zahra', '7', 1, 'A'),
(219, 'alyott', '11', 1, 'B'),
(220, 'Dimas dan Dika', '6', 1, 'B'),
(223, 'Dimas dan Dika', '7', 1, 'A'),
(224, 'shinta dewi', '10', 1, 'C'),
(237, 'Dimas dan Dika', '9', 1, 'B'),
(239, 'siska-zahra', '8', 1, 'A'),
(242, 'Amanda uyy', '13', 1, 'B'),
(244, 'Dimas dan Dika', '11', 1, 'B'),
(246, 'siska-zahra', '9', 1, 'B'),
(247, 'alyott', '12', 1, 'B'),
(252, 'Dimas dan Dika', '13', 1, 'B'),
(253, 'alyott', '13', 1, 'B'),
(255, 'encekk_ika_yk', '12', 1, 'B'),
(256, 'Amanda uyy', '14', 1, 'C'),
(257, 'Dimas dan Dika', '14', 1, 'C'),
(259, 'shinta dewi', '11', 1, 'B'),
(260, 'alyott', '14', 1, 'C'),
(264, 'giant abdul hanif', '10', 1, 'C'),
(269, 'shinta dewi', '12', 1, 'B'),
(271, 'encekk_ika_yk', '13', 1, 'B'),
(273, 'wakman', '11', 1, 'B'),
(275, 'shinta dewi', '13', 1, 'B'),
(279, 'siska-zahra', '10', 1, 'C'),
(280, 'shinta dewi', '14', 1, 'C'),
(281, 'encekk_ika_yk', '14', 1, 'C'),
(284, 'Deria yudit dan rehan', '1', 1, 'A'),
(286, 'Deria yudit dan rehan', '2', 1, 'B'),
(289, 'novi', '7', 1, 'A'),
(290, 'Deria yudit dan rehan', '3', 1, 'C'),
(292, 'Dimas dan Dika', '1', 1, 'A'),
(297, 'Deria yudit dan rehan', '4', 1, 'D'),
(301, 'siska-zahra', '11', 1, 'B'),
(302, 'Deria yudit dan rehan', '5', 1, 'A'),
(305, 'Deria yudit dan rehan', '6', 1, 'B'),
(307, 'siska-zahra', '12', 1, 'B'),
(308, 'wakman', '12', 0, 'D'),
(310, 'novi', '8', 1, 'A'),
(314, 'siska-zahra', '13', 1, 'B'),
(315, 'wakman', '13', 1, 'B'),
(321, 'siska-zahra', '14', 1, 'C'),
(322, 'giant abdul hanif', '13', 1, 'B'),
(325, 'novi', '9', 1, 'B'),
(331, 'giant abdul hanif', '14', 1, 'C'),
(334, 'Putri', '6', 1, 'B'),
(354, 'novi', '10', 1, 'C'),
(355, 'Deria yudit dan rehan', '7', 1, 'A'),
(361, 'RRQ andra', '13', 1, 'B'),
(362, 'RRQ andra', '14', 1, 'C'),
(365, 'wakman', '1', 1, 'A'),
(368, 'Deria yudit dan rehan', '8', 1, 'A'),
(369, '@linda', '6', 1, 'B'),
(370, 'novi', '11', 1, 'B'),
(372, 'Deria yudit dan rehan', '9', 1, 'B'),
(373, 'Dimas dan Dika', '8', 1, 'A'),
(375, 'giant abdul hanif', '1', 1, 'A'),
(376, 'Deria yudit dan rehan', '10', 1, 'C'),
(377, 'Satrio Dan Dwi', '12', 1, 'B'),
(381, 'novi', '12', 1, 'B'),
(385, 'Satrio Dan Dwi', '1', 1, 'A'),
(387, 'RRQ andra', '6', 1, 'B'),
(388, 'Satrio Dan Dwi', '2', 1, 'B'),
(389, 'RRQ andra', '7', 0, 'B'),
(390, 'Deria yudit dan rehan', '11', 1, 'B'),
(391, 'RRQ andra', '8', 1, 'A'),
(392, 'Satrio Dan Dwi', '3', 1, 'C'),
(393, 'novi', '13', 1, 'B'),
(395, 'RRQ andra', '9', 1, 'B'),
(397, 'RRQ andra', '10', 1, 'C'),
(398, 'RRQ andra', '11', 1, 'B'),
(399, 'Dimas dan Dika', '12', 1, 'B'),
(400, 'Satrio Dan Dwi', '4', 1, 'D'),
(402, 'novi', '14', 1, 'C'),
(404, 'Deria yudit dan rehan', '12', 1, 'B'),
(405, 'giant abdul hanif', '2', 0, 'A'),
(409, 'RRQ andra', '12', 1, 'B'),
(410, 'giant abdul hanif', '3', 1, 'C'),
(411, 'giant abdul hanif', '4', 1, 'D'),
(412, 'Deria yudit dan rehan', '13', 1, 'B'),
(433, 'giant abdul hanif', '8', 1, 'A'),
(434, '@linda', '10', 1, 'C'),
(436, 'ari wahyudi', '2', 1, 'B'),
(437, '@linda', '11', 1, 'B'),
(439, 'ari wahyudi', '3', 1, 'C'),
(442, '@linda', '12', 1, 'B'),
(445, 'wakman', '3', 1, 'C'),
(446, 'ari wahyudi', '6', 1, 'B'),
(447, '@linda', '13', 1, 'B'),
(448, 'ari wahyudi', '7', 0, 'B'),
(449, 'ari wahyudi', '8', 1, 'A'),
(450, '@linda', '14', 1, 'C'),
(453, 'ari wahyudi', '10', 1, 'C'),
(454, 'ari wahyudi', '11', 1, 'B'),
(457, 'ari wahyudi', '12', 1, 'B'),
(459, 'ari wahyudi', '13', 1, 'B'),
(463, 'ari wahyudi', '14', 1, 'C'),
(468, '@linda', '1', 1, 'A'),
(469, 'encekk_ika_yk', '6', 0, 'C'),
(471, '@linda', '2', 1, 'B'),
(472, 'RRQ andra', '1', 1, 'A'),
(475, '@linda', '3', 1, 'C'),
(478, 'ari wahyudi', '1', 1, 'A'),
(480, '@linda', '4', 1, 'D'),
(484, '@linda', '5', 1, 'A'),
(487, 'Daviq sioso', '1', 1, 'A'),
(488, 'Fatra & Arya', '5', 1, 'A'),
(489, 'Fatra & Arya', '6', 1, 'B'),
(490, 'RRQ andra', '2', 1, 'B'),
(492, '@linda', '7', 1, 'A'),
(493, 'Daviq sioso', '2', 0, 'C'),
(494, 'RRQ andra', '3', 1, 'C'),
(495, 'Daviq sioso', '3', 1, 'C'),
(500, 'Dimas dan Dika', '10', 1, 'C'),
(502, 'RRQ andra', '4', 0, 'C'),
(504, 'Fatra & Arya', '7', 1, 'A'),
(505, 'wakman', '4', 1, 'D'),
(507, 'giant abdul hanif', '6', 1, 'B'),
(508, 'ari wahyudi', '9', 1, 'B'),
(511, 'RRQ andra', '5', 0, 'B'),
(514, 'siska-zahra', '2', 1, 'B'),
(515, 'wakman', '5', 1, 'A'),
(517, 'Amanda uyy', '1', 1, 'A'),
(521, 'Amanda uyy', '3', 1, 'C'),
(523, 'Amanda uyy', '4', 1, 'D'),
(526, 'Amanda uyy', '5', 1, 'A'),
(527, 'Daviq sioso', '8', 0, 'C'),
(530, 'Daviq sioso', '9', 1, 'B'),
(531, 'Fatra & Arya', '9', 1, 'B'),
(532, 'ari wahyudi', '5', 0, 'B'),
(533, 'Daviq sioso', '10', 1, 'C'),
(538, 'Daviq sioso', '14', 1, 'C'),
(539, 'ari wahyudi', '4', 0, 'C'),
(540, 'wakman', '6', 1, 'B'),
(541, 'Fatra & Arya', '8', 1, 'A'),
(543, 'wakman', '7', 1, 'A'),
(546, 'novi', '3', 1, 'C'),
(547, '@linda', '8', 1, 'A'),
(548, 'Putri', '9', 1, 'B'),
(549, '@linda', '9', 0, 'A'),
(550, 'Putri', '10', 1, 'C'),
(551, 'Putri', '11', 1, 'B'),
(552, 'Putri', '12', 1, 'B'),
(555, 'Putri', '13', 1, 'B'),
(558, 'novi', '4', 1, 'D'),
(571, 'Cristia ketceh', '1', 1, 'A'),
(573, 'Fatra & Arya', '11', 1, 'B'),
(577, 'Cristia ketceh', '2', 1, 'B'),
(578, 'giant abdul hanif', '9', 1, 'B'),
(579, 'novi', '5', 1, 'A'),
(581, 'Cristia ketceh', '3', 1, 'C'),
(582, 'encekk_ika_yk', '2', 1, 'B'),
(583, 'Daviq sioso', '4', 1, 'D'),
(584, 'Amanda uyy', '2', 1, 'B'),
(587, 'Cristia ketceh', '4', 1, 'D'),
(588, 'Fatra & Arya', '12', 1, 'B'),
(589, 'Putri', '8', 1, 'A'),
(590, 'encekk_ika_yk', '3', 1, 'C'),
(592, 'Fatra & Arya', '13', 1, 'B'),
(593, 'Helen', '2', 0, 'C'),
(594, 'Helen', '3', 1, 'C'),
(595, 'Cristia ketceh', '5', 1, 'A'),
(598, 'Helen', '4', 1, 'D'),
(599, 'Helen', '5', 1, 'A'),
(600, 'Helen', '6', 1, 'B'),
(601, 'Fatra & Arya', '14', 1, 'C'),
(602, 'Cristia ketceh', '6', 1, 'B'),
(603, 'novi', '6', 1, 'B'),
(606, 'Satrio Dan Dwi', '8', 1, 'A'),
(609, 'Helen', '7', 1, 'A'),
(610, 'Helen', '8', 1, 'A'),
(611, 'Helen', '9', 1, 'B'),
(612, 'Helen', '10', 1, 'C'),
(613, 'Amanda uyy', '6', 0, 'A'),
(614, 'Fatra & Arya', '1', 1, 'A'),
(616, 'Helen', '11', 1, 'B'),
(618, 'wakman', '14', 1, 'C'),
(619, 'Cristia ketceh', '7', 1, 'A'),
(620, 'Helen', '12', 1, 'B'),
(621, 'encekk_ika_yk', '7', 1, 'A'),
(623, 'Helen', '13', 1, 'B'),
(625, 'Helen', '14', 1, 'C'),
(626, 'Helen', '1', 1, 'A'),
(627, 'Amanda uyy', '7', 1, 'A'),
(629, 'Cristia ketceh', '8', 1, 'A'),
(631, 'encekk_ika_yk', '8', 1, 'A'),
(633, 'Amanda uyy', '8', 1, 'A'),
(641, 'wakman', '2', 1, 'B'),
(644, 'Fatra & Arya', '3', 1, 'C'),
(648, 'Fatra & Arya', '2', 1, 'B'),
(654, 'Daviq sioso', '5', 1, 'A'),
(655, 'novi', '1', 1, 'A'),
(656, 'giant abdul hanif', '5', 0, 'B'),
(658, 'novi', '2', 1, 'B'),
(660, 'Daviq sioso', '6', 0, 'C'),
(663, 'giant abdul hanif', '7', 0, 'B'),
(674, 'Amanda uyy', '9', 0, 'C'),
(678, 'eki gntg & Kalvin Lee', '4', 1, 'D'),
(680, 'Satrio Dan Dwi', '10', 0, 'D'),
(681, 'eki gntg & Kalvin Lee', '5', 1, 'A'),
(684, 'Amanda uyy', '10', 1, 'C'),
(685, 'eki gntg & Kalvin Lee', '6', 1, 'B'),
(686, 'eki gntg & Kalvin Lee', '7', 1, 'A'),
(687, 'eki gntg & Kalvin Lee', '8', 1, 'A'),
(689, 'encekk_ika_yk', '9', 1, 'B'),
(690, 'Amanda uyy', '12', 1, 'B'),
(691, 'eki gntg & Kalvin Lee', '9', 1, 'B'),
(692, 'eki gntg & Kalvin Lee', '10', 1, 'C'),
(693, 'eki gntg & Kalvin Lee', '11', 1, 'B'),
(695, 'eki gntg & Kalvin Lee', '12', 1, 'B'),
(696, 'eki gntg & Kalvin Lee', '13', 1, 'B'),
(697, 'eki gntg & Kalvin Lee', '14', 1, 'C'),
(698, 'eki gntg & Kalvin Lee', '1', 1, 'A'),
(699, 'eki gntg & Kalvin Lee', '2', 1, 'B'),
(700, 'Cristia ketceh', '9', 1, 'B'),
(701, 'eki gntg & Kalvin Lee', '3', 1, 'C'),
(702, 'wakman', '8', 1, 'A'),
(703, 'Cristia ketceh', '10', 1, 'C'),
(704, 'giant abdul hanif', '11', 0, 'C'),
(705, 'giant abdul hanif', '12', 1, 'B'),
(707, 'Amanda uyy', '11', 1, 'B'),
(708, 'Daviq sioso', '7', 1, 'A'),
(709, 'encekk_ika_yk', '10', 1, 'C'),
(710, 'wakman', '9', 0, 'A'),
(711, 'Daviq sioso', '11', 0, 'A'),
(712, 'encekk_ika_yk', '11', 1, 'B'),
(713, 'Daviq sioso', '12', 1, 'B'),
(714, 'Putri', '14', 1, 'C'),
(715, 'Putri', '1', 1, 'A'),
(716, 'Putri', '2', 1, 'B'),
(717, 'Daviq sioso', '13', 0, 'E'),
(718, 'wakman', '10', 0, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(100) NOT NULL,
  `file` text NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD PRIMARY KEY (`id_data_peserta`);

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
-- Indeks untuk tabel `history_ulangan`
--
ALTER TABLE `history_ulangan`
  ADD PRIMARY KEY (`id_history_ulangan`);

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
-- Indeks untuk tabel `skor_ulangan`
--
ALTER TABLE `skor_ulangan`
  ADD PRIMARY KEY (`id_skor_ulangan`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indeks untuk tabel `terpilih`
--
ALTER TABLE `terpilih`
  ADD PRIMARY KEY (`id_terpilih`);

--
-- Indeks untuk tabel `ulangan`
--
ALTER TABLE `ulangan`
  ADD PRIMARY KEY (`id_ulangan`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_peserta`
--
ALTER TABLE `data_peserta`
  MODIFY `id_data_peserta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `history_ulangan`
--
ALTER TABLE `history_ulangan`
  MODIFY `id_history_ulangan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11173;

--
-- AUTO_INCREMENT untuk tabel `live`
--
ALTER TABLE `live`
  MODIFY `id_live` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `skor_ulangan`
--
ALTER TABLE `skor_ulangan`
  MODIFY `id_skor_ulangan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `terpilih`
--
ALTER TABLE `terpilih`
  MODIFY `id_terpilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulangan`
--
ALTER TABLE `ulangan`
  MODIFY `id_ulangan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=719;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
