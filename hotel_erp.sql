-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2020 a las 18:34:22
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DNI`, `name`, `surname`, `mail`) VALUES
('78912345y', 'Susana', 'Sanchez', 'susanan@gmailcom'),
('98765432u', 'Pedro', 'Casado', 'pedrocasa@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `planta` set('1','2','3','4') COLLATE utf8_spanish_ci NOT NULL,
  `number` int(3) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `name`, `planta`, `number`, `price`, `description`, `photo`, `status`) VALUES
(1, 'Suite Madera', '1', 100, 300, 'Best room ever', '.\\IMG\\madera.jpg', 1),
(2, 'Olympo', '2', 201, 400, 'puti', '.\\IMG\\suiteimperial.jpg', 0),
(3, 'Olympo', '3', 321, 200, 'La habitación presenta una decoración elegante en tonos suaves. Disponen de aire acondicionado, minibar, caja fuerte, TV de pantalla plana vía satélite y WiFi gratuita.', '.\\IMG\\suite.jpg', 0),
(4, 'casi Olympo ', '1', 104, 100, '', '.\\IMG\\suite.jpg', 0),
(5, 'Mausoleo', '4', 423, 1000, 'La habitación es acogedora, con ambientación característica, presenta cama doble, con vistas al cementerio y a la playa, wifi, cocina, jacuzzi.\r\nComprando esta habitación el huésped podrá entrar a la zona Vip del spa.', '.\\IMG\\suitered.jpg', 0),
(6, 'Casa de Javi', '4', 450, 1, 'Lloron', '.\\IMG\\modern.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `IdReserva` int(11) NOT NULL,
  `IdCliente` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  `TotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`IdReserva`, `IdCliente`, `IdHabitacion`, `TotalPrice`) VALUES
(1, '78912345y', 1, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_habitaciones`
--

CREATE TABLE `reserva_habitaciones` (
  `BookingDate` date NOT NULL,
  `LeavingDate` date NOT NULL,
  `IdReserva` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reserva_habitaciones`
--

INSERT INTO `reserva_habitaciones` (`BookingDate`, `LeavingDate`, `IdReserva`, `IdHabitacion`) VALUES
('2020-01-10', '2020-01-14', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
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

CREATE TABLE `trabajadores` (
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`name`, `surname`, `mail`, `password`, `DNI`) VALUES
('Paco', 'Gomez', 'paco@gmail.com', '1234', '11097685K'),
('w', 'w', 'w@w.com', 'w', '123456789'),
('Javier', 'admin', 'jg@gmailcom', 'admin', '12345689H'),
('Dani', 'Velazquez', 'danivel@gmail.com', '543219876', '32109876D');

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`IdReserva`),
  ADD KEY `IdHabitacion` (`IdHabitacion`),
  ADD KEY `IdCliente` (`IdCliente`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `IdReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `IdReseña` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`IdReserva`) REFERENCES `reservas` (`IdReserva`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
