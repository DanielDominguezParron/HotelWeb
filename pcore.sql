-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2019 a las 22:24:13
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
-- Base de datos: `pcore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `cliente` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `productos` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `cliente`, `productos`, `importe`) VALUES
(6, 'Paco', 'Mars Tacens', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int(10) UNSIGNED NOT NULL,
  `Referencia` varchar(45) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `Usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  `DescrShort` varchar(100) DEFAULT NULL,
  `Imagen` varchar(2000) DEFAULT NULL,
  `precio` decimal(65,0) DEFAULT NULL,
  `DescrLong` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Nombre`, `Categoria`, `DescrShort`, `Imagen`, `precio`, `DescrLong`) VALUES
(1, 'Mars Tacens', 'Cajas', 'Caja mars tacens de alta calidad', './IMG/Cajas/MarsTacens.jpg', '100', 'Caja con varios formatos compatibles, permite una gran accesibilidad, resiliencia y ventilacion. Hecha de materiales de primera calidad, ofrece medidas en tiempo real sobre el estado interno'),
(2, 'CR488', 'Cajas', 'Caja CR488 versatil y compacta', './IMG/Cajas/CR488.jpg', '200', 'Caja con varios formatos compatibles, permite una gran accesibilidad, resiliencia y ventilacion. Hecha de materiales de primera calidad, ofrece medidas en tiempo real sobre el estado interno'),
(3, 'w1', 'Discos', 'Disco compacto y veloz con alta resiliencia', '.\\IMG\\discos/w1.jpg', '500', 'Caja con varios formatos compatibles, permite una gran accesibilidad, resiliencia y ventilacion. Hecha de materiales de primera calidad, ofrece medidas en tiempo real sobre el estado interno'),
(4, 'Radeon 3', 'Tarjetas_Graficas', 'Gran relacion  calida precio', './IMG/GPU/1111.jpg', '145', 'Caja con varios formatos compatibles, permite una gran accesibilidad, resiliencia y ventilacion. Hecha de materiales de primera calidad, ofrece medidas en tiempo real sobre el estado interno'),
(5, 'Ventilador RGB LED PWM blanco', 'Ventiladores', 'Paquete de tres ventiladores con Lighting Node PRO', './IMG/ventiladores/ventilador.jpg', '99', 'El ventilador CORSAIR LL120 RGB LED PWM 120 mm White Smart incluye 16 LED RGB direccionables individualmente repartidos en dos halos de luz en una sensacional carcasa blanca, que crean sorprendentes efectos visuales y de iluminación.'),
(6, 'Gigabyte GeForce GTX 1050 ', 'Tarjetas_Graficas', 'Integrado con 2GB GDDR5 128bit de memoria', './IMG/GPU/gigabyte1.jpg', '136', 'WINDFORCE 2X with Blade Fan Design\r\nSupport up to 8K display 60Hz\r\nConectores de alimentación: no'),
(7, 'Nilox disquetera', 'Disqueteras', 'Permite iniciar el sistema operativo de la mayoría de equipos portátiles y de sobremesa', './IMG/disqueteras/nilox-disquetera-floppy-usb-externo.jpg', '18', 'Autoalimentada a través del cable USB, no requiere de un alimentador eléctrico\r\nAdecuada para transferir archivos y hacer copias de seguridad\r\nConexión a través de un cable USB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsrID` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Pass` varchar(20) NOT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsrID`, `Nombre`, `Pass`, `Apellido`, `Email`) VALUES
(1, 'Paco', '1234', 'Garcia', 'paco@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD UNIQUE KEY `idPago_UNIQUE` (`idPago`),
  ADD KEY `fk_Pagos_Usuarios1_idx` (`Usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD UNIQUE KEY `idProductos_UNIQUE` (`idProductos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsrID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsrID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_Pagos_Usuarios1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`UsrID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
