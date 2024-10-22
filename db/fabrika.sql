-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2024 at 06:35 AM
-- Server version: 10.1.48-MariaDB
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fabrika`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'css/images/bed.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Кровать 1', 10000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae tortor tellus. Mauris sollicitudin hendrerit tortor, vel accumsan dui pulvinar ac. Nunc id interdum justo. Quisque risus nisl, congue eget interdum non, maximus eget orci. Suspendisse ac massa a eros ullamcorper pretium. Etiam neque massa, laoreet et dictum quis, fringilla eu odio. Proin lobortis nunc tempus justo feugiat sollicitudin. Integer at suscipit diam. Aliquam nec auctor mauris. Nam pulvinar vel augue suscipit lobortis.\r\n\r\nDonec molestie turpis non urna pellentesque, vitae tincidunt dolor pulvinar. Nunc urna orci, mattis vel ullamcorper ut, venenatis nec velit. Sed vitae dignissim est. Ut eu nunc semper, dapibus quam vel, hendrerit dui. Proin mattis tortor diam, in ullamcorper urna porttitor non. Vestibulum ut nisi ac lacus efficitur dictum dignissim vel diam. Pellentesque tincidunt odio ac nisi tincidunt laoreet. Praesent semper augue non arcu facilisis, ac volutpat leo rutrum. Sed vehicula dictum dapibus. Morbi tortor mi, ultrices in dolor vitae, congue ultrices ipsum. Quisque aliquam augue non pharetra fermentum. Nullam vulputate odio purus, ac rhoncus justo condimentum eu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis dapibus nec mi a rhoncus. Etiam non venenatis mauris. Integer ullamcorper nec libero at condimentum.', 'css/images/bed.jpg'),
(2, 'Кровать 2', 15000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae tortor tellus. Mauris sollicitudin hendrerit tortor, vel accumsan dui pulvinar ac. Nunc id interdum justo. Quisque risus nisl, congue eget interdum non, maximus eget orci. Suspendisse ac massa a eros ullamcorper pretium. Etiam neque massa, laoreet et dictum quis, fringilla eu odio. Proin lobortis nunc tempus justo feugiat sollicitudin. Integer at suscipit diam. Aliquam nec auctor mauris. Nam pulvinar vel augue suscipit lobortis.\r\n\r\nDonec molestie turpis non urna pellentesque, vitae tincidunt dolor pulvinar. Nunc urna orci, mattis vel ullamcorper ut, venenatis nec velit. Sed vitae dignissim est. Ut eu nunc semper, dapibus quam vel, hendrerit dui. Proin mattis tortor diam, in ullamcorper urna porttitor non. Vestibulum ut nisi ac lacus efficitur dictum dignissim vel diam. Pellentesque tincidunt odio ac nisi tincidunt laoreet. Praesent semper augue non arcu facilisis, ac volutpat leo rutrum. Sed vehicula dictum dapibus. Morbi tortor mi, ultrices in dolor vitae, congue ultrices ipsum. Quisque aliquam augue non pharetra fermentum. Nullam vulputate odio purus, ac rhoncus justo condimentum eu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis dapibus nec mi a rhoncus. Etiam non venenatis mauris. Integer ullamcorper nec libero at condimentum.', 'css/images/bed2.jpg'),
(3, 'Кровать 3', 40000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae tortor tellus. Mauris sollicitudin hendrerit tortor, vel accumsan dui pulvinar ac. Nunc id interdum justo. Quisque risus nisl, congue eget interdum non, maximus eget orci. Suspendisse ac massa a eros ullamcorper pretium. Etiam neque massa, laoreet et dictum quis, fringilla eu odio. Proin lobortis nunc tempus justo feugiat sollicitudin. Integer at suscipit diam. Aliquam nec auctor mauris. Nam pulvinar vel augue suscipit lobortis.\r\n\r\nDonec molestie turpis non urna pellentesque, vitae tincidunt dolor pulvinar. Nunc urna orci, mattis vel ullamcorper ut, venenatis nec velit. Sed vitae dignissim est. Ut eu nunc semper, dapibus quam vel, hendrerit dui. Proin mattis tortor diam, in ullamcorper urna porttitor non. Vestibulum ut nisi ac lacus efficitur dictum dignissim vel diam. Pellentesque tincidunt odio ac nisi tincidunt laoreet. Praesent semper augue non arcu facilisis, ac volutpat leo rutrum. Sed vehicula dictum dapibus. Morbi tortor mi, ultrices in dolor vitae, congue ultrices ipsum. Quisque aliquam augue non pharetra fermentum. Nullam vulputate odio purus, ac rhoncus justo condimentum eu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis dapibus nec mi a rhoncus. Etiam non venenatis mauris. Integer ullamcorper nec libero at condimentum.', 'css/images/bed3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(3, 'ayrat', '$2y$10$k4P7aJkgU9WlvVGFUJhSQeaEY88/2C1k7.8dKh8rF9StTeT.CjeJK'),
(4, '121', '$2y$10$LqEIOf6Xk9xOy2axwwUDwOHf30KZ9jD/Kp7sodRr/rKbMI2bdZ6ay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
