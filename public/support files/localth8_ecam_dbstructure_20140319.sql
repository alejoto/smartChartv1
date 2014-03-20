-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2014 at 01:57 AM
-- Server version: 5.5.36
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `localth8_ecam`
--
DROP DATABASE `localth8_ecam`;
CREATE DATABASE `localth8_ecam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `localth8_ecam`;

-- --------------------------------------------------------

--
-- Table structure for table `bfield_chart`
--

DROP TABLE IF EXISTS `bfield_chart`;
CREATE TABLE IF NOT EXISTS `bfield_chart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bfield_id` int(10) unsigned NOT NULL,
  `chart_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bfield_chart_bfield_id_index` (`bfield_id`),
  KEY `bfield_chart_chart_id_index` (`chart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Table structure for table `bfields`
--

DROP TABLE IF EXISTS `bfields`;
CREATE TABLE IF NOT EXISTS `bfields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `header` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tooltip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `bsystem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fieldclass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `placeholder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `axis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `buildingregisters`
--

DROP TABLE IF EXISTS `buildingregisters`;
CREATE TABLE IF NOT EXISTS `buildingregisters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datereading` date NOT NULL,
  `timereading` time NOT NULL,
  `dataset_id` int(11) NOT NULL,
  `a01OM` tinyint(1) DEFAULT NULL,
  `a02OAT` decimal(4,1) NOT NULL,
  `a03ZT` decimal(4,1) NOT NULL,
  `a04ZONE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a05ConskWH` decimal(3,0) DEFAULT NULL,
  `a06kWdemand` int(4) NOT NULL,
  `a07kWusage` int(4) NOT NULL,
  `b01ZRVS` decimal(3,0) NOT NULL,
  `b02DAT` decimal(4,1) NOT NULL,
  `b03DATSP` decimal(4,1) NOT NULL,
  `b04DSP` decimal(3,1) NOT NULL,
  `b05DSPSP` decimal(3,1) NOT NULL,
  `b06MAT` decimal(4,1) NOT NULL,
  `b07OADPS` decimal(3,0) NOT NULL,
  `b08OAF` decimal(3,0) NOT NULL,
  `b09RAT` decimal(4,1) NOT NULL,
  `b10SFSpd` decimal(4,0) NOT NULL,
  `b11SFS` tinyint(1) NOT NULL,
  `b12VAVDPSP` decimal(3,0) NOT NULL,
  `b13ZDPS` decimal(3,0) NOT NULL,
  `c01HCVS` decimal(3,0) DEFAULT NULL,
  `c02HWLDP` decimal(3,1) NOT NULL,
  `c03HWLDPSP` decimal(3,1) NOT NULL,
  `c04HWRT` decimal(4,1) NOT NULL,
  `c05HWST` decimal(4,1) NOT NULL,
  `c06HWSTSP` decimal(4,1) NOT NULL,
  `d01ChWLDP` decimal(3,1) NOT NULL,
  `d02ChWLDSP` decimal(3,1) NOT NULL,
  `d03ChWRT` decimal(4,1) NOT NULL,
  `d04ChWST` decimal(4,1) NOT NULL,
  `d05ChWSTSP` decimal(4,1) NOT NULL,
  `d06CCV` decimal(3,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18948 ;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chaptcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chaptdescrip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `charts`
--

DROP TABLE IF EXISTS `charts`;
CREATE TABLE IF NOT EXISTS `charts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chartcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chartname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `dampers`
--

DROP TABLE IF EXISTS `dampers`;
CREATE TABLE IF NOT EXISTS `dampers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buildingregister_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `datasets`
--

DROP TABLE IF EXISTS `datasets`;
CREATE TABLE IF NOT EXISTS `datasets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporalusers`
--

DROP TABLE IF EXISTS `temporalusers`;
CREATE TABLE IF NOT EXISTS `temporalusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bfield_chart`
--
ALTER TABLE `bfield_chart`
  ADD CONSTRAINT `bfield_chart_bfield_id_foreign` FOREIGN KEY (`bfield_id`) REFERENCES `bfields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bfield_chart_chart_id_foreign` FOREIGN KEY (`chart_id`) REFERENCES `charts` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
