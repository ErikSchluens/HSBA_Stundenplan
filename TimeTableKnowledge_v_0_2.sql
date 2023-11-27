-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 27. Nov 2023 um 10:09
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
-- Datenbank: `TimeTableKnowledge_v.0.2`
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
-- Tabellenstruktur für Tabelle `Constraints`
--

CREATE TABLE `Constraints` (
  `Name` varchar(255) NOT NULL,
  `Value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Tabellenstruktur für Tabelle `Excursion_Input`
--

CREATE TABLE `Excursion_Input` (
  `ExcursionInput_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `1Wahl` varchar(255) NOT NULL,
  `2Wahl` varchar(255) NOT NULL,
  `3Wahl` varchar(255) NOT NULL,
  `4Wahl` varchar(255) NOT NULL,
  `5Wahl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Excursion_Output`
--

CREATE TABLE `Excursion_Output` (
  `variable` varchar(255) NOT NULL,
  `wert` varchar(265) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Excursion_Zwischentabelle`
--

CREATE TABLE `Excursion_Zwischentabelle` (
  `ExcursionInput_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Excursion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Excusiondestinations`
--

CREATE TABLE `Excusiondestinations` (
  `Excursion_id` int(11) NOT NULL,
  `Destination` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Excusiondestinations`
--

INSERT INTO `Excusiondestinations` (`Excursion_id`, `Destination`) VALUES
(1, 'Hamburg'),
(2, 'Lissabon'),
(3, 'Athen'),
(4, 'Bilbao'),
(5, 'Bordeaux'),
(6, 'Limassol');

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
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LecturerXCourses`
--

INSERT INTO `LecturerXCourses` (`lecturer_id`, `course_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(16, 5),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 5),
(20, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `LecturerXModule`
--

CREATE TABLE `LecturerXModule` (
  `lecturer_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LecturerXModule`
--

INSERT INTO `LecturerXModule` (`lecturer_id`, `module_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 7),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 4),
(14, 5),
(14, 6),
(15, 5),
(16, 5),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(20, 7);

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
(23, 'Demuth.HSBA', 'Password23'),
(24, 'Student1', 'Password99'),
(25, 'Student2', 'Password99');

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
-- Tabellenstruktur für Tabelle `LogInXLecturers`
--

CREATE TABLE `LogInXLecturers` (
  `user_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `LogInXLecturers`
--

INSERT INTO `LogInXLecturers` (`user_id`, `lecturer_id`) VALUES
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
(20, 20);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Modules`
--

CREATE TABLE `Modules` (
  `module_id` int(11) NOT NULL,
  `modulename` varchar(256) NOT NULL,
  `hourcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Modules`
--

INSERT INTO `Modules` (`module_id`, `modulename`, `hourcount`) VALUES
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `WBÜs`
--

CREATE TABLE `WBÜs` (
  `WBÜ_id` int(11) NOT NULL,
  `WBÜ_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `WBÜs`
--

INSERT INTO `WBÜs` (`WBÜ_id`, `WBÜ_name`) VALUES
(1, 'Spanisch'),
(2, 'Communication'),
(3, 'Verhandlungsführung'),
(4, 'Selfempowerment'),
(5, 'Presentation_Skills');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `WBÜ_Input`
--

CREATE TABLE `WBÜ_Input` (
  `WBÜInput_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wahl1` varchar(255) NOT NULL,
  `wahl2` varchar(255) NOT NULL,
  `wahl3` varchar(255) NOT NULL,
  `wahl4` varchar(255) NOT NULL,
  `wahl5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `WBÜ_Output`
--

CREATE TABLE `WBÜ_Output` (
  `variable` varchar(255) NOT NULL,
  `wert` varchar(265) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `WBÜ_zwischentabelle`
--

CREATE TABLE `WBÜ_zwischentabelle` (
  `WBÜInput_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `WBÜ_id` int(11) NOT NULL
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
-- Indizes für die Tabelle `Excursion_Input`
--
ALTER TABLE `Excursion_Input`
  ADD PRIMARY KEY (`ExcursionInput_id`),
  ADD KEY `Foreign 13` (`user_id`);

--
-- Indizes für die Tabelle `Excursion_Zwischentabelle`
--
ALTER TABLE `Excursion_Zwischentabelle`
  ADD KEY `Foreign 14` (`ExcursionInput_id`),
  ADD KEY `Foreign 15` (`user_id`),
  ADD KEY `Foreign 16` (`Excursion_id`);

--
-- Indizes für die Tabelle `Excusiondestinations`
--
ALTER TABLE `Excusiondestinations`
  ADD PRIMARY KEY (`Excursion_id`);

--
-- Indizes für die Tabelle `Lecturers`
--
ALTER TABLE `Lecturers`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Indizes für die Tabelle `LecturerXCourses`
--
ALTER TABLE `LecturerXCourses`
  ADD KEY `Foreign 1` (`lecturer_id`),
  ADD KEY `Foreign 2` (`course_id`);

--
-- Indizes für die Tabelle `LecturerXModule`
--
ALTER TABLE `LecturerXModule`
  ADD KEY `Foreign 3` (`module_id`),
  ADD KEY `Foreign 4` (`lecturer_id`);

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
  ADD KEY `Folge 8` (`user_id`),
  ADD KEY `Foreign 5` (`admin_id`),
  ADD KEY `Folge 6` (`user_id`);

--
-- Indizes für die Tabelle `LogInXLecturers`
--
ALTER TABLE `LogInXLecturers`
  ADD KEY `Foreign 7` (`user_id`),
  ADD KEY `Foreign 8` (`lecturer_id`);

--
-- Indizes für die Tabelle `Modules`
--
ALTER TABLE `Modules`
  ADD PRIMARY KEY (`module_id`);

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
  ADD KEY `Foreign 11` (`lecturer_id`),
  ADD KEY `Foreign 12` (`course_id`),
  ADD KEY `Foreign 13` (`module_id`),
  ADD KEY `Foreign 14` (`slot_id`),
  ADD KEY `Foreign 15` (`studyprogram_id`);

--
-- Indizes für die Tabelle `WBÜs`
--
ALTER TABLE `WBÜs`
  ADD PRIMARY KEY (`WBÜ_id`);

--
-- Indizes für die Tabelle `WBÜ_Input`
--
ALTER TABLE `WBÜ_Input`
  ADD PRIMARY KEY (`WBÜInput_id`) USING BTREE,
  ADD KEY `Foreign 9` (`user_id`);

--
-- Indizes für die Tabelle `WBÜ_zwischentabelle`
--
ALTER TABLE `WBÜ_zwischentabelle`
  ADD KEY `Foreign 12` (`WBÜ_id`) USING BTREE,
  ADD KEY `Foreign 10` (`WBÜInput_id`),
  ADD KEY `Foreign 11` (`user_id`);

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
-- AUTO_INCREMENT für Tabelle `Excursion_Input`
--
ALTER TABLE `Excursion_Input`
  MODIFY `ExcursionInput_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Excusiondestinations`
--
ALTER TABLE `Excusiondestinations`
  MODIFY `Excursion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `Lecturers`
--
ALTER TABLE `Lecturers`
  MODIFY `lecturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `LogIn`
--
ALTER TABLE `LogIn`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `Modules`
--
ALTER TABLE `Modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT für Tabelle `WBÜs`
--
ALTER TABLE `WBÜs`
  MODIFY `WBÜ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `WBÜ_Input`
--
ALTER TABLE `WBÜ_Input`
  MODIFY `WBÜInput_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Excursion_Input`
--
ALTER TABLE `Excursion_Input`
  ADD CONSTRAINT `Foreign 13` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`);

--
-- Constraints der Tabelle `Excursion_Zwischentabelle`
--
ALTER TABLE `Excursion_Zwischentabelle`
  ADD CONSTRAINT `Foreign 14` FOREIGN KEY (`ExcursionInput_id`) REFERENCES `Excursion_Input` (`ExcursionInput_id`),
  ADD CONSTRAINT `Foreign 15` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`),
  ADD CONSTRAINT `Foreign 16` FOREIGN KEY (`Excursion_id`) REFERENCES `Excusiondestinations` (`Excursion_id`);

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
  ADD CONSTRAINT `Foreign 3` FOREIGN KEY (`module_id`) REFERENCES `Modules` (`module_id`),
  ADD CONSTRAINT `Foreign 4` FOREIGN KEY (`lecturer_id`) REFERENCES `Lecturers` (`lecturer_id`);

--
-- Constraints der Tabelle `LogInXAdministration`
--
ALTER TABLE `LogInXAdministration`
  ADD CONSTRAINT `Foreign 5` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`),
  ADD CONSTRAINT `Foreign 6` FOREIGN KEY (`admin_id`) REFERENCES `Administration` (`admin_id`);

--
-- Constraints der Tabelle `LogInXLecturers`
--
ALTER TABLE `LogInXLecturers`
  ADD CONSTRAINT `Foreign 7` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`),
  ADD CONSTRAINT `Foreign 8` FOREIGN KEY (`lecturer_id`) REFERENCES `Lecturers` (`lecturer_id`);

--
-- Constraints der Tabelle `WBÜ_Input`
--
ALTER TABLE `WBÜ_Input`
  ADD CONSTRAINT `Foreign 9` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`);

--
-- Constraints der Tabelle `WBÜ_zwischentabelle`
--
ALTER TABLE `WBÜ_zwischentabelle`
  ADD CONSTRAINT `Foreign 10` FOREIGN KEY (`WBÜInput_id`) REFERENCES `WBÜ_Input` (`WBÜInput_id`),
  ADD CONSTRAINT `Foreign 11` FOREIGN KEY (`user_id`) REFERENCES `LogIn` (`user_id`),
  ADD CONSTRAINT `Foreign 12` FOREIGN KEY (`WBÜ_id`) REFERENCES `WBÜs` (`WBÜ_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
