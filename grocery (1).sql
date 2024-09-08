-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 04:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(5) NOT NULL,
  `l_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `l_id`, `pro_id`, `quantity`, `status`) VALUES
(26, 2, 5, 1, '0'),
(27, 2, 4, 1, '0'),
(32, 3, 6, 4, '0'),
(36, 3, 3, 1, '0'),
(38, 3, 1, 3, '0'),
(39, 3, 5, 1, '0'),
(40, 2, 1, 2, '0'),
(41, 2, 6, 2, '0'),
(44, 3, 2, 2, '0'),
(45, 3, 5, 3, '0'),
(46, 3, 4, 2, '0'),
(56, 3, 1, 1, '0'),
(57, 2, 3, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tbl`
--

CREATE TABLE `detail_tbl` (
  `detail_id` int(15) NOT NULL,
  `l_id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `dp` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_tbl`
--

INSERT INTO `detail_tbl` (`detail_id`, `l_id`, `name`, `dob`, `address`, `dp`) VALUES
(1, 1, 'Admin', '1992-11-08', 'Navrangpura', '1616330427.png'),
(2, 2, 'user', '2002-06-26', 'Nikol', 'a1.jpg'),
(3, 3, 'user1', '2002-06-26', 'Vastral', '16283756.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `feed_id` int(5) NOT NULL,
  `l_id` int(10) NOT NULL,
  `ratings` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_tbl`
--

INSERT INTO `feedback_tbl` (`feed_id`, `l_id`, `ratings`, `comment`) VALUES
(2, 2, 3, 'Amazing Products'),
(3, 3, 5, 'Amazing Grocery!!!');

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `l_id` int(15) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `role` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`l_id`, `email_id`, `password`, `phone_no`, `role`, `status`) VALUES
(1, 'admin@gmail.com', 'admin', 9999999999, 1, 1),
(2, 'user@gmail.com', 'user', 7777777777, 2, 1),
(3, 'user1@gmail.com', 'user1', 8888888888, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(10) NOT NULL,
  `l_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `l_id`, `cart_id`, `order_id`) VALUES
(2, 2, 26, 2),
(3, 2, 27, 2),
(4, 3, 32, 3),
(5, 3, 36, 3),
(6, 3, 38, 3),
(7, 3, 39, 3),
(8, 2, 40, 4),
(9, 2, 41, 4),
(10, 3, 44, 5),
(11, 3, 45, 5),
(12, 3, 46, 5),
(13, 3, 56, 6),
(14, 2, 57, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pro_cat_id` int(5) NOT NULL,
  `pro_cat_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pro_cat_id`, `pro_cat_name`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `pro_id` int(5) NOT NULL,
  `pro_cat_id` int(10) NOT NULL,
  `pro_name` varchar(20) NOT NULL,
  `pro_image` longtext NOT NULL,
  `pro_desc` varchar(50) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`pro_id`, `pro_cat_id`, `pro_name`, `pro_image`, `pro_desc`, `pro_price`, `pro_quantity`) VALUES
(1, 1, 'Grapes', 'grapes.jpeg', 'Grapes Sonaka Seedless 500 g', 50, 4),
(2, 1, 'Kiwi', 'kiwi.jpeg', 'Kiwi Green 3 Units', 150, 8),
(3, 2, 'Potato', 'potato.jpeg', 'Potato 1 kg', 20, 2),
(4, 2, 'Onion', 'onion.jpeg', 'Onion 1 kg', 39, 7),
(5, 3, 'Lays', 'lays.png', 'Lays 100 g', 10, 4),
(6, 3, 'Kurkure', 'kurkure.png', 'Kurkure 100 g', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `order_id` int(5) NOT NULL,
  `l_id` int(20) NOT NULL,
  `total_amount` double NOT NULL,
  `address` varchar(35) NOT NULL,
  `payment_status` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`order_id`, `l_id`, `total_amount`, `address`, `payment_status`, `timestamp`, `order_status`) VALUES
(2, 2, 49, 'Nikol, Ahmedabad', 1, '2022-02-06 11:32:49', 1),
(3, 3, 220, 'Vastral, Ahmedabad.', 2, '2022-02-06 11:32:53', 1),
(4, 2, 120, 'Nikol, Ahmedabad', 2, '2022-02-06 11:32:57', 1),
(5, 3, 408, 'Vastral, Ahmedabad.', 1, '2022-02-06 11:33:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `l_id` (`l_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `detail_tbl`
--
ALTER TABLE `detail_tbl`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `l_id` (`l_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pro_cat_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_cat_id` (`pro_cat_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `l_id` (`l_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `detail_tbl`
--
ALTER TABLE `detail_tbl`
  MODIFY `detail_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  MODIFY `feed_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `l_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pro_cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_tbl` (`l_id`),
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product_detail` (`pro_id`);

--
-- Constraints for table `detail_tbl`
--
ALTER TABLE `detail_tbl`
  ADD CONSTRAINT `detail_tbl_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_tbl` (`l_id`);

--
-- Constraints for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD CONSTRAINT `feedback_tbl_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_tbl` (`l_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_tbl` (`l_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart_tbl` (`cart_id`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `product_order` (`order_id`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`pro_cat_id`) REFERENCES `product_category` (`pro_cat_id`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_tbl` (`l_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
