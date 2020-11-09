------------------------------------------
-- Creation of DATABASE for Contacts
------------------------------------------
CREATE DATABASE ultimate;
USE ultimate;

------------------------------------------
-- Creation of TABLE for Contacts
------------------------------------------

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `cumpleaños` date NOT NULL DEFAULT current_timestamp(),
  `genero` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

------------------------------------------
-- Volcado de datos para la tabla `contacts`
------------------------------------------

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `cumpleaños`, `genero`) VALUES
(10, 'German', 'Rivera Rodriguez', '1946-01-26', 'Masculino'),
(20, 'Fabián ', 'Rivera Restrepo', '1982-08-08', 'Masculino'),
(21, 'Marleny', 'Rivera Restrepo', '1956-02-11', 'Femenino'),
(22, 'Fabián ', 'Vargas', '2000-08-20', 'Masculino'),
(25, 'Emma', 'Vargas', '1956-02-11', 'Femenino'),
(32, 'Marleny', 'Restrepo Muriel', '1956-02-11', 'Femenino'),
(36, 'Emma', 'Vargas', '1956-02-11', 'Masculino');
