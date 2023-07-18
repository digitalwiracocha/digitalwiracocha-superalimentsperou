-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230323.7514e75794
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Lun. 17 Juil. 2023 à 13:36
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `superalimentsperou`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` int NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `complement_adresse` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ville` varchar(300) NOT NULL,
  `code_postal` varchar(150) NOT NULL,
  `pays` varchar(150) NOT NULL,
  `id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int NOT NULL,
  `date_commande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_utilisateur` int NOT NULL,
  `id_mode_paiement` int NOT NULL,
  `id_mode_livraison` int NOT NULL,
  `id_adresse` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int NOT NULL,
  `description` varchar(300) NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_post` int DEFAULT NULL,
  `id_utilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `mode_livraison`
--

CREATE TABLE `mode_livraison` (
  `id_mode_livraison` int NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `délai` varchar(45) NOT NULL,
  `prix` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

CREATE TABLE `mode_paiement` (
  `id_mode_paiement` int NOT NULL,
  `description` varchar(300) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `actif` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_commande` int NOT NULL,
  `date_commande` datetime NOT NULL,
  `id_utilisateur` int NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `id_mode_livraison` varchar(255) NOT NULL,
  `id_adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id_commande`, `date_commande`, `id_utilisateur`, `product`, `quantity`, `id_mode_livraison`, `id_adresse`) VALUES
(1, '2023-07-14 13:32:55', 1, 'produit1', 1, 'livraison1', 'adresse1');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int NOT NULL,
  `url_photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id_post` int NOT NULL,
  `titre` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_path` varchar(210) NOT NULL,
  `baliseTitle` varchar(210) NOT NULL,
  `metaDescription` varchar(360) NOT NULL,
  `metaKeywords` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_post`, `titre`, `description`, `date_creation`, `image_path`, `baliseTitle`, `metaDescription`, `metaKeywords`) VALUES
(1, 'Découvrez un trésor caché : Bienvenue dans le monde fascinant du Pérou et de la région de Cuzco', 'Introduction :\r\nAu cœur des Andes péruviennes, une région extraordinaire regorge de trésors historiques, de traditions préservées et de richesses naturelles exceptionnelles. C\'est avec une grande fierté et une profonde passion que nous lançons aujourd\'hui notre blog dédié à cette terre mystique : le Pérou et plus spécifiquement la magnifique région de Cuzco. Nous sommes ravis de vous inviter à une aventure unique, où vous découvrirez les merveilles des Qeros, les héritiers des Incas, ainsi que les produits naturels exclusifs de cette terre bénie. En outre, nous souhaitons partager notre engagement social et solidaire envers les enfants victimes du trafic d\'êtres humains dans la région de Cuzco et les familles Qeros. Préparez-vous à être transporté dans un univers envoûtant et à ressentir une profonde envie de vous immerger dans cette terre magique.\r\n\r\nParagraphe 1 : La région de Cuzco - Un héritage culturel inestimable\r\nCuzco, autrefois capitale de l\'empire Inca, est un joyau historique niché au cœur des montagnes péruviennes. Ce lieu chargé d\'histoire regorge de vestiges architecturaux fascinants tels que la célèbre citadelle de Machu Picchu, qui attire des voyageurs du monde entier. Mais Cuzco ne se limite pas à son passé glorieux. La région offre également une culture vibrante, des festivals colorés, une cuisine délicieuse et des paysages à couper le souffle. À travers notre blog, nous partagerons des informations approfondies et des faits passionnants sur cette région unique qui ne manqueront pas de vous captiver.\r\n\r\nParagraphe 2 : Les Qeros - Gardiens des traditions incas\r\nLes Qeros, descendants directs des Incas, sont une communauté fascinante qui a su préserver les traditions ancestrales de leurs ancêtres. Leur artisanat exceptionnel, leurs tissages colorés et leurs connaissances spirituelles en font des gardiens inestimables du patrimoine culturel du Pérou. Dans notre blog, nous vous présenterons leur mode de vie, leurs coutumes et leurs croyances, vous offrant ainsi un aperçu privilégié de cette culture riche et authentique.\r\n\r\nParagraphe 3 : Les produits naturels du Pérou - Trésors uniques et exclusifs\r\nLe Pérou est béni par une biodiversité extraordinaire, offrant une gamme de produits naturels d\'une qualité exceptionnelle. Des super-aliments tels que la quinoa et la maca aux précieux textiles en fibres naturelles, en passant par les cosmétiques et les produits médicinaux, notre blog vous guidera à travers les richesses naturelles uniques du Pérou. Vous découvrirez les bienfaits de ces trésors naturels et comment ils peuvent enrichir votre vie de manière durable.\r\n\r\nParagraphe 4 : Notre engagement social et solidaire\r\nEn plus de notre passion pour la découverte et le partage, nous avons à cœur de soutenir les enfants victimes du trafic d\'êtres humains dans la région de Cuzco et les familles Qeros. Grâce à notre blog, nous espérons sensibiliser davantage de personnes à cette réalité difficile et encourager des actions positives pour améliorer leur situation. Nous vous invitons à vous joindre à notre engagement solidaire en découvrant comment vous pouvez contribuer et faire une différence concrète dans la vie de ces enfants.\r\n\r\nConclusion :\r\nBienvenue dans notre univers dédié au Pérou, à la région de Cuzco, aux Qeros et aux trésors naturels exclusifs. Notre blog est une porte ouverte vers un monde captivant, où vous découvrirez des histoires inspirantes, des faits étonnants et une vision optimiste de ce que le Pérou a à offrir. Rejoignez-nous dans cette aventure culturelle et solidaire, et laissez-vous envoûter par la magie de cette terre millénaire. Ensemble, nous pouvons faire une différence et soutenir ceux qui en ont le plus besoin.', '2023-07-12 12:07:57', 'assets/img/disco solar.jpg', '', '', ''),
(2, 'Machu Picchu', ' l\'une des 7 Merveilles du MOnde', '2023-07-12 21:24:25', 'assets/img/mapi.jpg', '', '', ''),
(3, 'test2', 'test2', '2023-07-17 11:17:58', 'assets/img/qero.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_produit` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `prix_vente` double DEFAULT NULL,
  `image_path` varchar(270) NOT NULL,
  `Title` varchar(210) NOT NULL,
  `meta_description` varchar(360) NOT NULL,
  `meta_keywords` varchar(450) NOT NULL,
  `baliseTitle` varchar(210) NOT NULL,
  `metaDescription` varchar(360) NOT NULL,
  `metaKeywords` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `date_creation`, `nom_produit`, `description`, `prix_vente`, `image_path`, `Title`, `meta_description`, `meta_keywords`, `baliseTitle`, `metaDescription`, `metaKeywords`) VALUES
(1, '2023-07-06 08:57:14', 'CAMU CAMU : Myrciaria Dubia', 'Description :\r\nLe Camu Camu est un petit fruit de la taille d\'une cerise qui pousse dans les régions marécageuses de l\'Amazonie péruvienne, en particulier près de Pucallpa. Reconnu pour sa forte teneur en vitamine C, c\'est un superaliment riche en antioxydants.\r\n\r\nComposition :\r\nNos gélules de Camu Camu sont composées à 100% de Camu Camu biologique, récolté à la main par la communauté Shipibos. La pulvérisation à froid de ce fruit permet de conserver la majorité de ses nutriments, en particulier sa haute teneur en vitamine C, en acides aminés et en minéraux.\r\n\r\nConseils d\'utilisation :\r\nPrenez 1 à 2 gélules de Camu Camu par jour, de préférence avec un repas. Les gélules peuvent être ouvertes et leur contenu peut être saupoudré sur vos aliments ou incorporé dans vos boissons.', 25, 'assets/img/camucamu.jpg', '', '', '', '', '', ''),
(2, '2023-07-06 08:57:14', 'MACA : Lepidium meyenii', 'Description :\r\nLa Maca est une plante qui pousse dans les Andes péruviennes, particulièrement dans la région de Junin, à plus de 4000 mètres d\'altitude. Elle est utilisée depuis des millénaires pour ses propriétés nutritives et pour favoriser l\'équilibre hormonal.\r\n\r\nComposition :\r\nNos gélules de Maca sont composées à 100% de Maca biologique. La racine est récoltée à la main et transformée à froid pour conserver sa valeur nutritive, offrant une source riche en vitamines B, C et E, en calcium, zinc, fer, magnésium, phosphore et acides aminés.\r\n\r\nConseils d\'utilisation :\r\nPrenez 1 à 2 gélules de Maca par jour, de préférence avec un repas. Les gélules peuvent être ouvertes et leur contenu saupoudré sur vos aliments ou incorporé dans vos boissons.', 25, 'assets/img/maca.jpg', '', '', '', '', '', ''),
(3, '2023-07-10 11:33:57', 'GUARANA Paullinia Cupana', 'Description :\r\nLe Guarana est une plante originaire de l\'Amazonie, particulièrement appréciée pour ses graines riches en caféine. Ces graines sont utilisées depuis des siècles par les communautés indigènes pour leur apport en énergie et leur capacité à améliorer la concentration et la vigilance.\r\n\r\nComposition :\r\nNos gélules de Guarana sont composées à 100% de graines de Guarana biologiques. Les graines sont récoltées à la main et transformées à froid pour conserver leurs propriétés naturelles. Le Guarana est une source exceptionnelle de caféine naturelle, de théobromine, de tannins et de vitamines du groupe B.\r\n\r\nConseils d\'utilisation :\r\nPrenez 1 à 2 gélules de Guarana par jour, de préférence le matin ou avant une activité physique. En raison de sa teneur en caféine, il est conseillé de ne pas consommer de Guarana avant de dormir.', 25, 'assets/img/guarana.jpg', '', '', '', '', '', ''),
(7, '2023-07-11 09:02:59', 'SACHA INCHI Plukenetia volubilis', 'Description :\r\nLe Sacha Inchi, souvent appelé \"cacahuète des Incas\", est une plante originaire du Pérou, en particulier de la région de Machu Picchu. Ses graines sont reconnues pour leur haute teneur en oméga 3, 6 et 9.\r\n\r\nComposition :\r\nNos gélules de Sacha Inchi sont composées à 100% de Sacha Inchi biologique. Les graines sont récoltées à la main et transformées à froid pour préserver leur richesse en nutriments, offrant une source exceptionnelle d\'oméga 3, 6 et 9, de protéines et de vitamine E.\r\n\r\nConseils d\'utilisation :\r\nPrenez 1 à 2 gélules de Sacha Inchi par jour, de préférence avec un repas. Les gélules peuvent être ouvertes et leur contenu saupoudré sur vos aliments ou incorporé dans vos boissons.', 30, 'assets/img/sachainchi.jpg', '', '', '', '', '', ''),
(8, '2023-07-11 09:10:38', 'ACAÏ Euterpe oleracea ', 'Description :\r\nL\'Acaï est un petit fruit pourpre qui pousse sur les palmiers Acaï en Amazonie. Riche en antioxydants, en fibres et en acides gras essentiels, l\'Acaï est connu pour ses propriétés énergisantes et anti-âge.\r\n\r\nComposition :\r\nNos gélules d\'Acaï sont composées à 100% d\'Acaï biologique. Le fruit est soigneusement récolté et transformé à froid pour préserver sa richesse nutritionnelle. L\'Acaï est une source incroyable d\'antioxydants, de fibres, d\'oméga 6 et 9 et de vitamines A, B et C.\r\n\r\nConseils d\'utilisation :\r\nPrenez 1 à 2 gélules d\'Acaï par jour, de préférence avec un repas. Les gélules peuvent être ouvertes et leur contenu peut être saupoudré sur vos aliments ou incorporé dans vos boissons.', 30, 'assets/img/acai.jpg', '', '', '', '', '', ''),
(10, '2023-07-11 09:29:40', 'MORINGA oleifera', 'Description :\r\nLa Moringa, également connue sous le nom de \"l\'arbre miracle\", est une plante native des régions subtropicales, cultivée en particulier dans la région de Quillabamba au Pérou. Ses feuilles sont une source riche et naturelle de vitamines, minéraux, protéines, antioxydants et acides aminés essentiels.\r\n\r\nComposition :\r\nNos gélules de Moringa sont composées à 100% de feuilles de Moringa biologiques. Ces feuilles sont récoltées à la main et transformées à froid pour préserver leur valeur nutritionnelle, fournissant une source exceptionnelle de vitamines A, B, C, D et E, de calcium, de potassium, de protéines et d\'antioxydants.\r\n\r\nConseils d\'utilisation :\r\nPrenez 1 à 2 gélules de Moringa par jour, de préférence avec un repas. Les gélules peuvent être ouvertes et leur contenu saupoudré sur vos aliments ou incorporé dans vos boissons.', 25, 'assets/img/moringa.jpg', '', '', '', '', '', ''),
(12, '2023-07-12 08:47:20', 'test', 'test', 25, 'assets/img/moringa.jpg', '', '', '', '', '', ''),
(13, '2023-07-12 08:49:31', 'test', 'test', 123, 'assets/img/camucamu.jpg', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `temoignages`
--

CREATE TABLE `temoignages` (
  `id_temoignage` int NOT NULL,
  `titre` varchar(210) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_photo` int DEFAULT NULL,
  `image_path` varchar(210) NOT NULL,
  `baliseTitle` varchar(210) NOT NULL,
  `metaDescription` varchar(360) NOT NULL,
  `metaKeywords` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `temoignages`
--

INSERT INTO `temoignages` (`id_temoignage`, `titre`, `description`, `date_creation`, `id_photo`, `image_path`, `baliseTitle`, `metaDescription`, `metaKeywords`) VALUES
(1, 'consommateur du Camu camu; \r\nJean Maurice de Tiagne', 'très satisfait du produit', '2023-07-12 13:49:40', NULL, '', '', '', ''),
(2, 'Le Pérou c\'est bien le Pérou', 'thème sur l\'expression \"c\'est pas le Pérou\"', '2023-07-16 11:36:07', NULL, 'assets/img/c\'estPasLePérou.jpg', '', '', ''),
(3, 'la Maca, ', 'produit très bon pour la mémoire et la concentration', '2023-07-17 09:34:33', NULL, 'assets/img/qero.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `hash` varchar(250) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(250) DEFAULT NULL,
  `date_validite_token` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `hash`, `tel`, `date_naissance`, `date_inscription`, `token`, `date_validite_token`) VALUES
(1, 'Taufiq', '', 'nono@gmail.com', '$2y$10$/JLwQ7HWAI5/UhMs75grZeXNaWy5GcME26TImwBsYqrgQN2iCuyZG', NULL, '1992-06-22', '2023-07-10 09:02:42', NULL, '0000-00-00 00:00:00'),
(2, 'Taufiq', 'Othman', 'o@gmail.com', '$2y$10$rh4MdCVjB1hL4PQcdKPRye/wDl5jqeMYdCNJl5E6CgoI8JL98fckO', NULL, '1992-06-22', '2023-07-10 09:30:13', '927d0502fd2f2c96fca45b908072acb41e105358', NULL);
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`),
  ADD KEY `fk_adresses_utilisateurs1` (`id_utilisateur`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_commandes_utilisateurs1` (`id_utilisateur`),
  ADD KEY `fk_commandes_mode_paiement1` (`id_mode_paiement`),
  ADD KEY `fk_commandes_mode_livraison1` (`id_mode_livraison`),
  ADD KEY `fk_commandes_adresses1` (`id_adresse`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `fk_commentaires_utilisateurs1` (`id_utilisateur`),
  ADD KEY `fk_commentaires_posts1` (`id_post`);

--
-- Index pour la table `mode_livraison`
--
ALTER TABLE `mode_livraison`
  ADD PRIMARY KEY (`id_mode_livraison`);

--
-- Index pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  ADD PRIMARY KEY (`id_mode_paiement`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `temoignages`
--
ALTER TABLE `temoignages`
  ADD PRIMARY KEY (`id_temoignage`),
  ADD KEY `fk_temoignages_photos1` (`id_photo`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mode_livraison`
--
ALTER TABLE `mode_livraison`
  MODIFY `id_mode_livraison` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  MODIFY `id_mode_paiement` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `temoignages`
--
ALTER TABLE `temoignages`
  MODIFY `id_temoignage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `fk_adresses_utilisateurs1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_adresses1` FOREIGN KEY (`id_adresse`) REFERENCES `adresses` (`id_adresse`),
  ADD CONSTRAINT `fk_commandes_mode_livraison1` FOREIGN KEY (`id_mode_livraison`) REFERENCES `mode_livraison` (`id_mode_livraison`),
  ADD CONSTRAINT `fk_commandes_mode_paiement1` FOREIGN KEY (`id_mode_paiement`) REFERENCES `mode_paiement` (`id_mode_paiement`),
  ADD CONSTRAINT `fk_commandes_utilisateurs1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_commentaires_posts1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`),
  ADD CONSTRAINT `fk_commentaires_utilisateurs1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`);

--
-- Contraintes pour la table `temoignages`
--
ALTER TABLE `temoignages`
  ADD CONSTRAINT `fk_temoignages_photos1` FOREIGN KEY (`id_photo`) REFERENCES `photos` (`id_photo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
