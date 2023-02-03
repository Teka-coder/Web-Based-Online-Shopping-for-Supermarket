-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 03:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `recom_user`
--

CREATE TABLE `recom_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recom_user`
--

INSERT INTO `recom_user` (`id`, `username`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `secretWord` varchar(30) NOT NULL,
  `secretNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`, `secretWord`, `secretNumber`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 0, 'admin', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'toys'),
(3, 'Jewellery'),
(4, 'Beauty'),
(5, 'soft drink'),
(6, 'snacks'),
(7, 'soaps'),
(8, 'beauty'),
(9, 'sample'),
(11, 'dabur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(40, 'j8gvdmueqs2tien9n8fqmc1jur', 25, 'vatika', 200.00, 2, 'uploads/5d8a8e8e95.jpg'),
(41, 'j8gvdmueqs2tien9n8fqmc1jur', 34, 'necklaces', 1000.00, 1, 'uploads/6dded18468.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(4, 'Accessories'),
(8, 'Jewellery'),
(10, 'cleaning and household'),
(11, 'kids material'),
(12, 'Beauty Hygiene'),
(13, 'food and drinks');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `contact`, `message`, `status`, `date`) VALUES
(2, 'md.alvi islam', 'customer@gmail.com', '1622425286', 'szzss', 1, '2018-08-05 23:23:25'),
(3, 'dires dire', 'diresdire@gmail.com', '+251921213345', 'that is so cool', 1, '2022-05-25 21:04:41'),
(4, 'yonas musa', 'yonas@gmail.com', '+251921213345', 'selammm endet new', 1, '2022-05-30 17:02:22'),
(5, 'dires dire', 'diresdire@gmail.com', '+251921213345', 'vcbnvbnvcvb', 1, '2022-05-30 17:32:41'),
(6, 'teka', 'teka@gmail.com', '342234455454', 'hey dgfshhfg', 1, '2022-05-31 18:11:17'),
(7, 'abe', 'abe@gmail.com', '0987878787', 'selamm', 1, '2022-06-01 12:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `secretQuest` varchar(60) NOT NULL,
  `secretAns` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `street`, `zip`, `phone`, `email`, `pass`, `secretQuest`, `secretAns`) VALUES
(2, 'dires dire', 'ethiopia', 'dilla', 'ethiopia', '840054', '0921213345', 'diresdire@gmail.com', '3dec1179c2d7218e6329ec21781a54b4', '', ''),
(3, 'yonas', 'dilla', 'dilla', 'Ethiopia', '54325', '0923457678', 'yonasmuse@gmail.com', '3dec1179c2d7218e6329ec21781a54b4', '', ''),
(4, 'yonas musa', 'ethiopia', 'dilla', 'Ethiopia', '840054', '+251921213345', 'yonas@gmail.com', '3dec1179c2d7218e6329ec21781a54b4', '', ''),
(5, 'teka', 'diilla', 'adis sbeba', 'ethiopia', '43545', '4567678879', 'teka@gmail.com', '3dec1179c2d7218e6329ec21781a54b4', '', ''),
(6, 'abe', 'dilla', 'addis', 'ddd', '5445', '0910767676', 'abe@gmail.com', '3dec1179c2d7218e6329ec21781a54b4', '', ''),
(7, 'Tekalegn', 'Dilla', 'Dilla', 'Mazegaja', '12300', '+251967954930', 'tekaberako475@gmail.com', '8be4177df4ec5dee8c8bc4f3b49d7a2d', 'what is your childhood name?', 'abiti'),
(9, 'test', 'Dilla', 'Dilla', 'Ethiopia', '12300', '+251912345678', 'test@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '', ''),
(10, 'test2', 'Dilla', 'Dilla', 'Ethiopia', '12300', '+251912345678', 'test2@gmail.com', 'e3ceb5881a0a1fdaad01296d7554868d', 'what is your childhood name?', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(36, 2, 21, 'EOS 77D DSLR Camera', 1, 58160.00, 'uploads/6521499b3d.jpg', '2022-05-25 14:20:52', 1),
(63, 9, 25, 'vatika', 1, 200.00, 'uploads/5d8a8e8e95.jpg', '2022-06-07 08:36:41', 0),
(64, 7, 36, 'football ball', 2, 800.00, 'uploads/50c61208cc.jpg', '2022-06-07 14:25:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(15, 'MakeUp Kit', 9, 2, '<p>Best Laundry machine in bd.! years warenty<br /><br /></p>', 3200.00, 'uploads/1d535b3255.jpg', 0),
(18, 'bright beka', 10, 7, '<p>iPhone XR comes with new chip<br />64GB and 256GB storage options on all models<br />128GB on XR only <br />Battery improvements on iPhone XR<br />The Apple iPhone 8 and 8 Plus both come with the A11 Bionic chip with 64-bit architecture, a neural engine and embedded M11 motion coprocessor. They also both come in 64GB and 256GB storage capacities, neither of which offer microSD support.</p>', 109999.00, 'uploads/3ac70f5e82.jpg', 1),
(19, 'GoldStar', 10, 7, '<p>Product details of LED Monitor K202HQL 19.5\" - Black<br />Display size: 19.5 Inch<br />Resolution: HD+ (1600 x 900)<br />Stunning colours<br />Wall mountable<br />Ergonomic stand tilt -5 to 25 degrees<br />Image Brightness: 200 nits (cd/m2)<br />About LED Monitor K202HQL 19.5\"</p>\r\n<p><br />You\'ll enjoy tasks and entertainment more on the 19.5&rdquo; LED-backlit display. It presents incredibly clear, rich-detailed images at a high resolution of 1600 x 900, and features an impressive dynamic contrast ratio of 100,000,000:1 to reveal darker image areas in greater depth. A super-fast 5-millisecond response time displays action sequences with the highest degree of clarity. The great sights are made even better by exceptional colors via Acer Adaptive Contrast Management.</p>', 6563.00, 'uploads/b30431e88c.jpg', 1),
(20, ' windex cleaner', 10, 7, '<p>Product details of YN 85mm f/1.8 Lens for Canon EF - Black<br />EF-Mount Lens/Full-Frame Format<br />Aperture Range: f/1.8 to f/18<br />AF/MF Switch<br />Gold-Plated Contacts<br />Minimum Focusing Distance: 2.8\'<br />Filter Diameter: 58mm<br />YN 85mm f/1.8 Lens for Canon EF<br />The YN 85mm f/1.8 Lens from Yongnuo is a short-telephoto prime designed for Canon EF-mount DSLRs. Pairing well with the slightly long focal length is a bright f/1.8 maximum aperture that benefits working in low-light as well as affords greater control over depth of field for selective focus control. An AF/MF switch on the lens barrel permits quick switching between focusing methods, and the lens can focus as closely as 2.8\' to suit photographing close-up subjects. Additionally, gold-plated contacts permit working with all exposure modes as well as transferring lens information to the EXIF data.</p>', 14740.00, 'uploads/f80151413c.jpg', 1),
(21, 'Zahra', 10, 7, '<p>Product details of EOS 77D DSLR Camera (Body) - Black<br />No return policy after delivered<br />24.2 Megapixel CMOS (APS-C) sensor<br />Built-in Wi-Fi, NFC and Bluetooth<br />Hdr movie &amp; time-lapse movie.<br />Flash memory type: SDXC<br />About EOS 77D<br />Featuring an optical viewfinder with a 45-point all cross-type AF system1 and fast, accurate Dual Pixel CMOS AF with phase-detection, the EOS 77D camera helps you capture the action right as it happens. Extensive, customizable controls and brilliant image quality help you get the photo looking exactly how you want it. Capture vibrant colors and fine details with the 24.2 Megapixel CMOS (APS-C) Sensor. Without missing a beat, check and change your settings with the top-mounted LCD screen and rear Quick Control dial. When you&rsquo;re satisfied with your results, built-in Wi-Fi2, NFC3 and Bluetooth4 technology lets you easily share your favorite photos and videos.</p>', 58160.00, 'uploads/0e67cf52a5.jpg', 1),
(22, 'e.l.f', 12, 4, '<p>face shadow</p>', 200.00, 'uploads/8723455a90.jpg', 1),
(23, 'chanal lepistic', 12, 4, '<p>lepistic</p>', 200.00, 'uploads/c981aeff2c.jpeg', 1),
(24, 'lepistic', 12, 4, '<p>normal lepstic</p>', 100.00, 'uploads/e4f2071666.jpeg', 1),
(25, 'vatika', 12, 4, '<p>vatika for hair&nbsp;</p>', 200.00, 'uploads/5d8a8e8e95.jpg', 1),
(26, 'Ananas juice', 13, 5, '<p>ananas juice</p>', 200.00, 'uploads/7d2e529df3.jpg', 1),
(27, 'rani juice', 13, 5, '<p>rani juice&nbsp;</p>', 200.00, 'uploads/343bf63886.jpg', 1),
(28, 'Lux', 12, 7, '<p>Lux</p>', 50.00, 'uploads/6553d7b457.jpg', 0),
(29, 'Largo', 10, 7, '<p>largo</p>', 100.00, 'uploads/d1d3073e7b.jpg', 0),
(30, 'Dova soap', 12, 7, '<p>Dova soap</p>', 50.00, 'uploads/a97879d6c7.jpg', 1),
(31, 'sun chips', 14, 6, '<p>sun snacks</p>', 45.00, 'uploads/e6f777c254.jpg', 1),
(32, 'lifebouy soap', 10, 0, '<p>lifebouy</p>', 50.00, 'uploads/4670f01151.jpg', 1),
(33, 'teddy toy', 11, 2, '<p>teddy toy</p>', 500.00, 'uploads/810540b3d6.jpg', 0),
(34, 'necklaces', 8, 3, '<p><span>necklaces</span></p>', 1000.00, 'uploads/6dded18468.jpg', 0),
(35, 'bike', 11, 2, '<p>kids bike&nbsp;</p>', 5000.00, 'uploads/c621cff448.jpg', 0),
(36, 'football ball', 11, 2, '<p>football ball</p>', 400.00, 'uploads/50c61208cc.jpg', 1),
(37, 'cocacola', 13, 5, '<p>cocacola soft drink</p>', 45.00, 'uploads/3570d7dcba.jpg', 1),
(38, 'amla', 12, 11, '<p>dfasbhhf fdbk.a f</p>', 55.00, 'uploads/3c3fb10768.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesman`
--

CREATE TABLE `tbl_salesman` (
  `Id` int(11) NOT NULL,
  `salesmanName` varchar(30) NOT NULL,
  `salesmanUser` varchar(30) NOT NULL,
  `salesmanEmail` varchar(30) NOT NULL,
  `salesmanPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `secretWord` varchar(30) NOT NULL,
  `secretNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_salesman`
--

INSERT INTO `tbl_salesman` (`Id`, `salesmanName`, `salesmanUser`, `salesmanEmail`, `salesmanPassword`, `level`, `secretWord`, `secretNumber`) VALUES
(2, 'Salesman', 'cashier', 'cash@gmail.com', '1234', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(6, 1, 15, 'Laundry machine ', 3200.00, 'uploads/d712a37947.png'),
(8, 4, 30, 'Dova soap', 50.00, 'uploads/a97879d6c7.jpg'),
(9, 4, 34, 'necklaces', 1000.00, 'uploads/6dded18468.jpg'),
(10, 4, 35, 'bike', 5000.00, 'uploads/c621cff448.jpg'),
(11, 4, 29, 'Largo', 100.00, 'uploads/d1d3073e7b.jpg'),
(12, 5, 29, 'Largo', 100.00, 'uploads/d1d3073e7b.jpg'),
(13, 5, 34, 'necklaces', 1000.00, 'uploads/6dded18468.jpg'),
(14, 6, 37, 'cocacola', 45.00, 'uploads/3570d7dcba.jpg'),
(15, 9, 25, 'vatika', 200.00, 'uploads/5d8a8e8e95.jpg'),
(16, 9, 37, 'cocacola', 45.00, 'uploads/3570d7dcba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`id`, `user_id`, `product_name`, `product_rating`) VALUES
(0, 0, 'amla', 3),
(1, 1, 'vatika', 5),
(2, 2, 'vatika', 1),
(3, 3, 'lux', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recom_user`
--
ALTER TABLE `recom_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_salesman`
--
ALTER TABLE `tbl_salesman`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recom_user`
--
ALTER TABLE `recom_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_salesman`
--
ALTER TABLE `tbl_salesman`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
