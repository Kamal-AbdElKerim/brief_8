-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 déc. 2023 à 10:16
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `best_électroniques_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `super_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `Email`, `Password`, `super_admin`) VALUES
(0, 'islam@gmail.com', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `Nom`, `Description`, `img`, `deleted_at`) VALUES
(87, 'Boitiers PC ', 'Boitiers PC Pour Pc', 'Dashboard/photo_Catégories/image_6579ac623c2162.90393365.jpg', NULL),
(88, 'Cartes Meres', 'CARTES MÈRES Pour Pc\r\n', 'Dashboard/photo_Catégories/image_657e02ab5d4d87.17651640.jpg', NULL),
(89, 'PC Portables', 'Good PC Portables', 'Dashboard/photo_Catégories/image_656665bb355973.01161439.jpg', NULL),
(100, 'Processeurs', 'Processeurs Pour Pc', 'Dashboard/photo_Catégories/image_6564b1f35c3521.10236942.jpg', NULL),
(101, 'Cartes graphiques', 'Cartes graphiques Pour Pc', 'Dashboard/photo_Catégories/image_6564b2be94b579.40717181.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `details_id` int(11) NOT NULL,
  `names` varchar(1000) DEFAULT NULL,
  `prix_total` decimal(10,2) DEFAULT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `id_user` int(255) NOT NULL,
  `confirm_achter` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `details_commande`
--

INSERT INTO `details_commande` (`details_id`, `names`, `prix_total`, `commande_id`, `id_user`, `confirm_achter`, `created_at`) VALUES
(28, 'cooler master masterbox mb520 || fractal design north || corsair 3000d rgb', 4300.00, 36752079, 266, 1, '2023-12-17 12:43:41'),
(30, 'gigabyte-trx40-aorus-pro-wifi', 7500.00, 10265598, 266, 1, '2023-12-18 09:15:45');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `panier_id` int(255) NOT NULL,
  `Etiquette` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `OffreDePrix` int(255) NOT NULL,
  `QuantiteStock` int(255) NOT NULL,
  `Stock` int(11) NOT NULL DEFAULT 1,
  `client_id` int(255) NOT NULL,
  `valid_commend` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `Reference` int(11) NOT NULL,
  `Etiquette` varchar(100) DEFAULT NULL,
  `Code à barres` varchar(255) NOT NULL,
  `PrixAchat` int(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `PrixFinal` int(255) DEFAULT NULL,
  `OffreDePrix` int(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `QuantiteMin` int(11) DEFAULT NULL,
  `QuantiteStock` int(11) DEFAULT NULL,
  `CategorieID` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`Reference`, `Etiquette`, `Code à barres`, `PrixAchat`, `img`, `PrixFinal`, `OffreDePrix`, `Description`, `QuantiteMin`, `QuantiteStock`, `CategorieID`, `deleted_at`) VALUES
(88, 'Deepcool ch560 digitalll', '#788540816885562', 800, 'Dashboard/photo_Products/image_65651a1537ff94.21462651.jpg', 1000, 850, 'deepcool-ch560-digital-black-boitiers-pcc', 10, 60, 87, '2023-12-17 22:43:30'),
(89, 'cooler master masterbox mb520', '#7885454562774', 1000, 'Dashboard/photo_Products/image_65651ac33d7e14.04088542.jpg', 1200, 1100, 'cooler-master-masterbox-mb520-mesh-argb-boitiers-pc', 50, 150, 87, NULL),
(90, 'fractal design north', '#788548786885562', 1500, 'Dashboard/photo_Products/image_65660b9108d328.86598289.jpg', 2000, 1700, 'fractal-design-north-chalk-tg-clear-white-boitiers-pc', 12, 50, 87, NULL),
(91, 'corsair carbide spec omega', '#7885481681262', 2500, 'Dashboard/photo_Products/image_65665fba68b575.86423046.jpg', 3000, 2700, 'corsair-carbide-spec-omega-rgb-blanc-boitiers-pc', 10, 60, 87, NULL),
(92, 'corsair 3000d rgb', '#78854816885562', 1000, 'Dashboard/photo_Products/image_65666131637e34.61884587.jpg', 1962, 1500, 'corsair-3000d-rgb-airflow-noir-boitiers-pc', 2, 5, 87, NULL),
(96, 'asus-rog-strix-x570-f-gaming', '#78854816885562', 7000, 'Dashboard/photo_Products/image_656664359fa7a5.55106797.jpg', 8000, 7500, 'asus-rog-strix-x570-f-gaming-cartes-meres', 20, 10, 88, NULL),
(97, 'gigabyte-trx40-aorus-pro-wifi', '#78854816885562', 7000, 'Dashboard/photo_Products/image_6566648aa7a7b0.37835708.jpg', 8000, 7500, 'gigabyte-trx40-aorus-pro-wifi-cartes-meres', 20, 10, 88, NULL),
(98, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(99, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(100, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(119, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(120, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(121, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(122, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(123, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(124, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(125, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, '2023-12-17 22:44:07'),
(126, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(127, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(128, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(129, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(130, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(131, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(132, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(133, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(134, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(135, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(136, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(137, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(138, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL),
(139, 'apple-macbook-pro-14-m1-max-10', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65673809950bb8.11064371.jpg', 11200, 111000, 'apple-macbook-pro-14-m1-max-10-core-gpu32-core-64gb-ssd-1tb-macbook-pro(1)', 10, 433, 89, NULL),
(140, 'razer-blade-17-i9-12900h-16gb', '#78854816885562', 11000, 'Dashboard/photo_Products/image_65666603db4386.34449556.jpg', 15000, 12000, 'razer-blade-17-i9-12900h-16gb-1tb-ssd-rtx3070ti-12gb-16-qhd-240hz', 20, 100, 89, NULL),
(141, 'dell-latitude-5420-i7-1185g7', '#78854816885562', 14000, 'Dashboard/photo_Products/image_6567379861c9c2.46404488.jpg', 19000, 15000, 'dell-latitude-5420-i7-1185g7-32go512go-ssd', 21, 36, 89, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prénom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `is_Active` int(255) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prénom`, `phone`, `Email`, `adresse`, `ville`, `Password`, `is_Active`) VALUES
(266, NULL, '', '', 'io@gmail.com', '', '', '1234568668', 1),
(270, NULL, '', '', 'lol@gmail.com', '', '', '12345678989', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `commande_id` (`commande_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`panier_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`Reference`),
  ADD KEY `CategorieID` (`CategorieID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100124;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `panier_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `Reference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`CategorieID`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
