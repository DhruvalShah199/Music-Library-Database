-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 06:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS music_system;
use music_system;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_playlist`
--

CREATE TABLE `add_playlist` (
  `id` int(11) NOT NULL,
  `playlist_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_playlist`
--

INSERT INTO `add_playlist` (`id`, `playlist_Id`) VALUES
(2, 18),
(2, 21),
(21, 22),
(22, 23),
(22, 24),
(22, 25),
(22, 27),
(22, 32),
(22, 33),
(22, 34),
(22, 35);

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_Id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `releaseyear` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_Id`, `title`, `genre`, `releaseyear`) VALUES
(1, 'Scorpion', 'Hip-hop', '2018'),
(2, 'Starboy', 'Pop', '2017'),
(3, 'One More Light', 'Alternative Rock', '2017'),
(4, 'A Head Full of Dreams', 'Pop', '2015'),
(5, 'Recovery', 'Rap', '2010'),
(6, 'A Night At The Opera', 'Rock', '1975'),
(7, 'Honky Chateau', 'Pop', '1972'),
(8, '18 Months', 'EDM', '2012'),
(9, 'DAMN.', 'Hip-hop', '2017'),
(10, 'Harry\'s House', 'Pop', '2022'),
(11, 'The Click', 'Indie Pop', '2017'),
(12, 'Glory Sound Prep', 'Indie Pop', '2018'),
(13, '=', 'Pop', '2021'),
(14, 'Native', 'Pop', '2013'),
(15, '33', 'Pop', '2025'),
(16, '37', 'Pop', '2030'),
(17, 'Koolaid', 'Kids', '1991'),
(18, 'Origins', 'Alternative Rock', '2018'),
(19, 'Memories...Do Not Open', 'EDM', '2017'),
(20, 'RENAISSANCE', 'Pop', '2022'),
(21, '21', 'Pop', '2011');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_Id` int(11) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Style` varchar(100) NOT NULL,
  `user_Id` int(11) DEFAULT NULL,
  `artist_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_Id`, `Country`, `Style`, `user_Id`, `artist_Name`) VALUES
(1, 'Canada', 'EDM', 2, 'Ahmad Al-Mousa'),
(2, 'Canada', 'Pop', 10, 'Dhruval Shah'),
(3, 'Canada', 'Hip-hop', NULL, 'Drake'),
(4, 'Canada', 'Pop', NULL, 'The Weeknd'),
(5, 'USA', 'Rock', NULL, 'Linkin Park'),
(6, 'Canada', 'Pop', NULL, 'Justin Beiber'),
(7, 'UK', 'Alternative Rock', NULL, 'Coldplay'),
(8, 'USA', 'Rap', NULL, 'Eminem'),
(9, 'USA', 'R&B', NULL, 'Rihanna'),
(10, 'Jamaica', 'R&B', NULL, 'Bob Marley'),
(11, 'USA', 'Hip-hop', NULL, 'Jay Z'),
(12, 'USA', 'Pop', NULL, 'Beyonce'),
(13, 'UK', 'Rock', NULL, 'Queen'),
(14, 'Netherlands', 'EDM', NULL, 'Martin Garrix'),
(15, 'Australia', 'Metallic Rock', NULL, 'AC/DC'),
(16, 'UK', 'Pop', NULL, 'Elton John'),
(17, 'UK', 'EDM', NULL, 'Calvin Harris'),
(18, 'USA', 'Hip-hop', NULL, 'Kendrick Lamar'),
(19, 'UK', 'Hip-hop', NULL, 'Stormzy'),
(20, 'UK', 'Hip-hop', NULL, 'Harry Styles'),
(21, 'USA', 'Hip-hop', NULL, 'Jack Harlow'),
(22, 'USA', 'Country', NULL, 'Florida Line Georgia'),
(23, 'USA', 'Indie Pop', NULL, 'AJR'),
(24, 'USA', 'Pop', NULL, 'Jon Bellion'),
(25, 'USA', 'EDM', NULL, 'Illenium'),
(26, 'UK', 'Pop', NULL, 'Ed Sheeran'),
(27, 'USA', 'Alternative Rock', NULL, 'OneRepublic'),
(28, 'USA', 'Rock', NULL, 'Imagine Dragons'),
(29, 'USA', 'EDM', NULL, 'The Chainsmokers'),
(30, 'Canada', 'Pop', NULL, 'Bryan Adams'),
(31, 'UK', 'Soul', NULL, 'Adele');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `playlist_Id` int(11) NOT NULL,
  `song_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`playlist_Id`, `song_Id`) VALUES
(18, 12),
(22, 1),
(22, 7),
(22, 12),
(22, 14),
(22, 83),
(23, 1),
(23, 10),
(24, 2),
(24, 92),
(25, 2),
(25, 6),
(25, 26),
(25, 82),
(25, 92),
(27, 23),
(27, 26),
(27, 82),
(32, 42);

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

CREATE TABLE `makes` (
  `album_Id` int(11) NOT NULL,
  `artist_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`album_Id`, `artist_Id`) VALUES
(1, 3),
(2, 4),
(3, 5),
(4, 7),
(5, 8),
(6, 13),
(7, 16),
(8, 17),
(9, 18),
(10, 20),
(11, 23),
(12, 24),
(13, 26),
(14, 27),
(15, 2),
(16, 1),
(17, 2),
(18, 28),
(19, 29),
(20, 12),
(21, 31);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playlist_Id` int(11) NOT NULL,
  `playlist_Name` varchar(100) NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlist_Id`, `playlist_Name`, `duration`) VALUES
(8, 'Testing', '00:00:00'),
(18, 'Maryam', '00:03:14'),
(21, 'Testing', '00:00:00'),
(22, 'Ahmaaaad', '00:18:02'),
(23, 'Playlist 1', '00:06:56'),
(24, 'Playlist 2', '00:08:23'),
(25, 'Playlist 3', '00:19:23'),
(27, 'Playlist 4', '00:11:06'),
(32, 'Playlist 5', '00:03:39'),
(33, 'Playlist 6', '00:00:00'),
(34, '', '00:00:00'),
(35, 'P5', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_Id` int(11) NOT NULL,
  `song_Name` varchar(100) NOT NULL,
  `duration` time NOT NULL,
  `Album_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_Id`, `song_Name`, `duration`, `Album_Id`) VALUES
(1, 'Ignition (Remix)', '00:03:06', NULL),
(2, 'I Will Survive\r\n', '00:03:18', 16),
(3, 'Nonstop', '00:03:58', 1),
(4, 'God\'s Plan', '00:03:18', 1),
(5, 'Survival', '00:02:16', 1),
(6, 'In My Feelings', '00:03:37', 1),
(7, 'Emotionless', '00:05:02', 1),
(8, 'One More Time', '00:05:20', 17),
(9, 'Talk Up (feat. Jay-Z)', '00:03:43', 1),
(10, 'Starboy', '00:03:50', 2),
(11, 'Party Monster', '00:04:09', 2),
(12, 'You\'re the one', '00:03:14', 16),
(13, 'False Alarm', '00:03:40', 2),
(14, 'Reminder', '00:03:38', 2),
(15, 'Secrets', '00:04:25', 2),
(16, 'Sidewalks', '00:03:51', 2),
(17, 'Heavy (feat. Kiiara)', '00:02:49', 3),
(18, 'Invisible', '00:03:34', 3),
(19, 'Battle Symphony', '00:03:36', 3),
(20, 'Good Goodbye', '00:03:31', 3),
(21, 'One More Light', '00:04:15', 3),
(22, 'Up&Up', '00:06:45', 4),
(23, 'A Head Full of Dream', '00:03:43', 4),
(24, 'Hymn for the Weekend', '00:04:18', 4),
(25, 'Everglow', '00:04:42', 4),
(26, 'Adventure of a Lifetime', '00:04:23', 4),
(27, 'Not Afraid', '00:04:08', 5),
(28, 'Space Bound', '00:04:38', 5),
(29, 'Love The Way You Lie', '00:04:23', 5),
(30, 'So Bad', '00:05:25', 5),
(31, 'Cinderella Man', '00:04:39', 5),
(32, 'Bohemian Rhapsody', '00:05:55', 6),
(33, 'God Save The Queen', '00:01:15', 6),
(34, 'I\'m In Love With My Car ', '00:03:04', 6),
(35, 'Love Of My Life', '00:03:37', 6),
(36, 'Rocket Man (I Think It\'s Going To Be A Long, Long Time)', '00:04:41', 7),
(37, 'Honky Cat', '00:05:13', 7),
(38, 'Mellow', '00:05:32', 7),
(39, 'Amy', '00:04:30', 7),
(40, 'Feel So Close', '00:03:00', 8),
(41, 'We Found Love (feat. Rihanna)', '00:03:35', 8),
(42, 'Iron', '00:03:39', 8),
(43, 'I Need Your Love(feat. Ellie Goulding)', '00:03:54', 8),
(44, 'Drinking From The Bottle', '00:04:00', 8),
(45, 'DNA.', '00:03:05', 9),
(46, 'LOYALTY.FEAT.RIHANNA.', '00:03:47', 9),
(47, 'HUMBLE.', '00:02:57', 9),
(48, 'GOD.', '00:04:08', 9),
(49, 'BLOOD.', '00:01:58', 9),
(50, 'Daydreaming', '00:03:00', 10),
(51, 'Satellite', '00:03:03', 10),
(52, 'As It Was', '00:02:53', 10),
(53, 'Grapejuice', '00:03:00', 10),
(54, 'The Good Part', '00:03:00', 11),
(55, 'Weak', '00:03:17', 11),
(56, 'Sober Up', '00:03:03', 11),
(57, 'Turning Out', '00:04:04', 11),
(58, 'Come Hang Out', '00:04:04', 11),
(59, 'Blu', '00:03:03', 12),
(60, 'Cautionary Tales', '00:03:05', 12),
(61, 'Stupid Deep', '00:03:47', 12),
(62, 'The Internet', '00:02:57', 12),
(63, 'Tides', '00:03:13', 13),
(64, 'Shivers', '00:03:16', 13),
(65, 'Bad Habits', '00:03:30', 13),
(66, '2step', '00:02:57', 13),
(67, 'Counting Stars', '00:04:00', 14),
(68, 'If I Lose Myself', '00:04:25', 14),
(69, 'What You Wanted', '00:04:14', 14),
(70, 'I Lived', '00:03:23', 14),
(71, 'Bad Liar', '00:04:53', 18),
(72, 'West Coast', '00:03:00', 18),
(73, 'Zero', '00:03:15', 18),
(74, 'Birds', '00:03:25', 18),
(75, 'Last Day Alive', '00:03:00', 19),
(76, 'Something Just Like This', '00:04:18', 19),
(77, 'Bloodstream', '00:03:34', 19),
(78, 'The One', '00:02:46', 19),
(79, 'CUFF IT', '00:03:15', 20),
(80, 'BREAK MY SOUL', '00:04:24', 20),
(81, 'COZY', '00:03:35', 20),
(82, 'ALIEN SUPERSTAR', '00:03:00', 20),
(83, 'Rolling in the Deep', '00:03:02', 21),
(84, 'Set Fire to the Rain', '00:04:15', 21),
(85, 'Someone Like You', '00:04:21', 21),
(86, 'Baby', '00:03:45', NULL),
(87, 'Yummy', '00:03:15', NULL),
(88, 'Umbrella', '00:04:16', NULL),
(89, 'Sun Is Shinning', '00:02:56', NULL),
(90, 'No Woman No Cry', '00:03:35', NULL),
(91, 'Encore', '00:04:00', NULL),
(92, 'Animals', '00:05:05', NULL),
(93, 'Pizza', '00:04:13', NULL),
(94, 'Back In Black', '00:04:57', NULL),
(95, 'Thunderstruck', '00:04:35', NULL),
(96, 'Cruise', '00:03:15', NULL),
(97, 'Mel Made Me Do It', '00:07:02', NULL),
(98, 'First Class', '00:02:43', NULL),
(99, 'WHATS POPPIN', '00:02:42', NULL),
(100, 'Takeaway', '00:03:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `phonenum` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `rank` varchar(100) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `f_name`, `l_name`, `phonenum`, `age`, `rank`) VALUES
(2, 'ahmad_attar@hotmail.com', '1234', 'Ahmad', 'A', '416555444', 24, 'Artist'),
(10, 'dhruval@lake.ca', '123', 'Dhruval', 'S', '12345', 12, 'Artist'),
(20, 'ahmad8.attar9@gmail.com', '123', 'John', 'Doe', '123', 25, 'User'),
(21, 'aal-mous2@lakehead.ca', '123456', 'Ahmaaad', 'al-Mousa', '123456', 46, 'User'),
(22, 'dsh1234@gmail.com', '12345', 'Dhruval H', 'Shah', '12345', 21, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_playlist`
--
ALTER TABLE `add_playlist`
  ADD PRIMARY KEY (`id`,`playlist_Id`),
  ADD KEY `playlist_Id` (`playlist_Id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_Id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_Id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD KEY `playlist_Id` (`playlist_Id`,`song_Id`),
  ADD KEY `song_Id` (`song_Id`);

--
-- Indexes for table `makes`
--
ALTER TABLE `makes`
  ADD KEY `album_Id` (`album_Id`,`artist_Id`),
  ADD KEY `artist_Id` (`artist_Id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_Id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_Id`),
  ADD KEY `Album_Id` (`Album_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_playlist`
--
ALTER TABLE `add_playlist`
  ADD CONSTRAINT `add_playlist_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_playlist_ibfk_2` FOREIGN KEY (`playlist_Id`) REFERENCES `playlist` (`playlist_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artist`
--
ALTER TABLE `artist`
  ADD CONSTRAINT `artist_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user` (`id`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_ibfk_1` FOREIGN KEY (`playlist_Id`) REFERENCES `playlist` (`playlist_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `features_ibfk_2` FOREIGN KEY (`song_Id`) REFERENCES `songs` (`song_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `makes`
--
ALTER TABLE `makes`
  ADD CONSTRAINT `makes_ibfk_1` FOREIGN KEY (`album_Id`) REFERENCES `album` (`album_Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `makes_ibfk_2` FOREIGN KEY (`artist_Id`) REFERENCES `artist` (`artist_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`Album_Id`) REFERENCES `album` (`album_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
