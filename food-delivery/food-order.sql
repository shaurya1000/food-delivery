-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 07:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(7, 'Administrator', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'karan', 'karan', 'db068ce9f744fbb35eedc9a883f91085');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(12, 'KFC', 'Food_Category_994.jpg', 'Yes', 'Yes'),
(16, 'Taco Bell', 'Food_Category_945.jpeg', 'No', 'Yes'),
(17, 'Picadilia', 'Food_Category_991.jpg', 'No', 'Yes'),
(18, 'McDonalds', 'Food_Category_467.jpg', 'No', 'Yes'),
(19, 'Subway', 'Food_Category_18.png', 'Yes', 'Yes'),
(20, 'Social(Sector-7)', 'Food_Category_210.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'Fried Chicken', 'Fried Chicken', '450.00', 'Food-Name1091.jpg', 12, 'Yes', 'Yes'),
(6, 'Chicken Popcorn', 'Popcorn chicken is a dish consisting of small, bite-sized pieces of chicken that have been breaded and fried.', '200.00', 'Food-Name9054.jpg', 12, 'No', 'Yes'),
(8, 'Paneer Tikka Sub', 'Cottage cheese slices marinated with barbeque seasoning and roasted to a light crispness.', '220.00', 'Food-Name9075.jpg', 19, 'No', 'Yes'),
(9, 'McChicken', 'It’s a classic for a reason. Savor the satisfying crunch of our juicy chicken patty, topped with shredded lettuce and just the right amount of creamy mayonnaise, all served on a perfectly toasted bun', '90.00', 'Food-Name8115.jpg', 18, 'Yes', 'Yes'),
(10, 'McAloo Tikki', 'The combination of a potato and peas patty with special Indian spices coated with breadcrumbs, served with sweet tomato mayo, fresh onions, and tomatoes in a regular bun\r\n\r\n', '40.00', 'Food-Name6951.jpg', 18, 'No', 'Yes'),
(11, 'Italian BMT', 'This all-time Italian classic is filled with Genoa salami, spicy pepperoni, and Black Forest Ham.', '220.00', 'Food-Name9162.jpg', 19, 'Yes', 'Yes'),
(12, 'Chicken Taco', 'A Taco made entirely out of chicken! It is a juicy and crispy chicken taco filled with cool ranch sauce, fresh lettuce, fiesta salsa salad and topped with shredded cheddar & mozzarella cheese.\r\n', '90.00', 'Food-Name8596.jpg', 16, 'No', 'Yes'),
(13, 'Paneer Taco', 'Paneer Taco is made with a soft taco shell filled with fresh paneer, lettuce, real cheddar cheese and spicy ranch sauce all tucked nicely in a piece of flatbread with melted two- cheese blend. ', '80.00', 'Food-Name802.jpg', 16, 'No', 'Yes'),
(14, 'Fish Tacos', 'Homemade shell tacos filled with fish fingers with a spread of baja sauce', '330.00', 'Food-Name8470.jpg', 20, 'Yes', 'Yes'),
(15, 'Chicken Salt n Pepper', 'Chicken Salt n Pepper', '270.00', 'Food-Name9028.jpg', 20, 'No', 'Yes'),
(16, 'Penne Alfredo', 'Cream, Cheese Sauce, Broccoli, Bell Peppers, Parmesan Cheese', '395.00', 'Food-Name9580.jpg', 17, 'Yes', 'Yes'),
(17, 'Caesar Salad', 'Assorted Lettuce, Sundried Tomatoes, Croutons, Parmesan ', '325.00', 'Food-Name9771.jpg', 17, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `payment_method` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `payment_method`) VALUES
(2, 'Fried Chicken', '450.00', 2, '900.00', '2022-03-29 08:29:26', 'Delivered', 'Karan Sarao', '9876543210', 'example@gmail.com', '1234, Sector 1, Chandigarh', 'Cash'),
(3, 'Fried Chicken', '450.00', 3, '1350.00', '2022-03-29 08:51:35', 'Delivered', 'Shaurya Sharma', '9876512340', 'shauryasharma@gmail.com', '234, Sector 9, Chandigarh', 'UPI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
