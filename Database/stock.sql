-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 05:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `yearlot` year(4) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `infolot` varchar(254) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT 0,
  `brand_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `yearlot`, `brand_name`, `infolot`, `brand_active`, `brand_status`) VALUES
(2, 2021, 'ไตรมาส 1', '', 1, 1),
(3, 2021, 'ไตรมาส 2', '- ', 1, 1),
(4, 2021, 'ไตรมาส 3', '', 1, 1),
(5, 2021, 'ไตรมาส 4', '', 1, 1),
(6, 2022, 'ไตรมาส 1', '', 1, 1),
(7, 2022, 'ไตรมาส 2', '-', 1, 1),
(8, 2022, 'ไตรมาส 3', ' ', 1, 1),
(11, 2022, 'ไตรมาส 4', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'ยาน้ำ', 1, 1),
(2, 'ยาทาภายนอก', 1, 1),
(3, 'ยาสอด', 1, 1),
(4, 'ยาเม็ด', 1, 1),
(5, 'แผ่นแปะ', 1, 1),
(6, ' ยาผง', 1, 1),
(7, 'ยาทาผิวหนัง', 1, 1),
(8, 'ยาสอด/สวนทวารหนัก', 1, 1),
(9, 'ยาสี', 2, 2),
(10, 'ยาสี', 2, 2),
(11, 'ยาสี', 2, 2),
(12, 'ประคบเย็น', 1, 1),
(13, 'ประคบร้อน', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fac`
--

CREATE TABLE `fac` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_active` int(11) NOT NULL DEFAULT 0,
  `fac_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fac`
--

INSERT INTO `fac` (`fac_id`, `fac_name`, `fac_active`, `fac_status`) VALUES
(1, 'คณะครุศาสตร์', 2, 2),
(2, 'คณะวิทยาการการจัดการ', 2, 1),
(3, 'คณะวิทยาศาสตร์และเทคโนโลยี', 1, 1),
(4, 'คณะเทคโนโลยีอุตสาหกรรม', 1, 1),
(5, 'คณะเทคโนโลยีการเกษตร', 1, 1),
(6, 'คณะมนุษยศาสตร์และสังคมศาสตร์', 1, 1),
(7, 'คณะสาธารณสุขศาสตร์', 1, 1),
(8, 'สำนักอธิการบดี', 1, 1),
(9, 'สำนักวิทยบริการและเทคโนโลยีสารสนเทศ', 1, 1),
(10, 'สำนักส่งเสริมการเรียนรู้ และส่งเสริมงานวิชาการ', 1, 1),
(11, 'สำนักวิจัยและพัฒนา', 1, 1),
(12, 'สำนักงานสภามหาวิทยาลัย', 1, 1),
(13, 'กองนโยบายและแผน', 1, 1),
(14, 'กองพัฒนานักศึกษา', 1, 1),
(15, 'กองกลาง', 1, 1),
(16, 'มรภ. วไลยอลงกรณ์ สระแก้ว', 2, 1),
(17, 'กองสื่อสารองกรและการตลาด', 1, 1),
(18, 'งานบริการงานบุคคล', 1, 1),
(19, 'งานวิเทศสัมพันธ์', 2, 1),
(20, 'งานมาตรฐานและจัดการคุณภาพ', 2, 1),
(21, 'งานศูนย์ภาษา', 1, 1),
(22, 'งานวิชาศึกษาทั่วไป', 1, 1),
(23, 'งานบ่มเพราะธุรกิจ และผู้ประกอบการใหม่(UBI)', 2, 1),
(24, 'งานศิลปะวัฒนธรรม', 1, 1),
(25, 'งานพัฒนาอาจารย์และบุคลาการมืออาชีพ', 1, 1),
(26, 'งานโครงสร้างอนุรักษ์พันธุกรรมพืช', 1, 1),
(27, 'โรงเรียนสาธิต', 1, 1),
(28, 'โรงเรียนสาธิต นานาชาติสยามสิงคโปร์', 1, 1),
(29, 'ศูนย์ฝึกประสบการณ์วิชาชีพ', 1, 1),
(30, 'สภาคณาจารย์และข้าราชการ', 2, 2),
(31, 'หนังx', 2, 2),
(32, 'คณะลาบ', 2, 2),
(33, 'คณะลาบ', 2, 2),
(34, 'sss', 2, 2),
(35, 'หนุ่มวัยทอง', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` int(11) NOT NULL,
  `sick` varchar(255) NOT NULL,
  `order_info` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `sick`, `order_info`, `payment_status`, `order_status`) VALUES
(24, '2022-01-20', 2, 'ปวดหัว', '', 1, 1),
(25, '2022-01-20', 18, 'ปวดท้อง', '', 1, 1),
(26, '2022-01-20', 14, 'sd', 'sd', 1, 2),
(27, '2022-01-20', 11, 'เจ็บตา', '', 2, 1),
(28, '2022-01-20', 11, 'ปวดหัว', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` varchar(30) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `total`, `order_item_status`) VALUES
(30, 24, '22', '1', 'NaN', 1),
(34, 26, '22', '1', 'NaN', 1),
(36, 27, '22', '1', '', 1),
(39, 28, '22', '1', '', 1),
(40, 25, '30', '1', 'NaN', 1),
(41, 25, '33', '1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL COMMENT 'รหัสยา',
  `product_name` varchar(255) NOT NULL COMMENT 'ชื่อยา',
  `brand_id` int(11) NOT NULL COMMENT 'ล็อตยา',
  `categories_id` int(11) NOT NULL COMMENT 'ประเภทยา',
  `quantity` varchar(255) NOT NULL COMMENT 'จำนวนยา',
  `date` date NOT NULL COMMENT 'วันหมดอายุยา',
  `active` int(11) NOT NULL DEFAULT 0 COMMENT 'การเปิดใช้งาน',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'การลบยา',
  `typed` varchar(20) NOT NULL COMMENT 'จำนวนนับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `brand_id`, `categories_id`, `quantity`, `date`, `active`, `status`, `typed`) VALUES
(1, 'ยาลดกรด อะลูมินา-แมกนีเซียไซเมธิโคน', 4, 4, '47', '2022-01-31', 2, 2, '1'),
(2, 'ยาธาตุน้ำแดง ลดอาการท้องอืด', 4, 1, '74', '2021-10-31', 2, 2, '7'),
(3, 'เกลือแร่ผง SEA-ORS', 4, 6, '2', '2025-01-31', 2, 2, '5'),
(4, 'ผงถ่านรักษาอาการท้องเสีย', 4, 4, '4', '2025-01-31', 2, 2, '1'),
(5, 'ยาระบายมะขามแขก', 4, 4, '11', '2022-12-31', 2, 2, '1'),
(6, 'ยาถ่ายพยาธิลำไส้ มีเบนดาโซล', 4, 4, '0', '2021-10-06', 2, 2, '5'),
(12, 'เกลือแร่ORS', 4, 1, '20', '2021-10-23', 2, 2, '5'),
(13, 'ยาขับลม', 5, 1, '14', '2021-10-16', 2, 2, '5'),
(14, 'ยาเจนเซี่ยนไวโอเลต', 7, 1, '25', '2021-10-29', 2, 2, '5'),
(15, 'ยิงทิงเจอร์ไทเมอเรอซอล', 7, 1, '29', '2021-10-29', 2, 2, '5'),
(16, 'บอย', 5, 1, '40', '2021-10-30', 2, 2, '5'),
(17, 'detophan', 4, 1, '2', '2021-11-07', 2, 2, '5'),
(18, 'xc', 4, 1, '2', '2021-10-01', 2, 2, '7'),
(19, 'พาราเซตอล', 5, 4, '46', '2021-10-07', 2, 2, '1'),
(20, 'ซีเทค', 5, 1, '19', '2021-10-23', 2, 2, '7'),
(21, 'วาสสาลีน', 4, 2, '3', '2021-10-15', 2, 2, '2'),
(22, 'พาราเซตามอล', 2, 4, '493', '2022-01-16', 1, 1, '1'),
(23, 'แอสไพริน', 2, 4, '200', '2024-01-01', 1, 1, '1'),
(24, 'ธีโอฟิลลีน', 2, 4, '100', '2026-01-01', 1, 1, '1'),
(25, 'โพวิโดน-ไอโอดีน', 2, 1, '30', '2022-01-18', 1, 1, '4'),
(26, 'บี-เดิร์ม', 3, 2, '0', '2024-11-20', 1, 1, '3'),
(27, 'ครีมนวดบรรเทาปวด ดราก้อน', 4, 2, '10', '2024-10-01', 1, 1, '3'),
(28, 'แผ่นแปะตราเสือ (แผ่นใหญ่)', 2, 5, '19', '2023-01-20', 1, 1, '5'),
(29, 'แผ่นแปะตราเสือ (แผ่นเล็ก)', 2, 5, '15', '2023-10-20', 1, 1, '5'),
(30, 'เกลือแร่', 3, 6, '48', '2025-10-07', 1, 1, '5'),
(31, 'ยาโยคี', 2, 2, '3', '2026-01-01', 1, 1, '2'),
(32, 'คูลฟีเวอร์ ', 2, 5, '100', '2024-01-01', 1, 1, '5'),
(33, 'ทีแคร์', 4, 13, '10', '2024-11-15', 1, 1, '5'),
(34, 'พลาสเตอร์', 2, 5, '499', '2025-01-01', 1, 1, '5'),
(35, 'แอลกอฮอล์', 2, 1, '19', '2027-01-01', 1, 1, '4'),
(36, 'สําลี', 2, 2, '99', '2026-01-01', 1, 1, '6'),
(37, 'ยาธาตุน้ำขาว', 2, 1, '25', '2022-01-20', 1, 1, '4'),
(38, 'q', 6, 1, '1', '2021-12-26', 2, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `user_namel` varchar(100) NOT NULL COMMENT 'ชื่อสกุล',
  `fac_id` int(11) NOT NULL COMMENT 'คณะ',
  `tel` varchar(11) NOT NULL COMMENT 'เบอร์โทร\r\n',
  `username` varchar(255) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `active` int(11) NOT NULL DEFAULT 0 COMMENT 'การเปิดใช้งาน',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT 'การลบ\r\n',
  `Ulevel` int(3) NOT NULL COMMENT 'ประเภทการเข้าถึงUI',
  `cata` int(20) NOT NULL COMMENT 'ประเภทผู้ใช้',
  `druga` varchar(255) NOT NULL COMMENT 'การแพ้ยา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_namel`, `fac_id`, `tel`, `username`, `password`, `active`, `status`, `Ulevel`, `cata`, `druga`) VALUES
(1, 'นางสาวยุภา กำจาย', 15, '02 215 3653', 'admin', 'admin', 1, 1, 1, 3, '-'),
(2, 'นายณัฐชนน สุขตลอดกาล', 3, '0123456789', '61122470001', '1104200126637', 1, 1, 3, 1, ''),
(7, 'พอฤดี  รอดฉ่ำ', 15, '0874563236', 'staff1', 'staff1', 1, 1, 2, 2, '0'),
(11, 'นายเจษฏา เดชหวังกลาง', 3, '0803737499', '61122470002', '1104200126637', 2, 1, 3, 1, 'พาราเซตามอล'),
(14, 'ปาณิตา นิยันตัง', 4, '08707001248', '61122470003', '1104200126637', 1, 1, 3, 1, '-'),
(15, 'กิตติพันธ์ วรคุณาลัย', 5, '0813566472', '61122470004', '1104200126637', 1, 1, 3, 1, 'พาราเซตามอล'),
(16, 'ปาลิดา ชับวัฒนโยธิน', 6, '0978451248', '61122470005', '1104200126637', 1, 1, 3, 1, '-'),
(17, 'พัชรธิดา สายรุ้ง', 3, '0975032155', '61122470006', '1104200126637', 1, 1, 3, 1, ''),
(18, 'พิมพ์นารา สว่างโลก', 5, '0784519856', '61122470007', '110420126637', 1, 1, 3, 1, ''),
(19, 'เบญญาพา ฝันฟ้า', 4, '0975148623', '61122470008', '1104200126637', 1, 1, 3, 1, ''),
(20, 'เขมจิรา กานสมจิตร', 5, '09754896574', '61122470009', '1104200126637', 1, 1, 3, 1, ''),
(21, 'สุภิญญา เพียรดี', 7, '08754884562', '61122470010', '1104200126637', 1, 1, 3, 1, ''),
(22, 'กมลชนก ผดุงศิลป์', 6, '0875136499', '61122470011', '1104200126637', 1, 1, 3, 1, ''),
(23, 'วรดา สมงาม', 5, '0876294513', '61122470012', '1104200126637', 1, 1, 3, 1, ''),
(24, 'สุภัสสรา สิงค์สวัสดฺ์', 6, '08451368428', '61122470013', '1104200126637', 1, 1, 3, 1, ''),
(25, 'กิตติมา พันธุ์อุบล', 7, '0986547842', '61122470014', '1104200126637', 1, 1, 3, 1, ''),
(26, 'ภาวิณี หนูพลัด', 3, '0945715829', '61122470015', '1104200126637', 1, 1, 3, 1, ''),
(27, 'กัญญาวีร์ แก้ววง', 4, '09754816596', '๋ีjune', '๋ีjune', 2, 2, 3, 1, ''),
(28, 'นนท์พัท ยุธารักษ์', 15, '0987543167', 'Tar', 'Tar', 2, 2, 3, 3, ''),
(29, 'ยงยุทธ วรคุณาลัย', 15, '07458479588', 'staff2', 'staff2', 1, 1, 2, 3, ''),
(30, 'ปุ่ยผ้าย รัชชานนท์', 15, '09201200356', 'asa', 'as', 2, 2, 2, 3, 'asa'),
(31, '555', 5, '555', '55', '55', 2, 2, 2, 2, '555'),
(32, 'fffff', 7, 'fff', 'fff', 'fff', 2, 2, 2, 3, 'ffff'),
(33, 'เกสสินี สว่างโลก', 15, '0942215469', 'staff3', 'staff3', 1, 1, 2, 3, ''),
(34, 'ss', 3, 'ss', '11221', '11221', 2, 2, 3, 1, 'ss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `fac`
--
ALTER TABLE `fac`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `client_name` (`client_name`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fac`
--
ALTER TABLE `fac`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยา', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
