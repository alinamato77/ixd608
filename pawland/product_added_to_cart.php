<?php
include_once "parts/functions.php";

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
				<li><a href="index.php">Home</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li>Added to Cart</li>
			</ol>

			<div class="card soft">

				<div class="display flex flex align" style="gap:1.5rem; margin-bottom:1.5rem;">
					<div class="pet img" style="width:120px;height:120px;flex-shrink:0;border-radius:0.75rem;overflow:hidden;background:var(--color-cream);">
						<img src="images/<?php echo htmlspecialchars($product->image); ?>" alt="<?php echo htmlspecialchars($product->name); ?>" style="width:100%;height:100%;object-fit:contain;">
					</div>
					<div>
						<h2><?php echo htmlspecialchars($product->name); ?> has been added to your cart.</h2>
						<p class="pet meta">$<?php echo number_format($product->price, 2); ?></p>
					</div>
				</div>

				<div class="display flex flex align" style="gap:1rem;">
					<div class="flex none"><a href="category.php?cat=<?php echo urlencode($product->category); ?>" class="btn outline">Continue Shopping</a></div>
					<div class="flex stretch"></div>
					<div class="flex none"><a href="cart.php?id=<?= $product->id ?>" class="btn primary">Go To Cart</a></div>
				</div>

			</div>

		</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
