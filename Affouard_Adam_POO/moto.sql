-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 juin 2023 à 06:30
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moto`
--

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `shop`
--

INSERT INTO `shop` (`id`, `brand`, `model`, `type`, `image`) VALUES
(2, 'Yamaha', 'MT-10', 'Sport', '2023-Yamaha-MT10-EU-Cyan_Storm-Action-004-03.jpg'),
(3, 'Yamaha', 'KTM', 'Enduro', 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fs7g10.scene7.com%2Fis%2Fimage%2Fktm%2F450sxf&tbnid=IyRnN_TN321usM&vet=12ahUKEwidyffcvd__AhVBmicCHRbaDvYQMygBegUIARDnAQ..i&imgrefurl=https%3A%2F%2Fwww.ktm.com%2Ffr-fr.html&docid=kq221Ucq1be35M&w=400&h'),
(4, 'Kawasaki', 'JSP', 'Custom', 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fstorage.kawasaki.eu%2Fpublic%2Fkawasaki.eu%2Fen-EU%2Fmodel%2F21MY_Vulcan_S__BK1_STU.png&tbnid=V6d0RyaKzLzI1M&vet=12ahUKEwiAlLHvvd__AhWZnCcCHQWiBBEQMygAegUIARC5AQ..i&imgrefurl=https%3A%2F%2Fwww.kawasa'),
(5, 'Ducati', 'LSD', 'Roadster', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.redzonemotos.ch%2Fducati%2Froadster-ducati&psig=AOvVaw0dKQZQ0Ev0M6vilTLZ7ipm&ust=1687819052641000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCLi8hY--3_8CFQAAAAAdAAAAABAI');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'aurelien', '$2y$10$5GP.Esc.VeYQifgeKTjqPOAFH2E2J7xLy5WK4JR6rQCgRh.eswzb.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
