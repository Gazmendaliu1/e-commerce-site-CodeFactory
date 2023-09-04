-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2023 at 09:16 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `answears`
--

CREATE TABLE `answears` (
  `id` int(11) NOT NULL,
  `answear` varchar(350) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'cart',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `type`, `quantity`) VALUES
(3, 3, 1, 'order', 1),
(10, 4, 34, 'order', 8),
(17, 5, 34, 'order', 15),
(27, 6, 34, 'order', 10),
(32, 7, 34, 'cart', 24),
(34, 3, 1, 'cart', 1),
(39, 4, 34, 'cart', 8),
(46, 5, 34, 'cart', 15),
(56, 6, 34, 'cart', 10),
(59, 3, 1, 'cart', 1),
(64, 4, 34, 'cart', 8),
(71, 5, 34, 'cart', 15),
(81, 6, 34, 'cart', 10),
(83, 4, 1, 'cart', 1),
(84, 5, 1, 'cart', 2),
(94, 5, 15, 'cart', 3);

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `user_id`, `admin_id`, `status`) VALUES
(1, 2, 3, 'open'),
(9, 4, 3, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `message_time` time DEFAULT current_timestamp(),
  `conversation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `message_time`, `conversation_id`, `user_id`) VALUES
(1, 'test of a message', '21:00:33', 1, 2),
(2, 'Das ist eine test Antwort', '01:21:19', 1, 3),
(3, 'Das hier ist ein Test einer etwas längeren Nachricht', '14:44:07', 1, 2),
(4, 'Das ist ein Test', '17:26:41', 9, 4),
(5, 'Noch ein Test', '17:27:05', 9, 4),
(6, 'hallo', '20:20:22', 1, 2),
(40, 'test', '11:16:15', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'all',
  `availability` varchar(3) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `picture`, `title`, `description`, `gender`, `availability`, `price`) VALUES
(15, 'avatar.png', 'PRINTED SATIN SHIRT', 'High neck shirt with tie detail. Long cuffed sleeves. Button-up front.', 'female', 'Yes', 26.99),
(19, 'avatar.png', 'OXFORD SHIRT', 'Shirt made of a cotton blend. Johnny collar and long sleeves. Button-up front.', 'female', 'Yes', 15.99),
(24, 'avatar.png', 'MINIMALIST SATIN CROSSOVER SHIRT', 'Shirt made of 100% viscose. Featuring a lapel collar and long sleeves with cuffs. Asymmetric hem with side vents. Crossover button-up front.', 'female', 'Yes', 20.99),
(25, 'avatar.png', 'SATIN TROUSERS WITH TOPSTITCHING', 'High-waist trousers with front pockets. Pronounced contrast topstitching detail. Straight legs. Frayed hem. Invisible side zip fastening.', 'female', 'Yes', 37.95),
(26, 'avatar.png', 'LONG BLAZER WITH BELT', 'Blazer with a lapel collar, long sleeves and shoulder pads. Front flap pockets. Belt with buckle lined in matching fabric. Contrast lining. Double-breasted fastening with covered buttons.', 'female', 'Yes', 65.79),
(27, 'avatar.png', 'LONG KNIT DRESS', 'Long dress with a round neckline and long sleeves. Matching ribbed trims.', 'female', 'Yes', 27.99),
(28, 'avatar.png', 'ASYMMETRIC MIDI DRESS', 'Midi dress with an asymmetric neck and short sleeves.', 'female', 'Yes', 27.65),
(29, 'avatar.png', 'MIDI SKIRT WITH POCKETS', 'Mid-rise midi skirt. Front patch pockets with flaps and belt loops. Belt in the same fabric with a metal buckle. Invisible side zip fastening.\r\n', 'female', 'Yes', 23.76),
(30, 'avatar.png', 'KNIT LINEN BLEND CARDIGAN', 'Coatigan made of a linen blend. V-neckline and long sleeves. Buttoned front.', 'female', 'Yes', 28.99);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `titel` varchar(30) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answeared` varchar(3) NOT NULL DEFAULT 'no',
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(11) NOT NULL,
  `company` varchar(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingId`, `company`, `price`) VALUES
(1, 'DHL', 5),
(2, 'POST', 4),
(3, 'DPD', 6),
(4, 'STORE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'user',
  `ban` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `email`, `password`, `picture`, `address`, `status`, `ban`) VALUES
(1, 'chris', 'kraki', 'test@email.com', '', 'avatar.png', 'straße 3', 'user', 'no'),
(2, 'Christoph', 'Kragolnik', 'christoph.kragolnik@gmail.com', '23d39bc16b8b247fcf4ffdc7cf3eb6e1f00082fb1bcfbcfbf9b9084fee50c6af', '64dbabfbb598e.jpg', 'Schubertgasse', 'user', 'no'),
(3, 'Test', 'MrTest', 'teste@email.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578', 'avatar.png', 'teststraße', 'adm', 'no'),
(4, 'user', 'user', 'user@email.com', 'e172c5654dbc12d78ce1850a4f7956ba6e5a3d2ac40f0925fc6d691ebb54f6bf', 'avatar.png', 'user', 'user', 'no'),
(5, 'olga', 'terleeva', 'olga@olga.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'avatar.png', 'Витебсктй 51', 'user', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answears`
--
ALTER TABLE `answears`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_id` (`conversation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answears`
--
ALTER TABLE `answears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answears`
--
ALTER TABLE `answears`
  ADD CONSTRAINT `answears_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `answears_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `answears_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
