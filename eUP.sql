CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `middle` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `date_hired` date NOT NULL,
  `length_of_service` int(11) DEFAULT '0',
  `new_position` varchar(50) NOT NULL,
  `monetary_equivalent` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
);

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
);

CREATE TABLE IF NOT EXISTS `work_competency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `quality` int(11) DEFAULT 0,
  `knowledge` int(11) DEFAULT 0,
  `reliability` int(11) DEFAULT 0,
  `date_answered` datetime DEFAULT NULL,
  `leaning_ability` int(11) DEFAULT 0,
  KEY `user_id` (`user_id`),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `behavior_competency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `job_attitude` int(11) DEFAULT 0,
  `initiative` int(11) DEFAULT 0,
  `customer_service` int(11) DEFAULT 0,
  `cooperation_temWorl` int(11) DEFAULT 0,
  `honesty_integrity` int(11) DEFAULT 0,
  `date_answered` datetime DEFAULT NULL,
  KEY `user_id` (`user_id`),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_answered` datetime DEFAULT NULL,
  KEY `user_id` (`user_id`),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `evaluation_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `work_competency_id` int(11) NOT NULL,
  `behavior_competency_id` int(11) NOT NULL,
  `comments_id` int(11) NOT NULL,
  `performance_rate` float(4),
  KEY `user_id` (`user_id`),
  KEY `work_competency_id` (`work_competency_id`),
  KEY `behavior_competency_id` (`behavior_competency_id`),
  KEY `comments_id` (`comments_id`),
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `length_of_service` (
  `fromNum` int(11) DEFAULT 0,
  `toNum` int(11) DEFAULT 0,
  `valueMoney` int(11) DEFAULT 0  
);

CREATE TABLE IF NOT EXISTS `performance_rating` (
  `fromVar` float(4) DEFAULT 0,
  `toVar` float(4) DEFAULT 0,
  `money_value` float(4) DEFAULT 0  
);

-- - user_details foreign key for users
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- - team foreign key for users
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- - team foreign key for users
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

 -- - team foreign key for users
ALTER TABLE `work_competency`
  ADD CONSTRAINT `work_competency_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
   
-- - team foreign key for users
ALTER TABLE `behavior_competency`
  ADD CONSTRAINT `behavior_competency_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- - evaluation_results foreign key for users, WC, BC and Comments
ALTER TABLE `evaluation_results`
  ADD CONSTRAINT `evaluation_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evaluation_results_ibfk_2` FOREIGN KEY (`work_competency_id`) REFERENCES `work_competency` (`id`),
  ADD CONSTRAINT `evaluation_results_ibfk_3` FOREIGN KEY (`behavior_competency_id`) REFERENCES `behavior_competency` (`id`),
  ADD CONSTRAINT `evaluation_results_ibfk_4` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`);