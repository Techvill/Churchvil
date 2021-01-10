-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 05:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchville`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category`
(
    `category_id` int(20)     NOT NULL,
    `category`    varchar(50) NOT NULL,
    `user_id`     int(20)     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `user_id`)
VALUES (1, 'Financial freedom1', 11),
       (2, 'Faith', 11),
       (3, 'Break through', 11);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers`
(
    `minister` int(20)   NOT NULL,
    `user_id`  int(20)   NOT NULL,
    `date`     timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`minister`, `user_id`, `date`)
VALUES (11, 11, '2019-03-22 03:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages`
(
    `message_id`  int(20)        NOT NULL,
    `user_id`     int(20)        NOT NULL,
    `category_id` int(20)        NOT NULL,
    `title`       varchar(50)    NOT NULL,
    `file`        varchar(150)   NOT NULL,
    `image`       varchar(190)   NOT NULL,
    `type`        varchar(50)    NOT NULL,
    `sys_cat`     varchar(50)    NOT NULL,
    `amount`      decimal(19, 2) NOT NULL,
    `time`        timestamp      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date`        date           NOT NULL,
    `view`        int(250)       NOT NULL DEFAULT '0'
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `category_id`, `title`, `file`, `image`, `type`, `sys_cat`, `amount`,
                        `time`, `date`, `view`)
VALUES (2, 11, 1, 'Blind man', 'video/45532310_2052010131525801_4775567095864805374_n.mp4', 'covers/bbb.PNG', 'Free',
        'Video', '0.00', '2019-03-18 08:26:07', '2019-03-18', 161),
       (3, 11, 2, 'Focal', 'video/49227001_139603673707720_7205251252936636335_n.mp4', 'covers/viola (2).PNG', 'Free',
        'Video', '0.00', '2019-03-18 13:20:18', '2019-03-18', 12),
       (5, 11, 3, 'worhip', 'audio_files/2Baba_Amaka_Ft_Peruzzi.mp3',
        'covers/300x224__width__20181017073651__5a430fd57364daefcca06e678e4a7440.jpg', 'Free', 'Audio', '0.00',
        '2019-03-18 14:16:40', '2019-03-18', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification`
(
    `notification_id` int(20)     NOT NULL,
    `details`         text        NOT NULL,
    `minister`        int(20)     NOT NULL,
    `user_id`         int(20)     NOT NULL,
    `date`            date        NOT NULL,
    `status`          varchar(50) NOT NULL,
    `moment`          timestamp   NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `details`, `minister`, `user_id`, `date`, `status`, `moment`)
VALUES (1, 'You are being followed by Bishop  chifundo mphaya', 11, 11, '2019-03-22', 'viewed', '2019-03-22 03:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery`
(
    `recover_id`    int(20)      NOT NULL,
    `recovery_code` text         NOT NULL,
    `email`         varchar(120) NOT NULL,
    `date`          date         NOT NULL,
    `status`        varchar(50)  NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`recover_id`, `recovery_code`, `email`, `date`, `status`)
VALUES (1, '00dbc4457ddb218eb4554334ef8e65155ef15dce', 'chifundomphaya@gmail.com', '2019-03-23', 'invalid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
    `user_id`  int(20)      NOT NULL,
    `fullname` varchar(50)  NOT NULL,
    `email`    varchar(100) NOT NULL,
    `password` varchar(70)  NOT NULL,
    `initial`  varchar(20)  NOT NULL,
    `role`     varchar(100) NOT NULL,
    `about`    text         NOT NULL,
    `country`  varchar(150) NOT NULL,
    `ministry` varchar(300) NOT NULL,
    `image`    varchar(140) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `password`, `initial`, `role`, `about`, `country`, `ministry`,
                     `image`)
VALUES (11, 'chifundo mphaya', 'chifundomphaya@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'Bishop',
        'minister', 'www', 'Australia', 'word alive ministries', 'profiles/bbb (2).PNG'),
       (12, 'john', 'c.mpha@live.com', '356a192b7913b04c54574d18c28d46e6395428ab', '', 'follower', '', 'Malawi', '',
        '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
    ADD KEY `minister` (`minister`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
    ADD PRIMARY KEY (`message_id`),
    ADD KEY `category_id` (`category_id`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
    ADD PRIMARY KEY (`notification_id`),
    ADD KEY `minister` (`minister`),
    ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
    ADD PRIMARY KEY (`recover_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
    MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
    MODIFY `message_id` int(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
    MODIFY `notification_id` int(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
    MODIFY `recover_id` int(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
    ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`minister`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
    ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
    ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`minister`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
