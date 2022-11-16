-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2022 at 07:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kufa`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int NOT NULL,
  `about_me` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `skill_icon` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `skill_title` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `skill_percent` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about_me`, `skill_icon`, `skill_title`, `skill_percent`) VALUES
(8, 'Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim', 'fab fa-html5', 'Optio eos non proi', 85),
(9, 'Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim', 'fab fa-css3-alt', 'Totam ea officiis vo', 80),
(10, 'Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim', 'fab fa-js-square', 'Sed nemo reiciendis', 60),
(11, 'Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim Necessitatibus enim', 'fab fa-php', 'Ut id fugit est p', 88);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `profile_pic` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'demo.png',
  `address` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `twitter` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `instagram` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `linkedin` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_number`, `profile_pic`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`) VALUES
(43, 'Mahfuz', 'wotojy@mailinator.com', '5359634296651746cadd6dbb7af8c68c7fe6c04b', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(44, 'Mahfuz', 'cigyxaz@mailinator.com', '5359634296651746cadd6dbb7af8c68c7fe6c04b', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(45, 'Ahad', 'vabaveq@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(46, 'cudosez', 'mosu@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(47, 'repebo', 'cazym@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, '47.png', NULL, NULL, NULL, NULL, NULL),
(48, 'cabihecyla', 'pucuwyvix@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(49, 'pixutym', 'hicej@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(50, 'cymylu', 'pihobyp@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, '50.png', NULL, 'https://www.pomufetapuca.infosdfsdf', 'https://www.zetoturadawobuz.co.uk', 'https://www.pogi.info', 'https://www.gymaxek.net'),
(51, 'Leci', 'leci@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '+1 (341) 521-2045', '51.png', 'Mirpur 2no road, Dhaka , Bangladesh', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/'),
(52, 'givyco', 'kydu@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, '52.png', NULL, NULL, NULL, NULL, NULL),
(53, 'juxebekopy', 'vaza@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '+1 (665) 998-4092', '53.png', NULL, NULL, NULL, NULL, NULL),
(54, 'fonohydfjy', 'wotsdfojy@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(55, 'vulix', 'kicowusa@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(56, 'gylunoky', 'rokuqew@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(57, 'hogym', 'monibys@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, '57.png', NULL, NULL, NULL, NULL, NULL),
(58, 'kovuhyjyj', 'ahad123@gmail.com', '0e403ce69b07788b3b2347e856ba8bdb94986474', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL),
(59, 'pinesymofi', 'dyhexetu@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, 'demo.png', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `brand_name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `brand_logo` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`) VALUES
(6, 'Victoria Alston', '51_1668538102.png'),
(12, 'Melanie Monroe', '51_1668580990.png'),
(14, 'Silas Hudson', '51_1668581006.png'),
(16, 'Irene Floyd', '51_1668581017.png'),
(17, 'Yuri Barker', '51_1668581246.png'),
(18, 'Taylor Riley', '51_1668581250.png'),
(19, 'Garrison Short', '51_1668581257.png'),
(20, 'Joseph Blackwell', '51_1668581272.png'),
(21, 'Rudyard Swanson', '51_1668581277.png'),
(22, 'Tamekah Boyd', '51_1668581284.png'),
(25, 'Solomon Henry', '51_1668581572.png');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(6, 'Garrett Johns', 'baxuvyjy@mailinator.com', 'Mollit recusandae Q'),
(7, 'Natalie Mack', 'nerykydyjy@mailinator.com', 'Unde duis est ad aut'),
(8, 'Ann Cantrell', 'vihasyw@mailinator.com', 'Commodi corporis ali'),
(9, 'Kane Arnold', 'sikagyjafu@mailinator.com', 'Dolor fugit non et '),
(10, 'Linus Hamilton', 'quverybuz@mailinator.com', 'Sit non minima quod '),
(11, 'Jelani Wilkins', 'wypagobok@mailinator.com', 'Deserunt nisi atque '),
(12, 'Griffin Page', 'niluqew@mailinator.com', 'Perspiciatis nihil '),
(13, 'Carol Galloway', 'gemyqoxaje@mailinator.com', 'Nam suscipit magna m'),
(14, 'Ahad', 'texilifa@mailinator.com', 'Asperiores sapiente '),
(15, 'Clare Cain', 'gicadeqaq@mailinator.com', 'Cupiditate quibusdam'),
(16, 'Evelyn Greer', 'potoru@mailinator.com', 'Eiusmod est non bea'),
(17, 'Garrett Walls', 'islammahfuzul31@gmail.com', 'Corrupti ullam ad t'),
(18, 'Xyla Levy', 'islammahfuzul31@gmail.com', 'Debitis laudantium ');

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` int NOT NULL,
  `fact_icon` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `fact_count` int DEFAULT NULL,
  `fact_title` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `fact_icon`, `fact_count`, `fact_title`) VALUES
(15, 'fa fa-ambulance', 13, 'Corrupti quod ducim'),
(16, 'fa fa-arrows-v', 88, 'Fugiat quisquam aut'),
(17, 'fa fa-anchor', 37, 'Incidunt culpa dol'),
(18, 'fa fa-bomb', 60, 'Et aut fugiat nisi n');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `service_title` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `service_icon` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `service_description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `service_status` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_icon`, `service_description`, `service_status`) VALUES
(48, 'Distinctio Excepteu', 'fa fa-address-book', 'Enim tempora nihil v', 'active'),
(49, 'Voluptates Nam et am', 'fa fa-check-square-o', 'Alias repudiandae qu', 'active'),
(50, 'Facilis do ut quam q', 'fa fa-bullhorn', 'Non voluptate aperia', 'active'),
(51, 'Laborum Sit sit vol', 'fa fa-bicycle', 'Quis ut dolore volup', 'active'),
(52, 'Incididunt pariatur', 'fa fa-asl-interpreting', 'Eos illum qui quis', 'active'),
(54, 'Ut autem aut pariatu', 'fa fa-address-book-o', 'Culpa quam officiis', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `showcases`
--

CREATE TABLE `showcases` (
  `id` int NOT NULL,
  `showcase_title` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `showcase_heading` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `showcase_description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `showcase_image` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `showcase_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `showcases`
--

INSERT INTO `showcases` (`id`, `showcase_title`, `showcase_heading`, `showcase_description`, `showcase_image`, `showcase_status`) VALUES
(8, 'Ahad', 'Is', 'good boy', '51_1668405429.png', 'active'),
(10, 'Rem earum sint nisi', 'Consequatur occaeca', 'Laborum dignissimos Laborum dignissimosLaborum dignissimos Laborum dignissimos Laborum dignissimos Laborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimos Laborum dignissimosLaborum dignissimos Laborum dignissimos Laborum dignissimos Laborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimosLaborum dignissimos', '51_1668410308.png', 'active'),
(11, 'In fugiat vel irure', 'Proident in qui est', 'Iste rerum perspicia', '51_1668410978.png', 'active'),
(12, 'Accusantium assumend', 'Ad quo delectus ver', 'Cupiditate neque eos', '51_1668410987.png', 'active'),
(13, 'Ut quis illo sit com', 'Voluptatem quis opti', 'Eu eaque id quibusda', '51_1668410999.png', 'active'),
(14, 'Quis irure eius temp', 'Deserunt quibusdam i', 'Quos omnis elit nes', '51_1668581777.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `comment`, `name`, `title`, `status`) VALUES
(5, '51_1668437241.png', 'Dolore repellendus', 'Tanner Graves ', 'Sunt asperiores pra', 'active'),
(8, '51_1668437205.png', 'Est quasi earum quia', 'Ivy Gomez ', 'Doloribus dolorem re', 'active'),
(9, '51_1668437213.png', 'Eum vero excepteur c', 'Stephen Fuentes ', 'Et recusandae Ut ma', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showcases`
--
ALTER TABLE `showcases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `showcases`
--
ALTER TABLE `showcases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
