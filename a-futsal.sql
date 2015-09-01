-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2015 at 12:35 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a-futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(6) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `id` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `id`) VALUES
('KAT001', 'Vinyl', 9),
('KAT002', 'Rumput Sintetis', 10);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE IF NOT EXISTS `lapangan` (
  `id_lapangan` varchar(6) NOT NULL,
  `nm_lapangan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `id_kategori` varchar(6) NOT NULL,
  `harga` double NOT NULL,
  `id` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `nm_lapangan`, `gambar`, `keterangan`, `id_kategori`, `harga`, `id`) VALUES
('LAP001', 'Lapangan 01', 'lantai-degan-rumput.jpg', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit adispicing amet</div><div>Cras molestie condimentum consequat. Nam leo libero, scelerisque tincidunt amet nsectetur adipiscing elit. Cras molestie condimentum nsectetur adipiscing elit. Cras molestie condimentum consequat pretium donec dictum mattis elit, nec:</div>', 'KAT002', 100000, 7),
('LAP002', 'Lapangan 02', 'lapangan-futsal_32.jpg', 'Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks&nbsp;Ini adalah teks', 'KAT001', 100000, 8),
('LAP003', 'Lapangan 03', '1440700_f2.jpg', 'Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan&nbsp;Ini adalah keterangan', 'KAT002', 100000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `member2`
--

CREATE TABLE IF NOT EXISTS `member2` (
  `id_member` varchar(7) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `id` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `member2`
--

INSERT INTO `member2` (`id_member`, `namalengkap`, `username`, `password`, `email`, `no_hp`, `alamat`, `no_ktp`, `id`) VALUES
('ID00001', 'aaa', 'aaa', 'aaa', 'aaa@mail.com', '0987665435646', 'aaa', '3216080509940003', 1),
('ID00002', 'Muthi Nafisa', 'muthi', 'muthi', 'muthinafisa@gmail.com', '085743304330', 'Bogor', '1231231', 2),
('ID00003', 'bbb', 'bbb', 'bbb', 'bbb@mail.com', '077867889687', 'bbadsa', '34353453453', 3),
('ID00004', 'www', 'www', 'www', 'www@mail.com', '9078976557', 'www', '65476587', 4),
('ID00005', 'Muhamad Syihabudin', 'syihab', '317032231', 'muhamad.s0509@bsi.ac.id', '085782292405', 'Bekasi', '18122909', 5),
('ID00006', 'Ahmad Alfian', 'pian', 'barker', 'barkerpian@gmail.com', '08787823443', 'BTR', '12124455', 9),
('ID00007', 'Rido', 'rido', 'rido', 'rido@gmail.com', '0857828282828', 'Tambun', '1212121212', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan`
--

CREATE TABLE IF NOT EXISTS `pembatalan` (
  `id_reservasi` varchar(8) NOT NULL,
  `alasan` text NOT NULL,
  PRIMARY KEY (`id_reservasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembatalan`
--

INSERT INTO `pembatalan` (`id_reservasi`, `alasan`) VALUES
('RVS00017', 'oke'),
('RVS00041', 'Ganti lapangan'),
('RVS00044', 'Tidak jadi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_reservasi` varchar(8) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `gambar_bukti` varchar(100) NOT NULL,
  PRIMARY KEY (`id_reservasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_reservasi`, `no_rek`, `atas_nama`, `gambar_bukti`) VALUES
('RVS00018', '534', 'adasd', 'BingWallpaper-2015-05-18.jpg'),
('RVS00019', '123123', 'sdfasd', 'BingWallpaper-2015-04-28.jpg'),
('RVS00020', '678687', 'saya', 'cara-pembayaran.png'),
('RVS00022', '9629388378383672', 'PT ECART WEBPORTAL', 'konfirmasi-order.png'),
('RVS00031', '787678768', 'mnmnmn', 'BingWallpaper-2015-03-26.jpg'),
('RVS00032', '56565675', 'wqwqe', 'BingWallpaper-2015-04-06.jpg'),
('RVS00033', '1229090909', 'Saya', 'BingWallpaper-2015-03-15.jpg'),
('RVS00034', '2342432', 'hjhj', 'BingWallpaper-2015-05-01.jpg'),
('RVS00035', '16170009', 'Muhamad Syihabudin', 'BingWallpaper-2015-04-24.jpg'),
('RVS00036', '16170009', 'Muhamad Syihabudin', 'BingWallpaper-2015-04-27.jpg'),
('RVS00037', '16170009', 'Muhamad Syihabudin', 'BingWallpaper-2015-04-16.jpg'),
('RVS00038', '16170009', 'Muhamad Syihabudin', 'BingWallpaper-2015-05-08.jpg'),
('RVS00039', '9090909', 'Muhamad Syihabudin', 'kaskus.png'),
('RVS00040', '897987987', 'Adenya Rido', 'kaskus.png'),
('RVS00041', '90889789', 'Adenya Rido', 'kaskus.png'),
('RVS00042', '78978787', 'www', 'kaskus.png'),
('RVS00043', '878787', 'www', 'kaskus.png'),
('RVS00044', '123123', 'www', 'kaskus.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE IF NOT EXISTS `reservasi` (
  `id_reservasi` varchar(8) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_member` varchar(7) NOT NULL,
  `id_lapangan` varchar(6) NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `jam_reservasi` time NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `total` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `id` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_session`, `id_member`, `id_lapangan`, `tgl_reservasi`, `jam_reservasi`, `tanggal`, `jam_mulai`, `jam_selesai`, `total`, `status`, `id`) VALUES
('RVS00017', '150620141352', 'ID00002', 'LAP003', '2015-06-20', '14:14:08', '2015-07-05', '13:00:00', '16:00:00', 300000, 'Dibatalkan', 36),
('RVS00018', '150620155847', 'ID00002', 'LAP002', '2015-06-26', '05:59:12', '2015-06-24', '12:00:00', '14:00:00', 200000, 'Disetujui', 37),
('RVS00019', '150621125210', 'ID00002', 'LAP003', '2015-06-21', '12:52:17', '2015-06-24', '09:00:00', '12:00:00', 300000, 'Tidak Disetujui', 39),
('RVS00020', '150621214200', 'ID00001', 'LAP002', '2015-06-21', '21:42:06', '2015-06-25', '10:00:00', '12:00:00', 200000, 'Disetujui', 40),
('RVS00021', '150625191209', '', 'LAP003', '2015-06-25', '19:12:18', '2015-07-06', '13:00:00', '14:00:00', 0, 'Checked', 42),
('RVS00022', '150626062220', 'ID00001', 'LAP003', '2015-06-26', '05:58:56', '2015-07-05', '19:00:00', '20:00:00', 100000, 'Disetujui', 48),
('RVS00023', '150626130201', '', 'LAP003', '2015-06-26', '13:06:18', '2015-07-05', '19:00:00', '20:00:00', 100000, 'Checked', 52),
('RVS00024', '150626144322', '', 'LAP003', '2015-06-26', '14:43:28', '2015-06-30', '12:00:00', '15:00:00', 300000, 'User Checking', 53),
('RVS00025', '150626144703', 'ID00001', 'LAP002', '2015-06-27', '04:54:44', '2015-07-03', '19:00:00', '20:00:00', 100000, 'Dibatalkan', 56),
('RVS00026', '150627095656', '', 'LAP003', '2015-06-27', '09:57:10', '2015-07-15', '13:00:00', '15:00:00', 200000, 'Belum Konfirmasi', 58),
('RVS00027', '150627095934', '', 'LAP001', '2015-06-27', '09:59:46', '2015-07-14', '16:00:00', '18:00:00', 200000, 'Belum Konfirmasi', 59),
('RVS00028', '150627100339', '', 'LAP002', '2015-06-27', '10:03:52', '2015-07-11', '13:00:00', '14:00:00', 100000, 'Belum Konfirmasi', 60),
('RVS00029', '150627100603', '', 'LAP002', '2015-06-27', '10:06:11', '2015-07-03', '15:00:00', '17:00:00', 200000, 'User Checking', 62),
('RVS00030', '150627100823', 'ID00006', 'LAP003', '2015-06-30', '23:04:31', '2015-07-07', '14:00:00', '16:00:00', 200000, 'Dibatalkan', 63),
('RVS00031', '150701040949', 'ID00002', 'LAP001', '2015-06-30', '23:23:58', '2015-07-11', '00:00:00', '00:00:00', 0, 'Disetujui', 67),
('', '150701040949', 'ID00002', '', '2015-07-01', '04:10:13', '0000-00-00', '00:00:00', '00:00:00', 0, 'Belum Konfirmasi', 68),
('RVS00032', '150701041415', 'ID00002', 'LAP002', '2015-06-30', '23:24:10', '2015-07-11', '08:00:00', '09:00:00', 0, 'Disetujui', 69),
('RVS00033', '150701041928', 'ID00002', 'LAP003', '2015-06-30', '23:24:19', '2015-07-04', '14:00:00', '15:00:00', 100000, 'Disetujui', 71),
('RVS00034', '150701041953', 'ID00002', 'LAP001', '2015-06-30', '23:24:28', '2015-07-13', '19:00:00', '21:00:00', 200000, 'Disetujui', 72),
('RVS00035', '150701042542', 'ID00005', 'LAP002', '2015-06-30', '23:30:14', '2015-07-08', '20:00:00', '21:00:00', 100000, 'Disetujui', 73),
('RVS00036', '150701042605', 'ID00005', 'LAP001', '2015-06-30', '23:30:48', '2015-07-02', '19:00:00', '21:00:00', 200000, 'Disetujui', 74),
('RVS00037', '150701042623', 'ID00005', 'LAP001', '2015-06-30', '23:30:39', '2015-07-09', '19:00:00', '21:00:00', 200000, 'Disetujui', 75),
('RVS00038', '150701042654', 'ID00005', 'LAP001', '2015-06-30', '23:30:30', '2015-07-16', '19:00:00', '21:00:00', 200000, 'Disetujui', 76),
('RVS00039', '150703235422', 'ID00005', 'LAP001', '2015-07-03', '18:56:34', '2015-07-04', '07:00:00', '08:00:00', 100000, 'Disetujui', 77),
('RVS00040', '150703235823', 'ID00007', 'LAP002', '2015-07-03', '19:02:11', '2015-07-16', '19:00:00', '20:00:00', 100000, 'Disetujui', 78),
('RVS00041', '150704000019', 'ID00007', 'LAP003', '2015-07-03', '19:03:03', '2015-07-16', '20:00:00', '21:00:00', 100000, 'Pembatalan Disetujui', 79),
('RVS00042', '150704040927', 'ID00004', 'LAP003', '2015-07-03', '23:11:29', '2015-07-14', '16:00:00', '17:00:00', 100000, 'Tidak Disetujui', 81),
('RVS00043', '150704041402', 'ID00004', 'LAP002', '2015-07-03', '23:15:00', '2015-07-14', '16:00:00', '17:00:00', 100000, 'Disetujui', 82),
('RVS00044', '150704042410', 'ID00004', 'LAP001', '2015-07-03', '23:35:55', '2015-07-17', '19:00:00', '20:00:00', 100000, 'Sudah Konfirmasi', 83);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `level` varchar(15) NOT NULL,
  `keyword` varchar(16) NOT NULL DEFAULT 'Copyright-syihab',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `namalengkap`, `username`, `password`, `email`, `blokir`, `level`, `keyword`) VALUES
(1, 'Muhamad Syihabudin', 'admin', 'syihab', 'muhamads0509@bsi.ac.id', 'N', 'All-Privileges', 'Copyright-syihab'),
(2, 'Muthi Nafisa', 'muthi', 'nafisa', 'muthi@mail.com', 'Y', 'User', 'Copyright-syihab');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
