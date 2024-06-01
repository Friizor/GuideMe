-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 juin 2024 à 00:39
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `guide_me`
--

-- --------------------------------------------------------

--
-- Structure de la table `posttable`
--

CREATE TABLE `posttable` (
  `idUser` varchar(10) NOT NULL,
  `idPost` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `wilaya` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mainPic` varchar(255) NOT NULL,
  `sidePic1` varchar(255) NOT NULL,
  `sidePic2` varchar(255) NOT NULL,
  `sidePic3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posttable`
--

INSERT INTO `posttable` (`idUser`, `idPost`, `title`, `description`, `wilaya`, `category`, `phoneNumber`, `emailAddress`, `address`, `mainPic`, `sidePic1`, `sidePic2`, `sidePic3`) VALUES
('ec0656ae32', '1717280747502407', 'Hot Pot', 'Best Pizza in the world', 'Alger', 'Restaurants', 512412812, 'hotpot@gmail.com', 'Rue hassiba bâtiment 24 n3', 'rest (1).jpg', 'rest (3).jpg', 'rest (2).jpg', 'rest (4).jpg'),
('ec0656ae32', '1717280877248832', 'Polana', 'Are you looking for the perfect one? – You will find it here.', 'Setif', 'Clothing', 551762190, 'polana@gmail.com', 'Rue Elma Block 14 N 4', 'clothe (1).jpg', 'clothe (3).jpg', 'clothe (2).jpg', 'clothe (4).jpg'),
('ec0656ae32', '1717280988059778', 'SidaAli Cosmok', 'Better Product For Bette Exprience', 'Alger', 'Cosmetics', 761787190, 'sidoucos@gmail.com', 'Rue cadix N23', 'cosmetics (2).jpg', 'cosmetics (3).jpg', 'cosmetics (1).jpg', 'cosmetics (4).jpg'),
('ec0656ae32', '1717281379091461', 'Galaxy', 'Better organique Food = better health', 'Boumerdes', 'Grocery', 621432543, 'galaxy@gmail.com', 'Rue 250 logement bâtiment 24 n3', 'grocery.jpg', 'grocery3.jpg', 'grocery2.jpg', 'grocery4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `usertable`
--

CREATE TABLE `usertable` (
  `idUser` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumtext NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `usertable`
--

INSERT INTO `usertable` (`idUser`, `name`, `email`, `password`, `code`, `status`) VALUES
('ec0656ae32', 'Friizor', 'mohamedzaidi768@gmail.com', '$2y$10$/KLRuoF3JpDkMGUhiasOIul8VSBvnqfvVG.Gb9RwXEP8ttftcpmQO', '0', 'verified');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posttable`
--
ALTER TABLE `posttable`
  ADD PRIMARY KEY (`idPost`);

--
-- Index pour la table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
