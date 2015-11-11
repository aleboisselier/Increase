-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Mars 2015 à 18:47
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
CREATE DATABASE IF NOT EXISTS `increase` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `increase`;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `identite`, `role`) VALUES
(1, 'johndoe@kobject.net', 'ffffff9afffffff15b336e6affffff9619ffffff92ffffff8537ffffffdf30ffffffb2ffffffe6ffffffa2376569fffffffcfffffff9ffffffd7ffffffe773ffffffecffffffceffffffde65606529ffffffa0', 'John DOE', 'user'),
(2, 'igor.minar@gmail.com', 'ffffff84ffffffd8ffffff9877fffffff0ffffffd4041efffffffb6bfffffff91a16fffffff024ffffff8f2fffffffd573ffffffe6ffffffaf05ffffffc1ffffff9fffffff96ffffffbeffffffdbffffff9fffffff882f78ffffff82', 'Igor MINAR', 'author'),
(3, 'admin@local.fr', 'ffffff8c6976ffffffe5ffffffb5410415ffffffbdffffffe908ffffffbd4dffffffee15ffffffdfffffffb167ffffffa9ffffffc873fffffffc4bffffffb8ffffffa81f6f2affffffb448ffffffa918', 'Admin', 'admin,user,author'),
(4, 'misko.hevery@gmail.com', '15ffffffe2ffffffb0ffffffd3ffffffc338ffffff91ffffffebffffffb0fffffff1ffffffef60ffffff9effffffc419420c20ffffffe320ffffffceffffff94ffffffc65fffffffbcffffff8c331244ffffff8effffffb225', 'Miško Hevery', 'author'),
(5, 'pete.bacon@gmail.com', '15ffffffe2ffffffb0ffffffd3ffffffc338ffffff91ffffffebffffffb0fffffff1ffffffef60ffffff9effffffc419420c20ffffffe320ffffffceffffff94ffffffc65fffffffbcffffff8c331244ffffff8effffffb225', 'Pete Bacon Darwin', 'author');

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `description`, `dateLancement`, `dateFinPrevue`, `idClient`) VALUES
(1, 'Increase', 'A Phalcon web application to manage the progress of projects, and improve communication with the customer', '2015-03-16', '2015-03-29', 1),
(2, 'Open-beer', 'A free, public database, API and web application for beer information.', '2015-03-15', '2015-03-29', 1);

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `objet`, `content`, `date`, `idUser`, `idProjet`, `idFil`) VALUES
(2, 'Essai', 'Aucun contenu', '2015-03-12 23:00:00', 1, 1, NULL),
(7, 'Ok', 'Rien à répondre', '2015-03-13 13:33:51', 2, 1, 2);


--
-- Contenu de la table `usecase`
--

INSERT INTO `usecase` (`code`, `nom`, `poids`, `avancement`, `idProjet`, `idDev`) VALUES
('I-UC-Dev1', 'Connexion utilisateur', 5, 0, 1, 4),
('I-UC-Dev2', 'Gestion des ACL', 10, 0, 1, 4),
('I-UC-Dev3-Cli', 'Lister mes projets (client)', 5, 0, 1, 4),
('I-UC-Dev4-Cli', 'Visualiser avancement projet (client)', 10, 0, 1, 4),
('I-UC-Dev5', 'Laisser un message, répondre', 2, 0, 1, 4),
('I-UC-Dev6', 'Saisir l''anvancement d''un Use case', 5, 0, 1, 4),
('I-UC-Dev7', 'Saisir une tâche réalisée', 2, 0, 1, 4),
('I-UC-Dev8', 'Se déconnecter', 2, 0, 1, 2),
('I-UC-Dev9', 'Lister les messages (nouveaux, archivés...)', 2, 0, 1, 2),
('I-UC1', 'Règles de gestion', 2, 100, 1, 2),
('I-UC2', 'Analyse des données', 2, 100, 1, 2),
('I-UC3', 'Base de données', 2, 100, 1, 2),
('I-UC4', 'Analyse fonctionnelle', 20, 100, 1, 4),
('OB-UC1', 'Connexion au server REST', 10, 0, 2, 5),
('OB-UC2', 'Gestion des bières (liste/ajout/modification)', 10, 0, 2, 5);

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id`, `libelle`, `date`, `avancement`, `codeUseCase`) VALUES
(1, 'Interview client +rédaction', '2015-03-22', 100, 'I-UC1'),
(2, 'MCD', '2015-03-22', 100, 'I-UC2'),
(3, 'Génération base', '2015-03-22', 100, 'I-UC3'),
(4, 'Uses cases', '2015-03-23', 100, 'I-UC4'),
(5, 'Connexion REST', '2015-03-13', 50, 'OB-UC1'),
(6, 'Liste des bières', '2015-03-22', 100, 'OB-UC2'),
(7, 'Liste des bières par brasserie', '2015-03-22', 10, 'OB-UC2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
