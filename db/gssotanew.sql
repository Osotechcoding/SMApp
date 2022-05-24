-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 12:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gssota`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_module_config`
--

CREATE TABLE `api_module_config` (
  `id` int(11) NOT NULL,
  `module` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `api_user` varchar(50) NOT NULL,
  `api_pass` varchar(50) NOT NULL,
  `api_def` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_module_config`
--

INSERT INTO `api_module_config` (`id`, `module`, `type`, `description`, `detail`, `status`, `api_user`, `api_pass`, `api_def`) VALUES
(1, 'student_registration', 'registration', 'Student Registration', 'Enabling this Will allow old students to Register ion the portal', 1, '', '', ''),
(2, 'student_discussion', 'main', 'Student Discussions', 'When enables, students can post and chat with themselves', 1, '', '', ''),
(3, 'student_login', 'login', 'Student Login', 'When Enabled, students will be allowed to log in', 1, '', '', ''),
(4, 'staff_registration', 'registration', 'Staff Registration', 'When enabled, new Staff can register him or herself', 1, '', '', ''),
(5, 'staff_discussion', 'main', 'Staff Discussion', 'When enabled, staff will be allowed to post and chat with themselves', 1, '', '', ''),
(6, 'staff_login', 'login', 'Staff Login', 'When enabled, staff will be able to log in', 1, '', '', ''),
(8, 'paypal_api', 'main', 'Paypal API', 'When enabled, Paypal payment gateway will be active', 1, '', '', ''),
(9, 'sms_api', 'api', 'Bulk SMS API', '<a href=\"http://sms.ifihear.com\">GET API </a>', 1, 'jostinexcel2015', 'jostinexcel2015', 'sms.hypertera.ng'),
(10, 'google_map', 'api', 'Google Map API', 'API to show your location in your website, copy your map url and paste it inside definitions', 1, '', '', 'http://'),
(11, 'smtp', 'api', 'SMTP Details', 'Simple Mail Transfer Protocol: enable you to send email: Instruction the API definition = SMTP serve', 1, '', '', ''),
(13, 'facebook_app', 'api', 'Facebook APP', 'API definition is serving as the app url', 1, '', '', ''),
(14, 'maintenance_mode', 'main', 'Maintenance Mode', 'When this is turned on, the portal puts itself to maintenence mode', 1, '', '', ''),
(15, 'parent_login', 'login', 'Parent Login ', 'When this is enabled, parents can log in', 1, '', '', ''),
(16, 'parent_registration', 'registration', 'Parent Registration', 'When this is Enabled, new Parents can register', 1, '', '', ''),
(17, 'result_checking', 'main', 'Student Result Checking Portal Enable/Disable', 'if this is open, the students can check their result else they cant', 1, '', '', ''),
(18, 'student_result_uploading', 'main', 'Staff Result Uploading', 'When enabled, Staff have the privilege to upload result', 1, '', '', ''),
(19, 'result_note', 'main', 'Show result note', 'When enabled, note will show on result', 1, '', '', ''),
(20, 'result_comment', 'main', 'Result Comment', 'when open, result comment will be shown', 1, '', '', ''),
(21, 'card_generator', 'main', 'Card Generator', 'Enabling this Scratch Card can be Generated', 2, '', '', ''),
(22, 'leave_request', 'main', 'Leave Request', 'When enables, Staff Can Apply for a leave', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `current_session_tbl`
--

CREATE TABLE `current_session_tbl` (
  `id` int(1) NOT NULL,
  `session_desc_name` varchar(20) DEFAULT NULL,
  `term_desc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_session_tbl`
--

INSERT INTO `current_session_tbl` (`id`, `session_desc_name`, `term_desc`) VALUES
(1, '2021/2022', '3rd Term');

-- --------------------------------------------------------

--
-- Table structure for table `register_exam_subject_tbl`
--

CREATE TABLE `register_exam_subject_tbl` (
  `subId` bigint(20) UNSIGNED NOT NULL,
  `std_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stdRegNo` varchar(50) DEFAULT NULL,
  `stdGrade` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `schl_Sess` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reg_pin_history_tbl`
--

CREATE TABLE `reg_pin_history_tbl` (
  `id` bigint(20) NOT NULL,
  `used_by` varchar(50) DEFAULT NULL,
  `pin_code` varchar(50) DEFAULT NULL,
  `pin_serial` varchar(50) DEFAULT NULL,
  `dated` date DEFAULT NULL,
  `timed` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE `school_classes` (
  `class_id` int(11) NOT NULL,
  `class_desc` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `capacity` int(5) DEFAULT NULL,
  `class_code` varchar(20) DEFAULT NULL,
  `class_teacher` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_offices`
--

CREATE TABLE `school_offices` (
  `id` int(5) UNSIGNED NOT NULL,
  `office_desc` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_offices`
--

INSERT INTO `school_offices` (`id`, `office_desc`, `status`, `created_on`) VALUES
(1, 'Principal', 'Active', '2022-05-15'),
(2, 'Vice Principal', 'Active', '2022-05-15'),
(3, 'Class Teacher', 'Active', '2022-05-15'),
(4, 'Bursar', 'Active', '2022-05-17'),
(5, 'Teacher', 'Active', '2022-05-17'),
(6, 'Receptionist', 'Active', '2022-05-17'),
(7, 'Security', 'Active', '2022-05-17'),
(8, 'Registrar', 'Active', '2022-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_desc` varchar(225) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `subject_teacher` varchar(225) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `subject_code` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`subject_id`, `subject_desc`, `level`, `subject_teacher`, `status`, `subject_code`, `created_at`) VALUES
(1, 'Mathematics', NULL, '1,2', 'active', 'MATH101', '2022-04-19'),
(2, 'English Language', NULL, '1', 'active', 'ENG101', '2022-04-19'),
(3, 'Biology', NULL, '1', 'active', 'BIO3392', '2022-04-19'),
(5, 'Agricultural Science', NULL, '2', 'active', 'AGRSC203', '2022-04-19'),
(6, 'Economics', NULL, '2', 'active', 'ECON0913', '2022-04-19'),
(10, 'Chemistry', NULL, '1', 'active', 'CHEM908', '2022-05-10'),
(11, 'Yoruba', NULL, '1,2', 'active', 'YOR', '2022-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(1) NOT NULL,
  `adminType` enum('Admin','Director') NOT NULL DEFAULT 'Director',
  `adminEmail` varchar(225) DEFAULT NULL,
  `adminUser` varchar(50) DEFAULT NULL,
  `adminPass` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `fullname` varchar(225) DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminType`, `adminEmail`, `adminUser`, `adminPass`, `status`, `fullname`, `login_time`, `logout_time`, `token`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'osotech', '$2y$10$y.gA5dihV/vVsrjpH9JFY.FqLxf9n19eOumxg7KU7qblncFh9Kjdq', 0, 'Osotech Software', NULL, NULL, '23456vb8l0mpaxqwe234', '2022-01-26 08:34:42'),
(2, 'Director', 'director@gmail.com', 'supreme', '$2y$10$Mzgh12mNRCAH9079dy.3ieQnC4Bi5nzIMk6k375wB/pilrtxxRgqK', 1, 'Glory Supreme Schools', NULL, NULL, '3wsxvnmk0oo9673saq12', '2022-05-15 22:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ewallet_pins`
--

CREATE TABLE `tbl_ewallet_pins` (
  `pin_id` int(11) NOT NULL,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_pins`
--

CREATE TABLE `tbl_exam_pins` (
  `pin_id` int(11) NOT NULL,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg_pins`
--

CREATE TABLE `tbl_reg_pins` (
  `pin_id` int(11) NOT NULL,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reg_pins`
--

INSERT INTO `tbl_reg_pins` (`pin_id`, `pin_code`, `pin_serial`, `pin_desc`, `price`, `pin_status`, `created_at`) VALUES
(1, '664519872513032', 'WXVA712405B3', 'Registration Pins', 5000, 0, '2022-05-16'),
(2, '163312048752659', 'WXVA3AB878D3', 'Registration Pins', 5000, 0, '2022-05-16'),
(3, '614301292865537', 'WXVA5F021B13', 'Registration Pins', 5000, 0, '2022-05-16'),
(4, '678553221036194', 'WXVA31D3E804', 'Registration Pins', 5000, 0, '2022-05-16'),
(5, '321562756108394', 'WXVA05241470', 'Registration Pins', 5000, 0, '2022-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_pins`
--

CREATE TABLE `tbl_result_pins` (
  `pin_id` int(11) NOT NULL,
  `pin_code` varchar(50) NOT NULL,
  `pin_serial` varchar(50) NOT NULL,
  `pin_desc` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `pin_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_result_pins`
--

INSERT INTO `tbl_result_pins` (`pin_id`, `pin_code`, `pin_serial`, `pin_desc`, `price`, `pin_status`, `created_at`) VALUES
(1, '23546901385271', 'WXVR412040357', 'Result Checker Pins', 500, 0, '2022-05-16'),
(2, '16595163324702', 'WXVR140243705', 'Result Checker Pins', 500, 0, '2022-05-16'),
(3, '84507352162139', 'WXVRF81430DE1', 'Result Checker Pins', 500, 0, '2022-05-16'),
(4, '04951363172652', 'WXVR11D4BF0E1', 'Result Checker Pins', 500, 0, '2022-05-16'),
(5, '56127601234359', 'WXVR240750413', 'Result Checker Pins', 500, 0, '2022-05-16'),
(6, '13275603825149', 'WXVR1730B521F', 'Result Checker Pins', 1000, 0, '2022-05-16'),
(7, '14796202335156', 'WXVR3450112FB', 'Result Checker Pins', 1000, 0, '2022-05-16'),
(8, '31274982351056', 'WXVRA00471436', 'Result Checker Pins', 1000, 0, '2022-05-16'),
(9, '17343921552086', 'WXVR750B41324', 'Result Checker Pins', 1000, 0, '2022-05-16'),
(10, '12051983427563', 'WXVR04D13E1F8', 'Result Checker Pins', 1000, 0, '2022-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result_pins_history`
--

CREATE TABLE `tbl_result_pins_history` (
  `pinId` bigint(20) NOT NULL,
  `studentRegNo` varchar(20) DEFAULT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `pin_code` varchar(20) DEFAULT NULL,
  `pin_serial` varchar(20) DEFAULT NULL,
  `pin_counter` int(1) NOT NULL DEFAULT 0,
  `used_term` varchar(20) DEFAULT NULL,
  `used_session` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serial`
--

CREATE TABLE `tbl_serial` (
  `id` int(1) NOT NULL,
  `serial_key` varchar(225) DEFAULT NULL,
  `activation_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `config_id` int(1) NOT NULL,
  `web_name` varchar(255) DEFAULT NULL,
  `web_slogan` varchar(255) DEFAULT NULL,
  `welcome_msg` text DEFAULT NULL,
  `office_email` varchar(255) DEFAULT NULL,
  `office_address` text DEFAULT NULL,
  `customer_care` varchar(50) DEFAULT NULL,
  `office_phone` varchar(50) DEFAULT NULL,
  `day_from` varchar(255) DEFAULT NULL,
  `day_to` varchar(50) DEFAULT NULL,
  `time_from` varchar(50) DEFAULT NULL,
  `time_to` varchar(50) DEFAULT NULL,
  `web_logo` varchar(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`config_id`, `web_name`, `web_slogan`, `welcome_msg`, `office_email`, `office_address`, `customer_care`, `office_phone`, `day_from`, `day_to`, `time_from`, `time_to`, `web_logo`, `state`, `town`, `country`) VALUES
(1, 'Osotech School Portal', 'All about your Satisfaction', 'Welcome to Osotech School Portal  This is just a demo welcome message to all Users short', 'info@osotechsoftware.com.ng', 'Sango Ota Ogun state', '08000990090', '09098989878', 'Monday', 'Friday', '9:00 am', '5:00 pm', 'logo_04040fedb9.png', 'Ogun State', 'Sango Ota', 'Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `visap_behavioral_tbl`
--

CREATE TABLE `visap_behavioral_tbl` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `reg_number` varchar(20) DEFAULT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `session` varchar(30) DEFAULT NULL,
  `hand_writing` int(2) DEFAULT NULL,
  `musical_skills` int(2) DEFAULT NULL,
  `sports` int(2) DEFAULT NULL,
  `health` int(2) DEFAULT NULL,
  `attentiveness` int(2) DEFAULT NULL,
  `attitude_to_work` int(2) DEFAULT NULL,
  `politeness` int(2) DEFAULT NULL,
  `punctality` int(2) DEFAULT NULL,
  `class_teacher` varchar(200) DEFAULT NULL,
  `uploaded_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_behavioral_tbl`
--

INSERT INTO `visap_behavioral_tbl` (`id`, `student_id`, `reg_number`, `student_class`, `term`, `session`, `hand_writing`, `musical_skills`, `sports`, `health`, `attentiveness`, `attitude_to_work`, `politeness`, `punctality`, `class_teacher`, `uploaded_date`) VALUES
(1, 1, 'GSS2022-0001', 'BASIC I', '1st Term', '2021/2022', 2, 3, 4, 3, 5, 1, 4, 2, 'Agberayi Samson I', '2022-05-18'),
(2, 1, 'GSS2022-0001', 'BASIC II', '3rd Term', '2021/2022', 4, 3, 3, 1, 4, 3, 1, 5, 'Samson Jerry', '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `visap_classnote_tbl`
--

CREATE TABLE `visap_classnote_tbl` (
  `noteId` bigint(20) UNSIGNED NOT NULL,
  `std_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reg_number` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `subjectId` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `subtopic` varchar(255) DEFAULT NULL,
  `note_content` text DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_class_attendance_tbl`
--

CREATE TABLE `visap_class_attendance_tbl` (
  `attend_id` bigint(20) UNSIGNED NOT NULL,
  `stdReg` varchar(20) DEFAULT NULL,
  `studentGrade` varchar(20) DEFAULT NULL,
  `roll_call` varchar(20) DEFAULT NULL,
  `attendant_date` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_session` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_class_attendance_tbl`
--

INSERT INTO `visap_class_attendance_tbl` (`attend_id`, `stdReg`, `studentGrade`, `roll_call`, `attendant_date`, `term`, `schl_session`, `created_at`) VALUES
(1, 'GSS2022-0001', 'BASIC II', 'Present', '2022-05-21', '3rd Term', '2021/2022', '2022-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `visap_class_grade_tbl`
--

CREATE TABLE `visap_class_grade_tbl` (
  `gradeId` int(11) NOT NULL,
  `gradeDesc` varchar(50) DEFAULT NULL,
  `grade_division` varchar(2) DEFAULT NULL,
  `grade_dept` varchar(50) DEFAULT NULL,
  `grade_teacher` int(11) DEFAULT NULL,
  `grade_status` enum('pending','active','closed') NOT NULL DEFAULT 'active',
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_class_grade_tbl`
--

INSERT INTO `visap_class_grade_tbl` (`gradeId`, `gradeDesc`, `grade_division`, `grade_dept`, `grade_teacher`, `grade_status`, `created_at`) VALUES
(3, 'BASIC I', 'A', 'none', 1, 'active', '2022-04-20'),
(4, 'BASIC II', 'A', 'none', 2, 'active', '2022-04-20'),
(6, 'KG1', 'A', 'none', NULL, 'active', '2022-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `visap_fee_component_tbl`
--

CREATE TABLE `visap_fee_component_tbl` (
  `compId` int(11) NOT NULL,
  `feeType` varchar(100) DEFAULT NULL,
  `fee_status` enum('Pending','Active') DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_fee_component_tbl`
--

INSERT INTO `visap_fee_component_tbl` (`compId`, `feeType`, `fee_status`, `date`) VALUES
(1, 'Tuition', 'Active', '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `visap_loan_tbl`
--

CREATE TABLE `visap_loan_tbl` (
  `loanId` int(11) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `capitalAmount` float DEFAULT NULL,
  `interesetRate` float DEFAULT NULL,
  `paybackYears` float DEFAULT NULL,
  `monthlyPayment` float DEFAULT NULL,
  `totalPayment` float DEFAULT NULL,
  `totalInterest` float DEFAULT NULL,
  `loanStatus` tinyint(1) NOT NULL DEFAULT 0,
  `cterm` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `submitted_date` date DEFAULT NULL,
  `returnedAmount` float DEFAULT NULL,
  `due` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_offered_subject_tbl`
--

CREATE TABLE `visap_offered_subject_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_class` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `aca_session` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_prefect_title_tbl`
--

CREATE TABLE `visap_prefect_title_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_prefect_title_tbl`
--

INSERT INTO `visap_prefect_title_tbl` (`id`, `title`, `status`, `created_at`) VALUES
(1, 'Head Boy', 'Active', '2022-05-22'),
(2, 'Head Girl', 'Active', '2022-05-22'),
(3, 'Asst. Head Boy', 'Active', '2022-05-22'),
(4, 'Asst. Head Girl', 'Active', '2022-05-22'),
(5, 'Head Chapel Prefect', 'Active', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `visap_registered_subject_tbl`
--

CREATE TABLE `visap_registered_subject_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_class` varchar(50) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `createdBy` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_registered_subject_tbl`
--

INSERT INTO `visap_registered_subject_tbl` (`id`, `subject_class`, `subject_name`, `createdBy`, `created_at`) VALUES
(3, 'BASIC II', 'Agricultural Science', 'osotech', '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `visap_result_comment_tbl`
--

CREATE TABLE `visap_result_comment_tbl` (
  `commentId` bigint(20) UNSIGNED NOT NULL,
  `stdRegNo` varchar(20) DEFAULT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `teacher_comment` text DEFAULT NULL,
  `principal_coment` text DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schl_Sess` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_result_grading_tbl`
--

CREATE TABLE `visap_result_grading_tbl` (
  `grading_id` int(11) NOT NULL,
  `grade_class` varchar(20) NOT NULL,
  `mark_grade` varchar(3) DEFAULT NULL,
  `score_from` int(4) DEFAULT 0,
  `score_to` int(4) DEFAULT NULL,
  `score_remark` varchar(50) DEFAULT NULL,
  `school_ses` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_result_grading_tbl`
--

INSERT INTO `visap_result_grading_tbl` (`grading_id`, `grade_class`, `mark_grade`, `score_from`, `score_to`, `score_remark`, `school_ses`) VALUES
(1, 'Pry', 'A', 89, 100, 'Excellence', '2021/2022'),
(2, 'Pry', 'B', 79, 88, 'V.Good', '2021/2022'),
(3, 'Pry', 'C', 60, 74, 'Good', '2021/2022'),
(4, 'Pry', 'D', 45, 49, 'Poor', '2021/2022'),
(5, 'Pry', 'E', 35, 39, 'Fair', '2021/2022'),
(6, 'Pry', 'F', 10, 28, 'Failed', '2021/2022'),
(7, 'Junior', 'A', 70, 100, 'Excellence', '2021/2022'),
(8, 'Junior', 'B', 60, 69, 'V.Good', '2021/2022'),
(9, 'Junior', 'C', 50, 59, 'Good', '2021/2022'),
(10, 'Junior', 'D', 40, 49, 'Poor', '2021/2022'),
(11, 'Junior', 'E', 30, 39, 'Fair', '2021/2022'),
(12, 'Junior', 'F', 5, 29, 'Fail', '2021/2022'),
(13, 'Senior', 'A1', 80, 100, 'Distinctions', '2021/2022'),
(14, 'Senior', 'B2', 60, 70, 'Excellence', '2021/2022'),
(15, 'Senior', 'B3', 69, 74, 'Good', '2021/2022'),
(16, 'Senior', 'C4', 65, 69, 'Credit', '2021/2022'),
(17, 'Senior', 'C5', 61, 64, 'Credit', '2021/2022'),
(18, 'Senior', 'C6', 55, 59, 'Pass', '2021/2022'),
(19, 'Senior', 'D7', 40, 49, 'Pass', '2021/2022'),
(20, 'Senior', 'E8', 35, 39, 'Poor', '2021/2022'),
(21, 'Senior', 'F9', 5, 30, 'Failed', '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_expense_tbl`
--

CREATE TABLE `visap_school_expense_tbl` (
  `expense_id` int(11) NOT NULL,
  `expense_desc` text DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `cterm` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_fee_allocation_tbl`
--

CREATE TABLE `visap_school_fee_allocation_tbl` (
  `faId` int(11) NOT NULL,
  `component_id` varchar(50) DEFAULT NULL,
  `gradeDesc` varchar(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_school_fee_allocation_tbl`
--

INSERT INTO `visap_school_fee_allocation_tbl` (`faId`, `component_id`, `gradeDesc`, `amount`, `created_on`, `updated_at`) VALUES
(1, 'Tuition', 'BASIC II', 20000, '2022-05-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_prefect_tbl`
--

CREATE TABLE `visap_school_prefect_tbl` (
  `prefectId` int(11) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `studentGrade` varchar(20) DEFAULT NULL,
  `officeName` varchar(200) DEFAULT NULL,
  `school_session` varchar(50) DEFAULT NULL,
  `activeness` tinyint(1) NOT NULL DEFAULT 1,
  `created_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_school_prefect_tbl`
--

INSERT INTO `visap_school_prefect_tbl` (`prefectId`, `student_id`, `studentGrade`, `officeName`, `school_session`, `activeness`, `created_on`) VALUES
(1, 1, 'BASIC II A', 'Asst. Head Girl', '2021/2022', 1, '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_profile`
--

CREATE TABLE `visap_school_profile` (
  `id` int(1) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `govt_approve_number` varchar(20) DEFAULT NULL,
  `school_address` text DEFAULT NULL,
  `school_slogan` varchar(255) DEFAULT NULL,
  `school_director` varchar(100) DEFAULT NULL,
  `director_mobile` varchar(20) DEFAULT NULL,
  `registrar` varchar(100) DEFAULT NULL,
  `registrar_mobile` varchar(20) DEFAULT NULL,
  `principal` varchar(100) DEFAULT NULL,
  `principal_mobile` varchar(20) DEFAULT NULL,
  `school_state` varchar(50) DEFAULT NULL,
  `school_city` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postal_code` int(5) DEFAULT NULL,
  `school_email` varchar(100) DEFAULT NULL,
  `school_phone` varchar(15) DEFAULT NULL,
  `school_fax` varchar(15) DEFAULT NULL,
  `website_url` text DEFAULT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `school_barcode` varchar(255) DEFAULT NULL,
  `school_badge` varchar(255) DEFAULT NULL,
  `school_favicon` varchar(25) DEFAULT NULL,
  `default_language` varchar(100) DEFAULT NULL,
  `school_history` text DEFAULT NULL,
  `founded_year` varchar(20) DEFAULT NULL,
  `school_gmail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_school_profile`
--

INSERT INTO `visap_school_profile` (`id`, `school_name`, `govt_approve_number`, `school_address`, `school_slogan`, `school_director`, `director_mobile`, `registrar`, `registrar_mobile`, `principal`, `principal_mobile`, `school_state`, `school_city`, `country`, `postal_code`, `school_email`, `school_phone`, `school_fax`, `website_url`, `website_name`, `school_logo`, `school_barcode`, `school_badge`, `school_favicon`, `default_language`, `school_history`, `founded_year`, `school_gmail`) VALUES
(1, 'GLORY SUPREME SCHOOLS OTA', 'OGS/EDU/002', '1 - 5, Glory Supreme Avanue,\r\nIjagba, Onigbin, Ota, Ogun State, Nigeria', 'Education Is Light', 'Engr Femi Ayeni', '+2348038546164', 'Mr Oluwadamilola A', '+2348038546164', 'Mr Sanusi O', '+2348038546164', 'Ogun State', 'Ota', 'Nigeria', 2345, 'info@glorysupremeschool.com', '08038546164', '08038546164', 'www.glorysupremeschool.com', 'www.glorysupremeschool.com', 'schlogo.jpg', NULL, NULL, NULL, 'English', 'Glory Supreme School is a school designed to provide learning in conducive environment for the teaching of students under the direction of qualified teachers. In our school, students progress through a series of school activities.\r\n\r\nThe school was established in the year 2012 and has since increase in population as our aim is to provide competitive and quality education in a conducive environment with all learning aids.\r\n\r\nWe have highly qualified teachers taking all the various subjects from Basic level to secondary level. All subjects are covered and the curriculum of the school is based on the scheme of work from the ministry of education.', '2nd May,1998', 'glorysupremeschool@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_session_history_tbl`
--

CREATE TABLE `visap_school_session_history_tbl` (
  `sehisId` int(1) NOT NULL,
  `active_session` varchar(50) NOT NULL,
  `active_term` varchar(20) NOT NULL,
  `Days_open` int(3) NOT NULL,
  `Weeks_open` int(3) NOT NULL,
  `term_ended` date NOT NULL,
  `new_term_begins` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_school_session_tbl`
--

CREATE TABLE `visap_school_session_tbl` (
  `seId` int(1) NOT NULL,
  `active_session` varchar(50) NOT NULL,
  `active_term` enum('1st Term','2nd Term','3rd Term') NOT NULL DEFAULT '1st Term',
  `Days_open` int(3) NOT NULL,
  `Weeks_open` int(3) NOT NULL,
  `term_ended` date NOT NULL,
  `new_term_begins` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_school_session_tbl`
--

INSERT INTO `visap_school_session_tbl` (`seId`, `active_session`, `active_term`, `Days_open`, `Weeks_open`, `term_ended`, `new_term_begins`) VALUES
(1, '2021/2022', '3rd Term', 70, 15, '2022-07-20', '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `visap_session_list`
--

CREATE TABLE `visap_session_list` (
  `id` int(11) NOT NULL,
  `session_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_session_list`
--

INSERT INTO `visap_session_list` (`id`, `session_desc`) VALUES
(1, '2020/2021'),
(3, '2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `visap_social_link_tbl`
--

CREATE TABLE `visap_social_link_tbl` (
  `id` int(1) NOT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `goggle` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_social_link_tbl`
--

INSERT INTO `visap_social_link_tbl` (`id`, `twitter`, `youtube`, `facebook`, `goggle`, `instagram`, `linkedin`) VALUES
(1, 'https://www.twitter.com/glorysupremeschoolota', 'https://youtube.com/glorysupremeschoolota', 'https://facebook.com/glorysupremeschoolota', 'https://googleplus.com/glorysupremeschoolota', 'https://instagram.com/glorysupremeschoolota', 'https://www.linkedin.com/glorysupremeschoolota');

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_bank_details_tbl`
--

CREATE TABLE `visap_staff_bank_details_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_duty_tbl`
--

CREATE TABLE `visap_staff_duty_tbl` (
  `duty_id` int(11) NOT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `duty` varchar(255) DEFAULT NULL,
  `duty_week` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_paid_salary_tbl`
--

CREATE TABLE `visap_staff_paid_salary_tbl` (
  `salaryId` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `forMonth` varchar(50) DEFAULT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `bank_status` varchar(20) DEFAULT NULL,
  `csession` varchar(20) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_payroll_tbl`
--

CREATE TABLE `visap_staff_payroll_tbl` (
  `payrollId` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `rent_alawi` float DEFAULT NULL,
  `transport_alawi` float DEFAULT NULL,
  `cloth_alawi` float DEFAULT NULL,
  `med_alawi` float DEFAULT NULL,
  `tds` float DEFAULT NULL,
  `net_salary` float DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_post_tbl`
--

CREATE TABLE `visap_staff_post_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `duty` varchar(20) DEFAULT NULL,
  `office` varchar(100) DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `schlSes` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_staff_post_tbl`
--

INSERT INTO `visap_staff_post_tbl` (`id`, `staff_id`, `duty`, `office`, `term`, `schlSes`) VALUES
(1, 1, NULL, 'Principal', NULL, NULL),
(2, 2, NULL, 'Class Teacher', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visap_staff_tbl`
--

CREATE TABLE `visap_staff_tbl` (
  `staffId` int(11) NOT NULL,
  `staffRegNo` varchar(50) DEFAULT NULL,
  `staffGrade` varchar(50) DEFAULT NULL,
  `staffRole` varchar(100) DEFAULT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `staffEmail` varchar(160) NOT NULL,
  `staffPass` varchar(255) DEFAULT NULL,
  `staffUser` varchar(50) DEFAULT NULL,
  `staffDob` date DEFAULT NULL,
  `staffEducation` varchar(100) DEFAULT NULL,
  `staffPhone` varchar(50) DEFAULT NULL,
  `staffCourse` varchar(255) DEFAULT NULL,
  `staffAddress` text DEFAULT NULL,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `staffToken` varchar(100) DEFAULT NULL,
  `tokenExpire` datetime DEFAULT NULL,
  `staffPassport` varchar(255) DEFAULT NULL,
  `staffGender` enum('Male','Female','Other') DEFAULT NULL,
  `maritalStatus` varchar(50) DEFAULT NULL,
  `portalEmail` varchar(100) DEFAULT NULL,
  `jobStatus` tinyint(1) NOT NULL DEFAULT 0,
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `staffType` enum('Teaching','Non-Teaching') DEFAULT NULL,
  `appliedDate` date DEFAULT NULL,
  `staffAssignedClass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_staff_tbl`
--

INSERT INTO `visap_staff_tbl` (`staffId`, `staffRegNo`, `staffGrade`, `staffRole`, `firstName`, `lastName`, `staffEmail`, `staffPass`, `staffUser`, `staffDob`, `staffEducation`, `staffPhone`, `staffCourse`, `staffAddress`, `confirmation_code`, `staffToken`, `tokenExpire`, `staffPassport`, `staffGender`, `maritalStatus`, `portalEmail`, `jobStatus`, `online`, `staffType`, `appliedDate`, `staffAssignedClass`) VALUES
(1, 'GSSTA22-001', 'BASIC I A', 'Principal', 'Samson Idowu', 'Agberayi', 'samson@gmail.com', '$2y$10$y.gA5dihV/vVsrjpH9JFY.FqLxf9n19eOumxg7KU7qblncFh9Kjdq', 'samson', '1992-05-20', 'NCE', '08131374443', NULL, NULL, '2807aa0cc740236', NULL, NULL, NULL, 'Male', NULL, 'samson@gssota.portal', 1, 0, 'Teaching', '2022-05-16', NULL),
(2, 'GSSTA22-002', 'BASIC II A', 'Class Teacher', 'Blessing Oiza', 'Agberayi', 'oiza@gmail.com', '$2y$10$y.gA5dihV/vVsrjpH9JFY.FqLxf9n19eOumxg7KU7qblncFh9Kjdq', 'oiza', NULL, 'BSc', '09036583063', NULL, NULL, '9b15e59aa2ecb04', NULL, NULL, NULL, 'Female', NULL, 'oiza@gssota.portal', 1, 0, 'Teaching', '2022-05-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visap_stdmedical_tbl`
--

CREATE TABLE `visap_stdmedical_tbl` (
  `medicalId` bigint(20) UNSIGNED NOT NULL,
  `studId` bigint(20) UNSIGNED NOT NULL,
  `stdHospitalName` varchar(255) DEFAULT NULL,
  `stdHospitalOwner` varchar(255) DEFAULT NULL,
  `stdHospitalPhone` varchar(20) DEFAULT NULL,
  `stdRegDate` date DEFAULT NULL,
  `stdHospitalAddress` text DEFAULT NULL,
  `stdBlood` varchar(20) DEFAULT NULL,
  `stdGenotype` varchar(5) DEFAULT NULL,
  `stdSickness` varchar(100) DEFAULT NULL,
  `stdFamilySickness` varchar(100) DEFAULT NULL,
  `stdIsHospitalized` tinyint(1) DEFAULT NULL COMMENT '0=No, 1=Yes',
  `stdSurgical` tinyint(1) DEFAULT NULL COMMENT '0=No, 1=Yes',
  `stdLastScanedReport` varchar(255) DEFAULT NULL,
  `stdBcertificate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_stdpreschlinfo`
--

CREATE TABLE `visap_stdpreschlinfo` (
  `preId` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `stdSchoolName` varchar(255) DEFAULT NULL,
  `stdDirectorName` varchar(100) DEFAULT NULL,
  `stdSchoolPhone` varchar(20) DEFAULT NULL,
  `stdSchLocation` text DEFAULT NULL,
  `stdSchoolType` varchar(50) DEFAULT NULL,
  `stdSchlCat` varchar(50) DEFAULT NULL,
  `stdSchlEduLevel` varchar(50) DEFAULT NULL,
  `stdPresentClass` varchar(50) DEFAULT NULL,
  `stdReasonInPreClass` text DEFAULT NULL,
  `stdLastReportSheet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_info_tbl`
--

CREATE TABLE `visap_student_info_tbl` (
  `stdInfoId` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `stdBirthCert` varchar(50) DEFAULT NULL,
  `stdCountry` varchar(50) DEFAULT NULL,
  `stdSOR` varchar(100) DEFAULT NULL,
  `stdLGA` varchar(100) DEFAULT NULL,
  `stdHomeTown` varchar(50) DEFAULT NULL,
  `stdReligion` varchar(50) DEFAULT NULL,
  `stdDisability` varchar(50) DEFAULT NULL,
  `stdPermaAdd` text DEFAULT NULL,
  `stdMGTitle` varchar(50) DEFAULT NULL COMMENT 'MG= Male Guardian ',
  `stdMGName` varchar(255) DEFAULT NULL,
  `stdMGRelationship` varchar(50) DEFAULT NULL,
  `stdMGPhone` varchar(20) DEFAULT NULL,
  `stdMGEmail` varchar(100) DEFAULT NULL,
  `stdMGOccupation` varchar(255) DEFAULT NULL,
  `stdMGAddress` text DEFAULT NULL,
  `stdFGTitle` varchar(50) DEFAULT NULL COMMENT 'FG = Female Guardian',
  `stdFGName` varchar(255) DEFAULT NULL,
  `stdFGRelationship` varchar(50) DEFAULT NULL,
  `stdFGPhone` varchar(20) DEFAULT NULL,
  `stdFGEmail` varchar(100) DEFAULT NULL,
  `stdFGOccupation` varchar(255) DEFAULT NULL,
  `stdFGAddress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_payment_history_tbl`
--

CREATE TABLE `visap_student_payment_history_tbl` (
  `phId` bigint(20) NOT NULL,
  `std_id` bigint(20) NOT NULL,
  `stdAdmNo` varchar(50) NOT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `component_fee` varchar(100) DEFAULT NULL,
  `total_fee` double DEFAULT NULL,
  `fee_paid` double DEFAULT NULL,
  `fee_due` double DEFAULT NULL,
  `payment_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=not paid,1=not cleared,2=cleared',
  `payment_date` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `sch_session` varchar(20) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `teller` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `collectedBy` varchar(100) DEFAULT NULL,
  `today_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_student_payment_history_tbl`
--

INSERT INTO `visap_student_payment_history_tbl` (`phId`, `std_id`, `stdAdmNo`, `stdGrade`, `component_fee`, `total_fee`, `fee_paid`, `fee_due`, `payment_status`, `payment_date`, `term`, `sch_session`, `payment_method`, `teller`, `bank_name`, `collectedBy`, `today_date`) VALUES
(1, 1, 'GSS2022-0001', 'BASIC II', 'Tuition', 20000, 15000, 5000, 1, '2022-05-20', '3rd Term', '2021/2022', 'Bank', '0977651239834', 'UBA', '\r\nNotice:  Undefined index: ADMIN_ID in C:\nmpphtdocsgssotadmin	emplateStuPaymentFeeModal.php on lin', '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_payment_tbl`
--

CREATE TABLE `visap_student_payment_tbl` (
  `paymentId` bigint(20) NOT NULL,
  `std_id` bigint(20) NOT NULL,
  `stdAdmNo` varchar(50) NOT NULL,
  `stdGrade` varchar(20) DEFAULT NULL,
  `component_fee` varchar(100) DEFAULT NULL,
  `total_fee` double DEFAULT NULL,
  `fee_paid` double DEFAULT NULL,
  `fee_due` double DEFAULT NULL,
  `payment_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=not paid,1=not cleared,2=cleared',
  `payment_date` date DEFAULT NULL,
  `term` varchar(20) DEFAULT NULL,
  `sch_session` varchar(20) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `teller` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `collectedBy` varchar(100) DEFAULT NULL,
  `today_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_student_payment_tbl`
--

INSERT INTO `visap_student_payment_tbl` (`paymentId`, `std_id`, `stdAdmNo`, `stdGrade`, `component_fee`, `total_fee`, `fee_paid`, `fee_due`, `payment_status`, `payment_date`, `term`, `sch_session`, `payment_method`, `teller`, `bank_name`, `collectedBy`, `today_date`) VALUES
(1, 1, 'GSS2022-0001', 'BASIC II', 'Tuition', 20000, 15000, 5000, 1, '2022-05-20', '3rd Term', '2021/2022', 'Bank', NULL, NULL, '\r\nNotice:  Undefined index: ADMIN_ID in C:\nmpphtdocsgssotadmin	emplateStuPaymentFeeModal.php on lin', '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `visap_student_tbl`
--

CREATE TABLE `visap_student_tbl` (
  `stdId` bigint(20) UNSIGNED NOT NULL,
  `stdRegNo` varchar(20) DEFAULT NULL,
  `stdEmail` varchar(160) DEFAULT NULL,
  `stdUserName` varchar(50) DEFAULT NULL,
  `stdPassword` varchar(255) DEFAULT NULL,
  `studentClass` varchar(50) DEFAULT NULL,
  `stdSurName` varchar(100) DEFAULT NULL,
  `stdFirstName` varchar(50) DEFAULT NULL,
  `stdMiddleName` varchar(50) NOT NULL,
  `stdDob` date DEFAULT NULL,
  `stdGender` varchar(20) DEFAULT NULL,
  `stdAddress` text DEFAULT NULL,
  `stdPhone` varchar(20) DEFAULT NULL,
  `stdAdmStatus` enum('Pending','Active','Expelled','Suspended','Transfered','Graduated') NOT NULL DEFAULT 'Pending',
  `stdApplyDate` date DEFAULT NULL,
  `stdApplyType` enum('Day','Boarding') NOT NULL DEFAULT 'Day',
  `stdPassport` varchar(255) DEFAULT NULL,
  `stdConfToken` varchar(255) DEFAULT NULL,
  `stdTokenExp` datetime DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_student_tbl`
--

INSERT INTO `visap_student_tbl` (`stdId`, `stdRegNo`, `stdEmail`, `stdUserName`, `stdPassword`, `studentClass`, `stdSurName`, `stdFirstName`, `stdMiddleName`, `stdDob`, `stdGender`, `stdAddress`, `stdPhone`, `stdAdmStatus`, `stdApplyDate`, `stdApplyType`, `stdPassport`, `stdConfToken`, `stdTokenExp`, `is_online`) VALUES
(1, 'GSS2022-0001', 'adeola@gmail.com', 'adeola', '$2y$10$zfVSuod1ShL6V6BSRg64R.hLBIvVL0intZSD4w5h/EZP/245lTKdq', 'BASIC II A', 'Ademola', 'Adeola', 'Adewumi', '2016-09-07', 'Male', '31, Sango Ota, Ogun State', '08132127763', 'Active', '2022-05-11', 'Day', NULL, '4205143f5ef927', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visap_termly_result_tbl`
--

CREATE TABLE `visap_termly_result_tbl` (
  `reportId` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED DEFAULT NULL,
  `stdRegCode` varchar(50) DEFAULT NULL,
  `studentGrade` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `aca_session` varchar(50) DEFAULT NULL,
  `subjectName` varchar(255) DEFAULT NULL,
  `ca` int(3) DEFAULT NULL,
  `test1` int(3) DEFAULT NULL,
  `test2` int(3) DEFAULT NULL,
  `exam` int(3) DEFAULT NULL,
  `overallMark` int(4) DEFAULT NULL,
  `subjectRank` int(4) DEFAULT NULL,
  `mark_average` double NOT NULL DEFAULT 0,
  `uploadedTime` time DEFAULT NULL,
  `uploadedDate` date DEFAULT NULL,
  `rStatus` smallint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visap_termly_result_tbl`
--

INSERT INTO `visap_termly_result_tbl` (`reportId`, `studentId`, `stdRegCode`, `studentGrade`, `term`, `aca_session`, `subjectName`, `ca`, `test1`, `test2`, `exam`, `overallMark`, `subjectRank`, `mark_average`, `uploadedTime`, `uploadedDate`, `rStatus`) VALUES
(1, NULL, 'GSS2022-0001', 'BASIC II', '3rd Term', '2021/2022', 'AGRICULTURAL SCIENCE', 8, 13, 12, 56, 89, NULL, 29.666666666667, '09:29:03', '2022-05-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visap_virtual_lesson_tbl`
--

CREATE TABLE `visap_virtual_lesson_tbl` (
  `lectureId` int(11) NOT NULL,
  `lesson_file` varchar(255) DEFAULT NULL,
  `lesson_topic` varchar(255) DEFAULT NULL,
  `lesson_grade` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `teacher` int(11) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `uploaded_date` date DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_book`
--

CREATE TABLE `visitor_book` (
  `visitor_id` int(10) UNSIGNED NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_phone` varchar(50) DEFAULT NULL,
  `visitor_address` text DEFAULT NULL,
  `whom_to_see` varchar(255) DEFAULT NULL,
  `purpose_of_visit` text DEFAULT NULL,
  `checkIn_time` datetime DEFAULT NULL,
  `checkOut_time` datetime DEFAULT NULL,
  `NIN_number` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `cterm` varchar(50) DEFAULT NULL,
  `cses` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_module_config`
--
ALTER TABLE `api_module_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `current_session_tbl`
--
ALTER TABLE `current_session_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_exam_subject_tbl`
--
ALTER TABLE `register_exam_subject_tbl`
  ADD PRIMARY KEY (`subId`);

--
-- Indexes for table `reg_pin_history_tbl`
--
ALTER TABLE `reg_pin_history_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `school_offices`
--
ALTER TABLE `school_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ewallet_pins`
--
ALTER TABLE `tbl_ewallet_pins`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `tbl_exam_pins`
--
ALTER TABLE `tbl_exam_pins`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `tbl_reg_pins`
--
ALTER TABLE `tbl_reg_pins`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `tbl_result_pins`
--
ALTER TABLE `tbl_result_pins`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indexes for table `tbl_result_pins_history`
--
ALTER TABLE `tbl_result_pins_history`
  ADD PRIMARY KEY (`pinId`);

--
-- Indexes for table `tbl_serial`
--
ALTER TABLE `tbl_serial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `visap_behavioral_tbl`
--
ALTER TABLE `visap_behavioral_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_classnote_tbl`
--
ALTER TABLE `visap_classnote_tbl`
  ADD PRIMARY KEY (`noteId`);

--
-- Indexes for table `visap_class_attendance_tbl`
--
ALTER TABLE `visap_class_attendance_tbl`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `visap_class_grade_tbl`
--
ALTER TABLE `visap_class_grade_tbl`
  ADD PRIMARY KEY (`gradeId`);

--
-- Indexes for table `visap_fee_component_tbl`
--
ALTER TABLE `visap_fee_component_tbl`
  ADD PRIMARY KEY (`compId`);

--
-- Indexes for table `visap_loan_tbl`
--
ALTER TABLE `visap_loan_tbl`
  ADD PRIMARY KEY (`loanId`);

--
-- Indexes for table `visap_offered_subject_tbl`
--
ALTER TABLE `visap_offered_subject_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_prefect_title_tbl`
--
ALTER TABLE `visap_prefect_title_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_registered_subject_tbl`
--
ALTER TABLE `visap_registered_subject_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_result_comment_tbl`
--
ALTER TABLE `visap_result_comment_tbl`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `visap_result_grading_tbl`
--
ALTER TABLE `visap_result_grading_tbl`
  ADD PRIMARY KEY (`grading_id`);

--
-- Indexes for table `visap_school_expense_tbl`
--
ALTER TABLE `visap_school_expense_tbl`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `visap_school_fee_allocation_tbl`
--
ALTER TABLE `visap_school_fee_allocation_tbl`
  ADD PRIMARY KEY (`faId`);

--
-- Indexes for table `visap_school_prefect_tbl`
--
ALTER TABLE `visap_school_prefect_tbl`
  ADD PRIMARY KEY (`prefectId`);

--
-- Indexes for table `visap_school_profile`
--
ALTER TABLE `visap_school_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_school_session_history_tbl`
--
ALTER TABLE `visap_school_session_history_tbl`
  ADD PRIMARY KEY (`sehisId`);

--
-- Indexes for table `visap_school_session_tbl`
--
ALTER TABLE `visap_school_session_tbl`
  ADD PRIMARY KEY (`seId`);

--
-- Indexes for table `visap_session_list`
--
ALTER TABLE `visap_session_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_social_link_tbl`
--
ALTER TABLE `visap_social_link_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_staff_bank_details_tbl`
--
ALTER TABLE `visap_staff_bank_details_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_staff_duty_tbl`
--
ALTER TABLE `visap_staff_duty_tbl`
  ADD PRIMARY KEY (`duty_id`);

--
-- Indexes for table `visap_staff_paid_salary_tbl`
--
ALTER TABLE `visap_staff_paid_salary_tbl`
  ADD PRIMARY KEY (`salaryId`);

--
-- Indexes for table `visap_staff_payroll_tbl`
--
ALTER TABLE `visap_staff_payroll_tbl`
  ADD PRIMARY KEY (`payrollId`);

--
-- Indexes for table `visap_staff_post_tbl`
--
ALTER TABLE `visap_staff_post_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visap_staff_tbl`
--
ALTER TABLE `visap_staff_tbl`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `visap_stdmedical_tbl`
--
ALTER TABLE `visap_stdmedical_tbl`
  ADD PRIMARY KEY (`medicalId`);

--
-- Indexes for table `visap_stdpreschlinfo`
--
ALTER TABLE `visap_stdpreschlinfo`
  ADD PRIMARY KEY (`preId`);

--
-- Indexes for table `visap_student_info_tbl`
--
ALTER TABLE `visap_student_info_tbl`
  ADD PRIMARY KEY (`stdInfoId`);

--
-- Indexes for table `visap_student_payment_history_tbl`
--
ALTER TABLE `visap_student_payment_history_tbl`
  ADD PRIMARY KEY (`phId`);

--
-- Indexes for table `visap_student_payment_tbl`
--
ALTER TABLE `visap_student_payment_tbl`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `visap_student_tbl`
--
ALTER TABLE `visap_student_tbl`
  ADD PRIMARY KEY (`stdId`);

--
-- Indexes for table `visap_termly_result_tbl`
--
ALTER TABLE `visap_termly_result_tbl`
  ADD PRIMARY KEY (`reportId`);

--
-- Indexes for table `visap_virtual_lesson_tbl`
--
ALTER TABLE `visap_virtual_lesson_tbl`
  ADD PRIMARY KEY (`lectureId`);

--
-- Indexes for table `visitor_book`
--
ALTER TABLE `visitor_book`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_module_config`
--
ALTER TABLE `api_module_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `current_session_tbl`
--
ALTER TABLE `current_session_tbl`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register_exam_subject_tbl`
--
ALTER TABLE `register_exam_subject_tbl`
  MODIFY `subId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_pin_history_tbl`
--
ALTER TABLE `reg_pin_history_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_offices`
--
ALTER TABLE `school_offices`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ewallet_pins`
--
ALTER TABLE `tbl_ewallet_pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exam_pins`
--
ALTER TABLE `tbl_exam_pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reg_pins`
--
ALTER TABLE `tbl_reg_pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_result_pins`
--
ALTER TABLE `tbl_result_pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_result_pins_history`
--
ALTER TABLE `tbl_result_pins_history`
  MODIFY `pinId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_serial`
--
ALTER TABLE `tbl_serial`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_behavioral_tbl`
--
ALTER TABLE `visap_behavioral_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visap_classnote_tbl`
--
ALTER TABLE `visap_classnote_tbl`
  MODIFY `noteId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_class_attendance_tbl`
--
ALTER TABLE `visap_class_attendance_tbl`
  MODIFY `attend_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_class_grade_tbl`
--
ALTER TABLE `visap_class_grade_tbl`
  MODIFY `gradeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visap_fee_component_tbl`
--
ALTER TABLE `visap_fee_component_tbl`
  MODIFY `compId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_loan_tbl`
--
ALTER TABLE `visap_loan_tbl`
  MODIFY `loanId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_offered_subject_tbl`
--
ALTER TABLE `visap_offered_subject_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_prefect_title_tbl`
--
ALTER TABLE `visap_prefect_title_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visap_registered_subject_tbl`
--
ALTER TABLE `visap_registered_subject_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visap_result_comment_tbl`
--
ALTER TABLE `visap_result_comment_tbl`
  MODIFY `commentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_result_grading_tbl`
--
ALTER TABLE `visap_result_grading_tbl`
  MODIFY `grading_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `visap_school_expense_tbl`
--
ALTER TABLE `visap_school_expense_tbl`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_school_fee_allocation_tbl`
--
ALTER TABLE `visap_school_fee_allocation_tbl`
  MODIFY `faId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_school_prefect_tbl`
--
ALTER TABLE `visap_school_prefect_tbl`
  MODIFY `prefectId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_school_profile`
--
ALTER TABLE `visap_school_profile`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_school_session_history_tbl`
--
ALTER TABLE `visap_school_session_history_tbl`
  MODIFY `sehisId` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_session_list`
--
ALTER TABLE `visap_session_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visap_social_link_tbl`
--
ALTER TABLE `visap_social_link_tbl`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_staff_bank_details_tbl`
--
ALTER TABLE `visap_staff_bank_details_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_staff_duty_tbl`
--
ALTER TABLE `visap_staff_duty_tbl`
  MODIFY `duty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visap_staff_paid_salary_tbl`
--
ALTER TABLE `visap_staff_paid_salary_tbl`
  MODIFY `salaryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_staff_payroll_tbl`
--
ALTER TABLE `visap_staff_payroll_tbl`
  MODIFY `payrollId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_staff_post_tbl`
--
ALTER TABLE `visap_staff_post_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visap_staff_tbl`
--
ALTER TABLE `visap_staff_tbl`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visap_stdmedical_tbl`
--
ALTER TABLE `visap_stdmedical_tbl`
  MODIFY `medicalId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_stdpreschlinfo`
--
ALTER TABLE `visap_stdpreschlinfo`
  MODIFY `preId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_student_info_tbl`
--
ALTER TABLE `visap_student_info_tbl`
  MODIFY `stdInfoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visap_student_payment_history_tbl`
--
ALTER TABLE `visap_student_payment_history_tbl`
  MODIFY `phId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_student_payment_tbl`
--
ALTER TABLE `visap_student_payment_tbl`
  MODIFY `paymentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_student_tbl`
--
ALTER TABLE `visap_student_tbl`
  MODIFY `stdId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_termly_result_tbl`
--
ALTER TABLE `visap_termly_result_tbl`
  MODIFY `reportId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visap_virtual_lesson_tbl`
--
ALTER TABLE `visap_virtual_lesson_tbl`
  MODIFY `lectureId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor_book`
--
ALTER TABLE `visitor_book`
  MODIFY `visitor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
