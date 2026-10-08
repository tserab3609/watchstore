-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2026 at 10:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_password` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(52, 40, '13', 'Millenium', 'Millenium1.jpeg', 7000.00, 1, 14, '2026-10-07 00:00:00'),
(53, 41, '14', 'Rado Golden Ceramic Black Watch', 'Rado Golden Ceramic Black Watch1.jpeg', 6000.00, 1, 16, '2026-10-07 00:00:00'),
(54, 42, '18', 'Boat Ultimate Connect', 'Boat Ultimate Connect1.jpeg', 8000.00, 1, 16, '2026-10-07 00:00:00'),
(55, 43, '14', 'Rado Golden Ceramic Black Watch', 'Rado Golden Ceramic Black Watch1.jpeg', 6000.00, 1, 16, '2026-10-07 00:00:00'),
(56, 44, '12', 'Fossil', 'Fossil1.jpeg', 55000.00, 1, 16, '2026-10-07 00:00:00'),
(57, 45, '14', 'Rado Golden Ceramic Black Watch', 'Rado Golden Ceramic Black Watch1.jpeg', 6000.00, 1, 17, '2026-10-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_special_offer` int(2) DEFAULT NULL,
  `product_color` varchar(108) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(12, 'Fossil', 'Quartz Watch', 'A watch which have a nice.', 'Fossil1.jpeg', 'Fossil2.jpeg', 'Fossil3.jpeg', 'Fossil4.jpeg', 55000.00, 5, 'black'),
(13, 'Millenium', 'Quartz Watch', 'Quartz watch ', 'Millenium1.jpeg', 'Millenium2.jpeg', 'Millenium3.jpeg', 'Millenium4.jpeg', 7000.00, 10, 'black'),
(14, 'Rado Golden Ceramic Black Watch', 'Quartz Watch', 'Quartz watch ', 'Rado Golden Ceramic Black Watch1.jpeg', 'Rado Golden Ceramic Black Watch2.jpeg', 'Rado Golden Ceramic Black Watch3.jpeg', 'Rado Golden Ceramic Black Watch4.jpeg', 6000.00, 10, 'Golden Ceramic Black Watch'),
(15, 'ROLEX Cellini Date Watch', 'Rolex', 'Black Dial - Black Leather Strap', 'ROLEX Cellini Date Watch1.jpeg', 'ROLEX Cellini Date Watch2.jpeg', 'ROLEX Cellini Date Watch3.jpeg', 'ROLEX Cellini Date Watch4.jpeg', 50000.00, 10, 'Black'),
(16, 'Rolex Cellini Dual Time Watch', 'Rolex', 'Black Dial - Brown Leather Strap', 'Rolex Cellini Dual Time Watch1.jpeg', 'Rolex Cellini Dual Time Watch2.jpeg', 'Rolex Cellini Dual Time Watch3.jpeg', 'Rolex Cellini Dual Time Watch4.jpeg', 60000.00, 10, 'Black Dial'),
(17, 'Apple Watch Series 8', 'Smart Watch', 'Smartwatch for IOS', 'Apple Watch Series 81.jpeg', 'Apple Watch Series 82.jpeg', 'Apple Watch Series 83.jpeg', 'Apple Watch Series 84.jpeg', 50000.00, 5, 'Black'),
(18, 'Boat Ultimate Connect', 'Smart Watch', 'Smartwatch for IOS and Android', 'Boat Ultimate Connect1.jpeg', 'Boat Ultimate Connect2.jpeg', 'Boat Ultimate Connect3.jpeg', 'Boat Ultimate Connect4.jpeg', 8000.00, 5, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(108) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
