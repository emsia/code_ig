
CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `neighborhood` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



CREATE TABLE IF NOT EXISTS `cancelled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `refunded` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `untag` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


CREATE TABLE IF NOT EXISTS `completed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `last` varchar(255) DEFAULT NULL,
  `string` varchar(255) DEFAULT NULL,
  `first` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;


CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `available` int(11) NOT NULL,
  `reserved` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL DEFAULT 'TBA',
  `objectives` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `attendees` varchar(255) NOT NULL,
  `attendeesno` int(100) NOT NULL,
  `foodexp` int(100) NOT NULL,
  `transpo` int(255) NOT NULL,
  `accommodation` int(255) NOT NULL,
  `totalexp` int(255) NOT NULL,
  `endTime` time DEFAULT NULL,
  `tempId` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;


CREATE TABLE IF NOT EXISTS `dissolved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `forsending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dateToday` datetime NOT NULL,
  `tempId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forSending_ibfk_1` (`user_id`),
  KEY `forSending_ibfk_2` (`tempId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;


CREATE TABLE IF NOT EXISTS `mobilenumbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


CREATE TABLE IF NOT EXISTS `origsurvey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `concepts1` int(11) NOT NULL,
  `concepts2` int(11) NOT NULL,
  `concepts3` int(11) NOT NULL,
  `concepts4` int(11) NOT NULL,
  `concepts5` int(11) NOT NULL,
  `concepts6` int(11) NOT NULL,
  `concepts7` int(11) NOT NULL,
  `concepts8` int(11) NOT NULL,
  `word1` int(11) NOT NULL,
  `word2` int(11) NOT NULL,
  `word3` int(11) NOT NULL,
  `word4` int(11) NOT NULL,
  `word5` int(11) NOT NULL,
  `word6` int(11) NOT NULL,
  `word7` int(11) NOT NULL,
  `word8` int(11) NOT NULL,
  `word9` int(11) NOT NULL,
  `word10` int(11) NOT NULL,
  `word11` int(11) NOT NULL,
  `word12` int(11) NOT NULL,
  `word13` int(11) NOT NULL,
  `word14` int(11) NOT NULL,
  `spreadsht1` int(11) NOT NULL,
  `spreadsht2` int(11) NOT NULL,
  `spreadsht3` int(11) NOT NULL,
  `spreadsht4` int(11) NOT NULL,
  `spreadsht5` int(11) NOT NULL,
  `spreadsht6` int(11) NOT NULL,
  `spreadsht7` int(11) NOT NULL,
  `spreadsht8` int(11) NOT NULL,
  `images1` int(11) NOT NULL,
  `images2` int(11) NOT NULL,
  `images3` int(11) NOT NULL,
  `images4` int(11) NOT NULL,
  `presentation1` int(11) NOT NULL,
  `presentation2` int(11) NOT NULL,
  `presentation3` int(11) NOT NULL,
  `presentation4` int(11) NOT NULL,
  `presentation5` int(11) NOT NULL,
  `internet1` int(11) NOT NULL,
  `internet2` int(11) NOT NULL,
  `internet3` int(11) NOT NULL,
  `internet4` int(11) NOT NULL,
  `internet5` int(11) NOT NULL,
  `internet6` int(11) NOT NULL,
  `internet7` int(11) NOT NULL,
  `internet8` int(11) NOT NULL,
  `email1` int(11) NOT NULL,
  `email2` int(11) NOT NULL,
  `email3` int(11) NOT NULL,
  `email4` int(11) NOT NULL,
  `email5` int(11) NOT NULL,
  `email6` int(11) NOT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `traindev` varchar(50) DEFAULT NULL,
  `payee` varchar(50) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `totalI` int(11) NOT NULL,
  `totalII` int(11) NOT NULL,
  `totalIII` int(11) NOT NULL,
  `totalIV` int(11) NOT NULL,
  `totalV` int(11) NOT NULL,
  `totalVI` int(11) NOT NULL,
  `totalVII` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `certOk` int(11) NOT NULL,
  `counted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ornumber` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;


CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;


CREATE TABLE IF NOT EXISTS `recentactivities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `recentactivities`
--

INSERT INTO `recentactivities` (`id`, `desc`, `course`, `date`, `status`) VALUES
(2, 'ADD', '2', '2013-05-27 17:02:59', 2),
(3, 'ADD', '3', '2013-05-27 17:17:59', 2),
(4, 'ADD', '4', '2013-05-29 14:06:41', 2),
(5, 'ADD', '5', '2013-05-29 14:10:06', 2),
(6, 'DELETE', '3', '2013-05-29 14:24:37', 2),
(7, 'DELETE', '3', '2013-05-29 14:41:44', 2),
(8, 'DELETE', '3', '2013-05-29 14:44:52', 2),
(9, 'ADD', '6', '2013-05-29 15:27:05', 2),
(10, 'ADD', '7', '2013-06-01 22:43:56', 2),
(11, 'ADD', '8', '2013-06-01 22:46:18', 2),
(12, 'DELETE', '14', '2013-06-12 14:45:58', 2),
(13, 'DELETE', '14', '2013-06-12 14:51:59', 2),
(14, 'DELETE', '15', '2013-06-12 14:55:42', 2),
(15, 'DELETE', '16', '2013-06-12 14:58:56', 2),
(16, 'DELETE', '17', '2013-06-13 09:12:03', 2),
(17, 'ADD', '19', '2013-06-16 03:27:42', 2),
(18, 'ADD', '24', '2013-06-18 10:02:03', 2),
(19, 'ADD', '25', '2013-06-18 10:04:20', 2),
(20, 'DELETE', '35', '2013-07-24 09:26:50', 2),
(21, 'DELETE', '36', '2013-07-24 09:51:51', 2),
(22, 'DELETE', '37', '2013-07-24 10:17:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE IF NOT EXISTS `reserved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`id`, `user_id`, `course_id`, `date`) VALUES
(3, 239, 8, '2013-06-10 08:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expired` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessions_ios`
--

CREATE TABLE IF NOT EXISTS `sessions_ios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `sessions_ios`
--

INSERT INTO `sessions_ios` (`id`, `date`, `user_id`, `token`) VALUES
(32, '2013-05-30 05:24:31', 218, 'aafaa0940b5e26f28552d1edf5340143ce8f3152');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE IF NOT EXISTS `signature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `enddate` date NOT NULL,
  `startdate` date NOT NULL,
  `photo_id2` int(11) DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  `name1` varchar(255) DEFAULT NULL,
  `position1` varchar(255) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `position2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `course_id`, `photo_id`, `enddate`, `startdate`, `photo_id2`, `type`, `name1`, `position1`, `name2`, `position2`) VALUES
(54, 19, 54, '2013-06-20', '2013-06-20', 0, 'Appreciation', NULL, NULL, NULL, NULL),
(66, 3, 67, '2013-07-10', '2013-07-06', 0, 'Appearance', NULL, NULL, NULL, NULL),
(68, 8, 69, '2013-07-17', '2013-07-16', 70, 'Appearance', NULL, NULL, NULL, NULL),
(70, 6, 72, '2013-07-17', '2013-07-16', 0, 'Attendance', 'Sia, Efren Ver', 'CEO', '', ''),
(72, 28, 74, '2013-07-30', '2013-07-16', 0, 'Attendance', 'Sia, Efren Ver M.', 'Vice President for Development, UP System Project Director, eUP', '', ''),
(73, 27, 75, '2013-07-29', '2013-07-17', 0, 'Recognition', 'Sia, Efren Ver M.', 'Vice President for Development, UP System Project Director, eUP', '', ''),
(74, 5, 76, '2013-07-31', '2013-07-23', 0, 'Recognition', 'Dr. Sia, Efren Ver Monesit', 'CEO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `objective1` int(11) NOT NULL,
  `objective2` int(11) NOT NULL,
  `objective3` int(11) NOT NULL,
  `objective4` int(11) NOT NULL,
  `objective5` int(11) NOT NULL,
  `objective6` int(11) NOT NULL,
  `objective7` int(11) NOT NULL,
  `objective8` int(11) NOT NULL,
  `facilities1` int(11) NOT NULL,
  `facilities2` int(11) NOT NULL,
  `facilities3` int(11) NOT NULL,
  `facilities4` int(11) NOT NULL,
  `facilities5` int(11) NOT NULL,
  `instructor1` int(11) NOT NULL,
  `instructor2` int(11) NOT NULL,
  `instructor3` int(11) NOT NULL,
  `instructor4` int(11) NOT NULL,
  `instructor5` int(11) NOT NULL,
  `instructor6` int(11) NOT NULL,
  `methodology1` int(11) NOT NULL,
  `methodology2` int(11) NOT NULL,
  `methodology3` int(11) NOT NULL,
  `materials1` int(11) NOT NULL,
  `materials2` int(11) NOT NULL,
  `materials3` int(11) NOT NULL,
  `futureTraining` varchar(50) DEFAULT NULL,
  `getInfo` varchar(50) DEFAULT NULL,
  `payee` varchar(50) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `overall1` int(11) NOT NULL,
  `overall2` int(11) NOT NULL,
  `overall3` int(11) NOT NULL,
  `overall4` int(11) NOT NULL,
  `overall5` int(11) NOT NULL,
  `overall6` int(11) NOT NULL,
  `totalI` int(11) NOT NULL,
  `totalII` int(11) NOT NULL,
  `totalIII` int(11) NOT NULL,
  `totalIV` int(11) NOT NULL,
  `totalV` int(11) NOT NULL,
  `totalVI` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `certOk` int(11) NOT NULL,
  `counted` int(11) DEFAULT '0',
  `permission` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `userid`, `course_id`, `objective1`, `objective2`, `objective3`, `objective4`, `objective5`, `objective6`, `objective7`, `objective8`, `facilities1`, `facilities2`, `facilities3`, `facilities4`, `facilities5`, `instructor1`, `instructor2`, `instructor3`, `instructor4`, `instructor5`, `instructor6`, `methodology1`, `methodology2`, `methodology3`, `materials1`, `materials2`, `materials3`, `futureTraining`, `getInfo`, `payee`, `comments`, `overall1`, `overall2`, `overall3`, `overall4`, `overall5`, `overall6`, `totalI`, `totalII`, `totalIII`, `totalIV`, `totalV`, `totalVI`, `total`, `certOk`, `counted`, `permission`) VALUES
(4, 77, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 2, 1, 2, 1, 1, 1, 2, 1, 2, 1, 1, 1, 2, 1, 2, '', 'Email', '0', 'GREAT!', 2, 2, 2, 2, 2, 2, 16, 3, 5, 8, 8, 12, 52, 0, 1, 1),
(5, 248, 3, 2, 1, 2, 2, 2, 2, 2, 1, 2, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 2, 2, 2, 1, 2, 1, '', 'Internet', '1', 'WOW! :D', 2, 2, 2, 1, 2, 2, 14, 6, 4, 10, 7, 11, 52, 1, 1, 1),
(6, 248, 27, 2, 2, 2, 1, 2, 2, 2, 2, 2, 2, 2, 2, 1, 2, 2, 2, 1, 2, 2, 2, 2, 2, 2, 1, 1, 'Java 2', 'Internet', 'Employer', 'Great if we have more time for it. Though, I am satisfied overall. :D', 2, 2, 2, 1, 2, 2, 15, 6, 4, 9, 11, 11, 56, 1, 1, 1),
(7, 248, 28, 2, 1, 2, 2, 1, 2, 1, 2, 2, 2, 1, 2, 2, 1, 2, 2, 2, 2, 2, 1, 1, 1, 2, 2, 2, 'World Cup', 'Internet', '0', 'Faster! :D', 1, 2, 1, 2, 1, 2, 13, 3, 6, 9, 11, 9, 51, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_courses`
--

CREATE TABLE IF NOT EXISTS `temp_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `venue` varchar(255) NOT NULL DEFAULT 'TBA',
  `startTime` time NOT NULL,
  `count` int(11) NOT NULL,
  `endTime` time DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `approved` int(11) DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `facilitator` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `temp_courses_ibfk_1` (`sender`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `temp_courses`
--

INSERT INTO `temp_courses` (`id`, `name`, `sender`, `cost`, `start`, `end`, `venue`, `startTime`, `count`, `endTime`, `code`, `approved`, `description`, `department`, `facilitator`, `email`) VALUES
(64, 'ICT PRODUCTIVITY TOOLS 1', 'UpItdc Admin', 0, '2013-06-23', '2013-06-30', 'UPITDC', '08:00:00', 1, '17:00:00', 'mGGtL12QT4IejoZQUrTxnEGOm', 1, NULL, 'TRAINING', NULL, NULL),
(65, 'Do Hard Things 4', 'UpItdc Admin', 0, '2013-06-28', '2013-06-30', 'San Felipe, Zambales', '08:00:00', 1, '17:00:00', 'ReaDmxypR33CR29hzMbyAzGGI', 1, 'To develop Leadership skill in you.', NULL, NULL, NULL),
(73, 'Just Do it', 'Efren Ver Sia', 0, '2013-08-09', '2013-08-10', 'Cuneta Astrodome', '09:45:00', 4256, '17:45:00', 'iGePjJUSVeEXBzW9SZ0tdlrts', 0, 'All Things Are good', 'Training', NULL, 'esia.rizal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--



--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `role`, `salt`, `verified`, `slug`) VALUES
(1, 'meteor.upitdc@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'UpItdc', 'Admin', 0, '', 1, 'lNteFkasd0vmVG7Yy91buAwG9'),
(59, 'cgrosario@yahoo.com', 'aec62201b6476853e68a6d7bc6d40ecc429beb3d', 'Chris', 'Rosario', 2, '', 1, 'lNteFKnms0vmVG7Yy91buAwG9'),
(60, 'conradolega@gmail.com', '8915cce1167773401e30f384de6eb8aac3b5d1a5', 'Conrad', 'Olega', 2, '', 1, '7c40f9f057f4a59ae834442e22522ae15782ca8c'),
(63, 'kent7tnek@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Kent', 'Sarmiento', 2, '', 1, 's8eapjDhB8zsGunQa4HA4G5DI'),
(64, 'pjgumarang@ymail.com', '48601361c1670b9eac73f76464c2931187755b25', 'Peter John', 'Gumarang', 2, '', 0, 'b7dc1076bb14753b2d271e1ba0afbb45556464cb'),
(75, 'c.olega09@gmail.com', '8915cce1167773401e30f384de6eb8aac3b5d1a5', 'Conrad', 'O', 2, '', 0, '0d6e9da425fe57c6cf8591d56f60f3f158de3833'),
(76, 'ecg_gabbi@yahoo.com', '6caa1da1dea1a4bf7c65a7d8db14865d5c78fae3', 'Gabbi', 'Ramirez', 2, '', 1, '44b77548620845482ad9a458e8822279c6c3d815'),
(77, 'mariaerikasantos@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Maria Erika', 'Santos', 2, '', 1, 'ICpT4HXcDw735PKJUmpv3Ld5e'),
(92, 'lgmata@ittc.up.edu.ph', '55140cd6183e3a64534a23fb6930f3d99224d388', 'Ginny', 'Mata', 2, '', 1, '5IddCzMrpNlRqHEa18xO0o3g5'),
(93, 'dybrian@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'pedro', 'Dy', 2, '', 1, '187ff3cb67c6cc7020dae977f0c3089f0b913593'),
(94, 'rmpancho@ittc.up.edu.ph', 'e2e75d04d4ad528c312b153ccf94ccb40c76980a', ' Richmon', ' Pancho', 1, '', 1, ''),
(95, 'cnforteza@ittc.up.edu.ph', '991bb0ef5370910424d2d20a60b38769023e3c61', 'Caloy ', 'Forteza', 1, '', 1, ''),
(98, 'managerone@mail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Master', 'Manager', 1, '', 1, ''),
(99, 'ecolangot@rom.oib.com', 'f8e65782383b9b3888f130e73cd9c2d2ed3acb2f', 'eco', 'langot', 2, '', 1, 'qcFqXqnIdV7n6leYe432epxqq'),
(100, 'aprilsia@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'April', 'Sia', 2, '', 0, 'ilWA7CiYLRKD8mGuhCp7vxFSy'),
(101, 'macabantac@ittc.up.edu.ph', '495b8a55065a23e384df3e2340d1d572f8ccfd46', 'Mariz', 'Cabantac', 2, '', 1, 'X87guw2GwHFl8AHZythsPAIvH'),
(102, 'joraphmedina@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Raph', 'Medina', 2, '', 0, '7mdkWijtMgcNVNtE4RTWTnyDc'),
(197, 'desireecflores@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Desiree', 'Flores', 2, '', 1, '2i6wtM5PaXjGbMArwEvyhnYPx'),
(218, 'daryll.panaligan@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Daryll', 'Panaligan', 2, '', 1, 'MiRTDVBO9Izscsvc9N7EpZ35F'),
(239, 'meteor@rom.oib.com', '4e3d283ce29a8b31f863c5aa2bc1bb1161827590', 'R', 'F', 2, '', 1, 'Tv3isyXr0eDiWbQi6v7he5nNx'),
(248, 'esia.rizal@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Efren Ver', 'Sia', 2, '', 1, 'B2639EHtYOftNZvNVyHoczQpx'),
(249, 'efren.aldave@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'efren', 'sia', 0, '', 1, 'sfvnfdshfsdhgruhjrkneskjhdfsbfksdf'),
(250, 'testonly@sogetthis.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Test', 'Only', 2, '', 1, 'y5U6sZqLE66gyqg8H1C6xOF4y'),
(251, 'sinag.abello@gmail.com', '8a7852a09b95ef5a442187a97a08df80f1559cb7', 'Sinag', 'Abello', 2, '', 1, 'O0afImGqAHqT7xs8aaYJKxUcr');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cancelled`
--
ALTER TABLE `cancelled`
  ADD CONSTRAINT `cancelled_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cancelled_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `completed`
--
ALTER TABLE `completed`
  ADD CONSTRAINT `completed_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `completed_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `dissolved`
--
ALTER TABLE `dissolved`
  ADD CONSTRAINT `dissolved_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dissolved_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `forsending`
--
ALTER TABLE `forsending`
  ADD CONSTRAINT `forSending_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `forSending_ibfk_2` FOREIGN KEY (`tempId`) REFERENCES `temp_courses` (`id`);

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mobilenumbers`
--
ALTER TABLE `mobilenumbers`
  ADD CONSTRAINT `mobilenumbers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `reserved_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reserved_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `signature`
--
ALTER TABLE `signature`
  ADD CONSTRAINT `signature_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `signature_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `picture` (`id`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
