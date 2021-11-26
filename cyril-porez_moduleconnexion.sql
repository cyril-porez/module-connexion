-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 nov. 2021 à 10:34
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cyril-porez_moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'boby', 'joe', 'aa', '$2y$10$UmOH2uE9LGsrKIpE.QSZMuTL6J.f1EZkVUY/KlFWJgViYfDCUlG..'),
(26, 'jean', 'a', 'a', '$2y$10$FuA3zCOx76Cu/EPbANr1ruY1SJxcC7XVI3/bT5VE34Uy7JE9iBI96'),
(40, 'ten', 'z', 'z', '$2y$10$Ix7EMmB3z2h.JGQVALfrjuAsMCrDn5JX5MCpO9LwJKzVqsBn4F5ci'),
(11, 'cyril-porez', 'max', 'Porez', '$2y$10$dgridn95TE2NthFREmPZQedAQRbbsxeVxwN6FVvkDvdH3Nx4HGhra'),
(13, 'azerty', 'azerty', 'azerty', '$2y$10$SM1pPzBKyoNV33hUO2b3mezcFg0lG18txcg/Snxiq/YDL3v3V8tw6'),
(14, 'bob25', 'Cyril', 'Porez', '$2y$10$/bn11zr686P1XSGcvPKsMexn.rxjHjBX1vrV6Xsk4Wd3hbD2M.iQy'),
(25, 'babu', 'a', 'a', '$2y$10$DMT209jMKDQ4oj0ohiOHDeL2ck39FCXWAv3CQ.souxUPN4qTvi6Ze'),
(21, 'cyrax', 'cyrus', 'porezus', '$2y$10$bkpGcrR.89DQe/2Tncploe0jURya8vUDANYGDdONcsjmHP4/EsmXe'),
(36, 'cyrilus', 'a', 'a', '$2y$10$Vw5rOhlsfXI7ER0/QP/daOIrKa6s15gWE1IEeQ6xbRbDynWbaD06i'),
(34, 'krilin', 'a', 'a', '$2y$10$kd9OefFfBqyZEOM3a1g.seKPDuaIkMpoS/B9ax.d6luOQJn7KXOaq'),
(19, 'qwerty', 'qer', 'az', '$2y$10$.36v6ageJKvXyrTDDiaj4.0f0v99Dsz3R8bKf0qZl51MdxPZOe4GO'),
(20, 'jojo', 'jotaro', 'jeystar', '$2y$10$YdsltebePSraJfZRhGfwKupPED/lPg3V022DHyqbaZDpq2y7KNuy.'),
(28, 'admin', 'admin', 'admin', '$2y$10$4dZ0JLB0m8S5sTS2Ynqd/.6VEf95YV7cgKcrJCudCYxC1t3ThWjPm'),
(30, 'armin', 'z', 'z', '$2y$10$R9ilYb1yKAB5R/r.GuTnRu1sN.nUJJyRL9SLzTouU1W1IShGP4Kvm'),
(31, 'goku', 'a', 'a', '$2y$10$bHfHirqU0n3EQJrVD550rOjevQF177NJlEeXsoBy7HK1GzT95i5US'),
(32, 'vegeta', 'b', 'b', '$2y$10$0i1NZlKeAt6ZKC1f1BvViOhOJDuXzwXd8T5jGqX0G/GG8aXRcPRR2'),
(41, 'shin', 'q', 'a', '$2y$10$tKw0OpPyRHgKElEekzT5Qectl1NsukEOiSmcnSyGhTinB8OU00zpy'),
(42, 'qt', 'azerty', 'az', '$2y$10$FLc4xwcyVgU9INxB30QZLum/RWbi4cjPLBXeGwjDEVjA8/Ij3l8PC'),
(43, 'ty', 'a', 'a', '$2y$10$/SQx9Whx8QLQTjgn/CMv5.OI2ROkR4AsvjDnWMruLd1.2DiHhevjy'),
(44, 'gogo', 'a', 'z', '$2y$10$/c3KYX2pFvPVhoxZOKyv6.8DpJ.UvetVYK8twuFRrP6t518kJD0rK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
