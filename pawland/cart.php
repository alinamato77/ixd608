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
            <div class="card soft">
                <?php
                if(count($cart_items)) {
                    echo array_reduce($cart_items, 'cartListTemplate');
                } else {
                    ?>
                    <p>No items in cart</p>
                    <?php
                }
                ?>
            </div>

            <h3>Other Recommendations</h3>
            <?php recommendedAnything(3); ?>
        </div>
        
        <div class="col-xs-12 col-md-5">
            <div class="card soft mb-4">
                <?= cartTotals() ?>
            </div>
        </div>
    </div>
</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
