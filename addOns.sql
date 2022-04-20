CREATE DATABASE `addOns`;
USE `addOns`;

CREATE TABLE `addInfo` (
  `id` int(11) AUTO_INCREMENT,
  `email` varchar(255),
  `number` varchar(255),
  PRIMARY KEY(`id`)
);

INSERT INTO `addInfo` (`id`, `email`, `number`) VALUES
(1, 'exampleEmail', 'exampleNumber');