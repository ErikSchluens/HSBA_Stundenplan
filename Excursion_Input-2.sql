-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 06. Nov 2023 um 17:29
-- Server-Version: 5.7.39
-- PHP-Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Stundenplan`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Excursion_Input`
--

CREATE TABLE `Excursion_Input` (
  `num` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `1Wahl` varchar(255) NOT NULL,
  `2Wahl` varchar(255) NOT NULL,
  `3Wahl` varchar(255) NOT NULL,
  `4Wahl` varchar(255) NOT NULL,
  `5Wahl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Excursion_Input`
--

INSERT INTO `Excursion_Input` (`num`, `username`, `1Wahl`, `2Wahl`, `3Wahl`, `4Wahl`, `5Wahl`) VALUES
(1, 'Karstens.HSBA', 'Lissabon', 'Athen', 'Bilbao', 'Bordeux', 'Albanien');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Excursion_Input`
--
ALTER TABLE `Excursion_Input`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Excursion_Input`
--
ALTER TABLE `Excursion_Input`
  MODIFY `num` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
