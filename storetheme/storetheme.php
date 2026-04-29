storetheme

						<?php if ($badges): ?>
						<div style="display:flex; flex-wrap:wrap; gap:0.5rem; margin:0.75rem 0;">
							<?= $badges ?>
						</div>
						<?php endif; ?>
						
						<?php if (!empty($product->description)): ?>
						<p style="color:var(--color-text)"><?= htmlspecialchars($product->description) ?></p>
						<?php endif; ?>

						<?php if (!empty($product->ingredients)): ?>
						<p style="color:var(--color-text-secondary); font-size:0.875rem;"><?= htmlspecialchars($product->ingredients) ?></p>
						<?php endif; ?>

						<hr style="border:none; border-top:1px solid var(--color-stroke-light); margin:1rem 0;">




// *category.php*///

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
