-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2026 at 06:26 AM
-- Server version: 8.0.45-36
-- PHP Version: 8.3.31

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
  `ingredients` text,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `ingredients`, `price`, `stock_quantity`, `image`, `created_at`) VALUES
(25, 'Cooked Farmhouse Beef & Pumpkin', 'Dry Food', 'A wholesome gently cooked meal made with human-grade beef and nutrient-rich pumpkin. Slow-cooked to preserve natural flavors and easy on sensitive stomachs. Perfect for dogs of all ages who deserve real food in every bowl.', 'Beef, Pumpkin, Brown Rice, Carrots, Spinach, Sunflower Oil, Beef Liver, Dicalcium Phosphate, Salt, Zinc Sulfate, Vitamin E Supplement, Thiamine Mononitrate, Vitamin A Supplement, Riboflavin Supplement, Vitamin D3 Supplement', 11.99, 100, 'beef-pumpkin.png,beef-pumpkin-2.png', '2026-04-03 12:01:39'),
(26, 'Raw Vitality Turkey & Berry Blend', 'Fresh Food', 'A raw-inspired blend of free-range turkey and antioxidant-packed berries, lightly processed to retain natural enzymes and nutrients. Supports a shiny coat, lean muscle, and a strong immune system.', 'Turkey, Blueberries, Cranberries, Turkey Liver, Flaxseed, Pumpkin Seed, Kelp, Salmon Oil, Vitamin E Supplement, Zinc Proteinate, Iron Proteinate, Copper Proteinate, Manganese Proteinate, Vitamin D3 Supplement', 18.50, 100, 'turkey-berry.png,turkey-berry-2.png', '2026-04-03 12:01:39'),
(27, 'Wild-Caught Salmon & Quinoa Bowl', 'Fresh Food', 'Premium wild-caught salmon paired with protein-rich quinoa and fresh vegetables. Rich in Omega-3 fatty acids to support brain health, joint mobility, and a lustrous coat. Ideal for dogs with chicken sensitivities.', 'Wild-Caught Salmon, Quinoa, Sweet Potato, Green Peas, Salmon Oil, Broccoli, Coconut Oil, Dicalcium Phosphate, Potassium Chloride, Choline Chloride, Vitamin E Supplement, Niacin, Vitamin A Supplement, Riboflavin, Vitamin D3 Supplement', 17.25, 100, 'salmon-quinoa.png,salmon-quinoa-2.png', '2026-04-03 12:01:39'),
(28, 'Grain-Free Chicken & Liver Mousse', 'Wet Food', 'A silky smooth mousse made with real chicken and liver, free from grains and artificial additives. Gentle enough for kittens and senior cats, rich in protein and moisture to support urinary health and hydration.', 'Chicken, Chicken Liver, Chicken Broth, Sunflower Oil, Guar Gum, Tricalcium Phosphate, Taurine, Choline Chloride, Vitamin E Supplement, Zinc Sulfate, Niacin Supplement, Thiamine Mononitrate, Calcium Pantothenate, Vitamin A Supplement, Vitamin D3 Supplement', 3.50, 100, 'chicken-mousse.png,chicken-mousse-2.png', '2026-04-03 12:01:39'),
(29, 'Hearty Lamb & Sweet Potato Stew', 'Wet Food', 'A hearty, slow-simmered stew made with tender lamb chunks and naturally sweet potato. High in iron and essential amino acids to support muscle strength and energy. A comforting meal for dogs who love warm, savory flavors.', 'Lamb, Sweet Potato, Lamb Broth, Peas, Carrots, Lamb Liver, Potato Starch, Sunflower Oil, Dicalcium Phosphate, Salt, Potassium Chloride, Choline Chloride, Zinc Sulfate, Vitamin E Supplement, Vitamin A Supplement, Vitamin D3 Supplement', 4.25, 100, 'lamb-stew.png,lamb-stew-2.png', '2026-04-03 12:01:39'),
(30, 'Duck & Venison Limited Ingredient Can', 'Wet Food', 'A limited-ingredient wet food featuring novel proteins — duck and venison — ideal for dogs with food sensitivities or allergies. Single animal protein source with no common allergens, making it easy to identify and eliminate triggers.', 'Duck, Venison, Duck Broth, Tapioca Starch, Canola Oil, Dicalcium Phosphate, Potassium Chloride, Salt, Choline Chloride, Taurine, Zinc Sulfate, Vitamin E Supplement, Thiamine Mononitrate, Vitamin A Supplement, Vitamin D3 Supplement', 5.00, 100, 'duck-venison.png,duck-venison-2.png', '2026-04-03 12:01:39'),
(31, 'High-Protein Ancient Grains Chicken Kibble', 'Dry Food', 'An oven-baked kibble crafted with cage-free chicken and a wholesome blend of ancient grains for sustained energy. High protein content supports lean muscle development. Added prebiotics and probiotics promote healthy digestion.', 'Chicken, Chicken Meal, Oatmeal, Barley, Millet, Sorghum, Chicken Fat, Dried Beet Pulp, Flaxseed, Natural Flavor, Dried Chicory Root, Vitamin E Supplement, Zinc Proteinate, Iron Proteinate, Niacin, Riboflavin Supplement, Vitamin A Supplement, Vitamin D3 Supplement, Calcium Carbonate', 45.00, 100, 'chicken-kibble.png,chicken-kibble-2.png', '2026-04-03 12:01:39'),
(32, 'Small Breed Grass-Fed Lamb Recipe', 'Dry Food', 'Specially sized smaller kibble pieces designed for small and toy breeds with petite jaws and fast metabolisms. Made with grass-fed lamb as the first ingredient, with a precise calcium-to-phosphorus ratio to support small-breed bone health.', 'Lamb, Lamb Meal, Brown Rice, White Rice, Oatmeal, Lamb Fat, Dried Beet Pulp, Flaxseed, Natural Flavor, Dried Chicory Root, Choline Chloride, Vitamin E Supplement, Zinc Proteinate, Iron Proteinate, Copper Proteinate, Vitamin A Supplement, Vitamin D3 Supplement, Thiamine Mononitrate', 42.00, 100, 'lamb-kibble.png,lamb-kibble-2.png', '2026-04-03 12:01:39'),
(33, 'Advanced Hip & Joint Soft Chews', 'Supplements', 'A veterinarian-recommended soft chew delivering a therapeutic blend of Glucosamine, Chondroitin, and MSM to support cartilage repair and joint flexibility. Ideal for aging dogs or active breeds prone to joint stress. Duck-flavored for easy daily feeding.', 'Glucosamine Hydrochloride (500mg), Chondroitin Sulfate (400mg), Methylsulfonylmethane/MSM (200mg), Dried Duck, Tapioca Starch, Vegetable Glycerin, Canola Oil, Citric Acid, Mixed Tocopherols, Rosemary Extract, Vitamin C, Zinc Proteinate, Manganese Proteinate', 29.99, 100, 'joint-chews.png,joint-chews-2.png', '2026-04-03 12:01:39'),
(34, 'Probiotic Daily Digestive Powder', 'Supplements', 'A daily digestive supplement delivering 5 billion CFUs of live beneficial bacteria per serving. Supports gut flora balance, reduces bloating and gas, and improves nutrient absorption. Unflavored powder mixes easily into any wet or dry food.', 'Lactobacillus Acidophilus, Lactobacillus Casei, Bifidobacterium Longum, Bifidobacterium Breve, Lactobacillus Plantarum, Fructooligosaccharides (Prebiotic Fiber), Dried Chicory Root, Rice Flour, Silicon Dioxide', 24.50, 100, 'probiotic-powder.png,probiotic-powder-2.png', '2026-04-03 12:01:39'),
(35, 'Freeze-Dried Beef Liver Bites', 'Treats', 'Single-ingredient freeze-dried beef liver bites that lock in nutrients at peak freshness. Intensely flavorful with zero additives — just pure protein. Perfect for training, rewarding, or supplementing your pet\'s regular diet.', 'Beef Liver (100% Single Ingredient, Freeze-Dried)', 12.99, 100, 'beef-liver.png,beef-liver-2.png', '2026-04-03 12:01:39'),
(36, 'Dental Defense Parsley Sticks', 'Treats', 'Ridged dental sticks infused with parsley and spearmint to fight plaque, reduce tartar buildup, and freshen breath with every chew. The unique textured shape reaches between teeth for a thorough mechanical clean. Suitable for dogs 6 months and older.', 'Rice Flour, Glycerin, Gelatin, Parsley, Spearmint Oil, Dicalcium Phosphate, Calcium Carbonate, Zinc Sulfate, Sodium Tripolyphosphate, Natural Flavors, Green Tea Extract, Vitamin E Supplement', 9.99, 100, 'dental-sticks.png,dental-sticks-2.png', '2026-04-03 12:01:39');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
