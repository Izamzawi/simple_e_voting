-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 10:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evotec`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `achievement` varchar(100) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `achievement`, `candidate_id`) VALUES
(1, 'Senate President, 2020 Senate of Faculty of Engineering', 1),
(2, 'Gold Medal (team), 2020 National Robot Fair', 1),
(5, 'Project Manager, 2019 Engineering Village, Faculty of Engineering', 1),
(6, '2nd place in DOTA2, 2020 Faculty of Engineering e-Sport Competition', 1),
(7, 'Head Chief, 2019 Mechanical Engineering Student Council', 1),
(8, 'Head of Student Welfare, 2020 Senate of Faculty of Psychology', 2),
(9, 'Senate President, 2020 Senate of Faculty of Law', 3),
(10, '1st place, 2020 National Constitutional Law Debate', 3),
(11, 'Head Chief, 2020 Athletic Club', 2),
(12, 'Vice Project Manager, 2019 Counselling Week for Freshman', 2),
(15, 'Head of Event Division, 2019 College BookFest', 3),
(16, 'Project Manager, 2019 Ready-to-Work, Faculty of Law', 3);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `value` varchar(10) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `description`, `value`, `picture`) VALUES
(1, 'Leon Y Gie', 'He was 2020 Senate President of Faculty of Engineering.', 'leon', 'stylish-businessman'),
(2, 'Kevin Palma', 'Head Chief of Athletic Club. He led them to win Gold Medals in the 2020 National Student Olympics.', 'kevin', 'businessman-torso-suit'),
(3, 'Elmy Anada', 'He was the 2020 Senate President of the Faculty of Law.', 'elmy', 'businessman-torso-suit2');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program`, `candidate_id`) VALUES
(1, 'College Career Talk', 1),
(2, 'Constitution Talk', 3),
(3, 'Athletic Olympic Games', 2),
(4, 'Scholarship Fest', 3),
(5, 'Innovation League', 1),
(6, 'Meet the Professor', 1),
(7, 'Cloud Migration', 3),
(8, 'Senatorial Internship', 2),
(9, 'Green Campus', 2),
(10, 'Literary Art Week', 3);

-- --------------------------------------------------------

--
-- Table structure for table `voterdb`
--

CREATE TABLE `voterdb` (
  `id` int(11) NOT NULL,
  `collegeMail` varchar(50) NOT NULL,
  `completeName` varchar(100) NOT NULL,
  `pinNumber` varchar(1000) NOT NULL,
  `vote` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voterdb`
--

INSERT INTO `voterdb` (`id`, `collegeMail`, `completeName`, `pinNumber`, `vote`) VALUES
(2, 'izamzawi@edu.ac.id', 'Idham Zamzawi', '$2y$10$PubDHEGXQra.CvNA2nfUbeI4HU11WqYrPv7SpGNhw8mozQUTyajOm', 'leon'),
(3, 'setilisti@edu.ac.id', 'Seti Listi', '$2y$10$xtTOjkVYK0EwgAddDGG2pOBhB41qYek2eoZJrgQzMItJ2jLs4Z.fm', 'leon'),
(4, 'ricopp@edu.ac.id', 'Rico Putra', '$2y$10$Q76RqeKRaj7zpUaS4q5ra.Z9pDE/JRgKZmvlSSlB8e1fyjqX4wBbC', 'elmy'),
(5, 'hanindito@edu.ac.id', 'Hanindito Satrio', '$2y$10$V.mu3cctu2EEsDqLHA0K.Owlx/AMlItHdnW7RYjY9zLoyz4MSZF3W', 'elmy'),
(6, 'ammalala@edu.ac.id', 'Amma Rahmala', '$2y$10$1HoQvCMf5xFnfeB7HlnqmeN245phv7l4VehAgS.zfFLyBF86Gf16S', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `voterdb`
--
ALTER TABLE `voterdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `voterdb`
--
ALTER TABLE `voterdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
