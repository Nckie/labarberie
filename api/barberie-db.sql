-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Dim 26 Mars 2017 à 20:24
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `barberie`
--

-- --------------------------------------------------------

--
-- Structure de la table `barbier`
--

CREATE TABLE `barbier` (
  `id` smallint(3) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `arrondissement` tinyint(3) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `prix` tinyint(3) NOT NULL,
  `rasage` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `site_web` varchar(255) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `name_img` varchar(255) NOT NULL,
  `horraire` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lat_long` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `barbier`
--

INSERT INTO `barbier` (`id`, `nom`, `arrondissement`, `adresse`, `prix`, `rasage`, `telephone`, `site_web`, `url_img`, `name_img`, `horraire`, `mail`, `description`, `lat_long`) VALUES
(31, 'Alain MaÃ®tre Barbiere', 3, '8 Rue Saint-Claude, 75003 Paris', 2, 'traditionnel', '01 42 77 55 80', 'alain-maitrebarbiercoiffeur.com', 'asset/img/salon/d6bf80e7f1ad74a1.jpg', 'alainMaitreB.jpg', 'Mardi :	  09h15-19h00  \r\nMercredi : 09h15-19h00  \r\nJeudi :	  09h15-19h00  \r\nVendredi : 09h15-19h00  \r\nSamedi :	  09h15-18h00  ', 'www.alain_maitrebarbier@yahoo.fr', 'Envie d\'un vrai voyage dans le temps ? C\'est chez Alain qu\'il faut aller. Ce maÃ®tre barbier vous accueille dans son salon au dÃ©cor digne de la salle Ã  manger de votre grand-mÃ¨re. L\'ambiance est dÃ©suÃ¨te et le rasage traditionnel. Ã€ tester!', '\0\0\0\0\0\0\0t>�nH@ǥ�&��@'),
(32, 'La barbiÃ¨re de Paris', 9, '14 Rue Condorcet, 75009 Paris', 3, 'moderne', '01 45 26 92 45', 'labarbieredeparis.com', 'asset/img/salon/b75495aadb617c31.jpg', 'labarbiere.jpg', 'Lundi:       9h00 - 20h30\r\nMardi:       9h00 - 20h30\r\nMarcredi:  9h00 - 20h30\r\nJeudi:        9h00 - 20h30\r\nVendredi:  9h00 - 20h30\r\nSamedi: 9h00 - 18h00', 'condorcet@labarbieredeparis.com', 'Une institution ! On ne prÃ©sente plus la BarbiÃ¨re de Paris. FondÃ©e en 2000 par Sarah Daniel-Hamizi la premiÃ¨re femme a exercÃ© le mÃ©tier de barbier en France a rondement bien menÃ© son activitÃ©. \r\nPassionnÃ©e par l\'univers de la barbe, Sarah l\'est, pas de doute ! Un rÃ©el savoir-faire et une passion indÃ©niable. ', '\0\0\0\0\0\0\0RAʙpH@��&7�@'),
(33, 'Le barbier des faubourgs', 18, '10 rue letort, 75018 Paris', 1, 'traditionnel', '01 42 59 09 54', 'lebarbierdesfaubourgs.fr', 'asset/img/salon/590ff48b7b57ef1f.jpg', 'barbierFauubourg.jpg', 'Lundi : 10h00 - 21h00\r\nMardi : 10h00 - 21h00\r\nMercredi :10h00 - 21h00\r\nVendredi : 10h00 - 21h00\r\nSamedi : 10h00 - 21h00\r\nDimanche : 10h00 - 14h00', 'lebarbierdesfaubourgs@lebarbierdesfaubourgs.fr', 'Le Barbier des Faubourgs est un petit coiffeur et barbier traditionnel de Paris. Le rendez-vous des hommes poilus au cÅ“ur du 18e. Une technique de chef pour tailler, couper, coupe-chouter votre petit buisson chouchou. L\'essayer c\'est l\'adopter, vous ne regretterez pas de prendre place sur leur fauteuil rouge.', '\0\0\0\0\0\0\0TW��frH@�o�i��@'),
(34, 'Les mauvais garÃ§ons', 11, '60 Rue Oberkampf, 75011 Paris', 2, 'traditionnel', '01 48 05 73 58', 'lesmauvaisgarcons.fr', 'asset/img/salon/d4a7482ef9f4ea6d.jpg', 'mauvaisGarconsOber.jpg', 'Lundi : 9h30-18h30\r\nMardi : 09h30 - 19h30\r\nMercredi : 09h30 - 19h30\r\nJeudi : 09h30 - 19h30\r\nVendredi : 09h30 - 19h30\r\nSamedi : 09h00 - 18h30', 'contact@lesmauvaisgarcons.fr', 'Pour un rasage typiquement traditionnel, ici, on gÃ¨re les poils de pÃ¨re en fils. Petite entreprise familiale, Les Mauvais GarÃ§ons est un lieu exclusivement dÃ©diÃ© aux hommes, oÃ¹ vous pourrez dans la joie et la bonne humeur investir dans un rasage traditionnel, un rasage du crÃ¢ne, la taille de la barbeâ€¦ De quoi vous fabriquer un look vraiment trÃ¨s chic.', '\0\0\0\0\0\0\0Wޟ��nH@�h���@'),
(35, 'La clÃ© du barbier', 5, '3 Rue LinnÃ©, 75005 Paris', 1, 'traditionnel', '09 67 32 67 60', 'lacledubarbier.fr', 'asset/img/salon/14c81437725bfe6b.jpg', 'cleBarbier.jpg', 'Lundi : 10h00-21h00\r\nMardi : 10h00-21h00\r\nMercredi : 10h00-21h00\r\nJeudi : 10h00-21h00\r\nVendredi : 10h00-21h00\r\nSamedi : 10h00-19h00', 'linne@lacledubarbier.fr', 'Le plus grand barbershop de la capitale. Le concept et le dÃ©cor sont typiquement masculins. Dâ€™une surface de 50 mÂ² sur 3 niveaux, ce salon ne dÃ©semplit pas. Dans ce salon au style loft new-yorkais, on coupe, taille, Ã©pile et sculpte barbe et moustachesâ€¦', '\0\0\0\0\0\0\0@���lH@�$��z�@'),
(36, 'Alex haircut\'s', 9, '21 Rue Rodier, 75009 Paris', 3, 'moderne', '06 31 86 84 69', 'https://www.facebook.com/pg/Alex-Haircuts-BarberShop-189879831103729/about/?ref=page_internal', 'asset/img/salon/ef238f0419266d55.jpg', 'alexHaircuts.jpg', 'Lundi : 9h00-19h00\r\nMardi : 9h00-19h00\r\nMercredi : 9h00-19h00\r\nJeudi : 9h00-19h00\r\nVendredi : 9h00-19h00\r\nSamedi : 9h00-19h00', 'haircutsandgrease@hotmail.fr', 'Ouvert depuis seulement fin 2011, le salon d\'Alex ne dÃ©semplit pas ! Les rendez-vous se bousculent, c\'est bien la preuve qu\'Alex est un bon barbier. Laissez-vous bercer dans une dÃ©co rÃ©tro par la playlist des annÃ©es 50 et succombez pour une petite moustache bien propre !', '\0\0\0\0\0\0\0�3��|pH@���(1�@'),
(37, 'Les thermes de LutÃ¨ce', 4, '70 Quai de l\'HÃ´tel de ville, 75004 Paris', 3, 'moderne', '01 42 77 76 20', 'zvonkoparis.com', 'asset/img/salon/9baea8e2e011640c.jpg', 'thermes.jpg', 'Mardi : 10h00-19h00 \r\nMercredi : 10h00-19h00 \r\nJeudi : 10h00-19h00 \r\nVendredi : 10h00-19h00 \r\nSamedi : 10h00-19h00 ', 'contact@zvonkoparis.com', 'Les Thermes de LutÃ¨ce est un centre de soins situÃ© dans le quartier du Marais utilisant exclusivement des cosmÃ©tiques Ã©cologiques &amp; biologiques. Dans un immeuble typiquement parisien construit entre le XVIe et le XIXe siÃ¨cle, vous aurez le plaisir de tailler votre arbuste dans une ambiance chic et cosy.', '\0\0\0\0\0\0\0凌�fmH@\0���-�@');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` smallint(3) UNSIGNED NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `mail`, `password`) VALUES
(1, 'nickie.roudez@gmail.com', '$2y$10$Ou0hwmPClVVggKQnyTcv8ugni3yaihouzgYWbe7rZa6Tie1.RB/DS');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `barbier`
--
ALTER TABLE `barbier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `barbier`
--
ALTER TABLE `barbier`
  MODIFY `id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
