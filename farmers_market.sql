-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:localhost:3344
-- Generation Time: Feb 07, 2021 at 01:16 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmers_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyer_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(320) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `house_building` varchar(20) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `mandal` varchar(100) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyer_id`, `username`, `name`, `email`, `contact`, `password`, `house_building`, `landmark`, `mandal`, `dist`, `state`, `pincode`) VALUES
(6, 'kingmohan45', 'Mohan Kumar R', 'mohanragam456@gmail.com', '7093957199', '4092f941045b5ce8339b79b69b25aad8', '2-6', 'Yadamvaripalli', 'Chinnagottigallu', 'Chittoor', 'Andhra Pradesh', '517193');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `no_of_items` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `is_placed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `seller_id`, `product_id`, `buyer_id`, `no_of_items`, `status`, `is_placed`) VALUES
(1, 2, 4, 6, '1', 'Will be delivered by tomorrow.', 1),
(2, 2, 5, 6, '1', 'Yet to respond', 1),
(3, 2, 5, 6, '1', 'Yet to respond', 1),
(4, 2, 7, 6, '1', 'Yet to respond', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(11) NOT NULL,
  `seller_id` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` mediumint(9) NOT NULL,
  `items_sold` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `no_of_ratings` tinyint(4) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `seller_id`, `name`, `description`, `category`, `price`, `items_sold`, `in_stock`, `image_name`, `rating`, `no_of_ratings`, `visible`) VALUES
(4, '2', 'Apple 1kg', 'Special apples with no defects.', 'fruit fresh', 30, 0, 10, 'apple.jpeg', 0, 0, 1),
(5, '2', 'Orange 1kg', 'Fresh orange ', 'Fruit Seasonal Organic Fresh', 40, 0, 100, 'orange.jpeg', 0, 0, 1),
(6, '2', 'Carrot 1kg', 'Fresh carrot right from soil.', 'Fruit Seasonal Black-soil', 30, 0, 200, 'carrot.jpeg', 0, 0, 1),
(7, '2', 'Ground nuts 1kg', 'Fresh nuts right from the ground.', 'Fruit Organic Andhra Natural', 50, 0, 100, 'ground_nuts.jpeg', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `house_building` varchar(20) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `mandal` varchar(100) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `username`, `name`, `email`, `contact`, `password`, `house_building`, `landmark`, `mandal`, `dist`, `state`, `pincode`) VALUES
(2, 'mohankumar', 'Mohan Kumar', 'mohanragam123@gmail.com', '6305381531', '4092f941045b5ce8339b79b69b25aad8', '2-6', 'Yadamvaripalli', 'Chinnagottigallu', 'Chittoor', 'Andhra Pradesh', '517193');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
