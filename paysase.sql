-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2025 at 07:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paysasev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

CREATE TABLE `favoris` (
  `utilisateur_idU` int NOT NULL,
  `pays_idP` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favoris`
--

INSERT INTO `favoris` (`utilisateur_idU`, `pays_idP`) VALUES
(8, 1),
(6, 5),
(8, 5),
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `idL` int NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`idL`, `nom`) VALUES
(1, 'Indonésien'),
(2, 'Malais'),
(3, 'Thaï'),
(4, 'Vietnamien'),
(5, 'Khmer'),
(6, 'Laotien'),
(7, 'Birman'),
(8, 'Tagalog'),
(9, 'Anglais'),
(10, 'Portugais');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `idP` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `capital` varchar(50) NOT NULL,
  `population` bigint DEFAULT NULL,
  `superficie` decimal(10,2) DEFAULT NULL,
  `photo_idPh` int DEFAULT NULL,
  `langue_idL` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`idP`, `nom`, `capital`, `population`, `superficie`, `photo_idPh`, `langue_idL`) VALUES
(1, 'Indonésie', 'Jakarta', 276361783, '1904569.00', 1, 1),
(2, 'Malaisie', 'Kuala Lumpur', 33938269, '330803.00', 2, 2),
(3, 'Thaïlande', 'Bangkok', 69799978, '513120.00', 3, 3),
(4, 'Vietnam', 'Hanoï', 98168829, '331212.00', 4, 4),
(5, 'Cambodge', 'Phnom Penh', 17167837, '181035.00', 5, 5),
(6, 'Laos', 'Vientiane', 7524832, '236800.00', 6, 6),
(7, 'Myanmar', 'Naypyidaw', 54772218, '676578.00', 7, 7),
(8, 'Philippines', 'Manille', 114597229, '300000.00', 8, 8),
(9, 'Singapour', 'Singapour', 5900000, '728.60', 9, 9),
(10, 'Timor oriental', 'Dili', 1383664, '14874.00', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `idPh` int NOT NULL,
  `chemin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`idPh`, `chemin`) VALUES
(1, 'indonesie.jpeg'),
(2, 'malaisie.jpg'),
(3, 'thailande.jpg'),
(4, 'vietnam.jpeg'),
(5, 'cambodge.jpg'),
(6, 'laos.jpg'),
(7, 'myanmar.jpg'),
(8, 'philippines.jpg'),
(9, 'singapour.jpg'),
(10, 'timor_oriental.jpg'),
(11, 'indonesie.jpeg'),
(12, 'malaisie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idU` int NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `pseudo`, `email`, `mot_de_passe`, `date_inscription`) VALUES
(6, 'Po', 'po@gmail.com', 'seyMcJUIMz/pU', '2025-03-23 15:26:59'),
(7, 'admin1', 'admin@sio.com', 'seCBdk.BxFGa6', '2025-03-23 19:06:08'),
(8, 'test', 'test@gmail.com', '$2y$10$otOfp/BK87Vbw1iSmOGtiufzpOFaqvtI8VDXJQ3VGEf.eDeWka84S', '2025-03-24 10:16:59'),
(9, 'willy.chk', 'wchheak@gmail.com', 'seiOAMBdr6q6g', '2025-03-29 18:46:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`utilisateur_idU`,`pays_idP`),
  ADD KEY `pays_idP` (`pays_idP`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`idL`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idP`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `photo_idPh` (`photo_idPh`),
  ADD KEY `langue_idL` (`langue_idL`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPh`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idU`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `idL` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `idP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idU` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`utilisateur_idU`) REFERENCES `utilisateur` (`idU`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`pays_idP`) REFERENCES `pays` (`idP`) ON DELETE CASCADE;

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`photo_idPh`) REFERENCES `photo` (`idPh`) ON DELETE SET NULL,
  ADD CONSTRAINT `pays_ibfk_2` FOREIGN KEY (`langue_idL`) REFERENCES `langue` (`idL`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
