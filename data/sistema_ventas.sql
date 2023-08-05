-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2023 a las 18:53:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `dircliente` varchar(64) NOT NULL,
  `telcliente` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `ruc`, `dircliente`, `telcliente`) VALUES
(1, 'Juan Carlos', '224421', 'Calle siempre viva 201', '93412312'),
(2, 'Jose Roberto ', '432343', 'Av. Ejercito 63', '984354654'),
(3, 'Roberto Idalgo ', '435324', 'Calle EEUU 211', '98232321'),
(4, 'Alex Juarez ', '543432', 'Av. San Martin de Porrez 656', '978767564'),
(5, 'Rodrigo Anticona', '434534', 'Av la salle 211', '987867532'),
(6, 'Mario Bermejo', '453235', 'Av. San juan de dios 121', '908754657'),
(7, 'Antony Coaquira', '423145', 'Calle Velaunde Terry 211', '980967555'),
(8, 'Maco Antonio ', '432354', 'Av Agusto Cerbajal 944', '981254654'),
(9, 'Jose Calos', '477867', 'Av. Jesus 221', '993223112'),
(10, 'Alfredo Idalgo', '665745', 'Av. Miraflores 554', '978765435'),
(13, 'JOSE ROBERTO', '4543536', 'AV EJERCITO 111', '987989564');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idProveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idCompra`, `fecha`, `idProveedor`) VALUES
(1, '2023-05-12', 1),
(2, '2023-06-01', 7),
(3, '2023-04-12', 4),
(4, '2023-05-19', 9),
(5, '2023-06-11', 2),
(6, '2023-05-19', 10),
(7, '2023-03-22', 3),
(8, '2023-04-26', 5),
(9, '2023-04-11', 8),
(10, '2023-03-24', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `idDetalleCompra` int(11) NOT NULL,
  `idCompra` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detallecompras`
--

INSERT INTO `detallecompras` (`idDetalleCompra`, `idCompra`, `idProducto`, `cantidad`) VALUES
(1, 1, 3, 5),
(2, 2, 2, 12),
(3, 3, 1, 10),
(4, 4, 5, 6),
(5, 5, 4, 8),
(6, 6, 6, 25),
(7, 7, 7, 5),
(8, 8, 9, 6),
(9, 9, 10, 6),
(10, 8, 10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `idDetalleVenta` int(11) NOT NULL,
  `idVenta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`idDetalleVenta`, `idVenta`, `idProducto`, `cantidad`, `importe`) VALUES
(1, 1, 7, 1, 12.00),
(2, 1, 5, 3, 18.00),
(3, 2, 6, 3, 13.50),
(4, 2, 4, 2, 16.00),
(5, 2, 1, 1, 15.00),
(6, 2, 7, 1, 12.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `idDocumento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`idDocumento`, `nombre`) VALUES
(1, 'Factura'),
(2, 'Boleta'),
(3, 'Comprobante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombre`, `telefono`, `direccion`, `usuario`, `password`) VALUES
(2, 'GUSTABO MAMANI', '987098976', 'Av ejercito 654', 'GMamani', '$2y$10$ZgCRqKhq/LLuE9KOAd926ukaf9XswLdsEqyzvkhJGtARu99sdfqM.'),
(3, 'CARLOS IDALGO', '987675654', 'Av jesus 904', 'CIdalgo', '$2y$10$lcOXB5BV3ITSWwvxN/Uag.H6hpPY7AaeKhso8PTMkL.eFSaEvkX7m'),
(4, 'MARCO ANTONIO', '956432145', 'Av Miguel Grau 213', 'MAntonio', '$2y$10$YcNQy.rS9ybTxNr/UY6id.niFqroxIM2.TugR1dyh3ymUZhvQ/nCu'),
(5, 'ALEXANDRA SOLIS', '987676879', 'Av Mariscal Castilla 955', 'ASolis', '$2y$10$Sc/kYapwUxiWgaPwV4nNuuP7PeYSD8MD7ZTTyqn26FPkideDaFz1q'),
(6, 'JORDY ROJAS', '980986453', 'Av Gustavo Aguirre 655', 'JRojas', '$2y$10$MIkSWgk1Zjie5LMyCwYF5OfsW80La7E3fMUTLSC7taQLXqoe6Cv8K'),
(7, 'NURIA CARRILLO', '987121|13', 'Av Cristobal Colon 766', 'NCarrillo', '$2y$10$Ig9coZTI7a0CNt08jJFGGOk55/nZ1fOKTT0fCJuNrg1hzWMMmnonC'),
(8, 'CLAUDIA BALDERRAMA', '901256435', 'Av Castañeda 143', 'CBalderrama', '$2y$10$NDOm4aAz7j18ny5B.Mrm..GZ8Fz/qHmP9VwMxAT92XyChhxyjzlaG'),
(9, 'NICOLE CHARREZ', '956457324', 'Asentamiento Humano 43', 'NCharrez', '$2y$10$ReyYjCRsst1oBawqvsGa5.ppqtn1D7C5socww5B1GNFTqvXxR4d26'),
(10, 'MARIA TORREZ', '980567342', 'Av. Marco Antonio 665', 'MTorrez', '$2y$10$zBy0qiqcJ40Z7rGsiZC40OLkGH.ZXcw15./SN7Iu13euBrg7yshyq'),
(11, 'YOHAN CONODORI', '876976565', 'Av. Jesus 122', 'Yohan', '$2y$10$BvOk60dvniRVJ4qp9Zx7wejXn9qgFuSbdpXbWGsWF87RWc5CmU5zS'),
(12, 'ADMIN', '98987879', 'Av. Siempre viva 907', 'Admin', '$2y$10$67vnEP2Tb.F3bAAQzcwj7ObbtwOjNQKKqYYhj.awdWz.gdupdZjzq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `idLinea` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`idLinea`, `nombre`) VALUES
(1, 'PRODUCTOS DE LIMPIEZA'),
(2, 'Herramientas '),
(3, 'golosinas y pickeos'),
(4, 'Herramientas de cocina'),
(5, 'Abarrotes'),
(6, 'Vestimentas'),
(7, 'Productos de higiene'),
(8, 'Productos para la ducha'),
(9, 'Productos de limpieza de ropa'),
(10, 'Productos de belleza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nomproducto` varchar(50) NOT NULL,
  `unimed` varchar(15) NOT NULL,
  `stock` int(11) NOT NULL,
  `preuni` decimal(10,4) NOT NULL,
  `cosuni` decimal(10,4) NOT NULL,
  `idLinea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nomproducto`, `unimed`, `stock`, `preuni`, `cosuni`, `idLinea`) VALUES
(1, 'SHAMPOO H&S 1L', 'UNIDAD', 25, 15.0000, 13.0000, 8),
(2, 'Cocal Cola 3L', 'unidad', 10, 13.0000, 10.0000, 3),
(3, 'Gorros de lana', 'unidad', 8, 10.0000, 9.0000, 6),
(4, 'Focos Led ', 'unidad', 6, 8.0000, 7.0000, 2),
(5, 'Jabon Nibea', 'unidad', 15, 6.0000, 5.5000, 7),
(6, ' ARROZ', 'KILO', 35, 4.5000, 4.0000, 5),
(7, 'Espatula de cocina ', 'unidad', 15, 12.0000, 11.0000, 4),
(8, 'Deterjente ace de 200gm', 'unidad', 14, 4.0000, 3.5000, 9),
(9, 'Galon pino 3l', 'unidad', 8, 14.0000, 12.0000, 1),
(10, 'LABIAL ROSA CLARO', 'UNIDAD', 13, 6.0000, 5.0000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idLinea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nombre`, `idLinea`) VALUES
(2, 'ALBERTO Y JETCH', 4),
(4, 'JUAN CARLOS BODOQUE IMPORTACIONES', 5),
(7, 'MARCK Y SACK INC', 2),
(8, 'RODOLFO TRAE', 3),
(9, 'P&G', 7),
(10, 'SACK VENTAS POR MAYOR', 8),
(11, 'PRODUCTOS KIJOTE ', 10),
(12, 'ALEXANDER VENTAS Y SERVICIOS', 7),
(13, 'IMPORTACIONES DE LA ABUELA', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `idDocumento` int(11) DEFAULT NULL,
  `tipo_venta` varchar(50) NOT NULL,
  `totalventa` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `fecha`, `idCliente`, `idEmpleado`, `idDocumento`, `tipo_venta`, `totalventa`) VALUES
(1, '2023-08-05', 1, 6, 2, 'Contado', 35.40),
(2, '2023-08-05', 5, 6, 1, 'Contado', 66.67);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`idDetalleCompra`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `idVenta` (`idVenta`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`idLinea`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `idLinea` (`idLinea`);

--
-- Indices de la tabla `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  MODIFY `idDetalleCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `idLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
