-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Sty 2022, 08:20
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `3tp4_pz2_library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `lastname` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`) VALUES
(1, 'Jan', 'Nowak'),
(2, 'Maciej', 'Wojtaszek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_polish_ci NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `book`
--

INSERT INTO `book` (`id`, `title`, `year`, `author_id`) VALUES
(1, 'Pawiany skaczą na ściany', 2022, 1),
(2, 'Czarne sobmrero', 1999, 1),
(3, 'Co nas wzmacnia', 2000, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book_category`
--

DROP TABLE IF EXISTS `book_category`;
CREATE TABLE `book_category` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `book_category`
--

INSERT INTO `book_category` (`book_id`, `category_id`) VALUES
(1, 1),
(2, 2),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Literatura dziecięca'),
(2, 'Przygodowe');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alphabet` (`firstname`(10),`lastname`(20));

--
-- Indeksy dla tabeli `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `title` (`title`(20),`year`) USING BTREE;

--
-- Indeksy dla tabeli `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`book_id`,`category_id`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(250));

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
