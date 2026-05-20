<?php

include_once "parts/functions.php";

?>

<header class="color primary">
	<div class="container">
		<nav class="nav horizontal">
			<a href="index.php"><img src="pawlandlogo.svg" id="logo"></a>
			<button type="button" class="header search toggle" id="header-search-toggle" aria-label="Toggle search" aria-expanded="false">
				<svg viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
			</button>
			<button type="button" class="header nav toggle" id="header-nav-toggle" aria-label="Toggle menu" aria-expanded="false">
				<span></span><span></span><span></span>
			</button>
			<div class="flex stretch" id="header-search-wrap">
        <div class="form-control">
            <form class="hotdog light" id="product-search">
                <input type="search" placeholder="Search Products">
                <button type="submit" class="btn secondary">Search</button>
            </form>
        </div>
			</div>
			<ul id="header-nav-list">
				<li><a href="category.php">Store</a></li>
				<li><a href="cart.php">
					<span>Cart</span>
					<span class="badge cart"><?= makeCartBadge(); ?></span>
				</a></li>
			</ul>
		</nav>
    </div>
</header>