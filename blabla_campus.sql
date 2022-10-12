-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2022 at 01:26 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blabla_campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id_message` int(11) NOT NULL,
  `type_message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reserver`
--

CREATE TABLE `reserver` (
  `Id_user` int(11) NOT NULL,
  `id_traject` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `validate_reservation` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trajects`
--

CREATE TABLE `trajects` (
  `id_traject` int(11) NOT NULL,
  `timeToTravel` varchar(50) DEFAULT NULL,
  `start_traject` varchar(255) DEFAULT NULL,
  `point1_traject` varchar(255) DEFAULT NULL,
  `point2_traject` varchar(255) DEFAULT NULL,
  `point3_traject` varchar(255) DEFAULT NULL,
  `end_traject` varchar(255) DEFAULT NULL,
  `date_traject` date DEFAULT NULL,
  `hour_traject` time DEFAULT NULL,
  `numberplace_traject` int(11) DEFAULT NULL,
  `placerest_traject` int(11) DEFAULT NULL,
  `Id_user` int(11) NOT NULL,
  `type_traject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trajects`
--

INSERT INTO `trajects` (`id_traject`, `timeToTravel`, `start_traject`, `point1_traject`, `point2_traject`, `point3_traject`, `end_traject`, `date_traject`, `hour_traject`, `numberplace_traject`, `placerest_traject`, `Id_user`, `type_traject`) VALUES
(10, '00:30:00 ', '39600 Arbois, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-10', '08:49:35', 1, 1, 22, 0),
(11, '00:30:00 ', '39600 Arbois, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-10', '08:49:52', 1, 1, 22, 0),
(12, '00:38:00 ', '39100 Dole, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-10', '09:06:09', 1, 1, 22, 0),
(13, '00:40:00 ', '9 Rue Ã‰mile Zola, 39100 Dole, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-10', '09:07:09', 1, 1, 22, 0),
(14, '00:35:00 ', '39600 Arbois, France', '39800 Poligny, France', NULL, NULL, '46.668589,5.553935', '2022-10-10', '09:09:37', 1, 1, 22, 0),
(15, '01:27:00', '39100 Dole, France', '39800 Poligny, France', '39130 Clairvaux-les-Lacs, France', NULL, '46.668589,5.553935', '2022-10-10', '09:38:57', 1, 1, 22, 0),
(16, '01:19:00', '39600 Arbois, France', '39800 Poligny, France', '39130 Clairvaux-les-Lacs, France', '39270 Orgelet, France', '46.668589,5.553935', '2022-10-10', '09:39:31', 1, 1, 22, 0),
(17, '04:13:00', 'Rue du Bourg Neuf, 28270 Laons, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-11', '07:50:41', 1, 1, 22, 0),
(18, '03:34:00', 'Paris, Ile-de-France, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-11', '09:05:20', 1, 1, 22, 1),
(19, '06:31:00', '35120 Dol-de-Bretagne, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-11', '09:24:35', 1, 1, 22, 1),
(20, '00:24:00 ', '39100 Dole, France', '39800 Poligny, France', NULL, NULL, '46.668589,5.553935', '2022-10-12', '08:56:59', 1, 1, 22, 0),
(21, '01:50:00', '39100 Dole, France', '39600 Arbois, France', '39800 Poligny, France', '39130 Clairvaux-les-Lacs, France', '46.668589,5.553935', '2022-10-12', '09:05:05', 1, 1, 22, 0),
(23, '02:27:00', '39000 Lons-le-Saunier, France', '39130 Clairvaux-les-Lacs, France', '39100 Dole, France', NULL, '46.668589,5.553935', '2022-10-12', '11:26:54', 1, 1, 22, 0),
(24, '00:18:00 ', '39000 Lons-le-Saunier, France', '39130 Clairvaux-les-Lacs, France', NULL, NULL, '46.668589,5.553935', '2022-10-12', '11:38:09', 1, 1, 22, 0),
(27, '00:01:00 ', '39000 Lons-le-Saunier, France', NULL, NULL, NULL, '46.668589,5.553935', '2022-10-12', '11:53:20', 1, 1, 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id_user` int(11) NOT NULL,
  `name_user` varchar(50) DEFAULT NULL,
  `username_user` varchar(50) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `bio_user` varchar(255) DEFAULT NULL,
  `img_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id_user`, `name_user`, `username_user`, `password_user`, `email_user`, `bio_user`, `img_user`) VALUES
(22, 'test', 'test', '$2y$10$L9mvejjKzo84Ouq/DVWIZ..w/Mv7bPqGkHh8GHxe5OPtLZHXMygn2', 'antoine.piron@a-piron.fr', 'Ceci est un test3', 'ci0snux8x3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`Id_user`,`id_traject`,`id_message`),
  ADD KEY `id_traject` (`id_traject`),
  ADD KEY `id_message` (`id_message`);

--
-- Indexes for table `trajects`
--
ALTER TABLE `trajects`
  ADD PRIMARY KEY (`id_traject`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trajects`
--
ALTER TABLE `trajects`
  MODIFY `id_traject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `users` (`Id_user`),
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`id_traject`) REFERENCES `trajects` (`id_traject`),
  ADD CONSTRAINT `reserver_ibfk_3` FOREIGN KEY (`id_message`) REFERENCES `mailbox` (`id_message`);

--
-- Constraints for table `trajects`
--
ALTER TABLE `trajects`
  ADD CONSTRAINT `trajects_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `users` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
