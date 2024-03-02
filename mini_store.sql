-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 01:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `id_product` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id_cart`, `id_user`, `id_product`, `qty`, `price`) VALUES
(11, 3, 3, 3, 60000),
(13, 3, 2, 4, 80000),
(14, 8, 6, 3, 375000),
(15, 8, 10, 1, 1350000);

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id_checkout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `checkout_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `total_price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id_checkout`, `id_user`, `checkout_date`, `name`, `phone`, `address`, `total_price`) VALUES
(1, 8, '2024-01-06 07:04:46', 'Maulana Haekal Noval Akbar', '081359654483', 'Dsn. Tugusari RT/RW 02/14 Ds. Kepulungan Kec. Gempol Kab. Pasuruan Prov. Jawa Timur', 170000),
(2, 3, '2024-01-06 07:09:45', 'Almira Tasya Nabila', '081359654482', 'Mojokerto', 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `checkout_items`
--

CREATE TABLE `checkout_items` (
  `id_checkout_item` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout_items`
--

INSERT INTO `checkout_items` (`id_checkout_item`, `id_checkout`, `id_product`, `qty`, `price`) VALUES
(1, 1, 1, 2, 50000),
(2, 1, 2, 6, 120000),
(3, 2, 4, 2, 2300000),
(4, 2, 7, 2, 1200000);

--
-- Triggers `checkout_items`
--
DELIMITER $$
CREATE TRIGGER `after_checkout` AFTER INSERT ON `checkout_items` FOR EACH ROW BEGIN
    DECLARE product_qty INT;
    
	 SELECT qty INTO product_qty FROM products WHERE id_product = NEW.id_product;
    
    UPDATE products SET qty = product_qty - NEW.qty WHERE id_product = NEW.id_product;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `category` varchar(50) NOT NULL DEFAULT '0',
  `brand` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `description`, `image`, `price`, `qty`, `category`, `brand`) VALUES
(1, 'Small Burger Squishy', 'Mainan tekan berbentuk makanan yaitu burger terbuat dari silikon, sangat menarik untuk dimainkan.\nBentuknya yang lucu menggemaskan sangat mudah dibawa kemana mana, dapat dimainkan oleh anak-anak maupun orang dewasa \nBisa meredakan stres untuk orang dewasa.\n', 'squishy-burger.jpg', 25000, 94, 'Squishy, Burger', 'Modes4u'),
(2, 'Donut Squishy', 'Mainan tekan berbentuk makanan yaitu donat terbuat dari silikon, sangat menarik untuk dimainkan.\nBentuknya yang lucu menggemaskan berwarna hijau muda ,sangat mudah dibawa kemana mana, dapat dimainkan oleh anak-anak maupun orang dewasa \nBisa meredakan stres untuk orang dewasa ', 'squishy-donut.jpg', 20000, 134, 'Squishy, Donut', 'Modes4u'),
(3, 'Pancake Cat Squishy ', 'Mainan tekan berbentuk makanan yaitu pancake cat terbuat dari silikon, sangat menarik untuk dimainkan.\nBentuknya yang lucu menggemaskan berwarna coklat seperti makanan sungguhan, sangat mudah dibawa kemana mana, dapat dimainkan oleh anak-anak maupun orang dewasa \nBisa meredakan stres untuk orang dewasa \n', 'squishy-pancake-cat.jpg', 20000, 153, 'Squishy, Pancake, Cat', 'Modes4u'),
(4, 'Lego Disney Menara Castle Princess Rapunzel', 'Set ini memiliki 369 bagian yang dapat dibangun menjadi menara yang menakjubkan, lengkap dengan tangga spiral, jendela, dan balkon. Menara ini juga memiliki kamar tidur Rapunzel yang indah, dengan tempat tidur, meja rias, dan lukisan.\n', 'lego-menara.jpg', 1150000, 46, 'Lego, Menara, Castle', 'Lego'),
(5, 'Lego Disney Up House', 'Set ini memiliki 598 bagian yang dapat dibangun menjadi rumah yang menakjubkan, lengkap dengan balon udara yang menggantung dari atap. \n', 'lego-house.jpg', 900000, 75, 'Lego, Rumah', 'Lego'),
(6, 'Hot Wheels Bugatti Chiron Hitam', 'Mobil ini memiliki desain yang ikonik dengan garis-garis tajam dan lekukan yang halus dan berwarna hitam. \nMobil ini terbuat dari bahan berkualitas tinggi dan dirancang untuk bertahan lama\n', 'hotwheels-Bugatii.jpg', 125000, 96, 'Hot Wheels, Bugatti Chiron, Hitam', 'Hot Wheels'),
(7, 'Hot Wheels Toyota Supra Pink\n', 'Mobil ini memiliki desain yang ikonik dengan garis-garis tajam dan lekukan yang halus dan warna pinknya yang cerah. \nMobil ini terbuat dari bahan berkualitas tinggi dan dirancang untuk bertahan lama\n', 'hotwheels-toyota.jpg', 600000, 58, 'Hot Wheels, Toyota, Supra, Pink', 'Hot Wheels'),
(8, 'Lego Seasonal 40524 Sunflowers', 'Set ini cocok untuk anak-anak berusia 8 tahun ke atas. Ini adalah cara yang menyenangkan dan mendidik untuk mempelajari tentang bunga matahari.\n', 'lego-sunflower.jpg', 280000, 98, 'Lego, Bunga Matahari', 'Lego'),
(9, 'Hot Wheels Toyota GR Supra Putih\n', 'Mobil ini memiliki desain yang ikonik dengan garis-garis tajam dan lekukan yang halus dan warna putihnya seperti ke abu abuan. \n', 'hotwheels-toyotaGR.jpg', 240000, 40, 'Hot Wheels, Toyota GR', 'Hot Wheels'),
(10, 'Leap Frog Scoop and Learn Ice Cream Cart', 'Mainan ice cream cart adalah mainan yang dirancang untuk anak-anak untuk bermain dengan. Mainan ini memiliki berbagai rasa es krim, termasuk vanila, cokelat, dan stroberi. Mainan ini juga dilengkapi dengan scooper, yang dapat digunakan untuk membuat cone es krim dan es loli. \nMainan ice cream cart ini cocok untuk anak-anak usia 3 tahun ke atas. Mainan ini dapat dimainkan oleh anak-anak secara mandiri atau bersama\nteman-temannya. Mainan ini juga dapat membantu anak-anak mengembangkan kreativitas dan imajinasi mereka.\n', 'leapfrog-scoopandicecreamcart.jpg', 1350000, 58, 'Leap Frog, Scoop, Ice Cream Cart', 'Leap Frog'),
(11, 'Play-Doh Mini Ice Cream Playset', 'mainan portabel kecil yang mencakup semua yang dibutuhkan anak-anak untuk membuat es krim cone tiruan mereka sendiri. Set ini dilengkapi dengan dua cetakan es krim cone, sendok, cetakan es loli, dan empat kaleng Play-Doh dengan warna klasik: merah, kuning, biru, dan hijau.\n', 'playdoh-icecream.jpg', 217000, 97, 'Play-Doh, Ice Cream', 'Play-Doh'),
(12, 'Ice Cream Squishy', 'Mainan tekan berbentuk makanan yaitu pancake strawberry terbuat dari silikon, sangat menarik untuk dimainkan.\nBentuknya yang lucu menggemaskan seperti makanan pancake asli, sangat mudah dibawa kemana mana, dapat dimainkan oleh anak-anak maupun orang dewasa \nBisa meredakan stres untuk orang dewasa \n', 'squishy-icecream.jpg', 25000, 47, 'Squishy, Ice Cream', 'Modes4u'),
(13, 'Pistol Gelembung Dream Bubble', 'Mainan Pistol Gelembung Sabun Otomatis ini mainan yang menyenangkan untuk anak-anak. Dengan warna pinknya yang mencolok disertai sayap berwarna biru pada pistol. ', 'pistol-gelembung.jpg', 50000, 100, 'Pistol Gelembung, Dream Bubble', 'Dream Bubble'),
(14, 'Mainan Anak Hiu Pinkfong BabyShark\n', 'Mainan Hiu Kuning Pinkfong Baby Shark adalah mainan yang sempurna untuk anak-anak dari segala usia. \nMainan Hiu Kuning Pinkfong Baby Shark adalah mainan yang cocok untuk bermain, belajar, dan menemani anak-anak. Mainan ini dapat membantu anak-anak mengembangkan imajinasi dan kreativitas mereka.\n', 'baby-shark.jpg', 150000, 140, 'Mainan anak, Hiu Pinkfong, Baby Shark', 'pinkfong'),
(15, 'Mainan Anak Minion Bob\n', 'Mainan Minion Bob adalah mainan yang menggemaskan dan cocok untuk anak-anak berusia 2 tahun ke atas. \nMainan ini memiliki bentuk Minion Bob yang ikonik dengan warna kuning cerah. Minion Bob memiliki tubuh yang gemuk dan kaki yang pendek. Mainan ini dapat dijadikan sebagai teman tidur anak\n', 'minion-bob.jpg', 150000, 197, 'Mainan anak, Minion, Bob', 'minions'),
(16, 'Mainan Anak Mobil Kebakaran Paw Patrol Rescue Mars', 'Mainan Mobil Pemadam Kebakaran Paw Patrol Rescue Marshall memiliki bentuk mobil pemadam kebakaran berwarna merah putih. Mobil ini memiliki fitur sirene dan lampu yang dapat dinyalakan. Terdapat action figure mini Karakter Marshall. \nMainan ini cocok untuk anak-anak berusia 3 tahun ke atas. Mainan ini dapat digunakan untuk bermain peran, bermain bersama teman-teman, atau untuk dijadikan sebagai koleksi.\n', 'paw-patrol.jpg', 150000, 160, 'Mainan Mobil, Pemadam Kebakaran, Paw Patrol', 'Paw Patrol'),
(17, 'Mainan Cashier Toy Cash Register Playset', 'Mainan Cashier Toy Cash Register Playset adalah mainan yang populer di kalangan anak-anak. Mainan ini didasarkan pada kasir supermarket yang sesungguhnya. Mainan ini dapat digunakan untuk bermain peran, bermain bersama teman-teman, atau untuk dijadikan sebagai koleksi.\nMainan ini cocok untuk anak-anak usia tiga tahun ke atas. \n', 'Cashier-Toy.jpg', 200000, 200, 'Mainan, Cashier Toy', 'CifToys'),
(20, 'Mainan Magic Mixies Magical', 'Mainan ini memiliki bentuk kuali ajaib berwarna ungu dan putih. Kuali ini memiliki fitur penyemprotan uap yang dapat digunakan untuk membuat ramuan ajaib. Mainan ini juga dilengkapi dengan boneka plush yang dapat berinteraksi dengan pengguna.', 'Magic-Mixies.jpg', 700000, 150, 'Mainan, Magic Mixies', 'Magic Mixies');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `id_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `email`, `pass`, `id_role`) VALUES
(1, 'Maulana Haekal', 'maulanahaekal@gmail.com', '$2y$10$VjvVHGMZyHXKT9KZQNINge/TSB1It.h4EBuPoP.NWULCnuHH/cA86', 1),
(3, 'Almira Tasya', 'tasyuu789@gmail.com', '$2y$10$q2lw6oxRhuA3YKw3WdG7IOhqxndhaOiOimIh/hEEY1HKQUqP3KsPq', 2),
(7, 'Tasya Nabila', 'tasyuu@gmail.com', '$2y$10$4cGlv9IxVWsB7PTrtBEOie2BT/msIvTs6opEMMkZC/5uyorS0JLlm', 1),
(8, 'Noval Akbar', 'noval.akbar.906@gmail.com', '$2y$10$ijDHvjLvJZRH2fwWEmypDO2N8FuimVMYe/o5EUtXGmbeFFrK6jI.q', 2),
(9, 'Sholihatul Mir\'ati', 'sholiha@gmail.com', '$2y$10$nFshXJOm9CQxuAofR0zes.4/wJiZdCnVLBTTfRw.1LWLxvavcU/uq', 2),
(10, 'Nasihatul Munir', 'munirhaen@gmail.com', '$2y$10$mprb2vr4glQc.SnoYys8HeCSvLhL7jP8.0ETzjbq32UkwIJu1Ajaq', 1),
(12, 'Vijaydillah', 'vijay22@gmail.com', '$2y$10$vabvp6Etw.2FlmaIpZSd0u6rxAvlLPW5uipHAcif9IS/eouAkLBQC', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id_checkout`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `checkout_items`
--
ALTER TABLE `checkout_items`
  ADD PRIMARY KEY (`id_checkout_item`) USING BTREE,
  ADD KEY `id_checkout` (`id_checkout`) USING BTREE,
  ADD KEY `id_product` (`id_product`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkout_items`
--
ALTER TABLE `checkout_items`
  MODIFY `id_checkout_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK__user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `checkout_items`
--
ALTER TABLE `checkout_items`
  ADD CONSTRAINT `FK_checkout_item_checkout` FOREIGN KEY (`id_checkout`) REFERENCES `checkouts` (`id_checkout`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_checkout_item_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
