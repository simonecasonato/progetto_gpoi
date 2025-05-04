-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 04, 2025 alle 18:04
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto_gpoi`
--
CREATE DATABASE IF NOT EXISTS `progetto_gpoi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `progetto_gpoi`;

-- --------------------------------------------------------

--
-- Struttura della tabella `coach_ia`
--

CREATE TABLE `coach_ia` (
  `ID_coach` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `descrizione` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `coach_ia`
--

INSERT INTO `coach_ia` (`ID_coach`, `nome`, `sport`, `descrizione`) VALUES
(1, 'Maria', 'CrossFit', 'Specializzata in CrossFit, Maria motiva i suoi clienti a superare ogni limite con allenamenti ad alta intensita\' che combinano sollevamento pesi, ginnastica e cardio. La sua attenzione alla tecnica e alla varieta\' degli esercizi permette di ottenere progressi costanti, migliorando resistenza, potenza e mobilita\'.'),
(2, 'Antonio', 'Powerlifting', 'Esperto di powerlifting, Antonio e\' specializzato nel miglioramento della forza massimale, concentrandosi su squat, panca e stacco da terra. Con un approccio metodico e orientato ai risultati, Antonio perfeziona la tecnica dei suoi clienti per massimizzare le prestazioni e prevenire infortuni.'),
(3, 'Susanna', 'Yoga', 'Insegnante di yoga, Susanna guida i suoi clienti in pratiche che migliorano la flessibilita\', la forza e il benessere mentale. Con una conoscenza profonda delle asana, della respirazione e della meditazione, Susanna offre sessioni personalizzate che promuovono un equilibrio olistico tra corpo e mente.'),
(4, 'Alberto', 'Bodybuilding', 'Con oltre 10 anni di esperienza nel bodybuilding, Alberto aiuta i suoi clienti a costruire massa muscolare e forza con un approccio tecnico e motivante. E\' esperto nelle competizioni di bodybuilding e offre programmi personalizzati che ottimizzano i risultati, sia per la massa che per la definizione muscolare.');

-- --------------------------------------------------------

--
-- Struttura della tabella `possiede`
--

CREATE TABLE `possiede` (
  `ID_coach` int(11) NOT NULL,
  `ID_tariffa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `possiede`
--

INSERT INTO `possiede` (`ID_coach`, `ID_tariffa`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenota`
--

CREATE TABLE `prenota` (
  `ID_utente` int(11) NOT NULL,
  `ID_coach` int(11) NOT NULL,
  `data_prenotazione` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prenota`
--

INSERT INTO `prenota` (`ID_utente`, `ID_coach`, `data_prenotazione`) VALUES
(2, 1, '0000-00-00'),
(2, 2, '2025-05-10'),
(2, 2, '2025-08-06');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `ID_recensione` int(11) NOT NULL,
  `testo` varchar(255) NOT NULL,
  `valutazione` int(11) NOT NULL,
  `ID_utente` int(11) NOT NULL,
  `id_coach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`ID_recensione`, `testo`, `valutazione`, `ID_utente`, `id_coach`) VALUES
(1, 'bhsshshs', 0, 2, 1),
(2, '11', 1, 2, 1),
(3, '11', 1, 2, 1),
(4, '11', 1, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tariffa`
--

CREATE TABLE `tariffa` (
  `ID_tariffa` int(11) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `durata` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tariffa`
--

INSERT INTO `tariffa` (`ID_tariffa`, `prezzo`, `tipo`, `durata`) VALUES
(1, 20, 'base', 'mensile'),
(2, 72, 'base', 'trimestrale'),
(3, 96, 'base', 'semi-annuale'),
(4, 156, 'base', 'annuale'),
(5, 25, 'plus', 'mensile'),
(6, 68, 'plus', 'trimestrale'),
(7, 120, 'plus', 'semi-annuale'),
(8, 195, 'plus', 'annuale'),
(9, 35, 'premium', 'mensile'),
(10, 95, 'premium', 'trimestrale'),
(11, 168, 'premium', 'semi-annuale'),
(12, 273, 'premium', 'annuale'),
(13, 45, 'top', 'mensile'),
(14, 122, 'top', 'trimestrale'),
(15, 216, 'top', 'semi-annuale'),
(16, 351, 'top', 'annuale');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID_utente` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID_utente`, `email`, `nome`, `cognome`, `pwd`) VALUES
(2, 'ciao@gmail.com', 'toni', 'baro', '202cb962ac59075b964b07152d234b70'),
(3, 'ciao2@gmail.com', 'toni', 'baro', '202cb962ac59075b964b07152d234b70'),
(4, 'ciao3@gmail.com', 'piipo', 'diao', '202cb962ac59075b964b07152d234b70'),
(5, 'alessio@gmail.com', 'alessio', 'alessio', 'd2462e55381a20059ed811cefd42493e');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `coach_ia`
--
ALTER TABLE `coach_ia`
  ADD PRIMARY KEY (`ID_coach`);

--
-- Indici per le tabelle `possiede`
--
ALTER TABLE `possiede`
  ADD PRIMARY KEY (`ID_coach`,`ID_tariffa`),
  ADD KEY `id_tariffa.possiede` (`ID_tariffa`);

--
-- Indici per le tabelle `prenota`
--
ALTER TABLE `prenota`
  ADD PRIMARY KEY (`ID_utente`,`ID_coach`,`data_prenotazione`),
  ADD KEY `id_coach.prenotazione` (`ID_coach`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`ID_recensione`),
  ADD KEY `id_utente.recensione` (`ID_utente`),
  ADD KEY `id_coach.recensione` (`id_coach`);

--
-- Indici per le tabelle `tariffa`
--
ALTER TABLE `tariffa`
  ADD PRIMARY KEY (`ID_tariffa`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `coach_ia`
--
ALTER TABLE `coach_ia`
  MODIFY `ID_coach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `ID_recensione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `tariffa`
--
ALTER TABLE `tariffa`
  MODIFY `ID_tariffa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `possiede`
--
ALTER TABLE `possiede`
  ADD CONSTRAINT `id_coach.possiede` FOREIGN KEY (`ID_coach`) REFERENCES `coach_ia` (`ID_coach`),
  ADD CONSTRAINT `id_tariffa.possiede` FOREIGN KEY (`ID_tariffa`) REFERENCES `tariffa` (`ID_tariffa`);

--
-- Limiti per la tabella `prenota`
--
ALTER TABLE `prenota`
  ADD CONSTRAINT `id_coach.prenotazione` FOREIGN KEY (`ID_coach`) REFERENCES `coach_ia` (`ID_coach`),
  ADD CONSTRAINT `id_utente.prenotazione` FOREIGN KEY (`ID_utente`) REFERENCES `utente` (`ID_utente`);

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `id_coach.recensione` FOREIGN KEY (`id_coach`) REFERENCES `coach_ia` (`ID_coach`),
  ADD CONSTRAINT `id_utente.recensione` FOREIGN KEY (`ID_utente`) REFERENCES `utente` (`ID_utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
