-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2020 a las 22:45:44
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
  `Apellidos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Numero_Tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_Usuario` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`Nombre`, `Apellidos`, `Numero_Tel`, `Correo`, `ID_Usuario`, `created_at`, `updated_at`) VALUES
('Carlos', NULL, '5539391622', NULL, 2, '2020-07-05 05:05:36', '2020-07-05 05:05:36'),
('Carlos', NULL, '5522619284', NULL, 2, '2020-07-05 05:05:50', '2020-07-05 05:05:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ID_saram` bigint(20) NOT NULL,
  `Version` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`created_at`, `updated_at`, `ID_saram`, `Version`) VALUES
('2020-03-11 16:06:42', '2020-03-11 16:06:42', 1001, 'SARV1'),
('2020-02-27 06:10:22', '2020-03-11 16:06:42', 1002, 'SARV1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_motocicleta` int(50) NOT NULL,
  `Posicion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `longitud` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `latitud` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_motocicleta`, `Posicion`, `created_at`, `updated_at`, `longitud`, `latitud`) VALUES
(12, '1', '2020-07-05 03:38:03', '2020-07-06 20:42:52', '0', '0');

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
(2, 12, 'GSXR', 'Susuki', 150, 'MRS50', 1001, '2020-07-05 03:15:27', '2020-07-05 05:14:47');

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
(2, 'Carlos Alberto', 'Gil Calvillo', 'gcca1998@gmail.com', 0x62306131656234323963623661623038393865623334613436343162666431623666353037373134303337616664343034356133646534396264363463636434, '1998-06-30', 'Margaritas 41 Lt12 Chalco', '5539391622', 'O+', 'Ninguna', 'Ninguna', 'Donar Organos', '2020-06-25 03:03:45', '2020-07-02 03:41:45', 'Masculino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD KEY `fk_usuario_contacto` (`ID_Usuario`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`ID_saram`);

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
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `ID_saram` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT de la tabla `motocicleta`
--
ALTER TABLE `motocicleta`
  MODIFY `ID_Motocicleta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
