-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 26. Mai, 2017 20:53 PM
-- Server-versjon: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andtro16_PRO101`
--
CREATE DATABASE IF NOT EXISTS `andtro16_PRO101` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `andtro16_PRO101`;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `UI`
--

CREATE TABLE `UI` (
  `Type` enum('Spisested','Utested','Studiested','Informasjon','') NOT NULL,
  `Css` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `UI`
--

INSERT INTO `UI` (`Type`, `Css`) VALUES
('Spisested', '#Boks{\n  visibility: visible;\n}\n#Spisested_Overskrift_Boks{\n  visibility: visible;\n}'),
('Utested', '#Boks{\n  visibility: visible;\n}\n#Utested_Overskrift_Boks{\n  visibility: visible;\n}'),
('Studiested', '#Boks{\n  visibility: visible;\n}\n#Studiested_Overskrift_Boks{\n  visibility: visible;\n}'),
('Informasjon', '#Boks{   visibility: visible; } #Informasjon_Overskrift_Boks{   visibility: visible; }');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `spisested`
--

CREATE TABLE `spisested` (
  `Plass_Id` int(3) NOT NULL,
  `Navn` char(60) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `Prisniva` enum('http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/lite.png','http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/medium.png','http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/mye.png') NOT NULL,
  `Vegetar` enum('http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegPa.png','http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegAv.png') NOT NULL,
  `Levering` enum('Leverer','Leverer ikke') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `spisested`
--

INSERT INTO `spisested` (`Plass_Id`, `Navn`, `Prisniva`, `Vegetar`, `Levering`) VALUES
(32, 'Bislett Kebab House', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/lite.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegPa.png', 'Leverer ikke'),
(1, 'Cafe Sara', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/medium.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegPa.png', 'Leverer'),
(6, 'Crow bar og bryggeri', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/mye.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegAv.png', 'Leverer ikke'),
(35, 'La villa resturant', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/medium.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegPa.png', 'Leverer ikke'),
(2, 'Peloton', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/lite.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegPa.png', 'Leverer'),
(34, 'Taco Republica', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/medium.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/vegPa.png', 'Leverer ikke');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `sted`
--

CREATE TABLE `sted` (
  `Id` int(3) NOT NULL,
  `Navn` char(60) CHARACTER SET utf8 COLLATE utf8_danish_ci DEFAULT NULL,
  `image_path` text NOT NULL,
  `googlemaps` varchar(500) DEFAULT NULL,
  `simplename` varchar(50) DEFAULT NULL,
  `beskrivelse` varchar(1000) CHARACTER SET utf8 COLLATE utf8_danish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `sted`
--

INSERT INTO `sted` (`Id`, `Navn`, `image_path`, `googlemaps`, `simplename`, `beskrivelse`) VALUES
(1, 'Cafe Sara', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/IMG_8652.jpg', '59.917604, 10.7540663', 'cafesara', 'Caf&eacute; Sara er en kombinert kaf&eacute;/restaurant og bar med matservering.           De &aring;pnet d&oslash;rene f&oslash;rste gang i 1989 og har servert god mat og drikke i over 20 &aring;r.           Caf&eacute; Sara har et godt utvalg i drikke, &oslashl, vin, meksikansk, grill, pizza, sm&aringretter som tilfredsstiller mangt og mange.           Om sommeren er det en hyggelig bakg&aringrd, om vinteren en koselig peis.           Caf&eacute; Sara ligger sentralt i Oslo, p&aring hj&oslashrnet av Torggata og Hausmannsgata i Oslo'),
(2, 'Peloton', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/IMG_8667.jpg', '59.917467, 10.754348\n', 'peloton', 'Stor og fin sykkelkaf&eacute; i Torggata med steinovnspizza p&aring; menyen. Det tilbyr ogs&aring; sandwicher og bakst fra Handwerk. Litt hipster-aktig, men veldig koselig sted med gode og flere utvalg av &oslash;l. Veldig bra service og hyggelige personale med mye erfaring om mat og drikke. \n'),
(3, 'Starbucks', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/Starbucks.jpg', '59.916183, 10.751989', 'starbuckstorggata', 'Den store, amerikanske kaffekjeden som alle kjenner til. Det tar bare et &oslash;yeblikk, en h&aring;nd rekkes over disken for &aring; gi en kopp til en annen utstrakt h&aring;nd. Det skjer millioner av ganger hver uke, en kunde mottar en kopp drikke fra en av Starbucks\' baristaer, men hvert m&oslash;te mellom kunde og barista er unikt. Folk kommer til Starbucks for &aring; prate, m&oslash;tes eller jobbe. De er en m&oslash;teplass i lokalmilj&oslash;et, en del av den daglige rutinen '),
(4, 'SYNG', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/syng.jpg', '59.919661, 10.755293', 'syng', 'P&aring; utestedet Syng kan hvem som helst bli Elton John eller Adele. For der kan man leie et eget karaokerom og holde p&aring; for seg selv og vennene i timevis. Syng har tre karaokerom, og det st&oslash;rste har plass til opptil 18 personer. For &aring; f&aring; tilgang til disse m&aring; du bestille dem p&aring; forh&aring;nd. Baren har ogs&aring; et eget rom som kan bookes til bursdager og andre sammenkomster.\n'),
(5, 'Kaffebrenneriet', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/kaffebrenn.jpg', '59.918724, 10.757454', 'kaffebrennerietmarkveien', 'Kaffebrenneriet er Norges ledende kaffehus med kaffeopplevelser i fokus. Velkommen til lidenskap og kvalitet. Kaffebar med eget bakeri. P&aring;smurte, kaker, scones og sm&aring; konfekt. Som alle andre kaffebrennier serveres god kaffe, god mat og hyggelig service. Godt etablert- og hyggelig bra med sitteplasser- og rask servering, ogs&aring; takeout.\n'),
(6, 'Crow bar', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/crow.jpg', '59.917348, 10.753393', 'crowbar', 'Crowbar er mer enn en pub og noe helt annet enn en kebabsjappe. Det er et sted for oss som er opptatt av god &oslash;l. Det er et bryggeri, ikke en restaurant selv om de har noen enkle retter p&aring; menyen. Hos Crow passer det utmerket med en &oslash;l i den ene h&aring;nden og en kebab i den andre.\n'),
(10, 'People\'s', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/peoples.jpg', ' 59.915589, 10.751660', 'peoples', 'Restaurant og stor uteservering midt i konsertgryta ved Sentrum Scene. Har burgere, meksikansk og diverse lunsjretter p&aring; menyen. Kj&oslash;kkenet har fantasi: Jamaican burger med ingef&aelig;rmarinerte reker og mango l&aring;ter morsomt, det samme gj&oslash;r tandoori kyllingburger og r&oslash;dk&aring;l ghetto burger. Det er likevel &oslash;lkartet som er mest spennende, med b&aring;de norske og utenlandske mikrobryggerier representert, og mange typer &aring; velge mellom: Belgisk og amerikansk &oslash;l i alle fasonger og styrkegrader, skotske Brewdog og norske tungvektere som N&oslash;gne &oslash;, Haandbryggeriet og Lervig.\n'),
(18, 'Schouskjelleren', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/kjeller.jpg', ' 59.918416, 10.760316', 'schous', 'Bryggeriet i Schouskvartalet har ikke matservering, men derimot en mengde &oslash;lsorter, b&aring;de eget og andres brygg. Om &oslash;l er det du har lyst p&aring; og smak er noe du setter pris p&aring;, s&aring; er Schouskjelleren plassen hvor du kan utfordre smaksl&oslash;ken. I en kjeller under Schousplass finner du en gildehall med tent peisen, god atmosf&aelig;re og et &oslash;l utvalg som vill garantere &aring; fylle et av dine smaks behov, fra Import til egen brygget. Det er mange av oss som setter pris p&aring; god &oslash;l, men du er kanskje ikke en ekspert n&aring;r det kommer til hva som passer deg best. Frykt ikke! De kj&aelig;re bartenderne kan sine saker og er sv&aelig;rt behjelpelige til &aring; finne noe som passer deg og dine sanser perfekt. skulle du tvile p&aring; deres ekspertise, s&aring; f&aring;r du gladelig smakspr&oslash;ve det de har p&aring; tappekran. Nyt kvelden. \n'),
(32, 'Bislett Kebab', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/bislett.jpg', '59.919833, 10.759307', 'bislettkebabgrunerlokka', 'God, rimelig og popul&aelig;r babb - Men for en service! De lager sikkert tyve kebaber p&aring; fem minutter! Den gode gamle \"vanlige\" babben st&aring;r seg fortsatt godt, og smaker noks&aring; likt som den alltid har gjort. Med lokaler kun et steinkast fra h&oslash;yskolen og priser tilpasset en fattig-student er dette en slager for de som &oslash;nsker &aring; spise seg skikkelig mett til en lavere pris enn det koster &aring; koke opp noe hjemme! Her snakker vi STOR kebab og 0.8 brus til litt over femtilappen. \n'),
(34, 'Taco Republica', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/TacoRep1.jpg', '59.917175, 10.753094', 'tacorepublica', 'Skikkelig mexicansk gatemat midt p&aring; sentrum &oslash;sts nye paradegate. De satser p&aring; autentiske og &oslash;kologiske r&aring;varer, ingen halvfabrikata. De hjemmelagde tortillachipsene er spr&oslash; og velsmakende. Taco Republica har b&aring;de sm&aring;retter, spesialteter og mange ulike tacosvarianter.\n'),
(35, 'La villa', 'http://tek.westerdals.no/~andtro16/img/img_pictures/ericbilder/lavilla.jpg', '59.912918, 10.764062', 'lavillaresturant', 'La Villa ligger sentralt i Oslos gamle bydel, T&oslash;yengata og tilbyr spennende retter og drikke varer. Hos oss vil du finne en avslappende atmosfre. Menyen til La villa er inspirert at smakfulle mat retter fra Tyrkia og Italiensk. La Villas konsept er enkelt og veltilpasset; vi tilbyr h&oslash;y kvalitet til konkurransedyktige priser. Smaksopplevelsen skal st&aring; i fokus og v&aring;re gjester skal nyte god service og rask servering.');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `studiested`
--

CREATE TABLE `studiested` (
  `Studie_id` int(3) NOT NULL,
  `Navn` char(60) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `Stromuttak` enum('http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/stikkontaktAv.png','http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/StikkontaktPa.png') DEFAULT NULL,
  `Wifi` enum('http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiAv.png','http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiPa.png') DEFAULT NULL,
  `KaffePris` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `studiested`
--

INSERT INTO `studiested` (`Studie_id`, `Navn`, `Stromuttak`, `Wifi`, `KaffePris`) VALUES
(5, 'Kaffebrenneriet', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/StikkontaktPa.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiPa.png', 59),
(35, 'La villa', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/StikkontaktPa.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiAv.png', 69),
(2, 'Peloton', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/stikkontaktAv.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiPa.png', 40),
(10, 'People\'s', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/stikkontaktAv.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiPa.png', 65),
(3, 'Starbucks', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/StikkontaktPa.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiPa.png', 30),
(34, 'Taco Republica', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/StikkontaktPa.png', 'http://tek.westerdals.no/~andtro16/img/img_layout/layout_icons/wifiAv.png', 45);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `utested`
--

CREATE TABLE `utested` (
  `Ute_id` int(3) NOT NULL,
  `Navn` char(60) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `OlPris` int(3) NOT NULL,
  `Aldersgrense` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `utested`
--

INSERT INTO `utested` (`Ute_id`, `Navn`, `OlPris`, `Aldersgrense`) VALUES
(1, 'Cafe Sara', 89, 21),
(35, 'La villa', 79, 18),
(18, 'Schouskjelleren', 70, 21),
(4, 'SYNG', 49, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spisested`
--
ALTER TABLE `spisested`
  ADD PRIMARY KEY (`Navn`),
  ADD UNIQUE KEY `Navn` (`Navn`),
  ADD UNIQUE KEY `Plass_Id_2` (`Plass_Id`),
  ADD KEY `Plass_Id` (`Plass_Id`);

--
-- Indexes for table `sted`
--
ALTER TABLE `sted`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `studiested`
--
ALTER TABLE `studiested`
  ADD PRIMARY KEY (`Navn`),
  ADD UNIQUE KEY `Navn` (`Navn`),
  ADD KEY `Studie_id` (`Studie_id`);

--
-- Indexes for table `utested`
--
ALTER TABLE `utested`
  ADD PRIMARY KEY (`Navn`),
  ADD UNIQUE KEY `Navn` (`Navn`),
  ADD KEY `Ute_id` (`Ute_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sted`
--
ALTER TABLE `sted`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `spisested`
--
ALTER TABLE `spisested`
  ADD CONSTRAINT `spisested_ibfk_1` FOREIGN KEY (`Plass_Id`) REFERENCES `sted` (`Id`);

--
-- Begrensninger for tabell `studiested`
--
ALTER TABLE `studiested`
  ADD CONSTRAINT `studiested_ibfk_1` FOREIGN KEY (`Studie_id`) REFERENCES `sted` (`Id`);

--
-- Begrensninger for tabell `utested`
--
ALTER TABLE `utested`
  ADD CONSTRAINT `utested_ibfk_1` FOREIGN KEY (`Ute_id`) REFERENCES `sted` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
