-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 11:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `ticket_no` varchar(30) NOT NULL,
  `seat_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `name`, `type`, `age`, `gender`, `ticket_no`, `seat_no`) VALUES
(1, 'Umar Farooq', 'Economic', 20, 'Male', '706695556AK', '72'),
(5, 'John Doe', 'Economic', 33, 'Male', '341766357AK', '73'),
(6, 'Umar Yusuf', 'First Class', 20, 'Male', '543243408AK', '74'),
(7, 'John Doe', 'Economic', 18, 'Male', '857299804AK', '384'),
(8, 'Musa Idris', 'First Class', 30, 'Male', '930053710AK', '65');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `card_no` varchar(30) NOT NULL,
  `cvv` int(11) NOT NULL,
  `valid_date` varchar(30) NOT NULL,
  `ticket_no` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `owner`, `card_no`, `cvv`, `valid_date`, `ticket_no`, `amount`) VALUES
(1, 'Umar Farooq', '5281', 43, 'January 2020', '706695556AK', 1900),
(2, 'John Doe', '4716', 257, 'January 2018', '341766357AK', 950),
(3, 'Umar Yusuf', '5281 0370 4891 6168', 43, 'December 2020', '543243408AK', 950),
(4, 'John Doe', '4716 1089 9971 6531', 257, 'January 2018', '857299804AK', 950),
(5, 'Musa Idris', '5281 0370 4891 6168', 43, 'January 2020', '930053710AK', 950);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `d_time` varchar(30) NOT NULL,
  `a_time` varchar(30) NOT NULL,
  `passenger_no` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `ticket_no` varchar(30) NOT NULL,
  `seat_no` varchar(15) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `source`, `destination`, `d_time`, `a_time`, `passenger_no`, `fullname`, `ticket_no`, `seat_no`, `date`) VALUES
(1, 'Abuja', 'Kaduna', '7:50am', '9:50am', 2, 'Umar Farooq', '706695556AK', '72', '6th Dec, 2017'),
(5, 'Kaduna', 'Abuja', '5:00pm', '7:00pm', 1, 'John Doe', '341766357AK', '73', '06th Dec, 2017'),
(6, 'Kaduna', 'Abuja', '10:30am', '12:30pm', 1, 'Umar Yusuf', '543243408AK', '74', '2017-12-20'),
(7, 'Abuja', 'Kaduna', '7:50am', '9:50am', 1, 'John Doe', '857299804AK', '384', '2017-12-18'),
(8, 'Abuja', 'Kaduna', '2:30pm', '4:30pm', 1, 'Musa Idris', '930053710AK', '65', '2017-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `d_time` varchar(15) NOT NULL,
  `a_time` varchar(15) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `source`, `destination`, `d_time`, `a_time`, `price`) VALUES
(1, 'Abuja', 'Kaduna', '7:50am', '9:50am', 950),
(2, 'Kaduna', 'Abuja', '10:30am', '12:30pm', 950),
(3, 'Abuja', 'Kaduna', '2:30pm', '4:30pm', 950),
(4, 'Kaduna', 'Abuja', '5:00pm', '7:00pm', 950);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `dob`, `email`, `date`, `status`) VALUES
(4, 'umar', '92deb3f274aaee236194c05729bfa443', 'Umar', 'Yusuf', '17/07/1996', 'umar@site.com', '05th Dec, 2017', 0),
(5, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
