-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 19. Nov 2023 um 13:24
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
-- Tabellenstruktur für Tabelle `WBÜ_Output`
--

CREATE TABLE `WBÜ_Output` (
  `variable` varchar(255) NOT NULL,
  `wert` varchar(265) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `WBÜ_Output`
--

INSERT INTO `WBÜ_Output` (`variable`, `wert`) VALUES
('X11', '1.0'),
('X12', '1.0'),
('X13', '0.0'),
('X14', '0.0'),
('X15', '0.0'),
('X21', '0.0'),
('X22', '0.0'),
('X23', '1.0'),
('X24', '1.0'),
('X25', '0.0'),
('X31', '0.0'),
('X32', '1.0'),
('X33', '0.0'),
('X34', '1.0'),
('X35', '0.0'),
('X41', '1.0'),
('X42', '0.0'),
('X43', '1.0'),
('X44', '0.0'),
('X45', '0.0');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `WBÜ_Output`
--
ALTER TABLE `WBÜ_Output`
  ADD PRIMARY KEY (`variable`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
