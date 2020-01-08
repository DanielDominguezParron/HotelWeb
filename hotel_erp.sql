-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2020 a las 21:22:32
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_erp`
--
CREATE DATABASE IF NOT EXISTS `hotel_erp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel_erp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `DNI` int(11) NOT NULL,
  `Name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
CREATE TABLE IF NOT EXISTS `habitaciones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Price` double NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Photo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`Id`, `Name`, `Price`, `Description`, `Photo`) VALUES
(1, 'Olympo', 300, 'Best room ever', '.\\IMG\\suite.jpg'),
(2, 'Olympo', 400, 'puti', '.\\IMG\\suite.jpg'),
(3, 'Olympo', 200, '', '.\\IMG\\suite.jpg'),
(4, 'Olympo', 100, '', '.\\IMG\\suite.jpg'),
(5, 'Casa del ....', 0, 'Que no sube lo que hace y luego dice de hacer a los demas', '.\\IMG\\suitered.jpg'),
(6, 'Casa de Javi', 0, 'Lloron', '.\\IMG\\suite.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `IdReserva` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  `TotalPrice` double NOT NULL,
  PRIMARY KEY (`IdReserva`),
  KEY `IdCliente` (`IdCliente`),
  KEY `IdHabitacion` (`IdHabitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_habitaciones`
--

DROP TABLE IF EXISTS `reserva_habitaciones`;
CREATE TABLE IF NOT EXISTS `reserva_habitaciones` (
  `BookingDate` date NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  KEY `IdReserva` (`IdReserva`),
  KEY `IdHabitacion` (`IdHabitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

DROP TABLE IF EXISTS `reseñas`;
CREATE TABLE IF NOT EXISTS `reseñas` (
  `IdReseña` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Opinion` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdReseña`),
  KEY `IdCliente` (`IdCliente`) USING BTREE,
  KEY `IdReserva` (`IdReserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE IF NOT EXISTS `trabajadores` (
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`name`, `surname`, `mail`, `password`, `DNI`) VALUES
('Paco', 'Gomez', 'paco@gmail.com', '1234', '11097685K'),
('w', 'w', 'w@w.com', 'w', '123456789');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`DNI`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`IdHabitacion`) REFERENCES `habitaciones` (`Id`);

--
-- Filtros para la tabla `reserva_habitaciones`
--
ALTER TABLE `reserva_habitaciones`
  ADD CONSTRAINT `reserva_habitaciones_ibfk_1` FOREIGN KEY (`IdReserva`) REFERENCES `reservas` (`IdReserva`),
  ADD CONSTRAINT `reserva_habitaciones_ibfk_2` FOREIGN KEY (`IdHabitacion`) REFERENCES `habitaciones` (`Id`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`IdReserva`) REFERENCES `reservas` (`IdReserva`),
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
