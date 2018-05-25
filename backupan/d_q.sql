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

-- Dumping structure for table atonergi.d_quotation
CREATE TABLE IF NOT EXISTS `d_quotation` (
  `q_id` int(11) NOT NULL,
  `q_nota` varchar(50) DEFAULT NULL,
  `q_total` double DEFAULT NULL,
  `q_customer` varchar(50) DEFAULT NULL,
  `q_address` varchar(50) DEFAULT NULL,
  `q_type` varchar(50) DEFAULT NULL,
  `q_type_pump` varchar(50) DEFAULT NULL,
  `q_shipping_method` varchar(50) DEFAULT NULL,
  `q_date` date DEFAULT NULL,
  `q_term` varchar(50) DEFAULT NULL,
  `q_delivery` date DEFAULT NULL,
  `q_ship_to` varchar(50) DEFAULT NULL,
  `q_sales` varchar(50) DEFAULT NULL,
  `q_marketing` varchar(50) DEFAULT NULL,
  `q_status` int(10) DEFAULT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table atonergi.d_quotation: ~0 rows (approximately)
DELETE FROM `d_quotation`;
/*!40000 ALTER TABLE `d_quotation` DISABLE KEYS */;
INSERT INTO `d_quotation` (`q_id`, `q_nota`, `q_total`, `q_customer`, `q_address`, `q_type`, `q_type_pump`, `q_shipping_method`, `q_date`, `q_term`, `q_delivery`, `q_ship_to`, `q_sales`, `q_marketing`, `q_status`) VALUES
	(1, 'tes', 300000, 'tes', 'tes', 'tes', 'tes', 'tes', '2018-05-24', 'tes', '2018-05-24', 'tes', 'tes', 'tes', 1);
/*!40000 ALTER TABLE `d_quotation` ENABLE KEYS */;

-- Dumping structure for table atonergi.d_quotation_dt
CREATE TABLE IF NOT EXISTS `d_quotation_dt` (
  `Column 1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table atonergi.d_quotation_dt: ~0 rows (approximately)
DELETE FROM `d_quotation_dt`;
/*!40000 ALTER TABLE `d_quotation_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_quotation_dt` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
