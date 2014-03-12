-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-03-2014 a las 17:54:38
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
-- Estructura de tabla para la tabla `bfield_chart`
--

CREATE TABLE IF NOT EXISTS `bfield_chart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bfield_id` int(10) unsigned NOT NULL,
  `chart_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bfield_chart_bfield_id_index` (`bfield_id`),
  KEY `bfield_chart_chart_id_index` (`chart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=141 ;

--
-- Volcado de datos para la tabla `bfield_chart`
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
(69, 14, 27),
(70, 21, 28),
(71, 9, 29),
(72, 10, 29);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bfield_chart`
--
ALTER TABLE `bfield_chart`
  ADD CONSTRAINT `bfield_chart_bfield_id_foreign` FOREIGN KEY (`bfield_id`) REFERENCES `bfields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bfield_chart_chart_id_foreign` FOREIGN KEY (`chart_id`) REFERENCES `charts` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
