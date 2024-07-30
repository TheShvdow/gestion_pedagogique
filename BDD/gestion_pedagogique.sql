-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 30 juil. 2024 à 02:53
-- Version du serveur : 8.0.37-0ubuntu0.22.04.3
-- Version de PHP : 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_pedagogique`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `generate_matricule` () RETURNS VARCHAR(20) CHARSET utf8mb4 BEGIN
    DECLARE new_matricule VARCHAR(20);
    DECLARE is_unique BOOLEAN DEFAULT FALSE;
    WHILE NOT is_unique DO
        SET new_matricule = CONCAT('MAT', LPAD(FLOOR(RAND() * 1000000), 4, '0'));
        SET is_unique = NOT EXISTS (SELECT 1 FROM etudiant WHERE matricule = new_matricule);
    END WHILE;
    RETURN new_matricule;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaire`
--

CREATE TABLE `annee_scolaire` (
  `id_anneeScolaire` int NOT NULL,
  `annee_debut` year NOT NULL,
  `annee_fin` year NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id_classe` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id_classe`, `libelle`, `filiere`, `niveau`) VALUES
(1, 'L1RI', 'Computer science', '1ère année'),
(2, 'L2RI', 'Computer science', '2ème année');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int NOT NULL,
  `nombre_heure_global` int NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `id_module` int DEFAULT NULL,
  `id_classe` int DEFAULT NULL,
  `id_professeur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `nombre_heure_global`, `semestre`, `id_module`, `id_classe`, `id_professeur`) VALUES
(1, 60, 'semestre 1', 1, 1, 1),
(2, 45, 'semestre 2', 2, 2, 1),
(3, 30, 'semestre 1', 1, 1, 2),
(4, 45, 'semestre 2', 2, 2, 1),
(5, 20, 'semestre 2', 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cours_classes`
--

CREATE TABLE `cours_classes` (
  `id_coursClasse` int NOT NULL,
  `id_cours` int DEFAULT NULL,
  `id_classe` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours_classes`
--

INSERT INTO `cours_classes` (`id_coursClasse`, `id_cours`, `id_classe`) VALUES
(1, 1, 1),
(2, 2, 1),
(6, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `demande_annulation`
--

CREATE TABLE `demande_annulation` (
  `id_demande` int NOT NULL,
  `date_demande` date NOT NULL,
  `raison` text NOT NULL,
  `id_session` int DEFAULT NULL,
  `id_professeur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int NOT NULL,
  `matricule` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `matricule`) VALUES
(4, 'MAT2234'),
(5, 'MAT4485'),
(7, 'MAT5151'),
(6, 'MAT5721');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int NOT NULL,
  `id_etudiant` int DEFAULT NULL,
  `id_classe` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id_module` int NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id_module`, `libelle`) VALUES
(1, 'informatiques'),
(2, 'lingustique'),
(3, 'markting'),
(4, 'Sport'),
(5, 'Mathématique'),
(6, 'pyhsique'),
(7, 'Chimie'),
(8, 'Programmation Web'),
(9, 'Programmation mobile'),
(10, 'Base de Données');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `id_professeur` int NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`id_professeur`, `specialite`, `grade`) VALUES
(1, 'PHP', 'Docteur'),
(2, 'Java', 'Maitrise');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `libelle`) VALUES
(1, 'RP'),
(2, 'Attaché'),
(3, 'Professeur'),
(4, 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id_salle` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `nombre_places` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id_salle`, `nom`, `numero`, `nombre_places`) VALUES
(1, 'Salle Nelson Mandela', '2', 50),
(2, 'Salle Albert Einstein', '1', 40),
(3, 'Salle Diomaye', '3', 25);

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `id_anneeScolaire` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `session_cours`
--

CREATE TABLE `session_cours` (
  `id_session` int NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `nombre_heure` int NOT NULL,
  `type_session` enum('en ligne','en presentiel') NOT NULL DEFAULT 'en presentiel',
  `etat_session` enum('terminee','annulee','non effectuee') NOT NULL DEFAULT 'non effectuee',
  `id_cours` int DEFAULT NULL,
  `id_salle` int DEFAULT NULL,
  `id_professeur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `session_cours`
--

INSERT INTO `session_cours` (`id_session`, `date`, `heure_debut`, `heure_fin`, `nombre_heure`, `type_session`, `etat_session`, `id_cours`, `id_salle`, `id_professeur`) VALUES
(5, '2024-07-24', '12:00:00', '16:00:00', 4, 'en presentiel', 'non effectuee', 2, 1, 1),
(6, '2024-07-24', '14:00:00', '18:00:00', 6, 'en ligne', 'non effectuee', 1, 1, 2),
(9, '2024-01-10', '08:00:00', '10:00:00', 2, 'en presentiel', 'terminee', 1, 1, 1),
(10, '2024-01-11', '10:00:00', '12:00:00', 2, 'en ligne', 'terminee', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `telephone`, `username`, `password`, `id_role`) VALUES
(1, 'Fall', 'Modou', '771234567', 'modoufall@gmail.com', '53b854fe546867793707ba23bb61a269', 1),
(2, 'Sow', 'Alassane', '781234567', 'alassane@hotmail.com', '53b854fe546867793707ba23bb61a269', 1),
(4, 'wade', 'idrissa', '778014941', 'derisswvde@gmail.com', 'aa8b3be4301275ac320308102ed1038b', 4),
(5, 'wade', 'deriss', '781556228', 'derisswade@gmail.com', 'aa8b3be4301275ac320308102ed1038b', 4),
(6, 'diallo', 'abdou', '778353426', 'abdoudiallo@exemple.com', 'aa8b3be4301275ac320308102ed1038b', 4),
(7, 'mbodj', 'adjia', '778760161', 'adjiambodj@gmail.com', 'aa8b3be4301275ac320308102ed1038b', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_scolaire`
--
ALTER TABLE `annee_scolaire`
  ADD PRIMARY KEY (`id_anneeScolaire`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_professeur` (`id_professeur`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Index pour la table `cours_classes`
--
ALTER TABLE `cours_classes`
  ADD PRIMARY KEY (`id_coursClasse`),
  ADD KEY `id_cours` (`id_cours`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Index pour la table `demande_annulation`
--
ALTER TABLE `demande_annulation`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_session` (`id_session`),
  ADD KEY `id_professeur` (`id_professeur`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`id_professeur`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`),
  ADD KEY `id_anneeScolaire` (`id_anneeScolaire`);

--
-- Index pour la table `session_cours`
--
ALTER TABLE `session_cours`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `id_cours` (`id_cours`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `id_professeur` (`id_professeur`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `telephone` (`telephone`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_scolaire`
--
ALTER TABLE `annee_scolaire`
  MODIFY `id_anneeScolaire` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cours_classes`
--
ALTER TABLE `cours_classes`
  MODIFY `id_coursClasse` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `demande_annulation`
--
ALTER TABLE `demande_annulation`
  MODIFY `id_demande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id_module` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id_salle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `session_cours`
--
ALTER TABLE `session_cours`
  MODIFY `id_session` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `modules` (`id_module`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`id_professeur`) REFERENCES `professeurs` (`id_professeur`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`);

--
-- Contraintes pour la table `cours_classes`
--
ALTER TABLE `cours_classes`
  ADD CONSTRAINT `cours_classes_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
  ADD CONSTRAINT `cours_classes_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`);

--
-- Contraintes pour la table `demande_annulation`
--
ALTER TABLE `demande_annulation`
  ADD CONSTRAINT `demande_annulation_ibfk_1` FOREIGN KEY (`id_session`) REFERENCES `session_cours` (`id_session`),
  ADD CONSTRAINT `demande_annulation_ibfk_2` FOREIGN KEY (`id_professeur`) REFERENCES `professeurs` (`id_professeur`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`);

--
-- Contraintes pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD CONSTRAINT `professeurs_ibfk_1` FOREIGN KEY (`id_professeur`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `semestre_ibfk_1` FOREIGN KEY (`id_anneeScolaire`) REFERENCES `annee_scolaire` (`id_anneeScolaire`);

--
-- Contraintes pour la table `session_cours`
--
ALTER TABLE `session_cours`
  ADD CONSTRAINT `session_cours_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
  ADD CONSTRAINT `session_cours_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salles` (`id_salle`),
  ADD CONSTRAINT `session_cours_ibfk_3` FOREIGN KEY (`id_professeur`) REFERENCES `professeurs` (`id_professeur`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
