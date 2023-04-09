-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 03:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione_valutazioni_film`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `cod_film` char(5) NOT NULL,
  `titolo` varchar(50) NOT NULL,
  `regista` varchar(30) DEFAULT NULL,
  `datauscita` date DEFAULT NULL,
  `produttore` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`cod_film`, `titolo`, `regista`, `datauscita`, `produttore`) VALUES
('A0234', 'Titanic', 'James Cameron', '1998-01-16', '20th Century Fox'),
('A0731', 'L\'allenatore nel pallone', 'Sergio Martino', '1984-10-26', 'Dania Film'),
('F0934', 'Fight Club', 'David Fincher', '1999-10-29', '20th Century Fox'),
('G0238', 'Quei bravi ragazzi', 'Martin Scorsese', '1990-09-20', 'Warner Bros'),
('Z0264', 'L\'Odio', 'Mathieu Kassovitz', '1995-05-31', 'Studio Canal');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`id_utente`, `email`, `password`, `telefono`) VALUES
(1, 'pippo.filippi@gmail.com', 'L0r3mIpsum', '+39 333 123 4567'),
(2, 'francesco.papiri@libero.it', 'L4mpAd1na?', '+39 333 765 4321'),
(3, 'alberto.pascoli@tiscali.it', 'Sc1r0cc0', '+39 334 231 2356'),
(4, 'gabriele.laurenti@outlook.com', 'P4ssw0rd', '+39 334 654 3210'),
(5, 'carmine.dipasquale@gmail.com', 'P3sc4ra2', '+39 334 987 6543');

-- --------------------------------------------------------

--
-- Table structure for table `valutazioni`
--

CREATE TABLE `valutazioni` (
  `id_valutazione` int(11) NOT NULL,
  `valutazione` int(11) DEFAULT NULL,
  `commento` varchar(250) DEFAULT NULL,
  `data_e_ora` datetime DEFAULT NULL,
  `id_utente` int(11) DEFAULT NULL,
  `cod_film` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valutazioni`
--

INSERT INTO `valutazioni` (`id_valutazione`, `valutazione`, `commento`, `data_e_ora`, `id_utente`, `cod_film`) VALUES
(2, 4, 'Bello', '2023-03-20 12:50:24', 2, 'F0934'),
(3, 3, 'Medio', '2023-04-03 20:04:09', 3, 'G0238'),
(4, 2, 'Scarso', '2023-04-04 22:30:40', 4, 'Z0264'),
(5, 1, 'Pessimo', '2023-04-05 17:12:37', 5, 'A0731'),
(9, 5, 'Fantastico', '2023-04-07 17:50:40', 3, 'A0731'),
(10, 5, 'Pessimo', '2023-04-07 14:07:23', 1, 'A0234'),
(11, 3, 'Medio', '2023-04-09 02:13:19', 1, 'Z0264'),
(12, 5, 'Fantastico', '2023-04-09 02:35:51', 4, 'A0234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`cod_film`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`);

--
-- Indexes for table `valutazioni`
--
ALTER TABLE `valutazioni`
  ADD PRIMARY KEY (`id_valutazione`),
  ADD KEY `id_utente` (`id_utente`),
  ADD KEY `cod_film` (`cod_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `valutazioni`
--
ALTER TABLE `valutazioni`
  MODIFY `id_valutazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `valutazioni`
--
ALTER TABLE `valutazioni`
  ADD CONSTRAINT `valutazioni_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`),
  ADD CONSTRAINT `valutazioni_ibfk_2` FOREIGN KEY (`cod_film`) REFERENCES `film` (`cod_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
