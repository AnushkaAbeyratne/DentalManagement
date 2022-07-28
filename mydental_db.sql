-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 01:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `start_appointment` datetime NOT NULL,
  `end_appointment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `function_id` int(11) NOT NULL,
  `function_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `module_id` int(11) NOT NULL,
  `function_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `function_user`
--

CREATE TABLE `function_user` (
  `user_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(80) NOT NULL,
  `login_password` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `user_id`, `login_status`) VALUES
(1, 'abcd@example.com', '40BD001563085FC35165329EA1FF5C5ECBDBBEEF', 1, 1),
(4, 'anusfthj@gmail.com', 'c9e2888d80b6f1be03799152bf466f60b5796306', 3, 1),
(5, 'anu@gmail.com', 'c9e2888d80b6f1be03799152bf466f60b5796306', 4, 1),
(6, 'anusfhjghkjfthj@gmail.com', '2fe410b82af264d405e8b6119b11fe765fb1ec69', 5, 1),
(7, 'anuradha@evey.com', '386e335668002a442ec5c3a9b114685b4e1fcc99', 6, 1),
(8, 'sanju@gmail.com', '386e335668002a442ec5c3a9b114685b4e1fcc99', 7, 1),
(9, 'anuradhaAA@yahoo.com', '386e335668002a442ec5c3a9b114685b4e1fcc99', 8, 1),
(10, 'asanka@yahoo.com', '68933f3febba646370efb67383ecac2f61961e82', 9, 1),
(11, 'ash2008@hotmail.com', 'cb77fb1a297835fa5a23f0ae465ba3f399bb51dd', 11, 1),
(12, 'dil@gmail.com', '4b228e114e5e09f5c835e4d67d69c15880d0b3ff', 12, 1),
(13, 'hasi@gmail.com', '1fc4640bdb32ffccac062a08ca9ad9a624f1d606', 13, 1),
(14, 'sandu2000@apit.lk', 'acdb2033396de9635d5323a0084a5e1bddd15bab', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `module_image` text CHARACTER SET latin1 NOT NULL,
  `module_url` text CHARACTER SET latin1 NOT NULL,
  `module_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_image`, `module_url`, `module_status`) VALUES
(1, 'User Management', 'user.png', 'emp_Mgt.php', 1),
(2, 'Patient Management', 'group.png', 'patient.php', 1),
(3, 'Schedule Management', 'calender.png', 'add_schedule.php', 1),
(4, 'Appointment Management', 'sthetiscope.png', 'add_appointment.php', 1),
(5, 'Inventory Management', 'hospital.png', 'add-medicine.php', 1),
(6, 'Purchase Management', 'truck.png', 'purchasing.php', 1),
(7, 'Payment Management', 'money.png', 'payment.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE `module_role` (
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`module_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(2, 3),
(2, 4),
(2, 6),
(3, 1),
(3, 2),
(3, 5),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 3),
(6, 6),
(7, 1),
(8, 1),
(8, 2),
(8, 5),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `patient_lname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `patient_email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `patient_nic` varchar(12) CHARACTER SET latin1 NOT NULL,
  `patient_age` varchar(3) NOT NULL,
  `patient_create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `patient_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `patient_gender` tinyint(1) NOT NULL,
  `patient_cno1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `patient_cno2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `patient_address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `patient_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_fname`, `patient_lname`, `patient_email`, `patient_nic`, `patient_age`, `patient_create_date`, `patient_updated_date`, `patient_gender`, `patient_cno1`, `patient_cno2`, `patient_address`, `patient_status`) VALUES
(1, 'Anu', 'Abeyaratne', 'ahmed@gmail.com', '935210067v', '34y', '2020-08-20 00:41:46', '2020-08-19 19:11:46', 0, '+94113456783', '+94713367663', 'no.45,panadura', 0),
(2, 'ashika', 'perera', 'ashi2008@hotmail.com', '987537657V', '20y', '2020-08-20 12:47:25', '2020-08-20 07:17:25', 1, '+94113456783', '+94713367663', 'no.70,galle rd,katunayaka', 0),
(3, 'ashika', 'perera', 'ashi2005@hotmail.com', '987537657V', '20y', '2020-08-20 12:48:23', '2020-08-20 07:18:23', 1, '+94113456783', '+94713367663', 'no.70,galle rd,katunayaka', 1),
(4, 'ashika', 'perera', 'ashi200@hotmail.com', '987537657V', '20y', '2020-08-20 12:49:55', '2020-08-20 07:19:55', 1, '+94113456783', '+94713367663', 'no.70,galle rd,katunayaka', 1),
(5, 'hashini', 'lakshika', 'hashini20@asd.lk', '865210067v', '34y', '2020-08-20 13:21:01', '2020-08-20 07:51:01', 1, '+94113459742', '+94713064663', 'no.20,hatan rd,hatan', 1),
(6, 'ashari', 'kanchana', 'ashari@vea.com', '976746942V', '24y', '2020-08-25 12:42:30', '2020-08-25 07:12:30', 1, '+94113458643', '+94717645349', 'n0.50,horana rd,panadura', 1),
(7, 'Anuradha', 'perera', 'anushkaabthj993@gmail.com', '987598657V', '34y', '2020-08-28 20:21:37', '2020-08-28 14:51:37', 0, '+94113456765', '+94713367987', 'n0.50,horana rd,panadura', 1),
(8, 'tashini', 'radhika', 'tashi@new.lk', '935074267v', '24y', '2020-08-31 14:02:05', '2020-08-31 08:32:05', 0, '+94113054254', '+94717524123', 'n0.50,piliyanda rd,panadura', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_treatment`
--

CREATE TABLE `patient_treatment` (
  `patient_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_treatment`
--

INSERT INTO `patient_treatment` (`patient_id`, `treatment_id`) VALUES
(7, 10),
(8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) CHARACTER SET latin1 NOT NULL,
  `role_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'Administrator', 1),
(2, 'Receptionist', 1),
(3, 'Cashier', 1),
(4, 'Dentist', 1),
(5, 'Cleaner', 2),
(6, 'Helper', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `dentist_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `schedule_date` date NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatment_id` int(11) NOT NULL,
  `treatment_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `treatment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatment_id`, `treatment_name`, `treatment_status`) VALUES
(1, 'Bonding', 1),
(2, 'Braces', 1),
(3, 'Bridges and Implants', 1),
(4, 'Crowns and caps', 1),
(5, 'Dentures', 1),
(6, 'Extraction', 1),
(7, 'Filling and repairs', 1),
(8, 'Gum surgery', 1),
(9, 'Root canals', 1),
(10, 'Sealants', 1),
(11, 'Teeth whitening', 1),
(12, 'Veneers', 1),
(13, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `user_lname` varchar(30) CHARACTER SET latin1 NOT NULL,
  `user_image` text CHARACTER SET latin1 NOT NULL,
  `user_email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `user_nic` varchar(12) CHARACTER SET latin1 NOT NULL,
  `user_dob` date NOT NULL,
  `user_create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_gender` int(11) NOT NULL,
  `user_cno1` varchar(20) CHARACTER SET latin1 NOT NULL,
  `user_cno2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_image`, `user_email`, `user_nic`, `user_dob`, `user_create_date`, `user_updated_date`, `user_gender`, `user_cno1`, `user_cno2`, `user_role`, `user_status`) VALUES
(1, 'Anushka', 'Abeyratne', 'user7.jpg', 'anushka@gmail.com', '956745632V', '1995-05-12', '2020-06-30 12:46:24', '2020-08-14 09:49:07', 0, '', '', 0, 1),
(3, 'Anu', 'Abeyaratne', '1595661588_doctorlg.png', 'anusfthj@gmail.com', '935210067v', '2020-07-01', '2020-07-25 12:49:48', '2020-07-25 07:19:48', 0, '+94113456783', '+94713367663', 3, 1),
(4, 'saluka', 'perera', '1595661700_doctorlogo.png', 'anu@gmail.com', '935210067v', '2020-07-07', '2020-07-25 12:51:40', '2020-07-25 07:21:40', 0, '+94113456783', '+94713367663', 2, 1),
(5, 'saluka', 'Abeyaratne', 'defaultImage.jpg', 'anusfhjghkjfthj@gmail.com', '976746328V', '2020-07-29', '2020-07-25 12:53:45', '2020-07-25 07:23:45', 0, '+94113456783', '+94713367663', 1, 1),
(6, 'Anuradha', 'samarasinghe', '1595854661_new1.jpg', 'anuradha@evey.com', '987537657V', '2020-07-21', '2020-07-27 18:27:41', '2020-07-27 12:57:41', 0, '+94113456783', '+94713367663', 4, 1),
(7, 'sanju', 'perera', '1595854763_doctor image.jpg', 'sanju@gmail.com', '987537657V', '2020-07-16', '2020-07-27 18:29:23', '2020-07-27 12:59:23', 0, '+94113456783', '+94713367663', 7, 1),
(8, 'Anuradha', 'samarasinghe', '1595955699_doctor image.jpg', 'anuradhaAA@yahoo.com', '987537657V', '2020-07-14', '2020-07-28 22:31:39', '2020-07-28 17:01:39', 0, '+94113456783', '+94713367663', 1, 1),
(9, 'asanka', 'yapatahne', '1597385542_defaultImage.jpg', 'asanka@yahoo.com', '935096067v', '2020-08-04', '2020-08-14 11:42:22', '2020-08-14 06:12:22', 0, '+94113456783', '+94713367663', 3, 1),
(10, 'praveen', 'Abeyaratne', '1597393838_1597202340_doctor image.jpg', 'pravee@hotmail.com', '199945638V', '2020-08-19', '2020-08-14 14:00:38', '2020-08-14 08:30:38', 0, '+94113459363', '+94713304363', 7, 1),
(11, 'ashika', 'Abeyaratne', '1597394002_1597393717_1597202340_doctor image.jpg', 'ash2008@hotmail.com', '905210867v', '1990-11-30', '2020-08-14 14:03:22', '2020-08-14 08:33:22', 1, '+94113496483', '+94713976663', 7, 1),
(12, 'Dilrukshi', 'Kodagoda', '1597398253_1587300988_1506537566_1502008981_images.jpg', 'dil@gmail.com', '906748328V', '2020-08-21', '2020-08-14 15:14:13', '2020-08-14 09:44:13', 1, '+94113457654', '+947139876663', 2, 1),
(13, 'hasitha', 'de silva', '1597398645_u1.jpg', 'hasi@gmail.com', '935217537v', '2020-08-12', '2020-08-14 15:20:45', '2020-08-14 09:50:45', 1, '+94113450731', '+94713753663', 4, 1),
(14, 'sandaruwan', 'wijesekara', '1597908602_user3.jpg', 'sandu2003@apit.lk', '987510207V', '2020-07-20', '2020-08-20 13:00:02', '2020-08-20 07:30:02', 0, '+94113894383', '+94713367663', 5, 1),
(15, 'sandaruwan', 'wijesekara', '1597908664_user3.jpg', 'sandu2000@apit.lk', '987510207V', '2020-07-20', '2020-08-20 13:01:04', '2020-08-20 07:31:04', 0, '+94113894383', '+94713367663', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `module_role`
--
ALTER TABLE `module_role`
  ADD PRIMARY KEY (`module_id`,`role_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_treatment`
--
ALTER TABLE `patient_treatment`
  ADD PRIMARY KEY (`patient_id`,`treatment_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
