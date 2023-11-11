-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 11. Nov 2023 um 16:42
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
-- Tabellenstruktur für Tabelle `WBÜ_zwischentabelle`
--

CREATE TABLE `WBÜ_zwischentabelle` (
  `num` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Spanisch` int(11) NOT NULL DEFAULT '10',
  `Communication` int(11) NOT NULL DEFAULT '10',
  `Verhandlungsführung` int(11) NOT NULL DEFAULT '10',
  `Selfempowerment` int(11) NOT NULL DEFAULT '10',
  `presentation_skills` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `WBÜ_zwischentabelle`
--

INSERT INTO `WBÜ_zwischentabelle` (`num`, `username`, `Spanisch`, `Communication`, `Verhandlungsführung`, `Selfempowerment`, `presentation_skills`) VALUES
(1, 'Karstens.HSBA', 2, 10, 4, 10, 1),
(7, 'Otto.HSBA', 1, 10, 4, 10, 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `WBÜ_zwischentabelle`
--
ALTER TABLE `WBÜ_zwischentabelle`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
