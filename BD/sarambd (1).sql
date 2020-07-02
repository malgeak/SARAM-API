-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2020 a las 06:04:14
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sarambd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_Tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ID_Usuario` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_motocicleta` int(50) NOT NULL,
  `Posición` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motocicleta`
--

CREATE TABLE `motocicleta` (
  `ID_usuario` bigint(20) NOT NULL,
  `ID_Motocicleta` int(50) NOT NULL,
  `Modelo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Cilindraje` int(4) NOT NULL,
  `Placa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ID_saram` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `motocicleta`
--

INSERT INTO `motocicleta` (`ID_usuario`, `ID_Motocicleta`, `Modelo`, `Marca`, `Cilindraje`, `Placa`, `ID_saram`, `created_at`, `updated_at`) VALUES
(2, 1, 'PRS-450', 'YAMAHA', 250, 'SQ123', 123456, '2020-06-30 03:25:25', '2020-06-30 04:10:40'),
(2, 2, 'ROSWELL', 'BMW', 250, 'MQ123', 159753, '2020-06-30 03:27:07', '2020-06-30 04:18:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` bigint(20) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Contrasena` varbinary(200) NOT NULL,
  `Edad` date DEFAULT NULL,
  `Direccion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tipo_sangre` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Alergias` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Religion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Informacion_adicional` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `Sexo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `Nombre`, `Apellidos`, `Correo`, `Contrasena`, `Edad`, `Direccion`, `Telefono`, `Tipo_sangre`, `Alergias`, `Religion`, `Informacion_adicional`, `created_at`, `updated_at`, `Sexo`) VALUES
(2, 'Carlos Alberto', 'Gil Calvillo', 'gcca1998@gmail.com', 0x62306131656234323963623661623038393865623334613436343162666431623666353037373134303337616664343034356133646534396264363463636434, '1998-06-30', 'Margaritas 41 Lt12 Chalco', '5539391622', 'O+', 'Ninguna', 'Ninguna', 'Donar Organos', '2020-06-25 03:03:45', '2020-07-02 03:41:45', 'Masculino'),
(3, 'Carlos Alberto', 'Gil Calvillo', 'prueba1@gmail.com', 0x62306131656234323963623661623038393865623334613436343162666431623666353037373134303337616664343034356133646534396264363463636434, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-25 03:12:59', '2020-06-25 03:12:59', NULL),
(9, 'CARLOS', 'GIL', 'malgeak@gmail.com', 0x62306131656234323963623661623038393865623334613436343162666431623666353037373134303337616664343034356133646534396264363463636434, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-25 21:53:57', '2020-06-25 21:53:57', NULL),
(13, 'CARLOS', 'GIL', 'prueba4@gmail.com', 0x62306131656234323963623661623038393865623334613436343162666431623666353037373134303337616664343034356133646534396264363463636434, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-25 22:06:57', '2020-06-25 22:06:57', NULL),
(14, 'Carlos Alberto', 'Gil Calvillo', 'prueba2@gmail.com', 0x62306131656234323963623661623038393865623334613436343162666431623666353037373134303337616664343034356133646534396264363463636434, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-25 22:51:27', '2020-06-25 22:51:27', NULL),
(15, 'Carlos', 'Gil', 'prueba6@gmail.com', 0x62306131656234323963623661623038393865623334613436343162666431623666353037373134303337616664343034356133646534396264363463636434, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-25 23:49:59', '2020-06-25 23:49:59', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD KEY `fk_usuario_contacto` (`ID_Usuario`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD KEY `fk_motocicleta_estado` (`ID_motocicleta`);

--
-- Indices de la tabla `motocicleta`
--
ALTER TABLE `motocicleta`
  ADD PRIMARY KEY (`ID_Motocicleta`),
  ADD KEY `fk_usuario_motocicleta` (`ID_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `motocicleta`
--
ALTER TABLE `motocicleta`
  MODIFY `ID_Motocicleta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `fk_usuario_contacto` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_motocicleta_estado` FOREIGN KEY (`ID_motocicleta`) REFERENCES `motocicleta` (`ID_Motocicleta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `motocicleta`
--
ALTER TABLE `motocicleta`
  ADD CONSTRAINT `fk_usuario_motocicleta` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
