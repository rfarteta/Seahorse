-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2017 at 07:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CWS_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `uc_address`
--

CREATE TABLE `uc_address` (
  `id_address` int(11) NOT NULL,
  `address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `postalcode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_address`
--

INSERT INTO `uc_address` (`id_address`, `address`, `city`, `region`, `postalcode`) VALUES
(1, 'something', 'manila', 'Metromanila', '1111'),
(10, '101 building', 'BGC', 'NCR', '111');

-- --------------------------------------------------------

--
-- Table structure for table `uc_configuration`
--

CREATE TABLE `uc_configuration` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'Susan Ice Store'),
(2, 'website_url', 'localhost/'),
(3, 'email', 'noreply@ILoveUserCake.com'),
(4, 'activation', 'false'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/en.php'),
(7, 'template', 'models/site-templates/default.css'),
(8, 'externalCss', 'https://code.getmdl.io/1.3.0/material.pink-light_blue.min.css'),
(9, 'font', 'https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en'),
(10, 'externalJs', 'https://code.getmdl.io/1.3.0/material.min.js'),
(11, 'icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');

-- --------------------------------------------------------

--
-- Table structure for table `uc_customer`
--

CREATE TABLE `uc_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_lname` varchar(45) NOT NULL,
  `customer_fname` varchar(45) NOT NULL,
  `customer_address` varchar(45) NOT NULL,
  `customer_email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_customer`
--

INSERT INTO `uc_customer` (`customer_id`, `customer_lname`, `customer_fname`, `customer_address`, `customer_email`) VALUES
(10, 'test', 'user', '101 building', '');

-- --------------------------------------------------------

--
-- Table structure for table `uc_employee`
--

CREATE TABLE `uc_employee` (
  `emp_id` int(11) NOT NULL,
  `Id_address` varchar(45) NOT NULL,
  `emp_contact` varchar(45) NOT NULL,
  `emp_fname` varchar(45) NOT NULL,
  `emp_lname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_inventory`
--

CREATE TABLE `uc_inventory` (
  `prod_id` int(11) NOT NULL,
  `item_details` varchar(45) NOT NULL,
  `owner_loginInfo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_logs`
--

CREATE TABLE `uc_logs` (
  `lid` int(11) NOT NULL,
  `lsource` int(11) NOT NULL,
  `ldescription` varchar(64) NOT NULL,
  `ldatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_logs`
--

INSERT INTO `uc_logs` (`lid`, `lsource`, `ldescription`, `ldatetime`) VALUES
(1, 1, 'got it correct with question id: 3answered: 2', '2017-02-13 08:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `uc_owner`
--

CREATE TABLE `uc_owner` (
  `owner_id` int(11) NOT NULL,
  `owner_fname` varchar(45) NOT NULL,
  `owner_lname` varchar(45) NOT NULL,
  `owner_loginInfo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_pages`
--

CREATE TABLE `uc_pages` (
  `id` int(11) NOT NULL,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `private`) VALUES
(1, 'account.php', 1),
(2, 'activate-account.php', 0),
(3, 'admin_configuration.php', 1),
(4, 'admin_page.php', 1),
(5, 'admin_pages.php', 1),
(6, 'admin_permission.php', 1),
(7, 'admin_permissions.php', 1),
(8, 'admin_user.php', 1),
(9, 'admin_users.php', 1),
(10, 'forgot-password.php', 0),
(11, 'index.php', 0),
(12, 'left-nav.php', 0),
(13, 'login.php', 0),
(14, 'logout.php', 1),
(15, 'register.php', 0),
(16, 'resend-activation.php', 0),
(17, 'user_settings.php', 1),
(18, 'question_create.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uc_permissions`
--

CREATE TABLE `uc_permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`) VALUES
(1, 'New Member'),
(2, 'Administrator'),
(3, 'Employee'),
(4, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `uc_permission_page_matches`
--

CREATE TABLE `uc_permission_page_matches` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 17),
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9),
(12, 2, 14),
(13, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `uc_product`
--

CREATE TABLE `uc_product` (
  `prod_id` int(11) NOT NULL,
  `prod_description` char(45) NOT NULL,
  `prod_category` varchar(45) NOT NULL,
  `prod_name` varchar(45) NOT NULL,
  `prod_price` decimal(9,2) NOT NULL,
  `supp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_product`
--

INSERT INTO `uc_product` (`prod_id`, `prod_description`, `prod_category`, `prod_name`, `prod_price`, `supp_id`) VALUES
(1, 'asd', 'asd', 'asd', '10.00', 1),
(2, 'Ice', 'bits and pieces of ice', 'Crushed Ice', '100.00', 1),
(3, 'Villian', 'Ice Villain', 'Mr. Freeze', '1000.00', 2),
(4, 'Ice', 'Tears of Shiva', 'Ice Ice Baby', '1000.00', 2),
(5, 'Ice', 'Ice', 'Ice Monster', '33.10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uc_shipment`
--

CREATE TABLE `uc_shipment` (
  `shipment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_shipment`
--

INSERT INTO `uc_shipment` (`shipment_id`, `customer_id`, `status`) VALUES
(12, 1, 1),
(13, 1, 1),
(14, 1, 0),
(15, 6, 0),
(16, 6, 0),
(17, 7, 0),
(18, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uc_supplier`
--

CREATE TABLE `uc_supplier` (
  `supp_id` int(11) NOT NULL,
  `supp_name` varchar(45) NOT NULL,
  `supp_address` varchar(45) NOT NULL,
  `supp_contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_supplier`
--

INSERT INTO `uc_supplier` (`supp_id`, `supp_name`, `supp_address`, `supp_contact`) VALUES
(1, 'Microsoft', 'antartica', '09122222222'),
(2, 'Batman', 'Gotham', '911');

-- --------------------------------------------------------

--
-- Table structure for table `uc_transaction`
--

CREATE TABLE `uc_transaction` (
  `order_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_transaction`
--

INSERT INTO `uc_transaction` (`order_id`, `shipment_id`, `prod_id`, `amount`, `quantity`, `time`, `user_id`) VALUES
(7, 12, 2, '100.00', 2, '2017-02-27 10:37:37', 1),
(8, 13, 1, '10.00', 1, '2017-02-27 10:37:37', 1),
(9, 14, 2, '100.00', 2, '2017-02-27 10:37:37', 1),
(10, 15, 1, '10.00', 1, '2017-02-27 17:56:13', 6),
(11, 16, 2, '100.00', 2, '2017-02-27 17:56:13', 6),
(12, 17, 2, '100.00', 2, '2017-02-27 18:11:53', 7),
(13, 18, 2, '100.00', 2, '2017-02-27 18:11:53', 7);

-- --------------------------------------------------------

--
-- Table structure for table `uc_users`
--

CREATE TABLE `uc_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`) VALUES
(1, 'admin', 'admin', '7f5c26009b4e6dc747e55327a52c74721e114ace7945bfb007429dc9d1c6b29b4', 'cfcpoblete@gmail.com', '8274eb23ad4ad466d3974d55f17c2603', 1486541271, 0, 1, 'New Member', 1486541271, 1488219078),
(7, 'test@user.com', '10', '5f1ffea30ccad8a727a47fa68d699c67ad953ca74e05d4836ae89afc4bc778361', 'test@user.com', '72b9cb71f1ab533de58359b0ea68166a', 1488218961, 0, 1, 'New Member', 1488218961, 1488219106);

-- --------------------------------------------------------

--
-- Table structure for table `uc_user_permission_matches`
--

CREATE TABLE `uc_user_permission_matches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 0, 1),
(4, 0, 1),
(5, 2, 1),
(6, 3, 1),
(7, 4, 1),
(8, 5, 1),
(9, 0, 1),
(10, 0, 1),
(11, 0, 1),
(12, 0, 1),
(13, 2, 1),
(14, 3, 1),
(15, 4, 1),
(16, 5, 1),
(17, 6, 1),
(18, 6, 2),
(19, 7, 1),
(20, 7, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uc_address`
--
ALTER TABLE `uc_address`
  ADD PRIMARY KEY (`id_address`);

--
-- Indexes for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_customer`
--
ALTER TABLE `uc_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `uc_employee`
--
ALTER TABLE `uc_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `uc_inventory`
--
ALTER TABLE `uc_inventory`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `uc_logs`
--
ALTER TABLE `uc_logs`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `uc_owner`
--
ALTER TABLE `uc_owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `uc_pages`
--
ALTER TABLE `uc_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_product`
--
ALTER TABLE `uc_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `uc_shipment`
--
ALTER TABLE `uc_shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `uc_supplier`
--
ALTER TABLE `uc_supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `uc_transaction`
--
ALTER TABLE `uc_transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `uc_users`
--
ALTER TABLE `uc_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uc_address`
--
ALTER TABLE `uc_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `uc_customer`
--
ALTER TABLE `uc_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `uc_employee`
--
ALTER TABLE `uc_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uc_inventory`
--
ALTER TABLE `uc_inventory`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uc_logs`
--
ALTER TABLE `uc_logs`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uc_owner`
--
ALTER TABLE `uc_owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uc_pages`
--
ALTER TABLE `uc_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `uc_product`
--
ALTER TABLE `uc_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `uc_shipment`
--
ALTER TABLE `uc_shipment`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `uc_supplier`
--
ALTER TABLE `uc_supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uc_transaction`
--
ALTER TABLE `uc_transaction`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `uc_users`
--
ALTER TABLE `uc_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
