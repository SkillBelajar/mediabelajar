-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2022 pada 09.22
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
  `level` int(10) NOT NULL,
  `kesiapan` text NOT NULL,
  `minat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_peserta`
--

INSERT INTO `data_peserta` (`id_data_peserta`, `nama`, `emosi`, `harapan`, `level`, `kesiapan`, `minat`) VALUES
(1, 'ADELINE TIRAI KHIRANA | 7A - ', 'senyum', '0', 1, '-', '-');

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
(96, 16, '<p>Silahkan anda isikan apa alamat domain website wikipedia ?</p>', 'Essai'),
(97, 16, '<p>Berikut adalah media belajar Online yang dapat di Akses Siswa, Kecuali ?</p>\r\n\r\n<p>A. Zenius Education</p>\r\n\r\n<p>B. Suara Edukasi Kemdikbud</p>\r\n\r\n<p>C. KelasKita.Com</p>\r\n\r\n<p>D. TV Online</p>', 'D'),
(98, 17, '<p>LAN Adalah ...............?</p>\r\n\r\n<p>A. Local Area Network</p>\r\n\r\n<p>B. Local Arena New</p>\r\n\r\n<p>C. Lokasi Area New</p>\r\n\r\n<p>D. Local Arena Network</p>', 'A'),
(99, 9, '<p>Berikut ini yang termasuk perangkat jaringan komputer , Kecuali ?</p>\r\n\r\n<p>A. Resistor</p>\r\n\r\n<p>B. Router</p>\r\n\r\n<p>C. Lan CARD</p>\r\n\r\n<p>D. HUB</p>', 'A'),
(100, 9, '<p>Perangkat ini dapat memperluas jaringan sehingga dapat digunakan oleh perangkat lain dalam jangkauan luas disebut dengan ?</p>\r\n\r\n<p>A. LAN </p>\r\n\r\n<p>B. WIFI</p>\r\n\r\n<p>C. Bridge</p>\r\n\r\n<p>D. NIC</p>', 'C'),
(101, 9, '<p>Perangkat Jaringan Untuk membagi server ke jaringan lain adalah ?</p>\r\n\r\n<p>A. LAN Card</p>\r\n\r\n<p>B. WIFI Card</p>\r\n\r\n<p>C. HUB</p>\r\n\r\n<p>D. NIC</p>', 'C'),
(102, 9, '<p>Berikut adalah Fungsi dari repeater, Kecuali ?</p>\r\n\r\n<p>A. Repeater adalah perangkat jaringan yang dapat memperkuat sinyal dan memperluas jangkauan sinyal wifi.</p>\r\n\r\n<p>B. Repeater Merupakan alat untuk Megukur Jaringan</p>\r\n\r\n<p>C. Repeater membuat perangkat dapat mengakses wifi dengan mudah.</p>\r\n\r\n<p>D. Repeater tidak perlu menggunakan kabel untuk meminimalkan penggunaan kabel.</p>', 'B'),
(103, 9, '<p>Berikut adalah fungsi dari Acces Point , Kecuali ?</p>\r\n\r\n<p>A. Menangkap Sinyal WIFI</p>\r\n\r\n<p>B. Repeater tidak perlu menggunakan kabel untuk meminimalkan penggunaan kabel.</p>\r\n\r\n<p>C. Sinyal digunakan untuk membuat jaringan WLAN.</p>\r\n\r\n<p>D. Access Point juga dapat membuat kita terhubung ke jaringan LAN tanpa menggunakan kabel.</p>', 'A'),
(104, 17, '<p>WLAN Adalah ?</p>\r\n\r\n<p>A. Wireless Local Arena Network</p>\r\n\r\n<p>B. Wireless Local Area Network</p>\r\n\r\n<p>C. Wireless Lokasi  Area Network</p>\r\n\r\n<p>D. Wifi  Local Area Network</p>', 'B'),
(105, 17, '<p>Berikut adalah Keunggulan Wifi, Kecuali ?</p>\r\n\r\n<p>A. Wireless Local Area Network</p>\r\n\r\n<p>B. Dapat di akses untuk berbagai jenis perangkat</p>\r\n\r\n<p>C. Jangkauan Kecil</p>\r\n\r\n<p>D. Bisa digunakan dimana saja tanpa batasan tempat</p>', 'C'),
(106, 17, '<p>LAN merupakan suatu jaringan komputer dimana cakupan wilayah jaringannya sangat ?</p>\r\n\r\n<p>A. kecil dan Luas</p>\r\n\r\n<p>B. kecil dan terbatas</p>\r\n\r\n<p>C. Luas dan terbatas</p>\r\n\r\n<p>D. Besar dan terbatas</p>', 'B'),
(107, 17, '<p>Berikut adalah Kelebihan LAN , Kecuali ?</p>\r\n\r\n<p>A. Data terpusat</p>\r\n\r\n<p>B. Efektifitas dan efisiensi kerja sekolah</p>\r\n\r\n<p>C. Lebih hemat</p>\r\n\r\n<p>D. Dapat berbagi Resource</p>', 'B'),
(108, 17, '<p>Silahkan anda sebutkan , apa saja kekurangan dari LAN ?</p>\r\n\r\n<p> </p>', 'Essai'),
(109, 18, '<p>File sistem atau manajemen file adalah ?</p>\r\n\r\n<p>A. metode  yang digunakan sistem operasi untuk mengatur dan mengorganisir file pada disk atau partisi.</p>\r\n\r\n<p>B. struktur data yang digunakan sistem operasi untuk mengatur dan mengorganisir file pada disk atau partisi.</p>\r\n\r\n<p>C. metode dan struktur data yang digunakan  untuk mengatur dan mengorganisir file pada disk atau partisi.</p>\r\n\r\n<p>D. metode dan struktur data yang digunakan sistem operasi untuk mengatur dan mengorganisir file pada disk atau partisi.</p>', 'D'),
(110, 18, '<p>Berikut adalah Sasaran Manajemen File , Kecuali ?</p>\r\n\r\n<p>A. Memenuhi kebutuhan manajemen data bagi pemakai</p>\r\n\r\n<p>B. memaksimalkan potensi kehilangan data</p>\r\n\r\n<p>C. Optimasi kinerja</p>\r\n\r\n<p>D. Menyediakan sekumpulan rutin interface masukan/keluaran</p>', 'B'),
(111, 18, '<p>Berikut adalah Fungsi Manajemen File , kecuali ?</p>\r\n\r\n<p>A. Kemampuan backup dan recovery untuk mencegah kehilangan karena kecelakaan atau dari upaya penghancuran informasi.</p>\r\n\r\n<p>B. Penciptaan, modifikasi, dan penghapusan file</p>\r\n\r\n<p>C. Pada lingkungan tidak sensitif dikehendaki informasi yang tersimpan aman dan rahasia</p>\r\n\r\n<p>D. File sistem harus menyediakan interface userfreindly.</p>', 'C'),
(113, 18, '<p>Manajemen file merupakan proses aplikasi pilihan. Pilihan tersebut antara lain, Kecuali ?</p>\r\n\r\n<p>A.  membuat subfolder</p>\r\n\r\n<p>B. copy file</p>\r\n\r\n<p>C. memindahkan file</p>\r\n\r\n<p>D. Print File</p>', 'D'),
(114, 19, '<p>Menu Navigasi pada blog merupakan elemen yang perlu diperhatikan di dalam sebuah blog yang mementingkan ?</p>\r\n\r\n<p>A. fitur dan style untuk setiap detilnya</p>\r\n\r\n<p>B. blog dan style untuk setiap detilnya</p>\r\n\r\n<p>C. penampilan dan style untuk setiap detilnya</p>\r\n\r\n<p>D. penampilan dan mouse  untuk setiap detilnya</p>\r\n\r\n<p> </p>', 'C'),
(115, 19, '<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\">Menu navigasi juga berfungsi sebagai ?</div>\r\n\r\n<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\"> </div>', 'Essai'),
(116, 19, '<p>Dengan adanya menu navigasi maka blog/web semakin cepat mendapatkan  ?</p>\r\n\r\n<p>A. Uang</p>\r\n\r\n<p>B. Sitelink</p>\r\n\r\n<p>C. Google Chrome</p>\r\n\r\n<p>D. Menu</p>', 'B'),
(117, 19, '<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\">Mengapa Website bisa dinilai sebagai profesional ?</div>\r\n\r\n<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\"> </div>', 'Essai'),
(118, 19, '<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\">Website Dinilai baik oleh google karena kita telah ?</div>\r\n\r\n<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\">A. memanjakan Editor</div>\r\n\r\n<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\">B.  memanjakan vlogger</div>\r\n\r\n<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\">C.  memanjakan visitor</div>\r\n\r\n<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\">D.  memanjakan Mesin Pencari</div>\r\n\r\n<div class=\"O0\" style=\"margin-left:36px;text-indent:-0.38in;\"> </div>', 'C'),
(119, 20, '<p>Saat ini para pelajar, mulai dari tingkat Pendidikan Anak Usia Dini (PAUD) hingga pendidikan di universitas, semuanya membutuhkan koneksi Jaringan ?</p>\r\n\r\n<p>A. Wifi Offline</p>\r\n\r\n<p>B. Internet</p>\r\n\r\n<p>C. Pulsa</p>\r\n\r\n<p>D. LAN</p>', 'B'),
(120, 20, '<p>Manfaat internet bagi pelajar adalah ?</p>\r\n\r\n<p>A. membantu setiap pelajar mendapatkan informasi atau referensi secara ilegal</p>\r\n\r\n<p>B. membantu setiap pelajar mendapatkan refrensi secara efektif</p>\r\n\r\n<p>C. membantu setiap pelajar mendapatkan informasi atau referensi kurang maksimal</p>\r\n\r\n<p>D. membantu setiap pelajar mendapatkan informasi  Hoax</p>', 'B'),
(121, 20, '<p>Bagaimana cara anda berkomunikasi dengan Guru dengan memanfaatkan jaringan internet ?</p>', 'Essai'),
(122, 20, '<p>Berikut adalah Manfaat Internet Bagi Pelajar , Kecuali ?</p>\r\n\r\n<p>A. Memudahkan pelajar mencari referensi</p>\r\n\r\n<p>B. Memudahkan komunikasi dengan guru</p>\r\n\r\n<p>C. Mempermudah pemahaman materi belajar</p>\r\n\r\n<p>D. Menyebarkan Berita Hoax</p>', 'D'),
(123, 21, '<p>aplikasi yang digunakan untuk mengolah sebuah data dengan otomatis melalui berbagai bentuk seperti rumus, perhitungan dasar, pengolahan data, pembuatan tabel, pembuatan grafik hingga manajemen data adalah ?</p>\r\n\r\n<p>A. Microsoft Word</p>\r\n\r\n<p>B. Microsoft Excel</p>\r\n\r\n<p>C. Microsoft Power Point </p>\r\n\r\n<p>D. Microsoft Power Ranggers</p>\r\n\r\n<p> </p>', 'B'),
(124, 21, '<p>MS Excel merupakan aplikasi yang populer yang banyak digunakan untuk kebutuhan olahan ?</p>\r\n\r\n<p>A. manajemen gambar</p>\r\n\r\n<p>B.manajemen text</p>\r\n\r\n<p>C. manajemen data</p>\r\n\r\n<p>D. manajemen kata</p>', 'C'),
(125, 21, '<p>Microsoft Excel adalah aplikasi pengolah angka yang dikeluarkan oleh ?</p>\r\n\r\n<p>A. Microskop Corporation</p>\r\n\r\n<p>B. Microsoft Corporation</p>\r\n\r\n<p>C. Microsoft Intel</p>\r\n\r\n<p>D. Micro Corporation</p>', 'B'),
(126, 21, '<p>Silahkan anda tuliskan , apa saja kelebihan dari Ms Excel ?</p>', 'Essai'),
(127, 21, '<p>Berikut adalah Kekurangan dari Ms.Excel , Kecuali ?</p>\r\n\r\n<p>A. Software pengolah angka ini berbayar atau tidak gratis</p>\r\n\r\n<p>B. Aplikasi ini memerlukan banyak memory (RAM) dan proccessor yang besar (CPU).</p>\r\n\r\n<p>C. Dalam 1 sheet bisa menampung jawaban 1 juta responden dan 16 ribu jawaban/pertanyaan.</p>\r\n\r\n<p>D. Banyak orang yang tidak suka dengan hal ini karena di SPSS misalnya, kita dengan mudah untuk melakukan filter atau pengkategorian jawaban baru.</p>', 'C'),
(128, 22, '<p>SOal 1</p>', 'Essai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_jam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `file_name`, `nama`, `tgl_jam`) VALUES
(19, 'b725a905278657de230c75782f01b88b.png', '-', '03-11-2022 02:50:56'),
(20, 'fd0b7965aaf73185e23a04676e43f611.png', 'RAPHA PARENDRA WAHYUDI | 8B - WIRA ADITYA HELAPRINANDA | 8B', '03-11-2022 04:18:54'),
(21, '499bae377fe578632d6f53a7000e52fa.png', 'VIXION NG | 8B - AURELIA FADILA | 8B', '03-11-2022 04:18:56'),
(22, 'd47d49c267c6a61f9d123e7a410d59bd.png', 'FLORENCIUS VINCENT | 8B - CHINDI | 8B', '03-11-2022 04:19:03'),
(23, 'ca346e82f570bf55dbb61b3eaac323ab.png', 'ANDINI PUTRI MULYANI | 8B - IKHSAN FAKHRI | 8B', '03-11-2022 04:19:43'),
(24, 'c2a8b7824ee6b4c57afcc3fc1ab564b1.png', 'RENDI SAPUTRA | 8B - ', '03-11-2022 04:19:44'),
(25, '6a99d7550cacb3660c54707a1cfcc9e5.png', 'FERDY FERNANDO | 8B - ', '03-11-2022 04:19:45'),
(26, 'ec0ef4bc5cee91f4613e16b53b1edc7c.png', 'REVALLINO KEVIN TARIGAS | 8B - ', '03-11-2022 04:19:56'),
(27, '88462971d0ff8eb3772ef38be592ad69.png', 'MUHAMMAD IQBAL | 8B - PRIYO DAMARJATI | 8B', '03-11-2022 04:20:01'),
(28, 'd7ac5660c1fd4efd6eaa3c83d045df40.png', 'KRESENSIA PUTRI AULIA | 8B - ', '03-11-2022 04:20:23'),
(29, '0c0c578e163f1579dbdce10e39b08b17.png', 'HERAWATI | 8B - ', '03-11-2022 04:20:27'),
(30, '66e9773da78969bf07635f897f318067.png', 'RAYA OKTARIYANI | 8B - ', '03-11-2022 04:20:29'),
(31, '19f7fbf1e59dc9bc3abd372e53e238b4.png', 'THEA SALSABILLA PUTRI | 8B - DENIS ADITYA PRATAMA | 8B', '03-11-2022 04:20:30'),
(32, '19613d199a6178365d08ae6eb6b4d431.png', 'FITRI RAMADHANI | 8B - ', '03-11-2022 04:20:33'),
(33, 'd47d49c267c6a61f9d123e7a410d59bd.png', 'FLORENCIUS VINCENT | 8B - CHINDI | 8B', '03-11-2022 04:20:35'),
(34, 'ba3e0d8d51535c5bd04b11cac4793532.png', 'FAVIAN GAVRA | 8B - ', '03-11-2022 04:20:44'),
(35, '50423566f33fdc6537bb1a8ffd60463c.png', 'AKILA ALWINDI | 8B - ', '03-11-2022 04:21:21'),
(36, 'c190231256e4cb91707065e5ea73f4ae.png', 'APRILLIA NATASHA KUMANG | 8B - ', '03-11-2022 04:21:26'),
(37, '19f7fbf1e59dc9bc3abd372e53e238b4.png', 'THEA SALSABILLA PUTRI | 8B - DENIS ADITYA PRATAMA | 8B', '03-11-2022 04:21:40'),
(38, '9ec0a1733b64d6b54b33ad5a9473898d.png', 'STEPANUS BAGAS | 8B - SISKA | 8B', '03-11-2022 04:22:03'),
(39, 'd82f2a851341f7fabb84fccd795b8aa4.png', 'AHMAD MUTAWAQQIL | 8B - ', '03-11-2022 04:23:52'),
(40, '66d3850d30ba795363e7cfba87772471.png', 'BINTANG A. PRATAMA | 8B - ', '03-11-2022 04:24:56'),
(41, 'd82f2a851341f7fabb84fccd795b8aa4.png', 'AHMAD MUTAWAQQIL | 8B - ', '03-11-2022 04:25:44'),
(42, '588256c4470019d197d3b0b16cdfe8fd.png', '-', '03-11-2022 04:37:04'),
(43, '588256c4470019d197d3b0b16cdfe8fd.png', '-', '03-11-2022 04:37:33'),
(44, '.png', 'ADELINE TIRAI KHIRANA | 7A - ', '03-11-2022 04:37:39'),
(45, '21d7c95a824b93f1c656b0ded0b6accd.png', 'ADELINE TIRAI KHIRANA | 7A - ', '03-11-2022 04:37:55'),
(46, '78ba3c2ab6534b292eaa51bb42d554b2.png', '-', '03-11-2022 04:38:24'),
(47, 'c9bd283028ec89993d2087f1a6245b07.png', 'Test | Test - ', '03-11-2022 04:38:59'),
(48, 'ce04f36beca1cf1396d9aa47bd0fc15f.png', 'KRESENSIA PUTRI AULIA | 8B - ', '03-11-2022 04:39:37'),
(49, '83c2d818fdfb0b9f239465d257ee7326.png', 'FAVIAN GAVRA | 8B - ', '03-11-2022 04:41:26'),
(50, '3dd2d46ab0a4eeaab1a487f84fc2fe02.png', '-', '03-11-2022 05:48:28'),
(51, 'a72d485be9ac5baf43855bcf4ac43cda.png', 'ANGGI PARAMITHA | 8D - ', '03-11-2022 05:49:02'),
(52, '52f34f2afe45eadd512fde8a07cdc3b3.png', 'KIBRIA VAN YUMNAA | 8D - KHAIRINNISA NATHANAELA | 8D', '03-11-2022 05:49:54'),
(53, '22a2c47e2755ec2f8a613b3bbb7d0620.png', 'MUHAMMAD AKBAR | 8D - MESYA TRIANA SARI | 8D', '03-11-2022 05:50:06'),
(54, 'af17658bf2211167ab7d40871d5cd9af.png', 'HAFIZA DALILA PUTRI | 8D - ANGGUN C. SASMI | 8D', '03-11-2022 05:50:08'),
(55, 'ce8862f2aff2032fc7478d92839eb97f.png', 'FIERSYA ANDINI | 8D - ', '03-11-2022 05:51:04'),
(56, '25f635e678f48fa0eae8904e9abdfe56.png', 'FERJI HALIM | 8D - ', '03-11-2022 05:51:06'),
(57, 'c483427444f09cbdb1c667127ca66191.png', 'HENGKY | 8D - ', '03-11-2022 05:51:09'),
(58, '202b8824adb485ff92fe434a22d34fa6.png', 'ARIEF AL FAZRI | 8D - ', '03-11-2022 05:51:15'),
(59, '8bfe84affa24c39ee3e25c6b8323001b.png', 'MANDALA ADI KUSUMA | 8D - ', '03-11-2022 05:51:33'),
(60, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:51:36'),
(61, '941f427a6817df6eabc63f1d9aebb815.png', 'REGINA BUNGA LESTARI | 8D - TIENU NENDAR RESTU | 8D', '03-11-2022 05:51:38'),
(62, '7c84569e17ad68502d92ed7885226438.png', 'NOVIANA RESTI PUTRI PRATAMA | 8D - ', '03-11-2022 05:51:46'),
(63, '8e9d1e40f7d290b3c88b39d04d3370b0.png', 'ADELINE TIRAI KHIRANA | 7A - ', '03-11-2022 05:51:47'),
(64, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:52:27'),
(65, '4c20ae36b9217639acc098e66f45dc36.png', 'AGSA PUTRA BIANTORO | 8D - ', '03-11-2022 05:52:31'),
(66, '80c2eb681c62e0e86c129e5f4c4e7c30.png', 'AURELIA MARTA TINTANG | 8D - RAISAN MUHAMMAD FADHILLAH | 8D', '03-11-2022 05:52:38'),
(67, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:52:41'),
(68, 'd5847bcbabdaf58536a801b466f59db7.png', 'VARRA VICRYYA ZAINAL | 8D - ALVINXIE STEPANUS WILSON | 8D', '03-11-2022 05:53:12'),
(69, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:53:18'),
(70, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:53:31'),
(71, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:53:36'),
(72, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:53:42'),
(73, '6aa7015dab885d16f318d6002a500b33.png', 'ZULVA SYAKILA | 8D - ', '03-11-2022 05:53:49'),
(74, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:53:51'),
(75, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:54:15'),
(76, '2c62a43a96a4898232b7cc0492452ea7.png', 'HAFIZA DALILA PUTRI | 8D - ANGGUN C. SASMI | 8D', '03-11-2022 05:54:40'),
(77, '42ba21a4a24c9cc0e7176608c286a380.png', 'AHMAD ALDIKA | 8D - ', '03-11-2022 05:54:50'),
(78, 'c64da7617d7f63e895e7e0bb67c759d3.png', 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', '03-11-2022 05:54:52'),
(79, '421ed0e12dcae2da0cb4c7d3b1a8898f.png', 'RAMADANI | 8D - ', '03-11-2022 05:58:46'),
(80, '9a440e88f017f876889343f6390fbf5e.png', 'MARVEL JANUARDI | 8D - ', '03-11-2022 05:59:07'),
(81, '9a440e88f017f876889343f6390fbf5e.png', 'MARVEL JANUARDI | 8D - ', '03-11-2022 05:59:19'),
(82, '49a79ddadb1c68a3961e174520c36288.png', 'HENGKY | 8D - ', '03-11-2022 06:30:28'),
(83, '5901ee3de4766883d4addfd45899e158.png', '-', '03-11-2022 07:56:49'),
(84, 'c2ea1a8ad4c9dbdf38a32a2554ca6777.png', 'Test | Test - ', '03-11-2022 07:56:53'),
(85, '5465d4fb16266a16dda596f75b5df2db.png', 'ADELINE TIRAI KHIRANA | 7A - ', '03-11-2022 08:06:37');

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
(11553, '4', 'Deria yudit dan rehan', '100.00', '25-10-2022'),
(11554, '4', 'alyott', '100.00', '25-10-2022'),
(11555, '4', 'siska-zahra', '100.00', '25-10-2022'),
(11556, '4', 'novi', '100.00', '25-10-2022'),
(11557, '4', 'Dimas dan Dika', '100.00', '25-10-2022'),
(11558, '4', 'eki gntg & Kalvin Lee', '100.00', '25-10-2022'),
(11559, '4', 'Cristia ketceh', '100.00', '25-10-2022'),
(11560, '4', 'Putri', '100.00', '25-10-2022'),
(11561, '4', 'Fatra & Arya', '100.00', '25-10-2022'),
(11562, '4', '@linda', '92.86', '25-10-2022'),
(11563, '4', 'encekk_ika_yk', '92.86', '25-10-2022'),
(11564, '4', 'Satrio Dan Dwi', '92.86', '25-10-2022'),
(11565, '4', 'shinta dewi', '92.86', '25-10-2022'),
(11566, '4', 'Helen', '92.86', '25-10-2022'),
(11567, '4', 'Amanda uyy', '85.71', '25-10-2022'),
(11568, '4', 'wakman', '78.57', '25-10-2022'),
(11569, '4', 'ari wahyudi', '78.57', '25-10-2022'),
(11570, '4', 'RRQ andra', '78.57', '25-10-2022'),
(11571, '4', 'giant abdul hanif', '71.43', '25-10-2022'),
(11572, '4', 'Daviq sioso', '64.29', '25-10-2022'),
(12191, '4', 'Test', '0.00', '25-10-2022'),
(14434, '4', 'Maharani Bilqis', '100.00', '25-10-2022'),
(14435, '4', 'Mr.Rian-_- dan  Mr.Fahri-_-', '100.00', '25-10-2022'),
(14436, '4', 'sela dan levi', '93.33', '25-10-2022'),
(14437, '4', 'Crissa Jumeika', '93.33', '25-10-2022'),
(14438, '4', 'Rasy.', '93.33', '25-10-2022'),
(14439, '4', 'Gufa dan Heldi', '93.33', '25-10-2022'),
(14440, '4', 'Alifyatc', '93.33', '25-10-2022'),
(14441, '4', 'keysa izza isna aulia', '93.33', '25-10-2022'),
(14442, '4', 'Zahra Salsabila Ramadhina', '93.33', '25-10-2022'),
(14443, '4', 'farel galih', '93.33', '25-10-2022'),
(14444, '4', 'Sekawanan farhan and puput', '93.33', '25-10-2022'),
(14445, '4', 'Thomas dan soya', '93.33', '25-10-2022'),
(14446, '4', 'Crissa Aurel Syabila', '80.00', '25-10-2022'),
(14447, '4', 'xiao anime,christian[gm abadi]', '80.00', '25-10-2022'),
(14448, '4', 'Mozza Amelia', '73.33', '25-10-2022'),
(14449, '4', 'Cantika D Luffy', '73.33', '25-10-2022'),
(14450, '4', 'dlla.2810_', '66.67', '25-10-2022'),
(14451, '4', 'BADRIYAH', '60.00', '25-10-2022'),
(14452, '4', 'liana', '60.00', '25-10-2022'),
(14453, '4', 'Cindy Cinta', '53.33', '25-10-2022'),
(14471, '3', 'Test', '0.00', '25-10-2022'),
(15339, '3', 'GabrielDosSakti', '85.71', '25-10-2022'),
(15340, '3', 'icha mellani dan tita hestiliyana', '71.43', '25-10-2022'),
(15341, '3', 'Nadhif', '71.43', '25-10-2022'),
(15342, '3', 'saif&Fadil', '71.43', '25-10-2022'),
(15343, '3', 'Raditia firmansyah', '71.43', '25-10-2022'),
(15344, '3', 'Maharani Ayuningtyas', '64.29', '25-10-2022'),
(15345, '3', 'eva putriana Dierly nur pramudya', '64.29', '25-10-2022'),
(15346, '3', 'Jesica & Sello', '64.29', '25-10-2022'),
(15347, '3', 'Harman Syah', '57.14', '25-10-2022'),
(15348, '3', 'abdul hafidz', '57.14', '25-10-2022'),
(15349, '3', 'marvel dika kurniawan', '57.14', '25-10-2022'),
(15350, '3', 'Muhammad Hardiansyah', '57.14', '25-10-2022'),
(15351, '3', 'GUSTI&ELLO', '57.14', '25-10-2022'),
(15352, '3', 'kafila dan seno', '50.00', '25-10-2022'),
(15353, '3', 'UTIN CELSA IPALOVA', '50.00', '25-10-2022'),
(15354, '3', 'Muhamad Azi fahreyza GANTENG', '42.86', '25-10-2022'),
(15355, '3', 'AZHURA MELLYSA', '42.86', '25-10-2022'),
(15356, '3', 'Rizqi widysrto', '42.86', '25-10-2022'),
(15392, '6', 'Test', '0.00', '27-10-2022'),
(16491, '6', 'Belniclin  si banteng mer-', '85.00', '27-10-2022'),
(16492, '6', 'salsa7c', '80.00', '27-10-2022'),
(16493, '6', 'FADIL&RAFA NAIK ICIKIWIR', '75.00', '27-10-2022'),
(16494, '6', 'fahri ngawi > winna', '75.00', '27-10-2022'),
(16495, '6', 'TEGUH', '75.00', '27-10-2022'),
(16496, '6', 'Dian pertiwi dan ririn', '75.00', '27-10-2022'),
(16497, '6', 'petrus saka', '75.00', '27-10-2022'),
(16498, '6', 'Karunia auryn 7C', '70.00', '27-10-2022'),
(16499, '6', 'Nazwa reza', '70.00', '27-10-2022'),
(16500, '6', 'awang brudas ngawi50', '70.00', '27-10-2022'),
(16501, '6', 'peby rissah siu', '65.00', '27-10-2022'),
(16502, '6', 'Elsa mulya', '65.00', '27-10-2022'),
(16503, '6', 'silaaa:(', '65.00', '27-10-2022'),
(16504, '6', 'Andreas . Yt50', '60.00', '27-10-2022'),
(16505, '6', 'sapariyah &fird', '60.00', '27-10-2022'),
(16506, '6', 'belent', '60.00', '27-10-2022'),
(16507, '6', 'Jumi 7C', '35.00', '27-10-2022'),
(16508, '6', 'ANDRE', '35.00', '27-10-2022'),
(18129, '6', 'Arsika dan bram', '95.24', '28-10-2022'),
(18130, '6', 'Adell', '95.24', '28-10-2022'),
(18131, '6', 'cipaay', '95.24', '28-10-2022'),
(18132, '6', 'Domi', '85.71', '28-10-2022'),
(18133, '6', 'fatri', '80.95', '28-10-2022'),
(18134, '6', 'syafira', '80.95', '28-10-2022'),
(18135, '6', 'Wandi', '80.95', '28-10-2022'),
(18136, '6', 'habibi', '80.95', '28-10-2022'),
(18137, '6', 'Alizha dan Hana', '76.19', '28-10-2022'),
(18138, '6', 'ANDRE WINATA dan ALIBA sapoutra', '71.43', '28-10-2022'),
(18139, '6', 'fajar', '66.67', '28-10-2022'),
(18140, '6', 'Miska Fitriyani', '66.67', '28-10-2022'),
(18141, '6', 'desvita lisa', '66.67', '28-10-2022'),
(18142, '6', 'sri wulandari/setiana', '61.90', '28-10-2022'),
(18143, '6', 'topik/akbar 7A', '61.90', '28-10-2022'),
(18144, '6', 'RAFFI&SIVA', '57.14', '28-10-2022'),
(18145, '6', 'faqih', '42.86', '28-10-2022'),
(18146, '6', 'egi', '38.10', '28-10-2022'),
(18147, '6', 'cindy amelia', '38.10', '28-10-2022'),
(18148, '6', 'wisnu 7A', '14.29', '28-10-2022'),
(18161, '6', 'tes', '0.00', '28-10-2022'),
(19140, '6', 'irfan & Dwika', '100.00', '28-10-2022'),
(19141, '6', 'LILY&NOVAL', '95.24', '28-10-2022'),
(19142, '6', 'HAIKAL & RINDU', '90.48', '28-10-2022'),
(19143, '6', 'Tania kelazzzzz', '85.71', '28-10-2022'),
(19144, '6', 'Syfa', '85.71', '28-10-2022'),
(19145, '6', 'Faliansia', '85.71', '28-10-2022'),
(19146, '6', 'farid reva', '80.95', '28-10-2022'),
(19147, '6', 'venisia & rehan', '80.95', '28-10-2022'),
(19148, '6', 'Ikan Kasihan l Rafel', '76.19', '28-10-2022'),
(19149, '6', 'Cikafebri><', '71.43', '28-10-2022'),
(19150, '6', 'Diva aurelia rumbiak', '71.43', '28-10-2022'),
(19151, '6', 'zx_ade_kelazzz', '71.43', '28-10-2022'),
(19152, '6', 'leticia', '66.67', '28-10-2022'),
(19153, '6', 'ilham&fadli kelazz', '66.67', '28-10-2022'),
(19154, '6', 'angellita rahmadani', '52.38', '28-10-2022'),
(19155, '6', 'Guan pd', '52.38', '28-10-2022'),
(20029, '3', 'ditz difsi rend henker', '85.71', '29-10-2022'),
(20030, '3', 'jipa satir cepmek & Nanda calon rapper', '85.71', '29-10-2022'),
(20031, '3', 'tiffany n selvi', '85.71', '29-10-2022'),
(20032, '3', 'Muhammad Raihan', '78.57', '29-10-2022'),
(20033, '3', 'AZIZAH SAFITRI', '78.57', '29-10-2022'),
(20034, '3', 'ACIKIWIR', '78.57', '29-10-2022'),
(20035, '3', 'Besaldo and decha', '78.57', '29-10-2022'),
(20036, '3', 'Herdi', '78.57', '29-10-2022'),
(20037, '3', 'paol ho\'oo', '71.43', '29-10-2022'),
(20038, '3', 'Pelangi yamete & salsa kudasai', '71.43', '29-10-2022'),
(20039, '3', 'nayaa dan riswandy', '71.43', '29-10-2022'),
(20040, '3', 'rengga slebew', '64.29', '29-10-2022'),
(20041, '3', 'MARTIN', '64.29', '29-10-2022'),
(20042, '3', 'Sultan Dan Haji Wando', '64.29', '29-10-2022'),
(20043, '3', 'Meylani ebeww and fazil', '64.29', '29-10-2022'),
(20044, '3', 'Denis.GTG', '57.14', '29-10-2022'),
(20045, '3', 'fahri', '57.14', '29-10-2022'),
(20046, '3', 'ANGGITA SRI.........', '50.00', '29-10-2022'),
(20047, '3', 'murid 1', '0.00', '29-10-2022'),
(20915, '6', 'RESTI dan SILPA', '100.00', '31-10-2022'),
(20916, '6', 'Febbi & kanaya', '90.48', '31-10-2022'),
(20917, '6', 'Damianus awebew', '85.71', '31-10-2022'),
(20918, '6', 'Meylannie Putri Aulia - VII D', '80.95', '31-10-2022'),
(20919, '6', 'Selvi cug', '76.19', '31-10-2022'),
(20920, '6', 'fazia cuy', '76.19', '31-10-2022'),
(20921, '6', 'astajib&aji', '71.43', '31-10-2022'),
(20922, '6', 'RICO SANJAYA OWEN  animlover', '71.43', '31-10-2022'),
(20923, '6', 'Firza', '71.43', '31-10-2022'),
(20924, '6', 'ulfianti dwi sandika', '71.43', '31-10-2022'),
(20925, '6', 'ini mawan', '71.43', '31-10-2022'),
(20926, '6', 'Fadhil', '66.67', '31-10-2022'),
(20927, '6', 'ajeng novianti', '66.67', '31-10-2022'),
(20928, '6', 'RANDIKA dan SAHID', '61.90', '31-10-2022'),
(20929, '6', 'Theresia dan Zikra', '61.90', '31-10-2022'),
(20930, '6', 'Tedi Mulyadi', '57.14', '31-10-2022'),
(20931, '6', 'dominikus/Gracella', '52.38', '31-10-2022'),
(20932, '6', 'User', '0.00', '31-10-2022'),
(22417, '4', 'fadhil dan aliung', '100.00', '31-10-2022'),
(22418, '4', 'Tiara dan Ambar', '100.00', '31-10-2022'),
(22419, '4', 'uray dan yusrina', '100.00', '31-10-2022'),
(22420, '4', 'muhammad revaliza akbar', '100.00', '31-10-2022'),
(22421, '4', 'Muhammad Lutfi', '100.00', '31-10-2022'),
(22422, '4', 'darling dan ananda', '100.00', '31-10-2022'),
(22423, '4', 'Thomas Derly Herben', '100.00', '31-10-2022'),
(22424, '4', 'Rifki Attamimi & Uti M. Farhan', '94.44', '31-10-2022'),
(22425, '4', 'Mislia dan Desi', '88.89', '31-10-2022'),
(22426, '4', 'Angelita Galho', '88.89', '31-10-2022'),
(22427, '4', 'yunika Nurfadhilah Haryanto', '88.89', '31-10-2022'),
(22428, '4', 'afrilliyaandini', '83.33', '31-10-2022'),
(22429, '4', 'alif nurwahid ramadhani dan nazra tusyita rosa', '83.33', '31-10-2022'),
(22430, '4', 'Muhammad sandi  dan paril', '77.78', '31-10-2022'),
(22431, '4', 'Hendri Apriandi', '72.22', '31-10-2022'),
(22432, '4', 'Nur halimah', '66.67', '31-10-2022'),
(22433, '4', 'Chelsea & Melisa', '66.67', '31-10-2022'),
(22434, '4', 'pitri jelita', '61.11', '31-10-2022'),
(22435, '4', 'Reno Apreza Revanda', '55.56', '31-10-2022'),
(22438, '4', 'Test', '0.00', '31-10-2022'),
(23466, '4', 'raisya chan dan amadkopling 200cc', '100.00', '31-10-2022'),
(23467, '4', 'y', '100.00', '31-10-2022'),
(23468, '4', 'Novaaaaaaaa', '100.00', '31-10-2022'),
(23469, '4', 'azzurao ciaoo', '94.44', '31-10-2022'),
(23470, '4', 'tikazyy_', '88.89', '31-10-2022'),
(23471, '4', 'sandy jakkkkkkkk', '88.89', '31-10-2022'),
(23472, '4', 'MUHAMMAD FERDI SAMBO CRISTIANO RONALDO SIUUU<CR7 ROSSI 46', '88.89', '31-10-2022'),
(23473, '4', 'amel dan heryy', '83.33', '31-10-2022'),
(23474, '4', 'diaaaaazzzzzzzzzzzzzzzzzzsheelbyy', '77.78', '31-10-2022'),
(23475, '4', 'nayla dan andhika', '77.78', '31-10-2022'),
(23476, '4', 'Runnica Nellysa', '77.78', '31-10-2022'),
(23477, '4', 'Diva ilmiyani', '66.67', '31-10-2022'),
(23478, '4', 'Devon Satrio Putra', '66.67', '31-10-2022'),
(23479, '4', 'Mawali_Exe & Riskiiiiiii_12', '66.67', '31-10-2022'),
(23480, '4', 'Aji Fatkhurrohman', '61.11', '31-10-2022'),
(23481, '4', 'akbar', '50.00', '31-10-2022'),
(23482, '4', 'air terjun', '38.89', '31-10-2022'),
(23483, '4', 'putrisky', '27.78', '31-10-2022'),
(23484, '4', 'Olief chan', '22.22', '31-10-2022'),
(23502, '4', 'helen \\fika', '0.00', '01-11-2022'),
(23517, '4', 'helen \\fika', '0.00', '01-11-2022'),
(23540, '4', 'helen \\fika', '0.00', '01-11-2022'),
(23563, '4', 'helen \\fika', '0.00', '01-11-2022'),
(23584, '4', 'helen \\fika', '0.00', '01-11-2022'),
(23605, '4', 'Test', '0.00', '01-11-2022'),
(23606, '4', 'fika\\helen', '0.00', '01-11-2022'),
(23607, '4', 'fika\\helen', '0.00', '01-11-2022'),
(23608, '4', 'fika\\helen', '0.00', '01-11-2022'),
(23609, '4', 'fika\\helen', '0.00', '01-11-2022'),
(23610, '4', 'fika\\helen', '0.00', '01-11-2022'),
(23611, '4', 'fika\\helen', '0.00', '01-11-2022'),
(23612, '4', 'helen \\fika', '0.00', '01-11-2022'),
(23632, '4', 'helen \\fika', '0.00', '01-11-2022'),
(23652, '4', 'helen \\fika', '0.00', '01-11-2022'),
(25553, '4', 'Kalvin Lee & Giant biawak', '100.00', '01-11-2022'),
(25554, '4', 'fatra dan dimas', '100.00', '01-11-2022'),
(25555, '4', 'Arrtodd', '100.00', '01-11-2022'),
(25556, '4', 'barzz kece', '100.00', '01-11-2022'),
(25557, '4', 'Eki dan siska', '100.00', '01-11-2022'),
(25558, '4', 'cristia selebwqzzzz', '100.00', '01-11-2022'),
(25559, '4', 'alyott', '100.00', '01-11-2022'),
(25560, '4', 'Ngawi loperzz', '100.00', '01-11-2022'),
(25561, '4', 'diktod ebewww', '94.44', '01-11-2022'),
(25562, '4', 'Putri kiyowok & satrio', '94.44', '01-11-2022'),
(25563, '4', 'linda@', '94.44', '01-11-2022'),
(25564, '4', 'Shinta dewi', '94.44', '01-11-2022'),
(25565, '4', 'KOV378R/rehan', '88.89', '01-11-2022'),
(25566, '4', 'Amanda_cuyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '83.33', '01-11-2022'),
(25567, '4', 'Yudit', '83.33', '01-11-2022'),
(25568, '4', 'fika helen', '83.33', '01-11-2022'),
(25569, '4', 'noviiiii', '77.78', '01-11-2022'),
(25570, '4', 'RRQ andra daviq dragon', '72.22', '01-11-2022'),
(25571, '4', 'zahrakp.', '72.22', '01-11-2022'),
(25572, '4', 'wakman', '55.56', '01-11-2022'),
(25580, '4', 'Test | Test - ', '0.00', '01-11-2022'),
(26666, '4', 'GALIH DIVHANTARA | 9C - ', '100.00', '01-11-2022'),
(26667, '4', 'JEM THOMAS | 9C - ', '100.00', '01-11-2022'),
(26668, '4', 'CINTA INDAH SAFITRI | 9C - CRISSA JUMEIKA | 9C', '100.00', '01-11-2022'),
(26669, '4', 'MOZZA AMELIA | 9C - ', '100.00', '01-11-2022'),
(26670, '4', 'FARHAN MANDALA | 9C - ', '100.00', '01-11-2022'),
(26671, '4', 'CANTIKA DWI MELATI | 9C - CRISSA AUREL SYABILA | 9C', '100.00', '01-11-2022'),
(26672, '4', 'RASYA EMERALDY HUTAMA | 9C - ', '100.00', '01-11-2022'),
(26673, '4', 'FAHRI SYAHPUTRA | 9C - ', '100.00', '01-11-2022'),
(26674, '4', 'KEYSA IZZA ISNA AULIA | 9C - ', '100.00', '01-11-2022'),
(26675, '4', 'CHRISTIAN PRADIKA DWIKUSUMA | 9C - ', '100.00', '01-11-2022'),
(26676, '4', 'ALIFYA TALICHI CAPRYANTI | 9C - ', '100.00', '01-11-2022'),
(26677, '4', 'DELA OKTAVIANI | 9C - DELA OKTAVIANI | 9C', '100.00', '01-11-2022'),
(26678, '4', 'MUHAMMAD WASHOYA FARNI PUTRA | 9C - ', '94.44', '01-11-2022'),
(26679, '4', 'APRILIANA SARTIKA BENSY | 9C - SELA | 9C', '94.44', '01-11-2022'),
(26680, '4', 'ZAHRA SALSABILA RAMADHINA | 9C - ', '94.44', '01-11-2022'),
(26681, '4', 'CINDY MUTIARA PUTRI SANDIRA | 9C - ', '94.44', '01-11-2022'),
(26682, '4', 'LAZUARDI FAHLEVI | 9C - PUPUT SUGIANTO | 9C', '94.44', '01-11-2022'),
(26683, '4', 'GUFA FAIRUZ AMALASA | 9C - FAREL PRATAMA | 9C', '83.33', '01-11-2022'),
(26684, '4', 'BADRIYAH | 9C - HELDI RAMANDA | 9C', '83.33', '01-11-2022'),
(26698, '3', 'Test | Test - ', '0.00', '01-11-2022'),
(27615, '3', 'SAIF TSABIT ASH SHUBHI | 8A - SENO ARYADI | 8A', '88.24', '01-11-2022'),
(27616, '3', 'GABRIEL DOS SAKTI | 8A - MUHAMMAD FADIL EPRIADI | 8A', '82.35', '01-11-2022'),
(27617, '3', 'JESICA APRILLI | 8A - ', '76.47', '01-11-2022'),
(27618, '3', 'ABDUL HAFIDZ MAULANA | 8A - ', '76.47', '01-11-2022'),
(27619, '3', 'TITA HESTILIYANA | 8A - ', '76.47', '01-11-2022'),
(27620, '3', 'MAHARANI AYUNINGTYAS | 8A - ELLO NUGROHO SAPUTRA | 8A', '76.47', '01-11-2022'),
(27621, '3', 'HARMANSYAH | 8A - ', '70.59', '01-11-2022'),
(27622, '3', 'MUHAMMAD HARDIANSYAH | 8A - UTIN KEYSA REGINA. A | 8A', '70.59', '01-11-2022'),
(27623, '3', 'SELLO RAIHAN RAMADHAN | 8A - ICHA MELLANI | 8A', '70.59', '01-11-2022'),
(27624, '3', 'RIDHO DHAVYANDRA | 8A - ', '64.71', '01-11-2022'),
(27625, '3', 'RIZQI WIDYARTO | 8A - EVA PUTRIANA | 8A', '64.71', '01-11-2022'),
(27626, '3', 'NADHIF AZZAHIR AZIZI | 8A - ', '58.82', '01-11-2022'),
(27627, '3', 'AZHURA MELLYSA | 8A - MUHAMMAD AZI FAHREYZA | 8A', '47.06', '01-11-2022'),
(27628, '3', 'MARVEL DIKA KURNIAWAN | 8A - ', '47.06', '01-11-2022'),
(27629, '3', 'RADITIA FIRMANSYAH | 8A - ', '47.06', '01-11-2022'),
(27630, '3', 'ADELINE TIRAI KHIRANA | 7A - UTIN CELSA IPALOVA | 8A', '41.18', '01-11-2022'),
(27631, '3', 'KAFILATUL ISLAMI | 8A - ', '41.18', '01-11-2022'),
(27632, '3', 'RINA ASTINA | 8A - ', '41.18', '01-11-2022'),
(27633, '3', 'DIERLY NUR PRAMUDYA | 8A - ', '35.29', '01-11-2022'),
(29011, '6', 'NAZWA FEBRIANI | 7C - BELNICLIN HERBEN | 7C', '80.00', '03-11-2022'),
(29012, '6', 'ALENA AILSA KHUZAIMAH | 7C - ANDREAS STEVEN | 7C', '80.00', '03-11-2022'),
(29013, '6', 'FAUZI AULIA FIRDAUS | 7C - WINNA VALENCIA | 7C', '80.00', '03-11-2022'),
(29014, '6', 'FADIL FITRAH SETIAWAN | 7C - TEGUH PRASETIONO | 7C', '76.00', '03-11-2022'),
(29015, '6', 'CHRISTIANO SATRIA BELEN\'T | 7C - MUHAMMAD AWANG | 7C', '72.00', '03-11-2022'),
(29016, '6', 'DIAN PERTIWI | 7C - ', '68.00', '03-11-2022'),
(29017, '6', 'KARUNIA AURYN PUTRI AULIA | 7C - ', '64.00', '03-11-2022'),
(29018, '6', 'SUSI SUSILAWATI | 7C - ', '60.00', '03-11-2022'),
(29019, '6', 'PETRUS SAKA AIR LANGGA | 7C - ', '60.00', '03-11-2022'),
(29020, '6', 'SALSA BIAN RIANTI | 7C - ', '60.00', '03-11-2022'),
(29021, '6', 'FAHRI PUTRA SANDINATA | 7C - ', '60.00', '03-11-2022'),
(29022, '6', 'RAVA ALBARI SIDIQ | 7C - ', '56.00', '03-11-2022'),
(29023, '6', 'REZA FAHRIYANTO | 7C - RIRIN RAMADANI | 7C', '56.00', '03-11-2022'),
(29024, '6', 'PUTRY AURA MAULIDYA | 7C - ', '56.00', '03-11-2022'),
(29025, '6', 'MULYA MURNI RIFANI | 7C - ', '56.00', '03-11-2022'),
(29026, '6', 'ANDRE CANDRA KUSUMA | 7C - ', '44.00', '03-11-2022'),
(29027, '6', 'FEBY RIANSYAH | 7C - ', '44.00', '03-11-2022'),
(29060, '3', 'Test | Test - ', '0.00', '03-11-2022'),
(30449, '3', 'ANDINI PUTRI MULYANI | 8B - IKHSAN FAKHRI | 8B', '82.35', '03-11-2022'),
(30450, '3', 'MUHAMMAD IQBAL | 8B - PRIYO DAMARJATI | 8B', '76.47', '03-11-2022'),
(30451, '3', 'FLORENCIUS VINCENT | 8B - CHINDI | 8B', '76.47', '03-11-2022'),
(30452, '3', 'REVALLINO KEVIN TARIGAS | 8B - ', '76.47', '03-11-2022'),
(30453, '3', 'THEA SALSABILLA PUTRI | 8B - DENIS ADITYA PRATAMA | 8B', '76.47', '03-11-2022'),
(30454, '3', 'RAPHA PARENDRA WAHYUDI | 8B - WIRA ADITYA HELAPRINANDA | 8B', '70.59', '03-11-2022'),
(30455, '3', 'AHMAD MUTAWAQQIL | 8B - ', '64.71', '03-11-2022'),
(30456, '3', 'FAVIAN GAVRA | 8B - ', '58.82', '03-11-2022'),
(30457, '3', 'KRESENSIA PUTRI AULIA | 8B - ', '58.82', '03-11-2022'),
(30458, '3', 'AKILA ALWINDI | 8B - ', '58.82', '03-11-2022'),
(30459, '3', 'APRILLIA NATASHA KUMANG | 8B - ', '58.82', '03-11-2022'),
(30460, '3', 'RENDI SAPUTRA | 8B - ', '52.94', '03-11-2022'),
(30461, '3', 'FITRI RAMADHANI | 8B - ', '52.94', '03-11-2022'),
(30462, '3', 'FERDY FERNANDO | 8B - ', '52.94', '03-11-2022'),
(30463, '3', 'BINTANG A. PRATAMA | 8B - ', '52.94', '03-11-2022'),
(30464, '3', 'HERAWATI | 8B - ', '52.94', '03-11-2022'),
(30465, '3', 'VIXION NG | 8B - AURELIA FADILA | 8B', '47.06', '03-11-2022'),
(30466, '3', 'RAYA OKTARIYANI | 8B - ', '41.18', '03-11-2022'),
(30467, '3', 'STEPANUS BAGAS | 8B - SISKA | 8B', '41.18', '03-11-2022'),
(30524, '3', 'ADELINE TIRAI KHIRANA | 7A - ', '0.00', '03-11-2022'),
(32128, '3', 'MUHAMMAD AKBAR | 8D - MESYA TRIANA SARI | 8D', '88.24', '03-11-2022'),
(32129, '3', 'KIBRIA VAN YUMNAA | 8D - KHAIRINNISA NATHANAELA | 8D', '88.24', '03-11-2022'),
(32130, '3', 'FERJI HALIM | 8D - ', '70.59', '03-11-2022'),
(32131, '3', 'HENGKY | 8D - ', '70.59', '03-11-2022'),
(32132, '3', 'AHMAD ALDIKA | 8D - ', '64.71', '03-11-2022'),
(32133, '3', 'HAFIZA DALILA PUTRI | 8D - ANGGUN C. SASMI | 8D', '58.82', '03-11-2022'),
(32134, '3', 'ZULVA SYAKILA | 8D - ', '58.82', '03-11-2022'),
(32135, '3', 'ANGGI PARAMITHA | 8D - ', '58.82', '03-11-2022'),
(32136, '3', 'FIERSYA ANDINI | 8D - ', '58.82', '03-11-2022'),
(32137, '3', 'REGINA BUNGA LESTARI | 8D - TIENU NENDAR RESTU | 8D', '52.94', '03-11-2022'),
(32138, '3', 'AURELIA MARTA TINTANG | 8D - RAISAN MUHAMMAD FADHILLAH | 8D', '47.06', '03-11-2022'),
(32139, '3', 'VARRA VICRYYA ZAINAL | 8D - ALVINXIE STEPANUS WILSON | 8D', '47.06', '03-11-2022'),
(32140, '3', 'ARIEF AL FAZRI | 8D - ', '47.06', '03-11-2022'),
(32141, '3', 'MARVEL JANUARDI | 8D - ', '47.06', '03-11-2022'),
(32142, '3', 'MANDALA ADI KUSUMA | 8D - ', '47.06', '03-11-2022'),
(32143, '3', 'NOVIANA RESTI PUTRI PRATAMA | 8D - ', '35.29', '03-11-2022'),
(32144, '3', 'AGSA PUTRA BIANTORO | 8D - ', '35.29', '03-11-2022'),
(32145, '3', 'RAMADANI | 8D - ', '17.65', '03-11-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator_rencana_belajar`
--

CREATE TABLE `indikator_rencana_belajar` (
  `id_indikator` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `indikator` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `indikator_rencana_belajar`
--

INSERT INTO `indikator_rencana_belajar` (`id_indikator`, `kategori`, `indikator`) VALUES
(1, 'Kegiatan Pendahuluan', 'Menyiapkan Peserta Didik'),
(2, 'Kegiatan Pendahuluan', 'Melakukan Apresiasi'),
(3, 'Kegiatan Pendahuluan', 'Menjelaskan KD dan Tujuan Pembelajaran'),
(4, 'Kegiatan Pendahuluan', 'Menyampaikan Cakupan Materi dan Penjelasan Kegiatan Sesuai Silabus'),
(5, 'Kegiatan Pendahuluan', 'Penampilan Guru'),
(6, 'Kegiatan Inti Pembelajaran ( Eksplorasi )', 'Melibatkan Siswa Mencari Informasi dari Aneka Sumber Belajar'),
(7, 'Kegiatan Inti Pembelajaran ( Eksplorasi )', 'Menggunakan beragam pendekatan Pembelajaran , Media Pembelajaran dan Sumber Belajar Lainya'),
(8, 'Kegiatan Inti Pembelajaran ( Eksplorasi )', 'Memfasilitasi terjadi interaksi Antar Siswa dengan Guru ( Tanya Jawab )'),
(9, 'Kegiatan Inti Pembelajaran ( Eksplorasi )', 'Melibatkan siswa aktif dalam Kegiatan Pembelajaran'),
(10, 'Kegiatan Inti Pembelajaran ( Eksplorasi )', 'Memfasilitasi Siswa melakukan percobaan'),
(11, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Membiasakan Siswa membaca dan Menulis'),
(12, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Memfasilitasi Siswa melalui tugas untuk memunculkan gagasn'),
(13, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Memberi Kesempatan siswa berpikir Menganalisa , menyelesaikan masalah dan bertindak tanpa rasa takut'),
(14, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Fasilitasi Siswa dalam kegiatan Kooperatif dan Kolaboratif'),
(15, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Memfasilitasi siswa berkompentensi Secara Sehat'),
(16, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Memfasilitasi Siswa membuat laporan eksplorasi baik secara lisan , individu atau kelompok'),
(17, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Memfasilitasi Siswa menyajikan hasil kinerja secara individu atau kelompok'),
(18, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Memfasilitasi siswa melakukan pameran dari Produk yang di hasilkan'),
(19, 'Kegiatan Inti Pembelajaran ( Elaborasi )', 'Memfasilitasi siswa melakukan kegitan yang menumbuhkan kebanggan  dan rasa percaya diri'),
(20, 'Kegiatan Inti Pembelajaran ( Konfirmasi )', 'Memberikan Umpan Balik Positif dan penguatan dalam bentuk Lisan , Tulisan dan hadian Kepada SIswa'),
(21, 'Kegiatan Inti Pembelajaran ( Konfirmasi )', 'Memberikan Konfirmasi terhadap hasil ekslplorasi dan Elaborasi melalui berbagai sumber'),
(22, 'Kegiatan Inti Pembelajaran ( Konfirmasi )', 'Memfasilitasi siswa untuk melakukan refleksi  Untuk memperoleh pengalaman belajar'),
(23, 'Kegiatan Inti Pembelajaran ( Konfirmasi )', 'Berfungsi sebagai narasumber dalam menjawab pertanyaan siswa'),
(24, 'Kegiatan Inti Pembelajaran ( Konfirmasi )', 'Memberikan Motivasi kepada siswa yang kurang aktif'),
(25, 'Penutup', 'Membuat rangkuman atau simpulan'),
(26, 'Penutup', 'Melakukan penilain dan atau refleksi terhadap kegiatan pembelajarna'),
(27, 'Penutup', 'memberikan tugas'),
(28, 'Penutup', 'Menyampaikan materi pertemuan selanjutnya');

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
(1, 'rencana_pembelajaran', 22, '<p>-</p>', 1, 999999999);

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
(16, 4, 'Konten Pembelajaran', '<p>-</p>', '14 Content Pembelajaran.pdf'),
(17, 3, 'LAN VS WIFI', '<p>-</p>', '13 LAN VS Wifi.pdf'),
(18, 6, 'Manajemen File Windows', '<p>-</p>', '15 Manajemen File.pdf'),
(19, 4, 'Menu Pada Website', '<p>-</p>', '15 Menu Pada Website.pdf'),
(20, 3, 'Akses Internet', '<p>-</p>', '14 Akses Internet.pdf'),
(21, 6, 'Ms Excel / Gsheet', '<p>-</p>', '15 ms excel gsheet .pdf'),
(22, 5, 'Materi Test', '<p>-</p>', '15 Manajemen File(1).pdf');

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
-- Struktur dari tabel `minat_siswa`
--

CREATE TABLE `minat_siswa` (
  `id_minat_siswa` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `emosi` varchar(255) NOT NULL,
  `harapan` text NOT NULL,
  `level` text NOT NULL,
  `kesiapan` text NOT NULL,
  `minat` text NOT NULL,
  `tgl` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `minat_siswa`
--

INSERT INTO `minat_siswa` (`id_minat_siswa`, `nama`, `emosi`, `harapan`, `level`, `kesiapan`, `minat`, `tgl`) VALUES
(1, 'ALIFYA TALICHI CAPRYANTI | 9C - ', 'senyum', 'bisa \"mengerti banyak hal\"', '1', 'ya begitu lah', 'nonton', '01-11-2022'),
(2, 'FAHRI SYAHPUTRA | 9C - ', 'senyum', 'biar pintar', '1', 'sangat siap', 'main game', '01-11-2022'),
(3, 'ADELINE TIRAI KHIRANA | 7A - ', 'senyum', 'menjadi lebih baik', '1', 'sangat siap', 'kobo kanaeru', '01-11-2022'),
(4, 'FARHAN MANDALA | 9C - ', 'malu', 'senang', '1', '10000%', 'olahhraga', '01-11-2022'),
(5, 'CANTIKA DWI MELATI | 9C - CRISSA AUREL SYABILA | 9C', 'sedih', 'tidak tau', '1', '100%', 'tidak tau', '01-11-2022'),
(6, 'RASYA EMERALDY HUTAMA | 9C - ', 'sedih', 'mendapatkan ilmu dan bisa banyak pengetahuan', '1', 'sangat siap', 'bermain game online', '01-11-2022'),
(7, 'JEM THOMAS | 9C - ', 'senyum', 'Menjadi lebih baik', '1', 'sangat siap', 'Kobo kanaeru', '01-11-2022'),
(8, 'KEYSA IZZA ISNA AULIA | 9C - ', 'senyum', 'bisa mudah dimengerti', '2', 'siap', 'main', '01-11-2022'),
(9, 'CHRISTIAN PRADIKA DWIKUSUMA | 9C - ', 'senyum', 'mengetahui pembelajaran lebih dalam', '2', 'sangat siap', 'kobo kanaeru (2D)', '01-11-2022'),
(10, 'LAZUARDI FAHLEVI | 9C - PUPUT SUGIANTO | 9C', 'marah', 'tidak ada', '2', 'tidak', 'turu', '01-11-2022'),
(11, 'DELA OKTAVIANI | 9C - DELA OKTAVIANI | 9C', 'senyum', 'biar pintar', '2', 'sangat siap', 'membaca', '01-11-2022'),
(12, 'GALIH DIVHANTARA | 9C - ', 'senyum', 'menambah ilmu pengetahuan', '2', 'sangat siap', 'belajar', '01-11-2022'),
(13, 'MOZZA AMELIA | 9C - ', 'marah', 'biar pintar', '2', 'siap', 'bermain HP', '01-11-2022'),
(14, 'APRILIANA SARTIKA BENSY | 9C - SELA | 9C', 'senyum', 'berhasil praktek', '2', 'tidak terlalu', 'tidur', '01-11-2022'),
(15, 'CINDY MUTIARA PUTRI SANDIRA | 9C - ', 'senyum', 'mencari ilmu yang lebih banyak', '2', 'siap', 'bermain dan bljar', '01-11-2022'),
(16, 'MUHAMMAD WASHOYA FARNI PUTRA | 9C - ', 'senyum', 'belajr dengan lancar', '2', 'sangat siap', 'bermain', '01-11-2022'),
(17, 'CINTA INDAH SAFITRI | 9C - CRISSA JUMEIKA | 9C', 'senyum', 'untuk menambah pengetahuan TIK', '2', '100%', 'Tidur dan baca AU', '01-11-2022'),
(18, 'BADRIYAH | 9C - HELDI RAMANDA | 9C', 'senyum', 'untuk mencari informasi tik', '2', '100%', 'membantu orang', '01-11-2022'),
(19, 'ZAHRA SALSABILA RAMADHINA | 9C - ', 'nangis', 'Biar sukses', '2', 'siap', 'Main game', '01-11-2022'),
(20, 'GUFA FAIRUZ AMALASA | 9C - FAREL PRATAMA | 9C', 'sedih', 'noi', '3', 'no', 'pjok', '01-11-2022'),
(21, 'Test | Test - ', 'senyum', '-', '2', '-', '-', '01-11-2022'),
(22, 'UTIN CELSA IPALOVA | 8A - ', 'senyum', '-', '1', '-', '-', '01-11-2022'),
(23, 'DIERLY NUR PRAMUDYA | 8A - ', 'nangis', '-', '1', '-', '-', '01-11-2022'),
(24, 'RIDHO DHAVYANDRA | 8A - ', 'sedih', '-', '1', '-', '-', '01-11-2022'),
(25, 'HARMANSYAH | 8A - ', 'senyum', 'mendapat kan ilmu', '1', 'disiplin', 'olahraga', '01-11-2022'),
(26, 'KAFILATUL ISLAMI | 8A - ', 'senyum', '-', '1', '-', '-', '01-11-2022'),
(27, 'RADITIA FIRMANSYAH | 8A - ', 'marah', '-', '1', '-', '-', '01-11-2022'),
(28, 'SELLO RAIHAN RAMADHAN | 8A - ICHA MELLANI | 8A', 'senyum', '-', '1', '-', '-', '01-11-2022'),
(29, 'MUHAMMAD HARDIANSYAH | 8A - UTIN KEYSA REGINA. A | 8A', 'senyum', '-', '1', '-', '-', '01-11-2022'),
(30, 'MARVEL DIKA KURNIAWAN | 8A - ', 'marah', '-', '1', '-', '-', '01-11-2022'),
(31, 'RINA ASTINA | 8A - ', 'senyum', '-', '1', '-', '-', '01-11-2022'),
(32, 'GABRIEL DOS SAKTI | 8A - MUHAMMAD FADIL EPRIADI | 8A', 'ketawa', '-', '1', '-', '-', '01-11-2022'),
(33, 'ABDUL HAFIDZ MAULANA | 8A - ', 'malu', 'mendapatkan ilmu', '2', 'sedang', 'main', '01-11-2022'),
(34, 'NADHIF AZZAHIR AZIZI | 8A - ', 'sedih', 'Semoga cepat pintar', '2', 'Sangat siap', 'Bermain Game', '01-11-2022'),
(35, 'TITA HESTILIYANA | 8A - ', 'ketawa', 'agar bisa mendapat ilmu TIK lebih banyak', '1', 'siap banget', 'mendengarkan musik', '01-11-2022'),
(36, 'AZHURA MELLYSA | 8A - MUHAMMAD AZI FAHREYZA | 8A', 'malu', '-', '1', '-', '-', '01-11-2022'),
(37, 'RIZQI WIDYARTO | 8A - RIZQI WIDYARTO | 8A', 'marah', '-', '1', '-', '-', '01-11-2022'),
(38, 'JESICA APRILLI | 8A - ', 'sedih', '-', '1', '-', '-', '01-11-2022'),
(39, 'MAHARANI AYUNINGTYAS | 8A - ELLO NUGROHO SAPUTRA | 8A', 'malu', 'BIAR PINTAR!!!!!!', '2', 'HOOH', 'MAIN ML SAMPE MYTICH', '01-11-2022'),
(40, 'SENO ARYADI | 8A - SAIF TSABIT ASH SHUBHI | 8A', 'senyum', 'Bisa jadi hacker', '2', 'Sangat siap', 'Tidok mandik makan', '01-11-2022'),
(41, 'ADELINE TIRAI KHIRANA | 7A - UTIN CELSA IPALOVA | 8A', 'senyum', 'agar mendapat ilmu', '2', 'sangat siap', 'belajar', '01-11-2022'),
(42, 'RIZQI WIDYARTO | 8A - EVA PUTRIANA | 8A', 'ketawa', 'agar pintar', '2', '100%', 'makan', '01-11-2022'),
(43, 'SAIF TSABIT ASH SHUBHI | 8A - SENO ARYADI | 8A', 'malu', 'Maok jadi hacker meretas Kirim rudal ke rumah seno', '3', 'udah', 'makan tidok', '01-11-2022'),
(44, 'DIERLY NUR PRAMUDYA | 8A - ', 'nangis', 'senang', '1', 'siap', 'game', '03-11-2022'),
(45, 'KAFILATUL ISLAMI | 8A - ', 'senyum', 'berharap agar mudah memahami pelajaran hari ini', '1', '99', 'bermain', '03-11-2022'),
(46, 'RADITIA FIRMANSYAH | 8A - ', 'marah', 'bagus', '1', 'siap', 'main slot', '03-11-2022'),
(47, 'RINA ASTINA | 8A - ', 'senyum', 'umtuk belajar', '1', '99', 'makan', '03-11-2022'),
(48, 'GABRIEL DOS SAKTI | 8A - MUHAMMAD FADIL EPRIADI | 8A', 'marah', 'supaya pintar', '1', 'siap', 'game', '03-11-2022'),
(49, 'TITA HESTILIYANA | 8A - ', 'ketawa', 'agar bisa mendapat ilmu TIK lebih banyak', '1', 'siap banget', 'mendengarkan musik', '03-11-2022'),
(50, 'Test | Test - ', 'senyum', '-', '1', '-', '-', '03-11-2022'),
(51, 'AHMAD IRWANDI | 7A - ', '-', '-', '1', '-', '-', '03-11-2022'),
(52, 'ANDRE WINATA | 7A - ', '-', '-', '1', '-', '-', '03-11-2022'),
(53, 'ASHIFA ZULIA AZZAHARA | 7A - ', '-', '-', '1', '-', '-', '03-11-2022'),
(54, 'ADELINE TIRAI KHIRANA | 7A - ', 'senyum', '-', '1', '-', '-', '03-11-2022'),
(55, 'UTIN CELSA IPALOVA | 8A - ', 'senyum', 'agar mendapat ilmu', '2', 'sangat siap', 'belajar', '03-11-2022'),
(56, 'RIDHO DHAVYANDRA | 8A - ', 'sedih', 'Semoga pintar TIK', '2', 'Siap banget', 'Game dan teman', '03-11-2022'),
(57, 'ABDUL HAFIDZ MAULANA | 8A - ', 'marah', 'banyak', '2', 'siap', 'main', '03-11-2022'),
(58, 'HARMANSYAH | 8A - ', 'senyum', 'belajar dengan benar', '2', 'sedang', 'oooolah raga', '03-11-2022'),
(59, 'NADHIF AZZAHIR AZIZI | 8A - ', 'sedih', 'Semoga cepat pintar', '2', 'Sangat siap', 'Bermain Game', '03-11-2022'),
(60, 'MUHAMMAD HARDIANSYAH | 8A - UTIN KEYSA REGINA. A | 8A', 'senyum', 'agar mendapatkan ilmu', '2', 'sangat siap', 'belajar', '03-11-2022'),
(61, 'MARVEL DIKA KURNIAWAN | 8A - ', 'marah', 'dapat nilai bagus', '2', 'shhaapp', 'main slot', '03-11-2022'),
(62, 'MAHARANI AYUNINGTYAS | 8A - ELLO NUGROHO SAPUTRA | 8A', 'malu', 'biar pintarrrrrrrrrrr', '2', 'sesiap mungkin chuy', 'main emel sama anak esempe', '03-11-2022'),
(63, 'AZHURA MELLYSA | 8A - MUHAMMAD AZI FAHREYZA | 8A', 'malu', 'biar pintar main komputer', '2', '100%', 'makan minum maen', '03-11-2022'),
(64, 'SENO ARYADI | 8A - SAIF TSABIT ASH SHUBHI | 8A', 'senyum', 'Bisa jadi hacker', '2', 'Sangat siap', 'Tidok mandik makan', '03-11-2022'),
(65, 'RIZQI WIDYARTO | 8A - RIZQI WIDYARTO | 8A', 'marah', 'agar pintar', '2', '100%', 'makan', '03-11-2022'),
(66, 'ADELINE TIRAI KHIRANA | 7A - UTIN CELSA IPALOVA | 8A', 'senyum', 'agar mendapat ilmu', '2', 'sangat siap', 'belajar', '03-11-2022'),
(67, 'RIZQI WIDYARTO | 8A - EVA PUTRIANA | 8A', 'ketawa', 'agar pintar', '2', '100%', 'makan', '03-11-2022'),
(68, 'SELLO RAIHAN RAMADHAN | 8A - ICHA MELLANI | 8A', 'senyum', 'mendapatkan lebih banyak ilmu', '3', 'sangat siap', 'makan', '03-11-2022'),
(69, 'JESICA APRILLI | 8A - ', 'malu', 'ndak tau', '3', 'ya siap siap aja', 'bernapas', '03-11-2022'),
(70, 'SAIF TSABIT ASH SHUBHI | 8A - SENO ARYADI | 8A', 'malu', 'Maok jadi hacker meretas Kirim rudal ke rumah seno', '3', 'udah', 'makan tidok', '03-11-2022'),
(71, 'RAVA ALBARI SIDIQ | 7C - ', 'sedih', 'sangat senang', '1', '100', 'main gema', '03-11-2022'),
(72, 'ALENA AILSA KHUZAIMAH | 7C - ANDREAS STEVEN | 7C', 'senyum', 'saya berharap agar saya mengerti tentang pembelajaran hari ini', '1', '100% Saya siap belajar hari ini', 'saya sangat suka menggambar', '03-11-2022'),
(73, 'NAZWA FEBRIANI | 7C - BELNICLIN HERBEN | 7C', 'nangis', 'biar bisa main ling di pc', '1', 'siap aja siiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'Maen mobile legends', '03-11-2022'),
(74, 'DIAN PERTIWI | 7C - ', 'ketawa', 'Agar lebih memahami cara menggunakan komputer', '1', 'Siappp sekaliiiiii', 'Bermain dan belajar', '03-11-2022'),
(75, 'SALSA BIAN RIANTI | 7C - ', 'ketawa', 'agar lebih memahami cara menggunakan komputer', '1', 'siaapppp sekaliiiii', 'bermain', '03-11-2022'),
(76, 'PUTRY AURA MAULIDYA | 7C - ', 'malu', 'agar lebih memahami cara menggunakan komputer', '1', 'siap sekali', 'belajar', '03-11-2022'),
(77, 'ADELINE TIRAI KHIRANA | 7A - ANDRE CANDRA KUSUMA | 7C', 'senyum', 'saya berharap saya ngerti pelajaran hari ini', '1', '100%saya sivcex', 'tbgrf r', '03-11-2022'),
(78, 'FADIL FITRAH SETIAWAN | 7C - TEGUH PRASETIONO | 7C', 'ketawa', 'agar bisa mengetahui komputer', '1', '100% siap', 'makanan', '03-11-2022'),
(79, 'REZA FAHRIYANTO | 7C - RIRIN RAMADANI | 7C', 'malu', 'saya berharap saya mengerti', '1', 'tipoithe', 'ghejo', '03-11-2022'),
(80, 'AHMAD IRWANDI | 7A - MULYA MURNI RIFANI | 7C', 'marah', 'ingin mngtahuii isi dlm komputer', '1', 'siapp', 'bljr', '03-11-2022'),
(81, 'CHRISTIANO SATRIA BELEN\'T | 7C - MUHAMMAD AWANG | 7C', 'ketawa', 'supaya jadi wakil presiden', '1', '100', 'erajat', '03-11-2022'),
(82, 'FAUZI AULIA FIRDAUS | 7C - WINNA VALENCIA | 7C', 'ketawa', '/', '1', '/', '/', '03-11-2022'),
(83, 'ANDRE CANDRA KUSUMA | 7C - ', 'senyum', 'saya berharap saya ngerti pelajaran tik', '1', '100%', 'suka', '03-11-2022'),
(84, 'MULYA MURNI RIFANI | 7C - ', 'malu', 'i', '1', '8', '0', '03-11-2022'),
(85, 'FEBY RIANSYAH | 7C - ', 'senyum', 'vjdsf', '1', 'gdokok', 'thf', '03-11-2022'),
(86, 'KARUNIA AURYN PUTRI AULIA | 7C - ', 'ketawa', 'Agar lebih memahami cara menggunakan komputer', '2', 'SIAP!!!!!!!', 'Bermain', '03-11-2022'),
(87, 'PETRUS SAKA AIR LANGGA | 7C - ', 'senyum', 'bisa belajar mengetik', '2', 'sampai selesai', 'makan', '03-11-2022'),
(88, 'SUSI SUSILAWATI | 7C - ', 'sedih', 'saya berharap agar saya mengerti tik', '2', 'siap lah', 'belajar', '03-11-2022'),
(89, 'FAHRI PUTRA SANDINATA | 7C - ', 'senyum', 'biar bisa belajar mengetik', '2', '99% siap', 'bermain game', '03-11-2022'),
(90, 'REVALLINO KEVIN TARIGAS | 8B - ', 'senyum', 'Agar bisa menggenal tentang komputer', '1', 'Sangat siap', 'Menonton anime,bermain hp dan bermain voli', '03-11-2022'),
(91, 'RENDI SAPUTRA | 8B - ', 'ketawa', 'agar bise mengenali komputer lebih dalam', '1', 'siap-siap saja!', 'menonton anime dan bermain game', '03-11-2022'),
(92, 'KRESENSIA PUTRI AULIA | 8B - ', 'senyum', 'Bisa memahami atau mendalami semua tentang komputer dan pada suatu saat saya bersekolah di SMK saya ingin mengambil jurusan RPL', '1', 'Sangat siap', 'Saya suka olahraga,seperti bermain badminton,voly,dan basket', '03-11-2022'),
(93, 'FAVIAN GAVRA | 8B - ', 'sedih', 'belajar', '1', 'sangat siap', 'bola,futsal,barber', '03-11-2022'),
(94, 'AURELIA FADILA | 8B - ', '-', '-', '1', '-', '-', '03-11-2022'),
(95, 'HERAWATI | 8B - ', 'malu', 'medapat belajar mengetik', '1', 'siapa sekali', 'main dokter', '03-11-2022'),
(96, 'APRILLIA NATASHA KUMANG | 8B - ', 'senyum', 'bisa belajar mengetik di komputer dan menjadi orang yang pintar', '1', 'sangat siap', 'mendengar kan musik', '03-11-2022'),
(97, 'RAPHA PARENDRA WAHYUDI | 8B - WIRA ADITYA HELAPRINANDA | 8B', 'senyum', 'agar apa yang kita tidak tahu bisa menjadi tahu', '2', 'sangat siap', 'berolahraga', '03-11-2022'),
(98, 'ANDINI PUTRI MULYANI | 8B - IKHSAN FAKHRI | 8B', 'senyum', 'mendapat kan ilmu baru ,', '2', 'sangat siap,', 'saya menghabiskan waktusaya sehari hari dengan membaca buku dan mempelajari ilmu baru.', '03-11-2022'),
(99, 'FITRI RAMADHANI | 8B - ', 'senyum', 'Mendapatkan pengetahuan atau mendalami kempoter agar SMK bisa.', '2', '100000000%', 'makan,tidok,maen hp and volly', '03-11-2022'),
(100, 'FERDY FERNANDO | 8B - ', 'ketawa', 'Bisa menjawab semua pertanyaan bu guru', '2', 'sangat siapp!', 'Bisa Bercanda Dengan Kawan Kawan', '03-11-2022'),
(101, 'MUHAMMAD IQBAL | 8B - PRIYO DAMARJATI | 8B', 'senyum', 'agar bisa memahami cara menggunakan komputer serta  cara memakai nya/', '2', 'sangat amat siap sampai PLN mematikan lampu', 'vo[i main hp makan tiduk', '03-11-2022'),
(102, 'THEA SALSABILLA PUTRI | 8B - DENIS ADITYA PRATAMA | 8B', 'senyum', 'Agar mudah untuk memahami nya dan mempelajari nya', '2', 'sangat siap.', 'bermain hp dan bermain game', '03-11-2022'),
(103, 'FLORENCIUS VINCENT | 8B - CHINDI | 8B', 'senyum', 'mendapatkan ilmu', '2', 'siap', 'belajar', '03-11-2022'),
(104, 'VIXION NG | 8B - AURELIA FADILA | 8B', 'marah', 'Ingin menjadi lebih pintar', '2', '50%', 'makan,main,dan tidur', '03-11-2022'),
(105, 'RAYA OKTARIYANI | 8B - ', 'senyum', 'hanya suka ke lab komputer saja', '2', 'siap', 'main', '03-11-2022'),
(106, 'STEPANUS BAGAS | 8B - SISKA | 8B', 'marah', 'mendapatkan ilmu pengtahuan', '2', 'siap', 'olahraga', '03-11-2022'),
(107, 'AKILA ALWINDI | 8B - ', 'senyum', 'Supaya agar menjadi orang yang pintar', '2', 'sangat siap', 'nonton anime', '03-11-2022'),
(108, 'AHMAD MUTAWAQQIL | 8B - ', 'senyum', 'supaya bisa mempelajari tentang matari matari!', '2', 'sekitar 70%', 'Main futsal,Maun hp,Main voli', '03-11-2022'),
(109, 'BINTANG A. PRATAMA | 8B - ', 'senyum', 'supaya tambah pintar.', '2', 'always ready.', 'workout,volley.', '03-11-2022'),
(110, 'KIBRIA VAN YUMNAA | 8D - KHAIRINNISA NATHANAELA | 8D', 'ketawa', 'semoga bisa belajar dengan benar', '1', 'siap sekali', 'belajar', '03-11-2022'),
(111, 'HAFIZA DALILA PUTRI | 8D - ANGGUN C. SASMI | 8D', 'senyum', '-', '1', '-', '-', '03-11-2022'),
(112, 'ARIEF AL FAZRI | 8D - ', 'ketawa', '-', '1', '-', '-', '03-11-2022'),
(113, 'FIERSYA ANDINI | 8D - ', 'senyum', 'Harapan saya agar dapat nilai.', '1', 'siap banget.', 'menari dan mendengar musik.', '03-11-2022'),
(114, 'MANDALA ADI KUSUMA | 8D - ', 'ketawa', 'bermain game', '1', '70% saja', 'bersenang senang', '03-11-2022'),
(115, 'AGSA PUTRA BIANTORO | 8D - ', 'ketawa', 'Harapan saya ingin mendapatkan ilmu yang lebih banyak tentang komputer', '1', 'sangat siap', 'olahraga', '03-11-2022'),
(116, 'NOVIANA RESTI PUTRI PRATAMA | 8D - ', 'nangis', '-', '1', '-', '-', '03-11-2022'),
(117, 'AURELIA MARTA TINTANG | 8D - RAISAN MUHAMMAD FADHILLAH | 8D', 'marah', '-', '1', '-', '-', '03-11-2022'),
(118, 'ZULVA SYAKILA | 8D - ', 'nangis', '-', '1', '-', '-', '03-11-2022'),
(119, 'VARRA VICRYYA ZAINAL | 8D - ALVINXIE STEPANUS WILSON | 8D', 'sedih', '-', '1', '-', '-', '03-11-2022'),
(120, 'MUHAMMAD AKBAR | 8D - MESYA TRIANA SARI | 8D', 'senyum', 'Saya harap bisa mahir mengetik dan bermain komputer', '2', 'Sangat siap', 'Bermain Game,Makan,Dan tidur', '03-11-2022'),
(121, 'HENGKY | 8D - ', 'ketawa', 'Bisa mendapatkan rezeki', '2', '70%', 'Masih bisa melihat orang tua', '03-11-2022'),
(122, 'ANGGI PARAMITHA | 8D - ', 'senyum', 'Nda ade, penting dapat nilai', '2', 'rating kesiapan nye 6,5/10', 'waktu main epep', '03-11-2022'),
(123, 'FERJI HALIM | 8D - ', 'ketawa', 'bisa jadi pintar', '2', 'siap 77%', 'tiduk', '03-11-2022'),
(124, 'REGINA BUNGA LESTARI | 8D - TIENU NENDAR RESTU | 8D', 'ketawa', 'agar tau materi hri ini', '2', 'sangat siap', 'random', '03-11-2022'),
(125, 'ICHA MELLANI | 8A - MARVEL JANUARDI | 8D', 'ketawa', 'baik', '1', '65%', 'bermain sepua puas nya', '03-11-2022'),
(126, 'RAMADANI | 8D - ', 'ketawa', 'ilmu', '1', 'siap sekali', 'makan', '03-11-2022'),
(127, 'AHMAD ALDIKA | 8D - ', 'marah', 'Bisa bermain komputer', '2', '80%', 'Main bola', '03-11-2022'),
(128, 'MARVEL JANUARDI | 8D - ', 'ketawa', 'jjh', '2', 'njnj', 'jnjnj', '03-11-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(100) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `tempat_kerja` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `nama_guru`, `tempat_kerja`, `logo`) VALUES
(1, 'Muhammad Ullil Fahri', 'SMP 5 Ketapang', 'tut-wuri-handayani-ftrd-image-removebg-preview-removebg-preview.png');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana_pembelajaran`
--

CREATE TABLE `rencana_pembelajaran` (
  `id_rencana_pembelajaran` int(100) NOT NULL,
  `id_indikator` int(100) NOT NULL,
  `id_materi` int(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `waktu` int(100) NOT NULL,
  `tampilkan` int(100) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rencana_pembelajaran`
--

INSERT INTO `rencana_pembelajaran` (`id_rencana_pembelajaran`, `id_indikator`, `id_materi`, `kegiatan`, `waktu`, `tampilkan`, `judul`) VALUES
(1, 1, 22, '<p>Silahkan anda Siapkan Bahan dan Materi Sebelum Kita Mulai</p>', 3, 0, 'Persiapan Peserta Didik'),
(2, 2, 22, '<p>Apa itu Komputer ?</p>', 3, 0, 'Apresiasi'),
(3, 3, 22, '<p>KD Kita ?</p>\r\n\r\n<p>Tujuan hari ini ?</p>', 3, 0, 'TUjuan Pembelajaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(100) NOT NULL,
  `nama` text NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `kelas`) VALUES
(1, 'ADELINE TIRAI KHIRANA', '7A'),
(2, 'AHMAD IRWANDI', '7A'),
(3, 'ALIZHA ADHELIA PUTRI', '7A'),
(4, 'ANDRE WINATA', '7A'),
(5, 'ARISKA MALINDA', '7A'),
(6, 'ASHIFA ZULIA AZZAHARA', '7A'),
(7, 'BRAMASTA IRWANDI PUTRA', '7A'),
(8, 'CINDY AMELIA', '7A'),
(9, 'DESVITA LISA', '7A'),
(10, 'DOMINIKUS', '7A'),
(11, 'FAJAR NAFASYA', '7A'),
(12, 'FATRIANSYAH', '7A'),
(13, 'HANA SALSABILA', '7A'),
(14, 'MISKA FITRIYANI', '7A'),
(15, 'MUHAMMAD ALIBA SAPUTRA', '7A'),
(16, 'MUHAMMAD CHAIRIL HABIBI', '7A'),
(17, 'MUHAMMAD SATRIO AKBAR', '7A'),
(18, 'RAFFI KURNIAWAN', '7A'),
(19, 'SETIANA', '7A'),
(20, 'SIHFA HELENA', '7A'),
(21, 'SRI WULANDARI', '7A'),
(22, 'SYAFIRA BILQIS RAMADHANI', '7A'),
(23, 'TAUFIQ QURRAHMAN', '7A'),
(24, 'UTI MUHAMMAD FAQIH', '7A'),
(25, 'Egy Saputra', '7A'),
(26, 'WISNU WINATA', '7A'),
(27, 'ADE ADRILIAN', '7B'),
(28, 'ANGELLITA RAHMADANI', '7B'),
(29, 'CIKA FEBRIYANTI', '7B'),
(30, 'DIVA AURELIA RUMBIAK', '7B'),
(31, 'DWIKA AZZAAM RAHMANTIO', '7B'),
(32, 'FADLI ADITYA', '7B'),
(33, 'FALIANSIA', '7B'),
(34, 'FEBRI MUHAMMAD ILHAM', '7B'),
(35, 'GUAN ARIANTO', '7B'),
(36, 'IRFAN MAULANA', '7B'),
(37, 'LETICIA CITRA NATASHA', '7B'),
(38, 'LILY RAMADANI', '7B'),
(39, 'M. FARID AL MUZAKI', '7B'),
(40, 'MUHAMMAD RAFEL PERNANDO', '7B'),
(41, 'MUHAMMAD HAIKAL', '7B'),
(42, 'MUHAMMAD TAUFAN AFRILLIO', '7B'),
(43, 'NOVAL SAFIQ AL-HAFIS', '7B'),
(44, 'REHAN ANDREAN', '7B'),
(45, 'REVA SUNANDRY', '7B'),
(46, 'REZA ASSYFA', '7B'),
(47, 'RINDU', '7B'),
(48, 'SANTRI HARUMI', '7B'),
(49, 'VENISIA FRANSISKA', '7B'),
(50, 'YENI TANIA', '7B'),
(51, 'ALENA AILSA KHUZAIMAH', '7C'),
(52, 'ANDRE CANDRA KUSUMA', '7C'),
(53, 'ANDREAS STEVEN', '7C'),
(54, 'BELNICLIN HERBEN', '7C'),
(55, 'CHRISTIANO SATRIA BELEN\'T', '7C'),
(56, 'DIAN PERTIWI', '7C'),
(57, 'FADIL FITRAH SETIAWAN', '7C'),
(58, 'FAHRI PUTRA SANDINATA', '7C'),
(59, 'FAUZI AULIA FIRDAUS', '7C'),
(60, 'FEBY RIANSYAH', '7C'),
(61, 'JUMI', '7C'),
(62, 'KARUNIA AURYN PUTRI AULIA', '7C'),
(63, 'MUHAMMAD AWANG', '7C'),
(64, 'MULYA MURNI RIFANI', '7C'),
(65, 'NAZWA FEBRIANI', '7C'),
(66, 'PETRUS SAKA AIR LANGGA', '7C'),
(67, 'PUTRY AURA MAULIDYA', '7C'),
(68, 'RAVA ALBARI SIDIQ', '7C'),
(69, 'REZA FAHRIYANTO', '7C'),
(70, 'RIRIN RAMADANI', '7C'),
(71, 'SALSA BIAN RIANTI', '7C'),
(72, 'SAPARIYAH PURNAMA SARI', '7C'),
(73, 'SUSI SUSILAWATI', '7C'),
(74, 'TEGUH PRASETIONO', '7C'),
(75, 'WINNA VALENCIA', '7C'),
(76, 'ABDUL HERMAWAN', '7D'),
(77, 'ACHMAD RAZZAN FIRZATULLAH', '7D'),
(78, 'AJENG NOVIYANTI', '7D'),
(79, 'AJI WAHYU HANDAYANI', '7D'),
(80, 'ASTAJID LAKUM', '7D'),
(81, 'DAMIANUS VALENTINO TIO', '7D'),
(82, 'DIFA AKBAR RAMADHAN', '7D'),
(83, 'DOMINIKUS CHANDRA VALESCHA', '7D'),
(84, 'FADHIL NURUL HUDA', '7D'),
(85, 'FAZIA PUTRI', '7D'),
(86, 'FEBBI INDRIANI', '7D'),
(87, 'GRACELLA  PUTRI', '7D'),
(88, 'M. SAHID SAPUTRA', '7D'),
(89, 'MEYLANNIE PUTRI AULIA', '7D'),
(90, 'PUTRI KANAYA RAHMA  DANI', '7D'),
(91, 'RADIT HERLINDO', '7D'),
(92, 'RANDIKA PUTRA ADHI PRATAMA', '7D'),
(93, 'RESTI YULIANA', '7D'),
(94, 'RICO SANJAYA OWEN', '7D'),
(95, 'SELVIANA', '7D'),
(96, 'SILPA', '7D'),
(97, 'TEDI MULYADI', '7D'),
(98, 'THERISIA OLIVE PEBRIYANTI MAGDALENA NAIBAHO', '7D'),
(99, 'ULFIANTI DWI SANDIKA', '7D'),
(100, 'ZIKRA ZAINAL', '7D'),
(101, 'ABDUL HAFIDZ MAULANA', '8A'),
(102, 'AZHURA MELLYSA', '8A'),
(103, 'DIERLY NUR PRAMUDYA', '8A'),
(104, 'ELLO NUGROHO SAPUTRA', '8A'),
(105, 'EVA PUTRIANA', '8A'),
(106, 'GABRIEL DOS SAKTI', '8A'),
(107, 'GUSTI VIRDAUS HERLAMBANG', '8A'),
(108, 'HARMANSYAH', '8A'),
(109, 'ICHA MELLANI', '8A'),
(110, 'JESICA APRILLI', '8A'),
(111, 'KAFILATUL ISLAMI', '8A'),
(112, 'MAHARANI AYUNINGTYAS', '8A'),
(113, 'MARVEL DIKA KURNIAWAN', '8A'),
(114, 'MUHAMMAD AZI FAHREYZA', '8A'),
(115, 'MUHAMMAD FADIL EPRIADI', '8A'),
(116, 'MUHAMMAD HARDIANSYAH', '8A'),
(117, 'TITA HESTILIYANA', '8A'),
(118, 'UTIN CELSA IPALOVA', '8A'),
(119, 'UTIN KEYSA REGINA. A', '8A'),
(120, 'RADITIA FIRMANSYAH', '8A'),
(121, 'RIDHO DHAVYANDRA', '8A'),
(122, 'RINA ASTINA', '8A'),
(123, 'RIZQI WIDYARTO', '8A'),
(124, 'SAIF TSABIT ASH SHUBHI', '8A'),
(125, 'SELLO RAIHAN RAMADHAN', '8A'),
(126, 'NADHIF AZZAHIR AZIZI', '8A'),
(127, 'SENO ARYADI', '8A'),
(128, 'AHMAD MUTAWAQQIL', '8B'),
(129, 'AKILA ALWINDI', '8B'),
(130, 'ANDINI PUTRI MULYANI', '8B'),
(131, 'APRILLIA NATASHA KUMANG', '8B'),
(132, 'AURELIA FADILA', '8B'),
(133, 'BINTANG A. PRATAMA', '8B'),
(134, 'CHINDI', '8B'),
(135, 'DENIS ADITYA PRATAMA', '8B'),
(136, 'FERDY FERNANDO', '8B'),
(137, 'FITRI RAMADHANI', '8B'),
(138, 'FLORENCIUS VINCENT', '8B'),
(139, 'HERAWATI', '8B'),
(140, 'IKHSAN FAKHRI', '8B'),
(141, 'KRESENSIA PUTRI AULIA', '8B'),
(142, 'MUHAMMAD IQBAL', '8B'),
(143, 'NUR HAYATI', '8B'),
(144, 'PRIYO DAMARJATI', '8B'),
(145, 'RAPHA PARENDRA WAHYUDI', '8B'),
(146, 'RAYA OKTARIYANI', '8B'),
(147, 'RENDI SAPUTRA', '8B'),
(148, 'REVALLINO KEVIN TARIGAS', '8B'),
(149, 'SISKA', '8B'),
(150, 'STEPANUS BAGAS', '8B'),
(151, 'THEA SALSABILLA PUTRI', '8B'),
(152, 'VIXION NG', '8B'),
(153, 'WIRA ADITYA HELAPRINANDA', '8B'),
(154, 'FAVIAN GAVRA', '8B'),
(155, 'ANGGITA SRI SAHRUNI', '8C'),
(156, 'ADITIO PRATAMA', '8C'),
(157, 'AZIZAH SAFITRI', '8C'),
(158, 'BESALDO', '8C'),
(159, 'DECHA ABIEGAIL AURLIA BUNGA', '8C'),
(160, 'EKSEL ALBERGUNA HUTAGALUNG', '8C'),
(161, 'FAHRIYANSYAH', '8C'),
(162, 'FAZIL FABIAN', '8C'),
(163, 'HERONIMUS WANDO', '8C'),
(164, 'INAYAH MELBA LIATI.S', '8C'),
(165, 'MEYLANI SAPUTRI', '8C'),
(166, 'MUHAMMAD HERDIANSYAH', '8C'),
(167, 'MUHAMAD PAOL', '8C'),
(168, 'MUHAMMAD REIHAN', '8C'),
(169, 'NAJLA SHYFA DEWI', '8C'),
(170, 'NANDA RIZKY DWI SAPUTRA', '8C'),
(171, 'NAUFAL PUTRA ABDI', '8C'),
(172, 'NAZIFA AGINA', '8C'),
(173, 'RENDI NOPIANDI', '8C'),
(174, 'RISWANDY ALFARIZI', '8C'),
(175, 'RENGGA HERNANDI', '8C'),
(176, 'SALSABILA HANDAYANI', '8C'),
(177, 'SELVI', '8C'),
(178, 'TIFFANY AURELLIA', '8C'),
(179, 'YOHANES DENIS SAPUTRA', '8C'),
(180, 'SULTAN HILMI AL\'AZZAM', '8C'),
(181, 'PELANGI AFRILLIANA', '8C'),
(182, 'AHMAD ALDIKA', '8D'),
(183, 'ALVINXIE STEPANUS WILSON', '8D'),
(184, 'AGSA PUTRA BIANTORO', '8D'),
(185, 'ANGGI PARAMITHA', '8D'),
(186, 'ANGGUN C. SASMI', '8D'),
(187, 'ARIEF AL FAZRI', '8D'),
(188, 'AURELIA MARTA TINTANG', '8D'),
(189, 'FERJI HALIM', '8D'),
(190, 'FIERSYA ANDINI', '8D'),
(191, 'FITRA PAREZA AKBAR', '8D'),
(192, 'HAFIZA DALILA PUTRI', '8D'),
(193, 'HENGKY', '8D'),
(194, 'KHAIRINNISA NATHANAELA', '8D'),
(195, 'KIBRIA VAN YUMNAA', '8D'),
(196, 'MANDALA ADI KUSUMA', '8D'),
(197, 'MARVEL JANUARDI', '8D'),
(198, 'MESYA TRIANA SARI', '8D'),
(199, 'MUHAMMAD AKBAR', '8D'),
(200, 'NOVIANA RESTI PUTRI PRATAMA', '8D'),
(201, 'RAISAN MUHAMMAD FADHILLAH', '8D'),
(202, 'RAMADANI', '8D'),
(203, 'REGINA BUNGA LESTARI', '8D'),
(204, 'TAUFIK QUROHMAN', '8D'),
(205, 'TIENU NENDAR RESTU', '8D'),
(206, 'UTIN ZEERA ASYAINA', '8D'),
(207, 'VARRA VICRYYA ZAINAL', '8D'),
(208, 'ZULVA SYAKILA', '8D'),
(209, 'ADE SURIANTO AKBAR', '9A'),
(210, 'AGUSTINA HELEN', '9A'),
(211, 'ALYA ZAHIRA', '9A'),
(212, 'AMANDA', '9A'),
(213, 'ANDRA DIKA SAPUTRA', '9A'),
(214, 'ANDRA SIAMA RAMADAN', '9A'),
(215, 'ARI WAHYUDI', '9A'),
(216, 'ARYA DWI PANGGA', '9A'),
(217, 'CRISTIA', '9A'),
(218, 'CHRISTOFORUS REHAN', '9A'),
(219, 'DWI MAISYA PUTRA', '9A'),
(220, 'DERIANUS EKI', '9A'),
(221, 'DERIA YUDIT', '9A'),
(222, 'DIMAS   PRATAMA', '9A'),
(223, 'FATRA TRI YUDISTIRA', '9A'),
(224, 'FRANSISKA REVI MARISKA', '9A'),
(225, 'GIANT ABDUL HANIF', '9A'),
(226, 'MAULINDA', '9A'),
(227, 'MUHAMMAD DAVIQ HIDAYATULLAH', '9A'),
(228, 'NOVI DWI RAHMA', '9A'),
(229, 'PUTRI OKTAVIANI', '9A'),
(230, 'RILVA AFIKA RESKI', '9A'),
(231, 'ROBERTUS KALVIN', '9A'),
(232, 'SATRIO', '9A'),
(233, 'SHINTA DEWI', '9A'),
(234, 'SISKA ARYANTI', '9A'),
(235, 'Azzahra', '9A'),
(236, 'SUHERMAN', '9A'),
(237, 'AJI FATKHURROHMAN', '9B'),
(238, 'AI JUN', '9B'),
(239, 'ANDIKA', '9B'),
(240, 'AUDIA FUTRIANI', '9B'),
(241, 'DEVON SATRIO PUTRA', '9B'),
(242, 'DIVA ILMIYANI', '9B'),
(243, 'DIYAS IRJARULI', '9B'),
(244, 'FARAH AZZURA', '9B'),
(245, 'HENI PURNAMASARI', '9B'),
(246, 'HERYANSYAH', '9B'),
(247, 'IBNU MUTTAQIEN', '9B'),
(248, 'KESSYA AMELYA NURAINI', '9B'),
(249, 'MARGARETHA NINA', '9B'),
(250, 'MAWALI', '9B'),
(251, 'MUHAMMAD FERDI', '9B'),
(252, 'NAILA RAMADANI', '9B'),
(253, 'NICIA INDRIANI', '9B'),
(254, 'NOVA ANGGRAINI', '9B'),
(255, 'OLIVIA', '9B'),
(256, 'RAISYA HIKMALIA ZAHRA', '9B'),
(257, 'RISKY PRATAMA', '9B'),
(258, 'SANDI KURNIA', '9B'),
(259, 'TIKA ANGGRAINI', '9B'),
(260, 'TUBAGUS ALI AKBAR', '9B'),
(261, 'RAMADDANI AKBAR', '9B'),
(262, 'RUNNICA NELLYSA NURHILDAYANTI', '9B'),
(263, 'Fadilah Nazril', '9B'),
(264, 'SIFA', '9B'),
(265, 'ADRIAN', '9C'),
(266, 'ALIFYA TALICHI CAPRYANTI', '9C'),
(267, 'APRILIANA SARTIKA BENSY', '9C'),
(268, 'BADRIYAH', '9C'),
(269, 'CANTIKA DWI MELATI', '9C'),
(270, 'CHRISTIAN PRADIKA DWIKUSUMA', '9C'),
(271, 'CRISSA JUMEIKA', '9C'),
(272, 'CINDY MUTIARA PUTRI SANDIRA', '9C'),
(273, 'CINTA INDAH SAFITRI', '9C'),
(274, 'CRISSA AUREL SYABILA', '9C'),
(275, 'DELA OKTAVIANI', '9C'),
(276, 'FAHRI SYAHPUTRA', '9C'),
(277, 'FAREL PRATAMA', '9C'),
(278, 'FARHAN MANDALA', '9C'),
(279, 'GALIH DIVHANTARA', '9C'),
(280, 'GUFA FAIRUZ AMALASA', '9C'),
(281, 'HELDI RAMANDA', '9C'),
(282, 'JEM THOMAS', '9C'),
(283, 'KEYSA IZZA ISNA AULIA', '9C'),
(284, 'LAZUARDI FAHLEVI', '9C'),
(285, 'MAHARANI BILQIS QHONIYUN AZANI', '9C'),
(286, 'MUHAMMAD WASHOYA FARNI PUTRA', '9C'),
(287, 'MOZZA AMELIA', '9C'),
(288, 'PUPUT SUGIANTO', '9C'),
(289, 'RASYA EMERALDY HUTAMA', '9C'),
(290, 'RODINHO CARLOS', '9C'),
(291, 'SELA', '9C'),
(292, 'ZAHRA SALSABILA RAMADHINA', '9C'),
(293, 'AFRIL LIYA ANDINI', '9D'),
(294, 'ANGELITA GALHO', '9D'),
(295, 'ALIF NURWAHID RAMADHANI', '9D'),
(296, 'ALIUNG', '9D'),
(297, 'AMBAR TRIANTORO', '9D'),
(298, 'ANANDA FADHILLAH SADEWA', '9D'),
(299, 'CHELSEA AGUSTIN', '9D'),
(300, 'DARLING ZHEHAN ZALINDRA', '9D'),
(301, 'DESI NATALIA SIREGAR', '9D'),
(302, 'FADHILUL UMAMI', '9D'),
(303, 'HENDRI APRIANDI', '9D'),
(304, 'MELISA', '9D'),
(305, 'MISLIA CAHYUNI', '9D'),
(306, 'MUCHAMMAD PARIL AL PAREGI', '9D'),
(307, 'MUHAMMAD SANDY PRASETYO', '9D'),
(308, 'MUHAMMAD REVALIZA AKBAR', '9D'),
(309, 'MUHAMMAD LUTFI', '9D'),
(310, 'NAZRA TUSYITA ROSA', '9D'),
(311, 'NURHALIMAH', '9D'),
(312, 'PUTRI JELITA', '9D'),
(313, 'RENO APREZA REVANDA', '9D'),
(314, 'RIFKI ATTAMIMI', '9D'),
(315, 'TIARA', '9D'),
(316, 'THOMAS DERLY HERBEN', '9D'),
(317, 'URAY RASYA PRATAMA', '9D'),
(318, 'UTI MUHAMMAD FARHAN', '9D'),
(319, 'YUNIKA NUR FADHILAH HARYANTO', '9D'),
(320, 'YUSRINA AZKA NOVIA', '9D'),
(321, 'Test', 'Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor_ulangan`
--

CREATE TABLE `skor_ulangan` (
  `id_skor_ulangan` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `skor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'ADELINE TIRAI KHIRANA | 7A - ');

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
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

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
-- Indeks untuk tabel `indikator_rencana_belajar`
--
ALTER TABLE `indikator_rencana_belajar`
  ADD PRIMARY KEY (`id_indikator`);

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
-- Indeks untuk tabel `minat_siswa`
--
ALTER TABLE `minat_siswa`
  ADD PRIMARY KEY (`id_minat_siswa`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `rencana_pembelajaran`
--
ALTER TABLE `rencana_pembelajaran`
  ADD PRIMARY KEY (`id_rencana_pembelajaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

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
  MODIFY `id_data_peserta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `history_ulangan`
--
ALTER TABLE `history_ulangan`
  MODIFY `id_history_ulangan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32146;

--
-- AUTO_INCREMENT untuk tabel `indikator_rencana_belajar`
--
ALTER TABLE `indikator_rencana_belajar`
  MODIFY `id_indikator` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `live`
--
ALTER TABLE `live`
  MODIFY `id_live` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `minat_siswa`
--
ALTER TABLE `minat_siswa`
  MODIFY `id_minat_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rencana_pembelajaran`
--
ALTER TABLE `rencana_pembelajaran`
  MODIFY `id_rencana_pembelajaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT untuk tabel `skor_ulangan`
--
ALTER TABLE `skor_ulangan`
  MODIFY `id_skor_ulangan` int(100) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_ulangan` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
