-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 19. Nov 2023 um 13:56
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
-- Tabellenstruktur für Tabelle `Excursion_Zwischentabelle`
--

CREATE TABLE `Excursion_Zwischentabelle` (
  `num` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Hamburg` int(11) NOT NULL DEFAULT '10',
  `Lissabon` int(11) NOT NULL DEFAULT '10',
  `Athen` int(11) NOT NULL DEFAULT '10',
  `Bilbao` int(11) NOT NULL DEFAULT '10',
  `Bordeaux` int(11) NOT NULL DEFAULT '0',
  `Limasol` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
