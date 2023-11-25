-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 01. Nov 2023 um 17:24
-- Server-Version: 5.7.39
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `TimeTableknowledge`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Administration`
--

CREATE TABLE `Administration` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Administration`
--

INSERT INTO `Administration` (`admin_id`, `firstname`, `lastname`) VALUES
(1, 'Volker', 'Rossius'),
(2, 'Nadine', 'Demuth');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Courses`
--

CREATE TABLE `Courses` (
  `course_id` int(11) NOT NULL,
  `coursename` varchar(256) NOT NULL,
  `studentnumber` int(11) NOT NULL,
  `track` varchar(256) NOT NULL,
  `studyprogram_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Courses`
--

INSERT INTO `Courses` (`course_id`, `coursename`, `studentnumber`, `track`, `studyprogram_id`) VALUES
(1, '22A-BA1', 27, 'A', 1),
(2, '22A-BA2', 26, 'A', 1),
(3, '22A-BA3', 24, 'A', 1),
(4, '22A-BA4', 26, 'A', 1),
(5, '22A-BI1', 28, 'A', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lecturers`
--

CREATE TABLE `Lecturers` (
  `lecturer_id` int(11) NOT NULL,
  `lecturername` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Lecturers`
--

INSERT INTO `Lecturers` (`lecturer_id`, `lecturername`) VALUES
(1, 'Karstens'),
(2, 'Sparfeld'),
(3, 'Otto'),
(4, 'Pleiß'),
(5, 'Hartmann'),
(6, 'Prigge'),
(7, 'Faaß'),
(8, 'Köpp'),
(9, 'Hanaske'),
(10, 'Reichelt'),
(11, 'Bauer'),
(12, 'Studte'),
(13, 'Eisele'),
(14, 'Westarp'),
(15, 'Rahimi'),
(16, 'Schmidt-Ross'),
(17, 'Harms'),
(18, 'Schellenberg'),
(19, 'Emmer'),
(20, 'Sashar');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LecturerXCourses`
--

CREATE TABLE `LecturerXCourses` (
  `lecturer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LecturerXCourses`
--

INSERT INTO `LecturerXCourses` (`lecturer_id`, `course_id`, `id`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(2, 1, 6),
(2, 2, 7),
(2, 3, 8),
(2, 4, 9),
(2, 5, 10),
(3, 1, 11),
(3, 2, 12),
(3, 3, 13),
(3, 4, 14),
(3, 5, 15),
(4, 1, 16),
(4, 2, 17),
(4, 3, 18),
(4, 4, 19),
(4, 5, 20),
(5, 5, 21),
(6, 1, 22),
(6, 2, 23),
(6, 3, 24),
(6, 4, 25),
(7, 1, 26),
(7, 2, 27),
(7, 3, 28),
(7, 4, 29),
(7, 5, 30),
(8, 1, 31),
(8, 2, 32),
(8, 3, 33),
(8, 4, 34),
(8, 5, 35),
(9, 1, 36),
(9, 2, 37),
(9, 3, 38),
(9, 4, 39),
(9, 5, 40),
(10, 1, 41),
(10, 2, 42),
(10, 3, 43),
(10, 4, 44),
(10, 5, 45),
(11, 1, 46),
(11, 2, 47),
(11, 3, 48),
(11, 4, 49),
(11, 5, 50),
(12, 1, 51),
(12, 2, 52),
(12, 3, 53),
(12, 4, 54),
(12, 5, 55),
(13, 1, 56),
(13, 2, 57),
(13, 3, 58),
(13, 4, 59),
(13, 5, 60),
(14, 1, 61),
(14, 2, 62),
(14, 3, 63),
(14, 4, 64),
(14, 5, 65),
(15, 1, 66),
(15, 2, 67),
(15, 3, 68),
(15, 4, 69),
(15, 5, 70),
(16, 1, 71),
(16, 2, 72),
(16, 3, 73),
(16, 4, 74),
(16, 5, 75),
(17, 1, 76),
(17, 2, 77),
(17, 3, 78),
(17, 4, 79),
(17, 5, 80),
(18, 1, 81),
(18, 2, 82),
(18, 3, 83),
(18, 4, 84),
(18, 5, 85),
(19, 1, 86),
(19, 2, 87),
(19, 3, 88),
(19, 4, 89),
(19, 5, 90),
(20, 1, 91),
(20, 2, 92),
(20, 3, 93),
(20, 4, 94),
(20, 5, 95),
(20, 5, 96);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LecturerXModule`
--

CREATE TABLE `LecturerXModule` (
  `lecturer_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LecturerXModule`
--

INSERT INTO `LecturerXModule` (`lecturer_id`, `module_id`, `id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(5, 7, 6),
(6, 2, 7),
(7, 2, 8),
(8, 2, 9),
(9, 2, 10),
(10, 2, 11),
(11, 3, 12),
(12, 3, 13),
(13, 3, 14),
(14, 4, 15),
(14, 5, 16),
(14, 6, 17),
(15, 5, 18),
(16, 5, 19),
(17, 6, 20),
(18, 6, 21),
(19, 6, 22),
(20, 6, 23),
(20, 7, 24);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LecturerXSlots`
--

CREATE TABLE `LecturerXSlots` (
  `lecturer_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LogIn`
--

CREATE TABLE `LogIn` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LogIn`
--

INSERT INTO `LogIn` (`user_id`, `username`, `password`) VALUES
(1, 'Karstens.HSBA', 'Password1'),
(2, 'Sparfeld.HSBA', 'Password2'),
(3, 'Otto.HSBA', 'Password3'),
(4, 'Pleiß.HSBA', 'Password4'),
(5, 'Hartmann.HSBA', 'Password5'),
(6, 'Prigge.HSBA', 'Password6'),
(7, 'Faaß.HSBA', 'Password7'),
(8, 'Köpp.HSBA', 'Password8'),
(9, 'Hanaske.HSBA', 'Password9'),
(10, 'Reichelt.HSBA', 'Password10'),
(11, 'Bauer.HSBA', 'Password11'),
(12, 'Studte.HSBA', 'Password12'),
(13, 'Eisele.HSBA', 'Password13'),
(14, 'Westarp.HSBA', 'Password14'),
(15, 'Rahimi.HSBA', 'Password15'),
(16, 'Hermes.HSBA', 'Password16'),
(17, 'Schmidt-Ross.HSBA', 'Password17'),
(18, 'Harms.HSBA', 'Password18'),
(19, 'Schellenberg.HSBA', 'Password19'),
(20, 'Emmer.HSBA', 'Password20'),
(21, 'Sashar.HSBA', 'Password21'),
(22, 'Rossius.HSBA', 'Password22'),
(23, 'Demuth.HSBA', 'Password23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LogInXAdministration`
--

CREATE TABLE `LogInXAdministration` (
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LogInXAdministration`
--

INSERT INTO `LogInXAdministration` (`user_id`, `admin_id`) VALUES
(22, 1),
(23, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LogInxLecturers`
--

CREATE TABLE `LogInxLecturers` (
  `user_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LogInxLecturers`
--

INSERT INTO `LogInxLecturers` (`user_id`, `lecturer_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Modules`
--

CREATE TABLE `Modules` (
  `modul_id` int(11) NOT NULL,
  `modulname` varchar(256) NOT NULL,
  `hourcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Modules`
--

INSERT INTO `Modules` (`modul_id`, `modulname`, `hourcount`) VALUES
(1, 'Mathematik', 48),
(2, 'Rechnungswesen', 32),
(3, 'Personal und Führung', 34),
(4, 'Grundlagen der Wirtschaftsinformatik (PLENUM)', 32),
(5, 'Grundlagen der Wirtschaftsinformatik (TUTORIUM)', 16),
(6, 'Wissenschaft und Trends', 48),
(7, 'Grundlagen der Informatik', 48),
(8, 'Sprachen', 0),
(9, 'Electives', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Studyprogram`
--

CREATE TABLE `Studyprogram` (
  `studyprogram_id` int(11) NOT NULL,
  `programname` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Studyprogram`
--

INSERT INTO `Studyprogram` (`studyprogram_id`, `programname`) VALUES
(1, 'Business Administration'),
(2, 'Business Informatics'),
(3, 'Logistic Management'),
(4, 'International Management');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Timeslots`
--

CREATE TABLE `Timeslots` (
  `slot_id` int(11) NOT NULL,
  `day` varchar(256) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `Type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Timeslots`
--

INSERT INTO `Timeslots` (`slot_id`, `day`, `starttime`, `endtime`, `Type`) VALUES
(1, 'Montag', '08:00:00', '09:30:00', 'vor Ort'),
(2, 'Montag', '09:45:00', '11:15:00', 'vor Ort'),
(3, 'Montag', '11:30:00', '13:00:00', 'vor Ort'),
(4, 'Montag', '13:30:00', '15:00:00', 'vor Ort'),
(5, 'Montag', '15:15:00', '16:45:00', 'vor Ort'),
(6, 'Montag', '17:00:00', '18:30:00', 'online'),
(7, 'Dienstag', '08:00:00', '09:30:00', 'vor Ort'),
(8, 'Dienstag', '09:45:00', '11:15:00', 'vor Ort'),
(9, 'Dienstag', '11:30:00', '13:00:00', 'vor Ort'),
(10, 'Dienstag', '13:30:00', '15:00:00', 'vor Ort'),
(11, 'Dienstag', '15:15:00', '16:45:00', 'vor Ort'),
(12, 'Dienstag', '17:30:00', '19:00:00', 'vor Ort'),
(13, 'Mittwoch', '08:00:00', '09:30:00', 'vor Ort'),
(14, 'Mittwoch', '09:45:00', '11:15:00', 'vor Ort'),
(15, 'Mittwoch', '11:30:00', '13:00:00', 'vor Ort'),
(16, 'Mittwoch', '13:30:00', '15:00:00', 'vor Ort'),
(17, 'Mittwoch', '15:15:00', '16:45:00', 'vor Ort'),
(18, 'Mittwoch', '17:30:00', '19:00:00', 'online'),
(19, 'Donnerstag', '08:00:00', '09:30:00', 'vor Ort'),
(20, 'Donnerstag', '09:45:00', '11:15:00', 'vor Ort'),
(21, 'Donnerstag', '11:30:00', '13:00:00', 'vor Ort'),
(22, 'Donnerstag', '13:30:00', '15:00:00', 'vor Ort'),
(23, 'Donnerstag', '15:15:00', '16:45:00', 'vor Ort'),
(24, 'Donnerstag', '17:00:00', '19:00:00', 'vor Ort'),
(25, 'Freitag', '08:00:00', '09:30:00', 'vor Ort'),
(26, 'Freitag', '09:45:00', '11:15:00', 'vor Ort'),
(27, 'Freitag', '11:30:00', '13:00:00', 'vor Ort'),
(28, 'Freitag', '13:30:00', '15:00:00', 'vor Ort'),
(29, 'Freitag', '15:15:00', '16:45:00', 'vor Ort');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Timetable`
--

CREATE TABLE `Timetable` (
  `timetable_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `studyprogram_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Administration`
--
ALTER TABLE `Administration`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indizes für die Tabelle `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indizes für die Tabelle `Lecturers`
--
ALTER TABLE `Lecturers`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Indizes für die Tabelle `LecturerXCourses`
--
ALTER TABLE `LecturerXCourses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign 1` (`lecturer_id`),
  ADD KEY `Foreign 2` (`course_id`);

--
-- Indizes für die Tabelle `LecturerXModule`
--
ALTER TABLE `LecturerXModule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign 3` (`module_id`),
  ADD KEY `Foreign 4` (`lecturer_id`);

--
-- Indizes für die Tabelle `LecturerXSlots`
--
ALTER TABLE `LecturerXSlots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign 5` (`slot_id`),
  ADD KEY `Foreign 6` (`lecturer_id`);

--
-- Indizes für die Tabelle `LogIn`
--
ALTER TABLE `LogIn`
  ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `LogInXAdministration`
--
ALTER TABLE `LogInXAdministration`
  ADD KEY `Foreign 7` (`admin_id`),
  ADD KEY `Folge 8` (`user_id`);

--
-- Indizes für die Tabelle `LogInxLecturers`
--
ALTER TABLE `LogInxLecturers`
  ADD KEY `Foreign 9` (`user_id`);

--
-- Indizes für die Tabelle `Modules`
--
ALTER TABLE `Modules`
  ADD PRIMARY KEY (`modul_id`);

--
-- Indizes für die Tabelle `Studyprogram`
--
ALTER TABLE `Studyprogram`
  ADD PRIMARY KEY (`studyprogram_id`);

--
-- Indizes für die Tabelle `Timeslots`
--
ALTER TABLE `Timeslots`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indizes für die Tabelle `Timetable`
--
ALTER TABLE `Timetable`
  ADD PRIMARY KEY (`timetable_id`),
  ADD KEY `Foreign 10` (`lecturer_id`),
  ADD KEY `Foreign 11` (`course_id`),
  ADD KEY `Foreign 12` (`module_id`),
  ADD KEY `Foreign 13` (`slot_id`),
  ADD KEY `Foreign 14` (`studyprogram_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Administration`
--
ALTER TABLE `Administration`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `Courses`
--
ALTER TABLE `Courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `Lecturers`
--
ALTER TABLE `Lecturers`
  MODIFY `lecturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `LecturerXCourses`
--
ALTER TABLE `LecturerXCourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT für Tabelle `LecturerXModule`
--
ALTER TABLE `LecturerXModule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `LecturerXSlots`
--
ALTER TABLE `LecturerXSlots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `LogIn`
--
ALTER TABLE `LogIn`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT für Tabelle `Modules`
--
ALTER TABLE `Modules`
  MODIFY `modul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `Studyprogram`
--
ALTER TABLE `Studyprogram`
  MODIFY `studyprogram_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `Timeslots`
--
ALTER TABLE `Timeslots`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `Timetable`
--
ALTER TABLE `Timetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `LecturerXCourses`
--
ALTER TABLE `LecturerXCourses`
  ADD CONSTRAINT `Foreign 1` FOREIGN KEY (`lecturer_id`) REFERENCES `Lecturers` (`lecturer_id`),
  ADD CONSTRAINT `Foreign 2` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`);

--
-- Constraints der Tabelle `LecturerXModule`
--
ALTER TABLE `LecturerXModule`
  ADD CONSTRAINT `Foreign 3` FOREIGN KEY (`module_id`) REFERENCES `Modules` (`modul_id`),
  ADD CONSTRAINT `Foreign 4` FOREIGN KEY (`lecturer_id`) REFERENCES `Lecturers` (`lecturer_id`);

--
-- Constraints der Tabelle `LecturerXSlots`
--
ALTER TABLE `LecturerXSlots`
  ADD CONSTRAINT `Foreign 5` FOREIGN KEY (`slot_id`) REFERENCES `Timeslots` (`slot_id`),
  ADD CONSTRAINT `Foreign 6` FOREIGN KEY (`lecturer_id`) REFERENCES `Lecturers` (`lecturer_id`);

--
-- Constraints der Tabelle `LogInXAdministration`
--
ALTER TABLE `LogInXAdministration`
  ADD CONSTRAINT `Foreign 8` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`),
  ADD CONSTRAINT `Foreign 7` FOREIGN KEY (`admin_id`) REFERENCES `Administration` (`admin_id`);

--
-- Constraints der Tabelle `LogInxLecturers`
--
ALTER TABLE `LogInxLecturers`
  ADD CONSTRAINT `Foreign 9` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`);
  ADD CONSTRAINT `Foreign 15` FOREIGN KEY (`lecturer_id`) REFERENCES `Lecturer` (`lecturer_id`);

--
-- Constraints der Tabelle `Timetable`
--
ALTER TABLE `Timetable`
  ADD CONSTRAINT `Foreign 10` FOREIGN KEY (`lecturer_id`) REFERENCES `Lecturers` (`lecturer_id`),
  ADD CONSTRAINT `Foreign 11` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`),
  ADD CONSTRAINT `Foreign 12` FOREIGN KEY (`module_id`) REFERENCES `Modules` (`modul_id`),
  ADD CONSTRAINT `Foreign 13` FOREIGN KEY (`slot_id`) REFERENCES `Timeslots` (`slot_id`),
  ADD CONSTRAINT `Foreign 14` FOREIGN KEY (`studyprogram_id`) REFERENCES `Studyprogram` (`studyprogram_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
