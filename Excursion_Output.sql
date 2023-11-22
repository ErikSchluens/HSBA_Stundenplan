-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 21. Nov 2023 um 10:06
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
-- Tabellenstruktur für Tabelle `Excursion_Output`
--

CREATE TABLE `Excursion_Output` (
  `variable` varchar(255) NOT NULL,
  `wert` varchar(265) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Excursion_Output`
--

INSERT INTO `Excursion_Output` (`variable`, `wert`) VALUES
('X11', '0.0'),
('X12', '1.0'),
('X13', '0.0'),
('X14', '0.0'),
('X15', '0.0'),
('X16', '0.0'),
('X21', '0.0'),
('X22', '1.0'),
('X23', '0.0'),
('X24', '0.0'),
('X25', '0.0'),
('X26', '0.0'),
('X31', '0.0'),
('X32', '0.0'),
('X33', '1.0'),
('X34', '0.0'),
('X35', '0.0'),
('X36', '0.0');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Excursion_Output`
--
ALTER TABLE `Excursion_Output`
  ADD PRIMARY KEY (`variable`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
