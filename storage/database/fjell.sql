-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2026 at 06:34 PM
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
-- Table structure for table `bilde`
--

CREATE TABLE `bilde` (
  `id` int(8) NOT NULL,
  `bildetekst` varchar(150) NOT NULL,
  `filsti` varchar(50) NOT NULL,
  `tur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fjell`
--

CREATE TABLE `fjell` (
  `id` int(10) NOT NULL,
  `navn` varchar(45) NOT NULL,
  `hoyde` int(10) NOT NULL,
  `beskrivelse` varchar(250) NOT NULL,
  `region` int(16) NOT NULL,
  `fotografi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fjell`
--

INSERT INTO `fjell` (`id`, `navn`, `hoyde`, `beskrivelse`, `region`, `fotografi`) VALUES
(1, 'Ulriken', 643, 'Det høyeste av de 7 byfjellene. Ulriken har ekstremt mye aura og aura farmer over hele Bergen.', 1, 'ulriken.jpg'),
(2, 'Lyderhorn', 396, 'Lyderhorn er et av de syv byfjellene i Bergen, og ligger rundt 5km vest for sentrum i Loddefjord.', 1, 'lyderhorn.jpg'),
(6, 'Vidden', 550, 'Vidden i Bergen er \'hjertet\' av Bergens fjellstrekninger, og binder sammen mange fjell som bl.a Ulriken og Fløyen. Selve vidde platået strekker seg fra sør med Sædalen til nord med Hjorteland og Flaktveit.', 1, 'vidden.jpg');

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
(3, 'Vidden med Viggo, Konrad, Mats og Andreas', 'Gikk over Vidden med folkene nevnt i turnavnet. Det var veldig koselig, selvom Konrad, Mats og Andreas gikk fra meg og Viggo på krysset med veien til Fløyen og veien til Hjorteland.', '2026-03-07', 'viddenmedviggo,konrad,matsogandreas2026-03-07.jpg', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `omrade`
--

CREATE TABLE `omrade` (
  `id` int(10) NOT NULL,
  `navn` varchar(45) NOT NULL,
  `beskrivelse` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `omrade`
--

INSERT INTO `omrade` (`id`, `navn`, `beskrivelse`) VALUES
(1, 'Bergensfjellene', 'Byfjellene i Bergen omfatter fjellområdene øst, sør og vest for Bergensdalen. Tradisjonelt regnes det med de syv fjell rundt byen, som fra gammelt av er gjengitt i byens segl. Byfjellene ligger dels i et sammenhengende fjellplatå øst for Bergensdalen, og flere enkeltstående fjell vest for dalen. Totalt omfatter dette langt flere enn syv fjell, men begrepet er gjerne avgrenset til de fjellene som er synlige fra byen, og lå innenfor eller nær byen før byutvidelsen i 1972.');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(8) NOT NULL,
  `brukernavn` varchar(45) NOT NULL,
  `passord` varchar(100) NOT NULL,
  `epost` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `brukernavn`, `passord`, `epost`) VALUES
(1, 'Isak', '$2y$10$dt.Llvw8YkQ09pez1CQLe.ZA0yrcP4bhF0TGp4CAdRHLlEhCvDXdS', 'isak@brunhenriksen.net');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilde`
--
ALTER TABLE `bilde`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bilde` (`tur_id`),
  ADD KEY `filsti` (`filsti`);

--
-- Indexes for table `fjell`
--
ALTER TABLE `fjell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`region`);

--
-- Indexes for table `fjelltur`
--
ALTER TABLE `fjelltur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personid` (`person`),
  ADD KEY `fjellid` (`fjell`);

--
-- Indexes for table `omrade`
--
ALTER TABLE `omrade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bilde`
--
ALTER TABLE `bilde`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fjell`
--
ALTER TABLE `fjell`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fjelltur`
--
ALTER TABLE `fjelltur`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `omrade`
--
ALTER TABLE `omrade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilde`
--
ALTER TABLE `bilde`
  ADD CONSTRAINT `bilde` FOREIGN KEY (`tur_id`) REFERENCES `fjelltur` (`id`);

--
-- Constraints for table `fjell`
--
ALTER TABLE `fjell`
  ADD CONSTRAINT `region` FOREIGN KEY (`region`) REFERENCES `omrade` (`id`);

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
