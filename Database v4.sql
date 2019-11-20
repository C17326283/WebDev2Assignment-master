-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 12:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bk_isbn` varchar(13) NOT NULL,
  `bk_name` varchar(50) NOT NULL,
  `bk_author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bk_isbn`, `bk_name`, `bk_author`) VALUES
('1234', 'harry thrones', 'ben stiller');



CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `name`, `email`, `message`) VALUES
(1, 'Kyle Heffernan', 'kyleheff99@gmail.com', 'This is my first message.'),
(2, 'Kyle Heffernan', 'kyleheff99@gmail.com', 'This my second.'),
(3, 'Kyle Heffernan', 'kyleheff99@gmail.com', 'third times a charg'),
(4, 'Kyle Heffernan', 'kyleheff99@gmail.com', 'four guys burgers and fries'),
(5, 'Kyle Heffernan', 'kyleheff99@gmail.com', 'four guys burgers and fries');
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `email`, `password`) VALUES
('ryby', '', 'ryby@ryby', 'ryby'),
('rayn', 'rayn', 'rayn@rayn', 'rayn'),
('Ryan Byrne', 'ryandbyrne', 'ryby@rybyr.com', '123456'),
('ryky', 'rykyry', 'ryky@kyry', 'ryky'),
('rysy', 'rysy', 'rysy@rysy', 'rysy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--

ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);


ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `contact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
