-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 06:46 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `about_me` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `about_me`, `address`, `birthday`, `occupation`, `mobile`, `image`, `user_id`, `password`) VALUES
(1, 'test', 'admin', '', 'pune ', '', '', '', 'profile-icon1.png', 'testadmin@ivs.com', 'Pass123#');

-- --------------------------------------------------------

--
-- Table structure for table `books&journals_details`
--

CREATE TABLE `books&journals_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books&journals_details`
--

INSERT INTO `books&journals_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, 'sadas', 'sdasd', 'Chrysanthemum.jpg', 'sadasd', 'Koala.jpg', 'asda', 'sadas', '121', '21', '12', '21', '12', '22', '2018-02-26', '19:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `books&journals_full_details`
--

CREATE TABLE `books&journals_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `computerperipherals_details`
--

CREATE TABLE `computerperipherals_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `computerperipherals_details`
--

INSERT INTO `computerperipherals_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, 'asa', 'sasca', 'Chrysanthemum.jpg', 'xzczc', 'Chrysanthemum.jpg', 'sacas', 'ascas', 'nos', '21', '21', '23', '222', '455550', '2018-02-26', '18:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `computerperipherals_full_details`
--

CREATE TABLE `computerperipherals_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consumables_details`
--

CREATE TABLE `consumables_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consumables_details`
--

INSERT INTO `consumables_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, 'sw1', 'adasd', 'Chrysanthemum.jpg', 'adasd', 'Koala.jpg', 'dasdasdd', 'sdasdasd', 'nos', '121', '21', '21', '122', '2333', '2018-02-26', '19:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `consumables_full_details`
--

CREATE TABLE `consumables_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipments_details`
--

CREATE TABLE `equipments_details` (
  `id` int(11) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipments_details`
--

INSERT INTO `equipments_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(5, '1523', '1215/515', 'Koala.jpg', 'adad', 'Tulips.jpg', 'adawda', 'wdaw', 'nos', '121', '12', '21', '12', '2444', '2018-02-28', '17:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `equipments_full_details`
--

CREATE TABLE `equipments_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipments_full_details`
--

INSERT INTO `equipments_full_details` (`id`, `Supply Order no/date`, `Bill no.`, `D/C No.Date`, `Supplier`, `Description Of Material`, `Quantity Received`, `Rate`, `Amount`, `Department`, `Staff Name`, `Lab No.`, `Date`, `Quantity`, `Remaining`) VALUES
(9, '', '', '', '', 'wdaw', 21, '', '', 'Comp', 'tfh', 201, '12.02.18', 9, 12),
(10, '620', 'adad', '620', 'adawda', '121', 0, '12', '2444', 'Comp', 'asa', 211, '21021999', 35, 80),
(11, '620', 'adad', '620', 'adawda', '121', 0, '12', '2444', 'Comp', 'asa', 211, '21312', 21, 122),
(12, '121451', 'adad', '1212', 'adawda', 'wdaw', 121, '12', '2444', 'Comp', '210', 121, '25', 12, 0),
(13, '121451', 'adad', '1212', 'adawda', 'wdaw', 121, '12', '2444', 'Comp', '210', 121, '25', 12, 0),
(14, '121451', 'adad', '1212', 'adawda', 'wdaw', 121, '12', '2444', 'Comp', '210', 121, '25', 12, 0),
(15, '121451', 'adad', '1212', 'adawda', 'wdaw', 121, '12', '2444', 'Comp', '210', 121, '25', 12, 0),
(16, '121451', 'adad', '1212', 'adawda', 'wdaw', 121, '12', '2444', 'Comp', '210', 121, '25', 12, 0),
(17, '121451', 'adad', '1212', 'adawda', 'wdaw', 121, '12', '2444', 'Comp', '210', 121, '25', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `furniture_details`
--

CREATE TABLE `furniture_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `furniture_details`
--

INSERT INTO `furniture_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, 'wqwq', 'wqqw', 'Chrysanthemum.jpg', 'wqwq', 'Koala.jpg', 'qwqwq', 'qwqw', '121', '12', '122', '21', '1222', '232', '2018-02-26', '19:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_full_details`
--

CREATE TABLE `furniture_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `printingstationary_details`
--

CREATE TABLE `printingstationary_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `printingstationary_details`
--

INSERT INTO `printingstationary_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, '111', '111', 'Chrysanthemum.jpg', '11', 'Chrysanthemum.jpg', '111', '11', '11', '11', '1', '1', '1', '11111111111', '2018-02-26', '12:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `printingstationary_full_details`
--

CREATE TABLE `printingstationary_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `software_details`
--

CREATE TABLE `software_details` (
  `id` int(11) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `software_details`
--

INSERT INTO `software_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, 'adasd', 'asdasd', 'Chrysanthemum.jpg', 'asda', 'Koala.jpg', 'sasd', 'dasda', '21', '12', '12', '12', '2211', '22222222222', '2018-02-26', '19:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `software_full_details`
--

CREATE TABLE `software_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stationary_details`
--

CREATE TABLE `stationary_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stationary_details`
--

INSERT INTO `stationary_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, 'qwq', '121', 'Lighthouse.jpg', 'asa', 'Koala.jpg', 'sadas', 'done', '11', '22', '11', '12', '222', '11111', '2018-02-26', '12:22:48'),
(2, 'awdaw', 'awdawd', 'Koala.jpg', 'awdaw', 'Lighthouse.jpg', 'wdawd', 'wadwad', '112', '22', '21', '2', '22', '22', '2018-02-26', '20:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `stationary_full_details`
--

CREATE TABLE `stationary_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studentsuniform_details`
--

CREATE TABLE `studentsuniform_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentsuniform_details`
--

INSERT INTO `studentsuniform_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, 'dada', 'awda', 'Chrysanthemum.jpg', 'dwawd', 'Chrysanthemum.jpg', 'awdawd', 'adwaw', '21', '12', '12', '2', '12', '12', '2018-02-26', '20:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `studentuniform_full_details`
--

CREATE TABLE `studentuniform_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `workshopmaterial_details`
--

CREATE TABLE `workshopmaterial_details` (
  `id` int(100) NOT NULL,
  `G.R.R No` varchar(100) NOT NULL,
  `Challan No` varchar(100) NOT NULL,
  `Challan image name` text NOT NULL,
  `Bill No` varchar(100) NOT NULL,
  `Bill image name` text NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Rejected` varchar(255) NOT NULL,
  `Accepted` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshopmaterial_details`
--

INSERT INTO `workshopmaterial_details` (`id`, `G.R.R No`, `Challan No`, `Challan image name`, `Bill No`, `Bill image name`, `Supplier`, `Description`, `Unit`, `Received`, `Rejected`, `Accepted`, `Amount`, `Total`, `Date`, `Time`) VALUES
(1, '212123', '212', 'Koala.jpg', '1212', 'Lighthouse.jpg', '21wdadqwd', 'dwawdawd', '12', '121', '121', '222', '11', '500000', '2018-02-26', '11:39:59'),
(2, 'asdawd', 'adwad', 'Koala.jpg', 'dawd', 'Koala.jpg', 'adawdaw', 'dwadaw', '1', '2', '1', '2', '1', '11', '2018-02-26', '20:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `workshopmaterial_full_details`
--

CREATE TABLE `workshopmaterial_full_details` (
  `id` int(11) NOT NULL,
  `Supply Order no/date` text NOT NULL,
  `Bill no.` text NOT NULL,
  `D/C No.Date` text NOT NULL,
  `Supplier` text NOT NULL,
  `Description Of Material` text NOT NULL,
  `Quantity Received` int(11) NOT NULL,
  `Rate` text NOT NULL,
  `Amount` text NOT NULL,
  `Department` text NOT NULL,
  `Staff Name` text NOT NULL,
  `Lab No.` int(11) NOT NULL,
  `Date` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books&journals_details`
--
ALTER TABLE `books&journals_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books&journals_full_details`
--
ALTER TABLE `books&journals_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computerperipherals_details`
--
ALTER TABLE `computerperipherals_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computerperipherals_full_details`
--
ALTER TABLE `computerperipherals_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumables_details`
--
ALTER TABLE `consumables_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumables_full_details`
--
ALTER TABLE `consumables_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments_details`
--
ALTER TABLE `equipments_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments_full_details`
--
ALTER TABLE `equipments_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture_details`
--
ALTER TABLE `furniture_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture_full_details`
--
ALTER TABLE `furniture_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printingstationary_details`
--
ALTER TABLE `printingstationary_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printingstationary_full_details`
--
ALTER TABLE `printingstationary_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software_details`
--
ALTER TABLE `software_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software_full_details`
--
ALTER TABLE `software_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stationary_details`
--
ALTER TABLE `stationary_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stationary_full_details`
--
ALTER TABLE `stationary_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentsuniform_details`
--
ALTER TABLE `studentsuniform_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentuniform_full_details`
--
ALTER TABLE `studentuniform_full_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshopmaterial_details`
--
ALTER TABLE `workshopmaterial_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshopmaterial_full_details`
--
ALTER TABLE `workshopmaterial_full_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books&journals_details`
--
ALTER TABLE `books&journals_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books&journals_full_details`
--
ALTER TABLE `books&journals_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `computerperipherals_details`
--
ALTER TABLE `computerperipherals_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `computerperipherals_full_details`
--
ALTER TABLE `computerperipherals_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consumables_details`
--
ALTER TABLE `consumables_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consumables_full_details`
--
ALTER TABLE `consumables_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipments_details`
--
ALTER TABLE `equipments_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipments_full_details`
--
ALTER TABLE `equipments_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `furniture_details`
--
ALTER TABLE `furniture_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `furniture_full_details`
--
ALTER TABLE `furniture_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `printingstationary_details`
--
ALTER TABLE `printingstationary_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `printingstationary_full_details`
--
ALTER TABLE `printingstationary_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `software_details`
--
ALTER TABLE `software_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `software_full_details`
--
ALTER TABLE `software_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stationary_details`
--
ALTER TABLE `stationary_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stationary_full_details`
--
ALTER TABLE `stationary_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentsuniform_details`
--
ALTER TABLE `studentsuniform_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentuniform_full_details`
--
ALTER TABLE `studentuniform_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workshopmaterial_details`
--
ALTER TABLE `workshopmaterial_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workshopmaterial_full_details`
--
ALTER TABLE `workshopmaterial_full_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
