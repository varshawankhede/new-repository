-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 03:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animal`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_details`
--

CREATE TABLE `animal_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('herbivores','omnivores','carnivores') NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `life_expectancy` enum('0-1years','1-5years','5-10years','10+years') NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `inserted_date` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_details`
--

INSERT INTO `animal_details` (`id`, `name`, `category`, `image`, `description`, `life_expectancy`, `modified_date`, `inserted_date`, `last_modified`) VALUES
(1, 'Tiger', 'carnivores', 'tiger_carnivores.jpg', 'Tiger is carnivores animal.', '10+years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 06:54:22'),
(2, 'Lion', 'carnivores', 'lion_carnivores.jpg', 'Lion is a carnivores animal.', '', '2021-09-05 10:43:55', '0000-00-00 00:00:00', '2021-09-05 10:43:55'),
(3, 'Elephant', 'herbivores', 'elephant_herbivores.jpg', 'Elephant is herbivores animal.', '10+years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 07:01:55'),
(4, 'panda', 'herbivores', 'panda_herbivores.jpg', 'Panda is Herbivores animal.', '10+years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 07:02:56'),
(5, 'Monkey', 'omnivores', 'monkey_omnivores.jpg', 'Monkey is omnivores animal.', '10+years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 07:04:48'),
(6, 'Giraffes', 'herbivores', 'Giraffes_herbivores.jpg', 'Giraffes is Herbivores animal', '5-10years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 07:06:01'),
(7, 'Zebra', 'herbivores', 'zebra_Herbivores.jpg', 'Zebra is herbivores animal.', '5-10years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 07:18:36'),
(8, 'Deer', 'herbivores', 'deer_Herbivores.jpg', 'Deer is herbivores animal.', '5-10years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 07:08:33'),
(9, 'Tiger', 'carnivores', 'tiger_carnivores.jpg', 'good', '10+years', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-09-05 07:29:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_details`
--
ALTER TABLE `animal_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_details`
--
ALTER TABLE `animal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
