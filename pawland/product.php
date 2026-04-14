<?php

include "parts/functions.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];

$image_secondary = preg_replace('/(\.\w+)$/', '-2$1', $product->image);
$image_elements = "<img src='images/{$product->image}'>"
                . "<img src='images/{$image_secondary}'>";

// print_p($product);

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Item</title>

	<?php include "parts/href.php"; ?>

	<script src="js/product_thumbs.js"></script>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">
			<div class="grid gap align-items-stretch">
				<div class="col-xs-12 col-md-6">
					<div class="card soft" style="height: 100%; align-content: center;">
						<div class="images-main">
							<img src="images/<?= $product->image ?>">
						</div>
						<br>
						<div class="images-thumbs">
							<?= $image_elements ?>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-md-6">
					<div class="card soft flat" style="height: 100%; align-content: center;">
						<div>
							<h2 class="product-name"><?= $product->name ?></h2>
							<div style="font-weight: 600; font-size: 20pt; color: var(--color-primary)" class="product-price">&dollar;<?= $product->price ?></div>

							<br>

							<p style="color: var(--color-text)"><?= $product->product_condition ?? '' ?></p>
							<p style="color: var(--color-text)"><?= $product->description ?? '' ?></p>

							<p style="color: var(--color-text); font-size: 10pt"><?= $product->ingredients ?? '' ?></p>
						</div>

						<br>

						<div>
							<label for="product-amount" class="form-label"></label>
							<div class="form-select" id="product-amount">
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
						</div>

						<div class="card-section form-control">
							<a href="product_added_to_cart.php?id=<?= $product->id ?>" class="btn dark full">Add to cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br>
		<br>
		<br>

	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
