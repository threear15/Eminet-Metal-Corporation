-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2017 at 11:07 AM
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
  `unique_question` varchar(250) NOT NULL,
  `unique_answer` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `status`, `f_name`, `m_name`, `l_name`, `age`, `gender`, `m_number`, `tel_number`, `brgy`, `city`, `h_address`, `gmail`, `password`, `unique_question`, `unique_answer`, `date`) VALUES
(26, 'Pending', 'Three Ar', 'Acido', 'Sempron', '25', 'Male', '09127925287', 'none', 'Muzon', 'San Jose Del Monte Bulacan', 'villa ilagan sitio panaklayan b-6 l-6 phase II', 'sempronthreear@gmail.com', '050ce07e8026834884d7386c60f68376', 'ano ako?', 'tao', '2017-09-05 04:55:46'),
(27, 'Pending', 'Irene', 'Acido', 'Sempron', '29', 'Female', '09281928271', 'noen', 'Muzon', 'San Jose Del Monte Bulacan', 'villa ilagan sitio panaklayan b-6 l-6 phase II', 'irenesempron@gmail.com', '050ce07e8026834884d7386c60f68376', 'ano ako?', 'babae', '2017-09-05 04:58:23'),
(28, 'Pending', 'Hilda', 'Acido', 'Sempron', '27', 'Female', '09123123123', 'noe', 'none', 'none', 'noe', 'hidla@gmail.com', '050ce07e8026834884d7386c60f68376', 'ano?', 'ano', '2017-09-05 05:32:05'),
(29, 'Pending', 'Anthony', 'Miralles', 'Almenario', '28', 'Male', '09281223341', 'none', 'none', 'none', 'none', 'anthony@gmail.com', '050ce07e8026834884d7386c60f68376', 'ano', 'ano', '2017-09-05 05:34:27'),
(30, 'Pending', 'Widar', 'Eew', 'Placio', '28', 'Male', '09232131232', 'none', 'Muzon', 'San Jose Del Monte Bulacan', 'villa ilagan sitio panaklayan b-6 l-6 phase II', 'widarplacio@gmail.com', '30a21f39dc7f739fab153b53d53d1866', 'ako', 'ako', '2017-09-05 07:53:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
