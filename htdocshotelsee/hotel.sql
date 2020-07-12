-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 03:09 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_persian_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1529906091),
('m130524_201442_init', 1529906094),
('m140506_102106_rbac_init', 1529906129),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1529906129);

-- --------------------------------------------------------

--
-- Table structure for table `tbhotel`
--

CREATE TABLE `tbhotel` (
  `id` int(11) NOT NULL,
  `name_hotel` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `name_hotel_en` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `name_manager_hotel` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `address_hotel` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `addrerss_hotel_en` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `city_hotel` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `city_hotel_en` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `status_star` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `map_x` double DEFAULT NULL,
  `map_y` double DEFAULT NULL,
  `phone` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `mobile_manager` int(11) NOT NULL,
  `logo_hotel` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `general_information` text COLLATE utf8_persian_ci,
  `general_information_en` text COLLATE utf8_persian_ci,
  `space` text COLLATE utf8_persian_ci,
  `space_en` text COLLATE utf8_persian_ci,
  `roles` text COLLATE utf8_persian_ci,
  `roles_en` text COLLATE utf8_persian_ci,
  `suite` int(11) DEFAULT '0',
  `restuarant` int(11) DEFAULT '0',
  `internet` int(11) DEFAULT '0',
  `parking` int(11) DEFAULT '0',
  `prayer_room` int(11) DEFAULT '0',
  `lobby` int(11) DEFAULT '0',
  `sport_hall` int(11) DEFAULT '0',
  `store` int(11) DEFAULT '0',
  `coffe_shop` int(11) DEFAULT '0',
  `net_in_lobby` int(11) DEFAULT '0',
  `snooker` int(11) DEFAULT '0',
  `jaccuzzi` int(11) DEFAULT '0',
  `sanna` int(11) DEFAULT '0',
  `photography` int(11) DEFAULT '0',
  `laundry` int(11) DEFAULT '0',
  `car_rental` int(11) DEFAULT '0',
  `cleaning` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbhotel`
--

INSERT INTO `tbhotel` (`id`, `name_hotel`, `name_hotel_en`, `name_manager_hotel`, `address_hotel`, `addrerss_hotel_en`, `city_hotel`, `city_hotel_en`, `status_star`, `map_x`, `map_y`, `phone`, `mobile_manager`, `logo_hotel`, `date`, `time`, `time_end`, `general_information`, `general_information_en`, `space`, `space_en`, `roles`, `roles_en`, `suite`, `restuarant`, `internet`, `parking`, `prayer_room`, `lobby`, `sport_hall`, `store`, `coffe_shop`, `net_in_lobby`, `snooker`, `jaccuzzi`, `sanna`, `photography`, `laundry`, `car_rental`, `cleaning`) VALUES
(3, 'fdg', 'gdf', 'dg', 'dfg', 'dgfd', 'کیش', 'kish', '4star', NULL, NULL, '3112313-6353', 24234324, '1.jpeg', '2018-06-27', 1530093236, 2, '<p>dfg</p>', '', 'gdf', 'gfd', '', '', 1, 1, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0),
(4, 'fsfsd', 'fsdfsd', 'sfsdf', 'sdfsdf', 'fsdfsdf', 'کیش', 'kish', '1star', NULL, NULL, '22323', 24234324, '2_medium.jpg', '2018-06-27', 1530093921, 1, '<p>dasd</p>', '', '', '', '', '', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(11) NOT NULL,
  `img` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `alt` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `img`, `alt`, `description`, `id_hotel`) VALUES
(1, '1.jpeg', 'd', 'dfs', 3),
(2, '7.jpg', 'gfh', 'ggh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbljastlink`
--

CREATE TABLE `tbljastlink` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblkhadamat`
--

CREATE TABLE `tblkhadamat` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `category` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `khadamat` text COLLATE utf8_persian_ci,
  `location` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `roles` text COLLATE utf8_persian_ci,
  `img` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `img_menu` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `sms_notification` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblkhadamat`
--

INSERT INTO `tblkhadamat` (`id`, `id_hotel`, `category`, `name`, `phone`, `khadamat`, `location`, `roles`, `img`, `img_menu`, `mobile`, `sms_notification`) VALUES
(1, 3, 'restuarant', 'tre', '43543', 'rtet', 'tre', 'terte', '1_BD_440x200_Gift_April18._CB502503690_.jpg', '1_BD_440x200_Gift_April18._CB502503690_.jpg#*', 4353, 1),
(4, 3, 'parking', 'da', 'da', 'da', 'da', 'faf', '2_.jpg', '2.jpg#*2_.jpg#*2_DB_440x200_Women_Accessories_April18._CB502513614_.jpg#*', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllink`
--

CREATE TABLE `tbllink` (
  `id` int(11) NOT NULL,
  `img` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `alt` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `id_hotel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbllink`
--

INSERT INTO `tbllink` (`id`, `img`, `link`, `title`, `description`, `alt`, `id_hotel`) VALUES
(1, '71Gu0ru1AKL._SL500_SR160,160_.jpg', 'dsf', 'fsd', 'sfds', 'fsd', 0),
(2, '1_BD_440x200_Home_Decor_April18._CB502496607_.jpg', 'dsf', 'fsd', 'sfds', 'fsd', 0),
(3, '2.jpg', 'dsf', 'fsd', 'sdf', 'fsd', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `descriptipn` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `meta` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `keyword` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`id`, `title`, `descriptipn`, `meta`, `keyword`, `text`) VALUES
(1, 'لیست بیمارستان ها و خدمات شهری', 'لیست بیمارستان ها و خدمات شهری', 'لیست بیمارستان ها و خدمات شهری', 'لیست بیمارستان ها و خدمات شهری', 'لیست بیمارستان ها و خدمات شهری'),
(2, 'تماس با ما', 'تماس با ما', 'تماس با ما', 'تماس با ما', '<p>تماس با ما</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tblsans`
--

CREATE TABLE `tblsans` (
  `id` int(11) NOT NULL,
  `id_khadamat` int(11) NOT NULL,
  `day_of_weeken` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `time` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `women_men` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `descrition` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblsans`
--

INSERT INTO `tblsans` (`id`, `id_khadamat`, `day_of_weeken`, `time`, `women_men`, `descrition`, `id_hotel`) VALUES
(1, 4, 'Saturday', '234', 'women', 'سبیس', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbhotel`
--
ALTER TABLE `tbhotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbljastlink`
--
ALTER TABLE `tbljastlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkhadamat`
--
ALTER TABLE `tblkhadamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllink`
--
ALTER TABLE `tbllink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsans`
--
ALTER TABLE `tblsans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbhotel`
--
ALTER TABLE `tbhotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbljastlink`
--
ALTER TABLE `tbljastlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblkhadamat`
--
ALTER TABLE `tblkhadamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbllink`
--
ALTER TABLE `tbllink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsans`
--
ALTER TABLE `tblsans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
