<?php

include_once "parts/functions.php";

switch($_GET['action']) {
    case "add-to-cart":
        $product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_POST['product-id'])[0];
        addToCart($_POST['product-id'],$_POST['product-amount']);
        header("Location:product_added_to_cart.php?id={$_POST['product-id']}");
        exit;

    case "update-cart-item":
        $cart = getCart();
        $p = array_find($cart, function($o) { return $o->id == $_POST['id']; });
        if($p) {
            $p->amount = $_POST['amount'];
        }
        header("Location:cart.php");
        break;

    case "delete-cart-item":
        $_SESSION['cart'] = array_filter($_SESSION['cart'],function($o){return $o->id!=$_POST['id'];});
        header("Location:cart.php");
        break;

    case "reset-cart":
        resetCart();
        header("Location:cart.php");
        break;

    default:
        die("Incorrect Action");
}