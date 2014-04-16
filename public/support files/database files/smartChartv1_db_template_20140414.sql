-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2014 at 01:32 AM
-- Server version: 5.5.37-log
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `localth8_ecam`
--
CREATE DATABASE IF NOT EXISTS `localth8_ecam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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

--
-- Dumping data for table `bfield_chart`
--

INSERT INTO `bfield_chart` (`id`, `bfield_id`, `chart_id`) VALUES
(1, 4, 1),
(2, 6, 1),
(3, 11, 1),
(4, 6, 2),
(5, 11, 2),
(6, 5, 2),
(7, 16, 3),
(8, 17, 3),
(9, 18, 3),
(10, 5, 3),
(11, 5, 4),
(12, 17, 4),
(13, 18, 4),
(14, 5, 5),
(15, 19, 5),
(16, 17, 5),
(17, 5, 6),
(18, 17, 6),
(19, 35, 7),
(20, 13, 7),
(21, 17, 7),
(22, 5, 7),
(23, 35, 8),
(24, 17, 8),
(25, 5, 8),
(26, 35, 9),
(27, 17, 9),
(28, 12, 10),
(29, 16, 10),
(30, 5, 10),
(31, 17, 10),
(32, 33, 11),
(33, 22, 11),
(34, 5, 11),
(35, 31, 12),
(36, 5, 12),
(37, 31, 13),
(38, 33, 13),
(39, 5, 13),
(40, 30, 14),
(41, 31, 14),
(42, 5, 14),
(43, 30, 15),
(44, 33, 15),
(45, 26, 16),
(46, 5, 16),
(47, 25, 17),
(48, 26, 17),
(49, 5, 17),
(50, 23, 18),
(51, 22, 18),
(52, 5, 19),
(53, 15, 19),
(54, 16, 19),
(55, 4, 19),
(56, 5, 20),
(57, 15, 20),
(58, 4, 20),
(59, 12, 21),
(60, 13, 21),
(61, 14, 22),
(62, 22, 23),
(63, 10, 26),
(64, 13, 24),
(65, 12, 25),
(66, 13, 25),
(67, 5, 25),
(68, 11, 26),
(70, 21, 28),
(71, 9, 29),
(72, 10, 29);

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

--
-- Dumping data for table `bfields`
--

INSERT INTO `bfields` (`id`, `name`, `header`, `tooltip`, `display`, `bsystem`, `fieldclass`, `placeholder`, `axis`, `charttype`, `created_at`, `updated_at`) VALUES
(1, 'datereading', 'Date', 'Date', 0, 'register', '', '', '', '', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(2, 'timereading', 'Time', 'Time', 0, 'register', '', '', '', '', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(3, 'dataset_id', 'data set', 'data set', 0, 'register', '', '', '', '', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(4, 'a01OM', 'OM', 'Occupancy Mode', 1, 'building info', '', '1 / 0', 'right', 'column', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(5, 'a02OAT', 'OAT', 'Outdoor-Air Temp (temp)', 1, 'building info', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(6, 'a03ZT', 'ZT', 'Zone Temperature', 1, 'building info', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(7, 'a04ZONE', 'ZONE', 'Zone', 1, 'building info', '', 'zone name', '', '', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(8, 'a05ConskWH', 'ConskWH', 'Consumption kWH', 1, 'building info', 'floatnumber', 'kW/h', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(9, 'a06kWdemand', 'kW Demand', 'kW Demand', 1, 'building info', 'floatnumber', 'kW', 'right', 'smoothedLine', '2014-03-10 05:00:00', '2014-03-10 05:00:00'),
(10, 'a07kWusage', 'kW Usage', 'kW Usage', 1, 'building info', 'floatnumber', 'kW', 'right', 'smoothedLine', '2014-03-10 05:00:00', '2014-03-10 05:00:00'),
(11, 'b01ZRVS', 'ZRVS', 'Zone Reheat Valve Signal (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', 'right', 'column', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(12, 'b02DAT', 'DAT', 'Discharge-Air Temp', 1, 'Air handle unit', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(13, 'b03DATSP', 'DATSP', 'Discharge-Air Temp Set Point', 1, 'Air handle unit', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(14, 'b04DSP', 'DSP', 'Duct Static Pressure', 1, 'Air handle unit', 'floatnumber', 'wc', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(15, 'b05DSPSP', 'DSPSP', 'Duct Static Pressure Set Point', 1, 'Air handle unit', 'floatnumber', 'wc', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(16, 'b06MAT', 'MAT', 'Mixed-Air Temp', 1, 'Air handle unit', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(17, 'b07OADPS', 'OADPS', 'Outdoor-Air Damper Position Signal (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(18, 'b08OAF', 'OAF', 'Outdoor-Air Fraction (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(19, 'b09RAT', 'RAT', 'Return-Air Temp', 1, 'Air handle unit', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(20, 'b10SFSpd', 'SFSpd', 'Supply-Fan Speed (rpm)', 1, 'Air handle unit', 'floatnumber', 'rpm', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(21, 'b11SFS', 'SFS', 'Supply Fan Status (on/off)', 1, 'Air handle unit', '', '1 0', 'right', 'column', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(22, 'b12VAVDPSP', 'VAVDPSP', 'VAV Damper Position Set Point (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(23, 'b13ZDPS', 'ZDPS', 'Zone Damper Position Signal (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(24, 'c01HCVS', 'HCVS', 'Heating-Coil Valve Signal (%)', 1, 'Hot water system', 'floatnumber', 'Percent%', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(25, 'c02HWLDP', 'HWLDP', 'Hot-Water Loop Differential Pressure', 1, 'Hot water system', 'floatnumber', 'psi', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(26, 'c03HWLDPSP', 'HWLDPSP', 'Hot-Water Loop Differential Pressure Set Point', 1, 'Hot water system', 'floatnumber', 'psi', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(27, 'c04HWRT', 'HWRT', 'Hot-Water Return Temp', 1, 'Hot water system', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(28, 'c05HWST', 'HWST', 'Hot-Water Supply Temp', 1, 'Hot water system', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(29, 'c06HWSTSP', 'HWSTSP', 'Hot-Water Supply Temp Set Point', 1, 'Hot water system', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(30, 'd01ChWLDP', 'ChWLDP', 'Chilled-Water Loop Differential Pressure', 1, 'Chilled water system', 'floatnumber', 'psi', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(31, 'd02ChWLDSP', 'ChWLDSP', 'Chilled-Water Loop Differential Pressure Set Point', 1, 'Chilled water system', 'floatnumber', 'psi', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(32, 'd03ChWRT', 'ChWRT', 'Chilled-Water Return Temp', 1, 'Chilled water system', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(33, 'd04ChWST', 'ChWST', 'Chilled-Water Supply Temp', 1, 'Chilled water system', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(34, 'd05ChWSTSP', 'ChWSTSP', 'Chilled-Water Supply Temp set point', 1, 'Chilled water system', 'floatnumber', '', 'left', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(35, 'd06CCV', 'CCV', 'Cooling-Coil Valve Signal (%)', 1, 'Chilled water system', 'floatnumber', 'Percent%', 'right', 'smoothedLine', '2014-02-15 05:00:00', '2014-02-15 05:00:00');

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

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chaptcode`, `chaptdescrip`, `created_at`, `updated_at`) VALUES
(1, 'zh_cc', 'Zone Heating & Cooling Control', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'as_cc', 'Air Side Economizer Option', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ahuh_cc', 'AHU Heating & Cooling Control', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'cup_cc', 'Central Utility Plant Cooling Control', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'cup_cc', 'Central Utility Plant Heating Control', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'ahumo_cc', 'AHU Minimum Outdoor-Air Operation', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'ahus_cc', 'AHU Static Pressure Control', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'ahuda_cc', 'AHU Discharge-Air Temperature Control', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '_cc', 'Occupancy Scheduling & KW consumption', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `charts`
--

INSERT INTO `charts` (`id`, `chartcode`, `chartname`, `chapter_id`, `created_at`, `updated_at`) VALUES
(1, 'occup', 'Occupancy, Reheat Valve Signal, Zone Temperature', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'outdo1', 'Outdoor-Air Temperature, Reheat Valve Signal, Zone Temperature', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'mixed', 'Mixed-Air Temperature, Outdoor-Air Damper Position Signal, Outdoor-Air Fraction, Outdoor-Air Temperature, Return-Air Temperature', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'outdo2', 'Outdoor-Air Damper Position Signal, Outdoor-Air Fraction, Outdoor-Air Temperature', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'outdo3', 'Outdoor-Air Damper Position Signal, Outdoor-Air Temperature, Return-Air Temperature', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'outdo4', 'Outdoor-Air Damper Position Signal, Outdoor-Air Temperature', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'cool1', 'Cooling-Coil Valve Signal, Discharge-Air Temperature Set Point, Outdoor-Air Damper Position, Outdoor-Air Temperature', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'cool2', 'Cooling-Coil Valve Signal, Outdoor-Air Damper Position Signal, Outdoor-Air Temperature', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'cool3', 'Cooling-Coil Valve Signal, Outdoor-Air Damper Position Signal', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'disc1', 'Discharge-Air Temperature, Mixed-Air Temperature, Outdoor-Air Temperature, Return-Air Temperature', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'cool4', 'Cooling-Coil Valve Signal, Heating-Coil Valve Signal, Outdoor-Air Temperature', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'chill1', 'Chilled-Water Supply Temperature, Outside-Air Temperature', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'chill2', 'Chilled-Water Supply Temperature, Cooling-Coil Valve Signal, Outside-Air Temperature', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'chill3', 'Chilled-Water Return Temperature, Chilled-Water Supply Temperature, Outside-Air Temperature', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'chill4', 'Chilled-Water Loop Differential Pressure, Cooling-Coil Valve Signal', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'hot-1', 'Hot-Water Supply Temp, Outdoor-Air Temperature', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'hot-2', 'Hot-Water Return Temp, Hot-Water Supply Temp, Outdoor-Air Temperature', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'hot-3', 'Hot-Water Loop Differential Pressure, Heating-Coil Valve Signal', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'outdo5', 'Outdoor-Air Damper Position Signal, Outdoor-Air Fraction, Outdoor-Air Temperature, Occupancy Mode', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'outdo6', 'Outdoor-Air Damper Position Signal, Outdoor-Air Temperature, Occupancy Mode', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'duct1', 'Duct Static Pressure, Duct Static Pressure Set Point', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'duct2', 'Duct Static Pressure', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'vavd', 'VAV Damper Position Set Point (by Damper)', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'disc2', 'Discharge-Air Temperature, Discharge-Air Temperature Set Point', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'disc3', 'Discharge-Air Temperature, Discharge-Air Temperature Set Point, Outdoor-Air Temperature', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'zone', 'Zone Reheat Valve Signal (by Zone)', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'suppl', 'Supply Fan Status', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Kws', 'KWs consumption', 9, '2014-03-10 05:00:00', '2014-03-10 05:00:00');

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

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_11_08_020047_create_chapters_table', 1),
('2013_11_08_024720_create_charts_table', 2),
('2013_11_08_224538_create_users_table', 3),
('2013_11_14_073521_create_buildingmeasurements_table', 4),
('2013_11_14_082552_create_measurements_table', 5),
('2013_11_29_215240_create_setcharts_table', 6),
('2013_11_30_155542_create_pages_table', 7),
('2014_02_12_192849_create_datasets_table', 8),
('2014_02_13_143307_create_temporalusers_table', 9),
('2014_02_14_171438_create_buildingregisters_table', 10),
('2014_02_15_053959_create_dampers_table', 10),
('2014_02_15_152117_create_bfields_table', 11),
('2014_02_15_202237_add_fieldclass_to_bfields_table', 12),
('2014_02_15_203945_add_placeholder_to_bfields_table', 13),
('2014_02_20_222957_add_axis_to_bfields_table', 14),
('2014_02_20_223053_add_charttype_to_bfields_table', 15),
('2014_02_20_230806_pivot_bfield_chart_table', 16),
('2014_03_10_163158_add_a06kwdemand_to_buildingregisters_table', 17),
('2014_03_10_165512_add_a07kwusage_to_buildingregisters_table', 18);

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

--
-- Dumping data for table `temporalusers`
--

INSERT INTO `temporalusers` (`id`, `email`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(1, 'user@localhost', 'Default', 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
