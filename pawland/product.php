<?php

include_once "parts/functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];

$image_secondary = preg_replace('/(\.\w+)$/', '-2$1', $product->image);

// Build badges from product_condition (comma-separated values)
$badges = '';
if (!empty($product->product_condition)) {
	foreach (array_map('trim', explode(',', $product->product_condition)) as $tag) {
		if ($tag) $badges .= "<span class='badge secondary'>$tag</span>";
	}
}

// print_p($product);

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= htmlspecialchars($product->name) ?> &mdash; Pawland</title>

	<?php include "parts/href.php"; ?>

	<script src="js/product_thumbs.js"></script>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">
			<div class="grid gap">



				<!-- Left: Images -->
				<div class="col-xs-12 col-md-6">
					<div class="card soft" style="height:100%;">

						<div class="images-main" >
							<img src="images/<?= $product->image ?>" class="images-main-style">
						</div>

						<br>

						<div class="images-thumbs" >
							<img src="images/<?= $product->image ?>" class="images-thumbs-style">
							<img src="images/<?= $image_secondary ?>" class="images-thumbs-style">
						</div>

					</div>
				</div>



				<!-- Right: Product info -->
				<div class="col-xs-12 col-md-6">
					<form class="card soft" method="post" action="cart_actions.php?action=add-to-cart">

						<input type="hidden" name="product-id" value="<?= $product->id ?>">

						<div class="card section">
							<h2 class="product-title"><?= htmlspecialchars($product->name) ?></h2>
							<div class="product-price">
								&dollar;<?= number_format($product->price, 2) ?>
							</div>
						</div>

						<?php if ($badges): ?>
						<div class="card section">
							<?= $badges ?>
						</div>
						<?php endif; ?>

						<?php if (!empty($product->description)): ?>
						<div class="card section">
							<p ><?= htmlspecialchars($product->description) ?></p>
						</div>
						<?php endif; ?>

						<?php if (!empty($product->ingredients)): ?>
						<div class="card section">
							<p ><?= htmlspecialchars($product->ingredients) ?></p>
						</div>
						<?php endif; ?>

						<div class="card section">
							<label for="product-amount" class="form-label">Amount</label>
							<div class="form-select">
								<select id="product-amount" name="product-amount">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
						</div>

						<div class="card section">
							<input type="submit" class="btn primary full" value="Add To Cart">
						</div>

					</form>
				</div>

			</div>
		</div>

		<br><br>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
