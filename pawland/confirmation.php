<?php 
include_once "parts/functions.php"; 
resetCart();
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order Confirmed &mdash; Pawland</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">
			<div class="confirmation wrap">

				<div class="confirm heading row">
					<div class="confirm icon">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
							<polyline points="20 6 9 17 4 12"/>
						</svg>
					</div>
					<h3>Order Confirmed</h3>
				</div>
				<p>Thank you for setting up your care plan!</p>
				<p>Your order number is <strong>#PWL-98234</strong></p>

				<div class="card soft next steps">
					<h4>Next Steps</h4>
					<div class="next steps item">
						<strong>1.</strong>
						<span>We&rsquo;ll send a shipping confirmation email soon.</span>
					</div>
					<div class="next steps item">
						<strong>2.</strong>
						<span>Your next delivery is scheduled for exactly 4 weeks from today.</span>
					</div>
					<div class="next steps item">
						<strong>3.</strong>
						<span>You can modify your plan anytime in your dashboard.</span>
					</div>
				</div>

				<div class="confirm actions">
					<a href="index.php" class="btn outline">Go to Home</a>
					<a href="cart.php" class="btn primary">Return to Cart</a>
				</div>

			</div>
		</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
