-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2019 at 08:45 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_sunnah`
--

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'citiasdf', 1, 1, 1, '2019-08-09 23:19:30', '2019-08-12 22:18:41', '2019-08-12 22:18:41'),
(1101, 11, 'KABUPATEN SIMEULUE', NULL, NULL, NULL, NULL, NULL, NULL),
(1102, 11, 'KABUPATEN ACEH SINGKIL', NULL, NULL, NULL, NULL, NULL, NULL),
(1103, 11, 'KABUPATEN ACEH SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1104, 11, 'KABUPATEN ACEH TENGGARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1105, 11, 'KABUPATEN ACEH TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(1106, 11, 'KABUPATEN ACEH TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(1107, 11, 'KABUPATEN ACEH BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1108, 11, 'KABUPATEN ACEH BESAR', NULL, NULL, NULL, NULL, NULL, NULL),
(1109, 11, 'KABUPATEN PIDIE', NULL, NULL, NULL, NULL, NULL, NULL),
(1110, 11, 'KABUPATEN BIREUEN', NULL, NULL, NULL, NULL, NULL, NULL),
(1111, 11, 'KABUPATEN ACEH UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1112, 11, 'KABUPATEN ACEH BARAT DAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(1113, 11, 'KABUPATEN GAYO LUES', NULL, NULL, NULL, NULL, NULL, NULL),
(1114, 11, 'KABUPATEN ACEH TAMIANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1115, 11, 'KABUPATEN NAGAN RAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(1116, 11, 'KABUPATEN ACEH JAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(1117, 11, 'KABUPATEN BENER MERIAH', NULL, NULL, NULL, NULL, NULL, NULL),
(1118, 11, 'KABUPATEN PIDIE JAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(1171, 11, 'KOTA BANDA ACEH', NULL, NULL, NULL, NULL, NULL, NULL),
(1172, 11, 'KOTA SABANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1173, 11, 'KOTA LANGSA', NULL, NULL, NULL, NULL, NULL, NULL),
(1174, 11, 'KOTA LHOKSEUMAWE', NULL, NULL, NULL, NULL, NULL, NULL),
(1175, 11, 'KOTA SUBULUSSALAM', NULL, NULL, NULL, NULL, NULL, NULL),
(1201, 12, 'KABUPATEN NIAS', NULL, NULL, NULL, NULL, NULL, NULL),
(1202, 12, 'KABUPATEN MANDAILING NATAL', NULL, NULL, NULL, NULL, NULL, NULL),
(1203, 12, 'KABUPATEN TAPANULI SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1204, 12, 'KABUPATEN TAPANULI TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(1205, 12, 'KABUPATEN TAPANULI UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1206, 12, 'KABUPATEN TOBA SAMOSIR', NULL, NULL, NULL, NULL, NULL, NULL),
(1207, 12, 'KABUPATEN LABUHAN BATU', NULL, NULL, NULL, NULL, NULL, NULL),
(1208, 12, 'KABUPATEN ASAHAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1209, 12, 'KABUPATEN SIMALUNGUN', NULL, NULL, NULL, NULL, NULL, NULL),
(1210, 12, 'KABUPATEN DAIRI', NULL, NULL, NULL, NULL, NULL, NULL),
(1211, 12, 'KABUPATEN KARO', NULL, NULL, NULL, NULL, NULL, NULL),
(1212, 12, 'KABUPATEN DELI SERDANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1213, 12, 'KABUPATEN LANGKAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1214, 12, 'KABUPATEN NIAS SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1215, 12, 'KABUPATEN HUMBANG HASUNDUTAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1216, 12, 'KABUPATEN PAKPAK BHARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1217, 12, 'KABUPATEN SAMOSIR', NULL, NULL, NULL, NULL, NULL, NULL),
(1218, 12, 'KABUPATEN SERDANG BEDAGAI', NULL, NULL, NULL, NULL, NULL, NULL),
(1219, 12, 'KABUPATEN BATU BARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1220, 12, 'KABUPATEN PADANG LAWAS UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1221, 12, 'KABUPATEN PADANG LAWAS', NULL, NULL, NULL, NULL, NULL, NULL),
(1222, 12, 'KABUPATEN LABUHAN BATU SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1223, 12, 'KABUPATEN LABUHAN BATU UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1224, 12, 'KABUPATEN NIAS UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1225, 12, 'KABUPATEN NIAS BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1271, 12, 'KOTA SIBOLGA', NULL, NULL, NULL, NULL, NULL, NULL),
(1272, 12, 'KOTA TANJUNG BALAI', NULL, NULL, NULL, NULL, NULL, NULL),
(1273, 12, 'KOTA PEMATANG SIANTAR', NULL, NULL, NULL, NULL, NULL, NULL),
(1274, 12, 'KOTA TEBING TINGGI', NULL, NULL, NULL, NULL, NULL, NULL),
(1275, 12, 'KOTA MEDAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1276, 12, 'KOTA BINJAI', NULL, NULL, NULL, NULL, NULL, NULL),
(1277, 12, 'KOTA PADANGSIDIMPUAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1278, 12, 'KOTA GUNUNGSITOLI', NULL, NULL, NULL, NULL, NULL, NULL),
(1301, 13, 'KABUPATEN KEPULAUAN MENTAWAI', NULL, NULL, NULL, NULL, NULL, NULL),
(1302, 13, 'KABUPATEN PESISIR SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1303, 13, 'KABUPATEN SOLOK', NULL, NULL, NULL, NULL, NULL, NULL),
(1304, 13, 'KABUPATEN SIJUNJUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(1305, 13, 'KABUPATEN TANAH DATAR', NULL, NULL, NULL, NULL, NULL, NULL),
(1306, 13, 'KABUPATEN PADANG PARIAMAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1307, 13, 'KABUPATEN AGAM', NULL, NULL, NULL, NULL, NULL, NULL),
(1308, 13, 'KABUPATEN LIMA PULUH KOTA', NULL, NULL, NULL, NULL, NULL, NULL),
(1309, 13, 'KABUPATEN PASAMAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1310, 13, 'KABUPATEN SOLOK SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1311, 13, 'KABUPATEN DHARMASRAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(1312, 13, 'KABUPATEN PASAMAN BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1371, 13, 'KOTA PADANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1372, 13, 'KOTA SOLOK', NULL, NULL, NULL, NULL, NULL, NULL),
(1373, 13, 'KOTA SAWAH LUNTO', NULL, NULL, NULL, NULL, NULL, NULL),
(1374, 13, 'KOTA PADANG PANJANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1375, 13, 'KOTA BUKITTINGGI', NULL, NULL, NULL, NULL, NULL, NULL),
(1376, 13, 'KOTA PAYAKUMBUH', NULL, NULL, NULL, NULL, NULL, NULL),
(1377, 13, 'KOTA PARIAMAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1401, 14, 'KABUPATEN KUANTAN SINGINGI', NULL, NULL, NULL, NULL, NULL, NULL),
(1402, 14, 'KABUPATEN INDRAGIRI HULU', NULL, NULL, NULL, NULL, NULL, NULL),
(1403, 14, 'KABUPATEN INDRAGIRI HILIR', NULL, NULL, NULL, NULL, NULL, NULL),
(1404, 14, 'KABUPATEN PELALAWAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1405, 14, 'KABUPATEN S I A K', NULL, NULL, NULL, NULL, NULL, NULL),
(1406, 14, 'KABUPATEN KAMPAR', NULL, NULL, NULL, NULL, NULL, NULL),
(1407, 14, 'KABUPATEN ROKAN HULU', NULL, NULL, NULL, NULL, NULL, NULL),
(1408, 14, 'KABUPATEN BENGKALIS', NULL, NULL, NULL, NULL, NULL, NULL),
(1409, 14, 'KABUPATEN ROKAN HILIR', NULL, NULL, NULL, NULL, NULL, NULL),
(1410, 14, 'KABUPATEN KEPULAUAN MERANTI', NULL, NULL, NULL, NULL, NULL, NULL),
(1471, 14, 'KOTA PEKANBARU', NULL, NULL, NULL, NULL, NULL, NULL),
(1473, 14, 'KOTA D U M A I', NULL, NULL, NULL, NULL, NULL, NULL),
(1501, 15, 'KABUPATEN KERINCI', NULL, NULL, NULL, NULL, NULL, NULL),
(1502, 15, 'KABUPATEN MERANGIN', NULL, NULL, NULL, NULL, NULL, NULL),
(1503, 15, 'KABUPATEN SAROLANGUN', NULL, NULL, NULL, NULL, NULL, NULL),
(1504, 15, 'KABUPATEN BATANG HARI', NULL, NULL, NULL, NULL, NULL, NULL),
(1505, 15, 'KABUPATEN MUARO JAMBI', NULL, NULL, NULL, NULL, NULL, NULL),
(1506, 15, 'KABUPATEN TANJUNG JABUNG TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(1507, 15, 'KABUPATEN TANJUNG JABUNG BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1508, 15, 'KABUPATEN TEBO', NULL, NULL, NULL, NULL, NULL, NULL),
(1509, 15, 'KABUPATEN BUNGO', NULL, NULL, NULL, NULL, NULL, NULL),
(1571, 15, 'KOTA JAMBI', NULL, NULL, NULL, NULL, NULL, NULL),
(1572, 15, 'KOTA SUNGAI PENUH', NULL, NULL, NULL, NULL, NULL, NULL),
(1601, 16, 'KABUPATEN OGAN KOMERING ULU', NULL, NULL, NULL, NULL, NULL, NULL),
(1602, 16, 'KABUPATEN OGAN KOMERING ILIR', NULL, NULL, NULL, NULL, NULL, NULL),
(1603, 16, 'KABUPATEN MUARA ENIM', NULL, NULL, NULL, NULL, NULL, NULL),
(1604, 16, 'KABUPATEN LAHAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1605, 16, 'KABUPATEN MUSI RAWAS', NULL, NULL, NULL, NULL, NULL, NULL),
(1606, 16, 'KABUPATEN MUSI BANYUASIN', NULL, NULL, NULL, NULL, NULL, NULL),
(1607, 16, 'KABUPATEN BANYU ASIN', NULL, NULL, NULL, NULL, NULL, NULL),
(1608, 16, 'KABUPATEN OGAN KOMERING ULU SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1609, 16, 'KABUPATEN OGAN KOMERING ULU TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(1610, 16, 'KABUPATEN OGAN ILIR', NULL, NULL, NULL, NULL, NULL, NULL),
(1611, 16, 'KABUPATEN EMPAT LAWANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1612, 16, 'KABUPATEN PENUKAL ABAB LEMATANG ILIR', NULL, NULL, NULL, NULL, NULL, NULL),
(1613, 16, 'KABUPATEN MUSI RAWAS UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1671, 16, 'KOTA PALEMBANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1672, 16, 'KOTA PRABUMULIH', NULL, NULL, NULL, NULL, NULL, NULL),
(1673, 16, 'KOTA PAGAR ALAM', NULL, NULL, NULL, NULL, NULL, NULL),
(1674, 16, 'KOTA LUBUKLINGGAU', NULL, NULL, NULL, NULL, NULL, NULL),
(1701, 17, 'KABUPATEN BENGKULU SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1702, 17, 'KABUPATEN REJANG LEBONG', NULL, NULL, NULL, NULL, NULL, NULL),
(1703, 17, 'KABUPATEN BENGKULU UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1704, 17, 'KABUPATEN KAUR', NULL, NULL, NULL, NULL, NULL, NULL),
(1705, 17, 'KABUPATEN SELUMA', NULL, NULL, NULL, NULL, NULL, NULL),
(1706, 17, 'KABUPATEN MUKOMUKO', NULL, NULL, NULL, NULL, NULL, NULL),
(1707, 17, 'KABUPATEN LEBONG', NULL, NULL, NULL, NULL, NULL, NULL),
(1708, 17, 'KABUPATEN KEPAHIANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1709, 17, 'KABUPATEN BENGKULU TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(1771, 17, 'KOTA BENGKULU', NULL, NULL, NULL, NULL, NULL, NULL),
(1801, 18, 'KABUPATEN LAMPUNG BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1802, 18, 'KABUPATEN TANGGAMUS', NULL, NULL, NULL, NULL, NULL, NULL),
(1803, 18, 'KABUPATEN LAMPUNG SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1804, 18, 'KABUPATEN LAMPUNG TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(1805, 18, 'KABUPATEN LAMPUNG TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(1806, 18, 'KABUPATEN LAMPUNG UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(1807, 18, 'KABUPATEN WAY KANAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1808, 18, 'KABUPATEN TULANGBAWANG', NULL, NULL, NULL, NULL, NULL, NULL),
(1809, 18, 'KABUPATEN PESAWARAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1810, 18, 'KABUPATEN PRINGSEWU', NULL, NULL, NULL, NULL, NULL, NULL),
(1811, 18, 'KABUPATEN MESUJI', NULL, NULL, NULL, NULL, NULL, NULL),
(1812, 18, 'KABUPATEN TULANG BAWANG BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1813, 18, 'KABUPATEN PESISIR BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1871, 18, 'KOTA BANDAR LAMPUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(1872, 18, 'KOTA METRO', NULL, NULL, NULL, NULL, NULL, NULL),
(1901, 19, 'KABUPATEN BANGKA', NULL, NULL, NULL, NULL, NULL, NULL),
(1902, 19, 'KABUPATEN BELITUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(1903, 19, 'KABUPATEN BANGKA BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(1904, 19, 'KABUPATEN BANGKA TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(1905, 19, 'KABUPATEN BANGKA SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(1906, 19, 'KABUPATEN BELITUNG TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(1971, 19, 'KOTA PANGKAL PINANG', NULL, NULL, NULL, NULL, NULL, NULL),
(2101, 21, 'KABUPATEN KARIMUN', NULL, NULL, NULL, NULL, NULL, NULL),
(2102, 21, 'KABUPATEN BINTAN', NULL, NULL, NULL, NULL, NULL, NULL),
(2103, 21, 'KABUPATEN NATUNA', NULL, NULL, NULL, NULL, NULL, NULL),
(2104, 21, 'KABUPATEN LINGGA', NULL, NULL, NULL, NULL, NULL, NULL),
(2105, 21, 'KABUPATEN KEPULAUAN ANAMBAS', NULL, NULL, NULL, NULL, NULL, NULL),
(2171, 21, 'KOTA B A T A M', NULL, NULL, NULL, NULL, NULL, NULL),
(2172, 21, 'KOTA TANJUNG PINANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3101, 31, 'KABUPATEN KEPULAUAN SERIBU', NULL, NULL, NULL, NULL, NULL, NULL),
(3171, 31, 'KOTA JAKARTA SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3172, 31, 'KOTA JAKARTA TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(3173, 31, 'KOTA JAKARTA PUSAT', NULL, NULL, NULL, NULL, NULL, NULL),
(3174, 31, 'KOTA JAKARTA BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(3175, 31, 'KOTA JAKARTA UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(3201, 32, 'KABUPATEN BOGOR', NULL, NULL, NULL, NULL, NULL, NULL),
(3202, 32, 'KABUPATEN SUKABUMI', NULL, NULL, NULL, NULL, NULL, NULL),
(3203, 32, 'KABUPATEN CIANJUR', NULL, NULL, NULL, NULL, NULL, NULL),
(3204, 32, 'KABUPATEN BANDUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(3205, 32, 'KABUPATEN GARUT', NULL, NULL, NULL, NULL, NULL, NULL),
(3206, 32, 'KABUPATEN TASIKMALAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(3207, 32, 'KABUPATEN CIAMIS', NULL, NULL, NULL, NULL, NULL, NULL),
(3208, 32, 'KABUPATEN KUNINGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3209, 32, 'KABUPATEN CIREBON', NULL, NULL, NULL, NULL, NULL, NULL),
(3210, 32, 'KABUPATEN MAJALENGKA', NULL, NULL, NULL, NULL, NULL, NULL),
(3211, 32, 'KABUPATEN SUMEDANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3212, 32, 'KABUPATEN INDRAMAYU', NULL, NULL, NULL, NULL, NULL, NULL),
(3213, 32, 'KABUPATEN SUBANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3214, 32, 'KABUPATEN PURWAKARTA', NULL, NULL, NULL, NULL, NULL, NULL),
(3215, 32, 'KABUPATEN KARAWANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3216, 32, 'KABUPATEN BEKASI', NULL, NULL, NULL, NULL, NULL, NULL),
(3217, 32, 'KABUPATEN BANDUNG BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(3218, 32, 'KABUPATEN PANGANDARAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3271, 32, 'KOTA BOGOR', NULL, NULL, NULL, NULL, NULL, NULL),
(3272, 32, 'KOTA SUKABUMI', NULL, NULL, NULL, NULL, NULL, NULL),
(3273, 32, 'KOTA BANDUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(3274, 32, 'KOTA CIREBON', NULL, NULL, NULL, NULL, NULL, NULL),
(3275, 32, 'KOTA BEKASI', NULL, NULL, NULL, NULL, NULL, NULL),
(3276, 32, 'KOTA DEPOK', NULL, NULL, NULL, NULL, NULL, NULL),
(3277, 32, 'KOTA CIMAHI', NULL, NULL, NULL, NULL, NULL, NULL),
(3278, 32, 'KOTA TASIKMALAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(3279, 32, 'KOTA BANJAR', NULL, NULL, NULL, NULL, NULL, NULL),
(3301, 33, 'KABUPATEN CILACAP', NULL, NULL, NULL, NULL, NULL, NULL),
(3302, 33, 'KABUPATEN BANYUMAS', NULL, NULL, NULL, NULL, NULL, NULL),
(3303, 33, 'KABUPATEN PURBALINGGA', NULL, NULL, NULL, NULL, NULL, NULL),
(3304, 33, 'KABUPATEN BANJARNEGARA', NULL, NULL, NULL, NULL, NULL, NULL),
(3305, 33, 'KABUPATEN KEBUMEN', NULL, NULL, NULL, NULL, NULL, NULL),
(3306, 33, 'KABUPATEN PURWOREJO', NULL, NULL, NULL, NULL, NULL, NULL),
(3307, 33, 'KABUPATEN WONOSOBO', NULL, NULL, NULL, NULL, NULL, NULL),
(3308, 33, 'KABUPATEN MAGELANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3309, 33, 'KABUPATEN BOYOLALI', NULL, NULL, NULL, NULL, NULL, NULL),
(3310, 33, 'KABUPATEN KLATEN', NULL, NULL, NULL, NULL, NULL, NULL),
(3311, 33, 'KABUPATEN SUKOHARJO', NULL, NULL, NULL, NULL, NULL, NULL),
(3312, 33, 'KABUPATEN WONOGIRI', NULL, NULL, NULL, NULL, NULL, NULL),
(3313, 33, 'KABUPATEN KARANGANYAR', NULL, NULL, NULL, NULL, NULL, NULL),
(3314, 33, 'KABUPATEN SRAGEN', NULL, NULL, NULL, NULL, NULL, NULL),
(3315, 33, 'KABUPATEN GROBOGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3316, 33, 'KABUPATEN BLORA', NULL, NULL, NULL, NULL, NULL, NULL),
(3317, 33, 'KABUPATEN REMBANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3318, 33, 'KABUPATEN PATI', NULL, NULL, NULL, NULL, NULL, NULL),
(3319, 33, 'KABUPATEN KUDUS', NULL, NULL, NULL, NULL, NULL, NULL),
(3320, 33, 'KABUPATEN JEPARA', NULL, NULL, NULL, NULL, NULL, NULL),
(3321, 33, 'KABUPATEN DEMAK', NULL, NULL, NULL, NULL, NULL, NULL),
(3322, 33, 'KABUPATEN SEMARANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3323, 33, 'KABUPATEN TEMANGGUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(3324, 33, 'KABUPATEN KENDAL', NULL, NULL, NULL, NULL, NULL, NULL),
(3325, 33, 'KABUPATEN BATANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3326, 33, 'KABUPATEN PEKALONGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3327, 33, 'KABUPATEN PEMALANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3328, 33, 'KABUPATEN TEGAL', NULL, NULL, NULL, NULL, NULL, NULL),
(3329, 33, 'KABUPATEN BREBES', NULL, NULL, NULL, NULL, NULL, NULL),
(3371, 33, 'KOTA MAGELANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3372, 33, 'KOTA SURAKARTA', NULL, NULL, NULL, NULL, NULL, NULL),
(3373, 33, 'KOTA SALATIGA', NULL, NULL, NULL, NULL, NULL, NULL),
(3374, 33, 'KOTA SEMARANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3375, 33, 'KOTA PEKALONGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3376, 33, 'KOTA TEGAL', NULL, NULL, NULL, NULL, NULL, NULL),
(3401, 34, 'KABUPATEN KULON PROGO', NULL, NULL, NULL, NULL, NULL, NULL),
(3402, 34, 'KABUPATEN BANTUL', NULL, NULL, NULL, NULL, NULL, NULL),
(3403, 34, 'KABUPATEN GUNUNG KIDUL', NULL, NULL, NULL, NULL, NULL, NULL),
(3404, 34, 'KABUPATEN SLEMAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3471, 34, 'KOTA YOGYAKARTA', NULL, NULL, NULL, NULL, NULL, NULL),
(3501, 35, 'KABUPATEN PACITAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3502, 35, 'KABUPATEN PONOROGO', NULL, NULL, NULL, NULL, NULL, NULL),
(3503, 35, 'KABUPATEN TRENGGALEK', NULL, NULL, NULL, NULL, NULL, NULL),
(3504, 35, 'KABUPATEN TULUNGAGUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(3505, 35, 'KABUPATEN BLITAR', NULL, NULL, NULL, NULL, NULL, NULL),
(3506, 35, 'KABUPATEN KEDIRI', NULL, NULL, NULL, NULL, NULL, NULL),
(3507, 35, 'KABUPATEN MALANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3508, 35, 'KABUPATEN LUMAJANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3509, 35, 'KABUPATEN JEMBER', NULL, NULL, NULL, NULL, NULL, NULL),
(3510, 35, 'KABUPATEN BANYUWANGI', NULL, NULL, NULL, NULL, NULL, NULL),
(3511, 35, 'KABUPATEN BONDOWOSO', NULL, NULL, NULL, NULL, NULL, NULL),
(3512, 35, 'KABUPATEN SITUBONDO', NULL, NULL, NULL, NULL, NULL, NULL),
(3513, 35, 'KABUPATEN PROBOLINGGO', NULL, NULL, NULL, NULL, NULL, NULL),
(3514, 35, 'KABUPATEN PASURUAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3515, 35, 'KABUPATEN SIDOARJO', NULL, NULL, NULL, NULL, NULL, NULL),
(3516, 35, 'KABUPATEN MOJOKERTO', NULL, NULL, NULL, NULL, NULL, NULL),
(3517, 35, 'KABUPATEN JOMBANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3518, 35, 'KABUPATEN NGANJUK', NULL, NULL, NULL, NULL, NULL, NULL),
(3519, 35, 'KABUPATEN MADIUN', NULL, NULL, NULL, NULL, NULL, NULL),
(3520, 35, 'KABUPATEN MAGETAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3521, 35, 'KABUPATEN NGAWI', NULL, NULL, NULL, NULL, NULL, NULL),
(3522, 35, 'KABUPATEN BOJONEGORO', NULL, NULL, NULL, NULL, NULL, NULL),
(3523, 35, 'KABUPATEN TUBAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3524, 35, 'KABUPATEN LAMONGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3525, 35, 'KABUPATEN GRESIK', NULL, NULL, NULL, NULL, NULL, NULL),
(3526, 35, 'KABUPATEN BANGKALAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3527, 35, 'KABUPATEN SAMPANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3528, 35, 'KABUPATEN PAMEKASAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3529, 35, 'KABUPATEN SUMENEP', NULL, NULL, NULL, NULL, NULL, NULL),
(3571, 35, 'KOTA KEDIRI', NULL, NULL, NULL, NULL, NULL, NULL),
(3572, 35, 'KOTA BLITAR', NULL, NULL, NULL, NULL, NULL, NULL),
(3573, 35, 'KOTA MALANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3574, 35, 'KOTA PROBOLINGGO', NULL, NULL, NULL, NULL, NULL, NULL),
(3575, 35, 'KOTA PASURUAN', NULL, NULL, NULL, NULL, NULL, NULL),
(3576, 35, 'KOTA MOJOKERTO', NULL, NULL, NULL, NULL, NULL, NULL),
(3577, 35, 'KOTA MADIUN', NULL, NULL, NULL, NULL, NULL, NULL),
(3578, 35, 'KOTA SURABAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(3579, 35, 'KOTA BATU', NULL, NULL, NULL, NULL, NULL, NULL),
(3601, 36, 'KABUPATEN PANDEGLANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3602, 36, 'KABUPATEN LEBAK', NULL, NULL, NULL, NULL, NULL, NULL),
(3603, 36, 'KABUPATEN TANGERANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3604, 36, 'KABUPATEN SERANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3671, 36, 'KOTA TANGERANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3672, 36, 'KOTA CILEGON', NULL, NULL, NULL, NULL, NULL, NULL),
(3673, 36, 'KOTA SERANG', NULL, NULL, NULL, NULL, NULL, NULL),
(3674, 36, 'KOTA TANGERANG SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(5101, 51, 'KABUPATEN JEMBRANA', NULL, NULL, NULL, NULL, NULL, NULL),
(5102, 51, 'KABUPATEN TABANAN', NULL, NULL, NULL, NULL, NULL, NULL),
(5103, 51, 'KABUPATEN BADUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(5104, 51, 'KABUPATEN GIANYAR', NULL, NULL, NULL, NULL, NULL, NULL),
(5105, 51, 'KABUPATEN KLUNGKUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(5106, 51, 'KABUPATEN BANGLI', NULL, NULL, NULL, NULL, NULL, NULL),
(5107, 51, 'KABUPATEN KARANG ASEM', NULL, NULL, NULL, NULL, NULL, NULL),
(5108, 51, 'KABUPATEN BULELENG', NULL, NULL, NULL, NULL, NULL, NULL),
(5171, 51, 'KOTA DENPASAR', NULL, NULL, NULL, NULL, NULL, NULL),
(5201, 52, 'KABUPATEN LOMBOK BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(5202, 52, 'KABUPATEN LOMBOK TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(5203, 52, 'KABUPATEN LOMBOK TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(5204, 52, 'KABUPATEN SUMBAWA', NULL, NULL, NULL, NULL, NULL, NULL),
(5205, 52, 'KABUPATEN DOMPU', NULL, NULL, NULL, NULL, NULL, NULL),
(5206, 52, 'KABUPATEN BIMA', NULL, NULL, NULL, NULL, NULL, NULL),
(5207, 52, 'KABUPATEN SUMBAWA BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(5208, 52, 'KABUPATEN LOMBOK UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(5271, 52, 'KOTA MATARAM', NULL, NULL, NULL, NULL, NULL, NULL),
(5272, 52, 'KOTA BIMA', NULL, NULL, NULL, NULL, NULL, NULL),
(5301, 53, 'KABUPATEN SUMBA BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(5302, 53, 'KABUPATEN SUMBA TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(5303, 53, 'KABUPATEN KUPANG', NULL, NULL, NULL, NULL, NULL, NULL),
(5304, 53, 'KABUPATEN TIMOR TENGAH SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(5305, 53, 'KABUPATEN TIMOR TENGAH UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(5306, 53, 'KABUPATEN BELU', NULL, NULL, NULL, NULL, NULL, NULL),
(5307, 53, 'KABUPATEN ALOR', NULL, NULL, NULL, NULL, NULL, NULL),
(5308, 53, 'KABUPATEN LEMBATA', NULL, NULL, NULL, NULL, NULL, NULL),
(5309, 53, 'KABUPATEN FLORES TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(5310, 53, 'KABUPATEN SIKKA', NULL, NULL, NULL, NULL, NULL, NULL),
(5311, 53, 'KABUPATEN ENDE', NULL, NULL, NULL, NULL, NULL, NULL),
(5312, 53, 'KABUPATEN NGADA', NULL, NULL, NULL, NULL, NULL, NULL),
(5313, 53, 'KABUPATEN MANGGARAI', NULL, NULL, NULL, NULL, NULL, NULL),
(5314, 53, 'KABUPATEN ROTE NDAO', NULL, NULL, NULL, NULL, NULL, NULL),
(5315, 53, 'KABUPATEN MANGGARAI BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(5316, 53, 'KABUPATEN SUMBA TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(5317, 53, 'KABUPATEN SUMBA BARAT DAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(5318, 53, 'KABUPATEN NAGEKEO', NULL, NULL, NULL, NULL, NULL, NULL),
(5319, 53, 'KABUPATEN MANGGARAI TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(5320, 53, 'KABUPATEN SABU RAIJUA', NULL, NULL, NULL, NULL, NULL, NULL),
(5321, 53, 'KABUPATEN MALAKA', NULL, NULL, NULL, NULL, NULL, NULL),
(5371, 53, 'KOTA KUPANG', NULL, NULL, NULL, NULL, NULL, NULL),
(6101, 61, 'KABUPATEN SAMBAS', NULL, NULL, NULL, NULL, NULL, NULL),
(6102, 61, 'KABUPATEN BENGKAYANG', NULL, NULL, NULL, NULL, NULL, NULL),
(6103, 61, 'KABUPATEN LANDAK', NULL, NULL, NULL, NULL, NULL, NULL),
(6104, 61, 'KABUPATEN MEMPAWAH', NULL, NULL, NULL, NULL, NULL, NULL),
(6105, 61, 'KABUPATEN SANGGAU', NULL, NULL, NULL, NULL, NULL, NULL),
(6106, 61, 'KABUPATEN KETAPANG', NULL, NULL, NULL, NULL, NULL, NULL),
(6107, 61, 'KABUPATEN SINTANG', NULL, NULL, NULL, NULL, NULL, NULL),
(6108, 61, 'KABUPATEN KAPUAS HULU', NULL, NULL, NULL, NULL, NULL, NULL),
(6109, 61, 'KABUPATEN SEKADAU', NULL, NULL, NULL, NULL, NULL, NULL),
(6110, 61, 'KABUPATEN MELAWI', NULL, NULL, NULL, NULL, NULL, NULL),
(6111, 61, 'KABUPATEN KAYONG UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(6112, 61, 'KABUPATEN KUBU RAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(6171, 61, 'KOTA PONTIANAK', NULL, NULL, NULL, NULL, NULL, NULL),
(6172, 61, 'KOTA SINGKAWANG', NULL, NULL, NULL, NULL, NULL, NULL),
(6201, 62, 'KABUPATEN KOTAWARINGIN BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(6202, 62, 'KABUPATEN KOTAWARINGIN TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(6203, 62, 'KABUPATEN KAPUAS', NULL, NULL, NULL, NULL, NULL, NULL),
(6204, 62, 'KABUPATEN BARITO SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6205, 62, 'KABUPATEN BARITO UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(6206, 62, 'KABUPATEN SUKAMARA', NULL, NULL, NULL, NULL, NULL, NULL),
(6207, 62, 'KABUPATEN LAMANDAU', NULL, NULL, NULL, NULL, NULL, NULL),
(6208, 62, 'KABUPATEN SERUYAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6209, 62, 'KABUPATEN KATINGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6210, 62, 'KABUPATEN PULANG PISAU', NULL, NULL, NULL, NULL, NULL, NULL),
(6211, 62, 'KABUPATEN GUNUNG MAS', NULL, NULL, NULL, NULL, NULL, NULL),
(6212, 62, 'KABUPATEN BARITO TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(6213, 62, 'KABUPATEN MURUNG RAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(6271, 62, 'KOTA PALANGKA RAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(6301, 63, 'KABUPATEN TANAH LAUT', NULL, NULL, NULL, NULL, NULL, NULL),
(6302, 63, 'KABUPATEN KOTA BARU', NULL, NULL, NULL, NULL, NULL, NULL),
(6303, 63, 'KABUPATEN BANJAR', NULL, NULL, NULL, NULL, NULL, NULL),
(6304, 63, 'KABUPATEN BARITO KUALA', NULL, NULL, NULL, NULL, NULL, NULL),
(6305, 63, 'KABUPATEN TAPIN', NULL, NULL, NULL, NULL, NULL, NULL),
(6306, 63, 'KABUPATEN HULU SUNGAI SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6307, 63, 'KABUPATEN HULU SUNGAI TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(6308, 63, 'KABUPATEN HULU SUNGAI UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(6309, 63, 'KABUPATEN TABALONG', NULL, NULL, NULL, NULL, NULL, NULL),
(6310, 63, 'KABUPATEN TANAH BUMBU', NULL, NULL, NULL, NULL, NULL, NULL),
(6311, 63, 'KABUPATEN BALANGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6371, 63, 'KOTA BANJARMASIN', NULL, NULL, NULL, NULL, NULL, NULL),
(6372, 63, 'KOTA BANJAR BARU', NULL, NULL, NULL, NULL, NULL, NULL),
(6401, 64, 'KABUPATEN PASER', NULL, NULL, NULL, NULL, NULL, NULL),
(6402, 64, 'KABUPATEN KUTAI BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(6403, 64, 'KABUPATEN KUTAI KARTANEGARA', NULL, NULL, NULL, NULL, NULL, NULL),
(6404, 64, 'KABUPATEN KUTAI TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(6405, 64, 'KABUPATEN BERAU', NULL, NULL, NULL, NULL, NULL, NULL),
(6409, 64, 'KABUPATEN PENAJAM PASER UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(6411, 64, 'KABUPATEN MAHAKAM HULU', NULL, NULL, NULL, NULL, NULL, NULL),
(6471, 64, 'KOTA BALIKPAPAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6472, 64, 'KOTA SAMARINDA', NULL, NULL, NULL, NULL, NULL, NULL),
(6474, 64, 'KOTA BONTANG', NULL, NULL, NULL, NULL, NULL, NULL),
(6501, 65, 'KABUPATEN MALINAU', NULL, NULL, NULL, NULL, NULL, NULL),
(6502, 65, 'KABUPATEN BULUNGAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6503, 65, 'KABUPATEN TANA TIDUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(6504, 65, 'KABUPATEN NUNUKAN', NULL, NULL, NULL, NULL, NULL, NULL),
(6571, 65, 'KOTA TARAKAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7101, 71, 'KABUPATEN BOLAANG MONGONDOW', NULL, NULL, NULL, NULL, NULL, NULL),
(7102, 71, 'KABUPATEN MINAHASA', NULL, NULL, NULL, NULL, NULL, NULL),
(7103, 71, 'KABUPATEN KEPULAUAN SANGIHE', NULL, NULL, NULL, NULL, NULL, NULL),
(7104, 71, 'KABUPATEN KEPULAUAN TALAUD', NULL, NULL, NULL, NULL, NULL, NULL),
(7105, 71, 'KABUPATEN MINAHASA SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7106, 71, 'KABUPATEN MINAHASA UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7107, 71, 'KABUPATEN BOLAANG MONGONDOW UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7108, 71, 'KABUPATEN SIAU TAGULANDANG BIARO', NULL, NULL, NULL, NULL, NULL, NULL),
(7109, 71, 'KABUPATEN MINAHASA TENGGARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7110, 71, 'KABUPATEN BOLAANG MONGONDOW SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7111, 71, 'KABUPATEN BOLAANG MONGONDOW TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(7171, 71, 'KOTA MANADO', NULL, NULL, NULL, NULL, NULL, NULL),
(7172, 71, 'KOTA BITUNG', NULL, NULL, NULL, NULL, NULL, NULL),
(7173, 71, 'KOTA TOMOHON', NULL, NULL, NULL, NULL, NULL, NULL),
(7174, 71, 'KOTA KOTAMOBAGU', NULL, NULL, NULL, NULL, NULL, NULL),
(7201, 72, 'KABUPATEN BANGGAI KEPULAUAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7202, 72, 'KABUPATEN BANGGAI', NULL, NULL, NULL, NULL, NULL, NULL),
(7203, 72, 'KABUPATEN MOROWALI', NULL, NULL, NULL, NULL, NULL, NULL),
(7204, 72, 'KABUPATEN POSO', NULL, NULL, NULL, NULL, NULL, NULL),
(7205, 72, 'KABUPATEN DONGGALA', NULL, NULL, NULL, NULL, NULL, NULL),
(7206, 72, 'KABUPATEN TOLI-TOLI', NULL, NULL, NULL, NULL, NULL, NULL),
(7207, 72, 'KABUPATEN BUOL', NULL, NULL, NULL, NULL, NULL, NULL),
(7208, 72, 'KABUPATEN PARIGI MOUTONG', NULL, NULL, NULL, NULL, NULL, NULL),
(7209, 72, 'KABUPATEN TOJO UNA-UNA', NULL, NULL, NULL, NULL, NULL, NULL),
(7210, 72, 'KABUPATEN SIGI', NULL, NULL, NULL, NULL, NULL, NULL),
(7211, 72, 'KABUPATEN BANGGAI LAUT', NULL, NULL, NULL, NULL, NULL, NULL),
(7212, 72, 'KABUPATEN MOROWALI UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7271, 72, 'KOTA PALU', NULL, NULL, NULL, NULL, NULL, NULL),
(7301, 73, 'KABUPATEN KEPULAUAN SELAYAR', NULL, NULL, NULL, NULL, NULL, NULL),
(7302, 73, 'KABUPATEN BULUKUMBA', NULL, NULL, NULL, NULL, NULL, NULL),
(7303, 73, 'KABUPATEN BANTAENG', NULL, NULL, NULL, NULL, NULL, NULL),
(7304, 73, 'KABUPATEN JENEPONTO', NULL, NULL, NULL, NULL, NULL, NULL),
(7305, 73, 'KABUPATEN TAKALAR', NULL, NULL, NULL, NULL, NULL, NULL),
(7306, 73, 'KABUPATEN GOWA', NULL, NULL, NULL, NULL, NULL, NULL),
(7307, 73, 'KABUPATEN SINJAI', NULL, NULL, NULL, NULL, NULL, NULL),
(7308, 73, 'KABUPATEN MAROS', NULL, NULL, NULL, NULL, NULL, NULL),
(7309, 73, 'KABUPATEN PANGKAJENE DAN KEPULAUAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7310, 73, 'KABUPATEN BARRU', NULL, NULL, NULL, NULL, NULL, NULL),
(7311, 73, 'KABUPATEN BONE', NULL, NULL, NULL, NULL, NULL, NULL),
(7312, 73, 'KABUPATEN SOPPENG', NULL, NULL, NULL, NULL, NULL, NULL),
(7313, 73, 'KABUPATEN WAJO', NULL, NULL, NULL, NULL, NULL, NULL),
(7314, 73, 'KABUPATEN SIDENRENG RAPPANG', NULL, NULL, NULL, NULL, NULL, NULL),
(7315, 73, 'KABUPATEN PINRANG', NULL, NULL, NULL, NULL, NULL, NULL),
(7316, 73, 'KABUPATEN ENREKANG', NULL, NULL, NULL, NULL, NULL, NULL),
(7317, 73, 'KABUPATEN LUWU', NULL, NULL, NULL, NULL, NULL, NULL),
(7318, 73, 'KABUPATEN TANA TORAJA', NULL, NULL, NULL, NULL, NULL, NULL),
(7322, 73, 'KABUPATEN LUWU UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7325, 73, 'KABUPATEN LUWU TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(7326, 73, 'KABUPATEN TORAJA UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7371, 73, 'KOTA MAKASSAR', NULL, NULL, NULL, NULL, NULL, NULL),
(7372, 73, 'KOTA PAREPARE', NULL, NULL, NULL, NULL, NULL, NULL),
(7373, 73, 'KOTA PALOPO', NULL, NULL, NULL, NULL, NULL, NULL),
(7401, 74, 'KABUPATEN BUTON', NULL, NULL, NULL, NULL, NULL, NULL),
(7402, 74, 'KABUPATEN MUNA', NULL, NULL, NULL, NULL, NULL, NULL),
(7403, 74, 'KABUPATEN KONAWE', NULL, NULL, NULL, NULL, NULL, NULL),
(7404, 74, 'KABUPATEN KOLAKA', NULL, NULL, NULL, NULL, NULL, NULL),
(7405, 74, 'KABUPATEN KONAWE SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7406, 74, 'KABUPATEN BOMBANA', NULL, NULL, NULL, NULL, NULL, NULL),
(7407, 74, 'KABUPATEN WAKATOBI', NULL, NULL, NULL, NULL, NULL, NULL),
(7408, 74, 'KABUPATEN KOLAKA UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7409, 74, 'KABUPATEN BUTON UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7410, 74, 'KABUPATEN KONAWE UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7411, 74, 'KABUPATEN KOLAKA TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(7412, 74, 'KABUPATEN KONAWE KEPULAUAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7413, 74, 'KABUPATEN MUNA BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(7414, 74, 'KABUPATEN BUTON TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(7415, 74, 'KABUPATEN BUTON SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(7471, 74, 'KOTA KENDARI', NULL, NULL, NULL, NULL, NULL, NULL),
(7472, 74, 'KOTA BAUBAU', NULL, NULL, NULL, NULL, NULL, NULL),
(7501, 75, 'KABUPATEN BOALEMO', NULL, NULL, NULL, NULL, NULL, NULL),
(7502, 75, 'KABUPATEN GORONTALO', NULL, NULL, NULL, NULL, NULL, NULL),
(7503, 75, 'KABUPATEN POHUWATO', NULL, NULL, NULL, NULL, NULL, NULL),
(7504, 75, 'KABUPATEN BONE BOLANGO', NULL, NULL, NULL, NULL, NULL, NULL),
(7505, 75, 'KABUPATEN GORONTALO UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7571, 75, 'KOTA GORONTALO', NULL, NULL, NULL, NULL, NULL, NULL),
(7601, 76, 'KABUPATEN MAJENE', NULL, NULL, NULL, NULL, NULL, NULL),
(7602, 76, 'KABUPATEN POLEWALI MANDAR', NULL, NULL, NULL, NULL, NULL, NULL),
(7603, 76, 'KABUPATEN MAMASA', NULL, NULL, NULL, NULL, NULL, NULL),
(7604, 76, 'KABUPATEN MAMUJU', NULL, NULL, NULL, NULL, NULL, NULL),
(7605, 76, 'KABUPATEN MAMUJU UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(7606, 76, 'KABUPATEN MAMUJU TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(8101, 81, 'KABUPATEN MALUKU TENGGARA BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(8102, 81, 'KABUPATEN MALUKU TENGGARA', NULL, NULL, NULL, NULL, NULL, NULL),
(8103, 81, 'KABUPATEN MALUKU TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(8104, 81, 'KABUPATEN BURU', NULL, NULL, NULL, NULL, NULL, NULL),
(8105, 81, 'KABUPATEN KEPULAUAN ARU', NULL, NULL, NULL, NULL, NULL, NULL),
(8106, 81, 'KABUPATEN SERAM BAGIAN BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(8107, 81, 'KABUPATEN SERAM BAGIAN TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(8108, 81, 'KABUPATEN MALUKU BARAT DAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(8109, 81, 'KABUPATEN BURU SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(8171, 81, 'KOTA AMBON', NULL, NULL, NULL, NULL, NULL, NULL),
(8172, 81, 'KOTA TUAL', NULL, NULL, NULL, NULL, NULL, NULL),
(8201, 82, 'KABUPATEN HALMAHERA BARAT', NULL, NULL, NULL, NULL, NULL, NULL),
(8202, 82, 'KABUPATEN HALMAHERA TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(8203, 82, 'KABUPATEN KEPULAUAN SULA', NULL, NULL, NULL, NULL, NULL, NULL),
(8204, 82, 'KABUPATEN HALMAHERA SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(8205, 82, 'KABUPATEN HALMAHERA UTARA', NULL, NULL, NULL, NULL, NULL, NULL),
(8206, 82, 'KABUPATEN HALMAHERA TIMUR', NULL, NULL, NULL, NULL, NULL, NULL),
(8207, 82, 'KABUPATEN PULAU MOROTAI', NULL, NULL, NULL, NULL, NULL, NULL),
(8208, 82, 'KABUPATEN PULAU TALIABU', NULL, NULL, NULL, NULL, NULL, NULL),
(8271, 82, 'KOTA TERNATE', NULL, NULL, NULL, NULL, NULL, NULL),
(8272, 82, 'KOTA TIDORE KEPULAUAN', NULL, NULL, NULL, NULL, NULL, NULL),
(9101, 91, 'KABUPATEN FAKFAK', NULL, NULL, NULL, NULL, NULL, NULL),
(9102, 91, 'KABUPATEN KAIMANA', NULL, NULL, NULL, NULL, NULL, NULL),
(9103, 91, 'KABUPATEN TELUK WONDAMA', NULL, NULL, NULL, NULL, NULL, NULL),
(9104, 91, 'KABUPATEN TELUK BINTUNI', NULL, NULL, NULL, NULL, NULL, NULL),
(9105, 91, 'KABUPATEN MANOKWARI', NULL, NULL, NULL, NULL, NULL, NULL),
(9106, 91, 'KABUPATEN SORONG SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(9107, 91, 'KABUPATEN SORONG', NULL, NULL, NULL, NULL, NULL, NULL),
(9108, 91, 'KABUPATEN RAJA AMPAT', NULL, NULL, NULL, NULL, NULL, NULL),
(9109, 91, 'KABUPATEN TAMBRAUW', NULL, NULL, NULL, NULL, NULL, NULL),
(9110, 91, 'KABUPATEN MAYBRAT', NULL, NULL, NULL, NULL, NULL, NULL),
(9111, 91, 'KABUPATEN MANOKWARI SELATAN', NULL, NULL, NULL, NULL, NULL, NULL),
(9112, 91, 'KABUPATEN PEGUNUNGAN ARFAK', NULL, NULL, NULL, NULL, NULL, NULL),
(9171, 91, 'KOTA SORONG', NULL, NULL, NULL, NULL, NULL, NULL),
(9401, 94, 'KABUPATEN MERAUKE', NULL, NULL, NULL, NULL, NULL, NULL),
(9402, 94, 'KABUPATEN JAYAWIJAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(9403, 94, 'KABUPATEN JAYAPURA', NULL, NULL, NULL, NULL, NULL, NULL),
(9404, 94, 'KABUPATEN NABIRE', NULL, NULL, NULL, NULL, NULL, NULL),
(9408, 94, 'KABUPATEN KEPULAUAN YAPEN', NULL, NULL, NULL, NULL, NULL, NULL),
(9409, 94, 'KABUPATEN BIAK NUMFOR', NULL, NULL, NULL, NULL, NULL, NULL),
(9410, 94, 'KABUPATEN PANIAI', NULL, NULL, NULL, NULL, NULL, NULL),
(9411, 94, 'KABUPATEN PUNCAK JAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(9412, 94, 'KABUPATEN MIMIKA', NULL, NULL, NULL, NULL, NULL, NULL),
(9413, 94, 'KABUPATEN BOVEN DIGOEL', NULL, NULL, NULL, NULL, NULL, NULL),
(9414, 94, 'KABUPATEN MAPPI', NULL, NULL, NULL, NULL, NULL, NULL),
(9415, 94, 'KABUPATEN ASMAT', NULL, NULL, NULL, NULL, NULL, NULL),
(9416, 94, 'KABUPATEN YAHUKIMO', NULL, NULL, NULL, NULL, NULL, NULL),
(9417, 94, 'KABUPATEN PEGUNUNGAN BINTANG', NULL, NULL, NULL, NULL, NULL, NULL),
(9418, 94, 'KABUPATEN TOLIKARA', NULL, NULL, NULL, NULL, NULL, NULL),
(9419, 94, 'KABUPATEN SARMI', NULL, NULL, NULL, NULL, NULL, NULL),
(9420, 94, 'KABUPATEN KEEROM', NULL, NULL, NULL, NULL, NULL, NULL),
(9426, 94, 'KABUPATEN WAROPEN', NULL, NULL, NULL, NULL, NULL, NULL),
(9427, 94, 'KABUPATEN SUPIORI', NULL, NULL, NULL, NULL, NULL, NULL),
(9428, 94, 'KABUPATEN MAMBERAMO RAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(9429, 94, 'KABUPATEN NDUGA', NULL, NULL, NULL, NULL, NULL, NULL),
(9430, 94, 'KABUPATEN LANNY JAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(9431, 94, 'KABUPATEN MAMBERAMO TENGAH', NULL, NULL, NULL, NULL, NULL, NULL),
(9432, 94, 'KABUPATEN YALIMO', NULL, NULL, NULL, NULL, NULL, NULL),
(9433, 94, 'KABUPATEN PUNCAK', NULL, NULL, NULL, NULL, NULL, NULL),
(9434, 94, 'KABUPATEN DOGIYAI', NULL, NULL, NULL, NULL, NULL, NULL),
(9435, 94, 'KABUPATEN INTAN JAYA', NULL, NULL, NULL, NULL, NULL, NULL),
(9436, 94, 'KABUPATEN DEIYAI', NULL, NULL, NULL, NULL, NULL, NULL),
(9471, 94, 'KOTA JAYAPURA', NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;