<?php
	$_page = basename($_SERVER['PHP_SELF'], '.php');
	$_nav  = ['index' => 'home', 'category' => 'shop', 'product' => 'shop', 'cart' => 'cart', 'checkout' => 'cart'][$_page] ?? '';
?>

<header class="color primary dark">
	<div class="container">
		<nav class="nav horizontal">

			<!-- Logo + Utility links -->
			<div class="display flex flex align">
				<img src="pawlandlogo.svg" id="logo" width="260" class="card logo">
				<div class="flex stretch"></div>
				<a href="cart.php" class="<?php echo ($_nav === 'cart') ? 'active' : ''; ?>">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
					Cart
				</a>
				<a href="#">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
					Login
				</a>
			</div>

			<!-- Primary nav links + Hotdog search -->
			<div class="display flex flex align">
				<a href="index.php" class="<?php echo ($_nav === 'home') ? 'active' : ''; ?>">Home</a>
				<a href="category.php" class="<?php echo ($_nav === 'shop') ? 'active' : ''; ?>">Shop</a>
				<a href="#">Pets</a>
				<a href="#">Brands</a>
				<a href="#">Subscription</a>
				<div class="flex stretch"></div>
				<div class="hotdog search" id="site-search">
					<div class="hotdog search bar">
						<button class="hotdog search toggle" type="button" aria-label="Filters">
							<span class="hotdog bar"></span>
							<span class="hotdog bar"></span>
							<span class="hotdog bar"></span>
						</button>
						<span class="hotdog search icon" aria-hidden="true">
							<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
						</span>
						<input class="hotdog search input" type="text" id="site-search-input" placeholder="Search&hellip;">
						<button class="hotdog search clear" id="site-search-clear" type="button" aria-label="Clear">
							<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
						</button>
						<button class="hotdog search btn" type="button">Search</button>
					</div>
				</div>
			</div>

		</nav>
	</div>
</header>
