-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2010 at 06:32 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `datagis`
--

CREATE TABLE `datagis` (
  `nomor` int(5) NOT NULL auto_increment,
  `x` decimal(8,5) NOT NULL,
  `y` decimal(8,5) NOT NULL,
  `namalokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY  (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `datagis`
--

INSERT INTO `datagis` (`nomor`, `x`, `y`, `namalokasi`, `deskripsi`) VALUES
(2, -2.74412, 107.64525, 'Tanjung Pandan', '<b>Tanjung Pandan</b> adalah ibukota Kabupaten <b>Belitung</b>.<br>\r\nJumlah Penduduk : 1.255.817 jiwa<br>\r\n<img src=''mesjid.jpg''><br>\r\nMasjid di pantai tanjung Pendam'),
(8, -2.57127, 107.72215, 'Tanjung Tinggi', 'Merupakan tempat wisata di pulau belitung. Dengan pantai yang indah, bertebaran batu-batu granit yang besar, membuat tambah indah<br><img src=''tanjungtinggi.jpg>');
