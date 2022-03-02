-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 août 2020 à 05:47
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `musee`
--

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

DROP TABLE IF EXISTS `bibliotheque`;
CREATE TABLE IF NOT EXISTS `bibliotheque`
(
    `id`         int(11) NOT NULL AUTO_INCREMENT,
    `numMus`     int(11) NOT NULL,
    `ISBN`       int(11) NOT NULL,
    `date_Achat` date    NOT NULL,
    PRIMARY KEY (`id`),
    KEY `ISBN` (`ISBN`),
    KEY `numMus` (`numMus`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`id`, `numMus`, `ISBN`, `date_Achat`)
VALUES (1, 2, 144, '2020-07-17'),
       (3, 5, 144, '2020-08-12'),
       (5, 6, 1456, '2020-08-19');

-- --------------------------------------------------------

--
-- Structure de la table `moment`
--

DROP TABLE IF EXISTS `moment`;
CREATE TABLE IF NOT EXISTS `moment`
(
    `jour` date NOT NULL,
    PRIMARY KEY (`jour`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `moment`
--

INSERT INTO `moment` (`jour`)
VALUES ('2020-07-24'),
       ('2020-08-20'),
       ('2020-08-26');

-- --------------------------------------------------------

--
-- Structure de la table `musee`
--

DROP TABLE IF EXISTS `musee`;
CREATE TABLE IF NOT EXISTS `musee`
(
    `numMus`   int(11)          NOT NULL AUTO_INCREMENT,
    `nomMus`   varchar(255)     NOT NULL,
    `nblivres` int(10) UNSIGNED NOT NULL,
    `codePays` varchar(255)     NOT NULL,
    PRIMARY KEY (`numMus`),
    KEY `codePays` (`codePays`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `musee`
--

INSERT INTO `musee` (`numMus`, `nomMus`, `nblivres`, `codePays`)
VALUES (1, 'Eiffel', 45, '125a'),
       (2, 'Louvre', 78, '124a'),
       (5, 'Tokpa', 125, '125a'),
       (6, 'range', 15866, '126b');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage`
(
    `ISBN`     int(11)          NOT NULL,
    `nbPage`   int(10) UNSIGNED NOT NULL,
    `titre`    varchar(255)     NOT NULL,
    `codePays` varchar(255)     NOT NULL,
    PRIMARY KEY (`ISBN`),
    KEY `codePays` (`codePays`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`ISBN`, `nbPage`, `titre`, `codePays`)
VALUES (144, 45555, 'Ma mère', '125a'),
       (545, 150, 'la lune', '125a'),
       (1456, 44444, 'L\'astree', '126b'),
       (7894, 454, 'Roman', '126b');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays`
(
    `codePays`    varchar(10)         NOT NULL,
    `nbhabitants` bigint(20) UNSIGNED NOT NULL,
    PRIMARY KEY (`codePays`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`codePays`, `nbhabitants`)
VALUES ('124a', 44),
       ('125a', 4564),
       ('126b', 133000),
       ('229', 4568765465);

-- --------------------------------------------------------

--
-- Structure de la table `referencer`
--

DROP TABLE IF EXISTS `referencer`;
CREATE TABLE IF NOT EXISTS `referencer`
(
    `id`         int(11)          NOT NULL AUTO_INCREMENT,
    `nomSite`    varchar(255)     NOT NULL,
    `numeropage` int(10) UNSIGNED NOT NULL,
    `ISBN`       int(11)          NOT NULL,
    PRIMARY KEY (`id`),
    KEY `ISBN` (`ISBN`),
    KEY `nomSite` (`nomSite`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `referencer`
--

INSERT INTO `referencer` (`id`, `nomSite`, `numeropage`, `ISBN`)
VALUES (2, 'Foret', 144, 144),
       (4, 'Chateau', 144, 144);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site`
(
    `nomSite`     varchar(255) NOT NULL,
    `codePays`    varchar(255) NOT NULL,
    `anneedecouv` year(4)      NOT NULL,
    PRIMARY KEY (`nomSite`),
    KEY `codePays` (`codePays`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`nomSite`, `codePays`, `anneedecouv`)
VALUES ('Chateau', '125a', 2000),
       ('Foret', '124a', 2014);

-- --------------------------------------------------------

--
-- Structure de la table `visiter`
--

DROP TABLE IF EXISTS `visiter`;
CREATE TABLE IF NOT EXISTS `visiter`
(
    `id`          int(11)          NOT NULL AUTO_INCREMENT,
    `numMus`      int(11)          NOT NULL,
    `jour`        date             NOT NULL,
    `nbVisiteurs` int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    KEY `numMus` (`numMus`),
    KEY `jour` (`jour`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 9
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `visiter`
--

INSERT INTO `visiter` (`id`, `numMus`, `jour`, `nbVisiteurs`)
VALUES (2, 2, '2020-07-24', 25),
       (4, 2, '2020-07-24', 2424),
       (7, 2, '2020-08-20', 45),
       (8, 6, '2020-08-26', 656);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bibliotheque`
--
ALTER TABLE `bibliotheque`
    ADD CONSTRAINT `bibliotheque_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `ouvrage` (`ISBN`),
    ADD CONSTRAINT `bibliotheque_ibfk_2` FOREIGN KEY (`numMus`) REFERENCES `musee` (`numMus`);

--
-- Contraintes pour la table `musee`
--
ALTER TABLE `musee`
    ADD CONSTRAINT `musee_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
    ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`);

--
-- Contraintes pour la table `referencer`
--
ALTER TABLE `referencer`
    ADD CONSTRAINT `referencer_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `ouvrage` (`ISBN`),
    ADD CONSTRAINT `referencer_ibfk_2` FOREIGN KEY (`nomSite`) REFERENCES `site` (`nomSite`);

--
-- Contraintes pour la table `site`
--
ALTER TABLE `site`
    ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`);

--
-- Contraintes pour la table `visiter`
--
ALTER TABLE `visiter`
    ADD CONSTRAINT `visiter_ibfk_1` FOREIGN KEY (`numMus`) REFERENCES `musee` (`numMus`),
    ADD CONSTRAINT `visiter_ibfk_2` FOREIGN KEY (`jour`) REFERENCES `moment` (`jour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
