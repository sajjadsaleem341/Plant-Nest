-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 07:30 PM
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
-- Database: `plantnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `Id` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`Id`, `Image`, `Name`, `Password`, `Role`, `Email`, `Mobile`, `Status`) VALUES
(10, '20220228_204126.jpg', 'Sajjad', 'sajjad125', 'admin', 'sajjadsaleem341@gmail.com', '03176122252', 1),
(12, '20190814_184724.jpg', 'Sahil', 'sahil', 'employee', 'sahil@gmail.com', '03242477248', 1),
(18, 'istockphoto-947269088-612x612.jpg', 'Sameer', 'sameer', 'employee', 'sameer@gmail.com', '03352350927', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Categories` varchar(255) NOT NULL,
  `Status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Categories`, `Status`) VALUES
(15, 'Indoor Plants', 1),
(19, 'Outdoor Plants', 1),
(37, 'Potted', 1),
(82, 'Office Plants', 1),
(100, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`Id`, `Name`, `Email`, `Subject`, `Message`, `Date`) VALUES
(2, 'Abid', 'abid211@gmail.com', 'Subject', 'Message', '2022-11-02 20:52:48'),
(40, 'Sajjad', 'sajjadsaleem341@gmail.com', 'Test', 'Lorem', '2024-08-24 11:32:58'),
(41, 'Sajjad', 'sajjadsaleem341@gmail.com', 'Test', 'lorem', '2024-08-26 08:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `Tracking_Id` varchar(255) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Area` varchar(255) NOT NULL,
  `Pincode` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Total_Price` float NOT NULL,
  `Order_Status` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `Tracking_Id`, `User_Id`, `Email`, `Mobile`, `Address`, `City`, `Area`, `Pincode`, `Comment`, `Total_Price`, `Order_Status`, `Date`) VALUES
(1, '#3111744', 22, 'sajjadsaleem341@gmail.com', '03112656651', '194', 'Karachi', 'Gulshan', 78025, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic consequuntur dolor reiciendis eos. Earum dolorem incidunt totam cumque architecto ab.', 715, 1, '2024-08-25 10:08:00'),
(2, '#8355603', 22, 'sajjadsaleem341@gmail.com', '03112656651', 'karachi sindh', 'Karachi', 'Gulshan', 89, 'lorem', 1050, 1, '2024-08-26 08:08:43'),
(3, '#2331058', 23, 'test@gmail.com', '0123456789', 'Aptech SFC', 'Karachi', 'Shahrah Faisal', 75350, '', 30, 1, '2024-08-26 07:08:12'),
(4, '#7673558', 23, 'test@gmail.com', '0123456789', 'Aptech SFC', 'Karachi', 'Shahrah Faisal', 12345, '', 20, 1, '2024-08-26 07:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `Id` int(11) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`Id`, `Order_Id`, `Product_Id`, `Qty`, `Price`) VALUES
(1, 1, 1540648, 1, 15),
(2, 1, 1938977, 2, 350),
(3, 2, 1938977, 3, 350),
(4, 3, 8274260, 1, 30),
(5, 4, 3797273, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`Id`, `Name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Qty` int(11) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Short_Description` varchar(2000) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Category_Id`, `Image`, `Name`, `Price`, `Qty`, `Description`, `Short_Description`, `Status`) VALUES
(1540648, 15, '49.jpg', 'Recuerdos Plant', 15, 60, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1),
(1936811, 19, '48.png', 'Crocus Plant', 15, 60, 'Crocuses are small, perennial bulbs that burst into bloom early in the spring, often emerging through the snow. They are known for their vibrant colors, including yellow, purple, white, and shades of pink. The flowers are typically cup-shaped with three petals, and they are often fragrant. Crocuses are popular in gardens and containers, adding a splash of color to the landscape.', 'A vibrant spring bulb flower with delicate petals and a cup-like shape.', 1),
(1938977, 19, '40.png', 'Cactus Flower', 350, 50, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', 1),
(1983918, 19, '43.png', 'Ficus Ginseng Bonsai', 200, 30, 'The Ficus Ginseng Bonsai is a popular houseplant prized for its striking appearance. It features a thick, gnarled trunk that resembles ginseng roots, adding a touch of exotic charm to any space. The tree boasts vibrant green leaves and a compact size, making it ideal for indoor cultivation. With proper care, this bonsai can thrive for years, becoming a beautiful and low-maintenance addition to your home.', 'A unique and captivating bonsai tree known for its distinctive ginseng-like roots.', 1),
(1998131, 19, '45.png', 'Olive Plant', 150, 20, 'The Olive plant is a symbol of peace and longevity, known for its resilience and ability to thrive in harsh conditions. It features silvery-green leaves, twisted branches, and a gnarled trunk that adds character over time. Olive trees are popular ornamental plants, often used in Mediterranean-style gardens and as bonsai specimens. While they can produce edible olives, they are primarily grown for their aesthetic appeal.', 'A classic Mediterranean plant with silvery-green leaves and twisted branches.', 1),
(3715521, 37, '47.png', 'Cordyline australis', 50, 40, 'The Cordyline australis, also known as the Red-tipped Cabbage Palm, is a versatile and eye-catching plant native to New Zealand. It\'s characterized by its tall, slender trunk and long, sword-shaped leaves that are typically green with reddish or pinkish tips, though the coloration can vary depending on the cultivar. This plant is a popular choice for both indoor and outdoor gardens, adding a touch of tropical flair to any space. It\'s relatively low-maintenance and can thrive in a variety of conditions.', 'A striking tropical tree with long, sword-like leaves that often have red or pink tips.', 1),
(3797273, 37, '41.png', 'Tulips', 20, 80, 'Tulips are bulbous perennial plants renowned for their large, showy flowers. They come in a wide variety of colors, including pink, red, yellow, white, purple, and even black. Tulips are popular spring flowers and are often used in bouquets and gardens. Their delicate petals and slender stems create a cheerful and elegant display, making them a beloved choice for floral arrangements and landscape design.', 'Tulips are bulbous perennial plants known for their large, showy flowers. They come in a wide variety of colors, including pink, red, yellow, white, purple, and even black. Tulips are popular spring flowers and are often used in bouquets and gardens.', 1),
(8274260, 82, '46.png', 'Adenium Obesum', 30, 60, 'The Adenium Obesum, commonly known as the Desert Rose, is a captivating succulent native to Africa and the Arabian Peninsula. It\'s characterized by its thick, swollen trunk and fleshy branches, which store water in arid conditions. The plant produces beautiful, trumpet-shaped flowers in various colors, including red, pink, white, and yellow. Adenium Obesum is a popular choice for indoor and outdoor gardens, adding a touch of exotic beauty to any space.', 'A succulent plant with thick, woody stems and vibrant, trumpet-shaped flowers.', 1),
(8291552, 82, '44.png', 'Boxwood Topiary', 40, 50, 'The Boxwood Topiary is a popular choice for ornamental gardens and landscaping due to its versatility and low maintenance. Its dense, evergreen foliage can be trained into various shapes, but the classic spherical form is particularly striking. This plant is known for its durability and ability to withstand pruning, making it a popular choice for creating formal hedges, borders, and sculptural features.', 'A spherical plant with dense green foliage. Perfect choice for ornamental gardens and landscaping.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Password`, `Mobile`, `Date`) VALUES
(1, 'Kashif', 'kashif321@gmail.com', 'kashif321', '32165498700', '2022-11-01 00:18:40'),
(22, 'Sajjad', 'sajjadsaleem341@gmail.com', 'sajjad125', '03112656651', '2022-12-01 01:36:29'),
(23, 'Salman', 'salman321@gmail.com', 'salman321', '65498732112', '2022-12-02 01:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `categories` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
