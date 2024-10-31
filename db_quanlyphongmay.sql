-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 03:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quanlyphongmay`
--

-- --------------------------------------------------------

--
-- Table structure for table `cau_hinh`
--

CREATE TABLE `cau_hinh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_cau_hinh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_board` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vga` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitor` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_nhap` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cau_hinh`
--

INSERT INTO `cau_hinh` (`id`, `ma_cau_hinh`, `main_board`, `cpu`, `ram`, `vga`, `monitor`, `ngay_nhap`, `created_at`, `updated_at`) VALUES
(1, 'CH01', 'DELL', '6CPU', '4G', 'GTX', '24 inch', '2021-05-05 00:00:00', '2021-03-03 09:18:33', '2021-05-04 11:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giao_vien`
--

CREATE TABLE `giao_vien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_giao_vien` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_giao_vien` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khoa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giao_vien`
--

INSERT INTO `giao_vien` (`id`, `ma_giao_vien`, `ten_giao_vien`, `hinh_anh`, `khoa_id`, `created_at`, `updated_at`) VALUES
(1, 'GV002', 'Giáo viên 2', '2021-05-12__d00408d5c32555f0290ebee3021a08cd.jpg', 4, '2021-03-21 08:19:54', '2021-05-12 04:58:06'),
(2, 'GV001', 'Nguyễn Văn Dược', '2021-03-21__e1b3825d573a2d46155f1bb2108bac9e.jpg', 1, '2021-03-21 08:35:15', '2021-03-21 08:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE `group_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 'Quản trị', '2021-04-09 07:32:38', '2021-05-05 02:08:46'),
(2, 'Thời khóa biểu', 'Thời khóa biểu', '2021-05-05 02:06:23', '2021-05-05 02:08:33'),
(3, 'Quản lý khu vực', 'Quản lý khu vực', '2021-05-05 02:06:45', '2021-05-05 02:06:45'),
(4, 'Quản lý phòng máy', 'Quản lý phòng máy', '2021-05-05 02:06:59', '2021-05-05 02:06:59'),
(5, 'Quản lý cấu hình', 'Quản lý cấu hình', '2021-05-05 02:07:09', '2021-05-05 02:07:09'),
(6, 'Quản lý khoa', 'Quản lý khoa', '2021-05-05 02:07:28', '2021-05-05 02:07:28'),
(7, 'Quản lý ngành', 'Quản lý ngành', '2021-05-05 02:07:37', '2021-05-05 02:07:37'),
(8, 'Quản lý môn học', 'Quản lý môn học', '2021-05-05 02:07:46', '2021-05-05 02:07:46'),
(9, 'Quản lý giáo viên', 'Quản lý giáo viên', '2021-05-05 02:07:55', '2021-05-05 02:07:55'),
(10, 'Phân công giảng dạy', 'Phân công giảng dạy', '2021-05-05 02:08:06', '2021-05-05 02:08:06'),
(11, 'Quản lý người dùng', 'Quản lý người dùng', '2021-05-05 02:10:06', '2021-05-05 02:10:06'),
(12, 'Quản lý máy tính', 'Quản lý máy tính', '2021-05-05 02:14:17', '2021-05-05 02:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_khoa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_khoa` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id`, `ma_khoa`, `ten_khoa`, `created_at`, `updated_at`) VALUES
(1, 'CNTT', 'Công nghệ thôn tin', '2021-03-21 01:31:39', '2021-03-21 01:31:39'),
(2, 'TAICHINH', 'Tài chính a', '2021-03-21 01:31:58', '2021-03-21 01:32:07'),
(4, 'KINHTE2021', 'Kinh tế tài tài chính', '2021-03-21 08:33:27', '2021-03-21 08:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `khu_vuc`
--

CREATE TABLE `khu_vuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_khu_vuc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khu_vuc`
--

INSERT INTO `khu_vuc` (`id`, `ten_khu_vuc`, `created_at`, `updated_at`) VALUES
(1, 'Khu vực 1', '2021-03-03 08:27:59', '2021-03-03 08:27:59'),
(2, 'Khu vực 2', '2021-03-03 08:28:04', '2021-03-03 08:28:04'),
(3, 'Khu vực 3', '2021-03-03 08:28:07', '2021-03-03 08:28:07'),
(4, 'Khu vực 4', '2021-03-05 07:38:10', '2021-03-05 07:38:10'),
(5, 'Khu vực 5', '2021-03-21 08:30:20', '2021-03-21 08:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `may_tinh`
--

CREATE TABLE `may_tinh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_may` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_may` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_thu_tu` int(11) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT NULL,
  `ngay_nhap` datetime DEFAULT NULL,
  `phong_may_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cau_hinh_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `may_tinh`
--

INSERT INTO `may_tinh` (`id`, `ma_may`, `ten_may`, `so_thu_tu`, `trang_thai`, `ngay_nhap`, `phong_may_id`, `cau_hinh_id`, `created_at`, `updated_at`) VALUES
(2, 'MAY02', 'Máy 02', 2, 1, '2021-03-05 00:00:00', 1, 1, '2021-03-04 09:49:23', '2021-05-17 06:22:12'),
(3, 'MAY01', 'Máy 01', 1, 1, '2021-03-06 00:00:00', 2, 1, '2021-03-05 07:37:20', '2021-03-05 07:37:20'),
(4, 'may02', 'Máy 02', 2, 1, '2021-03-21 00:00:00', 2, 1, '2021-03-20 21:07:49', '2021-03-20 21:07:49'),
(5, 'MAY01', 'Máy 01', 1, 1, '2021-03-21 00:00:00', 3, 1, '2021-03-21 08:31:49', '2021-03-21 08:31:49'),
(6, 'MAY022', 'Máy 02', 2, 1, '2021-05-12 00:00:00', 3, 1, '2021-05-12 04:55:29', '2021-05-12 04:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2014_9_12_000000_create_khoa_table', 1),
(3, '2015_10_12_141307_create_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_02_26_141307_create_khu_vuc_table', 1),
(6, '2021_02_27_151423_create_phong_may_table', 1),
(7, '2021_02_28_172530_create_cau_hinh_table', 1),
(8, '2021_02_28_172644_create_may_tinh_table', 1),
(9, '2021_02_28_175704_create_nganh_table', 1),
(10, '2021_03_21_102047_create_mon_hoc_table', 2),
(11, '2021_03_21_102235_create_giao_vien_table', 2),
(12, '2021_04_09_142144_laravel_entrust_setup_tables', 3),
(15, '2021_04_20_001541_create_phan_cong_giang_day_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_mon_hoc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_mon_hoc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_tiet_thuc_hanh` int(11) DEFAULT 0,
  `khoa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nganh_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mon_hoc`
--

INSERT INTO `mon_hoc` (`id`, `ma_mon_hoc`, `ten_mon_hoc`, `so_tiet_thuc_hanh`, `khoa_id`, `nganh_id`, `created_at`, `updated_at`) VALUES
(3, 'TOANTIN', 'Toán Tin', 10, 1, 1, '2021-04-19 19:09:40', '2021-05-04 10:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_nganh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_nganh` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khoa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`id`, `ma_nganh`, `ten_nganh`, `khoa_id`, `created_at`, `updated_at`) VALUES
(1, 'CNPM', 'Công nghệ phần mềm', 1, '2021-03-21 03:17:34', '2021-03-21 08:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `group_permission_id`, `created_at`, `updated_at`) VALUES
(1, 'quan-tri-toan-bo-he-thong', 'Quản trị toàn bộ hệ thống', 'Quản trị toàn bộ hệ thống', 1, '2021-04-09 07:34:31', '2021-05-05 02:10:30'),
(2, 'truy-cap-he-thong', 'Truy cập hệ thống', 'Truy cập hệ thống', 1, '2021-05-05 02:10:50', '2021-05-05 02:10:50'),
(3, 'danh-sach-khu-vuc', 'Danh sách khu vực', 'Danh sách khu vực', 3, '2021-05-05 02:11:23', '2021-05-05 02:11:23'),
(4, 'them-khu-vuc', 'Thêm khu vực', 'Thêm khu vực', 3, '2021-05-05 02:11:33', '2021-05-05 02:11:33'),
(5, 'sua-khu-vuc', 'Sửa khu vực', 'Sửa khu vực', 3, '2021-05-05 02:11:46', '2021-05-05 02:11:46'),
(6, 'xoa-khu-vuc', 'Xóa khu vực', 'Xóa khu vực', 3, '2021-05-05 02:11:56', '2021-05-05 02:11:56'),
(7, 'danh-sach-phong-may', 'Danh sách phòng máy', 'Danh sách phòng máy', 4, '2021-05-05 02:12:20', '2021-05-05 02:12:20'),
(8, 'them-phong-may', 'Thêm phòng máy', 'Thêm phòng máy', 4, '2021-05-05 02:12:29', '2021-05-05 02:12:29'),
(9, 'sua-phong-may', 'Sửa phòng máy', 'Sửa phòng máy', 4, '2021-05-05 02:12:49', '2021-05-05 02:12:49'),
(10, 'xoa-phong-may', 'Xóa phòng máy', 'Xóa phòng máy', 4, '2021-05-05 02:13:34', '2021-05-05 02:13:34'),
(11, 'danh-sach-may', 'Danh sách máy', 'Danh sách máy', 12, '2021-05-05 02:14:35', '2021-05-05 02:14:35'),
(12, 'them-may-tinh', 'Thêm máy tính', 'Thêm máy tính', 12, '2021-05-05 02:14:47', '2021-05-05 02:14:47'),
(13, 'sua-may-tinh', 'Sửa máy tính', 'Sửa máy tính', 12, '2021-05-05 02:14:57', '2021-05-05 02:14:57'),
(14, 'xoa-may-tinh', 'Xóa máy tính', 'Xóa máy tính', 12, '2021-05-05 02:16:06', '2021-05-05 02:16:06'),
(15, 'danh-sach-cau-hinh', 'Danh sách cấu hình', 'Danh sách cấu hình', 5, '2021-05-05 02:17:28', '2021-05-05 02:17:28'),
(16, 'them-cau-hinh', 'Thêm cấu hình', NULL, 5, '2021-05-05 02:17:40', '2021-05-05 02:17:40'),
(17, 'sua-cau-hinh', 'Sửa cấu hình', NULL, 5, '2021-05-05 02:17:48', '2021-05-05 02:17:48'),
(18, 'xoa-cau-hinh', 'Xóa cấu hình', NULL, 5, '2021-05-05 02:18:00', '2021-05-05 02:18:00'),
(19, 'danh-sach-khoa', 'Danh sách khoa', NULL, 6, '2021-05-05 02:18:11', '2021-05-05 02:18:11'),
(20, 'them-moi-khoa', 'Thêm mới khoa', NULL, 6, '2021-05-05 02:18:20', '2021-05-05 02:18:20'),
(21, 'chinh-sua-khoa', 'Chỉnh sửa khoa', NULL, 6, '2021-05-05 02:18:30', '2021-05-05 02:18:30'),
(22, 'xoa-khoa', 'Xóa khoa', NULL, 6, '2021-05-05 02:18:40', '2021-05-05 02:18:40'),
(23, 'danh-sach-nganh', 'Danh sách ngành', NULL, 7, '2021-05-05 02:18:47', '2021-05-05 02:18:47'),
(24, 'them-moi-nganh', 'Thêm mới ngành', NULL, 7, '2021-05-05 02:18:57', '2021-05-05 02:18:57'),
(25, 'chinh-sua-nganh', 'Chỉnh sửa ngành', NULL, 7, '2021-05-05 02:19:05', '2021-05-05 02:19:05'),
(26, 'xoa-nganh', 'Xóa ngành', NULL, 7, '2021-05-05 02:19:17', '2021-05-05 02:19:17'),
(27, 'danh-sach-mon-hoc', 'Danh sách môn học', NULL, 8, '2021-05-05 02:19:36', '2021-05-05 02:19:36'),
(28, 'them-moi-mon-hoc', 'Thêm mới môn học', NULL, 8, '2021-05-05 02:19:56', '2021-05-05 02:19:56'),
(29, 'chinh-sua-mon-hoc', 'Chỉnh sửa môn học', NULL, 8, '2021-05-05 02:20:05', '2021-05-05 02:20:05'),
(30, 'xoa-mon-hoc', 'Xóa môn học', NULL, 8, '2021-05-05 02:20:16', '2021-05-05 02:20:16'),
(31, 'danh-sach-giao-vien', 'Danh sách giáo viên', NULL, 9, '2021-05-05 02:20:31', '2021-05-05 02:20:31'),
(32, 'them-moi-giao-vien', 'Thêm mới giáo viên', NULL, 9, '2021-05-05 02:21:03', '2021-05-05 02:21:03'),
(33, 'chinh-sua-giao-vien', 'Chỉnh sửa giáo viên', NULL, 9, '2021-05-05 02:21:14', '2021-05-05 02:21:14'),
(34, 'xoa-giao-vien', 'Xóa giáo viên', NULL, 9, '2021-05-05 02:21:25', '2021-05-05 02:21:25'),
(35, 'danh-sach-phan-cong', 'Danh sách phân công', NULL, 10, '2021-05-05 02:28:22', '2021-05-05 02:28:22'),
(36, 'them-moi-phan-cong', 'Thêm mới phân công', NULL, 10, '2021-05-05 02:28:37', '2021-05-05 02:30:37'),
(37, 'chinh-sua-phan-cong', 'Chỉnh sửa phân công', NULL, 10, '2021-05-05 02:30:27', '2021-05-05 02:30:27'),
(38, 'xoa-phan-cong', 'Xóa phân công', NULL, 10, '2021-05-05 02:30:52', '2021-05-05 02:30:52'),
(39, 'danh-sach-nguoi-dung', 'Danh sách người dùng', NULL, 11, '2021-05-05 02:32:10', '2021-05-05 02:32:26'),
(40, 'them-moi-nguoi-dung', 'Thêm mới người dùng', NULL, 11, '2021-05-05 02:32:42', '2021-05-05 02:32:42'),
(41, 'sua-nguoi-dung', 'Sửa người dùng', NULL, 11, '2021-05-05 02:32:50', '2021-05-05 02:32:50'),
(42, 'xoa-nguoi-dung', 'Xóa người dùng', NULL, 11, '2021-05-05 02:32:57', '2021-05-05 02:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 2),
(7, 2),
(11, 2),
(15, 2),
(19, 2),
(23, 2),
(27, 2),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 2),
(35, 2),
(39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `phan_cong_giang_day`
--

CREATE TABLE `phan_cong_giang_day` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `giao_vien_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mon_hoc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phong_may_id` bigint(20) UNSIGNED DEFAULT NULL,
  `thu` tinyint(4) DEFAULT NULL,
  `ngay_thang` datetime DEFAULT NULL,
  `ca_su_dung` tinyint(4) DEFAULT NULL,
  `so_tiet` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phan_cong_giang_day`
--

INSERT INTO `phan_cong_giang_day` (`id`, `giao_vien_id`, `mon_hoc_id`, `phong_may_id`, `thu`, `ngay_thang`, `ca_su_dung`, `so_tiet`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, NULL, '2021-05-05 00:00:00', 2, 5, '2021-05-05 04:29:46', '2021-05-12 02:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `phong_may`
--

CREATE TABLE `phong_may` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_phong` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_phong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loai_phong` tinyint(4) DEFAULT NULL,
  `khu_vuc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phong_may`
--

INSERT INTO `phong_may` (`id`, `ma_phong`, `ten_phong`, `loai_phong`, `khu_vuc_id`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'phong01', 'Phòng 01', 1, 1, 2, '2021-03-03 08:28:53', '2021-03-21 08:29:50'),
(2, 'phong02', 'Phòng 02', 2, 2, 1, '2021-03-03 08:29:04', '2021-03-05 07:36:38'),
(3, 'phong03', 'Phòng 03', 2, 2, 2, '2021-03-21 08:31:11', '2021-05-12 04:54:10'),
(4, 'PHONG04', 'Phòng 4', 2, 3, 2, '2021-05-17 06:21:43', '2021-05-17 06:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', NULL, '2021-04-09 07:40:14', '2021-05-05 02:48:32'),
(2, 'user', 'User', NULL, '2021-05-05 03:14:29', '2021-05-05 03:14:29'),
(3, 'giao-vien', 'Giáo viên', NULL, '2021-05-12 05:02:07', '2021-05-12 05:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vai_tro` tinyint(4) NOT NULL DEFAULT 0,
  `khoa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ma`, `ho_ten`, `email`, `email_verified_at`, `password`, `phone`, `dia_chi`, `hinh_anh`, `vai_tro`, `khoa_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ciLVM', 'Admin', 'admin@gmail.com', NULL, '$2y$10$TGS69DQx3BxqCkzihgidce7r.ixFdT.Wb4Zy4XqXzfuKBuW8TLqem', '0928817228', 'Thái Bình', '2021-05-13__74a1d9203e6985e05056b6649b31383a.jpg', 1, NULL, '7hCrH2jgmePT4geOHDQux4OZeExqOQw6TDgKis22049BnaLXkiUgH40ikEnU', '2021-03-03 08:27:46', '2021-05-13 11:03:53'),
(2, NULL, 'Nguyễn Văn Dược', 'duocnvoit@gmail.com', NULL, '$2y$10$e0H0by6B1XTqrd.LT1Wy8eYD12ol7S7CnypQosL6O54Nm5fFUh6M6', '0928817228', NULL, '2021-04-09__74a1d9203e6985e05056b6649b31383a.jpg', 0, NULL, NULL, '2021-04-09 07:47:19', '2021-04-09 07:47:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cau_hinh`
--
ALTER TABLE `cau_hinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giao_vien_khoa_id_foreign` (`khoa_id`);

--
-- Indexes for table `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_permission_name_unique` (`name`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `may_tinh`
--
ALTER TABLE `may_tinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `may_tinh_phong_may_id_foreign` (`phong_may_id`),
  ADD KEY `may_tinh_cau_hinh_id_foreign` (`cau_hinh_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mon_hoc_khoa_id_foreign` (`khoa_id`),
  ADD KEY `mon_hoc_nganh_id_foreign` (`nganh_id`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nganh_khoa_id_foreign` (`khoa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `permissions_group_permission_id_foreign` (`group_permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `phan_cong_giang_day`
--
ALTER TABLE `phan_cong_giang_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phan_cong_giang_day_giao_vien_id_foreign` (`giao_vien_id`),
  ADD KEY `phan_cong_giang_day_mon_hoc_id_foreign` (`mon_hoc_id`),
  ADD KEY `phan_cong_giang_day_phong_may_id_foreign` (`phong_may_id`);

--
-- Indexes for table `phong_may`
--
ALTER TABLE `phong_may`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phong_may_khu_vuc_id_foreign` (`khu_vuc_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_khoa_id_foreign` (`khoa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cau_hinh`
--
ALTER TABLE `cau_hinh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giao_vien`
--
ALTER TABLE `giao_vien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khu_vuc`
--
ALTER TABLE `khu_vuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `may_tinh`
--
ALTER TABLE `may_tinh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nganh`
--
ALTER TABLE `nganh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `phan_cong_giang_day`
--
ALTER TABLE `phan_cong_giang_day`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phong_may`
--
ALTER TABLE `phong_may`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD CONSTRAINT `giao_vien_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `may_tinh`
--
ALTER TABLE `may_tinh`
  ADD CONSTRAINT `may_tinh_cau_hinh_id_foreign` FOREIGN KEY (`cau_hinh_id`) REFERENCES `cau_hinh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `may_tinh_phong_may_id_foreign` FOREIGN KEY (`phong_may_id`) REFERENCES `phong_may` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD CONSTRAINT `mon_hoc_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mon_hoc_nganh_id_foreign` FOREIGN KEY (`nganh_id`) REFERENCES `nganh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nganh`
--
ALTER TABLE `nganh`
  ADD CONSTRAINT `nganh_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_group_permission_id_foreign` FOREIGN KEY (`group_permission_id`) REFERENCES `group_permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phan_cong_giang_day`
--
ALTER TABLE `phan_cong_giang_day`
  ADD CONSTRAINT `phan_cong_giang_day_giao_vien_id_foreign` FOREIGN KEY (`giao_vien_id`) REFERENCES `giao_vien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phan_cong_giang_day_mon_hoc_id_foreign` FOREIGN KEY (`mon_hoc_id`) REFERENCES `mon_hoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phan_cong_giang_day_phong_may_id_foreign` FOREIGN KEY (`phong_may_id`) REFERENCES `phong_may` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phong_may`
--
ALTER TABLE `phong_may`
  ADD CONSTRAINT `phong_may_khu_vuc_id_foreign` FOREIGN KEY (`khu_vuc_id`) REFERENCES `khu_vuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
