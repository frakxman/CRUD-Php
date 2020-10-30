------------------------------------------
-- Creation of DATABASE for Contacts
------------------------------------------
CREATE DATABASE contactsdb;
USE contactsdb;

------------------------------------------
-- Creation of TABLE for Contacts
------------------------------------------
CREATE TABLE `contactsdb`.`contacts` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL , 
    `phone` INT(15) NOT NULL , 
    `type` VARCHAR(10) NOT NULL , 
    `relation` VARCHAR(10) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;


------------------------------------------
-- Volcado de datos para la tabla `contacts`
------------------------------------------

INSERT INTO `contacts` (`id`, `name`, `phone`, `type`, `relation`) VALUES
(1, 'Fabian Rivera', 3165679540, 'Movil', 'Amigos'),
(2, 'Marleny Restrepo', 3008609693, 'Movil', 'Familia'),
(3, 'Fanny Muriel', 5679540, 'fijo', 'Compañera');
