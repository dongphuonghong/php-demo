-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 03:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan1`
--

CREATE TABLE `binhluan1` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `idkh` int(11) NOT NULL,
  `idhanghoa` int(11) NOT NULL,
  `content` text NOT NULL,
  `luotthich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `idhanghoa` int(11) NOT NULL,
  `idmau` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`) VALUES
(1, 'Laptop Dell XPS 13', 1, b'0', 500, '2023-01-15', 'Laptop Dell XPS 13 là một trong những laptop tốt nhất hiện nay.'),
(2, 'MacBook Pro 2023', 1, b'1', 700, '2023-01-16', 'MacBook Pro 2023 được ra mắt với nhiều cải tiến đáng giá so với các thế hệ trước đó.'),
(3, 'Laptop ASUS ROG Zephyrus G14', 1, b'0', 400, '2023-01-17', 'Laptop ASUS ROG Zephyrus G14 là một trong những chiếc laptop gaming được đánh giá cao.'),
(4, 'Điện thoại iPhone 14 Pro Max', 2, b'1', 900, '2023-01-18', 'iPhone 14 Pro Max là một trong những smartphone hàng đầu trên thị trường hiện nay.'),
(5, 'Điện thoại Samsung Galaxy S23 Ultra', 2, b'0', 600, '2023-01-19', 'Samsung Galaxy S23 Ultra là một trong những smartphone Android mạnh mẽ và đa năng nhất.'),
(6, 'Máy tính để bàn HP Pavilion Gaming', 1, b'0', 300, '2023-01-20', 'Máy tính để bàn HP Pavilion Gaming là lựa chọn tốt cho người dùng muốn trải nghiệm game đỉnh cao.'),
(7, 'Mac Mini M2', 1, b'1', 800, '2023-01-21', 'Mac Mini M2 ra mắt với hiệu suất vượt trội và thiết kế nhỏ gọn, phù hợp với nhiều nhu cầu sử dụng.'),
(8, 'Máy tính bảng iPad Air 5', 3, b'0', 400, '2023-01-22', 'iPad Air 5 là một trong những máy tính bảng tốt nhất hiện nay với hiệu suất ấn tượng và thiết kế mỏng nhẹ.'),
(9, 'Máy tính xách tay Lenovo ThinkPad X1 Carbon', 1, b'0', 600, '2023-01-23', 'Lenovo ThinkPad X1 Carbon là một trong những laptop doanh nhân hàng đầu với thiết kế sang trọng và hiệu suất ổn định.'),
(10, 'Điện thoại Google Pixel 7', 2, b'0', 300, '2023-01-24', 'Google Pixel 7 ra mắt với nhiều tính năng độc đáo và camera chất lượng cao.'),
(11, 'Máy tính để bàn Dell Inspiron 5000', 1, b'0', 500, '2023-01-25', 'Dell Inspiron 5000 là một trong những lựa chọn phổ thông cho người dùng máy tính để bàn.'),
(12, 'Laptop MSI GS66 Stealth', 1, b'0', 700, '2023-01-26', 'MSI GS66 Stealth là một trong những laptop gaming mạnh mẽ và mỏng nhẹ.'),
(13, 'Điện thoại OnePlus 10 Pro', 2, b'0', 400, '2023-01-27', 'OnePlus 10 Pro là một trong những smartphone Android hàng đầu với hiệu suất mạnh mẽ và thiết kế đẹp.'),
(14, 'Máy tính bảng Samsung Galaxy Tab S8', 3, b'0', 600, '2023-01-28', 'Samsung Galaxy Tab S8 là một trong những máy tính bảng Android tốt nhất với màn hình đẹp và hiệu suất ấn tượng.'),
(15, 'Máy tính xách tay Acer Predator Helios 300', 1, b'0', 500, '2023-01-29', 'Acer Predator Helios 300 là một trong những laptop gaming giá rẻ nhưng mạnh mẽ.'),
(16, 'Laptop Lenovo Yoga 9i', 1, b'0', 700, '2023-01-30', 'Lenovo Yoga 9i là một trong những laptop 2 trong 1 tốt nhất hiện nay với thiết kế đẹp và hiệu suất cao.'),
(17, 'Điện thoại Xiaomi Mi 12', 2, b'0', 400, '2023-01-31', 'Xiaomi Mi 12 ra mắt với nhiều cải tiến đáng giá và hiệu suất mạnh mẽ.'),
(18, 'Máy tính để bàn iMac Pro', 1, b'0', 800, '2023-02-01', 'iMac Pro là một trong những máy tính để bàn chuyên nghiệp hàng đầu của Apple.'),
(19, 'Điện thoại OPPO Find X5 Pro', 2, b'0', 600, '2023-02-02', 'OPPO Find X5 Pro là một trong những smartphone Android cao cấp nhất trên thị trường.'),
(20, 'Máy tính xách tay Microsoft Surface Laptop 5', 1, b'0', 500, '2023-02-03', 'Microsoft Surface Laptop 5 là một trong những laptop doanh nhân tốt nhất với thiết kế sang trọng và hiệu suất ổn định.');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text DEFAULT NULL,
  `sodienthoai` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`) VALUES
(1, 'Nguyen Van A', 'user1', 'password1', 'user1@example.com', '123 Street, City', '123456789'),
(2, 'Nguyen Thi B', 'user2', 'password2', 'user2@example.com', '456 Street, City', '987654321'),
(3, 'Le Van C', 'user3', 'password3', 'user3@example.com', '789 Street, City', '456123789'),
(4, 'Tran Van D', 'user4', 'password4', 'user4@example.com', '1011 Street, City', '654789321'),
(5, 'Pham Thi E', 'user5', 'password5', 'user5@example.com', '1213 Street, City', '987123456'),
(6, 'Hoang Van F', 'user6', 'password6', 'user6@example.com', '1415 Street, City', '321987654'),
(7, 'Nguyen Thi G', 'user7', 'password7', 'user7@example.com', '1617 Street, City', '789321654'),
(8, 'Tran Van H', 'user8', 'password8', 'user8@example.com', '1819 Street, City', '654987321'),
(9, 'Le Thi I', 'user9', 'password9', 'user9@example.com', '2021 Street, City', '321456987'),
(10, 'Pham Van K', 'user10', 'password10', 'user10@example.com', '2223 Street, City', '987654123'),
(11, 'Nguyen Van L', 'user11', 'password11', 'user11@example.com', '2425 Street, City', '456789321'),
(12, 'Tran Thi M', 'user12', 'password12', 'user12@example.com', '2627 Street, City', '654321789'),
(13, 'Le Van N', 'user13', 'password13', 'user13@example.com', '2829 Street, City', '123789654'),
(14, 'Pham Van O', 'user14', 'password14', 'user14@example.com', '3031 Street, City', '789654321'),
(15, 'Hoang Thi P', 'user15', 'password15', 'user15@example.com', '3233 Street, City', '456321789'),
(16, 'Tran Van Q', 'user16', 'password16', 'user16@example.com', '3435 Street, City', '321789654'),
(17, 'Le Thi R', 'user17', 'password17', 'user17@example.com', '3637 Street, City', '987654321'),
(18, 'Pham Van S', 'user18', 'password18', 'user18@example.com', '3839 Street, City', '654321987'),
(19, 'Hoang Van T', 'user19', 'password19', 'user19@example.com', '4041 Street, City', '321987654'),
(20, 'Nguyen Van U', 'user20', 'password20', 'user20@example.com', '4243 Street, City', '987654321'),
(0, 'nguyễn văn c', '123', '385c1c2175760b4b35baa1bd0196f837', 'a11bc@gmail.com', '123', '123'),
(0, 'vana', 'd', '6f6bf5e10397b934d59c5869db67425f', 'vand@gmail.com', '3/41/231/1', '09882134391');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `Idmau` int(11) NOT NULL,
  `mausac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int(11) NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `dia` text NOT NULL,
  `username` varchar(250) NOT NULL,
  `matkhau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `hoten`, `dia`, `username`, `matkhau`) VALUES
(1, 'Tran Van C', '789 Street, City', 'admin1', 'adminpass1'),
(2, 'Tran Thi D', '1011 Street, City', 'admin2', 'adminpass2'),
(3, 'Le Van E', '1213 Street, City', 'admin3', 'adminpass3'),
(4, 'Le Thi F', '1415 Street, City', 'admin4', 'adminpass4'),
(5, 'Pham Van G', '1617 Street, City', 'admin5', 'adminpass5'),
(6, 'Pham Thi H', '1819 Street, City', 'admin6', 'adminpass6'),
(7, 'Hoang Van I', '2021 Street, City', 'admin7', 'adminpass7'),
(8, 'Hoang Thi K', '2223 Street, City', 'admin8', 'adminpass8'),
(9, 'Nguyen Van L', '2425 Street, City', 'admin9', 'adminpass9'),
(10, 'Nguyen Thi M', '2627 Street, City', 'admin10', 'adminpass10'),
(11, 'Tran Van N', '2829 Street, City', 'admin11', 'adminpass11'),
(12, 'Tran Thi O', '3031 Street, City', 'admin12', 'adminpass12'),
(13, 'Le Van P', '3233 Street, City', 'admin13', 'adminpass13'),
(14, 'Le Thi Q', '3435 Street, City', 'admin14', 'adminpass14'),
(15, 'Pham Van R', '3637 Street, City', 'admin15', 'adminpass15'),
(16, 'Pham Thi S', '3839 Street, City', 'admin16', 'adminpass16'),
(17, 'Hoang Van T', '4041 Street, City', 'admin17', 'adminpass17'),
(18, 'Hoang Thi U', '4243 Street, City', 'admin18', 'adminpass18'),
(19, 'Nguyen Van V', '4445 Street, City', 'admin19', 'adminpass19'),
(20, 'Nguyen Thi W', '4647 Street, City', 'admin20', 'adminpass20');

--
-- Indexes for dumped tables
--
INSERT INTO `binhluan1` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`) VALUES
(1, 1, 1, '2023-01-20', 'Sản phẩm rất tuyệt vời! Tôi rất hài lòng với hiệu suất của nó.'),
(2, 1, 2, '2023-01-21', 'Màn hình của laptop rất sáng và sắc nét.'),
(3, 2, 3, '2023-01-22', 'MacBook Pro 2023 thực sự ấn tượng với hiệu suất và thiết kế của nó.');


--
-- Indexes for table `nhanvien`
--
INSERT INTO `comment` (`idcomment`, `idkh`, `idhanghoa`, `content`, `luotthich`) VALUES
(1, 1, 1, 'Sản phẩm này tuyệt vời!', 10),
(2, 2, 2, 'MacBook Pro 2023 có thiết kế đẹp mắt.', 5),
(3, 3, 3, 'Máy tính xách tay này chạy mượt mà đấy!', 8);
INSERT INTO `cthanghoa` (`idhanghoa`, `idmau`, `dongia`, `soluongton`, `hinh`, `giamgia`) VALUES
(1, 1, 25000000, 20, 'laptop_dell_xps_13.jpg', 0),
(2, 2, 30000000, 15, 'macbook_pro_2023.jpg', 0),
(3, 3, 20000000, 25, 'laptop_asus_rog_zephyrus_g14.jpg', 0);
INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `mausac`, `thanhtien`, `tinhtrang`) VALUES
(1, 1, 2, 'Đen', 50000000, 1),
(1, 2, 1, 'Bạc', 30000000, 1),
(2, 3, 1, 'Xám', 20000000, 1);
INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 1, '2023-01-20', 80000000),
(2, 2, '2023-01-21', 20000000);
INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Laptop', 1),
(2, 'Điện thoại di động', 1),
(3, 'Máy tính bảng', 1);
INSERT INTO `mausac` (`Idmau`, `mausac`) VALUES
(1, 'Đen'),
(2, 'Bạc'),
(3, 'Xám');

ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
