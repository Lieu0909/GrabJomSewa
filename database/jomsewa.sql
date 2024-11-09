-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2019 at 12:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jomsewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `Ann_id` int(11) NOT NULL,
  `Ann_title` varchar(100) NOT NULL,
  `Ann_date` date NOT NULL,
  `Ann_content` varchar(1000) NOT NULL,
  `Ann_image` varchar(50) NOT NULL,
  `Driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_id` int(11) NOT NULL,
  `Booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Booking_pickup_point` varchar(100) NOT NULL,
  `Booking_destination` varchar(100) NOT NULL,
  `Booking_fees` varchar(10) NOT NULL,
  `Booking_service_type` varchar(100) NOT NULL,
  `Other_Service` varchar(100) NOT NULL,
  `Booking_est_time` varchar(10) NOT NULL,
  `Booking_status` varchar(100) NOT NULL,
  `Booking_kilo` varchar(10) NOT NULL,
  `Earning_points` int(11) NOT NULL,
  `Customer_id` int(10) NOT NULL,
  `Driver_id` int(11) NOT NULL,
  `Vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_id`, `Booking_date`, `Booking_pickup_point`, `Booking_destination`, `Booking_fees`, `Booking_service_type`, `Other_Service`, `Booking_est_time`, `Booking_status`, `Booking_kilo`, `Earning_points`, `Customer_id`, `Driver_id`, `Vehicle_id`) VALUES
(29, '2019-05-07 22:00:16', 'UMP AREAKK1', 'GAMBANG', '12', 'Grab Go(Fixed Fare)', 'Food', '5MIN', 'Booked', '4.3KM', 0, 7, 2, 4),
(30, '2019-05-07 22:02:36', 'KUANTAN', 'UMP AREAKK2', '40', 'Grab Go(Fixed Fare)', 'Food', '10MIN', 'Cancelled', '31KM', 15, 7, 3, 59),
(31, '2019-05-07 22:03:02', 'UMP AREA', 'GAMBANG', '7', 'Grab Go(Fixed Fare)', 'Food', '5MIN', 'Booked', '4.3KM', 0, 7, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` int(100) NOT NULL,
  `Customer_name` varchar(100) NOT NULL,
  `Customer_email` varchar(100) NOT NULL,
  `Customer_contact` int(11) NOT NULL,
  `Customer_password` varchar(100) NOT NULL,
  `Customer_dob` date NOT NULL,
  `Customer_address` varchar(100) NOT NULL,
  `Customer_city` varchar(100) NOT NULL,
  `Customer_zip` int(11) NOT NULL,
  `Customer_state` varchar(100) NOT NULL,
  `Customer_img` varchar(255) NOT NULL,
  `Customer_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_id`, `Customer_name`, `Customer_email`, `Customer_contact`, `Customer_password`, `Customer_dob`, `Customer_address`, `Customer_city`, `Customer_zip`, `Customer_state`, `Customer_img`, `Customer_point`) VALUES
(7, 'test', 'test@gmail.com', 123456789, '098f6bcd4621d373cade4e832627b4f6', '1996-09-07', 'No 13, Kg Sg Ramel Liar', 'Kajang', 43000, 'Selangor', '24af874e674b1055405efd1ecbe4a874.jpg', 5),
(8, 'user', 'user@gmail.com', 123, 'ee11cbb19052e40b07aac0ca060c23ee', '0000-00-00', '', '', 0, '0', 'people.png', 17),
(10, 'abc', 'abc@gmail.com', 123, '202cb962ac59075b964b07152d234b70', '0000-00-00', '', '', 0, '', 'people.png', 0),
(11, 'qqq', 'qqq@gmail.com', 111, 'b2ca678b4c936f905fb82f2733f5297f', '0000-00-00', '', '', 0, '', 'people.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `Driver_id` int(11) NOT NULL,
  `Driver_name` varchar(100) NOT NULL,
  `Driver_email` varchar(100) NOT NULL,
  `Driver_contact` int(20) NOT NULL,
  `Driver_password` varchar(100) NOT NULL,
  `Driver_age` int(10) NOT NULL,
  `Driver_race` varchar(100) NOT NULL,
  `Driver_dob` date NOT NULL,
  `Driver_address` varchar(100) NOT NULL,
  `Driver_city` varchar(100) NOT NULL,
  `Driver_zip` int(10) NOT NULL,
  `Driver_state` varchar(100) NOT NULL,
  `Driver_img` varchar(500) NOT NULL,
  `Driver_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`Driver_id`, `Driver_name`, `Driver_email`, `Driver_contact`, `Driver_password`, `Driver_age`, `Driver_race`, `Driver_dob`, `Driver_address`, `Driver_city`, `Driver_zip`, `Driver_state`, `Driver_img`, `Driver_status`) VALUES
(1, 'david', '', 0, '', 0, '', '0000-00-00', '', '', 0, '', '', ''),
(2, 'tom', '', 0, '', 0, '', '0000-00-00', '', '', 0, '', '', ''),
(3, 'AAA', 'violakiung6070@gmail.com', 196199131, '698d51a19d8a121ce581499d7b701668', 0, '', '0000-00-00', '', '', 0, '', 'people.png', 'APPROVED'),
(4, 'RAYSON TAN', 'rayson1234@gmail.com', 198244567, '1129f9b1ba565b8be1541a88d25eddb9', 21, 'CHINESE', '1998-10-14', 'JLN HUSSEIN ONN', 'JOHOR', 56000, 'SEMENANJUNG MALAYSIA', 'people.png', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Route_ID` varchar(10) NOT NULL,
  `Route_from` varchar(50) NOT NULL,
  `Route_to` varchar(50) NOT NULL,
  `distance` float NOT NULL,
  `fees` float NOT NULL,
  `Bfees` float NOT NULL,
  `Sfees` float NOT NULL,
  `SB_fees` float NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Route_ID`, `Route_from`, `Route_to`, `distance`, `fees`, `Bfees`, `Sfees`, `SB_fees`, `points`) VALUES
('R001', 'UMP AREA', 'GAMBANG', 4.3, 7, 12, 1.75, 5, 0),
('R002', 'UMP AREA', 'TAMAN TAS', 8.4, 15, 20, 3.75, 8.75, 2),
('R003', 'UMP AREA', 'KUANTAN', 31, 35, 40, 8.75, 13.75, 15),
('R004', 'UMP AREA', 'TSK', 29, 28, 33, 7, 12, 5),
('R005', 'TSK', 'UMP AREA', 29, 28, 33, 7, 12, 5),
('R006', 'GAMBANG', 'UMP AREA', 4.3, 7, 12, 1.75, 5, 0),
('R007', 'TAMAN TAS', 'UMP AREA', 8.4, 15, 20, 3.75, 8.75, 2),
('R008', 'KUANTAN', 'UMP AREA', 31, 35, 40, 8.75, 13.75, 15);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `Main_id` int(10) NOT NULL,
  `Main_date` date NOT NULL,
  `Main_company` varchar(20) NOT NULL,
  `Main_service` varchar(20) NOT NULL,
  `Vehicle_id` int(10) NOT NULL,
  `Driver_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`Main_id`, `Main_date`, `Main_company`, `Main_service`, `Vehicle_id`, `Driver_id`) VALUES
(1, '2019-05-07', 'hgvgvt', 'Tune-up', 59, 3),
(2, '2019-06-07', '3w3d3e', 'Transmission', 60, 8);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rating_id` int(100) NOT NULL,
  `Driver_name` varchar(100) NOT NULL,
  `Feedback` varchar(100) NOT NULL,
  `Rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Rating_id`, `Driver_name`, `Feedback`, `Rating`) VALUES
(1, 'Rayson', 'GOOD  SERVICES', 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Services_id` int(100) NOT NULL,
  `Other_services` varchar(100) NOT NULL,
  `Driver_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Services_id`, `Other_services`, `Driver_id`) VALUES
(1, 'Food', 3),
(2, 'Sweet', 1),
(3, 'Food', 2),
(4, 'Mineral Water', 1),
(5, 'Tissue', 2),
(6, 'Coke', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_id` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Estimate_time` int(11) NOT NULL,
  `Driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_id`, `Status`, `Estimate_time`, `Driver_id`) VALUES
(1, 'ON', 10, 1),
(2, 'ON', 5, 2),
(3, 'ON', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_id` int(100) NOT NULL,
  `Vehicle_model` varchar(100) NOT NULL,
  `Vehicle_color` varchar(10) NOT NULL,
  `Vehicle_plate` varchar(10) NOT NULL,
  `Vehicle_seats` int(11) NOT NULL,
  `Driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_id`, `Vehicle_model`, `Vehicle_color`, `Vehicle_plate`, `Vehicle_seats`, `Driver_id`) VALUES
(1, 'Proton X70', 'Blue', 'SUI 5321', 6, 3),
(2, 'Perodua Myvi', 'Blue', 'jgy 689', 4, 3),
(3, 'Perodua Myvi', 'Blue', 'abc 123', 4, 2),
(4, 'Proton Saga', 'Red', 'HUT 9749', 4, 2),
(5, 'Proton X70', 'Red', 'ad f444', 6, 1),
(59, 'Proton X70', 'Red', 'mmm7789', 4, 3),
(60, 'Proton Saga', 'Silver', 'aaa123', 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`Ann_id`),
  ADD KEY `Driver_id` (`Driver_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_id`),
  ADD KEY `Driver_id` (`Driver_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Driver_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Route_ID`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`Main_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rating_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Services_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_id`),
  ADD KEY `Driver_id` (`Driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `Ann_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `Driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `Main_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Rating_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Services_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `Vehicle_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`Driver_id`) REFERENCES `driver` (`Driver_id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Driver_id`) REFERENCES `driver` (`Driver_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
