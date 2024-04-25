-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Kwi 2024, 03:19
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `users`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `acc`
--

CREATE TABLE `acc` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `permisje` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `acc`
--

INSERT INTO `acc` (`id`, `login`, `haslo`, `permisje`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'staff', '1253208465b1efa876f982d8a9e73eef', 'staff'),
(5, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(8, 'meow', '4a4be40c96ac6314e91d93f38043a634', 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przepisy`
--

CREATE TABLE `przepisy` (
  `ID` int(11) NOT NULL,
  `nazwa` varchar(150) NOT NULL,
  `składniki` varchar(150) NOT NULL,
  `przygotowanie` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przepisy`
--

INSERT INTO `przepisy` (`ID`, `nazwa`, `składniki`, `przygotowanie`) VALUES
(11, 'Delikatne naleśniki', '1 szklanka mąki pszennej, 1 szklanka mleka, 0.5 szklanki wody gazowanej, 1 jajko, 1 łyżeczka cukru waniliowego WINIARY, trochę oliwy z oliwek', 'Wszystkie składniki poza olejem przełóż do miski i zmiksuj na jednolitą, lejącą masę. Jeśli przygotowujesz wytrawną wersję naleśników pomiń cukier wanilinowy.\r\nOdstaw ciasto na 15 minut.\r\nNaleśniki smaż na dobrze rozgrzanym oleju na patelni z cienkim dnem. Niewielkie porcje ciasta nalewaj na patelnię. Możesz użyć do tego chochli do zupy.\r\nNaleśniki odwracaj i zdejmuj z patelni jak ładnie się zarumienią.\r\nPodana ilość składników wystarcza na około 10 naleśników.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `przepisy`
--
ALTER TABLE `przepisy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `acc`
--
ALTER TABLE `acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `przepisy`
--
ALTER TABLE `przepisy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
