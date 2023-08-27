-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 12:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colombia_transporte`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `ID_bus` int(11) NOT NULL,
  `Numero_placa` varchar(20) DEFAULT NULL,
  `Modelo_bus` varchar(4) DEFAULT NULL,
  `Capacidad_asientos` int(11) DEFAULT NULL,
  `ID_ruta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE `ciudades` (
  `ID_ciudad` int(11) NOT NULL,
  `Nombre_ciudad` varchar(100) NOT NULL,
  `Departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ciudades`
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
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
  `ID_reserva` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_ruta` int(11) DEFAULT NULL,
  `Fecha_reserva` date DEFAULT NULL,
  `Numero_asientos_reservados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rutas`
--

CREATE TABLE `rutas` (
  `ID_ruta` int(11) NOT NULL,
  `Ciudad_origen` int(11) DEFAULT NULL,
  `Ciudad_destino` int(11) DEFAULT NULL,
  `Horario_partida` time DEFAULT NULL,
  `Horario_llegada` time DEFAULT NULL,
  `Precio_boleto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `Nombre_Completo` varchar(80) DEFAULT NULL,
  `Correo_Electronico` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `Nombre_Completo`, `Correo_Electronico`, `Contrasena`, `Telefono`) VALUES
(1, 'Ana Sofia Beltran', 'anabeltranuwu@gmail.com', '123456', '3202871949'),
(2, 'Alejandro Mira', 'alejandromira2105@gmail.com', '$2y$10$kiPd8LPLMEyWB1.TCuwAGuPQzu5JAztDkrWSeuXpMTiP1YWB11vL2', '3202871949'),
(3, 'Laury Selen', 'Lauryselen@gmail.com', '$2y$10$ndn0Ktr3Zeztwr7fxmj.meahs81qqZA8kmKvBFNP37x1SW1hyuBZO', '3247859966');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`ID_bus`),
  ADD KEY `ID_ruta` (`ID_ruta`);

--
-- Indexes for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`ID_ciudad`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`ID_reserva`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_ruta` (`ID_ruta`);

--
-- Indexes for table `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`ID_ruta`),
  ADD KEY `Ciudad_origen` (`Ciudad_origen`),
  ADD KEY `Ciudad_destino` (`Ciudad_destino`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `ID_bus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `ID_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `ID_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rutas`
--
ALTER TABLE `rutas`
  MODIFY `ID_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_ibfk_1` FOREIGN KEY (`ID_ruta`) REFERENCES `rutas` (`ID_ruta`);

--
-- Constraints for table `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`ID_ruta`) REFERENCES `rutas` (`ID_ruta`);

--
-- Constraints for table `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `rutas_ibfk_1` FOREIGN KEY (`Ciudad_origen`) REFERENCES `ciudades` (`ID_ciudad`),
  ADD CONSTRAINT `rutas_ibfk_2` FOREIGN KEY (`Ciudad_destino`) REFERENCES `ciudades` (`ID_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
