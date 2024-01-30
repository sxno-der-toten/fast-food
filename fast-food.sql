-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 jan. 2024 à 18:53
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fast-food`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Pizza', ''),
(2, 'Burgers', '');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `poids` int NOT NULL,
  `calories` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `poids`, `calories`) VALUES
(4, 'Pains', 16, 96),
(6, 'Salade', 2, 226),
(7, 'Steak', 100, 11300),
(8, 'Oignons', 2, 226),
(9, 'Fromage', 25, 2825),
(10, 'Miel', 6, 678);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `nickname`, `email`, `password`, `is_admin`, `created_at`) VALUES
(7, 'youhess', 'youhess@test.com', '$2y$10$Z6Msib60TrusmSFj8RCfZOTy.TOTjNTEknA8lOYprR5Xw5Z2TaFPC', 0, '2024-01-23 13:22:49'),
(8, 'admin', 'admin@test.com', '$2y$10$oFoq0p8ZPYeGZ8xzrLrKsOFaAIsJrrN2cVT5UJhT2rJrJqEnG0Vda', 1, '2024-01-23 14:36:18');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total_amount` decimal(8,0) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','processing','shipped','delivered') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `user_it` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `purchase_price` decimal(8,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image_url`, `purchase_price`) VALUES
(1, 1, 'Chèvre-Miel', 'Venez déguster la pizza chèvre miel, une création délicieuse avec une base de pâte fine, une sauce tomate acidulée, du fromage de chèvre crémeux, le tout couronné de filets de miel pour une combinaison parfaite de saveurs sucrées et salées. Nous vous garantissons une expérience gustative équilibrée et délicieuse.', '17', 'assets/images/pizza_cm.png', '5'),
(2, 1, 'Pepperoni', 'La pizza pepperoni est une classique indémodable. Sa base consiste en une pâte fine et croustillante, recouverte d\'une sauce tomate généreuse. L\'étoile de cette pizza est le pepperoni, des fines tranches de saucisson épicé qui apportent une saveur robuste et relevée. Le fromage fondu recouvre l\'ensemble, créant une texture onctueuse. Une option simple, mais toujours irrésistible pour les amateurs de pizzas traditionnelles.', '11', 'assets/images/pizza_pp.png', '2'),
(3, 1, 'Boeuf', 'Goutez à notre toute nouvelle pizza au bœuf, offrant une délicieuse variation. Sa base est une pâte fine et croustillante, nappée d\'une savoureuse sauce tomate. Les morceaux de bœuf, préalablement cuits à la perfection, sont disposés sur la pizza pour apporter une texture tendre et une saveur riche. Le fromage fondu vient compléter l\'ensemble, ajoutant une touche crémeuse. Une option savoureuse pour ceux qui recherchent une pizza copieuse et pleine de saveurs carnées.', '12', 'assets/images/pizza_bf.png', '3'),
(4, 1, 'Chorizo', 'La pizza chorizo est une explosion de saveurs méditerranéennes. Sur une base de pâte moelleuse, une généreuse couche de sauce tomate est garnie de fines tranches de chorizo, offrant une alliance parfaite entre la robustesse épicée de la saucisse espagnole et la douceur de la sauce. Le fromage fondant vient compléter cette création, créant une pizza équilibrée et délicieusement relevée.', '11', 'assets/images/pizza_ch.png', '3'),
(5, 2, 'Chèvre-Miel', 'Le délicieux burger chèvre miel est une délicieuse fusion de saveurs. Entre deux moelleux pains, vous découvrirez un savoureux steak garni de fromage de chèvre fondant. L\'ensemble est sublimé par une touche sucrée de miel, créant une harmonie parfaite entre le crémeux du fromage et la douceur dorée du miel. Un plaisir gourmand qui allie la simplicité d\'un burger classique à une expérience gustative raffinée.', '13', 'assets/images/burger_cm.png', '1'),
(6, 2, '« L »', 'Le hamburger taille L est une expérience gourmande généreuse. Vous trouverez 2 larges steak juteux, accompagnés de garnitures copieuses. Cette version taille L promet une dégustation satisfaisante, avec des dimensions imposantes qui vous offrent une portion généreuse de plaisir culinaire. Un hamburger qui satisfait les appétits les plus voraces tout en conservant la qualité et la saveur d\'une création bien équilibrée.', '8', 'assets/images/steak L.png', '2'),
(7, 2, 'Big Max', 'Ce burger fait référence à Maxime le gros, célèbre athlète. Composé de d\'un pain moelleux et trois étages de délices : un steak haché grillé, une sauce spéciale, des cornichons croquants, de la laitue fraîche et du fromage fondu. C\'est une combinaison savoureuse de textures et de saveurs qui a aussi fait la renommée de ce burger emblématique.', '10', 'assets/images/big mac.png', '2');

-- --------------------------------------------------------

--
-- Structure de la table `product_ingredients`
--

DROP TABLE IF EXISTS `product_ingredients`;
CREATE TABLE IF NOT EXISTS `product_ingredients` (
  `product_id` int NOT NULL,
  `ingredient_id` int NOT NULL,
  `weight_in_grams` int NOT NULL,
  KEY `ingredient_id` (`ingredient_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `product_ingredients`
--
ALTER TABLE `product_ingredients`
  ADD CONSTRAINT `product_ingredients_ibfk_` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_ingredients_ibfk_1` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
