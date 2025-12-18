-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2023 a las 01:16:44
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `raid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apertura`
--

CREATE TABLE `apertura` (
  `apertura_id` int(11) NOT NULL,
  `apertura_usuario` int(11) NOT NULL,
  `apertura_fragmento` int(11) NOT NULL,
  `apertura_total` int(11) NOT NULL,
  `apertura_porcentaje` decimal(11,0) NOT NULL,
  `apertura_actual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `apertura`
--

INSERT INTO `apertura` (`apertura_id`, `apertura_usuario`, `apertura_fragmento`, `apertura_total`, `apertura_porcentaje`, `apertura_actual`) VALUES
(8, 1, 2, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fragmentos`
--

CREATE TABLE `fragmentos` (
  `shard_id` int(11) NOT NULL,
  `shard_name` char(50) NOT NULL,
  `shard_img` varchar(500) NOT NULL,
  `shard_porcentaje` float NOT NULL,
  `shard_piedad` int(11) NOT NULL,
  `shard_aumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fragmentos`
--

INSERT INTO `fragmentos` (`shard_id`, `shard_name`, `shard_img`, `shard_porcentaje`, `shard_piedad`, `shard_aumento`) VALUES
(1, 'Mystery', 'Mystery_Shard-icon.webp', 0, 0, 0),
(2, 'Ancient', 'Ancient_Shard-icon.webp', 0.5, 200, 5),
(3, 'Void', 'Void_Shard-icon.webp', 0.5, 200, 5),
(4, 'Sacred', 'Sacred_Shard-icon.webp', 6, 12, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_token`
--

CREATE TABLE `login_token` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `selector_hash` varchar(255) NOT NULL,
  `is_expired` int(11) NOT NULL DEFAULT 0,
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `login_token`
--

INSERT INTO `login_token` (`id`, `usuario`, `password_hash`, `selector_hash`, `is_expired`, `expiry_date`) VALUES
(1, 'admin', '$2y$10$MSB4WkbB7OK4xDsxb0BA5Oq1AU/IOCXjfnEN7D2IevGK2diBqyk0y', '$2y$10$W5Yh2r.tQx.kJlJBsZsh3O0y4mP4zNwjRjfNRQW114eHKSxr6sf.C', 1, '2023-04-10 03:45:15'),
(2, 'admin', '$2y$10$Zo1FJxBlf1MHWOY8QeZRcuuML0ODfR.fmDAy3DuoYSumRFlsL9PBa', '$2y$10$GZDS1VPuY7spgkz0lfbOHeBFKr11qfycPIcdPYaMGjNtWYrlvj3BC', 1, '2023-04-10 06:32:15'),
(3, 'admin', '$2y$10$b.T0qMdNoTeyerM4lL9CDOQwY5BXjqkKfVh2z1XRA4dQ3P7SSEP42', '$2y$10$x3w3b6I84QaBczOTrq6KtuyBmYFrwnPJ8z3g6H96USIoV5x4yHNV6', 1, '2023-04-10 06:35:29'),
(4, 'admin', '$2y$10$vb9V3YYi.tBtMyglYqpDo.eE8OApdmtnh/sqTVJgO4C/z28k38/Ri', '$2y$10$UjZMNzO3togQIUHfwEK69ePu/L4Snv226h6ISz.ynqNMmKkCUTKbu', 0, '2023-05-10 13:35:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(200) NOT NULL,
  `usuario_password` varchar(90) NOT NULL,
  `usuario_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_password`, `usuario_email`) VALUES
(1, 'admin', '$2a$10$0FHEQ5/cplO3eEKillHvh.y009Wsf4WCKvQHsZntLamTUToIBe.fG', 'admin@admin.com'),
(7, 'ChrisLoz', '$2y$10$58mdAnBUx8iO69stgqVxsu/tFV7iwdYze/hvbiNfUOwyj6e0CIElK', 'chrisloz.ec@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apertura`
--
ALTER TABLE `apertura`
  ADD PRIMARY KEY (`apertura_id`);

--
-- Indices de la tabla `fragmentos`
--
ALTER TABLE `fragmentos`
  ADD PRIMARY KEY (`shard_id`);

--
-- Indices de la tabla `login_token`
--
ALTER TABLE `login_token`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apertura`
--
ALTER TABLE `apertura`
  MODIFY `apertura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `login_token`
--
ALTER TABLE `login_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
