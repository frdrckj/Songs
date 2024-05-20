-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2024 at 12:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `song_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `music` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `artist`, `album`, `music`) VALUES
(28, 'Too Sweet', 'Hozier', 'Hozier - Too Sweet Cover.jpeg', 'Hozier - Too Sweet.mp3'),
(29, 'Linger', 'Royal Otis (The Cranberries Cover)', 'Royal Otis - Linger Cover.webp', 'Royel Otis - Linger (The Cranberries Cover).mp3'),
(30, 'Sunshine On My Shoulders', 'John Denver', 'John Denver - Sunshine On My Shoulders Cover.jpg', 'John - Denver Sunshine On My Shoulders.mp3'),
(31, 'I want You Back', 'Jackson 5', 'Jackson 5 - I Want You Back Cover.jpg', 'Jackson 5 - I Want You Back.mp3'),
(32, 'Come And Get Your Love', 'Redbone', 'Redbone - Come And Get Your Love Cover.jpg', 'Redbone - Come and Get Your Love.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
