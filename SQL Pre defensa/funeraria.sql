-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-06-2017 a las 00:39:18
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.19-1+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `funeraria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clausulas`
--

CREATE TABLE `clausulas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clausulas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clausulas`
--

INSERT INTO `clausulas` (`id`, `nombre`, `clausulas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nixon', '/clausulas/Nixon.pdf', '2017-06-07 06:01:01', '2017-06-07 06:01:01', NULL),
(2, 'Clausulas estandar', '/clausulas/Clausulas estandar.pdf', '2017-06-19 08:10:37', '2017-06-19 08:10:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `componente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `planes_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `componente`, `planes_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Runba con striper', 1, '2017-06-16 05:51:06', '2017-06-16 05:51:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_vencimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_contrato` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clausula_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `tiempo_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto_inicial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ruta_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `numero`, `fecha_inicio`, `fecha_vencimiento`, `tipo_contrato`, `clausula_id`, `plan_id`, `tiempo_pago`, `monto_total`, `monto_inicial`, `estado`, `user_id`, `ruta_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2312', '16/06/2017', '16/11/2017', 'Individual', 1, 1, 'Mensual', '60000', '222', 'Activo', 1, 4, '2017-06-07 06:01:54', '2017-06-08 02:50:17', NULL),
(2, '2312', '21/06/2017', '21/11/2017', 'Individual', 1, 1, 'Mensual', '60000', '222', 'Activo', 1, 4, '2017-06-08 03:12:57', '2017-06-08 03:12:57', NULL),
(3, '2312', '14/06/2017', '14/11/2017', 'Individual', 1, 1, 'Mensual', '60000', '222', 'Activo', 1, 4, '2017-06-08 03:14:10', '2017-06-08 03:14:10', NULL),
(4, '000056', '01/06/2017', '01/11/2017', 'Individual', 1, 1, 'Mensual', '60000', '100000', 'Activo', 1, 4, '2017-06-16 05:48:17', '2017-06-16 05:48:17', NULL),
(5, '000056', '17/06/2017', '17/11/2017', 'Colectivo', 2, 1, 'Mensual', '60000', '100000', 'Activo', 1, 4, '2017-06-19 08:23:14', '2017-06-19 08:23:14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `cedula`, `tipo`, `telefono`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nixon', 'Torres', '22563617', 'Cobrador', '04169312333', '2017-06-08 03:02:09', '2017-06-08 03:03:16', '2017-06-08 03:03:16'),
(2, 'Nixon', 'Torres', '22563617', 'Vendedor', '04169312333', '2017-06-08 17:22:34', '2017-06-08 17:22:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `contrato_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `telefono`, `direccion`, `municipio_id`, `contrato_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Empresa', '04167856675', 'San Juan', 1, 5, '2017-06-19 08:23:15', '2017-06-19 08:23:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Miranda', '2017-06-07 05:34:29', '2017-06-07 05:34:29', NULL),
(2, 'Guarico', '2017-06-15 07:31:06', '2017-06-15 07:31:06', NULL),
(3, 'Aragua', '2017-06-15 07:31:17', '2017-06-15 07:31:17', NULL),
(4, 'Tachira', '2017-06-16 05:31:00', '2017-06-16 05:31:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_200000_create_clausulas_table', 1),
('2014_10_12_200001_create_rutas_table', 1),
('2014_10_12_300000_create_planes_table', 1),
('2014_10_12_400000_create_contratos_table', 1),
('2014_10_12_500000_create_estados_table', 1),
('2014_12_10_600000_create_municipios_table', 1),
('2017_03_20_010933_create_personas_table', 1),
('2017_03_20_011458_create_empresas_table', 1),
('2017_03_20_020117_create_pagos_table', 1),
('2017_03_20_021642_create_modificacions_table', 1),
('2017_03_24_235455_create_componentes_table', 1),
('2017_06_07_225334_create_empleados_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacions`
--

CREATE TABLE `modificacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `contrato_id` int(10) UNSIGNED NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(10) UNSIGNED NOT NULL,
  `municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `municipio`, `estado_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Independiencia', 1, '2017-06-07 05:34:39', '2017-06-07 05:34:39', NULL),
(2, 'Roscio', 2, '2017-06-15 07:31:32', '2017-06-15 07:31:32', NULL),
(3, 'Lander', 1, '2017-06-15 07:48:26', '2017-06-15 07:48:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_cuota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `concepto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrato_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `monto`, `numero_cuota`, `tipo_pago`, `concepto`, `contrato_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '10000', '1', 'Banco', '16/6/2017', 1, '2017-06-08 03:05:54', '2017-06-08 03:05:54', NULL),
(2, '10000', '2', 'Banco', '16/7/2017', 1, '2017-06-08 03:07:16', '2017-06-08 03:07:16', NULL),
(3, '10000', '1', 'Banco', '21/6/2017', 2, '2017-06-08 03:13:24', '2017-06-08 03:13:24', NULL),
(4, '10000', '2', 'Banco', '21/7/2017', 2, '2017-06-08 03:13:32', '2017-06-08 03:13:32', NULL),
(5, '10000', '3', 'Banco', '21/8/2017', 2, '2017-06-08 03:13:37', '2017-06-08 03:13:37', NULL),
(6, '10000', '3', 'Banco', '16/8/2017', 1, '2017-06-08 03:20:28', '2017-06-08 03:20:28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrato_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `cedula`, `sexo`, `fecha_nac`, `parentesco`, `observacion`, `telefono`, `municipio_id`, `direccion`, `contrato_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'andy', 'bowen', '22563617', 'Masculino', '21/06/2017', 'Titular', '', '04169312333', 1, 'sdfsdfsdfsdf', 1, '2017-06-07 06:01:54', '2017-06-08 17:26:32', NULL),
(2, 'darleris', 'sanchez', '21333704', 'Masculino', '02/06/2017', 'Titular', '', '04169312333', 1, 'asdasdasd', 2, '2017-06-08 03:12:57', '2017-06-08 17:27:26', NULL),
(3, 'darle', 'sanchez', '12118097', 'Femenino', '21/06/2017', 'Titular', '', '04169312333', 1, 'sadasdasdasd', 3, '2017-06-08 03:14:10', '2017-06-08 17:28:17', NULL),
(4, 'Jose', 'Perez', '22563001', 'Masculino', '03/06/1994', 'Titular', NULL, '04169312333', 3, 'San Juan', 4, '2017-06-16 05:48:18', '2017-06-16 05:48:18', NULL),
(5, 'Maria', 'Peres', '22000000', 'Femenino', '01/06/1994', 'Conyuge', NULL, '04169312333', 3, 'San Juan', 4, '2017-06-16 05:49:14', '2017-06-16 05:49:14', NULL),
(6, 'Manuel', 'Perez', '22563617', 'Masculino', '21/06/1998', 'Titular', NULL, '04169312333', 2, 'San juan', 5, '2017-06-19 08:23:15', '2017-06-19 08:23:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `informacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `plan`, `monto`, `informacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Oro', '60000', 'Un plan de pinga', '2017-06-07 05:35:35', '2017-06-07 05:35:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id`, `direccion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'editada', '2017-06-07 05:25:50', '2017-06-07 05:26:05', '2017-06-07 05:26:05'),
(2, 'sadsad', '2017-06-07 05:27:20', '2017-06-07 06:13:42', '2017-06-07 06:13:42'),
(3, 'sdasdasdasasd', '2017-06-07 06:14:11', '2017-06-08 02:49:38', '2017-06-08 02:49:38'),
(4, 'sdsadsadasd', '2017-06-08 02:49:57', '2017-06-08 02:49:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `telefono`, `cedula`, `apellido`, `nombre`, `tipo`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'admin@example.com', '$2y$10$gzFc7coa7gxI7xdZEfMLNeJSdtXWl6ZUeSyfnbqeYCrziClaUYaC2', '0000-000-0000', '00000000', 'admin', 'admin', 'admin', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clausulas`
--
ALTER TABLE `clausulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `componentes_planes_id_foreign` (`planes_id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_clausula_id_foreign` (`clausula_id`),
  ADD KEY `contratos_plan_id_foreign` (`plan_id`),
  ADD KEY `contratos_user_id_foreign` (`user_id`),
  ADD KEY `contratos_ruta_id_foreign` (`ruta_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresas_municipio_id_foreign` (`municipio_id`),
  ADD KEY `empresas_contrato_id_foreign` (`contrato_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modificacions`
--
ALTER TABLE `modificacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modificacions_contrato_id_foreign` (`contrato_id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagos_contrato_id_foreign` (`contrato_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas_municipio_id_foreign` (`municipio_id`),
  ADD KEY `personas_contrato_id_foreign` (`contrato_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clausulas`
--
ALTER TABLE `clausulas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `modificacions`
--
ALTER TABLE `modificacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `componentes_planes_id_foreign` FOREIGN KEY (`planes_id`) REFERENCES `planes` (`id`);

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_clausula_id_foreign` FOREIGN KEY (`clausula_id`) REFERENCES `clausulas` (`id`),
  ADD CONSTRAINT `contratos_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `planes` (`id`),
  ADD CONSTRAINT `contratos_ruta_id_foreign` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`id`),
  ADD CONSTRAINT `contratos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`),
  ADD CONSTRAINT `empresas_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `modificacions`
--
ALTER TABLE `modificacions`
  ADD CONSTRAINT `modificacions_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`),
  ADD CONSTRAINT `personas_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
