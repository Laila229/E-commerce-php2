-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2025 at 08:37 PM
-- Server version: 9.1.0
-- PHP Version: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `visibility` tinyint(1) DEFAULT '1',
  `allow_comments` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `visibility`, `allow_comments`) VALUES
(1, 'Electronics', 'Gadgets and electronic devices', 1, 1),
(2, 'Books', 'All types of books', 1, 1),
(3, 'Clothing', 'Men and Women apparel', 1, 1),
(4, 'Home & Kitchen', 'Household and kitchen items', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `comment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `item_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `status`, `comment_date`, `item_id`, `user_id`) VALUES
(1, 'Great product!', 1, '2025-12-17 23:32:48', 1, 1),
(2, 'Fast delivery', 1, '2025-12-17 23:32:48', 2, 2),
(3, 'Loved this book', 1, '2025-12-17 23:32:48', 3, 4),
(4, 'Very comfortable T-shirt', 1, '2025-12-17 23:32:48', 4, 5),
(5, 'Microwave works perfectly', 1, '2025-12-17 23:32:48', 5, 6),
(6, 'Amazing sound quality', 1, '2025-12-17 23:32:48', 6, 7),
(7, 'Useful textbook for students', 1, '2025-12-17 23:32:48', 7, 8),
(8, 'Dress is beautiful', 1, '2025-12-17 23:32:48', 8, 9),
(9, 'Blender is very powerful', 1, '2025-12-17 23:32:48', 9, 1),
(10, 'Tablet battery lasts long', 1, '2025-12-17 23:32:48', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `add_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `country_made` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('new','like new','used') NOT NULL,
  `rating` tinyint DEFAULT '0',
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `description`, `price`, `add_date`, `country_made`, `image`, `status`, `rating`, `category_id`, `user_id`) VALUES
(1, 'Smartphone', 'Latest model smartphone', 699.99, '2025-12-17 23:32:34', 'USA', 'phone.jpg', 'new', 9, 1, 3),
(2, 'Laptop', 'High performance laptop', 1200.00, '2025-12-17 23:32:34', 'Germany', 'laptop.jpg', 'like new', 8, 1, 3),
(3, 'Novel Book', 'Interesting novel', 19.99, '2025-12-17 23:32:34', 'UK', 'book.jpg', 'new', 7, 2, 1),
(4, 'T-Shirt', 'Cotton T-shirt', 25.50, '2025-12-17 23:32:34', 'China', 'tshirt.jpg', 'new', 6, 3, 5),
(5, 'Microwave', '800W microwave oven', 150.00, '2025-12-17 23:32:34', 'Japan', 'microwave.jpg', 'new', 8, 4, 7),
(6, 'Headphones', 'Noise-cancelling headphones', 120.00, '2025-12-17 23:32:34', 'USA', 'headphones.jpg', 'like new', 9, 1, 5),
(7, 'Science Book', 'Physics textbook', 35.00, '2025-12-17 23:32:34', 'UK', 'sciencebook.jpg', 'new', 7, 2, 2),
(8, 'Dress', 'Summer dress for women', 45.00, '2025-12-17 23:32:34', 'Italy', 'dress.jpg', 'new', 8, 3, 6),
(9, 'Blender', 'High speed blender', 60.00, '2025-12-17 23:32:34', 'Germany', 'blender.jpg', 'new', 7, 4, 5),
(10, 'Tablet', '10 inch display tablet', 300.00, '2025-12-17 23:32:34', 'USA', 'tablet.jpg', 'like new', 8, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','processing','shipped','completed','cancelled') DEFAULT 'pending',
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `status`) VALUES
(1, 1, '2025-12-17 23:33:01', 'pending'),
(2, 2, '2025-12-17 23:33:01', 'completed'),
(3, 3, '2025-12-17 23:33:01', 'processing'),
(4, 4, '2025-12-17 23:33:01', 'shipped'),
(5, 5, '2025-12-17 23:33:01', 'completed'),
(6, 6, '2025-12-17 23:33:01', 'pending'),
(7, 7, '2025-12-17 23:33:01', 'completed'),
(8, 8, '2025-12-17 23:33:01', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `item_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 699.99),
(2, 1, 3, 2, 19.99),
(3, 2, 2, 1, 1200.00),
(4, 2, 7, 1, 35.00),
(5, 3, 4, 3, 25.50),
(6, 4, 5, 1, 150.00),
(7, 5, 6, 2, 120.00),
(8, 6, 8, 1, 45.00),
(9, 7, 9, 1, 60.00),
(10, 8, 10, 1, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('credit_card','paypal','bank_transfer') NOT NULL,
  `status` enum('pending','completed','failed') DEFAULT 'pending',
  PRIMARY KEY (`payment_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_date`, `amount`, `method`, `status`) VALUES
(1, 1, '2025-12-17 23:33:33', 739.98, 'credit_card', 'completed'),
(2, 2, '2025-12-17 23:33:33', 1235.00, 'paypal', 'completed'),
(3, 3, '2025-12-17 23:33:33', 76.50, 'bank_transfer', 'pending'),
(4, 4, '2025-12-17 23:33:33', 150.00, 'credit_card', 'completed'),
(5, 5, '2025-12-17 23:33:33', 240.00, 'paypal', 'completed'),
(6, 6, '2025-12-17 23:33:33', 45.00, 'bank_transfer', 'pending'),
(7, 7, '2025-12-17 23:33:33', 60.00, 'credit_card', 'completed'),
(8, 8, '2025-12-17 23:33:33', 300.00, 'paypal', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `group_id` tinyint NOT NULL,    -- لتحديد نوع المستخدم سواء ادمن او تاجر او مستخدم عاي , الادمن رقمه 1 والتاجر 2 والمستخدم العادي 3 
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `avatar`, `group_id`) VALUES
(1, 'ahmed', 'pass111', 'ahmed@gmail.com', 'Ahmed Omar', NULL, 1),
(2, 'omar', 'pass222', 'omar@gmail.com', 'Omar Khaled', NULL, 1),
(3, 'ramzi', 'pass333', 'ramzi@gmail.com', 'Ramzi Said', NULL, 2),
(4, 'fatima', 'pass444', 'fatima@gmail.com', 'Fatima Hassan', NULL, 1),
(5, 'layla', 'pass555', 'layla@gmail.com', 'Layla Nasser', NULL, 2),
(6, 'yousef', 'pass666', 'yousef@gmail.com', 'Yousef Karim', NULL, 1),
(7, 'mona', 'pass777', 'mona@gmail.com', 'Mona Adel', NULL, 2),
(8, 'tariq', 'pass888', 'tariq@gmail.com', 'Tariq Sami', NULL, 1),
(9, 'salma', 'pass999', 'salma@gmail.com', 'Salma Fouad', NULL, 2),
(10, 'admin', 'adminpass', 'admin@gmail.com', 'Site Admin', NULL, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- ====================
-- SELECT QUERIES
-- ==================== 

-- Retrieve all products
SELECT * FROM items;


-- Retrieve all users
SELECT * FROM users;


-- Show orders with related user information (INNER JOIN)
SELECT o.order_id, o.order_date, o.status, u.full_name, u.email
FROM orders o
INNER JOIN users u ON o.user_id = u.user_id;


-- Filter results using WHERE
SELECT * FROM items
WHERE price > 100;


-- Sort results using ORDER BY
SELECT * FROM items
ORDER BY price ASC;


-- Limit results using LIMIT
SELECT * FROM items
LIMIT 5;



-- =====================
-- AGGREGATE FUNCTIONS
-- =====================

-- Total number of orders
SELECT COUNT(*) AS total_orders FROM orders;


-- Total sales amount
SELECT SUM(oi.price * oi.quantity) AS total_sales
FROM order_items oi;


-- Average product price
SELECT AVG(price) AS avg_product_price FROM items;


-- =====================
-- JOINS
-- =====================

-- INNER JOIN - Show orders with product details
SELECT o.order_id, u.full_name AS customer, i.name AS product, oi.quantity, oi.price
FROM orders o
INNER JOIN users u ON o.user_id = u.user_id
INNER JOIN order_items oi ON o.order_id = oi.order_id
INNER JOIN items i ON oi.item_id = i.item_id;

-- LEFT JOIN – Show products with comments
SELECT i.name AS product, c.comment, c.comment_date
FROM items i
LEFT JOIN comments c ON i.item_id = c.item_id;