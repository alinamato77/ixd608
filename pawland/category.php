<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dog Food &mdash; Pawland</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">

			<!-- Breadcrumb -->
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Shop</a></li>
				<li>Dry Food</li>
			</ol>

			<!-- Page header: title + sort -->
			<div class="page header row">
				<h1>Dry Food</h1>
				<select class="input">
					<option>Sort by: Recommended</option>
					<option>Price: Low to High</option>
					<option>Price: High to Low</option>
					<option>Best Sellers</option>
				</select>
			</div>

			<!-- Filter tags -->
			<div class="search tags filter">
				<span class="tag">Dogs</span>
				<span class="tag">Dry Food</span>
				<span class="tag">Under $50</span>
			</div>

			<!-- 4-up product grid -->
			<div class="grid gap">

				<?php
				$products = [
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => ''],
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => 'Sale'],
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => ''],
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => 'New'],
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => ''],
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => ''],
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => 'Low Stock'],
					['name' => 'Product Name Premium', 'desc' => 'Short description here', 'price' => '$45.00', 'badge' => ''],
				];
				foreach ($products as $p):
				?>
				<div class="col-xs-6 col-md-3">
					<a href="product.php">
						<div class="pet card">
							<div class="pet img">
								<?php if ($p['badge']): ?>
									<span class="badge danger"><?php echo $p['badge']; ?></span>
								<?php endif; ?>
								<button class="btn pet fav" type="button" aria-label="Add to favourites">&#9825;</button>
							</div>
							<div class="pet body">
								<p class="pet name"><?php echo $p['name']; ?></p>
								<p class="pet meta"><?php echo $p['desc']; ?></p>
								<p><?php echo $p['price']; ?></p>
								<div class="pet actions">
									<button class="btn primary" type="button">Add to Cart</button>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php endforeach; ?>

			</div>
		</div>
	</main>

	<?php include "parts/footer.php"; ?>
	<script src="lib/js/site.js"></script>
</body>
</html>
