-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2026 at 05:47 PM
-- Server version: 12.2.2-MariaDB
-- PHP Version: 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fjell`
--

-- --------------------------------------------------------

--
-- Table structure for table `fjelltur`
--

CREATE TABLE `fjelltur` (
  `id` int(8) NOT NULL,
  `navn` varchar(100) NOT NULL COMMENT 'Navnet på fjellturen',
  `beskrivelse` varchar(255) NOT NULL,
  `dato` date NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `person` int(45) NOT NULL,
  `fjell` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fjelltur`
--

INSERT INTO `fjelltur` (`id`, `navn`, `beskrivelse`, `dato`, `thumbnail`, `person`, `fjell`) VALUES
(1, 'Lyderhorn med Ivan og Andreas', 'Gikk opp Lyderhorn sammen med Ivan og Andreas. Var egentlig planlagt at vi skulle være flere, men de andre ditchet oss. Disse folkene var da Konrad, Viggo, Mats og Tobias Helgøy. :(', '2026-03-21', 'lyderhornmedivanogandreas2026-03-21.jpg', 1, 2),
(3, 'Vidden med Viggo, Konrad, Mats og Andreas', 'Gikk over Vidden med folkene nevnt i turnavnet. Det var veldig koselig, selvom Konrad, Mats og Andreas gikk fra meg og Viggo på krysset med veien til Fløyen og veien til Hjorteland.', '2026-03-07', 'viddenmedviggo,konrad,matsogandreas2026-03-07.jpg', 1, 6),
(6, 'Lyderhorn alene', 'Gikk på Lyderhorn alene, og fikk en ny high-score opp og ned. 39 minutter opp, og 1 time og 20 minutter både opp og ned. Var mye snø, vind, hagel og regn, så det ble litt tregere', '2026-03-30', 'Lyderhorn-alene-2026-03-30.jpeg', 1, 2),
(7, 'Lyderhorn med Magnus', 'Gikk over Lyderhorn med Magnus Grimholt. Fordi vi gikk i desember, ble det veldig fort mørkt, og vi fikk bruk for hodelykten min.', '2025-12-27', 'Lyderhorn-med-Magnus-2025-12-27.jpeg', 1, 2),
(8, 'Lyderhorn alene (28 minutter opp)', 'Denne turen gikk jeg opp Lyderhorn alene, på påskeaften. Det var veldig chill, og det var litt sånn \"impulstur\". Var fint vær, så jeg bestemte meg for å gå opp. Jeg slå highscoren! Det tok meg 28 minutter å gå opp, og 64 minutter å gå ned. Veldig kult! Op', '2026-04-04', 'Lyderhorn-alene-(28-minutter-opp)-2026-04-04.jpeg', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fjelltur`
--
ALTER TABLE `fjelltur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personid` (`person`),
  ADD KEY `fjellid` (`fjell`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fjelltur`
--
ALTER TABLE `fjelltur`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fjelltur`
--
ALTER TABLE `fjelltur`
  ADD CONSTRAINT `fjellid` FOREIGN KEY (`fjell`) REFERENCES `fjell` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personid` FOREIGN KEY (`person`) REFERENCES `person` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
