-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 juin 2023 à 19:33
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
-- Base de données : `sae_resaweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `description`, `logo`) VALUES
(1, 'BMW', '', 'https://th.bing.com/th/id/R.426cf72a258f0ca1108f424fddc941a1?rik=2KTAfYnivCcAxw&pid=ImgRaw&r=0'),
(2, 'AUDI', '', 'https://cdn.1min30.com/wp-content/uploads/2017/08/Logo-Audi.png'),
(5, 'MERCEDES', '', 'https://logodownload.org/wp-content/uploads/2014/04/mercedes-benz-logo-1.png');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `prix` decimal(10,2) NOT NULL,
  `id_marque` int DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `gamme` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_marque` (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `id_marque`, `photo`, `gamme`) VALUES
(1, 'BMW M2 Coupe', 'La BMW M2 Coupe, un veritable chef-doeuvre de performance et d\'elegance, incarne l\'essence meme de la conduite sportive. Avec son design audacieux et sa puissance inegalee, cette voiture offre une experience de conduite exceptionnelle qui ne manquera pas de vous faire battre le coeur plus fort.', '150.00', 1, 'https://th.bing.com/th/id/OIP.qYL0ig3v4D7dFHtA5N1r7gHaE8?pid=ImgDet&rs=1', 'coupe'),
(2, 'BMW M3 Competition Berline', 'La BMW M3 Competition Berline, une combinaison ultime de luxe, de performance et de sophistication, redefinit les normes de l\'experience de conduite sportive. Dotee d\'un design dynamique et d\'une puissance phenomenale, cette berline haut de gamme vous transportera dans un monde different.', '180.00', 1, 'https://th.bing.com/th/id/R.1f6837be8e084426d12500be9b85a55b?rik=emwLdewpIyEnVQ&pid=ImgRaw&r=0', 'berline'),
(3, 'BMW M4 Competition Coupe', 'La BMW M4 Competition Coupe, un symbole incontestable de performances extremes et de design captivant, repousse les limites de la conduite sportive. Avec son allure agressive et ses performances epoustouflantes, cette coupe incarne la quintessence de la passion automobile.\r\n\r\n', '220.00', 1, 'https://th.bing.com/th/id/R.fc117199807329fb2a004945db3f7f52?rik=Vwh7HoKHtrRvUA&pid=ImgRaw&r=0', 'coupe'),
(4, 'BMW M8 Competition Coupe', 'Des le premier regard, la BMW M8 Competition Coupe captive l\'attention avec son allure audacieuse et sa presence imposante. Son design sculptural, ses lignes dynamiques et ses details distinctifs temoignent de son caractere sportif.', '250.00', 1, 'https://th.bing.com/th/id/OIP.WzPfnX5koFQtn-8C0HrSVAHaE8?pid=ImgDet&rs=1', 'coupe'),
(5, 'BMW X4 M Competition', 'Cette fusion parfaite entre un SUV sportif et un design captivant, repousse les limites de la performance et du style. Avec son allure athletique et ses performances exceptionnelles, ce SUV coupe incarne la passion de la conduite.', '270.00', 1, 'https://th.bing.com/th/id/OIP.6dgiLedOi2dqL82RMvjvuQHaE8?pid=ImgDet&rs=1', 'suv'),
(6, 'BMW X6 M Competition', 'Le BMW X6 M Competition, un monstre de puissance et d\'elegance, fusionne l\'allure athletique d\'un SUV avec des performances extraordinaires. Avec son design saisissant et son moteur suralimente, ce SUV incarne le mariage parfait entre l\'audace et le confort.', '300.00', 1, 'https://th.bing.com/th/id/OIP.RV9ZSrJB9hCL9bXfJIBU4AHaE8?pid=ImgDet&rs=1', 'suv'),
(7, 'AUDI RS 3', 'l\'Audi RS 3 Berline captive l\'attention avec ses lignes acerees et son allure sportive. Son design agressif est souligne par des elements distinctifs tels que la calandre Singleframe elargie, les prises d\'air audacieuses et les jantes exclusives.', '150.00', 2, 'https://th.bing.com/th/id/OIP.oShj2UtGw_SEoaO3-wDMTQHaE7?pid=ImgDet&rs=1', 'berline'),
(8, 'AUDI RS 5', 'Que vous recherchiez des performances palpitantes sur circuit ou un coupe de luxe pour vos trajets quotidiens, l\'Audi RS 5 Coupe est prete pour vous offrir une experience de conduite inegalee. Avec son equilibre parfait entre performances exceptionnelles,', '180.00', 2, 'https://th.bing.com/th/id/OIP.V3VJpVof9HeTQWAGICMdFQHaE8?pid=ImgDet&rs=1', 'coupe'),
(9, 'AUDI RS 7 Sportback', 'la RS 7 Sportback abrite un moteur V8 suralimente qui delivre une puissance devastatrice. Cette machine puissante vous propulse de 0-100 km/h en un temps record, et offre une experience de conduite dynamique et palpitante.', '220.00', 2, 'https://th.bing.com/th/id/OIP.uRxFI7oF7SReKfRThkyM-gHaE8?pid=ImgDet&rs=1', 'coupe'),
(10, 'AUDI RS Q3 Sportback', 'Au premier coup doeil, l\'Audi RS Q3 Sportback se distingue par son allure audacieuse et sa silhouette elancee. Son design sportif est souligne par des lignes fluides, une calandre Singleframe agressive et des details distinctifs.', '250.00', 2, 'https://th.bing.com/th/id/OIP.f1-DUzK340xQU7HtHcDUVwHaFF?pid=ImgDet&rs=1', 'suv'),
(11, 'AUDI RS Q8', 'L\'Audi RS Q8 attire l\'attention avec son allure imposante et ses lignes dynamiques. Sa calandre Singleframe elargie, ses entrees d\'air agressives et ses details distinctifs conferent au SUV une presence dominante sur la route. ', '270.00', 2, 'https://th.bing.com/th/id/R.70aa0e096f0dabf169ed76628a01a76c?rik=mQVWNsC0RxrxCw&pid=ImgRaw&r=0', 'suv'),
(12, 'AUDI R8 GT', 'L\'Audi R8 GT, un chef-doeuvre de l\'ingenierie automobile, incarne l\'essence meme de la performance et du luxe. Avec son design emblematique, ses performances epoustouflantes et son habitacle haut de gamme, la R8 GT offre une experience de conduite inegalee.', '300.00', 2, 'https://th.bing.com/th/id/R.de01161a26e2cb4373e325fea3501705?rik=LsB2Bw%2bVuic2tA&pid=ImgRaw&r=0', 'berline'),
(13, 'MERCEDES C63 AMG ', 'Le Coupe Classe C63 AMG de Mercedes-Benz incarne l\'elegance sportive avec ses lignes dynamiques et son interieur raffine. Il offre une experience de conduite dynamique avec sa gamme de moteurs puissants et une tenue de route precise.', '150.00', 5, 'https://th.bing.com/th/id/R.d263915ff15f572c8862258c4916ac55?rik=CYwKyRe7MSDIfg&pid=ImgRaw&r=0', 'coupe'),
(14, 'MERCEDES E63 AMG ', 'Le Coupe Classe E63 AMG de Mercedes-Benz allie style et luxe. Avec son design sophistique, son habitacle haut de gamme et ses technologies avancees, il offre une experience de conduite confortable et dynamique.', '180.00', 5, 'https://th.bing.com/th/id/R.643309c75165b6baaa961e344e52a8ee?rik=A%2fChtcU7KiAGbg&pid=ImgRaw&r=0', 'coupe'),
(15, 'MERCEDES GLE ', 'Le GLE de chez Mercedes allie le luxe, la puissance et la polyvalence. Avec son design imposant, son interieur spacieux et ses performances exceptionnelles, il offre une experience de conduite haut de gamme sur route et hors route.', '220.00', 5, 'https://www.mercedes-benz.no/passengercars/mercedes-benz-cars/models/gle/suv-v167/amg/equipmentcomparison/_jcr_content/comparisonslider/par/comparisonslide/exteriorImage.MQ1.12.2x.20210326140500.jpeg', 'suv'),
(16, 'MERCEDES Classe G63 S', 'Avec son melange parfait entre performances incroyables, design robuste et interieur somptueux, ce SUV de haute performance offre une experience de conduite inegalee. Preparez-vous pour vivre des moments de plaisir au volant du Mercedes Classe G63 S.', '250.00', 5, 'https://th.bing.com/th/id/OIP.4-u2_RhCUxy1n1phmGtk2QHaFj?pid=ImgDet&rs=1', 'suv'),
(17, 'MERCEDES A45 S AMG\r\n', 'La Mercedes-AMG A45 S, une compacte haute performance, incarne la puissance, l\'agilite et le luxe dans un format compact. Avec son design sportif, ses performances exceptionnelles et son interieur haut de gamme, ce 4 cylindres  offre une experience de conduite dynamique et exaltante.', '270.00', 5, 'https://th.bing.com/th/id/OIP.LGeOxfRx1j49EQxCYclg7AHaEc?w=288&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 'berline'),
(18, 'MERCEDES CLA 45 S AMG', 'La Mercedes-AMG CLA 45 S, une berline compacte de haute performance, allie elegance, sportivite et luxe. Avec son design seduisant, ses performances remarquables et son interieur raffine, la CLA 45 S AMG offre une experience de conduite exaltante.', '300.00', 5, 'https://www.turbo.fr/sites/default/files/styles/article_690x405/public/2019-08/essai-mercedes-amg-cla-45-s-4matic.png?itok=4H9HnQnm', 'berline');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `date_start` datetime NOT NULL,
  `date_finish` datetime NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `id_produit`, `date_start`, `date_finish`, `nom`, `prenom`, `telephone`, `mail`, `ville`) VALUES
(1, 1, '2023-06-22 00:00:00', '2023-07-01 00:00:00', 'SAKKAL', 'Ahmed-Amine', '0757775512', 'ahmedamine.sakkal@gmail.com', 'Charenton-le-Pont'),
(2, 1, '2023-06-22 00:00:00', '2023-07-01 00:00:00', 'SAKKAL', 'Ahmed-Amine', '0757775512', 'ahmedamine.sakkal@gmail.com', 'Charenton-le-Pont'),
(3, 1, '2023-06-22 00:00:00', '2023-07-01 00:00:00', 'SAKKAL', 'Ahmed-Amine', '0757775512', 'ahmedamine.sakkal@gmail.com', 'Charenton-le-Pont'),
(4, 1, '2023-06-22 00:00:00', '2023-07-01 00:00:00', 'SAKKAL', 'Ahmed-Amine', '0757775512', 'ahmedamine.sakkal@gmail.com', 'Charenton-le-Pont'),
(5, 1, '2023-06-22 00:00:00', '2023-07-01 00:00:00', 'SAKKAL', 'Ahmed-Amine', '0757775512', 'ahmedamine.sakkal@gmail.com', 'Charenton-le-Pont'),
(6, 1, '2023-06-22 00:00:00', '2023-07-01 00:00:00', 'SAKKAL', 'Ahmed-Amine', '0757775512', 'ahmedamine.sakkal@gmail.com', 'Charenton-le-Pont'),
(7, 1, '2023-06-22 00:00:00', '2023-07-01 00:00:00', 'SAKKAL', 'Ahmed-Amine', '0757775512', 'ahmedamine.sakkal@gmail.com', 'Charenton-le-Pont'),
(8, 1, '2023-06-29 00:00:00', '2023-07-01 00:00:00', 'sakkal', 'iliass', '059105044', 'ahmedamine.sakkal@gmail.com', 'angers'),
(9, 1, '2023-06-04 00:00:00', '2023-06-18 00:00:00', 'sakkal', 'ahmed-amine', '059105044', 'ahmedamine.sakkal@gmail.com', 'angers'),
(10, 1, '2023-06-04 00:00:00', '2023-06-11 00:00:00', 'sakkal', 'ahmed-amine', '059105044', 'gahabi3557@ratedane.com', 'angers'),
(11, 6, '2023-06-08 00:00:00', '2023-06-10 00:00:00', 'ashani', 'adelina', '0777444512', 'ashani.adelina@gmail.com', 'CrÃ©teil'),
(12, 2, '2023-06-05 00:00:00', '2023-06-19 00:00:00', 'breux', 'louis', '5552515118', 'louisr2d2@hotmail.fr', 'montreuil'),
(13, 4, '2023-06-05 00:00:00', '2023-06-19 00:00:00', 'rodriguez', 'alex', '15448552', 'alexsanderrp58@gmail.com', 'sevran'),
(14, 5, '2023-06-05 00:00:00', '2023-06-19 00:00:00', 'rodriguez', 'alex', '15448552', 'alexsanderrp58@gmail.com', 'sevran'),
(15, 1, '2023-06-05 00:00:00', '2023-06-07 00:00:00', 'Niel', 'Odile', '588888', 'odilelyon@wanadoo.fr', 'champs'),
(16, 2, '2023-06-07 00:00:00', '2023-06-21 00:00:00', 'Benazzouz', 'Amin', '0612182430', 'aminbenazzouz9@gmail.com', 'Clichy');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
