-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 05:48 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hustdoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(8) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
`id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `summary` text NOT NULL,
  `pages` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `body` varchar(1000) NOT NULL,
  `size` double NOT NULL,
  `author` varchar(20) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `downloads` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `visible` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `user_id`, `summary`, `pages`, `likes`, `body`, `size`, `author`, `views`, `downloads`, `created`, `modified`, `visible`) VALUES
(1, 'Tai lieu thu y', 1, 'Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary ', 100, 0, 'Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary Summary ', 17, 'Unknow', 0, 0, '2015-03-27 13:55:24', '2015-03-27 13:55:24', '1'),
(2, 'Test', 1, 'AAA', 0, 0, '0', 0, 'w', 0, 0, '2015-04-02 22:26:48', '2015-04-02 22:26:48', '0');

-- --------------------------------------------------------

--
-- Table structure for table `documents_topics`
--

CREATE TABLE IF NOT EXISTS `documents_topics` (
  `document_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents_topics`
--

INSERT INTO `documents_topics` (`document_id`, `topic_id`) VALUES
(2, 3),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
`id` int(8) NOT NULL,
  `title` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `user_id`, `created`, `modified`) VALUES
(3, 'First topics', 2, '2015-03-25 23:35:34', '2015-03-25 23:35:34'),
(6, 'Second', 1, '2015-03-25 23:38:05', '2015-03-25 23:38:05'),
(7, 'Third', 2, '2015-03-25 23:39:30', '2015-03-25 23:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `city` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `email`, `sex`, `date_of_birth`, `city`, `role`, `created`, `modified`) VALUES
(1, 'admin', 'Nguyen Quang Dung', 'admin', 'dungnq164@gmail.com', '1', '1993-04-16', 'Ha Noi', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'user_0', 'AAA', 'user_0', '', '0', '0000-00-00', '', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'dung164', 'Nguyen Quang Dung', '51a612430009eceebbe93d6edd460ec115704a93', 'dungnq@gmail.com', 'female', '1995-04-16', 'Ha Noi', 'admin', '2015-04-02 22:51:10', '2015-04-02 22:51:10'),
(17, 'regular', 'AAA', '51a612430009eceebbe93d6edd460ec115704a93', 'sss@gmail.com', 'male', '2027-05-12', 'w', 'user', '2015-04-02 23:18:43', '2015-04-02 23:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `document_id` (`document_id`), ADD KEY `document_id_2` (`document_id`), ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `documents_topics`
--
ALTER TABLE `documents_topics`
 ADD PRIMARY KEY (`document_id`,`topic_id`), ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`);

--
-- Constraints for table `documents_topics`
--
ALTER TABLE `documents_topics`
ADD CONSTRAINT `documents_topics_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`),
ADD CONSTRAINT `documents_topics_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
