<?php
include_once "parts/functions.php";
include_once "parts/template.php";

$id = (int)($_POST['product-id'] ?? $_GET['id'] ?? 0);
$product = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=$id")[0];
if (!$product) { header('Location: index.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Added to Cart &mdash; Pawland</title>
	<?php include "parts/href.php"; ?>
</head>
<body>

	<?php include "parts/header.php"; ?>

	<main>
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="category.php">Store</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li>Added to Cart</li>
			</ol>

			<div class="card soft">

				<div class="display flex flex align" style="gap: 2rem;">
					<div class="cart-item-img">
						<img src="images/<?php echo htmlspecialchars(firstProductImage($product)); ?>" alt="<?php echo htmlspecialchars($product->name); ?>">
					</div>
					<div class="flex stretch">
						<h2><?php echo htmlspecialchars($product->name); ?></h2>
						<h4>has been added to your cart.</h4>
						<p class="pet meta">$<?php echo number_format($product->price, 2); ?></p>
					</div>
				</div>

				<div class="display flex flex align" style="margin-top: 2rem;">
					<div class="flex none"><a href="category.php?cat=<?php echo urlencode($product->category); ?>" class="btn outline full">Continue Shopping</a></div>
					<div class="flex stretch"></div>
					<div class="flex none"><a href="cart.php?id=<?= $product->id ?>" class="btn primary full">Go To Cart</a></div>
				</div>

			</div>

			<h3>Other Recommendations</h3>
            <?php recommendedAnything(3); ?>

		</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
