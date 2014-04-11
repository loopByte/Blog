-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Apr 2014 la 17:11
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
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
(1, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras massa nisi, pellentesque et lorem id, sollicitudin sodales nulla. Sed egestas quam ac nibh congue, sed pellentesque turpis commodo. Duis ac turpis eget sapien condimentum semper quis nec odio. Cras id dui nec mauris tristique laoreet. Aliquam ultricies tortor velit, et placerat velit lacinia ultricies. Maecenas nec vestibulum tortor, vel laoreet erat. Donec ac dapibus augue. Proin non facilisis enim, sed molestie orci. Praesent vehicula vehicula porttitor. Morbi non lorem nec dolor molestie eleifend. Nulla fringilla suscipit augue nec adipiscing.', '2014-04-05 20:25:46', '', 0),
(2, 'Article title goes here', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non pellentesque lacus. Suspendisse eu odio arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec euismod erat nec mauris hendrerit, non interdum mauris pretium. Ut auctor adipiscing mauris et pharetra. Sed a turpis faucibus, dapibus libero vel, dictum augue. Proin porttitor posuere nisi, a adipiscing sem dictum ac. Pellentesque in vehicula metus. Ut non pulvinar est. Nam nec feugiat orci, ut iaculis sapien.\r\n\r\nFusce ligula arcu, rhoncus et justo sit amet, aliquet rutrum diam. Praesent in accumsan nulla. Ut a egestas turpis, eu tristique sapien. Nunc sed nisi ullamcorper, tempor neque ut, pulvinar diam. Suspendisse a neque sagittis, sodales tortor a, sodales libero. Vestibulum elementum, dui in malesuada consequat, ipsum ante convallis quam, at pulvinar mauris purus id metus. Nullam ut tellus nec odio tincidunt porttitor. Phasellus rutrum posuere tempor. Donec blandit ac mi sed tincidunt. Morbi ac ultricies magna. Sed rutrum dictum arcu, et iaculis dui convallis a. In bibendum orci vel odio feugiat, blandit ultricies diam pellentesque. Nam ullamcorper, nisi a iaculis dapibus, ante massa hendrerit purus, quis dapibus mi diam eu enim.', '2014-04-06 18:11:01', '', 1),
(3, 'Lorem ipsum dolor ipsum', '<p><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse auctor arcu eget pretium porttitor. Suspendisse lacus nibh, blandit bibendum cursus et, pellentesque nec metus. Maecenas et enim auctor, dignissim diam eget, tristique lorem. Donec tincidunt mi vitae interdum eleifend. Proin tristique nibh eu enim rutrum, non semper dolor viverra. Duis aliquam adipiscing mattis. Vivamus sed eleifend nisl, ut eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed suscipit in nibh vel mattis. Nulla euismod diam at iaculis varius. Praesent ac libero nec ligula bibendum facilisis vel vitae quam. Proin vel convallis nibh. Donec a feugiat mi, vel lobortis orci. Duis ac erat ipsum.</span></p>\r\n<p><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Maecenas commodo, dui sed volutpat ultricies, quam risus scelerisque eros, eu fermentum eros metus et mauris. Suspendisse posuere semper sagittis. Proin porttitor libero in malesuada sodales. Nullam rutrum, lacus eleifend mollis commodo, neque arcu mattis magna, ut aliquet tortor tortor ac magna. Nullam luctus libero vitae purus tincidunt, non cursus velit iaculis. Nunc rutrum massa et rutrum elementum. Praesent nec tortor vel magna porta suscipit. Mauris congue, metus vel sagittis aliquet, velit nisi ullamcorper orci, vel sodales turpis mi quis felis. Ut commodo, arcu eu pretium feugiat, dolor tortor bibendum libero, nec feugiat tortor lorem quis enim. Mauris interdum ac eros eu consectetur. Phasellus eget interdum orci, ut ultricies tellus. In vitae enim diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis ac volutpat turpis. Nunc egestas gravida lorem ut sodales.</span></p>\r\n<p style="text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">In ac quam lorem. Nullam sed commodo nulla. Donec et elit sed nibh blandit scelerisque. Fusce placerat lectus augue, eget posuere turpis vestibulum quis. Sed blandit lacus et lacus pulvinar placerat. Aliquam lacus sem, consequat id pulvinar quis, interdum ac elit. Donec placerat nisl quis pellentesque venenatis. Suspendisse rhoncus bibendum lectus.</p>\r\n<p style="text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Sed varius magna in lectus adipiscing elementum. Vivamus mollis quam et mattis molestie. Vivamus nulla tortor, convallis in risus et, blandit molestie orci. Fusce eu malesuada magna, eget rhoncus tortor. Quisque gravida ante sem, semper molestie erat feugiat non. Aenean quis rutrum quam, ac condimentum nibh. Aenean quis augue sit amet est dictum iaculis. Ut lectus arcu, aliquam vitae dui eget, ultricies pharetra mi. Etiam vulputate nisi eros, vel ultrices neque sagittis eu. Donec auctor, ante et pharetra vehicula, ligula nisi tempus ipsum, et eleifend velit quam vel ligula. Suspendisse rutrum purus vitae mauris ullamcorper, vitae porttitor elit fermentum. Ut luctus elit ac magna laoreet vulputate. Mauris fermentum placerat egestas. Maecenas non dignissim metus, non blandit quam.</p>', '2014-04-10 16:38:35', 'lorem, ipsum, dolor, article, text', 1);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `registered`, `access`) VALUES
(1, 'admin', 'milea.vasile959@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Vasile Milea', '2014-04-10 11:28:37', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
