-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2026 a las 08:54:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_egresados_ues`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ingeniería en Innovación Agrícola Sustentable', '2025-12-31 06:42:19', '2025-12-31 06:42:19'),
(2, 'Ingeniería en Sistemas Computacionales', '2025-12-31 06:42:19', '2025-12-31 06:42:19'),
(3, 'Licenciatura en Contaduría', '2025-12-31 06:42:19', '2025-12-31 06:42:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresados`
--

CREATE TABLE `egresados` (
  `id` int(11) NOT NULL,
  `matricula` char(8) NOT NULL,
  `nombre_completo` varchar(150) NOT NULL,
  `genero` enum('Masculino','Femenino','Otro') NOT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `carrera_id` int(11) NOT NULL,
  `generacion_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `egresados`
--

INSERT INTO `egresados` (`id`, `matricula`, `nombre_completo`, `genero`, `domicilio`, `telefono`, `correo`, `carrera_id`, `generacion_id`, `estatus_id`, `created_at`, `updated_at`) VALUES
(3, 'SIS001', 'Carlos Hernández López', 'Masculino', 'Col. Centro', '5551110001', 'carlos.sis1@mail.com', 1, 1, 1, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(4, 'SIS002', 'Ana María Torres', 'Femenino', 'Col. Reforma', '5551110002', 'ana.sis2@mail.com', 2, 12, 3, '2026-01-02 06:31:44', '2026-01-06 10:06:46'),
(5, 'SIS003', 'Luis Fernando Cruz', 'Masculino', 'Col. Juárez', '5551110003', 'luis.sis3@mail.com', 1, 2, 1, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(6, 'SIS004', 'Mariana Gómez Ruiz', 'Masculino', 'Col. Roma', '5551110004', 'mariana.sis4@mail.com', 1, 2, 2, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(7, 'SIS005', 'José Ángel Pérez', 'Masculino', 'Col. Centro', '5551110005', 'jose.sis5@mail.com', 1, 3, 1, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(8, 'SIS006', 'Daniel Vargas Soto', 'Masculino', 'Col. Del Valle', '5551110006', 'daniel.sis6@mail.com', 1, 3, 2, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(9, 'SIS007', 'Fernanda Ríos', 'Masculino', 'Col. Norte', '5551110007', 'fer.sis7@mail.com', 1, 1, 1, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(10, 'SIS008', 'Miguel Álvarez', 'Masculino', 'Col. Sur', '5551110008', 'miguel.sis8@mail.com', 1, 2, 2, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(11, 'SIS009', 'Paola Jiménez', 'Masculino', 'Col. Centro', '5551110009', 'paola.sis9@mail.com', 1, 3, 1, '2026-01-02 06:31:44', '2026-01-02 06:31:44'),
(13, 'CON001', 'Laura Mendoza', 'Masculino', 'Col. Centro', '5552220001', 'laura.con1@mail.com', 2, 1, 1, '2026-01-02 06:34:14', '2026-01-02 06:34:14'),
(14, 'CON002', 'Jorge Ramírez', 'Masculino', 'Col. Roma', '5552220002', 'jorge.con2@mail.com', 2, 1, 2, '2026-01-02 06:34:14', '2026-01-02 06:34:14'),
(16, 'CON004', 'Ricardo Fuentes', 'Masculino', 'Col. Norte', '5552220004', 'ricardo.con4@mail.com', 2, 2, 2, '2026-01-02 06:34:14', '2026-01-02 06:34:14'),
(17, 'CON005', 'Mónica Herrera', 'Masculino', 'Col. Sur', '5552220005', 'monica.con5@mail.com', 2, 3, 1, '2026-01-02 06:34:14', '2026-01-02 06:34:14'),
(20, 'CON008', 'Iván Torres', 'Masculino', 'Col. Del Valle', '5552220008', 'ivan.con8@mail.com', 2, 2, 2, '2026-01-02 06:34:14', '2026-01-02 06:34:14'),
(21, 'CON009', 'Claudia Moreno', 'Femenino', 'Col. Romance', '5552220009', 'claudia.con9@mail.com', 2, 15, 3, '2026-01-02 06:34:14', '2026-01-04 09:42:10'),
(22, 'CON010', 'Héctor Luna', 'Masculino', 'Col. Centro', '5552220010', 'hector.con10@mail.com', 2, 1, 2, '2026-01-02 06:34:14', '2026-01-02 06:34:14'),
(23, 'ADM001', 'Karen Flores', 'Masculino', 'Col. Centro', '5553330001', 'karen.adm1@mail.com', 3, 1, 1, '2026-01-02 06:34:37', '2026-01-02 06:34:37'),
(24, 'ADM002', 'Raúl Medina', 'Masculino', 'Col. Norte', '5553330002', 'raul.adm2@mail.com', 3, 1, 2, '2026-01-02 06:34:37', '2026-01-02 06:34:37'),
(25, 'ADM003', 'Daniela Ortiz', 'Masculino', 'Col. Juárez', '5553330003', 'daniela.adm3@mail.com', 3, 2, 1, '2026-01-02 06:34:37', '2026-01-02 06:34:37'),
(26, 'ADM004', 'Francisco Pineda', 'Masculino', 'Col. Roma', '5553330004', 'francisco.adm4@mail.com', 3, 2, 2, '2026-01-02 06:34:37', '2026-01-02 06:34:37'),
(27, 'ADM005', 'Andrea Navarro', 'Masculino', 'Col. Centro', '5553330005', 'andrea.adm5@mail.com', 3, 3, 1, '2026-01-02 06:34:37', '2026-01-02 06:34:37'),
(28, 'ADM006', 'Óscar Reyes', 'Masculino', 'Col. Reforma', '5553330006', 'oscar.adm6@mail.com', 3, 3, 2, '2026-01-02 06:34:37', '2026-01-02 06:34:37'),
(30, 'ADM008', 'Emilio Cruz', 'Masculino', 'Col. Sur', '5553330008', 'emilio.adm8@mail.com', 3, 2, 2, '2026-01-02 06:34:37', '2026-01-02 06:34:37'),
(40, '13220045', 'DANIEL BENITEZ', 'Masculino', 'hola', '5578742925', 'ejemplo@correo.com', 2, 15, 2, '2026-01-06 08:31:02', '2026-01-06 08:31:12'),
(41, '12548632', 'Habel', 'Masculino', 'hola', '5578742585', 'ana.sis2@mail.com', 1, 3, 2, '2026-01-06 09:49:42', '2026-01-06 09:49:42'),
(42, '13220049', 'DANIEL BENITEZ', 'Masculino', 'Juas', '5578742925', 'ejemplo@correo.com', 2, 7, 3, '2026-01-06 10:02:21', '2026-01-06 10:02:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Egresado', '2025-12-31 06:43:26', '2025-12-31 06:43:26'),
(2, 'En seguimiento', '2025-12-31 06:43:26', '2025-12-31 06:43:26'),
(3, 'Titulado', '2025-12-31 06:43:26', '2025-12-31 06:43:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generaciones`
--

CREATE TABLE `generaciones` (
  `id` int(11) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generaciones`
--

INSERT INTO `generaciones` (`id`, `periodo`, `created_at`, `updated_at`) VALUES
(1, '2007-2012', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(2, '2008-2013', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(3, '2009-2014', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(4, '2010-2015', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(5, '2011-2016', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(6, '2012-2017', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(7, '2013-2018', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(8, '2014-2019', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(9, '2015-2020', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(10, '2016-2021', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(11, '2017-2022', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(12, '2018-2023', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(13, '2019-2024', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(14, '2020-2025', '2025-12-31 06:43:01', '2025-12-31 06:43:01'),
(15, '2025-2026', '2025-12-31 06:43:01', '2025-12-31 06:43:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hfuXKVetVnWsc9ADh40k2N8OF93ubBSc5KrSA9Lx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNU9LR3BHM1JQUG1tanJBd1NYNmZGUkx5Z2JrMTlEMFhkd2cySU1KSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1767666879),
('JkZiWErnH37LbppHYwEZx74AMxZtXQFBekjqALaw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUpkU2pvNGdkZUhhaXhZYWN6c1lvSlNzNnN2cnVWM1J1UUZnamg5TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1767673242);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@ues.edu.mx', NULL, '$2y$12$jIIaICWtyaPlRraMVdUx8O4p5EeLHZOzhlaeo2gjwVJzweM2PZN5y', NULL, '2026-01-06 09:34:51', '2026-01-06 09:34:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `activo`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Administrador', 'admin@ues.edu.mx', '$2y$12$4uVPqz5JSYp0LpWg75JNkubN/xyGhgU5IZZwKnSHKuLGsEwGFz44u', 1, '2025-12-31 13:41:50', '2026-01-03 03:40:31', 1),
(2, 'usuario', 'usuario@gmail.com', '$2y$12$lOg/Ab/ymUQ9gAFJWFBea.8V.8d3a9CNnGue3FMrcY5JDBATegKhG', 1, '2026-01-03 03:39:53', '2026-01-03 09:43:00', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egresados`
--
ALTER TABLE `egresados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `fk_egresados_carrera` (`carrera_id`),
  ADD KEY `fk_egresados_generacion` (`generacion_id`),
  ADD KEY `fk_egresados_estatus` (`estatus_id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `generaciones`
--
ALTER TABLE `generaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuario_rol` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `egresados`
--
ALTER TABLE `egresados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generaciones`
--
ALTER TABLE `generaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `egresados`
--
ALTER TABLE `egresados`
  ADD CONSTRAINT `fk_egresados_carrera` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `fk_egresados_estatus` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`),
  ADD CONSTRAINT `fk_egresados_generacion` FOREIGN KEY (`generacion_id`) REFERENCES `generaciones` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
