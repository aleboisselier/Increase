-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 17 Décembre 2015 à 08:30
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `increase`
--
DROP DATABASE IF EXISTS {{projectName}};
CREATE DATABASE {{projectName}};
USE {{projectName}};
-- --------------------------------------------------------

--
-- Structure de la table `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
`id` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `acl`
--

INSERT INTO `acl` (`id`, `controller`, `action`, `idRole`) VALUES
(50, 'Default', 'index', 1),
(51, 'Default', 'frm', 1),
(52, 'Default', 'update', 1),
(53, 'Default', 'delete', 1),
(54, 'Default', 'show', 1),
(56, 'Default', 'show', 3),
(58, 'Roles', 'updateACL', 1),
(85, 'Default', 'index', 1),
(86, 'Default', 'frm', 1),
(87, 'Default', 'update', 1),
(88, 'Default', 'delete', 1),
(89, 'Default', 'show', 1),
(90, 'Roles', 'updateACL', 1),
(92, 'Default', 'show', 3),
(98, 'Default', 'index', 4),
(99, 'Default', 'show', 4),
(100, 'Projects', 'update', 4),
(101, 'Projects', 'show', 4),
(102, 'Taches', 'update', 4),
(103, 'Taches', 'delete', 4),
(104, 'Messages', 'show', 4),
(105, 'UseCases', 'index', 4),
(106, 'UseCases', 'update', 4),
(107, 'UseCases', 'delete', 4),
(108, 'Default', 'show', 2),
(109, 'Taches', 'update', 2),
(110, 'Taches', 'delete', 2),
(111, 'Taches', 'show', 2),
(112, 'Messages', 'update', 2),
(113, 'Messages', 'show', 2),
(114, 'UseCases', 'show', 2),
(115, 'Users', 'show', 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(11) NOT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `content` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL,
  `idFil` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `objet`, `content`, `date`, `idUser`, `idProjet`, `idFil`) VALUES
(2, 'Essai', 'Aucun contenu', '2015-03-12 23:00:00', 1, 1, NULL),
(7, 'Ok', 'Rien à répondre', '2015-03-13 13:33:51', 2, 1, 2),
(8, 'TEST', 'TEST', '2015-12-03 10:54:43', 1, 1, 7),
(27, 'TesT', 'teststsets\r\n', '2015-03-12 23:00:00', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
`id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text,
  `dateLancement` date DEFAULT NULL,
  `dateFinPrevue` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  `idManager` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `description`, `dateLancement`, `dateFinPrevue`, `image`, `idClient`, `idManager`) VALUES
(1, 'Increase', 'A Phalcon web application to manage the progress of projects, and improve communication with the customer.', '2015-03-16', '2015-03-29', NULL, 5, 7),
(2, 'Open-beer', 'A free, public database, API and web application for beer information.', '2015-03-15', '2015-03-29', NULL, 5, 7),
(3, 'Essai', 'test&lt;html&gt;la suite', '2015-03-10', '2015-03-09', NULL, 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `libelle`, `description`) VALUES
(1, 'Administrateur', 'Administrateur du site, un boss quoi'),
(2, 'Développeur', 'Développeur / Auteur'),
(3, 'Client', 'Client souhaitant accéder à ses infos de projet'),
(4, 'Chef de Projet', 'Chef de Projet');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE IF NOT EXISTS `tache` (
`id` int(11) NOT NULL,
  `libelle` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `avancement` smallint(6) DEFAULT NULL,
  `codeUseCase` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id`, `libelle`, `date`, `avancement`, `codeUseCase`) VALUES
(1, 'Interview client +rédaction', '2015-03-22', 100, 'I-UC1'),
(2, 'MCD', '2015-03-22', 100, 'I-UC2'),
(3, 'Génération base', '2015-03-22', 100, 'I-UC3'),
(4, 'Uses cases', '2015-03-23', 100, 'I-UC4'),
(5, 'Connexion REST', '2015-03-13', 50, 'OB-UC1'),
(6, 'Liste des bières', '2015-03-22', 55, 'OB-UC2'),
(7, 'Liste des bières par brasserie', '2015-03-22', 100, 'OB-UC2'),
(8, 'TEST', '2015-12-03', 35, 'I-UC4');

-- --------------------------------------------------------

--
-- Structure de la table `usecase`
--

CREATE TABLE IF NOT EXISTS `usecase` (
  `code` varchar(15) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poids` smallint(6) DEFAULT NULL,
  `avancement` smallint(6) DEFAULT NULL,
  `idProjet` int(11) NOT NULL,
  `idDev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `usecase`
--

INSERT INTO `usecase` (`code`, `nom`, `poids`, `avancement`, `idProjet`, `idDev`) VALUES
('I-UC-Dev1', 'Connexion utilisateur', 50, 0, 1, 4),
('I-UC-Dev2', 'Gestion des ACL', 10, 0, 1, 4),
('I-UC-Dev3-Cli', 'Lister mes projets (client)', 50, 100, 1, 4),
('I-UC-Dev4-Cli', 'Visualiser avancement projet (client)', 10, 0, 1, 4),
('I-UC-Dev5', 'Laisser un message, répondre', 2, 0, 1, 4),
('I-UC-Dev6', 'Saisir l''anvancement d''un Use case', 5, 0, 1, 4),
('I-UC-Dev7', 'Saisir une tâche réalisée', 5, 100, 1, 4),
('I-UC-Dev8', 'Se déconnecter', 2, 100, 1, 2),
('I-UC-Dev9', 'Lister les messages (nouveaux, archivés...)', 2, 0, 1, 2),
('I-UC1', 'Règles de gestion', 2, 100, 1, 2),
('I-UC2', 'Analyse des données', 2, 100, 1, 2),
('I-UC3', 'Base de données', 2, 100, 1, 2),
('I-UC4', 'Analyse fonctionnelle', 20, 68, 1, 4),
('OB-UC1', 'Connexion au server REST', 10, 0, 2, 5),
('OB-UC2', 'Gestion des bières (liste/ajout/modification)', 10, 78, 2, 5),
('TEST', 'test', 5, 0, 1, 1),
('TEST', 'oo', 10, 13, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `identite` varchar(100) DEFAULT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `identite`, `idRole`) VALUES
(1, 'jcheron@kobject.net', '$2y$10$JHa4mP5ZPrCCn4B/OD93Ye5tJJS6ZIHxfm2zwXcjDrZdUifBUqXZm', 'JC HERON', 1),
(2, 'igor.minar@gmail.com', '$2y$10$sUcYHjVsSfzal9oXioOL2u6i09Nq5yqgHHSxm6T0gZVl0LuzGo8iO', 'Igor MINAR', 2),
(3, 'admin@local.fr', '$2y$10$XoGDtFzyzW/HD2kbC48wx.CEE7V70Eg7bhQliF4uo7Q.r.Ujgx8Wu', 'Admin', 2),
(4, 'misko.hevery@gmail.com', '$2y$10$EMM4Zp3gqnGyCKblCzCck.Wni.1IS62E/DvjIrqjnnFmRTicbrWf2', 'Miško Hevery', 2),
(5, 'pete.bacon@gmail.com', '$2y$10$zf8FKCKVv0PJdM.6v/mLZOybC/V2ZMSILCK4Ekrxju9FEKn1gOiNy', 'Pete Bacon Darwin', 3),
(7, 'moi@kobject.net', '$2y$10$cSFaJx5TB4KyrGnPbRZsAejOHjnWaqJaP0Ktcv5jORAiwU5dFCUnC', 'moi', 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acl`
--
ALTER TABLE `acl`
 ADD PRIMARY KEY (`id`), ADD KEY `idRole` (`idRole`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_message_user1_idx` (`idUser`), ADD KEY `fk_message_projet1_idx` (`idProjet`), ADD KEY `fk_message_message1_idx` (`idFil`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nom_UNIQUE` (`nom`), ADD KEY `fk_projet_user1_idx` (`idClient`), ADD KEY `idManager` (`idManager`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tache_useCase1_idx` (`codeUseCase`);

--
-- Index pour la table `usecase`
--
ALTER TABLE `usecase`
 ADD PRIMARY KEY (`code`,`idProjet`), ADD KEY `fk_useCase_projet_idx` (`idProjet`), ADD KEY `fk_useCase_user1_idx` (`idDev`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `mail_UNIQUE` (`mail`), ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acl`
--
ALTER TABLE `acl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
ADD CONSTRAINT `fk_message_message1` FOREIGN KEY (`idFil`) REFERENCES `message` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_message_projet1` FOREIGN KEY (`idProjet`) REFERENCES `projet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
ADD CONSTRAINT `fk_projet_user1` FOREIGN KEY (`idClient`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
ADD CONSTRAINT `fk_tache_useCase1` FOREIGN KEY (`codeUseCase`) REFERENCES `usecase` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `usecase`
--
ALTER TABLE `usecase`
ADD CONSTRAINT `fk_useCase_projet` FOREIGN KEY (`idProjet`) REFERENCES `projet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_useCase_user1` FOREIGN KEY (`idDev`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
