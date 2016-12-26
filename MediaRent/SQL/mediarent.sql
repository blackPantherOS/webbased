-- phpMyAdmin SQL Dump
-- version 2.11.8.1
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- LÃÂÃÂÃÂ¹ÃÂ trehozÃÂÃÂÃÂÃÂs ideje: 2010. Feb 18. 22:06
-- Szerver verziÃÂÃÂÃÂ¹ÃÂ: 4.1.19
-- PHP VerziÃÂÃÂÃÂ¹ÃÂ: 4.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- AdatbÃÂÃÂÃÂÃÂzis: `mediarent`
--

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `adminisztratorok`
--

CREATE TABLE IF NOT EXISTS `adminisztratorok` (
  `admin_id` int(10) NOT NULL auto_increment,
  `admin_usernev` varchar(20) NOT NULL default '',
  `admin_nev` varchar(100) NOT NULL default '',
  `admin_jelszo` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `adminisztratorok`
--

INSERT INTO `adminisztratorok` (`admin_id`, `admin_usernev`, `admin_nev`, `admin_jelszo`) VALUES
(1, 'demo', 'demo user', 'fe01ce2a7fbac8fafaed7c982a04e229'),
(2, 'v3ct0r', 'Charles K Barcza', '4af4b1765ce486b702f2313434334effe');

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `dij_kategoriak`
--

CREATE TABLE IF NOT EXISTS `dij_kategoriak` (
  `dijk_id` int(10) NOT NULL auto_increment,
  `dijk_nev` varchar(50) NOT NULL default '',
  `dijk_osszeg` int(5) NOT NULL default '0',
  `dijk_kesedelem` int(5) NOT NULL default '0',
  `dijk_elojegyzes` int(5) NOT NULL default '0',
  PRIMARY KEY  (`dijk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `dij_kategoriak`
--

INSERT INTO `dij_kategoriak` (`dijk_id`, `dijk_nev`, `dijk_osszeg`, `dijk_kesedelem`, `dijk_elojegyzes`) VALUES
(2, 'napi', 500, 500, 300),
(3, '2ÃÂÃÂÃÂ¹ÃÂra', 400, 400, 300);

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `elojegyzesek`
--

CREATE TABLE IF NOT EXISTS `elojegyzesek` (
  `elojegyzes_id` int(10) NOT NULL auto_increment,
  `film_id` int(10) NOT NULL default '0',
  `tag_id` int(10) NOT NULL default '0',
  `elojegyzes_idopont` int(10) NOT NULL default '0',
  `elojegyzes_ok` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`elojegyzes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `elojegyzesek`
--

INSERT INTO `elojegyzesek` (`elojegyzes_id`, `film_id`, `tag_id`, `elojegyzes_idopont`, `elojegyzes_ok`) VALUES
(1, 1, 1, 1093464087, '1'),
(2, 2, 2, 1093535351, '1'),
(3, 4, 1, 1103718795, '1'),
(4, 1, 3, 1117526000, '0'),
(5, 2, 3, 1122419124, '1'),
(6, 1, 1, 1122981477, '0');

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `filmek`
--

CREATE TABLE IF NOT EXISTS `filmek` (
  `film_id` int(10) NOT NULL auto_increment,
  `film_cim` varchar(255) NOT NULL default '',
  `film_eredeti_cim` varchar(255) NOT NULL default '',
  `film_ev` int(4) NOT NULL default '0',
  `film_rendezo` varchar(255) NOT NULL default '',
  `film_darab` int(2) NOT NULL default '0',
  `film_lemez` int(2) NOT NULL default '0',
  `film_imdb` varchar(10) NOT NULL default '0',
  `media_id` int(10) NOT NULL default '0',
  `kategoria_id` int(10) NOT NULL default '0',
  `dijk_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`film_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `filmek`
--

INSERT INTO `filmek` (`film_id`, `film_cim`, `film_eredeti_cim`, `film_ev`, `film_rendezo`, `film_darab`, `film_lemez`, `film_imdb`, `media_id`, `kategoria_id`, `dijk_id`) VALUES
(1, 'A keresztapa - trilÃÂÃÂÃÂ¹ÃÂgia', 'The Godfather - Trilogy', 1972, 'Francis-Ford Coppola', 1, 5, '', 1, 1, 0),
(2, 'ÃÂÃÂÃÂÃÂrlovagok', 'ÃÂÃÂÃÂÃÂrlovagok', 2003, 'nem ÃÂÃÂÃÂÃÂn', 1, 1, '3223', 2, 1, 0),
(3, 'A GyÃÂÃÂÃÂ¹ÃÂ½rÃÂÃÂÃÂ¹ÃÂ½k Ura: A GyÃÂÃÂÃÂ¹ÃÂ½rÃÂÃÂÃÂ¹ÃÂ½ SzÃÂÃÂÃÂ¹ÃÂvetsÃÂÃÂÃÂ¹ÃÂ ge', 'Lord of the Rings: The Fellowship of the Ring', 2001, 'Peter Jackson', 5, 2, '0120737', 1, 1, 1),
(4, 'IgazÃÂÃÂÃÂÃÂbÃÂÃÂÃÂ¹ÃÂl szerelem', 'Love Actually', 2003, '', 3, 1, '', 1, 2, 2);

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `kategoriak`
--

CREATE TABLE IF NOT EXISTS `kategoriak` (
  `kategoria_id` int(10) NOT NULL auto_increment,
  `kategoria_nev` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`kategoria_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `kategoriak`
--

INSERT INTO `kategoriak` (`kategoria_id`, `kategoria_nev`) VALUES
(1, 'akciÃÂÃÂÃÂ¹ÃÂ'),
(2, 'romantikus'),
(3, 'vigjÃÂÃÂÃÂÃÂtÃÂÃÂÃÂ¹ÃÂ k'),
(4, 'erotikus'),
(5, '1'),
(6, 'lambada');

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `kolcsonzesek`
--

CREATE TABLE IF NOT EXISTS `kolcsonzesek` (
  `kolcsonzes_id` int(10) NOT NULL auto_increment,
  `film_id` int(10) NOT NULL default '0',
  `kolcsonzes_kezdet` int(10) NOT NULL default '0',
  `kolcsonzes_lejarat` int(10) NOT NULL default '0',
  `tag_id` int(10) NOT NULL default '0',
  `kolcsonzes_ok` enum('0','1') NOT NULL default '0',
  `admin_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`kolcsonzes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `kolcsonzesek`
--

INSERT INTO `kolcsonzesek` (`kolcsonzes_id`, `film_id`, `kolcsonzes_kezdet`, `kolcsonzes_lejarat`, `tag_id`, `kolcsonzes_ok`, `admin_id`) VALUES
(1, 1, 1093459031, 1093629600, 1, '1', 1),
(2, 1, 1093464017, 1093550400, 1, '1', 1),
(3, 2, 1093533886, 1093618800, 1, '1', 2),
(4, 1, 1093536093, 1093622400, 1, '1', 1),
(5, 1, 1093541915, 1093626000, 1, '1', 1),
(6, 1, 1098216408, 1098302400, 1, '1', 1),
(7, 3, 1099413945, 1099497600, 3, '1', 1),
(8, 3, 1103578873, 1103662800, 3, '1', 1),
(9, 4, 1105475250, 1105560000, 1, '1', 1),
(10, 4, 1105475511, 1105560000, 1, '1', 1),
(11, 2, 1105476885, 1105560000, 1, '1', 1),
(12, 2, 1112796377, 1112896800, 4, '1', 1),
(13, 4, 1112796401, 1112882400, 4, '1', 1),
(14, 1, 1112796723, 1112882400, 4, '1', 1),
(15, 2, 1112796743, 1112882400, 4, '1', 1),
(16, 3, 1114289269, 1114372800, 1, '1', 1),
(17, 1, 1117525987, 1262246400, 1, '1', 1),
(18, 2, 1117656804, 1117742400, 3, '1', 1),
(19, 4, 1120723934, 1120809600, 1, '1', 1),
(20, 3, 1126431537, 1126515600, 1, '1', 1),
(21, 2, 1129719187, 1129802400, 3, '0', 1);

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `mediak`
--

CREATE TABLE IF NOT EXISTS `mediak` (
  `media_id` int(10) NOT NULL auto_increment,
  `media_nev` varchar(50) NOT NULL default '',
  `media_osszeg` int(5) NOT NULL default '0',
  `media_kesedelem` int(5) NOT NULL default '0',
  `media_elojegyzes` int(5) NOT NULL default '0',
  PRIMARY KEY  (`media_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `mediak`
--

INSERT INTO `mediak` (`media_id`, `media_nev`, `media_osszeg`, `media_kesedelem`, `media_elojegyzes`) VALUES
(1, 'DVD', 500, 300, 300),
(2, 'VHS Kazetta', 300, 350, 200);

-- --------------------------------------------------------

--
-- TÃÂÃÂÃÂÃÂbla szerkezet: `tagok`
--

CREATE TABLE IF NOT EXISTS `tagok` (
  `tag_id` int(10) NOT NULL auto_increment,
  `tag_nev` varchar(100) NOT NULL default '',
  `tag_lakcim` varchar(255) NOT NULL default '',
  `tag_telefon` varchar(20) NOT NULL default '',
  `tag_regisztralva` int(10) NOT NULL default '0',
  `tag_lejarat` int(10) NOT NULL default '0',
  `tag_vip` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- TÃÂÃÂÃÂÃÂbla adatok: `tagok`
--

INSERT INTO `tagok` (`tag_id`, `tag_nev`, `tag_lakcim`, `tag_telefon`, `tag_regisztralva`, `tag_lejarat`, `tag_vip`) VALUES
(1, 'Gipsz Jakab', '1234 Budapest, VÃÂÃÂÃÂÃÂci ÃÂÃÂÃÂ¹ÃÂt 1.', '20/123-45-67', 1093454594, 1124558594, '1'),
(3, 'Netudki JÃÂÃÂÃÂÃÂnos', '5450 VarsÃÂÃÂÃÂÃÂnd Tollas u. 4', '06-30-458-1235', 1099413922, 1102005922, '0'),
(4, 'Rokudfalvi AmatÃÂÃÂÃÂ¹ÃÂr', 'bp', '0-1-1252773', 1112793374, 1143897374, '1');
