-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 10:28 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('absa', '9', NULL, 'N;'),
('Admin', '1', NULL, 'N;'),
('Base Data Manager', '3', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('absa', 2, 'Asst. BSA', NULL, 'N;'),
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Base Data Manager', 2, 'Base Data Manager', NULL, 'N;'),
('Basedata.Block.Create', 0, NULL, NULL, 'N;'),
('basedeo', 2, 'Base Data Entry Operator', NULL, 'N;'),
('brc', 2, 'BRC', NULL, 'N;'),
('bsa', 2, 'Basic Shiksha Adhikari', NULL, 'N;'),
('deoBlock', 2, 'Block Data Entry Operator', 'return Utility::getBlock(Yii::app()->user->id)==$params[''block''];', 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('masterEtah', 2, 'Master for district for assigning users to designations', NULL, 'N;'),
('teacher', 2, 'teacher', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('bsa', 'absa'),
('absa', 'brc'),
('bsa', 'brc'),
('brc', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `code` varchar(8) CHARACTER SET utf8 NOT NULL,
  `district_code` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`code`, `district_code`, `name_en`, `name_hi`) VALUES
('3122014', '970', 'Jaithara', 'जैथरा'),
('3245252', '970', 'Marehara', 'मारहरा');

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
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile1` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `mobile2` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`id` int(11) NOT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_code` varchar(2) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name_hi`, `code`, `name_en`, `state_code`) VALUES
(1, 'बेसिक शिक्षा विभाग', 'basic', 'Basic Education Department', '09'),
(2, 'लोक निर्माण विभाग ', 'pwd', 'Public Works Department', '09');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
`id` int(11) NOT NULL,
  `designation_type_id` int(11) NOT NULL,
  `level_type_id` int(11) NOT NULL,
  `district_code` varchar(5) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_type_id`, `level_type_id`, `district_code`) VALUES
(1, 1, 970, '970'),
(3, 3, 970, '970'),
(5, 2, 3122014, '970'),
(7, 4, 3122014, '970');

-- --------------------------------------------------------

--
-- Table structure for table `designation_type`
--

CREATE TABLE IF NOT EXISTS `designation_type` (
`id` int(11) NOT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 NOT NULL,
  `code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `department_id` int(11) NOT NULL,
  `name_en` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='<double-click to overwrite multiple objects>' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `designation_type`
--

INSERT INTO `designation_type` (`id`, `name_hi`, `code`, `department_id`, `name_en`, `level_id`) VALUES
(1, 'बेसिक शिक्षा अधिकारी ', 'BSA', 1, 'Basic Shiksha Adhikari', 1),
(2, 'सहायक बेसिक शिक्षा अधिकारी', 'ABSA', 1, 'Assistant Basic Shiksha Adhikari', 2),
(3, 'डेटा एंट्री ऑपरेटर -जिला स्तर-1 ', 'dist-dataOperator', 1, 'Data Entry Operator- District Level-1', 1),
(4, 'डेटा एंट्री ऑपरेटर-ब्लॉक ', 'deoBlock-1', 1, 'Data Entry Operator- Block Level-1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `designation_user`
--

CREATE TABLE IF NOT EXISTS `designation_user` (
`id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_time` varchar(45) DEFAULT NULL,
  `update_time` varchar(45) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `designation_user`
--

INSERT INTO `designation_user` (`id`, `designation_id`, `user_id`, `create_time`, `update_time`, `create_user`) VALUES
(3, 1, 3, NULL, NULL, NULL),
(4, 3, 3, '1408359330', NULL, 1),
(5, 7, 4, '1408360942', NULL, 1),
(6, 3, 3, '1408901721', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `state_code` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `code` varchar(5) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`state_code`, `code`, `name_en`, `name_hi`) VALUES
('09', '970', 'ETAH', 'एटा');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `path` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `deleteAccess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updateAccess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `viewAccess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `originalname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objecttype` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'object to which files are attached',
  `objectid` int(11) NOT NULL DEFAULT '0' COMMENT 'id of the object to which attached',
  `uploadedby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fieldname` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `title`, `desc`, `mimetype`, `size`, `path`, `deleteAccess`, `updateAccess`, `viewAccess`, `originalname`, `md5`, `objecttype`, `objectid`, `uploadedby`, `fieldname`) VALUES
(1, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(2, 'test1.xls', '', 'application/vnd.ms-excel', 18944, 'application.data.files', '', '', '', 'test1.xls', '1bfa1223cd4fa9b3ee3fd1c562d2f5e5', '', 0, '', ''),
(3, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(4, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(5, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(6, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(7, 'LICENSE', '', 'text/plain', 1626, 'application.data.files', '', '', '', 'LICENSE', 'fe6316d29b7ddc7620263074835d28f2', '', 0, '', ''),
(8, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(9, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(10, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(11, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(12, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(13, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(14, 'Chennai-Jhansi.pdf', '', 'application/pdf', 77636, 'application.data.files', '', '', '', 'Chennai-Jhansi.pdf', '1c633b1d86524b213a6690c1615509b7', '', 0, '', ''),
(15, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(16, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(17, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(18, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(19, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(20, 'test1.xls', '', 'application/vnd.ms-excel', 18944, 'application.data.files', '', '', '', 'test1.xls', '1bfa1223cd4fa9b3ee3fd1c562d2f5e5', '', 0, '', ''),
(21, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(22, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(23, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(24, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(25, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(26, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(27, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(28, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(29, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(30, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(31, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(32, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(33, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(34, 'Book1.xlsx', '', 'application/zip', 7906, 'application.data.files', '', '', '', 'Book1.xlsx', 'e24937b5b533177baa0ee913eeb122d8', '', 0, '', ''),
(35, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(36, 'user1_test1.xml', '', 'application/xml', 415, 'application.data.files', '', '', '', 'user1_test1.xml', 'fa5aa0bcbe86602922c89996a798e0b8', '', 0, '', ''),
(37, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(38, '_test_test1.xml', '', 'application/xml', 491, 'application.data.files', '', '', '', '_test_test1.xml', '09553ba87ba3de3329b47019ce236feb', '', 0, '', ''),
(39, 'AHL-Image-ChargeStatus.xls', '', 'application/vnd.ms-excel', 38400, 'application.data.files', '', '', '', 'AHL-Image- Charge Status.xls', '96d895c1754bcd6f4b8f30b6413c5acc', '', 0, '', ''),
(40, '', '', '', 1428, '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '', ''),
(41, '', '', '', 68, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '', ''),
(42, '', '', '', 102, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '', ''),
(43, '', '', '', 136, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '', ''),
(44, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(45, '100_0178.JPG', '', 'image/jpeg', 364322, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0178.JPG', '3889da4c7d7cfa5b362218d07877d4b9', '', 0, '', ''),
(46, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(47, '100_0178.JPG', '', 'image/jpeg', 364322, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0178.JPG', '3889da4c7d7cfa5b362218d07877d4b9', '', 0, '', ''),
(48, 'DSC00026.JPG', '', 'image/jpeg', 139408, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00026.JPG', '7a29f55217b486e815c5e26cfe25fc23', '', 0, '', ''),
(49, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(50, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(51, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(52, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(53, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(54, 'DSC00026.JPG', '', 'image/jpeg', 139408, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00026.JPG', '7a29f55217b486e815c5e26cfe25fc23', '', 0, '', ''),
(55, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(56, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(57, 'DSC00026.JPG', '', 'image/jpeg', 139408, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00026.JPG', '7a29f55217b486e815c5e26cfe25fc23', '', 0, '', ''),
(58, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(59, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(60, 'DSC00026.JPG', '', 'image/jpeg', 139408, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00026.JPG', '7a29f55217b486e815c5e26cfe25fc23', '', 0, '', ''),
(61, 'DSC00026.JPG', '', 'image/jpeg', 139408, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00026.JPG', '7a29f55217b486e815c5e26cfe25fc23', '', 0, '', ''),
(62, 'DSC00026.JPG', '', 'image/jpeg', 139408, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00026.JPG', '7a29f55217b486e815c5e26cfe25fc23', '', 0, '', ''),
(63, '100_0077.JPG', '', 'image/jpeg', 276640, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0077.JPG', '15e8ceeb8bdb1b36c9465c981c40cd74', '', 0, '', ''),
(64, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(65, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(66, '100_0077.JPG', '', 'image/jpeg', 276640, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0077.JPG', '15e8ceeb8bdb1b36c9465c981c40cd74', '', 0, '', ''),
(67, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(68, '100_0150.JPG', '', 'image/jpeg', 282038, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '3dddf113145a7e56726b2976520935da', '', 0, '', ''),
(69, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(70, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(71, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(72, '100_0178.JPG', '', 'image/jpeg', 364322, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0178.JPG', '3889da4c7d7cfa5b362218d07877d4b9', '', 0, '', ''),
(73, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(74, '100_0178.JPG', '', 'image/jpeg', 364322, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0178.JPG', '3889da4c7d7cfa5b362218d07877d4b9', '', 0, '', ''),
(75, '100_0178.JPG', '', 'image/jpeg', 364322, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0178.JPG', '3889da4c7d7cfa5b362218d07877d4b9', '', 0, '', ''),
(76, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(77, 'chin.JPG', '', 'image/jpeg', 397693, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'chin.JPG', 'd4c7be6279dfc413c1207b179064a890', '', 0, '', ''),
(78, '100_0077.JPG', '', 'image/jpeg', 276640, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0077.JPG', '15e8ceeb8bdb1b36c9465c981c40cd74', '', 0, '', ''),
(79, 'DSC00026.JPG', '', 'image/jpeg', 139408, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00026.JPG', '7a29f55217b486e815c5e26cfe25fc23', '', 0, '', ''),
(80, '100_0150.JPG', '', 'image/jpeg', 398115, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0150.JPG', '74c79d780620c64894dd243dec7dd666', '', 0, '', ''),
(81, '100_0178.JPG', '', 'image/jpeg', 496364, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', '100_0178.JPG', '6feee02eb86b0b5f12c50b2fbb2a6288', '', 0, '', ''),
(82, 'DSC00859.JPG', '', 'image/jpeg', 250712, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00859.JPG', 'be3489a0c9b58a65648a1f71660673a5', '', 0, '', ''),
(83, 'DSC00855.JPG', '', 'image/jpeg', 350241, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00855.JPG', '5a7ddb726c364c5717079c9892db15c9', '', 0, '', ''),
(84, 'DSC00866.JPG', '', 'image/jpeg', 633738, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00866.JPG', 'a84fb5d9147e72578520f065f2cb9dda', '', 0, '', ''),
(85, 'DSC00860.JPG', '', 'image/jpeg', 256885, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00860.JPG', 'b7eada67f64578d283e7ef3e8811309e', '', 0, '', ''),
(86, 'DSC00860.JPG', '', 'image/jpeg', 256885, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00860.JPG', 'b7eada67f64578d283e7ef3e8811309e', '', 0, '', ''),
(87, 'DSC00858.JPG', '', 'image/jpeg', 301374, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00858.JPG', '1817cff56d70381268ee3623c789cfe9', '', 0, '', ''),
(88, 'DSC00856.JPG', '', 'image/jpeg', 321398, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00856.JPG', 'f704ac5529da5a71d3826839c6a34b73', '', 0, '', ''),
(89, 'DSC00857.JPG', '', 'image/jpeg', 734472, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00857.JPG', '79908e354cba6015487d3b12c994cdc1', '', 0, '', ''),
(90, 'DSC00861.JPG', '', 'image/jpeg', 296969, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00861.JPG', '720f8d9785839ac7a6853e2c9852228f', '', 0, '', ''),
(91, 'DSC00031.JPG', '', 'image/jpeg', 535425, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00031.JPG', '07c7cbd146a7f4adda8b0500c3f2f8d2', '', 0, '', ''),
(92, 'DSC00032.JPG', '', 'image/jpeg', 571843, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00032.JPG', '43eb64eec612e2f11f4338293b9e590e', '', 0, '', ''),
(93, 'DSC00051.JPG', '', 'image/jpeg', 505498, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00051.JPG', '12c323f2d11a506e83474cca4ce9b930', '', 0, '', ''),
(94, 'DSC00028.JPG', '', 'image/jpeg', 496655, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00028.JPG', '399bccd2a311e1d417e5fb05ec98b5bf', '', 0, '', ''),
(95, 'DSC00032.JPG', '', 'image/jpeg', 571843, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00032.JPG', '43eb64eec612e2f11f4338293b9e590e', '', 0, '', ''),
(96, 'DSC00044.JPG', '', 'image/jpeg', 404006, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00044.JPG', 'bd4551ea040cb83e684a93fd545be3a9', 'filesUploadBehaviour', 0, '1', 'attachments'),
(97, 'DSC00034.JPG', '', 'image/jpeg', 389939, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00034.JPG', '0c77f6cb56aba705e2df8e7348defb91', 'filesUploadBehaviour', 0, '1', 'attachments'),
(98, 'DSC00031.JPG', '', 'image/jpeg', 535425, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00031.JPG', '07c7cbd146a7f4adda8b0500c3f2f8d2', '', 0, '', ''),
(99, 'DSC00032.JPG', '', 'image/jpeg', 571843, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00032.JPG', '43eb64eec612e2f11f4338293b9e590e', 'stdClass', 0, '1', 'attachments'),
(100, 'DSC00036.JPG', '', 'image/jpeg', 509864, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00036.JPG', '8f633f1b71c3e4f4077b4a3fe8175c1b', 'Issues', 43, '1', 'attachments'),
(101, 'DSC00035.JPG', '', 'image/jpeg', 340326, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00035.JPG', '6f67a2c7bd7f8e855b2458e3075b2dd0', '', 0, '', ''),
(102, 'DSC00034.JPG', '', 'image/jpeg', 389939, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00034.JPG', '0c77f6cb56aba705e2df8e7348defb91', 'Issues', 44, '1', 'attachments'),
(103, 'DSC00028.JPG', '', 'image/jpeg', 496655, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00028.JPG', '399bccd2a311e1d417e5fb05ec98b5bf', '', 0, '', ''),
(104, 'DSC00032.JPG', 'Array\n(\n    [Issues] => Array\n        (\n            [schemeid] => 1\n            [from] => 5\n            [to] => 5\n            [description] => hi what are we doing\n        )\n\n    [Issues_from_dist_code] => 970\n    [Issues_from_deptDropDown] => 1\n    [Issues_from_designation_type_id] => 2\n    [Issues_to_dist_code] => 970\n    [Issues_to_deptDropDown] => 1\n    [Issues_to_designation_type_id] => 2\n    [fileid] => Array\n        (\n            [attachments] => Array\n                (\n                    [0] => 104\n                    [1] => 105\n                )\n\n        )\n\n    [yt0] => Create\n)\n', 'image/jpeg', 571843, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00032.JPG', '43eb64eec612e2f11f4338293b9e590e', 'Issues', 45, '1', 'attachments'),
(105, 'DSC00035.JPG', '', 'image/jpeg', 340326, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00035.JPG', '6f67a2c7bd7f8e855b2458e3075b2dd0', '', 0, '', ''),
(106, 'DSC00042.JPG', '', 'image/jpeg', 665966, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00042.JPG', '2acec4fb6f9aceb662294cd33c679947', '', 0, '', ''),
(107, 'DSC00050.JPG', '', 'image/jpeg', 562932, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00050.JPG', '9b4a27c73a13a967bd850150005cba4a', '', 0, '', ''),
(108, 'DSC00061.JPG', '', 'image/jpeg', 605994, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00061.JPG', 'f1acc5ba24231919fd19d5ba495b0754', '', 0, '', ''),
(109, 'DSC00061.JPG', '', 'image/jpeg', 605994, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00061.JPG', 'f1acc5ba24231919fd19d5ba495b0754', '', 0, '', ''),
(110, 'DSC00254.JPG', '', 'image/jpeg', 604322, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00254.JPG', 'b907420587c40fdc85fd5c034a06c13b', '', 0, '', ''),
(111, 'DSC00082.JPG', '', 'image/jpeg', 357958, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00082.JPG', '114dc3d3e3b610fb8118953656503178', '', 0, '', ''),
(112, 'DSC00067.JPG', '', 'image/jpeg', 606815, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00067.JPG', 'a50fea15ccc73fcbfa19c61e3a329188', 'Issues', 47, '1', 'attachments'),
(113, 'DSC00047.JPG', '', 'image/jpeg', 517821, '/Applications/XAMPP/xamppfiles/htdocs/yii1/protected/data/files', '', '', '', 'DSC00047.JPG', 'd32f83b4f0acc8473555e5ed90e6245c', 'Issues', 47, '1', 'attachments'),
(114, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(115, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(116, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(117, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(118, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(119, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(120, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(121, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(122, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', ''),
(123, 'images.jpg', '', '', 3665, 'D:\\xampp\\htdocs\\yii1\\protected\\data\\files', '', '', '', 'images.jpg', '8c40834f494b70f2facdb083e08e7c3e', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `importinfo`
--

CREATE TABLE IF NOT EXISTS `importinfo` (
`id` int(11) NOT NULL,
  `filename` text COLLATE utf8_unicode_ci NOT NULL,
  `filesize` int(11) DEFAULT NULL,
  `correlation` text COLLATE utf8_unicode_ci,
  `modelName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `importinfo`
--

INSERT INTO `importinfo` (`id`, `filename`, `filesize`, `correlation`, `modelName`) VALUES
(1, 'choices.xlsx', NULL, NULL, 'School'),
(2, '', NULL, NULL, 'School'),
(3, '', NULL, NULL, 'school'),
(4, '', NULL, NULL, 'school'),
(5, 'uploads/Importinfo/5.xlsx', NULL, NULL, 'school');

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE IF NOT EXISTS `imports` (
  `id` int(11) NOT NULL,
  `import_code` varchar(45) DEFAULT NULL,
  `model_name` varchar(45) DEFAULT NULL,
  `model_data` varchar(45) DEFAULT NULL,
  `validated` varchar(45) DEFAULT NULL,
  `imported` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE IF NOT EXISTS `instructions` (
  `id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `instruction` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `attachments` blob NOT NULL,
  `parentinst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE IF NOT EXISTS `issues` (
`id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `parentissue` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `history` text COLLATE utf8_unicode_ci NOT NULL,
  `tagid` int(11) NOT NULL,
  `attachments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `author_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `update_time` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `schemeid`, `parentissue`, `from`, `to`, `title`, `description`, `status`, `history`, `tagid`, `attachments`, `create_time`, `author_id`, `update_time`, `district_id`) VALUES
(1, 1, 0, 1, 1, '', '', 0, '', 0, '', 0, '', 0, 0),
(3, 1, 0, 1, 1, '', '', 0, '', 0, '', 0, '', 0, 0),
(4, 1, 0, 1, 1, '', '', 0, '', 1, ',26', 0, '', 0, 0),
(5, 1, 0, 1, 0, '', '', 0, '', 1, '', 0, '', 0, 0),
(6, 1, 0, 1, 1, '', '', 0, '', 1, '', 0, '', 0, 0),
(7, 1, 0, 1, 1, '', '', 0, '', 1, '', 0, '', 0, 0),
(8, 1, 0, 1, 1, '', '', 0, '', 1, '', 0, '', 0, 0),
(9, 1, 0, 1, 1, '', '', 0, '', 1, '', 0, '', 0, 0),
(11, 1, 0, 1, 0, '', '', 0, '', 1, '', 0, '', 0, 0),
(12, 1, 0, 1, 1, '', '', 0, '', 1, '', 0, '', 0, 0),
(13, 1, 0, 1, 1, '', '', 0, '', 1, '', 0, '', 0, 0),
(14, 1, 0, 1, 1, '', '', 0, '', 1, ',27', 0, '', 0, 0),
(17, 1, 0, 1, 1, '', '', 0, '', 1, ',28', 0, '', 0, 0),
(18, 1, 0, 1, 1, '', '', 0, '', 1, ',28', 0, '', 0, 0),
(19, 1, 0, 1, 1, '', 'hjhjjjj ', 0, '', 1, '', 0, '', 0, 0),
(20, 1, 0, 1, 1, '', 'hjhjjjj ', 0, '', 1, '', 0, '', 0, 0),
(21, 1, 0, 1, 1, '', 'hjhjjjj ', 0, '', 1, '', 0, '', 0, 0),
(22, 1, 0, 1, 1, '', 'hi', 0, '', 1, '', 0, '', 0, 0),
(23, 1, 0, 1, 1, '', 'kdfjkdfkdkf', 0, '', 1, ',30', 0, '', 0, 0),
(24, 1, 0, 1, 1, '', 'hiii', 0, '', 1, ',31', 0, '', 0, 0),
(25, 1, 0, 1, 1, '', 'hiii', 0, '', 1, ',31,31', 0, '', 0, 0),
(26, 1, 0, 1, 1, '', 'hjhjjhj', 0, '', 1, ',32', 0, '', 0, 0),
(27, 1, 0, 1, 1, '', 'hihi', 0, '', 1, '', 0, '', 0, 0),
(28, 1, 0, 1, 1, '', 'hii', 0, '', 1, '', 0, '', 0, 0),
(29, 1, 0, 1, 1, '', 'hihihiih', 0, '', 1, '', 0, '', 0, 0),
(30, 1, 0, 1, 1, '', 'hihii', 0, '', 1, '', 0, '', 0, 0),
(31, 1, 0, 1, 1, '', 'hjjj', 0, '', 1, '', 0, '', 0, 0),
(32, 1, 0, 1, 1, '', 'hihcid', 0, '', 1, '', 0, '', 0, 0),
(33, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410892637, '1', 1410892637, 0),
(34, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410929858, '1', 1410929858, 0),
(35, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410952858, '1', 1410952858, 0),
(36, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410952969, '1', 1410952969, 0),
(37, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410953379, '1', 1410953379, 0),
(38, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410954742, '1', 1410954742, 0),
(39, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410954835, '1', 1410954835, 0),
(40, 1, 0, 5, 5, '', 'what is happening?', 0, '', 0, '', 1410955184, '1', 1410955184, 0),
(41, 1, 0, 5, 5, '', 'hihihi', 0, '', 0, '', 1410955565, '1', 1410955565, 0),
(42, 1, 0, 5, 5, '', 'where aer we going?', 0, '', 0, '', 1410956244, '1', 1410956244, 0),
(43, 1, 0, 5, 5, '', 'hi new entry...', 0, '', 0, 'Array', 1410958487, '1', 1410958487, 0),
(44, 1, 0, 5, 5, '', 'hi newest one ', 0, '', 0, 'Array\n(\n    [Issues] => Array\n        (\n            [schemeid] => 1\n            [from] => 5\n            [to] => 5\n            [description] => hi newest one \n        )\n\n    [Issues_from_dist_code] => 970\n    [Issues_from_deptDropDown] => 1\n    [Issues_fro', 1410958834, '1', 1410958834, 0),
(45, 1, 0, 5, 5, '', 'hi what are we doing', 0, '', 0, 'Array\n(\n    [Issues] => Array\n        (\n            [schemeid] => 1\n            [from] => 5\n            [to] => 5\n            [description] => hi what are we doing\n        )\n\n    [Issues_from_dist_code] => 970\n    [Issues_from_deptDropDown] => 1\n    [Issu', 1410959044, '1', 1410959044, 0),
(46, 1, 0, 5, 5, '', 'hi', 0, '', 0, '', 1410960190, '1', 1410960190, 0),
(47, 1, 0, 5, 5, '', 'hi hi ', 0, '', 0, '112,113', 1410960743, '1', 1410960743, 0);

-- --------------------------------------------------------

--
-- Table structure for table `landdisputes`
--

CREATE TABLE IF NOT EXISTS `landdisputes` (
`id` int(11) NOT NULL,
  `complainants` varchar(100) NOT NULL,
  `oppositions` varchar(100) NOT NULL,
  `revenuevillage` int(11) NOT NULL,
  `policestation` int(11) NOT NULL,
  `gatanos` varchar(220) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  `courtcasepending` tinyint(4) NOT NULL,
  `courtcasedetails` varchar(1000) NOT NULL,
  `policerequired` tinyint(4) NOT NULL,
  `nextdateofaction` varchar(200) NOT NULL,
  `disputependingfor` smallint(6) NOT NULL,
  `casteorcommunal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `learning_level`
--

CREATE TABLE IF NOT EXISTS `learning_level` (
`id` int(11) NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `skill_level_id` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `creation_user` varchar(45) DEFAULT NULL,
  `creation_time` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

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
`id` int(11) NOT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `table_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name_hi`, `name_en`, `table_name`) VALUES
(1, 'जिला ', 'District', 'district'),
(2, 'खंड ', 'Block', 'block'),
(3, 'विद्यालय ', 'School', 'school'),
(4, 'लोक निर्माण विभाग इकाइयां ', 'PWD Units', 'pwd_units');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `desc` int(11) NOT NULL,
  `dofmst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panchayat`
--

CREATE TABLE IF NOT EXISTS `panchayat` (
  `code` varchar(10) CHARACTER SET utf8 NOT NULL,
  `district_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `block_code` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `panchayat`
--

INSERT INTO `panchayat` (`code`, `district_code`, `block_code`, `name_en`, `name_hi`) VALUES
('3122014001', '970', '3122014', 'AHMADPUR', 'अहमदपुर  ');

-- --------------------------------------------------------

--
-- Table structure for table `policestation`
--

CREATE TABLE IF NOT EXISTS `policestation` (
`id` int(11) NOT NULL,
  `district_code` int(11) NOT NULL,
  `name_hi` varchar(250) NOT NULL,
  `name_en` varchar(250) NOT NULL,
  `circle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
`user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(13) NOT NULL DEFAULT '',
  `designation` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`, `mobile`, `designation`) VALUES
(1, 'Admin', 'Administrator', '', 0),
(2, 'Demo', 'Demo', '', 0),
(3, 'Kumar', 'Randhir', '', 0),
(4, 'Kumar', 'Akash', '9454417521', 0),
(5, 'What', 'Checking', '9876754098', 0),
(6, 'checking2', 'checking1', '9876543221', 0),
(9, 'hhrhr', 'hhee', '0900902093029', 5);

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
`id` int(10) NOT NULL,
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
  `visible` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(6, 'mobile', 'Mobile', 'VARCHAR', '13', '10', 1, '', '', '', '', '', '', '', 2, 2),
(7, 'designation', 'Designation', 'INTEGER', '10', '0', 0, '', '', '', '', '0', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pwd_unit`
--

CREATE TABLE IF NOT EXISTS `pwd_unit` (
  `code` varchar(10) NOT NULL,
  `district_code` varchar(10) NOT NULL,
  `name_hi` varchar(300) NOT NULL,
  `name_en` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choiceA` varchar(1000) NOT NULL,
  `choiceB` varchar(1000) NOT NULL,
  `choiceC` varchar(1000) NOT NULL,
  `choiceD` varchar(1000) NOT NULL,
  `answer` enum('A','B','C','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
`id` int(11) NOT NULL,
  `content_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `update_time` int(11) NOT NULL,
  `attachments` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `content_type`, `content_type_id`, `content`, `create_time`, `author_id`, `status`, `update_time`, `attachments`) VALUES
(1, 'issues', 8, 'What can be done?', 0, 0, 0, 0, ''),
(2, '', 26, 'hi we are so happy', 0, 0, 0, 0, ''),
(3, '', 26, 'We are not known outside this world.', 0, 0, 0, 0, ''),
(4, '', 26, 'hihihiihhhii', 0, 0, 0, 0, ',38'),
(5, '', 26, 'I am not happy', 0, 1, 0, 0, ',39'),
(6, '', 8, 'jhjhhkhk', 1368996317, 1, 0, 1368996317, '');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_village`
--

CREATE TABLE IF NOT EXISTS `revenue_village` (
  `code` varchar(15) CHARACTER SET utf8 NOT NULL,
  `district_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tehsil_code` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `panchayat_code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `census_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `revenue_village`
--

INSERT INTO `revenue_village` (`code`, `district_code`, `tehsil_code`, `name_en`, `name_hi`, `panchayat_code`, `census_code`) VALUES
('22050100012', '970', '220400', 'Ahmadpur Kalan', 'अहमदपुर कलॉ', '3122014001', '214338');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE IF NOT EXISTS `schemes` (
`id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `depid` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `parentid`, `name`, `depid`, `code`, `admin`) VALUES
(1, 0, 'Socio-Economic and Caste Census-2011', 1, 'SECC-2011', '3');

-- --------------------------------------------------------

--
-- Table structure for table `scheme_parameters`
--

CREATE TABLE IF NOT EXISTS `scheme_parameters` (
`id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `units` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shortcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
`id` int(11) NOT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `rural_urban` varchar(1) CHARACTER SET utf8 DEFAULT 'r',
  `location_type` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dise_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `district_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `block_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name_en`, `name_hi`, `rural_urban`, `location_type`, `location_code`, `dise_code`, `location_name`, `district_code`, `block_code`) VALUES
(1, 'Primary School, Ahmadpur', 'प्राथमिक विद्यालय , अहमदपुर', 'r', NULL, NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_enrollment`
--

CREATE TABLE IF NOT EXISTS `school_enrollment` (
`id` int(11) NOT NULL,
  `school_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `school_enrollment`
--

INSERT INTO `school_enrollment` (`id`, `school_code`, `class`, `male`, `female`, `total`, `created_time`, `created_user`) VALUES
(1, '1', 1, 23, 22, 45, 1406664932, 1),
(2, '1', 1, 12, 12, 24, 1406665177, 1),
(3, '1', 2, 12, 12, 24, 1406665177, 1),
(4, '1', 1, 11, 12, 23, 1406666757, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill_level`
--

CREATE TABLE IF NOT EXISTS `skill_level` (
`id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `unit_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `unit_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `subject_code` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `required_value` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
`id` int(11) NOT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `subject_code` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
`id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `class` tinyint(4) DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `photo` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `rollno` int(11) DEFAULT NULL,
  `section` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `school_id`, `class`, `name_hi`, `name_en`, `date_of_birth`, `age`, `photo`, `rollno`, `section`) VALUES
(1, 1, 1, 'रणवीर प्रसाद', 'Ranvir Prasad', '2009-08-15', 5, '', 1, 'A'),
(2, 1, 1, 'राजेश कुमार', 'Rajesh Kumar', '2008-05-01', 6, '', NULL, 'A'),
(3, 1, 0, 'राकेश कुमार ', 'Rakesh Kumar ', '0000-00-00', 9, 'uploads/Student/3.JPG', NULL, ''),
(4, 1, 0, 'राकेश कुमार ', 'Rakesh Kumar', '2009-12-05', 5, 'uploads/Student/4.JPG', NULL, ''),
(5, 1, 0, 'राकेश कुमार ', 'Rakesh Kumar', '2009-12-05', 5, 'uploads/Student/5.JPG', NULL, ''),
(6, 1, 0, 'द्फ्द्फ्द् ', 'dfdfd', '1998-05-03', 5, 'uploads/Student/6.JPG', 25, '1'),
(7, 1, 0, 'wwerwe', 'rwerwqe', '2012-12-12', 127, 'uploads/Student/7.jpg', 1212, '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `code` varchar(2) CHARACTER SET utf8 NOT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `name_hi`, `name_en`) VALUES
('01', 'हिंदी', 'Hindi'),
('02', 'अंग्रेजी', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE IF NOT EXISTS `summary` (
  `id` int(11) NOT NULL,
  `schemeid` int(11) NOT NULL,
  `allottment` double NOT NULL,
  `received` double NOT NULL,
  `allotcentral` double NOT NULL,
  `allotstate` double NOT NULL,
  `receivedstate` double NOT NULL,
  `receivedcentral` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagmap`
--

CREATE TABLE IF NOT EXISTS `tagmap` (
`id` int(11) NOT NULL,
  `object_name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `object_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `tag_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tag_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tag_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag_category`
--

CREATE TABLE IF NOT EXISTS `tag_category` (
`id` int(11) NOT NULL,
  `category_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `category_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tehsil`
--

CREATE TABLE IF NOT EXISTS `tehsil` (
  `code` varchar(6) CHARACTER SET utf8 NOT NULL,
  `district_code` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `up_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `code` varchar(40) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `created_user` varchar(45) DEFAULT NULL,
  `created_time` varchar(45) DEFAULT NULL,
  `view_rights` varchar(45) DEFAULT NULL,
  `delete_rights` varchar(45) DEFAULT NULL,
  `update_rights` varchar(45) DEFAULT NULL,
  `mime_type` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2014-07-13 10:33:20', '2014-09-24 23:15:15', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2014-07-13 10:33:20', '0000-00-00 00:00:00', 0, 1),
(3, 'rkumar', '1d36782b8c8cdf0b8bc8ba875642f4d8', 'r@r.com', '9a7819bd20973f016d2d5b1fc5d3bd56', '2014-07-23 03:13:23', '2014-08-24 12:12:54', 0, 1),
(4, 'akumar', '6edff95dabd2b7ed2311e60d6f4f6310', 'a@a.com', 'bbac6f28a295b4417920cf5e889838ce', '2014-08-18 05:51:31', '0000-00-00 00:00:00', 0, 1),
(5, 'checking', 'ce5fb8df125a4721d1df328bc6f2ddea', 'checking@checking.com', '69940bbe6288ef6c94a18c016114d1f9', '2014-09-24 23:37:54', '0000-00-00 00:00:00', 0, 1),
(6, 'checking2', 'fc9c044b48c5d3b066539d66adc1f823', 'checking@hi.com', 'a478aafd80254dffddfa81b740673a70', '2014-09-24 23:45:06', '0000-00-00 00:00:00', 0, 0),
(7, 'heheh', 'b78f30e8cb3db78dcb8f001cb599a27a', 'hhr@h.com', '99a64aa4cb81e7f61a38603bc2d0b2d7', '2014-09-25 00:14:45', '0000-00-00 00:00:00', 0, 0),
(8, 'heheh1', 'b78f30e8cb3db78dcb8f001cb599a27a', 'hh1r@h.com', '22496be1e8e8e1309abcb030b649e8f6', '2014-09-25 00:16:12', '0000-00-00 00:00:00', 0, 0),
(9, 'heheh12', 'b78f30e8cb3db78dcb8f001cb599a27a', 'hh12r@h.com', '8137d0fbe98fb1a0fed6cb26353de6b5', '2014-09-25 00:18:14', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `userid` int(11) NOT NULL,
  `context` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE IF NOT EXISTS `ward` (
  `code` varchar(6) CHARACTER SET utf8 NOT NULL,
  `town_code` varchar(6) CHARACTER SET utf8 DEFAULT NULL,
  `name_hi` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
 ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
 ADD PRIMARY KEY (`code`), ADD KEY `code_idx` (`district_code`);

--
-- Indexes for table `citizen_rural`
--
ALTER TABLE `citizen_rural`
 ADD PRIMARY KEY (`id`), ADD KEY `code_idx` (`revenue_village_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_department_state1_idx` (`state_code`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `designation_type_id` (`designation_type_id`,`level_type_id`), ADD KEY `fk_designation_designation_type1_idx` (`designation_type_id`), ADD KEY `district_code` (`district_code`);

--
-- Indexes for table `designation_type`
--
ALTER TABLE `designation_type`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_designation_department_idx` (`department_id`), ADD KEY `fk_designation_type_level1_idx` (`level_id`);

--
-- Indexes for table `designation_user`
--
ALTER TABLE `designation_user`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_designation_user_designation1_idx` (`designation_id`), ADD KEY `fk_designation_user_users_idx` (`user_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
 ADD PRIMARY KEY (`code`), ADD KEY `code_idx` (`state_code`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `importinfo`
--
ALTER TABLE `importinfo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
 ADD PRIMARY KEY (`id`), ADD KEY `schemeid` (`schemeid`), ADD KEY `parentinst` (`parentinst`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
 ADD PRIMARY KEY (`id`), ADD KEY `schemeid` (`schemeid`), ADD KEY `parentissue` (`parentissue`);

--
-- Indexes for table `landdisputes`
--
ALTER TABLE `landdisputes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_level`
--
ALTER TABLE `learning_level`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Learning_Level_student1_idx` (`student_id`), ADD KEY `fk_Learning_Level_skill_level1_idx` (`skill_level_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
 ADD PRIMARY KEY (`id`), ADD KEY `schemeid` (`schemeid`);

--
-- Indexes for table `panchayat`
--
ALTER TABLE `panchayat`
 ADD PRIMARY KEY (`code`), ADD KEY `code_idx` (`block_code`);

--
-- Indexes for table `policestation`
--
ALTER TABLE `policestation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `profiles_fields`
--
ALTER TABLE `profiles_fields`
 ADD PRIMARY KEY (`id`), ADD KEY `varname` (`varname`,`widget`,`visible`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue_village`
--
ALTER TABLE `revenue_village`
 ADD PRIMARY KEY (`code`), ADD KEY `code_idx` (`tehsil_code`), ADD KEY `code_idx1` (`panchayat_code`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
 ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
 ADD PRIMARY KEY (`id`), ADD KEY `depid` (`depid`), ADD KEY `admin` (`admin`);

--
-- Indexes for table `scheme_parameters`
--
ALTER TABLE `scheme_parameters`
 ADD PRIMARY KEY (`id`), ADD KEY `schemeid` (`schemeid`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_enrollment`
--
ALTER TABLE `school_enrollment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_level`
--
ALTER TABLE `skill_level`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_category_id_idx` (`category_id`), ADD KEY `fk_subject_code_skill_level_idx` (`subject_code`);

--
-- Indexes for table `skill_level_category`
--
ALTER TABLE `skill_level_category`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_subject_code_idx` (`subject_code`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_school_student_idx` (`school_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagmap`
--
ALTER TABLE `tagmap`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tags_tag_category1_idx` (`tag_category_id`);

--
-- Indexes for table `tag_category`
--
ALTER TABLE `tag_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tehsil`
--
ALTER TABLE `tehsil`
 ADD PRIMARY KEY (`code`), ADD KEY `code_idx` (`district_code`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
 ADD PRIMARY KEY (`code`), ADD KEY `districtcodetown_idx` (`district_code`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `status` (`status`), ADD KEY `superuser` (`superuser`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
 ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
 ADD PRIMARY KEY (`code`), ADD KEY `wardtowncode_idx` (`town_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `designation_type`
--
ALTER TABLE `designation_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `designation_user`
--
ALTER TABLE `designation_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `importinfo`
--
ALTER TABLE `importinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `landdisputes`
--
ALTER TABLE `landdisputes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `learning_level`
--
ALTER TABLE `learning_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `policestation`
--
ALTER TABLE `policestation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profiles_fields`
--
ALTER TABLE `profiles_fields`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `scheme_parameters`
--
ALTER TABLE `scheme_parameters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `school_enrollment`
--
ALTER TABLE `school_enrollment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `skill_level`
--
ALTER TABLE `skill_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `skill_level_category`
--
ALTER TABLE `skill_level_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tagmap`
--
ALTER TABLE `tagmap`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_category`
--
ALTER TABLE `tag_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
