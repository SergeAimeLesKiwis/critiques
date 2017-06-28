DROP DATABASE IF EXISTS `club_critiques`;
CREATE DATABASE `club_critiques`;
USE `club_critiques`;

-- INIT

CREATE TABLE `ci_sessions` (
	`id` VARCHAR(40) NOT NULL,
	`ip_address` VARCHAR(45) NOT NULL,
	`timestamp` INT(10) unsigned DEFAULT 0 NOT NULL,
	`data` blob NOT NULL,
	KEY `ci_sessions_timestamp` (`timestamp`)
);

CREATE TABLE `groups` (
	`id` INT(8) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL,
	`description` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`ip_address` VARCHAR(45) NOT NULL,
	`username` VARCHAR(100) NULL,
	`password` VARCHAR(255) NOT NULL,
	`salt` VARCHAR(255) DEFAULT NULL,
	`email` VARCHAR(100) NOT NULL,
	`activation_code` VARCHAR(40) DEFAULT NULL,
	`forgotten_password_code` VARCHAR(40) DEFAULT NULL,
	`forgotten_password_time` INT(11) unsigned DEFAULT NULL,
	`remember_code` VARCHAR(40) DEFAULT NULL,
	`created_on` INT(11) unsigned NOT NULL,
	`last_login` INT(11) unsigned DEFAULT NULL,
	`active` TINYINT(1) unsigned DEFAULT NULL,
	`first_name` VARCHAR(50) DEFAULT NULL,
	`last_name` VARCHAR(50) DEFAULT NULL,
	`company` VARCHAR(100) DEFAULT NULL,
	`phone` VARCHAR(20) DEFAULT NULL,
	`description` VARCHAR(500) NULL,
	`interests` VARCHAR(300) NULL,
	`avatar` VARCHAR(300) NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users_groups` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) NOT NULL,
	`group_id` MEDIUMINT(8) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `fk_users_groups_users1_idx` (`user_id`),
	KEY `fk_users_groups_groups1_idx` (`group_id`),
	CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
	CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
	CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE `login_attempts` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`ip_address` VARCHAR(15) NOT NULL,
	`login` VARCHAR(100) NOT NULL,
	`time` INT(11) unsigned DEFAULT NULL,
	PRIMARY KEY (`id`)
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
	`publish_date` DATETIME NOT NULL,
	`image_path` VARCHAR(150) NOT NULL,
	`category` INT NOT NULL,
	`description` VARCHAR(500) NOT NULL,
	`created_by` INT NOT NULL,
	`created_at` DATETIME NOT NULL,
	`updated_by` INT NOT NULL,
	`updated_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`category`) REFERENCES `categories`(`id`),
	FOREIGN KEY (`created_by`) REFERENCES `users`(`id`),
	FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`)
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
	`user` INT NOT NULL,
	`item` INT NOT NULL,
	`value` INT NOT NULL,
	PRIMARY KEY (`user`,`item`),
	FOREIGN KEY (`user`) REFERENCES `users`(`id`),
	FOREIGN KEY (`item`) REFERENCES `items`(`id`)
);

CREATE TABLE `loan_status` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `loans` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user` INT NOT NULL,
	`item` INT NOT NULL,
	`status` INT NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user`) REFERENCES `users`(`id`),
	FOREIGN KEY (`item`) REFERENCES `items`(`id`),
	FOREIGN KEY (`status`) REFERENCES `loan_status`(`id`)
);

CREATE TABLE `Rooms` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`admin` INT NOT NULL,
	`item` INT NOT NULL,
	`start_date` DATETIME NOT NULL,
	`end_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`admin`) REFERENCES `users`(`id`),
	FOREIGN KEY (`item`) REFERENCES `items`(`id`)	
);

CREATE TABLE `messages` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user` INT NOT NULL,
	`room` INT NOT NULL,
	`date` DATETIME NOT NULL,
	`content` VARCHAR(500) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user`) REFERENCES `users`(`id`),
	FOREIGN KEY (`room`) REFERENCES `rooms`(`id`)
);	

CREATE TABLE `parameters` (
	`key` VARCHAR(50) NOT NULL,
	`value` VARCHAR(2000) NOT NULL,
	PRIMARY KEY (`key`)
);

-- INSERT

INSERT INTO `groups` (`name`, `description`) VALUES
('admin','Administrateur'),
('moderator','Modérateur'),
('member', 'Utilisateur'),
('warned', 'Averti'),
('banned', 'Banni');


INSERT INTO `users` (`ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `description`, `interests`) VALUES
('127.0.0.1', 'Grand Manitou', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 
'', 'admin@mail.com', '', NULL, '1268889823', '1268889823', '1', 'Jean-Michel', 'L\'Admin', 'Le Club des Critiques', 
'0836656565', 'Administrateur du site "Le Club des Critiques"', NULL, NULL);

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES 
(1, 1);

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

INSERT INTO `items` (`title`, `author`, `publish_date`, `image_path`, `category`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES 
('Harry Potter et la Coupe de Feu', 'J.K. Rowling', '2000-11-29', 'IMAGEPATH', 1, '4ème volet de la saga Harry Potter.', 1, '2017-05-17', 1, '2017-05-17');

INSERT INTO `genres` (`name`) VALUES 
('Fantastique'), ('Science-fiction'), ('Polar'), ('Action'), ('Comédie'), ('Péplum'), ('Rap'), ('Rock'), ('Classique');

INSERT INTO `item_genres` (`genre`, `item`) VALUES 
(1, 1), (4, 1);

INSERT INTO `loan_status` (`name`) VALUES 
('Disponible'), ('Prêté'), ('Je le veux');

INSERT INTO `parameters` (`key`, `value`) VALUES 
('home_concept', 'Lorem Ipsum'),
('home_highlights', '1|1|1|1|1|1');