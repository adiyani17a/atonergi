-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for atonergi
CREATE DATABASE IF NOT EXISTS `atonergi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `atonergi`;

-- Dumping structure for table atonergi.d_unit
CREATE TABLE IF NOT EXISTS `d_unit` (
  `u_id` int(11) NOT NULL,
  `u_unit` varchar(50) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table atonergi.d_unit: ~2 rows (approximately)
DELETE FROM `d_unit`;
/*!40000 ALTER TABLE `d_unit` DISABLE KEYS */;
INSERT INTO `d_unit` (`u_id`, `u_unit`) VALUES
	(1, 'Ls'),
	(2, 'Roll'),
	(3, 'Unit');
/*!40000 ALTER TABLE `d_unit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
