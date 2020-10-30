------------------------------------------
-- Creation of DATABASE for Users
------------------------------------------
CREATE DATABASE IF NOT EXISTS usersdb;
USE usersdb;


------------------------------------------
-- Creation of table for Users
------------------------------------------
CREATE TABLE `usersdb`.`users` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(50) NOT NULL , 
    `lastName` VARCHAR(50) NOT NULL , 
    `birthday` DATE NOT NULL , 
    `gender` VARCHAR(10) NOT NULL , 
    `user` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`) 
) ENGINE = InnoDB;


------------------------------------------
-- Insertion of Users
------------------------------------------
INSERT INTO `users` (`id`, `name`, `lastName`, `birthday`, `gender`, `user`, `password`) 
VALUES 
(1, 'Fabian', 'Rivera', '1982-08-08', 'Male', 'frakxman', '123456'), 
(2, 'Marleny', 'Restrepo', '1956-02-11', 'Female', 'muresma', '098765'),
(3, 'Fanny', 'Muriel', '1947-08-20', 'Female', 'muresfa', '987654'),
(4, 'Bernardo', 'Bejarano', '1976-01-11', 'Male', 'berbej', '123ber'),
(5, 'Rodrigo', 'Ramirez', '1996-09-01', 'Male', 'rodram', 'rodrig');





