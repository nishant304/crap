-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 07:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbooks`
--

CREATE TABLE `addbooks` (
  `id` int(200) NOT NULL,
  `Class` varchar(200) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `BookISBNNo` varchar(200) NOT NULL,
  `Bookcost` varchar(200) NOT NULL,
  `Edition` varchar(200) NOT NULL,
  `BookCategory` varchar(200) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `NoofCopies` varchar(200) NOT NULL,
  `ShelfNo` varchar(200) NOT NULL,
  `BookCondition` varchar(200) NOT NULL,
  `Language` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbooks`
--

INSERT INTO `addbooks` (`id`, `Class`, `Title`, `Author`, `BookISBNNo`, `Bookcost`, `Edition`, `BookCategory`, `Publisher`, `NoofCopies`, `ShelfNo`, `BookCondition`, `Language`) VALUES
(1, '1st', 'poetic', 'fany', '7553', '543', '4', 'rOMANTIC', 'yati', '3', '1', 'Execellent', 'English'),
(2, '10th', 'anki', 'ankit', '11235', '200', '1', 'Science', 'ankit auto', '5', '3', 'Execellent', 'English'),
(3, '11th', 'pari', 'angel', '12345', '50000', 'pyar', 'love', 'andha', '10', '10', 'Execellent', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `addrequest`
--

CREATE TABLE `addrequest` (
  `id` int(200) NOT NULL,
  `Class` varchar(200) NOT NULL,
  `Section` varchar(200) NOT NULL,
  `RollNo` varchar(200) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Author` varchar(200) NOT NULL,
  `BookCategory` varchar(200) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `Edition` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL,
  `Day` varchar(200) NOT NULL,
  `issue` varchar(200) NOT NULL,
  `fine` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addrequest`
--

INSERT INTO `addrequest` (`id`, `Class`, `Section`, `RollNo`, `Title`, `Author`, `BookCategory`, `Publisher`, `Edition`, `Date`, `Day`, `issue`, `fine`) VALUES
(1, '10th', 'A', '3', 'poetic', 'fany', 'rOMANTIC', 'yati', '4', '2018/01/12', '4', '1', ''),
(2, '10th', 'B', '2', 'poetic', 'fany', 'rOMANTIC', 'yati', '4', '2018/01/12', '5', '1', ''),
(3, '10th', 'B', '6', 'poetic', 'fany', 'rOMANTIC', 'yati', '4', '2018/01/12', '5', '0', ''),
(4, '10th', 'A', '3', 'poetic', 'fany', 'rOMANTIC', 'yati', '4', '2018/01/12', '5', '0', ''),
(5, '10th', 'A', '3', 'poetic', 'fany', 'rOMANTIC', 'yati', '4', '2018/01/12', '4', '0', ''),
(6, '10th', 'A', '3', 'anki', 'ankit', 'Science', 'ankit auto', '1', '2018/01/18', '5', '0', ''),
(7, '11th', 'A', '2', 'pari', 'angel', 'love', 'andha', 'pyar', '2018/01/25', '5', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_category`
--

CREATE TABLE `add_category` (
  `category_id` int(20) NOT NULL,
  `category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_category`
--

INSERT INTO `add_category` (`category_id`, `category`) VALUES
(1, 'sick'),
(2, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `add_class`
--

CREATE TABLE `add_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `class_section` varchar(200) NOT NULL,
  `class_incharge` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_class`
--

INSERT INTO `add_class` (`id`, `class_name`, `class_section`, `class_incharge`) VALUES
(1, '11th', 'A', '1'),
(2, '11th', 'B', '3'),
(3, '11th', 'C', '5'),
(4, '10th', 'A', '2'),
(5, '10th', 'B', '1'),
(6, '4th', 'A', ''),
(7, '3rd', 'A', '1'),
(8, '12th', 'B', ''),
(9, '11th', 'D', '5');

-- --------------------------------------------------------

--
-- Table structure for table `add_designation`
--

CREATE TABLE `add_designation` (
  `designation_id` int(20) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_designation`
--

INSERT INTO `add_designation` (`designation_id`, `designation`) VALUES
(1, 'teacher'),
(2, 'HR'),
(3, 'peon'),
(4, 'driver'),
(5, 'school');

-- --------------------------------------------------------

--
-- Table structure for table `add_destination`
--

CREATE TABLE `add_destination` (
  `destination_id` int(11) NOT NULL,
  `rute_code` varchar(200) NOT NULL,
  `pickup_drop` varchar(200) NOT NULL,
  `stop_time` varchar(200) NOT NULL,
  `ammount` varchar(200) NOT NULL,
  `fees_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_destination`
--

INSERT INTO `add_destination` (`destination_id`, `rute_code`, `pickup_drop`, `stop_time`, `ammount`, `fees_type`) VALUES
(1, '', 'assad', '16:34', '23231', 'monthly');

-- --------------------------------------------------------

--
-- Table structure for table `add_driver`
--

CREATE TABLE `add_driver` (
  `driver_id` int(11) NOT NULL,
  `stf_id` varchar(200) NOT NULL,
  `driver_name` varchar(200) DEFAULT NULL,
  `rute_code` varchar(200) NOT NULL,
  `vehicle_no` varchar(200) NOT NULL,
  `iecence_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_driver`
--

INSERT INTO `add_driver` (`driver_id`, `stf_id`, `driver_name`, `rute_code`, `vehicle_no`, `iecence_no`) VALUES
(1, '2', 'sahil kumar', '', '96321', '232');

-- --------------------------------------------------------

--
-- Table structure for table `add_event`
--

CREATE TABLE `add_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `event_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `event_start_time` varchar(200) NOT NULL,
  `event_end_time` time NOT NULL,
  `event_for` varchar(500) NOT NULL,
  `class` varchar(200) NOT NULL,
  `section` varchar(500) NOT NULL,
  `staff_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_event`
--

INSERT INTO `add_event` (`event_id`, `event_name`, `description`, `event_date`, `end_date`, `event_start_time`, `event_end_time`, `event_for`, `class`, `section`, `staff_id`) VALUES
(1, 'Cricket', 'ik6ty7uij', '2018-02-04', '2018-02-18', '21:00', '23:00:00', 'Class', '4-11', 'all', 'sahil kumar'),
(2, 'Cricket', 'fdhuyrt', '2018-02-20', '2018-02-28', '01:04', '10:10:00', 'Class', '4-11', 'all', 'sahil kumar');

-- --------------------------------------------------------

--
-- Table structure for table `add_leave`
--

CREATE TABLE `add_leave` (
  `leave_id` int(20) NOT NULL,
  `leave_category` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `leave` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_leave`
--

INSERT INTO `add_leave` (`leave_id`, `leave_category`, `designation`, `leave`) VALUES
(1, 'sick', 'teacher', 10),
(2, 'paid', 'teacher', 5),
(4, 'paid', 'teacher', 5),
(5, 'paid', 'teacher', 5);

-- --------------------------------------------------------

--
-- Table structure for table `add_notice`
--

CREATE TABLE `add_notice` (
  `notice_id` int(11) NOT NULL,
  `notice_name` varchar(500) NOT NULL,
  `notice_date` varchar(200) NOT NULL,
  `remove_date` varchar(200) NOT NULL,
  `notice_desc` varchar(500) NOT NULL,
  `submit_by` varchar(200) NOT NULL,
  `submit_date` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_notice`
--

INSERT INTO `add_notice` (`notice_id`, `notice_name`, `notice_date`, `remove_date`, `notice_desc`, `submit_by`, `submit_date`, `status`) VALUES
(1, 'fgfdfgdgdgdfgdf', '2017-10-11', '', 'fddddddddddddddhdfsgfsgfdhghgsgfsdgshggfdjgfhfsfsgdfhgsdgfh fdg bgb  fn ', 'fddgfgdfg', '2017-10-03 11:43:35', '0'),
(4, 'Exam notice', '2017-12-08', '2017-12-09', 'this is to inform our school is organising  a event.', 'Select', '2017-12-07 11:12:53', '1'),
(5, 'exxammm', '2017-12-05', '2017-12-06', 'thidfedgg dsgfege', 'sachin gaur', '2017-12-07 11:13:23', '1'),
(6, 'tertger', '2018-01-25', '2018-01-31', 'rthrtfghbtrfg', 'Sachin gaun', '2018-01-11 13:13:42', '0'),
(7, 'fhnf', '2018-01-19', '2018-01-31', 'fftghnhnfghfghbfg', 'Sachin gaun', '2018-01-11 13:14:16', '0'),
(8, 'et4r4e4', '2018-01-31', '', 'etger4gege4ge4ge4', 'Sachin gaun', '2018-01-11 13:14:59', '0');

-- --------------------------------------------------------

--
-- Table structure for table `add_payhead`
--

CREATE TABLE `add_payhead` (
  `pay_head_id` int(11) NOT NULL,
  `pay_head_name` varchar(200) NOT NULL,
  `pay_head_type` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_payhead`
--

INSERT INTO `add_payhead` (`pay_head_id`, `pay_head_name`, `pay_head_type`, `description`) VALUES
(1, 'basic salary', 'deduction', 'hello basic'),
(2, 'ankit', 'addition', 'egfregfregfre');

-- --------------------------------------------------------

--
-- Table structure for table `add_subject`
--

CREATE TABLE `add_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `class_section` varchar(200) NOT NULL,
  `sub_teacher` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_subject`
--

INSERT INTO `add_subject` (`sub_id`, `sub_name`, `class_id`, `class_section`, `sub_teacher`) VALUES
(5, 'hindi', '11th', 'A', '1'),
(12, 'hindi1', '11th', 'A', ''),
(16, 'english', '11th', 'B', ''),
(17, 'science', '10th', 'A', ''),
(18, 'environment', '10th', 'A', ''),
(19, 'botany', '11th', 'B', ''),
(20, 'gk', '11th', 'A', ''),
(21, 'science', '11th', 'A', ''),
(22, 'maths', '11th', 'A', ''),
(23, 'sst', '11th', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_image` varchar(300) NOT NULL,
  `admin_mobile` varchar(300) NOT NULL,
  `admin_address` varchar(300) NOT NULL,
  `admin_status` varchar(300) NOT NULL DEFAULT '0',
  `institute_name` varchar(300) NOT NULL,
  `institute_email` varchar(300) NOT NULL,
  `institute_address` varchar(300) NOT NULL,
  `institute_phone` varchar(300) NOT NULL,
  `institute_mobile` varchar(300) NOT NULL,
  `institute_fax` varchar(300) NOT NULL,
  `admin_contact_person` varchar(300) NOT NULL,
  `institute_country` varchar(300) NOT NULL,
  `language` varchar(300) NOT NULL,
  `institute_code` varchar(300) NOT NULL,
  `admin_header` varchar(200) NOT NULL,
  `admin_sidebar` varchar(200) NOT NULL,
  `admin_background` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_name`, `admin_password`, `admin_image`, `admin_mobile`, `admin_address`, `admin_status`, `institute_name`, `institute_email`, `institute_address`, `institute_phone`, `institute_mobile`, `institute_fax`, `admin_contact_person`, `institute_country`, `language`, `institute_code`, `admin_header`, `admin_sidebar`, `admin_background`) VALUES
(3, 'ankit@gmail.com', 'ANKIT', '11', 'Koala16.jpg', '', '', '0', 'saraswati bal mandhir s.sec school', 'saraswati@co.in', 'FREFE', '9818414290', '0983922389', '12', '9818414290', 'India', 'English', '123', 'white', 'black', 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `admin_auth`
--

CREATE TABLE `admin_auth` (
  `admin_auth` int(11) NOT NULL,
  `feedback_access` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_auth`
--

INSERT INTO `admin_auth` (`admin_auth`, `feedback_access`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `std_id` int(11) NOT NULL,
  `std_fname` varchar(200) NOT NULL,
  `std_lname` varchar(200) NOT NULL,
  `std_roll_no` varchar(200) NOT NULL,
  `std_section` varchar(200) NOT NULL,
  `std_father_name` varchar(200) NOT NULL,
  `std_mother_name` varchar(200) NOT NULL,
  `std_guardian_name` varchar(200) NOT NULL,
  `std_guardian_mob` varchar(200) NOT NULL,
  `std_guardian_email` varchar(200) NOT NULL,
  `std_email` varchar(200) NOT NULL,
  `std_mobile` varchar(200) NOT NULL,
  `std_address` varchar(200) NOT NULL,
  `std_gender` varchar(200) NOT NULL,
  `std_religion` varchar(200) NOT NULL,
  `std_dob` varchar(200) NOT NULL,
  `std_reg_date` varchar(200) NOT NULL,
  `std_image` varchar(200) NOT NULL,
  `std_class` varchar(200) NOT NULL,
  `std_cnf_code` varchar(200) NOT NULL,
  `std_status` varchar(200) NOT NULL,
  `std_last_update` varchar(200) NOT NULL,
  `std_password` varchar(200) NOT NULL,
  `confirm_code` varchar(500) NOT NULL,
  `std_father_email` varchar(500) NOT NULL,
  `std_mother_email` varchar(500) NOT NULL,
  `std_batch` varchar(500) NOT NULL,
  `parent_id` varchar(400) NOT NULL,
  `std_nationality` varchar(200) NOT NULL,
  `std_category` varchar(200) NOT NULL,
  `std_permanent_address` varchar(200) NOT NULL,
  `std_class_fee` varchar(300) NOT NULL,
  `std_promoted` varchar(300) NOT NULL,
  `std_header` varchar(200) DEFAULT NULL,
  `std_sidebar` varchar(200) DEFAULT NULL,
  `std_body` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`std_id`, `std_fname`, `std_lname`, `std_roll_no`, `std_section`, `std_father_name`, `std_mother_name`, `std_guardian_name`, `std_guardian_mob`, `std_guardian_email`, `std_email`, `std_mobile`, `std_address`, `std_gender`, `std_religion`, `std_dob`, `std_reg_date`, `std_image`, `std_class`, `std_cnf_code`, `std_status`, `std_last_update`, `std_password`, `confirm_code`, `std_father_email`, `std_mother_email`, `std_batch`, `parent_id`, `std_nationality`, `std_category`, `std_permanent_address`, `std_class_fee`, `std_promoted`, `std_header`, `std_sidebar`, `std_body`) VALUES
(1, 'Ankit', 'Kumar', '1', 'A', 'Ghanshyam', 'nir', '', '', 'anand.vicky21@gmail.com', 'ankitkumarchoudhary7@gmail.com', '9654215060', '', 'male', 'hindu', '1993-01-02', '2017-12-20', 'loading.gif', '11th', '', '', '', '11', '', 'kumarankitchoudhary011293@gmail.com', 'sachinraajvijay@gmail.com', '2018-2020', '', 'Indian', 'GENERAL', 'karampura', '', '', 'white', 'purple', 'brown'),
(6, 'broo', 'kumar', '2', 'A', 'ghAn', 'nirmalal', 'pankaj', '', '', 'sahildashkumar@gmail.com', '9874123650', '', 'male', 'HinduasDASdASD', '2017-11-20', '2017-12-08', 'Tulips.jpg', '11th', '', '', '', '11', '', 'kumarankitchoudhary011293@gmail.com', 'er.sachingaun@gmail.com', '2017-2020', '', 'Indian', 'GENERAL', 'karampura', '', 'unpromoted', NULL, NULL, NULL),
(7, 'navita', 'airi', '3', 'A', 'don', '', '', '', '', 'airinavita@gmail.com', '9632587410', 'uk  nainital', 'male', 'Hindu', '1993-12-29', '2017-12-13', 'Tulips.jpg', '11th', '', '', '', '11', '', 'piyush@gmail.com', '', '2017-2018', '', 'Indian', 'GENERAL', 'uk ,nainital', '', 'unpromoted', NULL, NULL, NULL),
(9, 'piyush ', 'sharma', '4', 'A', 'denanathchahan', '', '', '', '', 'vandanatyagi11nov@gmail.com', '9654215063', 'chandigarh', 'male', 'Hindu', '2011-01-02', '2017-12-20', 'Desert.jpg', '11th', '', '', '', '11', '', 'denanathchahan@gmail.com', '', '2017-2018', '', 'Indian', 'GENERAL', 'chandigarh', '', '', NULL, NULL, NULL),
(10, 'PIYUSH', 'sharma', '5', 'A', 'denanathchahan', '', '', '', '', 'pskonvicted00@gmail.com', '9632587410', 'himachal', 'male', 'Hindu', '2009-12-02', '1989-12-07', 'Tulips.jpg', '10th', '', '', '', '11', '', 'denanathchahan@gmail.com', '', '2017-2018', '', 'Indian', 'GENERAL', 'himachal', '', '', NULL, NULL, NULL),
(11, 'gtr', 'grgrd', '6', 'A', 'gbdrfgbr', '', '', '', '', 'adasd@rhyrt.trhy', '7894561230', 'rfgrfg', 'male', 'Hindu', '2018-01-11', '2018-01-25', 'Chrysanthemum.jpg', '11th', '', '', '', '11', '', 'thrt@rtujh.tygj', '', '2018-2019', '', 'Indian', 'ST', 'rgrf', '', 'unpromoted', NULL, NULL, NULL),
(12, 'asdf', 'fdsa', '7', 'A', 'fdgredfytgt', '', '', '', '', 'fdsfgdefsa@5reyh5.hregfrg', '1010101000', 'rthyrtyhrt', 'male', 'Hindu', '2018-01-27', '2018-01-24', 'Lighthouse.jpg', '11th', '', '', '', '11', '', 'dsfg@rtgytrt.rth', '', '2018-2019', '', 'Indian', 'GENERAL', 'trhygrtyhrt', '', '', NULL, NULL, NULL),
(13, 'broo', 'kumar', '8', 'A', 'ghAn', 'nirmalal', '', '', '', 'sahildashkumar@gmail.com', '9876459876', 'karampura', 'male', 'Hindu', '2017-11-20', '2018-01-05', 'Tulips.jpg', '11th', '', '', '', '11', '', 'kumarankitchoudhary011293@gmail.com', 'er.sachingaun@gmail.com', '', '', 'Indian', 'GENERAL', 'karampura', '', '', 'white', 'purple', 'brown'),
(14, 'navita', 'airi', '9', 'A', 'don', '', '', '', '', 'airinavita@gmail.com', '9632587410', 'uk  nainital', 'male', 'Hindu', '1993-12-29', '2018-01-05', 'Desert.jpg', '11th', '', '', '', '11', '', 'piyush@gmail.com', '', '', '', 'Indian', 'GENERAL', 'uk ,nainital', '', '', NULL, NULL, NULL),
(15, '', '', '10', 'A', '', '', '', '', '', '', '', '', '', 'Hindu', '', '', 'Tulips.jpg', '11th', '', '', '', '11', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL),
(16, 'fgfg', 'jhhj', '11', 'A', 'jai', 'sahil', '', '987456322', 'fvdsgf', 'hj@gmail.com', '6767677676', 'hjhj', 'male', 'Hindu', '2018-01-19', '2018-01-13', 'Jellyfish.jpg', '11th', '', '', '', '11', '', 'jgghj@gmail.com', '', '2018-2019', '', 'Indian', 'GENERAL', 'hjhj', '', '', NULL, NULL, NULL),
(17, 'ankita', 'sharma', '1', 'B', 'denanathchahan', '', '', '', '', 'aaaa@gmail.com', '9654215063', 'retgertger', 'Female', 'Hindu', '2018-01-02', '2018-01-18', '', '11th', '', '', '', '11', '', 'piyush@gmail.com', '', '2018-2019', '', 'Indian', 'GENERAL', 'ergryy', '', '', NULL, NULL, NULL),
(18, 'gtr', 'sharma', '2', 'B', 'denanathchahan', '', '', '', '', 'anandsekhartecinso@gmail.com', '9654215063', 'kp', 'male', 'Hindu', '2018-01-17', '2018-01-24', '', '11th', '', '', '', '11', '', '', '', '2018-2019', '', 'Indian', 'GENERAL', 'karampura', '', '', NULL, NULL, NULL),
(19, 'Reema', 'pan', '', '', 'mr.manoj pan', '', '', '', '', 'reemaisthebest6@gmail.com', '8709713328', 'jharkhand H.no.124', 'Female', 'Hindu', '1991-06-24', '2018-02-28', '', '11th', '', '', '', '11', '', 'kakransahil40@gmail.com', '', '2018-2019', '', 'Indian', 'GENERAL', 'sec-14 H.no.124', '', '', NULL, NULL, NULL),
(20, 'test', 'test', '', '', '', '', '', '', '', 'ly5yl56ym@gmail.com', '9632587410', '5yhl56myh56', 'male', 'Hindu', '1995-01-09', '2018-02-27', '', '11th', '', '', '', '2MfwYA', '', '', '', '2019-2020', '', 'Indian', 'ST', '5yh56myh', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assign_id` int(11) NOT NULL,
  `assign_title` varchar(200) NOT NULL,
  `assign_for_class` varchar(200) NOT NULL,
  `assign_for_section` varchar(200) NOT NULL,
  `assign_subject` varchar(200) NOT NULL,
  `date_of_submission` varchar(200) NOT NULL,
  `assign_desc` varchar(200) NOT NULL,
  `assign_file` varchar(1000) NOT NULL,
  `submitted_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assign_id`, `assign_title`, `assign_for_class`, `assign_for_section`, `assign_subject`, `date_of_submission`, `assign_desc`, `assign_file`, `submitted_by`) VALUES
(3, 'play assignment', '10th', 'A', 'science', '2017-12-13', 'efger', 'SMS(School Management software).pptx', ''),
(4, '1 day', '10th', 'A', 'science', '2017-12-25', 'sdsd', 'EAadhaar_907416435744_26072017232937_907995.pdf', ''),
(5, 'sd', '10th', 'A', 'science', '2017-12-13', 'ewfwe', 'SMS(School_Management_software)1.pptx', ''),
(6, 'efee', '10th', 'A', 'science', '2017-12-20', 'efwe', 'SACHIN.pdf', ''),
(7, 'assignment title', '10th', 'A', 'science', '2017-12-21', 'assignment description', 'Wildlife.wmv', ''),
(8, 'play assignment', '11th', 'A', 'hindi', '2017-12-08', 'rgtrgt', 'Lighthouse.jpg', ''),
(10, 'assignment_title', '11th', 'A', 'hindi', '2018-01-24', 'assignment_description', 'Tulips5.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `assign_sub_teacher`
--

CREATE TABLE `assign_sub_teacher` (
  `assign_id` int(11) NOT NULL,
  `tch_name` varchar(200) NOT NULL,
  `assign_class` varchar(200) NOT NULL,
  `assign_section` varchar(200) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `assign_by` varchar(200) NOT NULL,
  `assign_date` varchar(200) NOT NULL,
  `tch_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_sub_teacher`
--

INSERT INTO `assign_sub_teacher` (`assign_id`, `tch_name`, `assign_class`, `assign_section`, `sub_name`, `assign_by`, `assign_date`, `tch_id`) VALUES
(1, 'Sachin gaun', '11th', 'B', 'hindi', '', '2017-12-22 06:39:20', '1'),
(3, 'sahil kumar', '11th', 'A', 'maths', '', '2018-01-12 06:16:58', '2'),
(4, 'nnaavviitta ', '11th', 'A', 'science', '', '2018-01-12 06:17:11', '3'),
(5, 'Sachin gaun', '11th', 'A', 'gk', '', '2018-01-12 06:17:31', '1'),
(6, 'sahil kumar', '10th', 'A', 'environment', '', '2018-01-12 06:17:45', '2'),
(7, 'kirtika  thakur', '11th', 'A', 'hindi', '', '2018-02-23 08:38:51', '5'),
(8, 'kirtika  thakur', '11th', 'A', 'hindi1', '', '2018-02-23 08:40:03', '5');

-- --------------------------------------------------------

--
-- Table structure for table `attandance_report`
--

CREATE TABLE `attandance_report` (
  `attand_id` int(11) NOT NULL,
  `std_id` varchar(200) NOT NULL,
  `std_name` varchar(200) NOT NULL,
  `std_class` varchar(200) NOT NULL,
  `std_section` varchar(200) NOT NULL,
  `std_roll_no` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `d01` varchar(200) DEFAULT NULL,
  `d02` varchar(200) DEFAULT NULL,
  `d03` varchar(200) DEFAULT NULL,
  `d04` varchar(200) DEFAULT NULL,
  `d05` varchar(200) DEFAULT NULL,
  `d06` varchar(200) DEFAULT NULL,
  `d07` varchar(200) DEFAULT NULL,
  `d08` varchar(200) DEFAULT NULL,
  `d09` varchar(200) DEFAULT NULL,
  `d10` varchar(200) DEFAULT NULL,
  `d11` varchar(200) DEFAULT NULL,
  `d12` varchar(200) DEFAULT NULL,
  `d13` varchar(200) DEFAULT NULL,
  `d14` varchar(200) DEFAULT NULL,
  `d15` varchar(200) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `d16` varchar(200) DEFAULT NULL,
  `d17` varchar(200) DEFAULT NULL,
  `d18` varchar(200) DEFAULT NULL,
  `d19` varchar(200) DEFAULT NULL,
  `d20` varchar(200) DEFAULT NULL,
  `d21` varchar(200) DEFAULT NULL,
  `d22` varchar(200) DEFAULT NULL,
  `d23` varchar(200) DEFAULT NULL,
  `d24` varchar(200) DEFAULT NULL,
  `d25` varchar(200) DEFAULT NULL,
  `d26` varchar(200) DEFAULT NULL,
  `d27` varchar(200) DEFAULT NULL,
  `d28` varchar(200) DEFAULT NULL,
  `d29` varchar(200) DEFAULT NULL,
  `d30` varchar(200) DEFAULT NULL,
  `d31` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attandance_report`
--

INSERT INTO `attandance_report` (`attand_id`, `std_id`, `std_name`, `std_class`, `std_section`, `std_roll_no`, `year`, `month`, `d01`, `d02`, `d03`, `d04`, `d05`, `d06`, `d07`, `d08`, `d09`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`) VALUES
(1, '1', 'Ankit Kumar', '11th', 'A', '1', '2018', '1', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '6', 'broo kumar', '11th', 'A', '2', '2018', '1', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '7', 'navita airi', '11th', 'A', '3', '2018', '1', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '9', 'piyush  sharma', '11th', 'A', '4', '2018', '1', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '10', 'PIYUSH sharma', '11th', 'A', '5', '2018', '1', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '11', 'gtr grgrd', '11th', 'A', '6', '2018', '1', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '12', 'asdf fdsa', '11th', 'A', '7', '2018', '1', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '13', 'broo kumar', '11th', 'A', '8', '2018', '1', 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '14', 'navita airi', '11th', 'A', '9', '2018', '1', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '15', 'gtr grgrd', '11th', 'A', '10', '2018', '1', 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '16', 'fgfg jhhj', '11th', 'A', '11', '2018', '1', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '1', 'Ankit Kumar', '11th', 'A', '1', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '6', 'broo kumar', '11th', 'A', '2', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '7', 'navita airi', '11th', 'A', '3', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '9', 'piyush  sharma', '11th', 'A', '4', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '10', 'PIYUSH sharma', '11th', 'A', '5', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '11', 'gtr grgrd', '11th', 'A', '6', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '12', 'asdf fdsa', '11th', 'A', '7', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '13', 'broo kumar', '11th', 'A', '8', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '14', 'navita airi', '11th', 'A', '9', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '15', 'gtr grgrd', '11th', 'A', '10', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '16', 'fgfg jhhj', '11th', 'A', '11', '2018', '2', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `auth_id` int(11) NOT NULL,
  `staff_id` varchar(200) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `assignment` varchar(200) DEFAULT NULL,
  `attendance` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `add_class` varchar(200) DEFAULT NULL,
  `class_incharge` varchar(200) DEFAULT NULL,
  `marks` varchar(200) DEFAULT NULL,
  `assign_sub_class` varchar(200) DEFAULT NULL,
  `assign_sec_roll_no` varchar(200) DEFAULT NULL,
  `exam` varchar(500) DEFAULT NULL,
  `time_table` varchar(500) DEFAULT NULL,
  `notice` varchar(500) DEFAULT NULL,
  `event` varchar(500) DEFAULT NULL,
  `student` varchar(500) DEFAULT NULL,
  `staff` varchar(500) DEFAULT NULL,
  `fees` varchar(400) DEFAULT NULL,
  `leave_detail` varchar(500) DEFAULT NULL,
  `sailary` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`auth_id`, `staff_id`, `notes`, `assignment`, `attendance`, `subject`, `add_class`, `class_incharge`, `marks`, `assign_sub_class`, `assign_sec_roll_no`, `exam`, `time_table`, `notice`, `event`, `student`, `staff`, `fees`, `leave_detail`, `sailary`) VALUES
(1, '1', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3,1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3'),
(2, '1', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3,1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3'),
(3, '1', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3,1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3', '1,2,3');

-- --------------------------------------------------------

--
-- Table structure for table `books_return`
--

CREATE TABLE `books_return` (
  `id` int(20) NOT NULL,
  `Class` varchar(200) NOT NULL,
  `Section` varchar(200) NOT NULL,
  `RollNo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_return`
--

INSERT INTO `books_return` (`id`, `Class`, `Section`, `RollNo`) VALUES
(1, 'qq', 'qqq', 'qqq');

-- --------------------------------------------------------

--
-- Table structure for table `class_time_table`
--

CREATE TABLE `class_time_table` (
  `time_table_id` int(11) NOT NULL,
  `class` varchar(200) NOT NULL,
  `class_section` varchar(200) NOT NULL,
  `class_start_time` varchar(200) NOT NULL,
  `class_end_time` varchar(200) NOT NULL,
  `stf_id` varchar(200) NOT NULL,
  `monday` varchar(200) NOT NULL,
  `tuesday` varchar(200) NOT NULL,
  `wednesday` varchar(200) NOT NULL,
  `thursday` varchar(200) NOT NULL,
  `friday` varchar(200) NOT NULL,
  `saturday` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_time_table`
--

INSERT INTO `class_time_table` (`time_table_id`, `class`, `class_section`, `class_start_time`, `class_end_time`, `stf_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES
(1, '11th', 'B', '8:00', '9:00', '', 'english', 'botany', 'english', 'botany', 'english', 'botany'),
(2, '11th', 'A', '8:00', '9:00', '', 'hindi', 'hindi', 'hindi', 'hindi1', 'hindi', 'hindi'),
(4, '10th', 'A', '8:00', '9:00', '', 'science', 'environment', 'environment', 'science', 'environment', 'science'),
(5, '10th', 'A', '9:00', '10:00', '', 'science', 'environment', 'science', 'environment', 'science', 'environment'),
(7, '11th', 'A', '9:00', '10:00', '', 'sst', 'maths', 'gk', 'science', 'hindi', 'hindi'),
(9, '11th', 'A', '10:00', '11:00', '', 'hindi1', 'hindi', 'gk', 'science', 'sst', 'maths'),
(10, '11th', 'A', '11:00', '12:00', '', 'science', 'maths', 'sst', 'hindi1', 'gk', 'hindi'),
(12, '11th', 'A', '12:00', '1:00', '', 'sst', 'hindi', 'gk', 'science', 'maths', 'hindi1'),
(13, '11th', 'A', '1:00', '2:00', '', 'hindi', 'gk', 'hindi1', 'science', 'sst', 'maths'),
(14, '11th', 'B', '9:00', '10:00', '', 'english', 'botany', 'english', 'botany', 'english', 'botany'),
(15, '11th', 'B', '10:00', '12:00', '', 'botany', 'english', 'botany', 'botany', 'botany', 'botany'),
(16, '11th', 'B', '12:00', '2:00', '', 'english', 'english', 'english', 'botany', 'botany', 'botany'),
(17, '10th', 'A', '2:00', '3:00', '', 'science', 'science', 'environment', 'environment', 'science', 'environment'),
(18, '10th', 'A', '10:00', '11:00', '', 'science', 'environment', 'environment', 'environment', 'science', 'science');

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `event_details_id` int(11) NOT NULL,
  `event_id` varchar(500) NOT NULL,
  `class_name` varchar(500) NOT NULL,
  `section_name` varchar(500) NOT NULL,
  `winner1st` varchar(500) NOT NULL,
  `class_name_2` varchar(20) NOT NULL,
  `section_name_2` varchar(20) NOT NULL,
  `winner2nd` varchar(500) NOT NULL,
  `class_name_3` varchar(20) NOT NULL,
  `section_name_3` varchar(20) NOT NULL,
  `winner3rd` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`event_details_id`, `event_id`, `class_name`, `section_name`, `winner1st`, `class_name_2`, `section_name_2`, `winner2nd`, `class_name_3`, `section_name_3`, `winner3rd`, `description`) VALUES
(1, 'Cricket', '11th', 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_name`
--

CREATE TABLE `event_name` (
  `event_name_id` int(200) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `submit_by_id` int(200) NOT NULL,
  `current_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_name`
--

INSERT INTO `event_name` (`event_name_id`, `event_name`, `submit_by_id`, `current_date`) VALUES
(2, 'Cricket', 0, '2018-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `event_participation`
--

CREATE TABLE `event_participation` (
  `participation_id` int(11) NOT NULL,
  `event_id` varchar(500) NOT NULL,
  `std_id` varchar(500) NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0',
  `participate_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_participation`
--

INSERT INTO `event_participation` (`participation_id`, `event_id`, `std_id`, `read_status`, `participate_status`) VALUES
(1, '5', '1', 1, 1),
(2, '5', '6', 0, 0),
(3, '5', '7', 0, 0),
(4, '5', '9', 0, 0),
(5, '5', '10', 0, 0),
(6, '5', '11', 0, 0),
(7, '5', '12', 0, 0),
(8, '5', '13', 0, 0),
(9, '5', '14', 0, 0),
(10, '5', '16', 0, 0),
(11, '5', '17', 0, 0),
(12, '5', '18', 0, 0),
(13, '1', '1', 1, 1),
(14, '1', '6', 0, 0),
(15, '1', '7', 0, 0),
(16, '1', '9', 0, 0),
(17, '1', '10', 0, 0),
(18, '1', '11', 0, 0),
(19, '1', '12', 0, 0),
(20, '1', '13', 1, 1),
(21, '1', '14', 0, 0),
(22, '1', '16', 0, 0),
(23, '1', '17', 0, 0),
(24, '1', '18', 0, 0),
(25, '2', '1', 1, 1),
(26, '2', '6', 0, 0),
(27, '2', '7', 0, 0),
(28, '2', '9', 0, 0),
(29, '2', '10', 0, 0),
(30, '2', '11', 0, 0),
(31, '2', '12', 0, 0),
(32, '2', '13', 0, 0),
(33, '2', '14', 0, 0),
(34, '2', '16', 0, 0),
(35, '2', '17', 0, 0),
(36, '2', '18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_winner`
--

CREATE TABLE `event_winner` (
  `win_id` int(200) NOT NULL,
  `event_id` int(200) NOT NULL,
  `std_id` int(200) NOT NULL,
  `class_name` int(200) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `winner1st` varchar(200) NOT NULL,
  `class_name_2` varchar(200) NOT NULL,
  `section_name_2` varchar(200) NOT NULL,
  `winner2nd` varchar(200) NOT NULL,
  `class_name_3` varchar(200) NOT NULL,
  `section_name_3` varchar(200) NOT NULL,
  `winner3rd` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_winner`
--

INSERT INTO `event_winner` (`win_id`, `event_id`, `std_id`, `class_name`, `section_name`, `winner1st`, `class_name_2`, `section_name_2`, `winner2nd`, `class_name_3`, `section_name_3`, `winner3rd`, `status`) VALUES
(2, 1, 6, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(3, 1, 7, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(4, 1, 9, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(5, 1, 10, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(6, 1, 11, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(7, 1, 12, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(8, 1, 13, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(9, 1, 14, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(10, 1, 15, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(11, 1, 16, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(12, 1, 17, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0),
(13, 1, 18, 11, 'A', 'navita airi/3', '11th', 'A', 'Ankit Kumar/1', '11th', 'B', 'ankita sharma/1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_detail`
--

CREATE TABLE `exam_detail` (
  `exam_id` int(11) NOT NULL,
  `class_section` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `exam_type` varchar(200) NOT NULL,
  `exam_date` varchar(200) NOT NULL,
  `exam_start_time` varchar(200) NOT NULL,
  `exam_end_time` varchar(200) NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `max_mark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_detail`
--

INSERT INTO `exam_detail` (`exam_id`, `class_section`, `subject`, `exam_type`, `exam_date`, `exam_start_time`, `exam_end_time`, `class_id`, `max_mark`) VALUES
(1, 'A', 'hindi', 'Monthly', '2017-11-18', '09:00', '12:00', '11th', '100'),
(2, 'A', 'hindi1', 'Monthly', '2017-11-19', '09:00', '12:00', '11th', '100'),
(3, 'A', 'science', 'Quartly', '2017-11-21', '09:00', '12:00', '10th', '50'),
(4, 'A', 'environment', 'Quartly', '2017-11-22', '09:00', '12:00', '10th', '50'),
(5, 'A', 'hindi', 'Quartly', '2017-11-29', '09:00', '22:00', '11th', '50'),
(6, 'A', 'hindi1', 'Quartly', '2017-11-30', '09:00', '22:00', '11th', '50'),
(7, 'A', 'hindi', 'Half Yearly', '2017-11-28', '09:00', '11:00', '11th', '75'),
(8, 'A', 'hindi1', 'Half Yearly', '2017-11-29', '09:00', '11:00', '11th', '75'),
(9, 'A', 'gk', 'Half Yearly', '2017-11-30', '09:00', '11:00', '11th', '75'),
(10, 'A', 'hindi', 'Monthly', '2017-12-21', '09:00', '10:00', '11th', '33'),
(16, 'A', 'hindi', 'Monthly', '2018-01-30', '09:00', '12:00', '11th', '100'),
(17, 'A', 'hindi1', 'Monthly', '2018-01-30', '09:00', '12:00', '11th', '100'),
(18, 'A', 'gk', 'Monthly', '2018-01-30', '09:00', '12:00', '11th', '100'),
(19, 'A', 'science', 'Quartly', '2018-01-30', '09:00', '12:00', '11th', '100'),
(20, 'A', 'maths', 'Annualy', '2018-01-29', '09:00', '12:00', '11th', '100'),
(21, 'A', 'hindi', 'Monthly', '2018-01-08', '06:00', '09:00', '11th', '100'),
(22, 'A', 'hindi1', 'Monthly', '2018-01-09', '06:00', '09:00', '11th', '100'),
(23, 'A', 'gk', 'Monthly', '2018-01-10', '06:00', '09:00', '11th', '100'),
(24, 'A', 'science', 'Monthly', '2018-01-11', '06:00', '09:00', '11th', '100'),
(25, 'A', 'maths', 'Monthly', '2018-01-12', '06:00', '09:00', '11th', '100'),
(26, 'A', 'hindi', 'Monthly', '2018-01-01', '16:56', '19:08', '11th', '50'),
(27, 'A', 'hindi1', 'Monthly', '2018-01-09', '15:43', '20:07', '11th', '50'),
(28, 'A', 'gk', 'Monthly', '2018-01-08', '15:43', '16:54', '11th', '50'),
(29, 'A', 'science', 'Monthly', '2018-01-13', '14:42', '03:43', '11th', '50'),
(30, 'A', 'maths', 'Monthly', '2018-01-01', '14:34', '03:43', '11th', '50'),
(31, 'A', 'sst', 'Monthly', '2018-01-09', '15:43', '16:54', '11th', '50');

-- --------------------------------------------------------

--
-- Table structure for table `fees_detail`
--

CREATE TABLE `fees_detail` (
  `fees_id` int(11) NOT NULL,
  `class` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `fees_type` varchar(200) NOT NULL,
  `fees_category` varchar(200) NOT NULL,
  `ammount` varchar(200) NOT NULL,
  `late_payment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_detail`
--

INSERT INTO `fees_detail` (`fees_id`, `class`, `course`, `fees_type`, `fees_category`, `ammount`, `late_payment`) VALUES
(2, '10th', '', 'fsfsf', 'monthly', '454', '4545'),
(3, '11th', '', 'cash', 'yearly', '5000', '300');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(200) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `create_date` varchar(200) NOT NULL,
  `update_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `folder_name`, `image`, `create_date`, `update_date`) VALUES
(1, 'adad', '', '2018-01-08', ''),
(2, 'ankit', 'Lighthouse.jpg,Penguins.jpg,Chrysanthemum.jpg,Desert.jpg,Hydrangeas.jpg,Jellyfish.jpg,Koala.jpg,Lighthouse.jpg,Penguins.jpg,Tulips.jpg', '2018-01-08', ''),
(3, 'navita', 'Koala.jpg,Lighthouse.jpg,Penguins.jpg', '2018-01-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `gate_timing`
--

CREATE TABLE `gate_timing` (
  `id` int(20) NOT NULL,
  `Token` varchar(200) NOT NULL,
  `return_token` varchar(200) NOT NULL,
  `VisitorName` varchar(200) NOT NULL,
  `Category` varchar(200) NOT NULL,
  `To_Meet` varchar(200) NOT NULL,
  `Reason` varchar(200) NOT NULL,
  `EntryTimming` varchar(200) NOT NULL,
  `GatekeeperName` varchar(200) NOT NULL,
  `outtime` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `Class` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `entry_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gate_timing`
--

INSERT INTO `gate_timing` (`id`, `Token`, `return_token`, `VisitorName`, `Category`, `To_Meet`, `Reason`, `EntryTimming`, `GatekeeperName`, `outtime`, `status`, `Class`, `department`, `entry_date`) VALUES
(1, '1', '', 'piyush', '3', 'Sachin, gaun', 'personal', '15:49:59 PM  ', 'kishan', '18:17:39 PM  ', '1', '1', 'computer', ' Thu, Jan 11th, 2018'),
(2, '4', '', 'sachin', '2', 'navita , don , uk ,nainital', 'nothing', '15:56:40 PM  ', 'keeper', '18:17:47 PM  ', '1', '11th', '2', ' Thu, Jan 11th, 2018'),
(3, '1', '', 'piyush', '3', 'Sachin, gaun', 'nothing', '18:21:40 PM  ', 'geet', '18:22:06 PM  ', '1', '1', 'computer', ' Thu, Jan 11th, 2018'),
(4, '2', '', 'zdfgvbxf', '3', 'vandana, Tyagi', 'dsf', '18:21:54 PM  ', 'dsf', '18:27:15 PM  ', '1', '1', 'computer', ' Thu, Jan 11th, 2018'),
(5, '2', '', 'ankit', '2', 'Reema , Ghanshyam , karampura', 'bella', '18:40:27 PM  ', 'bhalu', '18:40:34 PM  ', '1', '11th', '2', ' Thu, Jan 11th, 2018'),
(6, '1', '', 'piyush', '2', 'Reema , Ghanshyam , karampura', 'j', '11:05:08 AM  ', 'lk', '11:06:05 AM  ', '1', '11th', '2', ' Fri, Jan 12th, 2018'),
(7, '14', '', 'piyush', '2', 'harish , pradip , 17 new bara flat, sidhgora,jamshedpur', 'j', '11:05:21 AM  ', 'lk', '11:06:06 AM  ', '1', '6', '2', ' Fri, Jan 12th, 2018'),
(8, '11', '', 'piyush', '3', 'vandana, Tyagi', 'sdfhjgvl.', '11:05:51 AM  ', 'jhbk', '11:06:07 AM  ', '1', '1', 'computer', ' Fri, Jan 12th, 2018'),
(9, '1', '', 'ankit', '2', 'Ankit , Ghanshyam , karampura', 'anvi', '18:09:46 PM  ', 'asd', '18:10:02 PM  ', '1', '11th', '2', ' Fri, Jan 12th, 2018'),
(10, '3', '', 'ewfo', '2', 'broo , ghAn , karampura', 'optk5r4', '18:10:20 PM  ', 'pp', '18:10:40 PM  ', '1', '11th', '2', ' Fri, Jan 12th, 2018'),
(11, '1', '', 'opko', '3', 'sahil, kumar', 'opkpk', '18:10:32 PM  ', 'opkop', '18:10:39 PM  ', '1', '1', 'ground_staff', ' Fri, Jan 12th, 2018'),
(12, '1', '', 'opko', '2', 'broo , ghAn , karampura', 'anvi', '18:11:44 PM  ', 'asd', '18:12:25 PM  ', '1', '11th', '2', ' Fri, Jan 12th, 2018'),
(13, '12', '', 'opko', '2', 'Ankit , Ghanshyam , karampura', 'optk5r4', '17:28:41 PM  ', 'asd', '17:28:57 PM  ', '1', '11th', '2', ' Wed, Feb 7th, 2018'),
(14, '4', '', 'opko', '2', 'piyush , denanathchahan , chandigarh', 'optk5r4', '17:29:25 PM  ', 'pp', '17:31:31 PM  ', '1', '11th', '2', ' Wed, Feb 7th, 2018'),
(15, '9', '', 'opko', '3', 'Sachin, gaun', 'optk5r4', '17:29:51 PM  ', 'pp', '17:30:34 PM  ', '1', '1', 'computer', ' Wed, Feb 7th, 2018'),
(16, '7', '', 'opko', '2', 'ankita , denanathchahan , ergryy', 'optk5r4', '17:30:18 PM  ', 'opkop', '17:30:46 PM  ', '1', '11th', '2', ' Wed, Feb 7th, 2018'),
(17, '2', '', 'sasafas', '2', 'broo , ghAn , karampura', 'sfaafsa', '17:16:08 PM  ', 'safsa', '17:19:25 PM  ', '1', '11th', '2', ' Tue, Feb 20th, 2018'),
(18, '2', '', 'fsdf', '2', 'broo , ghAn , karampura', 'fssf', '17:19:57 PM  ', 'sdfsd', '17:20:17 PM  ', '1', '11th', '2', ' Tue, Feb 20th, 2018');

-- --------------------------------------------------------

--
-- Table structure for table `leave_detail`
--

CREATE TABLE `leave_detail` (
  `leave_id` int(11) NOT NULL,
  `std_id` varchar(200) NOT NULL,
  `stf_id` varchar(200) NOT NULL,
  `leave_message` varchar(1000) NOT NULL,
  `approve_status` varchar(200) NOT NULL,
  `from_date` varchar(200) NOT NULL,
  `to_date` varchar(200) NOT NULL,
  `reaceved_status` varchar(200) NOT NULL,
  `leave_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lession_plan`
--

CREATE TABLE `lession_plan` (
  `lession_id` int(11) NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `section_id` varchar(200) NOT NULL,
  `sub_id` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `to_date` varchar(200) NOT NULL,
  `from_date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lession_plan`
--

INSERT INTO `lession_plan` (`lession_id`, `class_id`, `section_id`, `sub_id`, `description`, `to_date`, `from_date`) VALUES
(4, '11th', 'A', 'hindi', 'chapter 1 to chapter 10', '2017-11-22', '2017-11-24'),
(5, '12th', 'D', 'math', 'chapter 10 to chapter 13', '2017-11-25', '2017-11-27'),
(6, '11th', 'A', 'hindi1', 'chapter 23', '2017-12-12', '2017-12-21'),
(7, '11th', 'A', 'hindi1', 'safrefre', '2018-01-08', '2018-01-11'),
(8, '11th', 'A', 'science', 'rfrfefrerfwer', '2018-01-31', '2018-02-12'),
(9, '11th', 'A', 'maths', 'ferterew', '2018-01-11', '2018-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `librarycategory`
--

CREATE TABLE `librarycategory` (
  `id` int(20) NOT NULL,
  `Categoryname` varchar(200) NOT NULL,
  `SectionCode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarycategory`
--

INSERT INTO `librarycategory` (`id`, `Categoryname`, `SectionCode`) VALUES
(1, 'rOMANTIC', '7856'),
(2, 'Science', '56475'),
(3, 'love', 'bite');

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `msg_id` int(11) NOT NULL,
  `class_sub` varchar(300) NOT NULL,
  `section_sub` varchar(400) NOT NULL,
  `msg_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `std_id` varchar(300) NOT NULL,
  `parent_id` varchar(300) NOT NULL,
  `tch_id` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `stf_id` varchar(300) NOT NULL,
  `send_by_student` varchar(200) NOT NULL,
  `send_by_parent` varchar(200) NOT NULL,
  `regarding_student` varchar(200) NOT NULL,
  `send_by_admin` varchar(200) NOT NULL,
  `date_bithday` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messenger`
--

INSERT INTO `messenger` (`msg_id`, `class_sub`, `section_sub`, `msg_created`, `status`, `std_id`, `parent_id`, `tch_id`, `message`, `subject`, `stf_id`, `send_by_student`, `send_by_parent`, `regarding_student`, `send_by_admin`, `date_bithday`) VALUES
(1, '11th', 'A', '2017-12-29 11:06:39', 1, '1', '', '', 'Happy Bday Dear Ankit Kumar', 'Happy Bday', '', '', '', '', 'admin', '29-12-17'),
(2, '11th', 'A', '2017-12-29 11:06:39', 0, '6', '', '', 'Today is ur frd birthday Ankit Kumar', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(3, '11th', 'B', '2017-12-29 11:06:39', 0, '7', '', '', 'Happy Bday Dear navita airi', 'Happy Bday', '', '', '', '', 'admin', '29-12-17'),
(4, '11th', 'B', '2017-12-29 11:06:39', 0, '9', '', '', 'Today is ur frd birthday navita airi', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(5, '11th', 'B', '2017-12-29 11:06:39', 0, '10', '', '', 'Today is ur frd birthday navita airi', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(6, '11th', 'A', '2018-01-02 11:46:18', 1, '1', '', '', 'Happy Bday Dear Ankit Kumar', 'Happy Bday', '', '', '', '', 'admin', '02-01-18'),
(7, '11th', 'A', '2018-01-02 11:46:18', 0, '6', '', '', 'Today is ur frd birthday Ankit Kumar', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(8, '11th', 'B', '2018-01-02 11:46:18', 0, '9', '', '', 'Happy Bday Dear piyush  sharma', 'Happy Bday', '', '', '', '', 'admin', '02-01-18'),
(9, '11th', 'B', '2018-01-02 11:46:18', 0, '7', '', '', 'Today is ur frd birthday piyush  sharma', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(10, '11th', 'B', '2018-01-02 11:46:18', 0, '10', '', '', 'Today is ur frd birthday piyush  sharma', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(11, '11th', 'A', '2018-01-11 07:07:29', 0, '11', '', '', 'Happy Bday Dear gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', '11-01-18'),
(12, '11th', 'A', '2018-01-11 07:07:29', 1, '1', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(13, '11th', 'A', '2018-01-11 07:07:29', 0, '6', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(14, '11th', 'A', '2018-01-11 07:07:29', 0, '7', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(15, '11th', 'A', '2018-01-11 07:07:29', 0, '9', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(16, '11th', 'A', '2018-01-11 07:07:29', 0, '10', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(17, '11th', 'A', '2018-01-11 07:07:29', 0, '12', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(18, '11th', 'A', '2018-01-11 07:07:29', 0, '14', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(19, '11th', 'A', '2018-01-11 07:07:29', 0, '15', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(20, '11th', 'A', '2018-01-11 07:07:29', 0, '16', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(21, '11th', 'A', '2018-01-11 07:07:29', 0, '15', '', '', 'Happy Bday Dear gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', '11-01-18'),
(22, '11th', 'A', '2018-01-11 07:07:29', 1, '1', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(23, '11th', 'A', '2018-01-11 07:07:29', 0, '6', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(24, '11th', 'A', '2018-01-11 07:07:29', 0, '7', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(25, '11th', 'A', '2018-01-11 07:07:29', 0, '9', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(26, '11th', 'A', '2018-01-11 07:07:29', 0, '10', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(27, '11th', 'A', '2018-01-11 07:07:29', 0, '11', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(28, '11th', 'A', '2018-01-11 07:07:29', 0, '12', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(29, '11th', 'A', '2018-01-11 07:07:29', 0, '14', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(30, '11th', 'A', '2018-01-11 07:07:29', 0, '16', '', '', 'Today is ur frd birthday gtr grgrd', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(31, '11th', 'A', '2018-01-19 05:04:10', 0, '16', '', '', 'Happy Bday Dear fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', '19-01-18'),
(32, '11th', 'A', '2018-01-19 05:04:10', 1, '1', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(33, '11th', 'A', '2018-01-19 05:04:10', 0, '6', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(34, '11th', 'A', '2018-01-19 05:04:10', 0, '7', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(35, '11th', 'A', '2018-01-19 05:04:10', 0, '9', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(36, '11th', 'A', '2018-01-19 05:04:10', 0, '10', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(37, '11th', 'A', '2018-01-19 05:04:10', 0, '11', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(38, '11th', 'A', '2018-01-19 05:04:10', 0, '12', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(39, '11th', 'A', '2018-01-19 05:04:10', 0, '14', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(40, '11th', 'A', '2018-01-19 05:04:10', 0, '15', '', '', 'Today is ur frd birthday fgfg jhhj', 'Happy Bday', '', '', '', '', 'admin', 'd-m-y'),
(41, '11th', 'A', '2018-02-09 09:40:55', 1, '1', '', '', 'ffff', 'gdfg', 'Sachin', '', '', '', '', ''),
(42, '11th', 'A', '2018-02-09 09:40:55', 1, '', '1', '', 'ffff', 'gdfg', 'Sachin', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(11) NOT NULL,
  `notes_title` varchar(200) NOT NULL,
  `notes_desc` varchar(200) NOT NULL,
  `notes_file` varchar(200) NOT NULL,
  `notes_batch` varchar(200) NOT NULL,
  `notes_subject` varchar(200) NOT NULL,
  `notes_for_class` varchar(200) NOT NULL,
  `notes_for_section` varchar(500) NOT NULL,
  `submitted_by` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `notes_title`, `notes_desc`, `notes_file`, `notes_batch`, `notes_subject`, `notes_for_class`, `notes_for_section`, `submitted_by`) VALUES
(1, 'summmer', 'dgdfg', 'SACHIN2.pdf', '2017-2018', 'hindi', '11th', 'A', NULL),
(2, 'summmer', 'desss', 'SACHIN_(1).pdf', '2017-2018', 'science', '10th', 'A', NULL),
(3, 'gftrgrtf', 'rtfhgrtfh', 'Lighthouse17.jpg', '2018-2019', 'hindi', '11th', 'A', NULL),
(4, 'rtyhrty', 'rtyhrt', 'Tulips11.jpg', '2018-2019', 'hindi1', '11th', 'A', NULL),
(5, 'rtyhrtfyhr', 'rtyht', 'SACHIN_(1)1.pdf', '2018-2019', 'science', '10th', 'A', NULL),
(6, 'tyjuhyt', 'ytjuytujyt', 'Tulips51.jpg', '2018-2019', 'science', '10th', 'A', NULL),
(7, 'tujtyuj', 'tyujtyujyt', 'SACHIN_(1)2.pdf', '2018-2019', 'science', '11th', 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parent_request`
--

CREATE TABLE `parent_request` (
  `request_id` int(11) NOT NULL,
  `request_send` varchar(200) NOT NULL,
  `request_received` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `send_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `received_date` varchar(200) NOT NULL,
  `request_std_id` varchar(500) NOT NULL,
  `relation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_request`
--

INSERT INTO `parent_request` (`request_id`, `request_send`, `request_received`, `status`, `send_date`, `received_date`, `request_std_id`, `relation`) VALUES
(1, 'kumarankitchoudhary011293@gmail.com', 'sachinraajvijay@gmail.com', '1', '2017-11-09 03:37:56', '2017-11-09 14:39:41', '7', 'mother'),
(2, 'sachinraajvijay@gmail.com', 'kumarankitchoudhary011293@gmail.com', '1', '2017-11-09 07:24:25', '2017-11-09 18:25:05', '6', 'father');

-- --------------------------------------------------------

--
-- Table structure for table `parrent_detail`
--

CREATE TABLE `parrent_detail` (
  `parent_id` int(11) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `father_email` varchar(200) NOT NULL,
  `std_id` varchar(200) NOT NULL,
  `father_address` varchar(200) NOT NULL,
  `father_phone` varchar(200) NOT NULL,
  `mother_address` varchar(300) NOT NULL,
  `mother_phone` varchar(300) NOT NULL,
  `father_occupation` varchar(200) NOT NULL,
  `guardian_address` varchar(300) NOT NULL,
  `guardian_phone` varchar(200) NOT NULL,
  `mother_occupation` varchar(200) NOT NULL,
  `mother_email` varchar(500) NOT NULL,
  `guardian_email` varchar(500) NOT NULL,
  `guardian_name` varchar(500) NOT NULL,
  `father_password` varchar(500) DEFAULT NULL,
  `mother_password` varchar(500) DEFAULT NULL,
  `guardian_password` varchar(500) DEFAULT NULL,
  `profile_images` varchar(200) NOT NULL,
  `guardian_occupation` varchar(300) NOT NULL,
  `parent_header` varchar(200) NOT NULL,
  `parent_sidebar` varchar(200) NOT NULL,
  `parent_body` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parrent_detail`
--

INSERT INTO `parrent_detail` (`parent_id`, `father_name`, `mother_name`, `father_email`, `std_id`, `father_address`, `father_phone`, `mother_address`, `mother_phone`, `father_occupation`, `guardian_address`, `guardian_phone`, `mother_occupation`, `mother_email`, `guardian_email`, `guardian_name`, `father_password`, `mother_password`, `guardian_password`, `profile_images`, `guardian_occupation`, `parent_header`, `parent_sidebar`, `parent_body`) VALUES
(1, 'Ghanshyam', 'Nirmala', 'kumarankitchoudhary011293@gmail.com', '1', '', '3434343434', '9654215063', '9876543210', 'business man', '', '', 'housewife', 'sachinraajvijay@gmail.com', 'anand.vicky21@gmail.com', '', '11', '11', '11', 'Chrysanthemum5.jpg', '', 'yellow', 'purple', 'white'),
(2, 'don', '', 'piyush@gmail.com', '14', '', '9632587412', '', '', '', '', '', '', '', '', '', '11', NULL, NULL, 'Koala17.jpg', '', '', '', ''),
(3, 'denanathchahan', '', 'denanathchahan@gmail.com', '9', '', '9632587410', '', '', '', '', '', '', '', '', '', '11', NULL, NULL, 'Koala7.jpg', '', '', '', ''),
(4, 'gbdrfgbr', '', 'thrt@rtujh.tygj', '15', '', '7412369985', '', '', 'trhyrthyrt', '', '', '', '', '', '', '11', NULL, NULL, 'Koala9.jpg', '', '', '', ''),
(5, 'fdgredfytgt', '', 'dsfg@rtgytrt.rth', '12', '', '4543543543453', '', '', 'rthgrtyhg', '', '', '', '', '', '', '11', NULL, NULL, 'Koala11.jpg', '', '', '', ''),
(6, 'jai', 'gfjh', 'jgghj@gmail.com', '16', '', '77878787878', '', 'hjghjjg', 'hjyhjugj', '', '987456322', '', '', '', '', '11', NULL, NULL, 'Chrysanthemum4.jpg', '', '', '', ''),
(7, 'denanathchahan', '', '', '18', '', '9632587410', '', '', 'trhyrthyrt', '', '', '', '', '', '', NULL, NULL, NULL, 'Tulips12.jpg', '', '', '', ''),
(8, 'mr.manoj pan', '', 'kakransahil40@gmail.com', '19', '', '8709713322', '', '', 'bussines', '', '', '', '', '', '', '11', NULL, NULL, '', '', '', '', ''),
(9, '', '', '', '20', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `permission_no`
--

CREATE TABLE `permission_no` (
  `permission_id` int(11) NOT NULL,
  `edit` varchar(200) NOT NULL,
  `view` varchar(200) NOT NULL,
  `del` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_drop`
--

CREATE TABLE `pickup_drop` (
  `pickup_drop_id` int(11) NOT NULL,
  `pass_name` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `pick_up_from` varchar(200) NOT NULL,
  `drop_place` varchar(200) DEFAULT NULL,
  `pick_time` varchar(200) DEFAULT NULL,
  `drop_time` varchar(200) DEFAULT NULL,
  `drop_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup_drop`
--

INSERT INTO `pickup_drop` (`pickup_drop_id`, `pass_name`, `class`, `section`, `pick_up_from`, `drop_place`, `pick_time`, `drop_time`, `drop_status`) VALUES
(1, 'Ankit Kumar', '11th', 'A', 'TECHNICAL PARADISE, SECTOR 56, GURGOAN, Basai Rd, Jacobpura, Sector 12, Gurugram, Haryana 122006, India', 'TECHNICAL PARADISE, SECTOR 56, GURGOAN, Basai Rd, Jacobpura, Sector 12, Gurugram, Haryana 122006, India', '11:47:58am', '11:49:47am', 1),
(2, 'broo kumar', '11th', 'A', '', '', '12:04:08pm', '12:51:48pm', 1),
(3, 'Ankit Kumar', '11th', 'A', '', '', '12:51:42pm', '12:52:00pm', 1),
(4, 'broo kumar', '11th', 'A', '', '', '12:51:52pm', '12:52:03pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `programming_languages`
--

CREATE TABLE `programming_languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(5) NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `programming_languages`
--

INSERT INTO `programming_languages` (`id`, `name`, `rating`, `status`) VALUES
(1, 'PHP', 79, '1'),
(2, 'Python', 30, '1'),
(3, 'Java', 45, '1'),
(4, 'JavaScript', 71, '1'),
(5, 'AngularJS', 29, '1'),
(6, 'Node.js', 28, '1'),
(7, 'SQL', 56, '1'),
(8, 'Visual Basic .NET', 31, '1'),
(9, 'Perl', 45, '1'),
(10, 'Swift', 68, '1'),
(11, 'Ruby', 35, '1'),
(12, 'Objective-C', 19, '1'),
(13, 'C', 14, '1'),
(14, 'C#', 17, '1'),
(15, 'C++', 15, '1');

-- --------------------------------------------------------

--
-- Table structure for table `role_assign`
--

CREATE TABLE `role_assign` (
  `role_id` int(11) NOT NULL,
  `staff_id` varchar(200) DEFAULT NULL,
  `add_user` varchar(200) DEFAULT NULL,
  `manage_user` varchar(200) DEFAULT NULL,
  `add_class` varchar(200) DEFAULT NULL,
  `add_subject` varchar(200) DEFAULT NULL,
  `add_incharge` varchar(200) DEFAULT NULL,
  `add_exam` varchar(200) DEFAULT NULL,
  `add_daily_basis` varchar(200) DEFAULT NULL,
  `add_time_table` varchar(200) DEFAULT NULL,
  `add_notice` varchar(200) NOT NULL,
  `insert_event` varchar(200) NOT NULL,
  `add_event` varchar(200) NOT NULL,
  `event_detail` varchar(200) NOT NULL,
  `participate_list` varchar(200) NOT NULL,
  `add_notes` varchar(200) NOT NULL,
  `assignment` varchar(200) NOT NULL,
  `lesson_plan` varchar(200) NOT NULL,
  `staff_attendance` varchar(200) NOT NULL,
  `class_attendance` varchar(200) NOT NULL,
  `exam_marks` varchar(200) NOT NULL,
  `test_marks` varchar(200) NOT NULL,
  `assign_subject_teacher` varchar(200) NOT NULL,
  `assign_sec_roll` varchar(200) NOT NULL,
  `add_vehicle` varchar(200) NOT NULL,
  `add_routes` varchar(200) NOT NULL,
  `add_driver` varchar(200) NOT NULL,
  `add_destination` varchar(200) NOT NULL,
  `transport_allocation` varchar(200) NOT NULL,
  `gallery` varchar(200) NOT NULL,
  `library_category` varchar(200) NOT NULL,
  `add_books` varchar(200) NOT NULL,
  `add_request` varchar(200) NOT NULL,
  `books_request` varchar(200) NOT NULL,
  `import_library` varchar(200) NOT NULL,
  `library_report` varchar(200) NOT NULL,
  `visitor_entry` varchar(200) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `promotion` varchar(200) NOT NULL,
  `authority` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_assign`
--

INSERT INTO `role_assign` (`role_id`, `staff_id`, `add_user`, `manage_user`, `add_class`, `add_subject`, `add_incharge`, `add_exam`, `add_daily_basis`, `add_time_table`, `add_notice`, `insert_event`, `add_event`, `event_detail`, `participate_list`, `add_notes`, `assignment`, `lesson_plan`, `staff_attendance`, `class_attendance`, `exam_marks`, `test_marks`, `assign_subject_teacher`, `assign_sec_roll`, `add_vehicle`, `add_routes`, `add_driver`, `add_destination`, `transport_allocation`, `gallery`, `library_category`, `add_books`, `add_request`, `books_request`, `import_library`, `library_report`, `visitor_entry`, `feedback`, `promotion`, `authority`, `transport`) VALUES
(1, '3', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '2', '1', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '1,3', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rute_detail`
--

CREATE TABLE `rute_detail` (
  `rute_id` int(11) NOT NULL,
  `rute_code` varchar(200) NOT NULL,
  `vehicle_no` varchar(200) NOT NULL,
  `pickup_place` varchar(200) NOT NULL,
  `drop_place` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute_detail`
--

INSERT INTO `rute_detail` (`rute_id`, `rute_code`, `vehicle_no`, `pickup_place`, `drop_place`) VALUES
(1, '', '96321', '2321', '213'),
(2, '', '96321', 'new de;lhi', 'dwarka');

-- --------------------------------------------------------

--
-- Table structure for table `school_profile`
--

CREATE TABLE `school_profile` (
  `institute_id` int(11) NOT NULL,
  `institute_name` varchar(500) NOT NULL,
  `institute_address` varchar(500) NOT NULL,
  `institute_email` varchar(500) NOT NULL,
  `institute_phone` varchar(500) NOT NULL,
  `institute_mobile` varchar(500) NOT NULL,
  `institute_fax` varchar(500) NOT NULL,
  `admin_contact_person` varchar(500) NOT NULL,
  `institute_country` varchar(500) NOT NULL,
  `language` varchar(400) NOT NULL,
  `institute_code` varchar(500) NOT NULL,
  `institute_logo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `stf_id` int(11) NOT NULL,
  `stf_doj` varchar(200) NOT NULL,
  `stf_dept` varchar(200) NOT NULL,
  `stf_designation` varchar(200) NOT NULL,
  `stf_qualification` varchar(200) NOT NULL,
  `stf_experience` varchar(200) NOT NULL,
  `stf_fname` varchar(200) NOT NULL,
  `stf_lname` varchar(200) NOT NULL,
  `stf_dob` varchar(200) NOT NULL,
  `stf_gender` varchar(200) NOT NULL,
  `stf_pres_address` varchar(200) NOT NULL,
  `stf_perm_address` varchar(200) NOT NULL,
  `stf_city` varchar(200) NOT NULL,
  `stf_phone` varchar(200) NOT NULL,
  `stf_mobile` varchar(200) NOT NULL,
  `stf_email` varchar(200) NOT NULL,
  `stf_password` varchar(500) NOT NULL,
  `stf_country` varchar(200) NOT NULL,
  `stf_image` varchar(1000) NOT NULL,
  `stf_register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stf_last_update` varchar(500) NOT NULL,
  `stf_header` varchar(200) NOT NULL,
  `stf_body` varchar(200) NOT NULL,
  `stf_sidebar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`stf_id`, `stf_doj`, `stf_dept`, `stf_designation`, `stf_qualification`, `stf_experience`, `stf_fname`, `stf_lname`, `stf_dob`, `stf_gender`, `stf_pres_address`, `stf_perm_address`, `stf_city`, `stf_phone`, `stf_mobile`, `stf_email`, `stf_password`, `stf_country`, `stf_image`, `stf_register_date`, `stf_last_update`, `stf_header`, `stf_body`, `stf_sidebar`) VALUES
(1, '2017-12-20', 'computer', '1', 'btech', '2', 'Sachin', 'gaun', '1989-11-01', 'male', 'karampura', 'karamoura', 'new delhi', '9654215063', '9654215063', 'er.sachingaun@gmail.com', '11', 'Indian', 'Lighthouse16.jpg', '2017-12-14 01:22:59', '', 'yellow', '#c44000', 'blue'),
(2, '2017-12-29', 'ground_staff', '4', '11th', '5', 'sahil', 'kumar', '1989-02-07', 'male', 'ghaziabad', 'ggn', 'gurgaon', '9650642154', '5665655665', 'sahildashkumar@gmail.com', '11', 'Indian', 'Lighthouse15.jpg', '2017-12-28 08:52:25', '', 'white', 'white', 'black'),
(3, '2018-01-05', 'computer', '1', 'mca', '5', 'nnaavviitta', '', '2018-01-20', 'male', 'fgbcvb', 'cvbcvb', 'fgfg', '5445454545', '4545454545', 'fg@gfmail.com', '11', 'Select', 'Jellyfish5.jpg', '2018-01-05 09:22:18', '', 'white', 'black', 'brown'),
(4, '2018-02-28', 'computer', '1', 'btech', '2', 'reema', 'pan', '1993-09-06', 'Female', 'karampuraa', 'new delhi', 'new delhi', '9654215063', '9654215063', 'reemaisthebest6@gmail.com', '11', 'India', '', '2018-02-20 12:15:23', '', '', '', ''),
(5, '2018-02-23', 'arts', '1', 'jbt', '2 years', 'kirtika ', 'thakur', '1999-07-14', 'Female', 'devi tal colony sec10', 'devi tal colony sec10', 'gurgaon', '9540408557', '9540408557', 'kakransahil40@gmail.com', '11', 'India', '', '2018-02-23 07:31:44', '', 'white', 'black', 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attandance_report`
--

CREATE TABLE `staff_attandance_report` (
  `attand_id` int(11) NOT NULL,
  `stf_id` varchar(200) NOT NULL,
  `stf_name` varchar(200) NOT NULL,
  `stf_desiginition` varchar(200) DEFAULT NULL,
  `year` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `d01` varchar(200) DEFAULT NULL,
  `d02` varchar(200) DEFAULT NULL,
  `d03` varchar(200) DEFAULT NULL,
  `d04` varchar(200) DEFAULT NULL,
  `d05` varchar(200) DEFAULT NULL,
  `d06` varchar(200) DEFAULT NULL,
  `d07` varchar(200) DEFAULT NULL,
  `d08` varchar(200) DEFAULT NULL,
  `d09` varchar(200) DEFAULT NULL,
  `d10` varchar(200) DEFAULT NULL,
  `d11` varchar(200) DEFAULT NULL,
  `d12` varchar(200) DEFAULT NULL,
  `d13` varchar(200) DEFAULT NULL,
  `d14` varchar(200) DEFAULT NULL,
  `d15` varchar(200) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL,
  `d16` varchar(200) DEFAULT NULL,
  `d17` varchar(200) DEFAULT NULL,
  `d18` varchar(200) DEFAULT NULL,
  `d19` varchar(200) DEFAULT NULL,
  `d20` varchar(200) DEFAULT NULL,
  `d21` varchar(200) DEFAULT NULL,
  `d22` varchar(200) DEFAULT NULL,
  `d23` varchar(200) DEFAULT NULL,
  `d24` varchar(200) DEFAULT NULL,
  `d25` varchar(200) DEFAULT NULL,
  `d26` varchar(200) DEFAULT NULL,
  `d27` varchar(200) DEFAULT NULL,
  `d28` varchar(200) DEFAULT NULL,
  `d29` varchar(200) DEFAULT NULL,
  `d30` varchar(200) DEFAULT NULL,
  `d31` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_attandance_report`
--

INSERT INTO `staff_attandance_report` (`attand_id`, `stf_id`, `stf_name`, `stf_desiginition`, `year`, `month`, `d01`, `d02`, `d03`, `d04`, `d05`, `d06`, `d07`, `d08`, `d09`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`) VALUES
(1, '1', 'Sachin gaun', '1', '2018', '1', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '3', 'gfg fgfg', '1', '2018', '1', NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_sailary_detail`
--

CREATE TABLE `staff_sailary_detail` (
  `sailary_id` int(11) NOT NULL,
  `stf_id` varchar(200) NOT NULL,
  `stf_sailary` varchar(200) NOT NULL,
  `sailary_month` varchar(200) NOT NULL,
  `sailary_year` varchar(200) NOT NULL,
  `pay_mode` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_sailary_detail`
--

INSERT INTO `staff_sailary_detail` (`sailary_id`, `stf_id`, `stf_sailary`, `sailary_month`, `sailary_year`, `pay_mode`, `status`) VALUES
(1, '4', '3000', '3756', '1993', 'self', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary_paid`
--

CREATE TABLE `staff_salary_paid` (
  `paid_id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `issue_date` varchar(500) NOT NULL,
  `payhead` varchar(500) NOT NULL,
  `amount` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_salary_paid`
--

INSERT INTO `staff_salary_paid` (`paid_id`, `designation`, `staff_id`, `year`, `month`, `start_date`, `issue_date`, `payhead`, `amount`) VALUES
(1, 'fs', '1', '2017', 'November', '2017-11-24', '2017-11-24', '423', '45345'),
(2, 'teacher', 'anil kumar', '2017', 'November', '2017-11-29', '2017-11-29', '2000', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary_set`
--

CREATE TABLE `staff_salary_set` (
  `pay_id` int(11) NOT NULL,
  `desigination` varchar(200) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `pay_head` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_salary_set`
--

INSERT INTO `staff_salary_set` (`pay_id`, `desigination`, `staff_id`, `pay_head`, `unit`, `type`) VALUES
(1, 'teacher', 'anil kumar', 'basic salary', '668767', '-1'),
(2, 'teacher', 'anil kumar', 'basic salary', '87987', 'Ammount'),
(3, 'teacher', '', '-1', '', ''),
(4, 'teacher', 'anil kumar', 'basic salary', '1000', 'Ammount');

-- --------------------------------------------------------

--
-- Table structure for table `student_feedback`
--

CREATE TABLE `student_feedback` (
  `feedback_id` int(11) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `date_feedback` varchar(200) NOT NULL,
  `communication` varchar(200) NOT NULL,
  `knowledge` varchar(200) NOT NULL,
  `discipline` varchar(200) NOT NULL,
  `punctuality` varchar(200) NOT NULL,
  `coverage` varchar(200) NOT NULL,
  `respect` varchar(200) NOT NULL,
  `ask_question` varchar(200) NOT NULL,
  `sufficient_time` varchar(200) NOT NULL,
  `lecture` varchar(200) NOT NULL,
  `suggestion` varchar(200) NOT NULL,
  `additional_comment` varchar(500) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `overall_rate` varchar(200) NOT NULL,
  `current_session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_feedback`
--

INSERT INTO `student_feedback` (`feedback_id`, `staff_id`, `staff_name`, `date_feedback`, `communication`, `knowledge`, `discipline`, `punctuality`, `coverage`, `respect`, `ask_question`, `sufficient_time`, `lecture`, `suggestion`, `additional_comment`, `student_id`, `class`, `section`, `overall_rate`, `current_session`) VALUES
(1, '1', 'Sachin gaun', '2018-01-31', '3', '3', '3', '3', '3', '3', '3', '3', '12', 'ghrty  r5y5ty 5 5y65y 55y 56y5', 'y 56 yu565675657 575757', '1', '11th', 'A', '3', '2018'),
(2, '3', 'nnaavviitta ', '2018-01-31', '3', '3', '3', '3', '3', '3', '3', '3', '23', '65u67u', 'uykyu', '1', '11th', 'A', '3', '2018'),
(3, '1', 'Sachin gaun', '2018-01-20', '4', '4', '4', '4', '4', '4', '4', '4', '34', 'truj 56u576 547u56 56u65 56', '56u65 65u56u 56u56 56 56756', '13', '11th', 'A', '4', '2018'),
(4, '3', 'nnaavviitta ', '2018-01-24', '5', '5', '5', '5', '5', '5', '5', '5', '45', 'trujrt5u 5u65u7 6 56uy7567y 5', '65 865 ytujty trutyu', '13', '11th', 'A', '5', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_detail`
--

CREATE TABLE `student_fees_detail` (
  `fee_id` int(11) NOT NULL,
  `std_id` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `paid` varchar(200) NOT NULL,
  `pending` varchar(200) NOT NULL,
  `fees` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `stf_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fees_detail`
--

INSERT INTO `student_fees_detail` (`fee_id`, `std_id`, `month`, `year`, `paid`, `pending`, `fees`, `class`, `stf_id`) VALUES
(3, '32', '23', '000', '232', '232', '232', '10th', ''),
(4, '23', '23', '23', '23', '232', '23', '10th', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_leave`
--

CREATE TABLE `student_leave` (
  `student_leave_id` int(20) NOT NULL,
  `std_id` varchar(20) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `incharge_id` varchar(20) NOT NULL,
  `leave_category` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `from_date` varchar(20) NOT NULL,
  `to_date` varchar(20) NOT NULL,
  `leave_count` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `approval` varchar(20) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_leave`
--

INSERT INTO `student_leave` (`student_leave_id`, `std_id`, `roll_no`, `name`, `class`, `section`, `incharge_id`, `leave_category`, `designation`, `from_date`, `to_date`, `leave_count`, `message`, `approval`, `created_on`) VALUES
(1, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-29', '2018-01-10', '13', 'tyhtrf', '1', '2017-12-26 12:23:06'),
(2, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-01', '2017-12-05', '5', '4et5e4', '1', '2017-12-26 12:24:30'),
(3, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-20', '2017-12-23', '4', 'tguyft', '1', '2017-12-26 12:28:49'),
(4, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-28', '2017-12-30', '3', 'gfff', '2', '2017-12-26 12:33:36'),
(5, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-05', '2017-12-09', '5', 'tyt5yut5', '1', '2017-12-26 12:34:49'),
(6, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-31', '2018-01-04', '5', 'rtyrftyr', '1', '2017-12-26 12:36:35'),
(7, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2018-02-07', '2018-03-22', '44', 'rdftgrd', '1', '2017-12-26 12:37:26'),
(8, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-08', '2017-12-09', '2', 'fffrf', '2', '2017-12-26 12:42:16'),
(9, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-30', '2017-12-23', '6', 'fghfgh', '2', '2017-12-26 12:47:18'),
(10, '1', '1', 'Ankit Kumar', '11th', 'A', '1', 'sick', 'student', '2017-12-28', '2017-12-29', '2', 'YUUUIYUIY', '0', '2017-12-27 05:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `marks_id` int(11) NOT NULL,
  `exam_id` varchar(500) NOT NULL,
  `exam_type` varchar(200) NOT NULL,
  `std_id` varchar(200) NOT NULL,
  `stf_id` varchar(200) NOT NULL,
  `marks_obtain` varchar(100) NOT NULL,
  `max_mark` varchar(200) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `class_section` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`marks_id`, `exam_id`, `exam_type`, `std_id`, `stf_id`, `marks_obtain`, `max_mark`, `batch`, `subject`, `class_id`, `class_section`, `month`, `year`) VALUES
(1, '21', 'Monthly', '1', '', '90', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(2, '21', 'Monthly', '6', '', '92', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(3, '21', 'Monthly', '7', '', '84', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(4, '21', 'Monthly', '9', '', '88', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(5, '21', 'Monthly', '10', '', '90', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(6, '21', 'Monthly', '11', '', '70', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(7, '21', 'Monthly', '12', '', '60', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(8, '21', 'Monthly', '13', '', '50', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(9, '21', 'Monthly', '14', '', '60', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(10, '21', 'Monthly', '16', '', '55', '100', '2018-01-08', 'hindi', '11th', 'A', '01', 2018),
(11, '23', 'Monthly', '1', '', '85', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(12, '23', 'Monthly', '7', '', '65', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(13, '23', 'Monthly', '6', '', '75', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(14, '23', 'Monthly', '9', '', '55', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(15, '23', 'Monthly', '10', '', '45', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(16, '23', 'Monthly', '11', '', '55', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(17, '23', 'Monthly', '12', '', '46', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(18, '23', 'Monthly', '13', '', '48', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(19, '23', 'Monthly', '14', '', '55', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(20, '23', 'Monthly', '16', '', '60', '100', '2018-01-10', 'gk', '11th', 'A', '01', 2018),
(21, '24', 'Monthly', '1', '', '82', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(22, '24', 'Monthly', '6', '', '60', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(23, '24', 'Monthly', '7', '', '70', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(24, '24', 'Monthly', '9', '', '65', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(25, '24', 'Monthly', '10', '', '75', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(26, '24', 'Monthly', '11', '', '55', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(27, '24', 'Monthly', '12', '', '45', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(28, '24', 'Monthly', '13', '', '33', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(29, '24', 'Monthly', '14', '', '22', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(30, '24', 'Monthly', '16', '', '85', '100', '2018-01-11', 'science', '11th', 'A', '01', 2018),
(31, '25', 'Monthly', '1', '', '33', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(32, '25', 'Monthly', '6', '', '45', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(33, '25', 'Monthly', '7', '', '56', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(34, '25', 'Monthly', '9', '', '45', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(35, '25', 'Monthly', '10', '', '65', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(36, '25', 'Monthly', '11', '', '64', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(37, '25', 'Monthly', '12', '', '26', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(38, '25', 'Monthly', '13', '', '46', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(39, '25', 'Monthly', '14', '', '26', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(40, '25', 'Monthly', '16', '', '46', '100', '2018-01-12', 'maths', '11th', 'A', '01', 2018),
(41, '22', 'Monthly', '1', '', '55', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(42, '22', 'Monthly', '6', '', '56', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(43, '22', 'Monthly', '7', '', '4', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(44, '22', 'Monthly', '9', '', '56', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(45, '22', 'Monthly', '10', '', '4', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(46, '22', 'Monthly', '11', '', '2', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(47, '22', 'Monthly', '12', '', '5', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(48, '22', 'Monthly', '13', '', '45', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(49, '22', 'Monthly', '14', '', '7', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(50, '22', 'Monthly', '16', '', '73', '100', '2018-01-09', 'hindi1', '11th', 'A', '01', 2018),
(51, '31', 'Monthly', '1', '', '43', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(52, '31', 'Monthly', '6', '', '4', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(53, '31', 'Monthly', '7', '', '45', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(54, '31', 'Monthly', '9', '', '4', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(55, '31', 'Monthly', '11', '', '45', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(56, '31', 'Monthly', '12', '', '44', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(57, '31', 'Monthly', '13', '', '5', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(58, '31', 'Monthly', '14', '', '4', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(59, '31', 'Monthly', '16', '', '4', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018),
(60, '31', 'Monthly', '10', '', '5', '50', '2018-01-09', 'sst', '11th', 'A', '01', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `student_performance`
--

CREATE TABLE `student_performance` (
  `perf_id` int(11) NOT NULL,
  `std_id` varchar(200) NOT NULL,
  `class_test_perf` varchar(200) NOT NULL,
  `quartly_exam_perf` varchar(200) NOT NULL,
  `hlf_yrly_eaxam_perf` varchar(200) NOT NULL,
  `annual_exam_perf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_leave`
--

CREATE TABLE `teacher_leave` (
  `teacher_leave_id` int(20) NOT NULL,
  `stf_id` varchar(20) NOT NULL,
  `leave_category` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `total_leave` varchar(200) NOT NULL,
  `from_date` varchar(20) NOT NULL,
  `to_date` varchar(20) NOT NULL,
  `request_leave` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `approval` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_leave`
--

INSERT INTO `teacher_leave` (`teacher_leave_id`, `stf_id`, `leave_category`, `designation`, `total_leave`, `from_date`, `to_date`, `request_leave`, `message`, `approval`) VALUES
(1, '1', 'sick', 'teacher', '\r\n10', '2017-12-31', '2018-01-03', '4', 'kljklj', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_detail`
--

CREATE TABLE `test_detail` (
  `test_id` int(11) NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `class_section` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `test_type` varchar(200) NOT NULL,
  `test_date` varchar(200) NOT NULL,
  `test_start_time` varchar(200) NOT NULL,
  `test_end_time` varchar(200) NOT NULL,
  `max_mark` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_detail`
--

INSERT INTO `test_detail` (`test_id`, `class_id`, `class_section`, `subject`, `test_type`, `test_date`, `test_start_time`, `test_end_time`, `max_mark`, `description`) VALUES
(1, '11th', 'A', 'hindi', 'Daily Basis', '2017-11-29', '09:00', '11:00', '50', '  \r\nchapter2'),
(2, '11th', 'A', 'hindi1', 'Daily Basis', '2017-11-29', '11:00', '00:00', '50', '  chapter3\r\n'),
(3, '11th', 'A', 'hindi', 'Daily Basis', '2017-12-21', '09:00', '10:00', '20', 'chapter 2,chapter 3,chapter 4'),
(4, '11th', 'A', 'hindi1', 'Daily Basis', '2017-12-22', '09:00', '10:00', '20', '  \r\nchapter 5,chapter 6,chapter 7'),
(5, '11th', 'A', 'gk', 'Daily Basis', '2017-12-23', '09:00', '10:00', '20', '  \r\nchapter 1'),
(6, '10th', 'A', 'science', 'Daily Basis', '2017-12-14', '02:32', '02:32', '32', '  science\r\n'),
(7, '10th', 'A', 'environment', 'Daily Basis', '2017-12-14', '15:23', '02:32', '32', '  \r\nevs');

-- --------------------------------------------------------

--
-- Table structure for table `test_marks`
--

CREATE TABLE `test_marks` (
  `marks_id` int(11) NOT NULL,
  `test_id` varchar(200) NOT NULL,
  `test_type` varchar(200) NOT NULL,
  `std_id` varchar(200) NOT NULL,
  `stf_id` varchar(200) NOT NULL,
  `marks_obtain` varchar(200) NOT NULL,
  `max_mark` varchar(200) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `class_section` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_marks`
--

INSERT INTO `test_marks` (`marks_id`, `test_id`, `test_type`, `std_id`, `stf_id`, `marks_obtain`, `max_mark`, `batch`, `subject`, `class_id`, `class_section`, `description`, `month`, `year`) VALUES
(1, '2', 'Daily Basis', '1', '', '24', '50', '2017-11-29', 'hindi1', '11th', 'A', '  chapter3\n', '11', '2017'),
(2, '2', 'Daily Basis', '6', '', '23', '50', '2017-11-29', 'hindi1', '11th', 'A', '  chapter3\n', '11', '2017'),
(3, '1', 'Daily Basis', '1', '', '40', '50', '2017-11-29', 'hindi', '11th', 'A', '  \nchapter2', '11', '2017'),
(4, '1', 'Daily Basis', '6', '', '42', '50', '2017-11-29', 'hindi', '11th', 'A', '  \nchapter2', '11', '2017'),
(5, '1', 'Daily Basis', '7', '', '44', '50', '2017-11-29', 'hindi', '11th', 'A', '  \nchapter2', '11', '2017'),
(6, '1', 'Daily Basis', '9', '', '33', '50', '2017-11-29', 'hindi', '11th', 'A', '  \nchapter2', '11', '2017'),
(7, '1', 'Daily Basis', '10', '', '30', '50', '2017-11-29', 'hindi', '11th', 'A', '  \nchapter2', '11', '2017'),
(8, '1', 'Daily Basis', '11', '', '12', '50', '2017-11-29', 'hindi', '11th', 'A', '  \nchapter2', '11', '2017'),
(9, '1', 'Daily Basis', '12', '', '22', '50', '2017-11-29', 'hindi', '11th', 'A', '  \nchapter2', '11', '2017'),
(10, '5', 'Daily Basis', '1', '', '11', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(11, '5', 'Daily Basis', '6', '', '20', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(12, '5', 'Daily Basis', '7', '', '15', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(13, '5', 'Daily Basis', '9', '', '18', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(14, '5', 'Daily Basis', '10', '', '19', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(15, '5', 'Daily Basis', '11', '', '13', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(16, '5', 'Daily Basis', '12', '', '12', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(17, '5', 'Daily Basis', '13', '', '14', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017'),
(18, '5', 'Daily Basis', '14', '', '', '20', '2017-12-23', 'gk', '11th', 'A', '  \nchapter 1', '12', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `transport_allocation`
--

CREATE TABLE `transport_allocation` (
  `t_allocation_id` int(11) NOT NULL,
  `rute_code` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `student_class` varchar(200) NOT NULL,
  `student_section` varchar(200) NOT NULL,
  `passenger_name` varchar(200) NOT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `start_date` varchar(200) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `pick_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_allocation`
--

INSERT INTO `transport_allocation` (`t_allocation_id`, `rute_code`, `destination`, `type`, `student_class`, `student_section`, `passenger_name`, `designation`, `start_date`, `end_date`, `pick_status`) VALUES
(1, '', 'assad', 'student', '11th', 'A', 'Ankit Kumar', 'select', '2018-02-26', '2018-02-28', 0),
(2, '', 'assad', 'student', '11th', 'A', 'navita airi', 'select', '2018-02-26', '2018-02-28', 0),
(3, '', 'assad', 'student', '11th', 'A', 'navita airi', 'select', '2018-02-26', '2018-02-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_detail`
--

CREATE TABLE `vehicle_detail` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_no` varchar(200) NOT NULL,
  `no_of_seat` varchar(200) NOT NULL,
  `maximum_allowed` varchar(200) NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `contact_person` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_detail`
--

INSERT INTO `vehicle_detail` (`vehicle_id`, `vehicle_no`, `no_of_seat`, `maximum_allowed`, `vehicle_type`, `contact_person`) VALUES
(1, '96321', '30', '29', 'contract', '9887766554');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbooks`
--
ALTER TABLE `addbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addrequest`
--
ALTER TABLE `addrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_category`
--
ALTER TABLE `add_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `add_class`
--
ALTER TABLE `add_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_designation`
--
ALTER TABLE `add_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `add_destination`
--
ALTER TABLE `add_destination`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `add_driver`
--
ALTER TABLE `add_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `add_event`
--
ALTER TABLE `add_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `add_leave`
--
ALTER TABLE `add_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `add_notice`
--
ALTER TABLE `add_notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `add_payhead`
--
ALTER TABLE `add_payhead`
  ADD PRIMARY KEY (`pay_head_id`);

--
-- Indexes for table `add_subject`
--
ALTER TABLE `add_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_auth`
--
ALTER TABLE `admin_auth`
  ADD PRIMARY KEY (`admin_auth`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `assign_sub_teacher`
--
ALTER TABLE `assign_sub_teacher`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `attandance_report`
--
ALTER TABLE `attandance_report`
  ADD PRIMARY KEY (`attand_id`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `books_return`
--
ALTER TABLE `books_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_time_table`
--
ALTER TABLE `class_time_table`
  ADD PRIMARY KEY (`time_table_id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`event_details_id`);

--
-- Indexes for table `event_name`
--
ALTER TABLE `event_name`
  ADD PRIMARY KEY (`event_name_id`);

--
-- Indexes for table `event_participation`
--
ALTER TABLE `event_participation`
  ADD PRIMARY KEY (`participation_id`);

--
-- Indexes for table `event_winner`
--
ALTER TABLE `event_winner`
  ADD PRIMARY KEY (`win_id`);

--
-- Indexes for table `exam_detail`
--
ALTER TABLE `exam_detail`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `fees_detail`
--
ALTER TABLE `fees_detail`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `gate_timing`
--
ALTER TABLE `gate_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_detail`
--
ALTER TABLE `leave_detail`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `lession_plan`
--
ALTER TABLE `lession_plan`
  ADD PRIMARY KEY (`lession_id`);

--
-- Indexes for table `librarycategory`
--
ALTER TABLE `librarycategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `parent_request`
--
ALTER TABLE `parent_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `parrent_detail`
--
ALTER TABLE `parrent_detail`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `permission_no`
--
ALTER TABLE `permission_no`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `pickup_drop`
--
ALTER TABLE `pickup_drop`
  ADD PRIMARY KEY (`pickup_drop_id`);

--
-- Indexes for table `programming_languages`
--
ALTER TABLE `programming_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_assign`
--
ALTER TABLE `role_assign`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `rute_detail`
--
ALTER TABLE `rute_detail`
  ADD PRIMARY KEY (`rute_id`);

--
-- Indexes for table `school_profile`
--
ALTER TABLE `school_profile`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stf_id`);

--
-- Indexes for table `staff_attandance_report`
--
ALTER TABLE `staff_attandance_report`
  ADD PRIMARY KEY (`attand_id`);

--
-- Indexes for table `staff_sailary_detail`
--
ALTER TABLE `staff_sailary_detail`
  ADD PRIMARY KEY (`sailary_id`);

--
-- Indexes for table `staff_salary_paid`
--
ALTER TABLE `staff_salary_paid`
  ADD PRIMARY KEY (`paid_id`);

--
-- Indexes for table `staff_salary_set`
--
ALTER TABLE `staff_salary_set`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `student_fees_detail`
--
ALTER TABLE `student_fees_detail`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `student_leave`
--
ALTER TABLE `student_leave`
  ADD PRIMARY KEY (`student_leave_id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `student_performance`
--
ALTER TABLE `student_performance`
  ADD PRIMARY KEY (`perf_id`);

--
-- Indexes for table `teacher_leave`
--
ALTER TABLE `teacher_leave`
  ADD PRIMARY KEY (`teacher_leave_id`);

--
-- Indexes for table `test_detail`
--
ALTER TABLE `test_detail`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_marks`
--
ALTER TABLE `test_marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `transport_allocation`
--
ALTER TABLE `transport_allocation`
  ADD PRIMARY KEY (`t_allocation_id`);

--
-- Indexes for table `vehicle_detail`
--
ALTER TABLE `vehicle_detail`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbooks`
--
ALTER TABLE `addbooks`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `addrequest`
--
ALTER TABLE `addrequest`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `add_category`
--
ALTER TABLE `add_category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_class`
--
ALTER TABLE `add_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `add_designation`
--
ALTER TABLE `add_designation`
  MODIFY `designation_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `add_destination`
--
ALTER TABLE `add_destination`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_driver`
--
ALTER TABLE `add_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_event`
--
ALTER TABLE `add_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_leave`
--
ALTER TABLE `add_leave`
  MODIFY `leave_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `add_notice`
--
ALTER TABLE `add_notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `add_payhead`
--
ALTER TABLE `add_payhead`
  MODIFY `pay_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_subject`
--
ALTER TABLE `add_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_auth`
--
ALTER TABLE `admin_auth`
  MODIFY `admin_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assign_sub_teacher`
--
ALTER TABLE `assign_sub_teacher`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attandance_report`
--
ALTER TABLE `attandance_report`
  MODIFY `attand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books_return`
--
ALTER TABLE `books_return`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_time_table`
--
ALTER TABLE `class_time_table`
  MODIFY `time_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `event_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_name`
--
ALTER TABLE `event_name`
  MODIFY `event_name_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_participation`
--
ALTER TABLE `event_participation`
  MODIFY `participation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `event_winner`
--
ALTER TABLE `event_winner`
  MODIFY `win_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `exam_detail`
--
ALTER TABLE `exam_detail`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fees_detail`
--
ALTER TABLE `fees_detail`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gate_timing`
--
ALTER TABLE `gate_timing`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leave_detail`
--
ALTER TABLE `leave_detail`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lession_plan`
--
ALTER TABLE `lession_plan`
  MODIFY `lession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `librarycategory`
--
ALTER TABLE `librarycategory`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messenger`
--
ALTER TABLE `messenger`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent_request`
--
ALTER TABLE `parent_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parrent_detail`
--
ALTER TABLE `parrent_detail`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permission_no`
--
ALTER TABLE `permission_no`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_drop`
--
ALTER TABLE `pickup_drop`
  MODIFY `pickup_drop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programming_languages`
--
ALTER TABLE `programming_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role_assign`
--
ALTER TABLE `role_assign`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rute_detail`
--
ALTER TABLE `rute_detail`
  MODIFY `rute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_profile`
--
ALTER TABLE `school_profile`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_attandance_report`
--
ALTER TABLE `staff_attandance_report`
  MODIFY `attand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_sailary_detail`
--
ALTER TABLE `staff_sailary_detail`
  MODIFY `sailary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_salary_paid`
--
ALTER TABLE `staff_salary_paid`
  MODIFY `paid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_salary_set`
--
ALTER TABLE `staff_salary_set`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_feedback`
--
ALTER TABLE `student_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_fees_detail`
--
ALTER TABLE `student_fees_detail`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_leave`
--
ALTER TABLE `student_leave`
  MODIFY `student_leave_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `student_performance`
--
ALTER TABLE `student_performance`
  MODIFY `perf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_leave`
--
ALTER TABLE `teacher_leave`
  MODIFY `teacher_leave_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_detail`
--
ALTER TABLE `test_detail`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test_marks`
--
ALTER TABLE `test_marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transport_allocation`
--
ALTER TABLE `transport_allocation`
  MODIFY `t_allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_detail`
--
ALTER TABLE `vehicle_detail`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
