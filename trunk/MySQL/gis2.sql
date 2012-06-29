-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2012 at 06:30 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gis`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `judul` text,
  `nama gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `judul`, `nama gambar`) VALUES
(5, 'blun ada judul', 'syarif.jpg'),
(6, 'haha', 'DSC_0370.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE IF NOT EXISTS `marker` (
  `MarkerID` int(11) NOT NULL AUTO_INCREMENT,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `ZoomLevel` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `TextHTML` text NOT NULL,
  `Photo` varchar(25) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `MarkerDate` datetime NOT NULL,
  `TypeID` int(11) NOT NULL COMMENT 'FK ke tabel Type',
  PRIMARY KEY (`MarkerID`),
  KEY `TypeID` (`TypeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabel untuk Marker di GoogleMap' AUTO_INCREMENT=80 ;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`MarkerID`, `Latitude`, `Longitude`, `ZoomLevel`, `Title`, `TextHTML`, `Photo`, `Address`, `MarkerDate`, `TypeID`) VALUES
(2, 0.332642, 101.024, 14, 'Haloo', 'haalooooo', '', 'Jalan DI Panjaitan, Bangkinang Barat, Indonesia', '0000-00-00 00:00:00', 1),
(3, 0.331011, 101.044, 14, 'Kampus Politeknik Kampar', 'Saya kuliah disini! <br><img src="polkam.gif" width=300 height=200>', '', 'Jalan Lingkar Luar, Bangkinang Barat, Indonesia', '0000-00-00 00:00:00', 4),
(4, 0.316377, 101.035, 16, 'SMKN 01 Bangkinang', 'hore bisa den,,,,,', '', 'Jalan Datuk Garang, Bangkinang Barat, Indonesia', '0000-00-00 00:00:00', 1),
(30, 0.320282, 101.032, 14, 'Cadika', 'Batu Itam', '', 'Jalan HR Subrantas, Bangkinang Barat, Indonesia', '0000-00-00 00:00:00', 8),
(8, 0.339766, 101.019, 14, 'Warnet', 'Jalan Ahmad Yani, Bangkinang Barat, Indonesia', '', 'Jalan Ahmad Yani, Bangkinang Barat, Indonesia', '0000-00-00 00:00:00', 7),
(76, 0.344465, 101.02, 17, 'Islamic Centre Kab. Kampar', 'Islamic Centre menrupakan Masjid <br> kebanggaan masyarakat Kab. Kampar <br/> <center><img src="islamic.jpg" width=200 height=150>', '', 'Jalan Sungai Kampar, Bangkinang Barat, Indonesia', '2012-06-25 14:07:50', 3),
(78, 0.343397, 101.018, 18, 'Kantor Pos Polisi', 'Kantor Pos Polisi', '', 'Jalan Ahmad Yani, Bangkinang Barat, Indonesia', '2012-06-28 17:08:59', 8),
(79, 0.332899, 101.019, 14, 'Pemadam Kebakaran', 'Pemadam Kebakaran', '', 'Jalan Letnan Boyak, Bangkinang Barat, Indonesia', '2012-06-28 17:23:38', 9);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `TypeID` int(11) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(25) NOT NULL,
  `TypeParent` int(11) NOT NULL,
  `Icon` text NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `TypeName`, `TypeParent`, `Icon`) VALUES
(1, 'Pendidikan', 0, 'http://localhost/gis-bangkinang/icon/pendidikan.png'),
(4, 'POLKAM', 0, 'http://localhost/gis-bangkinang/icon/polkam.png'),
(5, 'Stikes', 0, 'http://localhost/gis-bangkinang/icon/telephone.png'),
(6, 'STIE', 0, ''),
(7, 'Kantor Pemda', 0, 'http://localhost/gis-bangkinang/icon/apartment.png'),
(8, 'Kantor Polisi', 0, 'http://localhost/gis-bangkinang/icon/polisi.png'),
(9, 'Pemadam Kebakaran', 0, 'http://localhost/gis-bangkinang/icon/pemadam.png'),
(10, 'Pasar', 0, 'http://localhost/gis-bangkinang/icon/supermarket.png'),
(13, 'SPBU', 0, ''),
(14, 'Bank', 0, ''),
(17, 'Masjid / Mushalla', 0, ''),
(18, 'Taman Rekreasi', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `typeparent`
--

CREATE TABLE IF NOT EXISTS `typeparent` (
  `TypeID` int(11) NOT NULL,
  `TypeParent` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeparent`
--

INSERT INTO `typeparent` (`TypeID`, `TypeParent`) VALUES
(1, 'SD / MI'),
(1, 'SMP / MTS'),
(1, 'SMA / SMK'),
(1, 'Perguruan Tinggi'),
(2, 'Rumah Sakit'),
(2, 'Puskesmas'),
(3, 'Masjid'),
(3, 'Mushalla'),
(7, 'SPBU'),
(7, 'Halte'),
(7, 'Terminal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(60) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `UserNicename` varchar(50) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserRegistered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`Username`),
  KEY `user_nicename` (`UserNicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `UserNicename`, `UserEmail`, `UserRegistered`) VALUES
(2, 'syarif', '8daa2f003d41f1ea865c1503b3d99d3d', '', '', '0000-00-00 00:00:00');
