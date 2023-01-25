-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 25, 2023 at 06:03 PM
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
(1, 'Lixbuna, rua do teste nr 56,Travessa 5', '123456123', 68),
(2, 'home server, st.304,changed for a test', '913333333', 69),
(3, 'Dracula 123 main st.', 'does it accept letters?', 70),
(4, '123 main street', 'letters?', 72),
(5, 'gallifrey', '912123123', 73),
(6, 'MT Local Server, nr 42', '424242424', 1);

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
(56, 'user', 'CScriptBotTester', 'CScriptBotTester', 'CScriptBotTester@stress.pt', '$2y$10$VUDQvcjdhKsARGASapUQYuYXwPmIMdAJBJvB65K12z1W0S9kve8NC'),
(57, 'user', 'CScriptBotTester2', 'CScriptBotTester2', 'CScriptBotTester2@stress.com', '$2y$10$qR4E22feFHxik2ErRY/cz.HRJi5PurLrPNd6FpiJAaowLuTkuoWsS'),
(58, 'user', 'CScriptBotTester3', 'CScriptBotTester3', 'CScriptBotTester3@stress.aol', '$2y$10$kATmqYZJJZig9duBDXvxU.qCDbEu2zMX0Y/Ri3lp0c7O5xpS/86te'),
(59, 'user', 'CScriptBotTester4', 'CScriptBotTester4', 'CScriptBotTester4@gmail.com', '$2y$10$39jCmWuhPLhLosgzIL/qL.mk2dHUPuCv7N9B.9EeKtuUHNfUotO82'),
(60, 'user', 'CScriptBotTester5', 'CScriptBotTester5', 'CScriptBotTester5@gmail.pt', '$2y$10$n81S8R.ASR0rpVXuy.e1Xelf1qS3eZynCaTz0TQ5WYvazpVf51YDu'),
(68, 'user', 'Pedro Pereira', 'Pedro1234Miguel', '123pedro@gmail.com', '$2y$10$TVUThl3HcUl0XMLuAOCViemjeDv14bS3O7kLgxLSY1/6KXaZZxDdO'),
(69, 'user', 'Kali Linux', 'penguin', 'kalitester@gmail.com', '$2y$10$X88Sdav46WXRIro6F6NDIeXvyfrwE8tfZz0Jf5I2ScAmJCvRXnpQy'),
(70, 'user', 'Sir Christopher Lee', 'dracula1', 'dracula1@gmail.com', '$2y$10$hEQ0Wzlg4iU16hJmPKAITO/YgBOCs4FnvucbDyXxk9oR2kleB5Rri'),
(72, 'user', 'Sir Christopher Lee the second', 'dracula2', 'dracula2@gmail.com', '$2y$10$LT7ibYQPfcW5nSB75hhqUOiZpGYZD91BLNFAAynPyoSEp2csJoDF.'),
(73, 'user', 'The Doctor', 'justTheDoctor', 'tardis@gmail.com', '$2y$10$OwKDUTy/0Obm7NnsVLv5CefppM6l4gLZAh/51JKXSzYlaMJE7oco.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
