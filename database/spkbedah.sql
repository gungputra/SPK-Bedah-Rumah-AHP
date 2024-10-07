-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2024 at 12:45 PM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gunj6228_spkbedah`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahp_bobot_kriteria`
--

CREATE TABLE `ahp_bobot_kriteria` (
  `id_bobot` int(11) NOT NULL,
  `C1` double NOT NULL,
  `C2` double NOT NULL,
  `C3` double NOT NULL,
  `C4` double NOT NULL,
  `C5` double NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_bobot_kriteria`
--

INSERT INTO `ahp_bobot_kriteria` (`id_bobot`, `C1`, `C2`, `C3`, `C4`, `C5`, `aktif`) VALUES
(30, 0.56710956897501, 0.23370903485552, 0.11439471368856, 0.053378415867322, 0.031408266613591, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ahp_data_alternatif`
--

CREATE TABLE `ahp_data_alternatif` (
  `id_alternatif` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `atap` int(11) NOT NULL,
  `lantai` int(11) NOT NULL,
  `dinding` int(11) NOT NULL,
  `penerangan` int(11) NOT NULL,
  `air` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_data_alternatif`
--

INSERT INTO `ahp_data_alternatif` (`id_alternatif`, `nama`, `atap`, `lantai`, `dinding`, `penerangan`, `air`) VALUES
(3, 'Gung Putra', 5, 5, 5, 3, 4),
(4, 'Wahyudi', 1, 3, 4, 1, 3),
(7, 'Teja', 3, 5, 3, 2, 2),
(8, 'Rudi', 4, 5, 4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ahp_data_alternatif_ternormalisasi`
--

CREATE TABLE `ahp_data_alternatif_ternormalisasi` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `atap` double NOT NULL,
  `lantai` double NOT NULL,
  `dinding` double NOT NULL,
  `penerangan` double NOT NULL,
  `air` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_data_alternatif_ternormalisasi`
--

INSERT INTO `ahp_data_alternatif_ternormalisasi` (`id_alternatif`, `nama`, `atap`, `lantai`, `dinding`, `penerangan`, `air`) VALUES
(3, 'Gung Putra', 0.38461538461538, 0.27777777777778, 0.3125, 0.375, 0.30769230769231),
(4, 'Wahyudi', 0.076923076923077, 0.16666666666667, 0.25, 0.125, 0.23076923076923),
(7, 'Teja', 0.23076923076923, 0.27777777777778, 0.1875, 0.25, 0.15384615384615),
(8, 'Rudi', 0.30769230769231, 0.27777777777778, 0.25, 0.25, 0.30769230769231);

-- --------------------------------------------------------

--
-- Table structure for table `ahp_data_kriteria`
--

CREATE TABLE `ahp_data_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_data_kriteria`
--

INSERT INTO `ahp_data_kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(1, 'Bahan Atap'),
(2, 'Bahan Lantai'),
(3, 'Bahan Dinding'),
(4, 'Penerangan Rumah'),
(5, 'Sumber Air');

-- --------------------------------------------------------

--
-- Table structure for table `ahp_konsistensi`
--

CREATE TABLE `ahp_konsistensi` (
  `id_konsistensi` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `konsistensi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_konsistensi`
--

INSERT INTO `ahp_konsistensi` (`id_konsistensi`, `nilai`, `konsistensi`) VALUES
(1, 1.0041730657713, 'kurang konsisten');

-- --------------------------------------------------------

--
-- Table structure for table `ahp_preferensi_kriteria`
--

CREATE TABLE `ahp_preferensi_kriteria` (
  `id_preferensi` int(11) NOT NULL,
  `id_kriteria_1` int(11) NOT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_preferensi_kriteria`
--

INSERT INTO `ahp_preferensi_kriteria` (`id_preferensi`, `id_kriteria_1`, `id_kriteria_2`, `nilai`) VALUES
(1056, 1, 2, 9),
(1057, 2, 1, 0.11111111111111),
(1058, 1, 3, 9),
(1059, 3, 1, 0.11111111111111),
(1060, 1, 4, 9),
(1061, 4, 1, 0.11111111111111),
(1062, 1, 5, 9),
(1063, 5, 1, 0.11111111111111),
(1064, 1, 1, 1),
(1065, 2, 3, 7),
(1066, 3, 2, 0.14285714285714),
(1067, 2, 4, 7),
(1068, 4, 2, 0.14285714285714),
(1069, 2, 5, 7),
(1070, 5, 2, 0.14285714285714),
(1071, 2, 2, 1),
(1072, 3, 4, 5),
(1073, 4, 3, 0.2),
(1074, 3, 5, 5),
(1075, 5, 3, 0.2),
(1076, 3, 3, 1),
(1077, 4, 5, 3),
(1078, 5, 4, 0.33333333333333),
(1079, 4, 4, 1),
(1080, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ahp_preferensi_kriteria_ternormalisasi`
--

CREATE TABLE `ahp_preferensi_kriteria_ternormalisasi` (
  `id_preferensi_ternormalisasi` int(11) NOT NULL,
  `id_kriteria_1` int(11) NOT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_preferensi_kriteria_ternormalisasi`
--

INSERT INTO `ahp_preferensi_kriteria_ternormalisasi` (`id_preferensi_ternormalisasi`, `id_kriteria_1`, `id_kriteria_2`, `nilai`) VALUES
(451, 2, 1, 0.076923076923076),
(452, 3, 1, 0.076923076923076),
(453, 4, 1, 0.076923076923076),
(454, 5, 1, 0.076923076923076),
(455, 1, 1, 0.69230769230769),
(456, 1, 2, 0.86301369863014),
(457, 3, 2, 0.013698630136986),
(458, 4, 2, 0.013698630136986),
(459, 5, 2, 0.013698630136986),
(460, 2, 2, 0.095890410958904),
(461, 1, 3, 0.51724137931034),
(462, 2, 3, 0.40229885057471),
(463, 4, 3, 0.011494252873563),
(464, 5, 3, 0.011494252873563),
(465, 3, 3, 0.057471264367816),
(466, 1, 4, 0.40298507462687),
(467, 2, 4, 0.3134328358209),
(468, 3, 4, 0.22388059701493),
(469, 5, 4, 0.014925373134328),
(470, 4, 4, 0.044776119402985),
(471, 1, 5, 0.36),
(472, 2, 5, 0.28),
(473, 3, 5, 0.2),
(474, 4, 5, 0.12),
(475, 5, 5, 0.04);

-- --------------------------------------------------------

--
-- Table structure for table `ahp_rangking`
--

CREATE TABLE `ahp_rangking` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `C1` double NOT NULL,
  `C2` double NOT NULL,
  `C3` double NOT NULL,
  `C4` double NOT NULL,
  `C5` double NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_rangking`
--

INSERT INTO `ahp_rangking` (`id_alternatif`, `nama`, `C1`, `C2`, `C3`, `C4`, `C5`, `nilai`) VALUES
(3, 'Gung Putra', 0.21811906499039, 0.089888090329045, 0.043997966803292, 0.02053015994897, 0.012080102543689, 0.38461538461538),
(4, 'Wahyudi', 0.043623812998078, 0.017977618065809, 0.0087995933606585, 0.004106031989794, 0.0024160205087378, 0.076923076923077),
(7, 'Teja', 0.13087143899423, 0.053932854197428, 0.026398780081975, 0.012318095969382, 0.0072480615262133, 0.23076923076923),
(8, 'Rudi', 0.17449525199231, 0.071910472263237, 0.035198373442634, 0.016424127959176, 0.0096640820349511, 0.30769230769231);

-- --------------------------------------------------------

--
-- Table structure for table `ahp_user`
--

CREATE TABLE `ahp_user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ahp_user`
--

INSERT INTO `ahp_user` (`username`, `password`, `nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('agungputra6716', 'd20f94944347ceae031879b79e1ae1c1', 'Agung Putra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahp_bobot_kriteria`
--
ALTER TABLE `ahp_bobot_kriteria`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `ahp_data_alternatif`
--
ALTER TABLE `ahp_data_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `ahp_data_alternatif_ternormalisasi`
--
ALTER TABLE `ahp_data_alternatif_ternormalisasi`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `ahp_data_kriteria`
--
ALTER TABLE `ahp_data_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ahp_konsistensi`
--
ALTER TABLE `ahp_konsistensi`
  ADD PRIMARY KEY (`id_konsistensi`);

--
-- Indexes for table `ahp_preferensi_kriteria`
--
ALTER TABLE `ahp_preferensi_kriteria`
  ADD PRIMARY KEY (`id_preferensi`);

--
-- Indexes for table `ahp_preferensi_kriteria_ternormalisasi`
--
ALTER TABLE `ahp_preferensi_kriteria_ternormalisasi`
  ADD PRIMARY KEY (`id_preferensi_ternormalisasi`);

--
-- Indexes for table `ahp_rangking`
--
ALTER TABLE `ahp_rangking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `ahp_user`
--
ALTER TABLE `ahp_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahp_bobot_kriteria`
--
ALTER TABLE `ahp_bobot_kriteria`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ahp_data_alternatif`
--
ALTER TABLE `ahp_data_alternatif`
  MODIFY `id_alternatif` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ahp_data_kriteria`
--
ALTER TABLE `ahp_data_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ahp_preferensi_kriteria`
--
ALTER TABLE `ahp_preferensi_kriteria`
  MODIFY `id_preferensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1081;

--
-- AUTO_INCREMENT for table `ahp_preferensi_kriteria_ternormalisasi`
--
ALTER TABLE `ahp_preferensi_kriteria_ternormalisasi`
  MODIFY `id_preferensi_ternormalisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
