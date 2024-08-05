-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2024 a las 21:32:20
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
-- Base de datos: `computer_advance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `idv` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idprod` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(15) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_purchase`
--

CREATE TABLE `cart_purchase` (
  `idcpr` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idprod` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(15) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcli` int(11) NOT NULL,
  `tipd` varchar(25) NOT NULL,
  `nudoc` char(15) NOT NULL,
  `nocl` varchar(35) NOT NULL,
  `apcl` varchar(35) NOT NULL,
  `telfcl` char(14) NOT NULL,
  `state` char(1) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aptclien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcli`, `tipd`, `nudoc`, `nocl`, `apcl`, `telfcl`, `state`, `username`, `password`, `rol`, `fere`, `aptclien`) VALUES
(224, 'CC', '1037595175', 'SIRLEY TATIANA', 'RIOS RIOS', '1', '', '', '', '', '2024-07-19 23:01:26', '102'),
(225, 'CC', '1033648830', 'ELIZABET CRISTINA', 'HERRERA', '1', '', '', '', '', '2024-07-19 23:01:26', '201'),
(226, 'CC', '', 'ORLANDO', 'HINCAPIE ESPINOZA', '1', '', '', '', '', '2024-07-19 23:01:26', '202'),
(227, 'CC', '1033650778', 'GLORIA ESTELA', 'GOMEZ OSORIO', '1', '', '', '', '', '2024-07-19 23:01:26', '203'),
(228, 'CC', '00000', 'ALEJANDRA', 'GONZALEZ00000', '1', '', '', '', '', '2024-07-19 23:01:26', '204'),
(229, 'CC', '43491490', 'MARISA YANETH', 'ACEVEDO', '1', '', '', '', '', '2024-07-19 23:01:26', '302'),
(230, 'CC', '1033649380', 'YEISON HERNANDO', 'VARGAS ALVAREZ', '1', '', '', '', '', '2024-07-19 23:01:26', '303'),
(231, 'CC', '1039759305', 'VERONICA YASMIN', 'MORALES ACEVEDO', '1', '', '', '', '', '2024-07-19 23:01:26', '401'),
(232, 'CC', '1033646368', 'MARIA ALEJANDRA', 'CIRO FRANCO', '1', '', '', '', '', '2024-07-19 23:01:26', '403'),
(233, 'CC', '1033656035', 'NATALIA ALEJANDRA', 'LAVERDE VANEGAS', '1', '', '', '', '', '2024-07-19 23:01:26', '404'),
(234, 'CC', '98509959', 'MARIO', 'GAVIRIA GONZALEZ', '1', '', '', '', '', '2024-07-19 23:01:26', '502'),
(235, 'CC', '43507307', 'CARLOTA MARIA', 'GONZALEZ VELEZ', '1', '', '', '', '', '2024-07-19 23:01:26', '503'),
(236, 'CC', '1033655798', 'MARIANA', 'MONTOYA ORTIZ', '1', '', '', '', '', '2024-07-19 23:01:26', '504'),
(237, 'CC', '1033653240', 'DIANA MARCELA', 'PINEDA PINEDA', '2', '', '', '', '', '2024-07-19 23:02:53', '201'),
(238, 'CC', '21577355', 'LUZ DARY', 'PEREZ RESTREPO', '2', '', '', '', '', '2024-07-19 23:02:53', '202'),
(239, 'CC', '70420849', 'JOSE FERNANDO', 'PINEDA', '2', '', '', '', '', '2024-07-19 23:02:53', '302'),
(240, 'CC', '1036655460', 'JUAN GUILLERMO', 'VELASQUEZ MARIN', '2', '', '', '', '', '2024-07-19 23:02:53', '303'),
(241, 'CC', '1033653902', 'DANIELA', 'RESTREPO GONZALEZ', '2', '', '', '', '', '2024-07-19 23:02:53', '304'),
(242, 'CC', '0', 'CARLOS MAURICIO', 'HERRERA', '2', '', '', '', '', '2024-07-19 23:02:53', '401'),
(243, 'CC', '0', 'SANDRA', 'TABAREZ', '2', '', '', '', '', '2024-07-19 23:02:53', '402'),
(244, 'CC', '32135586', 'MARIA ISABEL', 'JARAMILLO', '2', '', '', '', '', '2024-07-19 23:02:53', '403'),
(245, 'CC', '70418972', 'WILMAR DE JESUS', 'JARAMILO GONZALEZ', '3', '', '', '', '', '2024-07-19 23:04:31', '101'),
(246, 'CC', '1059359723', 'LUCELMI', 'VELASCO QUISOBONI', '3', '', '', '', '', '2024-07-19 23:04:31', '103'),
(247, 'CC', '1033656865', 'ALEJANDRA', 'ORTIZ VARGAS', '3', '', '', '', '', '2024-07-19 23:04:31', '104'),
(248, 'CC', '1033654168', 'LUCELLY', 'PIEDRAHITA TEJADA', '3', '', '', '', '', '2024-07-19 23:04:31', '201'),
(249, 'CC', '71795914', 'OSCAR ANDRES', 'BEDOYA ALVAREZ', '3', '', '', '', '', '2024-07-19 23:04:31', '202'),
(250, 'CC', '1033651435', 'DEICY LILIANA', 'GONZALEZ MAZO', '3', '', '', '', '', '2024-07-19 23:04:31', '203'),
(251, 'CC', '1033651394', 'LUZ ESTELA', 'VAHOS MANCO', '3', '', '', '', '', '2024-07-19 23:04:31', '204'),
(252, 'CC', '4349161', 'MARIA EUGENIA', 'MORENO CASTILLO', '3', '', '', '', '', '2024-07-19 23:04:31', '301'),
(253, 'CC', '1007064380', 'JARINK CHIRLEZA', 'AGUDELO NARANJO', '3', '', '', '', '', '2024-07-19 23:04:31', '302'),
(254, 'CC', '1033651313', 'JULIANA', 'VILLA', '3', '', '', '', '', '2024-07-19 23:04:31', '303'),
(255, 'CC', '1033652941', 'DIANA MARCELA', 'CUARTAS HOYOS', '3', '', '', '', '', '2024-07-19 23:04:31', '304'),
(256, 'CC', '40417861', 'GIOVANNY DE JESUS', 'VELEZ CALLE', '3', '', '', '', '', '2024-07-19 23:04:31', '401'),
(257, 'CC', '70421358', 'JOSE ALEXANDER', 'GONZALEZ AGUDELO', '3', '', '', '', '', '2024-07-19 23:04:31', '402'),
(258, 'CC', '1033654821', 'VERONICA JOHANA', 'LAVERDE VANEGAS', '3', '', '', '', '', '2024-07-19 23:04:31', '403'),
(259, 'CC', '1033653356', 'JESSICA ANDREA', 'LAVERDE VANEGAS', '3', '', '', '', '', '2024-07-19 23:04:31', '404'),
(260, 'CC', '1033654316', 'JUAN DANIEL', 'YEPES GARCIA', '4', '', '', '', '', '2024-07-19 23:05:31', '101'),
(261, 'CC', '32354045', 'LILIANA MARIA', 'BONILLA', '4', '', '', '', '', '2024-07-19 23:05:31', '102'),
(262, 'CC', '21574509', 'LILIA INES DEL SOCORRO', 'VASQUEZ EHEVERRI', '4', '', '', '', '', '2024-07-19 23:05:31', '103'),
(263, 'CC', '4414425', 'JORGE IVAN', 'DUQUE JARAMILLO', '4', '', '', '', '', '2024-07-19 23:05:31', '104'),
(264, 'CC', '70003278', 'HUBER ARBEY', 'SUAREZ AGUDELO', '4', '', '', '', '', '2024-07-19 23:05:31', '201'),
(265, 'CC', '3667451', 'SILVIO DE JESUS', 'OSORIO FRANCO', '4', '', '', '', '', '2024-07-19 23:05:31', '202'),
(266, 'CC', '43490520', 'LUZ MIRYAM', 'QUICENO GALEANO', '4', '', '', '', '', '2024-07-19 23:05:31', '203'),
(267, 'CC', '1017171827', 'CAROLINA MARIA', 'ALVAREZ SOLIS', '4', '', '', '', '', '2024-07-19 23:05:31', '204'),
(268, 'CC', '70420926', 'EDISON DAVID', 'TABORDA CARO', '4', '', '', '', '', '2024-07-19 23:05:31', '301'),
(269, 'CC', '1033656053', 'LUISA FERNANDA', 'TABORDA BETANCUR', '4', '', '', '', '', '2024-07-19 23:05:31', '302'),
(270, 'CC', '1033658252', 'LAURA ALEJANDRA', 'DURANGO DURANGO', '4', '', '', '', '', '2024-07-19 23:05:31', '303'),
(271, 'CC', '21577281', 'ANGELA INES', 'MARQUEZ', '4', '', '', '', '', '2024-07-19 23:05:31', '304'),
(272, 'CC', '1033650247', 'BIBIANA MARIA', 'HERRERA ARBOLEDA', '4', '', '', '', '', '2024-07-19 23:05:31', '401'),
(273, 'CC', '43486595', 'LUZ MARINA', 'GARCES ZAPATA', '4', '', '', '', '', '2024-07-19 23:05:31', '402'),
(274, 'CC', '70419595', 'RIGOBERTO', 'RICO MONTYA', '4', '', '', '', '', '2024-07-19 23:05:31', '403'),
(275, 'CC', '114062506', 'LUISA FERNANDA', 'RESTREPO BARRERA', '4', '', '', '', '', '2024-07-19 23:05:31', '404'),
(276, 'CC', '1033654804', 'DIANA PAOLA', 'BEDOYA TABORDA', '4', '', '', '', '', '2024-07-19 23:05:31', '501'),
(277, 'CC', '43492245', 'MARIA PAULINA', 'RETREPO BOLIVAR', '4', '', '', '', '', '2024-07-19 23:05:31', '502'),
(278, 'CC', '30349836', 'LUZ ESTELLA', 'RODAS', '4', '', '', '', '', '2024-07-19 23:05:31', '503'),
(279, 'CC', '43487606', 'BEATRIZ ELENA', 'GARCIA', '4', '', '', '', '', '2024-07-19 23:05:31', '504'),
(280, 'CC', '1033648711', 'DIDIER ANDRES', 'ECHEVERRY RUEDA', '5', '', '', '', '', '2024-07-19 23:06:32', '101'),
(281, 'CC', '43487960', 'LUZ NIDIA', 'MUÑOZ BEDOYA', '5', '', '', '', '', '2024-07-19 23:06:32', '102'),
(282, 'CC', '70508563', 'WILLIAM DE JESUS', 'ZAPATA ESTRADA', '5', '', '', '', '', '2024-07-19 23:06:32', '103'),
(283, 'CC', '21574326', 'MARIA LUCELLY', 'MAYA GARCIA', '5', '', '', '', '', '2024-07-19 23:06:32', '104'),
(284, 'CC', '1033650661', 'DAVID ANDRES', 'TABORDA VARGAS', '5', '', '', '', '', '2024-07-19 23:06:32', '201'),
(285, 'CC', '70415852', 'JAIME DE JESUS', 'BERRIO DURAN', '5', '', '', '', '', '2024-07-19 23:06:32', '202'),
(286, 'CC', '1017214740', 'MARISELA', 'PULGARIN OSPINA', '5', '', '', '', '', '2024-07-19 23:06:32', '203'),
(287, 'CC', '1076328927', 'DIEGO ARMANDO', 'VELASQUEZ MONTOYA', '5', '', '', '', '', '2024-07-19 23:06:32', '204'),
(288, 'CC', '22587366', 'DANILSE', 'CASTRO MARIMON', '5', '', '', '', '', '2024-07-19 23:06:32', '301'),
(289, 'CC', '1007108755', 'JOHN JENRY', 'ALVAREZ RIOS', '5', '', '', '', '', '2024-07-19 23:06:32', '302'),
(290, 'CC', '43918582', 'SANDRA MILENA', 'GOMEZ PULGARIN', '5', '', '', '', '', '2024-07-19 23:06:32', '303'),
(291, 'CC', '1033657900', 'LUISA FERNANDA', 'CELIS RIVERA', '5', '', '', '', '', '2024-07-19 23:06:32', '304'),
(292, 'CC', '1036683277', 'MELISA', 'MORENO GONZALEZ', '5', '', '', '', '', '2024-07-19 23:06:32', '401'),
(293, 'CC', '1000913400', 'SEBASTIAN', 'OSORIO TABORDA', '5', '', '', '', '', '2024-07-19 23:06:32', '402'),
(294, 'CC', '1033651103', 'LUIS FERNANDO', 'VARGAS RIAZA', '5', '', '', '', '', '2024-07-19 23:06:32', '403'),
(295, 'CC', '1033647988', 'JUAN FERNANDO', 'TARBORDA RESTREPO', '5', '', '', '', '', '2024-07-19 23:06:32', '404'),
(296, 'CC', '70418713', 'RAUL', 'DURANGO GONZALEZ', '5', '', '', '', '', '2024-07-19 23:06:32', '502'),
(297, 'CC', '43492316', 'LUZ YOHANA', 'ARREDONDO ALZATE', '5', '', '', '', '', '2024-07-19 23:06:32', '503'),
(298, 'CC', '1036663212', 'VALENTINA', 'GUERRA TOBON', '5', '', '', '', '', '2024-07-19 23:06:32', '504'),
(299, 'CC', '1017129669', 'MARIA NATALY', 'CANO HERRERA', '6', '', '', '', '', '2024-07-19 23:07:34', '101'),
(300, 'CC', '14478415', 'ANDRES MAURICIO', 'CHAVERRA HENAO', '6', '', '', '', '', '2024-07-19 23:07:34', '102'),
(301, 'CC', '15263231', 'ARLEY ANTONIO', 'GUERRA', '6', '', '', '', '', '2024-07-19 23:07:34', '103'),
(302, 'CC', '43486507', 'GLORIA INES', 'SALDARRIAGA VANEGAS', '6', '', '', '', '', '2024-07-19 23:07:34', '104'),
(303, 'CC', '70416917', 'ARGIRO DE JESUS', 'LOTERO HOLGUIN', '6', '', '', '', '', '2024-07-19 23:07:34', '201'),
(304, 'CC', '42692570', 'CATALINA', 'VELASQUEZ ECHEVERRY', '6', '', '', '', '', '2024-07-19 23:07:34', '202'),
(305, 'CC', '70420632', 'GUILLERMO LEON', 'OSSA PULGARIN', '6', '', '', '', '', '2024-07-19 23:07:34', '203'),
(306, 'CC', '1033648086', 'NATALIA', 'CANO BARRERA', '6', '', '', '', '', '2024-07-19 23:07:34', '204'),
(307, 'CC', '43486990', 'ALBA LUCIA', 'TABORDA GARCIA', '6', '', '', '', '', '2024-07-19 23:07:34', '301'),
(308, 'CC', '43491086', 'LUZ AMPARO', 'CORREA CORREA', '6', '', '', '', '', '2024-07-19 23:07:34', '302'),
(309, 'CC', '94063819', 'CARLOS DAVID', 'CORDOBA MOSQUERA', '6', '', '', '', '', '2024-07-19 23:07:34', '303'),
(310, 'CC', '1033650353', 'MARIA YANETH', 'SEPULVEDA CARVAJAL', '6', '', '', '', '', '2024-07-19 23:07:34', '304'),
(311, 'CC', '1033651620', 'MONICA', 'GARCES GOMEZ', '6', '', '', '', '', '2024-07-19 23:07:34', '401'),
(312, 'CC', '1017122694', 'ELIANA', 'VARGAS ARIAS', '6', '', '', '', '', '2024-07-19 23:07:34', '402'),
(313, 'CC', '70420725', 'IVAN DARIO', 'RODAS DURANGO', '6', '', '', '', '', '2024-07-19 23:07:34', '403'),
(314, 'CC', '43716191', 'OLGA ARACELLY', 'BEDOYA VELEZ', '6', '', '', '', '', '2024-07-19 23:07:34', '502'),
(315, 'CC', '1027885024', 'MIEGUEL ANGEL', 'GARCIA MESA', '6', '', '', '', '', '2024-07-19 23:07:34', '503'),
(316, 'CC', '43487422', 'LUZ MARINA', 'LONDOÑO HERRERA', '7', '', '', '', '', '2024-07-19 23:08:55', '101'),
(317, 'CC', '21577936', 'DALILA MARIA', 'SANCHEZ ALVAREZ', '7', '', '', '', '', '2024-07-19 23:08:55', '102'),
(318, 'CC', '717766304', 'HOMEIBER DARIO', 'VELEZ MORALES', '7', '', '', '', '', '2024-07-19 23:08:55', '103'),
(319, 'CC', '43491055', 'ANA MILENA', 'MUÑOZ SANCHEZ', '7', '', '', '', '', '2024-07-19 23:08:55', '104'),
(320, 'CC', '1033650304', 'JORGE ANDRES', 'BERRIO MONTOYA', '7', '', '', '', '', '2024-07-19 23:08:55', '201'),
(321, 'CC', '1037236959', 'BERONICA', 'GIRALDO LOPEZ', '7', '', '', '', '', '2024-07-19 23:08:55', '202'),
(322, 'CC', '1033652305', 'ERIKA ANDREA', 'MORENO MEJIA', '7', '', '', '', '', '2024-07-19 23:08:55', '203'),
(323, 'CC', '70411196', 'JOSE ALBERTO', 'AGUDELO FORONDA', '7', '', '', '', '', '2024-07-19 23:08:55', '204'),
(324, 'CC', '32135147', 'MONICA MARIA', 'SANCHEZ ACEVEDO', '7', '', '', '', '', '2024-07-19 23:08:55', '301'),
(325, 'CC', '43491029', 'NORALBA', 'HIGUITA FORONDA', '7', '', '', '', '', '2024-07-19 23:08:55', '302'),
(326, 'CC', '1033651847', 'YOMAIRA', 'HERRERA SANCHEZ', '7', '', '', '', '', '2024-07-19 23:08:55', '303'),
(327, 'CC', '43487919', 'NOHELIA DE JESUS', 'BEDOYA SANCHEZ', '7', '', '', '', '', '2024-07-19 23:08:55', '304'),
(328, 'CC', '23322998', 'BEATRIZ ELENA', 'JIMENEZ DE OLAYA', '7', '', '', '', '', '2024-07-19 23:08:55', '401'),
(329, 'CC', '70415972', 'HERNANDO DE JESUS', 'RODAS FORONDA', '7', '', '', '', '', '2024-07-19 23:08:55', '402'),
(330, 'CC', '70414325', 'JOSE EUGENIO', 'LARREA ESPINOSA', '7', '', '', '', '', '2024-07-19 23:08:55', '403'),
(331, 'CC', '1033652836', 'NATALIE', 'BOLIVAR RESTREPO', '7', '', '', '', '', '2024-07-19 23:08:55', '404'),
(332, 'CC', '70419089', 'LEON DARIO', 'OSORIO VALENCIA', '7', '', '', '', '', '2024-07-19 23:08:55', '501'),
(333, 'CC', '43492305', 'ANA ISABEL', 'ZAPATA OSPINA', '7', '', '', '', '', '2024-07-19 23:08:55', '502'),
(334, 'CC', '43907000', 'LUZ ADRIANA', 'UPEGUI MEJIA', '7', '', '', '', '', '2024-07-19 23:08:55', '503'),
(335, 'CC', '70413984', 'DIEGO JUAN', 'PUERTA FERNANDEZ', '7', '', '', '', '', '2024-07-19 23:08:55', '504'),
(336, 'CC', '43487422', 'LUZ MARINA', 'LONDOÑO HERRERA', '7', '', '', '', '', '2024-07-19 23:09:29', '101'),
(337, 'CC', '21577936', 'DALILA MARIA', 'SANCHEZ ALVAREZ', '7', '', '', '', '', '2024-07-19 23:09:29', '102'),
(338, 'CC', '717766304', 'HOMEIBER DARIO', 'VELEZ MORALES', '7', '', '', '', '', '2024-07-19 23:09:29', '103'),
(339, 'CC', '43491055', 'ANA MILENA', 'MUÑOZ SANCHEZ', '7', '', '', '', '', '2024-07-19 23:09:29', '104'),
(340, 'CC', '1033650304', 'JORGE ANDRES', 'BERRIO MONTOYA', '7', '', '', '', '', '2024-07-19 23:09:29', '201'),
(341, 'CC', '1037236959', 'BERONICA', 'GIRALDO LOPEZ', '7', '', '', '', '', '2024-07-19 23:09:29', '202'),
(342, 'CC', '1033652305', 'ERIKA ANDREA', 'MORENO MEJIA', '7', '', '', '', '', '2024-07-19 23:09:29', '203'),
(343, 'CC', '70411196', 'JOSE ALBERTO', 'AGUDELO FORONDA', '7', '', '', '', '', '2024-07-19 23:09:29', '204'),
(344, 'CC', '32135147', 'MONICA MARIA', 'SANCHEZ ACEVEDO', '7', '', '', '', '', '2024-07-19 23:09:29', '301'),
(345, 'CC', '43491029', 'NORALBA', 'HIGUITA FORONDA', '7', '', '', '', '', '2024-07-19 23:09:29', '302'),
(346, 'CC', '1033651847', 'YOMAIRA', 'HERRERA SANCHEZ', '7', '', '', '', '', '2024-07-19 23:09:29', '303'),
(347, 'CC', '43487919', 'NOHELIA DE JESUS', 'BEDOYA SANCHEZ', '7', '', '', '', '', '2024-07-19 23:09:29', '304'),
(348, 'CC', '23322998', 'BEATRIZ ELENA', 'JIMENEZ DE OLAYA', '7', '', '', '', '', '2024-07-19 23:09:29', '401'),
(349, 'CC', '70415972', 'HERNANDO DE JESUS', 'RODAS FORONDA', '7', '', '', '', '', '2024-07-19 23:09:29', '402'),
(350, 'CC', '70414325', 'JOSE EUGENIO', 'LARREA ESPINOSA', '7', '', '', '', '', '2024-07-19 23:09:29', '403'),
(351, 'CC', '1033652836', 'NATALIE', 'BOLIVAR RESTREPO', '7', '', '', '', '', '2024-07-19 23:09:29', '404'),
(352, 'CC', '70419089', 'LEON DARIO', 'OSORIO VALENCIA', '7', '', '', '', '', '2024-07-19 23:09:29', '501'),
(353, 'CC', '43492305', 'ANA ISABEL', 'ZAPATA OSPINA', '7', '', '', '', '', '2024-07-19 23:09:29', '502'),
(354, 'CC', '43907000', 'LUZ ADRIANA', 'UPEGUI MEJIA', '7', '', '', '', '', '2024-07-19 23:09:29', '503'),
(355, 'CC', '70413984', 'DIEGO JUAN', 'PUERTA FERNANDEZ', '7', '', '', '', '', '2024-07-19 23:09:29', '504'),
(356, 'CC', '21976164', 'ORFIDIA DE JESUS', 'GUERRA VEGA', '8', '', '', '', '', '2024-07-19 23:10:24', '101'),
(357, 'CC', '1033648354', 'ELIANA', 'SANCHEZ BETANCUR', '8', '', '', '', '', '2024-07-19 23:10:24', '102'),
(358, 'CC', '21575047', 'MARIBEL', 'MEJIA VELASQUEZ', '8', '', '', '', '', '2024-07-19 23:10:24', '103'),
(359, 'CC', '10278811754', 'JUAN DAVID', 'HERRERA LONDOÑO', '8', '', '', '', '', '2024-07-19 23:10:24', '104'),
(360, 'CC', '70410931', 'OMAR DE JESUS', 'GOMEZ GOMEZ', '8', '', '', '', '', '2024-07-19 23:10:24', '201'),
(361, 'CC', '1033646023', 'FABIO NELSON', 'PINO MARTINEZ', '8', '', '', '', '', '2024-07-19 23:10:24', '202'),
(362, 'CC', '70412324', 'OSCAR DE JESUS', 'GUERRA MONTOYA', '8', '', '', '', '', '2024-07-19 23:10:24', '203'),
(363, 'CC', '70422439', 'EDWAR MAURICIO', 'SEPULVEDA RETREPO', '8', '', '', '', '', '2024-07-19 23:10:24', '204'),
(364, 'CC', '43491650', 'MARINELA MARIA', 'CASTAÑO MACHADO', '8', '', '', '', '', '2024-07-19 23:10:24', '301'),
(365, 'CC', '70410344', 'DE JESUS', 'ZAPATA ALBERTO', '8', '', '', '', '', '2024-07-19 23:10:24', '302'),
(366, 'CC', '43490575', 'BEATRIZ ELENA', 'JARAMILLO GAÑAN', '8', '', '', '', '', '2024-07-19 23:10:24', '303'),
(367, 'CC', '39209396', 'MARISOL', 'MARTINEZ HOLGUIN', '8', '', '', '', '', '2024-07-19 23:10:24', '304'),
(368, 'CC', '1033647887', 'DERLY VIVIANA', 'SILVA TORO', '8', '', '', '', '', '2024-07-19 23:10:24', '401'),
(369, 'CC', '43490760', 'LEIDY SULAY', 'DIAZ BOLIVAR', '8', '', '', '', '', '2024-07-19 23:10:24', '402'),
(370, 'CC', '21920342', 'ODILIA', 'GABRIEL ALVAREZ', '8', '', '', '', '', '2024-07-19 23:10:24', '403'),
(371, 'CC', '70420103', 'ALEXANDER', 'VELEZ CALLE', '8', '', '', '', '', '2024-07-19 23:10:24', '404'),
(372, 'CC', '13565098', 'WBEIMAR DE JESUS', 'SIERRA BARRERA', '8', '', '', '', '', '2024-07-19 23:10:24', '501'),
(373, 'CC', '43487843', 'OFELIA', 'GARCES ZAPATA', '8', '', '', '', '', '2024-07-19 23:10:24', '502'),
(374, 'CC', '1033653858', 'VERONICA YULIANA', 'ZAPATA MARTINEZ', '8', '', '', '', '', '2024-07-19 23:10:24', '503'),
(375, 'CC', '70419844', 'JOHN FREDY', 'CARVAJAL RODRIGUEZ', '8', '', '', '', '', '2024-07-19 23:10:24', '504'),
(376, 'CC', '32135254', 'LUZ ENID', 'JARAMILLO GAÑAN', '9', '', '', '', '', '2024-07-19 23:11:46', '101'),
(377, 'CC', '21577005', 'LUZ MARINA', 'VARGAS PALACIO', '9', '', '', '', '', '2024-07-19 23:11:46', '102'),
(378, 'CC', '43491380', 'DIANA PATRICIA', 'VALENCIA AGUDELO', '9', '', '', '', '', '2024-07-19 23:11:46', '103'),
(379, 'CC', '70420501', 'JOHN FREDY', 'PINO MARTINEZ', '9', '', '', '', '', '2024-07-19 23:11:46', '104'),
(380, 'CC', '21981469', 'DARLERY MARIA', 'URIBE GUERRA', '9', '', '', '', '', '2024-07-19 23:11:46', '201'),
(381, 'CC', '70414715', 'LUIS NORBERTO', 'MARIN JARAMILLO', '9', '', '', '', '', '2024-07-19 23:11:46', '202'),
(382, 'CC', '1033652107', 'SEIDY YANETH', 'MONTERO MACHADO', '9', '', '', '', '', '2024-07-19 23:11:46', '203'),
(383, 'CC', '70418445', 'JORGE EDILSON', 'YEPES AGUDELO', '9', '', '', '', '', '2024-07-19 23:11:46', '204'),
(384, 'CC', '21553454', 'BEATRIZ ELENA', 'RUIZ CANO', '9', '', '', '', '', '2024-07-19 23:11:46', '301'),
(385, 'CC', '15487667', 'LEONEL', 'MONSALVE FLOREZ', '9', '', '', '', '', '2024-07-19 23:11:46', '302'),
(386, 'CC', '1033653898', 'GUSTAVO ADOLFO (LEIDY)', 'VASQUEZ TORREZ', '9', '', '', '', '', '2024-07-19 23:11:46', '303'),
(387, 'CC', '21575478', 'MARIA PIEDAD', 'RESTREPO PEREZ', '9', '', '', '', '', '2024-07-19 23:11:46', '304'),
(388, 'CC', '1033654830', 'JULIAN GERARDO', 'FLOREZ RODAS', '9', '', '', '', '', '2024-07-19 23:11:46', '401'),
(389, 'CC', '70422311', 'CARLOS DANIEL', 'GUERRA GONZALEZ', '9', '', '', '', '', '2024-07-19 23:11:46', '402'),
(390, 'CC', '1113313562', 'INGRID TATIANA', 'COLORADO CASTRO', '9', '', '', '', '', '2024-07-19 23:11:46', '403'),
(391, 'CC', '70414907', 'AICARDO DE JESUS', 'GARCIA CORREA', '9', '', '', '', '', '2024-07-19 23:11:46', '404'),
(392, 'CC', '1033646237', 'LINA MARIA', 'TABORDA TORRES', '9', '', '', '', '', '2024-07-19 23:11:46', '501'),
(393, 'CC', '70418954', 'FABIAN ALONSO', 'LEZCANO VELEZ', '9', '', '', '', '', '2024-07-19 23:11:46', '502'),
(394, 'CC', '21576712', 'MARIA EUCARIS', 'FORONDA MUÑOZ', '9', '', '', '', '', '2024-07-19 23:11:46', '503'),
(395, 'CC', '70415633', 'FERNAN DARIO', 'SANCHEZ ROJAS', '9', '', '', '', '', '2024-07-19 23:11:46', '504'),
(396, 'CC', '1214722788', 'JASMIN', 'HERRERA VELEZ', '10', '', '', '', '', '2024-07-19 23:12:30', '101'),
(397, 'CC', '21577031', 'GLORIA ELENA', 'RESTREPO RESTREPO', '10', '', '', '', '', '2024-07-19 23:12:30', '102'),
(398, 'CC', '32135489', 'GLORIA ELSY', 'VALENCIA RESTREPO', '10', '', '', '', '', '2024-07-19 23:12:30', '103'),
(399, 'CC', '78711072', 'JUAN CARLOS', 'QUINTERO HERRERA', '10', '', '', '', '', '2024-07-19 23:12:30', '104'),
(400, 'CC', '21482982', 'LILIANA PATRICIA', 'GOMEZ RAMIREZ', '10', '', '', '', '', '2024-07-19 23:12:30', '201'),
(401, 'CC', '70415791', 'CARLOS EMILIO', 'LOPEZ CARO', '10', '', '', '', '', '2024-07-19 23:12:30', '202'),
(402, 'CC', '43491222', 'MARISELLA', 'VELEZ URAN', '10', '', '', '', '', '2024-07-19 23:12:30', '203'),
(403, 'CC', '70417651', 'LUIS GUSTAVO', 'MORENO CASTILLO', '10', '', '', '', '', '2024-07-19 23:12:30', '204'),
(404, 'CC', '70421085', 'HERNAN ALONSO', 'VARGAS ALVAREZ', '10', '', '', '', '', '2024-07-19 23:12:30', '301'),
(405, 'CC', '43492139', 'LINA MARCELA', 'ORTIZ MONTOYA', '10', '', '', '', '', '2024-07-19 23:12:30', '302'),
(406, 'CC', '1033650928', 'DEIBIS ESPERANZA', 'RESTREPO BOLIVAR', '10', '', '', '', '', '2024-07-19 23:12:30', '303'),
(407, 'CC', '1033653577', 'MARGARITA MARIA', 'ESCOBAR MONTOYA', '10', '', '', '', '', '2024-07-19 23:12:30', '304'),
(408, 'CC', '43489998', 'IDIRIAN BIBIANA', 'MARIN MEJIA', '10', '', '', '', '', '2024-07-19 23:12:30', '401'),
(409, 'CC', '98454069', 'JOSE JOBANY', 'BENJUMEA', '10', '', '', '', '', '2024-07-19 23:12:30', '402'),
(410, 'CC', '1033646891', 'CARLOS ANDRES', 'TABORDA BERMUDEZ', '10', '', '', '', '', '2024-07-19 23:12:30', '403'),
(411, 'CC', '1033650543', 'ERIKA TATIANA', 'HERRERA ZAPATA', '10', '', '', '', '', '2024-07-19 23:12:30', '404'),
(412, 'CC', '3380500', 'FABIO NELSON', 'VERGARA VELEZ', '10', '', '', '', '', '2024-07-19 23:12:30', '501'),
(413, 'CC', '1033654134', 'JUAN ALEJANDRO', 'ARREDONDO MORENO', '10', '', '', '', '', '2024-07-19 23:12:30', '502'),
(414, 'CC', '35603096', 'ILDA MARIA', 'AGUIRRE JIMENEZ', '10', '', '', '', '', '2024-07-19 23:12:30', '503'),
(415, 'CC', '1039760574', 'JUAN GABRIEL', 'ROMERO BEDOYA', '10', '', '', '', '', '2024-07-19 23:12:30', '504'),
(416, 'CC', '70413272', 'JOSE LIBARDO', 'RESTREPO SERNA', '11', '', '', '', '', '2024-07-19 23:13:10', '101'),
(417, 'CC', '70414492', 'RODOLFO DE JESUS', 'SANCHEZ ROJAS', '11', '', '', '', '', '2024-07-19 23:13:10', '102'),
(418, 'CC', '21573095', 'ALBA DE JESUS', 'JIMENEZ BERMUDEZ', '11', '', '', '', '', '2024-07-19 23:13:10', '103'),
(419, 'CC', '70421133', 'NELSON D', 'VELASQUEZ MONTOYA', '11', '', '', '', '', '2024-07-19 23:13:10', '104'),
(420, 'CC', '70421711', 'IVAN DARIO', 'YEPEZ AGUDELO', '11', '', '', '', '', '2024-07-19 23:13:10', '201'),
(421, 'CC', '21574686', 'PATRICIA EUGENIA', 'GALEANO ARIAS', '11', '', '', '', '', '2024-07-19 23:13:10', '202'),
(422, 'CC', '1033674669', 'ANDRES FELIPE', 'CORREA GIL', '11', '', '', '', '', '2024-07-19 23:13:10', '203'),
(423, 'CC', '1033646040', 'NELSON ALBERTO', 'PINO MARTINEZ', '11', '', '', '', '', '2024-07-19 23:13:10', '204'),
(424, 'CC', '1033646134', 'FABIO ALEXANDER', 'CANO RAMIREZ', '11', '', '', '', '', '2024-07-19 23:13:10', '301'),
(425, 'CC', '43490490', 'ISABEL CRISTINA', 'VELEZ DIOSA', '11', '', '', '', '', '2024-07-19 23:13:10', '302'),
(426, 'CC', '70415661', 'LIZARDO', 'RAMIREZ FRANCO', '11', '', '', '', '', '2024-07-19 23:13:10', '303'),
(427, 'CC', '21462782', 'MARGARITA', 'VELEZ', '11', '', '', '', '', '2024-07-19 23:13:10', '304'),
(428, 'CC', '78742871', 'JAIR ENRRIQUE', 'CONDE ESCOBAR', '11', '', '', '', '', '2024-07-19 23:13:10', '401'),
(429, 'CC', '70414740', 'JUAN CARLOS', 'SANCHEZ MUÑOZ', '11', '', '', '', '', '2024-07-19 23:13:10', '402'),
(430, 'CC', '75048087', 'LUBIN ANTONIO', 'ARROYABE TORO', '11', '', '', '', '', '2024-07-19 23:13:10', '403'),
(431, 'CC', '1033647096', 'MARCO TULIO', 'TABORDA RESTREPO', '11', '', '', '', '', '2024-07-19 23:13:10', '404'),
(432, 'CC', '43575177', 'MERY ALEXANDRA', 'LOPEZ MESA', '11', '', '', '', '', '2024-07-19 23:13:10', '501'),
(433, 'CC', '70421907', 'EDISON FERLEY', 'HERNANDEZ GUTIERREZ', '11', '', '', '', '', '2024-07-19 23:13:10', '502'),
(434, 'CC', '70065783', 'LUIS FERNANDO', 'RINCON ORTIZ', '11', '', '', '', '', '2024-07-19 23:13:10', '503'),
(435, 'CC', '1033654133', 'YENIFER SLEDY', 'AGUIRRE NUNO', '11', '', '', '', '', '2024-07-19 23:13:10', '504'),
(436, 'CC', '43487674', 'SILVIA ELENA', 'JOHNSONS FRANCO', '12', '', '', '', '', '2024-07-19 23:13:49', '101'),
(437, 'CC', '21584093', 'JOHANA MARIA', 'CANO ALZATE', '12', '', '', '', '', '2024-07-19 23:13:49', '102'),
(438, 'CC', '70414316', 'RODRIGO', 'HERNANDEZ MORENO', '12', '', '', '', '', '2024-07-19 23:13:49', '103'),
(439, 'CC', '43488759', 'ADRIANA MARIA', 'GALLEGO GARCIA', '12', '', '', '', '', '2024-07-19 23:13:49', '104'),
(440, 'CC', '70413530', 'VICTOR DAVID', 'GIL GIL', '12', '', '', '', '', '2024-07-19 23:13:49', '201'),
(441, 'CC', '70417102', 'JUAN ALEX', 'HERNANDEZ GONZALEZ', '12', '', '', '', '', '2024-07-19 23:13:49', '202'),
(442, 'CC', '43486603', 'LUZ EDILMA', 'TABORDA GARCES', '12', '', '', '', '', '2024-07-19 23:13:49', '203'),
(443, 'CC', '98476547', 'IVAN DARIO', 'AGUDELO CORREA', '12', '', '', '', '', '2024-07-19 23:13:49', '204'),
(444, 'CC', '70422112', 'JOHANY SNEIDER', 'SANCHEZ BETANCUR', '12', '', '', '', '', '2024-07-19 23:13:49', '301'),
(445, 'CC', '43490470', 'MARTHA OFELIA', 'TABORDA RESTREPO', '12', '', '', '', '', '2024-07-19 23:13:49', '302'),
(446, 'CC', '98509351', 'RICAUTE DE JESUS', 'OSPINA YEPEZ', '12', '', '', '', '', '2024-07-19 23:13:49', '303'),
(447, 'CC', '43488757', 'DIOSMES LICENIA', 'GALEANO ARIA', '12', '', '', '', '', '2024-07-19 23:13:49', '304'),
(448, 'CC', '43491379', 'MARY SOL', 'VANEGAS PAREJA', '12', '', '', '', '', '2024-07-19 23:13:49', '401'),
(449, 'CC', '1033648865', 'MONICA LILIANA', 'RICO SERNA', '12', '', '', '', '', '2024-07-19 23:13:49', '402'),
(450, 'CC', '70414810', 'JAIME ALBERTO', 'VELEZ SIERRA', '12', '', '', '', '', '2024-07-19 23:13:49', '403'),
(451, 'CC', '1036629024', 'ISABEL CRISTINA', 'JIMENEZ PALACIO', '12', '', '', '', '', '2024-07-19 23:13:49', '404'),
(452, 'CC', '1128465571', 'CARLOS ALBERTO', 'MUÑOZ ROJAS', '12', '', '', '', '', '2024-07-19 23:13:49', '501'),
(453, 'CC', '43492440', 'NINI JOHANA', 'HENAO FRANCO', '12', '', '', '', '', '2024-07-19 23:13:49', '502'),
(454, 'CC', '70415684', 'CENEN DE JESUS', 'TABORDA TABORDA', '12', '', '', '', '', '2024-07-19 23:13:49', '503'),
(455, 'CC', '43411038', 'GLORIA ELENA', 'ESCOBAR RESTREPO', '12', '', '', '', '', '2024-07-19 23:13:49', '504');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

CREATE TABLE `faltas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `caracteristicas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`id`, `descripcion`, `valor`, `caracteristicas`) VALUES
(5, 'Falta 1', 15000.00, 'falta de valor 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas_asignadas`
--

CREATE TABLE `faltas_asignadas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `falta_id` int(11) NOT NULL,
  `fecha_falta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `idord` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nomcl` text NOT NULL,
  `method` varchar(50) NOT NULL,
  `total_products` text NOT NULL,
  `total_price` int(15) NOT NULL,
  `placed_on` varchar(15) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `tipc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_purchase`
--

CREATE TABLE `orders_purchase` (
  `idordpur` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `idprov` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `total_products` text NOT NULL,
  `total_price` int(15) NOT NULL,
  `placed_on` varchar(15) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `tipc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Disparadores `orders_purchase`
--
DELIMITER $$
CREATE TRIGGER `after_order_insert` AFTER INSERT ON `orders_purchase` FOR EACH ROW BEGIN
    -- Eliminar los artículos del carrito para el usuario que hizo la compra
    DELETE FROM cart_purchase WHERE user_id = NEW.user_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_administracion`
--

CREATE TABLE `pagos_administracion` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `estado` enum('pendiente','pagado') DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idprod` int(11) NOT NULL,
  `codpro` char(14) NOT NULL,
  `nomprd` text NOT NULL,
  `desprd` text NOT NULL,
  `precio` int(15) NOT NULL,
  `stock` char(3) NOT NULL,
  `state` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idprov` int(11) NOT NULL,
  `rucprv` char(11) NOT NULL,
  `nomprv` text NOT NULL,
  `corrprv` varchar(35) NOT NULL,
  `state` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` char(1) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `username`, `correo`, `password`, `rol`, `fere`, `state`) VALUES
(1, 'Administrador', 'Administrador', 'admin01@gmail.com', '96e79218965eb72c92a549dd5a330112', '1', '2024-07-08 01:45:51', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idv`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idprod` (`idprod`);

--
-- Indices de la tabla `cart_purchase`
--
ALTER TABLE `cart_purchase`
  ADD PRIMARY KEY (`idcpr`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idprod` (`idprod`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcli`);

--
-- Indices de la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faltas_asignadas`
--
ALTER TABLE `faltas_asignadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `falta_id` (`falta_id`),
  ADD KEY `faltas_asignadas_ibfk_1` (`cliente_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idord`);

--
-- Indices de la tabla `orders_purchase`
--
ALTER TABLE `orders_purchase`
  ADD PRIMARY KEY (`idordpur`),
  ADD KEY `idprov` (`idprov`);

--
-- Indices de la tabla `pagos_administracion`
--
ALTER TABLE `pagos_administracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idprod`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idprov`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `idv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `cart_purchase`
--
ALTER TABLE `cart_purchase`
  MODIFY `idcpr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT de la tabla `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `faltas_asignadas`
--
ALTER TABLE `faltas_asignadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `idord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders_purchase`
--
ALTER TABLE `orders_purchase`
  MODIFY `idordpur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos_administracion`
--
ALTER TABLE `pagos_administracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idprov` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idprod`) REFERENCES `productos` (`idprod`);

--
-- Filtros para la tabla `cart_purchase`
--
ALTER TABLE `cart_purchase`
  ADD CONSTRAINT `cart_purchase_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `cart_purchase_ibfk_2` FOREIGN KEY (`idprod`) REFERENCES `productos` (`idprod`);

--
-- Filtros para la tabla `faltas_asignadas`
--
ALTER TABLE `faltas_asignadas`
  ADD CONSTRAINT `faltas_asignadas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`idcli`) ON DELETE CASCADE,
  ADD CONSTRAINT `faltas_asignadas_ibfk_2` FOREIGN KEY (`falta_id`) REFERENCES `faltas` (`id`);

--
-- Filtros para la tabla `orders_purchase`
--
ALTER TABLE `orders_purchase`
  ADD CONSTRAINT `orders_purchase_ibfk_1` FOREIGN KEY (`idprov`) REFERENCES `proveedores` (`idprov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
