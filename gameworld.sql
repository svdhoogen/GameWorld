-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2018 at 09:33 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameId` int(11) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `gamePrice` decimal(5,2) NOT NULL,
  `platform` int(11) NOT NULL,
  `gameImage` varchar(50) NOT NULL,
  `gameDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameId`, `gameName`, `gamePrice`, `platform`, `gameImage`, `gameDescription`) VALUES
(0, 'Your cart is empty!', '0.00', 0, 'no-games.png', 'There are no games in your cart! Go to our storepage, add some games to your cart and then return to see your upcoming purchases!'),
(1, 'Fallout: 76', '59.98', 2, 'fallout76-pc.png', 'Fallout 76 is an online multiplayer action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks. It is the ninth game in the Fallout series and serves as a narrative prequel to the series.'),
(2, 'Fallout: 76', '64.98', 1, 'fallout76-play.png', 'Fallout 76 is an online multiplayer action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks. It is the ninth game in the Fallout series and serves as a narrative prequel to the series.'),
(3, 'Fallout: 76', '64.98', 3, 'fallout76-xbox.png', 'Fallout 76 is an online multiplayer action role-playing video game developed by Bethesda Game Studios and published by Bethesda Softworks. It is the ninth game in the Fallout series and serves as a narrative prequel to the series.'),
(4, 'Battlefield V', '64.98', 3, 'bf5-xbox.png', 'Battlefield V is an upcoming first-person shooter video game developed by EA DICE and published by Electronic Arts. Battlefield V is the sixteenth installment in the Battlefield series.'),
(5, 'Battlefield V', '64.98', 1, 'bf5-play.png', 'Battlefield V is an upcoming first-person shooter video game developed by EA DICE and published by Electronic Arts. Battlefield V is the sixteenth installment in the Battlefield series.'),
(6, 'Battlefield V', '59.98', 2, 'bf5-pc.png', 'Battlefield V is an upcoming first-person shooter video game developed by EA DICE and published by Electronic Arts. Battlefield V is the sixteenth installment in the Battlefield series.'),
(7, 'Red Dead Redemption 2', '64.98', 3, 'rdr2-xbox.png', 'Red Dead Redemption 2 is an action-adventure game developed and published by Rockstar Games. The game is a prequel to the 2010 game Red Dead Redemption, and the third entry in the Western-themed Red Dead series.'),
(8, 'Red Dead Redemption 2', '64.98', 1, 'rdr2-play.png', 'Red Dead Redemption 2 is an action-adventure game developed and published by Rockstar Games. The game is a prequel to the 2010 game Red Dead Redemption, and the third entry in the Western-themed Red Dead series.'),
(9, 'Minecraft', '29.98', 3, 'mc-xbox.png', 'Minecraft is a 2011 sandbox video game created by Swedish game developer Markus Persson and later developed by Mojang. The game allows players to build with a variety of different blocks in a 3D procedurally generated world, requiring creativity from players.'),
(10, 'Minecraft', '23.95', 2, 'mc-pc.png', 'Minecraft is a 2011 sandbox video game created by Swedish game developer Markus Persson and later developed by Mojang. The game allows players to build with a variety of different blocks in a 3D procedurally generated world, requiring creativity from players.'),
(11, 'Assassin\'s Creed Odyssey', '39.98', 2, 'aco-pc.png', 'Assassin\'s Creed Origins is an action-adventure video game developed by Ubisoft Montreal and published by Ubisoft. It is the tenth major installment in the Assassin\'s Creed series and the successor to 2015\'s Assassin\'s Creed Syndicate.'),
(12, 'Assassin\'s Creed Odyssey', '39.98', 1, 'aco-play.png', 'Assassin\'s Creed Origins is an action-adventure video game developed by Ubisoft Montreal and published by Ubisoft. It is the tenth major installment in the Assassin\'s Creed series and the successor to 2015\'s Assassin\'s Creed Syndicate.'),
(13, 'Assassin\'s Creed Odyssey', '39.98', 3, 'aco-xbox.png', 'Assassin\'s Creed Origins is an action-adventure video game developed by Ubisoft Montreal and published by Ubisoft. It is the tenth major installment in the Assassin\'s Creed series and the successor to 2015\'s Assassin\'s Creed Syndicate.'),
(14, 'FIFA 19', '39.98', 1, 'fifa19-play.png', 'FIFA 19 is a football simulation video game developed by EA Vancouver and EA Bucharest, as part of Electronic Arts\' FIFA series. Announced on 6 June 2018 for its E3 2018 press conference, it was released on 28 September 2018 for PlayStation 3, PlayStation 4, Xbox 360, Xbox One, Nintendo Switch, and Microsoft Windows.'),
(15, 'FIFA 19', '39.98', 2, 'fifa19-pc.png', 'FIFA 19 is a football simulation video game developed by EA Vancouver and EA Bucharest, as part of Electronic Arts\' FIFA series. Announced on 6 June 2018 for its E3 2018 press conference, it was released on 28 September 2018 for PlayStation 3, PlayStation 4, Xbox 360, Xbox One, Nintendo Switch, and Microsoft Windows.'),
(16, 'FIFA 19', '39.98', 3, 'fifa19-xbox.png', 'FIFA 19 is a football simulation video game developed by EA Vancouver and EA Bucharest, as part of Electronic Arts\' FIFA series. Announced on 6 June 2018 for its E3 2018 press conference, it was released on 28 September 2018 for PlayStation 3, PlayStation 4, Xbox 360, Xbox One, Nintendo Switch, and Microsoft Windows.'),
(17, 'Call of Duty: Black Ops 4', '64.98', 1, 'codbo4-play.png', 'Call of Duty: Black Ops 4 is a multiplayer first-person shooter developed by Treyarch and published by Activision. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on October 12, 2018.'),
(18, 'Call of Duty: Black Ops 4', '59.98', 2, 'codbo4-pc.png', 'Call of Duty: Black Ops 4 is a multiplayer first-person shooter developed by Treyarch and published by Activision. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on October 12, 2018.'),
(19, 'Call of Duty: Black Ops 4', '64.98', 3, 'codbo4-xbox.png', 'Call of Duty: Black Ops 4 is a multiplayer first-person shooter developed by Treyarch and published by Activision. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on October 12, 2018.'),
(20, 'Grand Theft Auto V', '29.98', 1, 'gta5-play.png', 'Grand Theft Auto V is an action-adventure video game developed by Rockstar North and published by Rockstar Games. It was released in September 2013 for PlayStation 3 and Xbox 360, in November 2014 for PlayStation 4 and Xbox One, and in April 2015 for Microsoft Windows.'),
(21, 'Grand Theft Auto V', '24.98', 2, 'gta5-pc.png', 'Grand Theft Auto V is an action-adventure video game developed by Rockstar North and published by Rockstar Games. It was released in September 2013 for PlayStation 3 and Xbox 360, in November 2014 for PlayStation 4 and Xbox One, and in April 2015 for Microsoft Windows.'),
(22, 'Grand Theft Auto V', '29.98', 3, 'gta5-xbox.png', 'Grand Theft Auto V is an action-adventure video game developed by Rockstar North and published by Rockstar Games. It was released in September 2013 for PlayStation 3 and Xbox 360, in November 2014 for PlayStation 4 and Xbox One, and in April 2015 for Microsoft Windows.'),
(23, 'Counter-Strike: Global Offensive', '14.99', 2, 'csgo-pc.png', 'Counter-Strike: Global Offensive is a multiplayer first-person shooter video game developed by Hidden Path Entertainment and Valve Corporation.'),
(24, 'The Witcher 3: Wild Hunt', '29.98', 1, 'witcher3-play.png', 'The Witcher 3: Wild Hunt is a 2015 action role-playing game developed and published by CD Projekt. Based on The Witcher series of fantasy novels by Polish author Andrzej Sapkowski, it is the sequel to the 2011 game The Witcher 2: Assassins of Kings.'),
(25, 'The Witcher 3: Wild Hunt', '24.98', 2, 'witcher3-pc.png', 'The Witcher 3: Wild Hunt is a 2015 action role-playing game developed and published by CD Projekt. Based on The Witcher series of fantasy novels by Polish author Andrzej Sapkowski, it is the sequel to the 2011 game The Witcher 2: Assassins of Kings.'),
(26, 'The Witcher 3: Wild Hunt', '29.98', 3, 'witcher3-xbox.png', 'The Witcher 3: Wild Hunt is a 2015 action role-playing game developed and published by CD Projekt. Based on The Witcher series of fantasy novels by Polish author Andrzej Sapkowski, it is the sequel to the 2011 game The Witcher 2: Assassins of Kings.'),
(27, 'Rocket League', '29.98', 1, 'rocketleague-play.png', 'Rocket League is a vehicular soccer video game developed and published by Psyonix. The game was first released for Microsoft Windows and PlayStation 4 in July 2015, with ports for Xbox One, macOS, Linux, and Nintendo Switch being released later on.'),
(28, 'Rocket League', '24.98', 2, 'rocketleague-pc.png', 'Rocket League is a vehicular soccer video game developed and published by Psyonix. The game was first released for Microsoft Windows and PlayStation 4 in July 2015, with ports for Xbox One, macOS, Linux, and Nintendo Switch being released later on.'),
(29, 'Rocket League', '29.98', 3, 'rocketleague-xbox.png', 'Rocket League is a vehicular soccer video game developed and published by Psyonix. The game was first released for Microsoft Windows and PlayStation 4 in July 2015, with ports for Xbox One, macOS, Linux, and Nintendo Switch being released later on.'),
(30, 'RimWorld', '29.99', 2, 'rimworld-pc.png', 'A sci-fi colony sim driven by an intelligent AI storyteller. Inspired by Dwarf Fortress and Firefly. Generates stories by simulating psychology, ecology, gunplay, melee combat, climate, biomes, diplomacy, interpersonal relationships, art, medicine, trade, and more.'),
(31, 'God of War', '64.98', 1, 'godofwar-play.png', 'God of War is an action-adventure video game developed by Santa Monica Studio and published by Sony Interactive Entertainment. Released on April 20, 2018, for the PlayStation 4 console, it is the eighth installment in the God of War series, the eighth chronologically, and the sequel to 2010\'s God of War III.');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `catagoryId` int(11) NOT NULL,
  `platformName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`catagoryId`, `platformName`) VALUES
(0, 'None'),
(1, 'Playstation'),
(2, 'PC'),
(3, 'Xbox');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameId`),
  ADD KEY `catagoryId` (`platform`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`catagoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `catagoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `catagoryId` FOREIGN KEY (`platform`) REFERENCES `platform` (`catagoryId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
