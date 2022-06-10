-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 10 juin 2022 à 07:33
-- Version du serveur :  10.5.15-MariaDB-0+deb11u1
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SAE24`
--

-- --------------------------------------------------------

--
-- Structure de la table `Département`
--

CREATE TABLE `Département` (
  `id_dep` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Département`
--

INSERT INTO `Département` (`id_dep`, `nom`) VALUES
(1, 'Direction'),
(2, 'Gestion Administrative et financière'),
(3, 'Commercial et technique'),
(4, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `Employés`
--

CREATE TABLE `Employés` (
  `id_emp` int(10) UNSIGNED NOT NULL,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `poste` int(10) UNSIGNED NOT NULL,
  `departement` int(11) NOT NULL,
  `mail` text NOT NULL,
  `date_recrutement` date NOT NULL,
  `salaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Employés`
--

INSERT INTO `Employés` (`id_emp`, `prenom`, `nom`, `poste`, `departement`, `mail`, `date_recrutement`, `salaire`) VALUES
(1, 'Lucas', 'PAUSE', 7, 4, 'lucasp@gmail.com', '2022-06-09', 1200);

-- --------------------------------------------------------

--
-- Structure de la table `Formations`
--

CREATE TABLE `Formations` (
  `id_emp` int(10) UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `diplôme` text NOT NULL,
  `date_diplôme` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Matériel`
--

CREATE TABLE `Matériel` (
  `id_materiel` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `fonction` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Matériel`
--

INSERT INTO `Matériel` (`id_materiel`, `nom`, `fonction`) VALUES
(1, 'Marteau à pic', 'Permet de briser ou effriter la roche pour  récolter de la métière'),
(2, 'bâtées d\'orpaillage', 'Permet de séparer les métaux lourds et les métaux légers d\'une source d\'eau.'),
(3, 'Loupe', 'Permet de regarder des matériaux ou objets de plus près.'),
(4, 'Corde', 'Permet de sécurité un technicien ou du matériel lors de descente en rappel.'),
(5, 'Balai', 'Nettoyer les surfaces planes. (à sec)'),
(6, 'Serpillère', 'Nettoyer avec un balai humide les surfaces planes.'),
(7, 'Ordinateur', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Missions`
--

CREATE TABLE `Missions` (
  `id_mission` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `objectif` text NOT NULL,
  `deadline` date DEFAULT NULL,
  `outils` int(10) UNSIGNED DEFAULT NULL,
  `region` text DEFAULT NULL,
  `adresse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Missions`
--

INSERT INTO `Missions` (`id_mission`, `nom`, `objectif`, `deadline`, `outils`, `region`, `adresse`) VALUES
(1, 'Faire le ménage', '', NULL, 1, 'Réunion', 'Saint Pierre'),
(2, 'Etude de Terrain', 'Etudier une zone agricole dans le but d\'une future construction', NULL, NULL, 'Réunion', 'Saint Joseph GRAND COUDE');

-- --------------------------------------------------------

--
-- Structure de la table `mission_employes`
--

CREATE TABLE `mission_employes` (
  `id_emp` int(11) UNSIGNED NOT NULL,
  `id_mission` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mission_outils`
--

CREATE TABLE `mission_outils` (
  `id_mission` int(11) UNSIGNED NOT NULL,
  `id_materiel` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Postes`
--

CREATE TABLE `Postes` (
  `id_poste` int(10) UNSIGNED NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Postes`
--

INSERT INTO `Postes` (`id_poste`, `nom`) VALUES
(2, 'Directeur'),
(3, 'Secrétaire'),
(4, 'DRH'),
(5, 'Ingénieur'),
(6, 'Technicien'),
(7, 'Personnel d\'entretient'),
(8, 'Personnel de sécurité'),
(9, 'Technicien réseau'),
(10, 'Comptable');

-- --------------------------------------------------------

--
-- Structure de la table `Sanction`
--

CREATE TABLE `Sanction` (
  `id_emp` int(10) UNSIGNED NOT NULL,
  `sanction` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Département`
--
ALTER TABLE `Département`
  ADD PRIMARY KEY (`id_dep`);

--
-- Index pour la table `Employés`
--
ALTER TABLE `Employés`
  ADD PRIMARY KEY (`id_emp`),
  ADD KEY `employés_poste_foreign` (`poste`),
  ADD KEY `employé_departement_foreign` (`departement`);

--
-- Index pour la table `Formations`
--
ALTER TABLE `Formations`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `Matériel`
--
ALTER TABLE `Matériel`
  ADD PRIMARY KEY (`id_materiel`);

--
-- Index pour la table `Missions`
--
ALTER TABLE `Missions`
  ADD PRIMARY KEY (`id_mission`),
  ADD KEY `missions_outils_foreign` (`outils`);

--
-- Index pour la table `mission_employes`
--
ALTER TABLE `mission_employes`
  ADD PRIMARY KEY (`id_emp`,`id_mission`),
  ADD KEY `id_mission_mission` (`id_mission`);

--
-- Index pour la table `mission_outils`
--
ALTER TABLE `mission_outils`
  ADD PRIMARY KEY (`id_mission`,`id_materiel`),
  ADD KEY `id_materiel_materiel` (`id_materiel`);

--
-- Index pour la table `Postes`
--
ALTER TABLE `Postes`
  ADD PRIMARY KEY (`id_poste`);

--
-- Index pour la table `Sanction`
--
ALTER TABLE `Sanction`
  ADD PRIMARY KEY (`id_emp`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Département`
--
ALTER TABLE `Département`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Employés`
--
ALTER TABLE `Employés`
  MODIFY `id_emp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Formations`
--
ALTER TABLE `Formations`
  MODIFY `id_emp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Matériel`
--
ALTER TABLE `Matériel`
  MODIFY `id_materiel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Missions`
--
ALTER TABLE `Missions`
  MODIFY `id_mission` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Postes`
--
ALTER TABLE `Postes`
  MODIFY `id_poste` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Sanction`
--
ALTER TABLE `Sanction`
  MODIFY `id_emp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Employés`
--
ALTER TABLE `Employés`
  ADD CONSTRAINT `employé_departement_foreign` FOREIGN KEY (`departement`) REFERENCES `Département` (`id_dep`),
  ADD CONSTRAINT `employés_poste_foreign` FOREIGN KEY (`poste`) REFERENCES `Postes` (`id_poste`);

--
-- Contraintes pour la table `Missions`
--
ALTER TABLE `Missions`
  ADD CONSTRAINT `missions_outils_foreign` FOREIGN KEY (`outils`) REFERENCES `Matériel` (`id_materiel`);

--
-- Contraintes pour la table `mission_employes`
--
ALTER TABLE `mission_employes`
  ADD CONSTRAINT `id_emp_employes` FOREIGN KEY (`id_emp`) REFERENCES `Employés` (`id_emp`),
  ADD CONSTRAINT `id_mission_mission` FOREIGN KEY (`id_mission`) REFERENCES `Missions` (`id_mission`);

--
-- Contraintes pour la table `mission_outils`
--
ALTER TABLE `mission_outils`
  ADD CONSTRAINT `id_materiel_materiel` FOREIGN KEY (`id_materiel`) REFERENCES `Matériel` (`id_materiel`),
  ADD CONSTRAINT `id_mission_materiel` FOREIGN KEY (`id_mission`) REFERENCES `Missions` (`id_mission`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
