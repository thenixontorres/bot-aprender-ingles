-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 09:48 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `funeraria`
--

-- --------------------------------------------------------

--
-- Table structure for table `clausulas`
--

CREATE TABLE IF NOT EXISTS `clausulas` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clausulas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clausulas`
--

INSERT INTO `clausulas` (`id`, `nombre`, `clausulas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clausular estandar', '/clausulas/estandar.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `componentes`
--

CREATE TABLE IF NOT EXISTS `componentes` (
`id` int(10) unsigned NOT NULL,
  `componente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `planes_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `componentes`
--

INSERT INTO `componentes` (`id`, `componente`, `planes_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Servicio Funerario', 1, '0000-00-00 00:00:00', '2017-03-30 05:37:30', NULL),
(2, 'Traslado Local', 1, '0000-00-00 00:00:00', '2017-03-30 05:42:29', '2017-03-30 05:42:29'),
(3, 'Servicio Funerario', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'Traslado Local', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'Servicio Funerario', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'Traslado Local', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 'Otra cosa', 1, '2017-03-30 06:23:21', '2017-03-30 06:23:28', '2017-03-30 06:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
`id` int(10) unsigned NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_vencimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_contrato` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clausula_id` int(10) unsigned NOT NULL,
  `plan_id` int(10) unsigned NOT NULL,
  `tiempo_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto_inicial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contratos`
--

INSERT INTO `contratos` (`id`, `numero`, `fecha_inicio`, `fecha_vencimiento`, `tipo_contrato`, `clausula_id`, `plan_id`, `tiempo_pago`, `monto_total`, `monto_inicial`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '500', '25/03/2017', '25/10/2017', 'Individual', 1, 2, 'Quincenal', '2000', '100000', 'Inactivo', '2017-03-25 07:27:39', '2017-03-27 04:53:45', NULL),
(2, '3242', '23/03/2017', '20/03/2017', 'Colectivo', 1, 1, 'Mensual', '3000', '00000', 'Activo', '2017-03-27 05:20:34', '2017-03-27 05:41:46', NULL),
(3, '0003', '23/03/2017', '27/03/2017', 'Individual', 1, 2, 'Mensual', '2000', '100000', 'Activo', '2017-03-27 07:18:13', '2017-03-28 04:14:11', NULL),
(4, '0002', '28/03/2017', '29/03/2017', 'Colectivo', 1, 1, 'Semanal', '3000', '7000', 'Inactivo', '2017-03-27 07:23:10', '2017-03-28 04:18:07', NULL),
(5, '0002', '29/03/2017', '28/03/2017', 'Colectivo', 1, 1, 'Mensual', '3000', '100000', 'Activo', '2017-03-27 23:38:19', '2017-03-27 23:38:19', NULL),
(6, '0002', '22/03/2017', '21/03/2017', 'Individual', 1, 1, 'Mensual', '3000', '100000', 'Activo', '2017-03-27 23:43:57', '2017-03-27 23:43:57', NULL),
(7, '0002', '29/03/2017', '20/03/2017', 'Individual', 1, 1, 'Mensual', '3000', '100000', 'Activo', '2017-03-28 05:53:55', '2017-03-28 05:53:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
`id` int(10) unsigned NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio_id` int(10) unsigned NOT NULL,
  `contrato_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `telefono`, `direccion`, `municipio_id`, `contrato_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ertetete', 'ertertetet', 'ertertert', 1, 2, '2017-03-27 05:20:35', '2017-03-27 05:20:35', NULL),
(2, 'Maedca GTS', '04169312333', 'Valles de Tuy', 1, 4, '2017-03-27 07:23:11', '2017-03-29 04:43:15', NULL),
(3, 'Servisoft', '02124130401', 'Caracas Futbol club', 1, 5, '2017-03-27 23:38:20', '2017-03-27 23:38:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
`id` int(10) unsigned NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Miranda', '0000-00-00 00:00:00', '2017-03-29 05:49:35', NULL),
(2, 'Guarico', '2017-03-28 05:11:52', '2017-03-28 05:11:52', NULL),
(3, 'Aragua', '2017-03-29 05:49:21', '2017-03-29 05:49:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_200000_create_clausulas_table', 1),
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
-- Table structure for table `modificacions`
--

CREATE TABLE IF NOT EXISTS `modificacions` (
`id` int(10) unsigned NOT NULL,
  `contrato_id` int(10) unsigned NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
`id` int(10) unsigned NOT NULL,
  `municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`id`, `municipio`, `estado_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Independencia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Los Flores', 3, '2017-03-28 05:12:25', '2017-03-29 06:15:51', NULL),
(3, 'Roscio', 2, '2017-03-29 06:06:03', '2017-03-29 06:06:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`id` int(10) unsigned NOT NULL,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero_cuota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_pago` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrato_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`id`, `monto`, `numero_cuota`, `tipo_pago`, `contrato_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '500', '1', 'Oficina', 6, '2017-03-30 01:20:04', '2017-03-30 05:21:33', '2017-03-30 05:21:33'),
(2, '600', '1', 'Oficina', 4, '2017-03-30 01:31:38', '2017-03-30 01:31:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio_id` int(10) unsigned NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrato_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `cedula`, `sexo`, `fecha_nac`, `parentesco`, `telefono`, `municipio_id`, `direccion`, `contrato_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nixon', 'Torres', '22563620', 'Masculino', '29/03/2017', 'Titular', '04169312333', 1, 'fsdfsdfsf', 1, '2017-03-25 07:27:39', '2017-03-25 07:27:39', NULL),
(2, 'beneficiado', 'Torres', '22563620', 'Masculino', '25/03/2017', 'Madre', '04169312333', 1, 'fsdfsdfsf', 1, '2017-03-25 07:28:04', '2017-03-25 07:28:04', NULL),
(3, 'Nixon', 'Ivan', '12345688', 'Masculino', '04/03/2017', 'Titular', '4234324', 1, 'erterterte', 2, '2017-03-27 05:20:35', '2017-03-27 05:20:35', NULL),
(4, 'Manuel', 'Perez', '21563620', 'Masculino', '02/03/2017', 'Titular', '04169312333', 1, 'Calle #3, Avenida #2', 3, '2017-03-27 07:18:14', '2017-03-27 07:18:14', NULL),
(5, 'Petra', 'Rodriguez', '21563654', 'Femenino', '04/03/2017', 'Conyuge', '04169312333', 1, 'Calle #3, Avenida #2', 3, '2017-03-27 07:19:33', '2017-03-27 07:19:33', NULL),
(6, 'Augusto', 'Martinez editado', '21463620', 'Femenino', '11/03/2017', 'Titular', '04169312333', 1, 'Los Flores, casa #15', 4, '2017-03-27 07:23:11', '2017-03-29 04:29:12', NULL),
(7, 'Otro mas', 'Torres Toorealba', '22563623', 'Masculino', '02/03/2017', 'Madre', '04169312333', 1, 'Calle #3, Avenida #2', 3, '2017-03-27 23:18:46', '2017-03-29 05:15:06', '2017-03-29 05:15:06'),
(8, 'Hobre con plata', 'Mucha plata', '22563618', 'Masculino', '22/03/2017', 'Titular', '04169312333', 1, 'EL Cartanal', 5, '2017-03-27 23:38:19', '2017-03-27 23:38:19', NULL),
(9, 'Otro Nombre', 'Otro apellido', '21463620', 'Masculino', '03/03/2017', 'Titular', '04169312333', 1, 'Direccion', 6, '2017-03-27 23:43:58', '2017-03-27 23:43:58', NULL),
(10, 'beneficiado editado', 'Torres', '22563620', 'Masculino', '08/03/2017', 'Padre', '04169312333', 1, 'Direccion', 6, '2017-03-28 04:14:40', '2017-03-29 05:12:41', NULL),
(11, 'beneficiado editado', 'Profesor editado', '22563620', 'Masculino', '26/09/1994', 'Titular', '04169312333', 1, 'ok?', 7, '2017-03-28 05:53:55', '2017-03-29 04:27:31', NULL),
(12, 'beneficiado', 'Profesor', '12345688', 'Masculino', '14/02/1992', 'Madre', '04169312333', 1, 'ok?', 7, '2017-03-28 06:14:15', '2017-03-28 06:14:15', NULL),
(13, 'Nixon', 'Ivan', '21463620', 'Masculino', '16/03/2017', 'Madre', '04169312333', 1, 'Direccion', 6, '2017-03-29 04:44:20', '2017-03-29 05:14:54', '2017-03-29 05:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
`id` int(10) unsigned NOT NULL,
  `plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `informacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`id`, `plan`, `monto`, `informacion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Oro', '4000', 'Descripcion del plan', '0000-00-00 00:00:00', '2017-03-29 06:17:41', NULL),
(2, 'Plata', '2000', 'Descripcion del plan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Bronce', '1000', 'Descripcion del plan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@example.com', '$2y$10$F/ELe4/Qq9mtdqKfxfRjY.Jy1dd5kQw/hJEeaaQv1y88S3/t6WBZO', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clausulas`
--
ALTER TABLE `clausulas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `componentes`
--
ALTER TABLE `componentes`
 ADD PRIMARY KEY (`id`), ADD KEY `componentes_planes_id_foreign` (`planes_id`);

--
-- Indexes for table `contratos`
--
ALTER TABLE `contratos`
 ADD PRIMARY KEY (`id`), ADD KEY `contratos_clausula_id_foreign` (`clausula_id`), ADD KEY `contratos_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
 ADD PRIMARY KEY (`id`), ADD KEY `empresas_municipio_id_foreign` (`municipio_id`), ADD KEY `empresas_contrato_id_foreign` (`contrato_id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modificacions`
--
ALTER TABLE `modificacions`
 ADD PRIMARY KEY (`id`), ADD KEY `modificacions_contrato_id_foreign` (`contrato_id`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
 ADD PRIMARY KEY (`id`), ADD KEY `municipios_estado_id_foreign` (`estado_id`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`id`), ADD KEY `pagos_contrato_id_foreign` (`contrato_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
 ADD PRIMARY KEY (`id`), ADD KEY `personas_municipio_id_foreign` (`municipio_id`), ADD KEY `personas_contrato_id_foreign` (`contrato_id`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clausulas`
--
ALTER TABLE `clausulas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `componentes`
--
ALTER TABLE `componentes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contratos`
--
ALTER TABLE `contratos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `modificacions`
--
ALTER TABLE `modificacions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `componentes`
--
ALTER TABLE `componentes`
ADD CONSTRAINT `componentes_planes_id_foreign` FOREIGN KEY (`planes_id`) REFERENCES `planes` (`id`);

--
-- Constraints for table `contratos`
--
ALTER TABLE `contratos`
ADD CONSTRAINT `contratos_clausula_id_foreign` FOREIGN KEY (`clausula_id`) REFERENCES `clausulas` (`id`),
ADD CONSTRAINT `contratos_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `planes` (`id`);

--
-- Constraints for table `empresas`
--
ALTER TABLE `empresas`
ADD CONSTRAINT `empresas_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`),
ADD CONSTRAINT `empresas_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`);

--
-- Constraints for table `modificacions`
--
ALTER TABLE `modificacions`
ADD CONSTRAINT `modificacions_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`);

--
-- Constraints for table `municipios`
--
ALTER TABLE `municipios`
ADD CONSTRAINT `municipios_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Constraints for table `pagos`
--
ALTER TABLE `pagos`
ADD CONSTRAINT `pagos_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`);

--
-- Constraints for table `personas`
--
ALTER TABLE `personas`
ADD CONSTRAINT `personas_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`),
ADD CONSTRAINT `personas_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
