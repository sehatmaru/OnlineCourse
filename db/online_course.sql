-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 08:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `kisi`
--

CREATE TABLE IF NOT EXISTS `kisi` (
  `id_kisi` int(11) NOT NULL,
  `nama_kisi` varchar(300) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kisi`
--

INSERT INTO `kisi` (`id_kisi`, `nama_kisi`, `id_mapel`, `total`) VALUES
(3, 'UN', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`) VALUES
(1, 'Matematika'),
(6, 'DASPRO'),
(7, 'PAM'),
(8, 'PBO');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_ujian`, `id_user`, `nilai`) VALUES
(1, 5, 3, 30),
(2, 5, 4, 80),
(8, 7, 3, 27.27),
(9, 7, 4, 45.45);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` bigint(20) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `keterangan`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `pertanyaan` varchar(1000) NOT NULL,
  `opsi1` varchar(1000) NOT NULL,
  `opsi2` varchar(1000) NOT NULL,
  `opsi3` varchar(1000) NOT NULL,
  `opsi4` varchar(1000) NOT NULL,
  `jawaban` varchar(1000) NOT NULL,
  `id_ujian` int(11) DEFAULT NULL,
  `id_kisi` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_mapel`, `pertanyaan`, `opsi1`, `opsi2`, `opsi3`, `opsi4`, `jawaban`, `id_ujian`, `id_kisi`) VALUES
(30, 1, 'Luas sebuah kotak tanpa tutup yang alasnya persegi adalah 432 cm2. Agar volume kotak tersebut mencapai maksimum, maka panjang rusuk persegi adalah â€¦ cm.', '6', '8', '10', '12', '12', 5, NULL),
(31, 1, 'Grafik fungsi f(x) = x3 + ax2 + bx + c hanya turun pada interval â€“1 < x < 5. Nilai a + b = â€¦', '-21', '-9', '9', '21', '-21', 5, NULL),
(32, 1, 'Diketahui turunan fungsi F(x) adalah Fâ€™(x), dengan Fâ€™(x) = 3x^2 + 4x - 4 dan F(1) = -1, maka persamaan F(x) adalah ....', 'F(x) = x^3 - 2x^2 + 4x â€“ 2', 'F(x) = x^3 - 2x^2 + 4x', 'F(x) = x^3 + 2x^2 - 4x', 'F(x) = x^3 - 2x^2 - 4x - 2', 'F(x) = x^3 - 2x^2 + 4x', 5, NULL),
(33, 1, 'Gradien garis singgung suatu kurva disembarang titik (x,y) ditentukan oleh rumus dy:dx = 2x â€“ 5. Jika kurva melalui titik (2,4) maka persamaan kurva tersebut adalah ....', 'y = 2x^2 - 5x - 14', 'y = 2x^2 - 5x - 16', 'y = x^2 - 5x - 14', 'y = x^2 - 5x - 10', 'y = x^2 - 5x - 14', 5, NULL),
(34, 1, 'Luas daerah yang dibatasi oleh kurva y = x^2 + 2, sumbu X, garis x = 1 dan garis x = 3 adalah ....', '14', '52/3', '38/3', '10', '10', 5, NULL),
(35, 1, 'Luas daerah yang dibatasi oleh kurva y = x^2 â€“ x â€“ 2 dan sumbu X adalah ....', '12', '9,5', '7', '5', '7', 5, NULL),
(36, 1, 'Nilai minimum dari bentuk 5x + 15y pada daerah penyelesaian sistem pertidaksamaan 3y - 2x >= 15; 7x + 3y <= 42; x >= 0; y >=0 adalah...', '68', '75', '93', '156', '68', 5, NULL),
(37, 1, 'Sebuah gedung pertunjukan teater hanya cukup ditempati penonton 40 orang dewasa dan anak. Harga tiket untuk orang dewasa Rp. 80.000,00 dan harga tiket untuk anak Rp. 40.000,00. Jika suatu rombongan ingin nonton bersama dan hanya mempunyai uang Rp 3.000.000,00 untuk membeli tiket orang dewasa dan tiket anak, maka model matemÃ¡tika dari masalah tersebut adalah â€¦.', 'x >= 0; y >= 0; 2x + y <= 150; x + y <= 40', 'x >= 0; y >= 0; 2x + y <= 150; x + y >= 40', 'x >= 0; y >= 0; 2x + y <= 75; x + y <= 40', 'x >= 0; y >= 0; 2x + y <= 75; x + y >= 40', 'x >= 0; y >= 0; 2x + y <= 150; x + y <= 40', 5, NULL),
(38, 1, 'Sebuah bus sekolah paling banyak dapat memuat 50 penumpang. Tarif untuk seorang pelajar Rp 1.500,00 dan tarif untuk seorang mahasiswa Rp 2.500,00. Penghasilan yang diperoleh tidak kurang dari Rp 75.000,00. Misal banyaknya penumpang pelajar dan mahasiswa adalah x dan y, model matemÃ¡tika yang sesuai untuk permasalahan tersebut adalah...', 'x >= 0; y >= 0; x + y <= 50; 3x + 5y >= 150', 'x >= 0; y >= 0; x + y <= 50; 3x + 5y <= 150', 'x >= 0; y >= 0; x + y <= 50; 5x + 3y >= 150', 'x >= 0; y >= 0; x + y <= 50; 5x + 3y <= 150', 'x >= 0; y >= 0; x + y <= 50; 5x + 3y >= 150', 5, NULL),
(39, 1, 'Perusahaan properti akan membangun ruko di atas tanah seluas 10.000 m^2 dengan tipe swalayan dan tipe kios. Untuk tipe swalayan memerlukan tanah 100 m^2 dan untuk kios 75 m^2. Jumlah rumah yang dibangun tidak lebih dari 125 unit. Keuntungan rumah tipe swalayan adalah Rp 5.000.000,00 per unit dan tipe kios adalah Rp 3.000.000,00 per unit. Keuntungan maksimum yang dapat diperoleh perusahaan properti dari penjualan rumah tersebut adalah ....', 'Rp. 425.000.000,00', 'Rp. 500.000.000,00', 'Rp. 600.000.000,00', 'Rp. 625.000.000,00', 'Rp. 625.000.000,00', 5, NULL),
(41, 7, 'Method yang digunakan untuk meng-assign adapter ke sebuah ListView adalah:', 'assignAdaptop()', 'setAdaptor()', 'getAdapter()', 'setAdapter()', 'setAdapter()', 7, NULL),
(42, 7, 'Method yang TIDAK digunakan atau TIDAK terkait dengan proses penggunaan internal storage adalah:', 'openFileOutput()', 'closed()', 'write()', 'read()', 'closed()', 7, NULL),
(43, 7, 'Callback method yang dapat Anda gunakan pada sebuah sub class dari SQLiteOpenHelper adalah KECUALI:', 'onDowngrade()', 'onCreate()', 'onResume()', 'onUpgrade()', 'onResume()', 7, NULL),
(44, 7, 'Method pada sebuah adapter yang digunakan untuk mengambil deklarasi layout XML untuk setiap item ListView dan meng-assign data ke masing-masing baris item adalah:', 'getAdapter()', 'getAdapterView()', 'getView()', 'setView()', 'getView()', 7, NULL),
(45, 7, 'Penyimpanan data yang primitive pada sebuah aplikasi Android dalam bentuk pasangan key-value menggunakan:', 'SQLite', 'External Storage', 'Internal Storage', 'Shared Preferences', 'Shared Preferences', 7, NULL),
(46, 7, 'Faktor yang paling TIDAK mempengaruhi pemilihan jenis penyimpanan data pada Android adalah:', 'Scalability aplikasi di masa depan', 'Berapa banyak space yang dibutuhkan untuk data', 'Target pengguna aplikasi', 'Algoritma pada pengunduhan data', 'Algoritma pada pengunduhan data', 7, NULL),
(47, 7, 'SQLite adalah sebuah database engine yang memiliki karakter:', 'C) Server-based', 'A) Self-contained', 'B) Serverless', 'A dan B benar', 'A dan B benar', 7, NULL),
(48, 7, 'Selain oleh ListView, adapter juga dapat digunakan oleh:', 'GridView', 'Gallery', 'StackView', 'Semua Benar', 'Semua Benar', 7, NULL),
(49, 7, 'Method yang dapat digunakan pada saat bekerja dengan objek Cursor adalah, KECUALI', 'getCount()', 'getRow()', 'moveToFirst()', 'moveToNext()', 'getRow()', 7, NULL),
(50, 7, 'Nama kelas yang digunakan untuk menampung data hasil query pada database ketika menggunakan SQLite adalah:', 'Cursor', 'Cursors', 'ContentValues', 'contentValues', 'Cursor', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `keterangan`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE IF NOT EXISTS `ujian` (
  `id_ujian` int(11) NOT NULL,
  `nama_ujian` varchar(300) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `nama_ujian`, `id_mapel`, `status`, `total`) VALUES
(5, 'UN', 1, 1, 10),
(7, 'UAS Teori 2018', 7, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_role` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `email`, `id_role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1),
(2, 'guru', 'guru', 'Dodi Pakpahan', 'dodi@gmail.com', 2),
(3, 'sehatmaru', 'sehatmaru', 'Sehat M T Samosir', 'sehatmaru@gmail.com', 3),
(4, 'emrycho', 'emrycho', 'Emrycho', 'emrycho@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kisi`
--
ALTER TABLE `kisi`
  ADD PRIMARY KEY (`id_kisi`), ADD KEY `fk_kisi_mapel` (`id_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`), ADD KEY `fk_nilai_user` (`id_user`), ADD KEY `fk_nilai_ujian` (`id_ujian`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`), ADD KEY `fk_soal_mapel` (`id_mapel`), ADD KEY `fk_soal_ujian` (`id_ujian`), ADD KEY `fk_soal_kisi` (`id_kisi`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`), ADD KEY `fk_ujian_mapel` (`id_mapel`), ADD KEY `fk_ujian_status` (`status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`), ADD KEY `fk_user_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kisi`
--
ALTER TABLE `kisi`
  MODIFY `id_kisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kisi`
--
ALTER TABLE `kisi`
ADD CONSTRAINT `fk_kisi_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `fk_nilai_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`),
ADD CONSTRAINT `fk_nilai_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
ADD CONSTRAINT `fk_soal_kisi` FOREIGN KEY (`id_kisi`) REFERENCES `kisi` (`id_kisi`),
ADD CONSTRAINT `fk_soal_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
ADD CONSTRAINT `fk_soal_ujian` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
ADD CONSTRAINT `fk_ujian_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
ADD CONSTRAINT `fk_ujian_status` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
