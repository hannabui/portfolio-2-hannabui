CREATE DATABASE `portfolio`;
USE `portfolio`;

CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255),
  PRIMARY KEY(`id`)
);

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'exampleUsername', 'examplePassword');