-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2020 a las 13:34:06
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

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
CREATE DATABASE IF NOT EXISTS hotel_erp`;
USE hotel_erp;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `DNI` int(11) NOT NULL,
  `Name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE IF NOT EXISTS `habitaciones` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Price` double NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Photo` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`Id`, `Name`, `Price`, `Description`, `Photo`) VALUES
(1, 'Olympo', 300, 'Best room ever', '.\\IMG\\suite.jpg'),
(2, 'Olympo', 400, 'puti', '.\\IMG\\suite.jpg'),
(3, 'Olympo', 200, '', '.\\IMG\\suite.jpg'),
(4, 'Olympo', 100, '', '.\\IMG\\suite.jpg'),
(5, 'Casa de Javi', 0, 'Lloron', '.\\IMG\\suite.jpg'),
(6, 'Casa de Javi', 0, 'Lloron', '.\\IMG\\suite.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `IdReserva` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  `TotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_habitaciones`
--

CREATE TABLE IF NOT EXISTS `reserva_habitaciones` (
  `BookingDate` date NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE IF NOT EXISTS `reseñas` (
  `IdReseña` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Opinion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE IF NOT EXISTS `trabajadores` (
  `Name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`Name`, `Surname`, `Mail`, `Password`, `DNI`) VALUES
('Paco', 'Gomez', 'paco@gmail.com', '1234', '11097685K');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`IdReserva`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdHabitacion` (`IdHabitacion`);

--
-- Indices de la tabla `reserva_habitaciones`
--
ALTER TABLE `reserva_habitaciones`
  ADD KEY `IdReserva` (`IdReserva`),
  ADD KEY `IdHabitacion` (`IdHabitacion`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`IdReseña`),
  ADD KEY `IdCliente` (`IdCliente`) USING BTREE,
  ADD KEY `IdReserva` (`IdReserva`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `IdReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `IdReseña` int(11) NOT NULL AUTO_INCREMENT;

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
