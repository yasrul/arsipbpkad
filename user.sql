-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2016 at 12:26 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` smallint(6) DEFAULT NULL,
  `role_id` smallint(6) NOT NULL,
  `status_id` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `dept_id`, `role_id`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 'yasrul', 'UqzdPXfxR1V_AsgDagf2BGnTjsBGrJDQ', '$2y$13$uh7OXxGwgwHgkicXhO3tfex7IOimuILC2s.WgdfrqwENDjR6n099G', NULL, 'yasrul93@gmail.com', 2, 3, 1, 2016, 2016),
(5, 'amiruddin', 'IvGFzQ3uvJPi_P3JmqKEXdK0V9YYF7St', '$2y$13$ArWhFm0bGSl9jpZF/xIH1.hqboi..Fi0/oz59JQXnkl4OyArqWzA.', NULL, 'amir@ntbprov.go.id', 2, 4, 1, 2016, 2016),
(6, 'Administrator', 'N5yGLBNsIa7oyk35Eq3wiBfZW9cq0Ynp', '$2y$13$QjgGiHcANDFYU5bURinx0Oj3fLE7mLFp9cVyLkAc5w39Kd72IS.xu', NULL, 'yasrul@gmail.com', 2, 3, 1, 2016, 2016),
(7, 'abdullah', '6URjxAyu8dR9n9x_5JYnc68Im6eKhMoY', '$2y$13$xx87TaYGKgmA.ZRRSvUDEuhWtyo9Qs1NyHe4WYKl8buRmZ6v1Og3y', NULL, 'abdullah@gmail.com', NULL, 1, 1, 2016, 2016);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
