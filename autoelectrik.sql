-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 11:51 AM
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
-- Database: `autoelectrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Id`, `Name`) VALUES
(1, 'BMW'),
(7, 'Toyota'),
(8, 'Audi'),
(9, 'Volvo'),
(10, 'Ford'),
(11, 'Lotus'),
(12, 'Mercedes Benz'),
(13, 'Citroen'),
(14, 'Cupra'),
(15, 'Fiat'),
(16, 'Fisker'),
(17, 'Genesis'),
(18, 'Honda'),
(19, 'Hyundai'),
(20, 'Jaguar'),
(21, 'Jeep'),
(22, 'Kia'),
(23, 'Mazda'),
(24, 'MG'),
(25, 'Mini'),
(26, 'Nissan'),
(27, 'Vauxhall'),
(28, 'Peugeot'),
(29, 'Polestar'),
(30, 'Renault'),
(31, 'Skoda'),
(32, 'Smart'),
(33, 'Subaru'),
(34, 'Tesla'),
(35, 'Volkswagen'),
(36, 'Maxus'),
(37, 'BYD'),
(38, 'Porsche'),
(39, 'Rolls Royce'),
(40, 'Maserati'),
(41, 'Abarth'),
(42, 'DS'),
(43, 'GWM');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `Id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(5000) NOT NULL,
  `parentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`Id`, `question`, `answer`, `parentId`) VALUES
(9, 'I have problem with my ev', 'sure, tell me more', 0),
(10, 'I want to buy a car', 'sure, lets discuss', 0),
(11, 'problem with battery', 'solution', 9),
(13, 'problem with charging', 'sure, give more detail', 9),
(14, 'home charging', 'home solution', 13),
(15, 'fast charging', 'fast solution', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `accessType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `Name`, `Email`, `Password`, `accessType`) VALUES
(3, '1', '1@gmail.com', '1', 'user'),
(4, 'admin', 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Id` int(11) NOT NULL,
  `BrandId` int(11) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `AvailableSince` varchar(100) NOT NULL,
  `BatteryCapacity` decimal(10,2) NOT NULL,
  `RealRange` int(11) NOT NULL,
  `Efficiency` int(11) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `RealRange_City_ColdWeather` int(11) NOT NULL,
  `RealRange_City_MildWeather` int(11) NOT NULL,
  `RealRange_Highway_ColdWeather` int(11) NOT NULL,
  `RealRange_Highway_MildWeather` int(11) NOT NULL,
  `RealRange_Combined_ColdWeather` int(11) NOT NULL,
  `RealRange_Combined_MildWeather` int(11) NOT NULL,
  `ZeroToHundred` decimal(10,2) NOT NULL,
  `TopSpeed` int(11) NOT NULL,
  `TotalPower` int(11) NOT NULL,
  `TotalTorque` int(11) NOT NULL,
  `Battery_NominalCapacity` int(11) NOT NULL,
  `Battery_Type` varchar(100) NOT NULL,
  `Battery_CathodeMaterial` varchar(100) NOT NULL,
  `Battery_NumberofCells` int(11) NOT NULL,
  `Battery_PackConfiguration` varchar(100) NOT NULL,
  `Battery_Architecture` int(11) NOT NULL,
  `Battery_NominalVoltage` int(11) NOT NULL,
  `Battery_FormFactor` varchar(100) NOT NULL,
  `Battery_WarrantyPeriod` varchar(100) NOT NULL,
  `Battery_WarrantyMileage` varchar(100) NOT NULL,
  `Battery_NameReference` varchar(100) NOT NULL,
  `Charging_Home_Port` varchar(100) NOT NULL,
  `Charging_Home_Time` varchar(100) NOT NULL,
  `Charging_Home_Power` varchar(100) NOT NULL,
  `Charging_Home_Speed` varchar(100) NOT NULL,
  `Charging_Fast_Port` varchar(100) NOT NULL,
  `Charging_Fast_Time` varchar(100) NOT NULL,
  `Charging_Fast_Power` varchar(100) NOT NULL,
  `Charging_Fast_Speed` varchar(100) NOT NULL,
  `FrontWheelDrive` tinyint(1) NOT NULL,
  `RearWheelDrive` tinyint(1) NOT NULL,
  `V2L` tinyint(1) NOT NULL,
  `V2H` tinyint(1) NOT NULL,
  `V2G` tinyint(1) NOT NULL,
  `Seats` int(11) NOT NULL,
  `Body` varchar(100) NOT NULL,
  `RoofRails` tinyint(1) NOT NULL,
  `HeatPump` tinyint(1) NOT NULL,
  `LinkToBy` varchar(500) NOT NULL,
  `ImageLoc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Id`, `BrandId`, `Model`, `AvailableSince`, `BatteryCapacity`, `RealRange`, `Efficiency`, `Price`, `RealRange_City_ColdWeather`, `RealRange_City_MildWeather`, `RealRange_Highway_ColdWeather`, `RealRange_Highway_MildWeather`, `RealRange_Combined_ColdWeather`, `RealRange_Combined_MildWeather`, `ZeroToHundred`, `TopSpeed`, `TotalPower`, `TotalTorque`, `Battery_NominalCapacity`, `Battery_Type`, `Battery_CathodeMaterial`, `Battery_NumberofCells`, `Battery_PackConfiguration`, `Battery_Architecture`, `Battery_NominalVoltage`, `Battery_FormFactor`, `Battery_WarrantyPeriod`, `Battery_WarrantyMileage`, `Battery_NameReference`, `Charging_Home_Port`, `Charging_Home_Time`, `Charging_Home_Power`, `Charging_Home_Speed`, `Charging_Fast_Port`, `Charging_Fast_Time`, `Charging_Fast_Power`, `Charging_Fast_Speed`, `FrontWheelDrive`, `RearWheelDrive`, `V2L`, `V2H`, `V2G`, `Seats`, `Body`, `RoofRails`, `HeatPump`, `LinkToBy`, `ImageLoc`) VALUES
(1, 37, 'ATTO 3', 'August 2022', 60.50, 330, 183, '37,200', 0, 0, 0, 0, 0, 0, 7.30, 160, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '370', 1, 0, 1, 0, 0, 5, '0', 0, 1, 'https://www.byd.com/uk', '1.jpg'),
(2, 1, 'i5 M60 xDrive Touring', 'February 2024', 81.20, 415, 196, '99,999', 0, 0, 0, 0, 0, 0, 3.90, 230, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '620', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.bmw.co.uk/en/index.html', '2.jpg'),
(3, 38, 'Taycan', 'February 2024', 82.30, 480, 274, '86,500', 0, 0, 0, 0, 0, 0, 4.80, 228, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1056', 0, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.porsche.com/uk/', '3.jpg'),
(4, 39, 'Spectre', 'November 2023', 102.00, 464, 352, '330,000', 0, 0, 0, 0, 0, 0, 4.50, 248, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '528', 1, 1, 0, 0, 0, 4, '0', 0, 0, 'https://www.rolls-roycemotorcars.com/en_GB/home.html', '4.jpg'),
(5, 40, 'GranTurismo Folgore', 'February 2024', 83.00, 416, 319, '200,000', 0, 0, 0, 0, 0, 0, 2.70, 320, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '960', 1, 1, 0, 0, 0, 4, '0', 0, 0, 'https://www.maserati.com/gb/en', '5.jpg'),
(6, 11, 'Eletre R', 'November 2023', 109.00, 448, 389, '121,305', 0, 0, 0, 0, 0, 0, 2.90, 259, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '928', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.lotuscars.com/en-GB', '6.jpg'),
(7, 12, 'EQE SUV AMG 53 4MATIC+', 'May 2023', 90.60, 408, 355, '113,860', 0, 0, 0, 0, 0, 0, 3.50, 238, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '608', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.mercedes-benz.co.uk/?group=all&subgroup=see-all&view=BODYTYPE', '7.jpg'),
(8, 8, 'Q4 e-tron 45 quattro', 'January 2024', 77.00, 392, 285, '52,245', 0, 0, 0, 0, 0, 0, 6.60, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '640', 1, 0, 0, 1, 1, 5, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '8.jpg'),
(9, 8, 'Q4 Sportback e-tron 45 quattro', 'January 2024', 77.00, 408, 302, '53,675', 0, 0, 0, 0, 0, 0, 6.60, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '608', 1, 1, 0, 1, 1, 5, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '9.jpg'),
(10, 8, 'Q4 Sportback e-tron 55 quattro', 'January 2024', 77.00, 408, 302, '58,625', 0, 0, 0, 0, 0, 0, 5.40, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '608', 1, 1, 0, 1, 1, 5, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '10.jpg'),
(11, 8, 'Q8 Sportback e-tron 50 quattro', 'Decemeber 2022', 89.00, 440, 324, '70,300', 0, 0, 0, 0, 0, 0, 6.00, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '672', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '11.jpg'),
(12, 8, 'Q8 e-tron Sportback 55 quattro', 'December 2022', 106.00, 520, 326, '80,300', 0, 0, 0, 0, 0, 0, 5.60, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '656', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '12.jpg'),
(13, 8, 'e-tron GT quattro', 'May 2021', 85.00, 416, 327, '87,800', 0, 0, 0, 0, 0, 0, 4.10, 243, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1024', 1, 1, 0, 0, 0, 4, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '14.jpg'),
(14, 8, 'SQ8 e-tron Sportback', 'May 2023', 106.00, 480, 353, '100,000', 0, 0, 0, 0, 0, 0, 4.50, 208, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '608', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '13.jpg'),
(15, 8, 'e-tron GT RS', 'May 2021', 85.00, 400, 340, '119,000', 0, 0, 0, 0, 0, 0, 3.30, 248, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '976', 1, 1, 0, 0, 0, 4, '0', 0, 1, 'https://www.audi.co.uk/uk/web/en.html', '15.jpg'),
(16, 15, '500e Convertible', 'May 2023', 37.80, 224, 270, '37,195', 0, 0, 0, 0, 0, 0, 7.00, 153, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '368', 1, 0, 0, 0, 0, 4, '0', 0, 0, 'https://www.abarth.com', '16.jpg'),
(17, 1, 'i4 eDrive40', 'November 2021', 80.70, 512, 252, '57,890', 0, 0, 0, 0, 0, 0, 5.70, 188, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '784', 0, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.bmw.co.uk/en/index.html', '17.jpg'),
(18, 1, 'i4 M50', 'November 2021', 80.70, 448, 288, '71,085', 0, 0, 0, 0, 0, 0, 3.90, 224, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '688', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.bmw.co.uk/en/index.html', '18.jpg'),
(19, 1, 'i5 eDrive40 Touring', 'February 2024', 81.20, 456, 285, '69,945', 0, 0, 0, 0, 0, 0, 6.10, 192, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '672', 0, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.bmw.co.uk/en/index.html', '19.jpg'),
(20, 1, 'i5 M60 xDrive Saloon', 'May 2023', 81.20, 416, 312, '97,745', 0, 0, 0, 0, 0, 0, 3.80, 228, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '624', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.bmw.co.uk/en/index.html', '20.jpg'),
(21, 1, 'i7 eDrive50', 'June 2023', 101.70, 520, 313, '100,205', 0, 0, 0, 0, 0, 0, 5.50, 203, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '768', 0, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.bmw.co.uk/en/index.html', '21.jpg'),
(22, 1, 'i7 M70 xDrive', 'May 2023', 101.70, 488, 333, '163,315', 0, 0, 0, 0, 0, 0, 3.70, 248, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '720', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.bmw.co.uk/en/index.html', '22.jpg'),
(23, 1, 'iX M60', 'April 2022', 105.20, 480, 351, '122,775', 0, 0, 0, 0, 0, 0, 3.80, 248, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '640', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.bmw.co.uk/en/index.html', '23.jpg'),
(24, 1, 'iX xDrive 40', 'November 2021', 71.00, 352, 323, '69,905', 0, 0, 0, 0, 0, 0, 6.10, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.bmw.co.uk/en/index.html', '24.jpg'),
(25, 1, 'iX1 xDrive 30', 'November 2022', 64.70, 376, 275, '47,465', 0, 0, 0, 0, 0, 0, 5.60, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '544', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.bmw.co.uk/en/index.html', '25.jpg'),
(26, 1, 'iX2 xDrive 30', 'October 2023', 64.70, 376, 275, '57,445', 0, 0, 0, 0, 0, 0, 5.60, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '544', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.bmw.co.uk/en/index.html', '26.jpg'),
(27, 1, 'iX3 ', 'September 2021', 74.00, 384, 308, '64,165', 0, 0, 0, 0, 0, 0, 6.80, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '512', 0, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.bmw.co.uk/en/index.html', '27.jpg'),
(28, 13, 'e-C3', 'July 2024', 44.00, 264, 267, '21,000', 0, 0, 0, 0, 0, 0, 11.00, 134, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '336', 1, 0, 0, 0, 0, 5, '0', 0, 0, 'https://www.citroen.co.uk', '28.jpg'),
(29, 13, 'e-C4 X', 'February 2023', 46.30, 280, 265, '31,995', 0, 0, 0, 0, 0, 0, 9.70, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '448', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.citroen.co.uk', '29.jpg'),
(30, 13, 'e-Berlingo', 'November 2021', 46.30, 200, 370, '33,315', 0, 0, 0, 0, 0, 0, 11.70, 134, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '320', 1, 0, 0, 0, 0, 7, '0', 0, 0, 'https://www.citroen.co.uk', '30.jpg'),
(31, 13, 'e-Space Tourer', 'November 2021', 46.30, 176, 421, '37,885', 0, 0, 0, 0, 0, 0, 12.10, 129, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '272', 1, 0, 0, 0, 0, 9, '0', 0, 1, 'https://www.citroen.co.uk', '31.jpg'),
(32, 14, 'Born e-Boost', 'April 2022', 77.00, 448, 275, '41,975', 0, 0, 0, 0, 0, 0, 7.00, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '624', 0, 1, 0, 1, 1, 4, '0', 0, 1, 'https://www.cupraofficial.co.uk/?idcmp=sea:10_BRAND_Exact:GOOGLE:CUPRA:cupra:NA:NA:cupra&dns=true&&&&&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppG08YPEKBA4zPqrX-FDJxro38vIQZxA9S0F3o13R9OBoI-Zs5yhxehoCMksQAvD_BwE&gclsrc=aw.ds', '32.jpg'),
(33, 14, 'Tavascan Endurance', 'February 2024', 77.00, 448, 275, '50,000', 0, 0, 0, 0, 0, 0, 6.80, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '672', 0, 1, 0, 1, 1, 5, '0', 0, 0, 'https://www.cupraofficial.co.uk/?idcmp=sea:10_BRAND_Exact:GOOGLE:CUPRA:cupra:NA:NA:cupra&dns=true&&&&&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppG08YPEKBA4zPqrX-FDJxro38vIQZxA9S0F3o13R9OBoI-Zs5yhxehoCMksQAvD_BwE&gclsrc=aw.ds', '33.jpg'),
(34, 42, '3 E-Tense', 'January 2023', 50.80, 296, 275, '37,200', 0, 0, 0, 0, 0, 0, 9.00, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.cupraofficial.co.uk/?idcmp=sea:10_BRAND_Exact:GOOGLE:CUPRA:cupra:NA:NA:cupra&dns=true&&&&&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppG08YPEKBA4zPqrX-FDJxro38vIQZxA9S0F3o13R9OBoI-Zs5yhxehoCMksQAvD_BwE&gclsrc=aw.ds', '34.jpg'),
(35, 15, '500e Cabrio', 'November 2020', 37.30, 224, 266, '34,195', 0, 0, 0, 0, 0, 0, 9.00, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '368', 1, 0, 0, 0, 0, 4, '0', 0, 0, 'https://www.fiat.co.uk', '35.jpg'),
(36, 15, '600e', 'December 2023', 50.80, 304, 267, '32,995', 0, 0, 0, 0, 0, 0, 9.00, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '480', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.fiat.co.uk', '36.jpg'),
(37, 16, 'Ocean Extreme', 'March 2023', 106.50, 520, 328, '60,880', 0, 0, 0, 0, 0, 0, 3.90, 203, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '624', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.fiskerinc.com/en-gb', '37.jpg'),
(38, 10, 'Mustang Mach-E GT', 'December 2023', 91.00, 424, 343, '74,540', 0, 0, 0, 0, 0, 0, 3.70, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '368', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.ford.co.uk/shop/promotions/mach-e-test-drive?gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppGDZKjTwOaGDOeBTVTEBonRtUpS8QrZsnN5_nA_3kzXt0ycGUhSPrRoCaPsQAvD_BwE&gclsrc=aw.ds', '38.jpg'),
(39, 17, 'GV 60 Sport Plus', 'June 2022', 74.00, 376, 315, '67,505', 0, 0, 0, 0, 0, 0, 5.50, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '976', 1, 1, 1, 0, 0, 5, '0', 0, 0, 'https://www.genesis.com/worldwide/en/main.html', '39.jpg'),
(40, 17, 'GV 70 Electrified Sport', 'October 2022', 74.00, 344, 344, '65,105', 0, 0, 0, 0, 0, 0, 4.20, 233, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '848', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.genesis.com/worldwide/en/main.html', '40.jpg'),
(41, 43, 'ORA 03 Pure+', 'January 2024', 59.30, 336, 282, '31,995', 0, 0, 0, 0, 0, 0, 8.20, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '240', 1, 0, 0, 0, 0, 5, '0', 0, 0, 'https://gwmora.co.uk', '41.jpg'),
(42, 18, 'e:Ny1', 'November 2023', 61.90, 336, 295, '44,995', 0, 0, 0, 0, 0, 0, 7.60, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '304', 1, 0, 0, 0, 0, 5, '0', 0, 0, 'https://www.honda.co.uk/cars.html?utm_source=google&utm_medium=Search&utm_Campaign=honda_gbr_en_srch_bau_stnd_con_cars_range_google-central_gbp_ext_single-term&utm_proposition=carrange&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppAumJyP0GD_aFIQuW9ZzU5fhOWhuewaTnb1dUoOGbyKXkLgonb5GSBoCZBYQAvD_BwE&gclsrc=aw.ds', '42.jpg'),
(43, 19, 'IONIQ 5 N', 'November 2023', 80.00, 384, 333, '65,000', 0, 0, 0, 0, 0, 0, 3.40, 259, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '944', 1, 1, 1, 0, 0, 5, '0', 0, 1, 'https://www.hyundai.com/uk/en.html?gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppMNIUYCEHG8RdtdUcy8ulRk1U8C-sbwpwyKNXvmlLFq0gqJu_RZtpBoCpzwQAvD_BwE&gclsrc=aw.ds', '43.jpg'),
(44, 19, 'IONIQ 6 ', 'November 2022', 74.00, 440, 269, '50,540', 0, 0, 0, 0, 0, 0, 5.10, 184, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1152', 1, 1, 1, 0, 0, 5, '0', 0, 1, 'https://www.hyundai.com/uk/en.html?gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppMNIUYCEHG8RdtdUcy8ulRk1U8C-sbwpwyKNXvmlLFq0gqJu_RZtpBoCpzwQAvD_BwE&gclsrc=aw.ds', '44.jpg'),
(45, 19, 'Kona Electric', 'July 2023', 65.40, 384, 273, '38,595', 0, 0, 0, 0, 0, 0, 7.80, 169, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '384', 1, 0, 1, 0, 0, 5, '0', 0, 1, 'https://www.hyundai.com/uk/en.html?gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppMNIUYCEHG8RdtdUcy8ulRk1U8C-sbwpwyKNXvmlLFq0gqJu_RZtpBoCpzwQAvD_BwE&gclsrc=aw.ds', '45.jpg'),
(46, 20, 'I-Pace EV400', 'January 2023', 84.70, 376, 360, '69,995', 0, 0, 0, 0, 0, 0, 4.80, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '352', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.jaguar.com/index.html', '46.jpg'),
(47, 21, 'Avenger Electric ', 'June 2023', 50.80, 304, 267, '35,700', 0, 0, 0, 0, 0, 0, 9.00, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '480', 1, 0, 0, 0, 0, 5, '0', 0, 0, 'https://www.jeep.co.uk', '47.jpg'),
(48, 22, 'EV6 GT', 'April 2022', 74.00, 352, 336, '62,645', 0, 0, 0, 0, 0, 0, 3.50, 259, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '912', 1, 1, 1, 0, 0, 5, '0', 0, 1, 'https://www.kia.com/uk/', '48.jpg'),
(49, 22, 'EV9', 'September 2023', 96.00, 448, 343, '64,995', 0, 0, 0, 0, 0, 0, 9.40, 184, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '784', 0, 1, 1, 1, 1, 7, '0', 0, 1, 'https://www.kia.com/uk/', '49.jpg'),
(50, 22, 'Niro EV', 'July 2022', 64.80, 384, 270, '37,295', 0, 0, 0, 0, 0, 0, 7.80, 166, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '384', 1, 0, 1, 0, 0, 5, '0', 0, 1, 'https://www.kia.com/uk/', '50.jpg'),
(51, 22, 'Soul EV', 'September 2022', 39.20, 224, 280, '32,845', 0, 0, 0, 0, 0, 0, 9.90, 156, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '192', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.kia.com/uk/', '51.jpg'),
(52, 40, 'Grecale Folgore', 'March 2024', 95.00, 400, 380, '135,000', 0, 0, 0, 0, 0, 0, 4.10, 219, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '432', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.maserati.com/gb/en', '52.jpg'),
(53, 36, 'MIFA 9', 'February 2023', 84.00, 360, 373, '65,290', 0, 0, 0, 0, 0, 0, 9.20, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '320', 1, 0, 0, 0, 0, 7, '0', 0, 1, 'https://saicmaxus.co.uk', '53.jpg'),
(54, 23, 'MX-30', 'July 2022', 30.00, 168, 286, '31,250', 0, 0, 0, 0, 0, 0, 9.70, 139, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '208', 1, 0, 0, 0, 0, 5, '0', 0, 0, 'https://www.mazda.co.uk', '54.jpg'),
(55, 12, 'EQA 350 4MATIC', 'December 2022', 66.50, 352, 302, '54,510', 0, 0, 0, 0, 0, 0, 6.00, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '496', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.mercedes-benz.co.uk/?group=all&subgroup=see-all&view=BODYTYPE', '55.jpg'),
(56, 12, 'EQB 350 4MATIC', 'December 2023', 65.00, 344, 309, '56,810', 0, 0, 0, 0, 0, 0, 6.20, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '496', 1, 1, 0, 0, 0, 7, '0', 0, 1, 'https://www.mercedes-benz.co.uk/?group=all&subgroup=see-all&view=BODYTYPE', '56.jpg'),
(57, 12, 'EQE AMG 53 4MATIC+', 'June 2023', 90.60, 456, 318, '114,750', 0, 0, 0, 0, 0, 0, 3.50, 219, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '672', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.mercedes-benz.co.uk/?group=all&subgroup=see-all&view=BODYTYPE', '57.jpg'),
(58, 12, 'EQS SUV Maybach 680', 'March 2021', 118.00, 488, 387, '200,000', 0, 0, 0, 0, 0, 0, 4.40, 208, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '608', 1, 1, 0, 0, 0, 4, '0', 0, 0, 'https://www.mercedes-benz.co.uk/?group=all&subgroup=see-all&view=BODYTYPE', '58.jpg'),
(59, 12, 'EQV 300', 'November 2020', 90.00, 304, 474, '87,995', 0, 0, 0, 0, 0, 0, 12.10, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '304', 1, 0, 0, 0, 0, 7, '0', 0, 1, 'https://www.mercedes-benz.co.uk/?group=all&subgroup=see-all&view=BODYTYPE', '59.jpg'),
(60, 12, 'eVito Tourer ', 'December 2020', 90.00, 304, 474, '76,368', 0, 0, 0, 0, 0, 0, 12.00, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '304', 1, 0, 0, 0, 0, 9, '0', 0, 0, 'https://www.mercedes-benz.co.uk/?group=all&subgroup=see-all&view=BODYTYPE', '60.jpg'),
(61, 24, 'MG4 EV XPOWER', 'August 2023', 61.70, 320, 309, '36,495', 0, 0, 0, 0, 0, 0, 3.80, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '560', 1, 1, 1, 0, 0, 5, '0', 0, 0, 'https://www.mg.co.uk/', '61.jpg'),
(62, 24, 'MG5 EV LONG RANGE', 'July 2022', 57.40, 328, 280, '30,995', 0, 0, 0, 0, 0, 0, 7.70, 184, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '320', 1, 0, 1, 0, 0, 5, '0', 0, 0, 'https://www.mg.co.uk/', '62.jpg'),
(63, 24, 'ZS EV LONG RANGE', 'December 2021', 68.30, 368, 297, '32,995', 0, 0, 0, 0, 0, 0, 8.40, 174, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '416', 1, 0, 1, 0, 0, 5, '0', 0, 0, 'https://www.mg.co.uk/', '63.jpg'),
(64, 25, 'Cooper Electric E', 'February 2024', 37.00, 304, 258, '34,500', 0, 0, 0, 0, 0, 0, 7.30, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '432', 1, 0, 0, 0, 0, 4, '0', 0, 0, 'https://www.mini.co.uk/en_GB/home.html?&tl=sea-gl-UK_MINI_NC_BRAND%20PURE_ENG_BND_ALO_%20_PERF_%20_SEAADW-mix-miy-.-sech-BRA_BND_CORE_MULTI_NONE-.-e-mini-.-.&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppJVmNCKC4hXQCaKEYheRcSNaLSkJ3rQ6FrpUmQ_cd1pVxqwbuGd0-RoCBCEQAvD_BwE&gclsrc=aw.ds', '64.jpg'),
(65, 25, 'Countryman SE ALL4', 'February 2024', 64.70, 368, 281, '47,180', 0, 0, 0, 0, 0, 0, 5.60, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '528', 1, 1, 0, 0, 0, 5, '0', 0, 0, 'https://www.mini.co.uk/en_GB/home.html?&tl=sea-gl-UK_MINI_NC_BRAND%20PURE_ENG_BND_ALO_%20_PERF_%20_SEAADW-mix-miy-.-sech-BRA_BND_CORE_MULTI_NONE-.-e-mini-.-.&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppJVmNCKC4hXQCaKEYheRcSNaLSkJ3rQ6FrpUmQ_cd1pVxqwbuGd0-RoCBCEQAvD_BwE&gclsrc=aw.ds', '65.jpg'),
(66, 25, 'Electric Convertible', 'February 2023', 28.90, 168, 275, '52,500', 0, 0, 0, 0, 0, 0, 8.20, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '240', 1, 0, 0, 0, 0, 4, '0', 0, 1, 'https://www.mini.co.uk/en_GB/home.html?&tl=sea-gl-UK_MINI_NC_BRAND%20PURE_ENG_BND_ALO_%20_PERF_%20_SEAADW-mix-miy-.-sech-BRA_BND_CORE_MULTI_NONE-.-e-mini-.-.&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppJVmNCKC4hXQCaKEYheRcSNaLSkJ3rQ6FrpUmQ_cd1pVxqwbuGd0-RoCBCEQAvD_BwE&gclsrc=aw.ds', '66.jpg'),
(67, 26, 'Ariya e-4ORCE', 'August 2022', 87.00, 400, 348, '50,845', 0, 0, 0, 0, 0, 0, 5.70, 198, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '480', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.nissan.co.uk/?&cid=psm_cmid=20373204951_grid=151601371339_adid=666069396365&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppDw7V3Ml_9k_cKGwnE6Ui-T8tU2gGdrYnpAyqUisfUwOyTFu11z0WRoCigMQAvD_BwE&gclsrc=aw.ds', '67.jpg'),
(68, 26, 'Leaf ', 'March 2022', 39.00, 232, 269, '28,995', 0, 0, 0, 0, 0, 0, 7.90, 142, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '224', 1, 0, 0, 1, 1, 5, '0', 0, 1, 'https://www.nissan.co.uk/?&cid=psm_cmid=20373204951_grid=151601371339_adid=666069396365&gad_source=1&gclid=CjwKCAjwh4-wBhB3EiwAeJsppDw7V3Ml_9k_cKGwnE6Ui-T8tU2gGdrYnpAyqUisfUwOyTFu11z0WRoCigMQAvD_BwE&gclsrc=aw.ds', '68.jpg'),
(69, 27, 'Astra Electric ', 'June 2023', 50.80, 304, 267, '37,795', 0, 0, 0, 0, 0, 0, 9.20, 169, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '480', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.vauxhall.co.uk', '69.jpg'),
(70, 27, 'Astra Sports Tourer Electric', 'November 2023', 50.80, 296, 275, '39,995', 0, 0, 0, 0, 0, 0, 9.30, 169, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.vauxhall.co.uk', '70.jpg'),
(71, 27, 'Combo-e Life', 'November 2021', 46.30, 200, 370, '34,685', 0, 0, 0, 0, 0, 0, 11.70, 134, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '320', 1, 0, 0, 0, 0, 7, '0', 0, 0, 'https://www.vauxhall.co.uk', '71.jpg'),
(72, 27, 'Corsa Electric ', 'July 2023', 48.10, 312, 247, '35,475', 0, 0, 0, 0, 0, 0, 8.10, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '480', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.vauxhall.co.uk', '72.jpg'),
(73, 27, 'Mokka-e', 'November 2021', 50.80, 288, 282, '37,260', 0, 0, 0, 0, 0, 0, 9.00, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.vauxhall.co.uk', '73.jpg'),
(74, 27, 'Vivaro-e Life Combi', 'January 2022', 46.30, 184, 403, '36,995', 0, 0, 0, 0, 0, 0, 12.10, 129, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '288', 1, 0, 0, 0, 0, 9, '0', 0, 1, 'https://www.vauxhall.co.uk', '74.jpg'),
(75, 28, 'e-208', 'November 2023', 48.10, 308, 253, '32,400', 0, 0, 0, 0, 0, 0, 8.20, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.peugeot.co.uk', '75.jpg'),
(76, 28, 'e-2008', 'July 2023', 50.80, 296, 275, '36,350', 0, 0, 0, 0, 0, 0, 9.10, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.peugeot.co.uk', '76.jpg'),
(77, 28, 'e-308 SW', 'January 2024', 50.80, 296, 275, '41,250', 0, 0, 0, 0, 0, 0, 9.00, 148, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '432', 1, 0, 0, 0, 0, 5, '0', 0, 0, 'https://www.peugeot.co.uk', '77.jpg'),
(78, 28, 'e-3008', 'March 2024', 98.00, 504, 311, '48,000', 0, 0, 0, 0, 0, 0, 9.00, 169, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '656', 1, 0, 1, 0, 0, 5, '0', 0, 1, 'https://www.peugeot.co.uk', '78.jpg'),
(79, 28, 'e-Rifter', 'October 2021', 46.30, 200, 370, '33,120', 0, 0, 0, 0, 0, 0, 11.70, 134, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '320', 1, 0, 0, 0, 0, 7, '0', 0, 0, 'https://www.peugeot.co.uk', '79.jpg'),
(80, 28, 'e-Traveller', 'June 2021', 46.30, 184, 403, '43,625', 0, 0, 0, 0, 0, 0, 13.10, 129, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '288', 1, 0, 0, 0, 0, 9, '0', 0, 1, 'https://www.peugeot.co.uk', '80.jpg'),
(81, 29, '2', 'January 2023', 79.00, 448, 282, '57,950', 0, 0, 0, 0, 0, 0, 4.20, 203, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '672', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.polestar.com/uk', '81.jpg'),
(82, 29, '3', 'November 2022', 97.00, 456, 369, '85,500', 0, 0, 0, 0, 0, 0, 4.70, 208, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '608', 1, 1, 1, 1, 1, 5, '0', 0, 1, 'https://www.polestar.com/uk', '82.jpg'),
(83, 29, '4', 'January 2024', 94.00, 488, 308, '59,990', 0, 0, 0, 0, 0, 0, 7.40, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '656', 0, 1, 1, 0, 0, 5, '0', 0, 1, 'https://www.polestar.com/uk', '83.jpg'),
(84, 38, 'Macan 4 Electric', 'January 2024', 96.00, 488, 315, '69,800', 0, 0, 0, 0, 0, 0, 5.20, 219, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '928', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.porsche.com/uk/', '84.jpg'),
(85, 38, 'Taycan Turbo S Cross Turismo', 'February 2024', 97.00, 472, 329, '162,500', 0, 0, 0, 0, 0, 0, 2.50, 248, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1040', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.porsche.com/uk/', '85.jpg'),
(86, 30, 'Megane E-Tech EV60 220hp', 'November 2022', 60.00, 376, 255, '36,995', 0, 0, 0, 0, 0, 0, 7.40, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '512', 1, 0, 0, 0, 0, 5, '0', 0, 0, 'https://www.renault.co.uk', '86.jpg'),
(87, 30, 'Zoe ZE50 R135', 'January 2020', 52.00, 304, 274, '29,995', 0, 0, 0, 0, 0, 0, 9.50, 139, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '224', 1, 0, 0, 0, 0, 5, '0', 0, 1, 'https://www.renault.co.uk', '87.jpg'),
(88, 31, 'Enyaq vRS', 'October 2023', 77.00, 432, 285, '53,120', 0, 0, 0, 0, 0, 0, 5.50, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '640', 1, 1, 0, 1, 1, 5, '0', 0, 1, 'https://www.skoda.co.uk', '88.jpg'),
(89, 32, '#1 Brabus', 'September 2023', 62.00, 312, 318, '43,450', 0, 0, 0, 0, 0, 0, 3.90, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '480', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://uk.smart.com/en/models/hashtag-one/?utm_medium=ps&utm_source=google&utm_campaign=always-on&utm_phase=do&utm_country=uk&utm_type=search-brand-exact&utm_id=16773428860&gad_source=1', '89.jpg'),
(90, 32, '#3 Brabus', 'March 2024', 62.00, 328, 302, '45,000', 0, 0, 0, 0, 0, 0, 3.70, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '496', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://uk.smart.com/en/models/hashtag-one/?utm_medium=ps&utm_source=google&utm_campaign=always-on&utm_phase=do&utm_country=uk&utm_type=search-brand-exact&utm_id=16773428860&gad_source=1', '90.jpg'),
(91, 33, 'Solterra AWD', 'March 2023', 64.00, 320, 320, '49,995', 0, 0, 0, 0, 0, 0, 6.90, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '480', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://subaru.co.uk', '91.jpg'),
(92, 34, 'Model 3', 'October 2023', 57.50, 416, 221, '39,990', 0, 0, 0, 0, 0, 0, 6.10, 200, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '688', 0, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.tesla.com/en_gb', '92.jpg'),
(93, 34, 'Model S Plaid', 'June 2024', 95.00, 552, 275, '100,000', 0, 0, 0, 0, 0, 0, 2.10, 280, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '768', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.tesla.com/en_gb', '93.jpg'),
(94, 34, 'Model X Plaid', 'June 2024', 95.00, 448, 339, '120,000', 0, 0, 0, 0, 0, 0, 2.60, 260, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '624', 1, 1, 0, 0, 0, 7, '0', 0, 1, 'https://www.tesla.com/en_gb', '94.jpg'),
(95, 34, 'Model Y', 'October 2022', 75.00, 416, 288, '59,990', 0, 0, 0, 0, 0, 0, 3.70, 248, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '640', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.tesla.com/en_gb', '95.jpg'),
(96, 35, 'bZ4X', 'August 2022', 64.00, 312, 328, '52,510', 0, 0, 0, 0, 0, 0, 6.90, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.toyota.co.uk', '96.jpg'),
(97, 35, 'ID.Buzz Pro', 'September 2022', 77.00, 336, 367, '58,915', 0, 0, 0, 0, 0, 0, 10.20, 144, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '464', 0, 1, 0, 1, 1, 5, '0', 0, 0, 'https://www.volkswagen.co.uk/en.html', '97.jpg'),
(98, 35, 'ID.3 Pro', 'May 2023', 58.00, 352, 264, '37,115', 0, 0, 0, 0, 0, 0, 7.30, 158, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '448', 0, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.volkswagen.co.uk/en.html', '98.jpg'),
(99, 35, 'ID.4 GTX', 'November 2023', 77.00, 416, 296, '53,865', 0, 0, 0, 0, 0, 0, 5.40, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '624', 1, 1, 0, 1, 1, 5, '0', 0, 1, 'https://www.volkswagen.co.uk/en.html', '99.jpg'),
(100, 35, 'ID.5 Pro', 'November 2023', 77.00, 456, 270, '50,940', 0, 0, 0, 0, 0, 0, 6.70, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '672', 0, 1, 0, 1, 1, 5, '0', 0, 1, 'https://www.volkswagen.co.uk/en.html', '100.jpg'),
(101, 35, 'ID.7 Pro', 'November 2023', 77.00, 472, 261, '55,570', 0, 0, 0, 0, 0, 0, 6.50, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '704', 0, 1, 0, 1, 1, 5, '0', 0, 0, 'https://www.volkswagen.co.uk/en.html', '101.jpg'),
(102, 9, 'C 40 ', 'December 2022', 66.00, 352, 300, '48,355', 0, 0, 0, 0, 0, 0, 7.30, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '432', 0, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.volvocars.com/uk/', '102.jpg'),
(103, 9, 'EX30 ', 'June 2023', 64.00, 352, 291, '40,995', 0, 0, 0, 0, 0, 0, 3.60, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '528', 1, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.volvocars.com/uk/', '103.jpg'),
(104, 9, 'EX90', 'December 2022', 107.00, 448, 382, '100,555', 0, 0, 0, 0, 0, 0, 4.90, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '576', 1, 1, 1, 1, 1, 7, '0', 0, 1, 'https://www.volvocars.com/uk/', '104.jpg'),
(105, 9, 'XC40', 'December 2022', 66.00, 336, 314, '46,505', 0, 0, 0, 0, 0, 0, 7.30, 179, 0, 0, 0, '0', '0', 0, '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '400', 0, 1, 0, 0, 0, 5, '0', 0, 1, 'https://www.volvocars.com/uk/', '105.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
