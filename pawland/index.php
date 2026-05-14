<?php
include_once "parts/functions.php";

$dryFood   = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `category`='Dry Food' LIMIT 1");
$wetFood   = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `category`='Wet Food' LIMIT 1");
$freshFood = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `category`='Fresh Food' LIMIT 1");
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pawland &mdash; Smarter routines for happier pets</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<!-- HEADER -->
	<?php include "parts/header.php"; ?>

	<main>

		<!-- HERO: Banner -->
		<?php include "parts/banner.php"; ?>

		<!-- BRANDS -->
		<?php include "parts/brand.php"; ?>

		<!-- CATEGORIES HEADING + 3-UP CARDS -->
		<section>
			<div class="container">

				<h2 class="categories heading">Categories</h2>

				<div class="grid gap">

					<!-- Dry Food -->
					<div class="col-xs-12 col-md-4">
						<a href="category.php?cat=Dry Food">
							<div class="card soft product">
								<div class="img placeholder">
									<?php if (!empty($dryFood)): ?>
									<img src="images/<?= htmlspecialchars(firstProductImage($dryFood[0])) ?>" alt="Dry Food">
									<?php endif; ?>
								</div>
								<div class="pet body">
									<h4>Dry Food</h4>
									<p>Premium kibble for every life stage</p>
								</div>
							</div>
						</a>
					</div>

					<!-- Wet Food -->
					<div class="col-xs-12 col-md-4">
						<a href="category.php?cat=Wet Food">
							<div class="card soft product">
								<div class="img placeholder">
									<?php if (!empty($wetFood)): ?>
									<img src="images/<?= htmlspecialchars(firstProductImage($wetFood[0])) ?>" alt="Wet Food">
									<?php endif; ?>
								</div>
								<div class="pet body">
									<h4>Wet Food</h4>
									<p>Delicious recipes packed with moisture</p>
								</div>
							</div>
						</a>
					</div>

					<!-- Fresh Food -->
					<div class="col-xs-12 col-md-4">
						<a href="category.php?cat=Fresh Food">
							<div class="card soft product">
								<div class="img placeholder">
									<?php if (!empty($freshFood)): ?>
									<img src="images/<?= htmlspecialchars(firstProductImage($freshFood[0])) ?>" alt="Fresh Food">
									<?php endif; ?>
								</div>
								<div class="pet body">
									<h4>Fresh Food</h4>
									<p>Gently cooked with whole ingredients</p>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div>
		</section>

	</main>

	<!-- FOOTER -->
	<?php include "parts/footer.php"; ?>

</body>
</html>
