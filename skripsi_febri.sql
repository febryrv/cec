-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2014 at 08:56 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi_febri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `email`) VALUES
('febri', 'e10adc3949ba59abbe56e057f20f883e', 'Febri Andrianto2', 'febri.rv@gmail.com'),
('test_username', 'e10adc3949ba59abbe56e057f20f883e', 'Tentang Kami', 'tes@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `email`, `telepon`, `pesan`, `tanggal`) VALUES
(11, 'Mikaela', 'mikaela@gmail.com', '907986873', '<p>Test</p>', '2014-08-26 01:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE IF NOT EXISTS `formulir` (
  `nomor_formulir` varchar(17) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kode_program` char(4) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kota_lahir` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kelas` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `hobi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `cita` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tlp` char(12) COLLATE latin1_general_ci NOT NULL,
  `ayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `ibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lunas` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nomor_formulir`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`nomor_formulir`, `nama`, `foto`, `kode_program`, `jenis_kelamin`, `agama`, `email`, `password`, `alamat`, `kota_lahir`, `tanggal_lahir`, `sekolah`, `kelas`, `hobi`, `cita`, `tlp`, `ayah`, `ibu`, `pekerjaanayah`, `pekerjaanibu`, `tanggal_daftar`, `lunas`) VALUES
('FORM.1410.1101.04', 'Febri', './uploads/foto/FORM.1410.1101.04-deddy.jpg', '0001', 'Laki-laki', 'Islam', 'febri@gmail.com', '9785620b2fad7838cbb1d806361a1e21', 'Tes', 'Tangerang', '1994-07-06', 'SMK N 2 Kebumen', '10', '', '', '09897877', 'rrere', 'rerer', 'erere', 'erere', '2014-07-24 12:29:52', 0),
('FORM.1411.1010.02', 'Mark Sunkar', './uploads/foto/FORM.1410.1101.04-deddy.jpg', '0010', 'Laki-laki', 'Islam', 'setoelkahfi@gmail.com', '207895aca50dc68c490c07b2d9a25ac9', 'Perumahan Cluster Mutiara Curug 2\r\nBlok J/16\r\nCukanggalih - Curug\r\n15810', 'Kebumen', '1992-09-10', 'SMK N 2 Kebumen', '11', 'Maiin bola', 'Astronot', '085715227992', '', '', '', '', '2014-07-24 03:00:16', 1),
('FORM.1402.0100.03', 'Febri', './uploads/foto/FORM.1402.0100.03-pic2.jpg', '0100', 'Laki-laki', 'Islam', 'febri.rv@gmail.com', '', 'pasarkemis', 'Tangerang', '2014-08-05', 'SMK N 2 Kebumen', '02', 'baca', 'dokter', '09897877', 'toni', 'tuti', '', '', '2014-08-12 15:54:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE IF NOT EXISTS `kursus` (
  `kode_program` varchar(4) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`kode_program`, `nama`, `jadwal`) VALUES
('0001', 'Les Private', '<p>Senin - Jumat</p>'),
('0010', 'Kursus Komputer', '<p>Senin - Jumat</p>'),
('0100', 'Kursus Bahasa Inggris', '<p>Senin - Jumat</p>'),
('1000', 'Bimbel', '<p>Senin - Jumat</p>');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(17) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kode_program` char(4) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kota_lahir` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kelas` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `hobi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `cita` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tlp` char(12) COLLATE latin1_general_ci NOT NULL,
  `ayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `ibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanayah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaanibu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `foto`, `kode_program`, `jenis_kelamin`, `agama`, `email`, `password`, `alamat`, `kota_lahir`, `tanggal_lahir`, `sekolah`, `kelas`, `hobi`, `cita`, `tlp`, `ayah`, `ibu`, `pekerjaanayah`, `pekerjaanibu`, `tanggal_daftar`) VALUES
('1411.1010.02', 'Mark Sunkar', './uploads/foto/FORM.1410.1101.04-deddy.jpg', '0010', 'Laki-laki', 'Islam', 'setoelkahfi@gmail.com', '207895aca50dc68c490c07b2d9a25ac9', 'Perumahan Cluster Mutiara Curug 2\r\nBlok J/16\r\nCukanggalih - Curug\r\n15810', 'Kebumen', '1992-09-10', 'SMK N 2 Kebumen', '11', 'Maiin bola', 'Astronot', '121212121', '', '', '', '', '2014-07-24 03:00:16'),
('1411.1010.01', 'Qorizon', './uploads/foto/FORM.1410.1111.03-poni.jpg', '0010', 'Laki-laki', 'Islam', 'setoelkahfi@propanraya.com', '207895aca50dc68c490c07b2d9a25ac9', 'Perumahan Cluster Mutiara Curug 2\r\nBlok J/16\r\nCukanggalih - Curug\r\n15810', 'Kebumen', '1992-09-10', 'SMK N 2 Kebumen', '11', 'Maiin bola', 'Astronot', '085715227992', '', '', '', '', '2014-07-24 02:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'Pendaftaran.', '<p>Kami menerima pendaftaran murid baru untuk mengikuti kusus di lembaga pendidikan kami. Silahkan datang dan konsultasikan kebutuhan kursus anak anda di lembaga kursus kami.</p>', 'pic1.jpg'),
(2, 'Kursus.', '<p>Kursus di sini sangat berkualitas. Anda akan diajarkan tentang materi dengan seksama dan jelas. Oleh sebab itu, lulusan dari program kursus kami akan menang bersaing dalam percaturan profesional.</p>', 'pic2.jpg'),
(3, 'Tenaga Pengajar.', '<p>Tenaga Pengajar di lembaga kami sudah terbukti kualitasnya. Kami berusaha menghadirkan bimbingan belajar yang menyenangkan sekaligus berprestasi</p>', 'FORM.1409.0100.02-1366191367342.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE IF NOT EXISTS `tentang_kami` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `judul` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `update_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `judul`, `isi`, `gambar`, `update_terakhir`) VALUES
(1, 'Tentang Kami', '<p>Ini adalah tentang kami.</p>', 'building_150x70_02.gif', '2014-08-28 12:55:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
