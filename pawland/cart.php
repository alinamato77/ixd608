<!DOCTYPE html>
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
					<h3>Your Cart (1)</h3>

					<div class="cart item">
						<div class="cart item img"></div>
						<div>
							<p><strong>Premium Dry Food Recipe</strong></p>
							<p><small>Delivery every 4 weeks</small></p>
							<button class="btn secondary sm" type="button">Remove</button>
						</div>
						<div>
							<p><strong>$31.50</strong></p>
							<div class="qty stepper">
								<button type="button">-</button>
								<span>1</span>
								<button type="button">+</button>
							</div>
						</div>
					</div>

				</div>

				<!-- Right: Order Summary -->
				<div class="col-xs-12 col-md-4">
					<div class="card soft">
						<h4>Order Summary</h4>
						<div class="display flex">
							<span>Subtotal</span>
							<span class="flex stretch"></span>
							<span>$31.50</span>
						</div>
						<div class="display flex">
							<span>Shipping</span>
							<span class="flex stretch"></span>
							<span>Calculated at next step</span>
						</div>
						<div class="display flex">
							<span class="badge primary">Subscription Discount</span>
							<span class="flex stretch"></span>
							<span>- $13.50</span>
						</div>
						<hr>
						<div class="display flex">
							<strong>Total</strong>
							<span class="flex stretch"></span>
							<strong>$31.50</strong>
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
