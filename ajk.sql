-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2019 at 05:05 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajk`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `phone`, `address`, `photo`) VALUES
(2, 'ilham', 'Ilham Bayhaqi', 'aaa@aaa.mm', '$2y$10$1FfMvbeq0QFiSizjobbzcO6RLWGIPlA.tz.FXIK18tXvlUOhAc6qy', '', '', 'default.png'),
(3, 'dasasdsaas', 'ajlkdsjs', 'sjhjak@hjsa.djs', '$2y$10$44.pkxHe8Sv7gUXCp2SIhOI1oo15SE6vnUoxZJnVbA9NN0Tv4LG4y', '', '', 'default.png'),
(4, 'whqkjhewqkj', 'ahsdkjk', 'sabdmnab@jshadkj.sd', '$2y$10$G4qmyAbCZMR7neNKnoZVe.uUDsVJUcDePp6S86VQRw.d90.S/NgAO', '', '', 'default.png'),
(7, 'hai', 'hai', 'hai@hai.com', '$2y$10$hhi7Wqhe7j73/iHxpI6bh.Xz3Wpc7BdBoXJFCutg.6xSC8Q0VbW3y', '', '', 'default.png'),
(8, 'username', 'name', 'email@email.com', '$2y$10$FuViCgkWkHL0dqjlatCgme.gu6jdeNjhF2SdniWudX/ahhhvyU8wq', '', '', 'default.png'),
(9, 'rohman', 'rohman', 'rohman@rohman.rohman', '$2y$10$v2DvY8xJGwG2rDUBeicI1efoJiS0lI.7ZlsifHfl1iGQWoitbUB3y', '', '', 'default.png'),
(10, 'admin', 'admin', 'admin@admin.admin', '$2y$10$1Hl4RUQkd9qbBS5Vit9rCOMMOc10gLal8QuEHW8DSnFwZVBfVnxWG', '', '', 'fotousb.jpg'),
(11, 'haha', 'haha', 'haha@haha.haha', '$2y$10$eEi3AeXjVYqsI1ELygXUseslNDyXS3aPz9MTt.QPOpgKi.zReC.jy', '', '', 'default.png'),
(12, 'kuuhaku', 'Yohan Ardiansyah', 'yohan.ardiansyah@gmail.com', '$2y$10$ehhAvEtgJp1UGxZAfGz5I.bjONaqViP.V.xSlA59okvu2uhnPPOzC', '', '', 'yohan.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
