-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2020 a las 00:02:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaferreteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `numPedido` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`numPedido`, `codpro`, `can`) VALUES
(1, 2, 2),
(1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIOUNITARIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCARGADO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES
(1, 10, 1, '2500000.00', 1, 0),
(2, 10, 2, '1500000.00', 1, 0),
(3, 10, 3, '1850000.00', 1, 0),
(4, 11, 1, '2500000.00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuestrosproductos`
--

CREATE TABLE `nuestrosproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nuestrosproductos`
--

INSERT INTO `nuestrosproductos` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(1, 'Allanadora de concreto', '2500000.00', 'Allanadora de concreto para pulir pisos de cemento, deja un acabado liso o riguroso ideal para parqueaderos.\r\n\r\nCantidad disponibles: 10 unidades', 'allanadora.jpg'),
(2, 'Cortadora de diamante', '1500000.00', 'Cortadora de diamante manual eléctrica en seco, profundida de corte de hasta de 120 mm, es la cortadora mas segura del mundo, cuchilla de 305 mm.\r\n\r\n\r\nCantidad disponibles: 5 unidades', 'cortadora.jpg'),
(3, 'Cortadora de pavimento', '1850000.00', 'Cortadora de pavimento para cortes lineales y perfectos, entre 5 y 10 metros de profundidad.\r\n\r\n\r\nCantidad disponibles: 7 unidades', 'cortaPavimento.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `numPedido` int(11) NOT NULL,
  `codCli` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`numPedido`, `codCli`, `fecha`) VALUES
(1, '2', '2020-01-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codpro` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `detalle` varchar(1000) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codpro`, `descripcion`, `precio`, `stock`, `estado`, `detalle`, `imagen`) VALUES
(1, 'Allanadora', '180.00', 15, 'Normal', 'Allanadora con presion de 100 pci', 'allanadora.jpg'),
(2, 'Cortadora', '1.20', 20, 'Oferta', 'Cortado en acero inoxidable con chuchillas afiladas', 'cortadora.jpg'),
(3, 'corta pavimento', '800.00', 30, 'Normal', 'Corta pavimento con disco en aluminio', 'cortaPavimento.jpg'),
(4, 'Demoledor', '400.00', 27, 'Normal', 'Demoledor con pistones de gran potencia', 'demoledor.jpg'),
(5, 'Herramientas menores', '30.00', 42, 'Oferta', 'Variedades de herramientas como pico, pala etc', 'herramientasMenores.jpg'),
(6, 'Mezcladora', '500.00', 16, 'Normal', 'Mezcladora con gran poder de rotacion', 'mezcladora.jpg'),
(7, 'Pluma Grua', '3500.00', 26, 'Normal', 'Maquinaria para construccion', 'PlumaGrua.jpg'),
(8, 'RotoMartillo', '180.00', 22, 'Normal', 'Roto Martillo con punta de diamante', 'rotomartillo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ian', '$2y$10$gEyeZhL4kcZfWxybZx8DwOan1wjEO9L7i2RK8RQFLM09Du.iFqQ6S', '2020-10-16 16:30:44'),
(2, 'diego', '$2y$10$hZy76ArtbtnCtvG4YqtkFeD5Y4twVr4ylOTUfLhxRhPCBLuNJWWbC', '2020-10-16 16:39:43'),
(3, 'alonso', '$2y$10$Vr55BEmKDWfD06CgOUs66uycaAlPc2SrdffiRhvdohNOvT6Y962Lq', '2020-10-16 21:39:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PayplaDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(5000) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `ClaveTransaccion`, `PayplaDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES
(1, '12345678910', '', '2020-10-18 14:35:05', 'diego72034@gmail.com', '700.00', 'pendiente'),
(2, '12345678910', '', '2020-10-18 14:35:05', 'diego72034@gmail.com', '700.00', 'pendiente'),
(3, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 15:06:08', 'diego72034@gmail.com', '2500000.00', 'pendiente'),
(4, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 15:11:23', 'PajeroAlonso@hotmail.com', '4000000.00', 'pendiente'),
(5, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 15:42:46', 'diego72034@gmail.com', '5850000.00', 'pendiente'),
(6, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 15:55:37', 'ian@yahoo.es', '5850000.00', 'pendiente'),
(7, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 15:56:51', 'ian@yahoo.es', '5850000.00', 'pendiente'),
(8, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 15:58:47', 'ian@yahoo.es', '5850000.00', 'pendiente'),
(9, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 16:00:06', 'ian@yahoo.es', '5850000.00', 'pendiente'),
(10, '1oefesgklfq53u8ds1i5pjnmp5', '', '2020-10-18 16:04:33', 'ian@yahoo.es', '5850000.00', 'pendiente'),
(11, 'jjh60l5sjgkf3uqr4cbb8grk06', '', '2020-10-18 16:55:18', 'diego72034@gmail.com', '2500000.00', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD KEY `numPedido` (`numPedido`),
  ADD KEY `codpro` (`codpro`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- Indices de la tabla `nuestrosproductos`
--
ALTER TABLE `nuestrosproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`numPedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codpro`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nuestrosproductos`
--
ALTER TABLE `nuestrosproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `numPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `nuestrosproductos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
