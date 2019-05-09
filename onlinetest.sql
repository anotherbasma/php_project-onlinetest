-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 07:16 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `q_question` text NOT NULL,
  `q_answer` text NOT NULL,
  `q_op1` text NOT NULL,
  `q_op2` text NOT NULL,
  `q_op3` text NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `q_question`, `q_answer`, `q_op1`, `q_op2`, `q_op3`, `quiz_id`) VALUES
(1, 'html stands for?', 'hyper text markup language', 'hyper text markup language', 'hyper tarsj markup language', 'hyper text naff language', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `quiz_desc` text NOT NULL,
  `full_mark` int(11) NOT NULL,
  `full_time` varchar(50) NOT NULL,
  `quiz_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_name`, `quiz_desc`, `full_mark`, `full_time`, `quiz_photo`) VALUES
(1, 'html', 'hyper text markup language is first step to web design', 10, '10', 'backend.jpg'),
(2, 'css', 'cascade style sheet is the first steps to web design', 10, '10', 'backend.jpg'),
(3, 'javascript', 'client side scripting language', 10, '10', 'backend.jpg'),
(4, 'php', 'server side scripting language', 10, '10', 'backend.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_mobile`, `user_password`, `is_admin`, `date_created`) VALUES
(1, 'basma', 'prog.basma@gmail.com', '0105454879', '202cb962ac59075b964b07152d234b70', 1, '2019-04-14 05:37:54'),
(2, 'mohamed', 'mohamed@gmail.com', '0102845797', '123456', 0, '2019-04-14 05:37:54'),
(3, 'wafaa', 'wafaa@gmail.com', '01054789852', '123456', 0, '2019-04-14 06:53:35'),
(4, 'omar1', 'omar1@gmail.com', '0102525456', 'bbb8aae57c104cda40c93843ad5e6db8', 0, '2019-04-14 07:48:03'),
(5, 'bbbbb', 'prog.basma1@gmail.com', '0105454879', '123', 0, '2019-04-21 05:44:23'),
(6, 'nashwa', 'nashwa@fg.com', '0102525456', '25d55ad283aa400af464c76d713c07ad', 0, '2019-04-21 06:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz`
--

CREATE TABLE `user_quiz` (
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_time` int(11) NOT NULL,
  `user_quiz_time` varchar(50) NOT NULL,
  `user_quiz_grade` varchar(50) NOT NULL,
  `true_questions` varchar(50) NOT NULL,
  `false_questions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_quiz`
--
ALTER TABLE `user_quiz`
  ADD PRIMARY KEY (`user_id`,`quiz_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Constraints for table `user_quiz`
--
ALTER TABLE `user_quiz`
  ADD CONSTRAINT `user_quiz_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_quiz_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
