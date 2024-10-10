-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 10 okt 2024 om 07:35
-- Serverversie: 8.0.31
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slider_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `grid_items`
--

DROP TABLE IF EXISTS `grid_items`;
CREATE TABLE IF NOT EXISTS `grid_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `upload_time` varchar(255) DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `comments` int DEFAULT NULL,
  `span_class` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `grid_items`
--

INSERT INTO `grid_items` (`id`, `title`, `image_url`, `upload_time`, `likes`, `comments`, `span_class`) VALUES
(56, '\'Corona? Nee joh, dit is toch gewoon een lichte verkoudheid\'', 'https://th.bing.com/th?id=ORMS.ff8af7e89a8e1f9cbf1dfd1893ffb61c&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '3u', 6, 0, ''),
(54, 'Brobbey baalt van Forioli-gewoonte bij Ajax: \'Dan is het helemáál niet leuk\'', 'https://th.bing.com/th?id=ORMS.7af086907044f83ec59c054f2067e948&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '18u', 12, 0, ''),
(53, 'Zoon van Osama bin Laden uit Frankrijk gegooid', 'https://th.bing.com/th?id=ORMS.9c41a1344e42f9721b99bb65749d0e04&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '16u', 136, 0, ''),
(52, 'Joker: Folie à Deux faalt met rampzalig openingsweekend ondanks hoge verwachtingen', 'https://th.bing.com/th?id=ORMS.08202d5413a9a103f0c2e7f85965f360&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '1 dag', 3, 0, ''),
(51, 'Stefan de Vrij komt met huidige gedachten over een terugkeer naar Feyenoord', 'https://th.bing.com/th?id=ORMS.b5af80d71ae2ec03d534dc16bf694a32&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '17u', 12, 0, ''),
(50, 'Klimaatverandering: Milton is de orkaan die wetenschappers vreesden', 'https://th.bing.com/th?id=ORMS.6d4cdbfc8a80a83399577ab0e97a248a&pid=Wdp&w=612&h=304&qlt=90&c=1&rs=1&dpr=1&p=0', '', 22, 3, 'span-2 span-id-2'),
(47, 'Noord-Korea geeft NAVO een laatste waarschuwing', 'https://th.bing.com/th?id=ORMS.0af64a384a2e68d1ac2bcff3709c9ea8&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '23u', 109, 9, ''),
(48, 'Trump en Poetin hielden in het geheim contact', 'https://th.bing.com/th?id=ORMS.0ad54b41daf2501201c91613c9f4c11e&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '12u', 23, 0, ''),
(49, 'Stefania Liberakakis is de nieuwe co-host van Eurovision in Concert', 'https://th.bing.com/th?id=ORMS.6d2ab5669e80cc5cb247263001782a44&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '1 dag', 1, 0, ''),
(41, 'Netflix deelt eerste beelden nieuw seizoen The Night Agent en kondigt nieuw...', 'https://th.bing.com/th?id=ORMS.629f97c69916377d0d2184c40f5ed2c6&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '14u', 7, 0, ''),
(40, 'PVV boos over verwijt van dictatoriale trekken', 'https://th.bing.com/th?id=ORMS.9a856dc8b588fd960e3f42a33599cc37&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '19u', 50, 10, ''),
(39, '\'Rotte appel\' bij Man United geïdentificeerd: \'Ten Hag kon nét op tijd ingrijpen\'', 'https://th.bing.com/th?id=ORMS.42c9e59705c01aa38aa793f376e3b7e6&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '18u', 35, 0, ''),
(38, 'Een lege stoel in het vliegtuig: mag je die eigenlijk claimen?', 'https://th.bing.com/th?id=ORMS.2bd2737dd04a372a4c0b119214e22ae4&pid=Wdp&w=612&h=304&qlt=90&c=1&rs=1&dpr=1&p=0', '', 67, 3, 'span-2 span-id-2'),
(60, 'Voor eens en altijd: moet je kip wassen voor je het bereidt?', 'https://th.bing.com/th?id=ORMS.0caa152f43c888dd0109521981df1d34&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '3 weken', 125, 2, ''),
(58, 'De nieuwe Fiat Grande Panda is net zo lang als de Multipla - dit ga je betalen', 'https://th.bing.com/th?id=ORMS.9cb67680c0426ed01a2830ac2ab08945&pid=Wdp&w=612&h=304&qlt=90&c=1&rs=1&dpr=1&p=0', '', 7, 0, 'span-2 span-id-2'),
(59, 'Van Catwalk naar Kast: Dries van Noten look voor het najaar', 'https://th.bing.com/th?id=ORMS.b67a9068674a1be5a2122c4eaa627b7c&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '3 dagen', 5, 0, ''),
(62, 'Netflix stopt na een seizoen met serie Kaos met Jeff Goldblum', 'https://th.bing.com/th?id=ORMS.19a2d54eac110db1ad890fbdb102286a&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0', '18u', 5, 0, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slider_items`
--

DROP TABLE IF EXISTS `slider_items`;
CREATE TABLE IF NOT EXISTS `slider_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `slider_items`
--

INSERT INTO `slider_items` (`id`, `title`, `image_url`) VALUES
(1, 'Verlies NSC zet volgens pei fill', 'https://www.bing.com/th?id=OVFT.oyiodkhxhuAeLqzvWZWAzi&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(2, '\"Poetin maakt niemand me fill\"', 'https://www.bing.com/th?id=OVFT.fLLYguypgGkyoRVvoY_oXy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(3, 'Een totaal fiasco: nieuwe v fill', 'https://www.bing.com/th?id=OVFT.C403RupSrtTGwTPGohEvgC&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(4, 'Kijkcijfers Vandaag Inside h fill', 'https://www.bing.com/th?id=OVFT.n5aJIaaCMZEh9YaQO7MOoy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(5, 'Zelensky Rusland kan allee fill', 'https://www.bing.com/th?id=OVFT.TRCYcJZpbvX5JPBELHIC3i&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(6, 'Toon wordt harder: escalati fill', 'https://www.bing.com/th?id=OVFT.TRCYcJZpbvX5JPBELHIC3i&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(7, 'PVV-Kamerlid dat niet bij d fill', 'https://www.bing.com/th?id=OVFT.M9sbgmerfafmdW7l_ZY9by&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(8, 'Wilders: we hebben probleem fill', 'https://www.bing.com/th?id=OPN.TOBOS_2DD64A103A906C1FDE50CBA966A1CCE7&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(9, 'Iran zegt einde te willen aa fill', 'https://www.bing.com/th?id=OVFT.TF02fIHWLjr3I8BMlMwBJC&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(10, 'Staatssecretaris Jansen nee fill', 'https://www.bing.com/th?id=OVFT.JMQHizFe-zr7dfl2wwimiS&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(11, 'Toch geen verbod op benzine fill', 'https://www.bing.com/th?id=OVFT.Zrc95nr_fM2uTURTvfB5Oy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(12, 'NSC eist spoedwet voor be fill', 'https://www.bing.com/th?id=OVFT.5YE6_2xBZKMs8MJkHgoo-S&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(13, 'Onderzoek: Russische sche fill', 'https://www.bing.com/th?id=OVFT.vLd9Kv0SAuxGdO1oN885TC&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(14, 'Minister Wiersma staat achter fill', 'https://www.bing.com/th?id=OVFT.Wn-SDfDk4dxRlXUMHGDZ7i&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(15, 'Enorm effect: fermenteerb fill', 'https://www.bing.com/th?id=OVFT.4hmx8AdQI5FBPPYmnWl1uy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(16, 'Overwinningsplan \'voor 90 fill\'', 'https://www.bing.com/th?id=OVFT.CAe0PjO2gnec0V1GB7vKRy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(17, 'Kamer fluit BBB-minister te fill', 'https://www.bing.com/th?id=OVFT.ToYtyu0ZTgQFoUdAuSjhUC&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(18, 'Bert Huisjes \'komt voorlopig fill\'', 'https://www.bing.com/th?id=OVFT.wqqXslHkoQMNhB8300IQVy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(19, 'Faber in Denemarken voor fill', 'https://www.bing.com/th?id=OVFT.bZvVVXJSSPvdmwn-yN0-2i&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(20, 'Israël kondigt nieuwe aanva fill', 'https://www.bing.com/th?id=OPN.TOBOS_5CF68A0A462A25177F357BE7BF4864F3&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(21, 'Finse dierentuin stuurt reu fill', 'https://www.bing.com/th?id=OVFT.BgdjOQppeyfsZkUj46WHvi&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(22, 'René van der Gijp heeft het fill', 'https://www.bing.com/th?id=OVFT.Yd6h_A2x3YdKkPesi0CT5S&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(23, 'Nio laat \'te dure\' Brusselse fill', 'https://www.bing.com/th?id=OVFT.8SLPsan7y8bDuOnnbV464S&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(24, 'Farioli hield Ajax-selectie z fill', 'https://www.bing.com/th?id=OVFT.tS3GA47M7pEEtPPmiO58cy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow'),
(25, 'Aboutaleb: Allahu akbar-ui fill', 'https://www.bing.com/th?id=OVFT.kXczEHD0fYiGz8rxXeSORy&w=186&h=88&c=7&rs=2&qlt=80&pid=PopNow');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `is_admin`) VALUES
(5, 'user1', '$2y$10$47Qf0H5yunEeOk43/iVxp.MNHZF3mIqdamDpvLglWRYeKBBFME8bG', 'user1@example.com', '2024-10-08 14:41:14', 0),
(2, 'rick', '$2y$10$qOu5UCMWLlirQSgY.u59qO7SIzS7u5JusVTcM4N/ZyTl3eTMKOiwK', 'rick-2007@outlook.com', '2024-10-08 11:22:51', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
