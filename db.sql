-- Adminer 4.8.1 MySQL 5.5.5-10.6.5-MariaDB-1:10.6.5+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `noteID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `checked` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`noteID`),
  KEY `userID` (`userID`),
  CONSTRAINT `notes_ibfk_7` FOREIGN KEY (`userID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `notes` (`noteID`, `userID`, `title`, `body`, `checked`) VALUES
(2,	1,	'Do this',	'Testing adding note. Do this',	NULL),
(43,	3,	'asdasd',	'asdasd',	NULL),
(74,	10,	'asdasd asd',	'asdasd',	NULL),
(75,	10,	'asdasdasd',	'asdasasd',	NULL),
(76,	10,	'asdasd',	'asdasd',	1),
(78,	10,	'dsadas',	'dsadasd',	NULL),
(81,	2,	'asdasd',	'asdasd',	1),
(82,	2,	'asdasd',	'asdasd',	1),
(84,	11,	'asdasd',	'asd ändring',	NULL),
(85,	11,	'asd',	'asd',	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`) VALUES
(1,	'testUser',	'test1234',	'Test tester',	'test@test.com'),
(2,	'test1234',	'$2y$10$pwF9IWCyE4lhA2HjMKrMqOBgVfsZ0rgBz684qYvB5fxiYJ3WXB34S',	'test1234',	'test@test.com'),
(3,	'AdvancedUser',	'$2y$10$.0qhJy1D9i.hdY.A4e6mjePuuPrEkvNiNQbK./uC9bG4QaOTTn7Dy',	'Advanced User',	'Advanced@user.com'),
(4,	'hejsan',	'$2y$10$4C29wWn0TL/jEz16MaHoJOIjM/aRTkE1ZpEHU88XRfOlCP7CiGlNq',	'hejsan',	'hejsanasdasd'),
(9,	'test12345',	'$2y$10$w7eKOIuqh/i8whvMUlVloe26LPOMStrRZmpfnuH8lx4Ej8eHY7muC',	'Test tester',	'test@test.com'),
(10,	'blah',	'$2y$10$AElewayhMo/npHBrt4S.V..MUxdDlNWJ.h68eky7BrlI11R9h5SMe',	'blah',	'blah'),
(11,	'andreas',	'$2y$10$xr2wSG6UMJRU1mMvL8aom.WAl9qzO55e1dsaIDb1u59plLhv5unXa',	'Andreas',	'mail@mail.com');

-- 2022-01-25 17:41:20