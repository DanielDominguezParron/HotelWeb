-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2020 a las 21:06:10
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
CREATE DATABASE IF NOT EXISTS `hotel_erp` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `hotel_erp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI`, `name`, `surname`, `mail`) VALUES
('4321F', '4321f', '4321f', '4321f@4321f.com'),
('654321Q', 'Paul', 'Ferrer', 'paulf@gmail.com'),
('76542184p', 'paco', 'Sanchez', 'paco123@gmail.com'),
('78912345y', 'Susana', 'Sanchez', 'susanan@gmailcom'),
('98765432u', 'Pedro', 'Casado', 'pedrocasa@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `planta` set('1','2','3','4') COLLATE utf8_spanish_ci NOT NULL,
  `number` int(3) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `name`, `planta`, `number`, `price`, `description`, `photo`, `status`) VALUES
(1, 'Suite Madera', '1', 100, 300, 'Best room ever', '.\\IMG\\madera.jpg', 1),
(2, 'Olympo', '2', 201, 400, 'puti', '.\\IMG\\suiteimperial.jpg', 0),
(3, 'Olympo', '3', 321, 200, 'La habitación presenta una decoración elegante en tonos suaves. Disponen de aire acondicionado, minibar, caja fuerte, TV de pantalla plana vía satélite y WiFi gratuita.', '.\\IMG\\suite.jpg', 0),
(4, 'White Confort ', '1', 104, 142, '', '.\\IMG\\whiteconfort.jpg', 0),
(5, 'Mausoleo', '4', 423, 1000, 'La habitación es acogedora, con ambientación característica, presenta cama doble, con vistas al cementerio y a la playa, wifi, cocina, jacuzzi.\r\nComprando esta habitación el huésped podrá entrar a la zona Vip del spa.', '.\\IMG\\suitered.jpg', 0),
(6, 'Casa de Javi', '4', 450, 200, 'Lloron', '.\\IMG\\modern.jpg', 0),
(7, 'Suite Simple', '2', 211, 35, 'Habitación romantica sencilla y minimalista\r\nWifi, tv 55 pulgadas, baño jacuzzi, vistas al mar.', '.\\IMG\\simple.jpg', 0),
(8, 'Suite todo en uno', '1', 121, 55, 'Habitación grande, todo unido, para toda clase de huespedes, con cocina, wifi, baño jacuzzi, camas dobles, con vistas a patio interior', '.\\IMG\\todoenuno.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `IdReserva` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  `TotalPrice` double NOT NULL,
  PRIMARY KEY (`IdReserva`),
  KEY `IdHabitacion` (`IdHabitacion`),
  KEY `IdCliente` (`IdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`IdReserva`, `IdCliente`, `IdHabitacion`, `TotalPrice`) VALUES
(1, '78912345y', 1, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_habitaciones`
--

DROP TABLE IF EXISTS `reserva_habitaciones`;
CREATE TABLE IF NOT EXISTS `reserva_habitaciones` (
  `BookingDate` date NOT NULL,
  `LeavingDate` date NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  KEY `IdReserva` (`IdReserva`),
  KEY `IdHabitacion` (`IdHabitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reserva_habitaciones`
--

INSERT INTO `reserva_habitaciones` (`BookingDate`, `LeavingDate`, `IdReserva`, `IdHabitacion`) VALUES
('2020-01-10', '2020-01-14', 1, 1);

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
('w', 'w', 'w@w.com', 'w', '123456789'),
('pepe', 'Sanchez', 'pepeixntl@gmail.com', 'pepe1234', '12345678h'),
('Javier', 'admin', 'jg@gmailcom', 'admin', '12345689H'),
('qwerty', 'qwerty', 'qwerty@qwerty', 'qwerty123', '123Q'),
('Dani', 'Velazquez', 'danivel@gmail.com', '543219876', '32109876D'),
('John', 'Wick', 'john54321@john54321.com', 'john54321', '54321Y'),
('Pablo', 'Iglesias', 'pablito@clavito.com', 'pablito123', '76512184P'),
('Pedro', 'Sanchez', 'pedrosan@gmail.com', 'pedrito12345', '7652184P'),
('Jorge', 'Sanchez', 'jorge123@gmail.com', 'jorge123', '765432184');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

DROP TABLE IF EXISTS `valoraciones`;
CREATE TABLE IF NOT EXISTS `valoraciones` (
  `IdValoracion` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Opinion` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdValoracion`),
  KEY `IdReserva` (`IdReserva`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`IdValoracion`, `IdCliente`, `IdReserva`, `Description`, `Opinion`) VALUES
(2, 78912345, 1, 'Me ha encantado la estancia, volveria', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva_habitaciones`
--
ALTER TABLE `reserva_habitaciones`
  ADD CONSTRAINT `reserva_habitaciones_ibfk_1` FOREIGN KEY (`IdReserva`) REFERENCES `reservas` (`IdReserva`),
  ADD CONSTRAINT `reserva_habitaciones_ibfk_2` FOREIGN KEY (`IdHabitacion`) REFERENCES `habitaciones` (`id`);

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`IdReserva`) REFERENCES `reservas` (`IdReserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
