<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>All Products &mdash; Pawland</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">
			<div class="card soft">
				<h2>All Products</h2>

				<?php

				include_once "parts/functions.php";
				include "parts/template.php";

				$result = makeQuery(
					makeConn(),
					"
					SELECT *
					FROM `products`
					ORDER BY `id` DESC
					LIMIT 12
					"
				);

				echo "<div class='grid gap'>", array_reduce($result, 'productListTemplate'), "</div>";

				?>
			</div>
		</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
