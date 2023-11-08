-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 08. Nov 2023 um 13:19
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
-- Tabellenstruktur für Tabelle `WBÜ_Input`
--

CREATE TABLE `WBÜ_Input` (
  `num` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `wahl1` varchar(255) NOT NULL,
  `wahl2` varchar(255) NOT NULL,
  `wahl3` varchar(255) NOT NULL,
  `wahl4` varchar(255) NOT NULL,
  `wahl5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `WBÜ_Input`
--

INSERT INTO `WBÜ_Input` (`num`, `username`, `wahl1`, `wahl2`, `wahl3`, `wahl4`, `wahl5`) VALUES
(1, 'Karstens.HSBA', 'spanisch', 'presentation_skills', 'verhandlungsführung', 'selfempowerment', 'kommunikation'),
(2, 'Karstens.HSBA', '', 'selfempowerment', 'presentation_skills', 'kommunikation', 'spanisch'),
(4, 'Karstens.HSBA', 'verhandlungsführung', '', '', '', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `WBÜ_Input`
--
ALTER TABLE `WBÜ_Input`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `WBÜ_Input`
--
ALTER TABLE `WBÜ_Input`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
