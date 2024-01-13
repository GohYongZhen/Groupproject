-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 12:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `admin_name` varchar(120) DEFAULT NULL,
  `admin_contact` varchar(120) DEFAULT NULL,
  `admin_email` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `password`, `admin_name`, `admin_contact`, `admin_email`) VALUES
(6, 'admin', '$2y$10$efEIomFDSD4TPMemYYlti.LVOaWRoe6e0OKyCrWxCZtIsmUOzx/aW', 'Admin', '+6012-3456789', 'admin@mail'),
(7, '2nd admin', '$2y$10$9JYQtRZ/eLCxvxqI56swCOV08.Y0TGhYqWXUVoGD9Ke.EfK9CvFx2', '2nd Admin', '+6012-12345679', 'z@mail'),
(8, 'lucas', '$2y$10$BSKrD.agDuCKh1p53vrCFust3b8Op10OXexY78qAIhX3KMY6.SPj.', 'adminL', '+6012-12345678', 'lucas@mail'),
(9, 'jack', '$2y$10$Rgj8AhRL6vw17RDLEkqekud/9o2Jt1uIpurC/UMZpUUIPnfET.hr.', 'Jack Wong', '+6012-1234566', 'jack@mail');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `ja_id` int(11) NOT NULL,
  `ja_name` varchar(120) DEFAULT NULL,
  `ja_email` varchar(120) DEFAULT NULL,
  `ja_contact` varchar(120) DEFAULT NULL,
  `ja_status` varchar(120) DEFAULT NULL,
  `ja_nationality` varchar(120) DEFAULT NULL,
  `ja_age` varchar(20) DEFAULT NULL,
  `ja_birthday` date DEFAULT NULL,
  `ja_resume` varchar(120) DEFAULT NULL,
  `ja_updationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`ja_id`, `ja_name`, `ja_email`, `ja_contact`, `ja_status`, `ja_nationality`, `ja_age`, `ja_birthday`, `ja_resume`, `ja_updationDate`) VALUES
(30, 'Lucas', 'lucas@mail.com', '+60123456789', 'Unreview', 'Taiwanese', '35', '1989-08-21', 'Assignment 2 2022_23 - question.pdf', '2024-01-11 09:24:00'),
(31, 'Jackson', 'j@mail.com', '+60123456789', 'Reject', 'Canadian', '25', '1999-01-28', 'Assignment 2 2022_23 - question.pdf', '2024-01-11 11:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `cl_name` varchar(120) DEFAULT NULL,
  `cl_agegroup` varchar(120) DEFAULT NULL,
  `cl_time` varchar(120) DEFAULT NULL,
  `cl_photo` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `teacher_id`, `cl_name`, `cl_agegroup`, `cl_time`, `cl_photo`) VALUES
(9, 9, 'animal', '13', '13:00 - 14:00', 'images.jpeg'),
(11, 10, 'Paint', '13', '13:00 - 14:00', 'classroom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrol_id` int(11) NOT NULL,
  `father_name` varchar(120) DEFAULT NULL,
  `mother_name` varchar(120) DEFAULT NULL,
  `parent_contact` varchar(120) DEFAULT NULL,
  `parent_email` varchar(120) DEFAULT NULL,
  `child_name` varchar(120) DEFAULT NULL,
  `age` varchar(120) NOT NULL,
  `program` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `enrol_status` varchar(120) DEFAULT 'Unreview',
  `child_photo` varchar(120) NOT NULL,
  `child_birthday` varchar(120) NOT NULL,
  `enrol_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrol_id`, `father_name`, `mother_name`, `parent_contact`, `parent_email`, `child_name`, `age`, `program`, `message`, `enrol_status`, `child_photo`, `child_birthday`, `enrol_time`) VALUES
(39, 'Shawn', 'Juliet', '0123456789', 'sj@mail', 'Timmy', '3-4 Year', 'Nursery-2.5 to 4 years', 'Dear Indah Preschool,\r\n\r\nI hope this email finds you well. My name is Shawn, and I am reaching out to inquire about your preschool program for my 2-year-old son, Timmy. As a parent, ensuring the best environment and education for my child is of utmost importance to me. I have heard positive things about Indah Preschool and would appreciate more information about your curriculum, facilities, and any special programs you offer for toddlers.\r\n\r\nI am particularly interested in understanding how your preschool fosters early childhood development and encourages a love for learning. Additionally, if there are any upcoming events, orientations, or open houses, please inform me so that I can gain a better understanding of the atmosphere at Indah Preschool.\r\n\r\nFurthermore, could you provide details about the enrollment process, fees, and any necessary documentation required? Timmy is an energetic and curious child, and I want to ensure that he has a nurturing and stimulating environment that aligns with his developmental needs.\r\n\r\nI would be grateful if we could arrange a convenient time for a call or meeting to discuss these matters in more detail. Your assistance and guidance in this matter are highly appreciated.\r\n\r\nThank you for your time and consideration. I look forward to hearing from you soon.\r\n\r\nBest regards,\r\nShawn', 'Unreview', '659fd61ed1033_images.jpeg', '', '2024-01-11 11:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `faci_id` int(11) NOT NULL,
  `faci_name` varchar(120) DEFAULT NULL,
  `faci_photo` varchar(120) DEFAULT NULL,
  `faci_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`faci_id`, `faci_name`, `faci_photo`, `faci_desc`) VALUES
(9, 'Playground', '659dfc4b9ef5e_playground.jpg', 'This is Playground'),
(10, 'Library', 'library.jpg', 'This is Library.');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `ft_id` int(11) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phoneNumber` varchar(120) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`ft_id`, `email`, `phoneNumber`, `address`) VALUES
(1, 'pre-school@example.com', '+6078828576', 'Sabah Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mess_id` int(11) NOT NULL,
  `mess_name` varchar(120) DEFAULT NULL,
  `mess_email` varchar(120) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `mess_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `mess_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mess_id`, `mess_name`, `mess_email`, `message`, `mess_time`, `mess_status`) VALUES
(26, 'asd', 'goh_yong_bi21@iluv.ums.edu.my', 'hello', '2024-01-10 04:17:32', 1),
(27, 'sozai', 'sozai@mail.com', 'Woii apalaciao', '2024-01-10 11:11:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `pagetype` varchar(120) DEFAULT NULL,
  `pageTitle` varchar(120) DEFAULT NULL,
  `smallDescription` varchar(120) DEFAULT NULL,
  `titleDescription` varchar(120) DEFAULT NULL,
  `pageDescription` text DEFAULT NULL,
  `img_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `pagetype`, `pageTitle`, `smallDescription`, `titleDescription`, `pageDescription`, `img_path`) VALUES
(1, 'aboutus', 'About Us', 'Our historical story', 'The Story', 'Playschool helps in building a strong foundation in social, pre-academics, and general life skills.It helps in the development of a child’s emotional and personal growth and provides opportunities for children to learn in ways that sheerly interests them and develop a strong sense of curiosity. Playschool is important for your child as it helps in making the child habitual of the routine. The child also becomes aware of himself/herself and develops motor and cognitive skills. Playschools further enable the child to receive individual attention as the school has a very low student-to-teacher ratio. According to the report, only 48% of poor children who were born in 2001 \"started school ready to learn, compared to 75% of children from middle-income families.\" Additionally, the amount of time parents of various socioeconomic statuses spend reading to their children has changed since the 1960s and 1970s. Parents with higher education read to their kids for up to an additional 30 minutes per day between 2010 and 2012, which adds up by the time the kids enter kindergarten.', 'about.jpg'),
(2, 'homepage', 'Welcome', '', 'To Pre-School ~!!', '\"Step into our preschool wonderland, where laughter dances in the air and curiosity is the key to every little heart. In our cozy haven, every child is a cherished star, twinkling with the joy of discovery and the warmth of friendship. ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `tc_name` varchar(120) DEFAULT NULL,
  `tc_email` varchar(120) DEFAULT NULL,
  `tc_pic` varchar(120) DEFAULT NULL,
  `tc_desc` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `tc_name`, `tc_email`, `tc_pic`, `tc_desc`) VALUES
(9, 'Lucas', 'lucas@gmail.com', 'teacher01.png', 'Artist'),
(10, 'Jun YI', 'Lee@gmail.com', 'teacher02.png', 'Tiktoker'),
(11, 'Taylor', 'Taylor@gmail.com', 'teacher03.png', 'Singer'),
(13, 'Jack', 'Jack@gmail.com', 'teacher05.png', 'Piano Teacher'),
(14, 'Taylor', 'goh_yong_bi21@iluv.ums.edu.my', 'teacher04.png', 'piano teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`ja_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrol_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`faci_id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`ft_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `ja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `faci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `ft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
