-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 01:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2sajt1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(255) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `readAdm` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `text`, `date`, `readAdm`) VALUES
(1, '::1	 User visited Home.	', '2020-03-26 22:01:23', 1),
(2, '::1	valerija98 sucessfully logged in.	', '2020-03-26 22:25:22', 1),
(3, '::1	valerija98 visited Home.	', '2020-03-26 22:25:23', 1),
(4, '::1	valerija98 visited Admin.	', '2020-03-26 22:25:28', 1),
(5, '::1	valerija98 visited Admin.	', '2020-03-26 22:27:43', 1),
(6, '::1	valerija98 visited Activity.	', '2020-03-26 22:27:48', 1),
(7, '::1	valerija98 visited Activity.	', '2020-03-26 22:32:51', 1),
(8, '::1	valerija98 visited Activity.	', '2020-03-26 22:35:03', 1),
(9, '::1	valerija98 visited Activity.	', '2020-03-26 22:36:45', 1),
(10, '::1	valerija98 visited Activity.	', '2020-03-26 22:37:31', 1),
(11, '::1	valerija98 visited Activity.	', '2020-03-26 22:43:45', 1),
(12, '::1	valerija98 visited Activity.	', '2020-03-26 22:44:16', 1),
(13, '::1	valerija98 visited Activity.	', '2020-03-26 22:45:56', 1),
(14, '::1	valerija98 visited Activity.	', '2020-03-26 22:47:56', 1),
(15, '::1	valerija98 visited Activity.	', '2020-03-26 22:48:18', 1),
(16, '::1	valerija98 visited Activity.	', '2020-03-26 22:48:33', 1),
(17, '::1	valerija98 visited Activity.	', '2020-03-26 22:51:18', 1),
(18, '::1	valerija98 visited Activity.	', '2020-03-26 22:51:24', 1),
(19, '::1	valerija98 visited Activity.	', '2020-03-26 22:51:26', 1),
(20, '::1	valerija98 visited Activity.	', '2020-03-26 22:52:24', 1),
(21, '::1	valerija98 visited Activity.	', '2020-03-26 22:55:30', 1),
(22, '::1	valerija98 visited Activity.	', '2020-03-26 22:56:54', 1),
(23, '::1	valerija98 visited Activity.	', '2020-03-26 23:00:14', 1),
(24, '::1	valerija98 visited Admin.	', '2020-03-26 23:09:16', 1),
(25, '::1	valerija98 visited Activity.	', '2020-03-26 23:09:22', 1),
(26, '::1	valerija98 visited Activity.	', '2020-03-26 23:11:25', 1),
(27, '::1	valerija98 visited Activity.	', '2020-03-26 23:12:17', 1),
(28, '::1	valerija98 visited Activity.	', '2020-03-26 23:12:59', 1),
(29, '::1	valerija98 visited Activity.	', '2020-03-26 23:13:51', 1),
(30, '::1	valerija98 visited Activity.	', '2020-03-26 23:14:08', 1),
(31, '::1	valerija98 visited Activity.	', '2020-03-26 23:14:44', 1),
(32, '::1	valerija98 visited Activity.	', '2020-03-26 23:15:00', 1),
(33, '::1	valerija98 visited Activity.	', '2020-03-26 23:16:10', 1),
(34, '::1	valerija98 visited Activity.	', '2020-03-26 23:16:49', 1),
(35, '::1	valerija98 visited Activity.	', '2020-03-26 23:17:31', 1),
(36, '::1	valerija98 visited Activity.	', '2020-03-26 23:18:51', 1),
(37, '::1	valerija98 visited Activity.	', '2020-03-26 23:19:27', 1),
(38, '::1	valerija98 visited Activity.	', '2020-03-26 23:19:51', 1),
(39, '::1	valerija98 visited Activity.	', '2020-03-26 23:20:44', 1),
(40, '::1	valerija98 visited Activity.	', '2020-03-26 23:21:31', 1),
(41, '::1	valerija98 visited Activity.	', '2020-03-26 23:22:52', 1),
(42, '::1	valerija98 visited Activity.	', '2020-03-26 23:23:55', 1),
(43, '::1	valerija98 visited Activity.	', '2020-03-26 23:24:22', 1),
(44, '::1	valerija98 visited Admin.	', '2020-03-26 23:24:32', 1),
(45, '::1	valerija98 visited Activity.	', '2020-03-26 23:24:35', 1),
(46, '::1	 User visited Home.	', '2020-03-27 09:30:54', 1),
(47, '::1	valerija98 sucessfully logged in.	', '2020-03-27 09:31:20', 1),
(48, '::1	valerija98 visited Home.	', '2020-03-27 09:31:21', 1),
(49, '::1	valerija98 visited Admin.	', '2020-03-27 09:31:24', 1),
(50, '::1	valerija98 visited Activity.	', '2020-03-27 09:31:30', 1),
(51, '::1	valerija98 visited Activity.	', '2020-03-27 09:32:32', 1),
(52, '::1	valerija98 visited Activity.	', '2020-03-27 09:33:13', 1),
(53, '::1	valerija98 visited Activity.	', '2020-03-27 09:33:38', 1),
(54, '::1	valerija98 visited Activity.	', '2020-03-27 09:34:48', 1),
(55, '::1	valerija98 visited Activity.	', '2020-03-27 09:35:32', 1),
(56, '::1	valerija98 visited Activity.	', '2020-03-27 09:36:09', 1),
(57, '::1	valerija98 visited Activity.	', '2020-03-27 09:36:47', 1),
(58, '::1	valerija98 visited Admin.	', '2020-03-27 10:15:33', 1),
(59, '::1	valerija98 visited Activity.	', '2020-03-27 10:20:12', 1),
(60, '::1	valerija98 visited Admin.	', '2020-03-27 10:23:28', 1),
(61, '::1	valerija98 visited Admin.	', '2020-03-27 10:24:07', 1),
(62, '::1	valerija98 visited Admin.	', '2020-03-27 10:26:34', 1),
(63, '::1	valerija98 visited Admin.	', '2020-03-27 10:27:24', 1),
(64, '::1	valerija98 visited Admin.	', '2020-03-27 10:28:00', 1),
(65, '::1	valerija98 visited Admin.	', '2020-03-27 10:28:25', 1),
(66, '::1	valerija98 visited Admin.	', '2020-03-27 10:29:33', 1),
(67, '::1	valerija98 visited Admin.	', '2020-03-27 10:30:00', 1),
(68, '::1	valerija98 visited Admin.	', '2020-03-27 10:32:21', 1),
(69, '::1	valerija98 visited Admin.	', '2020-03-27 10:33:03', 1),
(70, '::1	valerija98 visited Activity.	', '2020-03-27 11:17:09', 1),
(71, '::1	valerija98 logged out.	', '2020-03-27 11:19:07', 1),
(72, '::1	 User visited Home.	', '2020-03-27 11:19:08', 1),
(73, '::1	valerija98 sucessfully logged in.	', '2020-03-27 11:34:55', 1),
(74, '::1	valerija98 visited Home.	', '2020-03-27 11:34:57', 1),
(75, '::1	valerija98 visited Admin.	', '2020-03-27 11:35:03', 1),
(76, '::1	valerija98 logged out.	', '2020-03-27 11:46:17', 1),
(77, '::1	 User visited Home.	', '2020-03-27 11:46:20', 1),
(78, '::1	 User visited Backpacks & Wallets	', '2020-03-27 11:48:21', 1),
(79, '::1	 User visited Figures	', '2020-03-27 11:48:26', 1),
(80, '::1	 User visited Home.	', '2020-03-27 11:48:30', 1),
(81, '::1	 User visited Home.	', '2020-03-27 11:53:12', 1),
(82, '::1	 User visited Home.	', '2020-03-27 11:56:43', 1),
(83, '::1	nekiuser98 sucessfully logged in.	', '2020-03-27 11:57:29', 1),
(84, '::1	nekiuser98 visited Home.	', '2020-03-27 11:57:30', 1),
(85, '::1	nekiuser98 added product with id: 1 to wishlist.	', '2020-03-27 11:57:43', 1),
(86, '::1	nekiuser98 changed quantity for product with id: 1 in wishlist.	', '2020-03-27 11:57:59', 1),
(87, '::1	nekiuser98 deleted product with id: 1 from wishlist.', '2020-03-27 11:58:09', 1),
(88, '::1	nekiuser98 added product with id: 2 to wishlist.	', '2020-03-27 11:58:22', 1),
(89, '::1	nekiuser98 deleted product with id: 2 from wishlist.', '2020-03-27 11:58:25', 1),
(90, '::1	nekiuser98 visited Contact.	2020.03.27 12:00:05\n', '2020-03-27 12:00:05', 1),
(91, '::1	vakaakak@gmail.com sent a message.	', '2020-03-27 12:00:41', 1),
(92, '::1	nekiuser98 logged out.	', '2020-03-27 12:00:50', 1),
(93, '::1	 User visited Home.	', '2020-03-27 12:00:51', 1),
(94, '::1	valerija98 sucessfully logged in.	', '2020-03-27 12:01:01', 1),
(95, '::1	valerija98 visited Home.	', '2020-03-27 12:01:02', 1),
(96, '::1	valerija98 visited Admin.	', '2020-03-27 12:01:15', 1),
(97, '::1	valerija98 inserted product with id: 52	', '2020-03-27 12:04:32', 1),
(98, '::1	valerija98 visited Admin.	', '2020-03-27 12:04:33', 1),
(99, '::1	valerija98 updated product with id: 52	', '2020-03-27 12:05:04', 1),
(100, '::1	valerija98 visited Admin.	', '2020-03-27 12:05:05', 1),
(101, '::1	valerija98 deleted product with id: 52	', '2020-03-27 12:05:22', 1),
(102, '::1	valerija98 updated user with id: 6	', '2020-03-27 12:05:44', 1),
(103, '::1	valerija98 deleted user with id: 6	', '2020-03-27 12:06:02', 1),
(104, '::1	valerija98 modified text about author.	', '2020-03-27 12:06:18', 1),
(105, '::1	valerija98 visited Admin.	', '2020-03-27 12:06:19', 1),
(106, '::1	valerija98 modified text about author.	', '2020-03-27 12:06:27', 1),
(107, '::1	valerija98 visited Admin.	', '2020-03-27 12:06:28', 1),
(108, '::1	valerija98 inserted category with id: 5	', '2020-03-27 12:06:50', 1),
(109, '::1	valerija98 renamed category with id: 5	', '2020-03-27 12:07:31', 1),
(110, '::1	valerija98 deleted category with id: 5	', '2020-03-27 12:07:37', 1),
(111, '::1	valerija98 read message with id: 4	', '2020-03-27 12:07:53', 1),
(112, '::1	valerija98 inserted social with id: 5	', '2020-03-27 12:08:08', 1),
(113, '::1	valerija98 updated social with id: 5	', '2020-03-27 12:08:26', 1),
(114, '::1	valerija98 deleted social with id: 5	', '2020-03-27 12:08:31', 1),
(115, '::1	valerija98 visited Admin.	', '2020-03-27 12:16:21', 1),
(116, '::1	valerija98 visited Activity.	', '2020-03-27 12:17:10', 0),
(117, '::1	valerija98 visited Admin.	', '2020-03-27 12:19:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(255) NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `href`, `text`) VALUES
(1, 'prodAdm', 'Products'),
(2, 'users', 'Users'),
(3, 'authCatAdmin', 'Author'),
(4, 'authCatAdmin', 'Categories'),
(5, 'messMenuSocHolder', 'Messages'),
(6, '/activity', 'Activity');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(10) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `text`) VALUES
(1, '<p>Hello,<br />My name is Valerija Koncar I was born in Belgrade on 20th October 1998, I grew up in Zemun. I finished Rade Koncar Elementary School,after which I went to First School of Economics in Belgrade.Currently I am a student at ICT College of Vocational Studies.<br />This website is for school project and has no other purposes.<br /><br /> Section: Internet Technologies<br /><br /> Index number: 56/17</p>');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Backpacks & Wallets'),
(1, 'Figures'),
(4, 'Mugs'),
(3, 'Scarves');

-- --------------------------------------------------------

--
-- Table structure for table `general_info`
--

CREATE TABLE `general_info` (
  `id` int(5) NOT NULL,
  `headline` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_info`
--

INSERT INTO `general_info` (`id`, `headline`, `info`, `fa`) VALUES
(1, 'Contact', '<p>Tel: 83833-333</p>\r\n<p>393-333-268</p>\r\n<p>65899-4544</p>', 'fa-phone'),
(2, 'Headquarters Address', '<p>  13 Hanway Square, London </p>', 'fa-address-book');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) DEFAULT NULL,
  `path` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `alt`, `type`, `size`, `path`) VALUES
(1, 'ariel.jpg', 'ariel', 'jpg', NULL, 'images/edited/'),
(2, 'joker.jpg', 'joker', 'jpg', NULL, 'images/edited/'),
(3, 'jon.jpg', 'jon', 'jpg', NULL, 'images/edited/'),
(4, 'iron_man.jpg', 'iron_man', 'jpg', NULL, 'images/edited/'),
(5, 'sailor_moon.jpg', 'sailor_moon', 'jpg', NULL, 'images/edited/'),
(6, 'slime.jpg', 'slime', 'jpg', NULL, 'images/edited/'),
(7, 'hermiona.jpg', 'hermiona', 'jpg', NULL, 'images/edited/'),
(8, 'phoenix.jpg', 'phoenix', 'jpg', NULL, 'images/edited/'),
(9, 'unicorn.jpg', 'unicorn', 'jpg', NULL, 'images/edited/'),
(10, 'it.jpg', 'it', 'jpg', NULL, 'images/edited/'),
(11, 'witcher.jpg', 'witcher', 'jpg', NULL, 'images/edited/'),
(12, 'cinderella.jpg', 'cinderella', 'jpg', NULL, 'images/edited/'),
(13, 'luffy.jpg', 'luffy', 'jpg', NULL, 'images/edited/'),
(14, 'harry.jpg', 'harry', 'jpg', NULL, 'images/edited/'),
(15, 'walkers.jpg', 'walkers', 'jpg', NULL, 'images/edited/'),
(16, 'b1.jpg', 'backpack', 'jpg', NULL, 'images/edited/'),
(17, 'b2.jpg', 'backpack', 'jpg', NULL, 'images/edited/'),
(18, 'b3.jpg', 'backpack', 'jpg', NULL, 'images/edited/'),
(19, 'b4.jpg', 'backpack', 'jpg', NULL, 'images/edited/'),
(20, 'w7.jpg', 'wallet', 'jpg', NULL, 'images/edited/'),
(21, 'b5.jpg', 'backpack', 'jpg', NULL, 'images/edited/'),
(22, 'b6.jpg', 'backpack', 'jpg', NULL, 'images/edited/'),
(23, 'w6.jpg', 'wallet', 'jpg', NULL, 'images/edited/'),
(24, 'b7.jpg', 'backpack', 'jpg', NULL, 'images/edited/'),
(25, 'w1.jpg', 'wallet', 'jpg', NULL, 'images/edited/'),
(26, 'w2.jpg', 'wallet', 'jpg', NULL, 'images/edited/'),
(27, 'w3.jpg', 'wallet', 'jpg', NULL, 'images/edited/'),
(28, 'w4.jpg', 'wallet', 'jpg', NULL, 'images/edited/'),
(29, 'w5.jpg', 'wallet', 'jpg', NULL, 'images/edited/'),
(30, 'm5.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(31, 'm1.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(32, 'm2.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(33, 'm3.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(34, 'm6.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(35, 'm4.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(36, 'm7.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(37, 'm8.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(38, 'm9.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(39, 'm10.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(40, 'm11.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(41, 'm12.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(42, 'm13.jpg', 'mug', 'jpg', NULL, 'images/edited/'),
(43, 's1.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(44, 's2.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(45, 's3.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(46, 's4.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(47, 's5.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(48, 's6.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(49, 's7.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(50, 's8.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(51, 's9.jpg', 'scarves', 'jpg', NULL, 'images/edited/'),
(52, 'small_1585310671_skrinsot1.jpg', 'product', 'image/jpeg', 568310, 'images/edited/');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `href` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `href`, `text`) VALUES
(1, '/home', 'Home'),
(6, '/contact', 'Contact'),
(7, '/author', 'Author');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `readMessage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `email`, `readMessage`) VALUES
(1, 'Hhhgv', 'valerijakoncar98@gmail.com', 1),
(2, 'Dbgjmhhtf', 'valerijakoncar98@gmail.com', 0),
(3, 'sdxjdhhsdhffhb', 'gdgdhdhsds98@gmail.com', 0),
(4, 'sssssdfvff', 'gdgdhdhsds98@gmail.com', 1),
(5, 'Hshdbbdbedbdn\nddkjdjdjdjdjhdhd', 'valerijakoncar98@gmail.com', 1),
(6, 'Hshshshshsshs', 'vakaakak@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(30) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `oldPrice` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `price`, `oldPrice`) VALUES
(1, '17.00', '24.00'),
(2, '17.00', '0.00'),
(3, '19.99', '27.00'),
(4, '43.00', '23.00'),
(5, '33.00', '0.00'),
(6, '21.00', '0.00'),
(7, '31.00', '0.00'),
(8, '25.00', '35.99'),
(9, '36.00', '40.00'),
(10, '38.99', '43.00'),
(11, '14.00', '23.00'),
(12, '28.00', '0.00'),
(13, '23.99', '30.00'),
(14, '36.00', '47.00'),
(15, '20.00', '0.00'),
(16, '22.00', '45.00'),
(17, '38.99', '0.00'),
(18, '33.00', '44.99'),
(19, '22.00', '0.00'),
(20, '17.00', '22.00'),
(21, '33.00', '39.00'),
(22, '15.99', '25.00'),
(23, '19.00', '0.00'),
(24, '16.00', '22.00'),
(25, '40.00', '55.00'),
(26, '33.00', '55.00'),
(27, '32.00', '0.00'),
(28, '21.99', '41.00'),
(29, '22.00', '32.00'),
(30, '44.00', '0.00'),
(31, '32.00', '0.00'),
(32, '29.00', '39.00'),
(33, '35.00', '45.00'),
(34, '18.00', '28.00'),
(35, '19.99', '29.00'),
(36, '26.00', '0.00'),
(37, '19.00', '28.99'),
(38, '22.00', '32.99'),
(39, '33.00', '43.00'),
(40, '26.00', '0.00'),
(41, '29.00', '0.00'),
(42, '22.00', '31.00'),
(43, '18.99', '28.00'),
(44, '19.00', '0.00'),
(45, '22.00', '0.00'),
(46, '33.00', '0.00'),
(47, '43.00', '29.00'),
(48, '32.00', '42.00'),
(49, '22.99', '32.99'),
(50, '33.00', '43.00'),
(51, '19.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(5) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `img_id` int(50) NOT NULL,
  `price_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cat_id`, `hot`, `img_id`, `price_id`) VALUES
(1, 'BANPRESTO DISNEY THE LITTLE MERMAID Q POSKET ARIEL (NORMAL COLOR VER.) FIGURE', 1, 1, 1, 1),
(2, 'DC COMICS JOKER DESIGNER CALAVERA TOY BY UNRULY INDUSTRIES', 1, 1, 2, 2),
(3, 'GAME OF THRONES JON SNOW BATTLE OF THE BASTARDS FIGURE', 1, 0, 3, 3),
(4, 'MARVEL AVENGERS: INFINITY WAR IRON MAN NENDOROID FIGURE', 1, 0, 4, 4),
(5, 'BANPRESTO SAILOR MOON Q POSKET SAILOR MOON FIGURE', 1, 1, 5, 5),
(6, 'THAT TIME I GOT REINCARNATED AS A SLIME RIMURU TEMPEST NENDOROID FIGURE', 1, 1, 6, 6),
(7, 'BANPRESTO HARRY POTTER Q POSKET HERMIONE GRANGER VINYL FIGURE', 1, 1, 7, 7),
(8, 'DRAGONS AND BEASTIES EMBER PHOENIX VINYL FIGURE', 1, 0, 8, 8),
(9, 'RAINBOWS IN PIECES UNDEAD NED UNICORN VINYL FIGURE', 1, 0, 9, 9),
(10, 'LIVING DEAD DOLLS IT PENNYWISE DOLL', 1, 1, 10, 10),
(11, 'THE WITCHER GERALT OF RIVIA GRANDMASTER URSINE ARMOR COLLECTIBLE FIGURE', 1, 1, 11, 11),
(12, 'BANPRESTO DISNEY CINDERELLA Q POSKET SUGIRLY CINDERELLA (NORMAL COLOR VER.) FIGURE', 1, 0, 12, 12),
(13, 'BANPRESTO ONE PIECE DXF THE GRANDLINE MEN WANO COUNTRY VOL.1 MONKEY D. LUFFY COLLECTIBLE FIGURE', 1, 1, 13, 13),
(14, 'BANPRESTO HARRY POTTER Q POSKET HARRY POTTER & HEDWIG II VINYL FIGURE', 1, 1, 14, 14),
(15, 'GAME OF THRONES NIGHT KING & WHITE WALKER TITANS VINYL FIGURE TWIN PACK 2017 FALL CONVENTION EXCLUSIVE', 1, 0, 15, 15),
(16, 'PUSHEEN SUPER PUSHEENICORN MINI BACKPACK', 2, 1, 16, 16),
(17, 'LOUNGEFLY STRANGER THINGS STARCOURT MALL CHIBI MINI BACKPACK', 2, 0, 17, 17),
(18, 'LOUNGEFLY DISNEY ALICE IN WONDERLAND WHITE RABBIT MINI BACKPACK', 2, 0, 18, 18),
(19, 'LOUNGEFLY DISNEY VILLAINS EVIL QUEEN VELVET MINI BACKPACK', 2, 1, 19, 19),
(20, 'BOB\'S BURGERS HAMBURGER FIXINGS BI-FOLD WALLET', 2, 1, 20, 20),
(21, 'BUFFY THE VAMPIRE SLAYER SUNNYDALE HIGH MINI BACKPACK', 2, 0, 21, 21),
(22, 'LOUNGEFLY HARRY POTTER HEDWIG QUILTED MINI BACKPACK', 2, 1, 22, 22),
(23, 'BT21 MANG BOUCLE PURSE', 2, 0, 23, 23),
(24, 'LOUNGEFLY DISNEY SNOW WHITE & THE SEVEN DWARFS DRESS MINI BACKPACK', 2, 0, 24, 24),
(25, 'LOUNGEFLY HARRY POTTER AZKABAN SIRIUS BLACK WALLET', 2, 1, 25, 25),
(26, 'LOUNGEFLY MARVEL GUARDIANS OF THE GALAXY CHIBI BI-FOLD SNAP WALLET', 2, 1, 26, 26),
(27, 'LOUNGEFLY DISNEY PIXAR UP MY ADVENTURE BOOK BI-FOLD WALLET', 2, 0, 27, 27),
(28, 'DC COMICS BIRDS OF PREY HARLEY QUINN TECH WALLET', 2, 0, 28, 28),
(29, 'BT21 KOYA BOUCLE PURSE', 2, 0, 29, 29),
(30, 'DISNEY FROZEN 2 OLAF MUG WITH LID', 4, 1, 30, 30),
(31, 'RICK AND MORTY PORTALS MUG & COASTER SET', 4, 0, 31, 31),
(32, 'DISNEY MULAN MAGNOLIA MUG', 4, 1, 32, 32),
(33, 'DISNEY LADY AND THE TRAMP HEART MUG SET', 4, 0, 33, 33),
(34, 'HARRY POTTER CAULDRON SOUP MUG', 4, 1, 34, 34),
(35, 'SUPER MARIO RETRO TITLE MUG', 4, 0, 35, 35),
(36, 'DISNEY PRINCESS FLORAL MUG', 4, 1, 36, 36),
(37, 'DISNEY PIXAR ONWARD IAN & BARLEY MUG', 4, 0, 37, 37),
(38, 'HARRY POTTER MARAUDER\'S MAP', 4, 1, 38, 38),
(39, 'HELLO KITTY STRAWBERRY GLITTER MUG', 4, 1, 39, 39),
(40, 'STAR WARS NEVER FLY SOLO MUG', 4, 0, 40, 40),
(41, 'DISNEY THE LION KING TRIO MUG', 4, 1, 41, 41),
(42, 'DISNEY WINNIE THE POOH HUNNY POT FIGURAL MUG', 4, 1, 42, 42),
(43, 'HARRY POTTER GRYFFINDOR HOUSE SCARF', 3, 1, 43, 43),
(44, 'HARRY POTTER HEDWIG SCARF', 3, 1, 44, 44),
(45, 'IT LOSERS CLUB SCARF', 3, 1, 45, 45),
(46, 'THE NIGHTMARE BEFORE CHRISTMAS JACK & ZERO HOLIDAY SCARF', 3, 0, 46, 46),
(47, 'DISNEY MALEFICENT KNIT SCARF', 3, 0, 47, 47),
(48, 'DISNEY FROZEN 2 SNOWFLAKES SCARF', 3, 1, 48, 48),
(49, 'BEETLEJUICE STRIPED SCARF', 3, 0, 49, 49),
(50, 'DISNEY ALADDIN MAGIC CARPET BLANKET SCARF', 3, 0, 50, 50),
(51, 'HARRY POTTER HOGWARTS SCARF', 3, 1, 51, 51);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(255) NOT NULL,
  `fa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `fa`, `href`) VALUES
(1, 'fa-facebook-square', 'dd'),
(2, 'fa-instagram', 'https://www.instagram.com/?hl=en'),
(3, 'fa-twitter-square', 'https://twitter.com/?lang=en'),
(4, 'fa-youtube-square', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `send_via_mail` tinyint(1) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `phone`, `email`, `gender`, `send_via_mail`, `role_id`) VALUES
(1, 'valerija98', '468adcd69436c61375b212bc1795183c', '062-333-3333', 'valerijakoncar98@gmail.com', 'f', 1, 1),
(7, 'nekiuser98', '88c0f392517ad8ea55bb7643a67dcbeb', '062-333-3333', 'vakaakak@gmail.com', 'f', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(15) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(2) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `quantity`, `user_id`) VALUES
(1, 43, 1, 1),
(2, 31, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `general_info`
--
ALTER TABLE `general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `img_id` (`img_id`),
  ADD KEY `price_id` (`price_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general_info`
--
ALTER TABLE `general_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`price_id`) REFERENCES `price` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
