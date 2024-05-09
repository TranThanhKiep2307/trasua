-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 02:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trasua`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'kiep@gmail.com', '123', 'Trần Thanh Kiệp', '0858801302', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product_table`
--

CREATE TABLE `category_product_table` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_decs` text NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product_table`
--

INSERT INTO `category_product_table` (`category_id`, `category_name`, `category_decs`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Trà sữa', 'Các loại món trà sữa', 'milk-tea.png', NULL, NULL),
(2, 'Trà trái cây', 'Các loại trà làm từ trái cây thiên nhiên', 'fruit.png', NULL, NULL),
(3, 'Topping', 'Các loại topping đi kèm', 'pudding.png', NULL, NULL),
(8, 'Món khác', 'Các loại sữa tươi đường đen,...', 'milkshake.png', NULL, NULL),
(13, 'Đồ ăn vặt', 'Các món đồ ăn vặt chất lượng', 'chips.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `cm_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cm_star` float(8,2) NOT NULL,
  `cm_cmt` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `cm_answer` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`cm_id`, `product_id`, `customer_id`, `cm_star`, `cm_cmt`, `created_at`, `cm_answer`, `updated_at`) VALUES
(1, 1, 5, 4.50, 'ngon lắm', '2024-05-07 11:12:32', 'Cảm ơn', '2024-05-07 13:40:25'),
(2, 11, 5, 1.50, 'chua lè', '2024-05-07 12:49:14', 'Chúng tôi sẽ khắc phục, xin lỗi về trải nghiệm này', '2024-05-07 13:39:55'),
(3, 8, 5, 4.00, 'Ngon quá đi', '2024-05-07 12:50:18', 'Cảm ơn ạ', '2024-05-07 13:40:22'),
(6, 1, 5, 3.00, 'dở', '2024-05-07 19:43:57', 'ok', '2024-05-07 19:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `counpon_table`
--

CREATE TABLE `counpon_table` (
  `counpon_id` int(10) UNSIGNED NOT NULL,
  `counpon_name` varchar(100) NOT NULL,
  `counpon_time` int(11) NOT NULL,
  `counpon_condition` int(11) NOT NULL,
  `counpon_number` float NOT NULL,
  `counpon_code` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counpon_table`
--

INSERT INTO `counpon_table` (`counpon_id`, `counpon_name`, `counpon_time`, `counpon_condition`, `counpon_number`, `counpon_code`, `created_at`, `updated_at`) VALUES
(2, 'Giảm 10K nhân ngày báo cáo', 5, 2, 10000, 'BCNLN', NULL, NULL),
(3, 'Giảm 10% nhân ngày báo cáo', 5, 1, 10, 'BCNL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_phone` char(10) NOT NULL,
  `customer_password` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_password`, `created_at`, `updated_at`) VALUES
(5, 'Trần Thanh Kiệp', 'ttkcaptianlp23@gmail.com', '0858801302', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finished_product_table`
--

CREATE TABLE `finished_product_table` (
  `endpro_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `endpro_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finished_product_table`
--

INSERT INTO `finished_product_table` (`endpro_id`, `product_id`, `product_price`, `endpro_number`, `created_at`, `updated_at`) VALUES
(1, 1, 35000.00, 50, NULL, NULL),
(2, 2, 35000.00, 100, NULL, NULL),
(3, 4, 30000.00, 50, NULL, NULL),
(4, 5, 30000.00, 50, NULL, NULL),
(5, 6, 30000.00, 50, NULL, NULL),
(6, 7, 30000.00, 50, NULL, NULL),
(7, 8, 30000.00, 50, NULL, NULL),
(8, 9, 30000.00, 50, NULL, NULL),
(9, 10, 35000.00, 100, NULL, NULL),
(10, 11, 35000.00, 50, NULL, NULL),
(11, 12, 40000.00, 50, NULL, NULL),
(12, 13, 35000.00, 50, NULL, NULL),
(13, 14, 35000.00, 50, NULL, NULL),
(14, 15, 30000.00, 50, NULL, NULL),
(15, 16, 10000.00, 50, NULL, NULL),
(16, 17, 25000.00, 50, NULL, NULL),
(17, 18, 300000.00, 50, NULL, NULL),
(18, 19, 50000.00, 50, NULL, NULL),
(19, 20, 50000.00, 50, NULL, NULL),
(20, 21, 100000.00, 50, NULL, NULL),
(21, 22, 40000.00, 50, NULL, NULL),
(22, 23, 35000.00, 50, NULL, NULL),
(23, 24, 35000.00, 50, NULL, NULL),
(24, 25, 35000.00, 50, NULL, NULL),
(25, 26, 5000.00, 50, NULL, NULL),
(26, 27, 5000.00, 50, NULL, NULL),
(27, 28, 7000.00, 50, NULL, NULL),
(28, 29, 5000.00, 50, NULL, NULL),
(29, 30, 12000.00, 50, NULL, NULL),
(30, 31, 5000.00, 60, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_table`
--

CREATE TABLE `material_table` (
  `material_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_image` varchar(255) NOT NULL,
  `material_number` float NOT NULL,
  `material_unit` varchar(50) NOT NULL,
  `material_stt` int(11) NOT NULL,
  `material_decs` text NOT NULL,
  `material_price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_table`
--

INSERT INTO `material_table` (`material_id`, `supplier_id`, `material_name`, `material_image`, `material_number`, `material_unit`, `material_stt`, `material_decs`, `material_price`, `created_at`, `updated_at`) VALUES
(6, 1, 'Bột trà sữa', 'botts30.png', 1000, 'Hộp', 0, 'Bột làm trà sữa', 50000, NULL, NULL),
(9, 1, 'Hạt trân châu đen', 'thach_ngoctrai_caramel_hungchuong_large30.png', 10, 'Thùng', 0, 'Trân châu đen', 50000, NULL, NULL),
(10, 1, 'Trà túi lọc', 'tratl49.png', 100, 'Thùng', 0, 'Trà pha trà olong', 60000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_26_075052_create_admin_table', 1),
(6, '2024_04_03_095549_create_category_product_table', 2),
(7, '2024_04_07_163502_create_product_table', 3),
(8, '2024_04_30_083050_create_customer_table', 4),
(9, '2024_04_30_091242_create_shipping_table', 5),
(10, '2024_04_30_092829_create_shipping_table', 6),
(11, '2024_05_01_164046_create_payment_table', 7),
(12, '2024_05_01_164104_create_order_table', 7),
(13, '2024_05_01_164123_create_order_details_table', 7),
(14, '2024_05_02_201102_create_counpon_table', 8),
(15, '2024_05_07_052309_create_supplier_table', 9),
(16, '2024_05_07_061656_create_material_table', 10),
(17, '2024_05_07_121319_create_finished_products_table', 11),
(18, '2024_05_07_171916_create_comment_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_details_table`
--

CREATE TABLE `order_details_table` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_sales_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details_table`
--

INSERT INTO `order_details_table` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_qty`, `created_at`, `updated_at`) VALUES
(38, 30, 2, 'Trà sữa đào', 35000, 1, NULL, NULL),
(39, 31, 8, 'Trà sữa olong', 30000, 1, NULL, NULL),
(40, 32, 8, 'Trà sữa olong', 30000, 3, NULL, NULL),
(41, 32, 27, 'Trân châu đen', 5000, 1, NULL, NULL),
(42, 33, 18, 'Combo 20 món ăn vặt Trung Quốc', 300000, 3, NULL, NULL),
(43, 34, 1, 'Trà sữa socola', 35000, 50, NULL, NULL),
(44, 35, 1, 'Trà sữa socola', 35000, 50, NULL, NULL),
(45, 36, 1, 'Trà sữa socola', 35000, 49, NULL, NULL),
(46, 37, 1, 'Trà sữa socola', 35000, 50, NULL, NULL),
(47, 38, 1, 'Trà sữa socola', 35000, 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `order_stt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_stt`, `created_at`, `updated_at`) VALUES
(30, 5, 5, 39, 35000, 4, '2024-05-01 15:02:38', NULL),
(31, 5, 5, 40, 30000, 3, '2024-04-03 15:02:42', NULL),
(32, 5, 6, 41, 95000, 1, '2024-05-04 15:02:47', NULL),
(33, 5, 7, 42, 900000, 0, '2023-05-04 15:02:52', NULL),
(34, 5, 8, 46, 1750000, 0, '2023-06-10 14:59:06', NULL),
(35, 5, 8, 47, 1750000, 0, '2024-05-07 14:58:07', NULL),
(36, 5, 8, 48, 1715000, 0, '2024-06-01 14:59:20', NULL),
(37, 5, 9, 49, 1750000, 2, NULL, NULL),
(38, 5, 10, 50, 1750000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_stt` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`payment_id`, `payment_method`, `payment_stt`, `created_at`, `updated_at`) VALUES
(39, '2', 'Đang chờ xử lý', NULL, NULL),
(40, '1', 'Đang chờ xử lý', NULL, NULL),
(41, '2', 'Đang chờ xử lý', NULL, NULL),
(42, '2', 'Đang chờ xử lý', NULL, NULL),
(43, '2', 'Đang chờ xử lý', NULL, NULL),
(44, '2', 'Đang chờ xử lý', NULL, NULL),
(45, '2', 'Đang chờ xử lý', NULL, NULL),
(46, '2', 'Đang chờ xử lý', NULL, NULL),
(47, '1', 'Đang chờ xử lý', NULL, NULL),
(48, '2', 'Đang chờ xử lý', NULL, NULL),
(49, '2', 'Đang chờ xử lý', NULL, NULL),
(50, '2', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_decs` text DEFAULT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`product_id`, `category_id`, `product_name`, `product_price`, `product_image`, `product_decs`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trà sữa socola', 35000, 'Trà-sữa-Chocolate-23.png', 'Béo, đậm vị socola', 0, NULL, NULL),
(2, 1, 'Trà sữa đào', 35000, 'Tra-Sua-Dao3.png', 'Béo, thơm mùi đào', 0, NULL, NULL),
(4, 1, 'Trà sữa socola bạc hà', 30000, 'Mint-Chocolate-Milk-Tea-w-Pearl-Iced39.png', 'Thơm mùi bạc hà', 0, NULL, NULL),
(5, 1, 'Trà sữa dâu', 30000, 'Tra-Sua-Dau-Cookie-191.png', NULL, 0, NULL, NULL),
(6, 1, 'Trà sữa khoai môn', 30000, 'Trà-sữa-Khoai-môn-219.png', NULL, 0, NULL, NULL),
(7, 1, 'Trà sữa nho', 30000, 'TRA-SUA-NHO28.png', NULL, 0, NULL, NULL),
(8, 1, 'Trà sữa olong', 30000, 'Trà-sữa-Oolong-3J-289.png', 'Thơm olong, béo', 0, NULL, NULL),
(9, 1, 'Trà sữa xoài', 30000, 'Tra-Sua-Xoai60.png', NULL, 0, NULL, NULL),
(10, 2, 'Trà chanh dây', 35000, 'ALISAN-TRÁI-CÂY3.png', NULL, 0, NULL, NULL),
(11, 2, 'Trà vải', 35000, 'Alisan-vải-279.png', NULL, 0, NULL, NULL),
(12, 2, 'Trà hồng mận hột é', 40000, 'Đào-hồng-mận-hột-é-146.png', NULL, 0, NULL, NULL),
(13, 2, 'Trà đào', 35000, 'Đen-đào-220.png', NULL, 0, NULL, NULL),
(14, 2, 'Trà nho', 35000, 'TRA-NHO83.png', NULL, 0, NULL, NULL),
(15, 8, 'Mít sấy', 30000, '3-400x40044.jpg', '1 bịch 500g', 0, NULL, NULL),
(16, 8, 'Chân gà sa tế cay', 10000, 'jpeg-optimizer_chan-ga-cay-tu-xuyen62.jpeg', '1 bịch', 0, NULL, NULL),
(17, 8, 'Cơm cháy chà bông', 25000, 'jpeg-optimizer_com-1-1-400x40093.png', '1 bịch 5 miếng', 0, NULL, NULL),
(18, 8, 'Combo 20 món ăn vặt Trung Quốc', 300000, 'jpeg-optimizer_Combo-20-mon-an-vat--400x40011.png', 'Chân gà, cánh gà, miếng cay,...', 0, NULL, NULL),
(19, 8, 'Bim Bim que đậu hà lan', 50000, 'jpeg-optimizer_dau-que-13-400x40034.png', '1 hộp 600g', 0, NULL, NULL),
(20, 8, 'Khô gà là chanh', 50000, 'jpeg-optimizer_kho-ga-la-chanh-400x40040.png', '1 gói 500g', 0, NULL, NULL),
(21, 8, 'Khô bò cay Tứ Xuyên', 100000, 'kho-bo-cay-tu-xuyen66.jpg', '1 gói 500g', 0, NULL, NULL),
(22, 13, 'Sữa tươi socola trân châu đường đen', 40000, 'Hinh-Web-OKINAWA-LATTE9.png', NULL, 0, NULL, NULL),
(23, 13, 'Sữa tươi trân châu đường đen', 35000, 'Hinh-Web-OKINAWA-SUA-TUOI37.png', NULL, 0, NULL, NULL),
(24, 13, 'Sữa tươi trân châu đường đen kem béo', 35000, 'Okinawa-Milk-Foam-Smoothie60.png', NULL, 0, NULL, NULL),
(25, 13, 'Sữa tươi dâu tây trân châu đường đen', 35000, 'Strawberry-Earl-grey-latte93.png', NULL, 0, NULL, NULL),
(26, 3, 'Trân châu trắng', 5000, 'Trân-Châu-Trắng44.png', NULL, 0, NULL, NULL),
(27, 3, 'Trân châu đen', 5000, 'Trân-Châu-Đen53.png', NULL, 0, NULL, NULL),
(28, 3, 'Combo trân châu đen - trắng', 7000, 'Combo2loaihat-251.png', NULL, 0, NULL, NULL),
(29, 3, 'Pudding trứng', 5000, '布丁-pudding44.png', NULL, 0, NULL, NULL),
(30, 3, 'Combo trân châu đen - trắng - pudding', 12000, 'Combo-3-loại-hạt23.png', NULL, 0, NULL, NULL),
(31, 3, 'Thạch trái cây', 5000, 'Thạch-trái-cây11.png', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_table`
--

CREATE TABLE `shipping_table` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(100) NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_phone` char(10) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_ynnote` int(11) NOT NULL,
  `shipping_infnote` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_table`
--

INSERT INTO `shipping_table` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `shipping_ynnote`, `shipping_infnote`, `created_at`, `updated_at`) VALUES
(2, 'Trần Thanh Kiệp', 'kiepb2012024@student.ctu.edu.vn', '0858801302', 'cà mau', 1, '50 đá, 50 đường', NULL, NULL),
(3, 'Trần Thanh Kiệp', 'kiepb2012024@student.ctu.edu.vn', '0858801302', 'cà mau', 1, '50 đá, 50 đường', NULL, NULL),
(4, 'Trần Thanh Kiệp', 'kiepb2012024@student.ctu.edu.vn', '0858801302', 'cà mau', 1, '50 đá, 50 đường', NULL, NULL),
(5, 'Trần Thanh Kiệp', 'kiepb2012024@student.ctu.edu.vn', '0858801302', 'cà mau', 1, '50 đá, 50 đường', NULL, NULL),
(6, 'Trần Thanh Kiệp', 'kiepb2012024@student.ctu.edu.vn', '0858801302', 'cà mau', 1, '50 đá, 50 đường', NULL, NULL),
(7, 'Trần Thanh Kiệp', 'kiepb2012024@student.ctu.edu.vn', '0858801302', 'cà mau', 1, 'giao nhanh nhanh nha', NULL, NULL),
(8, 'Trần Thanh Kiệp', 'kiepb2012024@student.ctu.edu.vn', '0858801302', 'cà mau', 1, 'Ít ngọt', NULL, NULL),
(9, 'Trần Thanh Kiệp', 'ttkcaptianlp23@gmail.com', '0858801302', 'cà mau', 1, '50 đá, 50 đường', NULL, NULL),
(10, 'Trần Thanh Kiệp', 'ttkcaptianlp23@gmail.com', '0858801302', 'cà mau', 1, '50 đá, 50 đường', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_table`
--

CREATE TABLE `supplier_table` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_phone` char(10) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_table`
--

INSERT INTO `supplier_table` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_address`, `created_at`, `updated_at`) VALUES
(1, 'Nguyên liệu trà sữa CHi Goumet Store', '0933438898', 'Y10 Hồng Lĩnh, P.15, Q.10, TP HCM', NULL, NULL),
(4, 'Kho MIAFOOD', '0923563780', '56A Trương Đình Hội, Phường 16, Quận 8, Thành Phố Hồ Chí Minh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category_product_table`
--
ALTER TABLE `category_product_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `counpon_table`
--
ALTER TABLE `counpon_table`
  ADD PRIMARY KEY (`counpon_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finished_product_table`
--
ALTER TABLE `finished_product_table`
  ADD PRIMARY KEY (`endpro_id`);

--
-- Indexes for table `material_table`
--
ALTER TABLE `material_table`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details_table`
--
ALTER TABLE `order_details_table`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping_table`
--
ALTER TABLE `shipping_table`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `supplier_table`
--
ALTER TABLE `supplier_table`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_product_table`
--
ALTER TABLE `category_product_table`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `cm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counpon_table`
--
ALTER TABLE `counpon_table`
  MODIFY `counpon_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finished_product_table`
--
ALTER TABLE `finished_product_table`
  MODIFY `endpro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `material_table`
--
ALTER TABLE `material_table`
  MODIFY `material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details_table`
--
ALTER TABLE `order_details_table`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `shipping_table`
--
ALTER TABLE `shipping_table`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier_table`
--
ALTER TABLE `supplier_table`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
