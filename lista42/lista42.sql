-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Sty 2017, 01:42
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lista42`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `ID` int(5) NOT NULL,
  `Nazwa_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`ID`, `Nazwa_kategori`) VALUES
(1, 'Owoce'),
(2, 'Warzywa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `ID` int(10) NOT NULL,
  `Nazwa_producenta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `producenci`
--

INSERT INTO `producenci` (`ID`, `Nazwa_producenta`) VALUES
(1, 'LokalnyA'),
(2, 'LokalnyB'),
(3, 'LokalnyC');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `ID` int(5) NOT NULL,
  `Nazwa_produktu` varchar(100) NOT NULL,
  `producent` int(5) NOT NULL,
  `kategoria` int(5) NOT NULL,
  `Opis` varchar(500) NOT NULL,
  `zdjecie` varchar(5000) NOT NULL,
  `Cena` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`ID`, `Nazwa_produktu`, `producent`, `kategoria`, `Opis`, `zdjecie`, `Cena`) VALUES
(2, 'Zlote', 2, 1, 'Jablka z sadow', 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Granny_Smith_Apples.jpg', '20'),
(3, 'Papierowki', 3, 1, 'Jablka z sadow', 'data:image/jpeg;base64,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', '15'),
(4, 'Zlote', 1, 1, 'Jablka z sadow', 'data:image/jpeg;base64,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', '30'),
(5, 'Golden', 1, 1, 'Jablka z sadow', 'http://www.publicdomainpictures.net/pictures/30000/velka/apple-1330433629r9m.jpg', '11'),
(6, 'Zlote', 3, 1, 'Jablka z sadow', 'http://www.publicdomainpictures.net/pictures/30000/velka/apple-1330433629r9m.jpg', '23'),
(7, 'Marchew', 1, 2, 'Marchewki najlepsze', 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjVt_DLgfnQAhWFWywKHcLnBqUQjRwIBw&url=https%3A%2F%2Fpl.wikipedia.org%2Fwiki%2FPlik%3ACarrots.JPG&bvm=bv.142059868,d.bGg&psig=AFQjCNGQEneMpjtXYUh7K4jDC05NdDuzuA&ust=1481987978442064', '20'),
(8, 'Marchew', 2, 2, 'Marchewki najlepsze', 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjVt_DLgfnQAhWFWywKHcLnBqUQjRwIBw&url=https%3A%2F%2Fpl.wikipedia.org%2Fwiki%2FPlik%3ACarrots.JPG&bvm=bv.142059868,d.bGg&psig=AFQjCNGQEneMpjtXYUh7K4jDC05NdDuzuA&ust=1481987978442064', '20'),
(9, 'Seler', 2, 2, 'Z ogrodka', 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjUmrSSgvnQAhXHjSwKHXpIBf8QjRwIBw&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AC%25C3%25A9leri.jpg&bvm=bv.142059868,d.bGg&psig=AFQjCNEF3tEAdhhmqJmRiF3Yw-96SEIJAg&ust=1481988121019560', '30'),
(10, 'Seler', 3, 2, 'Z ogrodka', 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjUmrSSgvnQAhXHjSwKHXpIBf8QjRwIBw&url=https%3A%2F%2Fcommons.wikimedia.org%2Fwiki%2FFile%3AC%25C3%25A9leri.jpg&bvm=bv.142059868,d.bGg&psig=AFQjCNEF3tEAdhhmqJmRiF3Yw-96SEIJAg&ust=1481988121019560', '22'),
(11, 'Marchew', 3, 2, 'Marchewki najlepsze', 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjVt_DLgfnQAhWFWywKHcLnBqUQjRwIBw&url=https%3A%2F%2Fpl.wikipedia.org%2Fwiki%2FPlik%3ACarrots.JPG&bvm=bv.142059868,d.bGg&psig=AFQjCNGQEneMpjtXYUh7K4jDC05NdDuzuA&ust=1481987978442064', '7');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE `zdjecia` (
  `ID` int(10) NOT NULL,
  `ID_produktu` int(10) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `dom` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_producenta` (`producent`);

--
-- Indexes for table `zdjecia`
--
ALTER TABLE `zdjecia`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `producenci`
--
ALTER TABLE `producenci`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
