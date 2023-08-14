-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2020 at 02:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u849866404_dinh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminusers`
--

CREATE TABLE `tbl_adminusers` (
  `id` int(10) NOT NULL,
  `admin_fname` varchar(100) DEFAULT NULL,
  `admin_lname` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_num` varchar(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `account_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminusers`
--

INSERT INTO `tbl_adminusers` (`id`, `admin_fname`, `admin_lname`, `position`, `email`, `contact_num`, `username`, `password`, `created_by`, `date_created`, `account_status`) VALUES
(1, 'Administrator', 'Mike', 'Instructor', 'mike123@yahoo.com', '09976584568', 'mike', 'admin', 'Super Admin', '2020-06-15 16:28:42', 'Active'),
(2, 'Jay', 'Alfaro', 'Professor', 'jayalfaro2020@gmail.com', '09178090567', 'jay123', 'Pa$$w0rd!', 'admin', '2020-06-15 16:30:17', 'Active'),
(3, 'Allen', 'Iverson', 'Part-Time Assistant', 'allen123@gmail.com', '09972908091', 'allen', 'admin', 'Jay Alfaro', '2020-06-15 20:17:09', 'Active'),
(4, 'Panel', 'one', 'admin', 'panel1@gmail.com', '095454545', 'panel1', 'thesis', 'Jay Alfaro', '2020-08-06 04:44:25', 'Active'),
(5, 'panel', 'two', 'admin', 'panel2@gmail.com', '09646464646', 'panel2', 'thesis', 'Jay Alfaro', '2020-08-06 04:44:50', 'Active'),
(6, 'panel', 'three', 'admin', 'panel3@gmail.com', '09743646465', 'panel3', 'thesis', 'Jay Alfaro', '2020-08-06 04:45:20', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollees`
--

CREATE TABLE `tbl_enrollees` (
  `id` int(10) NOT NULL,
  `enrollment_id` bigint(12) DEFAULT NULL,
  `track` varchar(100) DEFAULT NULL,
  `learning_modality` varchar(100) DEFAULT NULL,
  `last_school` varchar(100) DEFAULT NULL,
  `schoolid_ofprev` varchar(100) DEFAULT NULL,
  `typeof_school` varchar(100) DEFAULT NULL,
  `gradyear` year(4) DEFAULT NULL,
  `lrn` varchar(100) DEFAULT NULL COMMENT 'Learner''s Reference Number',
  `birth_certificatenum` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `name_extension` varchar(100) DEFAULT NULL,
  `dateof_birth` date DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `complete_address` varchar(100) DEFAULT NULL,
  `contact_num` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fb_account` varchar(100) DEFAULT NULL,
  `fourps_answer` varchar(5) DEFAULT NULL,
  `ip_answer` varchar(5) DEFAULT NULL,
  `ip_specify` varchar(15) DEFAULT NULL,
  `mother_tongue` varchar(30) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `sped_answer` varchar(5) DEFAULT NULL,
  `sped_specify` varchar(100) DEFAULT NULL,
  `nameof_father` varchar(100) DEFAULT NULL,
  `father_educ` varchar(100) DEFAULT NULL,
  `father_estatus` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `father_contactnum` varchar(50) DEFAULT NULL,
  `nameof_mother` varchar(100) DEFAULT NULL,
  `mother_educ` varchar(100) DEFAULT NULL,
  `mother_estatus` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `mother_contactnum` varchar(50) DEFAULT NULL,
  `nameof_guardian` varchar(100) DEFAULT NULL,
  `rel_to_guardian` varchar(50) DEFAULT NULL,
  `guardian_educ` varchar(100) DEFAULT NULL,
  `guardian_estatus` varchar(100) DEFAULT NULL,
  `guardian_occupation` varchar(100) DEFAULT NULL,
  `guardian_contactnum` varchar(50) DEFAULT NULL,
  `grade_level` varchar(10) DEFAULT NULL,
  `request_trackshift` varchar(20) DEFAULT NULL,
  `studentid_no` varchar(30) DEFAULT NULL,
  `attached_file` varchar(100) DEFAULT NULL COMMENT 'Not null if the track has grade requirement',
  `status` int(10) DEFAULT 0 COMMENT '0 = For Approval; 1 = Approved; 2 = Declined'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enrollees`
--

INSERT INTO `tbl_enrollees` (`id`, `enrollment_id`, `track`, `learning_modality`, `last_school`, `schoolid_ofprev`, `typeof_school`, `gradyear`, `lrn`, `birth_certificatenum`, `last_name`, `first_name`, `middle_name`, `name_extension`, `dateof_birth`, `age`, `sex`, `complete_address`, `contact_num`, `email`, `fb_account`, `fourps_answer`, `ip_answer`, `ip_specify`, `mother_tongue`, `religion`, `sped_answer`, `sped_specify`, `nameof_father`, `father_educ`, `father_estatus`, `father_occupation`, `father_contactnum`, `nameof_mother`, `mother_educ`, `mother_estatus`, `mother_occupation`, `mother_contactnum`, `nameof_guardian`, `rel_to_guardian`, `guardian_educ`, `guardian_estatus`, `guardian_occupation`, `guardian_contactnum`, `grade_level`, `request_trackshift`, `studentid_no`, `attached_file`, `status`) VALUES
(28, 685833139, 'dinh-abm', 'Online Learning', 'nbhjjh', 'bjhjh', 'Public School (Pambuplikong Paaralan)', 2020, '7897', '89', 'Vel', 'Joy', NULL, NULL, '1999-08-25', 21, 'Female', 'bjhb', '87987', 'ajgabriel1998@gmail.com', 'bjh', 'No', 'No', NULL, 'Bikol', 'Islam', 'No', NULL, 'njhbjhb', 'Elementary Graduate', 'Full Time', 'gbuhyjb', '798798', 'dsdc', 'Elementary Graduate', 'Full Time', 'vghvhg', '79869', 'vhgvhg', 'Parents Magulang (Parents)', 'Elementary Graduate', 'Full Time', 'vhgvgh', '676876', 'Grade 11', 'No', NULL, NULL, 1),
(37, 445445760, 'dinh-abm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vel', 'Joy', '', NULL, NULL, NULL, NULL, NULL, NULL, 'ajgabriel1998@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Grade 12', 'No', 'DIHS-76057', NULL, 1),
(38, 414691836, 'dinh-as', 'Online Learning', 'DLSU', '8797', 'Private School (Pribadong Paaralan)', 2020, '89', '67699', 'Cho', 'Wendy', 'M', NULL, '1997-07-24', 23, 'Female', 'bjhbhjbj', '68768768', 'ajgabriel1998@gmail.com', 'bhjbhb', 'No', 'No', NULL, 'Tagalog', 'Christianity', 'No', NULL, 'bgbyjg', 'Elementary Graduate', 'Full Time', 'dcscs', '676876', 'guygujhhb', 'Elementary Graduate', 'Full Time', 'guygyug', '06786876', 'fhgfhgvgh', 'Parents Magulang (Parents)', 'Elementary Graduate', 'Full Time', 'vghfvghvgh', '67869796', 'Grade 11', 'No', NULL, NULL, 1),
(39, 424678543, 'dinh-as', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cho', 'Wendy', 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'ajgabriel1998@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Grade 12', 'No', 'DIHS-28616', NULL, 1),
(40, 737366963, 'dinh-abm', 'Blended Online', 'fb Univeristy', NULL, NULL, 2020, '567886', NULL, 'martin', 'coco', NULL, NULL, '1996-08-23', 24, 'Male', 'dasma', '09464645654', 'alfaroyaj37@gmail.com', 'fb.com/erere', 'No', 'No', NULL, 'Tausug', 'Taoism', 'No', NULL, 'martin rivera', NULL, 'Unemployed due to ECQ', 'yabmat', '98655', 'martin remy', 'High School Graduate', 'Part Time', 'yabmat', '32342342', 'harry roque', 'Brother/Sister (Kapatid)', 'High School Graduate', 'Part Time', '09363632632', '4564645', 'Grade 11', 'No', NULL, NULL, 1),
(41, 347607042, 'dinh-abm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'martin', 'coco', '', NULL, NULL, NULL, NULL, NULL, NULL, 'alfaroyaj37@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Grade 12', 'No', 'DIHS-45979', NULL, 0),
(42, 746810247, 'dinh-eim', 'Face to Face Learning', 'st thomas', NULL, NULL, 2021, '73737', NULL, 'lieberman', 'celia', NULL, NULL, '1999-12-31', 20, 'Female', 'b5l2 cali', '05938735745', 'alfaroyaj37@gmail.com', 'fb.com/celia', 'No', 'No', NULL, 'Tausug', 'Islam', 'No', NULL, 'asdads', 'Elementary Graduate', 'Part Time', 'asdaas', '065059569', 'asdasddyegdheg', 'Elementary Graduate', 'Part Time', 'sssddsd', '453435', 'dasdasdas', 'Other', 'High School Graduate', 'Full Time', 'dffsdfsdfsd', '242242423', 'Grade 11', 'No', NULL, NULL, 1),
(43, 268056314, 'dinh-eim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lieberman', 'celia', '', NULL, NULL, NULL, NULL, NULL, NULL, 'alfaroyaj37@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Grade 12', 'No', 'DIHS-52308', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requiregrades`
--

CREATE TABLE `tbl_requiregrades` (
  `id` int(10) NOT NULL,
  `track_id` varchar(30) DEFAULT NULL,
  `require_grade` varchar(5) DEFAULT NULL,
  `remarks` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_requiregrades`
--

INSERT INTO `tbl_requiregrades` (`id`, `track_id`, `require_grade`, `remarks`) VALUES
(1, 'dinh-abm', 'No', NULL),
(2, 'dinh-hums', 'Yes', NULL),
(3, 'dinh-cbf', 'No', NULL),
(4, 'dinh-flth', 'No', NULL),
(5, 'dinh-as', 'No', NULL),
(6, 'dinh-eim', 'No', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules`
--

CREATE TABLE `tbl_schedules` (
  `id` int(10) NOT NULL,
  `nameof_section` varchar(100) DEFAULT NULL,
  `subject_codeno` varchar(30) DEFAULT NULL,
  `dayof_sched` varchar(100) DEFAULT NULL,
  `schedtime_from` varchar(15) DEFAULT NULL,
  `schedtime_to` varchar(15) DEFAULT NULL,
  `sched_place` varchar(50) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(10) DEFAULT 0 COMMENT '0 = Active; 1 = Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`id`, `nameof_section`, `subject_codeno`, `dayof_sched`, `schedtime_from`, `schedtime_to`, `sched_place`, `created_by`, `date_created`, `status`) VALUES
(74, 'CBF Lolo', 'COOK11', 'Monday,Tuesday,Wednesday', '08:00 AM', '10:00 AM', '111', 'Administrator Mike', '2020-09-17 04:07:22', 0),
(75, 'CBF Lolo', 'BP11', 'Tuesday', '12:00 PM', '03:30 PM', '111', 'Administrator Mike', '2020-09-17 04:07:48', 0),
(76, 'ABM Dragonfruit 11', 'AE11', 'Monday', '09:30 AM', '12:00 PM', '1113', 'Administrator Mike', '2020-09-17 04:08:43', 0),
(77, 'ABM Dragonfruit 11', 'BESR11', 'Tuesday,Thursday', '08:00 AM', '10:00 AM', '113', 'Administrator Mike', '2020-09-17 04:47:43', 0),
(78, 'ABM Apple 11', 'BESR11', 'Monday,Tuesday,Wednesday,Thursday', '08:00 AM', '09:00 AM', 'gs18181', 'Jay Alfaro', '2020-09-17 06:21:23', 0),
(79, 'ABM Apple 11', 'AE11', 'Tuesday', '10:00 AM', '11:30 AM', 'g109', 'Jay Alfaro', '2020-09-17 06:21:48', 0),
(80, 'ABM Apple 11', 'BF11', 'Wednesday', '01:00 PM', '02:30 PM', 'gs676', 'Jay Alfaro', '2020-09-17 06:24:19', 0),
(81, 'EIM Papaya 11', 'FILI11', 'Monday,Tuesday,Wednesday,Thursday', '11:00 AM', '02:00 PM', 'rs103', 'Jay Alfaro', '2020-09-17 06:30:48', 0),
(82, 'EIM Papaya 11', 'SCI11', 'Monday,Tuesday,Wednesday,Thursday,Friday', '08:00 AM', '09:30 AM', 'rs103', 'Jay Alfaro', '2020-09-17 06:31:10', 0),
(83, 'EIM Papaya 11', 'OJT', 'Saturday', '08:00 AM', '05:00 PM', 'r123', 'Jay Alfaro', '2020-09-17 06:31:38', 0),
(84, 'EIM Papaya 11', 'ALG11', 'Saturday', '06:00 PM', '07:00 PM', 'field', 'Jay Alfaro', '2020-09-17 06:32:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `id` int(10) NOT NULL,
  `track_id` varchar(30) DEFAULT NULL,
  `grade_level` varchar(10) DEFAULT NULL,
  `nameof_section` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` varchar(5) DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`id`, `track_id`, `grade_level`, `nameof_section`, `created_by`, `date_created`, `is_active`) VALUES
(1, 'dinh-abm', 'Grade 11', 'ABM Apple 11', 'Administrator', '2020-07-10 00:51:51', 'Yes'),
(2, 'dinh-abm', 'Grade 11', 'ABM Banana 11', 'Administrator', '2020-07-10 00:52:01', 'No'),
(3, 'dinh-abm', 'Grade 12', 'ABM Apple 12', 'Administrator', '2020-07-10 20:12:44', 'No'),
(4, 'dinh-abm', 'Grade 12', 'ABM Banana 12', 'Administrator', '2020-07-10 20:15:43', 'Yes'),
(6, 'dinh-hums', 'Grade 11', 'HUMMS Pears 11', 'Jay Alfaro', '2020-08-04 05:42:44', 'Yes'),
(7, 'dinh-hums', 'Grade 12', 'HUMMS Melon 12', 'Jay Alfaro', '2020-08-04 05:43:02', 'Yes'),
(9, 'dinh-cbf', 'Grade 11', 'CBF Strawberry 11', 'Jay Alfaro', '2020-08-04 05:43:36', 'Yes'),
(10, 'dinh-cbf', 'Grade 12', 'CBF Grapes 12', 'Jay Alfaro', '2020-08-04 05:43:53', 'Yes'),
(11, 'dinh-flth', 'Grade 11', 'FTLH Guava 11', 'Jay Alfaro', '2020-08-04 05:44:47', 'Yes'),
(12, 'dinh-flth', 'Grade 12', 'FTLH Mango 12', 'Jay Alfaro', '2020-08-04 05:45:17', 'Yes'),
(13, 'dinh-as', 'Grade 11', 'as Peaches 11', 'Jay Alfaro', '2020-08-04 05:45:52', 'Yes'),
(14, 'dinh-as', 'Grade 12', 'AS Pineapple 12', 'Jay Alfaro', '2020-08-04 05:46:12', 'Yes'),
(15, 'dinh-eim', 'Grade 11', 'EIM Papaya 11', 'Jay Alfaro', '2020-08-04 05:46:58', 'Yes'),
(16, 'dinh-eim', 'Grade 12', 'EIM Lychee 12', 'Jay Alfaro', '2020-08-04 05:47:16', 'Yes'),
(17, 'dinh-abm', 'Grade 11', 'ABM Dalandan 11', 'Jay Alfaro', '2020-08-04 05:47:54', 'Yes'),
(18, 'dinh-abm', 'Grade 11', 'ABM blueberry 11', 'Jay Alfaro', '2020-08-06 06:47:29', 'Yes'),
(19, 'dinh-as', 'Grade 11', 'durian 11', 'Jay Alfaro', '2020-08-06 06:59:46', 'No'),
(20, 'dinh-abm', 'Grade 11', 'CBF Mango 12', 'Jay Alfaro', '2020-08-07 07:08:39', 'Yes'),
(21, 'dinh-abm', 'Grade 11', 'CBF Mango 12', 'Jay Alfaro', '2020-08-07 07:08:39', 'Yes'),
(22, 'dinh-abm', 'Grade 11', 'ABM Dragonfruit 11', 'Jay Alfaro', '2020-09-07 08:20:30', 'No'),
(23, 'dinh-abm', 'Grade 11', 'ABM Dragonfruit 11', 'Jay Alfaro', '2020-09-07 08:20:30', 'No'),
(24, 'dinh-abm', 'Grade 11', 'ABM Dragonfruit 11', 'Jay Alfaro', '2020-09-07 08:20:36', 'Yes'),
(25, 'dinh-abm', 'Grade 11', 'ABM Dragonfruit 11', 'Jay Alfaro', '2020-09-07 08:20:36', 'No'),
(26, 'dinh-abm', 'Grade 11', 'ABM Dragonfruit 11', 'Jay Alfaro', '2020-09-07 08:20:36', 'No'),
(27, 'dinh-cbf', 'Grade 11', 'CBF Lolo', 'Administrator Mike', '2020-09-07 08:25:02', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentgrades`
--

CREATE TABLE `tbl_studentgrades` (
  `id` int(10) NOT NULL,
  `subject_codeno` varchar(30) DEFAULT NULL,
  `studentid_no` varchar(30) DEFAULT NULL,
  `school_year` year(4) DEFAULT NULL,
  `school_semester` varchar(20) DEFAULT NULL,
  `grade_term` varchar(10) DEFAULT NULL,
  `midterm_grade` varchar(255) NOT NULL,
  `final_term_grade` varchar(255) NOT NULL,
  `grade` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentgrades`
--

INSERT INTO `tbl_studentgrades` (`id`, `subject_codeno`, `studentid_no`, `school_year`, `school_semester`, `grade_term`, `midterm_grade`, `final_term_grade`, `grade`) VALUES
(74, 'AE11', 'DIHS-45979', 2020, '1st Semester', NULL, '87', '76', 87),
(75, 'BESR11', 'DIHS-45979', 2020, '1st Semester', NULL, '78', '98', 78),
(76, 'BM11', 'DIHS-45979', 2020, '1st Semester', NULL, '98', '87', 98),
(77, 'BF11', 'DIHS-45979', 2020, '1st Semester', NULL, '87', '76', 87),
(78, 'OM11', 'DIHS-45979', 2020, '2nd Semester', NULL, '87', '90', 87),
(79, 'PM11', 'DIHS-45979', 2020, '2nd Semester', NULL, '87', '88', 87),
(80, 'OJT', 'DIHS-45979', 2020, '2nd Semester', NULL, '90', '87', 90),
(81, 'BESR11', 'DIHS-76057', 2020, '1st Semester', NULL, '90', '90', 90),
(82, 'AE11', 'DIHS-76057', 2020, '1st Semester', NULL, '90', '90', 90),
(83, 'OJT', 'DIHS-52308', 2020, '1st Semester', NULL, '76', '90', 76),
(84, 'MATH11', 'DIHS-52308', 2020, '1st Semester', NULL, '78', '68', 78),
(85, 'SCI11', 'DIHS-52308', 2020, '1st Semester', NULL, '78', '89', 78),
(86, 'FILI11', 'DIHS-52308', 2020, '2nd Semester', NULL, '89', '98', 89),
(87, 'ALG11', 'DIHS-52308', 2020, '2nd Semester', NULL, '79', '89', 79);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(10) NOT NULL,
  `studentid_no` varchar(30) DEFAULT NULL,
  `track_id` varchar(30) DEFAULT NULL,
  `grade_level` varchar(10) DEFAULT NULL,
  `nameof_section` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `student_fname` varchar(100) DEFAULT NULL,
  `student_lname` varchar(100) DEFAULT NULL,
  `student_middlename` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `studentid_no`, `track_id`, `grade_level`, `nameof_section`, `sex`, `email`, `student_fname`, `student_lname`, `student_middlename`, `password`, `created_by`, `date_created`) VALUES
(27, 'DIHS-76057', 'dinh-abm', 'Grade 12', 'ABM Banana 12', 'Female', 'ajgabriel1998@gmail.com', 'Joy', 'Vel', '', 'admin', 'Administrator Mike', '2020-09-07 08:18:42'),
(32, 'DIHS-28616', 'dinh-as', 'Grade 12', 'AS Pineapple 12', 'Female', 'ajgabriel1998@gmail.com', 'Wendy', 'Cho', 'M', 'aaa', 'Administrator Mike', '2020-09-13 23:07:32'),
(33, 'DIHS-45979', 'dinh-abm', 'Grade 11', 'ABM Apple 11', 'Male', 'alfaroyaj37@gmail.com', 'coco', 'martin', '', '123', 'Jay Alfaro', '2020-09-14 04:06:42'),
(34, 'DIHS-52308', 'dinh-eim', 'Grade 11', 'EIM Papaya 11', 'Female', 'alfaroyaj37@gmail.com', 'celia', 'lieberman', '', '1234', 'Jay Alfaro', '2020-09-17 06:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `id` int(10) NOT NULL,
  `subject_codeno` varchar(30) DEFAULT NULL,
  `nameof_subject` varchar(100) DEFAULT NULL,
  `track_id` varchar(30) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` varchar(5) DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`id`, `subject_codeno`, `nameof_subject`, `track_id`, `created_by`, `date_created`, `is_active`) VALUES
(7, 'AE101', 'Applied Economics', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:34:22', 'No'),
(8, 'BESR101', 'Business Ethics and Social Responsibility', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:34:33', 'No'),
(9, 'AE11', 'Applied Economics', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:35:01', 'Yes'),
(10, 'BESR11', 'Business Ethics and Social Responsibility', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:35:09', 'Yes'),
(11, 'BM11', 'Business Math', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:35:26', 'Yes'),
(12, 'BF11', 'Business Finance', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:35:35', 'Yes'),
(13, 'OM11', 'Organization and Management', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:35:44', 'Yes'),
(14, 'PM11', 'Principles of Marketing', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:35:53', 'Yes'),
(15, 'OJT', 'Work Immersion/Research/Career Advocacy/Culminating Activity i.e. Business Enterprise Simulation', 'dinh-abm', 'Jay Alfaro', '2020-08-05 22:36:11', 'Yes'),
(16, 'CW11', 'Creative Writing/ Malikhaing Pagsulat', 'dinh-hums', 'Jay Alfaro', '2020-08-05 22:36:24', 'Yes'),
(17, 'CN11', 'Creative Nonfiction', 'dinh-hums', 'Jay Alfaro', '2020-08-05 22:36:31', 'Yes'),
(18, 'PPG11', 'Philippine Politics and Governance', 'dinh-hums', 'Jay Alfaro', '2020-08-05 22:36:42', 'Yes'),
(19, 'CESC11', 'Community Engagement Solidarity and Citizenship', 'dinh-hums', 'Jay Alfaro', '2020-08-05 22:36:57', 'Yes'),
(20, 'DISS11', 'Disciples and Ideas in the Soical Sciences', 'dinh-hums', 'Jay Alfaro', '2020-08-05 22:37:12', 'Yes'),
(21, 'BC11', 'basic Calculus', 'dinh-hums', 'Jay Alfaro', '2020-08-05 22:37:22', 'Yes'),
(22, 'OJT', 'Work Immersion/Research/Career Advocacy/Culminating Activity', 'dinh-hums', 'Jay Alfaro', '2020-08-05 22:37:38', 'Yes'),
(23, 'COOK11', 'Cookery', 'dinh-cbf', 'Jay Alfaro', '2020-08-05 22:37:51', 'Yes'),
(24, 'BP11', 'bread and pastires', 'dinh-cbf', 'Jay Alfaro', '2020-08-05 22:38:06', 'Yes'),
(25, 'FB11', 'food and beverages', 'dinh-cbf', 'Jay Alfaro', '2020-08-05 22:38:13', 'Yes'),
(26, 'FOS11', 'Front Office Services', 'dinh-flth', 'Jay Alfaro', '2020-08-05 22:38:27', 'Yes'),
(27, 'TPS11', 'Tourism Promotion Services', 'dinh-flth', 'Jay Alfaro', '2020-08-05 22:38:37', 'Yes'),
(28, 'LGS11', 'Local Guiding services', 'dinh-flth', 'Jay Alfaro', '2020-08-05 22:38:55', 'Yes'),
(29, 'HS11', 'Housekeeping Services', 'dinh-flth', 'Jay Alfaro', '2020-08-05 22:39:07', 'Yes'),
(30, 'FILI11', 'Filipino', 'dinh-as', 'Jay Alfaro', '2020-08-05 22:39:18', 'Yes'),
(31, 'MATH11', 'Mathematics', 'dinh-as', 'Jay Alfaro', '2020-08-05 22:39:27', 'Yes'),
(32, 'MATH11', 'Mathematics', 'dinh-eim', 'Jay Alfaro', '2020-08-05 22:39:37', 'Yes'),
(33, 'FILI11', 'Filipino', 'dinh-eim', 'Jay Alfaro', '2020-08-05 22:39:45', 'Yes'),
(34, 'ALG11', 'Algebra', 'dinh-eim', 'Jay Alfaro', '2020-08-05 22:39:56', 'Yes'),
(35, 'SCI11', 'Science', 'dinh-eim', 'Jay Alfaro', '2020-08-05 22:40:04', 'Yes'),
(36, 'OJT', 'Work Immersion/Research/Career Advocacy/Culminating Activity i.e. Business Enterprise Simulation', 'dinh-cbf', 'Jay Alfaro', '2020-08-06 00:56:04', 'Yes'),
(37, 'OJT', 'Work Immersion/Research/Career Advocacy/Culminating Activity i.e. Business Enterprise Simulation', 'dinh-flth', 'Jay Alfaro', '2020-08-06 00:56:19', 'Yes'),
(38, 'OJT', 'Work Immersion/Research/Career Advocacy/Culminating Activity i.e. Business Enterprise Simulation', 'dinh-as', 'Jay Alfaro', '2020-08-06 00:56:31', 'Yes'),
(39, 'OJT', 'Work Immersion/Research/Career Advocacy/Culminating Activity i.e. Business Enterprise Simulation', 'dinh-eim', 'Jay Alfaro', '2020-08-06 00:56:42', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracks`
--

CREATE TABLE `tbl_tracks` (
  `id` int(10) NOT NULL,
  `track_id` varchar(30) DEFAULT NULL,
  `track_name` varchar(100) DEFAULT NULL,
  `track_acronym` varchar(20) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tracks`
--

INSERT INTO `tbl_tracks` (`id`, `track_id`, `track_name`, `track_acronym`, `created_by`, `date_created`) VALUES
(1, 'dinh-abm', 'Accountancy, Business and Management', 'ABM', 'Super Admin', '2020-06-15 22:29:19'),
(2, 'dinh-hums', 'HUMS under Academic Track', 'HUMS', 'Super Admin', '2020-06-15 22:29:19'),
(3, 'dinh-cbf', 'CBF under Home Economics TVL Track', 'CBF', 'Super Admin', '2020-06-15 22:52:37'),
(4, 'dinh-flth', 'FTLH under Home Economics TVL Track', 'FTLH', 'Super Admin', '2020-06-15 22:52:37'),
(5, 'dinh-as', 'AS under Industrial Arts TVL Track', 'AS', 'Super Admin', '2020-06-15 22:52:53'),
(6, 'dinh-eim', 'EIM under Industrial Arts TVL Track', 'EIM', 'Super Admin', '2020-06-15 22:52:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminusers`
--
ALTER TABLE `tbl_adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enrollees`
--
ALTER TABLE `tbl_enrollees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requiregrades`
--
ALTER TABLE `tbl_requiregrades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studentgrades`
--
ALTER TABLE `tbl_studentgrades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tracks`
--
ALTER TABLE `tbl_tracks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminusers`
--
ALTER TABLE `tbl_adminusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_enrollees`
--
ALTER TABLE `tbl_enrollees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_requiregrades`
--
ALTER TABLE `tbl_requiregrades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_studentgrades`
--
ALTER TABLE `tbl_studentgrades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_tracks`
--
ALTER TABLE `tbl_tracks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
