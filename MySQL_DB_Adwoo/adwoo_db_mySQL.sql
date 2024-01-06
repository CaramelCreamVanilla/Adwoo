-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 02:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adwoo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adwoo_wallat`
--

CREATE TABLE `adwoo_wallat` (
  `wallet_id` int(11) NOT NULL,
  `cus_id` int(50) NOT NULL,
  `adwoo_coin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `adwoo_wallat`
--

INSERT INTO `adwoo_wallat` (`wallet_id`, `cus_id`, `adwoo_coin`) VALUES
(1, 5, 0),
(2, 1, 15000),
(3, 2, 4891260),
(4, 4, 536220),
(5, 9, 0),
(6, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `name_brand` varchar(50) NOT NULL,
  `img_brand` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name_brand`, `img_brand`) VALUES
(1, 'Acer', 'Acer.png'),
(2, 'AMD', 'AMD.png'),
(3, 'Asus', 'Asus.png'),
(4, 'Corsair', 'Corsair.png'),
(5, 'Dell', 'Dell.png'),
(6, 'Gigabyte', 'Gigabyte.png'),
(7, 'HP', 'HP.png'),
(8, 'Intel', 'Intel.png'),
(9, 'Kingston', 'Kingston.png'),
(10, 'Lenovo', 'Lenovo.png'),
(11, 'Logitech', 'Logitech.png'),
(12, 'MSI', 'MSI.png'),
(13, 'Sandisk', 'Sandisk.png'),
(14, 'SAMSUNG', 'Sumsung.png'),
(15, 'WD', 'WD.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(20) NOT NULL,
  `qty_prod_cart` int(100) NOT NULL,
  `price_prod_total` float NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cart_round` int(20) NOT NULL,
  `status_cart` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_id`, `qty_prod_cart`, `price_prod_total`, `cus_id`, `cart_round`, `status_cart`) VALUES
(1, 1, 8, 26400, 5, 1, 2),
(2, 1, 4, 13200, 5, 2, 2),
(3, 1, 8, 26400, 1, 1, 2),
(4, 49, 1, 30490, 2, 1, 2),
(7, 30, 1, 9450, 4, 1, 2),
(8, 31, 1, 7515, 4, 1, 2),
(9, 32, 1, 2340, 4, 1, 2),
(10, 49, 1, 30490, 5, 3, 1),
(11, 11, 1, 450, 5, 4, 1),
(12, 64, 1, 3000, 5, 5, 1),
(13, 65, 1, 2790, 5, 5, 1),
(14, 69, 2, 24500, 5, 5, 1),
(15, 20, 1, 3330, 5, 5, 1),
(16, 47, 1, 490, 9, 1, 1),
(17, 3, 1, 5400, 1, 2, 1),
(18, 4, 1, 12590, 1, 2, 1),
(19, 4, 3, 37770, 1, 3, 1),
(20, 4, 1, 12590, 1, 4, 1),
(21, 3, 1, 5400, 1, 4, 1),
(22, 8, 1, 5215, 4, 2, 1),
(23, 7, 1, 19850, 4, 2, 1),
(24, 4, 1, 12590, 11, 1, 2),
(25, 3, 1, 5400, 11, 1, 2),
(26, 65, 5, 13950, 1, 5, 1),
(27, 13, 1, 7290, 1, 6, 2),
(28, 3, 1, 5400, 2, 2, 1),
(29, 15, 1, 1690, 2, 2, 1),
(30, 21, 1, 1590, 2, 2, 1),
(31, 29, 1, 73350, 2, 2, 1),
(32, 37, 1, 26690, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_total`
--

CREATE TABLE `cart_total` (
  `cart_total_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cart_round` int(11) NOT NULL,
  `total` float NOT NULL,
  `delivery_type_name` varchar(50) NOT NULL,
  `delivery_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart_total`
--

INSERT INTO `cart_total` (`cart_total_id`, `cus_id`, `cart_round`, `total`, `delivery_type_name`, `delivery_price`) VALUES
(1, 5, 1, 26400, 'Kerry', 50),
(2, 5, 2, 13200, 'Kerry', 50),
(3, 1, 1, 26400, 'Kerry', 50),
(4, 2, 1, 32350, 'J & T', 40),
(5, 4, 1, 19305, 'Best Express', 25),
(6, 5, 3, 30490, 'Best Express', 25),
(7, 5, 4, 450, 'Best Express', 25),
(8, 5, 5, 33620, 'Best Express', 25),
(9, 9, 1, 490, 'Best Express', 25),
(10, 1, 2, 17990, 'Best Express', 25),
(12, 1, 3, 37770, 'Best Express', 25),
(13, 1, 4, 17990, 'Best Express', 25),
(14, 4, 2, 25065, 'Best Express', 25),
(15, 11, 1, 17990, 'Best Express', 25),
(16, 1, 5, 13950, 'J & T', 40),
(17, 1, 6, 7290, 'J & T', 40),
(18, 2, 2, 108720, 'Best Express', 25);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_lastname` varchar(50) NOT NULL,
  `cus_address` varchar(100) NOT NULL,
  `cus_sex` varchar(10) NOT NULL,
  `cus_tel` varchar(10) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cus_username` varchar(20) NOT NULL,
  `cus_password` varchar(20) NOT NULL,
  `cus_level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_lastname`, `cus_address`, `cus_sex`, `cus_tel`, `cus_email`, `cus_username`, `cus_password`, `cus_level`) VALUES
(1, 'Koyrot', 'Lekdee', 'เด็กติดเกาะ', 'man', '0948512356', 'askfjhoWH@gmail.com', 'admin', '123', 'A'),
(2, 'kittikhun', 'tapwang', '351235', 'man', '0846521978', 'kit@kit.com', 'kit', '123', 'M'),
(3, 'aaa', 'aaa', 'aaa', 'man', '0852465985', 'aaa@aaa.com', 'aaa', '123', 'M'),
(4, 'โต', 'ซิลลี่', 'บ้าน', 'man', '0865364958', 'lel@email.com', 'kekeke', '123', 'M'),
(5, 'มูฮาหมัด', 'อาลี', '171/203 หมู่ 1 ตำบล ง่วงนอน อำเภอ ไก่จ้า จังหวัด เพชรสวย', 'man', '0645678914', 'mu@gmail.com', 'mumumumumu', '123', 'M'),
(9, 'จอห์น', 'ซีน่า', 'WWE Fight Club', 'man', '0945178452', 'Cena@email.com', 'john', '123', 'M'),
(10, 'Micro', 'Jack', '2220 Thailand Bangkok', 'man', '0810450952', 'mic@email.com', 'Mic', '123', 'M'),
(11, 'eiei', 'eiei', 'eiei', 'man', '0841752169', 'eiei@eiei.eiei', 'eiei', '123', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `del_id` int(11) NOT NULL,
  `del_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cus_id` int(11) NOT NULL,
  `cart_total_id` int(11) NOT NULL,
  `del_address` varchar(100) NOT NULL,
  `del_name` varchar(50) NOT NULL,
  `del_lastname` varchar(50) NOT NULL,
  `del_tel` varchar(10) NOT NULL,
  `delivery_type_name` varchar(100) NOT NULL,
  `sum_cart_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`del_id`, `del_date`, `cus_id`, `cart_total_id`, `del_address`, `del_name`, `del_lastname`, `del_tel`, `delivery_type_name`, `sum_cart_total`) VALUES
(1, '2022-04-18 14:17:00', 5, 1, '171/203 หมู่ 1 ตำบล ง่วงนอน อำเภอ ไก่จ้า จังหวัด เพชรสวย', 'มูฮาหมัด', 'อาลี', '0645678914', 'Kerry', 26450),
(2, '2022-04-18 14:17:19', 5, 2, '171/203 หมู่ 1 ตำบล ง่วงนอน อำเภอ ไก่จ้า จังหวัด เพชรสวย', 'มูฮาหมัด', 'อาลี', '0645678914', 'Kerry', 13250),
(3, '2022-04-18 14:21:28', 1, 3, 'เด็กติดเกาะ', 'Koyrot', 'Lekdee', '0948512356', 'Kerry', 26450),
(4, '2022-04-18 17:04:41', 2, 4, '351235', 'kittikhun', 'tapwang', '0846521978', 'J & T', 32390),
(5, '2022-04-19 12:56:32', 4, 5, 'บ้าน', 'โต', 'ซิลลี่', '0865364958', 'Best Express', 19330),
(6, '2022-04-19 15:14:02', 5, 6, '171/203 หมู่ 1 ตำบล ง่วงนอน อำเภอ ไก่จ้า จังหวัด เพชรสวย', 'มูฮาหมัด', 'อาลี', '0645678914', 'Best Express', 30515),
(7, '2022-04-19 15:14:24', 5, 7, '171/203 หมู่ 1 ตำบล ง่วงนอน อำเภอ ไก่จ้า จังหวัด เพชรสวย', 'มูฮาหมัด', 'อาลี', '0645678914', 'Best Express', 475),
(8, '2022-04-19 15:14:51', 5, 8, '171/203 หมู่ 1 ตำบล ง่วงนอน อำเภอ ไก่จ้า จังหวัด เพชรสวย', 'มูฮาหมัด', 'อาลี', '0645678914', 'Best Express', 33645),
(9, '2022-04-20 06:40:37', 9, 9, 'WWE Fight Club', 'จอห์น', 'ซีน่า', '0945178452', 'Best Express', 515),
(10, '2022-04-25 13:04:46', 1, 10, 'เด็กติดเกาะ', 'Koyrot', 'Lekdee', '0948512356', 'Best Express', 18015),
(11, '2022-04-25 13:05:31', 1, 12, 'เด็กติดเกาะ', 'Koyrot', 'Lekdee', '0948512356', 'Best Express', 37795),
(12, '2022-04-25 13:06:26', 1, 13, 'เด็กติดเกาะ', 'Koyrot', 'Lekdee', '0948512356', 'Best Express', 18015),
(13, '2022-04-25 13:07:57', 4, 14, 'บ้าน', 'โต', 'ซิลลี่', '0865364958', 'Best Express', 25090),
(14, '2022-04-27 07:36:12', 11, 15, 'eiei', 'eiei', 'eiei', '0841752169', 'Best Express', 18015),
(15, '2022-04-27 07:38:58', 1, 16, 'เด็กติดเกาะ', 'Koyrot', 'Lekdee', '0948512356', 'J & T', 13990),
(16, '2022-05-02 23:14:58', 1, 17, 'เด็กติดเกาะ', 'Koyrot', 'Lekdee', '0948512356', 'J & T', 7330),
(17, '2022-12-20 04:24:56', 2, 18, '351235', 'kittikhun', 'tapwang', '0846521978', 'Best Express', 108745);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_type`
--

CREATE TABLE `delivery_type` (
  `delivery_type_name` varchar(50) NOT NULL,
  `delivery_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `delivery_type`
--

INSERT INTO `delivery_type` (`delivery_type_name`, `delivery_price`) VALUES
('Best Express', 25),
('FLASH', 35),
('J & T', 40),
('Kerry', 50),
('ไปรษณีย์ไทย', 20);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `payment_id` int(9) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `bank_number` varchar(30) NOT NULL,
  `bank_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_id`, `payment_type`, `bank_number`, `bank_name`) VALUES
(1, 'กสิกร', '1543254513', 'Adwoo Coperation '),
(2, 'กรุงเทพ', '151152153156', 'Adwoo Corperation'),
(3, 'ออมสิน', '182184187', 'Adwoo Corperation'),
(4, 'กรุงศรีอยุธยา', '357896214', 'Adwoo Corperation');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(10) NOT NULL,
  `name_prod` varchar(100) NOT NULL,
  `name_prod_img` text NOT NULL,
  `detail_prod` varchar(10000) NOT NULL,
  `price_prod` float NOT NULL,
  `brand_id` int(10) NOT NULL,
  `prod_ty_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `name_prod`, `name_prod_img`, `detail_prod`, `price_prod`, `brand_id`, `prod_ty_id`) VALUES
(1, 'CPU AMD AM4 RYZEN 3 5800X', 'CPU AMD.png', 'Frequency : 3.8 GHz Turbo Frequency : 4.7 GHz  Cores : 8  Threads : 16', 33007.5, 2, 1),
(2, 'CPU AMD AM4 RYZEN 5 2600 (NEXT)', 'CPU AMD.png', 'Socket : AM4 Cores : 6 Threads : 12 Frequency	 : 3.4  GHz Turbo Frequency : 3.9 GHz', 5215, 2, 1),
(3, 'CPU AMD AM4 RYZEN 5 3500', 'CPU AMD.png', 'Socket : AM4 Cores : 6 Threads : 6 Frequency	 : 3.6  GHz Turbo Frequency : 4.1 GHz', 5400, 2, 1),
(4, 'CPU AMD AM4 RYZEN 7 5800X', 'CPU AMD AM4 RYZEN 7 5800X.png', 'Socket : AM4 Cores : 8 Threads : 16 Frequency	 : 3.8  GHz Turbo Frequency : 4.7 GHz', 12590, 2, 1),
(5, 'CPU AMD AM4 RYZEN 9 5950X', 'CPU AMD.png', 'Socket : AM4 Cores : 16 Threads : 32 Frequency	 : 3.4  GHz Turbo Frequency : 4.9 GHz', 26825, 2, 1),
(6, 'CPU INTEL CORE I9-12900KS LGA 1700', 'CPU INTEL CORE I9-12900KS LGA 1700.png', 'Socket : 1700 Cores : 16 Threads : 24 Frequency	 : 3.4  GHz Turbo Frequency : 5.5 GHz', 29000, 8, 1),
(7, 'CPU INTEL CORE I9-10920X LGA 2066', 'CPU INTEL CORE I9-10920X LGA 2066.png', 'Socket : 2066 Cores : 12 Threads : 24 Frequency	 : 3.5  GHz Turbo Frequency : 4.6 GHz', 19850, 8, 1),
(8, 'CPU INTEL CORE I3-12100 LGA 1700', 'CPU INTEL CORE I3-12100 LGA 1700.png', 'Socket : 1700 Cores : 4 Threads : 8 Frequency	 : 3.3  GHz Turbo Frequency : 4.3 GHz', 5215, 8, 1),
(9, 'CPU INTEL CORE I5-12600K LGA 1700', 'CPU INTEL CORE I5-12600K LGA 1700.png', 'Socket : 1700 Cores : 10 Threads : 16 Frequency	 : 3.7  GHz Turbo Frequency : 4.9 GHz', 11670, 8, 1),
(10, 'CPU INTEL CORE I7-12700K LGA 1700', 'CPU INTEL CORE I7-12700K LGA 1700.png', 'Socket : 1700 Cores : 12 Threads : 20 Frequency	 : 3.6  GHz Turbo Frequency : 5.0 GHz', 16790, 8, 1),
(11, 'HEADSET (7.1) NUBWO-X X98 (PINK)', 'HEADSET (7.1) NUBWO-X X98 (PINK).png', 'Frequency	 : 20Hz-20kHz Impedance : 32Ohm Sensitivity : 95 ±3dB Microphone : Omnidirectional', 450, 1, 2),
(12, 'HEADSET (7.1) ASUS ROG DELTA S ANIMATE', 'HEADSET (7.1) ASUS ROG DELTA S ANIMATE.png', 'Frequency	 : 20-40kHz Impedance : 32Ohm Sensitivity : N/A Microphone : Unidirectional', 6650, 3, 2),
(13, 'WIRELESS HEADSET (7.1) CORSAIR VIRTUOSO RGB SE (ESPRESSO)', 'WIRELESS HEADSET (7.1) CORSAIR VIRTUOSO RGB SE (ESPRESSO).png', 'Frequency	 : 20Hz-20kHz Impedance : 32Ohm Sensitivity : 109dB(±3dB) Microphone : Omnidirectional', 7290, 4, 2),
(14, 'HEADSET (7.1) HP H500GS GAMING (GOLD)', 'HEADSET (7.1) HP H500GS GAMING (GOLD).png', 'Frequency	 : 20Hz-20kHz Impedance : 16Ohm Sensitivity : N/A Microphone : Yes', 755, 7, 2),
(15, 'HEADSET (IN-EAR) LOGITECH G333 GAMING (BLACK)', 'HEADSET (IN-EAR) LOGITECH G333 GAMING (BLACK).png', 'Frequency	 : 20Hz-20kHz Impedance : 24 Ohms ±20% Sensitivity : 101.6±3 dB @ 1 kHz SPL Microphone : 0', 1690, 11, 2),
(16, 'WIRELESS HEADSET (2.1) LOGITECH G435 LIGHTSPEED (WHITE/LILAC)', 'WIRELESS HEADSET (2.1) LOGITECH G435 LIGHTSPEED (WHITE-LILAC).png', 'Frequency	 : 20Hz-20kHz Impedance : 45Ohm Sensitivity : 83.1 dB SPL/mW Microphone : Yes', 2160, 11, 2),
(17, '  HEADSET (2.1) PREDATOR GALEA 311 (PHW910)', 'HEADSET (2.1) PREDATOR GALEA 311 (PHW910).png', 'Frequency	 : 20Hz-20kHz Impedance : 32Ohm Sensitivity : N/A Microphone : Omni-directional', 1100, 1, 2),
(18, '  HEADSET (7.1) LENOVO H402 BLACK', 'HEADSET (7.1) LENOVO H402 BLACK.png', 'Frequency	 : 20Hz-20kHz Impedance : 32Ohm Sensitivity : 103dB±3dB Microphone : Yes', 885, 10, 2),
(19, 'KEYBOARD CORSAIR K65 RGB MINI WHITE MX RED [US]', 'KEYBOARD CORSAIR K65 RGB MINI WHITE MX RED [US].png', 'Interface : USB Keys Windows Layout : 61 Keys Key Switches : CHERRY MX RED Keyboard Backlighting : R', 3990, 4, 4),
(20, 'KEYBOARD LOGITECH G PRO X CLICKY RGB (US)', 'KEYBOARD LOGITECH G PRO X CLICKY RGB (US).png', 'Interface : USB Keys Windows Layout : 89 Keys Key Switches : GX BLUE CLICKY Keyboard Backlighting : ', 3330, 11, 4),
(21, 'KEYBOARD MSI GK-701 BROWN SWITCH', 'KEYBOARD MSI GK-701 BROWN SWITCH.png', 'Interface : USB Keys Windows Layout : 104 Keys Key Switches : GX BLACK  Keyboard Backlighting :  RGB', 1590, 12, 4),
(22, 'KEYBOARD NUBWO-X ALISTAR X33 BLUE-SWITCH (BLUE/WHITE)', 'KEYBOARD NUBWO-X ALISTAR X33 BLUE-SWITCH (BLUE-WHITE).png', 'Interface : USB Keys Windows Layout : 104 Keys Key Switches : Blue-Switch Keyboard Backlighting :  M', 685, 3, 4),
(24, 'KEYBOARD NUBWO-X ALISTAR X33 BLUE-SWITCH (RED/WHITE)', 'KEYBOARD NUBWO-X ALISTAR X33 BLUE-SWITCH (RED-WHITE).png', 'Interface : USB Keys Windows Layout : 104 Keys Key Switches : Blue-Switch Keyboard Backlighting :  M', 685, 1, 4),
(25, 'KEYBOARD CORSAIR K55 PRO RGB (TH)', 'KEYBOARD CORSAIR K55 PRO RGB (TH).png', 'Interface : USB Keys Windows Layout : 110 Keys Key Switches : Rubber Dome Keyboard Backlighting :  R', 1490, 4, 4),
(26, 'MAINBOARD (1200) MSI H510M A PRO', 'MAINBOARD (1200) MSI H510M A PRO.png', 'CPU Support : Supports 10th Gen Intel® Core™ Processors, 11th Gen Intel® Core™ Processors,  Pentium®', 2325, 12, 5),
(27, 'MAINBOARD (AM4) MSI B450 TOMAHAWK MAX II', 'MAINBOARD (AM4) MSI B450 TOMAHAWK MAX II.png', 'CPU Support : Supports 1st, 2nd and 3rd Gen AMD Ryzen™/ Ryzen™ with Radeon™ Vega Graphics and 2nd Ge', 3155, 12, 5),
(28, 'MAINBOARD (1700) GIGABYTE Z690 UD (REV.1.0)', 'MAINBOARD (1700) GIGABYTE Z690 UD (REV.1.0).png', 'CPU Support : LGA1700 socket: Support for 12th Generation Intel® Core™ i9 processors/Intel® Core™ i7', 6965, 6, 5),
(29, 'MAINBOARD (1700) MSI MEG Z690 GODLIKE ,LC S360 DDR5 16GB', 'MAINBOARD (1700) MSI MEG Z690 GODLIKE ,LC S360 DDR5 16GB.png', 'CPU Support : Supports 12th Gen Intel® Core™ Processors, Pentium® Gold and Celeron® Processors* Proc', 73350, 12, 5),
(30, 'MAINBOARD (1700) ASUS ROG STIRX B660-F GAMING WIFI', 'MAINBOARD (1700) ASUS ROG STIRX B660-F GAMING WIFI.png', 'CPU Support : Intel® Socket LGA1700 for 12th Gen Intel® Core™, Pentium® Gold and Celeron® Processors', 9450, 3, 5),
(31, 'MAINBOARD (1700) GIGABYTE B660 A MASTER DDR4 (REV1.3)', 'MAINBOARD (1700) GIGABYTE B660 A MASTER DDR4 (REV1.3).png', 'CPU Support : LGA1700 socket: Support for 12th Generation Intel® Core™, Pentium® Gold and Celeron® P', 7515, 6, 5),
(32, 'MAINBOARD (1200) ASUS H510M-K', 'MAINBOARD (1200) ASUS H510M-K.png', 'CPU Support : Intel® Socket LGA1200 for 11th Gen Intel® Core™ Processors & 10th Gen Intel® Core™, Pe', 2340, 3, 5),
(33, 'MAINBOARD (AM4) GIGABYTE B450M AORUS ELITE (REV1.1)', 'MAINBOARD (AM4) GIGABYTE B450M AORUS ELITE (REV1.1).png', 'CPU Support : AMD Socket AM4, support for: AMD Ryzen™ 5000 series Socket : AM4 Chipset : AMD B450', 2690, 6, 5),
(34, 'MAINBOARD (1700) ASUS ROG MAXIMUS Z690 EXTREME', 'MAINBOARD (1700) ASUS ROG MAXIMUS Z690 EXTREME.png', 'CPU Support : Intel® Socket LGA1700 for 12th Gen Intel® Core™, Pentium® Gold and Celeron® Processors', 35600, 3, 5),
(35, 'Monitor 49\' SAMSUNG ODYSSEY LC49G95TSSEXXT (VA, HDMI, DP ) CURVE G-SYNC 2K 240Hz', 'Monitor_49___SAMSUNG_ODYSSEY_LC49G95TSSEXXT__VA__HDMI__DP___CURVE_G-SYNC_2K_240Hz.png', 'Screen Size : 49\" Maximum Resolution	: 5120 x 1440 Refresh Rate : 240Hz Aspect Ratio :   32:9', 39890, 14, 6),
(36, 'Monitor 31.5\' MSI Optix G32C4 (VA, HDMI, DP) CURVE 165Hz', 'Monitor_31.5___MSI_Optix_G32C4__VA__HDMI__DP__CURVE_165Hz.png', 'Screen Size : 31.5\" Maximum Resolution	: 1920 x 1080 Refresh Rate : 165Hz Aspect Ratio :   16:9', 8890, 12, 6),
(37, '  Monitor 32\' GIGABYTE M32U (IPS, HDMI, DP, USB-C, SPK) 4K 144Hz', 'Monitor_32___GIGABYTE_M32U__IPS__HDMI__DP__USB-C__SPK__4K_144Hz.png', 'Screen Size : 31.5\" Maximum Resolution	: 3840 x 2160 Refresh Rate : 144Hz  Aspect Ratio :   16:9', 26690, 6, 6),
(38, 'Monitor 31.5\' DELL U3219Q (IPS, DP, HDMI, USB-C) 60Hz', 'Monitor_31.5___DELL_U3219Q__IPS__DP__HDMI__USB-C__60Hz.png', 'Screen Size : 31.5\" Maximum Resolution	: 3840 x 2160 Refresh Rate : 60Hz Aspect Ratio :   16:9', 31500, 5, 6),
(39, 'Monitor 21.5\' LENOVO L22i-30 (IPS, VGA, HDMI) 75Hz', 'Monitor_21.5___LENOVO_L22i-30__IPS__VGA__HDMI__75Hz.png', 'Screen Size : 21.5\" Maximum Resolution	: 1920 x 1080 Refresh Rate : 75Hz Aspect Ratio :   16:9', 4390, 10, 6),
(40, 'Monitor 21.5\' ASUS VP228HE (TN, VGA, HDMI, SPK) 60Hz', 'Monitor_21.5___ASUS_VP228HE__TN__VGA__HDMI__SPK__60Hz.png', 'Screen Size : 21.5\" Maximum Resolution	: 1920 x 1080 Refresh Rate : 60 Hz Aspect Ratio :   16:9', 3950, 3, 6),
(41, '  Monitor 21.5\' HP M22F (IPS, VGA, HDMI) 75Hz', 'Monitor_21.5___HP_M22F__IPS__VGA__HDMI__75Hz.png', 'Screen Size : 21.5\" Maximum Resolution	: 1920 x 1080 Refresh Rate : 60 Hz Aspect Ratio :   16:9', 4500, 7, 6),
(42, 'MOUSE NUBWO-X VISTOR X44 (BLACK)', 'MOUSE NUBWO-X VISTOR X44 (BLACK).png', 'Interface : USB Resolution	: 12800DPI Buttons : 6 Buttons', 340, 1, 7),
(43, 'MOUSE ASUS TUF GAMING M4 AIR', 'MOUSE ASUS TUF GAMING M4 AIR.png', 'Interface : USB Resolution	: 16000 DPI Buttons : 6 Buttons', 1235, 3, 7),
(44, 'WIRELESS MOUSE CORSAIR KATAR PRO', 'WIRELESS MOUSE CORSAIR KATAR PRO.png', 'Interface : USB Resolution	: 10,000 DPI Buttons : 6 Buttons', 1490, 4, 7),
(45, 'MOUSE LENOVO LEGION GAMING (M300) RGB', 'MOUSE LENOVO LEGION GAMING (M300) RGB.png', 'Interface : USB Resolution	: Up to 8,000 DPI Buttons : 8 Buttons', 690, 10, 7),
(46, 'MOUSE PREDATOR CESTUS 330 (PMW920)', 'MOUSE PREDATOR CESTUS 330 (PMW920).png', 'Interface : USB Resolution	: 16000 dpi Buttons : 7 Buttons', 1410, 1, 7),
(47, 'MOUSE HP G200 GAMING (BLACK)', 'MOUSE HP G200 GAMING (BLACK).png', 'Interface : USB Resolution	: • DPI : 500-1000-1500-2000-3000-4000 DPI adjustable • Report Rate: 500H', 490, 7, 7),
(48, 'Notebook MSI Crosshair 15 Rainbow Six Extraction Edition B12UGZ-282TH (Black/Yellow)', 'Notebook MSI Crosshair 15 Rainbow Six Extraction Edition B12UGZ-282TH (Black-Yellow).png', 'Processor	: Intel Core i7-12700H (2.3GHz up to 4.7GHz, 24MB Intel Smart Cache)\nGraphics : NVIDIA GeForce RTX 3070 (8GB GDDR6)\nDisplay Screen : 15.6\" 2560x1440 (QHD), IPS, 165Hz\nMain Memory : 32GB (16GB x2) DDR4 3200MHz\nMemory Slot : 2x Slots\nMax Memory : 64GB\nStorage Slot : 2x M.2 SSD slot (NVMe PCIe Gen4)\n', 82400, 12, 8),
(49, 'Notebook HP Victus Gaming 16-e0234AX (Ceramic White)', 'Notebook HP Victus Gaming 16-e0234AX (Ceramic White).png', 'Processor	: AMD Ryzen 5 5600H (3.3GHz up to 4.2GHz, 3MB L2 Cache / 16MB L3 Cache)\nGraphics : NVIDIA GeForce GTX 1650 (4GB GDDR6)\nDisplay Screen : 16.1\" 1920x1080 (FHD), IPS, 144Hz, 7 ms response time, IPS, micro-edge, anti-glare, Low Blue Light, 300 nits, 100% sRGB\nMain Memory : 8GB (8GB x1) DDR4 3200MHz\nMemory Slot : 2x Slots\nMax Memory : 32GB\nStorage : 512GB PCIe NVMe M.2 SSD\nStorage Slot : 2x M.2 SSD\n', 30490, 7, 8),
(50, 'Notebook DELL Gaming AWM15R6-W569212300THW10 (Dark Side)', 'Notebook DELL Gaming AWM15R6-W569212300THW10 (Dark Side).png', 'Processor	: Intel Core i7-11800H (2.3GHz up to 4.6GHz, 24MB Intel Smart Cache)\nGraphics : NVIDIA GeForce RTX 3070 (8GB GDDR6)\nDisplay Screen : 15.6\" 2560x1440 (QHD), WVA, 240Hz, 2ms with ComfortView Plus, NVIDIA G-SYNC and Advanced Optimus\nMain Memory : 32GB DDR4 3200MHz\nMemory Slot : 2x Slots\nMax Memory : 32GB (Max)\nStorage : 1TB PCIe NVMe M.2 SSD\nStorage Slot : N/A\n', 86390, 5, 8),
(51, 'Notebook Acer Nitro AN515-45-R4U8/T00A (Shale Black)', 'Notebook Acer Nitro AN515-45-R4U8-T00A (Shale Black).png', 'Processor	: AMD Ryzen 7 5800H (3.2GHz up to 4.4GHz, 4MB L2 Cache / 16MB L3 Cache)\nGraphics : NVIDIA GeForce RTX 3060 (6GB GDDR6)\nDisplay Screen : 15.6\" 2560x1440 (QHD), IPS, 165Hz, Slim bezel, 3 ms Overdrive, 100% sRGB\nMain Memory : 16GB (8GB x2) DDR4\nMemory Slot : 2x Slots\nMax Memory : 32GB\nStorage : 512GB PCIe NVMe M.2 SSD\nStorage Slot : 2x M.2 SSD\n', 36550, 1, 8),
(52, 'Notebook Asus ROG Strix Scar 17 G743ZW-LL161W (Off Black)', 'Notebook Asus ROG Strix Scar 17 G743ZW-LL161W (Off Black).png', 'Processor	: Intel Core i9-12900H (2.5GHz up to 5.0GHz, 24MB Intel Smart Cache)\nGraphics : NVIDIA GeForce RTX 3070 Ti (8GB GDDR6)\nDisplay Screen : 17.3\'\' 2560x1440 , IPS ,240Hz\nMain Memory : 32GB (16GB x2) DDR5 4800MHz\nMemory Slot : 2x Slots\nMax Memory : 64GB\nStorage : 1TB PCIe NVMe M.2 SSD\nStorage Slot : 2x M.2 PCIe SSD\n', 92990, 3, 8),
(53, 'Notebook Asus TUF Dash FX516PM-HN191T (Moonlight White)', 'Notebook Asus TUF Dash FX516PM-HN191T (Moonlight White).png', 'Processor	: Intel Core i7-11370H (3.3GHZ up to 4.8GHz, 12MB Intel Smart Cache)\nGraphics : NVIDIA GeForce RTX 3060 (6GB GDDR6)\nDisplay Screen : 17.3\'\' 2560x1440 , IPS ,240Hz\nMain Memory : 32GB (16GB x2) DDR5 4800MHz\nMemory Slot : 1x Slots\nMax Memory : 32GB\nStorage : 512GB PCIe NVMe M.2 SSD\nStorage Slot : 2x M.2  SSD\n', 40990, 3, 8),
(54, 'Notebook Gigabyte Aorus 15 XE4-73THB14GH (Black)', 'Notebook Gigabyte Aorus 15 XE4-73THB14GH (Black).png', 'Processor	: Intel Core i7-12700H (3.5GHz up to 4.7GHz, 24MB Intel Smart Cache)\nGraphics : NVIDIA GeForce RTX 3070 Ti (8GB GDDR6)\nDisplay Screen : 15.6\" 2560x1440 (QHD), IPS, 165Hz, Anti-glare, 72% NTSC\nMain Memory : 16GB (8GB x2) DDR4 3200MHz\nMemory Slot : 2x Slots\nMax Memory : 64GB\nStorage : 1TB PCIe NVMe M.2 SSD\nStorage Slot : 2x M.2 SSD\n', 69190, 6, 8),
(55, 'Notebook Lenovo Legion5 Pro 16ITH6H 82JD00CYTA (Strom Grey)', 'Notebook Lenovo Legion5 Pro 16ITH6H 82JD00CYTA (Strom Grey).png', 'Processor	: Intel Core i7-11800H (2.3GHz up to 4.6GHz, 24MB Intel Smart Cache)\nGraphics : NVIDIA GeForce RTX 3070 (8GB GDDR6)\nDisplay Screen : 16.0\" 2560x1600 (WQXGA), IPS, 165Hz, 500nits, Anti-Glare, 100% sRGB, Dolby Vision, HDR 400,  G-Sync, DC dimmer\nMain Memory : 32GB (16GB x2) DDR4 3200MHz\nMemory Slot : 2x Slots\nMax Memory : 64GB\nStorage : 1TB PCIe NVMe M.2 SSD\nStorage Slot : 2x M.2 SSD\n', 63350, 10, 8),
(56, 'POWER SUPPLY (80+ PLATINUM) 1000W CORSAIR HX1000', 'POWER SUPPLY (80+ PLATINUM) 1000W CORSAIR HX1000.png', 'Type : ATX12V v2.4 and EPS 2.92 standards and is backward compatible with ATX12V 2.2, 2.31 and ATX12', 7340, 4, 9),
(57, 'POWER SUPPLY (80+ PLATINUM) 1000W ASUS ROG 1000P2', 'POWER SUPPLY (80+ PLATINUM) 1000W ASUS ROG 1000P2.png', 'Type : ATX12V Power Capacity : 1000W Input Voltage : 100-240Vac', 11290, 3, 9),
(58, 'POWER SUPPLY (80+ PLATINUM) 1200W GIGABYTE AORUS P1200W', 'POWER SUPPLY (80+ PLATINUM) 1200W GIGABYTE AORUS P1200W.png', 'Type : Intel From Factor ATX12V v2.31 Power Capacity : 1200W Input Voltage : 100-240 Vac (Full Range', 10590, 6, 9),
(59, 'MINI POWER SUPPLY (80+ PLATINUM) 600W CORSAIR SF600 SFX', 'MINI POWER SUPPLY (80+ PLATINUM) 600W CORSAIR SF600 SFX.png', 'Type : ATX12V  v2.4, EPS12V v2.92 Power Capacity : 600W Input Voltage : 100-240V', 4410, 4, 9),
(60, 'POWER SUPPLY 550W NUBWO NPS-030', 'POWER SUPPLY (80+ BRONZE) 450W CORSAIR CV450.png', 'Type : ATX12V v2.31 and EPS 2.92 standards Power Capacity : 450W Input Voltage : 100-240V', 1390, 4, 9),
(61, 'POWER SUPPLY (80+ BRONZE) 550W GIGABYTE P550B', 'POWER SUPPLY (80+ BRONZE) 550W GIGABYTE P550B.png', 'Type : Intel Form Factor ATX 12V v2.31 Power Capacity : 550W Input Voltage : 100-240 Vac(full range)', 1695, 6, 9),
(62, 'POWER SUPPLY (80+ BRONZE) 650W CORSAIR CX650F RGB WHITE', 'POWER SUPPLY (80+ BRONZE) 650W CORSAIR CX650F RGB WHITE.png', 'Type : ATX12V v2.4, EPS12V v2.92 Power Capacity : 650W Input Voltage : 100 - 240V', 3690, 4, 9),
(63, 'POWER SUPPLY (80+ GOLD) 750W MSI MPG A750GF', 'POWER SUPPLY (80+ GOLD) 750W MSI MPG A750GF.png', 'Type : ATX Power Capacity : 750W Input Voltage : 100 - 240 Vac', 3250, 12, 9),
(64, 'RAM DDR4(3200) 16GB KINGSTON FURY RENEGADE RGB (KF432C16RB1A/16)', 'RAM DDR4(3200) 16GB KINGSTON FURY RENEGADE RGB (KF432C16RB1A-16).png', 'Memory Size : 16GB Memory Type : DDR4 BUS : 3200 MHz', 3000, 9, 10),
(65, 'RAM DDR4(2666) 16GB (8GBX2) KINGSTON FURY BEAST RGB (KF426C16BBAK2/16)', 'RAM DDR4(2666) 16GB KINGSTON FURY BEAST RGB (KF426C16BB1A-16).png', 'Memory Size : 16GB (8GBx2) Memory Type : DDR4 BUS : 2666 MHz', 2790, 1, 10),
(66, 'RAM DDR4(3200) 16GB (8GBX2) KINGSTON FURY RENEGADE (KF432C16RBK2/16)', 'RAM DDR4(3200) 16GB (8GBX2) KINGSTON FURY RENEGADE (KF432C16RBK2-16).png', 'Memory Size : 16GB (8GBx2) Memory Type : DDR4 BUS : 3200 MHz', 3200, 9, 10),
(67, 'RAM DDR4(2666) 16GB (8GBX2) CORSAIR VENGEANCE LPX RED (CMK16GX4M2A2666C16R)', 'RAM DDR4(2666) 16GB (8GBX2) CORSAIR VENGEANCE LPX RED (CMK16GX4M2A2666C16R).png', 'Memory Size : 16GB (8GBX2) Memory Type : DDR4 BUS : 2666 MHz', 2715, 4, 10),
(68, 'RAM DDR5(5600) 32GB (16GBX2) CORSAIR DOMINATOR PLATINUM BLACK RGB (CMT32GX5M2X5600C36)', 'RAM DDR4(3600) 32GB (16GBX2) CORSAIR VENGEANCE RGB RS BLACK (CMG32GX4M2D3600C18).png', 'Memory Size : 32GB (16GBx2) Memory Type : DDR5 BUS : 5600 MHz', 17250, 4, 10),
(69, 'RAM DDR5(5200) 32GB (16GBX2) CORSAIR VENGEANCE LPX BLACK (CMK32GX5M2B5200C40 )', 'RAM DDR5(5200) 32GB (16GBX2) CORSAIR VENGEANCE LPX BLACK (CMK32GX5M2B5200C40 ).png', 'Memory Size : 32GB (16GBx2) Memory Type : DDR5 BUS : 5200 MHz', 12250, 4, 10),
(70, 'RAM DDR4(3600) 32GB (16GBX2) CORSAIR VENGEANCE RGB RT WHITE (CMN32GX4M2Z3600C18)', 'RAM DDR4(3600) 32GB (16GBX2) CORSAIR VENGEANCE RGB RT WHITE (CMN32GX4M2Z3600C18).png', 'Memory Size : 32GB (16GBx2) Memory Type : DDR4 BUS : 3600 MHz', 6815, 4, 10),
(71, 'RAM DDR4(3600) 32GB (16GBX2) CORSAIR VENGEANCE RGB RS BLACK (CMG32GX4M2D3600C18)', 'RAM DDR4(3600) 32GB (16GBX2) CORSAIR VENGEANCE RGB RS BLACK (CMG32GX4M2D3600C18).png', 'Memory Size : 32GB (16GBx2) Memory Type : DDR4 BUS : 3600 MHz', 6590, 4, 10),
(72, '500 GB SSD M.2 PCIe MSI SPATIUM M390 NVMe', '500 GB SSD M.2 PCIe MSI SPATIUM M390 NVMe.png', 'Capacity : 500GB Interface : PCIe Gen3 x4, NVMe 1.4 Sequential Read : Up to 3,300 MB/s Sequential Wr', 2270, 12, 11),
(73, '512 GB SSD M.2 PCIe GIGABYTE (GSM2NE3512GNTD-1.0) NVMe', '512 GB SSD M.2 PCIe GIGABYTE (GSM2NE3512GNTD-1.0) NVMe.png', 'Capacity : 512GB Interface : PCIe Gen 3.0 x4, NVMe 1.3 Sequential Read : Up to 1,700 MB/s Sequential', 2010, 6, 11),
(74, '500 GB SSD M.2 PCIe SAMSUNG 980 (MZ-V8V500BW) NVMe', '500 GB SSD M.2 PCIe SAMSUNG 980 (MZ-V8V500BW) NVMe.png', 'Capacity : 500GB Interface : PCIe Gen 3.0 x4, NVMe 1.4 Sequential Read : Up to 3,100MB/s Sequential ', 2300, 14, 11),
(75, '1 TB SSD M.2 WD BLUE (WDS100T2B0B) SATA M.2 2280', '1 TB SSD M.2 WD BLUE (WDS100T2B0B) SATA M.2 2280.png', 'Capacity : 1TB Interface : SATA III 6Gb/s Sequential Read : Up to 560 MB/s Sequential Write : Up to ', 4240, 15, 11),
(76, '240 GB SSD M.2 PCIe CORSAIR MP510 (F240GBMP510) NVMe', '240 GB SSD M.2 PCIe CORSAIR MP510 (F240GBMP510) NVMe.png', 'Capacity : 240 GB Interface : PCIe Gen 3.0 x4 Sequential Read : Up to 3,100MB/s Sequential Write : U', 1770, 4, 11),
(77, '120 GB SSD SATA KINGSTON A400 (SA400S37/120G)', '120 GB SSD SATA KINGSTON A400 (SA400S37-120G).png', 'Capacity : 120 GB Interface : SATA Rev. 3.0 (6Gb/s) Sequential Read : Up to 500 MB/s Sequential Writ', 835, 9, 11),
(78, '2 TB SSD SATA SAMSUNG 870 QVO (MZ-77Q2T0BW)', '2 TB SSD SATA SAMSUNG 870 QVO (MZ-77Q2T0BW).png', 'Capacity : 2TB Interface : SATA 6 Gb/s Interface, compatible with SATA 3 Gb/s & SATA 1.5 Gb/s interf', 6990, 14, 11),
(79, '  500 GB SSD SATA WD BLUE (WDS500G2B0A) 3D NAND', '500 GB SSD SATA WD BLUE (WDS500G2B0A) 3D NAND.png', 'Capacity : 500 GB Interface : SATA III 6Gb/s Sequential Read : Up to 560 MB/s Sequential Write : Up ', 2290, 15, 11),
(80, 'VGA AMD RADEON PRO W6600 - 8GB DDR6', 'VGA AMD RADEON PRO W6600 - 8GB DDR6.png', 'Memory Size : 8 GB Memory Type : DDR6 Memory Interface : 128-bit CUDA Core / Stream Processors : 179', 27900, 2, 12),
(81, 'VGA ASUS RADEON RX 6700XT CHALLENGER D OC - 12GB GDDR6', 'VGA ASROCK RADEON RX 6700XT CHALLENGER D OC - 12GB GDDR6.png', 'Memory Size : 12 GB Memory Type : GDDR6 Memory Interface : 192-bit CUDA Core / Stream Processors : 2', 31900, 3, 12),
(82, 'VGA ASUS GEFORCE GTX 1650 TUF GAMING O4G-P - 4GB GDDR6', 'VGA ASUS GEFORCE GTX 1650 TUF GAMING O4G-P - 4GB GDDR6.png', 'Memory Size : 4 GB Memory Type : GDDR6 Memory Interface : 128-bit CUDA Core / Stream Processors : 89', 9600, 3, 12),
(83, 'VGA ASUS RADEON RX 6600XT ROG STRIX O8G GAMING OC - 8GB GDDR6X', 'VGA ASUS RADEON RX 6600XT ROG STRIX O8G GAMING OC - 8GB GDDR6X.png', 'Memory Size : 8 GB Memory Type : GDDR6 Memory Interface : 128-bit CUDA Core / Stream Processors : 20', 21900, 3, 12),
(84, 'VGA GIGABYTE GEFORCE GTX 1660 OC - 6GB DDR5', 'VGA GIGABYTE GEFORCE GTX 1660 OC - 6GB DDR5.png', 'Memory Size : 6 GB Memory Type : GDDR5 Memory Interface : 192-bit CUDA Core / Stream Processors : 14', 13500, 3, 12),
(85, 'VGA GIGABYTE NVIDIA QUADRO RTX A2000 - 6GB GDDR6', 'VGA GIGABYTE NVIDIA QUADRO RTX A2000 - 6GB GDDR6.png', 'Memory Size : 6 GB Memory Type : GDDR6 Memory Interface : 192-bit CUDA Core / Stream Processors : 33', 25700, 6, 12),
(86, 'VGA GIGABYTE RADEON RX 6500XT GAMING OC - 4GB GDDR6', 'VGA GIGABYTE RADEON RX 6500XT GAMING OC - 4GB GDDR6.png', 'Memory Size : 4 GB Memory Type : GDDR6 Memory Interface : 64-bit CUDA Core / Stream Processors : 102', 10900, 6, 12),
(87, 'VGA GIGABYTE GEFORCE GTX 1650 DUAL FAN - 4GB GDDR6 [VCG16504D6DFPPB]', 'VGA PNY GEFORCE GTX 1650 DUAL FAN - 4GB GDDR6 [VCG16504D6DFPPB].png', 'Memory Size : 4 GB Memory Type : GDDR6 Memory Interface : 128-bit CUDA Core / Stream Processors : 89', 8825, 6, 12),
(88, 'VGA ASUS RADEON RX 6800XT TUF O16G GAMING - 16GB GDDR6X', 'VGA ASUS RADEON RX 6800XT TUF O16G GAMING - 16GB GDDR6X.png', 'Memory Size : 16 GB Memory Type : GDDR6 Memory Interface : 256-bit CUDA Core / Stream Processors : 4', 44900, 3, 12),
(90, 'cpu core 2 duo', 'GPU101.jpg', 'โคตรแรง', 5000000000, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `prod_ty_id` int(10) NOT NULL,
  `name_ty_prod` varchar(50) NOT NULL,
  `img_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`prod_ty_id`, `name_ty_prod`, `img_type`) VALUES
(1, 'CPU', 'CPU.png'),
(2, 'Earphone', 'Earphone.png'),
(4, 'Keyboard', 'Keyboard.png'),
(5, 'Mainboard', 'Mainboard.png'),
(6, 'Monitor', 'Monitor.png'),
(7, 'Mouse', 'Mouse.png'),
(8, 'Notebook', 'Notebook.png'),
(9, 'PowerSupply', 'PowerSupply.png'),
(10, 'RAM', 'RAM.png'),
(11, 'Storage', 'Storage.png'),
(12, 'VGA', 'VGA.png');

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `round_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`round_count`) VALUES
(4),
(2),
(1),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_cart` int(1) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_cart`, `status`) VALUES
(0, 'รอชำระเงิน'),
(1, 'กำลังเตรียมของ'),
(2, 'กำลังจัดส่ง');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_confrim`
--

CREATE TABLE `wallet_confrim` (
  `wallet_id_confirm` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `adwoo_coin_c` float NOT NULL,
  `wallet_img` text NOT NULL,
  `payment_type_wallet` varchar(50) NOT NULL,
  `bank_number_wallet` varchar(30) NOT NULL,
  `bank_name_wallet` varchar(50) NOT NULL,
  `admin_confirm` int(1) NOT NULL,
  `wallet_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wallet_confrim`
--

INSERT INTO `wallet_confrim` (`wallet_id_confirm`, `cus_id`, `adwoo_coin_c`, `wallet_img`, `payment_type_wallet`, `bank_number_wallet`, `bank_name_wallet`, `admin_confirm`, `wallet_time`) VALUES
(3, 5, 500000, 'download.png', 'กสิกร', '1543254513', 'Adwoo Coperation ', 1, '2022-04-18 14:16:39'),
(4, 1, 15000000, 'download.png', 'กสิกร', '1543254513', 'Adwoo Coperation ', 1, '2022-04-18 14:21:17'),
(5, 2, 150000, 'download.png', 'กสิกร', '1543254513', 'Adwoo Coperation ', 1, '2022-04-18 17:04:06'),
(6, 4, 580640, 'download.png', 'กรุงเทพ', '151152153156', 'Adwoo Corperation', 1, '2022-04-19 12:56:04'),
(7, 3, 350, 'download.png', 'กรุงศรีอยุธยา', '357896214', 'Adwoo Corperation', 3, '2022-04-27 07:36:02'),
(8, 9, 615, 'สลีป 1.png', 'กสิกร', '1543254513', 'Adwoo Coperation ', 1, '2022-04-20 05:11:57'),
(9, 9, -50, 'สลีป 1.png', 'กสิกร', '1543254513', 'Adwoo Coperation ', 3, '2022-04-29 20:17:38'),
(10, 11, 50000, '1150.jpg', 'กสิกร', '1543254513', 'Adwoo Coperation ', 1, '2022-04-27 07:35:56'),
(11, 2, 5000000, '1150.jpg', 'กสิกร', '1543254513', 'Adwoo Coperation ', 1, '2022-12-20 04:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `withdraw_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `payment_type_withdraw` varchar(50) NOT NULL,
  `bank_number_withdraw` varchar(30) NOT NULL,
  `bank_name_withdraw` varchar(50) NOT NULL,
  `adwoo_coin_withdraw` float NOT NULL,
  `status_withdraw` int(1) NOT NULL,
  `withdraw_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`withdraw_id`, `cus_id`, `payment_type_withdraw`, `bank_number_withdraw`, `bank_name_withdraw`, `adwoo_coin_withdraw`, `status_withdraw`, `withdraw_time`) VALUES
(1, 2, 'K-Bank', '150051150', 'จุติ', 117610, 1, '2022-04-18 17:06:34'),
(2, 9, 'กรุงไทย', '250407511', 'john cena', 100, 1, '2022-04-20 07:07:30'),
(3, 5, 'K-bank', '250407511', 'นักมวยในตำนาน', 395665, 1, '2022-04-20 15:59:42'),
(4, 11, 'กสิกร', '6565989', 'ประหยัด', 31985, 0, '2022-04-27 07:36:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adwoo_wallat`
--
ALTER TABLE `adwoo_wallat`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `cus_id_2` (`cus_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `status_id` (`status_cart`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `cart_round` (`cart_round`);

--
-- Indexes for table `cart_total`
--
ALTER TABLE `cart_total`
  ADD PRIMARY KEY (`cart_total_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `delivery_type_name` (`delivery_type_name`),
  ADD KEY `delivery_type_name_2` (`delivery_type_name`),
  ADD KEY `cart_round` (`cart_round`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`del_id`),
  ADD KEY `delivery_type` (`delivery_type_name`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `cart_total_id` (`cart_total_id`);

--
-- Indexes for table `delivery_type`
--
ALTER TABLE `delivery_type`
  ADD PRIMARY KEY (`delivery_type_name`),
  ADD KEY `delivery_type_name` (`delivery_type_name`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `brand_id` (`brand_id`,`prod_ty_id`),
  ADD KEY `prod_ty_id` (`prod_ty_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`prod_ty_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_cart`);

--
-- Indexes for table `wallet_confrim`
--
ALTER TABLE `wallet_confrim`
  ADD PRIMARY KEY (`wallet_id_confirm`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`withdraw_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adwoo_wallat`
--
ALTER TABLE `adwoo_wallat`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cart_total`
--
ALTER TABLE `cart_total`
  MODIFY `cart_total_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `prod_ty_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_cart` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet_confrim`
--
ALTER TABLE `wallet_confrim`
  MODIFY `wallet_id_confirm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adwoo_wallat`
--
ALTER TABLE `adwoo_wallat`
  ADD CONSTRAINT `adwoo_wallat_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`status_cart`) REFERENCES `status` (`status_cart`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`),
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart_total`
--
ALTER TABLE `cart_total`
  ADD CONSTRAINT `cart_total_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_4` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`),
  ADD CONSTRAINT `delivery_ibfk_5` FOREIGN KEY (`cart_total_id`) REFERENCES `cart_total` (`cart_total_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`prod_ty_id`) REFERENCES `product_type` (`prod_ty_id`);

--
-- Constraints for table `wallet_confrim`
--
ALTER TABLE `wallet_confrim`
  ADD CONSTRAINT `wallet_confrim_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `withdraw_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
