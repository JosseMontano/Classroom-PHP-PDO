-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2022 a las 02:47:14
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `classroom_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `title_comment` varchar(50) NOT NULL,
  `description_comment` varchar(300) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comment`, `title_comment`, `description_comment`, `id_student`, `id_publication`) VALUES
(3, 'Dudas', 'saassa', 18, 1),
(4, 'Etiquetas', 'Profe la diferencia entre las h1 y h2 cual era?', 9, 1),
(6, 'Scrum', 'Que base de datos debemos utilizar?', 9, 4),
(7, 'Tiempo de entrega', 'Ingeniera puede darnos mas tiempo por favor?', 44, 4),
(8, 'Dudas', 'Ingenieria no entiendo la parte de paquetes', 9, 12),
(9, 'Plazo', 'Por favor mas tiempo para hacer la tarea', 44, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `title_course` varchar(35) NOT NULL,
  `description_course` varchar(250) NOT NULL,
  `img_course` varchar(250) NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id_course`, `title_course`, `description_course`, `img_course`, `id_professor`) VALUES
(3, 'html', 'etiquetas mas importantes para la estrucuracion de una pagina web', '1651795497_html.png', 18),
(4, 'Css', 'estilizacion de una pagina web con el css', '1651795601_css.png', 18),
(5, 'Php', 'Desarrolla tu primera aplicacion SSR con php', '1652403103_índice.jpg', 18),
(6, 'laravel', 'SSR con laravel', '1652724216_images.jpg', 18),
(7, 'Patron mvc', 'asfdsawewewewe', '1652724635_images12.png', 18),
(8, 'react', 'curso de react', '1652725148_react.png', 18),
(9, 'Ingenieria de sistemas', 'asbasyasiasasjasasjasjas', '1652746368_sistemas.jpg', 50),
(10, 'Analisis y diseño', 'Aprende sobre la metodologia Scrum', '1652750481_interactive-solutions-servicios-analisis-apoyo-big.jpg', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homeworks`
--

CREATE TABLE `homeworks` (
  `id_homework` int(11) NOT NULL,
  `qualification_homework` float DEFAULT NULL,
  `feedback_homework` varchar(300) DEFAULT NULL,
  `file_homework` varchar(250) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_publciation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `homeworks`
--

INSERT INTO `homeworks` (`id_homework`, `qualification_homework`, `feedback_homework`, `file_homework`, `id_student`, `id_publciation`) VALUES
(4, 60, 'por favor seguir las normas apa', '1653333934_ICONIX.pdf', 9, 1),
(5, NULL, NULL, '1653334133_relation1.pdf', 9, 2),
(6, NULL, NULL, '1653334232_AVANCE - 20-5-2022.docx', 9, 3),
(7, 90, 'pedi que sea en pdf!!!', '1653335352_BASE DE DATOS.pptx', 44, 1),
(9, NULL, NULL, '1653336742_23-5 - TEAMLARAVUE.pdf', 9, 6),
(11, 51, 'Por favor usar las normas apa', '1653339698_23-5 - TEAMLARAVUE.pdf', 9, 4),
(12, 70, 'El link del video no funciona!', '1653339730_23-5 - TEAMLARAVUE.docx', 46, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publciations`
--

CREATE TABLE `publciations` (
  `id_publication` int(11) NOT NULL,
  `title_publication` varchar(50) NOT NULL,
  `description_publication` varchar(250) NOT NULL,
  `deliver_date_publication` datetime NOT NULL,
  `doc_publication` varchar(250) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publciations`
--

INSERT INTO `publciations` (`id_publication`, `title_publication`, `description_publication`, `deliver_date_publication`, `doc_publication`, `id_course`) VALUES
(1, 'tarea1', 'hacer esta tarea', '2022-05-14 00:00:00', '1652405082_ICONIX.pdf', 3),
(2, 'tarea2', 'tarea2', '2022-05-19 00:00:00', '1652407684_ISI - DIAGRAMAS DE PAQUETES - CASOS DE USO .pdf', 3),
(3, 'Tarea 3: Equilibro de oferta', 'Tarea 3: Equilibro de oferta', '2022-05-26 00:00:00', '1652408462_Tema 08 - Equilibrio de la oferta y la demanda - GRAFICO - SIS - I.22.xlsx', 3),
(4, 'Mysql', 'Mysql', '2022-05-19 00:00:00', '1652750152_MySQL-logo.png', 9),
(5, 'Crear una estructura web sin estilos', 'Crear una estructura web sin estilos', '2022-05-26 00:00:00', '1653327481_AVANCE - 20-5-2022.pdf', 3),
(6, 'estilizar esta apgina web', 'estilizar esta apgina web', '2022-05-27 00:00:00', '1653328990_BASE DE DATOS.pptx', 4),
(7, 'Usar bootstrap para estilizar', 'Usar bootstrap para estilizar', '2022-05-31 00:00:00', '1653329036_AVANCE - 20-5-2022.pdf', 4),
(8, 'Crear un hola mundo en php', 'Crear un hola mundo en php', '2022-05-30 00:00:00', '1653329322_AVANCE - 20-5-2022.pdf', 5),
(9, 'Conexion a base de datos', 'Conexion a base de datos', '2022-05-28 00:00:00', '1653329401_01. Act. 08 - CALCULO MUESTRA Y CUESTIONARIO BORRADOR - G01 - Rev. - Ver. 2.0.docx', 5),
(10, 'Hola mundo en laravel', 'Hola mundo en laravel', '2022-05-27 00:00:00', '1653330430_relation1.pdf', 6),
(11, 'Crea un modelo en laravel', 'Crea un modelo en laravel', '2022-05-29 00:00:00', '1653330499_01. Act. 08 - CALCULO MUESTRA Y CUESTIONARIO BORRADOR - G01 - Rev. - Ver. 2.0.docx', 6),
(12, 'Hisotiras de usuario', 'Hisotiras de usuario', '2022-05-30 00:00:00', '1653343969_ICONIX.pdf', 9),
(13, 'Diagrama de paquetes', 'Realiza los diagramas de paquetes', '2022-05-31 00:00:00', '1653344430_AVANCE - 20-5-2022.pdf', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(30) NOT NULL,
  `description_role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`, `description_role`) VALUES
(1, 'Profesor', 'Dictar clases'),
(2, 'Estudiante', 'Pasar clases'),
(3, 'Administracion', 'Administrar la app');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students_courses`
--

CREATE TABLE `students_courses` (
  `id_student_course` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `students_courses`
--

INSERT INTO `students_courses` (`id_student_course`, `id_course`, `id_student`) VALUES
(1, 3, 9),
(20, 3, 44),
(21, 3, 46),
(4, 4, 9),
(19, 6, 9),
(9, 6, 44),
(11, 8, 46),
(13, 9, 9),
(15, 9, 44),
(14, 9, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(30) NOT NULL,
  `password_user` varchar(250) NOT NULL,
  `first_name_user` varchar(30) NOT NULL,
  `last_name_user` varchar(30) NOT NULL,
  `ci_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `password_user`, `first_name_user`, `last_name_user`, `ci_user`, `id_role`) VALUES
(9, 'jose123', '123456', 'jose', 'zambrana', 8021947, 2),
(16, 'isabel123', '123456', 'isabel', 'zelada', 3610674, 3),
(18, 'crispin123', '123456', 'crispin', 'fernandez', 122112, 1),
(44, 'vilmer899', '123456', 'vilmer', 'sanchez', 54633, 2),
(46, 'andres53', '123456', 'andres', 'zelada', 4232323, 2),
(50, 'havd292005', '123456', 'adima', 'vasquez', 3451448, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_student` (`id_student`,`id_publication`),
  ADD KEY `id_publication` (`id_publication`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Indices de la tabla `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id_homework`),
  ADD KEY `id_student` (`id_student`,`id_publciation`),
  ADD KEY `id_publciation` (`id_publciation`);

--
-- Indices de la tabla `publciations`
--
ALTER TABLE `publciations`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `id_course` (`id_course`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`id_student_course`),
  ADD UNIQUE KEY `id_course` (`id_course`,`id_student`),
  ADD UNIQUE KEY `id_course_2` (`id_course`,`id_student`),
  ADD KEY `id_course_3` (`id_course`,`id_student`),
  ADD KEY `id_student` (`id_student`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id_homework` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `publciations`
--
ALTER TABLE `publciations`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `students_courses`
--
ALTER TABLE `students_courses`
  MODIFY `id_student_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_student`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publciations` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `homeworks`
--
ALTER TABLE `homeworks`
  ADD CONSTRAINT `homeworks_ibfk_1` FOREIGN KEY (`id_publciation`) REFERENCES `publciations` (`id_publication`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `homeworks_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publciations`
--
ALTER TABLE `publciations`
  ADD CONSTRAINT `publciations_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `students_courses_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_courses_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
