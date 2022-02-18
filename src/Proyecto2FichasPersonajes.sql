-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2022 at 12:22 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Proyecto2FichasPersonajes`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220116234949', '2022-01-17 00:50:00', 138),
('DoctrineMigrations\\Version20220117085403', '2022-01-17 09:54:58', 311),
('DoctrineMigrations\\Version20220117090159', '2022-01-17 10:02:06', 63);

-- --------------------------------------------------------

--
-- Table structure for table `personaje`
--

CREATE TABLE `personaje` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` int NOT NULL,
  `fuerza` int NOT NULL,
  `destreza` int NOT NULL,
  `constitucion` int NOT NULL,
  `inteligencia` int NOT NULL,
  `sabiduria` int NOT NULL,
  `carisma` int NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `equipamiento` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personaje`
--

INSERT INTO `personaje` (`id`, `nombre`, `raza`, `clase`, `nivel`, `fuerza`, `destreza`, `constitucion`, `inteligencia`, `sabiduria`, `carisma`, `descripcion`, `equipamiento`, `user_id`) VALUES
(1, 'Galathar', 'Eladrin', 'Místico', 10, 11, 14, 18, 18, 14, 15, 'Prioriza la libertad ante todo', 'Nada', 0),
(2, 'Asmund', 'Gith', 'Guerrero', 10, 12, 18, 20, 14, 10, 13, 'Prioriza la protección de sus amigos ante todo', 'Nada', 0),
(3, 'Phil', 'Draconido', 'Monje', 10, 11, 18, 14, 11, 16, 13, 'Es dado a beber mas de la cuenta', 'Nada', 0),
(4, 'Bella', 'Mediana', 'Bardo', 10, 8, 10, 13, 11, 9, 18, 'Le encanta cantar y mas si es con una buena copa', 'Nada', 0),
(5, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'oiyg', 'oiugoi', 0),
(6, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'oiyg', 'oiugoi', 0),
(7, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'oiyg', 'oiugoi', 0),
(8, 'Marc', 'Dunedain', 'Pícaro', 20, 10, 20, 18, 12, 13, 11, 'Picaro', 'Nada', 0),
(9, 'Andrea', 'Humana', 'Hechicero', 15, 5, 19, 10, 9, 8, 7, 'Me gusta la vida pero no los examenes', 'La ramadura esa de cuero', 0),
(10, 'Demis', 'Triton', 'Hechicero', 14, 12, 13, 19, 13, 13, 20, 'QUe la oscuridad sea tu aliada', 'nada de momento', 0),
(11, 'Demis', 'Triton', 'Hechicero', 14, 12, 13, 19, 13, 13, 20, 'QUe la oscuridad sea tu aliada', 'nada de momento', 0),
(12, 'Demis', 'Triton', 'Hechicero', 14, 12, 13, 19, 13, 13, 20, 'QUe la oscuridad sea tu aliada', 'nada de momento', 0),
(13, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'yitdfiuy', 'hgohig', 0),
(14, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'yitdfiuy', 'hgohig', 0),
(15, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'yitdfiuy', 'hgohig', 0),
(16, 'Andrea', 'Humana', 'Hechicero', 15, 5, 19, 10, 9, 8, 7, 'Me gusta la vida pero no los examenes', 'La ramadura esa de cuero', 0),
(17, 'Andrea', 'Humana', 'Hechicero', 15, 5, 19, 10, 9, 8, 7, 'Me gusta la vida pero no los examenes', 'La ramadura esa de cuero', 0),
(18, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'luiyg', 'iughopi', 0),
(19, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'lukyf', 'lig', 0),
(20, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Que la oscuridad se cierna sobre vosotros', 'Nada', 0),
(21, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Que la oscuridad se cierna sobre vosotros', 'Nada', 0),
(22, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Que la oscuridad se cierna sobre vosotros', 'Nada', 0),
(23, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Que la oscuridad se cierna sobre vosotros', 'Nada', 0),
(24, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Que la oscuridad se cierna sobre vosotros', 'Nada', 0),
(25, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Oscuridad', 'Nada', 0),
(26, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Oscuridad', 'nada', 0),
(27, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Oscuridad', 'Nada', 0),
(28, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Oscuridad', 'Nada', 0),
(29, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Oscuridad', 'Nada', 0),
(30, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Que la oscuridad se cierna sobre vosotros', 'Nada', 0),
(31, 'Demis', 'Triton', 'Hechicero', 10, 12, 13, 15, 13, 13, 20, 'Oscuridad', 'nada', 0),
(32, 'Phil', 'Draconido', 'Monje', 7, 10, 20, 15, 10, 20, 13, 'La buena fiesta', 'Suministros de cerveza', 1),
(33, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'kuyf', 'kjbh', 1),
(34, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'iytfgv', 'ouibjh', 1),
(35, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'iytfgv', 'ouibjh', 1),
(36, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'Dragones', 'Nada', 1),
(37, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'ñliuh', 'jlnkj', 1),
(38, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'i7gu', 'ughikuh', 1),
(39, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'PIUH', 'OUHLIJ', 1),
(40, 'Phil', 'Luxodon', 'Explorador', 5, 15, 10, 10, 10, 20, 13, 'sef', 'dfg', 1),
(41, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'ouihljk', 'iojmklñm', 1),
(42, 'Phil', 'Draconido', 'Monje', 20, 10, 10, 10, 20, 20, 5, '8907ty', 'uioipuh', 1),
(43, 'Phil', 'Draconido', 'Explorador', 20, 15, 10, 10, 20, 20, 5, 'ygvb', 'jkbnjklñ', 1),
(44, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 10, 20, 5, 'kuyg', 'hlihnuiopj', 1),
(45, 'Phil', 'Draconido', 'Monje', 5, 15, 10, 10, 20, 20, 5, 'ukygoi', 'hlijhnlkj', 1),
(46, 'Phil', 'Luxodon', 'Explorador', 5, 15, 10, 10, 20, 20, 5, 'liyog', 'oighoiub', 1),
(47, 'Phil', 'Luxodon', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'kuyg', 'lihnlkj', 1),
(48, 'Phil', 'Luxodon', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'kuyg', 'lihnlkj', 1),
(49, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 10, 20, 20, 5, 'ukg', 'gv', 1),
(50, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(51, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(52, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(53, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(54, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(55, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(56, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(57, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(58, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(59, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(60, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(61, 'Phil', 'Draconido', 'Monje', 20, 15, 10, 18, 20, 20, 20, 'Monjadas', 'Nada', 1),
(62, 'Phil', 'Draconido', 'Monje', 20, 20, 20, 20, 20, 20, 20, 'uygbkijb', 'ljkblkj', 1),
(63, 'Phil', 'Draconido', 'Monje', 20, 20, 20, 20, 20, 20, 20, 'uygbkijb', 'ljkblkj', 1),
(64, 'Kirito', 'Noob', 'Guerrero', 20, 20, 20, 20, 20, 20, 20, 'Todo', 'el del lore', 1),
(65, 'Kirito', 'Noob', 'Guerrero', 20, 20, 20, 20, 20, 20, 20, 'Mucho texto', 'El del lore', 1),
(66, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'God', 'All', 1),
(67, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(68, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(69, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(70, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(71, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(72, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(73, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(74, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(75, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(76, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(77, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(78, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(79, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1),
(80, 'Salix', 'Elfo', 'Hechicero', 20, 20, 20, 20, 20, 20, 20, 'All', 'All', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rasgo`
--

CREATE TABLE `rasgo` (
  `id` int NOT NULL,
  `tipoaccion_id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rasgo_personaje_id` int DEFAULT NULL,
  `personaje_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rasgo`
--

INSERT INTO `rasgo` (`id`, `tipoaccion_id`, `nombre`, `descripcion`, `rasgo_personaje_id`, `personaje_id`) VALUES
(1, 1, 'Psionica', 'Como estudiante de psionica, puedes dominar y utilizar talentos y disciplinas psionicas, cuyas reglas aparecen al final de este documento. La psionica es una forma especial de uso de la magia, distinta del lanzamiento de hechizos', NULL, 1),
(2, 1, 'Telentos psionicos', 'Un talento psionico es un efecto psionico menor que has dominado. En el primer nivel, conoces un talento psionico de tu elección. Aprendes talentos adicionales de tu eleccion en niveles mas altos. La columna Telentos conocidos de la tabla Mistica muestra el número total de talentos que conoces en cada nivel; cuando ese número suba para ti, elige un nuevo talento\r\n', NULL, 1),
(3, 1, 'Disciplinas psiónicas', 'Una disciplina es un conjunto rígido de ejerciciosmentales que permite a un mistico manifestar poder psionico. Un mistico domina solo unas pocas psionicas a la vez.\r\nEn el primer nivel, conoces una diciplina psionica de tu eleccion. La columna Disciplinas conocidas de la tabla mistuica muestra un numero total de disciplinas que conoce en cada nivel; cuando ese número suba para ti, elige una nueva disciplina.\r\nAdemas, siempre que ganes un nivel en esta clase, puedes reemplazar una disciplina que conoces por otra diferente de tu eleccion.', NULL, 1),
(4, 1, 'Teleport', '120 poui', NULL, 61),
(5, 1, 'hkgkjjbn', 'lkblkj', NULL, 62),
(6, 1, 'hkgkjjbn', 'lkblkj', NULL, 63),
(7, 1, 'Deux ex machina', 'Si', NULL, 65),
(8, 1, 'tit', 'desc', NULL, 78),
(9, 1, 'tit', 'desc', NULL, 80),
(10, 1, 'Counter', 'All', NULL, 80),
(11, 1, 'Puntos PSI', 'Tienes una reserva interna de energia que puedes dedicar a las disciplinas psionicas que conoces. Esta energiaesta representada por puntos psi. Cada disciplina psionica describe los efectos que puedes crear gastando una determinada cantidad de puntos psionicos. un talento psionico no requiere puntos psionicos.\r\n\r\nEl numero de puntos psionicos que tienes se basa en tu nivel de mistico, como se muestra en la columna puntos de psionica de la tabla del mistico. El núnmero que se muestra para su nivel es su máximo de puntos psi. Tu total de puntos psi regresa a su maximo cuando terminas un descanso prolongado. El número de puntos psi que tienes no puede ser inferior a 0 ni superior a tu maximo.\r\n', NULL, 1),
(12, 1, 'Puntos PSI', 'Tienes una reserva interna de energia que puedes dedicar a las disciplinas psionicas que conoces. Esta energiaesta representada por puntos psi. Cada disciplina psionica describe los efectos que puedes crear gastando una determinada cantidad de puntos psionicos. un talento psionico no requiere puntos psionicos.', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_accion`
--

CREATE TABLE `tipo_accion` (
  `id` int NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipo_accion`
--

INSERT INTO `tipo_accion` (`id`, `tipo`) VALUES
(1, 'Acción'),
(2, 'Acción adicional'),
(3, 'Reacción'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`) VALUES
(1, 'saulpachecot@gmail.com', '[]', '$2y$13$.PRavJVGArPDefgME/eBO.PQv1grBl74N1BO4ch09NkZiotMdE3MC', 'Salix'),
(2, 'saulpachecot2@gmail.com', '[]', '$2y$13$wCOW4VdeKa5aoqGQQZuGQOo4yxiMeGBCbfxDKJ7QtyJu2DGwgfuHy', 'Salix'),
(3, 'sdf@v.com', '[]', '$2y$13$1Fjnkce6ysx86X64Zjb1Oedts190qeeMcelNLql/RSnc/0o.WD1HS', 'zdf'),
(4, 'Aaron@gamail.com', '[]', '$2y$13$ZLkGU4MMUekegAx3LMX9V.dTs3EHoRWxnCcqBDf5Elh2LXmlM6qwG', 'Aarón');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `personaje`
--
ALTER TABLE `personaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_53A41088A76ED395` (`user_id`);

--
-- Indexes for table `rasgo`
--
ALTER TABLE `rasgo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_67AC8374C74E4DDC` (`tipoaccion_id`),
  ADD KEY `IDX_67AC8374121EFAFB` (`rasgo_personaje_id`);

--
-- Indexes for table `tipo_accion`
--
ALTER TABLE `tipo_accion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rasgo`
--
ALTER TABLE `rasgo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipo_accion`
--
ALTER TABLE `tipo_accion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rasgo`
--
ALTER TABLE `rasgo`
  ADD CONSTRAINT `FK_67AC8374121EFAFB` FOREIGN KEY (`rasgo_personaje_id`) REFERENCES `personaje` (`id`),
  ADD CONSTRAINT `FK_67AC8374C74E4DDC` FOREIGN KEY (`tipoaccion_id`) REFERENCES `tipo_accion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
