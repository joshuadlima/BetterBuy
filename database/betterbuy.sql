-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 10:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betterbuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_mobile` int(11) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_username`, `admin_mobile`, `admin_password`, `admin_ip`) VALUES
(1, 'joshuadlima123@gmail.com', 'jos', 0, '76d80224611fc919a5d54f0ff9fba446', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'SHOES'),
(2, 'PANTS'),
(4, 'SHIRTS'),
(5, 'UNDERWEARS'),
(11, 'DRESSES');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `ordered_products_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `category_id`, `product_image`, `product_price`) VALUES
(25, 'Relaxed Fit Tailored trousers', 'Relaxed-fit trousers in twill with a zip fly with a concealed button and hook-and-eye fastening. Diagonal side pockets, jetted back pockets and straight legs with creases.', 2, '../product_images/hmgoepprod.jpg', 3599),
(26, 'Regular Fit Flannel shirt', 'Regular-fit shirt in soft cotton flannel with a turn-down collar, French front and yoke at the back. Long sleeves with adjustable buttoning at the cuffs, and a rounded hem', 4, '../product_images/hmgoepprod2.jpg', 1999),
(27, 'Regular Fit Flannel shirt', 'Shirt in soft cotton flannel with a turn-down collar, buttons down the front and a yoke at the back. Regular fit with an open chest pocket and long sleeves with buttoned cuffs and a sleeve placket with a link button. Gently rounded hem.', 4, '../product_images/hmgoepprod3.jpg', 2299),
(28, 'Slim Fit Corduroy trousers', '5-pocket trousers in soft cotton corduroy. Slim fit with a zip fly and button.', 2, '../product_images/hmgoepprod4.jpg', 2699),
(29, 'Chunky loafers', 'Loafers with a decorative tab and seam at the front. Canvas linings and insoles and chunky, patterned soles. Heel 3.2 cm.', 1, '../product_images/hmgoepprod5.jpg', 3599),
(30, 'Oversized corduroy overshirt', 'Oversized overshirt in soft cotton corduroy with a collar and buttons down the front. Dropped shoulders, long sleeves with buttoned cuffs, a patch chest pocket and a rounded hem.', 4, '../product_images/hmgoepprod6.jpg', 2099),
(31, 'Tie-detail satin dress', 'Short dress in softly draping satin with a V-shaped neckline that has wide ties that tie at the front. Dropped shoulders and long sleeves with wide, buttoned cuffs and a sleeve placket with a link button. Straight-cut hem with a small slit at each side', 11, '../product_images/hmgoepprod7.jpg', 1799),
(32, 'Frill-trimmed bandeau dress', 'Short, fitted bandeau dress in heavy stretch jersey with two frill trims at the hem, the upper layer in an asymmetric cut.', 11, '../product_images/hmgoepprod8.jpg', 1499),
(33, 'Flared twill trousers', 'Fitted trousers in stretch cotton twill with a high waist, zip fly and button, fake front pockets and real back pockets. Legs with flared hems.', 11, '../product_images/hmgoepprod9.jpg', 1499),
(34, 'Skinny High Jeans', '5-pocket jeans in slightly stretchy denim with a high waist, zip fly and button and skinny legs', 2, '../product_images/hmgoepprod10.jpg', 1499),
(35, 'Linen shirt', 'Loose-fit shirt in airy linen with a collar and buttons down the front. Double-layered yoke, dropped shoulders and long sleeves with buttoned cuffs.', 4, '../product_images/hmgoepprod11.jpg', 2299),
(36, 'Leather platform sandals', 'Sandals in leather with covered block heels and square toes. Narrow foot straps and a thin, adjustable strap around the ankle. Leather linings and insoles. Platform 2.5 cm. Heel 10 cm.', 1, '../product_images/hmgoepprod12.jpg', 5699),
(37, 'Cashmere polo-neck dress', 'Calf-length dress in soft, fine-knit cashmere. Relaxed fit with a ribbed polo neck, low dropped shoulders and extra-long sleeves. Straight hem with a slit in each side. Ribbing at the cuffs and hem.', 11, '../product_images/hmgoepprod13.jpg', 14999),
(38, '3-pack short cotton trunks', 'Trunks in stretch cotton jersey with flatlock seams for added comfort, short legs, covered elastication at the waist and lined front.', 5, '../product_images/m5.jpg', 1299),
(39, '3-pack cotton short trunks', 'Trunks in stretch cotton jersey with flatlock seams for added comfort. Elasticated waist, a lined front and short legs.', 5, '../product_images/hmgoepprod0.jpg', 1499),
(40, 'Loose Fit Sweatshirt', 'Top in lightweight sweatshirt fabric made from a cotton blend with a soft brushed inside. Round, rib-trimmed neckline, dropped shoulders, long sleeves and wide ribbing at the cuffs and hem. Loose fit for a generous but not oversized silhouette', 4, '../product_images/hmgoepprod19.jpg', 799),
(41, 'Loose Fit Zip-through hoodie', 'Zip-through hoodie in lightweight sweatshirt fabric made from a cotton blend with a soft brushed inside. Jersey-lined, drawstring hood, a zip down the front, diagonal, welt side pockets and wide ribbing at the cuffs and hem. Loose fit for a generous but n', 4, '../product_images/hmgoepprod20.jpg', 1499),
(42, 'Straight Regular Jeans', '5-pocket jeans in cotton denim with a slight stretch for good comfort. Straight leg and a regular fit from the waist to the hem with a comfortable, looser feel around the whole leg. Regular waist and a zip fly. This is denim that lasts.', 2, '../product_images/hmgoepprod21.jpg', 1799),
(43, 'Regular Fit Cargo trousers', 'Regular-fit cargo trousers in cotton twill with sewn-in pleats at the knees. Covered elastication at the back of the waist, zip fly and a press-stud. Welt side pockets with a press-stud, bellows leg pockets with press-studs and welt back pockets.', 2, '../product_images/hmgoepprod22.jpg', 1999),
(45, 'Regular Fit Twill shacket', 'Shacket in sturdy cotton twill with a collar, buttons down the front and long sleeves. Open chest pocket and a straight-cut hem. Unlined. Regular fit for comfortable wear and a classic silhouette.', 4, '../product_images/hmgoepprod23.jpg', 2999);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(15, 'Joshua', 'joshuadlima123@gmail.com', '2868bae551e9544cf7a7a6406e5428ed', '127.0.0.1', 'Goa College of Engineering - Farmagudi, Ponda, South Goa District, Goa, 403404, India', 2147483647),
(16, 'Noah', 'joshuadlima123@gmail.com', '12d362c786065eb9d3e3944255d1f242', '127.0.0.1', 'Mapusa Industrial Estate, Duler, Mapusa, Bardez, North Goa District, Goa, 403507, India', 1233121323),
(17, 'Dlima', 'joshuadlima123@gmail.com', 'b9851a8e9a9ef49deaffa30b38cb7f65', '127.0.0.1', 'Mapusa Industrial Estate, Duler, Mapusa, Bardez, North Goa District, Goa, 403507, India', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`ordered_products_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `ordered_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
