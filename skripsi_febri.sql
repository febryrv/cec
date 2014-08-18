-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 12 Agu 2014 pada 13.43
-- Versi Server: 5.5.24-log
-- Versi PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `skripsi_febri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `email`) VALUES
('febri', 'e10adc3949ba59abbe56e057f20f883e', 'Febri Andrianto2', 'febri.rv@gmail.com'),
('test_username', 'e10adc3949ba59abbe56e057f20f883e', 'Tentang Kami', 'tes@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(2) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `isi_artikel` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `update_terakhir` date NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `gambar`, `update_terakhir`) VALUES
(1, 'Tentang Kami', '<p>Ini adalah tentang kami</p>', '', '2014-08-07'),
(4, 'Fasilitas', '<div>\r\n<h4>MASJID</h4>\r\n</div>\r\n<p>LABORATURIUM</p>\r\n<p><strong>Laboraturium</strong> adalah tempat riset ilmiah, eksperimen, pengukuran ataupun pelatihan ilmiah dilakukan. Laboratorium biasanya dibuat untuk memungkinkan dilakukannya kegiatan-kegiatan tersebut secara terkendali.</p>\r\n<div>\r\n<h4>PERPUSTAKAAN</h4>\r\n</div>\r\n<p><strong>Perpustakaan</strong> merupakan upaya untuk memelihara dan meningkatkan efisiensi dan efektifitas proses belajar mengajar. Tujuan dari perpustakaan itu sendiri adalah:</p>\r\n<ul>\r\n<li>Dapat menambah ilmu pengetahuan luas kepada siswa.</li>\r\n<li>Dapat mengembangkan kemampuan berfikir kreatif , membina rohani, dan dapat menggunakan kemampuannya untuk menghargai hasil seni dan budaya manusia.</li>\r\n<li>Dapat menggunakan waktu senggang dengan baik dan bermanfaat bagi kehidupan pribadi maupun sosial.</li>\r\n</ul>\r\n<div>\r\n<h4>SARANA OLAH RAGA</h4>\r\n</div>', '', '2014-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `judul_banner` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_banner` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `update_terakhir` date NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `judul_banner`, `isi_banner`, `gambar`, `update_terakhir`) VALUES
(1, 'Maulid Nabi Muhammad SAW', '&lt;a href=&quot;#&quot; onMouseOut=&quot;MM_swapImgRestore()&quot; onMouseOver=&quot;MM_swapImage(''Image1'','''',''assets/img/maulid2.jpg'',1)&quot;&gt;\r\n	&lt;img src=&quot;assets/img/maulid1.jpg&quot; name=&quot;Image1&quot; width=&quot;320&quot; height=&quot;240&quot; border=&quot;0&quot; id=&quot;Image1&quot; /&gt;\r\n&lt;/a&gt;\r\n&lt;a href=&quot;#&quot; onMouseOut=&quot;MM_swapImgRestore()&quot; onMouseOver=&quot;MM_swapImage(''Image2'','''',''assets/img/maulid4.jpg'',1)&quot;&gt;\r\n	&lt;img src=&quot;assets/img/maulid3.jpg&quot; name=&quot;Image2&quot; width=&quot;320&quot; height=&quot;240&quot; border=&quot;0&quot; id=&quot;Image2&quot; /&gt;\r\n&lt;/a&gt;\r\n&lt;a href=&quot;#&quot; onMouseOut=&quot;MM_swapImgRestore()&quot; onMouseOver=&quot;MM_swapImage(''Image3'','''',''assets/img/maulid7.jpg'',1)&quot;&gt;\r\n	&lt;img src=&quot;assets/img/maulid6.jpg&quot; name=&quot;Image3&quot; width=&quot;320&quot; height=&quot;240&quot; border=&quot;0&quot; id=&quot;Image3&quot; /&gt;\r\n&lt;/a&gt;&lt;p&gt;OSIS SMP Gunung Jati Tangerang pada hari Kamis Tanggal 3 Februari 2011 mengadakan kegiatan Maulid Nabi Muhammad SAW yang dilaksanakan di Masjid Gunung Jati Tangerang. Terlihat dari gambar diatas begitu meriahnya acara yang diadakan OSIS SMP Gunung Jati dimana ada kegiatan Marawis yang dibawakan oleh Team Marawis Gunung Jati, Puisi yang dibawaka oleh Carina dan Dian kelas 8A, Nasyid yang dibawakan oleh Siswa/Siswi Kelas 9.&lt;/p&gt;\r\n&lt;p&gt;Kegiatan ini juga diisi dengan kegiatan Ceramah yang dibawahkan oleh Ustad Drs.H. Hasan Basri A. dimana Pa Ustad menyampaikan tausiah-tausiah yang bermanfaat bagi siswa-siswi SMP Gunung Jati Tangerang. Acara ditutup dengan do''a oleh Pa Ustad yang dilanjukan dengan Kuis. Ketika Acara Kuis Pa Ustad bertanya perihal materi yang dibawakan, bagi siswa-siswi yang bisa menjawab akan mendapatkan hadia Amplop, dalam kegiatan ini antusias anak-anak besar sekali dimana banyak siswa-siswi yang mengangkat tangannya ketika Pa Ustad memberikan pertanyaan rebutan....&lt;/p&gt;', '4467353maulid2.jpg', '2013-06-29'),
(2, 'Funbike HUT YGJ Ke-23', '&lt;p&gt;Dalam rangka menyambut HUT YGJ Ke-23, Yayasan Gunung Jati Tangerang akan mengadakan kegiatan Sepeda Santai atau istilahnya Fun Bike, adapun kegiatan ini akan dilaksanakan pada tanggal 10 Juni 2012. Untuk peserta\r\ndiambil dari kalangan guru-guru, Orang Tua Murid, dan masyarakat sekitar. Jadi bagi yang berminat mengikuti kegiatan ini silahkan daftarkan diri kalian... Ada doprizenya lhooo!!&lt;/p&gt;\r\n&lt;p&gt;Untuk pendaftaran bisa langsung ke Yayasan Gunung Jati&lt;/p&gt;', '757181bicycle.jpg', '2013-07-13'),
(8, 'Pengajian', 'Pengajian untuk menghadapi kelulusan', '9997_pengajian.jpg', '2013-06-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `email`, `telepon`, `pesan`, `tanggal`) VALUES
(3, 'Ran Mouri', 'baroq.elly@yahoo.com', '', 'saya ingin sekali bersekolah...', '2014-07-16 05:24:49'),
(6, 'tyrion ', 'tyrion@gmail.com', '08923232', 'Kapan pembukaan tahun ajaran baru?', '2014-08-03 05:35:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir`
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
-- Dumping data untuk tabel `formulir`
--

INSERT INTO `formulir` (`nomor_formulir`, `nama`, `foto`, `kode_program`, `jenis_kelamin`, `agama`, `email`, `password`, `alamat`, `kota_lahir`, `tanggal_lahir`, `sekolah`, `kelas`, `hobi`, `cita`, `tlp`, `ayah`, `ibu`, `pekerjaanayah`, `pekerjaanibu`, `tanggal_daftar`, `lunas`) VALUES
('FORM.1410.1101.04', 'Febri', './uploads/foto/FORM.1410.1101.04-deddy.jpg', '0001', 'Laki-laki', 'Islam', 'febri@gmail.com', '9785620b2fad7838cbb1d806361a1e21', 'Tes', 'Tangerang', '1994-07-06', 'SMK N 2 Kebumen', '10', '', '', '09897877', 'rrere', 'rerer', 'erere', 'erere', '2014-07-24 12:29:52', 0),
('FORM.1411.1010.02', 'Mark Sunkar', './uploads/foto/FORM.1410.1101.04-deddy.jpg', '0010', 'Laki-laki', 'Islam', 'setoelkahfi@gmail.com', '207895aca50dc68c490c07b2d9a25ac9', 'Perumahan Cluster Mutiara Curug 2\r\nBlok J/16\r\nCukanggalih - Curug\r\n15810', 'Kebumen', '1992-09-10', 'SMK N 2 Kebumen', '11', 'Maiin bola', 'Astronot', '085715227992', '', '', '', '', '2014-07-24 03:00:16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus`
--

CREATE TABLE IF NOT EXISTS `kursus` (
  `kode_program` varchar(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kursus`
--

INSERT INTO `kursus` (`kode_program`, `nama`, `jadwal`) VALUES
('0001', 'Les Private', ''),
('0010', 'Kursus Komputer', ''),
('0100', 'Kursus Bahasa Inggris', ''),
('1000', 'Bimbel', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `foto`, `kode_program`, `jenis_kelamin`, `agama`, `email`, `password`, `alamat`, `kota_lahir`, `tanggal_lahir`, `sekolah`, `kelas`, `hobi`, `cita`, `tlp`, `ayah`, `ibu`, `pekerjaanayah`, `pekerjaanibu`, `tanggal_daftar`) VALUES
('1411.1010.02', 'Mark Sunkar', './uploads/foto/FORM.1410.1101.04-deddy.jpg', '0010', 'Laki-laki', 'Islam', 'setoelkahfi@gmail.com', '207895aca50dc68c490c07b2d9a25ac9', 'Perumahan Cluster Mutiara Curug 2\r\nBlok J/16\r\nCukanggalih - Curug\r\n15810', 'Kebumen', '1992-09-10', 'SMK N 2 Kebumen', '11', 'Maiin bola', 'Astronot', '085715227992', '', '', '', '', '2014-07-24 03:00:16'),
('1411.1010.01', 'Qorizon', './uploads/foto/FORM.1410.1111.03-poni.jpg', '0010', 'Laki-laki', 'Islam', 'setoelkahfi@propanraya.com', '207895aca50dc68c490c07b2d9a25ac9', 'Perumahan Cluster Mutiara Curug 2\r\nBlok J/16\r\nCukanggalih - Curug\r\n15810', 'Kebumen', '1992-09-10', 'SMK N 2 Kebumen', '11', 'Maiin bola', 'Astronot', '085715227992', '', '', '', '', '2014-07-24 02:36:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `judul`, `isi`, `gambar`) VALUES
(1, 'Pendaftaran.', '<p>Kami menerima pendaftaran murid baru untuk mengikuti kusus di lembaga pendidikan kami. Silahkan datang dan konsultasikan kebutuhan kursus anak anda di lembaga kursus kami.</p>', 'pic1.jpg'),
(2, 'Kursus.', '<p>Kursus di sini sangat berkualitas. Anda akan diajarkan tentang materi dengan seksama dan jelas. Oleh sebab itu, lulusan dari program kursus kami akan menang bersaing dalam percaturan profesional.</p>', 'pic2.jpg'),
(3, 'Tenaga Pengajar.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>', 'pic3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
