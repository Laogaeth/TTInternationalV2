-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 23, 2023 at 12:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `client` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `consultation` varchar(255) NOT NULL,
  `consultation_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `client`, `name`, `email`, `password_hash`, `consultation`, `consultation_date`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$iAQ9InVQvehJ3bq8os76Uu.3X.3buyzkw/YqCSqXO60naXu3Kmz/q', '', ''),
(6, 'user', 'Pedro Pereira', 'user123', 'use21313r@gmail.com', '$2y$10$u5DyRUb4W9aa1ttOBIyWY.17BB4ciYe.CYVhk17liCiyjgYogMxiK', '', ''),
(7, 'user', 'Lorem', 'Lorem32', 'lorem32@gmail.com', '$2y$10$QOaa6JSN7XZE1KVtk2pcgezun1xbmIszU8o2/a9PLLYqwMQUfVdpm', '', ''),
(8, 'user', 'test', 'testUser', 'testuser@gmail.com', '$2y$10$KeydE042uzZBoO/UeRwVE.4TAbLfDhnW7zvKEZfXBzwVrDv5s3KL.', '', ''),
(10, 'user', 'Pedro Miguel', 'PedroMigueld', 'miguel@gmail.com', '$2y$10$ufJVi8ChL7j/BAxmyU0gvuI2fGVun02IAu0voh7Aze5OuTpnXpqle', '', ''),
(11, 'user', 'John Doe', 'DoeohnDD', 'jondoe@sapo.pts', '$2y$10$tw.NGepBLiESbbJOIGTZ1.yqWFRYbqiBkJc4biZL/1zy/kqNAUN9G', '', ''),
(14, 'user', 'test', 'test', 'test@gmail.com', '$2y$10$0BgQ6rghawKSUF6TIhoCu.952892nZ1z1vUrImOzz5gXSIyJwPuYW', '', ''),
(17, 'user', 'Pedro Miguel', 'PedroTeste1', 'pedro@gmail.com', '$2y$10$1T/rvK.CAKbeG8ev7pW9mOwaPF20TPxCha3DhHwEQm5rott6BxRiK', 'Consultation Lorem Ipsum', '22/12/2022'),
(27, 'user', 'Stress Test Form Update', 'StressTestNumb8UpdateSucess', 'StressTestNumb8@gmail.com', '$2y$10$0s96SsjO0uB7cUhRUSvvqeoMWjPbnVbFf2s1wXxmj7xtjCjqX19mW', '', ''),
(49, 'user', '', '', '', '', 'e', '2022-12-11'),
(51, 'user', 'Test123', 'test123', 'test123@gmail.com', '$2y$10$.1j4yAmmmpygThQlx5QAPO4Zh3Epo.jCmnypttbBsCc8Q73JC5R3a', '', ''),
(55, 'user', 'Pedro Pereira', 'ASDASD', 'bottest@gmail.com', '$2y$10$Y0jiZ1tmdgYZ1QBCC7wU5e28fipx5EKuR.1mEDZtGsC6v3VmUVKk.', '', ''),
(56, 'user', 'CScriptBotTester', 'CScriptBotTester', 'CScriptBotTester@stress.pt', '$2y$10$VUDQvcjdhKsARGASapUQYuYXwPmIMdAJBJvB65K12z1W0S9kve8NC', '', ''),
(57, 'user', 'CScriptBotTester2', 'CScriptBotTester2', 'CScriptBotTester2@stress.com', '$2y$10$qR4E22feFHxik2ErRY/cz.HRJi5PurLrPNd6FpiJAaowLuTkuoWsS', '', ''),
(58, 'user', 'CScriptBotTester3', 'CScriptBotTester3', 'CScriptBotTester3@stress.aol', '$2y$10$kATmqYZJJZig9duBDXvxU.qCDbEu2zMX0Y/Ri3lp0c7O5xpS/86te', '', ''),
(59, 'user', 'CScriptBotTester4', 'CScriptBotTester4', 'CScriptBotTester4@gmail.com', '$2y$10$39jCmWuhPLhLosgzIL/qL.mk2dHUPuCv7N9B.9EeKtuUHNfUotO82', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
