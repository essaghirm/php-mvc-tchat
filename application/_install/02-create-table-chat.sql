CREATE TABLE `php-mvc-tchat`.`chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255)  NOT NULL,
  `message` text  NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
