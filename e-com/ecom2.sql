-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2023 at 02:19 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(10000) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `u_id`, `status`) VALUES
(1, '21.2-22.3-19.2-18.4', 3, 1),
(2, '21.2-22.3-19.2-18.4', 5, 0),
(3, '21.2-22.3-19.2-18.4', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(20) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(20) NOT NULL,
  `description` text,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `description`, `image`) VALUES
(19, 'smartphones', '5g and 4g phones', 'smartphones.webp'),
(20, 'fashion', 'dresses shoes watches etc', 'fasion.webp');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `products` varchar(2000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '-1',
  `p_id` varchar(2000) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `user_id`, `amount`, `products`, `status`, `p_id`, `time`) VALUES
(15, 1, 3, 402991, 'APPLE iPhone 13 mini (Green, 512 GB)*2|Levis*3|s22 ultra*2|Ghost*4', -1, '21.2-22.3-19.2-18.4', '0000-00-00 00:00:00'),
(16, 3, 6, 402991, 'APPLE iPhone 13 mini (Green, 512 GB)*2|Levis*3|s22 ultra*2|Ghost*4', -1, '21.2-22.3-19.2-18.4', '2023-08-01 09:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(40) NOT NULL DEFAULT 'none',
  `s_id` int(10) DEFAULT NULL,
  `c_id` int(10) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `s_id`, `c_id`, `quantity`, `price`, `image`, `description`) VALUES
(1, 'One plus 10T', 12, 19, 5, 49999, 'smartphones.webp', 'OnePlus 10T | Moonstone Black | 5G Unlocked Android Smartphone U.S Version | 16GB RAM+256GB Storage | 120Hz Fluid AMOLED Display | Triple Camera 50+8+2MP, 16MP | 125W SuperVOOC Charging (CPH2417)'),
(14, 'Lee Men', 14, 20, 5, 1999, 'JEANS2.jpeg', 'Men Slim Mid Rise Blue Jeans Best deal'),
(18, 'Ghost', 14, 20, 10, 1999, 'jeans.jpeg', 'Women Regular High Rise Black Jeans'),
(19, 's22 ultra', 12, 19, 5, 125000, 's22 ultra.jpg', 'SAMSUNG Galaxy S22 Ultra Cell Phone, Factory Unlocked Android Smartphone, 256GB, 8K Camera, Brightest Display Screen, S Pen, Long Battery Life, Fast 4nm Processor, US Version, 2022, Phantom Black'),
(20, 'i phone 14 pro max', 13, 19, 14, 135999, '14promax.jpeg', '128 GB ROM\r\n15.49 cm (6.1 inch) Super Retina XDR Display\r\n48MP + 12MP + 12MP | 12MP Front Camera\r\nA16 Bionic Chip, 6 Core Processor Processor\r\n1 Year Warranty for Phone and 6 Months Warranty for In-Box Accessories'),
(21, 'APPLE iPhone 13 mini (Green, 512 GB)', 13, 19, 20, 67999, '13 mini.jpeg', '512 GB ROM\r\n13.72 cm (5.4 inch) Super Retina XDR Display\r\n12MP + 12MP | 12MP Front Camera\r\nA15 Bionic Chip Processor\r\n1 Year Warranty for Phone and 6 Months Warranty for In-Box Accessories'),
(22, 'Levis', 14, 20, 14, 2999, 'levis.jpg', '512 Men Tapered Fit Low Rise Grey Jeans'),
(23, 'KETCH', 14, 20, 14, 999, 'ketch.jpeg', 'Men Tapered Fit Mid Rise Grey Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(40) NOT NULL,
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`s_id`, `s_name`, `p_id`) VALUES
(12, 'android', 19),
(13, 'iphone', 19),
(14, 'jeans', 20),
(15, 'shirts', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cart_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `email`, `pass`, `status`, `cart_id`) VALUES
(3, 'AJAIDEV S', 'ajai519451@gmail.com', '12345678', 1, NULL),
(4, 'ALEN', 'alen@gmail.com', '12345678', 0, NULL),
(5, 'ajai', 'ajai@g', '1234', 1, NULL),
(6, 'sree', 'sree@gamil.com', 'sree', 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
