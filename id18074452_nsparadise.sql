-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2023 at 04:37 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18074452_nsparadise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`) VALUES
('abdullahzufar818@gmail.com', 'Abdullah', 'Abdullah', '61b1e83ae6b47');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `code` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`code`, `admin_email`) VALUES
('Resources//AdminProfile//61926b2dd97adWhatsApp Image 2021-11-02 at 20.06.20.jpeg', 'abdullahzufar818@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bracelet`
--

CREATE TABLE `bracelet` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bracelet`
--

INSERT INTO `bracelet` (`id`, `name`) VALUES
(1, 'Leather'),
(2, 'Steel'),
(3, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Rolex'),
(2, 'Hublot'),
(3, 'Tissot');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `customer_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `datetime_added`, `qty`, `customer_email`, `product_id`) VALUES
(37, '2023-01-11 21:16:23', 1, 'abdullahzufar04@gmail.com', 23);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `postalcode` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `postalcode`, `district_id`) VALUES
(1, 'Colombo 12', '01200', 1),
(5, 'Harispaththuwa', '08267', 7);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'Black'),
(2, 'Gold'),
(3, 'Silver'),
(4, 'Brown'),
(5, 'Green'),
(6, 'White'),
(7, 'Gray'),
(8, 'Maroon'),
(9, 'Red'),
(10, 'Purple'),
(11, 'Yellow'),
(12, 'Blue'),
(13, 'Pacific Blue'),
(14, 'Pink');

-- --------------------------------------------------------

--
-- Table structure for table `crown`
--

CREATE TABLE `crown` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `crown`
--

INSERT INTO `crown` (`id`, `name`) VALUES
(1, 'Screw-Down'),
(2, 'Waterproof'),
(3, 'Dustproof'),
(4, 'Dress');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `registration_date` datetime DEFAULT NULL,
  `v_code` varchar(20) DEFAULT NULL,
  `v_status_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `fname`, `lname`, `password`, `dob`, `gender_id`, `registration_date`, `v_code`, `v_status_id`, `status_id`) VALUES
('abdullahzufar.new@gmail.com', 'Mohamed Zufar', 'Abdullah', 'Abdullah2004', '2004-04-12', 1, '2023-01-11 21:57:51', '63bee38799c9e', 1, 1),
('abdullahzufar04@gmail.com', 'Abdullah', 'Zufar', 'Abdullah123', '2004-04-12', 1, '2021-09-24 16:04:31', '6262d1359bd3c', 1, 1),
('billpillator@gmail.com', 'Bilal', 'Mohamed', 'civxen-4ryrfo-bogPab', '1977-03-20', 1, '2022-03-20 20:45:43', '6237451fb5088', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_has_address`
--

CREATE TABLE `customer_has_address` (
  `id` int(11) NOT NULL,
  `line1` text DEFAULT NULL,
  `line2` text DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_has_address`
--

INSERT INTO `customer_has_address` (`id`, `line1`, `line2`, `city_id`, `customer_email`) VALUES
(2, '111/2', 'Abdul Hameed Street', 1, 'abdullahzufar04@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `date_display`
--

CREATE TABLE `date_display` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `date_display`
--

INSERT INTO `date_display` (`id`, `name`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `id` int(11) NOT NULL,
  `address` text COLLATE utf8_bin DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`id`, `address`, `city_id`, `invoice_id`) VALUES
(7, '111/2 Abdul Hameed Street', 1, 1),
(8, '111/2 Abdul Hameed Street', 1, 2),
(9, '111/2 Abdul Hameed Street', 1, 3),
(10, '111/2 Abdul Hameed Street', 5, 4),
(11, '87/1,1/1 Abdul Hameed Street', 1, 5),
(12, '87/1,1/1 Abdul Hameed Street', 1, 7),
(13, '87/1,1/1 Abdul Hameed Street', 1, 9),
(14, '87/1,1/1 Abdul Hameed Street', 1, 10),
(15, '871/1,1/1 Abdul Hameed Street', 1, 11),
(16, '111/2 Abdul Hameed Street', 1, 12),
(17, '111/2 Abdul Hameed Street', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
(1, 'Colombo', 1),
(2, 'Kalutara', 1),
(3, 'Gampaha', 1),
(4, 'Batticaloa', 2),
(5, 'Ampara', 2),
(6, 'Trincomalee', 2),
(7, 'Kandy', 3),
(8, 'Matale', 3),
(9, 'Nuwara-Eliya', 3),
(10, 'Badulla', 4),
(11, 'Moneragala', 4),
(12, 'Jaffna', 5),
(13, 'Kilinochchi', 5),
(14, 'Mulaitivu', 5),
(15, 'Vavuniya', 5),
(16, 'Mannar', 5),
(17, 'Galle', 6),
(18, 'Matara', 6),
(19, 'Hambantota', 6),
(20, 'Kurunegala', 7),
(21, 'Puttalam', 7),
(22, 'Anuradhapura', 8),
(23, 'Polonnaruwa', 8),
(24, 'Kegalle', 9),
(25, 'Ratnapura', 9);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `content` text DEFAULT NULL,
  `customer_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `datetime`, `content`, `customer_email`, `product_id`) VALUES
(2, '2021-11-04 18:13:20', 'Good Service', 'abdullahzufar04@gmail.com', 7),
(3, '2021-11-04 18:14:59', 'Good Service', 'abdullahzufar04@gmail.com', 8),
(4, '2021-11-04 18:15:36', 'Good Product', 'abdullahzufar04@gmail.com', 9),
(5, '2021-11-04 18:16:19', 'Good Product', 'abdullahzufar04@gmail.com', 10),
(6, '2021-11-04 18:16:47', 'Good Condition', 'abdullahzufar04@gmail.com', 11),
(7, '2021-11-04 18:17:28', 'Good Service', 'abdullahzufar04@gmail.com', 12),
(8, '2021-11-04 18:36:48', 'Good Product', 'abdullahzufar04@gmail.com', 13),
(9, '2021-11-04 18:38:18', 'Good Condition', 'abdullahzufar04@gmail.com', 14),
(10, '2021-11-15 19:31:19', 'Good Condition', 'abdullahzufar04@gmail.com', 12),
(11, '2021-11-15 20:07:47', 'Good Service', 'abdullahzufar04@gmail.com', 23),
(12, '2021-11-16 00:45:57', 'Good Condition', 'abdullahzufar04@gmail.com', 16);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `customer_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `order_id`, `datetime`, `qty`, `total`, `customer_email`, `product_id`) VALUES
(1, '61827dd652ed1', '2021-11-03 17:47:52', 1, 135000, 'abdullahzufar04@gmail.com', 13),
(2, '6182b0a34fdb3', '2021-11-03 21:24:38', 2, 20000, 'abdullahzufar04@gmail.com', 15),
(3, '61838d204debe', '2021-11-04 13:05:46', 2, 180000, 'abdullahzufar04@gmail.com', 10),
(4, '6186f8b47668d', '2021-11-07 03:21:16', 2, 180000, 'abdullahzufar04@gmail.com', 10),
(5, '618da2967c1c7', '2021-11-12 04:39:36', 2, 180000, 'abdullahzufar04@gmail.com', 10),
(6, '618da2967c1c7', '2021-11-12 04:39:36', 1, 123000, 'abdullahzufar04@gmail.com', 12),
(7, '618da3c9a3304', '2021-11-12 04:44:43', 2, 200000, 'abdullahzufar04@gmail.com', 7),
(8, '618da3c9a3304', '2021-11-12 04:44:43', 1, 100000, 'abdullahzufar04@gmail.com', 8),
(9, '61924f35e3460', '2021-11-15 17:45:38', 2, 246000, 'abdullahzufar04@gmail.com', 12),
(10, '6192686c5dc20', '2021-11-15 19:32:53', 2, 200000, 'abdullahzufar04@gmail.com', 17),
(11, '619270807f0ec', '2021-11-15 20:07:27', 1, 100000, 'abdullahzufar04@gmail.com', 23),
(12, '6192782673019', '2021-11-15 20:40:14', 1, 120000, 'abdullahzufar04@gmail.com', 22),
(13, '6192782673019', '2021-11-15 20:40:14', 1, 100000, 'abdullahzufar04@gmail.com', 18),
(14, '6192b193e133b', '2021-11-16 00:44:57', 2, 140000, 'abdullahzufar04@gmail.com', 16);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `msg` text DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `customer_email`, `admin_email`, `msg`, `datetime`) VALUES
(5, 'abdullahzufar04@gmail.com', 'abdullahzufar818@gmail.com', 'Hello Abdullah,', '2021-11-08 04:28:56'),
(6, 'abdullahzufar04@gmail.com', 'abdullahzufar818@gmail.com', 'Have You got The Product', '2021-11-08 05:04:22'),
(7, 'abdullahzufar04@gmail.com', 'abdullahzufar818@gmail.com', 'Hello', '2021-11-09 01:44:57'),
(8, 'abdullahzufar04@gmail.com', 'abdullahzufar818@gmail.com', 'aaa', '2021-11-11 01:36:14'),
(9, 'abdullahzufar04@gmail.com', 'abdullahzufar818@gmail.com', 'Hello', '2021-11-15 19:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `crown_id` int(11) NOT NULL,
  `shape_id` int(11) NOT NULL,
  `case_color` int(11) NOT NULL,
  `dial_color` int(11) NOT NULL,
  `bracelet_id` int(11) NOT NULL,
  `bracelet_color` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `date_display_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `admin_email` varchar(100) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand_id`, `title`, `price`, `qty`, `crown_id`, `shape_id`, `case_color`, `dial_color`, `bracelet_id`, `bracelet_color`, `gender_id`, `date_display_id`, `description`, `img`, `admin_email`, `datetime_added`, `status_id`) VALUES
(7, 2, 'Novelties', 100000, 15, 2, 1, 2, 2, 2, 2, 1, 1, 'Automatic', 'Resources//Products//617b433b25262Img3.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:11:31', 1),
(8, 1, 'Submariner', 100000, 19, 3, 1, 3, 6, 2, 3, 1, 1, 'Automatic', 'Resources//Products//617b437abcbf1Img4.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:12:34', 1),
(9, 2, 'MP', 120000, 45, 1, 1, 1, 6, 1, 4, 1, 1, 'Automatic', 'Resources//Products//617b43bb34c42Img5.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:13:39', 1),
(10, 1, 'Air King', 90000, 34, 4, 1, 1, 6, 2, 2, 1, 1, 'Automatic', 'Resources//Products//617b4411b40daImg6.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:15:05', 1),
(11, 2, 'Classic Fusion', 78900, 15, 1, 1, 1, 1, 1, 4, 1, 1, 'Automatic', 'Resources//Products//617b44532e1d0Img7.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:16:11', 1),
(12, 1, 'Explorer', 123000, 34, 2, 1, 1, 1, 2, 3, 1, 1, 'Automatic', 'Resources//Products//617b449ed393eImg8.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:17:26', 1),
(13, 2, 'Novelties', 135000, 67, 2, 1, 3, 12, 1, 4, 1, 1, 'Automatic', 'Resources//Products//617b44f69dd6dImg9.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:18:54', 1),
(14, 1, 'Submariner', 145000, 12, 2, 1, 2, 1, 2, 2, 1, 1, 'Automatic', 'Resources//Products//617b455d030b6Img10.jpeg', 'abdullahzufar818@gmail.com', '2021-10-29 06:20:37', 1),
(15, 2, 'Classic Fusion', 10000, 30, 2, 1, 4, 2, 2, 2, 1, 1, 'Automatic', 'Resources//Products//617c3e6d4432cImg3.jpeg', 'abdullahzufar818@gmail.com', '2021-10-30 00:03:17', 1),
(16, 1, 'Air King', 70000, 34, 1, 1, 4, 3, 1, 1, 1, 1, 'Automatic', 'Resources//Products//618250849218aImg9.jpeg', 'abdullahzufar818@gmail.com', '2021-11-03 14:34:04', 1),
(17, 1, 'Submariner', 100000, 100, 1, 1, 3, 1, 2, 3, 1, 1, 'Automatic', 'Resources//Products//61917909f32a5Img4.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 02:30:57', 1),
(18, 1, 'Explorer', 100000, 100, 2, 1, 3, 1, 2, 3, 1, 1, 'Automatic', 'Resources//Products//61917b980aa8cImg4.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 02:41:52', 1),
(19, 1, 'Explorer', 10000, 200, 3, 1, 3, 1, 1, 2, 1, 1, 'Automatic', 'Resources//Products//61917c0a14c2aImg10.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 02:43:46', 1),
(20, 2, 'Big Bang', 100000, 200, 1, 1, 1, 1, 1, 4, 1, 1, 'Automatic', 'Resources//Products//61917cbe69406Img7.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 02:46:46', 1),
(21, 2, 'Classic Fusion', 100000, 200, 2, 1, 3, 7, 1, 4, 1, 1, 'Automatic', 'Resources//Products//61917ee9db5fcImg5.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 02:56:01', 1),
(22, 2, 'MP', 120000, 100, 1, 1, 2, 1, 1, 4, 1, 1, 'Automatic', 'Resources//Products//6191856ec71ceImg9.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 03:23:50', 1),
(23, 1, 'Sea-Dweller', 100000, 200, 1, 1, 3, 7, 1, 4, 1, 1, 'Automtic', 'Resources//Products//61918bfd5735dImg9.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 03:51:49', 1),
(29, 2, 'Classic Fusion', 120000, 100, 1, 1, 7, 7, 1, 4, 1, 1, 'Automatic', 'Resources//Products//619253fed6307Img7.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 18:05:10', 1),
(31, 2, 'Submariner', 120000, 100, 1, 1, 7, 7, 1, 4, 1, 1, 'Automatic', 'Resources//Products//61926b06ae5e1Img7.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 19:43:26', 1),
(32, 2, 'Submariner', 100000, 100, 1, 1, 7, 12, 1, 4, 1, 1, 'Automatic', 'Resources//Products//619271863fcacImg9.jpeg', 'abdullahzufar818@gmail.com', '2021-11-15 20:11:10', 1),
(33, 1, 'Submariner', 130000, 100, 1, 1, 7, 7, 1, 4, 1, 1, 'Automatic', 'Resources//Products//6192b32d3ccd5Img7.jpeg', 'abdullahzufar818@gmail.com', '2021-11-16 00:51:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--

CREATE TABLE `profile_image` (
  `path` varchar(200) NOT NULL,
  `customer_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'Western'),
(2, 'Eastern'),
(3, 'Central'),
(4, 'Uva'),
(5, 'Northern'),
(6, 'Southern'),
(7, 'North Western'),
(8, 'North Central'),
(9, 'Sabaragamuwan');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `id` int(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`id`, `customer_email`, `product_id`) VALUES
(1, 'abdullahzufar04@gmail.com', 9),
(2, 'abdullahzufar04@gmail.com', 13),
(3, 'abdullahzufar04@gmail.com', 7),
(4, 'abdullahzufar04@gmail.com', 15),
(5, 'abdullahzufar04@gmail.com', 11),
(6, 'abdullahzufar04@gmail.com', 16),
(7, 'abdullahzufar04@gmail.com', 12),
(8, 'abdullahzufar04@gmail.com', 8),
(9, 'abdullahzufar04@gmail.com', 10),
(10, 'abdullahzufar04@gmail.com', 23),
(11, 'abdullahzufar04@gmail.com', 18),
(12, 'abdullahzufar04@gmail.com', 33),
(13, 'abdullahzufar04@gmail.com', 19);

-- --------------------------------------------------------

--
-- Table structure for table `shape`
--

CREATE TABLE `shape` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `shape`
--

INSERT INTO `shape` (`id`, `name`) VALUES
(1, 'Round'),
(2, 'Box'),
(3, 'Rectangle');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Deactive');

-- --------------------------------------------------------

--
-- Table structure for table `v_status`
--

CREATE TABLE `v_status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `v_status`
--

INSERT INTO `v_status` (`id`, `status`) VALUES
(1, 'Verified'),
(2, 'Not Verified');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `customer_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_admin_profile_admin1_idx` (`admin_email`);

--
-- Indexes for table `bracelet`
--
ALTER TABLE `bracelet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_customer1_idx` (`customer_email`),
  ADD KEY `fk_cart_product1_idx` (`product_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_city_district1_idx` (`district_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crown`
--
ALTER TABLE `crown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_user_gender_idx` (`gender_id`),
  ADD KEY `fk_user_v_status1_idx` (`v_status_id`),
  ADD KEY `fk_customer_status1_idx` (`status_id`);

--
-- Indexes for table `customer_has_address`
--
ALTER TABLE `customer_has_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_has_address_city1_idx` (`city_id`),
  ADD KEY `fk_customer_has_address_customer1_idx` (`customer_email`);

--
-- Indexes for table `date_display`
--
ALTER TABLE `date_display`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_delivery_details_city1_idx` (`city_id`),
  ADD KEY `fk_delivery_details_invoice1_idx` (`invoice_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_district_province1_idx` (`province_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feedback_customer1_idx` (`customer_email`),
  ADD KEY `fk_feedback_product1_idx` (`product_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_customer1_idx` (`customer_email`),
  ADD KEY `fk_invoice_product1_idx` (`product_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__customer` (`customer_email`),
  ADD KEY `FK__admin` (`admin_email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_brand1_idx` (`brand_id`),
  ADD KEY `fk_product_color1_idx` (`case_color`),
  ADD KEY `fk_product_crown1_idx` (`crown_id`),
  ADD KEY `fk_product_gender1_idx` (`gender_id`),
  ADD KEY `fk_product_shape1_idx` (`shape_id`),
  ADD KEY `fk_product_color2_idx` (`dial_color`),
  ADD KEY `fk_product_date_display1_idx` (`date_display_id`),
  ADD KEY `fk_product_bracelet1_idx` (`bracelet_id`),
  ADD KEY `fk_product_admin1_idx` (`admin_email`),
  ADD KEY `fk_product_color3_idx` (`bracelet_color`) USING BTREE,
  ADD KEY `fk_product_status1_idx` (`status_id`);

--
-- Indexes for table `profile_image`
--
ALTER TABLE `profile_image`
  ADD PRIMARY KEY (`path`),
  ADD KEY `fk_profile_image_customer1_idx` (`customer_email`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recent_customer1_idx` (`customer_email`),
  ADD KEY `fk_recent_product1_idx` (`product_id`);

--
-- Indexes for table `shape`
--
ALTER TABLE `shape`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_status`
--
ALTER TABLE `v_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_watchlist_customer1_idx` (`customer_email`),
  ADD KEY `fk_watchlist_product1_idx` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bracelet`
--
ALTER TABLE `bracelet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `crown`
--
ALTER TABLE `crown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_has_address`
--
ALTER TABLE `customer_has_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `date_display`
--
ALTER TABLE `date_display`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shape`
--
ALTER TABLE `shape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `v_status`
--
ALTER TABLE `v_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD CONSTRAINT `fk_admin_profile_admin1` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_customer1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `fk_user_v_status1` FOREIGN KEY (`v_status_id`) REFERENCES `v_status` (`id`);

--
-- Constraints for table `customer_has_address`
--
ALTER TABLE `customer_has_address`
  ADD CONSTRAINT `fk_customer_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `fk_customer_has_address_customer1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`);

--
-- Constraints for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD CONSTRAINT `fk_delivery_details_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `fk_delivery_details_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_customer1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_customer1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK__admin` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`),
  ADD CONSTRAINT `FK__customer` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_admin1` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`),
  ADD CONSTRAINT `fk_product_bracelet1` FOREIGN KEY (`bracelet_id`) REFERENCES `bracelet` (`id`),
  ADD CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `fk_product_color1` FOREIGN KEY (`case_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_product_color2` FOREIGN KEY (`dial_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_product_color3` FOREIGN KEY (`bracelet_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_product_crown1` FOREIGN KEY (`crown_id`) REFERENCES `crown` (`id`),
  ADD CONSTRAINT `fk_product_date_display1` FOREIGN KEY (`date_display_id`) REFERENCES `date_display` (`id`),
  ADD CONSTRAINT `fk_product_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `fk_product_shape1` FOREIGN KEY (`shape_id`) REFERENCES `shape` (`id`),
  ADD CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `profile_image`
--
ALTER TABLE `profile_image`
  ADD CONSTRAINT `fk_profile_image_customer1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`);

--
-- Constraints for table `recent`
--
ALTER TABLE `recent`
  ADD CONSTRAINT `fk_recent_customer1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `fk_watchlist_customer1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
