-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 juil. 2021 à 18:26
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `miniprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pass` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom`, `prenom`, `mail`, `pass`) VALUES
(1, 'chafik', 'salmane', '123@gmail.com', '123'),
(2, 'zghenghen', 'souad', 'zghenghen@gmail.com', '456'),
(3, 'skefkef', 'rania', 'skefkef@gmail.com', '789'),
(4, 'lbab', '7med', 'lbab@gmail.com', '159');

-- --------------------------------------------------------

--
-- Structure de la table `encadrant`
--

CREATE TABLE `encadrant` (
  `id_encadrant` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `encadrant`
--

INSERT INTO `encadrant` (`id_encadrant`, `nom`, `prenom`, `mail`, `password`) VALUES
(1, 'berrada', 'mohammed', 'berrada@gmail.com', 'daz'),
(2, 'benchekroune', 'ahmed', 'ahmed@gmail.com', 'daz');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `id_encadrant` int(11) DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `confirmation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `id_encadrant`, `nom`, `prenom`, `mail`, `password`, `confirmation`) VALUES
(1, NULL, 'clementine', 'sophie', 'sophie@gmail.com', 'pass', 1),
(2, NULL, 'djikstra', 'stoch', 'stoch@gmail.com', 'pass', 0),
(3, 1, 'lebois', 'Juliette', 'juliette@gmail.fr', '15874', 1),
(4, NULL, 'chafik', 'salmane', 'afef@zefzef.com', 'zsf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_encadrant` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `affectation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `id_etudiant`, `id_encadrant`, `description`, `date`, `affectation`) VALUES
(1, 11, 15, 'backoffice d\'une application web de gestion de mini projets', '2021-06-16 12:53:26', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `encadrant`
--
ALTER TABLE `encadrant`
  ADD PRIMARY KEY (`id_encadrant`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
