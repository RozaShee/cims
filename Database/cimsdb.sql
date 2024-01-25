-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 08:19 PM
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
-- Database: `cimsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `is_deleted` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `is_deleted`) VALUES
(1, 'Nyeri', 0),
(2, 'Karatina', 0),
(3, 'Nairobi', 0),
(4, 'Naivasha', 0),
(5, 'Nakuru', 0),
(6, 'Embu', 0),
(7, 'Thika', 0),
(8, 'Nyahururu', 0),
(9, 'Eldoret', 0),
(10, 'Kitale', 0),
(11, 'Kisii', 0),
(12, 'Mombasa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `is_deleted` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `is_deleted`) VALUES
(1, 'Nyeri', 0),
(2, 'Nairobi', 0),
(3, 'Karatina', 0),
(4, 'Thika', 0),
(5, 'Nakuru', 0),
(6, 'Nyahururu', 0),
(7, 'Naivasha', 0),
(8, 'Nanyuki', 0),
(9, 'Kerugoya', 0),
(10, 'Othaya', 0),
(11, 'Eldoret', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`content` text NOT NULL,
	`rating` tinyint(1) NOT NULL,
	`submit_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `content`, `rating`, `submit_date`) VALUES
(1,'John Smith', 'I love this website, it is helpful.', 5, '2024-01-09 20:43:02'),
(2,'John Doe', 'Great website, great content, and great support!', 4, '2024-01-09 21:00:41'),
(3,'Robert Billings', 'Website is lacking.', 3, '2024-01-09 21:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    delivery_process_rating INT,
    service_satisfaction_rating INT,
    package_condition_rating INT,
    suggestions TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_link_token` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `is_deleted` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `phone`, `nic`, `address`, `gender`, `password`, `reset_link_token`, `exp_date`, `is_deleted`) VALUES
(1, 'Isaya', 'isayaopiyo0@gmail.com', '0114097640', '39041620', 'Nairobi', 1, 'isaya23', NULL, NULL, 0),
(3, 'Nyambura Mwangi', 'nyamburamwangi@gmail.com', '0723456789', '39501234', '456 Street Nyahururu', 0, 'testuser2', NULL, NULL, 0),
(4, 'Kipchoge Kiptoo', 'kipchoge.kiptoo@yahoo.com', '0119876543', '39602345', '789 Road Eldoret', 1, 'testuser3', NULL, NULL, 0),
(5, 'Achieng Odhiambo', 'achieng.odhiambo@outlook.com', '0704123456', '39703456', '321 Boulevard Nakuru', 0, 'testuser4', NULL, NULL, 0),
(6, 'Kamau Gitonga', 'kamaugitonga@gmail.com', '0728765432', '39804567', '567 Lane Karatina', 1, 'testuser5', NULL, NULL, 0),
(8, 'Wambui Njeri', 'wambuinjeri@gmail.com', '0712345678', '39511234', '234 Street Nakuru', 0, 'testuser7', NULL, NULL, 0),
(9, 'Omondi Otieno', 'omondiotieno@yahoo.com', '0109876543', '39622345', '789 Avenue Karatina', 1, 'testuser8', NULL, NULL, 0),
(10, 'Njeri Kamau', 'njerikamau@outlook.com', '0723456789', '39733456', '456 Road Eldoret', 0, 'testuser9', NULL, NULL, 0),
(11, 'Mwangi Karanja', 'mwangikaranja@gmail.com', '0112345678', '39844567', '567 Lane Thika', 1, 'testuser10', NULL, NULL, 0),
(12, 'Akinyi Odongo', 'akinyiodongo@yahoo.com', '0709876543', '39955678', '678 Street Nyahururu', 0, 'testuser11', NULL, NULL, 0),
(13, 'Kariuki Maina', 'kariukimaina@gmail.com', '0711122334', '39561234', '789 Road Nairobi', 1, 'testuser12', NULL, NULL, 0),
(14, 'Naliaka Wanjiku', 'naliakawanjiku@yahoo.com', '0109876543', '39672345', '123 Avenue Eldoret', 0, 'testuser13', NULL, NULL, 0),
(15, 'Oluoch Otieno', 'oluochotieno@outlook.com', '0723456789', '39783456', '456 Street Nyahururu', 1, 'testuser14', NULL, NULL, 0),
(16, 'Wanjiru Kariuki', 'wanjirukariuki@gmail.com', '0112345678', '39894567', '567 Lane Thika', 0, 'testuser15', NULL, NULL, 0),
(17, 'Kiprop Langat', 'kiproplangat@yahoo.com', '0709876543', '39905678', '678 Road Karatina', 1, 'testuser16', NULL, NULL, 0),
(18, 'Muthoni Kimani', 'muthonikimani@gmail.com', '0712233445', '39571234', '789 Street Nairobi', 0, 'testuser17', NULL, NULL, 0),
(19, 'Ochieng Omondi', 'ochiengomondi@yahoo.com', '0109876543', '39682345', '123 Avenue Nakuru', 1, 'testuser18', NULL, NULL, 0),
(20, 'Akinyi Wanjiru', 'akinyiwanjiru@outlook.com', '0723456789', '39793456', '456 Road Nyahururu', 0, 'testuser19', NULL, NULL, 0),
(21, 'Karanja Mwangi', 'karanjamwangi@gmail.com', '0112345678', '39804567', '567 Lane Eldoret', 1, 'testuser20', NULL, NULL, 0),
(22, 'Njoroge Gitonga', 'njorogegitonga@yahoo.com', '0709876543', '39915678', '678 Street Thika', 0, 'testuser21', NULL, NULL, 0),
(23, 'Kariuki Mugo', 'kariukimugo@yahoo.com', '0109876543', '39692345', '456 Road Othaya', 1, 'testuser23', NULL, NULL, 0),
(24, 'Njoki Waweru', 'njokiwaweru@outlook.com', '0723456789', '39703456', '789 Avenue Naivasha', 0, 'testuser24', NULL, NULL, 0),
(25, 'Kibet Kiprop', 'kibetkiprop@gmail.com', '0112345678', '39814567', '567 Lane Nanyuki', 1, 'testuser25', NULL, NULL, 0),
(26, 'Wanjiku Karanja', 'wanjikukaranja@yahoo.com', '0709876543', '39925678', '678 Street Thika', 0, 'testuser26', NULL, NULL, 0),
(27, 'Kagwiria Gitari', 'kagwiriagitari@gmail.com', '0712345678', '39581234', '123 Street Kerugoya', 0, 'testuser22', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_link_token` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `is_deleted` int(2) NOT NULL,
  `branch_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `email`, `phone`, `nic`, `address`, `gender`, `password`, `reset_link_token`, `exp_date`, `is_deleted`, `branch_id`) VALUES
(1, '', 'admin', '', '', '', 0, '12345', NULL, NULL, 0, 0),
(2, 'Catherine Wangui', 'wanguicatherine79@gmail.com', '0796861802', '33890361', 'Othaya', 0, 'emp1', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_image`) VALUES
(29, 'vehicle_image.jpg'),
(30, '2nk_vehicle1.jpg'),
(31, 'parcel_truck.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `price_table`
--

CREATE TABLE `price_table` (
  `price_id` int(11) NOT NULL,
  `start_area` varchar(255) NOT NULL,
  `end_area` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `is_deleted` int(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `price_table`
--

INSERT INTO `price_table` (`price_id`, `start_area`, `end_area`, `price`, `is_deleted`, `date_updated`) VALUES
(9, '4', '2', 250, 0, '2023-10-29 09:30:00'),
(10, '11', '5', 500, 0, '2023-10-30 15:45:00'),
(11, '1', '10', 200, 0, '2023-11-01 08:00:00'),
(12, '2', '5', 320, 0, '2023-11-02 10:30:00'),
(13, '8', '6', 400, 0, '2023-11-03 14:15:00'),
(14, '2', '9', 500, 0, '2023-11-04 17:45:00'),
(15, '1', '4', 450, 0, '2023-11-05 09:00:00'),
(16, '5', '7', 300, 0, '2023-11-06 12:30:00'),
(17, '1', '3', 300, 0, '2023-10-28 12:16:56'),
(18, '3', '10', 200, 0, '2023-11-28 14:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `sender_phone` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `send_location` int(255) NOT NULL,
  `end_location` int(255) NOT NULL,
  `total_fee` int(255) NOT NULL,
  `res_phone` int(255) NOT NULL,
  `red_address` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL,
  `tracking_status` int(10) NOT NULL,
  `res_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `header_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `about_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `about_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `company_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `sub_image` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twiiter` varchar(255) NOT NULL,
  `link_instragram` varchar(255) NOT NULL,
  `background_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`header_image`, `header_title`, `header_desc`, `about_title`, `about_desc`, `company_phone`, `company_email`, `company_address`, `sub_image`, `link_facebook`, `link_twiiter`, `link_instragram`, `background_image`) VALUES
('Header.jpg', 'Welcome to 2NK SACCO', '', '', '2NK Sacco Courier Ltd takes a proactive approach towards business, We believe that our integrity, dedication, competitive rates and superior customer service sets the standards for others in our industry. We have become the preferred courier to many businesses and individuals. At 2NK Sacco we pride ourselves on personalized service and our commitment to our customers. 2NK SACCO offers an extensive list of transportation choices to better serve our customers needs.', '0721 374 310', 'info@2nksacco.co.ke', 'Head Office, Kangaru Corner House', 'About.jpg', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'Background.jpg'),
('Header.jpg', 'Welcome to 2NK SACCO', 'Your Premier Domestic Courier Service Provider', 'Welcome to 2NK SACCO', '2NK Sacco Courier Ltd takes a proactive approach towards business, We believe that our integrity, dedication, competitive rates and superior customer service sets the standards for others in our industry. We have become the preferred courier to many businesses and individuals. At 2NK Sacco we pride ourselves on personalized service and our commitment to our customers. 2NK SACCO offers an extensive list of transportation choices to better serve our customers needs.', '0721 374 310', 'info@2nksacco.co.ke', 'Head Office, Kangaru Corner House', 'About.jpg', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'Background.jpg\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `price_table`
--
ALTER TABLE `price_table`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `price_table`
--
ALTER TABLE `price_table`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
