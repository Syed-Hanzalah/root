-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2026 at 02:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `visum_news`
--

CREATE TABLE `visum_news` (
  `id` varchar(100) DEFAULT NULL,
  `bearbeiter` varchar(100) DEFAULT NULL,
  `wann` datetime DEFAULT NULL,
  `text` text DEFAULT NULL,
  `text_en` text DEFAULT NULL,
  `online` tinyint(4) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `titel` varchar(150) DEFAULT NULL,
  `titel_en` varchar(150) DEFAULT NULL,
  `land` varchar(100) DEFAULT NULL,
  `ablauf` date DEFAULT NULL,
  `pin` tinyint(1) DEFAULT NULL,
  `website` tinyint(1) DEFAULT NULL,
  `datei` varchar(50) DEFAULT NULL,
  `mandant` varchar(255) DEFAULT '',
  `eumeldung` tinyint(1) DEFAULT NULL,
  `releasenote` tinyint(1) DEFAULT NULL,
  `text_it` text DEFAULT NULL,
  `text_es` text DEFAULT NULL,
  `titel_it` varchar(150) DEFAULT NULL,
  `titel_es` varchar(150) DEFAULT NULL,
  `HomeCountry` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `visum_news`
--

INSERT INTO `visum_news` (`id`, `bearbeiter`, `wann`, `text`, `text_en`, `online`, `datum`, `titel`, `titel_en`, `land`, `ablauf`, `pin`, `website`, `datei`, `mandant`, `eumeldung`, `releasenote`, `text_it`, `text_es`, `titel_it`, `titel_es`, `HomeCountry`) VALUES
('1', NULL, NULL, 'The government of China has announced an expansion of visa-free entry regulations for several international travelers. Starting in February 2026, citizens of the United Kingdom and Canada will be able to visit China without applying for a visa in advance. The new policy allows visitors to stay for short business trips, tourism, or family visits. Officials stated that the decision aims to strengthen diplomatic and economic relations with partner countries. Travel industry experts believe the change will increase tourism and business travel between the nations. Airlines and travel agencies are already preparing for a possible rise in international passengers. Authorities also confirmed that travelers must still follow standard immigration and security procedures upon arrival. Further updates regarding additional countries and extended travel periods are expected later this year.', NULL, NULL, '2026-01-10', 'Neue Visa-Regeln für Deutschland', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, 'wir möchten Sie darüber informieren, dass die Beantragung touristischer Visa für die Russische Föderation über uns als Dienstleister bis auf Weiteres leider nicht möglich ist.\r\nAufgrund aktueller organisatorischer und administrativer Änderungen können wir diesen Service vorübergehend nicht anbieten.\r\nWir arbeiten jedoch daran, die Situation so schnell wie möglich zu klären und hoffen, Ihnen diesen Service bald wieder zur Verfügung stellen zu können.\r\nSobald neue Informationen vorliegen, werden wir Sie selbstverständlich umgehend darüber informieren.\r\nWir bitten um Ihr Verständnis für diese vorübergehende Einschränkung.\r\nBei Fragen oder für alternative Visa-Anfragen stehen wir Ihnen selbstverständlich gerne zur Verfügung.\r\nBitte zögern Sie nicht, uns zu kontaktieren – unser Team hilft Ihnen jederzeit weiter.\r\nVielen Dank für Ihr Vertrauen und Ihre Geduld.', NULL, NULL, '2026-03-10', 'Russland - Wichtiger Hinweis: ?Keine Ausstellung touristischer Visa', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visum_news`
--
ALTER TABLE `visum_news`
  ADD UNIQUE KEY `UNIQUE` (`id`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
