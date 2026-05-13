<?php

function productList($r,$o) {
$thumb = firstProductImage($o);
return $r.<<<HTML
<div class="col-xs-4">
	<figure class="card soft product">
		<span class="badge success">In Stock</span>
		<div class="img placeholder">
			<img src="images/$thumb" alt="$o->name">
		</div>
		<h3>$o->name</h3>
		<div class="product rating">&#9733;&#9733;&#9733;&#9733;&#9734;</div>
		<h4>&dollar;$o->price</h4>
		<a href="product.php?id=$o->id" class="btn outline full">View</a>
		<form action="cart_actions.php?action=add-to-cart" method="post">
			<input type="hidden" name="product-id" value="$o->id">
			<input type="hidden" name="product-amount" value="1">
			<button type="submit" class="btn primary full">Add to Cart</button>
		</form>
	</figure>
</div>
HTML;
}

function selectAmount($amount=1,$total=10) {
    $output = "<select name='amount'>";
    for($i=1;$i<=$total;$i++) {
        $output .= "<option ".($i==$amount?"selected":"").">$i</option>";
    }
    $output .= "</select>";
    return $output;
}

function cartListTemplate($r,$o){
$totalfixed = number_format($o->total,2,'.','');
$thumb = firstProductImage($o);
$options = '';
for ($i = 1; $i <= 10; $i++) {
	$sel = ($i == $o->amount) ? ' selected' : '';
	$options .= "<option value=\"$i\"$sel>Qty: $i</option>";
}
return $r.<<<HTML
<div class="cart-item">
	<div class="cart-item-img">
		<img src="images/$thumb" alt="$o->name">
	</div>
	<div class="cart-item-info">
		<div class="cart-item-name">$o->name</div>
		<form action="cart_actions.php?action=update-cart-item" method="post" style="margin-bottom:0.5rem;">
			<input type="hidden" name="id" value="$o->id">
			<div class="form-select" style="display:inline-block;">
				<select name="amount" onchange="this.form.submit()">$options</select>
			</div>
		</form>
		<form action="cart_actions.php?action=delete-cart-item" method="post" style="display:inline;">
			<input type="hidden" name="id" value="$o->id">
			<button type="submit" class="btn danger sm cart-item-remove">Remove</button>
		</form>
	</div>
	<div class="cart-item-right">
		<div class="cart-item-price">&dollar;$totalfixed</div>
	</div>
</div>
HTML;
}


function cartTotals() {
    $items = getCartItems();
    $cartprice = array_reduce($items, function($r, $o){ return $r + $o->total; }, 0);
    $pricefixed  = number_format($cartprice, 2, '.', '');
    $taxfixed    = number_format($cartprice * 0.0725, 2, '.', '');
    $taxedfixed  = number_format($cartprice * 1.0725, 2, '.', '');

    $itemList = '';
    foreach ($items as $item) {
        $thumb = htmlspecialchars(firstProductImage($item));
        $name = htmlspecialchars($item->name);
        $qty = (int)$item->amount;
        $itemTotal = number_format($item->total, 2);
        $itemList .= <<<HTML
<div class="display-flex">
    <div class="flex-none">
        <img src="images/$thumb" alt="$name">
    </div>
    <div class="flex-stretch">
        <div class="product-info-name"><strong>$name</strong></div>
        <div class="product-info-amount"><small>Qty: $qty</small></div>
    </div>
    <div class="product-info-price">
        <strong>&dollar;$itemTotal</strong>
    </div>
</div>
HTML;
    }

    return <<<HTML
<h4>Items Review</h4>
<div class="checkout-item-list">
$itemList
</div>

<div class="checkout-totals">
    <div class="display-flex">
        <span>Subtotal</span>
        <span class="flex-stretch"></span>
        <span>&dollar;$pricefixed</span>
    </div>

    <div class="display-flex">
        <span>Shipping</span>
        <span class="flex-stretch"></span>
        <span>Free</span>
    </div>

    <div class="display-flex">
        <span>Taxes</span>
        <span class="flex-stretch"></span>
        <span>&dollar;$taxfixed</span>
    </div>

    <hr>

    <div class="display-flex total-line">
        <strong>Total</strong>
        <span class="flex-stretch"></span>
        <strong>&dollar;$taxedfixed</strong>
    </div>

    <div class="form actions">
        <a href="checkout.php" class="btn primary full">Checkout</a>
    </div>
</div>
HTML;
}

function recommendedProducts($a) {
$products = array_reduce($a,'productList');
echo <<<HTML
<div class="grid gap productlist">$products</div>
HTML;
}


function recommendedAnything($limit=3) {
    $result = makeQuery(makeConn(),"SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT $limit");
    recommendedProducts($result);
}

function recommendedCategory($cat,$limit=3) {
    $result = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `category`='$cat' ORDER BY `created_at` DESC LIMIT $limit");
    recommendedProducts($result);
}

function recommendedSimilar($cat,$id=0,$limit=3) {
    $result = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `category`='$cat' AND `id`<>$id ORDER BY rand() LIMIT $limit");
    recommendedProducts($result);
}