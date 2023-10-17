-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 01:47:32
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
-- Base de datos: `colombia_transporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buses`
--

CREATE TABLE `buses` (
  `ID_bus` int(11) NOT NULL,
  `Numero_placa` varchar(20) DEFAULT NULL,
  `Modelo_bus` varchar(4) DEFAULT NULL,
  `Capacidad_asientos` int(11) DEFAULT NULL,
  `ID_ruta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `buses`
--

INSERT INTO `buses` (`ID_bus`, `Numero_placa`, `Modelo_bus`, `Capacidad_asientos`, `ID_ruta`) VALUES
(1, 'ABC123', '2017', 20, 1),
(2, 'DEF456', '2018', 25, 2),
(3, 'GHI789', '2019', 30, 3),
(4, 'JKL012', '2020', 35, 4),
(5, 'MNO345', '2021', 40, 5),
(6, 'PQR678', '2022', 20, 6),
(7, 'STU901', '2023', 25, 7),
(8, 'VWX234', '2017', 30, 8),
(9, 'YZA567', '2018', 35, 9),
(10, 'BCD890', '2019', 40, 10),
(11, 'EFG123', '2020', 20, 11),
(12, 'HIJ456', '2021', 25, 12),
(13, 'KLM789', '2022', 30, 13),
(14, 'NOP012', '2023', 35, 14),
(15, 'PQR345', '2017', 40, 15),
(16, 'STU678', '2018', 20, 16),
(17, 'VWX901', '2019', 25, 17),
(18, 'YZA234', '2020', 30, 18),
(19, 'BCD567', '2021', 35, 19),
(20, 'EFG890', '2022', 40, 20),
(21, 'HIJ123', '2023', 20, 21),
(22, 'KLM456', '2017', 25, 22),
(23, 'NOP789', '2018', 30, 23),
(24, 'PQR012', '2019', 35, 24),
(25, 'STU345', '2020', 40, 25),
(26, 'VWX678', '2021', 20, 26),
(27, 'YZA901', '2022', 25, 27),
(28, 'BCD234', '2023', 30, 28),
(29, 'EFG567', '2017', 35, 29),
(30, 'HIJ890', '2018', 40, 30),
(31, 'KLM123', '2019', 20, 31),
(32, 'NOP456', '2020', 25, 32),
(33, 'PQR789', '2021', 30, 33),
(34, 'STU012', '2022', 35, 34),
(35, 'VWX345', '2023', 40, 35),
(36, 'YZA678', '2017', 20, 36),
(37, 'BCD901', '2018', 25, 37),
(38, 'EFG234', '2019', 30, 38),
(39, 'HIJ567', '2020', 35, 39),
(40, 'KLM890', '2021', 40, 40),
(41, 'NOP123', '2022', 20, 41),
(42, 'PQR456', '2023', 25, 42),
(43, 'STU789', '2017', 30, 43),
(44, 'VWX012', '2018', 35, 44),
(45, 'YZA345', '2019', 40, 45),
(46, 'BCD678', '2020', 20, 46),
(47, 'EFG901', '2021', 25, 47),
(48, 'HIJ234', '2022', 30, 48),
(49, 'KLM567', '2023', 35, 49),
(50, 'NOP890', '2017', 40, 50),
(51, 'PQR123', '2018', 20, 51),
(52, 'STU456', '2019', 25, 52),
(53, 'VWX789', '2020', 30, 53),
(54, 'YZA012', '2021', 35, 54),
(55, 'BCD345', '2022', 40, 55),
(56, 'EFG678', '2023', 20, 56),
(57, 'HIJ901', '2017', 25, 57),
(58, 'KLM234', '2018', 30, 58),
(59, 'NOP567', '2019', 35, 59),
(60, 'PQR890', '2020', 40, 60),
(61, 'STU123', '2021', 20, 61),
(62, 'VWX456', '2022', 25, 62),
(63, 'YZA789', '2023', 30, 63),
(64, 'BCD012', '2017', 35, 64),
(65, 'EFG345', '2018', 40, 65),
(66, 'HIJ678', '2019', 20, 66),
(67, 'KLM901', '2020', 25, 67),
(68, 'NOP234', '2021', 30, 68),
(69, 'PQR567', '2022', 35, 69),
(70, 'STU890', '2023', 40, 70),
(71, 'VWX123', '2017', 20, 71),
(72, 'YZA456', '2018', 25, 72),
(73, 'BCD789', '2019', 30, 73),
(74, 'EFG012', '2020', 35, 74),
(75, 'HIJ345', '2021', 40, 75),
(76, 'KLM678', '2022', 20, 76),
(77, 'NOP901', '2023', 25, 77),
(78, 'PQR234', '2017', 30, 78),
(79, 'STU567', '2018', 35, 79),
(80, 'VWX890', '2019', 40, 80),
(81, 'YZA123', '2020', 20, 81),
(82, 'BCD456', '2021', 25, 82),
(83, 'EFG789', '2022', 30, 83),
(84, 'HIJ012', '2023', 35, 84),
(85, 'KLM345', '2017', 40, 85),
(86, 'NOP678', '2018', 20, 86),
(87, 'PQR901', '2019', 25, 87),
(88, 'STU234', '2020', 30, 88),
(89, 'VWX567', '2021', 35, 89),
(90, 'YZA890', '2022', 40, 90),
(91, 'BCD123', '2023', 20, 91),
(92, 'EFG456', '2017', 25, 92),
(93, 'HIJ789', '2018', 30, 93),
(94, 'KLM012', '2019', 35, 94),
(95, 'NOP345', '2020', 40, 95),
(96, 'PQR678', '2021', 20, 96),
(97, 'STU901', '2022', 25, 97),
(98, 'VWX234', '2023', 30, 98),
(99, 'YZA567', '2017', 35, 99),
(100, 'BCD890', '2018', 40, 100),
(101, 'EFG123', '2019', 20, 101),
(102, 'HIJ456', '2020', 25, 102),
(103, 'KLM789', '2021', 30, 103),
(104, 'NOP012', '2022', 35, 104),
(105, 'PQR345', '2023', 40, 105),
(106, 'STU678', '2017', 20, 106),
(107, 'VWX901', '2018', 25, 107),
(108, 'YZA234', '2019', 30, 108),
(109, 'BCD567', '2020', 35, 109),
(110, 'EFG890', '2021', 40, 110),
(111, 'HIJ123', '2022', 20, 111),
(112, 'KLM456', '2023', 25, 112),
(113, 'NOP789', '2017', 30, 113),
(114, 'PQR012', '2018', 35, 114),
(115, 'STU345', '2019', 40, 115),
(116, 'VWX678', '2020', 20, 116);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `ID_ciudad` int(11) NOT NULL,
  `Nombre_ciudad` varchar(100) NOT NULL,
  `Departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`ID_ciudad`, `Nombre_ciudad`, `Departamento`) VALUES
(1, 'Bogotá', 'Bogotá D.C.'),
(2, 'Medellín', 'Antioquia'),
(3, 'Cali', 'Valle del Cauca'),
(4, 'Barranquilla', 'Atlántico'),
(5, 'Cartagena', 'Bolívar'),
(6, 'Santa Marta', 'Magdalena'),
(7, 'Villavicencio', 'Meta'),
(8, 'Bucaramanga', 'Santander'),
(9, 'Cúcuta', 'Norte de Santander'),
(10, 'Pereira', 'Risaralda'),
(11, 'Manizales', 'Caldas'),
(12, 'Armenia', 'Quindío'),
(13, 'Neiva', 'Huila'),
(14, 'Ibagué', 'Tolima'),
(15, 'Tunja', 'Boyacá'),
(16, 'Quibdó', 'Chocó'),
(17, 'Montería', 'Córdoba'),
(18, 'Sincelejo', 'Sucre'),
(19, 'Riohacha', 'La Guajira'),
(20, 'Yopal', 'Casanare'),
(21, 'Popayán', 'Cauca'),
(22, 'Florencia', 'Caquetá'),
(23, 'Puerto Carreño', 'Vichada'),
(24, 'San José del Guaviare', 'Guaviare'),
(25, 'Mocoa', 'Putumayo'),
(26, 'Leticia', 'Amazonas'),
(27, 'Arauca', 'Arauca'),
(28, 'Inírida', 'Guainía'),
(29, 'Mitú', 'Vaupés'),
(30, 'Pasto', 'Nariño'),
(31, 'Valledupar', 'Cesar'),
(32, 'Quipile', 'Cundinamarca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID_ticket` int(11) NOT NULL,
  `Nombre_completo` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Asunto` varchar(80) NOT NULL,
  `Mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`ID_ticket`, `Nombre_completo`, `Correo`, `Telefono`, `Asunto`, `Mensaje`) VALUES
(1, 'Alejandro Mira', 'alejandromira2105@gmail.com', '3202871949', 'No puedo comprar boletas', 'No puedo comprar boletas ya que la pagina esta muy lenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `ID_reserva` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_ruta` int(11) DEFAULT NULL,
  `Fecha_reserva` date DEFAULT NULL,
  `Numero_asientos_reservados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `ID_ruta` int(11) NOT NULL,
  `Ciudad_origen` int(11) DEFAULT NULL,
  `Ciudad_destino` int(11) DEFAULT NULL,
  `Horario_partida` datetime DEFAULT NULL,
  `Horario_llegada` datetime DEFAULT NULL,
  `Precio_boleto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`ID_ruta`, `Ciudad_origen`, `Ciudad_destino`, `Horario_partida`, `Horario_llegada`, `Precio_boleto`) VALUES
(1, 1, 2, '2023-10-20 08:00:00', '2023-10-20 12:00:00', 50000),
(2, 2, 3, '2023-10-20 10:00:00', '2023-10-20 14:00:00', 55000),
(3, 3, 4, '2023-10-20 12:00:00', '2023-10-20 16:00:00', 52000),
(4, 4, 5, '2023-10-20 14:00:00', '2023-10-20 18:00:00', 57000),
(5, 5, 6, '2023-10-20 16:00:00', '2023-10-20 20:00:00', 55000),
(6, 6, 7, '2023-10-20 18:00:00', '2023-10-20 22:00:00', 59000),
(7, 7, 8, '2023-10-20 20:00:00', '2023-10-20 00:00:00', 60000),
(8, 8, 9, '2023-10-21 08:00:00', '2023-10-21 12:00:00', 51000),
(9, 9, 10, '2023-10-21 10:00:00', '2023-10-21 14:00:00', 54000),
(10, 10, 11, '2023-10-21 12:00:00', '2023-10-21 16:00:00', 53000),
(11, 11, 12, '2023-10-21 14:00:00', '2023-10-21 18:00:00', 56000),
(12, 12, 13, '2023-10-21 16:00:00', '2023-10-21 20:00:00', 58000),
(13, 13, 14, '2023-10-21 18:00:00', '2023-10-21 22:00:00', 59000),
(14, 14, 15, '2023-10-21 20:00:00', '2023-10-21 00:00:00', 62000),
(15, 15, 16, '2023-10-22 08:00:00', '2023-10-22 12:00:00', 51000),
(16, 16, 17, '2023-10-22 10:00:00', '2023-10-22 14:00:00', 54000),
(17, 17, 18, '2023-10-22 12:00:00', '2023-10-22 16:00:00', 53000),
(18, 18, 19, '2023-10-22 14:00:00', '2023-10-22 18:00:00', 56000),
(19, 19, 20, '2023-10-22 16:00:00', '2023-10-22 20:00:00', 58000),
(20, 20, 21, '2023-10-22 18:00:00', '2023-10-22 22:00:00', 59000),
(21, 21, 22, '2023-10-22 20:00:00', '2023-10-22 00:00:00', 62000),
(22, 22, 23, '2023-10-23 08:00:00', '2023-10-23 12:00:00', 51000),
(23, 23, 24, '2023-10-23 10:00:00', '2023-10-23 14:00:00', 54000),
(24, 24, 25, '2023-10-23 12:00:00', '2023-10-23 16:00:00', 53000),
(25, 25, 26, '2023-10-23 14:00:00', '2023-10-23 18:00:00', 56000),
(26, 26, 27, '2023-10-23 16:00:00', '2023-10-23 20:00:00', 58000),
(27, 27, 28, '2023-10-23 18:00:00', '2023-10-23 22:00:00', 59000),
(28, 28, 29, '2023-10-23 20:00:00', '2023-10-23 00:00:00', 62000),
(29, 29, 30, '2023-10-24 08:00:00', '2023-10-24 12:00:00', 51000),
(30, 30, 31, '2023-10-24 10:00:00', '2023-10-24 14:00:00', 54000),
(31, 31, 32, '2023-10-24 12:00:00', '2023-10-24 16:00:00', 53000),
(32, 32, 1, '2023-10-24 14:00:00', '2023-10-24 18:00:00', 56000),
(33, 1, 2, '2023-10-24 16:00:00', '2023-10-24 20:00:00', 58000),
(34, 2, 3, '2023-10-24 18:00:00', '2023-10-24 22:00:00', 59000),
(35, 3, 4, '2023-10-24 20:00:00', '2023-10-24 00:00:00', 62000),
(36, 4, 5, '2023-10-25 08:00:00', '2023-10-25 12:00:00', 50000),
(37, 5, 6, '2023-10-25 10:00:00', '2023-10-25 14:00:00', 55000),
(38, 6, 7, '2023-10-25 12:00:00', '2023-10-25 16:00:00', 52000),
(39, 7, 8, '2023-10-25 14:00:00', '2023-10-25 18:00:00', 57000),
(40, 8, 9, '2023-10-25 16:00:00', '2023-10-25 20:00:00', 55000),
(41, 9, 10, '2023-10-25 18:00:00', '2023-10-25 22:00:00', 59000),
(42, 10, 11, '2023-10-25 20:00:00', '2023-10-25 00:00:00', 60000),
(43, 11, 12, '2023-10-26 08:00:00', '2023-10-26 12:00:00', 51000),
(44, 12, 13, '2023-10-26 10:00:00', '2023-10-26 14:00:00', 54000),
(45, 13, 14, '2023-10-26 12:00:00', '2023-10-26 16:00:00', 53000),
(46, 14, 15, '2023-10-26 14:00:00', '2023-10-26 18:00:00', 56000),
(47, 15, 16, '2023-10-26 16:00:00', '2023-10-26 20:00:00', 58000),
(48, 16, 17, '2023-10-26 18:00:00', '2023-10-26 22:00:00', 59000),
(49, 17, 18, '2023-10-26 20:00:00', '2023-10-26 00:00:00', 62000),
(50, 18, 19, '2023-10-27 08:00:00', '2023-10-27 12:00:00', 51000),
(51, 19, 20, '2023-10-27 10:00:00', '2023-10-27 14:00:00', 54000),
(52, 20, 21, '2023-10-27 12:00:00', '2023-10-27 16:00:00', 53000),
(53, 21, 22, '2023-10-27 14:00:00', '2023-10-27 18:00:00', 56000),
(54, 22, 23, '2023-10-27 16:00:00', '2023-10-27 20:00:00', 58000),
(55, 23, 24, '2023-10-27 18:00:00', '2023-10-27 22:00:00', 59000),
(56, 24, 25, '2023-10-27 20:00:00', '2023-10-27 00:00:00', 62000),
(57, 25, 26, '2023-10-28 08:00:00', '2023-10-28 12:00:00', 51000),
(58, 26, 27, '2023-10-28 10:00:00', '2023-10-28 14:00:00', 54000),
(59, 27, 28, '2023-10-28 12:00:00', '2023-10-28 16:00:00', 53000),
(60, 28, 29, '2023-10-28 14:00:00', '2023-10-28 18:00:00', 56000),
(61, 29, 30, '2023-10-28 16:00:00', '2023-10-28 20:00:00', 58000),
(62, 30, 31, '2023-10-28 18:00:00', '2023-10-28 22:00:00', 59000),
(63, 31, 32, '2023-10-28 20:00:00', '2023-10-28 00:00:00', 62000),
(64, 32, 1, '2023-10-29 08:00:00', '2023-10-29 12:00:00', 51000),
(65, 1, 2, '2023-10-29 10:00:00', '2023-10-29 14:00:00', 54000),
(66, 2, 3, '2023-10-29 12:00:00', '2023-10-29 16:00:00', 53000),
(67, 3, 4, '2023-10-29 14:00:00', '2023-10-29 18:00:00', 56000),
(68, 4, 5, '2023-10-29 16:00:00', '2023-10-29 20:00:00', 58000),
(69, 5, 6, '2023-10-29 18:00:00', '2023-10-29 22:00:00', 59000),
(70, 6, 7, '2023-10-29 20:00:00', '2023-10-29 00:00:00', 62000),
(71, 7, 8, '2023-10-30 08:00:00', '2023-10-30 12:00:00', 50000),
(72, 8, 9, '2023-10-30 10:00:00', '2023-10-30 14:00:00', 55000),
(73, 9, 10, '2023-10-30 12:00:00', '2023-10-30 16:00:00', 52000),
(74, 10, 11, '2023-10-30 14:00:00', '2023-10-30 18:00:00', 57000),
(75, 11, 12, '2023-10-30 16:00:00', '2023-10-30 20:00:00', 55000),
(76, 12, 13, '2023-10-30 18:00:00', '2023-10-30 22:00:00', 59000),
(77, 13, 14, '2023-10-30 20:00:00', '2023-10-30 00:00:00', 60000),
(78, 14, 15, '2023-10-31 08:00:00', '2023-10-31 12:00:00', 51000),
(79, 15, 16, '2023-10-31 10:00:00', '2023-10-31 14:00:00', 54000),
(80, 16, 17, '2023-10-31 12:00:00', '2023-10-31 16:00:00', 53000),
(81, 17, 18, '2023-10-31 14:00:00', '2023-10-31 18:00:00', 56000),
(82, 18, 19, '2023-10-31 16:00:00', '2023-10-31 20:00:00', 58000),
(83, 19, 20, '2023-10-31 18:00:00', '2023-10-31 22:00:00', 59000),
(84, 20, 21, '2023-10-31 20:00:00', '2023-10-31 00:00:00', 62000),
(85, 21, 22, '2023-11-01 08:00:00', '2023-11-01 12:00:00', 51000),
(86, 22, 23, '2023-11-01 10:00:00', '2023-11-01 14:00:00', 54000),
(87, 23, 24, '2023-11-01 12:00:00', '2023-11-01 16:00:00', 53000),
(88, 24, 25, '2023-11-01 14:00:00', '2023-11-01 18:00:00', 56000),
(89, 25, 26, '2023-11-01 16:00:00', '2023-11-01 20:00:00', 58000),
(90, 26, 27, '2023-11-01 18:00:00', '2023-11-01 22:00:00', 59000),
(91, 27, 28, '2023-11-01 20:00:00', '2023-11-01 00:00:00', 62000),
(92, 28, 29, '2023-11-02 08:00:00', '2023-11-02 12:00:00', 51000),
(93, 29, 30, '2023-11-02 10:00:00', '2023-11-02 14:00:00', 54000),
(94, 30, 31, '2023-11-02 12:00:00', '2023-11-02 16:00:00', 53000),
(95, 31, 32, '2023-11-02 14:00:00', '2023-11-02 18:00:00', 56000),
(96, 32, 1, '2023-11-02 16:00:00', '2023-11-02 20:00:00', 58000),
(97, 1, 2, '2023-11-02 18:00:00', '2023-11-02 22:00:00', 59000),
(98, 2, 3, '2023-11-02 20:00:00', '2023-11-02 00:00:00', 62000),
(99, 3, 4, '2023-11-03 08:00:00', '2023-11-03 12:00:00', 51000),
(100, 4, 5, '2023-11-03 10:00:00', '2023-11-03 14:00:00', 54000),
(101, 5, 6, '2023-11-03 12:00:00', '2023-11-03 16:00:00', 53000),
(102, 6, 7, '2023-11-03 14:00:00', '2023-11-03 18:00:00', 56000),
(103, 7, 8, '2023-11-03 16:00:00', '2023-11-03 20:00:00', 58000),
(104, 8, 9, '2023-11-03 18:00:00', '2023-11-03 22:00:00', 59000),
(105, 9, 10, '2023-11-03 20:00:00', '2023-11-03 00:00:00', 62000),
(106, 10, 11, '2023-11-04 08:00:00', '2023-11-04 12:00:00', 51000),
(107, 11, 12, '2023-11-04 10:00:00', '2023-11-04 14:00:00', 54000),
(108, 12, 13, '2023-11-04 12:00:00', '2023-11-04 16:00:00', 53000),
(109, 13, 14, '2023-11-04 14:00:00', '2023-11-04 18:00:00', 56000),
(110, 14, 15, '2023-11-04 16:00:00', '2023-11-04 20:00:00', 58000),
(111, 15, 16, '2023-11-04 18:00:00', '2023-11-04 22:00:00', 59000),
(112, 16, 17, '2023-11-04 20:00:00', '2023-11-04 00:00:00', 62000),
(113, 17, 18, '2023-11-05 08:00:00', '2023-11-05 12:00:00', 51000),
(114, 18, 19, '2023-11-05 10:00:00', '2023-11-05 14:00:00', 54000),
(115, 19, 20, '2023-11-05 12:00:00', '2023-11-05 16:00:00', 53000),
(116, 20, 21, '2023-11-05 14:00:00', '2023-11-05 18:00:00', 56000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `Nombre_Completo` varchar(80) DEFAULT NULL,
  `Correo_Electronico` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `Nombre_Completo`, `Correo_Electronico`, `Contrasena`, `Telefono`, `Rol`) VALUES
(4, 'Ana Sofía Beltrán Ramírez', 'anabeltranuwu@gmail.com', '$2y$10$cBvxnXaVeDPnQZpgos239.Z2yAlmc1tAxuV8hYmL.Gq//rKGFzRMG', '3188309523', 'Administrador'),
(5, 'Matias Guisao', 'matias@correo.com', '$2y$10$HsxwF/pHVsUsZf.w3GFyuuuJonOapmkAVH37DDJnXKvkFEE7deaOK', '3117612979', 'Cliente'),
(6, 'Alejandro Mira', 'alejandromira2105@gmail.com', '$2y$10$qAl/TT5Kxg1wh1I2ZOyHbuvU5z6psZzZO5WovRORZ2HHT/PMxbbzi', '3202871949', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`ID_bus`),
  ADD KEY `ID_ruta` (`ID_ruta`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`ID_ciudad`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID_ticket`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`ID_reserva`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_ruta` (`ID_ruta`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`ID_ruta`),
  ADD KEY `Ciudad_origen` (`Ciudad_origen`),
  ADD KEY `Ciudad_destino` (`Ciudad_destino`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `buses`
--
ALTER TABLE `buses`
  MODIFY `ID_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `ID_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `ID_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `ID_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_ibfk_1` FOREIGN KEY (`ID_ruta`) REFERENCES `rutas` (`ID_ruta`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`ID_ruta`) REFERENCES `rutas` (`ID_ruta`);

--
-- Filtros para la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `rutas_ibfk_1` FOREIGN KEY (`Ciudad_origen`) REFERENCES `ciudades` (`ID_ciudad`),
  ADD CONSTRAINT `rutas_ibfk_2` FOREIGN KEY (`Ciudad_destino`) REFERENCES `ciudades` (`ID_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
