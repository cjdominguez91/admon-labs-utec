-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2020 a las 09:31:49
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admon_labs_utec_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `facultad` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `facultad`, `timestamp`) VALUES
(1, 'PSICOLOGIA', 2, NULL),
(2, 'carrera 2', 3, NULL),
(3, 'carrera 3', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`, `timestamp`) VALUES
(2, 'Sociales', '2020-09-17 00:00:00'),
(3, 'Informatica', NULL),
(4, 'Derecho', NULL),
(6, 'INGENIERIA', '2020-09-29 00:01:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `timestamp`) VALUES
(2, 'progra1', NULL),
(3, 'matematicas', NULL),
(4, 'INGLES', NULL),
(5, 'EXOE23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia-carreras`
--

CREATE TABLE `materia-carreras` (
  `id` int(11) NOT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia-carreras`
--

INSERT INTO `materia-carreras` (`id`, `materia_id`, `carrera_id`, `timestamp`) VALUES
(1, 2, 2, NULL),
(2, 3, 2, NULL),
(3, 2, 1, NULL),
(4, 3, 1, NULL),
(5, 4, 1, NULL),
(6, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_09_27_165803_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create roles', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(2, 'read roles', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(3, 'edit roles', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(4, 'delete roles', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(5, 'create users', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(6, 'read users', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(7, 'edit users', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(8, 'delete users', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(9, 'create permissions', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(10, 'read permissions', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(11, 'edit permissions', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(12, 'delete permissions', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(13, 'create facultades', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(14, 'read facultades', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(15, 'edit facultades', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(16, 'delete facultades', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(17, 'create carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(18, 'read carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(19, 'edit carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(20, 'delete carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(21, 'create materias-materia-carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(22, 'read materia-carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(23, 'edit materia-carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(24, 'delete materia-carreras', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(25, 'create materias-materias', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(26, 'read materias', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(27, 'edit materias', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(28, 'delete materias', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(29, 'create horarios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(30, 'read horarios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(31, 'edit horarios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(32, 'delete horarios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(33, 'create practicas', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(34, 'read practicas', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(35, 'edit practicas', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(36, 'delete practicas', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(37, 'create software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(38, 'read software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(39, 'edit software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(40, 'delete software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(41, 'create laboratorio-software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(42, 'read laboratorio-software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(43, 'edit laboratorio-software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(44, 'delete laboratorio-software', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(45, 'create laboratorios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(46, 'read laboratorios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(47, 'edit laboratorios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(48, 'delete laboratorios', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21'),
(2, 'administrador', 'web', '2020-09-28 00:03:21', '2020-09-28 00:03:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `software`
--

INSERT INTO `software` (`id`, `nombre`, `timestamp`) VALUES
(1, 'VISUAL STUDIO 2016', NULL),
(2, 'SQLSERVER', NULL),
(4, 'VISUAL CODE', NULL),
(5, 'MYSQLSERVER', '2020-09-29 00:12:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_ingreso` tinyint(1) DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `password`, `estatus`, `primer_ingreso`, `fecha_baja`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ricardo', 'moreno', 'rmoreno@gmail.com', '$2y$10$jVme8QkL8T1wC2n.e3AwIO48yOewy74IC.hzowUlA36/aj5/zbIZG', 'A', NULL, NULL, NULL, NULL, '2020-09-27 22:44:37', '2020-09-27 22:44:37'),
(2, 'admin lab', 'admin lab', 'admin@gmail.com', '$2y$10$XKlpO3Z47048KPazGPpJIOwSZCe2TdTVrN.qi6oO/dzFJN1.dAfAW', 'A', NULL, NULL, NULL, NULL, '2020-09-28 00:06:51', '2020-09-28 00:06:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia-carreras`
--
ALTER TABLE `materia-carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
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
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materia-carreras`
--
ALTER TABLE `materia-carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
