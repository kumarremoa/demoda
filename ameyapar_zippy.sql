-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2015 at 09:13 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ameyapar_zippy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `is_active`) VALUES
(4, 'admin', 'admin12@gmail.com', 'admin', '1'),
(5, 'abhishek', 'abhishek@gmail.com', '123123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_brand`
--

DROP TABLE IF EXISTS `attributes_brand`;
CREATE TABLE IF NOT EXISTS `attributes_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `attributes_brand`
--

INSERT INTO `attributes_brand` (`id`, `name`) VALUES
(1, 'calvin klein'),
(2, 'Zippy'),
(3, 'Park Avenue'),
(4, 'French Collection'),
(5, 'Carlo'),
(6, 'Canvas Classic Company');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_color`
--

DROP TABLE IF EXISTS `attributes_color`;
CREATE TABLE IF NOT EXISTS `attributes_color` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `color_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `attributes_color`
--

INSERT INTO `attributes_color` (`id`, `color_code`) VALUES
(4, '1616f5'),
(7, '33a324'),
(8, 'f7cd23'),
(9, 'ff1294'),
(10, 'ebeff2'),
(11, '000305'),
(12, 'f0f4f7'),
(13, 'ebe9f5'),
(14, 'f5586a'),
(15, 'a32d43'),
(16, 'b9915d'),
(17, '5f403e'),
(18, 'c9c2a8'),
(19, 'f3e1e3'),
(20, 'efedee'),
(21, 'ededf5'),
(22, '80b3ea'),
(23, 'd15347'),
(24, '402421'),
(25, '362478'),
(26, '0f3c75'),
(27, 'e152ae'),
(28, 'd75a44'),
(29, '902537'),
(30, 'ce4e41');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_size`
--

DROP TABLE IF EXISTS `attributes_size`;
CREATE TABLE IF NOT EXISTS `attributes_size` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `attributes_size`
--

INSERT INTO `attributes_size` (`id`, `name`) VALUES
(7, 'S'),
(5, 'M'),
(6, 'L'),
(8, 'XL'),
(9, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  `product_id` int(15) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `ip`, `product_id`, `color`, `size`, `quantity`, `created`) VALUES
(2, '118.102.206.27', 23, '80b3ea', 'M', 1, '2014-08-07 10:06:39'),
(3, '118.102.206.18', 20, 'a32d43', 'S', 1, '2014-08-13 05:42:19'),
(4, '98.221.225.100', 23, '80b3ea', 'M', 1, '2015-02-06 17:19:07'),
(5, '174.57.46.245', 17, '33a324', 'XL', 1, '2015-02-09 23:27:42'),
(7, '118.102.206.19', 24, '402421', 'M', 1, '2015-02-20 07:10:06'),
(8, '118.102.206.19', 16, '1616f5', 'XXL', 9, '2015-02-20 07:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `active` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `active`) VALUES
(2, 'Clothes', '1'),
(3, 'skirts', '1'),
(4, 'scarfs', '1'),
(5, 'Womens Apparel', '1'),
(6, 'Formal Shirts', '1'),
(7, 'Canvas Products', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mail_content`
--

DROP TABLE IF EXISTS `mail_content`;
CREATE TABLE IF NOT EXISTS `mail_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mail_content`
--

INSERT INTO `mail_content` (`id`, `comment`, `content`) VALUES
(1, 'Invoice mail to buyer', 'Thank you for shopping with ZPLOFT.'),
(2, 'Invoice mail to ZPLOFT', '<p>Product sold invoice<br></p>\r\n'),
(3, 'Invoice mail to Vendor', '<p>Product has been sold. Details are given below : <br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

DROP TABLE IF EXISTS `newsletter_subscribers`;
CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`) VALUES
(2, 'abhishek@gmail.com'),
(4, 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_coming_from` varchar(50) NOT NULL,
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `country` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` enum('Pending','Completed') NOT NULL,
  `card_num` varchar(50) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `card_code` varchar(10) NOT NULL,
  `delivery_status` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_coming_from`, `order_id`, `user_id`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `zip`, `country`, `product_id`, `color`, `size`, `quantity`, `transaction_id`, `payment_method`, `payment_status`, `card_num`, `exp_date`, `card_code`, `delivery_status`, `created`) VALUES
(1, '', 20537651, 0, 'abhishek', 'sharma', 'pragat543@gmail.com', '619, sector 22B', 'NY', 'CA', '3215', 'US', 12, '', 'M', 1, '', 'cod', 'Pending', '', '', '', 'Dispatched', '2014-06-23 01:21:55'),
(2, '', 20537651, 0, 'abhishek', 'sharma', 'pragat543@gmail.com', '619, sector 22B', 'NY', 'CA', '3215', 'US', 12, '', 'XL', 2, '', 'cod', 'Pending', '', '', '', 'Dispatched', '2014-06-23 01:21:55'),
(3, '', 51760525, 0, 'test', 'sharma', 'agency@gmail.com', '420', 'NY', 'London', '3215', 'india', 19, '', 'XL', 1, '', 'cod', 'Pending', '', '', '', '', '2014-06-09 21:46:03'),
(4, '', 73996310, 0, 'test', 'asd', 'a@gmail.com', 'asd', 'bharatpur', 'CA', '123475', 'in', 19, '1616f5', 'XL', 1, '', 'cod', 'Pending', '', '', '', '', '2014-06-09 21:48:14'),
(5, '', 44232837, 0, 'abhishek', 'sharma', 'varsha@sagipl.com', '619, sector 22B', 'Woolwich', 'CA', '3215', 'US', 24, 'd75a44', 'S', 1, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 06:07:25'),
(6, '', 44232837, 0, 'abhishek', 'sharma', 'varsha@sagipl.com', '619, sector 22B', 'Woolwich', 'CA', '3215', 'US', 24, 'd15347', 'S', 2, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 06:07:25'),
(7, '', 44232837, 0, 'abhishek', 'sharma', 'varsha@sagipl.com', '619, sector 22B', 'Woolwich', 'CA', '3215', 'US', 18, '1616f5', 'XL', 1, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 06:07:25'),
(8, '', 20697446, 0, 'abhishek', 'sharma', 'varsha@sagipl.com', '619, sector 22B', 'Woolwich', 'CA', '3215', 'US', 24, 'd15347', 'S', 2, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 06:13:05'),
(9, '', 20697446, 0, 'abhishek', 'sharma', 'varsha@sagipl.com', '619, sector 22B', 'Woolwich', 'CA', '3215', 'US', 2, 'ebeff2', 'XL', 1, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 06:13:05'),
(10, '', 36423607, 0, 'abhishek', 'sharma', 'pragat543@gmail.com', '619, sector 22B', 'Woolwich', 'CA', '3215', 'US', 24, '0f3c75', 'S', 2, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 07:27:37'),
(11, '', 36423607, 0, 'abhishek', 'sharma', 'pragat543@gmail.com', '619, sector 22B', 'Woolwich', 'CA', '3215', 'US', 2, 'ebeff2', 'XL', 1, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 07:27:37'),
(12, '', 76686789, 1, 'abhishek', 'sharma', 'varsha@sagipl.com', 'asd', 'LA', 'London', '3215', 'US', 22, 'ededf5', 'S', 1, '', 'cod', 'Pending', '', '', '', '', '2014-06-20 10:21:44'),
(13, '', 37795534, 0, 'Ameya', 'Paranjape', 'ameyaparanjape@gmail.com', 'd dsfisdb  fdshbds', 'plainsboro', 'nj', '93290', 'USA', 24, '402421', 'L', 1, '', 'authorize_net', 'Pending', '3929030293209302', '3/18', '322', '', '2014-06-23 01:25:39'),
(14, '', 23065885, 5, 'Ameya', 'Paranjape', 'ameyaparanjape@gmail.com', '3289329328932', '39290320', 'ujh', '293090239', 'jdskds', 24, 'd15347', 'M', 1, '', 'paypal', 'Pending', '', '', '', '', '2014-06-23 01:29:16'),
(15, 'Zippy Loft', 87639556, 0, 'hjh', 'fdsfg', 'codechk1234@gmail.com', 'fsdaf', 'jaipur', 'rAJ', '1212121', 'ind', 24, 'd75a44', 'M', 1, '', 'paypal', 'Pending', '', '', '', '', '2014-11-29 11:00:55'),
(16, 'Zippy Loft', 11935162, 7, 'asd', 'asd', 'aaaa@gmail.com', 'fsdaf', 'jaipur', 'rAJ', '1212121', 'ind', 23, '80b3ea', 'S', 1, '', 'cod', 'Pending', '', '', '', '', '2014-11-29 11:20:38'),
(17, 'Zippy Loft', 98212625, 7, 'asd', 'asd', 'aaaa@gmail.com', 'jaipur', 'jaipur', 'rAJ', '1212121', 'ind', 11, '33a324', 'XL', 1, '', 'cod', 'Pending', '', '', '', '', '2014-11-29 11:21:32'),
(18, 'Zippy Loft', 98212625, 7, 'asd', 'asd', 'aaaa@gmail.com', 'jaipur', 'jaipur', 'rAJ', '1212121', 'ind', 12, '1616f5', 'XL', 1, '', 'cod', 'Pending', '', '', '', '', '2014-11-29 11:21:32'),
(19, 'Zippy Loft', 12761248, 0, 'Ameya', 'Paranjape', 'ameyaparanjape@gmail.com', '25 Pond View Drive', 'Plainsboro', 'NJ', '08536', 'USA', 25, '000305', 'L', 1, '', 'cod', 'Pending', '', '', '', '', '2015-02-21 19:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `description` text NOT NULL,
  `overview` text NOT NULL,
  `specification` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `available_size` varchar(100) NOT NULL,
  `time_to_deliver` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `shipping_price` float(10,2) NOT NULL,
  `discount_price` float(10,2) NOT NULL,
  `is_discount` enum('0','1') NOT NULL,
  `fob_price` float(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `is_featured` enum('0','1') NOT NULL,
  `is_special` enum('0','1') NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_products` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `vendor_id`, `brand_id`, `description`, `overview`, `specification`, `color`, `available_size`, `time_to_deliver`, `price`, `shipping_price`, `discount_price`, `is_discount`, `fob_price`, `quantity`, `product_code`, `is_featured`, `is_special`, `is_active`, `created`) VALUES
(2, 'no.21', 13, 2, 1, '<p>Founded in Massachusetts in 1937, Madewell has a long tradition of high quality. Offering supple leather boots, soft wool scarves, and those denim pieces we''ll love for years - skinnies with spot-on fit, on-trend boyfriend jeans, flirty minis, and tailored jackets - Madewell is a treasure trove for the woman who seeks both fashion and function. And with styles featured on the pages of glossies such as InStyle, Lucky, and Marie Claire, the fashion world continues to take notice.</p>\r\n', '<p><b>Fit</b></p><p>Sizes listed are<b> US sizes</b></p><p><b>Measurements</b></p><p>Length: 17.75in / 45cm</p><p>Measurements from size 4</p><br>', '<p>Fit</p><p>Sizes listed are US sizes.</p><p>Measurements</p><p>Length: 17.75in / 45cm</p><p>Measurements from size 4</p><p>Model Measurements</p><p>Model is in size 2</p><p>Model is 5''11" / 180cm, bust 32" / 81cm, waist 23" / 59cm, hips 34" / 86cm</p>\r\n', 'f5586a~ebeff2~', 'XL', '3-5', 150.00, 20.00, 0.00, '0', 0.00, 18, '001', '1', '0', '1', '2014-06-20 07:27:37'),
(3, 'lela rose', 12, 2, 1, '<p><p><p></p><p>A floral print lends a ladylike look to this American Vintage skirt, and a slit relaxes the pencil silhouette. Gathered elastic waist. Unlined.<br><br>Fabric: Sateen.<br>100% polyester.<br>Wash cold.<br>Imported, China.<br><br><b>Measurements</b><br>Length: 22in / 56cm<br>Measurements from size <p><br></p><br></p>', '<p></p><p>Ã‚Â&nbsp;A floral print lends a ladylike look to this American Vintage skirt, and a slit relaxes the pencil silhouette. Gathered elastic waist. Unlined.</p><p>Fabric: Sateen.</p><p>100% polyester.</p><p>Wash cold.</p><p>Imported, China.</p><p><b>Measurements</b></p><p>Length: 22in / 56cm</p><p>Measurements from size S</p><br><p></p>\r\n', '<p><p>Length: 22in / 56cm</p><p>Measurements from size S</p><p>Model Measurements</p><p>Model is in size S</p><p>Model is 5''10" / 177cm, bust 33" / 83cm, waist 24" / 60cm, hips 35" / 88cm</p><br></p>', 'ebe9f5~', 'XL,XXL', '3-5', 120.00, 5.00, 0.00, '0', 0.00, 23, '008', '0', '0', '1', '2014-06-10 16:51:27'),
(4, 'Dion lee', 14, 2, 1, 'Cross stitching brings peasant charm to this airy SUNO maxi skirt. Fine pintucking trims the curved waist panel, and inset elastic gathers the back. Lined.<br><br>Fabric: Poplin.<br>100% cotton.<br>Dry clean.<br>Imported, India.<br><br>MEASUREMENTS<br>Length: 30in / 76cm\r\n', '<p>Model Measurements</p>Model is in size 0<br>Model is 5''10" / 177cm, bust 33" / 83cm, waist 24" / 60cm, hips 35" / 88cm\r\n', 'Model Measurements\r\n<br>Model is in size 0\r\n<br>Model is 5''10" / 177cm, bust 33" / 83cm, waist 24" / 60cm, hips 35" / 88cm ', 'f0f4f7~', 'XL,XXL', '3-5', 130.00, 20.00, 0.00, '0', 0.00, 25, '006', '1', '0', '1', '2014-06-10 16:49:19'),
(5, 'jay ahr', 12, 2, 2, 'Dense ruching lends volume and movement to a crinkled lamÃƒÂ© alice + olivia ball skirt. The glamorous, high-waisted piece is styled with structured lining and detailed with on-seam hip pockets. Exposed back zip. Lined.<br><br>Fabric: Crinkled lamÃƒÂ©.<br>Shell: 48% polyester/30% cotton/22% metallic.<br>Lining: 100% polyester.<br>Dry clean.<br>Imported, China.<br><br><b>Measurements</b><br>Length: 45.5in / 115.5cm<br>Measurements from size 4\r\n				\r\n', 'Dense ruching lends volume and movement to a crinkled lamÃƒÂ© alice + olivia ball skirt. The glamorous, high-waisted piece is styled with structured lining and detailed with on-seam hip pockets. Exposed back zip. Lined.<br><br>Fabric: Crinkled lamÃƒÂ©.<br>Shell: 48% polyester/30% cotton/22% metallic.<br>Lining: 100% polyester.<br>Dry clean.<br>Imported, China.<br><br><b>Measurements</b><br>Length: 45.5in / 115.5cm<br>Measurements from size 4\r\n				\r\n', 'Dense ruching lends volume and movement to a crinkled lamÃƒÂ© alice + olivia ball skirt. The glamorous, high-waisted piece is styled with structured lining and detailed with on-seam hip pockets. Exposed back zip. Lined.<br><br>Fabric: Crinkled lamÃƒÂ©.<br>Shell: 48% polyester/30% cotton/22% metallic.<br>Lining: 100% polyester.<br>Dry clean.<br>Imported, China.<br><br><b>Measurements</b><br>Length: 45.5in / 115.5cm<br>Measurements from size 4\r\n				\r\n', 'ebeff2~', 'XXL', '6-8', 60.00, 15.00, 0.00, '0', 0.00, 23, '0045', '0', '0', '1', '2014-06-10 16:47:13'),
(6, 'quilt skirt', 12, 2, 1, 'Playful flamingos add a cheery touch to a crisp cotton alice + olivia skirt. Ruching and structured lining add volume to the silhouette, and inset elastic panels relax the slim waistband. Exposed back zip. Lined.<br><br>Fabric: Crisp shirting.<br>Shell: 97% cotton/3% spandex.<br>Lining: 57% nylon/43% spandex.<br>Dry clean.<br>Imported, China.<br><br><b>Measurements</b><br>Length: 22in / 56cm<br>Measurements from size 4\n', '<b>Fit</b><p>Sizes listed are</p><p><b>Measurements</b></p><p>Length: 22in / 56cm</p><p>Measurements from size 4<br></p>\n', 'Launched in 2002, alice + olivia was born of designer Stacey Bendet''s personal quest to create the perfect pair of flattering and form-fitting pants. Her signature style was met with instant success, and "Stacey Pants" quickly became the daily staple and denim alternative for today''s retro sophisticate. The brand has continued to expand its horizons launching a cashmere collection in 2003 and a full contemporary collection in 2005, turning alice + olivia into the go-to brand for vintage style.\n', 'ebeff2~', 'XL', '3-5', 70.00, 10.00, 0.00, '0', 0.00, 45, '0080', '1', '0', '1', '2014-07-30 09:39:14'),
(7, 'ellery', 13, 2, 1, 'Born in Israel and raised in Hong Kong, designer Ronny Kobo has also lived in New York and London and finds inspiration in her globe-trotting lifestyle. Embracing spontaneity, Kobo has created a line of comfortable, versatile, and sexy clothing that easily travels from sofa to safari to Riviera. Crafted with the carefree adventurer in mind, Torn by Ronny Kobo is a staple for any woman who packs light and travels often.\r\n', 'Model is in size S<br>Model is 5''11" / 180cm, bust 32" / 81cm, waist 23" / 59cm, hips 34" / 86cm<br>\r\n', 'An open-knit pencil skirt has a modern, layered look. Ribbed banding trims the waist. Lined.<br><br>Fabric: Open knit.<br>80% rayon/20% spandex.<br>Hand wash.<br>Imported, China.<br><br><b>Measurements</b><br>Length: 23in / 58.5cm<br>Measurements from size S\r\n', '000305~', 'XL,XXL', '3-5', 75.00, 20.00, 0.00, '0', 0.00, 23, '0029', '1', '0', '1', '2014-06-10 16:39:05'),
(8, 'josh gutt', 22, 1, 1, 'Whiskered stretch denim composes this Joe''s Jeans pencil skirt, which is detailed with a notched front hem. 5-pocket styling. Exposed button fly. Unlined.<br><br>Fabric: Stretch denim.<br>98% cotton/2% elastane.<br>Wash cold.<br>Made in Mexico.<br><br>MEASUREMENTS<br>Length: 20in / 51cm\r\n', 'Brought up among the whitewash facades and bustling markets of Casablanca, Morocco, Joe Dahan came to LA with a rebellious creative vision that led to the 2001 launch of Joe''s Jeans. Originally a line of denim products that instantly garnered a cult following, the label has expanded into apparel and footwear, bringing its all-American heritage with it. With Dahan''s guidance and a focus on a vintage-modern aesthetic, Joe''s Jeans continues to be a go-to wardrobe win for women all over the globe. ', 'Brought up among the whitewash facades and bustling markets of Casablanca, Morocco, Joe Dahan came to LA with a rebellious creative vision that led to the 2001 launch of Joe''s Jeans. Originally a line of denim products that instantly garnered a cult following, the label has expanded into apparel and footwear, bringing its all-American heritage with it. With Dahan''s guidance and a focus on a vintage-modern aesthetic, Joe''s Jeans continues to be a go-to wardrobe win for women all over the globe.\r\n', '1616f5~', 'XL', '3-5', 90.00, 10.00, 0.00, '0', 0.00, 85, '0017', '1', '0', '1', '2014-06-10 16:36:56'),
(9, 'dion lee', 12, 1, 2, 'This exquisite Vika Gazinskaya skirt cuts a full, filmy profile in airy mesh, and bright, screen-printed trees line the hem. An optional slim tie cinches the paper-bag waist. Hidden snaps fasten the side. Tonal, puckered jacquard lining.<br><br>Fabric: Crisp mesh.<br>Shell: 60% acetate/30% silk/10% polyester.<br>Lining: 44% cotton/41% silk/15% nylon.<br>Dry clean.<br>Imported, Russian Federation.<br><br><b>Measurements</b><br>Length: 32in / 81cm<br>Measurements from size 40\n', 'Sizes listed are <b>Italian sizes</b>.<p>Model Measurements</p><p>Model is in size 36<br>Model is 5''9" / 175cm, bust 32" / 81cm, waist 24" / 60cm, hips 34" / 86cm<br></p>\n', 'Moscow native Vika Gazinskaya got her start in fashion at LÃ¢â‚¬â„¢Officiel Russia magazine as part of a prize for winning a design contest. After a year as an intern, she was hired on as fashion editor, and she honed her knowledge of the industry while continuing to work on her own designs. In 2007, Gazinskaya launched her eponymous label, showcasing the strong lines, graphic forms, and couture-like quality that have since become her signature. The designerÃ¢â‚¬â„¢s striking personal style had also captured the attention of the fashion world, and by 2010, the Vika Gazinskaya collection was walking the Paris runways. With its creative, uniquely sculptural aesthetic, Vika Gazinskaya clothing is the definition of wearable art.<br>', 'ebeff2~', 'XL', '3-5', 66.00, 10.00, 0.00, '0', 0.00, 23, '0056', '1', '0', '1', '2014-07-30 09:38:45'),
(10, 'sleeve', 9, 2, 1, '<p>Blue tunic, woven, has a frilled round neck, short sleeves with elasticated cuffs, eyelet embroidery at the front and at the back, elasticated waist, flared hem<br></p>', '<p><p>100% cotton</p><p>Hand wash cold</p><br></p>', '<p>The model (height 5''8" and chest 33") is wearing a size S<br></p>', '33a324~', 'XL,XXL', '3-5', 65.00, 5.00, 0.00, '0', 0.00, 25, '0028', '1', '0', '1', '2014-06-10 16:32:00'),
(11, 'Biba', 9, 2, 2, 'Lend a girly vibe to your wardrobe with this super stylish tunic.&nbsp;The tunic is created in a flowy fabric with an elastic gathered shoulder and a pleated collar! A contrast coloured placket with mock fabric buttons and contrast sleeves lend a finishing to the tunic! An Elastic waist gives a better fit!\r\n', 'Lend a girly vibe to your wardrobe with this super stylish tunic.&nbsp;The tunic is created in a flowy fabric with an elastic gathered shoulder and a pleated collar! A contrast coloured placket with mock fabric buttons and contrast sleeves lend a finishing to the tunic! An Elastic waist gives a better fit!\r\n', 'This Tunic comes up VERY SMALL - I am normally a size 8-10. I tried on the size 10 but it was way too small, due to the elastane content, so I tried the size 14 and that was loads better - PLUS you have a free pair of leggings - what a BARGAIN!!!!\r\n', '33a324~f7cd23~', 'XL,XXL', '3-5', 89.00, 10.00, 0.00, '0', 0.00, 84, '895', '0', '0', '1', '2014-11-29 11:21:32'),
(12, 'plane', 9, 1, 2, 'This Tunic comes up VERY SMALL - I am normally a size 8-10. I tried on the size 10 but it was way too small, due to the elastane content, so I tried the size 14 and that was loads better - PLUS you have a free pair of leggings - what a BARGAIN!!!!\r\n', 'The jersey tunic is flattering and feminine and styled in a long line fit. Designed to add prints to your wardrobe with the jersey tunic. Toe the line between simple and sophisticated with the stylish jersey tunic.\r\n', 'The jersey tunic is flattering and feminine and styled in a long line fit. Designed to add prints to your wardrobe with the jersey tunic. Toe the line between simple and sophisticated with the stylish jersey tunic.\r\n', '1616f5~f7cd23~33a324~ff1294~', 'XL,XXL', '3-5', 45.00, 5.00, 0.00, '0', 0.00, 55, '896', '0', '0', '1', '2014-11-29 11:21:32'),
(16, 'Denim', 11, 1, 2, 'Add a twist to a classic outfit or wrap up your fall look with our luxurious printed scarves. With myriad ways to wear itâ€”twisted, double-up, wrapped, tiedâ€”it may very well be your most versatile wardrobe piece for fall.<br>\r\n', 'Dimensions: 40"x 80".<p>    100% rayon.</p><p>    Medium weight.</p><p>    Available in midnight bloom, painted zebra, frida print, and mariposa.</p>\r\n', 'Imported.<br>Please note: due to the abstract design of this scarf, print variation will occur, making each scarf uniquely yours.\r\n', '1616f5~33a324~', 'XL,XXL', '3-5', 80.00, 20.00, 0.00, '0', 0.00, 10, '254', '0', '0', '1', '2014-06-10 16:21:04'),
(17, 'scarf', 15, 1, 1, 'Add a twist to a classic outfit or wrap up your fall look with our luxurious printed scarves. With myriad ways to wear itâ€”twisted, double-up, wrapped, tiedâ€”it may very well be your most versatile wardrobe piece for fall.\r\n', 'Dimensions: 40"x 80".&nbsp; &nbsp; 100% rayon. <br>Medium weight.&nbsp; &nbsp; Available in midnight bloom, painted zebra, frida print, and mariposa.', '&nbsp; Imported.<p></p><p>&nbsp;Please note: due to the abstract design of this scarf, print variation will occur, making each scarf uniquely yours.', '33a324~', 'XL', '3-5', 10.00, 2.00, 0.00, '0', 0.00, 65, '459', '0', '0', '1', '2014-06-10 16:15:37'),
(18, 'Summer Collection', 12, 1, 1, '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged.<p><br></p>', 'It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using ''Content here, content here'', making it \r\nlook like readable English.', 'There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don''t look even slightly believable. ', '1616f5~f7cd23~', 'XL,XXL', '6-8', 100.00, 20.00, 0.00, '0', 0.00, 0, '01001', '0', '0', '1', '2014-06-20 06:07:25'),
(19, 'Summer Collection - 1', 9, 2, 1, '<p>There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don''t look even slightly believable.<br></p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\r\n text ever since the 1500s<br></p>', '<p>There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don''t look even slightly believable.<br></p>', '1616f5~f7cd23~', 'XL', '3-5', 75.00, 20.00, 0.00, '0', 0.00, 0, '01002', '0', '0', '1', '2014-06-09 21:48:14'),
(20, 'Jennifer Lopez Faux-Leather Motorcycle Jacket', 24, 3, 3, '<p>Get trendsetting style with this women''s Jennifer Lopez faux-leather \r\njacket. Motorcycle design and asymmetrical zipper give you an edgy look \r\nyou''ll love. <br></p>', '<p><p>\r\n    </p><div>\r\n        <p>Get trendsetting style with this women''s Jennifer Lopez \r\nfaux-leather jacket. Motorcycle design and asymmetrical zipper give you \r\nan edgy look you''ll love.</p>\r\n<p><strong>Product Features</strong></p>\r\n<ul><li>Zip front</li><li>Long sleeves</li><li>Faux-leather construction</li><li>Fully lined</li><li>2-pocket</li></ul>\r\n<p><strong>Fit & Sizing</strong></p>\r\n<ul><li>Princess seams complement your figure</li><li>Ribbed trim on the sleeves</li></ul>\r\n<p><strong>Fabric & Care</strong></p>\r\n<ul><li>Body: polyurethane</li><li>Lining: polyester</li><li>Trim: cotton/spandex</li><li>Machine wash</li><li>Imported</li></ul>    <p></p>\r\n</div><br></p>', '<p>Get trendsetting style with this women''s Jennifer Lopez faux-leather \r\njacket. Motorcycle design and asymmetrical zipper give you an edgy look \r\nyou''ll love. <br></p>', 'a32d43~b9915d~5f403e~', 'S,XL', '3-5', 89.00, 25.00, 0.00, '0', 0.00, 6, '01003', '0', '0', '1', '2014-06-11 16:44:17'),
(21, 'Chaps Striped Drawstring Top', 10, 3, 3, '<p>Drawstring sides give you an adjustable, flattering fit. For a cute, \r\nlaid-back look, coordinate this women''s top with your favorite jeans. <br></p>', '<p>Subtle sequins and a wide leather belt take this pleated skirt into \r\nnighttime territory. in chocolate brown, with a textured silk top layer \r\nand sequined jersey lining. Elastic waist.\r\n\r\n100% silk\r\n\r\nContrast: 62% rayon, 35% polyethylene, 3% spandex. \r\n\r\nBelt: 100% leather.\r\n\r\nMade in the USA. \r\n\r\nStyled with: Bailey 44 Merry Wives of Windsor Top.\r\n\r\nFit model is 5''9" with 26 waist, and wears a size XS.    <br></p>', '<p>Very happy with quality of jumper and was more than satisfied with \r\nservice received from senders. So happy, that I ordered another colour \r\nstraight away.                        <br></p>', '000305~c9c2a8~', 'S,M', '3-5', 45.00, 10.00, 0.00, '0', 0.00, 10, '01004', '0', '0', '1', '2014-06-11 16:50:22'),
(22, 'Chaps No Iron Shirt', 10, 3, 2, '<p>Add this Chaps classic shirt to your wardrobe.&nbsp;Wrinkle-resistant finish \r\neliminates the need to iron. Perfect for work or the weekend, this \r\nwomen''s shirt is a versatile must-have.<br></p>', '<p><p>\r\n    </p><div>\r\n        <p><strong>Add this Chaps classic shirt to your wardrobe.</strong>&nbsp;Wrinkle-resistant\r\n finish eliminates the need to iron. Perfect for work or the weekend, \r\nthis women''s shirt is a versatile must-have.</p>\r\n<ul><li>Soft cotton construction provides all-day comfort.</li><li>Details:\r\n<ul><li>Button front</li><li>Long sleeves</li><li>Cotton</li><li>Machine wash</li><li>Imported</li><li>Solid shirts are a&nbsp;broadcloth&nbsp;construction.</li></ul>\r\n</li></ul>    <p></p>\r\n</div></p>', '<p><p>Add this Chaps classic shirt to your wardrobe.&nbsp;Wrinkle-resistant finish \r\neliminates the need to iron. Perfect for work or the weekend, this \r\nwomen''s shirt is a versatile must-have.</p><br></p>', 'f3e1e3~efedee~ededf5~', 'S,XL,M,L', '3-5', 39.99, 20.00, 0.00, '0', 0.00, 4, '01005', '0', '0', '1', '2014-06-20 09:23:52'),
(23, 'Carlo Ponti Dress', 9, 3, 5, '<p>A sharp standalone piece that’s perfect for the office – or afterwards. \r\nIn colorblocked green, black, white, and teal, with a crew neck. Fully \r\nlined.                        <br></p>', '<p>A sharp standalone piece that’s perfect for the office – or afterwards. \r\nIn colorblocked green, black, white, and teal, with a crew neck. Fully \r\nlined.\r\n\r\n61% rayon, 35% nylon, 4% spandex. Lining: 100% polyester.\r\n\r\nMade in the USA.\r\n\r\nFit model is 5''10" with 25 waist, and wears a size S.<br></p>', '<p><p>A sharp standalone piece that’s perfect for the office – or afterwards. \r\nIn colorblocked green, black, white, and teal, with a crew neck. Fully \r\nlined.                        </p><br></p>', '80b3ea~ededf5~', 'S,M', '3-5', 65.00, 25.00, 0.00, '0', 0.00, 4, '01006', '1', '0', '1', '2014-11-29 11:20:38'),
(24, 'Solid Hemingway Dress', 26, 1, 3, '<p>An LBD with a surprise in store! Diagonal woven detail and a cutout back\n give this flattering dress a little attitude. With a boat neck, cap \nsleeves, and a fit-and-flare skirt.                        <br></p>', '<p>An LBD with a surprise in store! Diagonal woven detail and a cutout back\n give this flattering dress a little attitude. With a boat neck, cap \nsleeves, and a fit-and-flare skirt.\n\n94% rayon, 6% spandex.\n\nMade in the USA.\n\nFit model is 5''10" with 25 waist, and wears a size S.<br></p>', '<p><p>An LBD with a surprise in store! Diagonal woven detail and a cutout back\n give this flattering dress a little attitude. With a boat neck, cap \nsleeves, and a fit-and-flare skirt.                        </p><br></p>', 'd15347~402421~362478~0f3c75~e152ae~d75a44~902537~ce4e41~', 'S,M,L,XL', '6-8', 185.00, 20.00, 10.00, '1', 200.00, 3, '01007', '1', '0', '1', '2014-06-23 01:21:08'),
(25, 'Canvas Bag', 28, 4, 6, '<p>Made from Great quality canvas material, durable, Sturdy, elegant, stylish bag in various colors and sizes<br>Pouch inside with hooks for carrying strap.<br></p>', '', '', '000305~33a324~d15347~', 'S,L', '3-5', 59.95, 65.00, 0.00, '0', 30.00, 19, 'KKDO0001', '1', '1', '1', '2015-02-21 19:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `product_id` int(15) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_images` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `file_name`, `is_featured`) VALUES
(70, 2, '9632madew4096361708_q1_1-0.jpg', 1),
(71, 2, '2969madew4096361708_q2_1-0.jpg', 0),
(72, 2, '9615madew4096361708_q3_1-0.jpg', 0),
(73, 2, '7602madew4096361708_q4_1-0.jpg', 0),
(74, 2, '9944madew4096361708_q5_1-0.jpg', 0),
(75, 3, '9049amvin4007541055_q1_1-0.jpg', 1),
(76, 3, '4245amvin4007541055_q2_1-0.jpg', 0),
(77, 3, '6661amvin4007541055_q3_1-0.jpg', 0),
(78, 3, '4232amvin4007541055_q4_1-0.jpg', 0),
(79, 3, '9326amvin4007541055_q5_1-0.jpg', 0),
(80, 4, '2961sunoo2013215713_q1_1-0.jpg', 1),
(81, 4, '6439sunoo2013215713_q2_1-0.jpg', 0),
(82, 4, '6020sunoo2013215713_q3_1-0.jpg', 0),
(83, 4, '1375sunoo2013215713_q4_1-0.jpg', 0),
(84, 4, '4347sunoo2013215713_q5_1-0.jpg', 0),
(85, 5, '2523alice4237563187_q1_1-0.jpg', 1),
(86, 5, '4174alice4241512397_q5_1-0.jpg', 0),
(87, 6, '5194alice4237563187_q1_1-0.jpg', 1),
(88, 6, '5548alice4237563187_q3_1-0.jpg', 0),
(89, 6, '9011alice4237563187_q4_1-0.jpg', 0),
(90, 6, '4495alice4237563187_q5_1-0.jpg', 0),
(91, 7, '7574tornb4056812867_q1_1-0.jpg', 1),
(92, 7, '131tornb4056812867_q2_1-0.jpg', 0),
(93, 7, '637tornb4056812867_q3_1-0.jpg', 0),
(94, 7, '3099tornb4056812867_q4_1-0.jpg', 0),
(95, 7, '1977tornb4056812867_q5_1-0.jpg', 0),
(96, 8, '1395joesj4038858895_q1_1-0.jpg', 1),
(97, 8, '6476joesj4038858895_q2_1-0.jpg', 0),
(98, 8, '5134joesj4038858895_q3_1-0.jpg', 0),
(100, 8, '8732joesj4038858895_q5_1-0.jpg', 0),
(101, 9, '692vikag3000711552_q1_1-0.jpg', 1),
(102, 9, '9835vikag3000711552_q2_1-0.jpg', 0),
(103, 9, '1306vikag3000711552_q3_1-0.jpg', 0),
(104, 9, '9642vikag3000711552_q4_1-0.jpg', 0),
(105, 9, '6779vikag3000711552_q5_1-1.jpg', 0),
(106, 10, '7448Anouk-Women-Kurtas_f7f4c9b13ad1f3f2c2150b2692536220_images_360_480_mini.jpg', 0),
(107, 10, '1929Anouk-Women-Kurtas_8eb76eeeea1a0fde4540860c14bbb35f_images_360_480_mini.jpg', 1),
(108, 10, '2623Anouk-Women-Kurtas_29fa4ed30c1927bfc236af6eb6790142_images_360_480_mini.jpg', 0),
(109, 10, '3835Anouk-Women-Kurtas_c3f86607b72417ec9e07a8bebe91bea9_images_360_480_mini.jpg', 0),
(110, 10, '1954Anouk-Women-Kurtas_c4e3202cf37122d26908f465774bdee1_images_360_480_mini.jpg', 0),
(111, 11, '177Biba-Women-Tunics_2a8c7a423f65fc113948e3ded5e03ee0_images_360_480_mini.JPG', 1),
(112, 11, '7435Biba-Women-Tunics_9ce2b56f61727b6abf8ceb914462916c_images_360_480_mini.JPG', 0),
(113, 11, '8467Biba-Women-Tunics_53c9f3b0b00ea8663e38b3f58df5e834_images_360_480_mini.JPG', 0),
(114, 11, '3902Biba-Women-Tunics_bb2d319e7cc6b6ab6de4c0f88e27eaac_images_360_480_mini.JPG', 0),
(115, 12, '9897pattern-and-stripe-jersey-tunic-top.jpgfgbdf.jpg', 0),
(116, 12, '5090pattern-and-stripe-jersey-tunic-top.jpgjhuj.jpg', 0),
(117, 12, '8490pattern-and-stripe-jersey-tunic-top.jpg', 1),
(136, 17, '3644orange-scarf1.jpg', 1),
(137, 17, '6443sc114fpr_scarf_styled.jpg', 0),
(138, 17, '9544se8036-c_1.jpg', 0),
(139, 17, '6135se8038-c_1.jpg', 0),
(141, 18, '11991.jpg', 1),
(142, 18, '29332.jpg', 0),
(143, 19, '5003.jpg', 1),
(144, 16, '922Tokyo-Talkies-Grey-Milange-Solid-T-Shirt-5423-477906-1-zoom.jpg', 1),
(145, 16, '9604Tokyo-Talkies-Grey-Milange-Solid-T-Shirt-5423-477906-2-zoom.jpg', 0),
(146, 16, '7030Tokyo-Talkies-Grey-Milange-Solid-T-Shirt-5423-477906-3-zoom.jpg', 0),
(147, 16, '5665Tokyo-Talkies-Grey-Milange-Solid-T-Shirt-5423-477906-4-zoom.jpg', 0),
(148, 20, '3052pg.60201958.jjf88xx.pz.jpg', 0),
(149, 20, '8417pg.60201958.jjo01xx.bz.jpg', 0),
(150, 20, '2944pg.60201958.jjo01xx.pz.jpg', 0),
(151, 20, '9454pg.60201964.jj6wxxx.bz.jpg', 0),
(152, 20, '2539pg.60201964.jj6wxxx.pz.jpg', 1),
(153, 21, '9399pg.10402611.jjgi5xx.bz.jpg', 0),
(154, 21, '1930pg.10402611.jjgi5xx.pz.jpg', 0),
(155, 21, '3258pg.10402611.jjia6a0.bz.jpg', 0),
(156, 21, '4151pg.10402611.jjia6a0.pz.jpg', 1),
(157, 22, '525pg.10143769.jjg28xx.bz.jpg', 0),
(158, 22, '8358pg.10143769.jjg28xx.pz.jpg', 0),
(159, 22, '2685pg.10143769.jji15xx.bz.jpg', 0),
(160, 22, '5364pg.10143769.jji15xx.pz.jpg', 1),
(161, 22, '6676pg.10143770.jja70xx.bz.jpg', 0),
(162, 23, '4456pg.10336939.jjfs1xx.bz.jpg', 0),
(163, 23, '428pg.10336939.jjfs1xx.pz.jpg', 0),
(164, 23, '9968pg.10337083.jjhh1xx.bz.jpg', 0),
(165, 23, '6557pg.10337083.jjhh1xx.pz.jpg', 1),
(166, 24, '5668pg.10340032.jj4gyxx.bz.jpg', 0),
(167, 24, '801pg.10340032.jj4gyxx.pz.jpg', 0),
(168, 24, '3306pg.10340032.jj6wxxx.bz.jpg', 0),
(169, 24, '9965pg.10340032.jj6wxxx.pz.jpg', 0),
(170, 24, '7541pg.10340032.jj9asxx.bz.jpg', 0),
(171, 24, '668pg.10340032.jj9asxx.pz.jpg', 0),
(172, 24, '1928pg.10340032.jj169xx.bz.jpg', 0),
(173, 24, '369pg.10340032.jj169xx.pz.jpg', 0),
(174, 24, '9708pg.10340032.jj852xx.bz.jpg', 0),
(175, 24, '2468pg.10340032.jj852xx.pz.jpg', 1),
(176, 24, '1311pg.10340032.jjc04xx.bz.jpg', 0),
(177, 24, '3801pg.10340032.jjc04xx.pz.jpg', 0),
(178, 24, '1855pg.10340032.jjh96xx.bz.jpg', 0),
(179, 24, '2140pg.10340032.jjh96xx.pz.jpg', 0),
(180, 24, '8644pg.10340032.jjl98xx.bz.jpg', 0),
(181, 24, '3697pg.10340032.jjl98xx.pz.jpg', 0),
(182, 25, '1022image3.JPG', 1),
(183, 25, '7230image2.JPG', 0),
(184, 25, '333image1.JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

DROP TABLE IF EXISTS `slider_images`;
CREATE TABLE IF NOT EXISTS `slider_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image`, `is_active`) VALUES
(43, '9812banner.png', '0'),
(47, '578910.jpg', '1'),
(48, '897811.jpg', '1'),
(49, '58074.jpg', '1'),
(50, '47712.jpg', '1'),
(51, '64798.jpg', '1'),
(52, '30929.jpg', '1'),
(53, '91926.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

DROP TABLE IF EXISTS `static_pages`;
CREATE TABLE IF NOT EXISTS `static_pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `page_name`, `page_title`, `content`) VALUES
(1, 'about us', 'About Us', '<p></p><h4>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</h4>\r\n<h5>"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</h5><p><b>edit text</b><br></p><br><p></p>\r\n'),
(2, 'Shipping Rates', 'Shipping Rates', '<p><p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac felis \r\nante. Mauris vel nisl a nulla scelerisque scelerisque. Cras facilisis \r\nvestibulum tempor. Aliquam a commodo urna. Sed porta erat ac justo \r\nmollis facilisis. Cras tincidunt felis ac purus imperdiet ullamcorper. \r\nMaecenas suscipit justo a magna placerat adipiscing.\r\n</p>\r\n<p>\r\nPhasellus laoreet cursus orci. Nam commodo, massa eget porttitor luctus,\r\n justo lacus posuere risus, nec pharetra quam dui nec nulla. Phasellus \r\ncongue mattis aliquet. Aenean a sollicitudin ipsum. Phasellus \r\ncondimentum varius tellus, eleifend tincidunt sem gravida ac. Ut tempus \r\nimperdiet massa, id pellentesque ipsum tempus in. Suspendisse eros \r\nlectus, rutrum dignissim bibendum ut, ultricies at urna. Donec elit leo,\r\n interdum a tortor eget, venenatis vestibulum diam.\r\n</p><br></p>'),
(3, 'Privacy Policy', 'Privacy Policy', '<p><p><br><strong>Privacy &amp; Security</strong><br><br>Last Updated on August 09, 2014&nbsp; <br>&nbsp; <br>Information Collection and Use </p><p>zippyloft.com is the sole owner of the information collected on this site. We will not sell, share, or rent this information to others in ways different from what is disclosed in this statement. zippyloft.com collects information from our users at several different points on our website.<br>&nbsp;<br>Registration </p><p>In order to buy from this website, a user must first complete the registration form. During registration a user is required to give their contact information (such as name and email address). This information is used to contact the user about the services on our site for which they have expressed interest. It is mandatory for the user to provide demographic information (such as income level and gender so we can provide a more personalized experience on our site. This information is meant for the discretion of zippyloft.com ONLY!<br>&nbsp;<br>Order </p><p>We request information from the user on our order form. Here a user must provide contact information (like name and shipping address) and financial information (like credit card number, expiration date). This information is used for billing purposes and to fill customerÌs orders. If we have trouble processing an order, this contact information is used to get in touch with the user.<br>&nbsp;<br>Cookies </p><p>A cookie is a piece of data stored on the user’s hard drive tied to information about the user. Usage of a cookie is in no way linked to any personally identifiable information while on our site. Once the user closes their browser, the cookie simply terminates. For instance, by setting a cookie on our site, the user would not have to log in a password more than once, thereby saving time while on our site. If a user rejects the cookie, they may still use our site. The only drawback to this is that the user will be limited in some areas of our site. For example, the user will not be able to participate in any of our Sweepstakes, Contests or monthly Drawings that take place. Cookies can also enable us to track and target the interests of our users to enhance the experience on our site.<br>&nbsp;<br>Log Files&nbsp; </p><p>We use IP addresses to analyze trends, administer the site, track userÌs movement, and gather broad demographic information for aggregate use.IP addresses are not linked to personally identifiable information.<br>&nbsp;<br>Sharing </p><p>We will share aggregated demographic information with our partners and advertisers. This shared aggregated demographic not linked to any personal information that can identify any individual person by our partners or advertisers.</p><p>We use an outside shipping company to ship orders, and a credit card processing company to bill users for goods and services. These companies do not retain, share, store or use personally identifiable information for any secondary purposes. <br>&nbsp;We partner with another party to provide specific services. When the user signs up for these services, we will share names, or other contact information that is necessary for the third party to provide these services. These parties are not allowed to use personally identifiable information except for the purpose of providing these services.</p><p>Though we make every effort to preserve user privacy, we may need to disclose personal information when required by law wherein we have a good-faith belief that such action is necessary to comply with an appropriate law enforcement investigation, current judicial proceeding, a court order or legal process served on our Web site, or as required by law.<br>&nbsp;<br>Links </p><p>This web site contains links to other sites. Please be aware that we zippyloft.com are not responsible for the privacy practices of such other sites. We encourage our users to be aware when they leave our site and to read the privacy statements of each and every web site that collects personally identifiable information. This privacy statement applies solely to information collected by this Web site.<br>&nbsp;<br>Newsletter </p><p>If a user wishes to subscribe to our newsletter, we ask for contact information such as name and email address. We provide the option to opt-out, see our Choice/Opt-Out section below.<br>&nbsp;<br>Surveys &amp; Contests&nbsp; </p><p>From time-to-time our site requests information from users via surveys or contests. Participation in these surveys or contests is completely voluntary and the user therefore has a choice whether or not to disclose this information.Information requested may include contact information (such as name and shipping address), and demographic information (such as zip code, age level). Contact information will be used to notify the winners and award prizes. Survey information will be used for purposes of monitoring or improving the use and satisfaction of this site.<br>&nbsp;<br>Tell-a-Friend </p><p>This website takes every precaution to protect our usersÌ information. When users submit sensitive information via the website, your information is protected both online and off-line.<br>&nbsp;<br>Security </p><p>When our registration/order form asks users to enter sensitive information (such as credit card number and/or social security number), that information is encrypted and is protected with the best encryption software in the industry with 128-bit SSL. While on a secure page, such as our order form, the lock icon on the bottom of Web browsers such as Netscape Navigator and Microsoft Internet Explorer becomes locked, as opposed to un-locked, or open, when you are just ÎsurfingÌ. To learn more about SSL, follow this link&nbsp; <a href="http://www.verisign.com/">http://www.verisign.com</a>.</p><p>While we use SSL encryption to protect sensitive information online, we also do everything in our power to protect user-information off-line. All of our usersÌ information, not just the sensitive information mentioned above, is restricted in our offices. Only employees who need the information to perform a specific job (for example, our billing clerk or a customer service representative) are granted access to personally identifiable information. Our employees must use password-protected screen-savers when they leave their desk. When they return, they must re-enter their password to re-gain access to your information. Furthermore, ALL employees are kept up-to-date on our security and privacy practices. Every quarter, as well as any time new policies are added, our employees are notified and/or reminded about the importance we place on privacy, and what they can do to ensure our customersÌ information is protected. Finally, the servers that we store personally identifiable information on are kept in a secure environment, behind a locked cage.</p><p>If you have any questions about the security at our website, you can send an email to <a href="mailto:prevention@zippyloft.com">prevention@zippyloft.com</a>.<br>&nbsp;<br>Special Offers&nbsp; </p><p>We send all new members a welcoming email to verify password and username. Established members will occasionally receive information on products, services, special deals, and a newsletter. Out of respect for the privacy of our users we present the option to not receive these types of communications. Please see our choice and opt-out below.<br>&nbsp;<br>Site and Service Updates&nbsp; </p><p>We also send the user site and service announcement updates. Members are not able to un-subscribe from service announcements, which contain important information about the service. We communicate with the user to provide requested services and in regards to issues relating to their account via email or phone.<br>&nbsp;<br>Correction/Updating Personal Information </p><p>If a user''s personally identifiable information changes (such as your zip code), or if a user no longer desires our service, we will endeavor to provide a way to correct, update or remove that user''s personal data provided to us. This can usually be done at the member information page or by emailing our Customer Support.<br>&nbsp;<br>Choice/Opt-out </p><p>Our users are given the opportunity to ''opt-out'' of having their information used for purposes not directly related to our site at the point where we ask for the information. For example, our order form has an ''opt-out'' mechanism so users who buy a product from us, but don''t want any marketing material, can keep their email address off of our lists.</p><p>Users who no longer wish to receive our newsletter or promotional materials from our partners may opt-out of receiving these communications by replying to unsubscribe in the subject line in the email or email us at&nbsp; <a href="mailto:privacy@zippyloft.com">privacy@zippyloft.com</a></p><p>Users of our site are always notified when their information is being collected by any outside parties. We do this so our users can make an informed choice as to whether they should proceed with services that require an outside party, or not.<br>&nbsp;<br>Notification of Changes&nbsp; </p><p>If we decide to change our privacy policy, we will post those changes on our Homepage so our users are always aware of what information we collect, how we use it, and under circumstances, if any, we disclose it. If at any point we decide to use personally identifiable information in a manner different from that stated at the time it was collected, we will notify users by way of an email. Users will have a choice as to whether or not we use their information in this different manner. We will use information in accordance with the privacy policy under which the information was collected.<br>&nbsp;<br>Contact zippyloft&nbsp; </p><p>If you have any further questions regarding our privacy policy or comments about our website, please feel free to email us&nbsp; <a href="mailto:privacy@zippyloft.com">privacy@zippyloft.com</a>. We are always glad to hear fro our customers and always appreciate your feedback.<br>If you would like to write to us, please use the following address: zippyloft.com<br>&nbsp;ATTENTION: PRIVACY &amp; SECURITY<br>&nbsp;25 Pond View Drive<br>&nbsp;Plainsboro, NJ 08873&nbsp; </p><br></p>\n'),
(4, 'International Shipping and Payment', 'International Shipping and Payment', '<p><p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac felis \r\nante. Mauris vel nisl a nulla scelerisque scelerisque. Cras facilisis \r\nvestibulum tempor. Aliquam a commodo urna. Sed porta erat ac justo \r\nmollis facilisis. Cras tincidunt felis ac purus imperdiet ullamcorper. \r\nMaecenas suscipit justo a magna placerat adipiscing.\r\n</p>\r\n<p>\r\nPhasellus laoreet cursus orci. Nam commodo, massa eget porttitor luctus,\r\n justo lacus posuere risus, nec pharetra quam dui nec nulla. Phasellus \r\ncongue mattis aliquet. Aenean a sollicitudin ipsum. Phasellus \r\ncondimentum varius tellus, eleifend tincidunt sem gravida ac. Ut tempus \r\nimperdiet massa, id pellentesque ipsum tempus in. Suspendisse eros \r\nlectus, rutrum dignissim bibendum ut, ultricies at urna. Donec elit leo,\r\n interdum a tortor eget, venenatis vestibulum diam.\r\n</p><br></p>'),
(5, 'FAQ', 'FAQ', '<p><p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac felis \r\nante. Mauris vel nisl a nulla scelerisque scelerisque. Cras facilisis \r\nvestibulum tempor. Aliquam a commodo urna. Sed porta erat ac justo \r\nmollis facilisis. Cras tincidunt felis ac purus imperdiet ullamcorper. \r\nMaecenas suscipit justo a magna placerat adipiscing.\r\n</p>\r\n<p>\r\nPhasellus laoreet cursus orci. Nam commodo, massa eget porttitor luctus,\r\n justo lacus posuere risus, nec pharetra quam dui nec nulla. Phasellus \r\ncongue mattis aliquet. Aenean a sollicitudin ipsum. Phasellus \r\ncondimentum varius tellus, eleifend tincidunt sem gravida ac. Ut tempus \r\nimperdiet massa, id pellentesque ipsum tempus in. Suspendisse eros \r\nlectus, rutrum dignissim bibendum ut, ultricies at urna. Donec elit leo,\r\n interdum a tortor eget, venenatis vestibulum diam.\r\n</p><br></p>'),
(6, 'Contact Us', 'Contact Us', '<p><p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac felis \r\nante. Mauris vel nisl a nulla scelerisque scelerisque. Cras facilisis \r\nvestibulum tempor. Aliquam a commodo urna. Sed porta erat ac justo \r\nmollis facilisis. Cras tincidunt felis ac purus imperdiet ullamcorper. \r\nMaecenas suscipit justo a magna placerat adipiscing.\r\n</p>\r\n<p>\r\nPhasellus laoreet cursus orci. Nam commodo, massa eget porttitor luctus,\r\n justo lacus posuere risus, nec pharetra quam dui nec nulla. Phasellus \r\ncongue mattis aliquet. Aenean a sollicitudin ipsum. Phasellus \r\ncondimentum varius tellus, eleifend tincidunt sem gravida ac. Ut tempus \r\nimperdiet massa, id pellentesque ipsum tempus in. Suspendisse eros \r\nlectus, rutrum dignissim bibendum ut, ultricies at urna. Donec elit leo,\r\n interdum a tortor eget, venenatis vestibulum diam.\r\n</p><br></p>'),
(7, 'Press Room', 'Press Room', '<p><p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac felis \r\nante. Mauris vel nisl a nulla scelerisque scelerisque. Cras facilisis \r\nvestibulum tempor. Aliquam a commodo urna. Sed porta erat ac justo \r\nmollis facilisis. Cras tincidunt felis ac purus imperdiet ullamcorper. \r\nMaecenas suscipit justo a magna placerat adipiscing.\r\n</p>\r\n<p>\r\nPhasellus laoreet cursus orci. Nam commodo, massa eget porttitor luctus,\r\n justo lacus posuere risus, nec pharetra quam dui nec nulla. Phasellus \r\ncongue mattis aliquet. Aenean a sollicitudin ipsum. Phasellus \r\ncondimentum varius tellus, eleifend tincidunt sem gravida ac. Ut tempus \r\nimperdiet massa, id pellentesque ipsum tempus in. Suspendisse eros \r\nlectus, rutrum dignissim bibendum ut, ultricies at urna. Donec elit leo,\r\n interdum a tortor eget, venenatis vestibulum diam.\r\n</p><br></p>\r\n'),
(8, 'Help', 'Help', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac felis \r\nante. Mauris vel nisl a nulla scelerisque scelerisque. Cras facilisis \r\nvestibulum tempor. Aliquam a commodo urna. Sed porta erat ac justo \r\nmollis facilisis. Cras tincidunt felis ac purus imperdiet ullamcorper. \r\nMaecenas suscipit justo a magna placerat adipiscing.\r\n</p>\r\n<p>\r\nPhasellus laoreet cursus orci. Nam commodo, massa eget porttitor luctus,\r\n justo lacus posuere risus, nec pharetra quam dui nec nulla. Phasellus \r\ncongue mattis aliquet. Aenean a sollicitudin ipsum. Phasellus \r\ncondimentum varius tellus, eleifend tincidunt sem gravida ac. Ut tempus \r\nimperdiet massa, id pellentesque ipsum tempus in. Suspendisse eros \r\nlectus, rutrum dignissim bibendum ut, ultricies at urna. Donec elit leo,\r\n interdum a tortor eget, venenatis vestibulum diam.\r\n</p><p><br></p>\r\n'),
(9, 'Terms & Conditions ', 'Terms & Conditions ', '<p>In General</p><p>[zippyloft (<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) owns and operate this Website.&nbsp; This document governs your relationship with zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) (“Website”). Access to and use of this Website and the products and services available through this Website (collectively, the "Services") are subject to the following terms, conditions and notices (the "Terms of Service"). By using the Services, you are agreeing to all of the Terms of Service, as may be updated by us from time to time. You should check this page regularly to take notice of any changes we may have made to the Terms of Service.</p><p><br>Access to this Website is permitted on a temporary basis, and we reserve the right to withdraw or amend the Services without notice. We will not be liable if for any reason this Website is unavailable at any time or for any period. From time to time, we may restrict access to some parts or all of this Website.</p><p>This Website may contain links to other websites (the "Linked Sites"), which are not operated by zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>). zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) has no control over the Linked Sites and accepts no responsibility for them or for any loss or damage that may arise from your use of them. Your use of the Linked Sites will be subject to the terms of use and service contained within each such site.</p><p><br>Privacy Policy</p><p>Our privacy policy, which sets out how we will use your information, can be found at [Privacy Policy Link]. By using this Website, you consent to the processing described therein and warrant that all data provided by you is accurate.</p><p><br>Prohibitions</p><p>You must not misuse this Website. You will not: commit or encourage a criminal offense; transmit or distribute a virus, trojan, worm, logic bomb or any other material which is malicious, technologically harmful, in breach of confidence or in any way offensive or obscene; hack into any aspect of the Service; corrupt data; cause annoyance to other users; infringe upon the rights of any other person''s proprietary rights; send any unsolicited advertising or promotional material, commonly referred to as "spam"; or attempt to affect the performance or functionality of any computer facilities of or accessed through this Website. Breaching this provision would constitute a criminal offense and zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) will report any such breach to the relevant law enforcement authorities and disclose your identity to them.</p><p><br>We will not be liable for any loss or damage caused by a distributed denial-of-service attack, viruses or other technologically harmful material that may infect your computer equipment, computer programs, data or other proprietary material due to your use of this Website or to your downloading of any material posted on it, or on any website linked to it.</p><p><br>Intellectual Property, Software and Content</p><p>The intellectual property rights in all software and content (including photographic images) made available to you on or through this Website remains the property of zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) or its licensors and are protected by copyright laws and treaties around the world. All such rights are reserved by zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) and its licensors. You may store, print and display the content supplied solely for your own personal use. You are not permitted to publish, manipulate, distribute or otherwise reproduce, in any format, any of the content or copies of the content supplied to you or which appears on this Website nor may you use any such content in connection with any business or commercial enterprise.</p><p><br>Terms of Sale</p><p>By placing an order you are offering to purchase a product on and subject to the following terms and conditions. All orders are subject to availability and confirmation of the order price.</p><p>Dispatch times may vary according to availability and subject to any delays resulting from postal delays or force majeure for which we will not be responsible. </p><p><br>In order to contract with zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) you must be over 18 years of age and possess a valid credit or debit card issued by a bank acceptable to us. zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) retains the right to refuse any request made by you. If your order is accepted we will inform you by email and we will confirm the identity of the party which you have contracted with. This will usually be zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) or may in some cases be a third party. Where a contract is made with a third party zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) is not acting as either agent or principal and the contract is made between yourself and that third party and will be subject to the terms of sale which they supply you. When placing an order you undertake that all details you provide to us are true and accurate, that you are an authorized user of the credit or debit card used to place your order and that there are sufficient funds to cover the cost of the goods. The cost of foreign products and services may fluctuate. All prices advertised are subject to such changes.</p><p><br>(a) Our Contract </p><p>When you place an order, you will receive an acknowledgement e-mail confirming receipt of your order: this email will only be an acknowledgement and will not constitute acceptance of your order. A contract between us will not be formed until we send you confirmation by e-mail that the goods which you ordered have been dispatched to you. Only those goods listed in the confirmation e-mail sent at the time of dispatch will be included in the contract formed.</p><p><br>(b) Pricing and Availability</p><p>Whilst we try and ensure that all details, descriptions and prices which appear on this Website are accurate, errors may occur. If we discover an error in the price of any goods which you have ordered we will inform you of this as soon as possible and give you the option of reconfirming your order at the correct price or cancelling it. If we are unable to contact you we will treat the order as cancelled. If you cancel and you have already paid for the goods, you will receive a full refund.</p><p>Delivery costs will be charged in addition; such additional charges are clearly displayed where applicable and included in the ''Total Cost''.</p><p><br>(c) Payment </p><p>Upon receiving your order we carry out a standard authorization check on your payment card to ensure there are sufficient funds to fulfil the transaction. Your card will be debited upon authorisation being received. The monies received upon the debiting of your card shall be treated as a deposit against the value of the goods you wish to purchase. Once the goods have been despatched and you have been sent a confirmation email the monies paid as a deposit shall be used as consideration for the value of goods you have purchased as listed in the confirmation email.</p><p><br>Disclaimer of Liability</p><p>The material displayed on this Website is provided without any guarantees, conditions or warranties as to its accuracy. Unless expressly stated to the contrary to the fullest extent permitted by law zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) and its suppliers, content providers and advertisers hereby expressly exclude all conditions, warranties and other terms which might otherwise be implied by statute, common law or the law of equity and shall not be liable for any damages whatsoever, including but without limitation to any direct, indirect, special, consequential, punitive or incidental damages, or damages for loss of use, profits, data or other intangibles, damage to goodwill or reputation, or the cost of procurement of substitute goods and services, arising out of or related to the use, inability to use, performance or failures of this Website or the Linked Sites and any materials posted thereon, irrespective of whether such damages were foreseeable or arise in contract, tort, equity, restitution, by statute, at common law or otherwise. This does not affect zippyloft(<a class="external_link" href="http://www.zippyloft.com)''s" target="_blank">www.zippyloft.com)''s</a> liability for death or personal injury arising from its negligence, fraudulent misrepresentation, misrepresentation as to a fundamental matter or any other liability which cannot be excluded or limited under applicable law.</p><p><br>Linking to this Website</p><p>You may link to our home page, provided you do so in a way that is fair and legal and does not damage our reputation or take advantage of it, but you must not establish a link in such a way as to suggest any form of association, approval or endorsement on our part where none exists. You must not establish a link from any website that is not owned by you. This Website must not be framed on any other site, nor may you create a link to any part of this Website other than the home page. We reserve the right to withdraw linking permission without notice.</p><p><br>Disclaimer as to ownership of trade marks, images of personalities and third party copyright</p><p>Except where expressly stated to the contrary all persons (including their names and images), third party trade marks and content, services and/or locations featured on this Website are in no way associated, linked or affiliated with zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>) and you should not rely on the existence of such a connection or affiliation. Any trade marks/names featured on this Website are owned by the respective trade mark owners. Where a trade mark or brand name is referred to it is used solely to describe or identify the products and services and is in no way an assertion that such products or services are endorsed by or connected to zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>).</p><p><br>Indemnity</p><p>You agree to indemnify, defend and hold harmless zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>), its directors, officers, employees, consultants, agents, and affiliates, from any and all third party claims, liability, damages and/or costs (including, but not limited to, legal fees) arising from your use this Website or your breach of the Terms of Service.</p><p><br>Variation</p><p>zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>)&nbsp; shall have the right in its absolute discretion at any time and without notice to amend, remove or vary the Services and/or any page of this Website.</p><p><br>Invalidity</p><p>If any part of the Terms of Service is unenforceable (including any provision in which we exclude our liability to you) the enforceability of any other part of the Terms of Service will not be affected all other clauses remaining in full force and effect. So far as possible where any clause/sub-clause or part of a clause/sub-clause can be severed to render the remaining part valid, the clause shall be interpreted accordingly. Alternatively, you agree that the clause shall be rectified and interpreted in such a way that closely resembles the original meaning of the clause /sub-clause as is permitted by law.</p><p><br>Complaints</p><p>We operate a complaints handling procedure which we will use to try to resolve disputes when they first arise, please let us know if you have any complaints or comments.</p><p><br>Waiver</p><p>If you breach these conditions and we take no action, we will still be entitled to use our rights and remedies in any other situation where you breach these conditions.</p><p><br>Entire Agreement<br>The above Terms of Service constitute the entire agreement of the parties and supersede any and all preceding and contemporaneous agreements between you and zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>). Any waiver of any provision of the Terms of Service will be effective only if in writing and signed by a Director of zippyloft(<a class="external_link" href="http://www.zippyloft.com" target="_blank">www.zippyloft.com</a>).</p>\n'),
(10, 'PrivacyPolicy', 'Privacy Policy', '<p><p><br><strong>Privacy & Security</strong><br><br>Last Updated on August 09, 2014  <br>  <br>Information Collection and Use </p><p>zippyloft.com is the sole owner of the information collected on this site. We will not sell, share, or rent this information to others in ways different from what is disclosed in this statement. zippyloft.com collects information from our users at several different points on our website.<br> <br>Registration </p><p>In order to buy from this website, a user must first complete the registration form. During registration a user is required to give their contact information (such as name and email address). This information is used to contact the user about the services on our site for which they have expressed interest. It is mandatory for the user to provide demographic information (such as income level and gender so we can provide a more personalized experience on our site. This information is meant for the discretion of zippyloft.com ONLY!<br> <br>Order </p><p>We request information from the user on our order form. Here a user must provide contact information (like name and shipping address) and financial information (like credit card number, expiration date). This information is used for billing purposes and to fill customerÌs orders. If we have trouble processing an order, this contact information is used to get in touch with the user.<br> <br>Cookies </p><p>A cookie is a piece of data stored on the user’s hard drive tied to information about the user. Usage of a cookie is in no way linked to any personally identifiable information while on our site. Once the user closes their browser, the cookie simply terminates. For instance, by setting a cookie on our site, the user would not have to log in a password more than once, thereby saving time while on our site. If a user rejects the cookie, they may still use our site. The only drawback to this is that the user will be limited in some areas of our site. For example, the user will not be able to participate in any of our Sweepstakes, Contests or monthly Drawings that take place. Cookies can also enable us to track and target the interests of our users to enhance the experience on our site.<br> <br>Log Files  </p><p>We use IP addresses to analyze trends, administer the site, track userÌs movement, and gather broad demographic information for aggregate use.IP addresses are not linked to personally identifiable information.<br> <br>Sharing </p><p>We will share aggregated demographic information with our partners and advertisers. This shared aggregated demographic not linked to any personal information that can identify any individual person by our partners or advertisers.</p><p>We use an outside shipping company to ship orders, and a credit card processing company to bill users for goods and services. These companies do not retain, share, store or use personally identifiable information for any secondary purposes. <br> We partner with another party to provide specific services. When the user signs up for these services, we will share names, or other contact information that is necessary for the third party to provide these services. These parties are not allowed to use personally identifiable information except for the purpose of providing these services.</p><p>Though we make every effort to preserve user privacy, we may need to disclose personal information when required by law wherein we have a good-faith belief that such action is necessary to comply with an appropriate law enforcement investigation, current judicial proceeding, a court order or legal process served on our Web site, or as required by law.<br> <br>Links </p><p>This web site contains links to other sites. Please be aware that we zippyloft.com are not responsible for the privacy practices of such other sites. We encourage our users to be aware when they leave our site and to read the privacy statements of each and every web site that collects personally identifiable information. This privacy statement applies solely to information collected by this Web site.<br> <br>Newsletter </p><p>If a user wishes to subscribe to our newsletter, we ask for contact information such as name and email address. We provide the option to opt-out, see our Choice/Opt-Out section below.<br> <br>Surveys & Contests  </p><p>From time-to-time our site requests information from users via surveys or contests. Participation in these surveys or contests is completely voluntary and the user therefore has a choice whether or not to disclose this information.Information requested may include contact information (such as name and shipping address), and demographic information (such as zip code, age level). Contact information will be used to notify the winners and award prizes. Survey information will be used for purposes of monitoring or improving the use and satisfaction of this site.<br> <br>Tell-a-Friend </p><p>This website takes every precaution to protect our usersÌ information. When users submit sensitive information via the website, your information is protected both online and off-line.<br> <br>Security </p><p>When our registration/order form asks users to enter sensitive information (such as credit card number and/or social security number), that information is encrypted and is protected with the best encryption software in the industry with 128-bit SSL. While on a secure page, such as our order form, the lock icon on the bottom of Web browsers such as Netscape Navigator and Microsoft Internet Explorer becomes locked, as opposed to un-locked, or open, when you are just ÎsurfingÌ. To learn more about SSL, follow this link  <a href="http://www.verisign.com">http://www.verisign.com</a>.</p><p>While we use SSL encryption to protect sensitive information online, we also do everything in our power to protect user-information off-line. All of our usersÌ information, not just the sensitive information mentioned above, is restricted in our offices. Only employees who need the information to perform a specific job (for example, our billing clerk or a customer service representative) are granted access to personally identifiable information. Our employees must use password-protected screen-savers when they leave their desk. When they return, they must re-enter their password to re-gain access to your information. Furthermore, ALL employees are kept up-to-date on our security and privacy practices. Every quarter, as well as any time new policies are added, our employees are notified and/or reminded about the importance we place on privacy, and what they can do to ensure our customersÌ information is protected. Finally, the servers that we store personally identifiable information on are kept in a secure environment, behind a locked cage.</p><p>If you have any questions about the security at our website, you can send an email to <a href="mailto:prevention@zippyloft.com">prevention@zippyloft.com</a>.<br> <br>Special Offers  </p><p>We send all new members a welcoming email to verify password and username. Established members will occasionally receive information on products, services, special deals, and a newsletter. Out of respect for the privacy of our users we present the option to not receive these types of communications. Please see our choice and opt-out below.<br> <br>Site and Service Updates  </p><p>We also send the user site and service announcement updates. Members are not able to un-subscribe from service announcements, which contain important information about the service. We communicate with the user to provide requested services and in regards to issues relating to their account via email or phone.<br> <br>Correction/Updating Personal Information </p><p>If a user''s personally identifiable information changes (such as your zip code), or if a user no longer desires our service, we will endeavor to provide a way to correct, update or remove that user''s personal data provided to us. This can usually be done at the member information page or by emailing our Customer Support.<br> <br>Choice/Opt-out </p><p>Our users are given the opportunity to ''opt-out'' of having their information used for purposes not directly related to our site at the point where we ask for the information. For example, our order form has an ''opt-out'' mechanism so users who buy a product from us, but don''t want any marketing material, can keep their email address off of our lists.</p><p>Users who no longer wish to receive our newsletter or promotional materials from our partners may opt-out of receiving these communications by replying to unsubscribe in the subject line in the email or email us at  <a href="mailto:privacy@zippyloft.com">privacy@zippyloft.com</a></p><p>Users of our site are always notified when their information is being collected by any outside parties. We do this so our users can make an informed choice as to whether they should proceed with services that require an outside party, or not.<br> <br>Notification of Changes  </p><p>If we decide to change our privacy policy, we will post those changes on our Homepage so our users are always aware of what information we collect, how we use it, and under circumstances, if any, we disclose it. If at any point we decide to use personally identifiable information in a manner different from that stated at the time it was collected, we will notify users by way of an email. Users will have a choice as to whether or not we use their information in this different manner. We will use information in accordance with the privacy policy under which the information was collected.<br> <br>Contact zippyloft  </p><p>If you have any further questions regarding our privacy policy or comments about our website, please feel free to email us  <a href="mailto:privacy@zippyloft.com">privacy@zippyloft.com</a>. We are always glad to hear fro our customers and always appreciate your feedback.<br>If you would like to write to us, please use the following address: zippyloft.com<br> ATTENTION: PRIVACY & SECURITY<br> 25 Pond View Drive<br> Plainsboro, NJ 08873  </p><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subcategories` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`) VALUES
(9, 2, 'Tunics'),
(10, 2, 'Top'),
(11, 3, 'Mini'),
(12, 3, 'Knee Length'),
(13, 3, 'Midi'),
(14, 3, 'Maxi'),
(15, 4, 'Unisex'),
(16, 4, 'Women'),
(17, 4, 'Men'),
(20, 3, 'A Line / Full'),
(21, 3, 'Pencil'),
(22, 3, 'Denim'),
(23, 3, 'Designer Boutique'),
(24, 2, 'Jackets'),
(25, 5, 'Skirts'),
(26, 5, 'Tops'),
(27, 5, 'Cardignans'),
(28, 7, 'Bags');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(30) NOT NULL,
  `twitter_id` varchar(30) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `twitter_id`, `first_name`, `last_name`, `email`, `password`, `is_active`, `created`) VALUES
(1, '', '', 'abhishek', 'sharma', 'abhishek@gmail.com', '123', '1', '2014-05-22 21:37:34'),
(3, '', '', 'abhishek', 'sharma', 'a@gmail.com', 'a', '1', '2014-05-22 17:59:11'),
(4, '', '', 'asda', 'asda', 'agency@gmail.com', 'a', '1', '2014-05-22 17:57:57'),
(5, '', '', 'Ameya', 'Paranjape', 'ameyaparanjape@gmail.com', 'Hps@12122013', '1', '2014-06-23 01:27:30'),
(6, '', '', 'Champ_Ameya', 'ameya12345', 'shdgfjd@gmail.com', 'ameya12345', '1', '2014-08-27 19:20:22'),
(7, '', '', 'asd', 'asd', 'aaaa@gmail.com', '12345', '1', '2014-11-29 11:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`) VALUES
(1, 'test vendor', 'varsha@sagipl.com'),
(2, 'John Nikolaisen', 'varsha@sagipl.com'),
(3, 'Pragat', 'varsha@sagipl.com'),
(4, 'canvas classic company', 'ccc@ccc.com');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(30, 1, 23),
(32, 1, 10),
(33, 1, 22),
(34, 1, 21),
(35, 1, 20),
(36, 1, 18),
(37, 1, 16),
(38, 5, 24);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product_images` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `fk_subcategories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
