-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2012 at 04:36 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gis`
--

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
  `Address` varchar(60) NOT NULL,
  `MarkerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TypeID` int(11) NOT NULL COMMENT 'FK ke tabel Type',
  PRIMARY KEY (`MarkerID`),
  KEY `TypeID` (`TypeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabel untuk Marker di GoogleMap' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`MarkerID`, `Latitude`, `Longitude`, `ZoomLevel`, `Title`, `TextHTML`, `Address`, `MarkerDate`, `TypeID`) VALUES
(1, 0.344293, 101.029, 18, 'Jalan H Agussalim Riaupos', 'nurul sedang stress', 'Jalan H Agussalim Riaupos', '0000-00-00 00:00:00', 1),
(2, 0.332642, 101.024, 18, 'Dodol', 'Some stuff to display in the<br>First Info Window <br>With a <a href="http://www.econym.demon.co.uk">Link<\\/a> to my home page', '', '0000-00-00 00:00:00', 0),
(3, 0.335875, 101.045, 18, 'Jalan Lingkar Luar', 'Saya kuliah disini. <br><img src="syarif.jpg" width=150 height=100>', '', '0000-00-00 00:00:00', 0),
(4, 0.346673, 101.03, 18, 'Jl Abdurrahman Saleh', 'AAAAAAAAAAAAAAAapa lah yang mamak buka ni', '', '0000-00-00 00:00:00', 0),
(5, 0.342382, 101.03, 18, 'Jalan Sisingamangaraja', 'Ini saya pake AJAX', '', '0000-00-00 00:00:00', 0),
(6, 0.340881, 101.024, 14, 'Jalan Datuk Tabano, Bangkinang Barat, Indonesia', 'Jalan Datuk Tabano, Bangkinang Barat, Indonesia', '', '0000-00-00 00:00:00', 0),
(7, 0.33865, 101.02, 13, 'Dodolipet dudumteret', 'aaaaaaaaaaaaaaa', '', '0000-00-00 00:00:00', 0),
(8, 0.339766, 101.019, 14, 'Jalan Ahmad Yani, Bangkinang Barat, Indonesia', 'Jalan Ahmad Yani, Bangkinang Barat, Indonesia', '', '0000-00-00 00:00:00', 2),
(9, 0.339079, 101.027, 14, 'dtdtdt', 'test', '', '0000-00-00 00:00:00', 2),
(10, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', 1),
(11, 0, 0, 0, 'dd', '', '', '0000-00-00 00:00:00', 1),
(12, 0, 0, 0, 'ff', '', '', '0000-00-00 00:00:00', 1),
(13, 0, 0, 0, 'ff', '', '', '0000-00-00 00:00:00', 1),
(14, 0, 0, 0, '', '', 'xxx', '0000-00-00 00:00:00', 1),
(15, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', 1),
(16, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', 1),
(17, 0.344293, 101.029, 13, 'hahah', 'ahahah', 'hahah', '0000-00-00 00:00:00', 1),
(18, 0.344293, 101.029, 18, 'Jalan H Agussalim Riaupos', 'hahahah', 'Jalan H Agussalim Riaupos', '0000-00-00 00:00:00', 1),
(19, 0.344293, 101.029, 18, 'Jalan H Agussalim Riaupos', 'syarif', '', '0000-00-00 00:00:00', 1),
(20, 0.344293, 101.029, 18, 'Jalan H Agussalim Riaupos', 'ondek', '', '0000-00-00 00:00:00', 1),
(21, 0.344293, 101.029, 18, 'Jalan H Agussalim Riaupos', 'olun bisa le', '', '0000-00-00 00:00:00', 1),
(22, 0, 0, 0, '', 'test', 'tes', '2012-06-17 00:00:00', 3),
(23, 0, 0, 0, '', 'cccc', '', '0000-00-00 00:00:00', 1),
(24, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', 2),
(25, 0.330496, 101.039, 14, 'Jalan Sore', 'test...', 'Jalan Bukit Permai, Bangkinang Barat, Indonesia', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `TypeName`, `TypeParent`, `Icon`) VALUES
(1, 'Pendidikan', 0, 'http://google-maps-icons.googlecode.com/files/university.png'),
(2, 'Kesehatan', 0, ''),
(3, 'Ibadah', 0, ''),
(4, 'Pemerintahan', 0, ''),
(5, 'Komunikasi', 0, ''),
(6, 'Perdagangan dan Jasa', 0, ''),
(7, 'Transportasi', 0, ''),
(8, 'Taman', 0, '');

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
