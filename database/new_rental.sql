-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 11:13 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipment` (
  `equipment_id` int(20) NOT NULL,
  `equipment_name` varchar(50) NOT NULL,
  `equipment_type` varchar(20) NOT NULL,
  `equipment_img` varchar(50) DEFAULT 'NA',
  `equipment_price_per_hour` float NOT NULL,
  `equipment_price_per_day` float NOT NULL,
  `equipment_availability` varchar(10) NOT NULL,
  `equipment_longitude` float NOT NULL,
  `equipment_latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipment` (`equipment_id`, `equipment_name`, `equipment_type`,
  `equipment_img`, `equipment_price_per_hour`, `equipment_price_per_day`, 
  `equipment_availability`, `equipment_latitude`, `equipment_longitude`) VALUES
(1, 'Power Tiller', 'Tiller','assets/img/pics/tiller.jpg', 800, 2000, 'yes',12.9359538, 77.5358869),
(2, 'Power Weeder','Weeder','assets/img/pics/weeder.jpg', 700, 1800, 'yes',12.9359538, 77.5358869),

(3, 'Rotation Tiller','Tiller','assets/img/pics/rtiller.jpg', 1100, 3000, 'yes',12.9507432, 77.5847773),
(4, 'Harrow', 'Harrow', 'assets/img/pics/harrow.jpg', 900, 2200, 'yes', 12.9507432, 77.5847773),

(5, 'Husker', 'Husker', 'assets/img/pics/husk.jpg', 1300, 3000, 'yes',12.945072, 77.571343),
(6, 'Knotter', 'Knotter', 'assets/img/pics/knotter.png', 1200, 2800, 'yes',12.945072, 77.571343),

(7, 'Log Machine', 'Machine', 'assets/img/pics/LogMaker.jpg', 1000, 2400, 'yes',12.9293653, 77.5569265),
(8, 'Land Leveller', 'Leveller', 'assets/img/pics/leveller.jpg', 800, 2000, 'yes',12.9293653, 77.5569265),
(9, 'Reaper', 'Reaper', 'assets/img/pics/Reaper.jpg', 1000, 2400, 'yes',12.9293653, 77.5569265),
(10, 'Chetak Tiller', 'Tiller', 'assets/img/cars/chetak.jpg', 1500, 2500, 'yes',12.9293653, 77.5569265),

(11, 'Multi Tiller', 'Tiller', 'assets/img/cars/multitiller.jpg', 1500, 3500, 'yes',13.0098328, 77.55109639999999),
(12, 'Starter Tools', 'Tools', 'assets/img/cars/toolkit.jpg', 200, 1000, 'yes',13.0098328, 77.55109639999999),
(13, 'Dapco Tractor', 'Tractor', 'assets/img/cars/dapco.jpg', 3000, 6000, 'yes',13.0098328, 77.55109639999999),
(14, 'Chetak digger', 'Digger', 'assets/img/cars/digger.jpg', 750, 900, 'yes',13.0098328, 77.55109639999999);

-- --------------------------------------------------------

--
-- Table structure for table `renterequipments`
--

CREATE TABLE `renter_to_equipment` (
  `equipment_id` int(20) NOT NULL,
  `renter_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `renterequipments`
--

INSERT INTO `renter_to_equipment` (`equipment_id`, `renter_username`) VALUES
(1,'guru_bhat'),
(2,'guru_bhat'),
(3,'jai_agarwal'),
(4,'jai_agarwal'),
(5,'kartik_n'),
(6,'kartik_n'),
(7,'keertan_krishnan'),
(8,'keertan_krishnan'),
(9,'keertan_krishnan'),
(10,'keertan_krishnan'),
(11,'lakshana_kolur'),
(12,'lakshana_kolur'),
(13,'lakshana_kolur'),
(14,'lakshana_kolur');

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `renter_username` varchar(50) NOT NULL,
  `renter_name` varchar(50) NOT NULL,
  `renter_phone` varchar(15) NOT NULL,
  `renter_email` varchar(25) NOT NULL,
  `renter_address` varchar(500) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `renter_password` varchar(20) NOT NULL,
  `renter_wallet` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `renters`
--

INSERT INTO `renters` (`renter_username`, `renter_name`, `renter_phone`, `renter_email`, `renter_address`, `renter_password`,`renter_wallet`) VALUES
('guru_bhat', 'Guru', '86623558666', 'gru@ymail.com', 'Vasundhara Krithika, Bangalore', 'admin', 10000.0),
('jai_agarwal', 'Jai', '86623558666', 'jai@ymail.com', 'Lalbagh, Bengaluru, Karnataka', 'admin', 10000.0),
('kartik_n', 'Kartik', '86623558666', 'kartik@ymail.com', 'Vidhyarthi Bhavan, Bangalore', 'admin', 10000.0),
('keertan_krishnan', 'Keertan', '86623558666', 'keertan@ymail.com', 'ISKCON Temple, Bangalore', 'admin', 10000.0),
('lakshana_kolur', 'Lakshana', '86623558666', 'lakshanakolur@ymail.com', 'Kathriguppe, Bangalore', 'admin', 10000.0);
-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_address` varchar(150) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `customer_password` varchar(20) NOT NULL,
  `customer_wallet` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`,`customer_wallet`) VALUES
('hemant_kumar', 'Hemant', '86623558666', 'hemant_kumar@ymail.com', 'Mysore Road Metro, Bangalore', 'admin', 10000.0),
('kartik_janardhan', 'KJ', '86623558666', 'kartik_janardhan@ymail.com', 'RVCE, Bangalore', 'admin', 10000.0),
('kartik_r', 'Kartik', '86623558666', 'kartik_r@ymail.com', 'Orion Mall, Bangalore', 'admin', 10000.0),
('manas_l', 'Manas', '86623558666', 'manas_l@ymail.com', 'RMZ Ecospace, Bangalore', 'admin', 10000.0),
('jayapriya_s', 'Jaya', '86623558666', 'jayapriya_s@ymail.com', 'Byappanahalli Metro, Bangalore', 'admin', 10000.0);

-- --------------------------------------------------------



--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `e_mail`, `message`) VALUES
('Guru', 'gru@gmail.com', 'Hope this works.');

-- --------------------------------------------------------

--
-- Table structure for table `rentedequipments`
--

CREATE TABLE `rentedequipments` (
  `row_number` int(100) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `equipment_id` int(20) NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `equipment_return_date` date DEFAULT NULL,
  `equipment_return_time` time DEFAULT NULL,
  `fare` double NOT NULL,
  `charge_type` varchar(25) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `return_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentedequipments`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `renterequipments`
--
ALTER TABLE `renter_to_equipment`
  ADD PRIMARY KEY (`equipment_id`),
  ADD KEY `renter_username` (`renter_username`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`renter_username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_username`);



--
-- Indexes for table `rentedequipments`
--
ALTER TABLE `rentedequipments`
  ADD PRIMARY KEY (`row_number`),
  ADD KEY `customer_username` (`customer_username`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(20) NOT NULL AUTO_INCREMENT;



--
-- AUTO_INCREMENT for table `rentedequipments`
--
ALTER TABLE `rentedequipments`
  MODIFY `row_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `renterequipments`
--
ALTER TABLE `renter_to_equipment`
  ADD CONSTRAINT `rentertoequipment_ibfk_1` FOREIGN KEY (`renter_username`) REFERENCES `renters` (`renter_username`),
  ADD CONSTRAINT `rentertoequipment_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`equipment_id`);



--
-- Constraints for table `rentedequipments`
--
ALTER TABLE `rentedequipments`
  ADD CONSTRAINT `rentedequipments_ibfk_1` FOREIGN KEY (`customer_username`) REFERENCES `customers` (`customer_username`),
  ADD CONSTRAINT `rentedequipments_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`equipment_id`);

COMMIT;
