-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 16-Fev-2023 às 16:21
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
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clothes`
--

CREATE TABLE `clothes` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clothes`
--

INSERT INTO `clothes` (`id`, `product_name`, `product_id`, `price`, `image_path`, `stock`) VALUES
(1, 'Winter Pink Jumper', 4, '5.99', './images/clothes1.png', 3),
(2, 'Camouflage Jumper', 4, '9.99', './images/clothes2.png', 13),
(3, 'Melon Jumper0', 4, '5.99', './images/clothes3.png', 14),
(4, 'Festive Cloaks11', 4, '5.99', './images/clothes4.png', 16);

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
(27, 84, '$2y$10$raxgvLGU.NZHFCYpHPF6i.24VJK3kwDEaNHNM2EAW/QqM5Wnr.kai', '$2y$10$5aT96Sz6qEG1z6Q1aODdY.waFc2ilPSeE.F4TDwJBXquynWrwAmjG', '$2y$10$hXfVE5D197J.AXqH7UXXlugbcWmcsCeYc1xVEjcanJA7dTn7k4AHm'),
(28, 84, '$2y$10$raxgvLGU.NZHFCYpHPF6i.24VJK3kwDEaNHNM2EAW/QqM5Wnr.kai', '$2y$10$5aT96Sz6qEG1z6Q1aODdY.waFc2ilPSeE.F4TDwJBXquynWrwAmjG', '$2y$10$hXfVE5D197J.AXqH7UXXlugbcWmcsCeYc1xVEjcanJA7dTn7k4AHm'),
(29, 84, '$2y$10$raxgvLGU.NZHFCYpHPF6i.24VJK3kwDEaNHNM2EAW/QqM5Wnr.kai', '$2y$10$5aT96Sz6qEG1z6Q1aODdY.waFc2ilPSeE.F4TDwJBXquynWrwAmjG', '$2y$10$hXfVE5D197J.AXqH7UXXlugbcWmcsCeYc1xVEjcanJA7dTn7k4AHm'),
(30, 84, '$2y$10$raxgvLGU.NZHFCYpHPF6i.24VJK3kwDEaNHNM2EAW/QqM5Wnr.kai', '$2y$10$5aT96Sz6qEG1z6Q1aODdY.waFc2ilPSeE.F4TDwJBXquynWrwAmjG', '$2y$10$hXfVE5D197J.AXqH7UXXlugbcWmcsCeYc1xVEjcanJA7dTn7k4AHm'),
(31, 85, '$2y$10$iq9OmI65WpCJarUmVwAj5.s3bUVHG7m/Rf5/5pVTx69vIq1wFT36e', '$2y$10$BSmp2SnMjJ0hdyc0D3xSX.BHFsUxVz95/Z0F9lJ24DTIp826NemiG', '$2y$10$mF42IsqhgVqOCxL/uaewT.kaynogl.9atloYb16xkO2h1l/9mMZa.'),
(33, 86, '$2y$10$IxflAeNd1KvLCEWN211rceK4APHXD30xNDsJ3v5aiBNTbYACHkqNa', '$2y$10$.FIurE8iKEZ0IVnHie5iN.Hihwm36u6afTEhyMX.zwp5Lo2yEcbee', '$2y$10$hpPNFVUSo7.E/1xjMHdYaek3htFCEV4DEsu4ocqg7uJ3OGKNHu6SC'),
(34, 87, '$2y$10$64/u8EsdJWTFiLlN31HtN.ajh59/6T/zcF.cwk0npFI7wgQJcehpu', '$2y$10$Le6x0zD5vsTPZ5GhmrCopuo7VhyXldBEDkRERaz4ARSiEyiVL04cu', '$2y$10$QZQCk4lna6t24hexHVyFNOD4QbbvqdUVBEGksa94HAFtDVb/zmKKq'),
(35, 87, '$2y$10$oW2e2FolGrqyh613kVCDgOk6R9kM1hO3173n0v4nOl7eOsny0EN.K', '$2y$10$YOWOiuB1K1qV5LudqwPFXOq1XjbKv/RBqczMCXocYDda7x9bZ718a', '$2y$10$bs7yrzkPTcVzDcIj7cShleX1SMHO/xc8.u6XH2sTjP8QChYIOB7K6'),
(36, 1, '$2y$10$xSawqc8Db.pDgpHVhXb4LensPJFGulkCMHnAspgL.gYVl3rwlMN4q', '$2y$10$VB14IYSKo4glHnnbEXET6OoVfRnxglQo0sbRB0Fmjkp48P.Vx6iTy', '$2y$10$ejCtutXl00/f.p90do3WAOfsETcsgmr6ZwiAdUePu6AtWV860sri2'),
(37, 1, '$2y$10$0M0lEk2U.5pIf3/CxDmzjeb7sifuHs3SRo1F8eel7.gu3NNdT7Wji', '$2y$10$5.UJ2zD9iPRwBeBIl7DR2OR65jNRfbpSNSiKwqZ3x0g3mCF0O6U8i', '$2y$10$8R3M2UcculSCQTXUno9BKuLc2iP/mJMgvVOUIP6HO9DpjJ1RE5Zvu'),
(38, 1, '$2y$10$cEuaAvWI3h/919D03Xb9tewdUTW0aiYzY80D9x/bOYSDqrupjs.oq', '$2y$10$2USAVhrtKoRgAoltPkv9E.5OQ/XZHs1RzMZlwIPSI5kmR/wfHhVJO', '$2y$10$9fEHzdUgQKuYb.foZ1U.Aurwr6Ra4w4QY1uFQ2ZaACi2DgUboVlAS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT 2,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `food`
--

INSERT INTO `food` (`id`, `product_name`, `product_id`, `price`, `image_path`, `stock`) VALUES
(1, 'Pet Head Shampoo Orange Scent modd12', 2, '5.99', './images/food1.png', 3),
(2, 'Smilla Diet with beef13', 2, '52.99', './images/food2.png', 31),
(3, 'Concept for life Urinary with chicken14', 2, '35.99', './images/food3.png', 99),
(4, 'Concept for Life Hypo Allergenic16', 2, '55.99', './images/food4.png', 55),
(8, 'Is food add test working1', 2, '21.00', './images/food2.png', 123),
(9, 'Is food add test working2', 2, '21.00', './images/food2.png', 123),
(10, 'Is food add test working3', 2, '55.00', './images/food4.png', 76),
(11, 'Is food add test working7', 2, '12.00', './images/food1.png', 98);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hygiene`
--

CREATE TABLE `hygiene` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `hygiene`
--

INSERT INTO `hygiene` (`id`, `product_name`, `product_id`, `price`, `image_path`, `stock`) VALUES
(1, 'Mudado 4', 1, '15.99', './images/hygiene1.png', 66),
(2, 'Pet Head Shampoo Peach Scent  modded', 1, '6.99', './images/hygiene2.png', 547),
(3, 'Pet Head Shampoo Pear Scent ', 1, '55.99', './images/hygiene3.png', 0),
(4, 'Pet Head Dry Shampoo Coconut Scent', 1, '82.99', './images/hygiene4.png', 22);

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
(8, 16, 95.84, 77),
(17, 8, 47.92, 78),
(19, 8, 47.92, 78),
(20, 8, 47.92, 78),
(21, 8, 47.92, 78),
(26, 5, 29.95, 78),
(38, 5, 38.95, 78),
(39, 17, 101.83, 78),
(40, 78, 467.22, 68),
(41, 78, 467.22, 68),
(42, 4, 23.96, 81),
(43, 4, 23.96, 81),
(44, 16, 95.84, 81),
(45, 10, 62.9, 84),
(52, 88, 527.12, 1),
(65, 33, 197.67, 1),
(66, 66, 395.34, 1),
(69, 198, 1186.02, 1),
(72, 330, 6376.7, 1),
(73, 11, 98.89, 1),
(77, 2, 105.98, 1),
(79, 99, 593.01, 1),
(80, 3, 17.97, 1),
(81, 33, 197.67, 1),
(101, 14, 168.89, 84),
(102, 27, 431.73, 1),
(103, 33, 1847.67, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `birthday` date NOT NULL DEFAULT '1970-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `personal_info`
--

INSERT INTO `personal_info` (`id`, `address`, `phone_number`, `user_id`, `birthday`) VALUES
(1, 'Lixbuna, rua do teste nr 56,Travessa 5', '123456123', 68, '1970-01-01'),
(2, 'home server, st.304,changed for a test', '913333333', 69, '1970-01-01'),
(3, 'Dracula 123 main st.', 'does it accept letters?', 70, '1970-01-01'),
(4, '123 main street', 'letters?', 72, '1970-01-01'),
(5, 'gallifrey', '912123123', 73, '1970-01-01'),
(6, 'MT Local Server, nr 42', '424242424', 1, '1970-01-01'),
(7, 'Artic st Nicol', '913112312', 75, '1970-01-01'),
(8, 'tester123123123', '123456789', 76, '1970-01-01'),
(9, 'C#BotStress@gmail.com', '123123123', 77, '1970-01-01'),
(10, 'Rua do teste, numero 000', '914266364', 78, '1970-01-01'),
(11, 'C#BotStress@gmail.com', '123123123', 79, '1970-01-01'),
(12, '12changed for a test', '123123123', 80, '1970-01-01'),
(13, 'Jon Smith Streets changed 9', '91426364', 81, '1970-01-01'),
(14, 'Rua do porto', '914475858', 84, '1970-01-01'),
(15, 'bot lane cpu street', '914637370', 85, '1970-01-01'),
(16, 'lane teste', '914393902', 86, '1970-01-01'),
(17, 'botlane', '914749593', 87, '1970-01-01'),
(18, 'Im Street Bot Test Auto', '91426364', 90, '2000-05-11'),
(19, 'Im Street Bot Test Auto', '91426364', 91, '2023-02-02'),
(20, 'Rua do teste, numero 000', '914475858', 95, '2023-02-02'),
(21, 'Im Street Bot Test Auto', '914475858', 97, '2017-06-01'),
(22, 'Im Street Bot Test Auto', '91472679', 98, '2000-02-17');

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
-- Estrutura da tabela `toys`
--

CREATE TABLE `toys` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 5.99,
  `image_path` varchar(255) NOT NULL,
  `stock` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `toys`
--

INSERT INTO `toys` (`id`, `product_name`, `product_id`, `price`, `image_path`, `stock`) VALUES
(1, 'Cat toy', 3, '5.99', './images/toys1.png', 3),
(2, 'Squeeky cheese5', 3, '5.99', './images/toys2.png', 99),
(3, 'Ball with bell', 3, '8.99', './images/toys3.png', 99),
(4, 'Chase ball with a bell', 3, '5.99', './images/toys4.png', 99);

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
(84, 'user', 'Bot Smith The Second', 'C#BotStress2', 'C#BotStress2@gmail.com', '$2y$10$C6Sp9s6CwNfeY.UO45fA3OwuFN7Rny.Spq7X15WxyTTfibtflVNA2'),
(85, 'user', 'Test User Bot Generated', 'bottester1', 'bottester1@gmail.com', '$2y$10$7.glWtiiR3VOzxZQXZ/fmOEFFXlYwXE79BhArww2iF2cHcPRC5YY2'),
(86, 'user', 'Bot Test 3', 'bottester3', 'bottester3@gmail.com', '$2y$10$rVa9QkJXrHZW44f4oLepRODB1cH8RW7nFhDde3q2NNfTixjgPkuHO'),
(87, 'user', 'C#BotStress5', 'cbot', 'bottester4@gmail.com', '$2y$10$Q.c8nrcK36ANd8qNeMd1/OB.8X7YZA1S7rKhArees5Qv4fkr9GGCm'),
(88, 'user', 'John Smith The Smithiest', 'mrSmithers', 'Smithiest@gmail.com', '$2y$10$bN3qZw7K./N7IYDEddRZquP0aNUZk8DS1tLeBtvs1SxwcPNPRTZUW'),
(90, 'user', 'Sir Christopher Lee the second Thirds', 'mrSmitherss', 'mrSmithers@gmail.com', '$2y$10$M54VnhLZJwewFhjWMgZhbuzCNEyEwQqTrLTiKJD2BH9vny4ApLQFa'),
(91, 'user', 'testestessssssss', 'mrssssSmithers', 'mrssssSmithers@gmail.com', '$2y$10$CaZHFcnee4OegNEHRJ9Fvud1gFOc9lvEZb6.Dj7bARmwk4fVbCPYm'),
(95, 'user', 'wwwwwwwwwwwww', 'mrsssfsfdsdsSmithers', 'ww@gmail.com', '$2y$10$Qqj.s7PNtB0YdDeXDsAqSuRS47U2WOCAcCjtri0943PyRsi7skIbu'),
(97, 'user', 'Tester Ive lost counts', 'mrsssfaadsadsadsdsdsSmithers', 'fdsfs@gmai.com', '$2y$10$6B59Z0xW5UnsQb9o4jNAp.Rom85wYHdGNI7LzFzPU.r7HNDNuPk26'),
(98, 'user', 'Pedro Miguel Pereira', 'fsdfdsfsdfsdsdfds', 'pedrogmh@gmail.com', '$2y$10$SPYC2GebjJV.tb4uLlWHQuoZXmH6RTX2Ip2dB7ntD7/rNZcfdMPce');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

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
-- Limitadores para a tabela `toys`
--
ALTER TABLE `toys`
  ADD CONSTRAINT `toys_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
