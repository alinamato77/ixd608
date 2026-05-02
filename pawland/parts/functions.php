<?php

session_start();

function print_p($v){
	echo "<pre>", print_r($v),"</pre>";
}

include_once __DIR__ . "/auth.php";

function makeConn(){
	$conn = new mysqli(...MYSQLIAuth());
	if($conn->connect_errno) die($conn->connect_error);
	$conn->set_charset('utf8');
	return $conn;
}

function makeQuery($conn,$qry) {
	$result = $conn->query($qry);
	if($conn->errno) die($conn->error);
	$a = [];
	while($row = $result->fetch_object()) {
		$a[] = $row;
	}
	return $a;
}
function makePDOConn() {
    try {
        $conn = new PDO(...PDOAuth());
    } catch(PDOException $e) {
        die($e->getMessage());
    }
    return $conn;
}

function makeExec($conn,$qry) {
	$conn->query($qry);
	if($conn->errno) die($conn->error);
	return $conn->affected_rows;
}

if (!function_exists('array_find')) {
    function array_find($array, $fn) {
        foreach($array as $o) if($fn($o)) return $o;
        return false;
    }
}

function getCart() {
	return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

function addToCart($id,$amount) {
	$cart = getCart();

	$p = array_find($cart, function($o) use($id) { return $o->id==$id; });

	if($p) {
		$p->amount += $amount;
	} else {
		$_SESSION['cart'][] = (object)[
			"id"=>$id,
			"amount"=>$amount,
		];
	}
}

function resetCart() {
	$_SESSION['cart'] = [];
}

function makeCartBadge() {
	$cart = getCart();
	if(count($cart)==0) {
		return "";
	} else {
		return array_reduce($cart, function($r,$o){return $r+$o->amount;},0);
	}
}

// Returns array of image filenames from a product's comma-separated `image` column
function productImages($o) {
    return array_filter(array_map('trim', explode(",", $o->image ?? '')));
}

// Returns the first (thumbnail) image filename, or '' if none
function firstProductImage($o) {
    $imgs = productImages($o);
    return $imgs ? reset($imgs) : '';
}

// Returns single <img> tag for the product's thumbnail
function productThumbnailHtml($o) {
    $first = firstProductImage($o);
    return $first ? "<img src='images/{$first}' alt='{$o->name}'>" : '';
}

// Returns a row of <span class="images-thumbs"><img></span> for all product images
function productOtherImagesHtml($o) {
    $html = '';
    foreach(productImages($o) as $img) {
        $html .= "<span class='images-thumbs'><img src='images/{$img}' alt='{$o->name}'></span>";
    }
    return $html;
}

// Returns <option> tags for the category select, with $selected pre-selected
function categoryOptions($selected = '') {
    $cats = ['Fresh Food','Wet Food','Dry Food','Supplements','Treats'];
    $html = '';
    foreach($cats as $cat) {
        $sel = ($selected === $cat) ? ' selected' : '';
        $html .= "<option value=\"{$cat}\"{$sel}>{$cat}</option>";
    }
    return $html;
}

function getCartItems() {
    $cart = getCart();

    if (empty($cart)) return [];

    $ids = implode(",", array_map(function($o){ return $o->id; }, $cart));
    $data = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id` IN ($ids)");

    return array_map(function($o) use ($cart) {
        $p = array_find($cart, function($c) use ($o) { return $c->id == $o->id; });
        $o->amount = $p->amount ?? 1;
        $o->total = $o->amount * $o->price;
        return $o;
    }, $data);
}