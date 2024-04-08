-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 avr. 2024 à 20:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rss`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `idArticle` int(20) NOT NULL,
  `titre` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `link` mediumtext NOT NULL,
  `img` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`idArticle`, `titre`, `description`, `link`, `img`) VALUES
(8, 'Sur « Fortnite » et « Rocket League », des jeunes champions d’e-sport sacrés… mais jamais payés', 'Des dizaines de jeunes joueurs, vainqueurs de primes lors de tournois d’e-sport, dénoncent d’importants retards de versement de la part de l’éditeur américain Epic Games.', 'https://www.lemonde.fr/pixels/article/2024/03/31/sur-fortnite-et-rocket-league-des-champions-d-e-sport-sacres-mais-jamais-payes_6225239_4408996.html', NULL),
(9, 'Niffleur Hogwarts Legacy : Où le capturer et trouver la version shiny ? Tout savoir sur la créature magique', 'Dans ce guide, on vous explique tout ce que vous devez savoir sur le Niffleur, l’une des quelques créatures issues de l’univers de Harry Potter, et plus précisément celui des Animaux Fantastiques, que vous pouvez récupérer dans Hogwarts Legacy. Comment réussir sa capture, récupérer des matériaux pour...', 'https://www.jeuxvideo.com/news/1868737/niffleur-hogwarts-legacy-lieu-de-capture-coloris-shiny-tout-savoir-sur-la-creature-magique.htm', './img/66103cbb13a4f.png'),
(10, 'Niffleur Hogwarts Legacy : Où le capturer et trouver la version shiny ? Tout savoir sur la créature magique', 'Dans ce guide, on vous explique tout ce que vous devez savoir sur le Niffleur, l’une des quelques créatures issues de l’univers de Harry Potter, et plus précisément celui des Animaux Fantastiques, que vous pouvez récupérer dans Hogwarts Legacy. Comment réussir sa capture, récupérer des matériaux pour...', 'https://www.jeuxvideo.com/news/1868737/niffleur-hogwarts-legacy-lieu-de-capture-coloris-shiny-tout-savoir-sur-la-creature-magique.htm', NULL),
(11, 'Netflix dévoile enfin son adaptation à la Jumanji d’un classique du jeu de société ! Les loups-garous seront de sortie pour Halloween ?', 'Il y a presque un an, à un bon mois près, Netflix faisait une annonce pour le moins étonnante. Après les adaptations d\'œuvres littéraires, de comics et de mangas, la plateforme se lance un nouveau défi : adapter un jeu de société ! L’idée est aussi originale que surprenante et, aujourd’hui, on a le droit...', 'https://www.jeuxvideo.com/news/1872483/netflix-devoile-enfin-son-adaptation-a-la-jumanji-d-un-classique-du-jeu-de-societe-les-loups-garous-seront-de-sortie-pour-halloween.htm', './img/66103d78a8cc9.png'),
(12, 'Netflix dévoile enfin son adaptation à la Jumanji d’un classique du jeu de société ! Les loups-garous seront de sortie pour Halloween ?', 'Il y a presque un an, à un bon mois près, Netflix faisait une annonce pour le moins étonnante. Après les adaptations d\'œuvres littéraires, de comics et de mangas, la plateforme se lance un nouveau défi : adapter un jeu de société ! L’idée est aussi originale que surprenante et, aujourd’hui, on a le droit...', 'https://www.jeuxvideo.com/news/1872483/netflix-devoile-enfin-son-adaptation-a-la-jumanji-d-un-classique-du-jeu-de-societe-les-loups-garous-seront-de-sortie-pour-halloween.htm', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`idArticle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `archive`
--
ALTER TABLE `archive`
  MODIFY `idArticle` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
