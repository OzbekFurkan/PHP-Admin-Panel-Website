-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 04 Nis 2021, 22:51:42
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `zenrales`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about1_h3` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `about1_p` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `about2_h3` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `about2_p` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`id`, `about1_h3`, `about1_p`, `about2_h3`, `about2_p`) VALUES
(1, 'Special title1', 'With supporting text below as a natural lead-in to additional content1.', 'Special title2', 'With supporting text below as a natural lead-in to additional content2.'),
(2, 'Special title3', 'With supporting text below as a natural lead-in to additional content3.', 'Special title4', 'With supporting text below as a natural lead-in to additional content4.'),
(3, 'Special title5', 'With supporting text below as a natural lead-in to additional content5.', 'Special title6', 'With supporting text below as a natural lead-in to additional content6.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kulad` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `kulad`, `sifre`, `aktif`) VALUES
(1, 'furkanhz3', '526641bd710f0e083d38ed9a216391c3', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platform` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `slogan` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `text` text COLLATE utf8_turkish_ci NOT NULL,
  `trailer_link` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `download_link` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `game_pic` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `games`
--

INSERT INTO `games` (`id`, `platform`, `category`, `title`, `slogan`, `text`, `trailer_link`, `download_link`, `game_pic`) VALUES
(1, 'Android', 'Hyper Casual', 'Sticky Ball', 'Stick the circle like i did to your mum', 'You must throw your own balls as much as level wanted. You musn\'t touch with red line.', 'https://www.youtube.com/embed/zdjK7BzSLiM', 'https://play.google.com/store/apps/details?id=com.Zeruk.StickyBall&amp;hl=tr', 'img/Untitled-12.png'),
(2, 'Android', 'Hyper Casual', 'skate dodge', 'skate like i did to your mum', 'The best game to play when you bored !!', 'https://www.youtube.com/embed/_qbm4xPHHzE', 'https://play.google.com/store/apps/details?id=com.potoo.SkateDodge&amp;hl=tr', 'img/skate&dodge.jpg'),
(3, 'Android', 'Hyper Casual', 'fall in space', 'fly like i did to your mum', 'Your spaceship is broken, you are only be able to move little up or down. You musn\'t hit to planets not to die. There are some spaceship sellers but they want a certain amount of stars. You can find the stars in space !', 'https://www.youtube.com/embed/ACY-ZurvpPo', 'https://play.google.com/store/apps/details?id=com.Zeruk.FallInSpace&amp;hl=tr', 'img/fallinspace_bigpic.png'),
(4, 'Pc', 'FPS Action', 'Riot At World', 'if you don\' t get aliens, they will get your mum', 'You must throw your own balls as much as level wanted. You musn\'t touch with red line.', 'https://www.youtube.com/embed/PgGvmshVAyI', 'https://store.steampowered.com/app/1397690/Riot_At_World/', 'img/g4.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelenmail`
--

DROP TABLE IF EXISTS `gelenmail`;
CREATE TABLE IF NOT EXISTS `gelenmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `zaman` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`id`, `mail`, `username`, `password`) VALUES
(3, 'baba@gmail.com', 'yoooo39', '526641bd710f0e083d38ed9a216391c3'),
(10, 'furkan.ozbek@hotmail.com', 'furkanhz3', '526641bd710f0e083d38ed9a216391c3'),
(7, 'aloo@gmail.com', 'furkanhz1', 'e7698da7733dc617c4aff0898cb336dd'),
(8, 'aloo31@gmail.com', 'furkanhz31', '0af2e8b1e4a91c959f3f8ed885a39f1c');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siteayar_home`
--

DROP TABLE IF EXISTS `siteayar_home`;
CREATE TABLE IF NOT EXISTS `siteayar_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hero_img` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `hero_h1` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `hero_h5` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `btn1_txt` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `btn1_yol` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `btn2_txt` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `btn2_yol` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `new1` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `new2` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `new3` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `about_img` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `about_h1` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `about_h4` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `about_slogan` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `oyun_sayisi` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `oyuncu_sayisi` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `partner_sayisi` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `contact_img` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `contact_h1` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `contact_h4` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `footer_content` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siteayar_home`
--

INSERT INTO `siteayar_home` (`id`, `hero_img`, `hero_h1`, `hero_h5`, `btn1_txt`, `btn1_yol`, `btn2_txt`, `btn2_yol`, `new1`, `new2`, `new3`, `about_img`, `about_h1`, `about_h4`, `about_slogan`, `oyun_sayisi`, `oyuncu_sayisi`, `partner_sayisi`, `contact_img`, `contact_h1`, `contact_h4`, `footer_content`) VALUES
(1, 'img/g6.png', 'Riot At World ', 'Free to download !', 'More...', 'index.php?sayfa=games&amp;id=4', 'Download', 'https://store.steampowered.com/app/1397690/Riot_At_World/', 'new1 new1 new1 new1 new1 new1 new1 new1 new1 new1 new1 new1 new1 ', 'new2 new2 new2 new2 new2 new2 new2 new2 new2 new2 new2 new2 new2 ', 'new3 new3 new3 new3 new3 new3 new3 new3 new3 new3 new3 new3 new3 ', 'img/altumcode-P2SkP_PXhlU-unsplash.jpg', 'ABOUT', 'Zenrales was found in 2019 by genius Furkan Ozbek .', 'Having and managing a correct marketing strategy is crucial in a fast moving market', '4+', '10+', '1+', 'img/g4.png', 'CONTACT', 'Feel free to send me a mail :)', 'Zenrales was found in 2019 by genius Furkan Ozbek');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
