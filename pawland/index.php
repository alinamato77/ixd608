<!DOCTYPE html>
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
						<a href="category.php">
							<div class="pet card">
								<div class="pet img">
								</div>
								<div class="pet body">
									<p class="pet name">Dry Food</p>
									<p class="pet meta">Premium kibble for every life stage</p>
								</div>
							</div>
						</a>
					</div>

					<!-- Wet Food -->
					<div class="col-xs-12 col-md-4">
						<a href="category.php">
							<div class="pet card">
								<div class="pet img">
								</div>
								<div class="pet body">
									<p class="pet name">Wet Food</p>
									<p class="pet meta">Delicious recipes packed with moisture</p>
								</div>
							</div>
						</a>
					</div>

					<!-- Fresh Food -->
					<div class="col-xs-12 col-md-4">
						<a href="category.php">
							<div class="pet card">
								<div class="pet img">
								</div>
								<div class="pet body">
									<p class="pet name">Fresh Food</p>
									<p class="pet meta">Gently cooked with whole ingredients</p>
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

	<script src="lib/js/site.js"></script>
</body>
</html>
