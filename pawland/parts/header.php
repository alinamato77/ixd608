<?php

include_once "parts/functions.php";

?>

<header class="color primary dark">
	<div class="container">
		<nav class="nav horizontal">

			<!-- Logo + Utility links -->
			<div class="nav">
				<img src="pawlandlogo.svg" id="logo" width="260" class="card logo">
				<div class="flex stretch"></div>
        <nav class="nav nav-flex flex-none">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="product.php">Store</a></li>
                <li><a href="cart.php">
                    <span>Cart</span>
                    <span class="badge cart"><?= makeCartBadge(); ?></span>
                </a></li>
            </ul>
        </nav>
    </div>
		</nav>
</header>