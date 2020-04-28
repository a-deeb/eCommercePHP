-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: localhost

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- database: `testdb`
--

-- --------------------------------------------------------

--
--  `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `admin_pwd` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=2 ;

--
--  `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2', '12345');

-- --------------------------------------------------------


--
-- table structure `usermember`
--






CREATE TABLE IF NOT EXISTS `usermember` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `regtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- dump information into table `usermember`
--

INSERT INTO `usermember` (`id`, `username`, `pwd`,  `email`, `tel`, `address`, `name`, `regtime`) VALUES
(1, '1', '28c8edde3d61a0411511d3b1866f0636',  'dkf@152.com', '15236222222', ' address details', 'name', '2017-04-14 20:43:38'),
(2, '3', '38026ed22fc1a91d92b5d2ef93540f20',  'dkf@152.com', '15236222222', ' address details', 'name', '2017-04-14 20:43:38'),
(3, '2', '665f644e43731ff9db3d341da5c827e1',  'dkf@152.com', '15236222222', ' address details', 'name', '2017-04-29 13:43:23'),
(4, '4', '011ecee7d295c066ae68d4396215c3d0',  'dkf@152.com', '15236222222', ' address details', 'name', '2017-12-28 09:10:46'),
(5, '5', '4e44f1ac85cd60e3caa56bfd4afb675e',  'dkf@152.com', '15236222222', ' address details', 'name', '2017-12-28 09:14:35');


-- --------------------------------------------------------

--
-- Structure of the table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `ordernumber` varchar(125) DEFAULT NULL,
  `spc` varchar(125) DEFAULT NULL,
  `slc` varchar(125) DEFAULT NULL,
  `seller` varchar(25) DEFAULT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `address` varchar(125) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `zfff` varchar(25) DEFAULT NULL,
  `leaveword` mediumtext,
  `xiadanren` varchar(25) DEFAULT NULL,
  `zt` varchar(50) DEFAULT NULL,
  `th` int(2) NOT NULL DEFAULT '0',
  `total` varchar(25) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expressdelivery` varchar(50) DEFAULT NULL,
  `Numbering` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump the data in the table `orders`
--

INSERT INTO `orders` (`id`, `ordernumber`, `spc`, `slc`, `seller`, `sex`, `address`, `tel`, `email`, `zfff`, `leaveword`, `xiadanren`, `zt`, `th`, `total`, 
`time`, `expressdelivery`, `Numbering`) 
VALUES
(1, '201704292146073', '10@', '1@', 'Deeb', 'Male', 'Ship-to Address ', '15236222222', 'dkf@152.com', 'bank', '厅夺', '2', 'received', -1, '98', '2017-04-29 13:46:07', 'logistics', '123352'),
(2, '201712171745051', '10@', '1@', 'Jiajie', 'Female', 'Ship-to Address ', '15236222222', 'dkf@152.com', 'bank', '', '1', 'No processing', 0, '98', '2017-12-17 09:45:05', NULL, NULL),
(3, '201712281710584', '10@', '1@', 'Peter', 'Male', 'Ship-to Address ', '15236222222', 'dkf@152.com', 'Paypal', '4444', '4', 'Shipped', 0, '98', '2017-12-28 09:10:58', 'logistics', '123352'),
(4, '201712281714475', '10@', '1@', 'JJ', 'Female', 'Ship-to Address ', '15236222222', 'dkf@152.com', 'bank', '555', '5', 'received', 0, '98', '2017-12-28 09:14:47', 'logistics', '123352');

-- --------------------------------------------------------

--
-- Structure of the table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dump the data in the table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(27, 'Apple'),
(19, 'Samsung'),
(23, 'Google'),
(31, 'Android');


-- --------------------------------------------------------


--
-- Structure of the table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` int(4) DEFAULT NULL,
  `spid` int(4) DEFAULT NULL,
  `content` text,
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dump the data in the table `pinglun`
--

INSERT INTO `comments` (`id`, `userid`, `spid`, `content`, `addtime`) VALUES
(24, 53, 221, 'Love this Item , I recommend it', '2017-04-14 20:43:38'),
(30, 59, 212, 'Its ok , I guess', '2017-04-14 20:43:38'),
(25, 53, 203, 'Lame , hate it !', '2017-04-14 20:43:38'),
(26, 53, 203, 'Whatever Dude', '2017-04-14 20:43:38'),
(29, 57, 221, 'Do you sell this in blue', '2017-04-14 20:43:38'),
(31, 3, 10, 'Great quality item ', '2017-04-29 14:01:18'),
(32, 5, 10, 'damn ! why is this sold out ?', '2017-12-28 09:16:52');

-- --------------------------------------------------------

--
-- Structure of the table `Products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `summary` mediumtext,
  `model` varchar(25) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL,
  `frequency` int(4) DEFAULT NULL,
  `recommend` int(4) DEFAULT NULL,
  `typeid` int(4) DEFAULT NULL,
  `memberprice` decimal(11,0) DEFAULT NULL,
  `Marketprice` decimal(11,0) DEFAULT NULL,
  `link` int(11) NOT NULL DEFAULT '0',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dump the data in the table `products`
--

INSERT INTO `products` (`id`, `name`, `summary`, `model`, `image`, `Quantity`, `frequency`, `recommend`, `typeid`, `memberprice`, `Marketprice`, `link`, `addtime`) VALUES
(10, 'Pixel 1 case #222', 'new release item (hot)', '44', '1.jpg', 1798, 24, 1, 23, '98', '100', 24, '2017-04-14 20:43:38'),
(8, 'Iphone Case #323', 'Iphone 6 Case , Seneca Products', '301X', '2.jpg', 7999, 1, 1, 27, '1699', '1800', 20, '2017-04-14 20:43:38'),
(9, 'Iphone 7 Case #334', '<p>Iphone 7s Gen</p>', '111-88', '791035.jpg', 887, 1, 0, 27, '366', '399', 15, '2017-04-14 20:43:38'),
(1, 'Sumsung S8 case #111', '<p>test</p>', '123', '2.jpg', 23, 0, 1, 19, '222', '333', 13, '2017-04-14 20:43:38'),
(3, 'Pixel 2 case #112', '<p>Pixel 2 Hot!! &nbsp; photo cache 一abc&nbsp;</p>\r\n', '1233', '4.jpg', 33, 0, 1, 23, '323', '433', 0, '2017-04-14 20:43:38'),
(2, 'Pixel 2 XL #776', '<p>Googles all new pixel 2 XL case </p>\r\n', '3333', '3.jpg', 445, 0, 0, 23, '233', '300', 1, '2017-04-14 20:43:38'),
(4, 'samsung s7 case #456', '<Product </p>\n', '123', '1.jpg', 300, 0, 1, 19, '189', '220', 54, '2017-04-14 20:43:38'),
(5, 'summary`galaxy edge s10 #652', '<p>Product </p>\n', '12526', '791035.jpg', 33, 0, 1, 19, '22', '33', 12, '2017-04-14 20:43:38'),
(6, 'Google Pixel C #231', '<p>Available. Released 2018, December</p>\r\n', '3333', '1.jpg', 34, 0, 0, 23, '330', '333', 3, '2017-04-14 20:43:38'),
(7, 'Google Pixel 2 XL #786', '<p>Great Product , new arrival </p>\r\n', '1233', '2.jpg', 33, 0, 0, 23, '22', '33', 2, '2017-04-14 20:43:38'),
(11, 'Google Pixel 3 #654', '<p><img src="/ueditor/php/upload/image/20170429/1493473725546804.jpg" title="1493473725546804.jpg" alt="timg1.jpg"/>Basically</p>', '1233', '1702498.jpg', 100, 0, 1, 23, '211', '222', 5, '2017-04-28 16:00:00');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
