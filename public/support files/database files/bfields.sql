-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-02-2014 a las 15:07:24
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
-- Estructura de tabla para la tabla `bfields`
--

CREATE TABLE IF NOT EXISTS `bfields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `header` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tooltip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `bsystem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fieldclass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `placeholder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `bfields`
--

INSERT INTO `bfields` (`id`, `name`, `header`, `tooltip`, `display`, `bsystem`, `fieldclass`, `placeholder`, `created_at`, `updated_at`) VALUES
(1, 'datereading', 'Date', 'Date', 0, 'register', '', '', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(2, 'timereading', 'Time', 'Time', 0, 'register', '', '', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(3, 'dataset_id', 'data set', 'data set', 0, 'register', '', '', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(4, 'a01OM', 'OM', 'Occupancy Mode', 1, 'building info', '', '1/0', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(5, 'a02OAT', 'OAT', 'Outdoor-Air Temp (temp)', 1, 'building info', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(6, 'a03ZT', 'ZT', 'Zone Temperature', 1, 'building info', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(7, 'a04ZONE', 'ZONE', 'Zone', 1, 'building info', '', 'zone name', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(8, 'a05ConskWH', 'ConskWH', 'Consumption kWH', 1, 'building info', 'floatnumber', 'kW/h', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(9, 'b01ZRVS', 'ZRVS', 'Zone Reheat Valve Signal (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(10, 'b02DAT', 'DAT', 'Discharge-Air Temp', 1, 'Air handle unit', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(11, 'b03DATSP', 'DATSP', 'Discharge-Air Temp Set Point', 1, 'Air handle unit', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(12, 'b04DSP', 'DSP', 'Duct Static Pressure', 1, 'Air handle unit', 'floatnumber', 'wc', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(13, 'b05DSPSP', 'DSPSP', 'Duct Static Pressure Set Point', 1, 'Air handle unit', 'floatnumber', 'wc', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(14, 'b06MAT', 'MAT', 'Mixed-Air Temp', 1, 'Air handle unit', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(15, 'b07OADPS', 'OADPS', 'Outdoor-Air Damper Position Signal (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(16, 'b08OAF', 'OAF', 'Outdoor-Air Fraction (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(17, 'b09RAT', 'RAT', 'Return-Air Temp', 1, 'Air handle unit', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(18, 'b10SFSpd', 'SFSpd', 'Supply-Fan Speed (rpm)', 1, 'Air handle unit', 'floatnumber', 'rpm', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(19, 'b11SFS', 'SFS', 'Supply Fan Status (on/off)', 1, 'Air handle unit', '', '1/0', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(20, 'b12VAVDPSP', 'VAVDPSP', 'VAV Damper Position Set Point (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(21, 'b13ZDPS', 'ZDPS', 'Zone Damper Position Signal (%)', 1, 'Air handle unit', 'floatnumber', 'Percent%', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(22, 'c01HCVS', 'HCVS', 'Heating-Coil Valve Signal (%)', 1, 'Hot water system', 'floatnumber', 'Percent%', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(23, 'c02HWLDP', 'HWLDP', 'Hot-Water Loop Differential Pressure', 1, 'Hot water system', 'floatnumber', 'psi', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(24, 'c03HWLDPSP', 'HWLDPSP', 'Hot-Water Loop Differential Pressure Set Point', 1, 'Hot water system', 'floatnumber', 'psi', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(25, 'c04HWRT', 'HWRT', 'Hot-Water Return Temp', 1, 'Hot water system', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(26, 'c05HWST', 'HWST', 'Hot-Water Supply Temp', 1, 'Hot water system', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(27, 'c06HWSTSP', 'HWSTSP', 'Hot-Water Supply Temp Set Point', 1, 'Hot water system', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(28, 'd01ChWLDP', 'ChWLDP', 'Chilled-Water Loop Differential Pressure', 1, 'Chilled water system', 'floatnumber', 'psi', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(29, 'd02ChWLDSP', 'ChWLDSP', 'Chilled-Water Loop Differential Pressure Set Point', 1, 'Chilled water system', 'floatnumber', 'psi', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(30, 'd03ChWRT', 'ChWRT', 'Chilled-Water Return Temp', 1, 'Chilled water system', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(31, 'd04ChWST', 'ChWST', 'Chilled-Water Supply Temp', 1, 'Chilled water system', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(32, 'd05ChWSTSP', 'ChWSTSP', 'Chilled-Water Supply Temp set point', 1, 'Chilled water system', 'floatnumber', '°F', '2014-02-15 05:00:00', '2014-02-15 05:00:00'),
(33, 'd06CCV', 'CCV', 'Cooling-Coil Valve Signal (%)', 1, 'Chilled water system', 'floatnumber', 'Percent%', '2014-02-15 05:00:00', '2014-02-15 05:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
