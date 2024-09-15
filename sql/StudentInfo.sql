-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.11
-- Generation Time: Sep 15, 2024 at 07:40 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StudentInfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_avatar`
--

CREATE TABLE `tbl_avatar` (
  `AvaID` int(11) NOT NULL,
  `AvaName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_avatar`
--

INSERT INTO `tbl_avatar` (`AvaID`, `AvaName`) VALUES
(1, 'avatar1'),
(2, 'avatar2'),
(3, 'avatar3'),
(4, 'avatar4'),
(5, 'avatar5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `BookID` int(11) NOT NULL,
  `Book` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`BookID`, `Book`) VALUES
(1, 'ดราก้อนบอล เล่ม 1'),
(2, 'ดราก้อนบอล เล่ม 2'),
(3, 'ล่าข้ามศตวรรษ เล่ม 1'),
(4, 'เทพมรณะ เล่ม 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `CityID` int(11) NOT NULL,
  `CityName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`CityID`, `CityName`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'สมุทรปราการ'),
(3, 'นนทบุรี'),
(4, 'ปทุมธานี'),
(5, 'พระนครศรีอยุธยา'),
(6, 'อ่างทอง'),
(7, 'ลพบุรี'),
(8, 'สิงห์บุรี'),
(9, 'ชัยนาท'),
(10, 'สระบุรี'),
(11, 'ชลบุรี'),
(12, 'ระยอง'),
(13, 'จันทบุรี'),
(14, 'ตราด'),
(15, 'ฉะเชิงเทรา'),
(16, 'ปราจีนบุรี'),
(17, 'นครนายก'),
(18, 'สระแก้ว'),
(19, 'นครราชสีมา'),
(20, 'บุรีรัมย์'),
(21, 'สุรินทร์'),
(22, 'ศรีสะเกษ'),
(23, 'อุบลราชธานี'),
(24, 'ยโสธร'),
(25, 'ชัยภูมิ'),
(26, 'อำนาจเจริญ'),
(27, 'หนองบัวลำภู'),
(28, 'ขอนแก่น'),
(29, 'อุดรธานี'),
(30, 'เลย'),
(31, 'หนองคาย'),
(32, 'มหาสารคาม'),
(33, 'ร้อยเอ็ด'),
(34, 'กาฬสินธุ์'),
(35, 'สกลนคร'),
(36, 'นครพนม'),
(37, 'มุกดาหาร'),
(38, 'เชียงใหม่'),
(39, 'ลำพูน'),
(40, 'ลำปาง'),
(41, 'อุตรดิตถ์'),
(42, 'แพร่'),
(43, 'น่าน'),
(44, 'พะเยา'),
(45, 'เชียงราย'),
(46, 'แม่ฮ่องสอน'),
(47, 'นครสวรรค์'),
(48, 'อุทัยธานี'),
(49, 'กำแพงเพชร'),
(50, 'ตาก'),
(51, 'สุโขทัย'),
(52, 'พิษณุโลก'),
(53, 'พิจิตร'),
(54, 'เพชรบูรณ์'),
(55, 'ราชบุรี'),
(56, 'กาญจนบุรี'),
(57, 'สุพรรณบุรี'),
(58, 'นครปฐม'),
(59, 'สมุทรสาคร'),
(60, 'สมุทรสงคราม'),
(61, 'เพชรบุรี'),
(62, 'ประจวบคีรีขันธ์'),
(63, 'นครศรีธรรมราช'),
(64, 'กระบี่'),
(65, 'พังงา'),
(66, 'ภูเก็ต'),
(67, 'สุราษฎร์ธานี'),
(68, 'ระนอง'),
(69, 'ชุมพร'),
(70, 'สงขลา'),
(71, 'สตูล'),
(72, 'ตรัง'),
(73, 'พัทลุง'),
(74, 'ปัตตานี'),
(75, 'ยะลา'),
(76, 'นราธิวาส'),
(77, 'บึงกาฬ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `DepID` int(11) NOT NULL,
  `Department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`DepID`, `Department`) VALUES
(1, 'สาขาวิทยาการคอมพิวเตอร์'),
(2, 'สาขาเทคโนโลยีสารสนเทศ'),
(3, 'สาขาวิทยาศาสตร์สิ่งแวดล้อม'),
(4, 'สาขาคณิตศาสตร์ประยุกต์'),
(5, 'สาขาฟิสิกส์ประยุกต์'),
(6, 'สาขาเคมีอุตสาหกรรม'),
(7, 'สาขาชีววิทยาประยุกต์'),
(8, 'สาขาเทคโนโลยีชีวภาพ'),
(9, 'สาขาจุลชีววิทยา'),
(10, 'สาขาสถิติประยุกต์');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hobby`
--

CREATE TABLE `tbl_hobby` (
  `HobbyID` int(11) NOT NULL,
  `HobbyName` varchar(100) DEFAULT NULL,
  `HobbyNameEng` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_hobby`
--

INSERT INTO `tbl_hobby` (`HobbyID`, `HobbyName`, `HobbyNameEng`) VALUES
(1, 'อ่านหนังสือ', 'Reading'),
(2, 'วาดภาพ', 'Drawing'),
(3, 'เล่นดนตรี', 'Playing Music'),
(4, 'ออกกำลังกาย', 'Exercising'),
(5, 'ทำอาหาร', 'Cooking'),
(6, 'ถ่ายภาพ', 'Photography'),
(7, 'ดูหนัง', 'Watching Movies'),
(8, 'เล่นกีฬา', 'Playing Sports'),
(9, 'เล่นเกม', 'Playing Video Games'),
(10, 'เดินป่า', 'Hiking'),
(11, 'ปั่นจักรยาน', 'Cycling'),
(12, 'ทำสวน', 'Gardening'),
(13, 'ตกปลา', 'Fishing'),
(14, 'เต้นรำ', 'Dancing'),
(15, 'เล่นโยคะ', 'Yoga'),
(16, 'ประดิษฐ์งานฝีมือ', 'Crafting'),
(17, 'สะสมของต่างๆ', 'Collecting'),
(18, 'ท่องเที่ยว', 'Traveling'),
(19, 'ร้องเพลง', 'Singing'),
(20, 'เขียนหนังสือ', 'Writing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prefixes`
--

CREATE TABLE `tbl_prefixes` (
  `PrefixID` int(1) NOT NULL,
  `PrefixTH` varchar(10) DEFAULT NULL,
  `PrefixEN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_prefixes`
--

INSERT INTO `tbl_prefixes` (`PrefixID`, `PrefixTH`, `PrefixEN`) VALUES
(1, 'นาย', 'Mr.'),
(2, 'นางสาว', 'Ms.'),
(3, 'นาง', 'Mrs.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std`
--

CREATE TABLE `tbl_std` (
  `Id` int(11) NOT NULL,
  `Sname` varchar(20) DEFAULT NULL,
  `Slastname` varchar(30) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_std`
--

INSERT INTO `tbl_std` (`Id`, `Sname`, `Slastname`, `Address`) VALUES
(1, 'A', 'AA', '1/1'),
(2, 'B', 'BB', '2/2'),
(3, 'ก', 'กก', '3/3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std_book`
--

CREATE TABLE `tbl_std_book` (
  `Id` int(11) NOT NULL,
  `BookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_std_book`
--

INSERT INTO `tbl_std_book` (`Id`, `BookID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `SID` int(11) NOT NULL,
  `PrefixID` int(11) DEFAULT NULL,
  `StudentName` varchar(20) DEFAULT NULL,
  `StudentLastname` varchar(30) DEFAULT NULL,
  `StudentNameEN` varchar(20) DEFAULT NULL,
  `StudentLastnameEN` varchar(30) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `DepID` int(11) DEFAULT NULL,
  `yearID` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Domicile` varchar(100) DEFAULT NULL,
  `Telephone` varchar(15) DEFAULT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `AvaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`SID`, `PrefixID`, `StudentName`, `StudentLastname`, `StudentNameEN`, `StudentLastnameEN`, `Age`, `DepID`, `yearID`, `Address`, `Domicile`, `Telephone`, `SubjectID`, `CityID`, `AvaID`) VALUES
(1, 1, 'สมชาย', 'ใจดี', 'Somchai', 'Jaidee', 21, 1, 3, '123 หมู่ 2 ถนนหลัก ตำบลใจดี กรุงเทพมหานคร', '123 หมู่ 2 ถนนหลัก ตำบลใจดี กรุงเทพมหานคร', '0812345678', 1, 1, 2),
(2, 2, 'สมศรี', 'สุขสันต์', 'Somsri', 'Suksan', 20, 2, 2, '45/78 ซอยสุข ถนนสุขใจ นนทบุรี', '45/78 ซอยสุข ถนนสุขใจ นนทบุรี', '0812345679', 2, 3, 1),
(3, 1, 'วิชัย', 'เก่งมาก', 'Wichai', 'Kaengmak', 22, 1, 4, '99/123 หมู่บ้านดี ตำบลชัย ปทุมธานี', '99/123 หมู่บ้านดี ตำบลชัย ปทุมธานี', '0812345680', 1, 4, 2),
(4, 2, 'อรทัย', 'น่ารัก', 'Orathai', 'Naruk', 19, 3, 1, '55 หมู่บ้านท่าพระ ถนนใหญ่ เชียงใหม่', '55 หมู่บ้านท่าพระ ถนนใหญ่ เชียงใหม่', '0812345681', 3, 38, 4),
(5, 1, 'จิรายุ', 'ทรงพลัง', 'Jirayu', 'Songpalang', 21, 2, 3, '12/45 ถนนทรงพลัง ตำบลสันทราย ลำปาง', '12/45 ถนนทรงพลัง ตำบลสันทราย ลำปาง', '0812345682', 12, 40, 3),
(6, 2, 'มณีรัตน์', 'ทองดี', 'Maneerat', 'Thongdee', 22, 3, 4, '123 ถนนประชาชื่น ชลบุรี', '123 ถนนประชาชื่น ชลบุรี', '0812345683', 3, 11, 5),
(7, 1, 'กฤษณ์', 'ชาญฉลาด', 'Krit', 'Chancharat', 20, 1, 2, '44 หมู่ 5 ซอยวิชาการ นครราชสีมา', '44 หมู่ 5 ซอยวิชาการ นครราชสีมา', '0812345684', 14, 19, 5),
(8, 1, 'ศิริวรรณ', 'สมบูรณ์', 'Siriwan', 'Sombun', 23, 4, 4, '75/88 บ้านโฮมพาร์ค สงขลา', '75/88 บ้านโฮมพาร์ค สงขลา', '0812345685', 4, 70, 2),
(9, 2, 'ปิยฉัตร', 'เพียงเพ็ญ', 'Piyachat', 'Piengpen', 21, 2, 3, '77/22 ซอยเพ็ญสุข เชียงราย', '77/22 ซอยเพ็ญสุข เชียงราย', '0812345686', 2, 45, 1),
(10, 1, 'สุเมธ', 'แสงทอง', 'Sumet', 'Saengthong', 19, 1, 1, '456 หมู่ 8 ตำบลแสงทอง ลพบุรี', '456 หมู่ 8 ตำบลแสงทอง ลพบุรี', '0812345687', 1, 7, 4),
(11, 2, 'นภาพร', 'วิจิตร', 'Napaporn', 'Wichit', 20, 3, 2, '32/5 ซอยสีลม ระยอง', '32/5 ซอยสีลม ระยอง', '0812345688', 3, 12, 3),
(12, 1, 'วรัญญา', 'วงศ์ประเสริฐ', 'Waranya', 'Wongprasert', 21, 2, 3, '22/11 ซอยวิชญา ตรัง', '22/11 ซอยวิชญา ตรัง', '0812345689', 2, 72, 2),
(13, 1, 'ธนา', 'เพชรพิมาน', 'Thana', 'Petchpiman', 20, 4, 2, '121/88 ซอยประชาชื่น ปัตตานี', '121/88 ซอยประชาชื่น ปัตตานี', '0812345690', 4, 74, 1),
(14, 2, 'อารยา', 'สายบุญ', 'Araya', 'Saibun', 21, 2, 3, '90/55 ตำบลสวนพลู ขอนแก่น', '90/55 ตำบลสวนพลู ขอนแก่น', '0812345691', 2, 28, 4),
(15, 1, 'ชลธิชา', 'รักดี', 'Chonthicha', 'Rakdee', 19, 1, 1, '89/100 ซอยบางนา ชุมพร', '89/100 ซอยบางนา ชุมพร', '0812345692', 1, 69, 2),
(16, 2, 'ปวีณา', 'ศรีสุวรรณ', 'Paveena', 'Srisuwan', 22, 3, 4, '87 หมู่บ้านสุขใจ นครสวรรค์', '87 หมู่บ้านสุขใจ นครสวรรค์', '0812345693', 3, 47, 2),
(17, 1, 'สุรินทร์', 'ก้าวหน้า', 'Surin', 'Kaona', 23, 2, 4, '65/9 หมู่บ้านก้าวหน้า พิษณุโลก', '65/9 หมู่บ้านก้าวหน้า พิษณุโลก', '0812345694', 2, 52, 5),
(18, 2, 'พรรณี', 'มั่งมี', 'Pannee', 'Mangmee', 21, 3, 3, '12/50 หมู่บ้านมั่งมี ยะลา', '12/50 หมู่บ้านมั่งมี ยะลา', '0812345695', 7, 75, 1),
(19, 1, 'สมบัติ', 'พูนสุข', 'Sombat', 'Poonsuk', 19, 1, 1, '45/32 ถนนพูนสุข พะเยา', '45/32 ถนนพูนสุข พะเยา', '0812345696', 1, 44, 3),
(20, 2, 'อัญชลี', 'รุ่งเรือง', 'Anchalee', 'Rungreung', 22, 3, 4, '123/77 ตำบลสันติ นครปฐม', '123/77 ตำบลสันติ นครปฐม', '0812345697', 3, 58, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_StudentHobby`
--

CREATE TABLE `tbl_StudentHobby` (
  `SID` int(11) NOT NULL,
  `HobbyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_StudentHobby`
--

INSERT INTO `tbl_StudentHobby` (`SID`, `HobbyID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 1),
(6, 3),
(7, 2),
(7, 4),
(8, 5),
(8, 6),
(9, 7),
(10, 8),
(10, 9),
(10, 10),
(11, 1),
(11, 2),
(12, 3),
(12, 4),
(13, 5),
(13, 6),
(14, 7),
(14, 8),
(15, 9),
(15, 10),
(16, 1),
(16, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 6),
(19, 7),
(19, 8),
(20, 9),
(20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `SubjectID` int(11) NOT NULL,
  `Subject` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`SubjectID`, `Subject`) VALUES
(1, 'คณิตศาสตร์พื้นฐาน'),
(2, 'แคลคูลัส 1'),
(3, 'แคลคูลัส 2'),
(4, 'ฟิสิกส์พื้นฐาน'),
(5, 'เคมีพื้นฐาน'),
(6, 'ชีววิทยาเบื้องต้น'),
(7, 'โปรแกรมคอมพิวเตอร์เบื้องต้น'),
(8, 'โครงสร้างข้อมูล'),
(9, 'อัลกอริธึม'),
(10, 'สถิติพื้นฐาน'),
(11, 'เทคโนโลยีสารสนเทศเบื้องต้น'),
(12, 'ระบบเครือข่ายคอมพิวเตอร์'),
(13, 'การจัดการฐานข้อมูล'),
(14, 'การพัฒนาเว็บแอปพลิเคชัน'),
(15, 'การเขียนโปรแกรมเชิงวัตถุ'),
(16, 'จุลชีววิทยา'),
(17, 'วิทยาการสิ่งแวดล้อม'),
(18, 'ฟิสิกส์สำหรับวิศวกรรม'),
(19, 'เคมีอินทรีย์'),
(20, 'ชีวเคมี');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `yearID` int(11) NOT NULL,
  `Year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`yearID`, `Year`) VALUES
(1, 'ปี1'),
(2, 'ปี2'),
(3, 'ปี3'),
(4, 'ปี4');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_student_details`
-- (See below for the actual view)
--
CREATE TABLE `view_student_details` (
`SID` int(11)
,`Prefix` varchar(10)
,`StudentName` varchar(20)
,`StudentLastname` varchar(30)
,`PrefixEN` varchar(10)
,`StudentNameEN` varchar(20)
,`StudentLastnameEN` varchar(30)
,`Age` int(11)
,`Department` varchar(100)
,`StudyYear` varchar(10)
,`Address` varchar(100)
,`Domicile` varchar(100)
,`Telephone` varchar(15)
,`SubjectName` varchar(100)
,`City` varchar(100)
,`Avatar` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_student_details`
--
DROP TABLE IF EXISTS `view_student_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`StudentInfo`@`127.0.0.1` SQL SECURITY DEFINER VIEW `view_student_details`  AS SELECT `s`.`SID` AS `SID`, `p`.`PrefixTH` AS `Prefix`, `s`.`StudentName` AS `StudentName`, `s`.`StudentLastname` AS `StudentLastname`, `p`.`PrefixEN` AS `PrefixEN`, `s`.`StudentNameEN` AS `StudentNameEN`, `s`.`StudentLastnameEN` AS `StudentLastnameEN`, `s`.`Age` AS `Age`, `d`.`Department` AS `Department`, `y`.`Year` AS `StudyYear`, `s`.`Address` AS `Address`, `s`.`Domicile` AS `Domicile`, `s`.`Telephone` AS `Telephone`, `subj`.`Subject` AS `SubjectName`, `c`.`CityName` AS `City`, `a`.`AvaName` AS `Avatar` FROM ((((((`tbl_student` `s` join `tbl_prefixes` `p` on(`s`.`PrefixID` = `p`.`PrefixID`)) join `tbl_department` `d` on(`s`.`DepID` = `d`.`DepID`)) join `tbl_year` `y` on(`s`.`yearID` = `y`.`yearID`)) join `tbl_subject` `subj` on(`s`.`SubjectID` = `subj`.`SubjectID`)) join `tbl_city` `c` on(`s`.`CityID` = `c`.`CityID`)) left join `tbl_avatar` `a` on(`s`.`AvaID` = `a`.`AvaID`)) ORDER BY `s`.`SID` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_avatar`
--
ALTER TABLE `tbl_avatar`
  ADD PRIMARY KEY (`AvaID`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`DepID`);

--
-- Indexes for table `tbl_hobby`
--
ALTER TABLE `tbl_hobby`
  ADD PRIMARY KEY (`HobbyID`);

--
-- Indexes for table `tbl_prefixes`
--
ALTER TABLE `tbl_prefixes`
  ADD PRIMARY KEY (`PrefixID`);

--
-- Indexes for table `tbl_std`
--
ALTER TABLE `tbl_std`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_std_book`
--
ALTER TABLE `tbl_std_book`
  ADD PRIMARY KEY (`Id`,`BookID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `FK_Prefix` (`PrefixID`),
  ADD KEY `FK_Department` (`DepID`),
  ADD KEY `FK_Subject` (`SubjectID`),
  ADD KEY `FK_City` (`CityID`),
  ADD KEY `FK_Year` (`yearID`),
  ADD KEY `FK_Avatar` (`AvaID`);

--
-- Indexes for table `tbl_StudentHobby`
--
ALTER TABLE `tbl_StudentHobby`
  ADD PRIMARY KEY (`SID`,`HobbyID`),
  ADD KEY `FK_hobby` (`HobbyID`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`yearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_std`
--
ALTER TABLE `tbl_std`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_std_book`
--
ALTER TABLE `tbl_std_book`
  ADD CONSTRAINT `tbl_std_book_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `tbl_std` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_std_book_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `tbl_book` (`BookID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `FK_Avatar` FOREIGN KEY (`AvaID`) REFERENCES `tbl_avatar` (`AvaID`),
  ADD CONSTRAINT `FK_City` FOREIGN KEY (`CityID`) REFERENCES `tbl_city` (`CityID`),
  ADD CONSTRAINT `FK_Department` FOREIGN KEY (`DepID`) REFERENCES `tbl_department` (`DepID`),
  ADD CONSTRAINT `FK_Prefix` FOREIGN KEY (`PrefixID`) REFERENCES `tbl_prefixes` (`PrefixID`),
  ADD CONSTRAINT `FK_Subject` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_subject` (`SubjectID`),
  ADD CONSTRAINT `FK_Year` FOREIGN KEY (`yearID`) REFERENCES `tbl_year` (`yearID`);

--
-- Constraints for table `tbl_StudentHobby`
--
ALTER TABLE `tbl_StudentHobby`
  ADD CONSTRAINT `FK_Student` FOREIGN KEY (`SID`) REFERENCES `tbl_student` (`SID`),
  ADD CONSTRAINT `FK_hobby` FOREIGN KEY (`HobbyID`) REFERENCES `tbl_hobby` (`HobbyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
