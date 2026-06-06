-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 06 Ιουν 2026 στις 12:42:41
-- Έκδοση διακομιστή: 10.4.32-MariaDB
-- Έκδοση PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `web_development`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `authors`
--

CREATE TABLE `authors` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `authors`
--

INSERT INTO `authors` (`ID`, `Name`, `Surname`, `Nationality`, `DateOfBirth`) VALUES
(1, 'Giorgos', 'Gramm', 'Greek', '2005-03-21'),
(2, 'Dimitris', 'Lago', 'Australian', '2005-03-04'),
(3, 'James', 'Ramsey', 'Scotish', '2000-09-25'),
(4, 'Eirini', 'Karantoni', 'Greek', '2003-11-08'),
(5, 'Aggelos', 'Kontoleon', 'Greek', '1986-06-22'),
(6, 'Eirini', 'Mauri', 'Greek', '2005-05-23'),
(7, 'Eleni', 'Kotrozou', 'Greek', '2005-05-12'),
(8, 'antonis', 'gerasimou', 'Greek', '2005-09-11'),
(9, 'Katerina', 'Cham', 'Greek', '2005-06-21'),
(10, 'Giorgos', 'Gramm', 'Greek', '2005-01-27');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `books`
--

CREATE TABLE `books` (
  `ISBN` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `CopyrightYear` year(4) NOT NULL,
  `Publisher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `AuthorID`, `CopyrightYear`, `Publisher`) VALUES
(1234, 'Shadow and Bone', 1, '2018', 'Taylor'),
(5678, 'Siege and Storm', 2, '2019', 'Taylor'),
(4321, 'Ruin and Rising', 3, '2021', 'Psixogios'),
(8765, 'Six of Crows', 4, '2015', 'Psixogios'),
(2341, 'Shadow and Light', 5, '2007', 'Taylor'),
(7458, 'H prigkipisa', 7, '2025', 'Eirini');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`AuthorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
