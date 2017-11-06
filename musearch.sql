-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2017 a las 02:39:21
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `musearch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admi` int(11) NOT NULL,
  `nombre_admi` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo_admi` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contrasena_admin` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono_admi` int(11) NOT NULL,
  `direccion_admi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admi`, `nombre_admi`, `correo_admi`, `contrasena_admin`, `telefono_admi`, `direccion_admi`) VALUES
(11, 'Carlos', 'eufeem@gmail.com', 'fabi', 57458944, 'Marcos Lopez Jimenez'),
(12, 'Jorge', 'jorgeV@hotmail.com', 'thestrokes', 57455689, 'Cuarta Avenida'),
(13, 'Daniel', 'daniEC@hotmail.com', 'fer', 57487889, 'Nose'),
(14, 'Ricardo', 'juniorXD@gmail.com', 'anita', 57458978, 'La paz'),
(15, 'Cristina', 'criscuriel@hotmail.com', 'gatitos', 54879865, 'nose'),
(16, 'Santita', 'DSADSA@hotmail.com', 'expresion', 55321324, 'UTN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museo`
--

CREATE TABLE `museo` (
  `id_museo` int(11) NOT NULL,
  `nombre_museo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_museo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `colonia_museo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `calle_museo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero_museo` int(11) NOT NULL,
  `telefono_museo` int(10) NOT NULL,
  `nombre_servicio` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `costo` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `museo`
--

INSERT INTO `museo` (`id_museo`, `nombre_museo`, `descripcion_museo`, `colonia_museo`, `calle_museo`, `numero_museo`, `telefono_museo`, `nombre_servicio`, `costo`, `imagen`) VALUES
(8, 'Museo del Templo Mayor', 'El Museo del Templo Mayor abriÃ³ sus puertas el 12 de octubre de 1987 y ha recibido, hasta ahora, a mÃ¡s de trece millones de visitantes. Su creaciÃ³n fue consecuencia de las excavaciones arqueolÃ³gicas realizadas por el Proyecto Templo Mayor en su primera temporada, entre 1978 y 1982, las cuales se hicieron bajo la direcciÃ³n de Eduardo Matos Moctezuma y permitieron recuperar una colecciÃ³n de mÃ¡s de 7 mil objetos, asÃ­ como los vestigios del Templo Mayor de Tenochtitlan y de algunos edificios aledaÃ±os. ', 'Centro HistÃ³rico', 'Seminario 8', 60, 40405600, 'Visitas', 150, 'mxcity.mx_templo-mayor.jpg'),
(9, 'Museo de AntropologÃ­a', 'A poco mÃ¡s de medio siglo de su creaciÃ³n, el Museo Nacional de AntropologÃ­a se reconoce como uno de los museos mÃ¡s emblemÃ¡ticos en cuanto a la salvaguarda del legado indÃ­gena de MÃ©xico. Siendo el sÃ­mbolo de la identidad y mentor de generaciones que buscan sus raÃ­ces culturales, su construcciÃ³n maravilla a todos los visitantes alrededor del mundo.', 'Chapultepec ', 'Av. Paseo de la Reforma y Calzada Gandhi', 10, 40405300, 'Visitas', 100, 'Musee_National_Anthropologia.jpg'),
(17, 'Museo del Caracol', 'El Museo del Caracol tiene mÃ¡s de cincuenta aÃ±os de vida. Cincuenta aÃ±os de ayudar a forjar la identidad de miles de niÃ±os mexicanos, de enseÃ±ar la historia de una manera divertida. AquÃ­ verÃ¡s los momentos mÃ¡s representativos de nuestra historia moderna, desde los albores de la Independencia hasta la promulgaciÃ³n de nuestra actual constituciÃ³n, la de 1917. ', 'Chapultepec', 'Rampa de acceso al Castillo', 11, 40405241, 'Visitas', 160, 'caracol.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `id_pieza` int(11) NOT NULL,
  `nombre_pieza` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo_pieza` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_pieza` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`id_pieza`, `nombre_pieza`, `tipo_pieza`, `descripcion_pieza`, `id_sala`) VALUES
(3, 'Cabeza Olmeca', 'Escultura', 'Figura en piedra', 2),
(4, 'Culto de la muerte', 'Maqueta', 'Lugar donde se sacrificaban', 4),
(5, 'Vestimenta ', 'Ropa', 'La vestimenta que usaban los mexicas', 5),
(6, 'Vestimenta Maya', 'Vestimenta', 'Atuendo que usaban los mayas', 4),
(7, 'Pieza sala sur', 'sasa', 'des sala sur', 7),
(9, 'Sala mexica2', 'tipo mexica2', 'descrip', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_sala` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_museo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `nombre_sala`, `descripcion_sala`, `id_museo`) VALUES
(2, 'Olmeca', 'DescripciÃ³n olmeca', 9),
(4, 'Maya', 'DescripciÃ³n sala mexica', 9),
(5, 'Mexica', 'descripciÃ³n sala mexica', 9),
(6, 'Culturas del norte', 'descripciÃ³n culturas del norte', 8),
(7, 'Culturas del sur', 'descripciÃ³n culturas del sur', 8),
(9, 'dsdas', 'dd', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_servicio` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre_servicio`, `descripcion_servicio`) VALUES
(4, 'Visitas Guiadas', 'Servicio donde se muestra todo el museo con explicaciÃ³n'),
(5, 'Grupos escolares', 'Se les da una explicaciÃ³n educativa a grupos escolares'),
(6, 'Guardarropa', 'Lugar donde se guardan prendas, bolsas, mochilas, etc'),
(7, 'Tienda', 'Lugar donde se encuentra piezas, folletos y recuerdos del museo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admi`);

--
-- Indices de la tabla `museo`
--
ALTER TABLE `museo`
  ADD PRIMARY KEY (`id_museo`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`id_pieza`,`id_sala`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`,`id_museo`),
  ADD KEY `id_museo` (`id_museo`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `museo`
--
ALTER TABLE `museo`
  MODIFY `id_museo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `piezas`
--
ALTER TABLE `piezas`
  MODIFY `id_pieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD CONSTRAINT `piezas_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`id_museo`) REFERENCES `museo` (`id_museo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
