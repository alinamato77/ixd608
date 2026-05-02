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
            <ol class="breadcrumb">
                <li><a href="category.php">Store</a></li>
                <li>Products</li>
            </ol>

            <h2>Product Details</h2>
			<div class="grid gap">



				<!-- Left: Images -->
				<div class="col-xs-12 col-md-6">
                <div class="card soft">
        
                <div class="gallery-wrapper">
            
                <div class="images-thumbs">
                <img src="images/<?= $product->image ?>">
                <img src="images/<?= $image_secondary ?>">
                </div>

                <div class="images-main">
                <img src="images/<?= $product->image ?>">
            </div>
            
        </div>
        
    </div>
</div>



				<!-- Right: Product info -->
				<div class="col-xs-12 col-md-6">
    <form class="card soft card section display flex flex column" style="height: 100%;" method="post" action="cart_actions.php?action=add-to-cart">

        <input type="hidden" name="product-id" value="<?= $product->id ?>">

        <div>
            <h4 class="product-title"><?= htmlspecialchars($product->name) ?></h4>
            <div class="product-price">
                &dollar;<?= number_format($product->price, 2) ?>
            </div>
        </div>

        <hr style="color: var(--color-text-muted);">

        <?php if ($badges): ?>
        <div>
            <?= $badges ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($product->description)): ?>
        <div>
            <p ><?= htmlspecialchars($product->description) ?></p>
        </div>
        <?php endif; ?>

        <?php if (!empty($product->ingredients)): ?>
        <div style="margin-bottom: 5rem;">
            <p ><?= htmlspecialchars($product->ingredients) ?></p>
        </div>
        <?php endif; ?>

        <hr>

        <div style="margin-top: auto;">
            <label for="product-amount" class="form label">Amount</label>
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
            <div>
                <input type="submit" class="btn primary full" value="Add To Cart">
            </div>
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
