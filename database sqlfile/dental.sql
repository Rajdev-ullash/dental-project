-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 08:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `long_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `name`, `short_desc`, `long_desc`) VALUES
(2, 'upload/blog/81932.png', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob` varchar(14) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bdate`, `name`, `mob`, `appdate`, `apptime`, `status`) VALUES
(1, '2022-04-23', 'kk', '989898', '2022-04-23', '5:30pm-6:00pm', 'confirmed'),
(2, '2022-04-23', 'kk', '989898', '2022-04-23', '5:30pm-6:00pm', 'confirmed'),
(3, '2022-04-23', 'KK', '9898989', '2022-04-23', '3:00pm-3:30pm', 'confirmed'),
(4, '2022-04-23', 'KK', '9181811717', '2022-04-23', '3:00pm-3:30pm', 'confirmed'),
(5, '2022-04-23', 'kk', '9999', '2022-04-23', '3:00pm-3:30pm', 'pending'),
(6, '2022-04-23', 'kk', '01292891', '2022-04-23', '3:00pm-3:30pm', 'pending'),
(7, '2022-04-23', 'oo', '98989', '2022-04-23', '4:00pm-4:30pm', 'pending'),
(8, '2022-04-23', 'BB', '9008989789', '2022-04-22', '3:00pm-3:30pm', 'pending'),
(9, '2022-04-23', 'KK', '989989', '2022-04-23', '3:00pm-3:30pm', 'pending'),
(10, '2022-04-23', 'kk', '9989', '2022-04-23', '4:30pm-5:00pm', 'pending'),
(11, '2022-04-23', 'Mehedi', '99181817', '2022-04-24', '3:00pm-3:30pm', 'pending'),
(12, '2022-04-23', 'Sarwar', '819181717', '2022-04-23', '3:00pm-3:30pm', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `srl` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `srl`, `status`, `img`, `created_at`, `updated_at`) VALUES
(4, 'Abul Kashem', 'BDS', 1, 1, 'images/82222', '2022-04-23 11:32:17', NULL),
(5, 'Murad', 'BDS', -1, 1, 'images/56267', '2022-04-23 11:30:42', NULL),
(6, 'Amjad', 'BDS', -2, 1, 'images/74835', '2022-04-23 11:30:48', NULL),
(7, 'FEED ADDITIVES', 'BDS', 24, 1, 'images/40749', '2022-04-23 10:48:51', NULL),
(8, 'Baten', 'BDS', 89, 1, 'images/72954', '2022-04-23 10:51:36', NULL),
(9, 'hhh', 'hhh', 9, 1, 'images/56779', '2022-04-23 10:52:32', NULL),
(10, 'hhh', 'hhh', 9, 1, '', '2022-04-23 10:53:22', NULL),
(11, 'hhh2', 'hhh', 9, 1, '', '2022-04-23 10:53:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_desc` varchar(200) NOT NULL,
  `long_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `image`, `name`, `short_desc`, `long_desc`) VALUES
(3, 'upload/feature/6416.jpg', 'Laser Denstistry with Epic X diode laser', 'Epic X is the all-in-one everyday diode laser. Epic X features three distinct treatment modes and 30 clinical indications. ', 'Epic X is the all-in-one everyday diode laser. Epic X features three distinct treatment modes and 30 clinical indications. '),
(4, 'upload/feature/17192.jpg', 'Labomed® Magna dental microscope', 'The Labomed® Magna dental microscope provides dentists with the power of crystal clear visualization in a compact, ergonomic design.', 'The Labomed® Magna dental microscope provides dentists with the power of crystal clear visualization in a compact, ergonomic design.'),
(5, 'upload/feature/22958.jpg', 'Ozone DTA J-500', 'The ozone therapy is the latest dental technology by applying ozone to easily eliminate most bacteria and viruses without any side effect.', 'The ozone therapy is the latest dental technology by applying ozone to easily eliminate most bacteria and viruses without any side effect.');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`) VALUES
(9);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon_img` varchar(250) NOT NULL,
  `name` varchar(200) NOT NULL,
  `short_desc` varchar(200) NOT NULL,
  `long_desc` varchar(1000) NOT NULL,
  `images` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon_img`, `name`, `short_desc`, `long_desc`, `images`) VALUES
(27, 'upload/service/59433.png', 'Dental Implant', 'A procedure that replaces damaged toolth with artificial', ' Dental implants are artificial tooth roots that are surgically placed into the jawbone to support replacement teeth or dental bridges. They provide a strong foundation for fixed or removable replacement teeth, designed to match your natural teeth in appearance and function. Dental implants are an effective and long-term solution for individuals who have lost one or more teeth due to various reasons such as decay, gum disease, or injury.', '[\"upload/82090.jpg\",\"upload/37138.jpg\"]'),
(28, 'upload/service/12870.png', 'Laser Denstistry', 'Soft Tissue Treatment Treating Gum Pigmentation', 'Laser dentistry involves the use of lasers or concentrated beams of light for various dental procedures. These advanced technologies offer precise and minimally invasive alternatives to traditional dental tools, providing benefits such as reduced pain, faster healing times, and enhanced precision', '[\"upload/25877.jpg\",\"upload/93471.jpg\"]'),
(29, 'upload/service/25606.png', 'Orthodontics', 'Braces, Fixed Retainer, Orthodontic Trainer for Child Patients', ' Orthodontics is a specialized branch of dentistry that focuses on the diagnosis, prevention, and correction of irregularities in the alignment and positioning of teeth and jaws. The goal of orthodontic treatment is to enhance the functionality, health, and aesthetics of the oral and facial structures', '[\"upload/47637.jpg\",\"upload/71296.jpg\"]'),
(30, 'upload/service/18369.png', 'Endodontics', 'Root Canal Treatment', 'Endodontics is a specialized field of dentistry that focuses on the diagnosis, prevention, and treatment of diseases and injuries affecting the dental pulp (the innermost part of the tooth containing blood vessels, nerves, and connective tissues) and the tissues surrounding the tooth roots. Endodontists are dental specialists who are trained to perform root canal treatments and other procedures aimed at saving and preserving teeth', '[\"upload/61439.jpg\",\"upload/70810.jpg\"]'),
(31, 'upload/service/29920.png', 'Oral Surgery', 'Extractions & Minor Surgical Treatments', ' Endodontics is a specialized field of dentistry that focuses on the diagnosis, prevention, and treatment of diseases and injuries affecting the dental pulp (the innermost part of the tooth containing blood vessels, nerves, and connective tissues) and the tissues surrounding the tooth roots. Endodontists are dental specialists who are trained to perform root canal treatments and other procedures aimed at saving and preserving teeth', '[\"upload/84831.jpg\",\"upload/30035.jpg\"]'),
(32, 'upload/service/1436.png', 'Consmetic Dentistry', 'Teeth Whitening, Smile Design, Color Filling', 'Laser dentistry involves the use of lasers or concentrated beams of light for various dental procedures. These advanced technologies offer precise and minimally invasive alternatives to traditional dental tools, providing benefits such as reduced pain, faster healing times, and enhanced precision', '[\"upload/63453.jpg\",\"upload/44628.jpg\"]'),
(33, 'upload/service/84336.png', 'Micro-Endodontics', 'Root Canal Retreatment, Broken Instrument Retrieval, Endodontic Micro Surgery, MTA Applications, Revascularization', 'Micro-endodontics, also known as microscopic endodontics or microsurgical endodontics, is a specialized field within endodontics that utilizes advanced magnification and illumination technologies to perform precise and minimally invasive root canal treatments. The use of a dental operating microscope enhances the dentist\'s ability to visualize intricate details inside the tooth\'s root canal system, leading to more accurate diagnoses and effective treatment outcomes', '[\"upload/13315.jpg\",\"upload/46037.jpg\"]'),
(34, 'upload/service/88253.png', 'Prosthodontics', 'Denture, Flexible Denture, Crown & Bridge Including all Ceramic Crown', ' Prosthodontics is a specialized field of dentistry focused on the restoration and replacement of missing or damaged teeth and oral structures. Prosthodontists, the dental professionals specializing in prosthodontics, are trained to diagnose, plan, and execute treatments to restore optimal oral function, aesthetics, and comfort. The goal is to enhance the quality of life for patients by improving their ability to bite, chew, speak, and smile.', '[\"upload/58986.jpg\",\"upload/78845.jpg\"]'),
(35, 'upload/service/41411.png', 'Pedodontics', 'Paediatic Dentistry - Examination, Pulpotomy, Pulpectomy, Paediatic Crown, Fluoride Therapy, Fissure Sealants', 'Pedodontics, also known as pediatric dentistry, is a specialized branch of dentistry that focuses on the dental care and oral health of children from infancy through adolescence. Pedodontists, or pediatric dentists, are trained to provide comprehensive dental services tailored to the unique needs of young patients.', '[\"upload/88266.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(1) NOT NULL,
  `description` varchar(50) NOT NULL,
  `login_limit` int(10) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `level`, `description`, `login_limit`, `expiry_date`, `status`) VALUES
(1, 'admin', '123', 1, 'ok', 5000, '2031-04-30', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
