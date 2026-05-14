<?php

include_once "parts/functions.php";

?>

<header class="color primary">
	<div class="container">
		<nav class="nav horizontal">
			<a href="index.php"><img src="pawlandlogo.svg" id="logo"></a>
			<div class="flex stretch">
        <div class="form-control">
            <form class="hotdog light" id="product-search">
                <input type="search" placeholder="Search Products">
                <button type="submit" class="btn secondary">Search</button>
            </form>
        </div>
			</div>
			<ul>
				<li><a href="category.php">Store</a></li>
				<li><a href="cart.php">
					<span>Cart</span>
					<span class="badge cart"><?= makeCartBadge(); ?></span>
				</a></li>
			</ul>
		</nav>
    </div>
</header>