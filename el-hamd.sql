-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 10:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el-hamd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `phone_Number` varchar(20) DEFAULT NULL,
  `E_mail` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_ID`, `Name`, `Address`, `phone_Number`, `E_mail`, `pass`) VALUES
(4, 'hossam ragab', NULL, NULL, 'hragab366@gmail.com', '5025082100'),
(6, 'Amira kabeel', NULL, NULL, 'hossamragab211@yahoo.com', '5025082100'),
(10, 'hossam ragab', NULL, NULL, 'captenavira233@gmail.com', '5025082100');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `phone_Number` varchar(20) NOT NULL,
  `E_mail` varchar(50) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `Name`, `Address`, `phone_Number`, `E_mail`, `role`, `salary`, `date`) VALUES
(10, 'hossam ragab', 'adkajsdo hasoidhusaoi', '01281632099', 'hragab366@gmail.com', 'accountant', 5000, '2022-06-24 23:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ID` int(11) NOT NULL,
  `product Name` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `employee name` varchar(50) NOT NULL,
  `supplier name` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `product Name`, `Quantity`, `price`, `employee name`, `supplier name`, `date`) VALUES
(6, 'tolit1', 494, 300, 'hossam ragab', 'hisham', '2022-06-25'),
(7, 'tap 1', 529, 100, 'hossam ragab', 'hisham', '2022-06-25'),
(8, 'shower 1', 196, 50, 'hossam ragab', 'hisham', '2022-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_destination` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `ciity` varchar(30) DEFAULT NULL,
  `zip_code` int(10) DEFAULT NULL,
  `confirmed` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Name`, `order_date`, `order_destination`, `phone`, `Customer_ID`, `contact_email`, `ciity`, `zip_code`, `confirmed`) VALUES
(64, 'Hossam ragab sedeek', '2022-06-26 22:54:01', 'asljkdg aiyd', '0120 414 7942', 4, 'hragab366@gmail.com', 'ALEXANDRIA', 10001, 'yes'),
(65, 'amira', '2022-06-26 22:57:17', 'asjkgd asgdua', '01281632088', 4, 'adelhassan.ah69@gmail.com', 'ALEXANDRIA', 10001, 'yes'),
(67, 'Hossam ragab sedeek', '2022-06-27 13:20:42', 'aso;hdao', '0120 414 7942', 4, 'hragab366@gmail.com', 'ALEXANDRIA', 10001, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`Product_ID`, `Product_Name`, `price`, `Image`, `Category`) VALUES
(39, 'tolit1', 200, '62b76b82604e1.jpg', 'Toilete'),
(42, 'shower 1', 120, '62b76db0dfd84.jpg', 'Shower');

-- --------------------------------------------------------

--
-- Table structure for table `product_orderd`
--

CREATE TABLE `product_orderd` (
  `Orderproduct_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_orderd`
--

INSERT INTO `product_orderd` (`Orderproduct_ID`, `Customer_ID`, `Product_ID`, `date`) VALUES
(69, 4, 39, '2022-06-26 22:54:01'),
(70, 4, 42, '2022-06-26 22:54:01'),
(71, 4, 39, '2022-06-26 22:57:17'),
(74, 4, 39, '2022-06-27 13:20:42'),
(75, 4, 42, '2022-06-27 13:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Supplier_ID` int(11) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `shop_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Supplier_ID`, `Phone`, `Name`, `shop_address`) VALUES
(9, '01281632099', 'hisham', 'asojhdaousi hduiaoshdiuashdi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `product_orderd`
--
ALTER TABLE `product_orderd`
  ADD PRIMARY KEY (`Orderproduct_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_orderd`
--
ALTER TABLE `product_orderd`
  MODIFY `Orderproduct_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product_list` (`Product_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`);

--
-- Constraints for table `product_orderd`
--
ALTER TABLE `product_orderd`
  ADD CONSTRAINT `product_orderd_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`Customer_ID`),
  ADD CONSTRAINT `product_orderd_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product_list` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
