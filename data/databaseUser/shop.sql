-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Mar 2022, 12:29
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_basket`
--

DROP TABLE IF EXISTS `shop_basket`;
CREATE TABLE `shop_basket` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,3) UNSIGNED NOT NULL,
  `sid` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_goods`
--

DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_order`
--

DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `goods_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,3) UNSIGNED NOT NULL,
  `order_number` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop_user`
--

DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `shop_user`
--

INSERT INTO `shop_user` (`id`, `name`, `password`) VALUES
(1, 'Wojtaszek', 'maciej'),
(2, 'Johnson', 'jimmie');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `shop_basket`
--
ALTER TABLE `shop_basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`user_id`,`goods_id`),
  ADD KEY `sid` (`sid`(250));

--
-- Indeksy dla tabeli `shop_goods`
--
ALTER TABLE `shop_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alpha` (`name`(20));

--
-- Indeksy dla tabeli `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`user_id`,`goods_id`,`order_number`);

--
-- Indeksy dla tabeli `shop_user`
--
ALTER TABLE `shop_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`name`(20),`password`(20));

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `shop_basket`
--
ALTER TABLE `shop_basket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `shop_goods`
--
ALTER TABLE `shop_goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `shop_user`
--
ALTER TABLE `shop_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
