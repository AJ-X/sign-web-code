-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-05-11 14:26:32
-- 服务器版本： 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sign`
--

-- --------------------------------------------------------

--
-- 表的结构 `sign_address`
--

CREATE TABLE `sign_address` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '北京朝阳区'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_address`
--

INSERT INTO `sign_address` (`id`, `uid`, `address`) VALUES
(1, 1, '北京西城区'),
(5, 2, '北京东城区'),
(6, 5, '北京海定区'),
(7, 2, '北京海定区'),
(8, 5, '北京房山区'),
(10, 1, '北京朝阳区');

-- --------------------------------------------------------

--
-- 表的结构 `sign_admin`
--

CREATE TABLE `sign_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_admin`
--

INSERT INTO `sign_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `sign_experience`
--

CREATE TABLE `sign_experience` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_experience`
--

INSERT INTO `sign_experience` (`id`, `uid`, `number`) VALUES
(1, 1, 500),
(2, 2, 600),
(3, 5, 1600);

-- --------------------------------------------------------

--
-- 表的结构 `sign_logistics`
--

CREATE TABLE `sign_logistics` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '待揽件'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_logistics`
--

INSERT INTO `sign_logistics` (`id`, `uid`, `name`, `time`, `status`) VALUES
(1, 1, ' 硒鼓', '1232133', '待揽件'),
(2, 2, '打印纸', '12321323', '待揽件'),
(3, 5, '胶水', '13123232132', '北京海定区揽件中心'),
(4, 2, '文件柜', '1312321', '已揽件，待装车。'),
(5, 1, '厚层文件盒', '13213213', '待揽件');

-- --------------------------------------------------------

--
-- 表的结构 `sign_material`
--

CREATE TABLE `sign_material` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_material`
--

INSERT INTO `sign_material` (`id`, `name`, `price`, `img`) VALUES
(1, '打印机', 2699, 'haocai/2018-05-04/5aec5fb56c20f.jpg'),
(3, '复印机', 2000, 'haocai/2018-04-27/5ae33822e3dcf.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `sign_order`
--

CREATE TABLE `sign_order` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `time` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '待发货'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_order`
--

INSERT INTO `sign_order` (`id`, `uid`, `name`, `price`, `time`, `status`) VALUES
(1, 1, '硒鼓', 300, '6123829', '待发货'),
(2, 2, '打印纸', 100, '123123123', '待收货'),
(3, 5, '胶水', 100, '13123232132', '待发货'),
(4, 1, '厚层文件盒', 200, '12321321', '待收货'),
(5, 2, '文件柜', 500, '123213213', '已发货'),
(6, 5, '办公桌', 1500, '483274932', '待发货');

-- --------------------------------------------------------

--
-- 表的结构 `sign_service`
--

CREATE TABLE `sign_service` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `message` varchar(200) COLLATE utf8_bin NOT NULL,
  `time` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '待审核'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_service`
--

INSERT INTO `sign_service` (`id`, `uid`, `name`, `message`, `time`, `status`) VALUES
(1, 1, '硒鼓', '硒鼓型号不匹配，申请换货。', '123213213', '审核通过');

-- --------------------------------------------------------

--
-- 表的结构 `sign_user`
--

CREATE TABLE `sign_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone` varchar(11) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `qq` varchar(50) COLLATE utf8_bin NOT NULL,
  `wechat` varchar(50) COLLATE utf8_bin NOT NULL,
  `weibo` varchar(50) COLLATE utf8_bin NOT NULL,
  `number` varchar(50) COLLATE utf8_bin NOT NULL,
  `grade` varchar(50) COLLATE utf8_bin NOT NULL,
  `img` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sign_user`
--

INSERT INTO `sign_user` (`id`, `username`, `password`, `phone`, `email`, `qq`, `wechat`, `weibo`, `number`, `grade`, `img`) VALUES
(1, '小王', '2', '13112345678', '111@qq.com', '123456', '小王', '123456', '500', '2', '2018-05-04/5aec5ef44359f.png'),
(2, '小李', '2', '13123456789', '111@qq.com', '1323123123', '小李', '133', '600', '3', '2018-04-27/5ae318c796e26.png'),
(5, '小芳', '111', '13112345678', '111@qq.com', '111111110', '小芳', '111123123', '1600', '4', '2018-04-27/5ae318cf37765.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sign_address`
--
ALTER TABLE `sign_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_admin`
--
ALTER TABLE `sign_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_experience`
--
ALTER TABLE `sign_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_logistics`
--
ALTER TABLE `sign_logistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_material`
--
ALTER TABLE `sign_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_order`
--
ALTER TABLE `sign_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_service`
--
ALTER TABLE `sign_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_user`
--
ALTER TABLE `sign_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sign_address`
--
ALTER TABLE `sign_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `sign_admin`
--
ALTER TABLE `sign_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sign_experience`
--
ALTER TABLE `sign_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `sign_logistics`
--
ALTER TABLE `sign_logistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `sign_material`
--
ALTER TABLE `sign_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `sign_order`
--
ALTER TABLE `sign_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `sign_service`
--
ALTER TABLE `sign_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sign_user`
--
ALTER TABLE `sign_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
