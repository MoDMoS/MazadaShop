-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 09:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazada`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(15) NOT NULL,
  `QuantityC` int(10) NOT NULL,
  `ProID` int(15) NOT NULL,
  `CustomerID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CatID` int(15) NOT NULL,
  `CatName` varchar(50) CHARACTER SET tis620 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CatID`, `CatName`) VALUES
(6, 'อุปกรณ์ อิเล็กทรอนิกส์'),
(7, 'ซุปเปอร์มาร์เก็ต'),
(10, 'แฟชั่น'),
(13, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(15) NOT NULL,
  `Name` varchar(50) CHARACTER SET tis620 NOT NULL,
  `Password` varchar(50) CHARACTER SET tis620 NOT NULL,
  `Email` varchar(50) CHARACTER SET tis620 NOT NULL,
  `Address` varchar(50) CHARACTER SET tis620 NOT NULL,
  `PostalCode` varchar(50) CHARACTER SET tis620 NOT NULL,
  `Phone` varchar(50) CHARACTER SET tis620 NOT NULL,
  `BDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `Password`, `Email`, `Address`, `PostalCode`, `Phone`, `BDay`) VALUES
(5, 'testcus5', '123', 'testcus@gmail.com', 'fff', '12130', '0970830952', '2021-09-06'),
(7, 'ชมลดา ชมศร', '12', '12@gmail.com', 'dsfsf', '12312', '0970830952', '2021-10-04'),
(8, 'Mos', '123', 'Mos@gmail.com', '55/29-30', '11140', '0992827632', '2001-07-02'),
(9, 'ชมลดา ชมศร', '123', '1234@gmail.com', 'sss', '1130', '0970830952', '2021-10-04'),
(10, 'ณัฐดนัย ศรีนิธิเจษฎาภรณ์', '123', 'koonmos1@gmail.com', '55/29-30', '11140', '0992827632', '2001-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(15) NOT NULL,
  `TotalPrice` float NOT NULL,
  `OrDiscount` float NOT NULL,
  `OrPrice` float NOT NULL,
  `OrderDate` date NOT NULL,
  `ShipperID` int(15) NOT NULL,
  `CustomerID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `TotalPrice`, `OrDiscount`, `OrPrice`, `OrderDate`, `ShipperID`, `CustomerID`) VALUES
(88, 14578.2, 1200.75, 15779, '2021-10-18', 1, 5),
(89, 20498.2, 100.75, 20599, '2021-10-19', 6, 5),
(90, 64.5, 10.5, 75, '2021-10-19', 1, 5),
(91, 387, 63, 450, '2021-10-19', 1, 5),
(92, 20062.5, 0, 20062.5, '2021-10-19', 1, 5),
(93, 20557.5, 0, 20557.5, '2021-10-19', 1, 5),
(94, 8223, 0, 8223, '2021-10-19', 1, 5),
(95, 2766.25, 503.75, 3270, '2021-10-19', 1, 5),
(96, 142490, 400, 142890, '2021-10-19', 1, 10),
(97, 2109, 403, 2512, '2021-10-21', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrDetID` int(15) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `OrDDiscount` float NOT NULL,
  `OrDPrice` float NOT NULL,
  `Status` varchar(50) NOT NULL,
  `ProID` int(15) NOT NULL,
  `OrderID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrDetID`, `Quantity`, `OrDDiscount`, `OrDPrice`, `Status`, `ProID`, `OrderID`) VALUES
(45, 2, 100, 280, '⌛รอดำเนินการ', 40, 88),
(46, 1, 100.75, 599, '❌ยกเลิกคำสั่งซื้อ', 30, 88),
(47, 1, 1000, 14900, '✔️ยืนยันคำสั่งซื้อ', 34, 88),
(48, 1, 100.75, 599, '⌛รอดำเนินการ', 30, 89),
(49, 10, 0, 20000, '✔️ยืนยันคำสั่งซื้อ', 43, 89),
(50, 1, 10.5, 75, '⌛รอดำเนินการ', 31, 90),
(51, 6, 63, 450, '⌛รอดำเนินการ', 31, 91),
(52, 1, 0, 55, '⌛รอดำเนินการ', 32, 92),
(53, 10, 0, 20007.5, '⌛รอดำเนินการ', 43, 92),
(54, 10, 0, 550, '⌛รอดำเนินการ', 32, 93),
(55, 10, 0, 20007.5, '⌛รอดำเนินการ', 43, 93),
(56, 4, 0, 220, '⌛รอดำเนินการ', 32, 94),
(57, 4, 0, 8003, '⌛รอดำเนินการ', 43, 94),
(58, 5, 0, 275, '⌛รอดำเนินการ', 32, 95),
(59, 5, 503.75, 2995, '⌛รอดำเนินการ', 30, 95),
(60, 4, 400, 23960, '⌛รอดำเนินการ', 37, 96),
(61, 7, 0, 118930, '⌛รอดำเนินการ', 36, 96),
(62, 4, 403, 2396, '⌛รอดำเนินการ', 30, 97),
(63, 1, 0, 116, '⌛รอดำเนินการ', 33, 97);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProID` int(15) NOT NULL,
  `ProName` varchar(100) NOT NULL,
  `Picture` varchar(200) NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL,
  `ProDe` varchar(500) NOT NULL,
  `Stock` int(10) NOT NULL,
  `OwID` int(15) NOT NULL,
  `SCatID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProID`, `ProName`, `Picture`, `Price`, `Discount`, `ProDe`, `Stock`, `OwID`, `SCatID`) VALUES
(30, 'ข้าวหอมมะลิใหม่100% ตราฉัตร', '150178242520211016_144602.jpg', 599, 100.75, 'ข้าวหอมมะลิใหม่ตราฉัตร (ข้าวหอมมะลิใหม่ 100%) ใช้เทคโนโลยี Grain Cooler ควบคุมความเย็น 25°C เพื่อรักษาความสดใหม่ตั้งแต่ข้าวเปลือก ทุกเมล็ดจึงขาวใส มีกลิ่นหอม นุ่มเหนียว มียางข้าวตลอดปี อายุข้าว 1-3 เดือน ขนาดบรรจุ 1 กิโลกรัม, 5 กิโลกรัม คุณภาพความอร่อย ผ่านกระบวนการจัดเก็บและทำความสะอาด14 ขั้นตอน หอม นุ่มมียาง ข้าวตลอดปี เหมาะสำหรับ ทำข้าวต้มอย่างยิ่ง วิธีการหุงข้าวให้อร่อย 1. ล้างมือก่อนหุงข้าว 2. ใช้หม้อหุงข้าวไฟฟ้า ใส่ข้าวตราฉัตร 1 ส่วน ลงในหม้อหุงข้าวไฟฟ้า 3. ใส่น้ำสะอาด 1:1-1.2 ส่วน ลงในหม้', 2167, 2, 34),
(31, 'มิโนริ ข้าวญี่ปุ่นพันธุ์ซาซานิชิกิ 100% 1 กก.', 'Picture121919694020211016_145713.webp', 75, 10.5, 'มิโนริ ข้าวญี่ปุ่นพันธุ์ซาซานิชิกิ 100% – ข้าวญี่ปุ่นคุณภาพ เงางามทุกเมล็ด\r\nข้าวญี่ปุ่นพันธุ์ซาซานิชิกิแท้ ตรามิโนริ รับรองความสดใหม่ด้วยระบบการจัดจำหน่ายทันทีหลังจากสีข้าวไม่เกิน 1 เดือน จึงมั่นใจได้ว่า จะได้ข้าวญี่ปุ่นแท้ที่ขาว เงาวาว มีรสชาติหวานหอม เหนียวนุ่ม ละมุนลิ้น ตรงตามคุณสมบัติของข้าวญี่ปุ่นใหม่ต้นฤดูทุกประการ', 3, 2, 34),
(32, 'ซัมยัง บูลดัก ฮอต ชิคเก้น กิมจิ ราเมง 135 กรัม', 'Picture9614673020211016_145921.jpg', 55, 0, 'Samyang  Buldak Hot Chicken Kimchi Ramen ซัมยัง บูลดัก ฮอต ชิคเก้น กิมจิ ราเมง 135 กรัม\r\nซัมยัง บะหมี่กึ่งสําเร็จรูปจากเกาหลี ที่มียอดขายเป็นอันดับ 1 ในไทย\r\nราเมงกึ่งสําเร็จรูปแบบแห้ง รสกิมจิสูตรไก่เผ็ด\r\nSAMYANG  BULDAK HOT CHICKEN KIMCHI RAMEN\r\nเป็นการผสมผสานระหว่างความเผ็ดของซอสบูลดักและความเปรี้ยวของรสกิมจิ\r\nCombination of “Buldak’s” Spiciness and “Kimchi’s” Sourness, the most famous Korean Traditional Dish \r\nซัมยัง บูลดักบะหมี่กึ่งสำเร็จรูปแบบแห้ง เส้นเหนียวนุ่ม ผสมซอสเผ็ดโหดส่งตรงจากเกาหลี ', 2, 2, 36),
(33, 'Knorr Cup Jok Sachet Fish 35 g. คนอร์ คัพ โจ๊ก ชนิดซอง รสปลา 35 ก. X12', 'Picture166834192020211016_150033.jpg', 116, 0, '- โจ๊กกึ่งสำเร็จรูป รสปลา แสนอร่อย เพียงฉีกซองต้มเพียง 3 นาที อร่อยง่าย เหมาะสำหรับมื้อเช้าที่เร่งรีบ\r\n\r\nเริ่มวันใหม่อย่างสดใส ด้วยมื้อเช้าที่มีประโยชน์ กับ โจ๊กกึ่งสำเร็จรูป ข้าวนุ่มลื่น กลิ่นหอม และรสชาติที่เป็นเอกลักษณ์เฉพาะจาก ได้ครบทั้งความอร่อยและคุณประโยชน์จากข้าวหอมมะลิแท้ อุดมไปด้วยวิตมินและสารอาหารที่จำเป็นต่อร่างกาย อร่อยได้ง่ายๆ เพียงฉีกซองต้มเพียง 3 นาที', 7, 2, 36),
(34, 'โน๊ตบุ๊ค 15.6 นิ้วใหม่จากโรงงาน 2', 'Picture188620831820211016_152149.webp', 14900, 1000, ' laptop โน๊ตบุ๊ค 15.6 นิ้วใหม่จากโรงงาน Asus Intel Core i5 CPU คอมพิวเตอร์ครบชุด 8gb/16gb RAM DDR4 128/256GB SSD 2021 new ราคาถูกๆมือ1 AST vivobook 15 notebook computer pc gaming คอมเล่นgta v\r\n2021 อัพเกรด CPU รุ่นที่ 6 i5-6200U; ทำงานเร็วขึ้นแบรนด์ AST และโรงงาน ASUS ในพื้นที่ร่วมมือกับโรงงานเพื่อผลิตแล็ปท็อปคุณภาพสูงเพื่อมอบความสะดวกสบายสูงสุดให้กับลูกค้าเราจึงจดทะเบียนแบรนด์ AST ของเราเองในประเทศไทยสินค้ามือหนึ่งของร้านนี้รับประกัน 1 ปีและมีเวลาเจ็ดวัน ปัญหาคุณภาพใด ๆ สามารถส่งคืนได้ฟรี      ', 8, 1, 39),
(35, 'น๊ตบุ๊คมือ1แท้ gaming laptop computer new คอมพิวเตอร์ ', 'Picture180581553120211016_152408.webp', 16999, 100.75, '[Free shipping]2021 โน๊ตบุ๊คมือ1แท้ gaming laptop computer new คอมพิวเตอร์ AMD Ryzen R7/R5 /12/20GB RAM/SSD 256/512GB/Window 10 notebook คอมพิวเตอร์ gta v โน๊ตบุ๊ค สายเกม AST legion 5\r\nบริการหลังการขายออนไลน์ตลอด 24 ชั่วโมง สั่งซื้อตอนนี้มีโอกาสอัพเกรด CPU เป็น Ryzen 7-3700U ฟรี             ', 10, 1, 39),
(36, 'Xiaomi 11T Pro โทรศัพท์มือถือ', 'Picture11817906520211016_152605.jpg', 16990, 0, '108MP pro-grade camera\r\n120W Xiaomi HyperCharge\r\n120Hz AMOLED, Dolby Vision supported\r\nFlagship Qualcomm SnapdragonTM 888             ', 3, 1, 37),
(37, 'TECNO Mobile POVA 2 6/128GB ', 'Picture88451537320211016_153027.jpg', 5990, 100, 'ชื่อรุ่น   POVA 2   ระบบปฎิบัติการ   Android 11\r\n\r\nซีพียู    MTK Helio G85 , Octa Core\r\n\r\nคลื่นความถี่     4G/4G\r\n\r\nขนาดเครื่อง   171.2 x 77.6 x 9.4 mm mm จอแสดงผล 6.9  นิ้ว SD ความละเอียดจอ  1080 * 2460\r\n\r\nกล้องหน้า 8 ล้าน พร้อมแฟลช กล้องหลัง  48 + 2 +2 + Q ล้านพร้อมแฟลช\r\n\r\nหน่วยความจำ   แรม  6 GB , รอม  128 GB  ( เพิ่ม sd card ได้ 512 )\r\n\r\nการเชื่อมต่อไร้สาย   WIFI 5.0 / BT/FM/GPS เซนเซอร์ และอื่นๆ    GPS , WIFI , FM , BT , OTG\r\n\r\nแบตเตอรี่ 7000 mAh , 18W flash charge\r\n\r\nซิมการ์ด  Dual SIM', 6, 1, 37),
(40, 'เสื้อลายวัว เสื้อมาใหม่', '155584872020211018_102524.jpg', 140.5, 50, '             เสื้อยืดแขนสั้นลายวัว ผ้าดีหนานุ่ม ขนาดเสื้อลายวัวขาว วัวเขียวM อก 40 นิ้ว ยาว 25 นิ้ว L อก 42 นิ้ว ยาว 26 นิ้วXL อก 44 นิ้ว ยาว 26 นิ้ว2XL อก 46 นิ้ว ยาว 27 นิ้ว ขนาดเสื้อลายวัวแดง วัวดำM อก 41 นิ้ว ยาว 26 นิ้วL อก 42 นิ้ว ยาว 27 นิ้วXL อก 43 นิ้ว ยาว 27 นิ้ว2XL อก 44 นิ้ว ยาว 28 นิ้ว ลายวัวขาว ลายวัวเขียว วัวแดง วัวดำ                                       ', 8, 7, 41),
(43, 'กางเกง2', 'Picture205457834120211019_154050.jpg', 2000.75, 0, 'ดกหดกหดกห                                       ', 0, 7, 44);

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `ShipperID` int(15) NOT NULL,
  `ComName` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`ShipperID`, `ComName`, `Phone`) VALUES
(1, 'Kerry', '099'),
(2, 'Flash', '099'),
(3, 'Thailand Post', '099'),
(6, 'test', '01414141');

-- --------------------------------------------------------

--
-- Table structure for table `shopowner`
--

CREATE TABLE `shopowner` (
  `OwID` int(15) NOT NULL,
  `OwPassword` varchar(50) NOT NULL,
  `OwName` varchar(50) NOT NULL,
  `OwEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopowner`
--

INSERT INTO `shopowner` (`OwID`, `OwPassword`, `OwName`, `OwEmail`) VALUES
(1, '111', 'shop1', '111@gmail.com'),
(2, '222', 'shop2', '222@gmail.com'),
(7, '123', 'testshop', 'testshop@gmail.com'),
(8, 'Sai-0107', 'ร้านธงฟ้า', 'ariya0107@hotmail.com'),
(9, '123', 'ชมลดา ชมศร', 'pbchomsorn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `SCatID` int(15) NOT NULL,
  `SCatIDName` varchar(50) NOT NULL,
  `CatID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`SCatID`, `SCatIDName`, `CatID`) VALUES
(34, 'ข้าวสาร', 7),
(36, 'อาหารกึ่งสำเร็จรูป', 7),
(37, 'โทรศัพท์มือถือ', 6),
(39, 'โน๊ตบุ๊ค', 6),
(41, 'เสื้อ', 10),
(44, 'กางเกง', 13);

-- --------------------------------------------------------

--
-- Stand-in structure for view `type_list`
-- (See below for the actual view)
--
CREATE TABLE `type_list` (
`CatID` int(15)
,`SCatID` int(15)
,`SCatIDName` varchar(50)
,`CatName` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `type_list`
--
DROP TABLE IF EXISTS `type_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `type_list`  AS SELECT `sub_category`.`CatID` AS `CatID`, `sub_category`.`SCatID` AS `SCatID`, `sub_category`.`SCatIDName` AS `SCatIDName`, `category`.`CatName` AS `CatName` FROM (`sub_category` join `category` on(`sub_category`.`CatID` = `category`.`CatID`)) ORDER BY `category`.`CatID` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `ProID` (`ProID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CatID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ShipperID` (`ShipperID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrDetID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProID` (`ProID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProID`),
  ADD KEY `SCatID` (`SCatID`),
  ADD KEY `OwID` (`OwID`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`ShipperID`);

--
-- Indexes for table `shopowner`
--
ALTER TABLE `shopowner`
  ADD PRIMARY KEY (`OwID`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`SCatID`),
  ADD KEY `CatID` (`CatID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CatID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrDetID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `ShipperID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopowner`
--
ALTER TABLE `shopowner`
  MODIFY `OwID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `SCatID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ProID`) REFERENCES `product` (`ProID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`ShipperID`) REFERENCES `shipper` (`ShipperID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProID`) REFERENCES `product` (`ProID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SCatID`) REFERENCES `sub_category` (`SCatID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`OwID`) REFERENCES `shopowner` (`OwID`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`CatID`) REFERENCES `category` (`CatID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
