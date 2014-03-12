-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-03-2014 a las 16:20:33
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `martyyo_ecam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `setcharts`
--

CREATE TABLE IF NOT EXISTS `setcharts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mscol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `axislocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptcol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charttype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `setcharts`
--

INSERT INTO `setcharts` (`id`, `mscol`, `axislocation`, `descriptcol`, `charttype`) VALUES
(1, 'ChWLDP', 'left', 'Chilled-Water Loop Differential Pressure', 'smoothedLine'),
(2, 'ChWLDSP', 'left', 'Chilled-Water Loop Differential Pressure Set Point', 'smoothedLine'),
(3, 'ChWRT', 'left', 'Chilled-Water Return Temp', 'smoothedLine'),
(4, 'ChWST', 'left', 'Chilled-Water Supply Temp', 'smoothedLine'),
(5, 'ChWSTSP', 'left', 'Chilled-Water Supply Temp', 'smoothedLine'),
(6, 'CCV', 'right', 'Cooling-Coil Valve Signal (%)', 'column'),
(7, 'ConskWH', 'left', 'Consumption kWH', 'smoothedLine'),
(8, 'DAT', 'left', 'Discharge-Air Temp', 'smoothedLine'),
(9, 'DATSP', 'left', 'Discharge-Air Temp Set Point', 'smoothedLine'),
(10, 'DSP', 'left', 'Duct Static Pressure', 'smoothedLine'),
(11, 'DSPSP', 'left', 'Duct Static Pressure Set Point', 'smoothedLine'),
(12, 'HCVS', 'right', 'Heating-Coil Valve Signal (%)', 'column'),
(13, 'HWLDP', 'left', 'Hot-Water Loop Differential Pressure', 'smoothedLine'),
(14, 'HWLDPSP', 'left', 'Hot-Water Loop Differential Pressure Set Point', 'smoothedLine'),
(15, 'HWRT', 'left', 'Hot-Water Return Temp', 'smoothedLine'),
(16, 'HWST', 'left', 'Hot-Water Supply Temp', 'smoothedLine'),
(17, 'HWSTSP', 'left', 'Hot-Water Supply Temp Set Point', 'smoothedLine'),
(18, 'MAT', 'left', 'Mixed-Air Temp', 'smoothedLine'),
(19, 'OM', 'right', 'Occupancy Mode', 'column'),
(20, 'OADPS', 'right', 'Outdoor-Air Damper Position Signal (%)', 'column'),
(21, 'OAF', 'right', 'Outdoor-Air Fraction temp', 'column'),
(22, 'OAT', 'left', 'Outdoor-Air Temp (temp)', 'smoothedLine'),
(23, 'RAT', 'left', 'Return-Air Temp', 'smoothedLine'),
(24, 'SFSpd', 'left', 'Supply-Fan Speed', 'smoothedLine'),
(25, 'SFS', 'right', 'Supply Fan Status (on/off)', 'column'),
(26, 'VAVDPSP', 'right', 'VAV Damper Position Set Point (%)', 'column'),
(27, 'ZDPS', 'left', 'Zone Damper Position Signal (%)', 'smoothedLine'),
(28, 'ZOM', 'right', 'Zone Occupancy Mode (Occupied/Unoccupied)', 'column'),
(29, 'ZRVS', 'right', 'Zone Reheat Valve Signal (%)', 'column'),
(30, 'ZT', 'left', 'Zone Temperature', 'smoothedLine'),
(31, 'ZONE', 'left', 'Zone', 'smoothedLine'),
(32, 'DAMPER', 'left', 'Damper', 'smoothedLine');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
