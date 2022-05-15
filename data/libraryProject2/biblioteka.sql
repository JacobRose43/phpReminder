-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Maj 2022, 22:24
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id` int(10) UNSIGNED NOT NULL,
  `tytul` text COLLATE utf8mb4_polish_ci NOT NULL,
  `autor_imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `autor_nazwisko` text COLLATE utf8mb4_polish_ci NOT NULL,
  `rok_wydania` int(10) UNSIGNED NOT NULL,
  `gatunek` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id`, `tytul`, `autor_imie`, `autor_nazwisko`, `rok_wydania`, `gatunek`) VALUES
(1, 'Zwierzęta', 'Anna', 'Morawik', 1999, 'Dramat'),
(2, 'Populacja Ludzka', 'Dorota', 'Darmuk', 2009, 'Historyczna'),
(3, 'Kropka', 'Dawid', 'Krawczyk', 1963, 'Przygodowa'),
(4, 'Stworzenia', 'Kamil', 'Stefańczyk', 2001, 'Fantasy'),
(5, 'Zwierciadło', 'Kuba', 'Tarr', 1922, 'Dramat'),
(6, 'Mistrzostwa Koszmaru', 'Stefan', 'Wykulski', 2003, 'Sci-fi'),
(7, 'Karia Neilo', 'Jan', 'Podolski', 1931, 'Przygodowa'),
(8, 'Drugie oblicze', 'Mateusz', 'Korowicz', 2009, 'Dramat'),
(9, 'Ostatnia Bitwa', 'Beata', 'Sybowicz', 1955, 'Sci-fi'),
(10, 'Biała droga', 'Wiktoria', 'Patmos', 2015, 'Przygodowa'),
(11, 'Mudi i wyspa skarbów', 'Julia', 'Mej', 1966, 'Fantasy'),
(12, 'Przeklęty zegarek', 'Anna', 'Kierowicz', 2011, 'Przygodowa');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alpha` (`tytul`(50),`autor_imie`(50),`autor_nazwisko`(50),`gatunek`(50));

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
