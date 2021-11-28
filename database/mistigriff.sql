--
-- Database: `mistigriff`
--
CREATE DATABASE IF NOT EXISTS `mistigriff` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `mistigriff`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `beginGame`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `beginGame` ()  BEGIN
DECLARE tempid tinyint;
DECLARE counter tinyint;
DELETE FROM clonedeck;
DELETE FROM hand;
DELETE FROM players;
DELETE FROM  cardtable;
ALTER TABLE cardtable AUTO_INCREMENT=1;
REPLACE INTO clonedeck SELECT * FROM carddeck;
SET counter = 0;
WHILE(counter < 21) DO
    SELECT cardId INTO tempid FROM clonedeck ORDER BY RAND() LIMIT 1;
    INSERT INTO hand(playerId, cardId) VALUES (1, tempid);
    DELETE FROM clonedeck WHERE cardId = tempid;
    SELECT cardId INTO tempid FROM clonedeck ORDER BY RAND() LIMIT 1;
    INSERT INTO hand(playerId, cardId) VALUES (2, tempid);
    DELETE FROM clonedeck WHERE cardId = tempid;
    SET counter = counter + 1;
END WHILE;
END$$

DROP PROCEDURE IF EXISTS `playerTurn`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `playerTurn` ()  NO SQL
BEGIN
DECLARE tempval tinyint;
SELECT turn INTO tempval FROM players WHERE playerid = 1;
IF(tempval > 0) THEN
	UPDATE players SET turn = 0 WHERE playerId = 1;
	UPDATE players SET turn = 1 WHERE playerId = 2;
ELSE
	UPDATE players SET turn = 1 WHERE playerId = 1;
	UPDATE players SET turn = 0 WHERE playerId = 2;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `carddeck`
--

DROP TABLE IF EXISTS `carddeck`;
CREATE TABLE `carddeck` (
  `cardId` tinyint(4) NOT NULL,
  `cardCode` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `carddeck`
--

INSERT INTO `carddeck` (`cardId`, `cardCode`) VALUES
(1, 'r0'),
(2, 'r0'),
(3, 'r1'),
(4, 'r1'),
(5, 'r2'),
(6, 'r2'),
(7, 'r3'),
(8, 'r3'),
(9, 'r4'),
(10, 'r4'),
(11, 'r5'),
(12, 'r5'),
(13, 'r6'),
(14, 'r6'),
(15, 'r7'),
(16, 'r7'),
(17, 'r8'),
(18, 'r8'),
(19, 'r9'),
(20, 'y9'),
(21, 'y1');

-- --------------------------------------------------------

--
-- Table structure for table `cardtable`
--

DROP TABLE IF EXISTS `cardtable`;
CREATE TABLE `cardtable` (
  `number` int(11) NOT NULL,
  `cardCode` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Table structure for table `clonedeck`
--

DROP TABLE IF EXISTS `clonedeck`;
CREATE TABLE `clonedeck` (
  `cardId` tinyint(4) NOT NULL,
  `cardCode` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



--
-- Table structure for table `hand`
--

DROP TABLE IF EXISTS `hand`;
CREATE TABLE `hand` (
  `playerId` int(6) NOT NULL,
  `cardId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `playerId` tinyint(4) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `turn` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `carddeck`
--
ALTER TABLE `carddeck`
  ADD PRIMARY KEY (`cardId`);

--
-- Indexes for table `cardtable`
--
ALTER TABLE `cardtable`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardtable`
--
ALTER TABLE `cardtable`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;