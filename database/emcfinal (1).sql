-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 10:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emcfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_pending`
--

CREATE TABLE `cart_pending` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_headstyle` varchar(250) NOT NULL,
  `product_color` text NOT NULL,
  `product_size` text NOT NULL,
  `product_image` text NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_total` int(100) NOT NULL,
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_1`
--

CREATE TABLE `category_1` (
  `cat1_id` int(10) UNSIGNED NOT NULL,
  `cat1_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_1`
--

INSERT INTO `category_1` (`cat1_id`, `cat1_name`) VALUES
(1, 'Standard Products');

-- --------------------------------------------------------

--
-- Table structure for table `category_2`
--

CREATE TABLE `category_2` (
  `cat2_id` int(10) UNSIGNED NOT NULL,
  `cat2_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_2`
--

INSERT INTO `category_2` (`cat2_id`, `cat2_name`) VALUES
(2, 'Special Products');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_color` varchar(250) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_cat1` int(100) NOT NULL,
  `product_cat2` int(100) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_headstyle` varchar(250) NOT NULL,
  `product_pieces` varchar(250) NOT NULL,
  `product_color` text NOT NULL,
  `product_size` text NOT NULL,
  `product_price` double(12,2) NOT NULL,
  `product_image` text NOT NULL,
  `product_stocks` int(100) NOT NULL,
  `product_keyword` text NOT NULL,
  `product_description` text NOT NULL,
  `date1` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_cat1`, `product_cat2`, `product_name`, `product_headstyle`, `product_pieces`, `product_color`, `product_size`, `product_price`, `product_image`, `product_stocks`, `product_keyword`, `product_description`, `date1`) VALUES
(16, 'EMC11001', 0, 0, 'Cap Screw', 'Hexagonal Head', '164 pcs/stock', 'black\r\nbl', 'M6 by 10\n\n', 200.00, 'M6X10 TO M6X60 Hexagon Head.jpg', 900, '', '', '2017-09-15 02:34:41'),
(17, 'eqweqw', 0, 0, 'sss', '', '', '', '', 100.00, '', 900, '', '', '2017-09-24 04:22:24'),
(18, 'qweqwe', 0, 0, 'sssssssdadas', '', '', '', '', 200.00, '', 900, '', '', '2017-09-24 04:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `received_payment`
--

CREATE TABLE `received_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` varchar(250) NOT NULL,
  `pid` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `transaction_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `received_payment`
--

INSERT INTO `received_payment` (`id`, `uid`, `pid`, `amount`, `transaction_id`) VALUES
(14, 'Three Ar', '0', 'Php600.00', '44570087VU405914T'),
(15, 'Three Ar', '0', 'Php500.00', '65N7490801213664Y'),
(16, 'Rica', '0', 'Php200.00', '3UW08535GG7140443'),
(17, 'Rica', '0', 'Php300.00', '1KN03913J82553806'),
(18, 'Widar', '0', 'Php4100.00', '52W25561NU739761L'),
(19, 'Widar', '0', 'Php200.00', '6VU86931EF4428225');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_customer_name` varchar(250) NOT NULL,
  `order_item` varchar(250) NOT NULL,
  `order_value` double(12,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `toal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_customer_name`, `order_item`, `order_value`, `order_date`, `toal`) VALUES
(1, 'a', 'b', 800.00, '2017-09-12 08:21:24', '3'),
(2, 'd', 'e', 200.00, '2017-09-12 08:00:59', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(250) NOT NULL,
  `f_name` varchar(250) NOT NULL,
  `m_name` varchar(250) NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `m_number` varchar(250) NOT NULL,
  `tel_number` varchar(250) NOT NULL,
  `brgy` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `h_address` varchar(250) NOT NULL,
  `gmail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `code` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `status`, `f_name`, `m_name`, `l_name`, `age`, `gender`, `m_number`, `tel_number`, `brgy`, `city`, `h_address`, `gmail`, `password`, `code`, `date`) VALUES
(80, 'Approved', 'Three Ar', 'Acdio', 'Sempron', '29', 'Male', '9127925287', 'none', 'none', 'none', 'noe', 'sempronthreear@gmail.com', '050ce07e8026834884d7386c60f68376', '<html><head></head><body>\r\n<script>\r\n\r\n	$(document).ready(function() {\r\n		\r\n		$(''#calendar'').fullCalendar({\r\n			header: {\r\n				left: ''prev,next today'',\r\n				center: ''title'',\r\n				right: ''month,agendaWeek,agendaDay,listWeek''\r\n			},\r\n			defaultDate: ''2016-09-12'',\r\n			navLinks: true, // can click day/week names to navigate views\r\n\r\n			weekNumbers: true,\r\n			weekNumbersWithinDays: true,\r\n			weekNumberCalculation: ''ISO'',\r\n\r\n			editable: true,\r\n			eventLimit: true, // allow "more" link when too many events\r\n			events: [\r\n				{\r\n					title: ''All Day Event'',\r\n					start: ''2016-09-01''\r\n				},\r\n				{\r\n					title: ''Long Event'',\r\n					start: ''2016-09-07'',\r\n					end: ''2016-09-10''\r\n				},\r\n				{\r\n					id: 999,\r\n					title: ''Repeating Event'',\r\n					start: ''2016-09-09T16:00:00''\r\n				},\r\n				{\r\n					id: 999,\r\n					title: ''Repeating Event'',\r\n					start: ''2016-09-16T16:00:00''\r\n				},\r\n				{\r\n					title: ''Conference'',\r\n					start: ''2016-09-11'',\r\n					end: ''2016-09-13''\r\n				},\r\n				{\r\n					title: ''Meeting'',\r\n					start: ''2016-09-12T10:30:00'',\r\n					end: ''2016-09-12T12:30:00''\r\n				},\r\n				{\r\n					title: ''Lunch'',\r\n					start: ''2016-09-12T12:00:00''\r\n				},\r\n				{\r\n					title: ''Meeting'',\r\n					start: ''2016-09-12T14:30:00''\r\n				},\r\n				{\r\n					title: ''Happy Hour'',\r\n					start: ''2016-09-12T17:30:00''\r\n				},\r\n				{\r\n					title: ''Dinner'',\r\n					start: ''2016-09-12T20:00:00''\r\n				},\r\n				{\r\n					title: ''Birthday Party'',\r\n					start: ''2016-09-13T07:00:00''\r\n				},\r\n				{\r\n					title: ''Click for Google'',\r\n					url: ''http://google.com/'',\r\n					start: ''2016-09-28''\r\n				}\r\n			]\r\n		});\r\n		\r\n	});\r\n\r\n</script>\r\n</body></html>', '2017-09-11 12:10:51'),
(82, 'Approved', 'Rica', 'Alquiros', 'Echaluce', '29', 'Female', '9127925287', 'none', 'none', 'none', 'none', 'ricaechaluce@gmail.com', '050ce07e8026834884d7386c60f68376', '', '2017-09-08 10:46:44'),
(83, 'Approved', 'Widar', 'Patricio', 'Placio', '29', 'Male', '9127925287', 'none', 'none', 'none', 'none', 'widarplacio@gmail.com', '050ce07e8026834884d7386c60f68376', '', '2017-09-24 08:24:03'),
(84, 'Approved', 'Anthony', 'Miralles', 'Almenario', '28', 'Male', '9127925287', 'noe', 'none', 'noen', 'none', 'anthonyalmenario@gmail.com', '050ce07e8026834884d7386c60f68376', '', '2017-09-24 08:49:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_pending`
--
ALTER TABLE `cart_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_1`
--
ALTER TABLE `category_1`
  ADD PRIMARY KEY (`cat1_id`);

--
-- Indexes for table `category_2`
--
ALTER TABLE `category_2`
  ADD PRIMARY KEY (`cat2_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `received_payment`
--
ALTER TABLE `received_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_pending`
--
ALTER TABLE `cart_pending`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `category_1`
--
ALTER TABLE `category_1`
  MODIFY `cat1_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category_2`
--
ALTER TABLE `category_2`
  MODIFY `cat2_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `received_payment`
--
ALTER TABLE `received_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
