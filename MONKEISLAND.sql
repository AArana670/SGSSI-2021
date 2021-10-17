-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2021 at 02:38 PM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MONKEISLAND`
--

-- --------------------------------------------------------

--
-- Table structure for table `MONKE`
--

CREATE TABLE `MONKE` (
  `MONKID` varchar(20) NOT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `RAZA` varchar(30) DEFAULT NULL,
  `SEXO` char(1) DEFAULT NULL,
  `PELIGRO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MONKE`
--

INSERT INTO `MONKE` (`MONKID`, `NOMBRE`, `RAZA`, `SEXO`, `PELIGRO`) VALUES
('MONKE0', 'BANANA', 'MAKAKO', 'H', 0);

-- --------------------------------------------------------

--
-- Table structure for table `SOCIO`
--

CREATE TABLE `SOCIO` (
  `DNI` varchar(20) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `FECHANAC` varchar(20) NOT NULL,
  `EMAIL` varchar(20) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `CONTRASENA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SOCIO`
--

INSERT INTO `SOCIO` (`DNI`, `NOMBRE`, `TELEFONO`, `FECHANAC`, `EMAIL`, `USUARIO`, `CONTRASENA`) VALUES
('123456789', 'Julia', '123123123', '2002-02-02', 'julia@gmail.com', 'Julia', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MONKE`
--
ALTER TABLE `MONKE`
  ADD PRIMARY KEY (`MONKID`);

--
-- Indexes for table `SOCIO`
--
ALTER TABLE `SOCIO`
  ADD PRIMARY KEY (`CONTRASENA`,`USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
