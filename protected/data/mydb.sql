-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2014 at 07:48 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bizrule` text COLLATE utf8mb4_unicode_ci,
  `data` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `bizrule` text COLLATE utf8mb4_unicode_ci,
  `data` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('masterEtah', 2, 'Master for district for assigning users to designations', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `code` varchar(8) CHARACTER SET utf8 NOT NULL,
  `district_code` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `code_idx` (`district_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`code`, `district_code`, `name_en`, `name_hi`) VALUES
('3122014', '970', 'Jaithara', 'जैथरा');

-- --------------------------------------------------------

--
-- Table structure for table `citizen_rural`
--

CREATE TABLE IF NOT EXISTS `citizen_rural` (
  `id` int(11) NOT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `father_name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `spouse_name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `father_name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `spouse_name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `revenue_village_code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `code_idx` (`revenue_village_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_code` varchar(2) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_department_state1_idx` (`state_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name_hi`, `code`, `name_en`, `state_code`) VALUES
(1, 'बेसिक शिक्षा विभाग', 'basic', 'Basic Education Department', '09');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_type_id` int(11) NOT NULL,
  `level_type_id` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`designation_type_id`,`level_type_id`),
  KEY `fk_designation_designation_type1_idx` (`designation_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_type_id`, `level_type_id`, `remarks`) VALUES
(1, 1, '970', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation_type`
--

CREATE TABLE IF NOT EXISTS `designation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_hi` varchar(45) CHARACTER SET utf8 NOT NULL,
  `code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `department_id` int(11) NOT NULL,
  `name_en` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_designation_department_idx` (`department_id`),
  KEY `fk_designation_type_level1_idx` (`level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='<double-click to overwrite multiple objects>' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `designation_type`
--

INSERT INTO `designation_type` (`id`, `name_hi`, `code`, `department_id`, `name_en`, `level_id`) VALUES
(1, 'बेसिक शिक्षा अधिकारी ', 'BSA', 1, 'Basic Shiksha Adhikari', 1),
(2, 'सहायक बेसिक शिक्षा अधिकारी', 'ABSA', 1, 'Assistant Basic Shiksha Adhikari', 2);

-- --------------------------------------------------------

--
-- Table structure for table `designation_user`
--

CREATE TABLE IF NOT EXISTS `designation_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_time` varchar(45) DEFAULT NULL,
  `update_time` varchar(45) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_designation_user_designation1_idx` (`designation_id`),
  KEY `fk_designation_user_users_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `designation_user`
--

INSERT INTO `designation_user` (`id`, `designation_id`, `user_id`, `create_time`, `update_time`, `create_user`) VALUES
(1, 1, 3, '1406179103', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `state_code` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(5) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `code_idx` (`state_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`state_code`, `code`, `name_en`, `name_hi`) VALUES
('09', '970', 'ETAH', 'एटा');

-- --------------------------------------------------------

--
-- Table structure for table `importinfo`
--

CREATE TABLE IF NOT EXISTS `importinfo` (
  `id` int(11) NOT NULL,
  `filename` text,
  `filesize` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `filedump` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE IF NOT EXISTS `imports` (
  `id` int(11) NOT NULL,
  `import_code` varchar(45) DEFAULT NULL,
  `model_name` varchar(45) DEFAULT NULL,
  `model_data` text,
  `validated` varchar(45) DEFAULT NULL,
  `imported` varchar(45) DEFAULT NULL,
  `fkdata` text,
  `importInfo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Imports_importInfo1_idx` (`importInfo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `learning_level`
--

CREATE TABLE IF NOT EXISTS `learning_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `skill_level_id` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `creation_user` varchar(45) DEFAULT NULL,
  `creation_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Learning_Level_student1_idx` (`student_id`),
  KEY `fk_Learning_Level_skill_level1_idx` (`skill_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `learning_level`
--

INSERT INTO `learning_level` (`id`, `value`, `student_id`, `skill_level_id`, `month`, `year`, `creation_user`, `creation_time`) VALUES
(1, '13', 1, 3, 7, 2014, '1', '1406034609'),
(4, '12', 1, 2, 7, 2014, '1', '1406034609'),
(5, '11', 1, 1, 7, 2014, '1', '1406034609'),
(6, '13', 1, 3, 8, 2014, '1', '1406034899'),
(7, '12', 1, 2, 8, 2014, '1', '1406034887'),
(8, '12', 1, 1, 8, 2014, '1', '1406034832'),
(9, '11', 1, 3, 6, 2014, '1', '1406035006'),
(10, '2', 1, 1, 4, 2014, '1', '1406035303'),
(11, '3', 1, 2, 4, 2014, '1', '1406035303'),
(12, '4', 1, 3, 4, 2014, '1', '1406035304');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name_hi`, `name_en`, `table_name`) VALUES
(1, 'जिला ', 'District', 'district'),
(2, 'खंड ', 'Block', 'block'),
(3, 'विद्यालय ', 'School', 'school');

-- --------------------------------------------------------

--
-- Table structure for table `panchayat`
--

CREATE TABLE IF NOT EXISTS `panchayat` (
  `code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `block_code` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `code_idx` (`block_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panchayat`
--

INSERT INTO `panchayat` (`code`, `block_code`, `name_en`, `name_hi`) VALUES
('3122014001', '3122014', 'AHMADPUR', 'अहमदपुर  ');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Demo', 'Demo'),
(3, 'Kumar', 'Randhir');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'Email', 'Email', 'VARCHAR', '255', '0', 3, '', '', '', '', '', '', '', 3, 2),
(4, 'mobileno', 'Mobile No', 'VARCHAR', '13', '10', 3, '', '', '', '', '', '', '', 0, 2),
(5, 'photo', 'Photograph', 'VARCHAR', '255', '0', 0, '', '', '', '', '', 'UWfile', '', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `revenue_village`
--

CREATE TABLE IF NOT EXISTS `revenue_village` (
  `code` varchar(15) CHARACTER SET utf8 NOT NULL,
  `tehsil_code` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `panchayat_code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `census_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `code_idx` (`tehsil_code`),
  KEY `code_idx1` (`panchayat_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenue_village`
--

INSERT INTO `revenue_village` (`code`, `tehsil_code`, `name_en`, `name_hi`, `panchayat_code`, `census_code`) VALUES
('22050100012', '220400', 'Ahmadpur Kalan', 'अहमदपुर कलॉ', '3122014001', '214338');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `rural_urban` varchar(1) CHARACTER SET utf8 DEFAULT 'r',
  `location_type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dise_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name_en`, `name_hi`, `rural_urban`, `location_type`, `location_code`, `dise_code`) VALUES
(1, 'Primary School, Ahmadpur', 'प्राथमिक विद्यालय , अहमदपुर', 'r', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_level`
--

CREATE TABLE IF NOT EXISTS `skill_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `unit_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `unit_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `subject_code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `required_value` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id_idx` (`category_id`),
  KEY `fk_subject_code_skill_level_idx` (`subject_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `skill_level`
--

INSERT INTO `skill_level` (`id`, `category_id`, `name_hi`, `name_en`, `unit_hi`, `unit_en`, `level`, `subject_code`, `required_value`) VALUES
(1, 1, 'वर्णमाला', 'Alphabet', 'प्रतिशत', 'Percentage', 0, '01', NULL),
(2, 2, 'जानवरों के नाम', 'Names of Animals', 'Number', 'Number', 3, '01', NULL),
(3, 3, 'Alphabet', 'Alphabet', '%', 'percentage', 0, '02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_level_category`
--

CREATE TABLE IF NOT EXISTS `skill_level_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `subject_code` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_code_idx` (`subject_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `skill_level_category`
--

INSERT INTO `skill_level_category` (`id`, `name_hi`, `name_en`, `subject_code`) VALUES
(1, 'प्राथमिक ज्ञान', 'Primary Knowledge', '01'),
(2, 'शब्द ज्ञान', 'Vocabulary', '01'),
(3, 'प्राथमिक ज्ञान', 'Primary Knowledge', '02');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `code` varchar(2) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`code`, `name_en`, `name_hi`) VALUES
('09', 'Uttar Pradesh', 'उत्तर प्रदेश');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `class` tinyint(4) DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `photo` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `rollno` int(11) DEFAULT NULL,
  `section` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathersname_hi` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathersname_en` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothersname_hi` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothersname_en` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_school_student_idx` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `school_id`, `class`, `name_hi`, `name_en`, `date_of_birth`, `age`, `photo`, `rollno`, `section`, `fathersname_hi`, `fathersname_en`, `mothersname_hi`, `mothersname_en`) VALUES
(1, 1, 1, 'रणवीर प्रसाद', 'Ranvir Prasad', '2009-08-15', 5, '', 1, 'A', NULL, NULL, NULL, NULL),
(2, 1, 1, 'राजेश कुमार', 'Rajesh Kumar', '2008-05-01', 6, '', NULL, 'A', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `code` varchar(2) CHARACTER SET utf8 NOT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `name_hi`, `name_en`) VALUES
('01', 'हिंदी', 'Hindi'),
('02', 'अंग्रेजी', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `tagmap`
--

CREATE TABLE IF NOT EXISTS `tagmap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `object_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tag_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tag_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tags_tag_category1_idx` (`tag_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag_category`
--

CREATE TABLE IF NOT EXISTS `tag_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `category_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tehsil`
--

CREATE TABLE IF NOT EXISTS `tehsil` (
  `code` varchar(6) CHARACTER SET utf8 NOT NULL,
  `district_code` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `up_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `code_idx` (`district_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tehsil`
--

INSERT INTO `tehsil` (`code`, `district_code`, `name_en`, `name_hi`, `up_code`) VALUES
('220400', '970', 'Etah', 'एटा', NULL),
('220500', '970', 'Aliganj', 'अलीगंज', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `code` varchar(6) CHARACTER SET utf8 NOT NULL,
  `type` enum('corporation','town_panchayat','municipality') CHARACTER SET utf8 DEFAULT NULL,
  `district_code` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `districtcodetown_idx` (`district_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `code` varchar(40) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `created_user` varchar(45) DEFAULT NULL,
  `created_time` varchar(45) DEFAULT NULL,
  `view_rights` varchar(45) DEFAULT NULL,
  `delete_rights` varchar(45) DEFAULT NULL,
  `update_rights` varchar(45) DEFAULT NULL,
  `mime_type` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2014-07-13 10:33:20', '2014-07-25 05:35:58', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2014-07-13 10:33:20', '0000-00-00 00:00:00', 0, 1),
(3, 'rkumar', '1d36782b8c8cdf0b8bc8ba875642f4d8', 'r@r.com', '9a7819bd20973f016d2d5b1fc5d3bd56', '2014-07-23 03:13:23', '2014-07-23 04:05:56', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE IF NOT EXISTS `ward` (
  `code` varchar(6) CHARACTER SET utf8 NOT NULL,
  `town_code` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `wardtowncode_idx` (`town_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `districtcode1` FOREIGN KEY (`district_code`) REFERENCES `district` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `citizen_rural`
--
ALTER TABLE `citizen_rural`
  ADD CONSTRAINT `citizenruralvillagecode` FOREIGN KEY (`revenue_village_code`) REFERENCES `revenue_village` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_department_state1` FOREIGN KEY (`state_code`) REFERENCES `state` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `designation`
--
ALTER TABLE `designation`
  ADD CONSTRAINT `fk_designation_designation_type1` FOREIGN KEY (`designation_type_id`) REFERENCES `designation_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `designation_type`
--
ALTER TABLE `designation_type`
  ADD CONSTRAINT `fk_designation_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_designation_type_level1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `designation_user`
--
ALTER TABLE `designation_user`
  ADD CONSTRAINT `fk_designation_user_designation1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_designation_user_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `statecode` FOREIGN KEY (`state_code`) REFERENCES `state` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `fk_Imports_importInfo1` FOREIGN KEY (`importInfo_id`) REFERENCES `importinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `learning_level`
--
ALTER TABLE `learning_level`
  ADD CONSTRAINT `fk_Learning_Level_skill_level1` FOREIGN KEY (`skill_level_id`) REFERENCES `skill_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Learning_Level_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panchayat`
--
ALTER TABLE `panchayat`
  ADD CONSTRAINT `blockcode` FOREIGN KEY (`block_code`) REFERENCES `block` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `revenue_village`
--
ALTER TABLE `revenue_village`
  ADD CONSTRAINT `panchayatcode` FOREIGN KEY (`panchayat_code`) REFERENCES `panchayat` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tehsilcode` FOREIGN KEY (`tehsil_code`) REFERENCES `tehsil` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill_level`
--
ALTER TABLE `skill_level`
  ADD CONSTRAINT `fk_category_id_skill_level` FOREIGN KEY (`category_id`) REFERENCES `skill_level_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subject_code_skill_level` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `skill_level_category`
--
ALTER TABLE `skill_level_category`
  ADD CONSTRAINT `fk_subject_code` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_school_student` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fk_tags_tag_category1` FOREIGN KEY (`tag_category_id`) REFERENCES `tag_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tehsil`
--
ALTER TABLE `tehsil`
  ADD CONSTRAINT `code` FOREIGN KEY (`district_code`) REFERENCES `district` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `districtcodetown` FOREIGN KEY (`district_code`) REFERENCES `district` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `wardtowncode` FOREIGN KEY (`town_code`) REFERENCES `town` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
