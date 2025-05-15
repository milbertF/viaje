-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2025 at 04:01 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u701207055_viaje_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_ride`
--

CREATE TABLE `book_ride` (
  `book_id` varchar(100) NOT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) NOT NULL,
  `booked_by` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `pickup_point` text NOT NULL,
  `destination` text NOT NULL,
  `number_of_passenger` int(11) NOT NULL,
  `fare` decimal(10,2) NOT NULL,
  `distance` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `book_ride`
--

INSERT INTO `book_ride` (`book_id`, `rider_id`, `vehicle_id`, `booked_by`, `mobile_number`, `pickup_point`, `destination`, `number_of_passenger`, `fare`, `distance`, `created_at`, `payment_method`, `status`) VALUES
('2025-1537730LX', 2025953837, 2025772241, 'Rogie Gabotero', '09519452959', 'W366+XPR, Normal Rd, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 1, 34.00, 2.40, '2025-03-18 12:07:01', 'Hand in Pay', 'Accepted'),
('2025-2279796SY', 2025953837, 2025772241, 'Franz Valdez', '09687664079', 'W377+2CF, Zamboanga, Zamboanga del Sur, Philippines', 'Jollibee Zamboanga Veterans, Veterans Avenue Ext., Zamboanga, Zamboanga del Sur, Philippines', 1, 37.00, 2.70, '2025-03-18 11:57:40', 'Hand in Pay', 'Rider @ PP'),
('2025-2340595RB', 2025953837, 2025772241, 'Rogie Gabotero', '09519452959', 'W367+XCX, Normal Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Rosa Village, Pasonanca, Zamboanga City, Zamboanga, Zamboanga del Sur, Philippines', 1, 63.00, 5.30, '2025-03-18 10:11:32', 'Hand in Pay', 'Accepted'),
('2025-2802967BN', 2025953837, 2025772241, 'Franz Valdez', '09687664079', 'W377+2CF, Zamboanga, Zamboanga del Sur, Philippines', 'Jollibee, San Jose Road, Zamboanga, Zamboanga del Sur, Philippines', 1, 13.00, 0.30, '2025-03-18 11:55:31', 'Hand in Pay', 'Accepted'),
('2025-3421517EU', 2025610581, 2025752660, 'Rogie Gabotero', '09519452959', 'W377+2CF, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 1, 34.00, 2.40, '2025-04-02 11:16:23', 'Hand in Pay', 'Pending'),
('2025-4059484TR', 2025953837, 2025772241, 'Rogie Gabotero', '09519452959', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'PSA Releasing window, Zamboanga, Zamboanga del Sur, Philippines', 1, 12.00, 0.20, '2025-03-18 08:54:57', 'Hand in Pay', 'Arrived'),
('2025-4137902OG', 2025953837, 2025772241, 'Franz Valdez', '09687664079', 'W368+H39, Don Navarro St, Zamboanga, Zamboanga del Sur, Philippines', 'Jollibee, San Jose Road, Zamboanga, Zamboanga del Sur, Philippines', 1, 12.00, 0.20, '2025-03-18 07:02:55', 'Hand in Pay', 'Accepted'),
('2025-6485959BE', 2025953837, 2025772241, 'Rogie Gabotero', '09519452959', 'W367+XCX, Normal Rd, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 1, 34.00, 2.40, '2025-03-18 12:42:31', 'Hand in Pay', 'Accepted'),
('2025-7256337SI', 2025953837, 2025772241, 'Unknown Booker', 'Unknown Mobile', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'PSA Releasing window, Zamboanga, Zamboanga del Sur, Philippines', 1, 12.00, 0.20, '2025-03-18 08:52:30', 'Hand in Pay', 'Accepted'),
('2025-7605529AR', 2025610581, 2025752660, 'Hermainee Granger', '09562256013', 'W367+XCX, Normal Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Sky Valley Park, Dulian Rd, Zamboanga, Zamboanga del Sur, Philippines', 3, 196.00, 16.10, '2025-03-18 13:34:53', 'Hand in Pay', 'Arrived'),
('2025-9511344IP', 2025953837, 2025772241, 'Rogie Gabotero', '09519452959', 'W377+2CF, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 1, 34.00, 2.40, '2025-03-18 12:24:26', 'Hand in Pay', 'Rider @ PP'),
('2025-9542705DH', 2025953837, 2025772241, 'Rogie Gabotero', '09519452959', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'PSA Releasing window, Zamboanga, Zamboanga del Sur, Philippines', 1, 12.00, 0.20, '2025-03-18 07:48:13', 'Hand in Pay', 'Arrived');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`id`, `user_id`, `mobile_number`, `firstName`, `lastName`) VALUES
(14, 20247161, 'pointbreak.gab904@gmail.com', 'Penelope Jane', 'Balacuit'),
(26, 20244736, 'franzxvaldez@gmail.com', 'Point', 'Break'),
(27, 20243508, 'mfalcasantos23@gmail.com', 'Milbert', 'Falcasantos'),
(28, 20248832, 'mfalcasantos23@gmail.com', 'milbert', 'falcasantos'),
(29, 20243948, 'franzxvaldez@gmail.com', 'Nathan', 'Valdez'),
(30, 20245457, 'marjorie.rojas@wmsu.edu.ph', 'Majorie', 'Rojas'),
(32, 20257656, 'valdezfranznathaniel@gmail.com', 'Mikylla', 'Valdez'),
(34, 20256130, 'mfalcasantos23@gmail.com', 'franz', 'valdez'),
(44, 20255314, 'sjtstje@gmail.com', 'rhJt', 'kgjggi'),
(45, 20255245, '', NULL, NULL),
(46, 20255214, 'balacuit.pen@gmail.com', 'Penelope', 'Balacuit'),
(47, 20258155, 'franzxvaldez@gmail.com', 'Harry', 'Potter'),
(48, 20253840, 'nathanielfranz14@gmail.com', 'franz', 'valdez');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_initial` varchar(255) DEFAULT NULL,
  `name_extension` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_id`, `first_name`, `last_name`, `middle_initial`, `name_extension`, `email_address`, `mobile_number`, `gender`, `password`, `status`) VALUES
(2025076806, 'dvdsb', 'scas', 'asc', '', 'scsa@dsvvd', '09999999999', 'Male', NULL, 'Declined'),
(2025230356, 'Prans', 'Zedlav', 'Recososa', '', 'qb202100575@wmsu.edu.ph', '09562256016', 'Male', '$2y$10$T.u2Vz9KyvHzgZIEj5R2he/lgk5/ANYBAiOKKNbqfP91fnZO1ogLK', 'Approved'),
(2025260230, 'ascsas', 'ascas', '', '', 'pauwinako@jdskjb', '09999999999', 'Male', NULL, 'Pending'),
(2025477214, 'charls', 'hermosa', 'tubil', '', 't@gmail.com', '099999', 'Male', NULL, 'Pending'),
(2025488490, 'aaaa', 'aaa', '', '', 'bja@jhvjh', '22222', 'Male', NULL, 'Pending'),
(2025580395, 'Ronson', 'Deleña', 'Aguidan', 'jr.', 'jdaguidandelena@gmail.com', '09123456789', 'Male', '$2y$10$e8Mik8HiFGjBDUay.Zo1GOEzh.cB0rqsx.OdVeRjbZU8iSxiu1oYC', 'Suspended'),
(2025610581, 'Bruce', 'Wayne', '', '', 'chametouse@gmail.com', '091234567890', 'Male', '$2y$10$gIFiaRBi2kkzoC3oyuxbEeAySDPWaNuAUIV5jYSS/TyRhO1/.k76W', 'Approved'),
(2025800158, 'nsks', 'hand', 'hshx', 'hahjx', 'qqqq@jakx', '096468', 'Male', NULL, 'Pending'),
(2025822561, 'first', 'test', '', '', 'onlineTesting@gmail.com', '09999999999', 'Male', NULL, 'Pending'),
(2025953837, 'Rogie2', 'Gabotero2', '', '', 'rogie@gmail.com', '09000000000', 'Male', '$2y$10$0/r/.lfL.a7IJtzkJRTuEOT9.NpWXbh9yCWwvghJSg62eM./UwP.a', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `rider_addresses`
--

CREATE TABLE `rider_addresses` (
  `address_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rider_addresses`
--

INSERT INTO `rider_addresses` (`address_id`, `rider_id`, `region`, `province`, `municipality`, `barangay`, `street`, `postal_code`) VALUES
(2025026925, 2025488490, 'National Capital Region (NCR)', 'City Of Manila', 'Sampaloc', 'Barangay 406', 'asdasd', '6743'),
(2025057549, 2025953837, 'Region IX (Zamboanga Peninzula)', 'Zamboanga Del Sur', 'Zamboanga City', 'Baliwasan', 'hcsaclsa', '7000'),
(2025147441, 2025580395, 'Region IX (Zamboanga Peninzula)', 'Zamboanga Del Sur', 'Zamboanga City', 'Guiwan', 'Resurreccion Drive', '7000'),
(2025170118, 2025260230, 'National Capital Region (NCR)', 'City Of Manila', 'San Miguel', 'Barangay 639', '32435354', '7000'),
(2025450577, 2025800158, 'Region IV-B (MIMAROPA)', 'Occidental Mindoro', 'Magsaysay', 'Laste', 'hahnnbx', '6867'),
(2025619112, 2025610581, 'Region IX (Zamboanga Peninzula)', 'Zamboanga Del Sur', 'Zamboanga City', 'Ayala', 'assad', '7000'),
(2025637985, 2025230356, 'Region IX (Zamboanga Peninzula)', 'Zamboanga Del Sur', 'Zamboanga City', 'Kasanyangan', 'Navarro Street', '7000'),
(2025656738, 2025822561, 'Region I (Ilocos Region)', 'Ilocos Norte', 'Marcos', 'Santiago', '2222', '2222'),
(2025680374, 2025477214, 'Region VIII (Eastern Visayas)', 'Southern Leyte', 'Liloan', 'Gud-an', 'zone one', '8888'),
(2025802210, 2025076806, 'Region VI (Western Visayas)', 'Antique', 'San Remigio', 'Poblacion (Calag-itan)', '23fdvfb', '546546');

-- --------------------------------------------------------

--
-- Table structure for table `rider_licenses`
--

CREATE TABLE `rider_licenses` (
  `license_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `license_picture` varchar(255) DEFAULT NULL,
  `face_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rider_licenses`
--

INSERT INTO `rider_licenses` (`license_id`, `rider_id`, `license_no`, `license_picture`, `face_picture`) VALUES
(2025053850, 2025580395, '12356678', '../static/images/uploads/license_67d5c5fd6ad559.81085304.jpg', '../static/images/uploads/face_67d5c5fd6b2119.06012988.jpg'),
(2025097181, 2025488490, 'ucccuy', '../static/images/uploads/license_67d092e3504ad1.79488281.png', '../static/images/uploads/face_67d092e3507b17.60864357.png'),
(2025111909, 2025800158, 'ha bbxjjx', '../static/images/uploads/license_67d5c6d6114883.43980176.jpg', '../static/images/uploads/face_67d5c6d61250c6.18694612.jpg'),
(2025311167, 2025822561, '2222', '../static/images/uploads/license_6811d571681724.72576129.jpeg', '../static/images/uploads/face_6811d571683909.14437859.png'),
(2025403388, 2025260230, 'dsfsd', '../static/images/uploads/license_67d5a73e795c39.34483286.png', '../static/images/uploads/face_67d5a73e798227.59642936.png'),
(2025536500, 2025076806, 'gfnfd', '../static/images/uploads/license_67d5cc1f0427f8.14883511.png', '../static/images/uploads/face_67d5cc1f04d227.38983816.png'),
(2025795071, 2025477214, 'oooooo', '../static/images/uploads/license_67d5c829efe6c8.19571888.png', '../static/images/uploads/face_67d5c829f00897.27883382.jpeg'),
(2025857604, 2025953837, 'dsfsd', '../static/images/uploads/license_67d074934a8973.65663346.png', '../static/images/uploads/face_67d074934aa2a5.36062918.jpg'),
(2025913406, 2025610581, 'assas', '../static/images/uploads/license_67d90086bbc8b6.60662468.jpg', '../static/images/uploads/face_67d90086bbfeb5.37400478.jpg'),
(2025968389, 2025230356, '098538-2672', '../static/images/uploads/license_67d609169cf973.07253389.jpg', '../static/images/uploads/face_67d609169d3525.73232914.png');

-- --------------------------------------------------------

--
-- Table structure for table `rider_location`
--

CREATE TABLE `rider_location` (
  `location_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rider_location`
--

INSERT INTO `rider_location` (`location_id`, `rider_id`, `vehicle_id`, `latitude`, `longitude`, `status`) VALUES
(20, 2025610581, 2025752660, 6.91240220, 122.06372430, NULL),
(31, 2025953837, 2025772241, 6.91246410, 122.06354940, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rider_vehicles`
--

CREATE TABLE `rider_vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `vehicle_capacity` varchar(255) NOT NULL,
  `vehicle_plate_no` varchar(255) DEFAULT NULL,
  `vehicle_make` varchar(255) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `model_year` varchar(255) DEFAULT NULL,
  `vehicle_color` varchar(255) DEFAULT NULL,
  `vehicle_ownership` varchar(255) DEFAULT NULL,
  `vehicle_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `rider_vehicles`
--

INSERT INTO `rider_vehicles` (`vehicle_id`, `rider_id`, `vehicle_type`, `vehicle_capacity`, `vehicle_plate_no`, `vehicle_make`, `vehicle_model`, `model_year`, `vehicle_color`, `vehicle_ownership`, `vehicle_status`) VALUES
(2025348090, 2025610581, 'Tricycle', '', 'ygy454', 'toyota', 'dfds', '2013', 'blue', 'Owned', 'Approved'),
(2025374808, 2025800158, 'Motorcycle', '', 'bsnnx', 'hlaj', 'hxjxkx', '2020', 'j na', 'Borrowed / Rented', 'Approved'),
(2025486659, 2025953837, 'Car', '', 'GAB-904', 'HONDA', 'CIVIC', '2015', 'White', 'Owned', 'Pending'),
(2025601513, 2025477214, 'Car', '', '000', 'haha', 'what', '2025', 'yellow', 'Borrowed / Rented', 'Approved'),
(2025708678, 2025260230, 'Motorcycle', '', 'ygy454', 'toyota', 'dfds', '2014', 'blue', 'Borrowed / Rented', 'Approved'),
(2025718454, 2025580395, 'Motorcycle', '', 'ILOV3U', 'Secret', 'HONDA', '2022', 'Crimson', 'Owned', 'Approved'),
(2025752660, 2025610581, 'Car', '', 'BAT254', 'Ford', 'Fortuner', '2018', 'Black and white', 'Owned', 'Approved'),
(2025768923, 2025230356, 'Car', '', '1255-TGWJ', 'toyota', 'Toyota', '2016', 'Marina Blue', 'Owned', 'Approved'),
(2025772241, 2025953837, 'Motorcycle', '', 'abc1234', 'honda', 'xrm', '2018', 'blue', 'Owned', 'Approved'),
(2025804696, 2025488490, 'Motorcycle', '', 'ygy454', 'toyota', 'dfds', '2015', 'blue', 'Borrowed / Rented', 'Approved'),
(2025895062, 2025076806, 'Car', '', 'ygy454', 'toyota', 'dfds', '2015', 'blue', 'Owned', 'Approved'),
(2025895410, 2025822561, 'Car', '5', 'ygy454', 'toyota', 'dfds', '2016', 'blue', 'Owned', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `self_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mobile_number`, `password`, `self_description`) VALUES
(20243508, 'Milbert', 'Falcasantos', '09262124852', '$2y$10$7n7aw10trfmpu8cRqRHpfecV2ykFSMtC8zlVzOdKSFlZxMWbzIzW.', 'daks ako wala angal'),
(20243564, 'Rogie', 'Gabotero', '090909090', '$2y$10$UFcmo7Gh8rCiC/McxVFDE.ghnPox5Ds97qX4iGRZbjWr/C9.uSzyW', 'jkbscbjksac'),
(20243948, 'Franz', 'Valdez', '09687664079', '$2y$10$GO1fRM1bKSoFCvb0GOakdOWjqdwhU35pH9/ws7/qtbO/IAbLhqn3K', NULL),
(20244921, 'Milbertoooooooooo', 'Falcasantosoooooooooooo', '09262124', '$2y$10$xkFBSDPFSH4zEOqzpUpV2ObqL5q.6fC5xv9OGGl.GHI1UThnJsuIe', 'tanginaaaaaaaaaaaaaaaaaa'),
(20245457, 'Harry ', 'Potter', '09177103254', '$2y$10$mBNkFmjbZ9.YmJYJCcY9xern2BvoQgrDvXFlU7WhUhlcOoXCsfmjG', 'aaa'),
(20245644, 'Nathan', 'Valdez', '09631141365', '$2y$10$lzIXIok6HJtbNNHc390hoOC4CrrNmT2yqun/sfC8mM/pGx5zhePlq', 'mama mo blue'),
(20247161, 'Rogie', 'Gabotero', '09519452959', '$2y$10$pL/nI58RBGdzSlliNJSVMOb4WlzcVe3WNLUiZsF.HL9gejJHFc26q', 'hakdog'),
(20248082, 'bajks d', 'nsmbscis', '08976936393', '$2y$10$eqcNkhQdP6gEuWsmLJfV0uDXwf9hmLTJ93AZlQmwOZ0VYT0NJklcq', NULL),
(20248832, 'GaboMy', 'Gabotero', '09363613766', '$2y$10$zmQnCWEHG5Qp/rTgGcnRm.bX/FZv.xZfOYjOHN9ZVv.Jf0QbO8Sh2', NULL),
(20251883, 'hi', 'mommy', '09111111111', '$2y$10$w25wodZmDo9SlM0pkCJC3OR/hTnQuKFq9OwDjKx1K4GqBnyzo.zXq', NULL),
(20253840, 'Nate', 'Zedlav', '09631141366', '$2y$10$a8YMy26GDckhqr2m24rPs./m1QW.BVpV45/1XAg4GGxjOXGdqmxg6', NULL),
(20254947, 'ufut', 'jfuf', '5735539', '$2y$10$UFMtl9AwlO9O5SNYo5AG3.WeLQB8sykjIoaD0proGmW/Om9vcqVde', NULL),
(20255214, 'Penelope', 'Balacuit', '09059110202', '$2y$10$Hdp4x5HhWkQdrn/v4kBQh.5wqoj8ckmDDvXeIvvJBgA74u.5mnOTy', NULL),
(20255245, 'Kyle', 'Valdez', '09562256015', '$2y$10$txTZQEzBrTKf8Bj1G3ck1O0ludAvxxTMe023OjIjCR56j0qsgyu4u', NULL),
(20255314, 'gwibd', 'nskhd', '662213870', '$2y$10$ICp1PBO/1JsjxF.e0yumXOQtlxUQg5TYi0zELD3RcOvf12e0rTQwK', NULL),
(20256130, 'Milbert', 'Falcasantos', '09050638266', '$2y$10$TU7dLyv1vYC/KsK/C1R13esck7O7xesddkFtxb3cw2ium0eu4FfWu', NULL),
(20256736, 'Rogu', 'Gabot', '5653336655', '$2y$10$Haf2h1sJwp4cPA7UHaHAmu9HOdAyQu4WV04Iehi9VrXRh947ZLpOW', NULL),
(20257656, 'Prans', 'Valdez', '09687664078', '$2y$10$gTSWLTga90HcMKFG2cg4f.z5osfS9PcFifcKhMgcMxFS4dMlFluGK', NULL),
(20258155, 'Hermainee', 'Granger', '09562256013', '$2y$10$2RAncNBISr1tvPeagaK87eUINjmayCXVML0tStZFEp0Rftl3qTema', NULL),
(20259507, 'gghjd', 'hhh', '090653194', '$2y$10$yqrzzDZMFmi9y.dkmj.JmOklADcrG0HZB/rNgAkFrxtleyggJkVb2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `location_ID` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user_location`
--

INSERT INTO `user_location` (`location_ID`, `id`, `latitude`, `longitude`, `status`) VALUES
(1, 20247161, 6.91131030, 122.06543870, NULL),
(2, 20247161, 6.91131030, 122.06543870, NULL),
(3, 20245644, 6.91248000, 122.06362150, NULL),
(4, 20245644, 6.91248000, 122.06362150, NULL),
(5, 20243508, 6.91121600, 122.06527630, NULL),
(6, 20243508, 6.91121600, 122.06527630, NULL),
(7, 20248832, 6.91121640, 122.06528100, NULL),
(8, 20248832, 6.91121640, 122.06528100, NULL),
(9, 20243948, 6.91241920, 122.06367530, NULL),
(10, 20243948, 6.91241920, 122.06367530, NULL),
(11, 20245457, 6.91323320, 122.06272250, NULL),
(12, 20245457, 6.91323320, 122.06272250, NULL),
(13, 20257656, 6.91121400, 122.06527690, NULL),
(14, 20257656, 6.91121400, 122.06527690, NULL),
(15, 20256130, 6.92041280, 122.04923650, NULL),
(16, 20256130, 6.92041280, 122.04923650, NULL),
(87, 20251883, 6.92045390, 122.04924830, NULL),
(88, 20251883, 6.92045390, 122.04924830, NULL),
(218, 20259507, 6.91121500, 122.06526960, NULL),
(219, 20259507, 6.91121500, 122.06526960, NULL),
(220, 20255314, 6.91120930, 122.06525200, NULL),
(221, 20255314, 6.91120930, 122.06525200, NULL),
(222, 20255214, 6.90895970, 122.06822540, NULL),
(223, 20255214, 6.90895970, 122.06822540, NULL),
(224, 20258155, 6.91257920, 122.06360210, NULL),
(225, 20258155, 6.91257920, 122.06360210, NULL),
(226, 20253840, 6.91123000, 122.06529470, NULL),
(227, 20253840, 6.91123000, 122.06529470, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_images`
--

CREATE TABLE `vehicle_images` (
  `vehicle_id` varchar(255) NOT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `frontview_image` varchar(255) DEFAULT NULL,
  `sideview_image` varchar(255) DEFAULT NULL,
  `backview_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_images`
--

INSERT INTO `vehicle_images` (`vehicle_id`, `rider_id`, `frontview_image`, `sideview_image`, `backview_image`) VALUES
('2025116663', 2025953837, '../static/images/vehicleImages/frontview_2025116663_67d8e7e5cba48.jpg', '../static/images/vehicleImages/sideview_2025116663_67d8e7e5cbba8.jpg', '../static/images/vehicleImages/backview_2025116663_67d8e7e5cbcd5.jpg'),
('2025161806', 2025953837, '../static/images/vehicleImages/frontview_2025161806_67d45630d74af.png', '../static/images/vehicleImages/sideview_2025161806_67d45630d76c0.png', '../static/images/vehicleImages/backview_2025161806_67d45630d77f1.png'),
('2025229385', 2025953837, '../static/images/vehicleImages/frontview_2025229385_67d7ff61e583f.png', '../static/images/vehicleImages/sideview_2025229385_67d7ff61e5d82.png', '../static/images/vehicleImages/backview_2025229385_67d7ff61e624c.png'),
('2025337417', 2025953837, '../static/images/vehicleImages/frontview_2025337417_67d80876aa919.avif', '../static/images/vehicleImages/sideview_2025337417_67d80876aaad6.avif', '../static/images/vehicleImages/backview_2025337417_67d80876aabf7.avif'),
('2025348090', 2025610581, '../static/images/vehicleImages/frontview_2025348090_67d90086be3ec.avif', '../static/images/vehicleImages/sideview_2025348090_67d90086be5ce.jpg', '../static/images/vehicleImages/backview_2025348090_67d90086be6aa.jpg'),
('2025374808', 2025800158, '../static/images/vehicleImages/frontview_2025374808_67d5c6d6139eb.jpg', '../static/images/vehicleImages/sideview_2025374808_67d5c6d614819.jpg', '../static/images/vehicleImages/backview_2025374808_67d5c6d6155ec.jpg'),
('2025486659', 2025953837, '../static/images/vehicleImages/frontview_2025486659_67d8e7e0a8073.jpg', '../static/images/vehicleImages/sideview_2025486659_67d8e7e0a8345.jpg', '../static/images/vehicleImages/backview_2025486659_67d8e7e0a8449.jpg'),
('2025601513', 2025477214, '../static/images/vehicleImages/frontview_2025601513_67d5c829f0586.jpeg', '../static/images/vehicleImages/sideview_2025601513_67d5c829f06ab.jpeg', '../static/images/vehicleImages/backview_2025601513_67d5c829f07a6.jpeg'),
('2025708678', 2025260230, '../static/images/vehicleImages/frontview_2025708678_67d5a73e7a5f0.png', '../static/images/vehicleImages/sideview_2025708678_67d5a73e7a8d6.png', '../static/images/vehicleImages/backview_2025708678_67d5a73e7aab7.png'),
('2025718454', 2025580395, '../static/images/vehicleImages/frontview_2025718454_67d5c5fd6d611.jpeg', '../static/images/vehicleImages/sideview_2025718454_67d5c5fd6d8ea.jpeg', '../static/images/vehicleImages/backview_2025718454_67d5c5fd6da1a.jpeg'),
('2025752660', 2025610581, '../static/images/vehicleImages/frontview_2025752660_67d90202db399.avif', '../static/images/vehicleImages/sideview_2025752660_67d90202db576.jpg', '../static/images/vehicleImages/backview_2025752660_67d90202db696.jpg'),
('2025768923', 2025230356, '../static/images/vehicleImages/frontview_2025768923_67d609169df45.avif', '../static/images/vehicleImages/sideview_2025768923_67d609169e151.jpg', '../static/images/vehicleImages/backview_2025768923_67d609169e2e3.jpg'),
('2025804696', 2025488490, '../static/images/vehicleImages/frontview_2025804696_67d092e3517a1.png', '../static/images/vehicleImages/sideview_2025804696_67d092e351a98.jpg', '../static/images/vehicleImages/backview_2025804696_67d092e351bf2.png'),
('2025880988', 2025953837, '../static/images/vehicleImages/frontview_2025880988_67d8055c642a1.png', '../static/images/vehicleImages/sideview_2025880988_67d8055c6481a.png', '../static/images/vehicleImages/backview_2025880988_67d8055c649de.png'),
('2025895062', 2025076806, '../static/images/vehicleImages/frontview_2025895062_67d5cc1f05c92.jpg', '../static/images/vehicleImages/sideview_2025895062_67d5cc1f05e50.jpg', '../static/images/vehicleImages/backview_2025895062_67d5cc1f05fc6.jpg'),
('2025895410', 2025822561, '../static/images/vehicleImages/frontview_2025895410_6811d57168c4a.jpg', '../static/images/vehicleImages/sideview_2025895410_6811d57168dfb.jpg', '../static/images/vehicleImages/backview_2025895410_6811d57168f59.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `viaje_admin`
--

CREATE TABLE `viaje_admin` (
  `adminID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contactNo` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `viaje_admin`
--

INSERT INTO `viaje_admin` (`adminID`, `email`, `password`, `firstname`, `lastname`, `contactNo`, `gender`, `role`, `image`) VALUES
(28, 'milbert@gmail.com', '$2y$10$RtJdSuU8zR4pkZVV.9.bB.WrsK.Q6BN5ji2KK7gWKbiTBQLU9OE9.', 'milbert', 'falcasantos', '123', 'Male', 'Super Admin', '../static/images/adminImages/675c66dcc24cc_ViaJe Logo.png'),
(29, 'gwen@gmail.com', '$2y$10$cma.F9TVNG9d7f0F4EPbNey07D0dyihqmS.jz1zQsHTOuzbK0191K', 'bini', 'gwen', '1111', 'Female', 'Super Admin', '../static/images/adminImages/675c252f9d6b9_465061496_1270594744363140_3638590758929881487_n.jpg'),
(30, 'rogie@gmail.com', '$2y$10$DqjVv3Y2ltQ5OuGFd3YwqO3S2cae1dyKceFPUk3aNJPB8I/VcISgy', 'rogie', 'gabotero', '09876543210', 'Male', 'Admin', '../static/images/adminImages/675c27003b8be_rogie.png'),
(31, 'malbago@xxx.com', '$2y$10$Kv96lHzVrAqjKweOcnI5MuS0OzEGbTKXKKBn5tdNuCNcGt53J5Q9i', '<img src=\"invalid.jpg\" onerror=\"alert(\'You\'ve Been Hacked!\'); this.src=\'invalid.jpg\';\">', '<img src=\"invalid.jpg\" onerror=\"alert(\'You\'ve Been Hacked!\'); this.src=\'invalid.jpg\';\">', '6969696969', 'Male', 'Super Admin', '../static/images/adminImages/6797d3f8678f9_good-morning.png'),
(32, 'gagagaga@sfvds', '$2y$10$K7011IlS0sb6.RR2wbhE2uvzwZfmTIwulR/WxQ4IEAprALgQ8Hcya', 'ascas', 'sacas', '345543', 'Male', 'Super Admin', ''),
(33, 'franzxvaldez@gmail.com', '$2y$10$0w9ziXhixEOiUERNj3WtlO97Pxy0GljvAPD2YNXXeCKjdOnyghxzi', 'Prans', 'Valdez', '09562256015', 'Male', 'Super Admin', ''),
(34, 'santos@gmail.com', '$2y$10$3rinGS4ArFLmz5pOIHsGIO5gIrYdnCH5KboxMs9QmpRT.qVz2Kwfa', '<img src=\"invalid.jpg\" onerror=\"alert(\'You\'ve Been Hacked!\'); this.src=\'invalid.jpg\';\">', '<img src=\"invalid.jpg\" onerror=\"setTimeout(() => { location.reload(); }, 10); alert(\'XSS!\');\">', '91231231231', 'Male', 'Admin', ''),
(35, 'test@gmail.cok', '$2y$10$XZpJsoIZD5ekV5EylzwIT.e7rBqEGxKbT0YiigN.nUDHkCgufC5qO', '<script>alert(\"Expecto Patronum\");</script>', 'Potter', '123', 'Male', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `viaje_farerate`
--

CREATE TABLE `viaje_farerate` (
  `vehicle` varchar(100) NOT NULL,
  `startingPrice` decimal(10,2) DEFAULT NULL,
  `additionalPassenger` decimal(10,2) DEFAULT 0.00,
  `fareRate/KM` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `viaje_farerate`
--

INSERT INTO `viaje_farerate` (`vehicle`, `startingPrice`, `additionalPassenger`, `fareRate/KM`) VALUES
('Auto Rickshaw', 25.00, 10.00, 10.00),
('Car', 45.25, 1.25, 15.00),
('Motorcycle', 10.00, NULL, 10.10),
('Tricycle', 25.00, 10.00, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `viaje_report`
--

CREATE TABLE `viaje_report` (
  `report_id` varchar(255) NOT NULL,
  `type_of_report` varchar(255) NOT NULL,
  `reported_by` varchar(255) NOT NULL,
  `reported_rider` varchar(255) NOT NULL,
  `destination_from` varchar(255) NOT NULL,
  `destination_to` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type_of_vehicle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `viaje_report`
--

INSERT INTO `viaje_report` (`report_id`, `type_of_report`, `reported_by`, `reported_rider`, `destination_from`, `destination_to`, `feedback`, `date`, `type_of_vehicle`) VALUES
('REP0257177', 'Harassment', 'Rogie Gabotero', '  ', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'Mang Tinapay, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:54:27', 'Tricycle'),
('REP0433020', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 20:45:09', 'Motorcycle'),
('REP0703685', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'Mang Tinapay, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:54:27', 'Motorcycle'),
('REP1025221', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W2CX+5RM, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-16 03:06:29', 'Motorcycle'),
('REP1139901', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'Juliana Natividad Drive, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 03:21:07', 'Motorcycle'),
('REP1905323', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W3HM+VXH, Aurora St, Zamboanga, Zamboanga del Sur, Philippines', 'Fort Pilar, Street, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-11 22:22:43', 'Motorcycle'),
('REP1943182', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 20:32:40', 'Motorcycle'),
('REP2295367', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'Fort Pilar, Street, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:18:42', 'Motorcycle'),
('REP2701999', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 02:23:16', 'Motorcycle'),
('REP3818885', 'Accident', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W4W7+5CX, Zamboanga, Zamboanga Sibugay, Philippines', 'Integrated Bus Terminal, Maria Clara Lorenzo Lobregat Highway, Zamboanga, Zamboanga Sibugay, Philippines', 'Distress alert triggered', '2025-03-16 19:29:59', 'Motorcycle'),
('REP4342186', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'PSA Releasing window, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-18 08:54:57', 'Motorcycle'),
('REP4384158', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', '484, B. San Jose Road, Baliwasan, Zamboanga City, 7000, Zamboanga Del Sur, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-11 02:55:45', 'Motorcycle'),
('REP4676862', 'Harassment', 'Rogie Gabotero', '  ', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'Mang Tinapay, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:54:27', 'Motorcycle'),
('REP4728798', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'Mang Tinapay, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:54:27', 'Motorcycle'),
('REP4941371', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'Grass land, Arena Blanco, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:48:45', 'Motorcycle'),
('REP5408050', 'Accident', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 00:14:48', 'Motorcycle'),
('REP6081661', 'Accident', 'Rogie Gabotero', 'Rogie2  Gabotero2', '100 Labuan - Limpapa National Road, Zamboanga, Zamboanga del Sur, Philippines', 'Don Navarro Street, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-16 02:30:36', 'Motorcycle'),
('REP6116049', 'Harassment', 'Franz Valdez', 'Rogie2  Gabotero2', 'W368+F45, Don Navarro St, Zamboanga, Zamboanga del Sur, Philippines', 'PSA Releasing window, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-17 07:58:28', 'Motorcycle'),
('REP6135232', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-13 04:19:26', 'Motorcycle'),
('REP6238580', 'Harassment', 'Rogie Gabotero', '  ', 'W3W6+J6P, Service Rd, Zamboanga, Zamboanga Sibugay, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-11 15:57:00', 'Motorcycle'),
('REP6341254', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W375+WP7 Department of Education - Division Office, Baliwasan Chico Road, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 02:48:36', 'Motorcycle'),
('REP6501148', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'Grass land, Arena Blanco, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:48:45', 'Tricycle'),
('REP6906135', 'Accident', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 01:00:05', 'Tricycle'),
('REP7959513', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W3HM+VXH, Aurora St, Zamboanga, Zamboanga del Sur, Philippines', 'Fort Pilar, Street, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-11 22:22:43', 'Motorcycle'),
('REP8186655', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 02:30:40', 'Motorcycle'),
('REP8211914', 'Accident', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'SM Mindpro Citimall, La Purisima Street, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 19:26:20', 'Tricycle'),
('REP8386284', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 01:00:05', 'Motorcycle'),
('REP8557104', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W386+FMV, Zamboanga, Zamboanga Sibugay, Philippines', 'Mang Inasal Southway Square, Gov. Lim Avenue, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 03:01:28', 'Motorcycle'),
('REP8751588', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W3HM+VXH, Aurora St, Zamboanga, Zamboanga del Sur, Philippines', 'Fort Pilar, Street, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-11 22:22:43', 'Motorcycle'),
('REP9087210', 'Accident', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W3HM+VXH, Aurora St, Zamboanga, Zamboanga del Sur, Philippines', 'Fort Pilar, Street, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-11 22:22:43', 'Motorcycle'),
('REP9663157', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W3HM+VXH, Aurora St, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-11 22:19:38', 'Motorcycle'),
('REP9881774', 'Harassment', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W38X+PHJ, Peace Subdivision, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-10 20:40:20', 'Motorcycle'),
('REP9938863', 'Accident', 'Rogie Gabotero', 'Rogie2  Gabotero2', 'W3HM+VXH, Aurora St, Zamboanga, Zamboanga del Sur, Philippines', 'KCC Mall De Zamboanga, Gov.Camins Rd, Zamboanga, Zamboanga del Sur, Philippines', 'Distress alert triggered', '2025-03-12 01:10:37', 'Motorcycle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_ride`
--
ALTER TABLE `book_ride`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `rider_addresses`
--
ALTER TABLE `rider_addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `rider_licenses`
--
ALTER TABLE `rider_licenses`
  ADD PRIMARY KEY (`license_id`),
  ADD KEY `fk1_rider_id` (`rider_id`);

--
-- Indexes for table `rider_location`
--
ALTER TABLE `rider_location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `rider_vehicles`
--
ALTER TABLE `rider_vehicles`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`location_ID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `fk_rider_id` (`rider_id`);

--
-- Indexes for table `viaje_admin`
--
ALTER TABLE `viaje_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `viaje_farerate`
--
ALTER TABLE `viaje_farerate`
  ADD PRIMARY KEY (`vehicle`);

--
-- Indexes for table `viaje_report`
--
ALTER TABLE `viaje_report`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `rider_addresses`
--
ALTER TABLE `rider_addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025869314;

--
-- AUTO_INCREMENT for table `rider_licenses`
--
ALTER TABLE `rider_licenses`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025968390;

--
-- AUTO_INCREMENT for table `rider_location`
--
ALTER TABLE `rider_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rider_vehicles`
--
ALTER TABLE `rider_vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025895411;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20259508;

--
-- AUTO_INCREMENT for table `user_location`
--
ALTER TABLE `user_location`
  MODIFY `location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `viaje_admin`
--
ALTER TABLE `viaje_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rider_addresses`
--
ALTER TABLE `rider_addresses`
  ADD CONSTRAINT `fk_rider_id` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`) ON DELETE CASCADE;

--
-- Constraints for table `rider_licenses`
--
ALTER TABLE `rider_licenses`
  ADD CONSTRAINT `fk1_rider_id` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`) ON DELETE CASCADE;

--
-- Constraints for table `rider_vehicles`
--
ALTER TABLE `rider_vehicles`
  ADD CONSTRAINT `fk2_rider_id` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_location`
--
ALTER TABLE `user_location`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD CONSTRAINT `fk4_rider_id` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
