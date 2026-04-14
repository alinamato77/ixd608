<?php

include "parts/functions.php";
include "parts/template.php";

$cart = makeQuery(
	makeConn(),
	"
	SELECT *
	FROM `products`
	WHERE `id` = ".(int)$_GET['id']."
	"
);

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Cart &mdash; Pawland</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Cart</li>
			</ol>

			<div class="grid gap">

				<!-- Left: Cart items -->
				<div class="col-xs-12 col-md-8">
					<h1>Your Cart</h1>
					<?php echo array_reduce($cart, 'cartListTemplate'); ?>
				</div>

				<!-- Right: Order Summary -->
				<div class="col-xs-12 col-md-4">
					<div class="card soft">
						<h4>Order Summary</h4>
						<div class="display flex">
							<span>Subtotal</span>
							<span class="flex stretch"></span>
							<span>$<?php echo number_format($cart[0]->price ?? 0, 2); ?></span>
						</div>
						<div class="display flex">
							<span>Shipping</span>
							<span class="flex stretch"></span>
							<span>Calculated at next step</span>
						</div>
						<hr>
						<div class="display flex">
							<strong>Total</strong>
							<span class="flex stretch"></span>
							<strong>$<?php echo number_format($cart[0]->price ?? 0, 2); ?></strong>
						</div>
						<div class="form actions">
							<a href="checkout.php" class="btn primary flex stretch">Checkout</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
