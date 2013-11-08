<?php
	$dbhost = 'mysql301.opentransfer.com';              //STAGING MySQL host
	$dbuser = 'martyyo_ecamuser';                       //STAGING MySQL user name
	$dbpass = 'QKAa3uWy6ppV';                           //STAGING MySQL password
	$dbname = 'martyyo_ecam';                           //STAGING MySQL database name
?>



-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2013 at 01:16 AM
-- Server version: 5.1.68-community-log
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `martyyo_ecam`
--

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE IF NOT EXISTS `measurements` (
  `data_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `entered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp record created',
  `changed_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'timestamp of last row change',
  `DATE_READING` date NOT NULL COMMENT 'Date on which the readings in the current row were collected',
  `TIME_READING` time NOT NULL COMMENT 'Time at which the readings in the current row were collected',
  `ChWLDP` float DEFAULT NULL COMMENT 'Chilled-Water Loop Differential Pressure (ChWLDP) as Float',
  `ChWLDSP` float DEFAULT NULL COMMENT 'Chilled-Water Loop Differential Pressure Set Point (ChWLDPSP) as  FLOAT',
  `ChWRT` float DEFAULT NULL COMMENT 'Chilled-Water Return Temp (ChWRT) as Temp (F)',
  `ChWST` float DEFAULT NULL COMMENT 'Chilled-Water Supply Temp (ChWST) as Temp (F)',
  `ChWSTSP` float DEFAULT NULL COMMENT 'Chilled-Water Supply Temp Set Point (ChWSTSP) as Temp (F)',
  `CCV` float DEFAULT NULL COMMENT 'Cooling-Coil Valve Signal (CCV) as %',
  `ConskWH` float DEFAULT NULL COMMENT 'Consumption (ConskWH) as  FLOAT',
  `DAT` float DEFAULT NULL COMMENT 'Discharge-Air Temp (DAT) as Temp (F)',
  `DATSP` float DEFAULT NULL COMMENT 'Discharge-Air Temp Set Point (DATSP) as Temp (F)',
  `DSP` float DEFAULT NULL COMMENT 'Duct Static Pressure (DSP) as  FLOAT',
  `DSPSP` float DEFAULT NULL COMMENT 'Duct Static Pressure Set Point (DSPSP) as  FLOAT',
  `HCVS` float DEFAULT NULL COMMENT 'Heating-Coil Valve Signal (HCVS) as %',
  `HWLDP` float DEFAULT NULL COMMENT 'Hot-Water Loop Differential Pressure (HWLDP) as  FLOAT',
  `HWLDPSP` float DEFAULT NULL COMMENT 'Hot-Water Loop Differential Pressure Set Point (HWLDPSP) as  FLOAT',
  `HWRT` float DEFAULT NULL COMMENT 'Hot-Water Return Temp (HWRT) as Temp (F)',
  `HWST` float DEFAULT NULL COMMENT 'Hot-Water Supply Temp (HWST) as Temp (F)',
  `HWSTSP` float DEFAULT NULL COMMENT 'Hot-Water Supply Temp Set Point (HWSTSP) as Temp (F)',
  `MAT` float DEFAULT NULL COMMENT 'Mixed-Air Temp (MAT) as Temp (F)',
  `OM` tinyint(1) DEFAULT NULL COMMENT 'Occupancy Mode (OM) as boolean (Occupied/Unoccupied)',
  `OADPS` float DEFAULT NULL COMMENT 'Outdoor-Air Damper Position Signal (OADPS) as %',
  `OAF` float DEFAULT NULL COMMENT 'Outdoor-Air Fraction (OAF) as Temp (F)',
  `OAT` float DEFAULT NULL COMMENT 'Outdoor-Air Temp (OAT) as Temp (F)',
  `RAT` float DEFAULT NULL COMMENT 'Return-Air Temp (RAT) as Temp (F)',
  `SFSpd` float DEFAULT NULL COMMENT 'Supply-Fan Speed (SFSpd) as  FLOAT',
  `SFS` tinyint(1) DEFAULT NULL COMMENT 'Supply Fan Status (SFS) as boolean (On/Off)',
  `VAVDPSP` float DEFAULT NULL COMMENT 'VAV Damper Position Set Point (VAVDPSP) as %',
  `ZDPS` float DEFAULT NULL COMMENT 'Zone Damper Position Signal (ZDPS) as %',
  `ZOM` tinyint(1) DEFAULT NULL COMMENT 'Zone Occupancy Mode (ZOM) as boolean (Occupied/Unoccupied)',
  `ZRVS` float DEFAULT NULL COMMENT 'Zone Reheat Valve Signal (ZRVS) as %',
  `ZT` float DEFAULT NULL COMMENT 'Zone Temperature (ZT) as Temp (F)',
  `ZONE` text COMMENT 'Zone (name) as Text',
  `DAMPER` text COMMENT 'Damper (name) as Text',
  PRIMARY KEY (`data_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000510 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(7) NOT NULL AUTO_INCREMENT,
  `moodle_id` varchar(10) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `building_name` varchar(50) DEFAULT NULL,
  `time_open_operations` time DEFAULT NULL COMMENT 'Earliest time the building opens for occupancy/use',
  `time_close_operations` time DEFAULT NULL COMMENT 'Time after which the business is closed for occupation/use',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `moodle_id` (`moodle_id`),
  KEY `full_name` (`full_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000001 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `moodle_id`, `full_name`, `building_name`, `time_open_operations`, `time_close_operations`) VALUES
(1000000, 'dR8&zp#T21', 'Hieronymous Bosch', NULL, NULL, NULL);
