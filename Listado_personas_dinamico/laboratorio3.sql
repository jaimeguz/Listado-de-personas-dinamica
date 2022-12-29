-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-11-2021 a las 04:05:01
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

DROP TABLE IF EXISTS `distrito`;
CREATE TABLE IF NOT EXISTS `distrito` (
  `id_distrito` int(11) NOT NULL AUTO_INCREMENT,
  `nom_distrito` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `id_provincia` int(11) NOT NULL,
  PRIMARY KEY (`id_distrito`),
  KEY `fk_id_provincia` (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nom_distrito`, `id_provincia`) VALUES
(1, 'Almirante', 1),
(2, 'Bocas del toro', 1),
(3, 'Changuinola', 1),
(4, 'Chiriquí grande', 1),
(5, 'Aguadulce', 2),
(6, 'Antón', 2),
(7, 'La Pintada', 2),
(8, 'Natá', 2),
(9, 'Olá', 2),
(11, 'Penonomé', 2),
(18, 'Colón', 3),
(19, 'Chagres', 3),
(20, 'Donoso', 3),
(21, 'Portobelo', 3),
(22, 'Santa Isabel', 3),
(23, 'Omar Torrijos Herrera', 3),
(24, 'Alanje', 4),
(25, 'Barú', 4),
(26, 'Barú', 4),
(27, 'Boquete', 4),
(28, 'Bugaba', 4),
(29, 'David', 4),
(30, 'Dolega', 4),
(31, 'Gualaca', 4),
(32, 'Remedios', 4),
(33, 'Renacimiento', 4),
(34, 'San Félix', 4),
(35, 'San Lorenzo', 4),
(36, 'Tierras Altas', 4),
(37, 'Tolé', 4),
(38, 'Chepigana', 5),
(39, 'Santa Fe', 5),
(40, 'Pinogana', 5),
(44, 'Chitré', 6),
(45, 'Las Minas', 6),
(46, 'Los Pozos', 6),
(47, 'Ocú', 6),
(48, 'Parita', 6),
(49, 'Pesé', 6),
(50, 'Santa María', 6),
(51, 'Guararé', 7),
(52, 'Las Tablas', 7),
(53, 'Los Santos', 7),
(54, 'Macaracas', 7),
(55, 'Pedasí', 7),
(56, 'Pocrí', 7),
(57, 'Tonosí', 7),
(58, 'Balboa', 8),
(59, 'Chepo', 8),
(60, 'Chimán', 8),
(61, 'Panamá', 8),
(62, 'San Miguelito', 8),
(63, 'Taboga', 8),
(64, 'Atalaya', 9),
(65, 'Calobre', 9),
(66, 'Cañazas', 9),
(67, 'La Mesa', 9),
(68, 'Las Palmas', 9),
(69, 'Mariato', 9),
(70, 'Montijo', 9),
(71, 'Río de Jesús', 9),
(72, 'San Francisco', 9),
(73, 'Santa Fe', 9),
(74, 'Santiago', 9),
(75, 'Soná', 9),
(76, 'Arraiján', 10),
(77, 'Capira', 10),
(78, 'Chame', 10),
(79, 'La Chorrera', 10),
(80, 'San Carlos', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nom_nivel` varchar(20) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `nom_nivel`) VALUES
(1, 'Administrativo'),
(2, 'Estudiante'),
(3, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nom_provincia` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_provincia`),
  UNIQUE KEY `uni_nom` (`nom_provincia`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nom_provincia`) VALUES
(1, 'Bocas del toro'),
(4, 'Chiriquí'),
(2, 'Coclé'),
(3, 'Colón'),
(5, 'Darién'),
(6, 'Herrera'),
(7, 'Los santos'),
(8, 'Panamá'),
(10, 'Panamá oeste'),
(9, 'Veraguas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `nivel` int(50) NOT NULL,
  `distrito` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_distrito` (`distrito`),
  KEY `fk_nivel` (`nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `telefono`, `nivel`, `distrito`) VALUES
(4, 'Jaime', 'GuzmÃ¡n', 'jaimeguz@gmail.com', '69611159', 3, 6),
(5, 'Luis', 'GuzmÃ¡n', 'jaimeguz@gmail.com', '69611159', 1, 61),
(6, 'Angel', 'cici', 'angel@gmail.com', '123456789', 2, 44);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`distrito`) REFERENCES `distrito` (`id_distrito`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
