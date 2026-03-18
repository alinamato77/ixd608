<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Premium Dry Dog Food &mdash; Pawland</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="category.php">Dry Food</a></li>
				<li>Premium Dry Dog Food</li>
			</ol>

			<div class="grid gap">

				<!-- Gallery -->
				<div class="col-xs-12 col-md-5">
					<div class="product gallery main">Product Image</div>
					<div class="product gallery thumbs">
						<div class="product gallery thumb"></div>
						<div class="product gallery thumb"></div>
						<div class="product gallery thumb"></div>
						<div class="product gallery thumb"></div>
					</div>
				</div>

				<!-- Info -->
				<div class="col-xs-12 col-md-7">
					<span class="badge primary">New</span>
					<h1>Premium Dry Dog Food</h1>

					<div class="rating row">
						<span class="rating stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
						<span>(128 reviews)</span>
					</div>

					<p>A high-protein, grain-free recipe made with real chicken and wholesome vegetables. Formulated for adult dogs of all breeds and sizes.</p>

					<!-- Buy box -->
					<div class="buy box">

						<label class="buy box option card outline display flex flex align" id="option-subscribe">
							<input type="radio" name="purchase-type" checked>
							<strong>Subscribe &amp; Save 30%</strong>
						</label>

						<label class="buy box option card outline display flex flex align" id="option-onetime">
							<input type="radio" name="purchase-type">
							<strong>One-time purchase</strong>
						</label>

					</div>

					<div class="form group">
						<label class="form label">Size</label>
						<select class="input">
							<option>2 kg</option>
							<option selected>5 kg</option>
							<option>10 kg</option>
							<option>15 kg</option>
						</select>
					</div>

					<div class="form actions">
						<button class="btn primary flex stretch" type="button">Add to Cart</button>
					</div>
				</div>

			</div>
		</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
