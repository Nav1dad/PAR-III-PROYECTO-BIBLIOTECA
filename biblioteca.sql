-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2024 a las 06:18:19
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_na` varchar(100) NOT NULL,
  `libro` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `fecha_na`, `libro`) VALUES
(6, 'Miguel de Cervantes Saavedra', '29 de septiembre de 1547 (Alcalá de Henares, España)', 'Cervantes estudió en la Universidad de Alcalá, aunque no se sabe con certeza si completó su educación formal.'),
(7, 'Jane Austen', '16 de diciembre de 1775 (Steventon, Hampshire, Inglaterra)', 'Jane Austen recibió una educación privada en casa, principalmente en el ámbito literario y en idioma'),
(8, 'Mary Wollstonecraft Shelley', '30 de agosto de 1797 (Londres, Inglaterra).', 'Shelley fue educada en su hogar por su padre, el filósofo William Godwin, y su madre, la filósofa feminista Mary Wollstonecraft. '),
(9, 'Homero (tradicionalmente atribuido, aunque su existencia es objeto de debate)', 'Desconocida. Se estima que vivió entre el siglo VIII y VII a.C. en la antigua Grecia.', 'Debido a que Homero es una figura mitológica, no hay evidencia directa de sus estudios.'),
(10, 'Charles Darwin', '12 de febrero de 1809 (Shrewsbury, Inglaterra).', 'Darwin estudió Medicina en la Universidad de Edimburgo, pero abandonó para estudiar Teología en Cambridge. '),
(11, 'George Orwell', '25 de junio de 1903 (Motihari, India Británica, ahora en Bihar, India).', 'Orwell estudió en la Eton College, una de las escuelas más prestigiosas de Inglaterra, pero no fue a la universidad debido a problemas económicos.'),
(12, 'Gabriel García Márquez', '6 de marzo de 1927 (Aracataca, Colombia).', 'García Márquez estudió Derecho en la Universidad Nacional de Colombia, pero se dedicó a la escritura y el periodismo, donde desarrolló su estilo literario.'),
(13, 'Franz Kafka', '3 de julio de 1883 (Praga, Imperio Austrohúngaro, ahora República Checa).', 'Kafka estudió Derecho en la Universidad Alemana de Praga y obtuvo un doctorado en Derecho.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(10) NOT NULL,
  `id_autor` int(10) NOT NULL,
  `nombre_libro` varchar(100) NOT NULL,
  `vista_previa` varchar(50) DEFAULT NULL,
  `editorial` varchar(100) NOT NULL,
  `fecha_publi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `id_autor`, `nombre_libro`, `vista_previa`, `editorial`, `fecha_publi`) VALUES
(31, 6, 'Don quijote de la Mancha', 'donquijote02cerv.pdf', 'Ediciones Cátedra (España)', '1605 (Primera parte) y 1615 (Segunda parte).'),
(32, 7, 'Orgullo y prejuicio', 'Orgullo y Prejuicio.pdf', 'Ediciones Cátedra (España)', '28 de enero de 1813.'),
(33, 8, 'Frankenstein', 'frankenstein.pdf', 'Ediciones Cátedra (España)', '1 de enero de 1818.'),
(34, 9, 'La Odisea', 'La_Odisea-Homero.pdf', 'Ediciones Cátedra (España', 'Se estima que fue escrita entre el siglo VIII y VII a.C.'),
(35, 10, 'El origen de las especies', 'Charles Darwin El origen de las especies.pdf', 'Editorial Siglo XXI (México)', '19 de noviembre de 1859.'),
(36, 11, '1984', '1984.pdf', 'Ediciones Destino (España', '8 de junio de 1949.'),
(37, 12, 'Cien años de soledad', 'GARCÍA MARQUEZ-Cien años de soledad.pdf', 'Editorial Diana (México', '1967'),
(38, 13, 'La Metamorfosis', 'la metamorfosis.pdf', 'Alianza Editorial (España)', '1915.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
