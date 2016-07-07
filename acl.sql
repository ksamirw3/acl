-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2015 at 02:02 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arg`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`) VALUES
(1, '372682_190c740.jpg'),
(12, 'mmm'),
(16, ''),
(19, ''),
(22, ''),
(23, '');

-- --------------------------------------------------------

--
-- Table structure for table `news_lang`
--

CREATE TABLE IF NOT EXISTS `news_lang` (
`id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_lang`
--

INSERT INTO `news_lang` (`id`, `news_id`, `language`, `title`, `description`) VALUES
(57, 12, 'en', 'mmm', 'mmm'),
(58, 12, 'ar', 'mmm', 'mmm'),
(60, 16, 'en', 'ttt', 'tttt'),
(61, 16, 'ar', 'ttt', 'ttt'),
(64, 19, 'en', 'sdfd', 'sfsdfs'),
(65, 19, 'ar', 'dsfs', 'fsf'),
(68, 22, 'en', 'fds', 'fsdfs'),
(69, 22, 'ar', 'sdf', 'fsf'),
(76, 1, 'en', 'eee', 'eee eee ee'),
(77, 1, 'ar', 'يسبب', 'بسبسب'),
(80, 23, 'en', 'dsf', 'fsfs @#&lt;?&gt;'),
(81, 23, 'ar', 'fsf', 'fsfs @#&lt;?&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `active`, `login`, `password`, `is_superadmin`, `name`, `email`) VALUES
(22, 1, 'superadmin', '33eeaa61c01b2f296e3df6f17951d0fb', 1, '', ''),
(23, 1, 'admin', '7eea35b402bd0b2d301be479e769c02b', 0, 'my name', 'admin@yahoo.com'),
(31, 1, 'uuu', '9cc4cbcc3d6833843e87dfd9edebf534', 0, 'uuu', 'uuu@yahoo.com'),
(32, 1, 'mmm', '6cde384b472bf2d4547a42368a26b40a', 0, 'mmm', 'mmm@adsia.com'),
(33, 1, 'adminUser', '5412366bd576c22b14a3a9348620d570', 0, 'adminUser', 'adminUser@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_cache`
--

CREATE TABLE IF NOT EXISTS `user_cache` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_guest` tinyint(1) NOT NULL,
  `update_time` int(11) NOT NULL,
  `routes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_cache`
--

INSERT INTO `user_cache` (`id`, `user_id`, `status`, `is_guest`, `update_time`, `routes`) VALUES
(2, NULL, 1, 1, 1424350194, 'a:2:{i:0;s:10:"site/error";i:1;s:10:"site/index";}'),
(3, 23, 1, 0, 1424350756, 'a:11:{i:0;s:16:"UserAdmin/user/*";i:1;s:20:"UserAdmin/userRole/*";i:2;s:11:"users/admin";i:3;s:12:"users/create";i:4;s:12:"users/delete";i:5;s:12:"users/update";i:6;s:10:"news/admin";i:7;s:11:"news/create";i:8;s:11:"news/delete";i:9;s:11:"news/update";i:10;s:10:"home/index";}'),
(4, 31, 1, 0, 1424228502, 'a:5:{i:0;s:10:"news/admin";i:1;s:11:"news/create";i:2;s:11:"news/delete";i:3;s:11:"news/update";i:4;s:10:"home/index";}');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_user_role`
--

CREATE TABLE IF NOT EXISTS `user_has_user_role` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role_code` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_user_role`
--

INSERT INTO `user_has_user_role` (`id`, `user_id`, `user_role_code`) VALUES
(24, 23, 'admin'),
(32, 31, 'DataEntery'),
(33, 32, 'DataEntery'),
(34, 33, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_user_task`
--

CREATE TABLE IF NOT EXISTS `user_has_user_task` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_task_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_operation`
--

CREATE TABLE IF NOT EXISTS `user_operation` (
`id` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `is_module` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=567 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_operation`
--

INSERT INTO `user_operation` (`id`, `route`, `is_module`) VALUES
(287, 'site/error', 0),
(374, 'UserAdmin/user/create', 1),
(375, 'UserAdmin/user/update', 1),
(376, 'UserAdmin/user/view', 1),
(383, 'UserAdmin/userRole/view', 1),
(392, 'UserAdmin/userTask/view', 1),
(393, 'UserAdmin/userTask/refreshOperations', 1),
(433, 'site/index', 0),
(435, 'UserAdmin/auth/login', 1),
(436, 'UserAdmin/auth/logout', 1),
(462, 'site/*', 0),
(466, 'UserAdmin/auth/*', 1),
(467, 'UserAdmin/user/*', 1),
(468, 'UserAdmin/userRole/*', 1),
(469, 'UserAdmin/userTask/*', 1),
(502, 'UserAdmin/auth/registration', 1),
(524, 'UserAdmin/userRole/update', 1),
(538, 'UserAdmin/profile/*', 1),
(539, 'UserAdmin/profile/personal', 1),
(540, 'home/*', 0),
(541, 'home/index', 0),
(542, 'home/error', 0),
(543, 'news/*', 0),
(544, 'news/view', 0),
(545, 'news/create', 0),
(546, 'news/update', 0),
(547, 'news/delete', 0),
(548, 'news/index', 0),
(549, 'news/admin', 0),
(550, 'newsLang/*', 0),
(551, 'newsLang/view', 0),
(552, 'newsLang/create', 0),
(553, 'newsLang/update', 0),
(554, 'newsLang/delete', 0),
(555, 'newsLang/index', 0),
(556, 'newsLang/admin', 0),
(557, 'site/contact', 0),
(558, 'site/login', 0),
(559, 'site/logout', 0),
(560, 'users/*', 0),
(561, 'users/view', 0),
(562, 'users/create', 0),
(563, 'users/update', 0),
(564, 'users/delete', 0),
(565, 'users/index', 0),
(566, 'users/admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `home_page` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `code`, `home_page`, `description`) VALUES
(2, 'Admin', 'admin', '', 'Full access to the main settings'),
(5, 'DataEntery', 'DataEntery', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_has_user_task`
--

CREATE TABLE IF NOT EXISTS `user_role_has_user_task` (
`id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `user_task_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role_has_user_task`
--

INSERT INTO `user_role_has_user_task` (`id`, `user_role_id`, `user_task_id`) VALUES
(131, 2, 7),
(132, 2, 8),
(133, 2, 11),
(134, 2, 12),
(135, 2, 13),
(138, 5, 12),
(139, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE IF NOT EXISTS `user_task` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`id`, `name`, `code`, `description`) VALUES
(7, 'User management', 'userAdmin', 'It''s include creating, updating, deleting AND assigning roles and tasks to user'),
(8, 'User role management', 'userRoleAdmin', ''),
(10, '----- Free-for-all tasks ----', 'freeAccess', 'Tasks that can be performed by anyone. Like site/index and site/error'),
(11, 'usersTask', 'usersTask', ''),
(12, 'newsTask', 'newsTask', ''),
(13, 'dashboard', 'dashboard', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_task_has_user_operation`
--

CREATE TABLE IF NOT EXISTS `user_task_has_user_operation` (
`id` int(11) NOT NULL,
  `user_task_id` int(11) NOT NULL,
  `user_operation_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_task_has_user_operation`
--

INSERT INTO `user_task_has_user_operation` (`id`, `user_task_id`, `user_operation_id`) VALUES
(288, 7, 467),
(291, 8, 468),
(348, 10, 287),
(349, 10, 433),
(353, 11, 566),
(354, 11, 562),
(355, 11, 564),
(356, 11, 563),
(357, 12, 549),
(358, 12, 545),
(359, 12, 547),
(360, 12, 546),
(361, 13, 541);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_lang`
--
ALTER TABLE `news_lang`
 ADD PRIMARY KEY (`id`), ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `user_cache`
--
ALTER TABLE `user_cache`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_has_user_role`
--
ALTER TABLE `user_has_user_role`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `user_role_code` (`user_role_code`);

--
-- Indexes for table `user_has_user_task`
--
ALTER TABLE `user_has_user_task`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `user_task_code` (`user_task_code`);

--
-- Indexes for table `user_operation`
--
ALTER TABLE `user_operation`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `route` (`route`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `user_role_has_user_task`
--
ALTER TABLE `user_role_has_user_task`
 ADD PRIMARY KEY (`id`), ADD KEY `user_role_id` (`user_role_id`), ADD KEY `user_task_id` (`user_task_id`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `user_task_has_user_operation`
--
ALTER TABLE `user_task_has_user_operation`
 ADD PRIMARY KEY (`id`), ADD KEY `user_task_id` (`user_task_id`), ADD KEY `user_operation_id` (`user_operation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `news_lang`
--
ALTER TABLE `news_lang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_cache`
--
ALTER TABLE `user_cache`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_has_user_role`
--
ALTER TABLE `user_has_user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_has_user_task`
--
ALTER TABLE `user_has_user_task`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_operation`
--
ALTER TABLE `user_operation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=567;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_role_has_user_task`
--
ALTER TABLE `user_role_has_user_task`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_task_has_user_operation`
--
ALTER TABLE `user_task_has_user_operation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=362;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_lang`
--
ALTER TABLE `news_lang`
ADD CONSTRAINT `FK_news_lang_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_cache`
--
ALTER TABLE `user_cache`
ADD CONSTRAINT `user_cache_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_user_role`
--
ALTER TABLE `user_has_user_role`
ADD CONSTRAINT `user_has_user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_has_user_role_ibfk_2` FOREIGN KEY (`user_role_code`) REFERENCES `user_role` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_user_task`
--
ALTER TABLE `user_has_user_task`
ADD CONSTRAINT `user_has_user_task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_has_user_task_ibfk_2` FOREIGN KEY (`user_task_code`) REFERENCES `user_task` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role_has_user_task`
--
ALTER TABLE `user_role_has_user_task`
ADD CONSTRAINT `user_role_has_user_task_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_role_has_user_task_ibfk_2` FOREIGN KEY (`user_task_id`) REFERENCES `user_task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_task_has_user_operation`
--
ALTER TABLE `user_task_has_user_operation`
ADD CONSTRAINT `user_task_has_user_operation_ibfk_1` FOREIGN KEY (`user_task_id`) REFERENCES `user_task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_task_has_user_operation_ibfk_2` FOREIGN KEY (`user_operation_id`) REFERENCES `user_operation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
