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

-- Dumping structure for table atonergi.d_grup_menu
CREATE TABLE IF NOT EXISTS `d_grup_menu` (
  `gm_id` int(11) NOT NULL,
  `gm_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.d_jabatan
CREATE TABLE IF NOT EXISTS `d_jabatan` (
  `j_id` int(11) NOT NULL,
  `j_nama` varchar(50) DEFAULT NULL,
  `j_keterangan` varchar(100) DEFAULT NULL,
  `j_created_at` timestamp NULL DEFAULT NULL,
  `j_updated_at` timestamp NULL DEFAULT NULL,
  `j_created_by` varchar(50) DEFAULT NULL,
  `j_updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.d_marketing
CREATE TABLE IF NOT EXISTS `d_marketing` (
  `mk_id` int(11) DEFAULT NULL,
  `mk_code` int(11) DEFAULT NULL,
  `mk_name` int(11) DEFAULT NULL,
  `mk_phone` int(11) DEFAULT NULL,
  `mk_address` int(11) DEFAULT NULL,
  `mk_email` int(11) DEFAULT NULL,
  `mk_information` int(11) DEFAULT NULL,
  `mk_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.d_mem
CREATE TABLE IF NOT EXISTS `d_mem` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(50) DEFAULT NULL,
  `m_password` varchar(50) DEFAULT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `m_jabatan` varchar(20) NOT NULL,
  `m_image` varchar(50) DEFAULT NULL,
  `m_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `m_updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_last_login` timestamp NULL DEFAULT NULL,
  `m_last_logout` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.d_quotation
CREATE TABLE IF NOT EXISTS `d_quotation` (
  `Column 1` int(11) DEFAULT NULL,
  `Column 2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.d_quotation_value
CREATE TABLE IF NOT EXISTS `d_quotation_value` (
  `Column 1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.m_customer
CREATE TABLE IF NOT EXISTS `m_customer` (
  `c_id` int(11) DEFAULT NULL,
  `c_code` varchar(20) DEFAULT NULL,
  `c_name` varchar(100) DEFAULT NULL,
  `c_birthday` date DEFAULT NULL,
  `c_phone` varchar(50) DEFAULT NULL,
  `c_address` text,
  `c_email` varchar(150) DEFAULT NULL,
  `c_type` varchar(50) DEFAULT NULL,
  `c_insert` timestamp NULL DEFAULT NULL,
  `c_creditterms` int(11) DEFAULT NULL,
  `c_plafon` int(11) DEFAULT NULL,
  `c_bankname` varchar(50) DEFAULT NULL,
  `c_npwp` varchar(50) DEFAULT NULL,
  `c_accountnumber` int(20) DEFAULT NULL,
  `c_information` timestamp NULL DEFAULT NULL,
  `c_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.m_item
CREATE TABLE IF NOT EXISTS `m_item` (
  `i_id` int(11) DEFAULT NULL,
  `i_code` varchar(12) DEFAULT NULL,
  `i_name` varchar(50) DEFAULT NULL,
  `i_unit` varchar(50) DEFAULT NULL,
  `i_price` decimal(10,0) DEFAULT NULL COMMENT 'sementara : selanjutnya pakai tabel harga',
  `i_type` varchar(5) DEFAULT NULL,
  `i_minstock` int(11) DEFAULT NULL,
  `i_image` int(11) DEFAULT NULL,
  `i_weight` int(11) DEFAULT NULL,
  `i_description` text,
  `i_insert` timestamp NULL DEFAULT NULL,
  `i_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.m_item_bundling
CREATE TABLE IF NOT EXISTS `m_item_bundling` (
  `ib_item` int(11) DEFAULT NULL,
  `ib_detailid` int(11) DEFAULT NULL,
  `ib_price` decimal(10,0) DEFAULT NULL,
  `ib_isactive` enum('Y','N') DEFAULT NULL,
  `ib_insert` timestamp NULL DEFAULT NULL,
  `ib_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.m_price
CREATE TABLE IF NOT EXISTS `m_price` (
  `p_id` int(11) DEFAULT NULL,
  `p_code` int(11) DEFAULT NULL,
  `p_item` int(11) DEFAULT NULL,
  `p_range_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table atonergi.m_vendor
CREATE TABLE IF NOT EXISTS `m_vendor` (
  `s_id` int(11) DEFAULT NULL,
  `s_company` varchar(100) DEFAULT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `s_address` varchar(100) DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_phone` varchar(50) DEFAULT NULL,
  `s_fax` varchar(50) DEFAULT NULL,
  `s_termin` varchar(50) DEFAULT NULL,
  `s_limit` float DEFAULT NULL,
  `s_npwp` int(11) DEFAULT NULL,
  `s_information` text,
  `s_accountnumber` int(11) DEFAULT NULL,
  `s_bankname` varchar(50) DEFAULT NULL,
  `s_insert` timestamp NULL DEFAULT NULL,
  `s_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
