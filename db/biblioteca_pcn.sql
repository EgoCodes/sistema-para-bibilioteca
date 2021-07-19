-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2021 a las 16:10:43
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca_pcn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nombreAutor` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombreAutor`, `fCreacion`, `fActualizacion`) VALUES
(1, 'Antoine de Saint-Exupéry', '2021-03-11 08:56:46', NULL);

--
-- Disparadores `autor`
--
DELIMITER $$
CREATE TRIGGER `autCre` BEFORE INSERT ON `autor` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `id` int(11) NOT NULL,
  `nombreBarrio` varchar(45) NOT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`id`, `nombreBarrio`, `fechaCreacion`, `fechaActualizacion`) VALUES
(1, 'NAYITA', '2021-03-11 08:34:46', NULL),
(2, 'CENTENARIO', '2021-03-11 08:34:46', NULL),
(3, 'LA ISLA', '2021-03-11 08:34:46', NULL),
(4, 'VIENTOS LIBRES NORTE', '2021-03-11 08:34:46', NULL),
(5, 'MONTE CHINO', '2021-03-11 08:34:46', NULL),
(6, 'EL FIRME', '2021-03-11 08:34:46', NULL),
(7, 'CAPRICHO', '2021-03-11 08:34:46', NULL),
(8, 'FRANSISCO DE PAULA SANTANDER', '2021-03-11 08:34:46', NULL),
(9, 'EL JORGE', '2021-03-11 08:34:46', NULL),
(10, 'BORRERO OLANO', '2021-03-11 08:34:46', NULL),
(11, 'SANTA ROSA', '2021-03-11 08:34:46', NULL),
(12, 'ALFONSO LOPEZ P', '2021-03-11 08:34:46', NULL),
(13, 'ALBERTO LLERAS CAMARGO', '2021-03-11 08:34:46', NULL),
(14, 'SAN JOSE', '2021-03-11 08:34:46', NULL),
(15, 'MURO YUSTY', '2021-03-11 08:34:46', NULL),
(16, 'VIENTOS LIBRES SUR', '2021-03-11 08:34:46', NULL),
(17, 'CAMPO ALEGRE', '2021-03-11 08:34:46', NULL),
(18, 'LA PLAYITA', '2021-03-11 08:34:46', NULL),
(19, 'PASCUAL DE ANDAGOYA', '2021-03-11 08:34:46', NULL),
(20, 'LA PALERA', '2021-03-11 08:34:46', NULL),
(21, 'PUNTA DEL ESTE', '2021-03-11 08:34:46', NULL),
(22, 'SANTA CRUZ', '2021-03-11 08:34:46', NULL),
(23, 'LA INMACULADA', '2021-03-11 08:34:46', NULL),
(24, 'SANTA FE', '2021-03-11 08:34:46', NULL),
(25, 'MIRAMAR', '2021-03-11 08:34:46', NULL),
(26, 'EL PORVENIR', '2021-03-11 08:34:46', NULL),
(27, 'EL CAMPIN', '2021-03-11 08:34:46', NULL),
(28, 'EL JARDIN', '2021-03-11 08:34:46', NULL),
(29, 'BRISAS DEL MAR', '2021-03-11 08:34:46', NULL),
(30, 'MIRAFLORES', '2021-03-11 08:34:46', NULL),
(31, 'EL ORIENTE', '2021-03-11 08:34:46', NULL),
(32, 'ISLA DE LA PAZ', '2021-03-11 08:34:46', NULL),
(33, 'BARRIO NAVAL', '2021-03-11 08:34:46', NULL),
(34, 'BOSQUE MUNICIPAL', '2021-03-11 08:34:46', NULL),
(35, 'LA COMUNA', '2021-03-11 08:34:46', NULL),
(36, 'KENNEDY', '2021-03-11 08:34:46', NULL),
(37, 'SAN LUIS', '2021-03-11 08:34:46', NULL),
(38, 'SAN FRANCISCO', '2021-03-11 08:34:46', NULL),
(39, 'MUNICIPAL', '2021-03-11 08:34:46', NULL),
(40, 'JUAN XXIII', '2021-03-11 08:34:46', NULL),
(41, 'EUCARISTICO', '2021-03-11 08:34:46', NULL),
(42, 'ROCKEFELLER', '2021-03-11 08:34:46', NULL),
(43, '14 DE JULIO', '2021-03-11 08:34:46', NULL),
(44, 'MODELO', '2021-03-11 08:34:46', NULL),
(45, 'MARIA EUGENIA', '2021-03-11 08:34:46', NULL),
(46, 'BELLA VISTA', '2021-03-11 08:34:46', NULL),
(47, 'OLIMPICO', '2021-03-11 08:34:46', NULL),
(48, 'EL CRISTAL', '2021-03-11 08:34:46', NULL),
(49, 'TRANSFORMACION', '2021-03-11 08:34:46', NULL),
(50, 'LOS LAURELES', '2021-03-11 08:34:46', NULL),
(51, 'CIUDADELA COLPUERTOS', '2021-03-11 08:34:46', NULL),
(52, 'SAN BUENAVENTURA', '2021-03-11 08:34:46', NULL),
(53, 'DOÑA CESI', '2021-03-11 08:34:46', NULL),
(54, '12 DE ABRIL', '2021-03-11 08:34:46', NULL),
(55, '6 DE ENERO', '2021-03-11 08:34:46', NULL),
(56, 'TURBAY AYALA', '2021-03-11 08:34:46', NULL),
(57, 'NUEVA BUENAVENTURA', '2021-03-11 08:34:46', NULL),
(58, 'INDEPENDENCIA', '2021-03-11 08:34:46', NULL),
(59, 'URBANIZACION ACUARELA', '2021-03-11 08:34:46', NULL),
(60, 'CARLOS HOLMES', '2021-03-11 08:34:46', NULL),
(61, 'LAS AMERICAS', '2021-03-11 08:34:46', NULL),
(62, 'BOLIVAR', '2021-03-11 08:34:46', NULL),
(63, 'CAMILO TORRES', '2021-03-11 08:34:46', NULL),
(64, 'URBANIZACION BAHIA', '2021-03-11 08:34:46', NULL),
(65, 'EL PROGRESO', '2021-03-11 08:34:46', NULL),
(66, 'LA FORTALEZA', '2021-03-11 08:34:46', NULL),
(67, 'URBANIZACION COMUNITARIA', '2021-03-11 08:34:46', NULL),
(68, 'LOS ALAMOS', '2021-03-11 08:34:46', NULL),
(69, 'URBANIZACION COMFAMAR', '2021-03-11 08:34:46', NULL),
(70, 'BELLO HORIZONTE', '2021-03-11 08:34:46', NULL),
(71, 'EL DORADO', '2021-03-11 08:34:46', NULL),
(72, 'ANTONIO NARIÑO', '2021-03-11 08:34:46', NULL),
(73, 'CASCAJAL', '2021-03-11 08:34:46', NULL),
(74, 'EL CARMEN', '2021-03-11 08:34:46', NULL),
(75, 'NUEVA COLOMBIA', '2021-03-11 08:34:46', NULL),
(76, 'LOS PINOS', '2021-03-11 08:34:46', NULL),
(77, 'PANAMERICANO', '2021-03-11 08:34:46', NULL),
(78, 'GRAN COLOMBIANA', '2021-03-11 08:34:46', NULL),
(79, 'CRISTOBAL COLON', '2021-03-11 08:34:46', NULL),
(80, 'EL FUTURO', '2021-03-11 08:34:46', NULL),
(81, 'PUERTA DEL MAR', '2021-03-11 08:34:46', NULL),
(82, 'ALFONSO LOPEZ MICHELSEN', '2021-03-11 08:34:46', NULL),
(83, 'UNION DE VIVIENDA', '2021-03-11 08:34:46', NULL),
(84, 'EL FRIUNFO', '2021-03-11 08:34:46', NULL),
(85, '20 DE JULIO', '2021-03-11 08:34:46', NULL),
(86, 'EL RETEN', '2021-03-11 08:34:46', NULL),
(87, 'NUEVA GRANADA', '2021-03-11 08:34:46', NULL),
(88, 'LAS PALMAS', '2021-03-11 08:34:46', NULL),
(89, 'NUEVA FRONTERA', '2021-03-11 08:34:46', NULL),
(90, 'MATIA MULUMBA', '2021-03-11 08:34:46', NULL),
(91, 'CABAL POMBO', '2021-03-11 08:34:46', NULL),
(92, 'EL CALDAS', '2021-03-11 08:34:46', NULL),
(93, 'LA LIBERTAD', '2021-03-11 08:34:46', NULL),
(94, 'LA GLORIA', '2021-03-11 08:34:46', NULL),
(95, 'LA UNION', '2021-03-11 08:34:46', NULL),
(96, 'EL RUIZ', '2021-03-11 08:34:46', NULL),
(97, 'RAFAEL URIBE', '2021-03-11 08:34:46', NULL),
(98, 'EL CAMBIO', '2021-03-11 08:34:46', NULL),
(99, 'NUEVO AMANECER', '2021-03-11 08:34:46', NULL),
(100, 'LA CAMPIÑA', '2021-03-11 08:34:46', NULL),
(101, 'VISTA HERMOSA', '2021-03-11 08:34:46', NULL),
(102, 'JORGE ELIECER GAITAN', '2021-03-11 08:34:46', NULL),
(103, 'LA DIGNIDAD', '2021-03-11 08:34:46', NULL),
(104, 'BRISAS DEL PACIFICO', '2021-03-11 08:34:46', NULL),
(105, '12 DE OCTUBRE', '2021-03-11 08:34:46', NULL);

--
-- Disparadores `barrios`
--
DELIMITER $$
CREATE TRIGGER `barriocre` BEFORE INSERT ON `barrios` FOR EACH ROW set new.fechaCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad`
--

CREATE TABLE `cantidad` (
  `id` int(11) NOT NULL,
  `numeroCantidad` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cantidad`
--

INSERT INTO `cantidad` (`id`, `numeroCantidad`, `fCreacion`, `fActualizacion`) VALUES
(1, '1', '2021-03-11 08:39:34', NULL),
(2, '2', '2021-03-11 08:39:34', NULL),
(3, '3', '2021-03-11 08:39:34', NULL),
(4, '4', '2021-03-11 08:39:34', NULL),
(5, '5', '2021-03-11 08:39:34', NULL),
(6, '6', '2021-03-11 08:39:34', NULL),
(7, '7', '2021-03-11 08:39:34', NULL),
(8, '8', '2021-03-11 08:39:34', NULL),
(9, '9', '2021-03-11 08:39:34', NULL),
(10, '10', '2021-03-11 08:39:34', NULL),
(11, '11', '2021-03-11 08:39:34', NULL),
(12, '12', '2021-03-11 08:39:34', NULL),
(13, '13', '2021-03-11 08:39:34', NULL),
(14, '14', '2021-03-11 08:39:34', NULL),
(15, '15', '2021-03-11 08:39:34', NULL),
(16, '16', '2021-03-11 08:39:34', NULL),
(17, '17', '2021-03-11 08:39:34', NULL),
(18, '18', '2021-03-11 08:39:34', NULL),
(19, '19', '2021-03-11 08:39:34', NULL),
(20, '20', '2021-03-11 08:39:34', NULL),
(21, '21', '2021-03-11 08:39:34', NULL),
(22, '22', '2021-03-11 08:39:34', NULL),
(23, '23', '2021-03-11 08:39:34', NULL),
(24, '24', '2021-03-11 08:39:34', NULL),
(25, '25', '2021-03-11 08:39:34', NULL),
(26, '26', '2021-03-11 08:39:34', NULL),
(27, '27', '2021-03-11 08:39:34', NULL),
(28, '28', '2021-03-11 08:39:34', NULL),
(29, '29', '2021-03-11 08:39:34', NULL),
(30, '30', '2021-03-11 08:39:34', NULL),
(31, '31', '2021-03-11 08:39:34', NULL),
(32, '32', '2021-03-11 08:39:34', NULL),
(33, '33', '2021-03-11 08:39:34', NULL),
(34, '34', '2021-03-11 08:39:34', NULL),
(35, '35', '2021-03-11 08:39:34', NULL),
(36, '36', '2021-03-11 08:39:34', NULL),
(37, '37', '2021-03-11 08:39:34', NULL),
(38, '38', '2021-03-11 08:39:34', NULL),
(39, '39', '2021-03-11 08:39:34', NULL),
(40, '40', '2021-03-11 08:39:34', NULL),
(41, '41', '2021-03-11 08:39:34', NULL),
(42, '42', '2021-03-11 08:39:34', NULL),
(43, '43', '2021-03-11 08:39:34', NULL),
(44, '44', '2021-03-11 08:39:34', NULL),
(45, '45', '2021-03-11 08:39:34', NULL),
(46, '46', '2021-03-11 08:39:34', NULL),
(47, '47', '2021-03-11 08:39:34', NULL),
(48, '48', '2021-03-11 08:39:34', NULL),
(49, '49', '2021-03-11 08:39:34', NULL),
(50, '50', '2021-03-11 08:39:34', NULL);

--
-- Disparadores `cantidad`
--
DELIMITER $$
CREATE TRIGGER `cant` BEFORE INSERT ON `cantidad` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `id` int(11) NOT NULL,
  `numeroEdicion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`id`, `numeroEdicion`, `fCreacion`, `fActualizacion`) VALUES
(1, '1°', '2021-03-11 08:47:56', NULL),
(2, '2°', '2021-03-11 08:47:56', NULL),
(3, '3°', '2021-03-11 08:47:56', NULL),
(4, '4°', '2021-03-11 08:47:56', NULL),
(5, '5°', '2021-03-11 08:47:56', NULL),
(6, '6°', '2021-03-11 08:47:56', NULL),
(7, '7°', '2021-03-11 08:47:56', NULL),
(8, '8°', '2021-03-11 08:47:56', NULL),
(9, '9°', '2021-03-11 08:47:56', NULL),
(10, '10°', '2021-03-11 08:47:56', NULL),
(11, '11°', '2021-03-11 08:47:56', NULL),
(12, '12°', '2021-03-11 08:47:56', NULL),
(13, '13°', '2021-03-11 08:47:56', NULL),
(14, '14°', '2021-03-11 08:47:56', NULL),
(15, '15°', '2021-03-11 08:47:56', NULL),
(16, '16°', '2021-03-11 08:47:56', NULL),
(17, '17°', '2021-03-11 08:47:56', NULL),
(18, '18°', '2021-03-11 08:47:56', NULL),
(19, '19°', '2021-03-11 08:47:56', NULL),
(20, '20°', '2021-03-11 08:47:56', NULL);

--
-- Disparadores `edicion`
--
DELIMITER $$
CREATE TRIGGER `createedi` BEFORE INSERT ON `edicion` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` int(11) NOT NULL,
  `nombreEditorial` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `nombreEditorial`, `fCreacion`, `fActualizacion`) VALUES
(1, 'Reynal & Hitchcock', '2021-03-11 08:56:01', NULL);

--
-- Disparadores `editorial`
--
DELIMITER $$
CREATE TRIGGER `ecitCre` BEFORE INSERT ON `editorial` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `estadoPrestamo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estadoPrestamo`, `fCreacion`, `fActualizacion`) VALUES
(1, 'PRESTADO', '2021-03-11 08:52:21', NULL),
(2, 'ENTREGADO', '2021-03-11 08:52:21', NULL),
(3, 'RETRASADO', '2021-03-11 08:52:21', NULL);

--
-- Disparadores `estado`
--
DELIMITER $$
CREATE TRIGGER `stcCre` BEFORE INSERT ON `estado` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `nombreLibro` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `editorial_id` int(11) NOT NULL,
  `edicion_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `cantidad_id` int(11) NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `nombreLibro`, `editorial_id`, `edicion_id`, `autor_id`, `cantidad_id`, `fCreacion`, `fActualizacion`) VALUES
(1, 'El principito', 1, 1, 1, 5, '2021-03-11 08:57:31', NULL);

--
-- Disparadores `libro`
--
DELIMITER $$
CREATE TRIGGER `libCre` BEFORE INSERT ON `libro` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `cedula` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `barrios_id` int(11) NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `nombre`, `direccion`, `telefono`, `barrios_id`, `fCreacion`, `fActualizacion`) VALUES
(1, '25412', 'Harold', 'Carrera 82b', '3150000000', 96, '2021-03-11 09:09:42', NULL);

--
-- Disparadores `persona`
--
DELIMITER $$
CREATE TRIGGER `perCre` BEFORE INSERT ON `persona` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int(11) NOT NULL,
  `cantidad_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `fechaFin` datetime NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id`, `cantidad_id`, `persona_id`, `libro_id`, `estado_id`, `fechaFin`, `fCreacion`, `fActualizacion`) VALUES
(1, 1, 1, 1, 1, '2021-03-11 09:10:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `fCreacion` datetime DEFAULT NULL,
  `fActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `correo`, `contrasena`, `fCreacion`, `fActualizacion`) VALUES
(1, 'test@test', 'test123', '2021-03-11 09:16:16', NULL);

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `user` BEFORE INSERT ON `usuario` FOR EACH ROW set new.fCreacion = (SELECT now())
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_libro_editorial1_idx` (`editorial_id`),
  ADD KEY `fk_libro_edicion1_idx` (`edicion_id`),
  ADD KEY `fk_libro_autor1_idx` (`autor_id`),
  ADD KEY `fk_libro_cantidad1` (`cantidad_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  ADD KEY `fk_persona_barrios1` (`barrios_id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prestamo_cantidad_idx` (`cantidad_id`),
  ADD KEY `fk_prestamo_persona1_idx` (`persona_id`),
  ADD KEY `fk_prestamo_libro1_idx` (`libro_id`),
  ADD KEY `fk_prestamo_estado1_idx` (`estado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_libro_autor1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libro_cantidad1` FOREIGN KEY (`cantidad_id`) REFERENCES `cantidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libro_edicion1` FOREIGN KEY (`edicion_id`) REFERENCES `edicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libro_editorial1` FOREIGN KEY (`editorial_id`) REFERENCES `editorial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_barrios1` FOREIGN KEY (`barrios_id`) REFERENCES `barrios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_prestamo_cantidad` FOREIGN KEY (`cantidad_id`) REFERENCES `cantidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_libro1` FOREIGN KEY (`libro_id`) REFERENCES `libro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamo_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
