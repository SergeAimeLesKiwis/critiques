DROP DATABASE IF EXISTS `club_critiques`;
CREATE DATABASE `club_critiques`;
USE `club_critiques`;

-- INIT

CREATE TABLE `user_status` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`email` VARCHAR(150) NOT NULL,
	`password` VARCHAR(50) NOT NULL,
	`firstName` VARCHAR(100) NOT NULL,
	`lastName` VARCHAR(100) NOT NULL,
	`description` VARCHAR(500) NULL,
	`interests` VARCHAR(300) NULL,
	`subscriptionDate` DATETIME NOT NULL,
	`lastConnexion` DATETIME NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`email`),
	FOREIGN KEY (`status`) REFERENCES `user_status`(`id`)
);

CREATE TABLE `types` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`type` INT NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`type`) REFERENCES `types`(`id`)
);

CREATE TABLE `items` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(100) NOT NULL,
	`author` VARCHAR(200) NOT NULL,
	`publishDate` DATETIME NOT NULL,
	`imagePath` VARCHAR(150) NOT NULL,
	`category` INT NOT NULL,
	`description` VARCHAR(500) NOT NULL,
	`createdBy` VARCHAR(150) NOT NULL,
	`createdAt` DATETIME NOT NULL,
	`updatedBy` VARCHAR(150) NOT NULL,
	`updatedAt` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`category`) REFERENCES `categories`(`id`),
	FOREIGN KEY (`createdBy`) REFERENCES `users`(`email`),
	FOREIGN KEY (`updatedBy`) REFERENCES `users`(`email`)
);

CREATE TABLE `genres` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `item_genres` (
	`genre` INT NOT NULL,
	`item` INT NOT NULL,
	PRIMARY KEY (`genre`,`item`),
	FOREIGN KEY (`genre`) REFERENCES `genres`(`id`),
	FOREIGN KEY (`item`) REFERENCES `items`(`id`)
);

CREATE TABLE `grades` (
	`user` VARCHAR(150) NOT NULL,
	`item` INT NOT NULL,
	`value` INT NOT NULL,
	PRIMARY KEY (`user`,`item`),
	FOREIGN KEY (`user`) REFERENCES `users`(`email`),
	FOREIGN KEY (`item`) REFERENCES `items`(`id`)
);

CREATE TABLE `loan_status` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `loans` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user` VARCHAR(150) NOT NULL,
	`item` INT NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`user`,`item`),
	FOREIGN KEY (`user`) REFERENCES `users`(`email`),
	FOREIGN KEY (`item`) REFERENCES `items`(`id`),
	FOREIGN KEY (`status`) REFERENCES `loan_status`(`id`)
);

CREATE TABLE `Rooms` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`admin` VARCHAR(150) NOT NULL,
	`item` INT NOT NULL,
	`startDate` DATETIME NOT NULL,
	`endDate` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`admin`) REFERENCES `users`(`email`),
	FOREIGN KEY (`item`) REFERENCES `items`(`id`)	
);

CREATE TABLE `messages` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`room` INT NOT NULL,
	`user` VARCHAR(150) NOT NULL,
	`date` DATETIME NOT NULL,
	`content` VARCHAR(500) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`room`) REFERENCES `rooms`(`id`),
	FOREIGN KEY (`user`) REFERENCES `users`(`email`)
);

-- INSERT

INSERT INTO `user_status` (`name`) VALUES 
('Administrateur'), ('En attente'), ('Actif'), ('Averti'), ('Banni');

INSERT INTO `users` (`email`, `password`, `firstName`, `lastName`, `description`, `interests`, `subscriptionDate`, `lastConnexion`, `status`) VALUES 
('admin@club-des-critiques.com', '21232f297a57a5a743894a0e4a801fc3', 'Administrateur', 'Club des Critiques', 'Administrateur du site "Le Club des Critiques"', NULL, '2017-05-17', NULL, 1);

INSERT INTO `types` (`name`) VALUES 
('Livre'), ('Film'), ('Musique'), ('Spectacle'), ('Jeu');

INSERT INTO `categories` (`name`, `type`) VALUES 
('Roman', 1),
('Nouvelle', 1),
('Bande-dessinée', 1),
('Manga', 1),
('Long-métrage', 2),
('Court-métrage', 2),
('Animation', 2),
('Live', 3),
('Studio', 3),
('Pièce de théàtre', 4),
('Stand-up', 4),
('Ordinateur', 5),
('Console portable', 5),
('Console de salon', 5);

INSERT INTO `items` (`title`, `author`, `publishDate`, `imagePath`, `category`, `description`, `createdBy`, `createdAt`, `updatedBy`, `updatedAt`) VALUES 
('Harry Potter et la Coupe de Feu', 'J.K. Rowling', '2000-11-29', 'IMAGEPATH', 1, '4ème volet de la saga Harry Potter.', 'admin@club-des-critiques.com', '2017-05-17', 'admin@club-des-critiques.com', '2017-05-17');

INSERT INTO `genres` (`name`) VALUES 
('Fantastique'), ('Science-fiction'), ('Polar'), ('Action'), ('Comédie'), ('Péplum'), ('Rap'), ('Rock'), ('Classique');

INSERT INTO `item_genres` (`genre`, `item`) VALUES 
(1, 1), (4, 1);

INSERT INTO `loan_status` (`name`) VALUES 
('Disponible'), ('Prété'), ('Je le veux');