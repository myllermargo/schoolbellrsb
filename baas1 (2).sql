-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2025 at 08:44 AM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baas1`
--

-- --------------------------------------------------------

--
-- Table structure for table `KP_eksam_kl10`
--

CREATE TABLE `KP_eksam_kl10` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_eksam_kl10`
--

INSERT INTO `KP_eksam_kl10` (`id`, `kell`, `lisa`) VALUES
(36, '07:57:00', ''),
(37, '08:00:00', ''),
(38, '08:45:00', ''),
(39, '08:53:00', ''),
(40, '08:55:00', ''),
(41, '09:40:00', ''),
(42, '09:48:00', ''),
(43, '09:50:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `KP_EsimeneKellAinult`
--

CREATE TABLE `KP_EsimeneKellAinult` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_EsimeneKellAinult`
--

INSERT INTO `KP_EsimeneKellAinult` (`id`, `kell`, `lisa`) VALUES
(1, '07:57:00', ''),
(2, '08:00:00', 'esimene tund');

-- --------------------------------------------------------

--
-- Table structure for table `KP_EsimeneTundAinult`
--

CREATE TABLE `KP_EsimeneTundAinult` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_EsimeneTundAinult`
--

INSERT INTO `KP_EsimeneTundAinult` (`id`, `kell`, `lisa`) VALUES
(1, '07:57:00', ''),
(2, '08:00:00', 'esimene tund'),
(3, '08:45:00', 'esimene vahetund'),
(4, '08:53:00', ''),
(5, '08:55:00', 'teine tund');

-- --------------------------------------------------------

--
-- Table structure for table `KP_Lyhendatud35m`
--

CREATE TABLE `KP_Lyhendatud35m` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_Lyhendatud35m`
--

INSERT INTO `KP_Lyhendatud35m` (`id`, `kell`, `lisa`) VALUES
(2, '08:00:00', '1. tund'),
(3, '08:35:00', ''),
(4, '08:45:00', '2. tund'),
(5, '09:20:00', ''),
(6, '09:30:00', '3. tund'),
(7, '10:05:00', ''),
(8, '10:20:00', '4. tund'),
(9, '10:55:00', ''),
(10, '11:10:00', '5. tund'),
(11, '11:45:00', ''),
(13, '11:58:00', ''),
(14, '12:45:00', '7. tund'),
(15, '13:20:00', ''),
(16, '08:43:00', ''),
(18, '10:18:00', ''),
(19, '09:28:00', ''),
(20, '11:08:00', ''),
(21, '12:35:00', ''),
(22, '12:00:00', '6. tund'),
(23, '07:58:00', ''),
(24, '12:43:00', ''),
(25, '13:23:00', ''),
(26, '13:25:00', '8 tund'),
(27, '14:00:00', 'Koju');

-- --------------------------------------------------------

--
-- Table structure for table `KP_Lyhendatud_30min_1kun6`
--

CREATE TABLE `KP_Lyhendatud_30min_1kun6` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_Lyhendatud_30min_1kun6`
--

INSERT INTO `KP_Lyhendatud_30min_1kun6` (`id`, `kell`, `lisa`) VALUES
(1, '07:58:00', ''),
(2, '08:00:00', '1. tund'),
(3, '08:30:00', '1. vahetund'),
(4, '08:38:00', ''),
(5, '08:40:00', '2. tund'),
(6, '09:10:00', '2. vahetund'),
(7, '09:18:00', ''),
(8, '09:20:00', '3. tund'),
(9, '09:50:00', '3. vahetund ( I söögivahetund)'),
(10, '10:08:00', ''),
(11, '10:10:00', '4. tund'),
(12, '10:40:00', '4. vahetund ( II söögivahetund)'),
(13, '10:58:00', ''),
(14, '11:00:00', '5. tund'),
(15, '11:30:00', '5. vahetund ( II söögivahetund)'),
(16, '11:48:00', ''),
(17, '11:50:00', '6. tund'),
(24, '12:20:00', '6. vahetund'),
(25, '12:23:00', ''),
(26, '12:25:00', '7. tund'),
(27, '12:55:00', 'Kõik Koju!!');

-- --------------------------------------------------------

--
-- Table structure for table `KP_Lyhendatud_30min_1kun8`
--

CREATE TABLE `KP_Lyhendatud_30min_1kun8` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_Lyhendatud_30min_1kun8`
--

INSERT INTO `KP_Lyhendatud_30min_1kun8` (`id`, `kell`, `lisa`) VALUES
(1, '07:58:00', ''),
(2, '08:00:00', '1. tund'),
(3, '08:30:00', '1. vahetund'),
(4, '08:38:00', ''),
(5, '08:40:00', '2. tund'),
(6, '09:10:00', '2. vahetund'),
(7, '09:18:00', ''),
(8, '09:20:00', '3. tund'),
(9, '09:50:00', '3. vahetund ( I söögivahetund)'),
(10, '10:08:00', ''),
(11, '10:10:00', '4. tund'),
(12, '10:40:00', '4. vahetund ( II söögivahetund)'),
(13, '10:58:00', ''),
(14, '11:00:00', '5. tund'),
(15, '11:30:00', '5. vahetund ( II söögivahetund)'),
(16, '11:48:00', ''),
(17, '11:50:00', '6. tund'),
(18, '12:20:00', '6. vahetund'),
(19, '12:28:00', ''),
(20, '12:30:00', '7. tund'),
(21, '13:00:00', '7. vahetund'),
(22, '13:03:00', ''),
(23, '13:05:00', '8. tund'),
(24, '13:35:00', 'Kõik koju!!');

-- --------------------------------------------------------

--
-- Table structure for table `KP_Pühad2`
--

CREATE TABLE `KP_Pühad2` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_Pühad2`
--

INSERT INTO `KP_Pühad2` (`id`, `kell`, `lisa`) VALUES
(3, '13:54:31', NULL),
(4, '13:54:31', NULL),
(5, '19:55:49', '.');

-- --------------------------------------------------------

--
-- Table structure for table `KP_Reedene`
--

CREATE TABLE `KP_Reedene` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_Reedene`
--

INSERT INTO `KP_Reedene` (`id`, `kell`, `lisa`) VALUES
(1, '07:57:00', NULL),
(2, '08:00:00', '1 klassijuhataja tund'),
(3, '08:20:00', '1 vahetund'),
(4, '08:28:00', NULL),
(5, '08:30:00', '2. tund'),
(6, '09:15:00', '2 vahetund'),
(7, '09:23:00', NULL),
(8, '09:25:00', '3. tund'),
(9, '10:10:00', '3. vahetund'),
(10, '10:28:00', NULL),
(11, '10:30:00', '4 tund'),
(12, '11:15:00', '4. vahetund'),
(13, '11:33:00', NULL),
(14, '11:35:00', '5. tund'),
(15, '12:20:00', '5. vahetund'),
(16, '12:38:00', NULL),
(17, '12:40:00', '6. tund'),
(18, '13:25:00', 'Kõik koju! Päev läbi');

-- --------------------------------------------------------

--
-- Table structure for table `KP_Tavaline`
--

CREATE TABLE `KP_Tavaline` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_Tavaline`
--

INSERT INTO `KP_Tavaline` (`id`, `kell`, `lisa`) VALUES
(1, '07:58:00', NULL),
(2, '08:00:00', '1. tund'),
(3, '08:45:00', '1 vahetund'),
(4, '08:53:00', NULL),
(5, '08:55:00', '2. tund'),
(6, '09:40:00', '2. vahetund'),
(7, '09:48:00', NULL),
(8, '09:50:00', '3. tund'),
(9, '10:35:00', '3. vahetund'),
(10, '10:53:00', NULL),
(11, '10:55:00', '4. tund'),
(12, '11:40:00', '4. vahetund'),
(13, '11:58:00', NULL),
(14, '12:00:00', '5. tund'),
(15, '12:45:00', '5. vahetund'),
(16, '13:03:00', NULL),
(17, '13:05:00', '6. tund'),
(18, '13:50:00', '6 vahetund'),
(19, '13:53:00', NULL),
(21, '14:40:00', '7 vahetund'),
(22, '14:43:00', NULL),
(23, '14:45:00', '8. tund'),
(24, '13:55:00', '7. tund'),
(25, '15:30:00', 'KOJU!!');

-- --------------------------------------------------------

--
-- Table structure for table `KP_testingus`
--

CREATE TABLE `KP_testingus` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_testingus`
--

INSERT INTO `KP_testingus` (`id`, `kell`, `lisa`) VALUES
(18, '02:18:00', ''),
(19, '18:43:00', 'xfj'),
(21, '10:55:00', ''),
(22, '10:18:00', ''),
(23, '16:13:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `KP_yksKuniKolm`
--

CREATE TABLE `KP_yksKuniKolm` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_yksKuniKolm`
--

INSERT INTO `KP_yksKuniKolm` (`id`, `kell`, `lisa`) VALUES
(1, '07:58:00', ''),
(2, '08:00:00', ''),
(3, '08:45:00', ''),
(4, '08:53:00', ''),
(5, '08:55:00', ''),
(6, '09:40:00', ''),
(7, '09:48:00', ''),
(8, '09:50:00', ''),
(9, '10:35:00', ''),
(10, '10:55:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `KP_yksKuniKuus`
--

CREATE TABLE `KP_yksKuniKuus` (
  `id` int(11) NOT NULL,
  `kell` time DEFAULT NULL,
  `lisa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `KP_yksKuniKuus`
--

INSERT INTO `KP_yksKuniKuus` (`id`, `kell`, `lisa`) VALUES
(1, '07:58:00', ''),
(2, '08:00:00', ''),
(3, '08:45:00', ''),
(4, '08:53:00', ''),
(5, '08:55:00', ''),
(6, '09:40:00', ''),
(7, '09:48:00', ''),
(8, '09:50:00', ''),
(9, '10:35:00', ''),
(10, '10:53:00', ''),
(11, '10:55:00', ''),
(12, '11:40:00', ''),
(13, '11:58:00', ''),
(14, '12:00:00', ''),
(15, '12:45:00', ''),
(16, '12:58:00', ''),
(17, '13:00:00', ''),
(18, '13:45:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `Kuupaevad`
--

CREATE TABLE `Kuupaevad` (
  `id` int(11) NOT NULL,
  `kuupaev` date NOT NULL,
  `kalender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci NOT NULL,
  `heli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Kuupaevad`
--

INSERT INTO `Kuupaevad` (`id`, `kuupaev`, `kalender`, `heli`) VALUES
(12, '2024-09-18', 'KP_Lyhendatud35m', 'heli_662f3ad6e581f.mp3'),
(13, '2024-10-04', 'KP_yksKuniKolm', 'heli_662f3ad6e581f.mp3'),
(14, '2024-11-01', 'KP_Lyhendatud_30min_1kun6', 'heli_662f3ad6e581f.mp3'),
(16, '2024-12-20', 'KP_EsimeneKellAinult', 'heli_662f3ad6e581f.mp3'),
(17, '2024-12-19', 'KP_Lyhendatud35m', 'heli_662f3ad6e581f.mp3'),
(18, '2025-03-20', 'KP_Lyhendatud_30min_1kun6', 'heli_662f3ad6e581f.mp3'),
(19, '2025-04-22', 'KP_eksam_kl10', 'heli_662f3ad6e581f.mp3'),
(20, '2025-04-29', 'KP_eksam_kl10', 'heli_662f3ad6e581f.mp3'),
(21, '2025-05-05', 'KP_eksam_kl10', 'heli_662f3ad6e581f.mp3'),
(22, '2025-05-06', 'KP_EsimeneTundAinult', 'heli_662f3ad6e581f.mp3'),
(23, '2025-05-07', 'KP_eksam_kl10', 'heli_662f3ad6e581f.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `lapsed`
--

CREATE TABLE `lapsed` (
  `id` int(11) NOT NULL,
  `eesnimi` text NOT NULL,
  `perekonnanimi` text NOT NULL,
  `isikukood` int(11) NOT NULL,
  `synniaeg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('ligip22s', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('ligip22s', '[{\"db\":\"baas1\",\"table\":\"seaded\"},{\"db\":\"baas1\",\"table\":\"KP_eksam_kl10\"},{\"db\":\"baas1\",\"table\":\"KP_Pyhad1\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `Puhad`
--

CREATE TABLE `Puhad` (
  `id` int(11) NOT NULL,
  `kuupaevA` date DEFAULT NULL,
  `kuupaevL` date DEFAULT NULL,
  `varu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Puhad`
--

INSERT INTO `Puhad` (`id`, `kuupaevA`, `kuupaevL`, `varu`) VALUES
(1, '2024-10-21', '2024-10-27', 'sügisvaheaeg'),
(2, '2024-12-23', '2025-01-05', 'talvevaheaeg'),
(3, '2025-02-24', '2025-03-02', 'kevadepoolne vaheaeg'),
(4, '2025-04-14', '2025-04-20', 'kevad vaheaeg'),
(11, '2024-06-06', '2024-06-06', 'Eksam'),
(12, '2024-06-01', '2024-06-02', 'Nädala vahetuseks'),
(13, '2025-06-11', '2025-08-31', 'SUVI'),
(14, '2025-01-09', '2025-01-09', 'e-õppepäwev'),
(15, '2025-01-28', '2025-01-28', 'väljasõit'),
(16, '2025-05-01', '2025-05-02', 'Kevadpüha');

-- --------------------------------------------------------

--
-- Table structure for table `seaded`
--

CREATE TABLE `seaded` (
  `id` int(11) NOT NULL,
  `Tootab` tinyint(1) NOT NULL DEFAULT 1,
  `Kalender` text CHARACTER SET utf8mb3 COLLATE utf8mb3_estonian_ci NOT NULL,
  `varu` int(11) DEFAULT NULL,
  `Muusika` text NOT NULL,
  `ndlaPaev` int(11) DEFAULT NULL,
  `ndlpKalender` text DEFAULT NULL,
  `PinOne` int(2) DEFAULT NULL,
  `PinTwo` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seaded`
--

INSERT INTO `seaded` (`id`, `Tootab`, `Kalender`, `varu`, `Muusika`, `ndlaPaev`, `ndlpKalender`, `PinOne`, `PinTwo`) VALUES
(1, 1, 'KP_Tavaline', 2, 'justament6638c60d3197b.mp3', 5, 'KP_Reedene', 17, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `KP_eksam_kl10`
--
ALTER TABLE `KP_eksam_kl10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_EsimeneKellAinult`
--
ALTER TABLE `KP_EsimeneKellAinult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_EsimeneTundAinult`
--
ALTER TABLE `KP_EsimeneTundAinult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_Lyhendatud35m`
--
ALTER TABLE `KP_Lyhendatud35m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_Lyhendatud_30min_1kun6`
--
ALTER TABLE `KP_Lyhendatud_30min_1kun6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_Lyhendatud_30min_1kun8`
--
ALTER TABLE `KP_Lyhendatud_30min_1kun8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_Pühad2`
--
ALTER TABLE `KP_Pühad2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_Reedene`
--
ALTER TABLE `KP_Reedene`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_Tavaline`
--
ALTER TABLE `KP_Tavaline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_testingus`
--
ALTER TABLE `KP_testingus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_yksKuniKolm`
--
ALTER TABLE `KP_yksKuniKolm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KP_yksKuniKuus`
--
ALTER TABLE `KP_yksKuniKuus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Kuupaevad`
--
ALTER TABLE `Kuupaevad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapsed`
--
ALTER TABLE `lapsed`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `Puhad`
--
ALTER TABLE `Puhad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seaded`
--
ALTER TABLE `seaded`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `KP_eksam_kl10`
--
ALTER TABLE `KP_eksam_kl10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `KP_EsimeneKellAinult`
--
ALTER TABLE `KP_EsimeneKellAinult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `KP_EsimeneTundAinult`
--
ALTER TABLE `KP_EsimeneTundAinult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `KP_Lyhendatud35m`
--
ALTER TABLE `KP_Lyhendatud35m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `KP_Lyhendatud_30min_1kun6`
--
ALTER TABLE `KP_Lyhendatud_30min_1kun6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `KP_Lyhendatud_30min_1kun8`
--
ALTER TABLE `KP_Lyhendatud_30min_1kun8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `KP_Pühad2`
--
ALTER TABLE `KP_Pühad2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `KP_Reedene`
--
ALTER TABLE `KP_Reedene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `KP_Tavaline`
--
ALTER TABLE `KP_Tavaline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `KP_testingus`
--
ALTER TABLE `KP_testingus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `KP_yksKuniKolm`
--
ALTER TABLE `KP_yksKuniKolm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `KP_yksKuniKuus`
--
ALTER TABLE `KP_yksKuniKuus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Kuupaevad`
--
ALTER TABLE `Kuupaevad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lapsed`
--
ALTER TABLE `lapsed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Puhad`
--
ALTER TABLE `Puhad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `seaded`
--
ALTER TABLE `seaded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
