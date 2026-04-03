-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2026 at 12:02 PM
-- Server version: 8.0.45-36
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zfdypjmy_ixd608`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `stock_quantity`, `image`, `created_at`) VALUES
(25, 'Gently Cooked Farmhouse Beef & Pumpkin', 'Fresh Food', 'Human-grade beef mixed with fiber-rich pumpkin and organic spinach. Frozen at peak freshness.', 15.99, 100, 'beef-pumpkin.jpg', '2026-04-03 12:01:39'),
(26, 'Raw Vitality Turkey & Berry Blend', 'Fresh Food', 'A complete and balanced raw meal featuring ground turkey, organ meat, and antioxidant-rich blueberries.', 18.50, 100, 'turkey-berry.jpg', '2026-04-03 12:01:39'),
(27, 'Wild-Caught Salmon & Quinoa Bowl', 'Fresh Food', 'Omega-3 powerhouse meal with steamed salmon, quinoa, and steamed carrots.', 17.25, 100, 'salmon-quinoa.jpg', '2026-04-03 12:01:39'),
(28, 'Grain-Free Chicken & Liver Mousse', 'Wet Food', 'Smooth, hydrating texture for cats or small dogs. High protein with zero fillers.', 3.50, 100, 'chicken-mousse.jpg', '2026-04-03 12:01:39'),
(29, 'Hearty Lamb & Sweet Potato Stew', 'Wet Food', 'Chunks of tender lamb in a savory bone broth gravy with peas and sweet potatoes.', 4.25, 100, 'lamb-stew.jpg', '2026-04-03 12:01:39'),
(30, 'Duck & Venison Limited Ingredient Can', 'Wet Food', 'Ideal for pets with sensitivities. Hypoallergenic proteins in a moisture-dense formula.', 5.00, 100, 'duck-venison.jpg', '2026-04-03 12:01:39'),
(31, 'High-Protein Ancient Grains Chicken Kibble', 'Dry Food', 'Oven-baked kibble featuring cage-free chicken, oats, and barley.', 45.00, 100, 'chicken-kibble.jpg', '2026-04-03 12:01:39'),
(32, 'Small Breed Grass-Fed Lamb Recipe', 'Dry Food', 'Smaller kibble size specifically formulated for the metabolic needs of small dogs.', 42.00, 100, 'lamb-kibble.jpg', '2026-04-03 12:01:39'),
(33, 'Advanced Hip & Joint Soft Chews', 'Supplements', 'Monthly supply of Glucosamine, Chondroitin, and MSM to support mobility.', 29.99, 100, 'joint-chews.jpg', '2026-04-03 12:01:39'),
(34, 'Probiotic Daily Digestive Powder', 'Supplements', 'A blend of 5 billion CFUs to promote a healthy gut microbiome.', 24.50, 100, 'probiotic-powder.jpg', '2026-04-03 12:01:39'),
(35, 'Freeze-Dried Beef Liver Bites', 'Treats', 'Single-ingredient, nutrient-dense training treats. No preservatives.', 12.99, 100, 'beef-liver.jpg', '2026-04-03 12:01:39'),
(36, 'Dental Defense Parsley Sticks', 'Treats', 'Ridged texture helps scrub away plaque while parsley freshens breath.', 9.99, 100, 'dental-sticks.jpg', '2026-04-03 12:01:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
