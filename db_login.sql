-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 25, 2023 at 01:30 PM
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
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `product_name`, `product_id`, `price`) VALUES
(1, 'Winter Jumper', 4, '5.99'),
(2, 'Camouflage Jumper', 4, '5.99'),
(3, 'Melon Jumper', 4, '5.99'),
(4, 'Festive Cloaks', 4, '5.99');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `product_name`, `product_id`, `price`) VALUES
(1, 'Purina ONE with chicken', 2, '5.99'),
(2, 'Smilla Diet with beef', 2, '5.99'),
(3, 'Concept for life Urinary with chicken', 2, '5.99'),
(4, 'Concept for Life Hypo Allergenic', 2, '5.99');

-- --------------------------------------------------------

--
-- Table structure for table `hygiene`
--

CREATE TABLE `hygiene` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hygiene`
--

INSERT INTO `hygiene` (`id`, `product_name`, `product_id`, `price`) VALUES
(1, 'Pet Head Shampoo Orange Scent', 1, '5.99'),
(2, 'Pet Head Shampoo Peach Scent', 1, '569.00'),
(3, 'Pet Head Shampoo Pear Scent', 1, '5.99'),
(4, 'Pet Head Dry Shampoo Coconut Scent', 1, '5.99');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `user_email` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `address`, `phone_number`, `user_id`) VALUES
(1, 'Lixbuna, rua do teste nr 54', '123456123', 68);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`) VALUES
(1, 'Hygiene'),
(2, 'Food'),
(3, 'Toys'),
(4, 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `quantity`, `product_id`) VALUES
(0, 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `product_name`, `product_id`, `price`) VALUES
(1, 'Squeeky wild mouse', 3, '5.99'),
(2, 'Squeeky cheese', 3, '5.99'),
(3, 'Ball with bell', 3, '5.99'),
(4, 'Chase ball with a bell', 3, '5.99');

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
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `client`, `name`, `email`, `password_hash`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$iAQ9InVQvehJ3bq8os76Uu.3X.3buyzkw/YqCSqXO60naXu3Kmz/q'),
(6, 'user', 'Pedro Pereira', 'user123', 'use21313r@gmail.com', '$2y$10$u5DyRUb4W9aa1ttOBIyWY.17BB4ciYe.CYVhk17liCiyjgYogMxiK'),
(7, 'user', 'Lorem', 'Lorem32', 'lorem32@gmail.com', '$2y$10$QOaa6JSN7XZE1KVtk2pcgezun1xbmIszU8o2/a9PLLYqwMQUfVdpm'),
(8, 'user', 'test', 'testUser', 'testuser@gmail.com', '$2y$10$KeydE042uzZBoO/UeRwVE.4TAbLfDhnW7zvKEZfXBzwVrDv5s3KL.'),
(10, 'user', 'Pedro Miguel', 'PedroMigueld', 'miguel@gmail.com', '$2y$10$ufJVi8ChL7j/BAxmyU0gvuI2fGVun02IAu0voh7Aze5OuTpnXpqle'),
(11, 'user', 'John Doe', 'DoeohnDD', 'jondoe@sapo.pts', '$2y$10$tw.NGepBLiESbbJOIGTZ1.yqWFRYbqiBkJc4biZL/1zy/kqNAUN9G'),
(14, 'user', 'test', 'test', 'test@gmail.com', '$2y$10$0BgQ6rghawKSUF6TIhoCu.952892nZ1z1vUrImOzz5gXSIyJwPuYW'),
(17, 'user', 'Pedro Miguel', 'PedroTeste1', 'pedro@gmail.com', '$2y$10$1T/rvK.CAKbeG8ev7pW9mOwaPF20TPxCha3DhHwEQm5rott6BxRiK'),
(27, 'user', 'Stress Test Form Update', 'StressTestNumb8UpdateSucess', 'StressTestNumb8@gmail.com', '$2y$10$0s96SsjO0uB7cUhRUSvvqeoMWjPbnVbFf2s1wXxmj7xtjCjqX19mW'),
(49, 'user', '', '', '', ''),
(51, 'user', 'Test123', 'test123', 'test123@gmail.com', '$2y$10$.1j4yAmmmpygThQlx5QAPO4Zh3Epo.jCmnypttbBsCc8Q73JC5R3a'),
(55, 'user', 'Pedro Pereira', 'ASDASD', 'bottest@gmail.com', '$2y$10$Y0jiZ1tmdgYZ1QBCC7wU5e28fipx5EKuR.1mEDZtGsC6v3VmUVKk.'),
(56, 'user', 'CScriptBotTester', 'CScriptBotTester', 'CScriptBotTester@stress.pt', '$2y$10$VUDQvcjdhKsARGASapUQYuYXwPmIMdAJBJvB65K12z1W0S9kve8NC'),
(57, 'user', 'CScriptBotTester2', 'CScriptBotTester2', 'CScriptBotTester2@stress.com', '$2y$10$qR4E22feFHxik2ErRY/cz.HRJi5PurLrPNd6FpiJAaowLuTkuoWsS'),
(58, 'user', 'CScriptBotTester3', 'CScriptBotTester3', 'CScriptBotTester3@stress.aol', '$2y$10$kATmqYZJJZig9duBDXvxU.qCDbEu2zMX0Y/Ri3lp0c7O5xpS/86te'),
(59, 'user', 'CScriptBotTester4', 'CScriptBotTester4', 'CScriptBotTester4@gmail.com', '$2y$10$39jCmWuhPLhLosgzIL/qL.mk2dHUPuCv7N9B.9EeKtuUHNfUotO82'),
(60, 'user', 'CScriptBotTester5', 'CScriptBotTester5', 'CScriptBotTester5@gmail.pt', '$2y$10$n81S8R.ASR0rpVXuy.e1Xelf1qS3eZynCaTz0TQ5WYvazpVf51YDu'),
(61, 'user', 'testeste', 'teste123456', 'testeteste123@gmail.com', '$2y$10$F.3mljdX4W1YSppaOy9s/OjszrdmPUf5mtADuxNyjwzrtVFtXtj2W'),
(63, 'user', 'teste123', 'teste123456789', 'teste1234@gmail.com', '$2y$10$Qs12Ya/BzE7G09J7ZPKcreJIhYWwhidhZxT8MjHDjGgX/xQXfSfCG'),
(65, 'user', 'pedro', 'pedroTeste15', 'pedroteste123@aol.com', '$2y$10$auCIPY87Kt3I/aPpjDido.9CBXAxuNXGOH71EhlVToZjds/kC6o2O'),
(66, 'user', 'Pedro Miguel', 'Pedro123Miguel', 'pedro123miguel@aol.com', '$2y$10$m8IM/s4xBYuyggmCdCrOLOkb7fExTPqVcvo/3ZOxq8BfTfr/GB94W'),
(68, 'user', 'Pedro Pereira', 'Pedro1234Miguel', '123pedro@gmail.com', '$2y$10$TVUThl3HcUl0XMLuAOCViemjeDv14bS3O7kLgxLSY1/6KXaZZxDdO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `hygiene`
--
ALTER TABLE `hygiene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD KEY `user_email` (`user_email`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `hygiene`
--
ALTER TABLE `hygiene`
  ADD CONSTRAINT `hygiene_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `order_history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD CONSTRAINT `personal_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `toys`
--
ALTER TABLE `toys`
  ADD CONSTRAINT `toys_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
