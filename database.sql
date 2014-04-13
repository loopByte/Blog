-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: 13 Apr 2014 la 09:11
-- Versiune server: 5.5.32-0ubuntu0.13.04.1
-- Versiune PHP: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `blog`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `postdate` datetime NOT NULL,
  `tags` text NOT NULL,
  `wrap` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `postdate`, `tags`, `wrap`) VALUES
(1, 'Lorem ipsum 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras massa nisi, pellentesque et lorem id, sollicitudin sodales nulla. Sed egestas quam ac nibh congue, sed pellentesque turpis commodo. Duis ac turpis eget sapien condimentum semper quis nec odio. Cras id dui nec mauris tristique laoreet. Aliquam ultricies tortor velit, et placerat velit lacinia ultricies. Maecenas nec vestibulum tortor, vel laoreet erat. Donec ac dapibus augue. Proin non facilisis enim, sed molestie orci. Praesent vehicula vehicula porttitor. Morbi non lorem nec dolor molestie eleifend. Nulla fringilla suscipit augue nec adipiscing.</p>', '2014-04-13 09:10:53', 'lorem, ipsum, 2', 0),
(2, 'Article title goes here', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non pellentesque lacus. Suspendisse eu odio arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec euismod erat nec mauris hendrerit, non interdum mauris pretium. Ut auctor adipiscing mauris et pharetra. Sed a turpis faucibus, dapibus libero vel, dictum augue. Proin porttitor posuere nisi, a adipiscing sem dictum ac. Pellentesque in vehicula metus. Ut non pulvinar est. Nam nec feugiat orci, ut iaculis sapien.\r\n\r\nFusce ligula arcu, rhoncus et justo sit amet, aliquet rutrum diam. Praesent in accumsan nulla. Ut a egestas turpis, eu tristique sapien. Nunc sed nisi ullamcorper, tempor neque ut, pulvinar diam. Suspendisse a neque sagittis, sodales tortor a, sodales libero. Vestibulum elementum, dui in malesuada consequat, ipsum ante convallis quam, at pulvinar mauris purus id metus. Nullam ut tellus nec odio tincidunt porttitor. Phasellus rutrum posuere tempor. Donec blandit ac mi sed tincidunt. Morbi ac ultricies magna. Sed rutrum dictum arcu, et iaculis dui convallis a. In bibendum orci vel odio feugiat, blandit ultricies diam pellentesque. Nam ullamcorper, nisi a iaculis dapibus, ante massa hendrerit purus, quis dapibus mi diam eu enim.', '2014-04-06 18:11:01', '', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `registered` datetime NOT NULL,
  `access` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `registered`, `access`) VALUES
(1, 'admin', 'milea.vasile959@gmail.com', '$2a$07$kfhenffjkh3nvbesbjsdfeQydyLZ1jKjnJxm1agJi7ytJl7UiGLFq', 'Vasile Milea', '2014-04-10 11:28:37', 3),
(2, 'loopByte', 'milea.vasile959@gmail.com', '$2a$07$kfhenffjkh3nvbesbjsdfeQydyLZ1jKjnJxm1agJi7ytJl7UiGLFq', 'Vasile Milea', '2014-04-13 07:41:57', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
