-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 09:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` varchar(255) NOT NULL,
  `brand_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_img`) VALUES
(1, 'Adidas', 'Adidas is a multinational corporation, founded and headquartered in Herzogenaurach, Germany, which designs and manufactures footwear, apparel, and accessories. The Adidas group is made up of Reebok, TaylorMade, and Runtastic. The company also owns a share', ''),
(2, 'Nike', 'NIKE, named for the Greek goddess of victory, is a shoe and apparel company. It designs, develops, and sells a variety of products to help in playing basketball and soccer (football), as well as in running, men\'s and women\'s training, and other action spo', ''),
(3, 'Puma', 'The Puma (Puma concolor) is a large, graceful cat belonging to the felidae family. Pumas are also called Cougars, Panthers and Mountain Lions. Pumas are solitary cats and have the largest ranges of all wild terrestrial mammals in the Western Hemisphere.', '');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `offer_price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_on` bigint(20) NOT NULL,
  `updated_on` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_name`, `user_id`, `offer_price`, `status`, `added_on`, `updated_on`) VALUES
(3, 'Bumper Offer', '1', '3000', 'active', 1622400315, 0),
(4, 'Buy 1 Get 1 Free', '1', '3000', 'active', 1622400403, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offer_details`
--

CREATE TABLE `offer_details` (
  `offer_details_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_details`
--

INSERT INTO `offer_details` (`offer_details_id`, `offer_id`, `product_id`) VALUES
(5, 3, 1),
(6, 3, 2),
(7, 4, 1),
(8, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `payment_id`, `offer_id`, `user_id`, `product_id`, `price`, `brand_id`, `qty`) VALUES
(1, 0, 0, 5, 2, '3000.00', 2, 1),
(2, 0, 0, 5, 2, '3000.00', 2, 1),
(3, 0, 0, 5, 2, '3000.00', 2, 1),
(4, 0, 0, 5, 2, '3000.00', 2, 1),
(5, 7, 3, 7, 0, '0.00', 0, 1),
(6, 8, 3, 7, 0, '3000.00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `payment_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `amount`, `status`, `payment_mode`, `payment_time`) VALUES
(1, 5, 3000, 0, 0, 1622388679),
(2, 5, 3000, 0, 0, 1622389436),
(3, 5, 3000, 0, 0, 1622389711),
(4, 5, 3000, 0, 0, 1622389903),
(7, 7, 3000, 0, 0, 1622438278),
(8, 7, 3000, 0, 0, 1622438380);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `added_on` bigint(20) NOT NULL,
  `updated_on` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_price`, `added_on`, `updated_on`, `user_id`, `brand_id`, `product_qty`) VALUES
(1, 'Adidas Shoe', '', '4000', 0, 0, 0, 1, '20'),
(2, 'Nike Shoe', '', '3000', 0, 0, 0, 2, '20'),
(3, 'Puma Shoe', '', '2800', 0, 0, 0, 3, '10');

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `product_img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_photo` varchar(255) NOT NULL,
  `uploaded_on` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `regdate` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `phone`, `is_admin`, `regdate`) VALUES
(1, 'Debanjan Roy', 'debanjan@sunyam.com', 'demo123', '6290039991', 0, 0),
(2, 'Arnab Roy', 'royarnab@gmail.com', 'demo123456', '9051907030', 0, 0),
(4, 'Prantik Roy', 'royprantik@gmail.com', 'demo123456', '6290039991', 0, 1622377342),
(5, 'Arup Chakravorty', 'chakravortyarup587@gmail.com', 'demo1234567890', '9836133646', 0, 1622377583),
(6, 'Atreyee Roy', 'royatreyee@gmail.com', 'demo', '6290039991', 0, 1622377635),
(7, 'xyz', 'roydebanjan46@gmail.com', 'demo123', '6290039991', 0, 1622377791);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `wallet_amount`) VALUES
(1, 1, '123.00'),
(2, 5, '1.00'),
(3, 7, '1000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD PRIMARY KEY (`offer_details_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`product_img_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offer_details`
--
ALTER TABLE `offer_details`
  MODIFY `offer_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `product_img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
