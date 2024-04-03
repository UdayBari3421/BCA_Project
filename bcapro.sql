-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 06:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcapro`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(191) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `trending`, `status`, `image`, `created_at`) VALUES
(1, 'Birthday', '  All Types of Birthday Gifts Are Available Here... ', 1, 1, '', '2023-02-11'),
(4, 'Plants', ' Plants Available here Like MOney Plant, Bamboo Plant ', 0, 1, '', '2023-02-13'),
(5, 'Chocolates', ' All Type of Chocolates and Combo pack of chocolates are available ', 1, 1, '', '2023-02-13'),
(6, 'Anniversary', ' All Types Of Aniversary Gifts Are Available Here ', 1, 1, '', '2023-02-11'),
(7, 'Flowers', '  All Type of Flowers And Bookay Are Available Here ', 1, 1, '', '2023-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `description` text NOT NULL,
  `contact_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `city`, `pincode`, `description`, `contact_date`) VALUES
(1, 'Uday Dipak Bari', 'udaybari2003@gmail.com', '7745883170', 'Auto Nagar OLD MIDC, Jalgaon', 'Jalgaon', 425001, 'Dummy details for test', '2023-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `home_contact`
--

CREATE TABLE `home_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_contact`
--

INSERT INTO `home_contact` (`id`, `email`, `created_at`) VALUES
(1, 'udaybari2003@gmail.com', '2023-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `pincode` varchar(191) NOT NULL,
  `total` varchar(191) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `email`, `name`, `phone`, `address`, `city`, `pincode`, `total`, `order_date`) VALUES
(1, 442, 'uday@gmail.com', 'Uday Bari', '7745883169', 'Jalgaon, Jalgaon', '', '', '442', '2023-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(12) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `long_description` longtext NOT NULL,
  `price` varchar(191) NOT NULL,
  `offerprice` varchar(191) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `small_description`, `long_description`, `price`, `offerprice`, `quantity`, `image`, `status`, `created_at`) VALUES
(1, 1, 'Birthday Glow Lamp', 'Birthday Glow Lamp', 'Color- Warm White\r\nMaterial- Imported Acrylic\r\nPersonalization- Tagline and 2 Names \r\nLimit- 8 to 9 Letters\r\nSizes- 6X2X.8', '1024', '949', 19, '1677936315.jpg', 1, '2023-02-13'),
(4, 1, 'Printed Cup', 'Printed Birthday Cup', 'Printed Cup with Happy Birthday Wish 350ML ', '250', '176', 25, '1677819644.jpg', 1, '2023-03-03'),
(5, 1, 'Wooden Pen, Calendar, Clock Stand', 'Wooden Pen, Calendar, Clock Stand', 'Beautiful Wooden pen-card-Mobile Holder 127CM', '480', '350', 24, '1677819984.jpg', 1, '2023-03-03'),
(6, 1, 'Blutooth-Speaker', 'Blutooth-Speaker', 'Bluetooth Wireless Speaker', '500', '399', 22, '1677820258.jpg', 1, '2023-03-03'),
(7, 6, 'Anniversary Photo Cushion', 'Anniversary Printed Photo Cushion For Couples', 'Shape: Square \r\nDimension : 12*12 inch\r\nProduct Type: Cushion \r\nPersonalized Cushion Cover\r\nRecron Filled Cushion\r\nDimensions- Approximate L (10-11 inches) x W (10-11 inches)', '599', '439', 18, '1677936620.jpg', 1, '2023-03-04'),
(8, 6, 'Couple LED Photo Frame', 'Couple LED Photo Frame', 'One Personalised Photo Frame\r\nMaterial- MDF\r\nYou can upload pictures of your liking', '1249', '999', 10, '1677936997.jpg', 1, '2023-03-04'),
(9, 6, 'Beautiful Enagement Ring', 'Beautiful Engagement Ring', 'Royal Crown Ring theme studded with Sparkling Crystal in Silver Plated\r\nMaterial: Alloy (97% tin and 3% bismuth)\r\nSize: Adjustable', '899', '759', 11, '1677937209.jpg', 1, '2023-03-04'),
(10, 6, 'Heart Anniversary Kitchen', 'Heart Anniversary Kitchen', 'Shape: Heart-Shape\r\nSize: Weight 5.5cm /Height 5 cm\r\nProduct-Type: Key Chain\r\nMaterial: Hardened MDF\r\nOccasions: Happy Anniversary Wish Keychain', '255', '199', 23, '1677937347.jpg', 1, '2023-03-04'),
(12, 5, 'Dairy Milk Chocolate Basket', 'Chocolate: Dairy Milk chocolate (13 gm each)<br>\r\nNo of Chocolate: 10', 'Chocolate: Dairy Milk chocolate (13 gm each)\r\nNo of Chocolate: 10\r\nPacking: Blue Net Packing\r\nBase: Wooden BasketChocolate: Dairy Milk chocolate (13 gm each)\r\nNo of Chocolate: 10<br>\r\nPacking: Blue Net Packing<br>\r\nBase: Wooden Basket', '849', '749', 35, '1677996052.jpg', 1, '2023-03-05'),
(13, 5, 'Teddy Dark Chocolate Delight', 'Adorable Teddy Dark Chocolate Delight', 'Number of Chocolates- 10 Pcs\r\nShape of Chocolates- Heart-Shaped \r\nChocolates Box Weight- 190 gms\r\nBox Dimensions- 15*15*8\r\nType of Chocolates- Dark Chocolates\r\nShape of Chocolate Box- Heart-Shaped\r\nA small white Teddy with \"I Love You\" message included', '449', '399', 20, '1677996183.jpg', 1, '2023-03-05'),
(14, 5, 'Combo For Love', 'Chocolate: 2 Dairy Milk Silk Chocolate+2 Kitkat Chocolate+2 Five Star Chocolate', 'Chocolate: 2 Dairy Milk Silk Chocolate+2 Kitkat Chocolate+2 Five Star Chocolate\r\nNo of Chocolate: 6\r\nTeddy: 1 Pink Teddy Bear - 6 Inch\r\nCard: One Love Greeting Card', '849', '849', 20, '1677996807.jpg', 1, '2023-03-05'),
(15, 5, 'Delight Assorted Choclate Box', 'Premium Chocolate Gift Box Pack of 12 With Nuts', 'Type - Chocolate Truffles\r\nWeight- 300gms\r\nModel Name-Premium Chocolate Gift Box ( Pack of 12 )\r\nMaximum Shelf Life-6 Months\r\nGourmet-Yes\r\nWith Nuts-Yes', '499', '350', 20, '1678003239.jpg', 0, '2023-03-05'),
(17, 7, 'Arranged Red Roses  ', 'Colossal Red Roses Arranged With heart shape', 'Flower Type: Red Roses \r\nNo of Flower: 35\r\nFillers: Green Seasonal Fillers\r\nBase: Heart-Shape Oasis/Thermocol Base\r\nBow: White Ribbon', '2120', '1999', 10, '1678004669.jpg', 0, '2023-03-05'),
(18, 7, 'Heart Shpaed Pink Red Roses', 'Heart Shape Oasis Thermacol Base Pink & Red Roses ', 'Flower Type: Pink & Red Roses \r\nNo of Flower: 35\r\nFillers: Seasonal Fillers\r\nBase: Heart-Shape Oasis/Thermacol Base', '2280', '2999', 21, '1678007381.jpg', 0, '2023-03-05'),
(19, 7, 'Red Rose Box', 'Red Rose Box Combo Pack of 6 Sticks ', 'Flower Type: Red Roses\r\nNo of Flower: 6 Sticks\r\nPacking: Gift box\r\nBow: Red Ribbon', '299', '220', 20, '1678009688.jpg', 0, '2023-03-05'),
(20, 7, 'Serence Heart Mix Roses Arranged', 'Serence Heart Mix Roses Arranged \r\n32 Red Roses & 18 Pink Roses ', 'Flower Type: 32 Red Roses & 18 Pink Roses \r\nNo of Flower: 50\r\nFillers: Green Seasonal Fillers\r\nBase: Heart-Shape Oasis/Thermocol Base\r\nBow: Red Ribbon', '2999', '1999', 3, '1678010477.jpg', 0, '2023-03-05'),
(22, 4, 'Beautiful Aglaonema', 'Beautiful Aglaonema Plant', 'Beautiful Aglaonema Plant with Pot', '674', '600', 5, '1678012643.jpg', 0, '2023-03-05'),
(23, 4, 'I love You Money Plant', 'I love You Money Plant Pink and Red Rassi', '1 Money Plant\r\nWrapped in Jute\r\nPink & Red Rassi is used to create I L U', '499', '350', 5, '1678012757.jpg', 0, '2023-03-05'),
(24, 4, 'Indoor Plant for Home', 'Indoor Plant for Home WIth 4 Inch Plastic Pot', 'Common Name: Syngonium Plant / Peace Lily Plant / Money Plant\r\nType of Plant:  Air Purifying Plant\r\nPlant Placement: Indoor\r\nType of Planters: 4 Inch Plastic Pot\r\nDifficulty Level to Grow:  Easy to grow', '790', '660', 10, '1678012906.jpg', 0, '2023-03-05'),
(26, 4, 'White Potted Table Kamini', 'White Potted Table Kamini With One Piece', '1 White Potted Table Kamini\r\nPot size :- 4.5 inch & width 3.5 inch approx\r\nPlant height:- 5 inches approx', '749', '649', 5, '1678013418.jpg', 0, '2023-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `user_address` text NOT NULL,
  `user_city` text NOT NULL,
  `user_pincode` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `role_as`, `user_address`, `user_city`, `user_pincode`, `created_at`) VALUES
(1, 'Uday Bari', '7745883169', 'uday@gmail.com', 'uday123', 1, 'Jalgaon, Jalgaon', 'Jalgaon', 425001, '2023-01-27'),
(2, 'Vishal', '7757086568', 'vishal@gmail.com', 'vishal123', 1, 'Shendurni Jalgaon\n', 'Jalgaon', 424204, '2023-01-27'),
(3, 'Harshada Bari', '9309561220', 'harshu@gmail.com', 'harshu123', 0, 'Shirsoli, Jalgaon', 'Jalgaon', 425002, '2023-01-29'),
(4, 'Pravin Patil', '8800550066', 'pravin@gmail.com', 'pravin123', 0, 'Paldhi, Jalgaon', 'Jalgaon', 425004, '2023-01-29'),
(5, 'Aarti Dnyane', '8899663311', 'aarti@gmail.com', 'aarti123', 0, 'Jalgaon, Jalgaon', 'Jalgaon', 425001, '2023-01-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_contact`
--
ALTER TABLE `home_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_contact`
--
ALTER TABLE `home_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
