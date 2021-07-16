-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 08:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youstream2`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artistid` int(11) NOT NULL,
  `name` varchar(511) NOT NULL,
  `description` text NOT NULL,
  `social` varchar(511) NOT NULL,
  `followers` int(11) NOT NULL,
  `tag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artistid`, `name`, `description`, `social`, `followers`, `tag`) VALUES
(1, 'Kailash Kher', 'Kailash Kher is an Indian playback singer and music composer, he sings songs with a music style influenced by Indian folk music and Sufi music. He is inspired by the classical musicians Pandit Kumar Gandharva, Pandit Hridaynath Mangeshkar, Pandit Bhimsen Joshi, and the Qawwali singer Nusrat Fateh Ali Khan.\r\n', 'https://twitter.com/Kailashkher', 0, 'Kailash.1'),
(2, 'Prashoon Joshi', 'Prasoon Joshi is an Indian poet, writer, lyricist, screenwriter, and communication specialist and marketer. He is the CEO of McCann World group India and Chairman APAC, a subsidiary of the global marketing firm McCann Erickson. He was appointed as the Chairperson of the Central Board of Film Certification on 11 August.\r\n', 'https://twitter.com/prasoonjoshi_', 0, NULL),
(3, 'Isha Foundation', 'Isha Foundation is a non profit, spiritual organisation founded in 1992 near Coimbatore, India, by Sadhguru Jaggi Vasudev. It hosts the Isha Yoga Centre, which offers yoga programs under the name Isha Yoga. The foundation is run entirely by volunteers and has over 9 million volunteers. \r\n', 'https://twitter.com/ishafoundation', 0, NULL),
(4, 'Chrish Titus Tech', 'The channel focus is spread into 3 categories that I specialize in. Linux, Storage, and Servers. I enjoy all technology and have a vast skill set so if there isn\'t something on here that you\'d like to see, let me know!  ', 'https://twitter.com/christitustech', 0, NULL),
(5, 'Benn Jayms Tkalcevic', 'Austrlian filmaker, videographer and YouTuber.', 'None', 0, NULL),
(7, 'Prajwal Dwivedi', 'Youstream Dev Team.', 'None', 0, NULL),
(8, 'Creative Frontend Studios ', 'Creative Frontend Studios is a virtual website design studio created to help audience learn basics of UI/UX and coding them with the help of HTML, CSS, JAVASCRIPT. <br> 	Our main goal is to teach modern technologies like React, WebGL to make your dream project look next level. Apart from this we periodically do Web Design Inspiration videos where we showcase the finest of the websites we encountered on the Internet. ', 'https://www.facebook.com/creative.frontend.studio', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(1023) DEFAULT NULL,
  `social` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `description`, `social`) VALUES
(1, 'prajwal', '$2y$10$0bU6VgFXTDuWT8hPcbHTheCxI.rEKuEoKPog8mhK5U3nSLlAmF1JS', 'prajwaldwivedi257@gmail.com', 'Its not Hello World Not. I\'m here for 21 years now...', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videoid` smallint(6) NOT NULL,
  `title` varchar(511) NOT NULL,
  `description` text NOT NULL,
  `length` smallint(6) NOT NULL,
  `tag` varchar(1023) NOT NULL,
  `likes` mediumint(9) DEFAULT 0,
  `dislikes` mediumint(9) DEFAULT 0,
  `watched` mediumint(9) DEFAULT 0,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videoid`, `title`, `description`, `length`, `tag`, `likes`, `dislikes`, `watched`, `date`) VALUES
(1, 'Adiyogi: The Source of Yoga ', 'In homage to Adiyogi, the first yogi, famed singer Kailash Kher has composed an all new song with lyrics by poet and writer Prasoon Joshi. Come and bask in the grace of Adiyogi. \r\n', 254, 'songs', 2, 1, 8, '2021-07-06'),
(2, 'The Best Windows Utility', 'This is an open source utility I have been working on for years now. It can install, tweak, fix, and control windows updates.\r\n', 715, 'tutorial', 1, 0, 7, '2021-07-07'),
(3, 'Magic of India Cinematic Video', 'It was our first time in India, a place that had always been high on my list. Erik, Vunkki and I arrived just in time to experience the colourful celebrations of holi, where coloured starch powder is thrown, with water throwing and many other prank like activities that take place on every street. We had the experience of a lifetime getting involved in the celebrations and being covered in colours. Unfortunately due to the restrictions of the COVID19 virus covering the globe, we had to leave India early to go back to our homes. We planned to visit many more places North and South, however we could only stay for 10 days, and in that time we visited Delhi, Vrindivan, Mathura, Orcha, Agra, and Varanasi. However even though we didn\'t see all of India\'s amazing locations, it gives us a great reason to come back again!\r\n', 289, 'other', 1, 1, 5, '2021-07-07'),
(5, 'YouStream S01E01', 'How Youstream works.', 692, 'tutorial', 1, 0, 4, '2021-07-07'),
(6, 'Web Design Inspiration April 2021', 'The designing is all about getting inspired and finding inspiration is difficult. Here are top 5 websites that we found inspiring this month. <br>In a future video we\'ll try to replicate some of the effects shown in this video. If you want any specific effect to get covered then comment the timestamp of that effect, we\'ll try to make a video on that as well.', 464, 'tutorial', 0, 0, 2, '2021-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `video_artists`
--

CREATE TABLE `video_artists` (
  `videoid` smallint(6) NOT NULL,
  `artistid` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_artists`
--

INSERT INTO `video_artists` (`videoid`, `artistid`, `role`, `date`) VALUES
(1, 1, 'Singer and Composer', '2021-07-06'),
(1, 2, 'Writer', '2021-07-06'),
(1, 3, 'Producers', '2021-07-06'),
(2, 4, 'host', '2021-07-07'),
(3, 5, 'artist', '2021-07-07'),
(5, 7, 'host', '2021-07-07'),
(6, 8, 'Author', '2021-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `watch_progress`
--

CREATE TABLE `watch_progress` (
  `videoid` smallint(6) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` mediumint(9) NOT NULL,
  `fav` tinyint(1) DEFAULT NULL,
  `like_status` tinyint(4) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watch_progress`
--

INSERT INTO `watch_progress` (`videoid`, `userid`, `time`, `fav`, `like_status`, `date`) VALUES
(3, 1, 53, 1, 1, '2021-07-15 18:55:46'),
(1, 1, 40, NULL, 1, '2021-07-15 18:53:44'),
(2, 1, 120, NULL, 1, '2021-07-15 18:54:14'),
(5, 1, 20, NULL, 1, '2021-07-15 16:24:00'),
(6, 1, 66, NULL, NULL, '2021-07-16 09:22:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artistid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoid`);

--
-- Indexes for table `video_artists`
--
ALTER TABLE `video_artists`
  ADD KEY `video_artists_ibfk_1` (`artistid`),
  ADD KEY `video_artists_ibfk_2` (`videoid`);

--
-- Indexes for table `watch_progress`
--
ALTER TABLE `watch_progress`
  ADD KEY `watch_progress_ibfk_1` (`videoid`),
  ADD KEY `watch_progress_ibfk_2` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video_artists`
--
ALTER TABLE `video_artists`
  ADD CONSTRAINT `video_artists_ibfk_1` FOREIGN KEY (`artistid`) REFERENCES `artists` (`artistid`) ON DELETE CASCADE,
  ADD CONSTRAINT `video_artists_ibfk_2` FOREIGN KEY (`videoid`) REFERENCES `videos` (`videoid`) ON DELETE CASCADE;

--
-- Constraints for table `watch_progress`
--
ALTER TABLE `watch_progress`
  ADD CONSTRAINT `watch_progress_ibfk_1` FOREIGN KEY (`videoid`) REFERENCES `videos` (`videoid`) ON DELETE CASCADE,
  ADD CONSTRAINT `watch_progress_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
