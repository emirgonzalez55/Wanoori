-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2021 a las 01:29:12
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wanooribd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `idpelicula` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`idpelicula`, `nombre`, `tipo`, `imagen`) VALUES
(13, 'Matrix 4', 'pelicula', '<a href=\"contenido/peliculas/matrix.php\">  <img  src=\"contenido/peliculas/img/matrix.png\" ></a>'),
(14, 'Go toubun no hanayome', 'serie', '<a href=\"contenido/series/gotoubun.php\">  <img   src=\"contenido/series/img/gotoubun.jpg\" ></a>'),
(15, 'grand theft auto v', 'juego', '<a href=\"contenido/juegos/gta-v.php\">  <img   src=\"contenido/juegos/img/GTA-V.jpg\" ></a>'),
(16, 'Naruto', 'serie', '<a href=\"contenido/series/naruto.php\">  <img   src=\"contenido/series/img/Naruto.jpg\" ></a>'),
(17, 'La guerra de las galaxias. Episodio I', 'pelicula', '<a href=\"contenido/peliculas/star_wars.php\">  <img  src=\"contenido/peliculas/img/starwars.jpg\" ></a>'),
(18, 'League of Legends', 'juego', '<a href=\"contenido/juegos/lol.php\">  <img   src=\"contenido/juegos/img/lol.jpg\" ></a>'),
(19, 'StarCraft', 'juego', '<a href=\"contenido/juegos/starcraft.php\">  <img   src=\"contenido/juegos/img/StarCraft.jpg\" ></a>'),
(20, 'Dragon Ball', 'serie', '<a href=\"contenido/series/dragonball.php\">  <img   src=\"contenido/series/img/DragonBall.jpg\" ></a>'),
(21, 'Regreso al futuro', 'pelicula', '<a href=\"contenido/peliculas/regresoalfuturo.php\">  <img  src=\"contenido/peliculas/img/Regresoalfuturo.jpg\" ></a>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `idfavorito` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`idfavorito`, `idusuario`, `idpelicula`) VALUES
(62, 1, 15),
(65, 1, 13),
(66, 1, 14),
(75, 2, 14),
(77, 2, 15),
(82, 2, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `password`) VALUES
(1, 'emir', '$2y$10$lr0Z8OQgf29MbsSm1zQZkeA2.HG.LZ0rIUMgG2v4hS3irjs.fLntu'),
(2, 'admin', '$2y$10$BF1NbVwXzAIZNuVS48SF.eW.1V2PDxMjfmKaTRQ4GDQ5z3pwo2a0a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`idpelicula`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idfavorito`),
  ADD KEY `FK_idusuario` (`idusuario`),
  ADD KEY `FK_idpelicula` (`idpelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `idpelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idfavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`idpelicula`) REFERENCES `contenidos` (`idpelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
