-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 07:35 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `user_name`, `password`) VALUES
(1, 'jgodstime', '$2y$10$4fJnBlUlGqa7cTbIN47Jte4.z2DVAVS4aGpyWXBDfjBdPpiS52NkC'),
(2, 'maryblaze', '$2y$10$fl65B42rnauMAmviXpdLFe3jDfE0sUyC3PbgZNTn5baWh4Y21Oq3m');

-- --------------------------------------------------------

--
-- Table structure for table `food_category_tbl`
--

CREATE TABLE IF NOT EXISTS `food_category_tbl` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_category_tbl`
--

INSERT INTO `food_category_tbl` (`id`, `categoryname`) VALUES
(1, 'food'),
(2, 'Drinks'),
(4, 'Snackes');

-- --------------------------------------------------------

--
-- Table structure for table `food_list_tbl`
--

CREATE TABLE IF NOT EXISTS `food_list_tbl` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `foodname` text NOT NULL,
  `amount` varchar(70) NOT NULL,
  `note` text NOT NULL,
  `foodimage` text NOT NULL,
  `foodstatus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_list_tbl`
--

INSERT INTO `food_list_tbl` (`id`, `categoryid`, `foodname`, `amount`, `note`, `foodimage`, `foodstatus`) VALUES
(1, 1, 'Fried Rice and chicken', '1350', 'Delicious food', '526165918149738472385559177998993.jpeg', 1),
(2, 1, 'Jollof Rice and Chicken', '1300', 'Delicious food', '652119778645411393865692262944153.jpeg', 1),
(3, 1, 'White Rice', '350', 'Delicious White rice', '904165603748656013141326973055237.jpeg', 1),
(4, 1, 'Afang Soup', '950', 'Delicious affang soup', '709161068843912971957550065488037.jpeg', 1),
(5, 1, 'Vegetable Soup', '800', 'Delicious soup ', '111190136843722851096496550413055.jpeg', 1),
(6, 1, 'Beans', '700', 'Delicious beans', '568180383441785602382263276109711.jpeg', 1),
(7, 1, 'Pourage Yam', '850', 'Delicious yam', '542144799940800491782775977136933.jpeg', 1),
(8, 1, 'Pourage Plantain', '800', 'This Pourage Plantain is one of its kind prepared with one of the best ingredient ', '347111999647652293666198860423431.jpeg', 1),
(10, 2, 'Five Alive', '500', 'good for the body', '824149014442207041960296645062438.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE IF NOT EXISTS `order_tbl` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `foodcatid` int(11) NOT NULL,
  `ordercode` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `orderdate` datetime NOT NULL,
  `orderstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_fee_tbl`
--

CREATE TABLE IF NOT EXISTS `service_fee_tbl` (
  `id` int(11) NOT NULL,
  `servicefee` int(11) NOT NULL,
  `servicefeenote` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_fee_tbl`
--

INSERT INTO `service_fee_tbl` (`id`, `servicefee`, `servicefeenote`) VALUES
(1, 500, 'bla bla');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `id` int(11) NOT NULL,
  `useridhash` text NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_category_tbl`
--
ALTER TABLE `food_category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_list_tbl`
--
ALTER TABLE `food_list_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_fee_tbl`
--
ALTER TABLE `service_fee_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `food_category_tbl`
--
ALTER TABLE `food_category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `food_list_tbl`
--
ALTER TABLE `food_list_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_fee_tbl`
--
ALTER TABLE `service_fee_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
