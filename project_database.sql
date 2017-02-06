--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` DATETIME,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

--
-- Dumping data for table `salespeople`
--

INSERT INTO `users` VALUES (1, 'Jiapei', 'Liang', 'liang98@purdue.edu', 'liang98', NOW());
