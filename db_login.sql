-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 08-Fev-2023 às 15:45
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `product_name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`product_name`, `id`, `product_id`, `user_id`, `quantity`) VALUES
('Pet Head Shampoo Orange Scent', 569, 1, 84, 99),
('Pet Head Shampoo Peach Scent', 570, 1, 84, 1),
('Smilla Diet with beef', 627, 2, 1, 99),
('Pet Head Shampoo Orange Scent', 628, 1, 77, 99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clothes`
--

CREATE TABLE `clothes` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clothes`
--

INSERT INTO `clothes` (`id`, `product_name`, `product_id`, `price`, `image_path`) VALUES
(1, 'Winter Jumper', 4, '5.99', './images/clothes1.png'),
(2, 'Camouflage Jumper', 4, '9.99', './images/clothes2.png'),
(3, 'Melon Jumper', 4, '5.99', './images/clothes3.png'),
(4, 'Festive Cloaks', 4, '5.99', './images/clothes4.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `credit_card`
--

CREATE TABLE `credit_card` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `expiry_date` varchar(100) NOT NULL,
  `cvv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `credit_card`
--

INSERT INTO `credit_card` (`id`, `user_id`, `card_number`, `expiry_date`, `cvv`) VALUES
(4, 80, '$2y$10$cDodG8Wc7vKXzwebJGZTXOBABsNRDsIgWCFjtUpBZDk5YHvdyZC7i', '$2y$10$2iWaVD27h8nsVF.EMfGKAuAigzdb7upePn1SFs.nMaCr8sIbuY0YS', '$2y$10$XTDB7wgLX1C2rDKVCB8OR.XMDF7oet1W6NDEW/uzAvQiIo/DlqHvq'),
(5, 80, '$2y$10$4/z/Ew0tocNAM9APQHYciekxo.nKv9M9AcsYKaqrThazAeW0JOtBO', '$2y$10$mJfsAN4HQcaQG2NSQKmNDuKM3mPMFRwro3SXl/vb4FD4igfC/b/ku', '$2y$10$cz56C.el0Hl8OOJ7rJYs4Oot.VZHWVabc8jr3Y59B.JpxkOFRJJBe'),
(6, 68, '$2y$10$ckGmlidcpvdkEc0uMdvJyeLftjKwncTIic5oxjKWKIzs3CoNhqPbC', '$2y$10$OiRZviysH0vcUc6k6Uuieus/djgeeGwiEq9rISiwBtQRnUHA2l3fG', '$2y$10$xMdRmOZJdU4t28puLMhV6Oe.0u/XKU.m2vKkp5Um6kgZN4i0kGJXC'),
(7, 68, '$2y$10$RlTGZVk6Rt0yUU8MPKvc1O7/oHwhB7FJH54xvxGCiaS3vfSNSNohm', '$2y$10$azIz.7c263XQBZ0lw/xLCuAn68sMHK/I4jh0nMFlaivJgNd2iFCpC', '$2y$10$QlA/LhvmoNUhiK8OkAGDJeVy6GPSf6CRqc4mncfUZuTm/h9JI6mGu'),
(8, 68, '$2y$10$xwCceZiVYxSj0OQGlNt6Ne6uhc.QH8A49yegIehkIoBcQXye3FJ5G', '$2y$10$8s6OehoMJUZ3XM3/NfW.Pe92LNEkDzC19mgfoWRgHQhX2XDMUEZEi', '$2y$10$sifLuLZXTIk/chipj/EmYOR0DGF9z4jolreTl8pFtLv9kWGokFMfG'),
(9, 68, '$2y$10$MAjnVXbMqwY2QPW6Ic6l0eJAWyVVtI97Qxo2WhtetyxR1hLwHS1ii', '$2y$10$1DUpPv0NH4gpYsPO/Xs2tONaEaW7knABgHzbYbfuQKYJV7yHZthli', '$2y$10$Do39OeqD8BKtsJpNwrU5Fut04kDZ5UQ5PtFXLF9y6K4ONY7EhR7eq'),
(10, 68, '$2y$10$lbt3xbvTfuuXr96TMelcp.ZqWNKneet3cp14qTYUahV8bexF7UPIq', '$2y$10$9EomiylOpjrxMbml1pU55eR1PebnrGmhwkWQOyfmFu/HiPWw7RFCa', '$2y$10$SfEwss7UX93RuOY8SIPjbOYe7QowqZSznZT3n5A1Y3VUGMXiE/dAa'),
(11, 68, '$2y$10$d4x4ZuVwHj1mQoabMb8nWugDdFJ9zHn0xYsrOyYd69GF1aoGI0GaO', '$2y$10$LcYoS.USNQvOGHPtIa/H9O2024EBuNOmSQjUy6zDSEnOE4lV682R.', '$2y$10$jYBfu9aMCHZAR.7X3Q8GhurKMCkE40zzzCBGBJG5RkVC8pERRCeQm'),
(12, 68, '$2y$10$/GABK/jrsz5rpA0l1.MebuZD7LZgfQSO4ZMLLKYEQoI6UQYJDGqYO', '$2y$10$lBgC.379nWGexys7Dlgb5u5uaMvn8Emk54isaznerISNb.Z2stlg.', '$2y$10$VIMw00/eF/Z5X2NUP.fhiOB5Gvm0ZASmy6voAYDfjvbTw241gvhk.'),
(13, 68, '$2y$10$jvmJR6LhiatkCwrk9wdWnOhqOZuU7uY2rMM2hN91L4MFLhLbt90JC', '$2y$10$1hNt9TUP3vnIXYwlJwkGge61cZZeG2TqA/CmMefCjl8zVR9gurPye', '$2y$10$W7dLZFYBqJrJbhxrsjqVr.ASXm.qslinIPFHmh5PpuCX/fy3bJIzC'),
(14, 68, '$2y$10$lbx8MLjH33Y9P0FxT3hSxuQV6A72OTltIEoCl3bJ/2Q7DVuhb57um', '$2y$10$ZrXrqdm.Nxk.ymwzSZB8/OCVYSwpCpHeFACl.KKfLrGMw/H/rj0K2', '$2y$10$oAJmid.UZKqURZChsH7TxevCSkaNMvxL3rfydOIt0zJk2xjpjnC9.'),
(15, 68, '$2y$10$FMOvxYJTyAUVCQKe0nue3Oy8O/z02tnGaohUyBnhvoUOQFxdNhoIW', '$2y$10$LjRpCO54sZYLnIWNh/QlB.t8SRTcGl2FMu2B/VYlkKy5r7ldKZjUC', '$2y$10$FiuwJN8JZGUaO.lZLWk5FeapQr642Cwqi7EJdQjhFensUJaWiJ/.O'),
(16, 68, '$2y$10$sVtobsecpBFD9./ehIczb.shjMjm.4VRwvb/XR82cyxjVzKcVozOO', '$2y$10$2Es2WeDOo0K.7KqkjudZuu1Pqk1Bxqlfmn2u.5pC9zhnxsEFJ1CeS', '$2y$10$aBYkW72N1ZFJm2z.lwppFOznMFQqlpfHua3uDGLOYTX18pZnx0I6e'),
(17, 68, '$2y$10$FRKYRqSnOvN0aWcyA2ni4ehsVXx7X7GnlqLASbaOiwF8pY/.QCZNS', '$2y$10$yr4kxEphDrLHxtRDXAUSdOPRn7cvpiY9yjZtEzox6rElZcBmV8A1S', '$2y$10$HPIC.zXslhW5ucmbMbNTve44PW9iLDwVPNveX.hxx/dWYGnAUedE.'),
(18, 68, '$2y$10$HY8Qw/VaWfIoOKhPf8mMeuCMulvIM3dw2zyxUZsPXgvcztUV0sLou', '$2y$10$2R3raq4lKsK.EptjdEYCx.fLt/D9fgifBLCtvBkidfb5v8q.7RI8.', '$2y$10$UdSrFEG2.S4X8xSIA5tO5uQgKjOrJokL1FlhHzuH4KYAvjFx2osUS'),
(19, 68, '$2y$10$bSt0NV7Hy0ucEYPy35gDuODqviWel3YKGklVj5QQ3mj8wfoTMAxKe', '$2y$10$ffqze/F7dvDe54af8Fy/x.d95bMnb9xFiBUEexIBvmcQbbOx2ssWC', '$2y$10$6tH81XDpC9qyHBkROI69tuNLm8dHQulhGgMmluqh.IVccuVJjh08.'),
(20, 68, '$2y$10$uRqrjbYKZCizarTHb6y3kOcInbBrpl3TOCsoBhUnV5BV991lf40nS', '$2y$10$4skvDW5jkgdVtTrTNlt0i.zh8skXXhD56ia5tROUXOjuLGPHAwtEC', '$2y$10$ctG1cxG/TweuabmRxtbZZ.7prrqxIK2l/JFYIVqTUe7WB7VVylYA2'),
(21, 68, '$2y$10$YsluNOYgD9.3liBxK1LMvOAxB7wljs6xU6hcTcoVmX4YYsUri2xzi', '$2y$10$8/0PnkXPs5ss1JfsWAoAeusdYWxfIkW3qPMhrA3CsGIcu.gOdEmDe', '$2y$10$3Zq2.0yTTdS98KNMpiTSz.aHCzgB59ujTF4Pjxh3lulzQH3bPV5K6'),
(22, 68, '$2y$10$AZFJUgDuyGNwOqT8SYZVKejX6KuIFLs/ZR.0VeDMLAmkInVBev/LK', '$2y$10$5Bt2hAuq2NpDtiMGhWX5duG0o0VO3LCA3ook.K7KHTC2KsMYRekRy', '$2y$10$M.7zrcbmVtEnIgy47IaAFeT6j3rXXzVzNigtRDsGngi51PYXGsQru'),
(23, 68, '$2y$10$WyykEzgl1oN97Lj885ATR.BLiWA1eaEpZuF.yYvqLAGo2aDEEhtuC', '$2y$10$DGv0YoPO56X3qjnt20MUlOvFvFbYeltFweJ1kJJNPvGB2CGrc5m0.', '$2y$10$OxnssxRZkbYpT3HKO8p.vu1LeCxYpJfHjSdcF5Nmc1Hy7AdN9gjqe'),
(24, 81, '$2y$10$MYvUODFQbAAkulFDSSVaxOG.rJ.GAghc1ZT5m3Rz.B7UROSA6Fjhq', '$2y$10$.Ogk0je9A89rf7DeEtURC.LHQ.11gvG8bVCLB3N31KQRZhFYEOu2C', '$2y$10$omqukkndA/jSrqRvBpmFxO43Ur.BrQ25gM3mz02.tZRmHdF2D.3mu'),
(25, 81, '$2y$10$h/wN.dvdN8x91bQ3weLAcOuYvIIo/d7O5I/CdGE55EWl8pDGbP93W', '$2y$10$zTnBiMZcBsmamJnScTiRjuXk3AQlNrV8Dqs7c7ESWQ2lZuhC8FJPm', '$2y$10$GslDp8C3lJFwScqiu484aeg6SeBRL9D45MGzhsTMgwWL2CebFlljy'),
(26, 81, '$2y$10$jNHB4CUHJZLcWvou42Rzf.zni.SlP.EZ0BAi2swPTq887LF.kmGr6', '$2y$10$b.WI2glY8k.QaBrDS9kuWe0Q7hq9BWQWPWaiJif3BaGqUrsnFAnLe', '$2y$10$RjLT4n6ZwYVcnzypGrO3led.0FGN7Xd65/rgPnWwOwsOY.XRBXwIS'),
(27, 84, '$2y$10$yzrwO4hYzC86rWaaXdN/.uOkw.NpTiqU.4UQEnoB1tQlERp8lyINu', '$2y$10$fUfM9GbSHp60QAdAXDZJvuU1FoPwpiSR7LDzsqtqoefzqTU1rJT4m', '$2y$10$o/FrCzceEdiHTiltNgQNiu1IdXKIM/Ja1eRVB1p2BWrZ1BZ7/bwaO'),
(28, 84, '$2y$10$Efr7yLoJNO1NWH0vZM6zPew2Gqo.Dngv/uXO56d.mPAzjdT8jz0qq', '$2y$10$uBgNVRhj3l.MyUh/6KQtv.0gU9v4aDNfzJFlTqaOKphoeaC7vDypG', '$2y$10$QA.BwCgsLSVvrE/s400ypu6j6ANIaPdeOUqtOK/WLGzUvob/F8o/W'),
(29, 84, '$2y$10$Vknn7.1g2ekk9TlkiVULku3c2NxGdJlSIz1V/Exu5WvZCBHFqJbIa', '$2y$10$iUEkZsjk/Rak/5AKSdaXc.RoFVddjeNOzOBimidxTmExoaiostGt2', '$2y$10$4jlUfvUzQW/2jw/w1mTbu.wOe3jsknis0anXgm.SL/ZW122JytPO.'),
(30, 84, '$2y$10$xIdhZ26Wat8EQS3abjUi1eqp91RLsJliylXA1crrfIXJn4YhbGWSm', '$2y$10$S2f.2xfGb7m8tJT9lt/ururVgu/Pf94EE5c9lKVqdDKD.cLX8nxIi', '$2y$10$ARsjVWl/H5o0zjqWZ97DD.meifQAhXf22LLzd53WlyBwt/TlLDMb.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `food`
--

INSERT INTO `food` (`id`, `product_name`, `product_id`, `price`, `image_path`) VALUES
(1, 'Purina ONE with chicken', 2, '5.99', './images/food1.png'),
(2, 'Smilla Diet with beef', 2, '5.99', './images/food2.png'),
(3, 'Concept for life Urinary with chicken', 2, '5.99', './images/food3.png'),
(4, 'Concept for Life Hypo Allergenic', 2, '5.99', './images/food4.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hygiene`
--

CREATE TABLE `hygiene` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `hygiene`
--

INSERT INTO `hygiene` (`id`, `product_name`, `product_id`, `price`, `image_path`) VALUES
(1, 'Pet Head Shampoo Orange Scent', 1, '5.99', './images/hygiene1.png'),
(2, 'Pet Head Shampoo Peach Scent', 1, '6.99', './images/hygiene2.png'),
(3, 'Pet Head Shampoo Pear Scent', 1, '5.99', './images/hygiene3.png'),
(4, 'Pet Head Dry Shampoo Coconut Scent', 1, '8.99', './images/hygiene4.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `order_history`
--

INSERT INTO `order_history` (`id`, `quantity`, `payment`, `user_id`) VALUES
(6, 16, 0, 77),
(7, 16, 95.84, 77),
(8, 16, 95.84, 77),
(9, 27, 161.73, 77),
(10, 0, 0, 77),
(11, 0, 0, 77),
(12, 0, 0, 68),
(13, 12, 74.88, 78),
(14, 13, 80.87, 78),
(15, 19, 116.81, 78),
(16, 19, 116.81, 78),
(17, 8, 47.92, 78),
(18, 8, 47.92, 78),
(19, 8, 47.92, 78),
(20, 8, 47.92, 78),
(21, 8, 47.92, 78),
(22, 8, 47.92, 78),
(23, 8, 47.92, 78),
(24, 8, 47.92, 78),
(25, 0, 0, 78),
(26, 5, 29.95, 78),
(27, 5, 29.95, 78),
(28, 5, 29.95, 78),
(29, 5, 29.95, 78),
(30, 5, 29.95, 78),
(31, 6, 35.94, 78),
(32, 6, 35.94, 78),
(33, 6, 35.94, 78),
(34, 6, 35.94, 78),
(35, 6, 35.94, 78),
(36, 6, 35.94, 78),
(37, 0, 0, 78),
(38, 5, 38.95, 78),
(39, 17, 101.83, 78),
(40, 78, 467.22, 68),
(41, 78, 467.22, 68),
(42, 4, 23.96, 81),
(43, 4, 23.96, 81),
(44, 16, 95.84, 81),
(45, 10, 62.9, 84),
(46, 99, 593.01, 1),
(47, 99, 593.01, 1),
(48, 99, 593.01, 1),
(49, 99, 593.01, 1),
(50, 99, 593.01, 1),
(51, 88, 527.12, 1),
(52, 88, 527.12, 1),
(53, 99, 593.01, 1),
(54, 99, 593.01, 1),
(55, 99, 593.01, 1),
(56, 33, 197.67, 1),
(57, 16, 95.84, 1),
(58, 99, 593.01, 1),
(59, 0, 0, 1),
(60, 0, 0, 1),
(61, 99, 593.01, 1),
(62, 99, 593.01, 1),
(63, 33, 197.67, 1),
(64, 33, 197.67, 1),
(65, 33, 197.67, 1),
(66, 66, 395.34, 1),
(67, 99, 593.01, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `personal_info`
--

INSERT INTO `personal_info` (`id`, `address`, `phone_number`, `user_id`) VALUES
(1, 'Lixbuna, rua do teste nr 56,Travessa 5', '123456123', 68),
(2, 'home server, st.304,changed for a test', '913333333', 69),
(3, 'Dracula 123 main st.', 'does it accept letters?', 70),
(4, '123 main street', 'letters?', 72),
(5, 'gallifrey', '912123123', 73),
(6, 'MT Local Server, nr 42', '424242424', 1),
(7, 'Artic st Nicol', '913112312', 75),
(8, 'tester123123123', '123456789', 76),
(9, 'C#BotStress@gmail.com', '123123123', 77),
(10, 'Rua do teste, numero 000', '914266364', 78),
(11, 'C#BotStress@gmail.com', '123123123', 79),
(12, '12changed for a test', '123123123', 80),
(13, 'Jon Smith Streets changed 9', '91426364', 81),
(14, 'Adress Update', '914475858', 84);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `category`) VALUES
(1, 'Hygiene'),
(2, 'Food'),
(3, 'Toys'),
(4, 'Clothes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_table` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`id`, `item_id`, `item_table`, `quantity`) VALUES
(1, 1, 'food', 4),
(2, 2, 'food', 444),
(3, 3, 'food', 83),
(4, 4, 'food', 44),
(5, 1, 'toys', 99),
(6, 2, 'toys', 99),
(7, 3, 'toys', 99),
(8, 4, 'toys', 99),
(9, 1, 'hygiene', 99),
(10, 2, 'hygiene', 99),
(11, 3, 'hygiene', 99),
(12, 4, 'hygiene', 99),
(13, 1, 'clothes', 99),
(14, 2, 'clothes', 99),
(15, 3, 'clothes', 99),
(16, 4, 'clothes', 99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `toys`
--

CREATE TABLE `toys` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `toys`
--

INSERT INTO `toys` (`id`, `product_name`, `product_id`, `price`, `image_path`) VALUES
(1, 'Squeeky wild mouse', 3, '5.99', './images/toys1.png'),
(2, 'Squeeky cheese', 3, '5.99', './images/toys2.png'),
(3, 'Ball with bell', 3, '8.99', './images/toys3.png'),
(4, 'Chase ball with a bell', 3, '5.99', './images/toys4.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
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
-- Extraindo dados da tabela `user`
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
(73, 'user', 'The Doctor', 'justTheDoctor', 'tardis@gmail.com', '$2y$10$OwKDUTy/0Obm7NnsVLv5CefppM6l4gLZAh/51JKXSzYlaMJE7oco.'),
(75, 'user', 'Linux The Penguin ', 'Penguin2', 'penguin@gmail.com', '$2y$10$HfQFoTPGx6nlUKr9CrB.MOnbjLC6zrild90zPHT6A3sPbORGgpUQ2'),
(76, 'user', 'Testing123123', 'Tester123123', 'tester123123123@gmail.com', '$2y$10$P5adCDcRQSdbtbpG4U3UoOImVopteurzXF61FOOLQW99Br5fcxjwC'),
(77, 'user', 'C#BotStress', 'C#BotStress', 'C#BotStress@gmail.com', '$2y$10$kloQI1mQjK8OzTbvLcpiXu/CI.xRx0OtHsPrGZ..mix1KFRmJ7Ija'),
(78, 'user', 'Pedro Miguel', 'gallyfr', 'galifrey@gmail.com', '$2y$10$MFKSFABLxzrbzKdqC1MlP.bLFnBWQxJc1Wuc4qkInq/QhYNBoa/be'),
(79, 'user', 'RXGPU AMD', 'thisistheuser', 'amd@gmail.com', '$2y$10$2SBhh.O6axkvpOjj4LGOROyy4Bn8fv9CzxDabMqsfCzHUPoP1KKEC'),
(80, 'user', 'Full Name Test', 'UserTest', 'usertest@gmail.com', '$2y$10$x/WuIQ04XujhJ3GiUABGV.BbOs2rTJdX236S0DLu/9AW4CzXA.cvu'),
(81, 'user', 'John Smith', 'smithjon', 'smithjon@gmail.com', '$2y$10$pq/Icaj5NO8aMgkaENORb.2MbyA6xnyhtUcry0vMn/IsHM2h05r6i'),
(84, 'user', 'C#BotStress', 'C#BotStress2', 'C#BotStress2@gmail.com', '$2y$10$C6Sp9s6CwNfeY.UO45fA3OwuFN7Rny.Spq7X15WxyTTfibtflVNA2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices para tabela `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices para tabela `hygiene`
--
ALTER TABLE `hygiene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices para tabela `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Índices para tabela `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=629;

--
-- AUTO_INCREMENT de tabela `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `hygiene`
--
ALTER TABLE `hygiene`
  ADD CONSTRAINT `hygiene_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `personal_info`
--
ALTER TABLE `personal_info`
  ADD CONSTRAINT `personal_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `toys` (`id`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `hygiene` (`id`),
  ADD CONSTRAINT `stock_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `clothes` (`id`);

--
-- Limitadores para a tabela `toys`
--
ALTER TABLE `toys`
  ADD CONSTRAINT `toys_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
