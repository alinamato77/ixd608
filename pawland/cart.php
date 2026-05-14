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
        </div>

        <div class="col-xs-12 col-md-5">
            <div class="card soft">
                <?= cartTotals() ?>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="col-xs-4">
        <h2>Other Recommendations</h2>
        <?php recommendedAnything(3); ?>
    </div>
</div>
	</main>

	<?php include "parts/footer.php"; ?>
</body>
</html>
