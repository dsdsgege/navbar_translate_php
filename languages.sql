-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 13. 14:04
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `languages`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `language_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `languages`
--

INSERT INTO `languages` (`id`, `language`, `language_code`) VALUES
(1, 'magyar', 'hu'),
(2, 'angol', 'en'),
(3, 'német', 'de');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `nev` varchar(20) NOT NULL,
  `language_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `navbar`
--

INSERT INTO `navbar` (`id`, `nev`, `language_id`) VALUES
(1, 'beteg', NULL),
(2, 'kivancsi', NULL),
(3, 'tudastar', NULL),
(4, 'eredmenyek', NULL),
(5, 'rolunk', NULL),
(6, 'adatvedelem', NULL),
(7, 'szakembereknek', NULL),
(8, 'magyar', NULL),
(9, 'angol', NULL),
(10, 'német', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `navbar_szoveg`
--

CREATE TABLE `navbar_szoveg` (
  `id` int(11) NOT NULL,
  `szoveg` varchar(30) NOT NULL,
  `language_id` int(11) NOT NULL,
  `navbar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `navbar_szoveg`
--

INSERT INTO `navbar_szoveg` (`id`, `szoveg`, `language_id`, `navbar_id`) VALUES
(1, 'Ha ön beteg', 1, 1),
(2, 'Ha ön kíváncsi', 1, 2),
(3, 'Tudástár', 1, 3),
(4, 'Eredmények', 1, 4),
(5, 'Rólunk', 1, 5),
(6, 'Adatvédelem', 1, 6),
(7, 'Szakembereknek', 1, 7),
(8, 'Magyar', 1, 8),
(9, 'Angol', 1, 9),
(10, 'If you\'re ill', 2, 1),
(11, 'If you\'re interested', 2, 2),
(12, 'Encyclopedia', 2, 3),
(13, 'Results', 2, 4),
(14, 'About us', 2, 5),
(15, 'Data security', 2, 6),
(16, 'For professionals', 2, 7),
(17, 'Hungarian', 2, 8),
(18, 'Német', 1, 10),
(19, 'English', 2, 9),
(20, 'German', 2, 10);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `navbar_szoveg`
--
ALTER TABLE `navbar_szoveg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `navbar_id` (`navbar_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `navbar_szoveg`
--
ALTER TABLE `navbar_szoveg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `navbar`
--
ALTER TABLE `navbar`
  ADD CONSTRAINT `navbar_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Megkötések a táblához `navbar_szoveg`
--
ALTER TABLE `navbar_szoveg`
  ADD CONSTRAINT `navbar_szoveg_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `navbar_szoveg_ibfk_2` FOREIGN KEY (`navbar_id`) REFERENCES `navbar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
