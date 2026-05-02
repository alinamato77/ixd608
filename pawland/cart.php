<?php
include_once "parts/functions.php";
include "parts/template.php";

//$cart = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` = ".(int)$_GET['id']);

$cart_items = getCartItems();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart Page</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<?php include "parts/header.php"; ?>


	<main>
	<div class="container">
		<h2>In Your Cart</h2>
		<div class="grid gap">

			<div class="col-xs-12 col-md-7">
				<div class="card soft cart-list">
					<?= empty($cart_items)
						? '<p class="cart-empty">your cart is empty.</p>'
						: array_reduce($cart_items, 'cartListTemplate') ?>
				</div>
			</div>

			<div class="col-xs-12 col-md-5">
				<div class="card soft">
					<?php
						$subtotal = array_sum(array_map(function($item){ return $item->total; }, $cart_items));
						$tax = $subtotal * 0.1;
						$total = $subtotal + $tax;
					?>
					<div class="card section display-flex">
						<div class="flex-stretch"><strong>Sub Total</strong></div>
						<div class="flex none">&dollar;<?= number_format($subtotal, 2) ?></div>
					</div>
					<div class="card section display-flex">
						<div class="flex-stretch"><strong>Taxes</strong></div>
						<div class="flex none">&dollar;<?= number_format($tax, 2) ?></div>
					</div>
					<div class="card section display-flex">
						<div class="flex-stretch"><strong>Total</strong></div>
						<div class="flex none">&dollar;<?= number_format($total, 2) ?></div>
					</div>
					<div>
						<a href="checkout.php" class="btn primary full">Checkout</a>
					</div>
				</div>
			</div>

		</div>
	</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
