-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-06-2017 a las 21:39:53
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
(1, 'Clausulas estandar', '/clausulas/Clausulas estandar.', '2017-07-01 03:14:44', '2017-07-01 03:14:44', NULL);

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
(1, 'Comnponente de Prueba', 1, '2017-07-01 03:14:27', '2017-07-01 03:14:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_vencimiento` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
(1, '000056', '2017-06-02 03:19:39', '2017-12-02 03:19:39', 'Colectivo', 1, 1, 'Mensual', '200000', '100000', 'Activo', 1, 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(2, '000058', '2015-05-09 03:54:36', '2015-11-09 03:54:36', 'Colectivo', 1, 1, 'Mensual', '200000', '100000', 'Activo', 1, 1, '2017-07-01 03:24:36', '2017-07-01 03:24:36', NULL);

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
(1, 'Empleado', 'Apellido', '22563619', 'Cobrador', '04162345498', '2017-07-01 03:15:11', '2017-07-01 03:15:11', NULL);

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
(1, 'Empresa', '04167856675', 'sdfsdfsdf', 1, 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(2, 'Empresa', '04167856675', 'dfsdfsdf', 1, 2, '2017-07-01 03:24:38', '2017-07-01 03:24:38', NULL);

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
(1, 'Miranda', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

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
('2014_06_07_225334_create_empleados_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
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
('2017_03_24_235455_create_componentes_table', 1);

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
(1, 'Independiencia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_cuota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_pago` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estatus` enum('pendiente','cancelado') COLLATE utf8_unicode_ci NOT NULL,
  `concepto` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `contrato_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `monto`, `numero_cuota`, `tipo_pago`, `estatus`, `concepto`, `contrato_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '33333.333333333', '1', 'Banco', 'cancelado', '2017-07-02 03:19:39', 1, '2017-07-01 03:19:39', '2017-07-01 03:33:57', NULL),
(2, '33333.333333333', '2', NULL, 'pendiente', '2017-08-02 03:19:39', 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(3, '33333.333333333', '3', NULL, 'pendiente', '2017-09-02 03:19:39', 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(4, '33333.333333333', '4', NULL, 'pendiente', '2017-10-02 03:19:39', 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(5, '33333.333333333', '5', NULL, 'pendiente', '2017-11-02 03:19:39', 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(6, '33333.333333333', '6', NULL, 'pendiente', '2017-12-02 03:19:39', 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(7, '33333.333333333', '1', 'Banco', 'cancelado', '2015-06-09 03:54:36', 2, '2017-07-01 03:24:37', '2017-07-01 05:37:43', NULL),
(8, '33333.333333333', '2', NULL, 'pendiente', '2015-07-09 03:54:36', 2, '2017-07-01 03:24:37', '2017-07-01 03:24:37', NULL),
(9, '33333.333333333', '3', NULL, 'pendiente', '2015-08-09 03:54:36', 2, '2017-07-01 03:24:37', '2017-07-01 03:24:37', NULL),
(10, '33333.333333333', '4', NULL, 'pendiente', '2015-09-09 03:54:36', 2, '2017-07-01 03:24:37', '2017-07-01 03:24:37', NULL),
(11, '33333.333333333', '5', NULL, 'pendiente', '2015-10-09 03:54:36', 2, '2017-07-01 03:24:38', '2017-07-01 03:24:38', NULL),
(12, '33333.333333333', '6', NULL, 'pendiente', '2015-11-09 03:54:36', 2, '2017-07-01 03:24:38', '2017-07-01 03:24:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'werwe', 'Torres', '22563617', 'Masculino', '01/06/1994', 'Titular', NULL, '04169312333', 1, 'sdfsdfsdf', 1, '2017-07-01 03:19:39', '2017-07-01 03:19:39', NULL),
(2, 'werwe', 'Torres', '22003617', 'Masculino', '26/09/1994', 'Titular', NULL, '04169312333', 1, 'sdfsdfdsf', 2, '2017-07-01 03:24:37', '2017-07-01 03:24:37', NULL);

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
(1, 'Oro', '200000', 'Descripcion', '2017-07-01 03:14:17', '2017-07-01 03:14:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empleado_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id`, `direccion`, `empleado_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ruta de Prueba', 1, '2017-07-01 03:16:25', '2017-07-01 03:16:25', NULL);

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
  `tipo` enum('admin','master') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `telefono`, `cedula`, `apellido`, `nombre`, `tipo`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'master', 'master@example.com', '$2y$10$etehTrvvbEh3T5/QuEu4VOCiT4yl13juSyy0vscbA4sV/QTvZsQSK', '0000-000-0000', '00000000', 'master', 'master', 'master', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'admin', 'admin@example.com', '$2y$10$yBRoC5Z8jHExzOvECbqH/O20gblvtKD254XxuU6Jdoe7dy9ZHfU0e', '0000-000-0000', '00000001', 'admin', 'admin', 'admin', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutas_empleado_id_foreign` (`empleado_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `modificacions`
--
ALTER TABLE `modificacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

--
-- Filtros para la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `rutas_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
