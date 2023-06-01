-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 juin 2023 à 17:41
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionscolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `NomEt` char(50) DEFAULT NULL,
  `PrenomEt` char(60) DEFAULT NULL,
  `DateNaissEt` date DEFAULT NULL,
  `LieuNaissEt` char(60) DEFAULT NULL,
  `Nationalite` char(60) DEFAULT NULL,
  `Sexe` char(10) DEFAULT NULL,
  `NomPere` char(50) DEFAULT NULL,
  `NomMere` char(50) DEFAULT NULL,
  `Adresse` varchar(40) DEFAULT NULL,
  `NumTel` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Filiere` varchar(10) DEFAULT NULL,
  `Niveau` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `NomEt`, `PrenomEt`, `DateNaissEt`, `LieuNaissEt`, `Nationalite`, `Sexe`, `NomPere`, `NomMere`, `Adresse`, `NumTel`, `Email`, `Filiere`, `Niveau`) VALUES
(34, 'MAXIM', 'Lerou', '2023-04-20', 'Mandritsara', 'Etranger', 'Femme', 'Tahina TSARATSIRY', 'Afjaly Asim', 'Ranomafana', '2561654', 'sda@gmail.com', 'RPM', 'L2'),
(35, 'TAXA', 'Paxa', '2023-03-29', 'qsdfqsdf', 'Etranger', 'Homme', 'Tahina TSARATSIRY', 'srfhdsf', 'Ranomafana', '5464654', 'sda@gmail.com', 'RPM', 'M1'),
(45, 'MAMI', 'Lalaina', '2023-04-13', 'qsdfqsdf', 'Malagasy', 'Homme', 'Mamilalaina RAHARIVONY', 'Afjaly Asim', 'Antanifotsy', '545454', 'joelthegentle@gmail.com', 'DA2I', 'L2'),
(48, 'YAX TAXIMATION', 'Yax', '2023-04-05', 'qsdfqsdf', 'Malagasy', 'Homme', 'Bogila TAXIAS', 'qsdfqsdf', 'Antanifotsy', '545454', 'joelthegentle@gmail.com', 'RPM', 'M1'),
(49, 'FIDERANA', 'Nambinintsoa', '2023-04-17', 'Tana', 'Malagasy', 'Homme', 'dskhgdqsfg', 'kjsdgjdk', 'tana', '03255584', 'jsqidf@gmail.com', 'DA2I', 'L2'),
(54, 'RAHARIVONY', 'Dinalalaina', '2023-05-25', 'Fianarantsoa', 'Malagasy', 'Femme', 'Rahary', 'Harimanana', 'Antanifotsy IV', '0343548213', 'dinalalaina@gmail.com', 'DA2I', 'M2'),
(56, 'RAHAHARIVONY', 'Mamilalaina', '2007-03-19', 'Mandritsara', 'Malagasy', 'Homme', 'Sylvestre', 'Hary', 'Antanifotsy IV', '0343694637', 'joel@gmail.com', 'DA2I', 'L2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `Nom` char(50) DEFAULT NULL,
  `Prenom` char(50) DEFAULT NULL,
  `Assign` char(5) DEFAULT NULL,
  `Mdp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Nom`, `Prenom`, `Assign`, `Mdp`) VALUES
(1, 'ESPA', 'Mixal', 'DA2I', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'MAMI', 'Lalaina', 'DA2I', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'BOGILA', 'Askima', 'RPM', '51eac6b471a284d3341d8c0c63d0f1a286262a18'),
(5, 'TSARATSIRY', 'Tahina', 'RPM', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(6, 'MAXIM', 'Maxam', 'RPM', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(7, 'MAXIM', 'Maxam', 'RPM', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
