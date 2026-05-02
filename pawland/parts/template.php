<?php

function productListTemplate($r,$o) {
return $r.<<<HTML
<a class="col-xs-12 col-md-4" href="product.php?id=$o->id">
	<div class="pet card">
		<div class="pet img">
			<img src="images/$o->image" alt="$o->name">
		</div>
		<div class="pet body">
			<p class="pet name">$o->name</p>
			<p class="pet price">&dollar;$o->price</p>
		</div>
	</div>
</a>
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
$options = '';
for ($i = 1; $i <= 10; $i++) {
	$sel = ($i == $o->amount) ? ' selected' : '';
	$options .= "<option value=\"$i\"$sel>Qty: $i</option>";
}
return $r.<<<HTML
<div class="cart-item">
	<div class="cart-item-img">
		<img src="images/$o->image" alt="$o->name" style="max-width:100%;max-height:100%;object-fit:contain;">
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
    $cart = getCartItems();

    $cartprice = array_reduce($cart, function($r, $o){ return $r + $o->total; }, 0);

    $pricefixed = number_format($cartprice, 2, '.', '');
    $taxfixed = number_format($cartprice * 0.0725, 2, '.', '');
    $taxedfixed = number_format($cartprice * 1.0725, 2, '.', '');

    return <<<HTML
<div class="card section display-flex">
    <div class="flex-stretch"><strong>Sub Total</strong></div>
    <div class="flex-none">&dollar;$pricefixed</div>
</div>
<div class="card section display-flex">
    <div class="flex-stretch"><strong>Taxes</strong></div>
    <div class="flex-none">&dollar;$taxfixed</div>
</div>
<div class="card section display-flex">
    <div class="flex-stretch"><strong>Total</strong></div>
    <div class="flex-none">&dollar;$taxedfixed</div>
</div>
<div class="card section">
    <a href="checkout.php" class="btn primary full">Checkout</a>
</div>
HTML;
}